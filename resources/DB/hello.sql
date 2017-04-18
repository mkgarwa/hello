-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2017 at 10:35 AM
-- Server version: 5.7.17
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hello`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currencyName` varchar(255) NOT NULL,
  `currencySymbol` varchar(55) DEFAULT NULL,
  `currencyId` varchar(55) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currencyName`, `currencySymbol`, `currencyId`, `created`) VALUES
('UAE dirham', 'UAE dirham', 'AED', '2017-04-18 07:58:13'),
('Afghan afghani', '؋', 'AFN', '2017-04-18 07:58:13'),
('Albanian lek', 'Lek', 'ALL', '2017-04-18 07:58:12'),
('Armenian dram', 'Armenian dram', 'AMD', '2017-04-18 07:58:12'),
('Netherlands Antillean gulden', 'ƒ', 'ANG', '2017-04-18 07:58:12'),
('Angolan kwanza', 'Angolan kwanza', 'AOA', '2017-04-18 07:58:13'),
('Argentine peso', '$', 'ARS', '2017-04-18 07:58:13'),
('Australian dollar', '$', 'AUD', '2017-04-18 07:58:12'),
('Aruban florin', 'ƒ', 'AWG', '2017-04-18 07:58:13'),
('Azerbaijani manat', 'ман', 'AZN', '2017-04-18 07:58:13'),
('Bosnia and Herzegovina konvertibilna marka', 'KM', 'BAM', '2017-04-18 07:58:12'),
('Barbadian dollar', '$', 'BBD', '2017-04-18 07:58:12'),
('Bangladeshi taka', 'Bangladeshi taka', 'BDT', '2017-04-18 07:58:13'),
('Bulgarian lev', 'лв', 'BGN', '2017-04-18 07:58:13'),
('Bahraini dinar', 'Bahraini dinar', 'BHD', '2017-04-18 07:58:13'),
('Burundi franc', 'Burundi franc', 'BIF', '2017-04-18 07:58:13'),
('Brunei dollar', '$', 'BND', '2017-04-18 07:58:12'),
('Bolivian boliviano', '$b', 'BOB', '2017-04-18 07:58:13'),
('Brazilian real', 'R$', 'BRL', '2017-04-18 07:58:13'),
('Bahamian dollar', '$', 'BSD', '2017-04-18 07:58:12'),
('Bitcoin', 'BTC', 'BTC', '2017-04-18 07:58:13'),
('Bhutanese ngultrum', 'Bhutanese ngultrum', 'BTN', '2017-04-18 07:58:12'),
('Botswana pula', 'P', 'BWP', '2017-04-18 07:58:13'),
('Belarusian ruble', 'p.', 'BYR', '2017-04-18 07:58:13'),
('Belize dollar', 'BZ$', 'BZD', '2017-04-18 07:58:13'),
('Canadian dollar', '$', 'CAD', '2017-04-18 07:58:13'),
('Congolese franc', 'Congolese franc', 'CDF', '2017-04-18 07:58:13'),
('Swiss franc', 'Fr.', 'CHF', '2017-04-18 07:58:13'),
('Chilean peso', '$', 'CLP', '2017-04-18 07:58:13'),
('Chinese renminbi', '¥', 'CNY', '2017-04-18 07:58:12'),
('Colombian peso', '$', 'COP', '2017-04-18 07:58:13'),
('Costa Rican colon', '₡', 'CRC', '2017-04-18 07:58:12'),
('Cuban peso', '$', 'CUP', '2017-04-18 07:58:12'),
('Cape Verdean escudo', 'Cape Verdean escudo', 'CVE', '2017-04-18 07:58:12'),
('Czech koruna', 'Kč', 'CZK', '2017-04-18 07:58:12'),
('Djiboutian franc', 'Djiboutian franc', 'DJF', '2017-04-18 07:58:13'),
('Danish krone', 'kr', 'DKK', '2017-04-18 07:58:13'),
('Dominican peso', 'RD$', 'DOP', '2017-04-18 07:58:13'),
('Algerian dinar', 'Algerian dinar', 'DZD', '2017-04-18 07:58:13'),
('Egyptian pound', '£', 'EGP', '2017-04-18 07:58:13'),
('Eritrean nakfa', 'Eritrean nakfa', 'ERN', '2017-04-18 07:58:12'),
('Ethiopian birr', 'Ethiopian birr', 'ETB', '2017-04-18 07:58:13'),
('European Euro', '€', 'EUR', '2017-04-18 07:58:12'),
('Fijian dollar', '$', 'FJD', '2017-04-18 07:58:13'),
('Falkland Islands pound', '£', 'FKP', '2017-04-18 07:58:12'),
('British pound', '£', 'GBP', '2017-04-18 07:58:13'),
('Georgian lari', 'Georgian lari', 'GEL', '2017-04-18 07:58:12'),
('Ghanaian cedi', 'Ghanaian cedi', 'GHS', '2017-04-18 07:58:13'),
('Gibraltar pound', '£', 'GIP', '2017-04-18 07:58:12'),
('Gambian dalasi', 'Gambian dalasi', 'GMD', '2017-04-18 07:58:13'),
('Guinean franc', 'Guinean franc', 'GNF', '2017-04-18 07:58:13'),
('Guatemalan quetzal', 'Q', 'GTQ', '2017-04-18 07:58:13'),
('Guyanese dollar', '$', 'GYD', '2017-04-18 07:58:13'),
('Hong Kong dollar', '$', 'HKD', '2017-04-18 07:58:13'),
('Honduran lempira', 'L', 'HNL', '2017-04-18 07:58:13'),
('Croatian kuna', 'kn', 'HRK', '2017-04-18 07:58:13'),
('Haitian gourde', 'Haitian gourde', 'HTG', '2017-04-18 07:58:12'),
('Hungarian forint', 'Ft', 'HUF', '2017-04-18 07:58:12'),
('Indonesian rupiah', 'Rp', 'IDR', '2017-04-18 07:58:13'),
('Israeli new sheqel', '₪', 'ILS', '2017-04-18 07:58:13'),
('Indian rupee', '₹', 'INR', '2017-04-18 07:58:12'),
('Iraqi dinar', 'Iraqi dinar', 'IQD', '2017-04-18 07:58:13'),
('Iranian rial', '﷼', 'IRR', '2017-04-18 07:58:12'),
('Icelandic króna', 'kr', 'ISK', '2017-04-18 07:58:13'),
('Jamaican dollar', 'J$', 'JMD', '2017-04-18 07:58:12'),
('Jordanian dinar', 'Jordanian dinar', 'JOD', '2017-04-18 07:58:12'),
('Japanese yen', '¥', 'JPY', '2017-04-18 07:58:13'),
('Kenyan shilling', 'KSh', 'KES', '2017-04-18 07:58:13'),
('Kyrgyzstani som', 'лв', 'KGS', '2017-04-18 07:58:13'),
('Cambodian riel', '៛', 'KHR', '2017-04-18 07:58:13'),
('Comorian franc', 'Comorian franc', 'KMF', '2017-04-18 07:58:13'),
('North Korean won', '₩', 'KPW', '2017-04-18 07:58:13'),
('South Korean won', '₩', 'KRW', '2017-04-18 07:58:12'),
('Kuwaiti dinar', 'Kuwaiti dinar', 'KWD', '2017-04-18 07:58:13'),
('Cayman Islands dollar', '$', 'KYD', '2017-04-18 07:58:13'),
('Kazakhstani tenge', 'лв', 'KZT', '2017-04-18 07:58:13'),
('Lao kip', '₭', 'LAK', '2017-04-18 07:58:12'),
('Lebanese lira', '£', 'LBP', '2017-04-18 07:58:12'),
('Sri Lankan rupee', '₨', 'LKR', '2017-04-18 07:58:13'),
('Liberian dollar', '$', 'LRD', '2017-04-18 07:58:13'),
('Lesotho loti', 'Lesotho loti', 'LSL', '2017-04-18 07:58:13'),
('Latvian lats', 'Ls', 'LVL', '2017-04-18 07:58:13'),
('Libyan dinar', 'Libyan dinar', 'LYD', '2017-04-18 07:58:12'),
('Moroccan dirham', 'Moroccan dirham', 'MAD', '2017-04-18 07:58:13'),
('Moldovan leu', 'Moldovan leu', 'MDL', '2017-04-18 07:58:13'),
('Malagasy ariary', 'Malagasy ariary', 'MGA', '2017-04-18 07:58:13'),
('Macedonian denar', 'ден', 'MKD', '2017-04-18 07:58:12'),
('Myanma kyat', 'Myanma kyat', 'MMK', '2017-04-18 07:58:13'),
('Mongolian tugrik', '₮', 'MNT', '2017-04-18 07:58:13'),
('Macanese pataca', 'Macanese pataca', 'MOP', '2017-04-18 07:58:13'),
('Mauritanian ouguiya', 'Mauritanian ouguiya', 'MRO', '2017-04-18 07:58:12'),
('Mauritian rupee', '₨', 'MUR', '2017-04-18 07:58:13'),
('Maldivian rufiyaa', 'Maldivian rufiyaa', 'MVR', '2017-04-18 07:58:13'),
('Malawian kwacha', 'Malawian kwacha', 'MWK', '2017-04-18 07:58:12'),
('Mexican peso', '$', 'MXN', '2017-04-18 07:58:13'),
('Malaysian ringgit', 'RM', 'MYR', '2017-04-18 07:58:13'),
('Mozambican metical', 'Mozambican metical', 'MZN', '2017-04-18 07:58:12'),
('Namibian dollar', '$', 'NAD', '2017-04-18 07:58:13'),
('Nigerian naira', '₦', 'NGN', '2017-04-18 07:58:13'),
('Nicaraguan cordoba', 'C$', 'NIO', '2017-04-18 07:58:13'),
('Norwegian krone', 'kr', 'NOK', '2017-04-18 07:58:13'),
('Nepalese rupee', '₨', 'NPR', '2017-04-18 07:58:13'),
('New Zealand dollar', '$', 'NZD', '2017-04-18 07:58:12'),
('Omani rial', '﷼', 'OMR', '2017-04-18 07:58:12'),
('Panamanian balboa', 'B/.', 'PAB', '2017-04-18 07:58:13'),
('Peruvian nuevo sol', 'S/.', 'PEN', '2017-04-18 07:58:12'),
('Papua New Guinean kina', 'Papua New Guinean kina', 'PGK', '2017-04-18 07:58:12'),
('Philippine peso', '₱', 'PHP', '2017-04-18 07:58:13'),
('Pakistani rupee', '₨', 'PKR', '2017-04-18 07:58:13'),
('Polish zloty', 'zł', 'PLN', '2017-04-18 07:58:13'),
('Paraguayan guarani', 'Gs', 'PYG', '2017-04-18 07:58:13'),
('Qatari riyal', '﷼', 'QAR', '2017-04-18 07:58:12'),
('Romanian leu', 'lei', 'RON', '2017-04-18 07:58:13'),
('Serbian dinar', 'Дин.', 'RSD', '2017-04-18 07:58:12'),
('Russian ruble', 'руб', 'RUB', '2017-04-18 07:58:13'),
('Rwandan franc', 'Rwandan franc', 'RWF', '2017-04-18 07:58:12'),
('Saudi riyal', '﷼', 'SAR', '2017-04-18 07:58:13'),
('Solomon Islands dollar', '$', 'SBD', '2017-04-18 07:58:13'),
('Seychellois rupee', '₨', 'SCR', '2017-04-18 07:58:13'),
('Sudanese pound', 'Sudanese pound', 'SDG', '2017-04-18 07:58:13'),
('Swedish krona', 'kr', 'SEK', '2017-04-18 07:58:12'),
('Singapore dollar', '$', 'SGD', '2017-04-18 07:58:13'),
('Saint Helena pound', '£', 'SHP', '2017-04-18 07:58:13'),
('Sierra Leonean leone', 'Sierra Leonean leone', 'SLL', '2017-04-18 07:58:12'),
('Somali shilling', 'S', 'SOS', '2017-04-18 07:58:12'),
('Surinamese dollar', '$', 'SRD', '2017-04-18 07:58:13'),
('Sao Tome and Principe dobra', 'Sao Tome and Principe dobra', 'STD', '2017-04-18 07:58:12'),
('Syrian pound', '£', 'SYP', '2017-04-18 07:58:13'),
('Swazi lilangeni', 'Swazi lilangeni', 'SZL', '2017-04-18 07:58:13'),
('Thai baht', '฿', 'THB', '2017-04-18 07:58:13'),
('Tajikistani somoni', 'Tajikistani somoni', 'TJS', '2017-04-18 07:58:13'),
('Turkmenistan manat', 'Turkmenistan manat', 'TMT', '2017-04-18 07:58:13'),
('Tunisian dinar', 'Tunisian dinar', 'TND', '2017-04-18 07:58:13'),
('Paanga', 'Paanga', 'TOP', '2017-04-18 07:58:13'),
('Turkish new lira', 'Turkish new lira', 'TRY', '2017-04-18 07:58:13'),
('Trinidad and Tobago dollar', 'TT$', 'TTD', '2017-04-18 07:58:13'),
('New Taiwan dollar', 'NT$', 'TWD', '2017-04-18 07:58:13'),
('Tanzanian shilling', 'TSh', 'TZS', '2017-04-18 07:58:12'),
('Ukrainian hryvnia', '₴', 'UAH', '2017-04-18 07:58:13'),
('Ugandan shilling', 'USh', 'UGX', '2017-04-18 07:58:13'),
('United States dollar', '$', 'USD', '2017-04-18 07:58:12'),
('Uruguayan peso', '$U', 'UYU', '2017-04-18 07:58:13'),
('Uzbekistani som', 'лв', 'UZS', '2017-04-18 07:58:13'),
('Venezuelan bolivar', 'Venezuelan bolivar', 'VEF', '2017-04-18 07:58:13'),
('Vietnamese dong', '₫', 'VND', '2017-04-18 07:58:13'),
('Vanuatu vatu', 'Vanuatu vatu', 'VUV', '2017-04-18 07:58:13'),
('Samoan tala', 'Samoan tala', 'WST', '2017-04-18 07:58:12'),
('Central African CFA franc', 'Central African CFA franc', 'XAF', '2017-04-18 07:58:12'),
('East Caribbean dollar', '$', 'XCD', '2017-04-18 07:58:12'),
('Special Drawing Rights', 'Special Drawing Rights', 'XDR', '2017-04-18 07:58:13'),
('West African CFA franc', 'West African CFA franc', 'XOF', '2017-04-18 07:58:12'),
('CFP franc', 'CFP franc', 'XPF', '2017-04-18 07:58:13'),
('Yemeni rial', '﷼', 'YER', '2017-04-18 07:58:13'),
('South African rand', 'R', 'ZAR', '2017-04-18 07:58:13'),
('Zambian kwacha', 'Zambian kwacha', 'ZMW', '2017-04-18 07:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created`) VALUES
(1, 'mkgarwa@gmail.com', '$2y$10$Xd4RW2xfKHZhnGapOPl9l.w8a7r06N6.Z1xgEjt9G.PPfdMwgGA9W', 'BG8ScXotu6QxKmEyDbWutAqyTPohKPBzbEXklXcU8TvgZdkDxcXK6fAhjcUY', '2017-04-18 08:34:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currencyId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
