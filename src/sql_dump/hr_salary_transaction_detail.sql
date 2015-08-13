INSERT INTO `hr_salary_transaction_detail` (`id`, `salary_trn_hd_id`, `type`, `hr_salary_allowance_id`, `hr_salary_deduction_id`, `hr_over_time_id`, `hr_bonus_id`, `tax_rate`, `tax_amount`, `percentage`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'allowance', 1, NULL, NULL, NULL, NULL, NULL, 10.00, 300.00, 7, 0, '2015-08-04 09:59:01', '2015-08-04 09:59:01'),
(2, 2, 'deduction', NULL, 1, NULL, NULL, NULL, NULL, 10.00, -500.00, 7, 0, '2015-08-04 09:59:01', '2015-08-04 09:59:01'),
(3, 2, 'over-time', NULL, NULL, 3, NULL, NULL, NULL, 100.00, 250.00, 7, 0, '2015-08-04 09:59:01', '2015-08-04 09:59:01'),
(4, 2, 'bonus', NULL, NULL, NULL, 3, NULL, NULL, 30.00, 15000.00, 7, 0, '2015-08-04 09:59:01', '2015-08-04 09:59:01'),
(5, 1, 'allowance', 2, NULL, NULL, NULL, NULL, NULL, 30.00, 3000.00, 7, 0, '2015-08-04 09:59:51', '2015-08-04 09:59:51'),
(6, 1, 'deduction', NULL, 2, NULL, NULL, NULL, NULL, 10.00, -1500.00, 7, 0, '2015-08-04 09:59:51', '2015-08-04 09:59:51'),
(7, 1, 'over-time', NULL, NULL, 1, NULL, NULL, NULL, 100.00, 2450.00, 7, 0, '2015-08-04 09:59:51', '2015-08-04 09:59:51'),
(8, 1, 'bonus', NULL, NULL, NULL, 4, NULL, NULL, 100.00, 5000.00, 7, 0, '2015-08-04 09:59:51', '2015-08-04 09:59:51'),
(9, 3, 'allowance', 1, NULL, NULL, NULL, NULL, NULL, 10.00, 300.00, 7, 0, '2015-08-04 11:50:11', '2015-08-04 11:50:11'),
(10, 3, 'allowance', 2, NULL, NULL, NULL, NULL, NULL, 13.00, 1300.00, 7, 0, '2015-08-04 11:50:11', '2015-08-04 11:50:11'),
(11, 3, 'bonus', NULL, NULL, NULL, 2, NULL, NULL, 100.00, 20000.00, 7, 0, '2015-08-04 11:50:11', '2015-08-04 11:50:11'),
(12, 3, 'deduction', NULL, 5, NULL, NULL, NULL, NULL, 10.00, -1000.00, 7, 0, '2015-08-04 11:50:12', '2015-08-04 11:50:12'),
(13, 4, 'allowance', 6, NULL, NULL, NULL, NULL, NULL, 60.00, 600.00, 7, 0, '2015-08-04 11:51:06', '2015-08-04 11:51:06'),
(14, 4, 'bonus', NULL, NULL, NULL, 4, NULL, NULL, 15.00, 750.00, 7, 0, '2015-08-04 11:51:06', '2015-08-04 11:51:06'),
(15, 4, 'over-time', NULL, NULL, 1, NULL, NULL, NULL, 100.00, 2450.00, 7, 0, '2015-08-04 11:51:06', '2015-08-04 11:51:06'),
(16, 4, 'deduction', NULL, 4, NULL, NULL, NULL, NULL, 18.00, -9000.00, 7, 0, '2015-08-04 11:51:06', '2015-08-04 11:51:06'),
(17, 4, 'over-time', NULL, NULL, 1, NULL, NULL, NULL, 100.00, 2450.00, 7, 0, '2015-08-04 11:52:52', '2015-08-04 11:52:52'),
(18, 4, 'allowance', 2, NULL, NULL, NULL, NULL, NULL, 19.00, 1900.00, 7, 0, '2015-08-04 11:52:52', '2015-08-04 11:52:52'),
(19, 4, 'allowance', 1, NULL, NULL, NULL, NULL, NULL, 10.00, 300.00, 7, 0, '2015-08-04 11:53:12', '2015-08-04 11:53:12'),
(20, 4, 'over-time', NULL, NULL, 1, NULL, NULL, NULL, 100.00, 2450.00, 7, 0, '2015-08-04 11:53:12', '2015-08-04 11:53:12'),
(21, 5, 'allowance', 1, NULL, NULL, NULL, NULL, NULL, 15.00, 450.00, 3, 0, '2015-08-06 05:42:54', '2015-08-06 05:42:54'),
(22, 5, 'deduction', NULL, 2, NULL, NULL, NULL, NULL, 20.00, -3000.00, 3, 0, '2015-08-06 05:42:54', '2015-08-06 05:42:54'),
(23, 5, 'over-time', NULL, NULL, 3, NULL, NULL, NULL, 100.00, 250.00, 3, 0, '2015-08-06 05:42:54', '2015-08-06 05:42:54'),
(24, 5, 'bonus', NULL, NULL, NULL, 2, NULL, NULL, 60.00, 12000.00, 3, 0, '2015-08-06 05:42:54', '2015-08-06 05:42:54');