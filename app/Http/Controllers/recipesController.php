<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Models\recipe;
use App\Models\RecipeImages;
use App\Models\RecipesCategoriesMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Image;
use Session;
use Intervention\Image\ImageManager;

class recipesController extends Controller
{
    private $requestData;
    private $oldImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $recipes = recipe::where('title','LIKE', '%'.$keyword.'%')
                ->orderBy('modified','desc')
                ->paginate($perPage);
        } else {
            $recipes = recipe::orderBy('modified','desc')->paginate($perPage);
        }
        return view('recipes.index', compact('recipes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->requestData = $request->all();

        $validator = $this->validate($request, $this->rules($request));

        if ($validator && $validator->fails()) {
            return redirect('recipes/create')->withErrors($validator);
        }

        $this->requestData['created'] = date('Y-m-d H:i:s');
        $this->requestData['user_id'] = session('user.id');
        $videoUrl = isset($request->video_url) ? explode("?v=",$request->video_url) : null;
        $this->requestData['video_url'] = isset($videoUrl[1]) ? $videoUrl[1] : $videoUrl[0];

        DB::transaction(function () use($request) {
            $categoryIds = $this->requestData['recipe_category_id'];
            $images = $this->requestData['image'];
            unset($this->requestData['recipe_category_id']);
            unset($this->requestData['image']);
            $recipe = recipe::create($this->requestData);
            $categoryData = [];

            if(count($categoryIds) > 1){
                for($i=0;$i<count($categoryIds);$i++) {
                    $categoryData[$i] = [
                        'recipe_id' => $recipe->id,
                        'category_id' => $categoryIds[$i]
                    ];
                }
            }
            $map = RecipesCategoriesMap::insert($categoryData);
            if($map){
                if(count($images) > 0) {
                    $imageData = [];
                    $manager = new ImageManager(array('driver' => 'gd'));
                    for($i=0;$i<count($images);$i++) {
                        if($i == 10) break;
                        $filename = bin2hex(random_bytes(50)) .'.'. $images[$i]->getClientOriginalExtension();
                        $imageData[$i] = [
                            'recipe_id' => $recipe->id,
                            'image' => $filename
                        ];
                        $manager->make($images[$i])->resize(1130,850)->save(public_path(config('custom.largeRecipeImageDir')).$filename);
                        $manager->make($images[$i])->resize(566,424)->save(public_path(config('custom.mediumRecipeImageDir')).$filename);
                        $manager->make($images[$i])->resize(196,148)->save(public_path(config('custom.thumbnailRecipeImageDir')).$filename);
                    }
                    RecipeImages::insert($imageData);
                }
            }

        },1);
        Session::flash('flash_message', 'recipe added!');
        return redirect('recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $recipe = recipe::where(['slug'=>$slug])->first();

        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     *
     * @return \Illuminate\View\View
     */
    public function edit($slug)
    {
        $recipe = Recipe::where(['slug'=>$slug])->first();
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $slug
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($slug, Request $request)
    {
        $this->requestData = $request->all();
        
        $recipe = recipe::where(['slug'=>$slug])->first();

        $img = true;
        if(count($request->image) == 0) {
            $img = false;
        }
        $validator = $this->validate($request,$this->rules($recipe, $img));

        if ($validator && $validator->fails()) {
            return redirect('recipes/'.$slug)->withErrors($validator);
        }


        DB::transaction(function () use($request, $recipe) {
            $categoryIds = $this->requestData['recipe_category_id'];
            if(isset($this->requestData['image'])) {
                $images = $this->requestData['image'];
            }
            unset($this->requestData['recipe_category_id']);
            unset($this->requestData['image']);
            $this->requestData['ingredients'] = trim(strip_tags($this->requestData['ingredients']));
            $this->requestData['instructions'] = trim(strip_tags($this->requestData['instructions']));
            $recipe->update($this->requestData);
            $categoryData = [];

            RecipesCategoriesMap::where('recipe_id',$recipe->id)->delete();

            if(count($categoryIds) > 0){
                for($i=0;$i<count($categoryIds);$i++) {
                    $categoryData[$i] = [
                        'recipe_id' => $recipe->id,
                        'category_id' => $categoryIds[$i]
                    ];
                }
            }
            $map = RecipesCategoriesMap::insert($categoryData);
            if($map){
                if(isset($images) && count($images) > 0) {
                    $imageData = [];
                    $manager = new ImageManager(array('driver' => 'gd'));
                    for($i=0;$i<count($images);$i++) {
                        if($i == 10) break;
                        $filename = bin2hex(random_bytes(50)) .'.'. $images[$i]->getClientOriginalExtension();
                        $imageData[$i] = [
                            'recipe_id' => $recipe->id,
                            'image' => $filename
                        ];
                        $manager->make($images[$i])->resize(1130,850)->save(public_path(config('custom.largeRecipeImageDir')).$filename);
                        $manager->make($images[$i])->resize(566,424)->save(public_path(config('custom.mediumRecipeImageDir')).$filename);
                        $manager->make($images[$i])->resize(196,148)->save(public_path(config('custom.thumbnailRecipeImageDir')).$filename);
                    }
                    RecipeImages::insert($imageData);
                }
            }

        },2);

        Session::flash('flash_message', 'recipe updated!');

        return redirect('recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($slug)
    {
        DB::transaction(function () use($slug) {
            $recipe = recipe::where('slug', $slug)->first();
            if($recipe->id){
                $recipe->delete();
                RecipesCategoriesMap::where('recipe_id',$recipe->id)->delete();
                $images = $recipe->recipe_images->pluck('image')->toArray();
                if(count($images) > 0) {
                    $path1 = public_path(config('custom.largeRecipeImageDir'));
                    $path2 = public_path(config('custom.mediumRecipeImageDir'));
                    $path3 = public_path(config('custom.thumbnailRecipeImageDir'));
                    for($i=0;$i<count($images); $i++){
                        $path1 .= $images[$i];
                        $path2 .= $images[$i];
                        $path3 .= $images[$i];
                        if (file_exists($path1)) {
                            @chown($path1,0777);
                            @unlink($path1);
                        }
                        if (file_exists($path2)) {
                            @chown($path2,0777);
                            @unlink($path2);
                        }
                        if (file_exists($path3)) {
                            @chown($path3,0777);
                            @unlink($path3);
                        }
                    }
                }
                RecipeImages::where('recipe_id',$recipe->id)->delete();
            }
        });

        Session::flash('flash_message', 'recipe deleted!');

        return redirect('recipes');
    }

    /**
     * @param $request
     * @param bool $img
     * @return array
     */
    public function rules($request, $img=true){
        $rule = [
            'title' => "required|string|unique:recipes,title,$request->id|max:255",
            'slug' => "required|unique:recipes,slug,$request->id|max:255",
            'instructions' => "required",
            'ingredients' => "required",
            'preparation_time' => "required|integer",
            'cooking_time' => "required|integer",
            'serving_people' => "required|integer",
            'video_url' => 'string|nullable',
            'visibility_id' => 'required|integer',
        ];
        if($img) {
            $photos = count($request->image);
            foreach(range(0, $photos) as $index) {
                $rule['photos.'.$index] = "image|mimes:png,jpg,jpeg|dimensions:min_width=500,min_height=500|max:5120";
            }
        }
        return $rule;
    }

    public function deleteImage($id){
        if(isset($id) && $id > 0) {
            $image = RecipeImages::where('id', $id)->first();
            if ($image->id) {
                RecipeImages::where('id', $id)->delete();
                $path1 = public_path(config('custom.deleteLargeRecipeImageDir')).$image->image;
                $path2 = public_path(config('custom.deleteMediumRecipeImageDir')).$image->image;
                $path3 = public_path(config('custom.deleteThumbnailRecipeImageDir')).$image->image;
                if (file_exists($path1)) {
                    @chown($path1, 0777);
                    @unlink($path1);
                }
                if (file_exists($path2)) {
                    @chown($path2, 0777);
                    @unlink($path2);
                }
                if (file_exists($path3)) {
                    @chown($path3, 0777);
                    @unlink($path3);
                }
                echo json_encode(['status' => 'OK']);
            } else {
                echo json_encode(['status' => 'ERROR']);
            }
        }
        exit;
    }
}
