DROP TABLE batches;

CREATE TABLE `batches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `batch_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO batches VALUES("1","Batch-","2022-05-28 00:00:00","2022-05-28 11:08:06","2022-05-28 11:08:06");
INSERT INTO batches VALUES("2","Batch-2","2022-05-28 00:00:00","2022-05-28 11:14:02","2022-05-28 11:14:02");
INSERT INTO batches VALUES("3","Batch-3","2022-05-28 00:00:00","2022-05-28 11:15:03","2022-05-28 11:15:03");
INSERT INTO batches VALUES("4","Batch-4","2022-05-28 00:00:00","2022-05-28 11:18:14","2022-05-28 11:18:14");
INSERT INTO batches VALUES("5","Batch-5","2022-05-29 00:00:00","2022-05-30 18:33:30","2022-05-30 18:33:30");
INSERT INTO batches VALUES("6","Batch-6","2022-05-31 00:00:00","2022-05-31 07:12:12","2022-05-31 07:12:12");
INSERT INTO batches VALUES("7","Batch-7","2022-05-31 00:00:00","2022-05-31 07:12:34","2022-05-31 07:12:34");
INSERT INTO batches VALUES("8","Batch-8","2022-05-31 00:00:00","2022-05-31 07:17:14","2022-05-31 07:17:14");
INSERT INTO batches VALUES("9","Batch-9","2022-05-31 00:00:00","2022-05-31 07:17:23","2022-05-31 07:17:23");
INSERT INTO batches VALUES("10","Batch-0","2022-05-31 00:00:00","2022-05-31 07:18:02","2022-05-31 07:18:02");
INSERT INTO batches VALUES("11","Batch-11","0000-00-00 00:00:00","2022-05-31 10:11:44","2022-05-31 10:11:44");
INSERT INTO batches VALUES("12","Batch-12","","2022-05-31 16:33:40","2022-05-31 16:33:40");
INSERT INTO batches VALUES("13","Batch-13","0000-00-00 00:00:00","2022-05-31 16:39:57","2022-05-31 16:39:57");
INSERT INTO batches VALUES("14","Batch-14","0000-00-00 00:00:00","2022-05-31 16:40:04","2022-05-31 16:40:04");
INSERT INTO batches VALUES("15","Batch-15","0000-00-00 00:00:00","2022-06-02 10:14:45","2022-06-02 10:14:45");
INSERT INTO batches VALUES("16","Batch-16","0000-00-00 00:00:00","2022-06-02 10:16:53","2022-06-02 10:16:53");
INSERT INTO batches VALUES("17","Batch-17","0000-00-00 00:00:00","2022-06-02 10:17:19","2022-06-02 10:17:19");
INSERT INTO batches VALUES("18","Batch-18","0000-00-00 00:00:00","2022-06-02 10:35:25","2022-06-02 10:35:25");
INSERT INTO batches VALUES("19","Batch-19","0000-00-00 00:00:00","2022-07-18 14:58:59","2022-07-18 14:58:59");



DROP TABLE branches;

CREATE TABLE `branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branches_company_id_index` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO branches VALUES("1","board bazar","34534","1","2022-05-28 10:40:44","2022-05-28 10:40:44","1");
INSERT INTO branches VALUES("2","KDA","343","1","2022-05-31 10:26:44","2022-05-31 10:26:44","2");



DROP TABLE cities;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_branch_id_index` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO cities VALUES("1","peshawar","53454","1","2022-05-28 10:41:09","2022-05-28 10:41:09");
INSERT INTO cities VALUES("2","Kohat gate2","543","2","2022-05-31 10:27:22","2022-05-31 10:27:47");



DROP TABLE companies;

CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO companies VALUES("1","The Studio","waleedfancy@gmail.com","03339991203","34343434","kohat2","","1","2022-05-28 10:40:11","2022-05-31 10:26:12");
INSERT INTO companies VALUES("2","NIC","nic@gmail.com","03442900411","5435","peshawar","webSkill.jpeg","1","2022-05-31 10:25:42","2022-05-31 10:25:42");



DROP TABLE customer_categories;

CREATE TABLE `customer_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE customer_document_regs;

CREATE TABLE `customer_document_regs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cnic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ntn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sntn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exemption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_document_regs_customer_id_index` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO customer_document_regs VALUES("1","65","56","65","765","Yes","1","05282022080631pm.jpeg","2","2022-05-28 11:06:31","2022-05-28 11:06:31");
INSERT INTO customer_document_regs VALUES("3","4545","344","43533","345","Yes","1","06022022111039am.jpg","1","2022-06-02 11:10:39","2022-06-02 11:10:39");



DROP TABLE customer_licenses;

CREATE TABLE `customer_licenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `license_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `license_type_id` int(10) unsigned DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_licenses_license_type_id_index` (`license_type_id`),
  KEY `customer_licenses_customer_id_index` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO customer_licenses VALUES("1","for13","05282022080631pm.jpeg","2022-05-28","1","2","2022-05-28 11:06:31","2022-05-28 11:06:31");
INSERT INTO customer_licenses VALUES("3","for13","06022022111039am.PNG","2022-05-11","1","1","2022-06-02 11:10:39","2022-06-02 11:10:39");



DROP TABLE customer_regions;

CREATE TABLE `customer_regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` int(10) unsigned DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_regions_region_id_index` (`region_id`),
  KEY `customer_regions_customer_id_index` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE customers;

CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_old_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_off` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_res` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAtive` tinyint(4) NOT NULL DEFAULT 0,
  `flag` tinyint(4) NOT NULL DEFAULT 0,
  `license_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `customer_rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_group_id_index` (`group_id`),
  KEY `customers_city_id_index` (`city_id`),
  KEY `customers_region_id_index` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO customers VALUES("1","khan jan","34354","1","kohat","03442900411","03442900411","5435","khan@gmail.com","25000","344","","0","1","","0000-00-00","","1","1","1","2022-05-18 19:31:27","2022-05-18 19:31:27");
INSERT INTO customers VALUES("2","khan jan","2","443","kohat","03442900411","03442900411","5435","khan@gmail.com","25000","344","","0","1","","0000-00-00","","1","0","0","2022-05-28 11:06:31","2022-05-28 11:06:31");



DROP TABLE designations;

CREATE TABLE `designations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO designations VALUES("1","operator q","2022-05-28 10:42:28","2022-05-31 10:30:40");
INSERT INTO designations VALUES("2","assistant","2022-05-31 10:30:30","2022-05-31 10:30:30");



DROP TABLE distributors;

CREATE TABLE `distributors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE employees;

CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designation_id` int(10) unsigned DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_off` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_res` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emg_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emg_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `basic_salery` double(8,2) DEFAULT NULL,
  `isAtive` tinyint(4) NOT NULL DEFAULT 0,
  `last_modification_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employees_designation_id_index` (`designation_id`),
  KEY `employees_city_id_index` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO employees VALUES("1","1","saad","khan","jan","kohat","03442900411","03442900411","5435","khan@gmail.com","1","25000","344-343-344","khalid","03442900411","2022-05-01","2022-05-26","30000.00","0","2022-05-18","2022-05-28 10:43:27","2022-05-28 10:43:27");
INSERT INTO employees VALUES("2","2","sami","khan","jan","kohat","03442900411","03442900411","555","khan@gmail.com","2","25000","43434535","khalid","03442900411","2022-05-18","2022-05-10","300002.00","0","2022-05-17","2022-05-31 10:31:47","2022-05-31 10:31:47");



DROP TABLE expense_categories;

CREATE TABLE `expense_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO expense_categories VALUES("1","foood","2022-05-28 11:21:48","2022-05-28 11:21:48");
INSERT INTO expense_categories VALUES("2","kraya","2022-05-30 18:00:43","2022-05-30 18:00:43");
INSERT INTO expense_categories VALUES("3","foood2","2022-05-31 10:53:53","2022-05-31 10:53:53");



DROP TABLE expenses;

CREATE TABLE `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO expenses VALUES("1","khan 3","2000","2022-05-28","note","1","2022-05-28 11:22:11","2022-05-31 10:54:15");
INSERT INTO expenses VALUES("2","salaam","800","2022-05-30","okkkk","2","2022-05-30 18:01:13","2022-05-30 18:01:13");



DROP TABLE failed_jobs;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE general_bonuses;

CREATE TABLE `general_bonuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bonus` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO general_bonuses VALUES("1","3.00","10","2022-05-02","2022-08-29","2022-05-28 10:45:56","2022-05-28 10:45:56");
INSERT INTO general_bonuses VALUES("2","3.00","20","2022-05-01","2022-06-02","2022-05-30 18:35:52","2022-05-30 18:35:52");
INSERT INTO general_bonuses VALUES("3","2.00","100","2022-05-10","2022-06-30","2022-05-31 10:33:49","2022-05-31 10:33:49");



DROP TABLE general_discounts;

CREATE TABLE `general_discounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `discount` double(8,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO general_discounts VALUES("1","3.00","2022-05-01","2022-08-29","2022-05-28 10:46:11","2022-05-28 10:46:11");
INSERT INTO general_discounts VALUES("2","9.00","2022-05-01","2022-06-29","2022-05-30 18:36:11","2022-05-30 18:36:11");
INSERT INTO general_discounts VALUES("3","2.00","2022-05-10","2022-06-13","2022-05-31 10:34:11","2022-05-31 10:34:11");



DROP TABLE groups;

CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO groups VALUES("1","pharmacy group","2022-05-28 10:42:09","2022-05-28 10:42:09");
INSERT INTO groups VALUES("2","gropp of labb","2022-05-31 10:29:56","2022-05-31 10:29:56");



DROP TABLE license_types;

CREATE TABLE `license_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO license_types VALUES("1","form9","2022-05-28 10:43:45","2022-05-28 10:43:45");
INSERT INTO license_types VALUES("2","form10","2022-05-31 10:24:50","2022-05-31 10:24:50");



DROP TABLE logs;

CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_date` date NOT NULL,
  `action_time` time NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO logs VALUES("1","Store","Company id 1","2022-05-28","19:40:11","1");
INSERT INTO logs VALUES("2","Update","Company id 1","2022-05-28","19:40:21","1");
INSERT INTO logs VALUES("3","Store","Branch id 1","2022-05-28","19:40:44","1");
INSERT INTO logs VALUES("4","Store","Region id 1","2022-05-28","19:41:50","1");
INSERT INTO logs VALUES("5","Store"," id 1","2022-05-28","20:21:48","1");
INSERT INTO logs VALUES("6","Store","Company id 1","2022-05-28","20:22:11","1");
INSERT INTO logs VALUES("7","Store"," id 2","2022-05-30","18:00:43","1");
INSERT INTO logs VALUES("8","Store","Company id 2","2022-05-30","18:01:13","1");
INSERT INTO logs VALUES("9","Update","Company id 1","2022-05-31","07:20:29","3");
INSERT INTO logs VALUES("10","Store","Company id 2","2022-05-31","10:25:42","2");
INSERT INTO logs VALUES("11","Update","Company id 1","2022-05-31","10:26:12","2");
INSERT INTO logs VALUES("12","Store","Branch id 2","2022-05-31","10:26:44","2");
INSERT INTO logs VALUES("13","Update","Branch id 2","2022-05-31","10:26:51","2");
INSERT INTO logs VALUES("14","Store","Region id 2","2022-05-31","10:28:13","2");
INSERT INTO logs VALUES("15","Store","Region id 3","2022-05-31","10:28:42","2");
INSERT INTO logs VALUES("16","Update","Product id 1","2022-05-31","10:44:09","2");
INSERT INTO logs VALUES("17","Update","Product id 1","2022-05-31","10:44:27","2");
INSERT INTO logs VALUES("18","Store"," id 3","2022-05-31","10:53:53","2");
INSERT INTO logs VALUES("19","Store","Region id 4","2022-05-31","11:30:57","2");
INSERT INTO logs VALUES("20","Store","Region id 5","2022-05-31","11:31:41","2");
INSERT INTO logs VALUES("21","Store","Region id 6","2022-05-31","11:32:55","2");
INSERT INTO logs VALUES("22","Update","Product id 1","2022-06-11","06:47:22","3");
INSERT INTO logs VALUES("23","Destroy","Region id 6","2022-07-05","07:13:24","3");
INSERT INTO logs VALUES("24","Destroy","Region id 1","2022-07-05","07:14:02","3");
INSERT INTO logs VALUES("25","Update","Region id 2","2022-07-05","07:24:39","3");
INSERT INTO logs VALUES("26","Destroy","Region id 5","2022-07-05","07:25:29","3");
INSERT INTO logs VALUES("27","Store","Region id 7","2022-07-05","07:27:21","3");
INSERT INTO logs VALUES("28","Update","Region id 7","2022-07-05","07:28:04","3");
INSERT INTO logs VALUES("29","Update","Region id 7","2022-07-05","07:29:00","3");



DROP TABLE migrations;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE password_resets;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE permission_role;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE permission_user;

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE permissions;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE product_bonuses;

CREATE TABLE `product_bonuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bonus` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_bonuses_product_id_index` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_bonuses VALUES("1","10.00","200","2022-05-28 00:00:00","2022-09-28 00:00:00","1","0","2022-05-28 10:49:40","2022-05-28 10:49:40");
INSERT INTO product_bonuses VALUES("2","10.00","200","2022-05-28 00:00:00","2022-09-28 00:00:00","1","0","2022-05-28 10:50:04","2022-05-28 10:50:04");
INSERT INTO product_bonuses VALUES("3","10.00","300","2022-05-28 00:00:00","2022-05-28 00:00:00","1","0","2022-05-28 10:54:44","2022-05-28 10:54:44");
INSERT INTO product_bonuses VALUES("4","3.00","10","2022-05-02 00:00:00","2022-08-29 00:00:00","1","1","2022-05-28 10:56:18","2022-05-28 10:56:18");
INSERT INTO product_bonuses VALUES("5","3.00","20","2022-05-01 00:00:00","2022-06-02 00:00:00","1","1","2022-05-30 18:36:35","2022-05-30 18:36:35");
INSERT INTO product_bonuses VALUES("6","10.00","100","2022-05-30 00:00:00","2022-05-30 00:00:00","2","","2022-05-30 18:38:53","2022-05-30 18:38:53");
INSERT INTO product_bonuses VALUES("7","10.00","100","2022-05-30 00:00:00","2022-05-30 00:00:00","2","","2022-05-30 18:38:56","2022-05-30 18:38:56");
INSERT INTO product_bonuses VALUES("8","3.00","10","2022-05-02 00:00:00","2022-08-29 00:00:00","2","1","2022-05-31 10:34:32","2022-05-31 10:34:32");
INSERT INTO product_bonuses VALUES("9","12.00","120","2022-05-31 00:00:00","2022-05-31 00:00:00","3","","2022-05-31 10:46:39","2022-05-31 10:46:39");



DROP TABLE product_categories;

CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_categories VALUES("1","tablet","2022-05-28 10:44:40","2022-05-28 10:44:40");
INSERT INTO product_categories VALUES("2","capsole","2022-05-28 10:44:49","2022-05-28 10:44:49");



DROP TABLE product_discounts;

CREATE TABLE `product_discounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `discount` double(8,2) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_discounts_product_id_index` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_discounts VALUES("1","2.00","2022-05-28 00:00:00","2022-05-28 00:00:00","1","0","2022-05-28 10:51:47","2022-05-28 10:51:47");
INSERT INTO product_discounts VALUES("2","3.00","2022-05-01 00:00:00","2022-08-29 00:00:00","1","1","2022-05-28 10:56:18","2022-05-28 10:56:18");
INSERT INTO product_discounts VALUES("3","9.00","2022-05-01 00:00:00","2022-06-29 00:00:00","1","1","2022-05-30 18:36:35","2022-05-30 18:36:35");
INSERT INTO product_discounts VALUES("4","9.00","2022-05-30 00:00:00","2022-05-30 00:00:00","2","","2022-05-30 18:39:11","2022-05-30 18:39:11");
INSERT INTO product_discounts VALUES("5","9.00","2022-05-01 00:00:00","2022-06-29 00:00:00","2","1","2022-05-31 10:34:32","2022-05-31 10:34:32");
INSERT INTO product_discounts VALUES("6","2.00","2022-05-31 00:00:00","2022-05-31 00:00:00","3","","2022-05-31 10:46:56","2022-05-31 10:46:56");



DROP TABLE product_groups;

CREATE TABLE `product_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_groups VALUES("1","local","2022-05-28 10:45:02","2022-05-28 10:45:02");
INSERT INTO product_groups VALUES("2","anestheizia","2022-05-28 10:45:17","2022-05-28 10:45:17");



DROP TABLE product_infos;

CREATE TABLE `product_infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE product_max_sal_quantities;

CREATE TABLE `product_max_sal_quantities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_max_sal_quantities_product_id_index` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_max_sal_quantities VALUES("1","100","2022-05-28","2022-05-28","1","2022-05-28 10:52:02","2022-05-28 10:52:02");
INSERT INTO product_max_sal_quantities VALUES("2","9","2022-05-30","2022-05-30","2","2022-05-30 18:39:23","2022-05-30 18:39:23");
INSERT INTO product_max_sal_quantities VALUES("3","12","2022-05-31","2022-05-31","3","2022-05-31 10:47:22","2022-05-31 10:47:22");



DROP TABLE product_types;

CREATE TABLE `product_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_types VALUES("1","pharma products","2022-05-28 10:44:10","2022-05-28 10:44:19");
INSERT INTO product_types VALUES("2","homopathic","2022-05-31 10:32:35","2022-05-31 10:32:35");



DROP TABLE products;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` int(11) DEFAULT NULL,
  `type_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `packet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int(10) unsigned DEFAULT NULL,
  `comp_artd_no` int(11) DEFAULT NULL,
  `group_seq` int(11) DEFAULT NULL,
  `comp_seq` int(11) DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAtive` tinyint(4) NOT NULL DEFAULT 0,
  `max_sale_disc` double(8,2) DEFAULT NULL,
  `purchase_price` double(8,2) DEFAULT NULL,
  `purchase_tax_type` double(8,2) DEFAULT NULL,
  `purchase_tax_value` double(8,2) DEFAULT NULL,
  `sale_tax_value` double(8,2) DEFAULT NULL,
  `re_order_level` int(11) DEFAULT NULL,
  `prod_shel_life_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_price` double(8,2) DEFAULT NULL,
  `purchase_disc_value` double(8,2) DEFAULT NULL,
  `purchase_discount` double(8,2) DEFAULT NULL,
  `purchase_rate` double(8,2) DEFAULT NULL,
  `purchase_tax` double(8,2) DEFAULT NULL,
  `inventory_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance_tax_type` double(8,2) DEFAULT NULL,
  `expire_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_flat_rate` double(8,2) DEFAULT NULL,
  `min_flat_rate` double(8,2) DEFAULT NULL,
  `adv_tax_filer` double(8,2) DEFAULT NULL,
  `adv_tax_non_filer` double(8,2) DEFAULT NULL,
  `adv_tax_supplier` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_type_id_index` (`type_id`),
  KEY `products_category_id_index` (`category_id`),
  KEY `products_group_id_index` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products VALUES("1","Panadol","pana","234","1","1","20","1","7","8789","897","12","0","2.00","100.00","3.00","2.00","2.00","3","20","80.00","5.00","2.00","50.00","4.00","10","2.00","50","15.00","10.00","5.00","2.00","3.00","2022-05-28 10:49:22","2022-06-11 06:47:22");
INSERT INTO products VALUES("2","disprine","disprine","98089","1","1","20","2","7","8789","897","6","0","3.00","100.00","3.00","2.00","2.00","8","20","110.00","7.00","2.00","50.00","4.00","8","7.00","50","15.00","10.00","8.00","7.00","3.00","2022-05-30 18:38:36","2022-05-30 18:38:36");
INSERT INTO products VALUES("3","flygel","flygel","323","1","1","987","2","7","8789","897","12","0","3.00","78.00","8.00","7.00","7.00","8","20","110.00","7.00","7.00","7.00","7.00","8","7.00","8","7.00","10.00","8.00","7.00","3.00","2022-05-31 10:46:19","2022-05-31 10:46:19");



DROP TABLE purchase_invoice_details;

CREATE TABLE `purchase_invoice_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `after_discout` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_invoice_detail_id` int(10) unsigned NOT NULL,
  `bonus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `dropt` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_invoice_details_branch_id_index` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO purchase_invoice_details VALUES("4","penadoll","10","100","2","","4","0","980","0","0","1","2022-05-28 11:18:14","2022-05-28 11:18:14");
INSERT INTO purchase_invoice_details VALUES("5","penadoll","20","100.00","2.00","","5","0","1960","","0","1","2022-05-30 18:33:30","2022-05-30 18:33:30");
INSERT INTO purchase_invoice_details VALUES("6","penadoll","4","100.00","2.00","","6","0","392","","0","1","2022-05-31 07:12:34","2022-05-31 07:12:34");
INSERT INTO purchase_invoice_details VALUES("7","penadoll","10","100.00","2.00","","7","0","980","","0","1","2022-05-31 07:17:23","2022-05-31 07:17:23");
INSERT INTO purchase_invoice_details VALUES("8","penadoll","10","100.00","2.00","","8","0","980","","0","1","2022-05-31 07:18:02","2022-05-31 07:18:02");
INSERT INTO purchase_invoice_details VALUES("9","disprine","20","100.00","2.00","","9","0","1960","","0","2","2022-05-31 10:11:44","2022-05-31 10:11:44");
INSERT INTO purchase_invoice_details VALUES("10","flygel","1","78.00","7.00","","10","0","71","","0","3","2022-05-31 16:40:04","2022-05-31 16:40:04");
INSERT INTO purchase_invoice_details VALUES("11","penadoll","22","100.00","2.00","","11","0","2156","","0","1","2022-06-02 10:16:53","2022-06-02 10:16:53");
INSERT INTO purchase_invoice_details VALUES("12","disprine","20","100.00","2.00","","12","0","1960","","0","2","2022-06-02 10:17:19","2022-06-02 10:17:19");
INSERT INTO purchase_invoice_details VALUES("13","disprine","10","100.00","2.00","","13","0","980","","0","2","2022-06-02 10:35:25","2022-06-02 10:35:25");
INSERT INTO purchase_invoice_details VALUES("14","Panadol","1","100.00","2.00","","14","0","98","","0","1","2022-07-18 14:58:59","2022-07-18 14:58:59");
INSERT INTO purchase_invoice_details VALUES("15","disprine","1","100.00","2.00","","14","0","98","","0","2","2022-07-18 14:58:59","2022-07-18 14:58:59");



DROP TABLE purchase_invoices;

CREATE TABLE `purchase_invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `suplier_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `dropt` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_invoices_branch_id_index` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO purchase_invoices VALUES("4","7426","2022-05-28","1","1","assdf","","980","1","0","2022-05-28 11:18:14","2022-05-28 11:18:14");
INSERT INTO purchase_invoices VALUES("5","3000","2022-05-30","1","1","new add","","1960","1","0","2022-05-30 18:33:30","2022-05-30 18:33:30");
INSERT INTO purchase_invoices VALUES("6","7561","2022-05-31","3","1","a","","392","1","0","2022-05-31 07:12:34","2022-05-31 07:12:34");
INSERT INTO purchase_invoices VALUES("7","2500","2022-05-31","3","1","a","","980","1","0","2022-05-31 07:17:23","2022-05-31 07:17:23");
INSERT INTO purchase_invoices VALUES("8","1132","2022-05-31","3","1","a","","980","1","0","2022-05-31 07:18:02","2022-05-31 07:18:02");
INSERT INTO purchase_invoices VALUES("9","7125","2022-05-31","2","1","niecc","","1960","1","0","2022-05-31 10:11:44","2022-05-31 10:11:44");
INSERT INTO purchase_invoices VALUES("10","690","2022-05-31","2","1","a","","71","1","0","2022-05-31 16:40:04","2022-05-31 16:40:04");
INSERT INTO purchase_invoices VALUES("11","1651","2022-06-02","2","1","","","2156","1","0","2022-06-02 10:16:53","2022-06-02 10:16:53");
INSERT INTO purchase_invoices VALUES("12","4252","2022-06-02","2","1","","","1960","1","0","2022-06-02 10:17:19","2022-06-02 10:17:19");
INSERT INTO purchase_invoices VALUES("13","4012","2022-06-02","2","1","","","980","1","0","2022-06-02 10:35:25","2022-06-02 10:35:25");
INSERT INTO purchase_invoices VALUES("14","3344","2022-07-18","8","1","","","196","1","0","2022-07-18 14:58:59","2022-07-18 14:58:59");



DROP TABLE regions;

CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 0,
  `city_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regions_region_id_index` (`region_id`),
  KEY `regions_city_id_index` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO regions VALUES("2","kda","324","","1","2","2022-05-31 10:28:13","2022-07-05 07:24:39");
INSERT INTO regions VALUES("3","gate no 2","34","2","1","2","2022-05-31 10:28:42","2022-05-31 10:28:42");
INSERT INTO regions VALUES("4","g3","4534","2","1","2","2022-05-31 11:30:57","2022-05-31 11:30:57");
INSERT INTO regions VALUES("7","ABC","111","2","1","2","2022-07-05 07:27:21","2022-07-05 07:29:00");



DROP TABLE role_user;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO role_user VALUES("1","1","App\\Models\\User");



DROP TABLE roles;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO roles VALUES("1","Role 1","Role 1","nothing special","1","2022-05-31 07:22:36","2022-05-31 07:22:36");



DROP TABLE sale_invoice_details;

CREATE TABLE `sale_invoice_details` (
  `id` int(10) unsigned NOT NULL,
  `item` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `after_discount` int(11) NOT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `sale_invoice_id` int(10) unsigned DEFAULT NULL,
  `bonus` int(11) NOT NULL,
  `line_total` int(11) NOT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO sale_invoice_details VALUES("0","penadoll","1","100","2","98","1","3","0","98","0","2022-05-28 22:44:43","2022-05-28 22:44:43");
INSERT INTO sale_invoice_details VALUES("0","penadoll","2","100","2","98","1","4","0","196","0","2022-05-28 22:53:30","2022-05-28 22:53:30");
INSERT INTO sale_invoice_details VALUES("0","penadoll","2","100","2","98","1","5","0","196","","2022-05-30 18:03:43","2022-05-30 18:03:43");
INSERT INTO sale_invoice_details VALUES("0","penadoll","2","100","2","98","1","6","0","196","","2022-05-31 10:13:05","2022-05-31 10:13:05");
INSERT INTO sale_invoice_details VALUES("0","penadoll","23","100","2","98","1","7","0","2254","","2022-05-31 16:47:48","2022-05-31 16:47:48");
INSERT INTO sale_invoice_details VALUES("0","penadoll","2","40","2","38","1","8","0","76","","2022-06-02 10:11:18","2022-06-02 10:11:18");
INSERT INTO sale_invoice_details VALUES("0","penadoll","41","33","2","31","1","9","0","1271","","2022-06-02 11:13:39","2022-06-02 11:13:39");
INSERT INTO sale_invoice_details VALUES("0","disprine","11","100","2","98","2","10","0","98","","2022-06-07 05:50:21","2022-06-07 05:50:21");
INSERT INTO sale_invoice_details VALUES("0","Panadol","1","100","2","98","1","11","0","98","","2022-07-05 07:34:32","2022-07-05 07:34:32");
INSERT INTO sale_invoice_details VALUES("0","Panadol","23","100","2","98","1","12","0","2254","","2022-07-05 07:35:10","2022-07-05 07:35:10");
INSERT INTO sale_invoice_details VALUES("0","Panadol","1","33","3","31","1","13","0","31","","2022-07-13 08:53:10","2022-07-13 08:53:10");
INSERT INTO sale_invoice_details VALUES("0","Panadol","1","100","2","98","1","14","0","98","","2022-07-18 17:37:11","2022-07-18 17:37:11");



DROP TABLE sale_invoices;

CREATE TABLE `sale_invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dropt` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `branch_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_invoices_branch_id_index` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sale_invoices VALUES("5","5305","2022-05-30","1","2","okk","196","","0","1","2022-05-30 18:03:43","2022-05-30 18:03:43");
INSERT INTO sale_invoices VALUES("6","791","2022-05-31","2","2","okkee","196","","0","1","2022-05-31 10:13:05","2022-05-31 10:13:05");
INSERT INTO sale_invoices VALUES("7","5291","2022-05-31","2","1","a","2254","","0","1","2022-05-31 16:47:48","2022-05-31 16:47:48");
INSERT INTO sale_invoices VALUES("8","5558","2022-06-02","2","2","","76","","0","1","2022-06-02 10:11:18","2022-06-02 10:11:18");
INSERT INTO sale_invoices VALUES("9","8031","2022-06-02","2","1","","1271","","0","1","2022-06-02 11:13:39","2022-06-02 11:13:39");
INSERT INTO sale_invoices VALUES("10","6243","2022-06-07","2","2","","98","","0","1","2022-06-07 05:50:21","2022-06-07 05:50:21");
INSERT INTO sale_invoices VALUES("11","1353","2022-07-05","3","1","","98","","0","1","2022-07-05 07:34:32","2022-07-05 07:34:32");
INSERT INTO sale_invoices VALUES("12","490","2022-07-05","3","1","","2254","","0","1","2022-07-05 07:35:10","2022-07-05 07:35:10");
INSERT INTO sale_invoices VALUES("13","2613","2022-07-13","3","0","","31","","0","1","2022-07-13 08:53:10","2022-07-13 08:53:10");
INSERT INTO sale_invoices VALUES("14","3634","2022-07-18","8","0","","98","","0","1","2022-07-18 17:37:11","2022-07-18 17:37:11");



DROP TABLE stocks;

CREATE TABLE `stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `batch_id` int(89) DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stocks_product_id_index` (`product_id`),
  KEY `stocks_branch_id_index` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO stocks VALUES("1","-26","33.00","1","1","1","0000-00-00 00:00:00","2022-05-28 11:08:06","2022-07-18 17:37:11");
INSERT INTO stocks VALUES("2","23","100.00","2","1","1","0000-00-00 00:00:00","2022-05-28 11:14:02","2022-05-28 11:14:02");
INSERT INTO stocks VALUES("3","10","100.00","3","1","1","0000-00-00 00:00:00","2022-05-28 11:15:03","2022-05-28 11:15:03");
INSERT INTO stocks VALUES("4","10","50.00","4","1","1","0000-00-00 00:00:00","2022-05-28 11:18:14","2022-05-28 11:18:14");
INSERT INTO stocks VALUES("5","20","30.00","5","1","1","","2022-05-30 18:33:30","2022-05-30 18:33:30");
INSERT INTO stocks VALUES("6","4","40.00","7","1","1","","2022-05-31 07:12:34","2022-05-31 07:12:34");
INSERT INTO stocks VALUES("7","10","100.00","9","1","1","","2022-05-31 07:17:23","2022-05-31 07:17:23");
INSERT INTO stocks VALUES("8","10","20.00","10","1","1","","2022-05-31 07:18:02","2022-05-31 07:18:02");
INSERT INTO stocks VALUES("9","9","100.00","11","2","1","","2022-05-31 10:11:44","2022-06-07 05:50:21");
INSERT INTO stocks VALUES("10","1","78.00","14","3","1","","2022-05-31 16:40:04","2022-05-31 16:40:04");
INSERT INTO stocks VALUES("11","22","100.00","16","1","1","","2022-06-02 10:16:53","2022-06-02 10:16:53");
INSERT INTO stocks VALUES("12","20","100.00","17","2","1","","2022-06-02 10:17:19","2022-06-02 10:17:19");
INSERT INTO stocks VALUES("13","10","100.00","18","2","1","","2022-06-02 10:35:25","2022-06-02 10:35:25");
INSERT INTO stocks VALUES("14","1","100.00","19","1","1","","2022-07-18 14:58:59","2022-07-18 14:58:59");
INSERT INTO stocks VALUES("15","1","100.00","19","2","1","","2022-07-18 14:58:59","2022-07-18 14:58:59");



DROP TABLE store_transfer_details;

CREATE TABLE `store_transfer_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `from_branch_id` int(10) unsigned DEFAULT NULL,
  `to_branch_id` int(10) unsigned DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `store_transfer_id` int(10) unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `store_transfer_details_product_id_index` (`product_id`),
  KEY `store_transfer_details_from_branch_id_index` (`from_branch_id`),
  KEY `store_transfer_details_to_branch_id_index` (`to_branch_id`),
  KEY `store_transfer_details_store_transfer_id_index` (`store_transfer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO store_transfer_details VALUES("1","1","100.00","1","1","1","2022-05-28 00:00:00","1","okkk","2022-05-28 11:21:12","2022-05-28 11:21:12");
INSERT INTO store_transfer_details VALUES("2","3","100.00","1","1","1","2022-05-29 00:00:00","2","transfer items","2022-05-30 18:34:55","2022-05-30 18:34:55");



DROP TABLE store_transfers;

CREATE TABLE `store_transfers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `from_branch_id` int(10) unsigned DEFAULT NULL,
  `to_branch_id` int(10) unsigned DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `store_transfers_product_id_index` (`product_id`),
  KEY `store_transfers_from_branch_id_index` (`from_branch_id`),
  KEY `store_transfers_to_branch_id_index` (`to_branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO store_transfers VALUES("1","1","100.00","1","1","1","2022-05-28 00:00:00","okkk","2022-05-28 11:21:12","2022-05-28 11:21:12");
INSERT INTO store_transfers VALUES("2","3","100.00","1","1","1","2022-05-29 00:00:00","transfer items","2022-05-30 18:34:55","2022-05-30 18:34:55");



DROP TABLE stores;

CREATE TABLE `stores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stores_branch_id_index` (`branch_id`),
  CONSTRAINT `stores_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE suppliers;

CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 0,
  `group_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suppliers_city_id_index` (`city_id`),
  KEY `suppliers_group_id_index` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO suppliers VALUES("1","saad","6768","kohat","1","03442900411","5435","saad@gmail.com","urlsite","note","1","1","2022-05-28 11:07:09","2022-05-28 11:07:09");



DROP TABLE taxes;

CREATE TABLE `taxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tax_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE users;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL DEFAULT 1,
  `branch_id` int(55) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","jan","jan@gmail.com","0000-00-00 00:00:00","$2y$10$KOEJM8b68NKHFSHDY5t29uPz8oNlSdVVTvCd1269tdWd7GcNiDd4G","/images/1653843970.JPG","1","1","","2022-05-29 08:06:10","2022-05-29 08:06:10");
INSERT INTO users VALUES("2","waleed","waleed@gmail.com","","$2y$10$QGjFBgZE3Fupneehp8k6.u8UFvDyN9bHt0uTq8hxFiteeQ8C0Ehd.","/images/1653936057.JPG","1","1","","2022-05-30 18:40:57","2022-05-30 18:40:57");
INSERT INTO users VALUES("3","The Studio","waleedfancy@gmail.com","","$2y$10$5iT4FJ.vOSUzL2SVFB6sqe4Y9Q2Cr8Ajg9EgzvcKh4ilYnDnSsWOm","","1","1","","2022-05-31 07:08:06","2022-05-31 07:08:06");
INSERT INTO users VALUES("4","testing3","testing3@gmail.com","","$2y$10$O4GWa2jCEFK3i.K5c/amKOCzrDYbWbJ8IMDmA1RFu/KC2FK3kfhL2","","1","1","","2022-06-25 07:23:12","2022-06-25 07:23:12");
INSERT INTO users VALUES("5","muhammadali@haroonenterprises.com","muhammadali@haroonenterprises.com","","$2y$10$ZHf61kpmIyd06JD8aK7qx.g5x.WwmhUQJO.IR.c/bl0rGuXUE75/a","","1","0","","2022-07-12 15:29:20","2022-07-12 15:29:20");
INSERT INTO users VALUES("6","Faisal22","faisalafridi574@gmail.com","","$2y$10$wkvVfZnWzwrXrzbQ6BOkCOnHONKixu8K9A3.ZpZ/w8ad678saEt7O","","1","1","","2022-07-16 13:43:05","2022-07-16 13:43:05");
INSERT INTO users VALUES("7","sunnan95","sunnan.fazal95@hotmail.com","","$2y$10$7T80U5MswazyBmvYFX8YzuZHVNGiBwK22Sxnb9fGliERjW.V2uJH.","","1","2","","2022-07-18 11:53:44","2022-07-18 11:53:44");
INSERT INTO users VALUES("8","Muhammad Salman Atta","salmanatta123@gmail.com","","$2y$10$IpY1d7csG0tzL2VVA2v3V.aZWwf6tRJq4pEHDqdVF2aTjO.uHUENy","/images/1658149962.jpg","1","1","","2022-07-18 13:12:42","2022-07-18 13:12:42");



