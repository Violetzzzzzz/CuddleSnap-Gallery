-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2024 at 11:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `homepage_image`
--

CREATE TABLE `homepage_image` (
  `theme` text DEFAULT NULL,
  `src_url` text DEFAULT NULL,
  `alt_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage_image`
--

INSERT INTO `homepage_image` (`theme`, `src_url`, `alt_description`) VALUES
('family', 'https://images.pexels.com/photos/4148842/pexels-photo-4148842.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'A sweet family photo from external link'),
('family', 'https://images.pexels.com/photos/3768131/pexels-photo-3768131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'A sweet mother and daughter photo from external link'),
('family', 'https://images.pexels.com/photos/50601/brothers-boys-kids-baby-50601.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'A sweet siblings photo from external link'),
('pet', 'https://img.freepik.com/free-photo/african-american-woman-wearing-yellow-sweater-holding-puppies_273609-22533.jpg?w=2000&t=st=1701411342~exp=1701411942~hmac=f8a64b4a3fac56fa6a463606d1e83d60b14978ad1c26b5a009ee059bd2766855', 'Free photo african american woman wearing yellow sweater holding puppies'),
('pet', 'https://img.freepik.com/free-photo/portrait-young-man-his-cute-dog_273609-15254.jpg?w=2000&t=st=1701411461~exp=1701412061~hmac=6f35ea69809971b873edccbeb9edac06ffbc96f6b96f8c8d461acd17385a2eb2', 'Free photo portrait of young man and his cute dog'),
('pet', 'https://img.freepik.com/premium-photo/latin-american-man-standing-profile-holds-his-cat-his-arms-while-giving-her-love-cuddles_668440-56.jpg?w=2000', 'Photo latin american man standing in profile holds his cat in his arms while giving her love and cuddles'),
('couple', 'https://img.freepik.com/free-photo/couple-forming-heart-with-hands_23-2147986344.jpg?w=1380&t=st=1701416069~exp=1701416669~hmac=f5b92e4dd9939a08ab4c83539082490079a8327ebaf7f909a1e74c6828fd5488', 'Free photo couple forming heart with hands'),
('couple', 'https://img.freepik.com/free-photo/lovely-couple-having-date-outdoors_23-2149130653.jpg?w=1380&t=st=1701416128~exp=1701416728~hmac=6f62b7af7ef76a64c5b4a207db5a607e6c74580fef7fd5369f108536bd24281a', 'Free photo lovely couple having a date outdoors'),
('couple', 'https://img.freepik.com/free-photo/couple-together-christmas-street_1303-26014.jpg?w=1380&t=st=1701416190~exp=1701416790~hmac=005dd18753ae27850896731d0d161dfc088494924e47789f2caed6666c2c3764', 'Free photo couple together on christmas in the street'),
('friends', 'https://img.freepik.com/free-photo/lifestyle-young-friends-outdoors_23-2148140715.jpg?w=996&t=st=1701417168~exp=1701417768~hmac=05927ce311cfa30e874266aa5697f222b13069c03d3c5472a0edd4e13a919d6c', 'Free photo lifestyle of young friends outdoors'),
('friends', 'https://img.freepik.com/free-photo/two-pretty-adorable-young-ladies-having-fun-outside-sunny-street-with-perfect-smiles-showing-peace-signs-laughing_291650-181.jpg?w=1380&t=st=1701417240~exp=1701417840~hmac=e9c62aafb1cd22663da8fed2ca504a4f3f912ea0550bd67bc1bf7ca17609f3e5', 'Free photo two pretty adorable young ladies having fun outside on sunny street with perfect smiles'),
('friends', 'https://img.freepik.com/free-photo/young-friends-standing-circle-showing-peace-gesture_23-2148134054.jpg?w=1380&t=st=1701417270~exp=1701417870~hmac=d0ff328f376194bb18d318fb1d2546fd33b479eebe1e10b6aea1b621167b7b0d', 'Free photo young friends standing in circle and showing peace gesture'),
('grandparents', 'https://img.freepik.com/free-photo/medium-shot-happy-family-home_23-2148962406.jpg?w=1380&t=st=1701417364~exp=1701417964~hmac=a1c563af4621711a9dba0d11a794186d93a2541a7d34a6435fdcc2a51eeb6df5', 'Free photo medium shot happy family at home'),
('grandparents', 'https://img.freepik.com/free-photo/you-are-best-grandma-world_637285-9689.jpg?w=1380&t=st=1701417421~exp=1701418021~hmac=b1ca414160cb3c688d58640e2b48490d64d6ec2b2160130bc9c2dcc0f75b50c4', 'Free photo you are the best grandma in the world'),
('grandparents', 'https://img.freepik.com/free-photo/woman-with-grandparents-working-together-country-side_23-2149518775.jpg?w=1380&t=st=1701417459~exp=1701418059~hmac=e9a8efe1221336f2a030e4bfaad221885d9eed3ae184c67f718bd800d548ee94', 'Free photo woman with grandparents working together in the country side'),
('wedding', 'https://img.freepik.com/free-photo/beautiful-couple-having-their-wedding-beach_23-2149043952.jpg?w=1380&t=st=1701417607~exp=1701418207~hmac=0063f3a948bd649b2ecd9336a82305e78ad8ea3a23f2a55657bcefd64d98b9d2', 'Free photo beautiful couple having their wedding at the beach'),
('wedding', 'https://img.freepik.com/free-photo/groom-putting-ring-bride-s-finger_1157-338.jpg?w=1380&t=st=1701417666~exp=1701418266~hmac=f8684c06c9b90750371b2e38883af1697bc351f276dd5dd29fc1fa1a30ecf549', 'Free photo groom putting ring on bride\'s finger'),
('wedding', 'https://img.freepik.com/free-photo/beautiful-people-celebrating-wedding-beach_23-2149043962.jpg?w=1380&t=st=1701417731~exp=1701418331~hmac=5e059e09aa2154c0c124f5ebcca179756e9347f03aa6319ae7a2c698c597809f', 'Free photo beautiful people celebrating a wedding on the beach');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(80) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `id`) VALUES
('Violet', 'Zhang', 'zcfor@gmail.com', '$2y$10$BDBnBPIZr1f5sxlbDrmLouyO2BcRpeep4NnY3ObamBMRlQGfnLwQK', 1),
('Chi', 'Zhang', 'violetz@gmail.com', '$2y$10$L5cVgi7Vtq9Wn0/zgQzX2ekTX7dIVECtAkWL7moQQsnsP2qD3SHQu', 2),
('Allison', 'Wang', '5458@qq.com', '$2y$10$vJn79AS.4Id1N/63CZOiGuts1UwMUhzw5iagPb2CXdjZvff6ey/na', 3);

-- --------------------------------------------------------

--
-- Table structure for table `violet_albums`
--

CREATE TABLE `violet_albums` (
  `user_id` int(8) NOT NULL DEFAULT 2,
  `albumName` varchar(40) NOT NULL DEFAULT 'noname',
  `album_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violet_albums`
--

INSERT INTO `violet_albums` (`user_id`, `albumName`, `album_description`) VALUES
(2, 'Pets', 'Cute pets'),
(2, 'Kids', 'Cute kids'),
(2, 'Flowers', 'Beautiful flowers'),
(2, 'Stardew Valley', 'Game memes'),
(2, 'Selfie', 'selfies');

-- --------------------------------------------------------

--
-- Table structure for table `violet_displays`
--

CREATE TABLE `violet_displays` (
  `display_name` varchar(40) NOT NULL,
  `src_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `violet_photos`
--

CREATE TABLE `violet_photos` (
  `user_id` int(8) NOT NULL DEFAULT 2,
  `albumName` varchar(40) NOT NULL DEFAULT 'MyAlbum',
  `tags` text NOT NULL,
  `src_url` text NOT NULL,
  `alt_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violet_photos`
--

INSERT INTO `violet_photos` (`user_id`, `albumName`, `tags`, `src_url`, `alt_description`) VALUES
(2, 'Pets', 'cat', 'https://img.freepik.com/free-photo/siamese-cat-with-cute-eyes-bow_1268-27767.jpg?size=626&ext=jpg&ga=GA1.1.981968679.1701133544&semt=sph', 'cute cat'),
(2, 'Pets', 'cat', 'https://img.freepik.com/free-photo/closeup-shot-one-ginger-cat-hugging-licking-other-isolated-white-wall_181624-32893.jpg?size=626&ext=jpg&ga=GA1.1.981968679.1701133544&semt=sph', 'cute cat'),
(2, 'Pets', 'dog', 'https://img.freepik.com/free-photo/isolated-happy-smiling-dog-white-background-portrait-4_1562-693.jpg?size=626&ext=jpg&ga=GA1.1.981968679.1701133544&semt=sph', 'cute dog'),
(2, 'Pets', 'dog', 'https://img.freepik.com/free-photo/beautiful-pet-portrait-dog_23-2149218448.jpg?size=626&ext=jpg&ga=GA1.1.981968679.1701133544&semt=sph', 'cute dog'),
(2, 'Pets', 'bunny', 'https://img.freepik.com/free-photo/cute-ai-generated-cartoon-bunny_23-2150288879.jpg?t=st=1701589493~exp=1701593093~hmac=67cd4abf3759f4b635d0f8977d1ffa3d59587457b5a36c3b2289f35aa02c1b08&w=740', 'cute bunny'),
(2, 'Pets', 'bunny', 'https://img.freepik.com/free-photo/cute-ai-generated-cartoon-bunny_23-2150288886.jpg?t=st=1701589511~exp=1701593111~hmac=b6e976af5a357262e009eaaf7f6cc3153ef44d1e3a68aac80aaec7b1c265b221&w=740', 'cute bunny'),
(2, 'Stardew Valley', 'meme', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3ALPMtNZJD1YCVCuCJZTUGLM6cmaop-EUmA&usqp=CAU', 'funny game meme'),
(2, 'Stardew Valley', 'meme', 'https://ih1.redbubble.net/image.1928780529.9282/st,small,507x507-pad,600x600,f8f8f8.jpg', 'funny game meme'),
(2, 'Stardew Valley', 'meme', 'https://i.ytimg.com/vi/7k-A8VsNkk4/maxresdefault.jpg', 'funny game meme'),
(2, 'Stardew Valley', 'game', 'https://upload.wikimedia.org/wikipedia/en/f/fd/Logo_of_Stardew_Valley.png', 'stardew valley game pic'),
(2, 'Stardew Valley', 'game', 'https://honisoit.com/wp-content/uploads/2021/03/Stardew-valley-feature-image.jpg', 'stardew valley game pic'),
(2, 'Stardew Valley', 'game', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD4mswE0Y4aazNKha7_ptRwanv9xXDralyWA&usqp=CAU', 'stardew valley game pic'),
(2, 'Stardew Valley', 'game', 'https://i.guim.co.uk/img/media/11a2156a2b251aece9ee0d70e8792cdc920dc813/120_0_1800_1080/master/1800.jpg?width=1200&height=900&quality=85&auto=format&fit=crop&s=f38a2722b1fe532a263482c4d010c8a0', 'stardew valley game pic'),
(2, 'Stardew Valley', 'game', 'https://www.pcgamesn.com/wp-content/sites/pcgamesn/2023/09/Stardew-Valley-update-new-farm-550x309.jpg', 'stardew valley game pic'),
(2, 'Stardew Valley', 'game', 'https://miro.medium.com/v2/resize:fit:3200/1*BL2XT6KjlEbr8w5G0qGJ0A.jpeg', 'stardew valley game pic'),
(2, 'Kids', 'boy and girl', 'https://img.freepik.com/free-photo/children-siting-green-table-drawing_1157-26698.jpg?w=1380&t=st=1701589691~exp=1701590291~hmac=bb8782595a70e03172a8cfbb08532fb618b1ebbfc8ebcb31a2587d9816e53655', 'two kids'),
(2, 'Flowers', 'purple daisy', 'https://img.freepik.com/free-photo/purple-osteospermum-daisy-flower_1373-16.jpg?w=1380&t=st=1701589757~exp=1701590357~hmac=2420b7036a776bfdd7c78f7dd54ee2f16201fd4f89ebc7a37ec66bc63c475e5c', 'purple daisy'),
(2, 'Flowers', '12345', 'uploads/Linkedin-icon-design-premium-vector-PNG.png', '123'),
(2, 'Kids', '1111', 'https://img.freepik.com/free-photo/college-girls-studying-together_23-2149038414.jpg?w=1800&t=st=1701646512~exp=1701647112~hmac=75337ef8b8f9e250b601f341ba3b7943c7a0dba4de54f37b798cfd774c453886', '123'),
(2, 'Selfie', 'png', 'https://img.freepik.com/free-vector/photo-concept-illustration_114360-250.jpg?w=1380&t=st=1701950290~exp=1701950890~hmac=42d301fcaa902356a794ed4ace1a3504bb96760abbc6a3a2216b4d166a0c9202', 'png selfie comic cartoon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
