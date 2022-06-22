SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Table structure for table `basic_information`
--

CREATE TABLE `basic_information` (
                                     `id` tinyint(1) NOT NULL,
                                     `name_surname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                     `job_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                     `birthday` date NOT NULL,
                                     `phone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                     `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                     `languages` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                     `address` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
                                     `profile_picture` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                     `about` mediumtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
                             `id` tinyint NOT NULL,
                             `user_id` tinyint NOT NULL,
                             `school_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                             `degree` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                             `section` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                             `start_date` date NOT NULL,
                             `end_date` date DEFAULT NULL,
                             `note` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ip_filter`
--

CREATE TABLE `ip_filter` (
                             `id` bigint UNSIGNED NOT NULL,
                             `ip_address` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                             `list_type` set('whitelist','blacklist') COLLATE utf8mb4_general_ci NOT NULL,
                             `notes` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `active` tinyint(1) NOT NULL,
                             `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                             `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                             `invisible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ip_filter`
--

INSERT INTO `ip_filter` (`id`, `ip_address`, `list_type`, `notes`, `active`, `creation_date`, `updated_date`, `invisible`) VALUES
                                                                                                                               (1, '127.0.0.1', 'whitelist', NULL, 1, '2022-06-21 00:17:27', '2022-06-21 00:17:27', NULL),
                                                                                                                               (2, '45.84.222.17', 'whitelist', NULL, 1, '2022-06-21 00:17:27', '2022-06-21 00:17:27', NULL),
                                                                                                                               (3, '94.54.194.244', 'whitelist', NULL, 1, '2022-06-21 00:17:27', '2022-06-21 00:17:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
                             `id` tinyint NOT NULL,
                             `user_id` tinyint NOT NULL,
                             `portfolio_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                             `portfolio_picture` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                             `portfolio_description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
                                 `id` tinyint NOT NULL,
                                 `logo` int NOT NULL,
                                 `favicon` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                 `meta_keywords` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                 `meta_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                 `github_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
                          `id` tinyint NOT NULL,
                          `user_id` tinyint NOT NULL,
                          `skill_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                          `skill_progress` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
                                 `id` tinyint NOT NULL,
                                 `smtp_host` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                 `smtp_port` tinyint NOT NULL,
                                 `smtp_username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                 `smtp_password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                 `smtp_encryption` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                 `from_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                 `from_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                 `settings_id` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_network`
--

CREATE TABLE `social_network` (
                                  `id` tinyint NOT NULL,
                                  `user_id` tinyint NOT NULL,
                                  `facebook` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                  `twitter` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                  `instagram` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                  `linkedin` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                  `github` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                  `behance` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
                                   `id` tinyint NOT NULL,
                                   `user_id` tinyint NOT NULL,
                                   `company_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                   `job_title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                   `start_date` date NOT NULL,
                                   `end_date` date DEFAULT NULL,
                                   `work_description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_references`
--

CREATE TABLE `work_references` (
                                   `id` tinyint NOT NULL,
                                   `user_id` tinyint NOT NULL,
                                   `reference_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                   `job_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                   `description` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_information`
--
ALTER TABLE `basic_information`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ip_filter`
--
ALTER TABLE `ip_filter`
    ADD PRIMARY KEY (`id`),
    ADD KEY `active` (`active`),
    ADD KEY `ip_address` (`ip_address`),
    ADD KEY `list_type` (`list_type`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
    ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
    ADD PRIMARY KEY (`id`),
    ADD KEY `settings_id` (`settings_id`);

--
-- Indexes for table `social_network`
--
ALTER TABLE `social_network`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `work_references`
--
ALTER TABLE `work_references`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ip_filter`
--
ALTER TABLE `ip_filter`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_network`
--
ALTER TABLE `social_network`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_references`
--
ALTER TABLE `work_references`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education`
--
ALTER TABLE `education`
    ADD CONSTRAINT `education_user_id` FOREIGN KEY (`user_id`) REFERENCES `basic_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
    ADD CONSTRAINT `portfolio_user_id` FOREIGN KEY (`user_id`) REFERENCES `basic_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
    ADD CONSTRAINT `skill_user_id` FOREIGN KEY (`user_id`) REFERENCES `basic_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
    ADD CONSTRAINT `smtp_settings_id` FOREIGN KEY (`settings_id`) REFERENCES `smtp_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `social_network`
--
ALTER TABLE `social_network`
    ADD CONSTRAINT `social_user_id` FOREIGN KEY (`user_id`) REFERENCES `basic_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
    ADD CONSTRAINT `work_experience_user_id` FOREIGN KEY (`user_id`) REFERENCES `basic_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_references`
--
ALTER TABLE `work_references`
    ADD CONSTRAINT `work_references_user_id` FOREIGN KEY (`user_id`) REFERENCES `basic_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
