DROP TABLE batches;

CREATE TABLE `batches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `batch_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO batches VALUES("1","Batch-","2022-05-18","2022-05-18 16:35:45","2022-05-18 16:35:45");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO branches VALUES("1","NIC","9799","1","2022-05-18 16:21:01","2022-05-18 16:21:01","1");



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

INSERT INTO cities VALUES("1","peshawar","34534","1","2022-05-18 16:23:11","2022-05-18 16:23:11");
INSERT INTO cities VALUES("2","kohat","4556","1","2022-05-18 16:23:31","2022-05-18 16:23:31");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO companies VALUES("1","laravel company","khan@gmail.com","03442900411","5435","kohat","CIT-Skill.jpeg","1","2022-05-18 16:20:29","2022-05-18 16:20:29");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO customer_document_regs VALUES("1","4545","987","879","987","No","0","05182022043127pm.docx","1","2022-05-18 16:31:27","2022-05-18 16:31:27");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO customer_licenses VALUES("1","for13","05182022043127pm.jpeg","2022-05-18","1","1","2022-05-18 16:31:27","2022-05-18 16:31:27");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO customers VALUES("1","khan jan","34354","1","kohat","03442900411","03442900411","5435","khan@gmail.com","25000","344","","0","1","","","","1","1","1","2022-05-18 16:31:27","2022-05-18 16:31:27");



DROP TABLE designations;

CREATE TABLE `designations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO designations VALUES("1","cheif exactive","2022-05-18 16:25:55","2022-05-18 16:25:55");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO employees VALUES("1","1","khalid","03442900411","jan","kohat","03442900411","03442900411","5435","khan@gmail.com","1","25000","344","khalid","03442900411","2022-05-05","2022-05-02","30000.00","0","2022-05-03","2022-05-18 16:27:03","2022-05-18 16:27:03");



DROP TABLE expense_categories;

CREATE TABLE `expense_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO expense_categories VALUES("1","food","2022-05-18 16:17:35","2022-05-18 16:17:35");
INSERT INTO expense_categories VALUES("2","salary","2022-05-18 16:17:46","2022-05-18 16:17:46");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO expenses VALUES("1","salaam","300","2022-05-18","ok good","2","2022-05-18 16:18:15","2022-05-18 16:18:15");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO general_bonuses VALUES("1","3.00","20","2022-05-04","2022-05-28","2022-05-18 16:28:53","2022-05-18 16:28:53");



DROP TABLE general_discounts;

CREATE TABLE `general_discounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `discount` double(8,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO general_discounts VALUES("1","9.00","2022-05-03","2022-05-31","2022-05-18 16:29:11","2022-05-18 16:29:11");



DROP TABLE groups;

CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO groups VALUES("1","NIC group","2022-05-18 16:25:00","2022-05-18 16:25:00");
INSERT INTO groups VALUES("2","pharmay grop","2022-05-18 16:25:27","2022-05-18 16:25:27");



DROP TABLE license_types;

CREATE TABLE `license_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO license_types VALUES("1","form8","2022-05-18 16:27:19","2022-05-18 16:27:19");



DROP TABLE logs;

CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_date` date NOT NULL,
  `action_time` time NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO logs VALUES("1","Store"," id 1","2022-05-18","16:17:35","1");
INSERT INTO logs VALUES("2","Store"," id 2","2022-05-18","16:17:46","1");
INSERT INTO logs VALUES("3","Store","Company id 1","2022-05-18","16:18:15","1");
INSERT INTO logs VALUES("4","Store","Company id 1","2022-05-18","16:20:29","1");
INSERT INTO logs VALUES("5","Store","Branch id 1","2022-05-18","16:21:01","1");
INSERT INTO logs VALUES("6","Store","Region id 1","2022-05-18","16:24:07","4");
INSERT INTO logs VALUES("7","Store","Region id 2","2022-05-18","16:24:34","4");



DROP TABLE migrations;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES("1","2012_11_21_120726_create_companies_table","1");
INSERT INTO migrations VALUES("2","2014_10_12_000000_create_users_table","1");
INSERT INTO migrations VALUES("3","2014_10_12_100000_create_password_resets_table","1");
INSERT INTO migrations VALUES("4","2019_08_19_000000_create_failed_jobs_table","1");
INSERT INTO migrations VALUES("5","2021_11_17_154040_create_product_groups_table","1");
INSERT INTO migrations VALUES("6","2021_11_23_051843_create_customers_table","1");
INSERT INTO migrations VALUES("7","2021_11_23_052419_create_products_table","1");
INSERT INTO migrations VALUES("8","2021_11_23_052511_create_suppliers_table","1");
INSERT INTO migrations VALUES("9","2021_11_23_052539_create_cities_table","1");
INSERT INTO migrations VALUES("10","2021_11_23_052621_create_regions_table","1");
INSERT INTO migrations VALUES("11","2021_11_23_052641_create_groups_table","1");
INSERT INTO migrations VALUES("12","2021_11_23_052715_create_employees_table","1");
INSERT INTO migrations VALUES("13","2021_11_23_052851_create_branches_table","1");
INSERT INTO migrations VALUES("14","2021_11_24_133343_create_designations_table","1");
INSERT INTO migrations VALUES("15","2021_11_26_173751_create_distributors_table","1");
INSERT INTO migrations VALUES("16","2021_12_03_201358_create_license_types_table","1");
INSERT INTO migrations VALUES("17","2021_12_03_201450_create_customer_licenses_table","1");
INSERT INTO migrations VALUES("18","2021_12_03_202449_create_customer_document_regs_table","1");
INSERT INTO migrations VALUES("19","2021_12_04_171501_create_customer_categories_table","1");
INSERT INTO migrations VALUES("20","2021_12_10_183750_create_product_categories_table","1");
INSERT INTO migrations VALUES("21","2021_12_10_184725_create_product_types_table","1");
INSERT INTO migrations VALUES("22","2021_12_15_045245_create_product_infos_table","1");
INSERT INTO migrations VALUES("23","2021_12_15_045632_create_product_discounts_table","1");
INSERT INTO migrations VALUES("24","2021_12_15_045715_create_product_max_sal_quantities_table","1");
INSERT INTO migrations VALUES("25","2021_12_15_050046_create_product_bonuses_table","1");
INSERT INTO migrations VALUES("26","2021_12_22_174630_create_logs_table","1");
INSERT INTO migrations VALUES("27","2021_12_25_154712_create_general_bonuses_table","1");
INSERT INTO migrations VALUES("28","2021_12_25_155308_create_general_discounts_table","1");
INSERT INTO migrations VALUES("29","2021_12_27_142339_laratrust_setup_tables","1");
INSERT INTO migrations VALUES("30","2022_02_15_170525_create_sale_invoices_table","1");
INSERT INTO migrations VALUES("31","2022_02_15_170745_create_sale_invoice_details_table","1");
INSERT INTO migrations VALUES("32","2022_02_18_071317_create_purchases_table","1");
INSERT INTO migrations VALUES("33","2022_02_18_125257_create_purchase_invoices_table","1");
INSERT INTO migrations VALUES("34","2022_02_18_132358_create_purchase_invoice_details_table","1");
INSERT INTO migrations VALUES("35","2022_02_21_170034_create_store_transfers_table","1");
INSERT INTO migrations VALUES("36","2022_02_21_170147_create_store_transfer_details_table","1");
INSERT INTO migrations VALUES("37","2022_02_24_093519_create_batches_table","1");
INSERT INTO migrations VALUES("38","2022_02_25_102836_create_stocks_table","1");
INSERT INTO migrations VALUES("39","2022_04_24_210718_create_expenses_table","1");
INSERT INTO migrations VALUES("40","2022_04_24_210741_create_expense_categories_table","1");



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
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_bonuses_product_id_index` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_bonuses VALUES("1","10.00","30","2022-05-01","2022-05-18","1","","2022-05-18 16:34:12","2022-05-18 16:34:12");
INSERT INTO product_bonuses VALUES("2","3.00","20","2022-05-04","2022-05-28","1","1","2022-05-18 16:34:47","2022-05-18 16:34:47");



DROP TABLE product_categories;

CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_categories VALUES("1","product category","2022-05-18 16:28:03","2022-05-18 16:28:03");



DROP TABLE product_discounts;

CREATE TABLE `product_discounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `discount` double(8,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_discounts_product_id_index` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_discounts VALUES("1","9.00","2022-05-03","2022-05-31","1","1","2022-05-18 16:34:47","2022-05-18 16:34:47");



DROP TABLE product_groups;

CREATE TABLE `product_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_groups VALUES("1","phamacy group","2022-05-18 16:28:28","2022-05-18 16:28:28");



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE product_types;

CREATE TABLE `product_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO product_types VALUES("1","homopathic","2022-05-18 16:27:41","2022-05-18 16:27:41");



DROP TABLE products;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genral_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` int(11) DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `type_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `packet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `tax3_value` double(8,2) DEFAULT NULL,
  `purchase_discount` double(8,2) DEFAULT NULL,
  `purchase_rate` double(8,2) DEFAULT NULL,
  `purchase_tax` double(8,2) DEFAULT NULL,
  `inventory_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax3_type` double(8,2) DEFAULT NULL,
  `advance_tax_type` double(8,2) DEFAULT NULL,
  `expire_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_balance` double(8,2) DEFAULT NULL,
  `max_flat_rate` double(8,2) DEFAULT NULL,
  `min_flat_rate` double(8,2) DEFAULT NULL,
  `adv_tax_filer` double(8,2) DEFAULT NULL,
  `adv_tax_non_filer` double(8,2) DEFAULT NULL,
  `adv_tax_supplier` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_product_id_index` (`product_id`),
  KEY `products_type_id_index` (`type_id`),
  KEY `products_category_id_index` (`category_id`),
  KEY `products_group_id_index` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products VALUES("1","penadoll","pena","","789","","1","1","987","","1","7","8789","897","6","0","6.00","78.00","8.00","7.00","7.00","8","7","89.00","7.00","","7.00","7.00","7.00","8","","7.00","8","","7.00","78.00","8.00","7.00","8.00","2022-05-18 16:33:52","2022-05-18 16:33:52");



DROP TABLE purchase_invoice_details;

CREATE TABLE `purchase_invoice_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `after_discount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_invoice_detail_id` int(10) unsigned NOT NULL,
  `bonus` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_invoice_details_branch_id_index` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO purchase_invoice_details VALUES("1","penadoll","1","78","7","71","1","0","71","","2022-05-18 16:35:45","2022-05-18 16:35:45");



DROP TABLE purchase_invoices;

CREATE TABLE `purchase_invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `suplier_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dropt` tinyint(4) DEFAULT 0,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_invoices_branch_id_index` (`branch_id`),
  KEY `purchase_invoices_product_id_index` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO purchase_invoices VALUES("1","2133","2022-05-18","4","1","okkk","","71","0","1","","2022-05-18 16:35:45","2022-05-18 16:35:45");



DROP TABLE purchases;

CREATE TABLE `purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO regions VALUES("1","NIC peshawar","899","","1","1","2022-05-18 16:24:07","2022-05-18 16:24:07");
INSERT INTO regions VALUES("2","kohat KDA","34","","1","2","2022-05-18 16:24:34","2022-05-18 16:24:34");



DROP TABLE role_user;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE sale_invoice_details;

CREATE TABLE `sale_invoice_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_invoice_details_product_id_index` (`product_id`),
  KEY `sale_invoice_details_sale_invoice_id_index` (`sale_invoice_id`),
  KEY `sale_invoice_details_branch_id_index` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sale_invoice_details VALUES("1","penadoll","1","78","7","71","1","1","0","71","","2022-05-18 16:36:50","2022-05-18 16:36:50");



DROP TABLE sale_invoices;

CREATE TABLE `sale_invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_invoices_user_id_index` (`user_id`),
  KEY `sale_invoices_customer_id_index` (`customer_id`),
  KEY `sale_invoices_branch_id_index` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO sale_invoices VALUES("1","5326","2022-05-18","okkk","71","0","4","1","1","2022-05-18 16:36:50","2022-05-18 16:36:50");



DROP TABLE stocks;

CREATE TABLE `stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `batch_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stocks_batch_id_index` (`batch_id`),
  KEY `stocks_product_id_index` (`product_id`),
  KEY `stocks_branch_id_index` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO stocks VALUES("1","0","78.00","1","1","1","","2022-05-18 16:35:45","2022-05-18 16:36:50");



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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

INSERT INTO suppliers VALUES("1","salaam","8799","kohat","2","03442900411","5435","khan@gmail.com","url","okkk","1","2","2022-05-18 16:32:03","2022-05-18 16:32:03");



DROP TABLE users;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL DEFAULT 1,
  `branch_id` int(55) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("1","Admin","admin@gmail.com","","$2y$10$lhjuf5WnNV9BjKb5lQIS2uGeO4nIvrTavgmu2Rh4XHGMaqvD6m2Bu","/images/1646761714.jpeg","1","0","","2022-03-08 04:48:34","2022-03-08 04:48:34");
INSERT INTO users VALUES("2","muhammadali@haroonenterprises.com","muhammadali@haroonenterprises.com","","$2y$10$eYS4C2YAN6nBe0MwFxUb0urT8Y8y9IuuEGWsH8QrNgjvtzgvdO8Xu","","1","0","","2022-03-26 03:34:31","2022-03-26 03:34:31");
INSERT INTO users VALUES("3","waleed","waleedfancy@gmail.com","","$2y$10$ShKE41mQjiVSnTs7.EjfxeEJxP.uknoErMQhU11qksmGBx9aBwbWa","","1","1","","2022-04-03 14:41:45","2022-04-03 14:41:45");
INSERT INTO users VALUES("4","khan","khan@gmail.com","","$2y$10$JVgMS0f2wCoJ3R3YG2vCbueXq00tySEnW50DunwVuLuO9eyBQt7AK","/images/1652890906.jpeg","1","1","","2022-05-18 16:21:46","2022-05-18 16:21:46");



