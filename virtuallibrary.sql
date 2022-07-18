CREATE TABLE `book_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `book_name` varchar(400) NOT NULL,
  `writer_name` varchar(100) NOT NULL,
  `cover_photo_name` varchar(500) NOT NULL,
  `pdf_file_name` varchar(500) NOT NULL,
  `details` varchar(1200) NOT NULL,
  `upload_date` varchar(100) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);

CREATE TABLE `otp_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `otp` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `profile_image_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `image_name` varchar(800) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dashboard` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `verify_email_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `verification_code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);