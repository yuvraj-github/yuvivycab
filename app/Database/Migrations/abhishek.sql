CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`) VALUES
(1, 'Abhishek', 'Verma', 'abhishek@gmail.com', '123', '9592660455'),
(2, 'Deepak', 'Verma', 'deepak@gmail.com', '123', '9592660455');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `creation_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updation_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `status`, `creation_date`, `created_by`, `updation_date`, `updated_by`) VALUES
(1, 'Admin', 'active', '2022-03-24 13:35:29', 1, '0000-00-00 00:00:00', 0),
(3, 'User updated', 'in-active', '2022-03-27 09:05:08', 2, '2022-03-28 13:39:27', 1),
(4, 'Driver', 'active', '2022-03-28 08:03:23', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_permission_mapping`
--

CREATE TABLE `group_permission_mapping` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `controller`, `order`) VALUES
(1, 'dashboard', 'dashboard', 1),
(2, 'users', 'users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(55) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active',
  `display_group_id` int(11) NOT NULL,
  `display_order` int(11) NOT NULL,
  `display_app_type` varchar(255) NOT NULL DEFAULT 'All'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `status`, `display_group_id`, `display_order`, `display_app_type`) VALUES
(1, 'view-site-statistics', 'Active', 11, 0, 'All'),
(2, 'view-admin', 'Active', 4, 0, 'All'),
(3, 'create-admin', 'Active', 4, 0, 'All'),
(4, 'edit-admin', 'Active', 4, 0, 'All'),
(5, 'delete-admin', 'Active', 4, 0, 'All'),
(6, 'view-company', 'Active', 3, 0, 'All'),
(7, 'create-company', 'Active', 3, 0, 'All'),
(8, 'edit-company', 'Active', 3, 0, 'All'),
(9, 'delete-company', 'Active', 3, 0, 'All'),
(10, 'view-providers', 'Active', 2, 0, 'All'),
(11, 'create-providers', 'Active', 2, 0, 'All'),
(12, 'edit-providers', 'Active', 2, 0, 'All'),
(13, 'delete-providers', 'Active', 2, 0, 'All'),
(14, 'manage-vehicles', 'Active', 8, 0, 'All'),
(15, 'view-provider-taxis', 'Active', 2, 0, 'All'),
(16, 'create-provider-taxis', 'Active', 2, 0, 'All'),
(17, 'edit-provider-taxis', 'Active', 2, 0, 'All'),
(18, 'delete-provider-taxis', 'Active', 2, 0, 'All'),
(19, 'view-vehicle-type', 'Active', 8, 0, 'All'),
(20, 'create-vehicle-type', 'Active', 8, 0, 'All'),
(21, 'edit-vehicle-type', 'Active', 8, 0, 'All'),
(22, 'delete-vehicle-type', 'Active', 8, 0, 'All'),
(23, 'view-rental-packages', 'Active', 8, 0, 'All'),
(24, 'create-rental-packages', 'Active', 8, 0, 'All'),
(25, 'edit-rental-packages', 'Active', 8, 0, 'All'),
(26, 'delete-rental-packages', 'Active', 8, 0, 'All'),
(27, 'manage-services', 'Active', 9, 0, 'All'),
(28, 'view-service-category', 'Active', 9, 0, 'All'),
(29, 'create-service-category', 'Active', 9, 0, 'All'),
(30, 'edit-service-category', 'Active', 9, 0, 'All'),
(31, 'delete-service-category', 'Active', 9, 0, 'All'),
(32, 'view-service-type', 'Active', 9, 0, 'Ride,,UberX,Ride-Delivery-UberX,Foodonly,Deliverall'),
(33, 'create-service-type', 'Active', 9, 0, 'Ride,UberX,Ride-Delivery-UberX,Foodonly,Deliverall'),
(34, 'edit-service-type', 'Active', 9, 0, 'Ride,UberX,Ride-Delivery-UberX,Foodonly,Deliverall'),
(35, 'delete-service-type', 'Active', 9, 0, 'Ride,UberX,Ride-Delivery-UberX,Foodonly,Deliverall'),
(36, 'view-service-users', 'Deleted', 11, 0, 'All'),
(37, 'create-service-users', 'Deleted', 11, 0, 'All'),
(38, 'edit-service-users', 'Deleted', 11, 0, 'All'),
(39, 'delete-service-users', 'Deleted', 11, 0, 'All'),
(40, 'manage-manual-booking', 'Active', 11, 0, 'All'),
(41, 'manage-trip-jobs', 'Active', 11, 0, 'All'),
(42, 'manage-ride-job-later-bookings', 'Active', 11, 0, 'All'),
(43, 'view-promocode', 'Active', 11, 0, 'All'),
(44, 'create-promocode', 'Active', 11, 0, 'All'),
(45, 'edit-promocode', 'Active', 11, 0, 'All'),
(46, 'delete-promocode', 'Active', 11, 0, 'All'),
(47, 'manage-gods-view', 'Active', 11, 0, 'All'),
(48, 'manage-heat-view', 'Active', 11, 0, 'All'),
(49, 'manage-reviews', 'Active', 11, 0, 'All'),
(50, 'delete-reviews', 'Inactive', 11, 0, 'All'),
(51, 'manage-report', 'Active', 12, 0, 'All'),
(52, 'manage-payment-report', 'Active', 12, 0, 'All'),
(53, 'manage-referral-report', 'Active', 12, 0, 'All'),
(54, 'manage-user-wallet-report', 'Active', 12, 0, 'All'),
(55, 'manage-provider-payment-report', 'Active', 12, 0, 'All'),
(56, 'manage-provider-log-report', 'Active', 12, 0, 'All'),
(57, 'manage-cancelled-trip-job-report', 'Active', 12, 0, 'All'),
(58, 'manage-trip-job-request-acceptance-report', 'Active', 12, 0, 'All'),
(59, 'manage-trip-job-time-variance-report', 'Active', 12, 0, 'All'),
(60, 'manage-locations', 'Active', 7, 0, 'All'),
(61, 'view-geo-fence-locations', 'Active', 7, 0, 'All'),
(62, 'create-geo-fence-locations', 'Active', 7, 0, 'All'),
(63, 'edit-geo-fence-locations', 'Active', 7, 0, 'All'),
(64, 'delete-geo-fence-locations', 'Active', 7, 0, 'All'),
(65, 'view-restricted-area', 'Active', 7, 0, 'All'),
(66, 'create-restricted-area', 'Active', 7, 0, 'All'),
(67, 'edit-restricted-area', 'Active', 7, 0, 'All'),
(68, 'delete-restricted-area', 'Active', 7, 0, 'All'),
(69, 'view-location-wise-fare', 'Active', 7, 0, 'All'),
(70, 'create-location-wise-fare', 'Active', 7, 0, 'All'),
(71, 'edit-location-wise-fare', 'Active', 7, 0, 'All'),
(72, 'delete-location-wise-fare', 'Active', 7, 0, 'All'),
(73, 'manage-settings', 'Active', 6, 0, 'All'),
(74, 'manage-general-settings', 'Active', 6, 0, 'All'),
(75, 'view-email-templates', 'Active', 6, 0, 'All'),
(76, 'edit-email-templates', 'Active', 6, 0, 'All'),
(77, 'view-sms-templates', 'Active', 6, 0, 'All'),
(78, 'edit-sms-templates', 'Active', 6, 0, 'All'),
(79, 'view-documents', 'Active', 6, 0, 'All'),
(80, 'create-documents', 'Active', 6, 0, 'All'),
(81, 'edit-documents', 'Active', 6, 0, 'All'),
(82, 'delete-documents', 'Active', 6, 0, 'All'),
(83, 'view-general-label', 'Active', 6, 0, 'All'),
(84, 'create-general-label', 'Active', 6, 0, 'All'),
(85, 'edit-general-label', 'Active', 6, 0, 'All'),
(86, 'manage-currency', 'Active', 6, 0, 'All'),
(87, 'view-seo-setting', 'Active', 6, 0, 'All'),
(88, 'edit-seo-setting', 'Active', 6, 0, 'All'),
(89, 'manage-utility', 'Active', 5, 0, 'All'),
(90, 'manage-localization', 'Active', 5, 0, 'All'),
(91, 'view-country', 'Active', 5, 0, 'All'),
(92, 'create-country', 'Active', 5, 0, 'All'),
(93, 'edit-country', 'Active', 5, 0, 'All'),
(94, 'delete-country', 'Active', 5, 0, 'All'),
(95, 'view-state', 'Active', 5, 0, 'All'),
(96, 'create-state', 'Active', 5, 0, 'All'),
(97, 'edit-state', 'Active', 5, 0, 'All'),
(98, 'delete-state', 'Active', 5, 0, 'All'),
(99, 'view-city', 'Active', 5, 0, 'All'),
(100, 'create-city', 'Active', 5, 0, 'All'),
(101, 'edit-city', 'Active', 5, 0, 'All'),
(102, 'delete-city', 'Active', 5, 0, 'All'),
(103, 'view-pages', 'Active', 5, 0, 'All'),
(104, 'edit-pages', 'Active', 5, 0, 'All'),
(105, 'view-home-page-content', 'Active', 5, 0, 'All'),
(106, 'edit-home-page-content', 'Active', 5, 0, 'All'),
(107, 'view-our-provider', 'Inactive', 5, 0, 'All'),
(108, 'create-our-provider', 'Inactive', 5, 0, 'All'),
(109, 'edit-our-provider', 'Inactive', 5, 0, 'All'),
(110, 'delete-our-provider', 'Inactive', 5, 0, 'All'),
(119, 'view-faq', 'Active', 5, 0, 'All'),
(120, 'create-faq', 'Active', 5, 0, 'All'),
(121, 'edit-faq', 'Active', 5, 0, 'All'),
(122, 'delete-faq', 'Active', 5, 0, 'All'),
(123, 'view-faq-categories', 'Active', 5, 0, 'All'),
(124, 'create-faq-categories', 'Active', 5, 0, 'All'),
(125, 'edit-faq-categories', 'Active', 5, 0, 'All'),
(126, 'delete-faq-categories', 'Active', 5, 0, 'All'),
(127, 'view-help-detail', 'Active', 5, 0, 'All'),
(128, 'create-help-detail', 'Active', 5, 0, 'All'),
(129, 'edit-help-detail', 'Active', 5, 0, 'All'),
(130, 'delete-help-detail', 'Active', 5, 0, 'All'),
(131, 'view-help-detail-category', 'Active', 5, 0, 'All'),
(132, 'create-help-detail-category', 'Active', 5, 0, 'All'),
(133, 'edit-help-detail-category', 'Active', 5, 0, 'All'),
(134, 'delete-help-detail-category', 'Active', 5, 0, 'All'),
(135, 'manage-app-main-screen-settings', 'Deleted', 6, 0, 'All'),
(136, 'view-package-type', 'Active', 5, 0, 'All'),
(137, 'create-package-type', 'Active', 5, 0, 'All'),
(138, 'edit-package-type', 'Active', 5, 0, 'All'),
(139, 'delete-package-type', 'Active', 5, 0, 'All'),
(140, 'manage-send-push-notification', 'Active', 5, 0, 'All'),
(141, 'view-db-backup', 'Active', 5, 0, 'All'),
(142, 'create-db-backup', 'Active', 5, 0, 'All'),
(143, 'download-db-backup', 'Active', 5, 0, 'All'),
(144, 'delete-db-backup', 'Active', 5, 0, 'All'),
(145, 'test', 'Deleted', 11, 0, 'All'),
(146, 'Test 1', 'Deleted', 11, 0, 'All'),
(147, 'create-store', 'Active', 1, 0, 'All'),
(148, 'edit-store', 'Active', 1, 0, 'All'),
(149, 'delete-store', 'Active', 1, 0, 'All'),
(150, 'view-store', 'Active', 1, 0, 'All'),
(151, 'create-item-categories', 'Active', 1, 0, 'All'),
(152, 'edit-item-categories', 'Active', 1, 0, 'All'),
(153, 'delete-item-categories', 'Active', 1, 0, 'All'),
(154, 'view-item-categories', 'Active', 1, 0, 'All'),
(155, 'create-item', 'Active', 1, 0, 'All'),
(156, 'edit-item', 'Active', 1, 0, 'All'),
(157, 'delete-item', 'Active', 1, 0, 'All'),
(158, 'view-item', 'Active', 1, 0, 'All'),
(159, 'create-item-type', 'Active', 1, 0, 'All'),
(160, 'edit-item-type', 'Active', 1, 0, 'All'),
(161, 'delete-item-type', 'Active', 1, 0, 'All'),
(162, 'view-item-type', 'Active', 1, 0, 'All'),
(163, 'manage-orders', 'Active', 1, 0, 'All'),
(164, 'view-processing-orders', 'Active', 1, 0, 'All'),
(165, 'cancel-orders', 'Active', 1, 0, 'All'),
(166, 'view-cancelled-orders', 'Active', 1, 0, 'All'),
(167, 'view-all-orders', 'Active', 1, 0, 'All'),
(168, 'manage-mark-as-refunded-orders', 'Active', 1, 0, 'All'),
(169, 'manage-site-earning', 'Active', 12, 0, 'All'),
(170, 'manage-admin-earning', 'Active', 12, 0, 'All'),
(171, 'manage-store-payment', 'Active', 1, 0, 'All'),
(172, 'manage-provider-payment', 'Active', 12, 0, 'All'),
(173, 'manage-store-items', 'Active', 1, 0, 'All'),
(174, 'create-users', 'Active', 10, 0, 'All'),
(175, 'edit-users', 'Active', 10, 0, 'All'),
(176, 'delete-users', 'Active', 10, 0, 'All'),
(177, 'view-users', 'Active', 10, 0, 'All'),
(178, 'create-delivery-charges', 'Active', 7, 0, 'All'),
(179, 'edit-delivery-charges', 'Active', 7, 0, 'All'),
(180, 'delete-delivery-charges', 'Active', 7, 0, 'All'),
(181, 'view-delivery-charges', 'Active', 7, 0, 'All'),
(182, 'update-status-providers', 'Active', 2, 0, 'All'),
(234, 'manage-create-request', 'Active', 11, 0, 'All'),
(237, 'create-email-templates', 'Inactive', 6, 0, 'All'),
(238, 'create-sms-templates', 'Inactive', 6, 0, 'All'),
(239, 'view-invoice', 'Active', 11, 0, 'All'),
(240, 'update-status-store', 'Active', 1, 0, 'All'),
(241, 'update-status-provider-taxis', 'Active', 2, 0, 'All'),
(242, 'update-status-item-categories', 'Active', 1, 0, 'All'),
(243, 'update-status-item', 'Active', 1, 0, 'All'),
(244, 'update-status-item-type', 'Active', 1, 0, 'All'),
(245, 'update-status-users', 'Active', 10, 0, 'All'),
(246, 'update-status-geo-fence-locations', 'Active', 7, 0, 'All'),
(247, 'update-status-delivery-charges', 'Active', 7, 0, 'All'),
(248, 'manage-cancelled-order-report', 'Active', 12, 0, 'All'),
(249, 'manage-heatmap', 'Active', 11, 0, 'All'),
(250, 'manage-stores', 'Active', 1, 0, 'All'),
(251, 'manage-store-dashboard', 'Active', 11, 0, 'All'),
(252, 'manage-language-label', 'Active', 6, 0, 'All'),
(253, 'view-banner', 'Active', 5, 0, 'All'),
(254, 'create-banner', 'Active', 5, 0, 'All'),
(255, 'edit-banner', 'Active', 5, 0, 'All'),
(256, 'delete-banner', 'Active', 5, 0, 'All'),
(257, 'update-status-banner', 'Active', 5, 0, 'All'),
(258, 'view-cancel-reasons', 'Active', 5, 0, 'All'),
(259, 'create-cancel-reasons', 'Active', 5, 0, 'All'),
(260, 'edit-cancel-reasons', 'Active', 5, 0, 'All'),
(261, 'delete-cancel-reasons', 'Active', 5, 0, 'All'),
(262, 'update-status-cancel-reasons', 'Active', 5, 0, 'All'),
(263, 'view-order-status', 'Active', 1, 0, 'All'),
(264, 'create-order-status', 'Inactive', 1, 0, 'All'),
(265, 'edit-order-status', 'Active', 1, 0, 'All'),
(266, 'delete-order-status', 'Inactive', 1, 0, 'All'),
(267, 'update-status-order-status', 'Inactive', 1, 0, 'All'),
(268, 'view-vehicle-model', 'Active', 5, 0, 'All'),
(269, 'create-vehicle-model', 'Active', 5, 0, 'All'),
(270, 'edit-vehicle-model', 'Active', 5, 0, 'All'),
(271, 'delete-vehicle-model', 'Active', 5, 0, 'All'),
(272, 'update-status-vehicle-model', 'Active', 5, 0, 'All'),
(273, 'view-vehicle-make', 'Active', 5, 0, 'All'),
(274, 'create-vehicle-make', 'Active', 5, 0, 'All'),
(275, 'edit-vehicle-make', 'Active', 5, 0, 'All'),
(276, 'delete-vehicle-make', 'Active', 5, 0, 'All'),
(277, 'update-status-vehicle-make', 'Active', 5, 0, 'All'),
(278, 'view-popular-stores', 'Active', 5, 0, 'All'),
(279, 'create-popular-stores', 'Active', 5, 0, 'All'),
(280, 'edit-popular-stores', 'Active', 5, 0, 'All'),
(281, 'delete-popular-stores', 'Active', 5, 0, 'All'),
(282, 'update-status-popular-stores', 'Active', 5, 0, 'All'),
(283, 'update-status-help-detail-category', 'Active', 5, 0, 'All'),
(284, 'update-status-faq-categories', 'Active', 5, 0, 'All'),
(285, 'update-status-faq', 'Active', 5, 0, 'All'),
(286, 'view-app-home-settings', 'Active', 6, 0, 'All'),
(287, 'edit-app-home-settings', 'Active', 6, 0, 'All'),
(289, 'manage-profile', 'Active', 11, 0, 'All'),
(290, 'manage-hotel-payment-report', 'Active', 12, 0, 'All'),
(291, 'manage-pets', 'Active', 11, 0, 'All'),
(292, 'view-pet-type', 'Active', 11, 0, 'All'),
(293, 'create-pet-type', 'Active', 11, 0, 'All'),
(294, 'edit-pet-type', 'Active', 11, 0, 'All'),
(295, 'delete-pet-type', 'Active', 11, 0, 'All'),
(296, 'update-status-pet-type', 'Active', 11, 0, 'All'),
(297, 'view-users-pets', 'Active', 10, 0, 'All'),
(298, 'create-users-pets', 'Active', 10, 0, 'All'),
(299, 'edit-users-pets', 'Active', 10, 0, 'All'),
(300, 'delete-users-pets', 'Active', 10, 0, 'All'),
(301, 'update-status-users-pets', 'Active', 10, 0, 'All'),
(302, 'dashboard-site-statistics', 'Active', 11, 0, 'All'),
(303, 'dashboard-ride-job-statistics', 'Active', 11, 0, 'All'),
(304, 'dashboard-ride-jobs', 'Active', 11, 0, 'All'),
(305, 'dashboard-providers', 'Active', 11, 0, 'All'),
(306, 'dashboard-latest-rides-jobs', 'Active', 11, 0, 'All'),
(307, 'dashboard-notifications-alerts-panel', 'Active', 11, 0, 'All'),
(308, 'view-app-screenshot', 'Active', 6, 0, 'All'),
(309, 'create-app-screenshot', 'Active', 6, 0, 'All'),
(310, 'edit-app-screenshot', 'Active', 6, 0, 'All'),
(311, 'delete-app-screenshot', 'Active', 6, 0, 'All'),
(312, 'update-status-app-screenshot', 'Active', 6, 0, 'All'),
(313, 'manage-cancel-trips-invoice', 'Active', 11, 0, 'All'),
(314, 'manage-cancellation-payment-report', 'Active', 12, 0, 'All'),
(315, 'manage-company-document', 'Active', 3, 0, 'All'),
(316, 'manage-driver-registration-report', 'Active', 12, 0, 'All'),
(317, 'update-status-company', 'Active', 3, 0, 'All'),
(318, 'manage-provider-services', 'Active', 2, 0, 'All'),
(319, 'edit-availability', 'Active', 2, 0, 'All'),
(320, 'edit-provider-document', 'Active', 2, 0, 'All'),
(321, 'add-wallet-balance', 'Active', 10, 0, 'All'),
(322, 'payment-member', 'Active', 12, 0, 'All'),
(323, 'update-status-documents', 'Active', 6, 0, 'All'),
(324, 'manage-total-earning-report', 'Active', 12, 0, 'All'),
(325, 'store-dashboard-order-statistics', 'Active', 1, 0, 'All'),
(326, 'dashboard-orders', 'Active', 11, 0, 'All'),
(327, 'update-status-service-type', 'Active', 9, 0, 'Ride,UberX,Ride-Delivery-UberX,Foodonly,Deliverall'),
(328, 'update-status-service-category', 'Active', 9, 0, 'All'),
(329, 'create-app-home-settings', 'Deleted', 6, 0, 'All'),
(330, 'update-status-promocode', 'Active', 11, 0, 'All'),
(331, 'update-status-restricted-area', 'Active', 7, 0, 'All'),
(332, 'update-status-location-wise-fare', 'Active', 7, 0, 'All'),
(334, 'create-organization', 'Active', 13, 0, 'All'),
(335, 'delete-organization', 'Active', 13, 0, 'All'),
(336, 'edit-organization', 'Active', 13, 0, 'All'),
(337, 'update-status-organization', 'Active', 13, 0, 'All'),
(338, 'view-organization', 'Active', 13, 0, 'All'),
(339, 'update-status-country', 'Active', 5, 0, 'All'),
(340, 'update-status-state', 'Active', 5, 0, 'All'),
(341, 'update-status-city', 'Active', 5, 0, 'All'),
(342, 'update-status-help-detail', 'Active', 5, 0, 'All'),
(343, 'update-status-package-type', 'Active', 5, 0, 'All'),
(344, 'manage-store-utility', 'Active', 5, 0, 'All'),
(345, 'view-user-profile', 'Active', 10, 0, 'All'),
(346, 'create-user-profile', 'Active', 10, 0, 'All'),
(347, 'delete-user-profile', 'Active', 10, 0, 'All'),
(348, 'edit-user-profile', 'Active', 10, 0, 'All'),
(349, 'update-status-user-profile', 'Active', 10, 0, 'All'),
(350, 'view-trip-reason', 'Active', 10, 0, 'All'),
(351, 'create-trip-reason', 'Active', 10, 0, 'All'),
(352, 'edit-trip-reason', 'Active', 10, 0, 'All'),
(353, 'delete-trip-reason', 'Active', 10, 0, 'All'),
(354, 'update-status-trip-reason', 'Active', 10, 0, 'All'),
(355, 'manage-organization-payment-report', 'Active', 13, 0, 'Ride,Ride-Delivery,Ride-Delivery-UberX'),
(356, 'manage-store-reviews', 'Active', 1, 0, 'All'),
(357, 'store-dashboard-statistics', 'Active', 1, 0, 'All'),
(358, 'store-dashboard-orders', 'Active', 1, 0, 'All'),
(359, 'store-dashboard-latest-order', 'Active', 1, 0, 'All'),
(360, 'view-order-invoice', 'Active', 1, 0, 'All'),
(361, 'update-status-vehicle-type', 'Active', 8, 0, 'All'),
(362, 'manage-org-cancellation-payment-report', 'Active', 12, 0, 'Ride,Ride-Delivery,Ride-Delivery-UberX'),
(363, 'manage-ride-profiles', 'Active', 13, 0, 'All'),
(364, 'passenger-request-report', 'Active', 12, 0, 'All'),
(365, 'trips-statistics-report', 'Active', 12, 0, 'All'),
(366, 'view-advertise-banner', 'Active', 11, 0, 'All'),
(367, 'create-advertise-banner', 'Active', 11, 0, 'All'),
(368, 'edit-advertise-banner', 'Active', 11, 0, 'All'),
(369, 'update-status-advertise-banner', 'Active', 11, 0, 'All'),
(370, 'delete-advertise-banner', 'Active', 11, 0, 'All'),
(371, 'manage-newsletter', 'Active', 11, 0, 'All'),
(372, 'view-airport-surcharge', 'Active', 7, 0, 'All'),
(373, 'update-status-airport-surcharge', 'Active', 7, 0, 'All'),
(374, 'delete-airport-surcharge', 'Active', 7, 0, 'All'),
(375, 'create-airport-surcharge', 'Active', 7, 0, 'All'),
(376, 'edit-airport-surcharge', 'Active', 7, 0, 'All'),
(377, 'view-blocked-rider', 'Active', 10, 0, 'All'),
(378, 'view-blocked-driver', 'Active', 2, 0, 'All'),
(379, 'update-status-blocked-driver', 'Active', 2, 0, 'All'),
(380, 'delete-blocked-driver', 'Active', 2, 0, 'All'),
(381, 'update-status-blocked-rider', 'Active', 10, 0, 'All'),
(382, 'delete-blocked-rider', 'Active', 10, 0, 'All'),
(383, 'view-news', 'Active', 5, 0, 'All'),
(384, 'edit-news', 'Active', 5, 0, 'All'),
(385, 'create-news', 'Active', 5, 0, 'All'),
(386, 'update-status-news', 'Active', 5, 0, 'All'),
(387, 'delete-news', 'Active', 5, 0, 'All'),
(388, 'update-status-admin', 'Active', 4, 0, 'All'),
(389, 'view-visit', 'Active', 5, 0, 'All'),
(390, 'update-status-visit', 'Active', 5, 0, 'All'),
(391, 'delete-visit', 'Active', 5, 0, 'All'),
(392, 'create-visit', 'Active', 5, 0, 'All'),
(393, 'edit-visit', 'Active', 5, 0, 'All'),
(394, 'view-expire-documents', 'Deleted', 5, 0, 'All'),
(395, 'expired-documents', 'Active', 5, 0, 'All'),
(397, 'delete-kiosk', 'Active', 14, 0, 'All'),
(399, 'manage-requests', 'Active', 14, 0, 'All'),
(400, 'update-status-kiosk', 'Active', 14, 0, 'All'),
(401, 'view-kiosk', 'Active', 14, 0, 'All'),
(403, 'delete-hotel', 'Active', 14, 0, 'All'),
(405, 'update-status-hotel', 'Active', 14, 0, 'All'),
(406, 'view-hotel', 'Active', 14, 0, 'All'),
(407, 'create-corporate', 'Active', 14, 0, 'All'),
(408, 'delete-corporate', 'Active', 14, 0, 'All'),
(409, 'edit-corporate', 'Active', 14, 0, 'All'),
(410, 'update-status-corporate', 'Active', 14, 0, 'All'),
(411, 'view-corporate', 'Active', 14, 0, 'All'),
(412, 'top-up', 'Active', 15, 0, 'All'),
(413, 'trip-comments', 'Active', 16, 0, 'All'),
(414, 'edit-bookings', 'Active', 17, 0, 'All'),
(415, 'delete-ride-later', 'Active', 18, 0, 'All'),
(416, 'delete-trips', 'Active', 18, 0, 'All'),
(417, 'view-trip-comments', 'Active', 16, 0, 'All'),
(418, 'cards', 'Active', 19, 0, 'All'),
(419, 'generate-invoice', 'Active', 20, 0, 'All'),
(420, 'manage-invoice', 'Active', 20, 0, 'All'),
(421, 'list-invoice', 'Active', 20, 0, 'All'),
(422, 'invoice-settings', 'Active', 20, 0, 'All'),
(423, 'send-mail', 'Active', 5, 0, 'All'),
(424, 'import-booking', 'Active', 21, 0, 'All'),
(425, 'send-sms', 'Active', 22, 0, 'All'),
(426, 'manage-booking-com-bookings', 'Active', 11, 0, 'All'),
(427, 'partner_logo', 'Active', 6, 0, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active',
  `display_app_type` varchar(255) NOT NULL DEFAULT 'All'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `status`, `display_app_type`) VALUES
(1, 'Manage Store', 'Active', 'Ride-Delivery-UberX,Foodonly'),
(2, 'Providers', 'Active', 'All'),
(3, 'Company', 'Active', 'All'),
(4, 'Admin', 'Active', 'All'),
(5, 'Utility', 'Active', 'All'),
(6, 'Settings', 'Active', 'All'),
(7, 'Manage Locations', 'Active', 'All'),
(8, 'Vehicle', 'Active', 'Ride,Delivery,Ride-Delivery,Ride-Delivery-UberX,Foodonly,Deliverall'),
(9, 'Manage Services', 'Active', 'Delivery,Ride-Delivery,UberX,Ride-Delivery-UberX,Foodonly,Deliverall'),
(10, 'Users', 'Active', 'All'),
(11, 'Other', 'Active', 'All'),
(12, 'Reports', 'Active', 'All'),
(13, 'Organization', 'Active', 'Ride,Ride-Delivery,Ride-Delivery-UberX'),
(14, 'Manage Requests', 'Active', 'All'),
(15, 'Admin Driver Top up', 'Active', 'All'),
(16, 'Admin Trip comments', 'Active', 'All'),
(17, 'Ride Later Booking Edit', 'Active', 'All'),
(18, 'Delete Bookings', 'Active', 'All'),
(19, 'Manage Cards', 'Active', 'All'),
(20, 'Invoices', 'Active', 'All'),
(21, 'Import Booking', 'Active', 'All'),
(22, 'Sms', 'Active', 'All');

-- --------------------------------------------------------

--
-- Table structure for table `sub_modules`
--

CREATE TABLE `sub_modules` (
  `sub_module_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `sub_module_name` varchar(255) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_permission_mapping`
--
ALTER TABLE `group_permission_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_modules`
--
ALTER TABLE `sub_modules`
  ADD PRIMARY KEY (`sub_module_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_permission_mapping`
--
ALTER TABLE `group_permission_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sub_modules`
--
ALTER TABLE `sub_modules`
  MODIFY `sub_module_id` int(11) NOT NULL AUTO_INCREMENT;



-- Second Commit - Abhishek
-- Date: 4th April, 2022

--
-- Table structure for table `group_permission_mapping`
--

CREATE TABLE `group_permission_mapping` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(11) NOT NULL,
  `perm_group_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active',
  `display_app_type` varchar(255) NOT NULL DEFAULT 'All'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `perm_group_name`, `status`, `display_app_type`) VALUES
(1, 'Manage Store', 'Active', 'Ride-Delivery-UberX,Foodonly'),
(2, 'Providers', 'Active', 'All'),
(3, 'Company', 'Active', 'All'),
(4, 'Admin', 'Active', 'All'),
(5, 'Utility', 'Active', 'All'),
(6, 'Settings', 'Active', 'All'),
(7, 'Manage Locations', 'Active', 'All'),
(8, 'Vehicle', 'Active', 'Ride,Delivery,Ride-Delivery,Ride-Delivery-UberX,Foodonly,Deliverall'),
(9, 'Manage Services', 'Active', 'Delivery,Ride-Delivery,UberX,Ride-Delivery-UberX,Foodonly,Deliverall'),
(10, 'Users', 'Active', 'All'),
(11, 'Other', 'Active', 'All'),
(12, 'Reports', 'Active', 'All'),
(13, 'Organization', 'Active', 'Ride,Ride-Delivery,Ride-Delivery-UberX'),
(14, 'Manage Requests', 'Active', 'All'),
(15, 'Admin Driver Top up', 'Active', 'All'),
(16, 'Admin Trip comments', 'Active', 'All'),
(17, 'Ride Later Booking Edit', 'Active', 'All'),
(18, 'Delete Bookings', 'Active', 'All'),
(19, 'Manage Cards', 'Active', 'All'),
(20, 'Invoices', 'Active', 'All'),
(21, 'Import Booking', 'Active', 'All'),
(22, 'Sms', 'Active', 'All');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_permission_mapping`
--
ALTER TABLE `group_permission_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_permission_mapping`
--
ALTER TABLE `group_permission_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;


----- Next
CREATE TABLE `location_master` (
  `iLocationId` int(10) NOT NULL,
  `iCountryId` int(11) NOT NULL,
  `vLocationName` varchar(500) NOT NULL,
  `tLatitude` text NOT NULL,
  `tLongitude` text NOT NULL,
  `eStatus` enum('Active','Inactive') NOT NULL,
  `eFor` enum('Restrict','VehicleType','FixFare','UserDeliveryCharge','AirportSurcharge') NOT NULL DEFAULT 'Restrict'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_master`
--

INSERT INTO `location_master` (`iLocationId`, `iCountryId`, `vLocationName`, `tLatitude`, `tLongitude`, `eStatus`, `eFor`) VALUES
(7, 99, 'Prahlad Nagar Airport', '23.016891,23.010334,23.007767,23.010808,23.017721,', '72.503902,72.500512,72.509309,72.518322,72.514803,', 'Active', 'AirportSurcharge'),
(8, 99, 'sarkhej', '22.990563,22.991669,22.967015,22.967252,', '72.478028,72.518797,72.518111,72.478028,', 'Inactive', 'Restrict'),
(9, 73, 'FRANCE', '43.542913,42.838051,42.61207,43.447275,43.319522,43.159452,43.955594,44.58493,45.083547,46.050684,46.216273,48.852372,50.939686,49.788658,49.359426,49.671484,48.592359,48.860052,48.489615,46.193463,', '-1.645198,-0.766292,2.881169,3.540349,5.473942,6.484685,7.407536,6.792302,6.484685,6.992802,6.09467,7.989811,2.463688,0.291142,-0.035701,-1.636959,-1.690517,-3.123546,-4.644466,-1.606746,', 'Active', 'VehicleType'),
(10, 73, 'paris', '48.804477,48.851488,48.898456,48.921021,48.900261,48.847422,48.843355,48.813521,48.804477,', '2.35947,2.448734,2.411655,2.35947,2.24686,2.226261,2.244114,2.244114,2.35947,', 'Active', 'FixFare'),
(11, 73, 'PARIS 75', '48.840036,48.869402,48.88882,48.901911,48.901735,48.901284,48.886838,48.87049,48.851427,48.820059,48.815334,48.821007,', '2.253487,2.267907,2.287133,2.328332,2.370904,2.391503,2.399743,2.414592,2.417081,2.378113,2.345755,2.313397,', 'Active', 'FixFare'),
(12, 73, 'clichy sous bois', '48.904633,48.919638,48.922909,48.914674,48.904181,', '2.544397,2.520708,2.549032,2.566541,2.55607,', 'Inactive', 'Restrict'),
(13, 73, 'DISNEY', '48.842467,48.841111,48.8567,48.870025,48.884702,48.898923,48.900051,48.898471,48.885605,48.875896,48.860088,48.849019,', '2.787424,2.825876,2.835833,2.823473,2.831713,2.818666,2.790171,2.778154,2.756525,2.728373,2.743479,2.767855,', 'Active', 'FixFare'),
(14, 221, 'DUBAI', '24.869769,25.024169,25.213169,25.385134,25.367763,25.12182,', '55.443972,55.089662,55.097902,55.282589,55.573727,55.700069,', 'Active', 'VehicleType'),
(16, 99, 'Mohali', '30.737656,30.670647,30.61482,30.616888,30.647611,30.734115,30.753295,', '76.615508,76.589072,76.623405,76.773093,76.836608,76.807769,76.715072,', 'Active', 'FixFare'),
(17, 99, 'Chandigarh', '30.798531,30.8003,30.794992,30.76638,30.75635,30.686697,30.674886,30.666323,30.657463,30.649784,30.644763,30.641809,30.68463,30.687288,30.691126,30.695554,30.698801,30.710314,30.707952,30.733335,30.756645,30.768151,30.77877,30.791453,30.795582,30.797868,30.796982,30.798531,', '76.829096,76.813732,76.747814,76.712452,76.697689,76.693912,76.694599,76.713138,76.729619,76.737515,76.762921,76.796909,76.810299,76.821629,76.818882,76.818195,76.823345,76.839481,76.848064,76.830212,76.831928,76.844632,76.838453,76.848408,76.827465,76.83004,76.828752,76.829525,', 'Active', 'VehicleType'),
(18, 99, 'Panchkula', '30.698407,30.305571,30.198806,30.398006,30.662975,31.261195,31.077888,', '76.103258,76.273545,76.781663,77.028856,77.265062,77.053575,76.257066,', 'Active', 'VehicleType'),
(19, 209, 'Bankok', '13.827849,13.400745,13.955829,13.049102,15.645906,18.293635,', '100.310134,99.826736,100.617751,101.612078,104.995867,103.633562,', 'Active', 'VehicleType'),
(20, 223, 'Texas', '36.318477,30.868081,27.920443,29.920458,34.455649,37.268621,', '-101.991553,-104.935889,-99.222999,-93.729835,-94.257178,-94.872413,', 'Active', 'VehicleType'),
(21, 222, 'Michigan', '44.738763,43.707424,42.633786,42.577182,43.452749,43.715365,44.5903,', '-85.694544,-86.430628,-85.980188,-83.706018,-83.024866,-84.387171,-84.057581,', 'Active', 'FixFare'),
(22, 73, 'CDG', '48.983778,48.993916,49.003151,49.02882,49.023642,49.008331,', '2.532509,2.62555,2.624176,2.579544,2.539033,2.537831,', 'Active', 'FixFare'),
(23, 99, 'punjab and haryana and rajasthan', '31.031261,30.842795,30.5594,30.370009,30.028179,29.494096,29.269126,29.321823,29.661302,30.403179,30.767304,30.97005,31.411765,31.411765,31.313263,', '74.796384,74.367917,74.153684,73.983396,74.032834,74.071287,74.961179,75.927976,77.334226,77.295774,77.273801,76.933225,75.895017,75.57092,75.043577,', 'Active', 'FixFare'),
(24, 99, 'Ludhiana', '31.014163,31.007101,30.802074,30.646244,30.596609,30.613157,30.655695,30.799715,30.89168,', '75.79502,76.294898,76.314124,76.278419,76.13285,75.767554,75.610999,75.479163,75.649451,', 'Active', 'FixFare'),
(25, 73, 'AEROPORT ORLY', '48.718645,48.724873,48.736309,48.736196,48.727308,', '2.36359,2.392086,2.379812,2.352518,2.348312,', 'Active', 'FixFare'),
(26, 73, '29 Rue du Faubourg Montmartre, 75009 Paris, France', '48.874506,48.873413,48.872566,48.872594,48.873695,48.87493,', '2.340345,2.33923,2.34115,2.344111,2.345088,2.34351,', 'Active', 'FixFare'),
(27, 73, 'Hotel de Ville, FR, Place de l\'H\\\\u00f4tel de Ville, 75004 Paris, France', '48.857268,48.856463,48.855878,48.855927,48.857028,48.857642,', '2.3511,2.350135,2.351744,2.353868,2.354319,2.352484,', 'Active', 'FixFare'),
(28, 99, 'It Tower Mohali', '30.711682,30.705815,30.702937,30.703232,30.71349,30.715482,', '76.684437,76.683193,76.686712,76.700488,76.702977,76.690789,', 'Active', 'FixFare'),
(29, 99, 'Sector 17 ISBT', '30.739457,30.732762,30.733241,30.738682,', '76.773607,76.771826,76.779486,76.782061,', 'Active', 'FixFare');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location_master`
--
ALTER TABLE `location_master`
  ADD PRIMARY KEY (`iLocationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location_master`
--
ALTER TABLE `location_master`
  MODIFY `iLocationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;
