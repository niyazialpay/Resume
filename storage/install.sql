
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `basic_information`
--

CREATE TABLE `basic_information` (
                                     `id` tinyint(1) NOT NULL,
                                     `name_surname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                     `job_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                     `website` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                     `website_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
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
                             `degree` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `section` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `start_date` date NOT NULL,
                             `end_date` date DEFAULT NULL,
                             `note` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
                               `id` bigint UNSIGNED NOT NULL,
                               `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
                               `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
                               `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                               `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                               `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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


-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
                              `id` int UNSIGNED NOT NULL,
                              `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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
                                          `id` bigint UNSIGNED NOT NULL,
                                          `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `tokenable_id` bigint UNSIGNED NOT NULL,
                                          `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `abilities` text COLLATE utf8mb4_unicode_ci,
                                          `last_used_at` timestamp NULL DEFAULT NULL,
                                          `created_at` timestamp NULL DEFAULT NULL,
                                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
                             `id` tinyint NOT NULL,
                             `user_id` tinyint NOT NULL,
                             `portfolio_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                             `portfolio_image` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                             `portfolio_description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
                             `portfolio_web` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
                           `id` tinyint NOT NULL,
                           `user_id` tinyint NOT NULL,
                           `show_email` tinyint(1) NOT NULL DEFAULT '0',
                           `show_phone` tinyint(1) NOT NULL DEFAULT '0',
                           `show_address` tinyint(1) NOT NULL DEFAULT '0',
                           `show_birthday` tinyint(1) NOT NULL DEFAULT '0',
                           `birthday_only_year` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
                                 `id` tinyint NOT NULL,
                                 `logo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                                 `favicon` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                 `meta_keywords` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                 `meta_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
                                 `github_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `github_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `google` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `yandex` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `bing` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `google_tag_manager_head` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `google_tag_manager_body` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `recaptcha_public_v3` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `recaptcha_private_v3` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `yahoo` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `recaptcha_public_v2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `recaptcha_private_v2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                 `recaptcha_score` float DEFAULT NULL
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

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
                                 `id` tinyint NOT NULL,
                                 `smtp_host` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
                                 `smtp_port` int NOT NULL,
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
                                  `facebook` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                                  `twitter` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                                  `instagram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                                  `linkedin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                                  `github` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                                  `behance` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` bigint UNSIGNED NOT NULL,
                         `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email_verified_at` timestamp NULL DEFAULT NULL,
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
                         `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
                         `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
                         `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
                                   `work_description` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ip_filter`
--
ALTER TABLE `ip_filter`
    ADD PRIMARY KEY (`id`),
    ADD KEY `active` (`active`),
    ADD KEY `ip_address` (`ip_address`),
    ADD KEY `list_type` (`list_type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
    ADD PRIMARY KEY (`id`),
    ADD KEY `privacy_user_id_index` (`user_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_information`
--
ALTER TABLE `basic_information`
    MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ip_filter`
--
ALTER TABLE `ip_filter`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_network`
--
ALTER TABLE `social_network`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
    MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for table `privacy`
--
ALTER TABLE `privacy`
    ADD CONSTRAINT `privacy_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `basic_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
