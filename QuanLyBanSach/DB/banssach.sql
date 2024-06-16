drop database quanlybansach;

create database quanlybansach;
use quanlybansach;
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 07:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiss_collection`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) PRIMARY KEY NOT NULL auto_increment,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Tiểu thuyết'),
(2, 'Truyện tranh'),
(3, 'Sách giáo khoa');

-- --------------------------------------------------------
CREATE TABLE `product` (
  `product_id` int(11)  PRIMARY KEY NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `uploaded_date` TIMESTAMP NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_image`, `price`, `category_id`,`quantity_in_stock`, `uploaded_date`) VALUES
(1, 'Đồi Gió Hú', 'Đồi gió hú, câu chuyện cổ điển về tình yêu ngang trái và tham vọng chiếm hữu, cuốn tiểu thuyết dữ dội và bí ẩn về...', './uploads/doigiohu.jpg', 500, 1, 30 , '2022-03-28'),
(2, 'Những Người Khốn Khổ', 'Những người khốn khổ là một trong những tiểu thuyết hay nhất mọi thời đại chứa chan tinh thần lãng mạn cách mạng.', './uploads/nhungnguoikhonkho.jpg', 890, 1, 15 ,'2022-04-04'),
(3, 'Bà Bovary', 'Gustave Flaubert đã viết tiểu thuyết nổi tiếng Bà Bovary, xuất bản năm 1856, kể về một thiếu phụ với cuộc hôn nhân không như ý...', './uploads/bovary.jpg', 600, 1,10, '2022-04-04'),
(4, 'Shin – Cậu Bé Bút Chì', 'Bộ truyện này xoay quanh một cậu bé tên là Shin tuổi vô cùng đáng yêu và cuộc sống hàng ngày của cậu bé.', './uploads/shin.jpg', 700, 2, 35, '2022-04-04'),
(5, 'Thám tử lừng danh Conan ', 'Thám tử lừng danh Conan là một cuốn truyện kể về nhân vật Kudo Shinichi – một thám tử từ trung học đã nổi tiếng và thường xuyên giúp các cảnh sát phá án.', './uploads/conan.jpg', 1850, 2,49, '2022-04-04'),
(6, 'Doraemon', 'được sáng tác vào năm 1969 bởi tác giả Fujiko Fujio. Tác phẩm này đã được dịch sang hơn 30 ngôn ngữ và trở nên phổ biến tại nhiều quốc gia trên thế giới.', './uploads/doraemon.jpg', 1250, 2,70, '2022-03-24'),
(7, 'Thần Đồng Đất Việt', 'Cuốn truyện được lấy bối cảnh dưới thời Hậu Lê và dưới triều đại của vua Lê Thánh Tông.', './uploads/tddv.jpg', 1500, 2, 30, '2022-04-04');
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) PRIMARY KEY NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(150) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `registered_at` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `contact_no`, `registered_at`, `isAdmin`, `user_address`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$j9OXXIYS0CG5AYuks62YMeDvuIpo2hZEN4CqfJfujt1yPMnoUq5C6', '9810283472', '2022-04-10', 1, 'DaNang'),
(2, 'Quynh ', 'Hoang', 'quynhnee@gmail.com', '$2y$10$DJOdhZy1InHTKQO6whfyJexVTZCDTlmIYGCXQiPTv7l82AdC9bWHO', '980098322', '2022-04-10', 0, 'DaNang');

-- --------------------------------------------------------


--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) PRIMARY KEY NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivered_to` varchar(150) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `deliver_address` varchar(255) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `phone_no`, `deliver_address`, `pay_method`, `pay_status`, `order_status`, `order_date`) VALUES
(1, 2, '9802234675', 'HoaSon', 'Thẻ', 0, 0, '2022-04-10'),
(2, 2, '9802234675', 'HoaSon', 'Thẻ', 0, 0, '2022-04-10'),
(3, 2, '980098322', 'HoaSon', 'Tiền mặt', 1, 0, '2022-04-18');

-- --------------------------------------------------------



--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) PRIMARY KEY NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `product_id` int(11)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `quantity`, `price`,`product_id`) VALUES
(1, 1, 1, 500,1),
(2, 2, 2, 890,1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--



-- --------------------------------------------------------

--

-- -------------------------------------------------
--
-- AUTO_INCREMENT for dumped tables
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--


--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
