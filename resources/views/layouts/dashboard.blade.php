<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>{{ config('app.name', 'REDCumin') }}</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="/vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="/vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="/vendor/switchery/switchery.min.css"/>
    <link rel="stylesheet" href="/vendor/toastr/toastr.min.css"/>
@yield('extra-styles')

<!-- App styles -->
    <link rel="stylesheet" href="/styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="/styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="/styles/stroke-icons/style.css"/>
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>

<!-- Wrapper-->
<div class="wrapper">

    <!-- Header-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <div id="mobile-menu">
                    <div class="left-nav-toggle">
                        <a href="{{url('/home')}}#">
                            <i class="stroke-hamburgermenu"></i>
                        </a>
                    </div>
                </div>
                <a class="navbar-brand" href="{{url('/home')}}">
                    {{Html::image(config('custom.imageDir')."logo.png",config('app.name'),['width'=>150])}}
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="left-nav-toggle">
                    <a href="">
                        <i class="stroke-hamburgermenu"></i>
                    </a>
                </div>
                <form class="navbar-form navbar-left">
                    <input type="text" class="form-control" placeholder="Search data for analysis" style="width: 175px">
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="http://www.redcumin.com" target="_blank">View Site</a>
                    </li>
                    <li class="dropdown profil-link">
                        <a href="login.html" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="true">
                            <span class="profile-address">{{session('user.email')}}</span>
                            {{Html::image(config('custom.imageDir')."profile.jpg",'Profile',['class'=>'img-circle'])}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#"><i class="fa fa-gears fa-fw"></i> Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                            class="fa fa-sign-out fa-fw"></i> Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End header-->

    <!-- Navigation-->
    <aside class="navigation">
        <nav>
            <ul class="nav luna-nav">
                <li class="nav-category">
                    Main
                </li>
                <li {{Request::is('*home') ? 'class=active' : ''}}>
                    <a href="{{URL::route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li>
                    <a href="#users" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-users fa-fw"></i> Users<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="users" class="nav nav-second collapse">
                        <li><a href="metrics.html"> Add User</a></li>
                        <li><a href="usage.html"> Manage Users</a></li>
                        <li><a href="usage.html"> User Roles</a></li>
                        <li><a href="usage.html"> User Status</a></li>
                    </ul>
                </li>
                <li {{Request::is('*recipes','recipes/*') ? 'class=active' : ''}}>
                    <a href="#recipes" data-toggle="collapse" aria-expanded="false" {{Request::is('*recipes','recipes/*') ? 'class=collapsed' : ''}}>
                        <i class="fa fa-cutlery fa-fw"></i> Recipes<span class="sub-nav-icon"> <i
                                    class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="recipes" class="nav nav-second collapse {{Request::is('*recipes','recipes/*') ? 'in' : ''}}">
                        <li><a href="{{url('/recipes/create')}}"> Add Recipe</a></li>
                        <li><a href="{{url('/recipes')}}"> Manage Recipes</a></li>
                    </ul>
                </li>

                <li {{Request::is('*recipe-categories','recipe-categories/*') ? 'class=active' : ''}}>
                    <a href="#recipe-category" data-toggle="collapse" aria-expanded="false" {{Request::is('*recipe-categories','recipe-categories/*') ? 'class=collapsed' : ''}}>
                        <i class="fa fa-tasks fa-fw"></i> Recipe Categories<span class="sub-nav-icon"> <i
                                    class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="recipe-category" class="nav nav-second collapse {{Request::is('*recipe-categories','recipe-categories/*') ? 'in' : ''}}">
                        <li><a href="{{url('/recipe-categories/create')}}"> Add Category</a></li>
                        <li><a href="{{url('/recipe-categories')}}"> Manage Categories</a></li>
                    </ul>
                </li>

                <li {{Request::is('*recipe-unit','recipe-unit/*') ? 'class=active' : ''}}>
                    <a href="#units" data-toggle="collapse" aria-expanded="false" {{Request::is('*recipe-unit','recipe-unit/*') ? 'class=collapsed' : ''}}>
                        <i class="fa fa-spoon fa-fw"></i> Recipe Units<span class="sub-nav-icon"> <i
                                    class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="units" class="nav nav-second collapse {{Request::is('*recipe-unit','recipe-unit/*') ? 'in' : ''}}">
                        <li><a href="{{url('/recipe-unit/create')}}"> Add Unit</a></li>
                        <li><a href="{{url('/recipe-unit')}}"> Manage Units</a></li>
                    </ul>
                </li>

                <li {{Request::is('*recipe-nutritional-element','recipe-nutritional-element/*') ? 'class=active' : ''}}>
                    <a href="#nutritional" data-toggle="collapse" aria-expanded="false" {{Request::is('*recipe-nutritional-element','recipe-nutritional-element/*') ? 'class=collapsed' : ''}}>
                        <i class="fa fa-leaf fa-fw"></i> Nutritional Elements
                        <span class="sub-nav-icon"><i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="nutritional" class="nav nav-second collapse {{Request::is('*recipe-nutritional-element','recipe-nutritional-element/*') ? 'in' : ''}}">
                        <li><a href="{{url('/recipe-nutritional-element/create')}}"> Add Nutr Elem</a></li>
                        <li><a href="{{url('/recipe-nutritional-element')}}"> Manage Nutr Elem</a></li>
                    </ul>
                </li>

                <li {{Request::is('*recipe-visibilities','recipe-visibilities/*') ? 'class=active' : ''}}>
                    <a href="#visibilities" data-toggle="collapse" aria-expanded="false" {{Request::is('*recipe-visibilities','recipe-visibilities/*') ? 'class=collapsed' : ''}}>
                        <i class="fa fa-eye fa-fw"></i> Visibilities<span class="sub-nav-icon"> <i
                                    class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="visibilities" class="nav nav-second collapse {{Request::is('*recipe-visibilities','recipe-visibilities/*') ? 'in' : ''}}">
                        <li><a href="{{url('/recipe-visibilities/create')}}"> Add Visibilities</a></li>
                        <li><a href="{{url('/recipe-visibilities')}}"> Manage Visibilities</a></li>
                    </ul>
                </li>

                <li>
                    <a href="index.html"><i class="fa fa-commenting fa-fw"></i> Comments</a>
                </li>

                <li>
                    <a href="#cms" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-copy fa-fw"></i> CMS<span class="sub-nav-icon"> <i
                                    class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="cms" class="nav nav-second collapse">
                        <li><a href="metrics.html"> Add a Page</a></li>
                        <li><a href="usage.html"> Manage Pages</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- End navigation-->


    <!-- Main content-->
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    <!-- End main content-->

</div>
<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="/vendor/pacejs/pace.min.js"></script>
<script src="/vendor/jquery/dist/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/switchery/switchery.min.js"></script>
<script src="/vendor/toastr/toastr.min.js"></script>
<script type="text/javascript" src="/vendor/apprise/apprise.min.js"></script>
@yield('extra-scripts')
<!-- App scripts -->
<script src="/scripts/luna.js"></script>
<script>
    $(document).ready(function () {
        // Run toastr notification with Welcome message
        @if(session('flash_message'))
        toastr.options = {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "progressBar": true,
            "showEasing": "swing",
            "timeOut": "1000"
        };
        toastr.success("<strong>{{session('flash_message')}}</strong>");
        @endif

        $('.js-switch').each(function(){
            new Switchery(document.getElementById($(this).attr('id')), { color: '#f6a821', size: 'small'});
        })
        var select_all = document.getElementById("selectAll"); //select all checkbox
        var checkboxes = document.getElementsByClassName("inner"); //checkbox i
        if(select_all) {
            select_all.addEventListener("change", function (e) {
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = select_all.checked;
                }
            });
        }
    });
    @if(!session('user'))
        document.getElementById('logout-form').submit()
    @endif
</script>

@yield('extra-js')


</body>

</html>