-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 09:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `city`, `street`, `building_no`, `phone`) VALUES
(19, 1, 'Zarqa', 'Al Thawra Al Arabia Al Quobra', '585', '0786730634'),
(33, 7, 'amman', 'amman', '2', '0789546982');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `confirm_password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'sahar', 'sahar.yous.zahran@gmail.com', '$2y$10$XqwTM.P5JONiTA6azuOTqerj4gjzNE1RxCu80hYUv/FnGrmTfOnwG', '$2y$10$XqwTM.P5JONiTA6azuOTqerj4gjzNE1RxCu80hYUv/FnGrmTfOnwG', '0786730634', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `category_name`, `category_image`, `category_description`) VALUES
(1, '2022-03-15 11:44:33', '2022-03-15 11:44:33', 'Organic', '1647355473-organic_category.jfif', 'Organic Food for your health: Vegetables, Fruit, Meat, Chicken, fish, eggs, milk, honey, and nuts.'),
(2, '2022-03-15 11:45:37', '2022-03-15 11:45:37', 'Seeds', '1647355537-seeds_category.jfif', 'Great Collection of Vegetables, Fruits, Flowers, and Herbs seeds'),
(3, '2022-03-15 11:46:04', '2022-03-15 11:46:04', 'Plants', '1647355564-plants_category.jpg', 'You will found all garden tools that you need to build your dream garden.'),
(4, '2022-03-15 11:47:34', '2022-03-15 11:47:34', 'Indoor Plants', '1647355654-indoor_category.jpg', 'Great Collection of indoor plants to make your office or house more beautiful.'),
(5, '2022-03-15 11:48:53', '2022-03-15 11:48:53', 'Garden Tools', '1647355733-supplies_category.jpg', 'You will found all garden tools that you need to build your dream garden.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `comment_text`, `product_id`, `user_id`) VALUES
(1, '2022-03-24 11:22:02', '2022-03-24 11:22:02', 'I love this vegetable', 27, 1),
(2, '2022-03-24 13:40:35', '2022-03-24 13:40:35', 'Good Quality!', 27, 1),
(3, '2022-03-26 01:56:14', '2022-03-26 01:56:14', 'Good quality product', 28, 7);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `email`, `message`) VALUES
(19, '2022-03-22 08:28:25', '2022-03-22 08:28:25', 'noor@gmail.com', '19999999999992'),
(20, '2022-03-26 14:59:18', '2022-03-26 14:59:18', 'sara@gmail.com', 'rrrrrrrrrrrr');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_23_114922_create_admins_table', 1),
(6, '2022_02_24_130256_create_sellers_table', 1),
(7, '2022_02_28_185451_create_categories_table', 1),
(8, '2022_03_04_094327_create_sub_categories_table', 1),
(9, '2022_03_05_141939_create_products_table', 1),
(10, '2022_03_05_145728_create_product_user_table', 1),
(11, '2022_03_05_152352_create_posts_table', 1),
(12, '2022_03_05_153434_create_addresses_table', 1),
(13, '2022_03_08_210746_create_sliders_table', 1),
(14, '2022_03_18_084744_create_orders_table', 2),
(15, '2022_03_18_143835_add_phone_to_addresses_table', 2),
(16, '2022_03_18_190348_add_order_id_to_product_user_table', 3),
(17, '2022_03_21_082654_create_contacts_table', 4),
(18, '2022_03_23_071249_add_season_to_products_table', 5),
(19, '2022_03_24_112747_create_comments_table', 6),
(20, '2022_03_25_074546_create_sliders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `user_id`) VALUES
(14, '2022-03-19 05:37:18', '2022-03-19 05:37:18', 1),
(15, '2022-03-19 05:41:30', '2022-03-19 05:41:30', 1),
(16, '2022-03-19 06:13:39', '2022-03-19 06:13:39', 1),
(17, '2022-03-19 06:16:26', '2022-03-19 06:16:26', 3),
(18, '2022-03-21 13:41:45', '2022-03-21 13:41:45', 1),
(19, '2022-03-22 03:25:48', '2022-03-22 03:25:48', 1),
(20, '2022-03-22 03:52:54', '2022-03-22 03:52:54', 1),
(21, '2022-03-22 04:17:49', '2022-03-22 04:17:49', 1),
(22, '2022-03-23 04:31:49', '2022-03-23 04:31:49', 1),
(23, '2022-03-24 14:04:46', '2022-03-24 14:04:46', 1),
(24, '2022-03-26 11:13:14', '2022-03-26 11:13:14', 1),
(25, '2022-03-26 11:47:00', '2022-03-26 11:47:00', 7),
(26, '2022-03-26 13:24:55', '2022-03-26 13:24:55', 7),
(27, '2022-03-26 13:37:33', '2022-03-26 13:37:33', 7),
(28, '2022-03-26 13:39:50', '2022-03-26 13:39:50', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `content`, `image`) VALUES
(1, '2022-03-19 15:51:56', '2022-03-19 15:51:56', 'Adequately Assessing the Health Benefits of Organic Food', 'Giving Compass\' Take:\r\n\r\n• It has been difficult to research the health benefits of organic food consumption. However, this recent study sheds light on how to improve the process of studying the effects of organic food on public health. \r\n\r\n• How can funders do more to expand research on organic food and nutrition? What makes this area of research significant now that climate change is a factor? \r\n\r\n• Read more of the research on the health benefits of organic food. \r\n\r\n“Organic” is more than just a passing fad. Organic food sales totaled a record US$45.2 billion in 2017, making it one of the fastest-growing segments of American agriculture. While a small number of studies have shown associations between organic food consumption and decreased incidence of disease, no studies to date have been designed to answer the question of whether organic food consumption causes an improvement in health.\r\n\r\nI’m an environmental health scientist who has spent over 20 years studying pesticide exposures in human populations. Last month, my research group published a small study that I believe suggests a path forward to answering the question of whether eating organic food actually improves health.\r\n\r\nWhat we don’t know\r\nAccording to the USDA, the organic label does not imply anything about health. In 2015, Miles McEvoy, then chief of the National Organic Program for USDA, refused to speculate about any health benefits of organic food, saying the question wasn’t “relevant” to the National Organic Program. Instead, the USDA’s definition of organic is intended to indicate production methods that “foster cycling of resources, promote ecological balance, and conserve biodiversity.”\r\n\r\nWhile some organic consumers may base their purchasing decisions on factors like resource cycling and biodiversity, most report choosing organic because they think it’s healthier.\r\n\r\nSixteen years ago, I was part of the first study to look at the potential for an organic diet to reduce pesticide exposure. This study focused on a group of pesticides called organophosphates, which have consistently been associated with negative effects on children’s brain development. We found that children who ate conventional diets had nine times higher exposure to these pesticides than children who ate organic diets.\r\n\r\nOur study got a lot of attention. But while our results were novel, they didn’t answer the big question. As I told The New York Times in 2003, “People want to know, what does this really mean in terms of the safety of my kid? But we don’t know. Nobody does.” Maybe not my most elegant quote, but it was true then, and it’s still true now.\r\n\r\nStudies only hint at potential health benefits\r\nSince 2003, several researchers have looked at whether a short-term switch from a conventional to an organic diet affects pesticide exposure. These studies have lasted one to two weeks and have repeatedly shown that “going organic” can quickly lead to dramatic reductions in exposure to several different classes of pesticides.\r\n\r\nStill, scientists can’t directly translate these lower exposures to meaningful conclusions about health. The dose makes the poison, and organic diet intervention studies to date have not looked at health outcomes. The same is true for the other purported benefits of organic food. Organic milk has higher levels of healthy omega fatty acids and organic crops have higher antioxidant activity than conventional crops. But are these differences substantial enough to meaningfully impact health? We don’t know. Nobody does.\r\n\r\nSome epidemiologic research has been directed at this question. Epidemiology is the study of the causes of health and disease in human populations, as opposed to in specific people. Most epidemiologic studies are observational, meaning that researchers look at a group of people with a certain characteristic or behavior, and compare their health to that of a group without that characteristic or behavior. In the case of organic food, that means comparing the health of people who choose to eat organic to those who do not.\r\n\r\nSeveral observational studies have shown that people who eat organic food are healthier than those who eat conventional diets. A recent French study followed 70,000 adults for five years and found that those who frequently ate organic developed 25% fewer cancers than those who never ate organic. Other observational studies have shown organic food consumption to be associated with lower risk of diabetes, metabolic syndrome, pre-eclampsia and genital birth defects.\r\n\r\nThe problem with drawing firm conclusions from these studies is something epidemiologists call “uncontrolled confounding.” This is the idea that there may be differences between groups that researchers cannot account for. In this case, people who eat organic food are more highly educated, less likely to be overweight or obese, and eat overall healthier diets than conventional consumers. While good observational studies take into account things like education and diet quality, there remains the possibility that some other uncaptured difference between the two groups – beyond the decision to consume organic food – may be responsible for any health differences observed.', '1647715916-Adequately-Assessing-the-Health-Benefits-of-Organic-Food.jpg'),
(5, '2022-03-19 16:03:40', '2022-03-19 16:03:40', 'How to Grow Plants From Seeds Step by Step', 'Here are the basics in 10 steps.\r\n\r\n1. Choose a container.\r\n\r\nSeed-starting containers should be clean, measure at least 2-3 inches deep and have drainage holes. They can be plastic pots, cell packs, peat pots, plastic flats, yogurt cups, even eggshells.  As long as they are clean (soak in a 9 parts water to one part household bleach for 10 minutes), the options are endless. You can also buy seed-starting kits, but don\'t invest a lot of money until you\'re sure you\'ll be starting seeds every year. If you start seeds in very small containers or plastic flats, you\'ll need to transplant seedlings into slightly larger pots once they have their first set of true leaves. Keep in mind that flats and pots take up room, so make sure you have enough sunny space for all the seedlings you start.\r\n\r\n2. Start with quality soil.\r\nSow seeds in sterile, seed-starting mix or potting soil available in nurseries and garden centers. Don\'t use garden soil, it’s too heavy, contains weeds seeds, and possibly, disease organisms. Wet the soil with warm water before filling seed-starting containers.\r\n\r\n3. Plant at the proper depth.\r\nYou’ll find the proper planting depth on the seed packet. The general rule of thumb is to cover seeds with soil equal to three times their thickness – but be sure to read the seed packet planting instructions carefully. Some seeds, including certain lettuces and snapdragons, need light to germinate and should rest on the soil surface but still be in good contact with moist soil. Gentle tamping after sowing will help.  After planting your seeds, use a spray bottle to wet the soil again.\r\n\r\n4. Water wisely.\r\nAlways use room-temperature water. Let chlorinated water sit overnight so chlorine can dissipate or use distilled water. Avoid using softened water. It\'s important to keep soil consistently moist, but avoid overwatering, which promotes diseases, that can kill seedlings. Try not to splash water on leaves. An easy way to avoid this – as well as overwatering – is to dip base of your containers in water and allow the soil to absorb moisture from the bottom until moist. Some seed-starting kits supply a wicking mat that conducts water from a reservoir to dry soil. This may be the most goof-proof method of watering seedlings but you still have to be careful that the soil doesn’t stay too wet. Whatever you do, don\'t miss a watering and let seeds or seedlings dry out. It’s a death sentence.\r\n\r\n5. Maintain consistent moisture.\r\nPrior to germination, cover your container to help trap moisture inside. Seed-starting kits typically come with a plastic cover. You can also use a plastic bag, but it should be supported so it doesn’t lay flat on the soil. Remove covers as soon as seeds sprout. Once seedlings are growing, reduce watering so soil partially drys, but don’t let them wilt.\r\n\r\n6. Keep soil warm.\r\nSeeds need warm soil to germinate.  They germinate slower, or not at all, in soils that are too cool. Most seeds will germinate at around 78°F. Waterproof heating mats, designed specifically for germinating seeds, keep soil at a constant temperature. You can buy them in most nurseries and garden centers.  Or, you can place seed trays on top of a refrigerator or other warm appliance until seeds sprout. After germination, air temperature should be slightly below 70°F. Seedlings can withstand air temperature as low as 50°F as long as soil temperature remains 65-70°F.\r\n\r\n7. Fertilize.\r\nStart feeding your seedlings after they develop their second set of true leaves, applying a half-strength liquid fertilizer weekly.  Apply it gently so seedlings are not dislodged from the soil. After four weeks, apply full-strength liquid fertilizer every other week until transplanting.\r\n\r\n8. Give seedlings enough light.\r\nNot enough light leads to leggy, tall seedlings that will struggle once transplanted outdoors. In mild winter areas, you can grow stocky seedlings in a bright south-facing window. Farther north, even a south-facing window may not provide enough light, especially in the middle of winter. Ideally, seedlings need 14-16 hours of direct light per day for healthiest growth. If seedlings begin bending toward the window, that’s a sure sign they are not getting enough light. Simply turning the pots won’t be enough - you may need to supply artificial lighting.  Nurseries and mail order seed catalogs can provide lighting kits. Follow instructions carefully.\r\n\r\n9. Circulate the air.\r\nCirculating air helps prevents disease and encourages the development of strong stems. Run a gentle fan near seedlings to create air movement. Keep the fan a distance away from the seedlings to avoid blasting them directly.\r\n\r\n10. Harden off seedlings before transplanting outdoors.\r\nBefore moving seedlings outdoors, they need to be acclimatized to their new, harsher surroundings. This procedure is called \"hardening off.\" Click here to learn more.', '1647716620-10_Steps_to_Growing_Plants_From_Seed.jpg'),
(6, '2022-03-19 16:04:54', '2022-03-19 16:04:54', 'Saving Seeds', 'Obviously, when you save seeds, you save money: Every seed saved is one less seed or plant you have to buy in the future. But there is more to it than that. Saving seeds from the most productive vegetables or prettiest flowers can result in future plants that are better adapted to your garden\'s very specific growing conditions. You use mother nature’s process of natural selection to create locally-adapted plants with better yields or better bloom, and with each generation you save, you get better results.\r\n\r\n\r\nWhat seeds should you save?\r\n\r\nFirst off, start with plants that have easily harvested seeds like Lettuce, Beans, Peas, Morning Glories, Four-O\'Clocks, Scarlet Sage or Zinnias.\r\n\r\nMake sure you\'re saving seeds from open-pollinated varieties. Open-pollinated plants are relatively genetically stable, so seeds produce plants resembling their parent plants. Many heirloom vegetables and flowers are open pollinated. Open pollinated plants differ dramatically from F1 Hybrids, which you often see in many seed packets and six-packs. (check labels to be sure). F1 Hybrids produce predictable plants from distinctly different parents. After the first generation, seeds grown from F1 hybrids are totally unpredictable and you are never sure what you’ll get.\r\n \r\n\r\nOther tips for saving seeds:\r\n\r\nMany plants readily cross-pollinate with other plants of the same type. This list includes Corn, Gourds, Cucumber, Pumpkin and Melon. For these plants, grow only one variety each season so you don’t comprimise the genetics of the seed you’ll collect.\r\nBiennial plants need two growing seasons to produce seeds. In mild winter areas, fall-planted biennials bear seed the following spring. This list includes Beets, Chard, Cabbage, Carrots and Parsley.\r\nIf you save seeds, it often means that you\'ll have less vegetables to eat and fewer flowers to pick, because you\'ll be letting plants produce seeds instead. With fruiting vegetables like tomatoes or peppers, you won’t have to sacrifice plants to collect seeds; only a few fruit. With leafy vegetables, you have to let the whole plant go to seed, so you lose that harvest.\r\nTiming\r\n\r\nBefore you start collecting seeds, allow them to completely mature on the plants. Look for seeds with a hard seed coat and darkened color. Check plants daily for maturity.\r\n\r\nFor seeds that mature inside a pod, like those of Cardinal Climber or Beans, let seedpods dry on plants and harvest individual pods as they dry. If freezing weather or heavy rains are forecast as seedpods are ripening, harvest them all and dry indoors.\r\n\r\nHarvesting\r\n\r\nIf possible, its easiest to collect entire seed heads or pods rather than individual seeds. You can do that with Zinnias, Scarlet Sage, Lettuce and Broccoli. Plants like Four-O\'Clocks, Dill or Onions produce seeds that are easily scattered or small and difficult to collect one by one. With these, you can tie a paper bag over the seed heads and shack the plant to release the seeds or allow them to drop into the bag naturally.\r\n\r\nCleaning\r\n\r\nSeparate seeds from the flower head, husk or pod. Often you can simply do this by rolling the seed head between your hands over a piece of paper. For smaller seeds, blow chaff away with a three-speed fan.\r\n\r\nYou could also build a hand screen by attaching metal screen to a wooden frame. Choose a wire gauge of the screen that will allow seeds to pass through without the chaff.  Crumble the dry seed heads over the screen, and then shake the screen over a large piece of paper and collect the seeds.\r\n\r\nDrying\r\n\r\nDry seeds by spreading them on newspaper, paper plates or a screen in a cool, dry place. Do this as soon as possible to preserve viability and future germination. Drying times will vary depending on humidity, but most seeds will dry in 5-7 days.\r\n \r\n\r\nHow do you tell if seeds are dry enough?\r\n\r\nThey should be brittle and hard.\r\nThe seeds won’t bend when you try to break them in half – they snap in two instead.\r\nBeans are hard when dry; they won’t give or be soft when you try to bite them.\r\nStoring\r\n\r\nConditions should be cool and dry. Ideal storage conditions are less than 50ºF with relative humidity less than 50º%.  Too warm and humid and the seeds may germinate prematurely. Store in paper envelopes, glass jars or clear plastic bags. Glass is the best choice, since it excludes moisture and you can easily see the seeds. To help absorb moisture and reduce humidity, some gardeners add silica gel to seed storage containers. If you try this with sealed jars, remove the gel after one week.\r\n\r\nSeed longevity doubles with every 10 degrees that storage temperature decreases. If you have valuable  seeds, store them in glass canning jars and put them in the freezer. Allow the jars to reach room temperature before opening. This will help prevent condensation from forming on seeds.', '1647716694-Saving_Seeds.jpg'),
(7, '2022-03-19 16:05:44', '2022-03-19 16:05:44', 'Common Seed-Starting Mistakes', 'Mistake #1: Getting Hypnotized By Catalogs\r\n\r\nIt\'s tough to resist the glorious pictures and glowing words in mail order seed catalogs and on websites, especially if the ground is covered with snow outside. Even many an experienced gardener has succumb to the allure of the beautiful pages. So, try to avoid the first mistake most seed starters make: ordering way too many seeds. Be practical and exercise self-restraint. If you\'re a first-timer, don\'t start with too many different types of seeds. Stick with the ones that are easy to germinate and grow, such as Tomato, Basil, Zinnia, Sunflower or Cosmos.\r\n\r\nMistake #2: Starting Too Early\r\n\r\nIn many cold-winter regions, sowing seeds gives you a chance to get your hands dirty when it\'s too cold to plant or garden outdoors. So, hold you horses and avoid failure - don\'t start your seeds too soon. Most plants are ready to transplant outside in 4-8 weeks after germination. Find out more about perfect timing for seeds.\r\n\r\nMistake #3: Planting Seeds Too Deep\r\n\r\nCheck seed packets carefully, for specific information about how deep to plant seeds. A general rule of thumb is to plant seeds at a depth equal to two or three times their width, but it\'s better to plant seeds too shallow than too deep. Seeds of some plants, such as certain Lettuces or Snapdragon, need light to trigger germination and shouldn\'t be covered at all. Such seeds, however, should be lightly tamped after sowing so they have good contact with the soil.\r\n\r\nMistake #4: Not Labeling Properly\r\n\r\nMake labels before you sow any seeds.  Nurseries, mail order catalogs and garden websites sell a variety of types from wooden to metal. Use a water proof pen. Place the labels in the appropriate pot, flat or six-pack immediately after sowing, making sure there will be no confusion.  Otherwise, it will be tough to tell the different seedlings apart and what they are supposed to mature into. You should also include sowing dates on your labels so you know when to expect germination.\r\n\r\nMistake #5: Soil Is Too Cool\r\n\r\nSeed packets specify the soil temperature seeds require for the highest percentage of germination. Remember, that’s soil temperature, not air temperature. Most seed germinate at around 78ºF but it can vary. You can increase your chances of success if you use a waterproof root-zone heating mat. After germination, aim to keep soil temperature in the 65-70ºF range.\r\n\r\nMistake #6: Not enough Light\r\n\r\nIn mild winter regions of the country, there\'s enough ambient light in a south-facing window in winter to grow stocky seedlings. In more northern areas, you\'ll probably need supplemental lights. You can buy or build light stands to start seedlings.  Nurseries, mail order catalogs and gardening websites offer a wide variety for purchase. For stocky, healthy seedlings, provide 14-16 hours of light per day. Suspend the lights about 2-3 inches above seedlings or follow the directions on purchased kits. Learn more about lights, including what type to use. \r\n\r\nMistake #7: Watering Woes\r\n\r\nKeep the soil damp but not too wet.  One helpful option is to cover the container with clear plastic or other material to keep soil moist until seeds germinate. Once seeds sprout, don\'t miss a watering or your seedlings will almost surely die.  Unlike established plants, seedlings don\'t have an extensive root system to rely on for water. At the same time, it\'s important not to overwater and let seedlings sit in soggy soil, which encourages disease. Find out more about covering seed-starting containers and watering.  \r\n\r\nMistake #8: Not Enough Pampering\r\n\r\nNewly germinated seedlings are delicate creatures. They need to be checked daily and given lots of tender loving care, especially early on. If you can\'t monitor seedlings daily, checking on germination, soil moisture, temperature, and lights, you\'ll reduce your chances of success significantly. It’s a hard lesson to learn that seedlings don\'t survive neglect.\r\n\r\nMore About Starting Seeds Learn more good reasons why you should consider starting your own seeds. \r\n\r\nThen review our  10 steps for seedling success. \r\n\r\nSeedlings must be prepared for outdoor conditions before they are transplanted into the garden. Learn how to strengthen seedlings before planting.', '1647716744-Common_Seed-Starting_Mistakes.jpg'),
(8, '2022-03-19 16:12:49', '2022-03-19 16:12:49', 'How to grow potatoes', 'From earthy new potatoes and bite-sized salad varieties, to floury bakers and roasters, the humble potato remains the nation’s favourite vegetable. If you’re a potato aficionado, there’s a huge number of exciting potato varieties you can grow that you’ll never see in the shops. You don’t even need a garden to grow them – many grow very happily in large bags or pots on a balcony or patio.\r\n\r\nThere are three main types of potato to grow, named according to when you plant and harvest them.\r\n\r\nFirst early or ‘new’ potatoes are the earliest to crop, in June and July. They don’t store for long so are best eaten fresh.\r\nHow to grow potatoes at home\r\nPotatoes are easy to grow – one seed potato will produce many potatoes to harvest. Prepare the soil by digging and removing weeds, and then dig straight trenches 12cm deep and 60cm apart. In spring, plant seed potatoes 30cm apart and cover them with soil to fill the trench. When the shoots reach 20cm tall, use a rake, hoe or spade to mound soil up around the bases of the shoots, covering the stems half way. This is called earthing up. You can also grow first early and second early potatoes in a large bag on a patio or balcony, covering them with compost as they grow.\r\n\r\nMore expert advice on growing potatoes:\r\n\r\nPotato types explained\r\nGrow great jacket potatoes\r\n10 best salad potatoes to grow\r\nMaincrop potatoes to grow\r\nHow to grow potatoes in a bag\r\n- Growing potatoes: jump links\r\n- Planting potatoes\r\n- Caring for potatoes\r\n- Growing potatoes: \r\n- problem-solving\r\n- Harvesting potatoes\r\n- Eating and storing potatoes\r\n- Where to buy potatoes\r\n- Potato varieties to grow', '1647717169-potato.png'),
(9, '2022-03-19 16:14:30', '2022-03-19 16:14:30', 'ENJOY LIFE WITH YOUR OWN FLOWER GARDEN – BEAUTIFUL, EASY!', 'In our hurried, stressful world, we’re often looking for ways to relax and enjoy the things around us. Your own flower garden is a terrific way to do that. As the saying goes, you can improve life simply by stopping to smell the roses.\r\n\r\nAnd those roses smell even better if you grew them yourself!\r\n\r\nYou’ve probably noticed that some people just have a knack for growing nice, healthy flowers while the rest of us seem to mostly grow weeds. Often the difference between a lush, wonderful flower garden and a gnarly weed bed are a few simple factors. Do the right things and you’ll find growing beautiful flowers is easier than you imagined.\r\n\r\n1. Plant flowers that do well in your area. Temperature, rainfall, and more that determine your local climate will favor some flowers, while making others almost impossible to grow. For example, if you endure the super hot summers of Texas or Arizona, you will have to grow different kinds of flowers than people in cooler New York or Utah.\r\n\r\nTo some degree, you can check the backs of seed packets to know which plants grow in your area and what time of year to plant. Gardening guides can also help. Your best bet is often to talk to someone who knows plants. Usually you can find these people working in smaller stores, greenhouses, and nurseries. It’s usually not hard to identify who these plant experts are, as just about everybody in town knows about them and repeats their advice.\r\n\r\n2. Pay attention to the quality of the soil you’re planting in. Often adding richer potting soil or light fertilizer can give your flowers a much better chance of turning out healthy. The right soil is one of the major reasons why some people grow terrific flowers while others can’t get anything to sprout.\r\n\r\n3. Buy good quality seeds. Before we started our seed business we were surprised by how expensive flower seeds were, and by how FEW seeds were included in each packet. You could spend some pretty substantial cash buying seeds for a modest garden.\r\n\r\nIf you’re looking to buy a new brand or type of seed that you haven’t purchased in the past, I would recommend inspecting a pack before you fill your shopping cart with them. That way you’ll know what you’re getting.\r\n\r\nAbove all, be patient. Nature is an amazing system of interrelated factors. Sometimes we can understand and control all the factors, other times we just have to let nature take her course. Gardeners who understand the process of trial and error and remain persistent usually get the best results.\r\n\r\nAlso, be sure to include your family in your gardening activities. Planning a flower garden, planting it, then caring for the growing flowers can be a fulfilling, inspirational, and uniting experience for everyone in the family.', '1647717270-istockphoto-154046398-170667a.jpg'),
(10, '2022-03-22 04:26:04', '2022-03-22 04:26:04', 'Know before you grow', 'Here Are Some Important Things to Know Before You Grow\r\n\r\nGrowing cannabis at home can be an incredibly rewarding experience for cultivators of all ability levels. That said, it also requires a certain amount of horticultural knowledge and specialized skills. Before buying seeds and establishing that very first garden or grow room, read on to find out about some important things everyone should know before attempting to grow cannabis for the first time.\r\n\r\nQuality Bud Starts With Quality Seeds\r\n\r\nThe first thing people should know is that not all cannabis seeds are created equal. It’s best to start growing some cannabis only after researching strains, seed types, and, most importantly, reputable seed banks. Not all seeds will grow into plants that are true-to-type, nor will poor quality seeds always germinate and grow into healthy plants, which means those seeds leftover in the bottom of the bag should be left where they’re found, not planted in a garden.\r\n\r\nCannabis Plants Have Different Requirements at Each Life Stage\r\n\r\nDepending on who they ask, growers will find that cannabis plants can be described as having anywhere from three to six distinct life stages. During each stage, the plants have different growing requirements. Novice growers should anticipate watching their plants go through these stages and plan to make alterations to their strategies accordingly:\r\n\r\nGermination\r\nSeedling\r\n\r\nVegetative\r\n\r\nPre-flower\r\n\r\nFlowering\r\n\r\nHarvest\r\n\r\nCannabis Plants Are Dioecious\r\n\r\nCannabis plants are dioecious, meaning that any regular seed can grow into either a male hemp plant or a female marijuana plant. Since only marijuana plants produce THC, growers usually remove male plants from their crops during the pre-flowering stage before they can produce pollen and induce seed production in the female plants. Novice growers who don’t know how to sex marijuana plants can also purchase feminized seeds, which are guaranteed to grow into marijuana instead of hemp plants.\r\n\r\nIndoor Growing Requires a Lot of Equipment\r\n\r\nThose who are planning to grow cannabis for the first time will need to choose between cultivating plants outdoors or growing them inside. While indoor grow rooms provide more control over every aspect of plant care, they’re also much more expensive to set up.\r\n\r\nPlants grown outside will have access to natural sunlight, rain, and even some nutrients from the soil, while plants grown indoors will need to be provided with all of these things by growers, themselves. As a result, it takes a larger initial investment to start a grow room compared to an outdoor garden. The trade-off is that cannabis grown indoors is usually of a higher quality and can be grown year-round to create an almost continuous crop cycle.\r\n\r\nChoosing The Right Strain Is Key\r\n\r\nMost cannabis enthusiasts have at least a few favorite strains. While it’s perfectly fine to take personal preference into account when choosing seeds, it’s also important to consider the growing environment. Some strains do better outdoors where they have more room to spread out, while others have very specific nutrient, water, and light requirements that are best met inside. For outdoor growers, it’s also important to choose a strain that is appropriate for the plant hardiness zone.\r\n\r\nIt Takes Time to Learn the Basics\r\n\r\nLearning how to grow cannabis plants at home will take not just academic research but also some trial and error. Don’t expect to pull down the perfect crop in year one. Instead, read up as much as possible, follow the experts’ advice, and take note of anything that goes wrong. This year’s mistakes are actually just lessons to be learned before planting next year’s crop.', '1647933964-header_knowbeforeyougrow_916x356_2.png'),
(11, '2022-03-22 04:29:12', '2022-03-22 04:29:12', 'Tips and Planting Guides', 'When to plant your garden is trickier to answer than a simple date and time. If you include growing indoors to start plants for transfer into the garden, you may be planting year-round. If you don’t grow your own seedlings, you will have a few months off in winter. Let’s go through the year and when to plant.\r\n\r\n1. Determine your grow zone.\r\nThe first bit of essential information you will need to know is what grow zone you live in. When learning how to start seeds indoors, a good starting point is the USDA Hardiness Zone map. This map divides the USA into 11 grow zones. Some maps have subdivided the zones further into A and B. Each zone is determined by compiling the data of winter temperatures over a number of years, and the zones are then divided from their neighboring zone by 10 degrees. Try our growing zone tool to make this process even easier-- just enter your zip code and discover your zone!\r\n\r\nThe original maps did not take into consideration other factors such as elevation and proximity to large bodies of water like the Great Lakes. We have also seen significant fluctuations in our global weather, which are not reflected on the current map. So, consider the map a starting point and be ready to modify your growing schedule as necessary. Talk to gardeners in your area and find out when they usually start planting outdoors.\r\n\r\n2. Plan your garden.\r\nDecide what you want to grow—and be honest with yourself! Don’t grow vegetables that you won’t eat. It is a waste of time, energy and space. Use that same space for the vegetables that you, your family or your friends will eat, either fresh or preserved. Then, make sure you don’t choose plants that can’t complete growing and producing in your grow zone. If you live in the far north, your growing season is too short for some southern favorites that require a long and warm growing season.\r\nThat being said, gardening should be fun, and part of the fun is experimenting. Try a new-to-you vegetable and flower each year. Learn about the plant and how to best grow it. Start looking at recipes that use this new vegetable so you are ready when it is. Keeping a garden journal can be a great way to track your successes (and failures!). It doesn’t have to be fancy, but just keep track of what the year brings. Start by listing the vegetables you choose to plant. Make notes of what worked well and what didn’t as you go. If you were impressed with a certain plant, make a note. Do the same if you are disappointed. Note what pests you encounter and how you dealt with them. Anything that will help you in succeeding years is worth noting.\r\n\r\n3. Buy your seeds.\r\nSeed companies, including Park Seed, release their current year seed catalog at the beginning of the new year. They are available both in hard copy, which will be delivered by mail, or in a digital version.\r\n\r\nOrder your seeds early! You may be thinking that you have plenty of time, especially if you don’t intend to start your own plants. However, one of the best advantages of ordering from a seed company is the much greater selection. Take the tomato for an example. There are tomatoes with a sweeter flavor for eating fresh. There are tomatoes that produce uniform size tomatoes great for canning them whole. Maybe you want the earliest maturing tomato. How about a tomato that grows so large that a single slice will be hanging over the edge of your sandwich? Take a trip through time and use heirloom tomato seeds so you can taste the tomato your grandparents would have been eating. What you don’t want to happen is they run out of the seed you want. So, order your seeds as early as possible.\r\n\r\n4. Check your seed packets.\r\nThere is a wealth of information on the back of your seed packet. It will tell you how long the plant will take to grow from seed to table. This information will tell you how soon before the last frost you need to plant the seeds indoors. Specialized information will also be on the package. There are some seeds that need light to germinate, so they need to just sit on top of the soil and not be covered. Some seeds need to be soaked or even scraped through the outer shell in order to grow. This is the type of information that can be found on the package so you have the best chance of growing success as possible.', '1647934152-planting_seeds_in_soil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `product_name`, `product_description`, `product_price`, `product_image`, `subcategory_id`, `store_id`, `season`) VALUES
(7, '2022-03-16 06:00:53', '2022-03-16 06:00:53', 'organic orange', 'Not only very flavorful, Organic Oranges are great treasures organically grown without synthetic pesticides, fertilizers, and preservatives.', 2.00, '1647421253-1_0002_valencia.jpg', 1, 1, 'no_season'),
(8, '2022-03-16 06:01:28', '2022-03-16 06:01:28', 'Organic Red Radish', 'Radishes are a good source of antioxidants like catechin, pyrogallol, vanillic acid, and other phenolic compounds. These root vegetables also have a good amount of vitamin C, which acts as an antioxidant to protect your cells from damage.', 0.50, '1647421288-redRadishes.jpg', 1, 1, 'no_season'),
(9, '2022-03-16 06:02:17', '2022-03-16 06:02:17', 'Organic Chicken', 'Organic chicken meat is a unique product with many useful properties. The consumption of this meat in your diet will have a number of positive effects on your body.', 3.00, '1647421337-mea_pid_3362151_j.jpg', 2, 1, 'no_season'),
(10, '2022-03-16 06:02:46', '2022-03-16 06:02:46', 'Organic Egg', 'Eggs contain a high amount of omega-3 fatty acids that are beneficial to heart health. Omega-3s help manage triglycerides and to also lower cholesterol. High or low triglycerides levels contribute to the onset of heart disease.', 2.00, '1647421366-free-range-eggs.jpeg', 3, 1, 'no_season'),
(11, '2022-03-16 06:03:29', '2022-03-16 06:03:29', 'organic spinach', 'Some of the powerful health benefits of spinach are that this vegetable helps stabilise your blood glucose levels, helps in reducing your risk of developing cancer, prevents you from cancer and is good for bone health.', 0.50, '1647421409-13-500x500.jpg', 1, 1, 'no_season'),
(12, '2022-03-16 06:04:41', '2022-03-16 06:04:41', 'Organic milk', 'organic milk provide 16 essential nutrients, including protein, calcium, phosphorus, vitamin A, vitamin B12 and vitamin D, making them highly nutritious. While both have similar nutrition profiles, some research studies suggest organic milk has higher fat', 1.50, '1647421481-d37b7448ba07b9067acb184b373ed7cc.jpg', 3, 1, 'no_season'),
(13, '2022-03-19 06:39:45', '2022-03-19 06:39:45', 'Tomato Seeds', 'Burpee Best 10 Packets of Non-GMO Planting Tomato Seeds for Garden Gifts', 0.50, '1647682785-tomato_seeds.jpg', 5, 3, 'Spring '),
(14, '2022-03-19 06:42:54', '2022-03-19 06:42:54', 'Mushroom', 'Back to the Roots Organic Mushroom Growing Kit, Harvest Gourmet Oyster Mushrooms In 10 days, Top Gardening Gift, Holiday Gift, & Unique Gift', 4.00, '1647682974-mashroom.jpg', 5, 3, 'Autumn'),
(18, '2022-03-24 04:46:08', '2022-03-24 04:46:08', 'Nargis (Narcissus)', 'Very large, silvery white flowers with a wide, lemon yellow cup that slowly turns to ivory. One of the strongest growers ever and excellent for naturalizing from Bismarck to Baton Rouge', 3.00, '1648107968-3040_IceFollies_CWH_L1200313QP.jpg', 17, 3, 'Winter'),
(19, '2022-03-24 04:49:14', '2022-03-24 04:49:14', 'Blue Petunia Plant', 'Blue Petunia Plants offer a compact, upright, spreading habit with unique; blue-purple flowers that bloom all season long. Surfinia is an extremely fast-growing, profuse bloomer of self-cleaning flowers and have superb weather tolerance!', 2.00, '1648108154-petunia_plant_surfinia_trailing_giant_blue_256_general.jpg', 17, 3, 'Winter'),
(20, '2022-03-24 04:52:01', '2022-03-24 04:52:01', 'Arugula Herb Plant', 'Astro Arugula produces dense clusters of tender leaves that have a nutty, peppery flavor. Leaves are best used fresh. Thrives in both hot and cool gardens. Arugula is most often used in salads, soups, pasta, and on pizza. It can be grown indoors next to a', 1.00, '1648108321-arugula_astro_herb_plant_207_general.jpg', 16, 3, 'Winter'),
(21, '2022-03-24 04:53:26', '2022-03-24 04:53:26', 'Blue Basil Herb', 'African Blue Basil Herb Plants produce purple-veined leaves with a strong, earthy flavor and a warm, sweet camphor scent. The flowers are very decorative. This variety does not need flowers pinched back to continue growing. Basil grows best in full sun lo', 1.00, '1648108406-african_blue_basil_herb_plant_1727_general.jpg', 16, 3, 'Spring'),
(22, '2022-03-24 04:54:54', '2022-03-24 04:54:54', 'Basil Herb Plant', 'Genovese Basil Herb Plants offer dark green, wrinkled leaves with a spicy scent and taste. This slow-bolting variety grows best in full sun locations with moist, well-drained soil. It can be grown indoors next to a south facing window. Indoor plants shoul', 1.00, '1648108494-genovese_basil_herb_plant_479_general.jpg', 16, 3, 'Spring'),
(23, '2022-03-24 04:56:34', '2022-03-24 04:56:34', 'Mint Herb Plant', 'Mojito Mint offers leaves that are a little bit spicier and zestier, while having a slightly less-overpowering spearmint flavor, it is clearly different from other mints. Mint is easy to grow and does well in full to part sun locations with moist soil. Pl', 1.00, '1648108594-mojito_mint_herb_plant_1158_detail.jpg', 16, 3, 'Spring'),
(24, '2022-03-24 05:00:07', '2022-03-24 05:00:07', 'Sunflower Plant', 'Big Smile is a dwarf sunflower with golden yellow petals surrounding a darker center. This beauty offers a single stem that often branches to offer multiple 5-inch flower heads. The pollen attracts pollinators!', 1.50, '1648108807-big_smile_sunflower_plant_1952_general.jpg', 17, 3, 'Winter'),
(25, '2022-03-24 05:01:47', '2022-03-24 05:01:47', 'Marigold', 'Marigold features 2-inch, square-petalled blossoms with in fantastic mahogany-red shades. This fast growing French Marigold tolerate extreme weather and are exceedingly easy to grow!', 2.00, '1648108907-durango_bee_marigold_plant_420_general.jpg', 17, 3, 'Spring'),
(26, '2022-03-24 05:11:56', '2022-03-24 05:11:56', 'Cauliflower', 'Amazing Cauliflower Plants grow with a protective covering of leaves that mean that it can be picked when YOU\'RE ready for it. This is a classic cauliflower and the perfect choice for new growers.   We grow our Amazing Cauliflower Plants organically and g', 1.00, '1648109516-amazing_cauliflower_plant_1168_general.jpg', 14, 3, 'Winter'),
(27, '2022-03-24 05:23:32', '2022-03-24 05:23:32', 'Bean Plant', 'Blue Lake is a pole bean variety that produces tasty, stringless, 6-7 inch pods on 7 foot vines. They are great for canning, freezing and fresh eating. As with other pole beans, you will need a trellis or some type of support system as they climb. Beans a', 1.00, '1648110212-blue_lake_pole_bean_plant_968_general.jpg', 14, 3, 'Winter'),
(28, '2022-03-24 05:24:40', '2022-03-24 05:24:40', 'Eggplant Plant', 'Black Beauty Eggplant produces glossy, purple-black, tasty, 4-6-inch fruits that can weigh up to 2 pounds each. Each plant can yield up to 15 fruits! They are delicious breaded, fried, grilled, baked, in Asian dishes and stir-fries. Black Beauty handles t', 1.00, '1648110280-black_beauty_eggplant_plant_2006_general.jpg', 14, 3, 'Winter'),
(29, '2022-03-24 05:25:46', '2022-03-24 05:25:46', 'Cabbage Plant', 'Stonehead Cabbage Plants  is an All American Selections Winner and tolerant to yellows disease. Named for its solid interior, it has few outer leaves and can weigh up to 4 lbs. Stonehead Cabbage plants are slow to split while growing.   We grow our Stoneh', 1.00, '1648110346-stonehead_cabbage_plant_1662_general.jpg', 14, 3, 'Winter'),
(30, '2022-03-24 05:27:38', '2022-03-24 05:27:38', 'Red Onion Plant', 'Red Burgundy Onion Plants produce a mild, sweet flavor that is excellent for slicing or for adding color and flavor to fresh salads. This onion offers an attractive red and white rings and red outer skin. Red Burgundy can last 2-3 months in proper storage', 1.00, '1648110458-red_burgundy_onion_plants_390_general.jpg', 14, 3, 'Winter'),
(31, '2022-03-26 17:40:33', '2022-03-26 17:40:33', 'Organic Tomatoes', 'All vegetables and fruits are from organic farms that do not use harmful pesticides and chemical fertilizers.', 2.00, '1648327233-tomatooo-500x500.jpg', 1, 1, 'no_season'),
(32, '2022-03-26 17:43:18', '2022-03-26 17:43:18', 'Cubes of locally grown Romanian type lamb', 'Yanboot offers you high quality red meat from Al-Assaf Farms.   What makes our meat special is:   - It’s free of antibiotics and growth hormones.   - All kinds are grown locally with vegetarian feed that is also free of urea addition.', 5.00, '1648327398-cubesmeat-500x500.jpg', 2, 1, 'no_season');

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

CREATE TABLE `product_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_price` double(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_user`
--

INSERT INTO `product_user` (`id`, `created_at`, `updated_at`, `quantity`, `total_price`, `user_id`, `product_id`, `order_id`) VALUES
(19, '2022-03-19 05:37:18', '2022-03-19 05:37:18', 10, 5.00, 1, 11, 14),
(20, '2022-03-19 05:37:18', '2022-03-19 05:37:18', 2, 1.00, 1, 8, 14),
(21, '2022-03-19 05:41:30', '2022-03-19 05:41:30', 2, 4.00, 1, 10, 15),
(23, '2022-03-19 06:13:39', '2022-03-19 06:13:39', 10, 5.00, 1, 8, 16),
(24, '2022-03-19 06:16:26', '2022-03-19 06:16:26', 2, 4.00, 3, 7, 17),
(25, '2022-03-21 13:41:45', '2022-03-21 13:41:45', 2, 4.00, 1, 7, 18),
(26, '2022-03-21 13:41:45', '2022-03-21 13:41:45', 2, 4.00, 1, 10, 18),
(27, '2022-03-21 13:41:45', '2022-03-21 13:41:45', 10, 5.00, 1, 11, 18),
(30, '2022-03-21 13:41:45', '2022-03-21 13:41:45', 2, 1.00, 1, 11, 18),
(31, '2022-03-21 13:41:45', '2022-03-21 13:41:45', 1, 2.00, 1, 7, 18),
(32, '2022-03-22 03:25:48', '2022-03-22 03:25:48', 2, 1.00, 1, 8, 19),
(39, '2022-03-23 04:31:49', '2022-03-23 04:31:49', 2, 1.00, 1, 11, 22),
(40, '2022-03-24 14:04:46', '2022-03-24 14:04:46', 2, 2.00, 1, 27, 23),
(41, '2022-03-26 11:13:14', '2022-03-26 11:13:14', 2, 3.00, 1, 24, 24),
(42, '2022-03-26 11:47:00', '2022-03-26 11:47:00', 2, 2.00, 7, 28, 25),
(44, '2022-03-26 11:47:00', '2022-03-26 11:47:00', 2, 2.00, 7, 29, 25),
(45, '2022-03-26 13:24:55', '2022-03-26 13:24:55', 10, 10.00, 7, 22, 26),
(46, '2022-03-26 13:37:33', '2022-03-26 13:37:33', 1, 1.00, 7, 23, 27),
(47, '2022-03-26 13:37:33', '2022-03-26 13:37:33', 1, 1.00, 7, 23, 27),
(48, '2022-03-26 13:37:33', '2022-03-26 13:37:33', 1, 1.00, 7, 23, 27),
(49, '2022-03-26 13:37:33', '2022-03-26 13:37:33', 1, 1.00, 7, 23, 27),
(50, '2022-03-26 13:39:50', '2022-03-26 13:39:50', 1, 2.00, 7, 19, 28),
(51, '2022-03-26 13:39:50', '2022-03-26 13:39:50', 1, 2.00, 7, 19, 28),
(52, '2022-03-26 13:39:50', '2022-03-26 13:39:50', 1, 2.00, 7, 19, 28),
(53, '2022-03-26 13:39:50', '2022-03-26 13:39:50', 1, 2.00, 7, 19, 28);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grower_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_three` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_four` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_five` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `company_name`, `company_email`, `password`, `confirm_password`, `grower_method`, `phone`, `hero_image`, `category_one`, `category_two`, `category_three`, `category_four`, `category_five`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yanboot', 'yanboot@gmail.com', '$2y$10$6ftdPvd5g1Pm6v9BV/2EOeX.vMv0EPIe96v3CZ7o.KASXjH3qDEcq', '$2y$10$gpj4MVo9ADVhmkFiKW7GkO4nkK6RkkLiTI10XqGdqFRjZp89YxxmK', '1647356038-organic_certification.pdf', '0786730634', '1647356038-1Olive Oil-1140x380.jpg', 'Organic', '', '', '', '', NULL, '2022-03-15 11:53:58', '2022-03-15 11:53:58'),
(3, 'Bustani', 'bustani@gmail.com', '$2y$10$NeJLq.DKlrj4qLqUSDwrl.jxDNjlwq.gjVof29zms29cNfrWv6H8G', '$2y$10$siGu3BEQFLoD826GzlmvLeRS6VbX0K.S.Yfs25DyTwn.nU1qtyICa', '1647682648-organic_certification.pdf', '0786730634', '1647682648-1_VOAUJkPR4tm1EzVrUlaFhg.jpeg', '', 'Plants', 'Seeds', 'Garden Supplies', 'Indoor Plants', NULL, '2022-03-19 06:37:28', '2022-03-19 06:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `text`, `image`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Buy Fresh Organic Food from our stores', 'slider1', NULL, NULL, 1),
(2, 'Fill your garden with beautiful plants from our stores', 'slider2', NULL, NULL, 3),
(3, 'Make your home a garden Shop now indoor plants from our stores', 'slider3', NULL, NULL, 4),
(4, 'Take care of your garden with garden tools from our stores', 'slider4', NULL, NULL, 5),
(5, 'Find the best quality seeds in our stores', 'slider5', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subcategory_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcategory_name`, `subcategory_image`, `created_at`, `updated_at`, `subcategory_description`, `category_id`) VALUES
(1, 'Organic Vegetables and fruits', '1647355821-Why-do-people-buy-organic-Separating-myth-from-motivation_wrbm_large.jpg', '2022-03-15 11:50:21', '2022-03-15 11:50:21', 'Organic Vegetables and fruits Sub Category', 1),
(2, 'Organic meat, chicken, and fish', '1647355840-5f4b65b5497dd-chicken-box-nw-2020.jpg', '2022-03-15 11:50:40', '2022-03-15 11:50:40', 'Organic meat, chicken, and fish Sub Category', 1),
(3, 'Organic milk and eggs', '1647355867-milk-eggs-1024x773.jpg', '2022-03-15 11:51:07', '2022-03-15 11:51:07', 'Organic milk and eggs Sub Category', 1),
(4, 'Organic honey and  nuts', '1647355887-aboutusimg.jpg', '2022-03-15 11:51:27', '2022-03-15 11:51:27', 'Organic honey and nuts only for your health.', 1),
(5, 'Vegetables Seeds', '1647681972-Vegetable-Seeds.jpg', '2022-03-19 06:26:12', '2022-03-19 06:26:12', 'Whether you want quick-growing vegetables, vegetables for salads, James Wong botanicals or fun to grow seeds for the kids.', 2),
(6, 'Flowers Seed', '1647687049-flowers_seeds.jpg', '2022-03-19 07:50:49', '2022-03-19 07:50:49', 'A wide variety of seasonal flower seeds', 2),
(7, 'Herbs Seeds', '1647687203-herbs_seeds.jpg', '2022-03-19 07:53:23', '2022-03-19 07:53:23', 'A wide variety of seasonal aromatic herb seeds', 2),
(8, 'Fruit Seeds', '1647687333-fruit_seeds.jpg', '2022-03-19 07:55:33', '2022-03-19 07:55:33', 'A wide variety of high quality fruit tree seeds', 2),
(9, 'Indoor Plants', '1647688051-indoor_plants_sub_category.jpg', '2022-03-19 08:07:31', '2022-03-19 08:07:31', 'A wide variety of indoor plants with attractive colors and multiple benefits', 4),
(10, 'Plants Containers', '1647688820-61tKrloexVL._AC_SX466_.jpg', '2022-03-19 08:20:20', '2022-03-19 08:20:20', 'Different sizes and colors of plant pots', 5),
(11, 'Hand tools', '1647688955-images.jpg', '2022-03-19 08:22:35', '2022-03-19 08:22:35', 'A wide variety of garden tools that every gardener needs to keep his hands safe and take care of his daughters from cutting and pruning.', 5),
(12, 'Plants watering tools', '1647689295-watering.jpg', '2022-03-19 08:28:15', '2022-03-19 08:28:15', 'A wide range of garden watering tools for both large and small gardens', 5),
(13, 'Garden protection tools', '1647693092-89040-89040-image-89040-3_season_plant_tent.jpg', '2022-03-19 09:31:32', '2022-03-19 09:31:32', 'A wide variety of plant protection tools from cold weather and insects', 5),
(14, 'Vegetables', '1647693248-black_beauty_eggplant_plant_2006_thumb.jpg', '2022-03-19 09:34:08', '2022-03-19 09:34:08', 'A wide variety of seasonal vegetable seedlings', 3),
(15, 'Fruit trees', '1647693381-fruits_category.jpg', '2022-03-19 09:36:21', '2022-03-19 09:36:21', 'Many fruit trees and nuts of different sizes', 3),
(16, 'Herbs', '1647693442-genovese_basil_herb_plant_479_general.jpg', '2022-03-19 09:37:22', '2022-03-19 09:37:22', 'Seedlings of various aromatic herbs', 3),
(17, 'Flowers', '1647693503-71D5nxA2W8L._AC_SL1500_.jpg', '2022-03-19 09:38:23', '2022-03-19 09:38:23', 'Various seasonal flowers', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirm_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Noor', 'noor@gmail.com', '$2y$10$kRYzYiqxRNGhZUW95V.5zesUq3OedWHKxJWg.hoDAkPOSIMrbJ2c2', 'Noor2022@', NULL, '2022-03-15 12:10:54', '2022-03-15 12:10:54'),
(2, 'Salma', 'salma@gmail.com', '$2y$10$Gi9xFcZKZdLeqUbMhoDEjeHY2eM0xyIG8yt3f3MdY2MmNETvCvgVy', 'Salma2022@', NULL, '2022-03-18 03:18:41', '2022-03-18 03:18:41'),
(3, 'Mohammed', 'mohammed@gmail.com', '$2y$10$HKqdV4WPfWFDvDuFQG7cBOBEk7fmmwTimX14WmLVkOLVfpN5oWF5K', 'Mohammed2022@', NULL, '2022-03-18 04:08:13', '2022-03-18 04:08:13'),
(4, 'Fola', 'fola@gmail.com', '$2y$10$wdurQRIZE/.Yy0eAr8XKbusb1dJzxkyT.Zmh3vhiJkZvATfbh.GUm', 'Fola2022@', NULL, '2022-03-22 05:32:12', '2022-03-22 05:32:12'),
(5, 'Omar', 'omar@gmail.com', '$2y$10$lc3xM9DLJtV5txnqCcQ1t.wgb3UrfCFPNZPk53OjQwyfp5HJACKe.', 'Omar2022@', NULL, '2022-03-22 05:34:20', '2022-03-22 05:34:20'),
(6, 'Ali', 'ali2022@gmail.com', '$2y$10$MZc9QB/3YZgjCcYxqy5n..6vUxhBkWubftwkqOzMBn3pHYzF9rTJy', 'Ali2022@', NULL, '2022-03-22 05:39:15', '2022-03-22 05:39:15'),
(7, 'sara', 'sara@gmail.com', '$2y$10$UAuLq3/hwY2N8hk5CqLbfuPfdHEKoT21I9p44RU2DMJhD2g1oEPrC', 'Sara2022@', NULL, '2022-03-26 01:07:53', '2022-03-26 01:07:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `addresses_phone_unique` (`phone`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_store_id_foreign` (`store_id`);

--
-- Indexes for table `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_user_user_id_foreign` (`user_id`),
  ADD KEY `product_user_product_id_foreign` (`product_id`),
  ADD KEY `product_user_order_id_foreign` (`order_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_company_email_unique` (`company_email`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_user`
--
ALTER TABLE `product_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_user`
--
ALTER TABLE `product_user`
  ADD CONSTRAINT `product_user_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_user_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
