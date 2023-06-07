-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 04:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrpayrol_sketch`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_adhoc_freeze_payroll`
--

CREATE TABLE `hr_adhoc_freeze_payroll` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_adhoc_freeze_payroll`
--

INSERT INTO `hr_adhoc_freeze_payroll` (`id`, `employee_id`, `organization_id`, `month`, `year`, `date`) VALUES
(1, 29, 1, '06', '2020', '2020-07-13'),
(2, 5, 1, '06', '2020', '2020-07-13'),
(3, 24, 1, '06', '2020', '2020-07-13'),
(4, 40, 1, '06', '2020', '2020-07-13'),
(5, 67, 1, '06', '2020', '2020-07-13'),
(6, 42, 1, '06', '2020', '2020-07-13'),
(7, 3, 1, '06', '2020', '2020-07-13'),
(8, 32, 1, '06', '2020', '2020-07-13'),
(9, 14, 1, '06', '2020', '2020-07-13'),
(10, 15, 1, '06', '2020', '2020-07-13'),
(11, 30, 1, '06', '2020', '2020-07-13'),
(12, 13, 1, '06', '2020', '2020-07-13'),
(13, 34, 1, '06', '2020', '2020-07-13'),
(14, 4, 1, '06', '2020', '2020-07-13'),
(15, 17, 1, '06', '2020', '2020-07-13'),
(16, 9, 1, '06', '2020', '2020-07-13'),
(17, 7, 1, '06', '2020', '2020-07-13'),
(18, 21, 1, '06', '2020', '2020-07-13'),
(19, 38, 1, '06', '2020', '2020-07-13'),
(20, 20, 1, '06', '2020', '2020-07-13'),
(21, 64, 1, '06', '2020', '2020-07-13'),
(22, 65, 1, '06', '2020', '2020-07-13'),
(23, 26, 1, '06', '2020', '2020-07-13'),
(24, 12, 1, '06', '2020', '2020-07-13'),
(25, 41, 1, '06', '2020', '2020-07-13'),
(26, 11, 1, '06', '2020', '2020-07-13'),
(27, 39, 1, '06', '2020', '2020-07-13'),
(28, 66, 1, '06', '2020', '2020-07-13'),
(29, 23, 1, '06', '2020', '2020-07-13'),
(30, 22, 1, '06', '2020', '2020-07-13'),
(31, 6, 1, '06', '2020', '2020-07-13'),
(32, 2, 1, '06', '2020', '2020-07-13'),
(33, 8, 1, '06', '2020', '2020-07-13'),
(34, 27, 1, '06', '2020', '2020-07-13'),
(35, 10, 1, '06', '2020', '2020-07-13'),
(36, 18, 1, '06', '2020', '2020-07-13'),
(37, 36, 1, '06', '2020', '2020-07-13'),
(38, 37, 1, '06', '2020', '2020-07-13'),
(39, 48, 1, '06', '2020', '2020-07-13'),
(40, 19, 1, '06', '2020', '2020-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `hr_admin`
--

CREATE TABLE `hr_admin` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `emailid` varchar(250) DEFAULT NULL,
  `menu` text DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `position` int(11) DEFAULT NULL,
  `family_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_admin`
--

INSERT INTO `hr_admin` (`id`, `employee_id`, `type_id`, `image`, `name`, `emailid`, `menu`, `password`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `position`, `family_name`) VALUES
(1, 0, 1, '15890008422003913989.png', 'admin', 'admin@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2018-12-20', '2020-07-27 10:51:09', 4, 'admin'),
(14, 4, 0, '', 'Parishmita  ', 'parishmita@sketchwebsolutions.com', '188,4,160,228,187,232,161,218,179,193,219,207,234,196,167,169,170,1,211,210,212,230,233,192,227,231,209,213,215', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-05-14', '2020-05-18 13:34:37', NULL, 'Saha'),
(15, 3, 0, '', 'Jayanta ', 'jayanta@sketchwebsolutions.com', '188,4,160,228,187,232,161,218,179,193,219,207,234,196,167,169,170,1,211,210,212,230,233,192,227,231,209,213,215', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-05-15', '2020-05-18 13:34:17', NULL, 'Sengupta'),
(16, 13, 0, NULL, 'Natasha  ', 'cartface.sales4@gmail.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-05-19', '2020-05-19 13:39:54', NULL, 'Purkaystha'),
(17, 42, 0, NULL, 'Indrani ', 'cartface.sales2@gmail.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-05-19', '2020-05-19 14:48:26', NULL, 'Dutta'),
(18, 41, 0, NULL, 'Rita ', 'cartface.sales1@gmail.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-05-19', '2020-05-19 14:52:28', NULL, 'Mallick'),
(19, 38, 0, NULL, 'Prodyut Km', 'sales@cartface.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-05-19', '2020-05-19 14:54:41', NULL, 'Sardar'),
(20, 40, 0, '1587534855.png', 'Ashish Kumar', 'sales@cartface.in', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-05-19', '2020-05-19 14:55:51', NULL, 'Jha'),
(21, 64, 0, NULL, 'Ramesh ', 'info@cartface.in', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-05-19', '0000-00-00 00:00:00', NULL, 'Shinde'),
(22, 17, 0, NULL, 'Piyali ', 'piyaliadhikari@sketchwebsolutions.com', '188', '8e9a64b995542c99e9ecf783e2e45f6c', 'N', 'Y', '2020-06-05', '2020-06-05 18:45:39', NULL, 'Adhikari'),
(24, 15, 0, NULL, 'Kaushik ', 'kaushik@sketchwebsolutions.com', '188', 'd94cd4eb7d61dfbacb9659d68d6293d0', 'N', 'Y', '2020-06-05', '2020-06-05 18:51:19', NULL, 'Choudhury'),
(25, 48, 0, NULL, 'Tapati ', 'tapati@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-05', '2020-06-05 19:08:23', NULL, 'Chakraborty'),
(26, 65, 0, NULL, 'Ranjan ', 'ranjan@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-05', '0000-00-00 00:00:00', NULL, 'Paul'),
(27, 66, 0, NULL, 'Saurodeep ', 'sauradeep@sketchwebsolutions.com', '188', '1d4bbcfed31c6e01e90d8e4099e39eb7', 'N', 'Y', '2020-06-05', '0000-00-00 00:00:00', NULL, 'Basak'),
(28, 18, 0, NULL, 'Tanushree ', 'tanusree@sketchwebsolutions.com', '188', '4a5da76f35fee2db4e5361a8c3061ee6', 'N', 'Y', '2020-06-05', '2020-06-05 19:30:19', NULL, 'Das'),
(29, 34, 0, NULL, 'Pankaj  Kumar ', 'pankaj@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2020-06-19 19:32:40', NULL, 'Poddar'),
(30, 21, 0, NULL, 'Pritam  ', 'pritam@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2020-06-19 19:28:34', NULL, 'Paul'),
(31, 32, 0, NULL, 'Jyotshna Rani', 'jyotshnarani@sketchwebsolutions.com', '188', 'affc1a3dada44ba1bab063655797c2a7', 'N', 'Y', '2020-06-19', '2020-06-19 19:31:06', NULL, 'Panda'),
(32, 14, 0, NULL, 'Kartick ', 'kartick.hazra@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2020-07-13 12:06:10', NULL, 'Hazra'),
(33, 30, 0, NULL, 'Najib ', 'designer.suit01@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2020-06-19 19:31:50', NULL, 'Sultan'),
(34, 20, 0, NULL, 'Raju ', 'developer.wiz08@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2020-06-19 19:33:29', NULL, 'Banerjee'),
(35, 26, 0, NULL, 'Ravi Kumar', 'ravi@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2020-06-19 19:34:13', NULL, 'Rao'),
(36, 11, 0, NULL, 'Saddam ', 'saddam.a@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2020-06-19 19:34:42', NULL, 'Ansari'),
(37, 23, 0, NULL, 'Sayan ', 'sayan.m@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2020-06-19 19:03:43', NULL, 'Mukherjee'),
(38, 22, 0, NULL, 'Shadab ', 'shadab.mallick@sketchwebsolutions.com', '188', '9912e3d8e345bb82fc074c3a31479411', 'N', 'Y', '2020-06-19', '2020-06-22 12:04:40', NULL, 'Mallick'),
(39, 27, 0, NULL, 'Subha ', 'developer.wiz10@sketchwebsolutions.com', '188', 'c29953f00f07a29400f2dcd9bfc840c8', 'N', 'Y', '2020-06-19', '2020-06-19 19:36:25', NULL, 'Dutta'),
(40, 39, 0, NULL, 'Sanchari  ', 'sanchari.d@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2020-06-19 19:21:17', NULL, 'De'),
(41, 29, 0, '1588076559.png', 'Anirban  ', 'designer.suit02@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2023-06-05 11:04:49', NULL, 'Mandal'),
(42, 24, 0, '1686112064.png', 'Arka ', 'developer.wiz09@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-19', '2023-06-07 09:58:07', NULL, 'Banerjee'),
(43, 67, 0, NULL, 'Avinaba ', 'avinaba@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00', NULL, 'Pramanik'),
(0, 0, 0, '1685950533.png', 'Mohan kumar', 'bootup786@gmail.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2023-06-05', '0000-00-00 00:00:00', NULL, 'sharma'),
(0, 134, 0, '1685951350.png', 'Rohit kumar', 'bootup786@gmail.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2023-06-05', '2023-06-05 13:46:39', NULL, 'sharma'),
(0, 5, 0, '1685981879.png', 'Anupit ', 'anup@sketchwebsolutions.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2023-06-05', '2023-06-05 21:49:01', NULL, 'Pan'),
(0, 135, 0, '1686136677.png', 'Aman kumar', 'bootup786@gmail.com', '188', 'e10adc3949ba59abbe56e057f20f883e', 'N', 'Y', '2023-06-07', '0000-00-00 00:00:00', NULL, 'Sharma');

-- --------------------------------------------------------

--
-- Table structure for table `hr_admin_left_menu`
--

CREATE TABLE `hr_admin_left_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `menu` text DEFAULT NULL,
  `main_menu_id` int(11) NOT NULL,
  `icon` text DEFAULT NULL,
  `routes_function` varchar(255) DEFAULT NULL,
  `page_no` varchar(255) DEFAULT NULL,
  `subfunction` text DEFAULT NULL,
  `orderNo` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_admin_left_menu`
--

INSERT INTO `hr_admin_left_menu` (`id`, `name`, `menu`, `main_menu_id`, `icon`, `routes_function`, `page_no`, `subfunction`, `orderNo`, `status`) VALUES
(1, 'User Role', NULL, 213, '<span class=\"ks-icon la la-cogs\"></span>', 'admin-settings', '42', '', 5, 1),
(4, 'Employee', NULL, 0, '<i class=\'ks-icon bx bx-user\'></i>', 'employee-list', '43', NULL, 2, 1),
(7, 'Labour', NULL, 2, NULL, 'labour-list', '44', NULL, 2, 0),
(159, 'Dashboard', NULL, 0, '<i class=\'ks-icon bx bx-home-alt\'></i>', 'dashboard', '41', '', 1, 0),
(160, 'Attendance', NULL, 227, '<i class=\'ks-icon bx bx-time\'></i>', 'attendance', '45', '', 1, 1),
(161, 'Payroll', NULL, 0, '<i class=\"ks-icon bx bx-rupee\"></i>', 'payroll', '46', '6', 6, 1),
(162, 'Tenancy Contract Details', NULL, 213, '<span class=\"ks-icon la la-book\"></span>', 'tenancy', '47', '', 3, 0),
(163, 'Vehicles', NULL, 211, '<span class=\"ks-icon la la-car\"></span>', 'vehicles', '48', '', 1, 0),
(164, 'Insurance Policies', NULL, 211, '<span class=\" ks-icon la la-file-text-o\"></span>', 'insurance-policies', '49', '', 8, 1),
(165, 'Projects', NULL, 213, '<span class=\"ks-icon la la-flask\"></span>', 'projects', '50', '', 17, 0),
(166, 'Setting', NULL, 0, '<span class=\"ks-icon la la-list\"></span>', '', '', '', 7, 0),
(167, 'Organization', NULL, 213, '', 'setting_organization', '36', '', 1, 1),
(168, 'Bank Details', NULL, 213, '', 'setting_organization_bank_details', '37', '', 2, 0),
(169, 'Location', NULL, 213, '', 'setting_location', '38', '', 3, 1),
(170, 'System Config', NULL, 213, '<span class=\"ks-icon la la-cogs\"></span>', 'setting_system_config', '39', '', 4, 1),
(171, 'Human Resource', NULL, 0, '<span class=\"ks-icon la la-book\"></span>', '', '', '', 20, 0),
(172, 'Skills', NULL, 210, '', 'qualification-skill', '2', '', 5, 0),
(173, 'Educations', NULL, 210, '', 'qualification-education', '3', '', 6, 0),
(174, 'Department', NULL, 210, '<span class=\"ks-icon la la-building\"></span>', 'department', '6', '', 2, 1),
(175, 'Designation', NULL, 210, ' <span class=\"ks-icon la la-pencil\"></span>', 'description', '7', '', 3, 1),
(176, 'Grade', NULL, 210, '<span class=\"ks-icon la la-pencil-square\"></span>', 'grade', '8', '', 1, 1),
(177, 'Work Shift', NULL, 210, '<span class=\"ks-icon la la-clock-o\"></span>', 'work_shift', '9', '', 4, 1),
(178, 'Work Week', NULL, 0, '<span class=\"ks-icon la la-comment\"></span>', 'work_week', '10', '', 8, 0),
(179, 'Holidays', NULL, 209, '<span class=\"ks-icon la la-smile-o\"></span>', 'holidays', '11', '', 1, 1),
(180, 'Salary Component', NULL, 211, ' <span class=\"ks-icon la la-money\"></span>', 'salary_component', '12', '', 3, 1),
(181, 'Salary Structure', NULL, 211, '<span class=\"ks-icon la la-life-ring\"></span>', 'salary_structure', '13', '', 4, 1),
(182, 'Late Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'late_rules', '23', '', 3, 1),
(183, 'Leave Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'leave_rules', '25', '', 2, 1),
(184, 'Attendance Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'attendance_rules', '24', '', 4, 1),
(185, 'OverTime Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'overtime_rules', '62', '', 6, 1),
(186, 'Gratuity Formula', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'gratuity_formula', '63', '', 5, 1),
(187, 'Application', NULL, 231, '<span class=\"ks-icon la la-life-ring\"></span>', 'employee_leave', '65', '', 1, 1),
(188, 'Dashboard', NULL, 0, '<i class=\'ks-icon bx bx-home-alt\'></i>', 'dashboard', '41', '', 1, 1),
(189, 'Certificate Type', NULL, 213, '<span class=\"ks-icon la la-dashboard\"></span>', 'certificate', '66', NULL, 6, 0),
(190, 'Increement', NULL, 213, '<span class=\"ks-icon la la-dashboard\"></span>', 'increement', '67', NULL, 23, 0),
(191, 'Complaints', NULL, 213, '<span class=\"ks-icon la la-book\"></span>', 'complaints', '68', '', 25, 0),
(192, 'Employee Of gratuity', NULL, 215, '<span class=\"ks-icon la la-book\"></span>', 'employee_gratuity', '70', '', 19, 1),
(193, 'Leave Settlement', NULL, 209, '<span class=\"ks-icon la la-book\"></span>', 'leave_settlement', '71', '', 1, 1),
(194, 'Equipment', NULL, 211, '<span class=\"ks-icon la la-dashboard\"></span>', 'equipment', '72', NULL, 2, 1),
(195, 'Employee Details', NULL, 171, '<span class=\"ks-icon la la-dashboard\"></span>', 'employee_details', '74', NULL, 5, 1),
(196, 'Assigned Equipment', NULL, 209, '<span class=\"ks-icon la la-dashboard\"></span>', 'assigned_employee', '73', NULL, 7, 1),
(197, 'Admin Settings', NULL, 0, '<span class=\"ks-icon la la-gear\"></span>', '', '', NULL, 21, 0),
(198, 'Tenancy Contract', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 22, 0),
(199, 'Inventory', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 8, 0),
(200, 'Purchase', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 9, 0),
(201, 'Accounting', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 10, 0),
(202, 'General System Setting', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 19, 0),
(203, 'Labor List', NULL, 171, '<span class=\"ks-icon la la-smile-o\"></span>', '', '2', '', 2, 0),
(204, 'P-Tax', NULL, 211, NULL, 'ptax', '75', NULL, 6, 1),
(205, 'State Add', NULL, 213, NULL, 'state_add', '76', NULL, 27, 0),
(206, 'PF', NULL, 211, '<span class=\"ks-icon la la-users\"></span>', 'PF', '77', NULL, 5, 1),
(207, 'Assign Location', NULL, 209, NULL, NULL, '78', NULL, 3, 1),
(208, 'Pay Schedule', NULL, 211, NULL, NULL, '79', NULL, 7, 0),
(209, 'Core HR', NULL, 0, '<i class=\"ks-icon bx bx-receipt\"></i>', '', '', '', 7, 1),
(210, 'Employee Master', NULL, 213, '<span class=\"ks-icon la la-users\"></span>', '', '', '', 8, 1),
(211, 'HR Master', NULL, 213, '<span class=\"ks-icon la la-users\"></span>', '', '', '', 7, 1),
(212, 'Rules', NULL, 213, '<span class=\"ks-icon la la-sliders\"></span>', '', '', '', 9, 1),
(213, 'Settings', NULL, 0, '<i class=\"ks-icon bx bx-cog\"></i>', '', '', '', 10, 1),
(214, 'Payroll Overview', NULL, 0, '<span class=\"ks-icon la la-book\"></span>', '', '', '', 10, 0),
(215, 'Report', NULL, 0, '<i class=\"ks-icon bx bx-bar-chart-square\"></i>', '', '', NULL, 90, 1),
(216, 'ESI', NULL, 211, '<span class=\"ks-icon la la-users\"></span>', 'ESI', '80', NULL, 5, 1),
(217, 'Loan', NULL, 0, '<span class=\"ks-icon la la-life-ring\"></span>', 'employee_loan', '85', '', 5, 1),
(218, 'Shift Roster', NULL, 0, '<i class=\"ks-icon bx bx-transfer\"></i>', 'assigned_work_shift', '82', '', 6, 1),
(219, 'Notice', NULL, 209, '<span class=\"ks-icon la la-smile-o\"></span>', 'notice', '83', '', 2, 1),
(220, 'Statutory', NULL, 211, '<span class=\"ks-icon la la-life-ring\"></span>', 'statutory', '81', '', 4, 0),
(221, 'LOP Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'lop', '84', '', 5, 1),
(222, 'Approval Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', '', '', '', 6, 1),
(223, 'Leave Settlement', NULL, 209, '<span class=\"ks-icon la la-smile-o\"></span>', '', '', '', 3, 0),
(224, 'Assign workshift', NULL, 209, NULL, 'assigned_work_shift', '82', NULL, 4, 0),
(225, 'Set formula', NULL, 211, '<span class=\"ks-icon la la-life-ring\"></span>', 'insentive_reimbursement_rule', '86', '', 5, 0),
(226, 'Organization Details', NULL, 213, '', '', '', '', 2, 0),
(227, 'Attendance', NULL, 0, '<i class=\'ks-icon bx bx-time\'></i>', 'attendance', '', '', 3, 1),
(228, 'Time off', NULL, 227, '<span class=\"ks-icon la la-th\"></span>', 'timeoff', '87', '', 2, 1),
(229, 'WFH/Timeoff Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'wfh', '88', '', 4, 1),
(230, 'Attendance Report', NULL, 215, '<span class=\"ks-icon la la-book\"></span>', 'employee_attendance', '89', '', 2, 1),
(231, 'Leave', NULL, 0, '<i class=\"ks-icon bx bxs-plane-take-off\"></i>', '', '', '', 4, 1),
(232, 'Register', NULL, 231, '<span class=\"ks-icon la la-life-ring\"></span>', 'employee_opening_leave', '90', '', 2, 1),
(233, 'Summary Report', NULL, 215, '<span class=\"ks-icon la la-book\"></span>', 'summary_report', '91', '', 2, 1),
(234, 'Templates', NULL, 209, '<span class=\"ks-icon la la-life-ring\"></span>', 'templates', '92', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_admin_left_menu_12?_sep_19`
--

CREATE TABLE `hr_admin_left_menu_12?_sep_19` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `menu` text DEFAULT NULL,
  `main_menu_id` int(11) NOT NULL,
  `icon` text DEFAULT NULL,
  `routes_function` varchar(255) DEFAULT NULL,
  `page_no` varchar(255) DEFAULT NULL,
  `subfunction` text DEFAULT NULL,
  `orderNo` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_admin_left_menu_12?_sep_19`
--

INSERT INTO `hr_admin_left_menu_12?_sep_19` (`id`, `name`, `menu`, `main_menu_id`, `icon`, `routes_function`, `page_no`, `subfunction`, `orderNo`, `status`) VALUES
(1, 'User Role', NULL, 213, '<span class=\"ks-icon la la-cogs\"></span>', 'admin-settings', '42', '', 5, 1),
(2, 'Employee', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', NULL, 'userlist', NULL, 2, 0),
(4, 'Employee', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', 'employee-list', '43', NULL, 2, 1),
(7, 'Labour', NULL, 2, NULL, 'labour-list', '44', NULL, 2, 0),
(159, 'Dashboard', NULL, 0, '<span class=\"ks-icon la la-dashboard\"></span>', 'dashboard', '41', '', 1, 0),
(160, 'Attendance', NULL, 0, '<span class=\"ks-icon la la-th\"></span>', 'attendance', '45', '', 3, 1),
(161, 'Payroll', NULL, 214, '<span class=\"ks-icon la la-usd\"></span>', 'payroll', '46', '6', 1, 1),
(162, 'Tenancy Contract Details', NULL, 202, '<span class=\"ks-icon la la-book\"></span>', 'tenancy', '47', '', 3, 1),
(163, 'Vehicles', NULL, 211, '<span class=\"ks-icon la la-car\"></span>', 'vehicles', '48', '', 1, 1),
(164, 'Insurance Policies', NULL, 211, '<span class=\" ks-icon la la-file-text-o\"></span>', 'insurance-policies', '49', '', 6, 1),
(165, 'Projects', NULL, 202, '<span class=\"ks-icon la la-flask\"></span>', 'projects', '50', '', 17, 1),
(166, 'Setting', NULL, 0, '<span class=\"ks-icon la la-list\"></span>', '', '', '', 7, 0),
(167, 'Organization', NULL, 213, '', 'setting_organization', '36', '', 1, 1),
(168, 'Organization Bank Details', NULL, 213, '', 'setting_organization_bank_details', '37', '', 4, 1),
(169, 'Location', NULL, 213, '', 'setting_location', '38', '', 2, 1),
(170, 'System Config', NULL, 202, '<span class=\"ks-icon la la-cogs\"></span>', 'setting_system_config', '39', '', 1, 1),
(171, 'Human Resource', NULL, 0, '<span class=\"ks-icon la la-book\"></span>', '', '', '', 20, 0),
(172, 'Skills', NULL, 210, '', 'qualification-skill', '2', '', 5, 1),
(173, 'Educations', NULL, 210, '', 'qualification-education', '3', '', 6, 1),
(174, 'Department', NULL, 210, '<span class=\"ks-icon la la-building\"></span>', 'department', '6', '', 2, 1),
(175, 'Designation', NULL, 210, ' <span class=\"ks-icon la la-pencil\"></span>', 'description', '7', '', 3, 1),
(176, 'Grade', NULL, 210, '<span class=\"ks-icon la la-pencil-square\"></span>', 'grade', '8', '', 1, 1),
(177, 'Work Shift', NULL, 210, '<span class=\"ks-icon la la-clock-o\"></span>', 'work_shift', '9', '', 4, 1),
(178, 'Work Week', NULL, 0, '<span class=\"ks-icon la la-comment\"></span>', 'work_week', '10', '', 8, 0),
(179, 'Holidays', NULL, 209, '<span class=\"ks-icon la la-smile-o\"></span>', 'holidays', '11', '', 11, 1),
(180, 'Salary Component', NULL, 211, ' <span class=\"ks-icon la la-money\"></span>', 'salary_component', '12', '', 3, 1),
(181, 'Salary Structure', NULL, 211, '<span class=\"ks-icon la la-life-ring\"></span>', 'salary_structure', '13', '', 4, 1),
(182, 'Late Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'late_rules', '23', '', 3, 1),
(183, 'Leave Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'leave_rules', '25', '', 2, 1),
(184, 'Attendance Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'attendance_rules', '24', '', 4, 1),
(185, 'OverTime Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'overtime_rules', '62', '', 6, 1),
(186, 'Gratuity Formula', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'gratuity_formula', '63', '', 5, 1),
(187, 'Leave', NULL, 0, '<span class=\"ks-icon la la-life-ring\"></span>', 'employee_leave', '65', '', 4, 1),
(188, 'Dashboard', NULL, 0, '<span class=\"ks-icon la la-dashboard\"></span>', 'dashboard', '41', '', 1, 1),
(189, 'Certificate Type', NULL, 202, '<span class=\"ks-icon la la-dashboard\"></span>', 'certificate', '66', NULL, 22, 1),
(190, 'Increement', NULL, 202, '<span class=\"ks-icon la la-dashboard\"></span>', 'increement', '67', NULL, 23, 1),
(191, 'Complaints', NULL, 202, '<span class=\"ks-icon la la-book\"></span>', 'complaints', '68', '', 25, 1),
(192, 'Employee Of gratuity', NULL, 202, '<span class=\"ks-icon la la-book\"></span>', 'employee_gratuity', '70', '', 19, 1),
(193, 'Leave Settlement', NULL, 212, '<span class=\"ks-icon la la-book\"></span>', 'leave_settlement', '71', '', 1, 1),
(194, 'Equipment', NULL, 211, '<span class=\"ks-icon la la-dashboard\"></span>', 'equipment', '72', NULL, 2, 1),
(195, 'Employee Details', NULL, 171, '<span class=\"ks-icon la la-dashboard\"></span>', 'employee_details', '74', NULL, 5, 1),
(196, 'Assigned Equipment', NULL, 202, '<span class=\"ks-icon la la-dashboard\"></span>', 'assigned_employee', '73', NULL, 7, 1),
(197, 'Admin Settings', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 21, 0),
(198, 'Tenancy Contract', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 22, 0),
(199, 'Inventory', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 8, 0),
(200, 'Purchase', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 9, 0),
(201, 'Accounting', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 10, 0),
(202, 'General System Setting', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 19, 1),
(203, 'Labor List', NULL, 171, '<span class=\"ks-icon la la-smile-o\"></span>', '', '2', '', 2, 0),
(204, 'P-Tax', NULL, 202, NULL, 'ptax', '75', NULL, 26, 1),
(205, 'State Add', NULL, 202, NULL, 'state_add', '76', NULL, 27, 0),
(206, 'PF', NULL, 211, '<span class=\"ks-icon la la-users\"></span>', 'PF', '77', NULL, 5, 1),
(207, 'Assign Location', NULL, 213, NULL, NULL, '78', NULL, 3, 1),
(208, 'Pay Schedule', NULL, 211, NULL, NULL, '79', NULL, 7, 1),
(209, 'Core HR', NULL, 0, '<span class=\"ks-icon la la-life-ring\"></span>', '', '', '', 5, 1),
(210, 'Employee Master', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', '', '', '', 6, 1),
(211, 'HR Master', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', '', '', '', 7, 1),
(212, 'Rules', NULL, 0, '<span class=\"ks-icon la la-sliders\"></span>', '', '', '', 8, 1),
(213, 'Systems config.', NULL, 0, '<span class=\"ks-icon la la-sliders\"></span>', '', '', '', 9, 1),
(214, 'Payroll Overview', NULL, 0, '<span class=\"ks-icon la la-book\"></span>', '', '', '', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_admin_left_menu_bkup`
--

CREATE TABLE `hr_admin_left_menu_bkup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `menu` text DEFAULT NULL,
  `main_menu_id` int(11) NOT NULL,
  `icon` text DEFAULT NULL,
  `routes_function` varchar(255) DEFAULT NULL,
  `page_no` varchar(255) DEFAULT NULL,
  `subfunction` text DEFAULT NULL,
  `orderNo` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_admin_left_menu_bkup`
--

INSERT INTO `hr_admin_left_menu_bkup` (`id`, `name`, `menu`, `main_menu_id`, `icon`, `routes_function`, `page_no`, `subfunction`, `orderNo`, `status`) VALUES
(1, 'User Role', NULL, 197, '<span class=\"ks-icon la la-cogs\"></span>', 'admin-settings', '42', '', 7, 1),
(2, 'Employee', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', NULL, 'userlist', NULL, 2, 0),
(4, 'Employee', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', 'employee-list', '43', NULL, 1, 1),
(7, 'Labour', NULL, 2, NULL, 'labour-list', '44', NULL, 2, 0),
(159, 'Dashboard', NULL, 0, '<span class=\"ks-icon la la-dashboard\"></span>', 'dashboard', '41', '', 1, 0),
(160, 'Attendance', NULL, 0, '<span class=\"ks-icon la la-th\"></span>', 'attendance', '45', '', 2, 1),
(161, 'Payroll', NULL, 171, '<span class=\"ks-icon la la-usd\"></span>', 'payroll', '46', '6', 4, 1),
(162, 'Tenancy Contract Details', NULL, 198, '<span class=\"ks-icon la la-book\"></span>', 'tenancy', '47', '', 3, 1),
(163, 'Vehicles', NULL, 202, '<span class=\"ks-icon la la-car\"></span>', 'vehicles', '48', '', 8, 1),
(164, 'Insurance Policies', NULL, 202, '<span class=\" ks-icon la la-file-text-o\"></span>', 'insurance-policies', '49', '', 16, 1),
(165, 'Projects', NULL, 202, '<span class=\"ks-icon la la-flask\"></span>', 'projects', '50', '', 17, 1),
(166, 'Setting', NULL, 0, '<span class=\"ks-icon la la-list\"></span>', '', '', '', 7, 0),
(167, 'Organization', NULL, 202, '', 'setting_organization', '36', '', 4, 1),
(168, 'Organization Bank Details', NULL, 202, '', 'setting_organization_bank_details', '37', '', 1, 1),
(169, 'Location', NULL, 202, '', 'setting_location', '38', '', 2, 1),
(170, 'System Config', NULL, 197, '<span class=\"ks-icon la la-cogs\"></span>', 'setting_system_config', '39', '', 8, 1),
(171, 'Human Resource', NULL, 0, '<span class=\"ks-icon la la-book\"></span>', '', '', '', 1, 1),
(172, 'Skills', NULL, 202, '', 'qualification-skill', '2', '', 9, 1),
(173, 'Educations', NULL, 202, '', 'qualification-education', '3', '', 12, 1),
(174, 'Department', NULL, 202, '<span class=\"ks-icon la la-building\"></span>', 'department', '6', '', 5, 1),
(175, 'Designation', NULL, 202, ' <span class=\"ks-icon la la-pencil\"></span>', 'description', '7', '', 10, 1),
(176, 'Grade', NULL, 202, '<span class=\"ks-icon la la-pencil-square\"></span>', 'grade', '8', '', 3, 1),
(177, 'Work Shift', NULL, 202, '<span class=\"ks-icon la la-clock-o\"></span>', 'work_shift', '9', '', 6, 1),
(178, 'Work Week', NULL, 0, '<span class=\"ks-icon la la-comment\"></span>', 'work_week', '10', '', 8, 0),
(179, 'Holidays', NULL, 202, '<span class=\"ks-icon la la-smile-o\"></span>', 'holidays', '11', '', 11, 1),
(180, 'Salary Component', NULL, 202, ' <span class=\"ks-icon la la-money\"></span>', 'salary_component', '12', '', 13, 1),
(181, 'Salary Structure', NULL, 202, '<span class=\"ks-icon la la-life-ring\"></span>', 'salary_structure', '13', '', 14, 1),
(182, 'Late Rules', NULL, 202, '<span class=\"ks-icon la la-life-ring\"></span>', 'late_rules', '23', '', 18, 1),
(183, 'Leave Rules', NULL, 202, '<span class=\"ks-icon la la-life-ring\"></span>', 'leave_rules', '25', '', 15, 1),
(184, 'Attendance Rules', NULL, 202, '<span class=\"ks-icon la la-life-ring\"></span>', 'attendance_rules', '24', '', 21, 1),
(185, 'OverTime Rules', NULL, 171, '<span class=\"ks-icon la la-life-ring\"></span>', 'overtime_rules', '62', '', 6, 1),
(186, 'Gratuity Formula', NULL, 171, '<span class=\"ks-icon la la-life-ring\"></span>', 'gratuity_formula', '63', '', 7, 1),
(187, 'Leave', NULL, 0, '<span class=\"ks-icon la la-life-ring\"></span>', 'employee_leave', '65', '', 3, 1),
(188, 'Dashboard', NULL, 0, '<span class=\"ks-icon la la-dashboard\"></span>', 'dashboard', '41', '', 0, 1),
(189, 'Certificate Type', NULL, 202, '<span class=\"ks-icon la la-dashboard\"></span>', 'certificate', '66', NULL, 22, 1),
(190, 'Increement', NULL, 202, '<span class=\"ks-icon la la-dashboard\"></span>', 'increement', '67', NULL, 23, 1),
(191, 'Complaints', NULL, 202, '<span class=\"ks-icon la la-book\"></span>', 'complaints', '68', '', 25, 1),
(192, 'Employee Of gratuity', NULL, 202, '<span class=\"ks-icon la la-book\"></span>', 'employee_gratuity', '70', '', 19, 1),
(193, 'Leave Settlement', NULL, 202, '<span class=\"ks-icon la la-book\"></span>', 'leave_settlement', '71', '', 13, 1),
(194, 'Equipment', NULL, 202, '<span class=\"ks-icon la la-dashboard\"></span>', 'equipment', '72', NULL, 24, 1),
(195, 'Employee Details', NULL, 171, '<span class=\"ks-icon la la-dashboard\"></span>', 'employee_details', '74', NULL, 5, 1),
(196, 'Assigned Equipment', NULL, 202, '<span class=\"ks-icon la la-dashboard\"></span>', 'assigned_employee', '73', NULL, 7, 1),
(197, 'Admin Settings', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 0, 1),
(198, 'Tenancy Contract', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 1, 1),
(199, 'Inventory', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 8, 1),
(200, 'Purchase', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 9, 1),
(201, 'Accounting', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 10, 1),
(202, 'General System Setting', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 14, 1),
(203, 'Labor List', NULL, 171, '<span class=\"ks-icon la la-smile-o\"></span>', '', '2', '', 2, 0),
(204, 'P-Tax', NULL, 202, NULL, 'ptax', '75', NULL, 26, 1),
(205, 'State Add', NULL, 202, NULL, 'state_add', '76', NULL, 27, 0),
(206, 'PF', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', 'PF', '77', NULL, 3, 1),
(207, 'Assign Location', NULL, 202, NULL, NULL, '78', NULL, 2, 1),
(208, 'Pay Schedule', NULL, 202, NULL, NULL, '79', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_admin_left_menu_jan_20`
--

CREATE TABLE `hr_admin_left_menu_jan_20` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `menu` text DEFAULT NULL,
  `main_menu_id` int(11) NOT NULL,
  `icon` text DEFAULT NULL,
  `routes_function` varchar(255) DEFAULT NULL,
  `page_no` varchar(255) DEFAULT NULL,
  `subfunction` text DEFAULT NULL,
  `orderNo` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_admin_left_menu_jan_20`
--

INSERT INTO `hr_admin_left_menu_jan_20` (`id`, `name`, `menu`, `main_menu_id`, `icon`, `routes_function`, `page_no`, `subfunction`, `orderNo`, `status`) VALUES
(1, 'User Role', NULL, 213, '<span class=\"ks-icon la la-cogs\"></span>', 'admin-settings', '42', '', 5, 1),
(2, 'Employee', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', NULL, 'userlist', NULL, 2, 0),
(4, 'Employee', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', 'employee-list', '43', NULL, 2, 1),
(7, 'Labour', NULL, 2, NULL, 'labour-list', '44', NULL, 2, 0),
(159, 'Dashboard', NULL, 0, '<span class=\"ks-icon la la-dashboard\"></span>', 'dashboard', '41', '', 1, 0),
(160, 'Attendance', NULL, 0, '<span class=\"ks-icon la la-th\"></span>', 'attendance', '45', '', 3, 1),
(161, 'Payroll', NULL, 0, '<span class=\"ks-icon la la-usd\"></span>', 'payroll', '46', '6', 6, 1),
(162, 'Tenancy Contract Details', NULL, 213, '<span class=\"ks-icon la la-book\"></span>', 'tenancy', '47', '', 3, 0),
(163, 'Vehicles', NULL, 211, '<span class=\"ks-icon la la-car\"></span>', 'vehicles', '48', '', 1, 1),
(164, 'Insurance Policies', NULL, 211, '<span class=\" ks-icon la la-file-text-o\"></span>', 'insurance-policies', '49', '', 6, 1),
(165, 'Projects', NULL, 213, '<span class=\"ks-icon la la-flask\"></span>', 'projects', '50', '', 17, 0),
(166, 'Setting', NULL, 0, '<span class=\"ks-icon la la-list\"></span>', '', '', '', 7, 0),
(167, 'Organization', NULL, 213, '', 'setting_organization', '36', '', 1, 1),
(168, 'Organization Bank Details', NULL, 213, '', 'setting_organization_bank_details', '37', '', 4, 1),
(169, 'Location', NULL, 213, '', 'setting_location', '38', '', 2, 1),
(170, 'System Config', NULL, 213, '<span class=\"ks-icon la la-cogs\"></span>', 'setting_system_config', '39', '', 1, 1),
(171, 'Human Resource', NULL, 0, '<span class=\"ks-icon la la-book\"></span>', '', '', '', 20, 0),
(172, 'Skills', NULL, 210, '', 'qualification-skill', '2', '', 5, 1),
(173, 'Educations', NULL, 210, '', 'qualification-education', '3', '', 6, 1),
(174, 'Department', NULL, 210, '<span class=\"ks-icon la la-building\"></span>', 'department', '6', '', 2, 1),
(175, 'Designation', NULL, 210, ' <span class=\"ks-icon la la-pencil\"></span>', 'description', '7', '', 3, 1),
(176, 'Grade', NULL, 210, '<span class=\"ks-icon la la-pencil-square\"></span>', 'grade', '8', '', 1, 1),
(177, 'Work Shift', NULL, 210, '<span class=\"ks-icon la la-clock-o\"></span>', 'work_shift', '9', '', 4, 1),
(178, 'Work Week', NULL, 0, '<span class=\"ks-icon la la-comment\"></span>', 'work_week', '10', '', 8, 0),
(179, 'Holidays', NULL, 209, '<span class=\"ks-icon la la-smile-o\"></span>', 'holidays', '11', '', 1, 1),
(180, 'Salary Component', NULL, 211, ' <span class=\"ks-icon la la-money\"></span>', 'salary_component', '12', '', 3, 1),
(181, 'Salary Structure', NULL, 211, '<span class=\"ks-icon la la-life-ring\"></span>', 'salary_structure', '13', '', 4, 1),
(182, 'Late Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'late_rules', '23', '', 3, 1),
(183, 'Leave Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'leave_rules', '25', '', 2, 1),
(184, 'Attendance Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'attendance_rules', '24', '', 4, 1),
(185, 'OverTime Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'overtime_rules', '62', '', 6, 1),
(186, 'Gratuity Formula', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'gratuity_formula', '63', '', 5, 1),
(187, 'Leave', NULL, 0, '<span class=\"ks-icon la la-life-ring\"></span>', 'employee_leave', '65', '', 4, 1),
(188, 'Dashboard', NULL, 0, '<span class=\"ks-icon la la-dashboard\"></span>', 'dashboard', '41', '', 1, 1),
(189, 'Certificate Type', NULL, 213, '<span class=\"ks-icon la la-dashboard\"></span>', 'certificate', '66', NULL, 22, 1),
(190, 'Increement', NULL, 213, '<span class=\"ks-icon la la-dashboard\"></span>', 'increement', '67', NULL, 23, 0),
(191, 'Complaints', NULL, 213, '<span class=\"ks-icon la la-book\"></span>', 'complaints', '68', '', 25, 0),
(192, 'Employee Of gratuity', NULL, 215, '<span class=\"ks-icon la la-book\"></span>', 'employee_gratuity', '70', '', 19, 1),
(193, 'Leave Settlement', NULL, 209, '<span class=\"ks-icon la la-book\"></span>', 'leave_settlement', '71', '', 1, 1),
(194, 'Equipment', NULL, 211, '<span class=\"ks-icon la la-dashboard\"></span>', 'equipment', '72', NULL, 2, 1),
(195, 'Employee Details', NULL, 171, '<span class=\"ks-icon la la-dashboard\"></span>', 'employee_details', '74', NULL, 5, 1),
(196, 'Assigned Equipment', NULL, 209, '<span class=\"ks-icon la la-dashboard\"></span>', 'assigned_employee', '73', NULL, 7, 1),
(197, 'Admin Settings', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 21, 0),
(198, 'Tenancy Contract', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 22, 0),
(199, 'Inventory', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 8, 0),
(200, 'Purchase', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 9, 0),
(201, 'Accounting', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 10, 0),
(202, 'General System Setting', NULL, 0, '<span class=\"ks-icon la la-cogs\"></span>', '', '', NULL, 19, 0),
(203, 'Labor List', NULL, 171, '<span class=\"ks-icon la la-smile-o\"></span>', '', '2', '', 2, 0),
(204, 'P-Tax', NULL, 213, NULL, 'ptax', '75', NULL, 26, 0),
(205, 'State Add', NULL, 213, NULL, 'state_add', '76', NULL, 27, 0),
(206, 'PF', NULL, 211, '<span class=\"ks-icon la la-users\"></span>', 'PF', '77', NULL, 5, 0),
(207, 'Assign Location', NULL, 209, NULL, NULL, '78', NULL, 3, 1),
(208, 'Pay Schedule', NULL, 211, NULL, NULL, '79', NULL, 7, 1),
(209, 'Core HR', NULL, 0, '<span class=\"ks-icon la la-life-ring\"></span>', '', '', '', 7, 1),
(210, 'Employee Master', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', '', '', '', 8, 1),
(211, 'HR Master', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', '', '', '', 9, 1),
(212, 'Rules', NULL, 0, '<span class=\"ks-icon la la-sliders\"></span>', '', '', '', 10, 1),
(213, 'Settings', NULL, 0, '<span class=\"ks-icon la la-sliders\"></span>', '', '', '', 10, 1),
(214, 'Payroll Overview', NULL, 0, '<span class=\"ks-icon la la-book\"></span>', '', '', '', 10, 0),
(215, 'Report', NULL, 0, '<span class=\"ks-icon la la-users\"></span>', '', '', NULL, 90, 1),
(216, 'ESI', NULL, 211, '<span class=\"ks-icon la la-users\"></span>', 'ESI', '80', NULL, 5, 0),
(217, 'Loan', NULL, 0, '<span class=\"ks-icon la la-life-ring\"></span>', 'employee_loan', '85', '', 5, 1),
(218, 'Shift Roster', NULL, 0, '<span class=\"ks-icon la la-life-ring\"></span>', 'assigned_work_shift', '82', '', 6, 1),
(219, 'Notice', NULL, 209, '<span class=\"ks-icon la la-smile-o\"></span>', 'notice', '83', '', 2, 1),
(220, 'Statutory', NULL, 211, '<span class=\"ks-icon la la-life-ring\"></span>', 'statutory', '81', '', 4, 1),
(221, 'LOP Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', 'lop', '84', '', 5, 1),
(222, 'Approval Rules', NULL, 212, '<span class=\"ks-icon la la-life-ring\"></span>', '', '', '', 6, 1),
(223, 'Leave Settlement', NULL, 209, '<span class=\"ks-icon la la-smile-o\"></span>', '', '', '', 3, 0),
(224, 'Assign workshift', NULL, 209, NULL, 'assigned_work_shift', '82', NULL, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_admin_settings`
--

CREATE TABLE `hr_admin_settings` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `family_name` varchar(100) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `security_level` varchar(100) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_admin_settings`
--

INSERT INTO `hr_admin_settings` (`id`, `first_name`, `family_name`, `position`, `email`, `security_level`, `department_id`, `password`, `image`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'subharanjan', 'das', 4, 'subharanjan@sketchwebsolutions.com', NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', '15488537101509350577.jpg', 'N', 'Y', '2019-01-30', '2019-01-30 18:43:58'),
(2, 'renu', 'gupta', 3, 'renu@yopmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '15488540082009466907.jpg', 'N', 'Y', '2019-01-30', '0000-00-00 00:00:00'),
(3, 'Test1', 'Test1', 4, 'test@gmail.in', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '1556362207702626104.jpg', 'N', 'Y', '2019-04-27', '0000-00-00 00:00:00'),
(4, 'test2', 'test2', 4, 'test2@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '1556362296867795880.png', 'N', 'Y', '2019-04-27', '0000-00-00 00:00:00'),
(5, 'User1 ', 'User1', 8, 'saikat.gupta@sketchwebsolutions.com', NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', '155833262646820574.jpg', 'N', 'Y', '2019-05-20', '2019-05-20 11:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `hr_assigned_location`
--

CREATE TABLE `hr_assigned_location` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `effective_start_date` date NOT NULL,
  `effective_end_date` date NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_assigned_location`
--

INSERT INTO `hr_assigned_location` (`id`, `organization_id`, `employee_id`, `effective_start_date`, `effective_end_date`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 3, 28, '2020-01-01', '0000-00-00', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(2, 1, 5, '2020-03-06', '0000-00-00', 'N', 'Y', '2020-03-06', '2020-04-23 13:10:04'),
(3, 1, 51, '2020-01-01', '0000-00-00', 'N', 'Y', '2020-03-19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_assigned_workshift`
--

CREATE TABLE `hr_assigned_workshift` (
  `id` int(11) NOT NULL,
  `work_shift_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `off_day` varchar(100) NOT NULL,
  `end_date` date NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `daterange` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_assigned_workshift`
--

INSERT INTO `hr_assigned_workshift` (`id`, `work_shift_id`, `employee_id`, `start_date`, `off_day`, `end_date`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `daterange`) VALUES
(1, 12, 2, '2020-04-01', '', '0000-00-00', 'N', 'Y', '2020-04-25', '0000-00-00 00:00:00', '01-4-2020 - 02-4-2020'),
(2, 12, 2, '2020-04-02', '', '0000-00-00', 'N', 'Y', '2020-04-25', '0000-00-00 00:00:00', '01-4-2020 - 02-4-2020'),
(3, 12, 12, '2020-05-05', 'Sunday', '0000-00-00', 'N', 'Y', '2020-05-04', '0000-00-00 00:00:00', '05-5-2020 - 05-5-2020'),
(0, 0, 5, '2023-06-05', 'Monday', '0000-00-00', 'N', 'Y', '2023-06-05', '0000-00-00 00:00:00', '05-6-2023 - 05-6-2023');

-- --------------------------------------------------------

--
-- Table structure for table `hr_assigned_workshift_details`
--

CREATE TABLE `hr_assigned_workshift_details` (
  `id` int(11) NOT NULL,
  `work_shift_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_assign_employee`
--

CREATE TABLE `hr_assign_employee` (
  `id` int(11) NOT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_assign_employee`
--

INSERT INTO `hr_assign_employee` (`id`, `equipment_id`, `employee_id`, `quantity`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(7, 5, 8, 20, 'Y', 'N', '2019-07-15', '2019-07-15 12:48:31'),
(8, 0, 6, 1, 'N', 'Y', '2019-07-15', '2020-03-28 12:10:42'),
(9, 2, 4, 10, 'N', 'Y', '2019-07-15', '2019-07-15 19:41:04'),
(10, 0, 28, 0, 'N', 'Y', '2019-07-16', '2020-03-28 12:11:56'),
(11, 2, 22, 1, 'N', 'Y', '2019-07-16', '0000-00-00 00:00:00'),
(12, 2, 10, 1, 'N', 'Y', '2020-03-06', '0000-00-00 00:00:00'),
(13, 6, 51, 2, 'Y', 'N', '2020-03-19', '2020-03-28 12:09:31'),
(14, 6, 51, 1, 'N', 'Y', '2020-03-19', '2020-04-25 11:10:11'),
(15, 8, 51, 1, 'N', 'Y', '2020-03-19', '0000-00-00 00:00:00'),
(16, 9, 51, 1, 'N', 'Y', '2020-03-19', '0000-00-00 00:00:00'),
(17, 10, 12, 99, 'Y', 'N', '2020-03-26', '2020-03-26 10:48:07'),
(18, 10, 12, 10, 'Y', 'N', '2020-03-26', '0000-00-00 00:00:00'),
(19, 4, 12, 1, 'Y', 'N', '2020-03-26', '2020-03-26 11:37:15'),
(20, 4, 12, 1, 'Y', 'N', '2020-03-26', '0000-00-00 00:00:00'),
(21, 4, 43, 46, 'Y', 'N', '2020-04-25', '0000-00-00 00:00:00'),
(22, 15, 12, 12, 'Y', 'N', '2020-04-27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_attendance`
--

CREATE TABLE `hr_attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `flag` enum('0','1') NOT NULL DEFAULT '1',
  `entry_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `day_type` varchar(100) DEFAULT NULL,
  `late_type` varchar(100) DEFAULT NULL,
  `total_hour` varchar(100) DEFAULT NULL,
  `overTime` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_attendance`
--

INSERT INTO `hr_attendance` (`id`, `employee_id`, `date`, `type`, `flag`, `entry_time`, `out_time`, `day_type`, `late_type`, `total_hour`, `overTime`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 38, '2020-05-19', '', '1', '18:02:00', '20:07:00', 'Absent', 'Late', '02:05', '', 'N', 'Y', '2020-05-19', '2020-05-19 20:30:25'),
(2, 41, '2020-05-19', '', '1', '18:01:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-05-19', '0000-00-00 00:00:00'),
(3, 13, '2020-05-19', '', '1', '18:10:00', '21:51:00', 'Absent', 'Late', '03:41', '', 'N', 'Y', '2020-05-19', '2020-05-19 21:51:10'),
(4, 42, '2020-05-20', '', '1', '11:51:00', '16:23:00', 'Half Day', 'Late', '04:32', '', 'N', 'Y', '2020-05-20', '2020-05-20 16:23:40'),
(5, 13, '2020-05-20', '', '1', '11:52:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-05-20', '0000-00-00 00:00:00'),
(6, 40, '2020-05-20', '', '1', '12:46:00', '12:46:00', 'Absent', 'Late', '00:00', '', 'N', 'Y', '2020-05-20', '2020-05-20 12:47:10'),
(7, 42, '2020-05-21', '', '1', '09:58:00', '14:43:00', 'Half Day', 'Not Late', '04:45', '', 'N', 'Y', '2020-05-21', '2020-05-21 14:43:56'),
(8, 40, '2020-05-21', '', '1', '10:14:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-05-21', '0000-00-00 00:00:00'),
(9, 40, '2020-05-22', '', '1', '10:06:00', '19:22:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-05-22', '2020-05-22 19:22:11'),
(10, 42, '2020-05-22', '', '1', '10:06:00', '15:02:00', 'Half Day', 'Not Late', '04:56', '', 'N', 'Y', '2020-05-22', '2020-05-22 15:03:02'),
(11, 42, '2020-05-23', '', '1', '10:17:00', '14:15:00', 'Half Day', 'Not Late', '03:58', '', 'N', 'Y', '2020-05-23', '2020-05-23 14:15:20'),
(12, 40, '2020-05-25', '', '1', '10:17:00', '17:48:00', 'Full Day', 'Not Late', '07:31', '', 'N', 'Y', '2020-05-25', '2020-05-25 18:58:28'),
(13, 42, '2020-05-25', '', '1', '10:27:00', '11:41:00', 'Absent', 'Not Late', '01:14', '', 'N', 'Y', '2020-05-25', '2020-05-25 11:42:18'),
(14, 40, '2020-05-26', '', '1', '10:22:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-05-26', '0000-00-00 00:00:00'),
(15, 42, '2020-05-26', '', '1', '10:49:00', '14:20:00', 'Absent', 'Not Late', '03:31', '', 'N', 'Y', '2020-05-26', '2020-05-26 14:20:10'),
(16, 41, '2020-05-26', '', '1', '11:03:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-05-26', '0000-00-00 00:00:00'),
(17, 40, '2020-05-27', '', '1', '10:15:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-05-27', '0000-00-00 00:00:00'),
(18, 42, '2020-05-27', '', '1', '10:25:00', '14:24:00', 'Absent', 'Not Late', '03:59', '', 'N', 'Y', '2020-05-27', '2020-05-27 14:25:02'),
(19, 41, '2020-05-27', '', '1', '11:06:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-05-27', '0000-00-00 00:00:00'),
(20, 13, '2020-05-27', '', '1', '12:00:00', '14:53:00', 'Absent', 'Late', '02:53', '', 'N', 'Y', '2020-05-27', '2020-05-27 14:53:29'),
(21, 40, '2020-05-28', '', '1', '10:22:00', '19:07:00', 'Full Day', 'Not Late', '08:45', '', 'N', 'Y', '2020-05-28', '2020-05-28 19:07:46'),
(22, 42, '2020-05-28', '', '1', '10:43:00', '10:43:00', 'Absent', 'Not Late', '00:00', '', 'N', 'Y', '2020-05-28', '2020-05-28 10:43:33'),
(23, 41, '2020-05-28', '', '1', '10:58:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-05-28', '0000-00-00 00:00:00'),
(24, 13, '2020-05-28', '', '1', '11:41:00', '15:22:00', 'Absent', 'Late', '03:41', '', 'N', 'Y', '2020-05-28', '2020-05-28 15:22:48'),
(25, 40, '2020-05-29', '', '1', '10:17:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-05-29', '0000-00-00 00:00:00'),
(26, 42, '2020-05-29', '', '1', '10:59:00', '15:42:00', 'Half Day', 'Not Late', '04:43', '', 'N', 'Y', '2020-05-29', '2020-05-29 15:42:12'),
(27, 41, '2020-05-29', '', '1', '11:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-05-29', '0000-00-00 00:00:00'),
(28, 13, '2020-05-29', '', '1', '11:29:00', '15:30:00', 'Half Day', 'Late', '04:01', '', 'N', 'Y', '2020-05-29', '2020-05-29 15:31:22'),
(29, 40, '2020-05-30', '', '1', '10:31:00', '16:00:00', 'Full Day', 'Not Late', '05:29', '', 'N', 'Y', '2020-05-30', '2020-05-30 16:00:39'),
(30, 13, '2020-05-30', '', '1', '14:06:00', '15:47:00', 'Full Day', 'Late', '01:41', '', 'N', 'Y', '2020-05-30', '2020-05-30 15:47:51'),
(31, 40, '2020-06-01', '', '1', '10:17:00', '19:03:00', 'Full Day', 'Not Late', '08:46', '', 'N', 'Y', '2020-06-01', '2020-06-01 19:03:51'),
(32, 41, '2020-06-01', '', '1', '11:01:00', '14:04:00', 'Absent', 'Not Late', '03:03', '', 'N', 'Y', '2020-06-01', '2020-06-01 14:05:14'),
(33, 13, '2020-06-01', '', '1', '11:43:00', '15:20:00', 'Absent', 'Late', '03:37', '', 'N', 'Y', '2020-06-01', '2020-06-01 15:20:54'),
(34, 42, '2020-06-01', '', '1', '12:07:00', '15:38:00', 'Absent', 'Late', '03:31', '', 'N', 'Y', '2020-06-01', '2020-06-01 15:39:04'),
(35, 40, '2020-06-02', '', '1', '10:23:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-02', '0000-00-00 00:00:00'),
(36, 42, '2020-06-02', '', '1', '10:43:00', '10:43:00', 'Absent', 'Not Late', '00:00', '', 'N', 'Y', '2020-06-02', '2020-06-02 10:43:12'),
(37, 41, '2020-06-02', '', '1', '10:55:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-02', '0000-00-00 00:00:00'),
(38, 13, '2020-06-02', '', '1', '11:39:00', '18:09:00', 'Full Day', 'Late', '06:30', '', 'N', 'Y', '2020-06-02', '2020-06-02 18:09:33'),
(39, 4, '2020-06-03', '', '1', '10:02:00', '19:12:00', 'Full Day', 'Not Late', '09:10', '', 'N', 'Y', '2020-06-03', '2020-06-03 19:12:14'),
(40, 42, '2020-06-03', '', '1', '10:17:00', '18:13:00', 'Full Day', 'Not Late', '07:56', '', 'N', 'Y', '2020-06-03', '2020-06-03 18:14:00'),
(41, 40, '2020-06-03', '', '1', '10:27:00', '17:26:00', 'Full Day', 'Not Late', '06:59', '', 'N', 'Y', '2020-06-03', '2020-06-03 19:02:08'),
(42, 41, '2020-06-03', '', '1', '11:35:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-03', '0000-00-00 00:00:00'),
(43, 13, '2020-06-03', '', '1', '11:57:00', '18:53:00', 'Full Day', 'Late', '06:56', '', 'N', 'Y', '2020-06-03', '2020-06-03 18:54:00'),
(44, 40, '2020-06-04', '', '1', '10:17:00', '17:12:00', 'Full Day', 'Not Late', '06:55', '', 'N', 'Y', '2020-06-04', '2020-06-04 19:01:26'),
(45, 42, '2020-06-04', '', '1', '10:57:00', '18:03:00', 'Full Day', 'Not Late', '07:06', '', 'N', 'Y', '2020-06-04', '2020-06-04 18:03:31'),
(46, 13, '2020-06-04', '', '1', '14:44:00', '18:40:00', 'Absent', 'Late', '03:56', '', 'N', 'Y', '2020-06-04', '2020-06-04 19:35:08'),
(47, 41, '2020-06-05', '', '1', '10:50:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-05', '0000-00-00 00:00:00'),
(48, 42, '2020-06-05', '', '1', '10:52:00', '17:12:00', 'Full Day', 'Not Late', '06:20', '', 'N', 'Y', '2020-06-05', '2020-06-05 17:13:09'),
(49, 13, '2020-06-05', '', '1', '13:02:00', '20:37:00', 'Full Day', 'Late', '07:35', '', 'N', 'Y', '2020-06-05', '2020-06-05 20:37:18'),
(50, 17, '2020-06-05', '', '1', '19:06:00', '19:08:00', 'Absent', 'Late', '00:02', '', 'N', 'Y', '2020-06-05', '2020-06-05 19:08:57'),
(52, 15, '2020-06-08', '', '1', '09:32:00', '19:07:00', 'Full Day', 'Not Late', '09:35', '', 'N', 'Y', '2020-06-08', '2020-06-08 19:07:49'),
(53, 18, '2020-06-08', '', '1', '09:48:00', '19:03:00', 'Full Day', 'Not Late', '09:15', '', 'N', 'Y', '2020-06-08', '2020-06-08 19:03:33'),
(54, 17, '2020-06-08', '', '1', '09:52:00', '19:25:00', 'Full Day', 'Not Late', '09:33', '', 'N', 'Y', '2020-06-08', '2020-06-08 19:26:01'),
(55, 66, '2020-06-08', '', '1', '09:55:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-08', '0000-00-00 00:00:00'),
(56, 48, '2020-06-08', '', '1', '09:57:00', '19:01:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-06-08', '2020-06-08 19:01:41'),
(57, 42, '2020-06-08', '', '1', '10:59:00', '17:27:00', 'Full Day', 'Not Late', '06:28', '', 'N', 'Y', '2020-06-08', '2020-06-08 17:27:37'),
(58, 41, '2020-06-08', '', '1', '11:27:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-08', '0000-00-00 00:00:00'),
(59, 13, '2020-06-08', '', '1', '11:51:00', '19:06:00', 'Full Day', 'Late', '07:15', '', 'N', 'Y', '2020-06-08', '2020-06-08 19:14:31'),
(60, 48, '2020-06-09', '', '1', '09:41:00', '19:00:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-06-09', '2020-06-09 19:00:18'),
(61, 18, '2020-06-09', '', '1', '09:47:00', '19:00:00', 'Full Day', 'Not Late', '09:13', '', 'N', 'Y', '2020-06-09', '2020-06-09 19:00:58'),
(62, 17, '2020-06-09', '', '1', '09:53:00', '19:07:00', 'Full Day', 'Not Late', '09:14', '', 'N', 'Y', '2020-06-09', '2020-06-09 19:07:56'),
(63, 15, '2020-06-09', '', '1', '09:55:00', '09:55:00', 'Absent', 'Not Late', '00:00', '', 'N', 'Y', '2020-06-09', '2020-06-09 09:55:50'),
(64, 66, '2020-06-09', '', '1', '09:55:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-09', '0000-00-00 00:00:00'),
(65, 41, '2020-06-09', '', '1', '10:59:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-09', '0000-00-00 00:00:00'),
(66, 42, '2020-06-09', '', '1', '11:00:00', '15:41:00', 'Half Day', 'Not Late', '04:41', '', 'N', 'Y', '2020-06-09', '2020-06-09 15:41:19'),
(67, 13, '2020-06-09', '', '1', '11:35:00', '19:33:00', 'Full Day', 'Late', '07:58', '', 'N', 'Y', '2020-06-09', '2020-06-09 19:33:54'),
(68, 4, '2020-06-09', '', '1', '13:44:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-09', '0000-00-00 00:00:00'),
(69, 15, '2020-06-10', '', '1', '09:45:00', '19:03:00', 'Full Day', 'Not Late', '09:18', '', 'N', 'Y', '2020-06-10', '2020-06-10 19:03:27'),
(70, 48, '2020-06-10', '', '1', '09:48:00', '19:12:00', 'Full Day', 'Not Late', '09:24', '', 'N', 'Y', '2020-06-10', '2020-06-10 19:12:51'),
(71, 66, '2020-06-10', '', '1', '09:36:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-10', '0000-00-00 00:00:00'),
(72, 17, '2020-06-10', '', '1', '09:54:00', '19:02:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-06-10', '2020-06-10 19:03:06'),
(73, 18, '2020-06-10', '', '1', '09:57:00', '21:14:00', 'Full Day', 'Not Late', '11:17', '', 'N', 'Y', '2020-06-10', '2020-06-10 21:15:12'),
(74, 42, '2020-06-10', '', '1', '11:02:00', '16:03:00', 'Half Day', 'Not Late', '05:01', '', 'N', 'Y', '2020-06-10', '2020-06-10 16:04:05'),
(75, 41, '2020-06-10', '', '1', '11:03:00', '16:04:00', 'Half Day', 'Not Late', '05:01', '', 'N', 'Y', '2020-06-10', '2020-06-10 16:04:40'),
(76, 13, '2020-06-10', '', '1', '14:59:00', '18:34:00', 'Absent', 'Late', '03:35', '', 'N', 'Y', '2020-06-10', '2020-06-10 18:34:41'),
(77, 15, '2020-06-11', '', '1', '09:34:00', '19:30:00', 'Full Day', 'Not Late', '09:56', '', 'N', 'Y', '2020-06-11', '2020-06-11 19:30:29'),
(78, 18, '2020-06-11', '', '1', '09:44:00', '19:06:00', 'Full Day', 'Not Late', '09:22', '', 'N', 'Y', '2020-06-11', '2020-06-11 19:06:26'),
(79, 48, '2020-06-11', '', '1', '09:45:00', '19:07:00', 'Full Day', 'Not Late', '09:22', '', 'N', 'Y', '2020-06-11', '2020-06-11 19:07:53'),
(80, 17, '2020-06-11', '', '1', '09:47:00', '19:00:00', 'Full Day', 'Not Late', '09:13', '', 'N', 'Y', '2020-06-11', '2020-06-11 19:02:11'),
(81, 66, '2020-06-11', '', '1', '09:54:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-11', '0000-00-00 00:00:00'),
(82, 41, '2020-06-11', '', '1', '11:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-11', '0000-00-00 00:00:00'),
(83, 42, '2020-06-11', '', '1', '11:00:00', '13:58:00', 'Absent', 'Not Late', '02:58', '', 'N', 'Y', '2020-06-11', '2020-06-11 13:58:11'),
(84, 13, '2020-06-11', '', '1', '12:12:00', '18:36:00', 'Full Day', 'Late', '06:24', '', 'N', 'Y', '2020-06-11', '2020-06-11 18:36:47'),
(85, 15, '2020-06-12', '', '1', '09:24:00', '19:01:00', 'Full Day', 'Not Late', '09:37', '', 'N', 'Y', '2020-06-12', '2020-06-12 19:02:17'),
(86, 66, '2020-06-12', '', '1', '09:55:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-12', '0000-00-00 00:00:00'),
(87, 18, '2020-06-12', '', '1', '09:58:00', '19:08:00', 'Full Day', 'Not Late', '09:10', '', 'N', 'Y', '2020-06-12', '2020-06-12 19:08:46'),
(88, 17, '2020-06-12', '', '1', '09:57:00', '19:01:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-06-12', '2020-06-12 19:01:40'),
(89, 42, '2020-06-12', '', '1', '11:00:00', '15:08:00', 'Half Day', 'Not Late', '04:08', '', 'N', 'Y', '2020-06-12', '2020-06-12 15:08:26'),
(90, 41, '2020-06-12', '', '1', '11:15:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-12', '0000-00-00 00:00:00'),
(91, 13, '2020-06-12', '', '1', '11:41:00', '15:44:00', 'Half Day', 'Late', '04:03', '', 'N', 'Y', '2020-06-12', '2020-06-12 15:44:49'),
(92, 15, '2020-06-13', '', '1', '09:21:00', '14:54:00', 'Full Day', 'Not Late', '05:33', '', 'N', 'Y', '2020-06-13', '2020-06-13 16:01:01'),
(93, 48, '2020-06-13', '', '1', '09:51:00', '16:00:00', 'Full Day', 'Not Late', '06:09', '', 'N', 'Y', '2020-06-13', '2020-06-13 16:13:32'),
(94, 17, '2020-06-13', '', '1', '09:54:00', '14:41:00', 'Full Day', 'Not Late', '04:47', '', 'N', 'Y', '2020-06-13', '2020-06-13 16:01:13'),
(95, 66, '2020-06-13', '', '1', '09:53:00', '16:22:00', 'Full Day', 'Not Late', '06:29', '', 'N', 'Y', '2020-06-13', '2020-06-13 16:22:59'),
(96, 18, '2020-06-13', '', '1', '09:55:00', '16:43:00', 'Full Day', 'Not Late', '06:48', '', 'N', 'Y', '2020-06-13', '2020-06-13 16:44:01'),
(97, 41, '2020-06-13', '', '1', '10:58:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-13', '0000-00-00 00:00:00'),
(98, 13, '2020-06-13', '', '1', '10:52:00', '15:24:00', 'Full Day', 'Not Late', '04:32', '', 'N', 'Y', '2020-06-13', '2020-06-13 15:24:51'),
(99, 42, '2020-06-13', '', '1', '11:06:00', '14:41:00', 'Half Day', 'Not Late', '03:35', '', 'N', 'Y', '2020-06-13', '2020-06-13 14:42:08'),
(100, 15, '2020-06-15', '', '1', '09:39:00', '18:51:00', 'Full Day', 'Not Late', '09:12', '', 'N', 'Y', '2020-06-15', '2020-06-15 19:04:54'),
(101, 66, '2020-06-15', '', '1', '09:41:00', '19:20:00', 'Full Day', 'Not Late', '09:39', '', 'N', 'Y', '2020-06-15', '2020-06-15 19:20:29'),
(102, 18, '2020-06-15', '', '1', '09:43:00', '19:10:00', 'Full Day', 'Not Late', '09:27', '', 'N', 'Y', '2020-06-15', '2020-06-15 19:10:25'),
(103, 48, '2020-06-15', '', '1', '09:51:00', '19:21:00', 'Full Day', 'Not Late', '09:30', '', 'N', 'Y', '2020-06-15', '2020-06-15 19:21:40'),
(104, 17, '2020-06-15', '', '1', '09:55:00', '19:00:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-06-15', '2020-06-15 19:01:06'),
(105, 41, '2020-06-15', '', '1', '10:54:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-15', '0000-00-00 00:00:00'),
(106, 42, '2020-06-15', '', '1', '11:38:00', '15:39:00', 'Half Day', 'Late', '04:01', '', 'N', 'Y', '2020-06-15', '2020-06-15 15:39:22'),
(107, 13, '2020-06-15', '', '1', '12:00:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-15', '0000-00-00 00:00:00'),
(108, 15, '2020-06-16', '', '1', '09:23:00', '19:03:00', 'Full Day', 'Not Late', '09:40', '', 'N', 'Y', '2020-06-16', '2020-06-16 19:16:42'),
(109, 66, '2020-06-16', '', '1', '09:33:00', '19:24:00', 'Full Day', 'Not Late', '09:51', '', 'N', 'Y', '2020-06-16', '2020-06-16 19:24:40'),
(110, 18, '2020-06-16', '', '1', '09:43:00', '19:13:00', 'Full Day', 'Not Late', '09:30', '', 'N', 'Y', '2020-06-16', '2020-06-16 19:19:04'),
(111, 48, '2020-06-16', '', '1', '09:49:00', '19:11:00', 'Full Day', 'Not Late', '09:22', '', 'N', 'Y', '2020-06-16', '2020-06-16 19:11:26'),
(112, 17, '2020-06-16', '', '1', '09:45:00', '19:07:00', 'Full Day', 'Not Late', '09:22', '', 'N', 'Y', '2020-06-16', '2020-06-16 19:11:52'),
(113, 13, '2020-06-16', '', '1', '10:53:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-16', '0000-00-00 00:00:00'),
(114, 41, '2020-06-16', '', '1', '11:07:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-16', '0000-00-00 00:00:00'),
(115, 42, '2020-06-16', '', '1', '11:09:00', '15:36:00', 'Half Day', 'Not Late', '04:27', '', 'N', 'Y', '2020-06-16', '2020-06-16 15:36:45'),
(116, 66, '2020-06-17', '', '1', '09:45:00', '19:00:00', 'Full Day', 'Not Late', '09:15', '', 'N', 'Y', '2020-06-17', '2020-06-17 19:00:33'),
(117, 15, '2020-06-17', '', '1', '09:47:00', '19:18:00', 'Full Day', 'Not Late', '09:31', '', 'N', 'Y', '2020-06-17', '2020-06-17 19:19:45'),
(118, 48, '2020-06-17', '', '1', '09:47:00', '19:54:00', 'Over Time', 'Not Late', '10:07', '0', 'N', 'Y', '2020-06-17', '2020-06-17 19:56:21'),
(119, 18, '2020-06-17', '', '1', '09:53:00', '19:04:00', 'Full Day', 'Not Late', '09:11', '', 'N', 'Y', '2020-06-17', '2020-06-17 19:04:25'),
(120, 17, '2020-06-17', '', '1', '09:53:00', '18:56:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-06-17', '2020-06-17 19:01:18'),
(121, 13, '2020-06-17', '', '1', '10:19:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-17', '0000-00-00 00:00:00'),
(122, 41, '2020-06-17', '', '1', '10:59:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-17', '0000-00-00 00:00:00'),
(123, 42, '2020-06-17', '', '1', '11:26:00', '15:31:00', 'Half Day', 'Late', '04:05', '', 'N', 'Y', '2020-06-17', '2020-06-17 15:31:49'),
(124, 48, '2020-06-18', '', '1', '09:46:00', '19:00:00', 'Full Day', 'Not Late', '09:14', '', 'N', 'Y', '2020-06-18', '2020-06-18 19:01:15'),
(125, 66, '2020-06-18', '', '1', '09:51:00', '19:15:00', 'Full Day', 'Not Late', '09:24', '', 'N', 'Y', '2020-06-18', '2020-06-18 19:15:21'),
(126, 18, '2020-06-18', '', '1', '09:52:00', '19:05:00', 'Full Day', 'Not Late', '09:13', '', 'N', 'Y', '2020-06-18', '2020-06-18 19:05:21'),
(127, 17, '2020-06-18', '', '1', '09:52:00', '19:03:00', 'Full Day', 'Not Late', '09:11', '', 'N', 'Y', '2020-06-18', '2020-06-18 19:04:21'),
(128, 15, '2020-06-18', '', '1', '10:01:00', '18:59:00', 'Full Day', 'Not Late', '08:58', '', 'N', 'Y', '2020-06-18', '2020-06-18 19:02:57'),
(129, 41, '2020-06-18', '', '1', '10:50:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-18', '0000-00-00 00:00:00'),
(130, 42, '2020-06-18', '', '1', '11:42:00', '16:04:00', 'Half Day', 'Late', '04:22', '', 'N', 'Y', '2020-06-18', '2020-06-18 16:04:27'),
(131, 13, '2020-06-18', '', '1', '11:43:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-18', '0000-00-00 00:00:00'),
(132, 66, '2020-06-19', '', '1', '09:36:00', '19:24:00', 'Full Day', 'Not Late', '09:48', '', 'N', 'Y', '2020-06-19', '2020-06-19 19:25:08'),
(133, 18, '2020-06-19', '', '1', '09:47:00', '19:05:00', 'Full Day', 'Not Late', '09:18', '', 'N', 'Y', '2020-06-19', '2020-06-19 19:05:58'),
(134, 48, '2020-06-19', '', '1', '09:55:00', '19:38:00', 'Full Day', 'Not Late', '09:43', '', 'N', 'Y', '2020-06-19', '2020-06-19 19:39:13'),
(135, 17, '2020-06-19', '', '1', '09:56:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(136, 15, '2020-06-19', '', '1', '10:02:00', '19:18:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-06-19', '2020-06-19 19:22:40'),
(137, 42, '2020-06-19', '', '1', '10:58:00', '15:38:00', 'Half Day', 'Not Late', '04:40', '', 'N', 'Y', '2020-06-19', '2020-06-19 15:38:25'),
(138, 41, '2020-06-19', '', '1', '11:06:00', '11:06:00', 'Absent', 'Not Late', '00:00', '', 'N', 'Y', '2020-06-19', '2020-06-19 11:07:11'),
(139, 34, '2020-06-19', '', '1', '17:04:00', '17:04:00', 'Absent', 'Late', '00:00', '', 'N', 'Y', '2020-06-19', '2020-06-19 17:49:04'),
(140, 15, '2020-06-22', '', '1', '09:41:00', '18:59:00', 'Full Day', 'Not Late', '09:18', '', 'N', 'Y', '2020-06-22', '2020-06-22 19:00:19'),
(141, 66, '2020-06-22', '', '1', '09:51:00', '19:43:00', 'Full Day', 'Not Late', '09:52', '', 'N', 'Y', '2020-06-22', '2020-06-22 19:43:20'),
(142, 48, '2020-06-22', '', '1', '09:51:00', '18:59:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-06-22', '2020-06-22 19:00:18'),
(143, 18, '2020-06-22', '', '1', '09:52:00', '19:00:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-06-22', '2020-06-22 19:01:03'),
(144, 17, '2020-06-22', '', '1', '09:54:00', '18:53:00', 'Full Day', 'Not Late', '08:59', '', 'N', 'Y', '2020-06-22', '2020-06-22 19:00:22'),
(145, 32, '2020-06-22', '', '1', '10:25:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '2020-06-22 12:14:22'),
(146, 39, '2020-06-22', '', '1', '09:55:00', '20:07:00', 'Over Time', 'Not Late', '10:12', '0', 'N', 'Y', '2020-06-22', '2020-06-22 20:07:56'),
(147, 41, '2020-06-22', '', '1', '11:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(148, 13, '2020-06-22', '', '1', '11:37:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(149, 24, '2020-06-22', '', '1', '11:39:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:54:37'),
(150, 4, '2020-06-22', '', '1', '11:42:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(151, 14, '2020-06-22', '', '1', '11:47:00', '11:54:00', 'Absent', 'Late', '00:07', '', 'N', 'Y', '2020-06-22', '2020-06-22 11:54:38'),
(152, 20, '2020-06-22', '', '1', '11:49:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:59:57'),
(153, 23, '2020-06-22', '', '1', '11:42:00', '19:02:00', 'Full Day', 'Late', '07:20', '', 'N', 'Y', '2020-06-22', '2020-06-22 19:02:45'),
(154, 29, '2020-06-22', '', '1', '11:47:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(155, 22, '2020-06-22', '', '1', '11:50:00', '11:54:00', 'Absent', 'Late', '00:04', '', 'N', 'Y', '2020-06-22', '2020-06-22 11:54:24'),
(156, 11, '2020-06-22', '', '1', '11:22:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(157, 26, '2020-06-22', '', '1', '11:42:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(158, 30, '2020-06-22', '', '1', '11:47:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(159, 34, '2020-06-22', '', '1', '11:38:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '2020-06-22 12:11:23'),
(160, 67, '2020-06-22', '', '1', '12:26:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(161, 42, '2020-06-22', '', '1', '12:42:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(162, 27, '2020-06-22', '', '1', '16:01:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-22', '2020-06-22 16:14:57'),
(163, 32, '2020-06-23', '', '1', '09:43:00', '19:02:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:03:03'),
(164, 11, '2020-06-23', '', '1', '09:43:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(165, 67, '2020-06-23', '', '1', '09:45:00', '19:15:00', 'Full Day', 'Not Late', '09:30', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:15:50'),
(166, 39, '2020-06-23', '', '1', '09:49:00', '19:11:00', 'Full Day', 'Not Late', '09:22', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:11:45'),
(167, 66, '2020-06-23', '', '1', '09:49:00', '19:05:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:05:41'),
(168, 48, '2020-06-23', '', '1', '09:50:00', '19:29:00', 'Full Day', 'Not Late', '09:39', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:29:58'),
(169, 27, '2020-06-23', '', '1', '09:41:00', '19:15:00', 'Full Day', 'Not Late', '09:34', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:16:31'),
(170, 18, '2020-06-23', '', '1', '09:42:00', '19:06:00', 'Full Day', 'Not Late', '09:24', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:10:54'),
(171, 17, '2020-06-23', '', '1', '09:50:00', '19:03:00', 'Full Day', 'Not Late', '09:13', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:03:30'),
(172, 22, '2020-06-23', '', '1', '09:52:00', '19:09:00', 'Full Day', 'Not Late', '09:17', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:09:59'),
(173, 24, '2020-06-23', '', '1', '09:54:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(174, 15, '2020-06-23', '', '1', '09:59:00', '19:04:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-06-23', '2020-06-23 19:05:22'),
(175, 30, '2020-06-23', '', '1', '09:58:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(176, 26, '2020-06-23', '', '1', '10:05:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(177, 20, '2020-06-23', '', '1', '10:05:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(178, 13, '2020-06-23', '', '1', '10:50:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(179, 42, '2020-06-23', '', '1', '11:02:00', '15:29:00', 'Half Day', 'Not Late', '04:27', '', 'N', 'Y', '2020-06-23', '2020-06-23 15:29:44'),
(180, 41, '2020-06-23', '', '1', '11:09:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(181, 18, '2020-06-24', '', '1', '09:50:00', '19:02:00', 'Full Day', 'Not Late', '09:12', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:02:59'),
(182, 22, '2020-06-24', '', '1', '09:51:00', '18:58:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:05:12'),
(183, 27, '2020-06-24', '', '1', '09:51:00', '18:09:00', 'Full Day', 'Not Late', '08:18', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:03:20'),
(184, 11, '2020-06-24', '', '1', '09:55:00', '19:23:00', 'Full Day', 'Not Late', '09:28', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:23:36'),
(185, 48, '2020-06-24', '', '1', '09:55:00', '19:04:00', 'Full Day', 'Not Late', '09:09', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:04:58'),
(186, 39, '2020-06-24', '', '1', '09:58:00', '19:11:00', 'Full Day', 'Not Late', '09:13', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:12:26'),
(187, 67, '2020-06-24', '', '1', '09:58:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-24', '0000-00-00 00:00:00'),
(188, 17, '2020-06-24', '', '1', '09:58:00', '19:08:00', 'Full Day', 'Not Late', '09:10', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:09:16'),
(189, 30, '2020-06-24', '', '1', '09:54:00', '19:02:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:02:23'),
(190, 15, '2020-06-24', '', '1', '10:00:00', '19:24:00', 'Full Day', 'Not Late', '09:24', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:25:34'),
(191, 32, '2020-06-24', '', '1', '10:02:00', '19:07:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:07:43'),
(192, 20, '2020-06-24', '', '1', '10:09:00', '19:09:00', 'Full Day', 'Not Late', '09:00', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:09:39'),
(193, 26, '2020-06-24', '', '1', '10:14:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-24', '0000-00-00 00:00:00'),
(194, 42, '2020-06-24', '', '1', '10:30:00', '16:30:00', 'Full Day', 'Not Late', '06:00', '', 'N', 'Y', '2020-06-24', '2020-06-24 16:30:58'),
(195, 13, '2020-06-24', '', '1', '12:14:00', '18:23:00', 'Full Day', 'Late', '06:09', '', 'N', 'Y', '2020-06-24', '2020-06-24 18:23:30'),
(196, 41, '2020-06-24', '', '1', '12:16:00', '16:05:00', 'Absent', 'Late', '03:49', '', 'N', 'Y', '2020-06-24', '2020-06-24 16:06:11'),
(197, 24, '2020-06-24', '', '1', '14:44:00', '19:22:00', 'Absent', 'Late', '04:38', '', 'N', 'Y', '2020-06-24', '2020-06-24 19:22:11'),
(198, 23, '2020-06-24', '', '1', '09:55:00', '22:40:00', 'Full Day', 'Not Late', '12:45', '', 'N', 'Y', '2020-06-24', '2020-06-24 22:41:01'),
(199, 29, '2020-06-24', '', '1', '15:12:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-24', '0000-00-00 00:00:00'),
(200, 21, '2020-06-25', '', '1', '09:42:00', '21:25:00', 'Full Day', 'Not Late', '11:43', '', 'N', 'Y', '2020-06-25', '2020-06-25 21:25:41'),
(201, 66, '2020-06-25', '', '1', '09:44:00', '19:00:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:00:53'),
(202, 15, '2020-06-25', '', '1', '09:46:00', '19:20:00', 'Full Day', 'Not Late', '09:34', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:21:20'),
(203, 67, '2020-06-25', '', '1', '09:49:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-25', '0000-00-00 00:00:00'),
(204, 22, '2020-06-25', '', '1', '09:49:00', '19:47:00', 'Full Day', 'Not Late', '09:58', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:48:45'),
(205, 23, '2020-06-25', '', '1', '09:50:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-25', '0000-00-00 00:00:00'),
(206, 32, '2020-06-25', '', '1', '09:51:00', '19:03:00', 'Full Day', 'Not Late', '09:12', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:03:23'),
(207, 18, '2020-06-25', '', '1', '09:52:00', '19:04:00', 'Full Day', 'Not Late', '09:12', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:05:06'),
(208, 39, '2020-06-25', '', '1', '09:52:00', '21:55:00', 'Over Time', 'Not Late', '12:03', '2', 'N', 'Y', '2020-06-25', '2020-06-25 21:55:53'),
(209, 17, '2020-06-25', '', '1', '09:52:00', '19:20:00', 'Full Day', 'Not Late', '09:28', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:20:35'),
(210, 26, '2020-06-25', '', '1', '09:59:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-25', '0000-00-00 00:00:00'),
(211, 11, '2020-06-25', '', '1', '09:59:00', '19:01:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:01:49'),
(212, 30, '2020-06-25', '', '1', '09:56:00', '19:03:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:03:23'),
(213, 27, '2020-06-25', '', '1', '09:59:00', '19:06:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:06:59'),
(214, 34, '2020-06-25', '', '1', '10:02:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-25', '0000-00-00 00:00:00'),
(215, 20, '2020-06-25', '', '1', '10:04:00', '19:04:00', 'Full Day', 'Not Late', '09:00', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:04:34'),
(216, 24, '2020-06-25', '', '1', '10:08:00', '19:11:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:11:16'),
(217, 48, '2020-06-25', '', '1', '10:37:00', '19:39:00', 'Full Day', 'Late', '09:02', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:39:17'),
(218, 42, '2020-06-25', '', '1', '10:58:00', '19:39:00', 'Full Day', 'Not Late', '08:41', '', 'N', 'Y', '2020-06-25', '2020-06-25 19:39:58'),
(219, 41, '2020-06-25', '', '1', '11:02:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-25', '0000-00-00 00:00:00'),
(220, 13, '2020-06-25', '', '1', '11:58:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-25', '0000-00-00 00:00:00'),
(221, 29, '2020-06-25', '', '1', '13:22:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-25', '0000-00-00 00:00:00'),
(222, 22, '2020-06-26', '', '1', '09:44:00', '19:32:00', 'Full Day', 'Not Late', '09:48', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:32:46'),
(223, 66, '2020-06-26', '', '1', '09:38:00', '19:40:00', 'Full Day', 'Not Late', '10:02', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:40:32'),
(224, 48, '2020-06-26', '', '1', '09:48:00', '18:56:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:00:51'),
(225, 18, '2020-06-26', '', '1', '09:49:00', '19:04:00', 'Full Day', 'Not Late', '09:15', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:04:22'),
(226, 27, '2020-06-26', '', '1', '09:05:00', '19:06:00', 'Over Time', 'Not Late', '10:01', '0', 'N', 'Y', '2020-06-26', '2020-06-26 19:06:24'),
(227, 32, '2020-06-26', '', '1', '09:53:00', '21:07:00', 'Over Time', 'Not Late', '11:14', '1', 'N', 'Y', '2020-06-26', '2020-06-26 21:07:47'),
(228, 15, '2020-06-26', '', '1', '09:56:00', '19:03:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:14:50'),
(229, 17, '2020-06-26', '', '1', '09:48:00', '19:07:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:07:51'),
(230, 24, '2020-06-26', '', '1', '09:58:00', '19:03:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:03:54'),
(231, 30, '2020-06-26', '', '1', '10:00:00', '19:02:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:02:39'),
(232, 11, '2020-06-26', '', '1', '10:00:00', '19:19:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:19:32'),
(233, 26, '2020-06-26', '', '1', '10:02:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-26', '0000-00-00 00:00:00'),
(234, 20, '2020-06-26', '', '1', '10:05:00', '19:28:00', 'Full Day', 'Not Late', '09:23', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:28:41'),
(235, 41, '2020-06-26', '', '1', '10:47:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-26', '0000-00-00 00:00:00'),
(236, 42, '2020-06-26', '', '1', '11:03:00', '19:07:00', 'Full Day', 'Not Late', '08:04', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:07:56'),
(237, 39, '2020-06-26', '', '1', '11:50:00', '19:07:00', 'Full Day', 'Late', '07:17', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:07:06'),
(238, 29, '2020-06-26', '', '1', '12:46:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-26', '0000-00-00 00:00:00'),
(239, 67, '2020-06-26', '', '1', '17:33:00', '19:46:00', 'Absent', 'Late', '02:13', '', 'N', 'Y', '2020-06-26', '2020-06-26 19:46:37'),
(240, 22, '2020-06-27', '', '1', '09:47:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(241, 48, '2020-06-27', '', '1', '09:49:00', '16:00:00', 'Full Day', 'Not Late', '06:11', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:00:49'),
(242, 66, '2020-06-27', '', '1', '09:53:00', '16:00:00', 'Full Day', 'Not Late', '06:07', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:00:08'),
(243, 18, '2020-06-27', '', '1', '09:49:00', '16:05:00', 'Full Day', 'Not Late', '06:16', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:05:47'),
(244, 15, '2020-06-27', '', '1', '09:53:00', '17:07:00', 'Over Time', 'Not Late', '07:14', '0', 'N', 'Y', '2020-06-27', '2020-06-27 17:06:55'),
(245, 39, '2020-06-27', '', '1', '09:55:00', '16:11:00', 'Full Day', 'Not Late', '06:16', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:11:13'),
(246, 27, '2020-06-27', '', '1', '09:55:00', '16:08:00', 'Full Day', 'Not Late', '06:13', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:10:52'),
(247, 17, '2020-06-27', '', '1', '09:55:00', '16:00:00', 'Full Day', 'Not Late', '06:05', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:00:45'),
(248, 32, '2020-06-27', '', '1', '09:58:00', '16:02:00', 'Full Day', 'Not Late', '06:04', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:02:02'),
(249, 11, '2020-06-27', '', '1', '09:58:00', '17:27:00', 'Over Time', 'Not Late', '07:29', '0', 'N', 'Y', '2020-06-27', '2020-06-27 17:26:58'),
(250, 30, '2020-06-27', '', '1', '09:58:00', '16:02:00', 'Full Day', 'Not Late', '06:04', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:02:19'),
(251, 67, '2020-06-27', '', '1', '10:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(252, 20, '2020-06-27', '', '1', '10:10:00', '16:10:00', 'Full Day', 'Not Late', '06:00', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:10:22'),
(253, 26, '2020-06-27', '', '1', '10:16:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(254, 13, '2020-06-27', '', '1', '10:54:00', '16:10:00', 'Full Day', 'Not Late', '05:16', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:10:34'),
(255, 41, '2020-06-27', '', '1', '11:03:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(256, 42, '2020-06-27', '', '1', '12:01:00', '18:16:00', 'Full Day', 'Late', '06:15', '', 'N', 'Y', '2020-06-27', '2020-06-27 18:16:48'),
(257, 29, '2020-06-27', '', '1', '12:31:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(258, 24, '2020-06-27', '', '1', '14:01:00', '16:06:00', 'Absent', 'Late', '02:05', '', 'N', 'Y', '2020-06-27', '2020-06-27 16:06:47'),
(259, 48, '2020-06-29', '', '1', '09:44:00', '19:07:00', 'Full Day', 'Not Late', '09:23', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:07:11'),
(260, 15, '2020-06-29', '', '1', '09:45:00', '19:27:00', 'Full Day', 'Not Late', '09:42', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:27:32'),
(261, 66, '2020-06-29', '', '1', '09:47:00', '19:00:00', 'Full Day', 'Not Late', '09:13', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:00:07'),
(262, 22, '2020-06-29', '', '1', '09:50:00', '19:04:00', 'Full Day', 'Not Late', '09:14', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:04:59'),
(263, 18, '2020-06-29', '', '1', '09:57:00', '19:04:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:05:04'),
(264, 17, '2020-06-29', '', '1', '09:57:00', '19:01:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:01:23'),
(265, 39, '2020-06-29', '', '1', '09:57:00', '19:18:00', 'Full Day', 'Not Late', '09:21', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:18:23'),
(266, 24, '2020-06-29', '', '1', '09:57:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-29', '0000-00-00 00:00:00'),
(267, 11, '2020-06-29', '', '1', '09:57:00', '19:25:00', 'Full Day', 'Not Late', '09:28', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:25:51'),
(268, 32, '2020-06-29', '', '1', '09:59:00', '20:07:00', 'Full Day', 'Not Late', '10:08', '', 'N', 'Y', '2020-06-29', '2020-06-29 20:07:23'),
(269, 30, '2020-06-29', '', '1', '10:00:00', '19:02:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:02:09'),
(270, 26, '2020-06-29', '', '1', '10:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-29', '0000-00-00 00:00:00'),
(271, 27, '2020-06-29', '', '1', '10:00:00', '19:03:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:04:16'),
(272, 20, '2020-06-29', '', '1', '10:10:00', '19:02:00', 'Full Day', 'Not Late', '08:52', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:02:29'),
(273, 67, '2020-06-29', '', '1', '10:38:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-29', '0000-00-00 00:00:00'),
(274, 42, '2020-06-29', '', '1', '10:49:00', '19:08:00', 'Full Day', 'Not Late', '08:19', '', 'N', 'Y', '2020-06-29', '2020-06-29 19:08:50'),
(275, 41, '2020-06-29', '', '1', '11:09:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-29', '0000-00-00 00:00:00'),
(276, 11, '2020-06-30', '', '1', '09:41:00', '19:10:00', 'Full Day', 'Not Late', '09:29', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:10:43'),
(277, 15, '2020-06-30', '', '1', '09:44:00', '19:19:00', 'Full Day', 'Not Late', '09:35', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:19:39'),
(278, 66, '2020-06-30', '', '1', '09:50:00', '19:27:00', 'Full Day', 'Not Late', '09:37', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:27:26'),
(279, 48, '2020-06-30', '', '1', '09:50:00', '19:27:00', 'Full Day', 'Not Late', '09:37', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:27:30'),
(280, 27, '2020-06-30', '', '1', '09:50:00', '19:02:00', 'Full Day', 'Not Late', '09:12', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:03:30'),
(281, 22, '2020-06-30', '', '1', '09:51:00', '19:06:00', 'Full Day', 'Not Late', '09:15', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:06:47'),
(282, 17, '2020-06-30', '', '1', '09:53:00', '19:01:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:01:04'),
(283, 18, '2020-06-30', '', '1', '09:54:00', '19:15:00', 'Full Day', 'Not Late', '09:21', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:15:37'),
(284, 32, '2020-06-30', '', '1', '09:57:00', '09:57:00', 'Absent', 'Not Late', '00:00', '', 'N', 'Y', '2020-06-30', '2020-06-30 09:57:40'),
(285, 67, '2020-06-30', '', '1', '09:58:00', '19:06:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:06:57'),
(286, 39, '2020-06-30', '', '1', '09:58:00', '19:09:00', 'Full Day', 'Not Late', '09:11', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:09:19'),
(287, 30, '2020-06-30', '', '1', '10:00:00', '19:05:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:05:06'),
(288, 20, '2020-06-30', '', '1', '10:01:00', '19:03:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:03:06'),
(289, 26, '2020-06-30', '', '1', '10:02:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-30', '0000-00-00 00:00:00'),
(290, 24, '2020-06-30', '', '1', '10:04:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-06-30', '0000-00-00 00:00:00'),
(291, 42, '2020-06-30', '', '1', '11:38:00', '19:13:00', 'Full Day', 'Late', '07:35', '', 'N', 'Y', '2020-06-30', '2020-06-30 19:13:24'),
(292, 13, '2020-06-30', '', '1', '11:48:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-30', '0000-00-00 00:00:00'),
(293, 29, '2020-06-30', '', '1', '15:24:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-06-30', '0000-00-00 00:00:00'),
(294, 48, '2020-07-01', '', '1', '09:46:00', '19:05:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-07-01', '2020-07-01 19:05:35'),
(295, 66, '2020-07-01', '', '1', '09:48:00', '19:04:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-07-01', '2020-07-01 19:04:47'),
(296, 18, '2020-07-01', '', '1', '09:48:00', '19:07:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-07-01', '2020-07-01 19:07:49'),
(297, 32, '2020-07-01', '', '1', '09:52:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-01', '0000-00-00 00:00:00'),
(298, 17, '2020-07-01', '', '1', '09:52:00', '19:00:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-01', '2020-07-01 19:00:27'),
(299, 27, '2020-07-01', '', '1', '09:55:00', '19:10:00', 'Full Day', 'Not Late', '09:15', '', 'N', 'Y', '2020-07-01', '2020-07-01 19:11:05'),
(300, 22, '2020-07-01', '', '1', '09:55:00', '19:25:00', 'Full Day', 'Not Late', '09:30', '', 'N', 'Y', '2020-07-01', '2020-07-01 19:26:02'),
(301, 39, '2020-07-01', '', '1', '09:56:00', '19:25:00', 'Full Day', 'Not Late', '09:29', '', 'N', 'Y', '2020-07-01', '2020-07-02 10:03:13'),
(302, 24, '2020-07-01', '', '1', '09:58:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-01', '0000-00-00 00:00:00'),
(303, 11, '2020-07-01', '', '1', '09:58:00', '21:08:00', 'Full Day', 'Not Late', '11:10', '', 'N', 'Y', '2020-07-01', '2020-07-01 21:08:53'),
(304, 30, '2020-07-01', '', '1', '10:00:00', '19:15:00', 'Full Day', 'Not Late', '09:15', '', 'N', 'Y', '2020-07-01', '2020-07-01 19:15:17'),
(305, 67, '2020-07-01', '', '1', '10:01:00', '19:12:00', 'Full Day', 'Not Late', '09:11', '', 'N', 'Y', '2020-07-01', '2020-07-01 19:12:20'),
(306, 20, '2020-07-01', '', '1', '10:07:00', '19:29:00', 'Full Day', 'Not Late', '09:22', '', 'N', 'Y', '2020-07-01', '2020-07-01 19:29:08'),
(307, 26, '2020-07-01', '', '1', '10:16:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-01', '0000-00-00 00:00:00'),
(308, 42, '2020-07-01', '', '1', '10:53:00', '18:54:00', 'Full Day', 'Not Late', '08:01', '', 'N', 'Y', '2020-07-01', '2020-07-01 18:54:07'),
(309, 13, '2020-07-01', '', '1', '12:56:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-01', '0000-00-00 00:00:00'),
(310, 32, '2020-07-02', '', '1', '09:35:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-02', '0000-00-00 00:00:00'),
(311, 66, '2020-07-02', '', '1', '09:46:00', '19:09:00', 'Full Day', 'Not Late', '09:23', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:09:45'),
(312, 18, '2020-07-02', '', '1', '09:52:00', '19:01:00', 'Full Day', 'Not Late', '09:09', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:01:54'),
(313, 22, '2020-07-02', '', '1', '09:52:00', '19:12:00', 'Full Day', 'Not Late', '09:20', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:12:21'),
(314, 27, '2020-07-02', '', '1', '09:52:00', '19:07:00', 'Full Day', 'Not Late', '09:15', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:08:32'),
(315, 39, '2020-07-02', '', '1', '09:56:00', '19:08:00', 'Full Day', 'Not Late', '09:12', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:09:04'),
(316, 48, '2020-07-02', '', '1', '09:57:00', '19:33:00', 'Full Day', 'Not Late', '09:36', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:33:39'),
(317, 67, '2020-07-02', '', '1', '09:59:00', '09:59:00', 'Absent', 'Not Late', '00:00', '', 'N', 'Y', '2020-07-02', '2020-07-02 09:59:09'),
(318, 17, '2020-07-02', '', '1', '09:59:00', '19:01:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:01:57'),
(319, 30, '2020-07-02', '', '1', '10:00:00', '19:04:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:04:22'),
(320, 11, '2020-07-02', '', '1', '10:01:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-02', '0000-00-00 00:00:00'),
(321, 15, '2020-07-02', '', '1', '10:05:00', '19:07:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:07:34'),
(322, 20, '2020-07-02', '', '1', '10:06:00', '19:40:00', 'Full Day', 'Not Late', '09:34', '', 'N', 'Y', '2020-07-02', '2020-07-02 19:40:11'),
(323, 26, '2020-07-02', '', '1', '10:06:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-02', '0000-00-00 00:00:00'),
(324, 42, '2020-07-02', '', '1', '10:58:00', '15:25:00', 'Half Day', 'Not Late', '04:27', '', 'N', 'Y', '2020-07-02', '2020-07-02 15:25:41'),
(325, 13, '2020-07-02', '', '1', '11:37:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-02', '0000-00-00 00:00:00'),
(326, 24, '2020-07-02', '', '1', '12:37:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-02', '0000-00-00 00:00:00'),
(327, 27, '2020-07-03', '', '1', '09:48:00', '19:17:00', 'Full Day', 'Not Late', '09:29', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:17:52'),
(328, 22, '2020-07-03', '', '1', '09:50:00', '19:10:00', 'Full Day', 'Not Late', '09:20', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:10:09'),
(329, 11, '2020-07-03', '', '1', '09:50:00', '19:35:00', 'Full Day', 'Not Late', '09:45', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:35:45'),
(330, 66, '2020-07-03', '', '1', '09:53:00', '19:00:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:00:26'),
(331, 48, '2020-07-03', '', '1', '09:53:00', '19:19:00', 'Full Day', 'Not Late', '09:26', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:19:06'),
(332, 18, '2020-07-03', '', '1', '09:54:00', '19:02:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:03:08'),
(333, 39, '2020-07-03', '', '1', '09:55:00', '19:15:00', 'Full Day', 'Not Late', '09:20', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:16:40'),
(334, 15, '2020-07-03', '', '1', '09:56:00', '19:23:00', 'Full Day', 'Not Late', '09:27', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:23:45'),
(335, 17, '2020-07-03', '', '1', '09:58:00', '19:15:00', 'Full Day', 'Not Late', '09:17', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:15:53'),
(336, 30, '2020-07-03', '', '1', '10:00:00', '19:02:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:02:22'),
(337, 20, '2020-07-03', '', '1', '10:08:00', '19:11:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-07-03', '2020-07-03 19:11:06'),
(338, 32, '2020-07-03', '', '1', '10:12:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-03', '0000-00-00 00:00:00'),
(339, 42, '2020-07-03', '', '1', '11:12:00', '18:15:00', 'Full Day', 'Not Late', '07:03', '', 'N', 'Y', '2020-07-03', '2020-07-03 18:15:14'),
(340, 26, '2020-07-03', '', '1', '12:08:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-03', '0000-00-00 00:00:00'),
(341, 32, '2020-07-04', '', '1', '10:02:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-04', '0000-00-00 00:00:00'),
(342, 17, '2020-07-06', '', '1', '09:37:00', '19:24:00', 'Full Day', 'Not Late', '09:47', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:24:43'),
(343, 15, '2020-07-06', '', '1', '09:42:00', '19:42:00', 'Full Day', 'Not Late', '10:00', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:42:35'),
(344, 11, '2020-07-06', '', '1', '09:43:00', '20:21:00', 'Full Day', 'Not Late', '10:38', '', 'N', 'Y', '2020-07-06', '2020-07-06 20:21:30'),
(345, 48, '2020-07-06', '', '1', '09:46:00', '19:12:00', 'Full Day', 'Not Late', '09:26', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:12:54'),
(346, 18, '2020-07-06', '', '1', '09:47:00', '19:12:00', 'Full Day', 'Not Late', '09:25', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:12:17'),
(347, 22, '2020-07-06', '', '1', '09:52:00', '19:09:00', 'Full Day', 'Not Late', '09:17', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:09:22'),
(348, 39, '2020-07-06', '', '1', '09:52:00', '19:27:00', 'Full Day', 'Not Late', '09:35', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:27:47'),
(349, 30, '2020-07-06', '', '1', '10:00:00', '19:11:00', 'Full Day', 'Not Late', '09:11', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:11:49'),
(350, 26, '2020-07-06', '', '1', '10:01:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-06', '0000-00-00 00:00:00'),
(351, 24, '2020-07-06', '', '1', '10:01:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-06', '0000-00-00 00:00:00'),
(352, 20, '2020-07-06', '', '1', '10:05:00', '19:15:00', 'Full Day', 'Not Late', '09:10', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:15:29'),
(353, 27, '2020-07-06', '', '1', '10:06:00', '19:09:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:10:27'),
(354, 32, '2020-07-06', '', '1', '10:08:00', '19:15:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:15:18'),
(355, 42, '2020-07-06', '', '1', '10:38:00', '19:07:00', 'Full Day', 'Not Late', '08:29', '', 'N', 'Y', '2020-07-06', '2020-07-06 19:07:57'),
(356, 13, '2020-07-06', '', '1', '12:47:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-06', '0000-00-00 00:00:00'),
(357, 66, '2020-07-07', '', '1', '09:44:00', '19:00:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:00:08'),
(358, 11, '2020-07-07', '', '1', '09:48:00', '19:51:00', 'Full Day', 'Not Late', '10:03', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:51:06'),
(359, 22, '2020-07-07', '', '1', '09:49:00', '19:57:00', 'Full Day', 'Not Late', '10:08', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:57:30'),
(360, 67, '2020-07-07', '', '1', '09:51:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-07', '0000-00-00 00:00:00'),
(361, 17, '2020-07-07', '', '1', '09:53:00', '19:03:00', 'Full Day', 'Not Late', '09:10', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:03:25'),
(362, 39, '2020-07-07', '', '1', '09:54:00', '19:27:00', 'Full Day', 'Not Late', '09:33', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:28:28'),
(363, 27, '2020-07-07', '', '1', '09:54:00', '19:08:00', 'Full Day', 'Not Late', '09:14', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:09:04'),
(364, 48, '2020-07-07', '', '1', '09:55:00', '19:16:00', 'Full Day', 'Not Late', '09:21', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:16:10');
INSERT INTO `hr_attendance` (`id`, `employee_id`, `date`, `type`, `flag`, `entry_time`, `out_time`, `day_type`, `late_type`, `total_hour`, `overTime`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(365, 18, '2020-07-07', '', '1', '09:56:00', '19:00:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:00:21'),
(366, 15, '2020-07-07', '', '1', '09:58:00', '19:11:00', 'Full Day', 'Not Late', '09:13', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:11:05'),
(367, 26, '2020-07-07', '', '1', '09:58:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-07', '0000-00-00 00:00:00'),
(368, 30, '2020-07-07', '', '1', '10:01:00', '19:04:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:04:27'),
(369, 20, '2020-07-07', '', '1', '10:04:00', '19:15:00', 'Full Day', 'Not Late', '09:11', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:15:16'),
(370, 42, '2020-07-07', '', '1', '10:15:00', '19:51:00', 'Full Day', 'Not Late', '09:36', '', 'N', 'Y', '2020-07-07', '2020-07-07 19:51:48'),
(371, 66, '2020-07-08', '', '1', '09:44:00', '19:00:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:00:13'),
(372, 18, '2020-07-08', '', '1', '09:47:00', '19:00:00', 'Full Day', 'Not Late', '09:13', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:00:53'),
(373, 15, '2020-07-08', '', '1', '09:47:00', '19:18:00', 'Full Day', 'Not Late', '09:31', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:18:09'),
(374, 48, '2020-07-08', '', '1', '09:51:00', '19:00:00', 'Full Day', 'Not Late', '09:09', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:00:31'),
(375, 17, '2020-07-08', '', '1', '09:52:00', '19:15:00', 'Full Day', 'Not Late', '09:23', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:15:33'),
(376, 22, '2020-07-08', '', '1', '09:53:00', '19:22:00', 'Full Day', 'Not Late', '09:29', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:22:18'),
(377, 32, '2020-07-08', '', '1', '09:58:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-08', '0000-00-00 00:00:00'),
(378, 39, '2020-07-08', '', '1', '09:59:00', '19:09:00', 'Full Day', 'Not Late', '09:10', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:10:32'),
(379, 30, '2020-07-08', '', '1', '10:00:00', '19:02:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:02:44'),
(380, 27, '2020-07-08', '', '1', '09:59:00', '19:08:00', 'Full Day', 'Not Late', '09:09', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:08:58'),
(381, 11, '2020-07-08', '', '1', '10:00:00', '19:22:00', 'Full Day', 'Not Late', '09:22', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:22:42'),
(382, 67, '2020-07-08', '', '1', '10:04:00', '19:08:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-07-08', '2020-07-08 19:08:55'),
(383, 20, '2020-07-08', '', '1', '10:07:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-08', '0000-00-00 00:00:00'),
(384, 42, '2020-07-08', '', '1', '10:33:00', '18:50:00', 'Full Day', 'Not Late', '08:17', '', 'N', 'Y', '2020-07-08', '2020-07-08 18:50:47'),
(385, 13, '2020-07-08', '', '1', '11:40:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-08', '0000-00-00 00:00:00'),
(386, 48, '2020-07-09', '', '1', '09:44:00', '19:03:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:03:14'),
(387, 66, '2020-07-09', '', '1', '09:45:00', '19:28:00', 'Full Day', 'Not Late', '09:43', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:28:07'),
(388, 22, '2020-07-09', '', '1', '09:51:00', '19:49:00', 'Full Day', 'Not Late', '09:58', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:49:39'),
(389, 15, '2020-07-09', '', '1', '09:54:00', '19:21:00', 'Full Day', 'Not Late', '09:27', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:21:19'),
(390, 39, '2020-07-09', '', '1', '09:55:00', '19:20:00', 'Full Day', 'Not Late', '09:25', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:20:58'),
(391, 17, '2020-07-09', '', '1', '09:59:00', '19:08:00', 'Full Day', 'Not Late', '09:09', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:08:12'),
(392, 11, '2020-07-09', '', '1', '09:59:00', '20:40:00', 'Full Day', 'Not Late', '10:41', '', 'N', 'Y', '2020-07-09', '2020-07-09 20:40:05'),
(393, 27, '2020-07-09', '', '1', '09:59:00', '19:10:00', 'Full Day', 'Not Late', '09:11', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:11:03'),
(394, 30, '2020-07-09', '', '1', '10:00:00', '19:02:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:02:13'),
(395, 26, '2020-07-09', '', '1', '10:01:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-09', '0000-00-00 00:00:00'),
(396, 18, '2020-07-09', '', '1', '10:01:00', '19:07:00', 'Full Day', 'Not Late', '09:06', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:07:06'),
(397, 67, '2020-07-09', '', '1', '10:07:00', '19:05:00', 'Full Day', 'Not Late', '08:58', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:05:11'),
(398, 20, '2020-07-09', '', '1', '10:07:00', '19:31:00', 'Full Day', 'Not Late', '09:24', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:31:39'),
(399, 42, '2020-07-09', '', '1', '11:06:00', '19:04:00', 'Full Day', 'Not Late', '07:58', '', 'N', 'Y', '2020-07-09', '2020-07-09 19:04:52'),
(400, 13, '2020-07-09', '', '1', '11:59:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-09', '0000-00-00 00:00:00'),
(401, 66, '2020-07-10', '', '1', '09:40:00', '19:24:00', 'Full Day', 'Not Late', '09:44', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:24:32'),
(402, 48, '2020-07-10', '', '1', '09:48:00', '19:10:00', 'Full Day', 'Not Late', '09:22', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:10:39'),
(403, 18, '2020-07-10', '', '1', '09:50:00', '19:09:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:09:17'),
(404, 39, '2020-07-10', '', '1', '09:52:00', '19:12:00', 'Full Day', 'Not Late', '09:20', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:13:26'),
(405, 22, '2020-07-10', '', '1', '09:52:00', '19:10:00', 'Full Day', 'Not Late', '09:18', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:10:55'),
(406, 27, '2020-07-10', '', '1', '09:55:00', '19:07:00', 'Full Day', 'Not Late', '09:12', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:08:07'),
(407, 11, '2020-07-10', '', '1', '09:57:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-10', '0000-00-00 00:00:00'),
(408, 30, '2020-07-10', '', '1', '10:00:00', '19:05:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:05:17'),
(409, 26, '2020-07-10', '', '1', '10:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-10', '0000-00-00 00:00:00'),
(410, 17, '2020-07-10', '', '1', '10:01:00', '19:11:00', 'Full Day', 'Not Late', '09:10', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:11:04'),
(411, 67, '2020-07-10', '', '1', '10:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-10', '0000-00-00 00:00:00'),
(412, 20, '2020-07-10', '', '1', '10:07:00', '19:21:00', 'Full Day', 'Not Late', '09:14', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:21:24'),
(413, 15, '2020-07-10', '', '1', '10:08:00', '21:07:00', 'Full Day', 'Not Late', '10:59', '', 'N', 'Y', '2020-07-10', '2020-07-10 21:07:21'),
(414, 13, '2020-07-10', '', '1', '10:23:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-10', '0000-00-00 00:00:00'),
(415, 42, '2020-07-10', '', '1', '10:39:00', '19:13:00', 'Full Day', 'Not Late', '08:34', '', 'N', 'Y', '2020-07-10', '2020-07-10 19:13:29'),
(416, 66, '2020-07-11', '', '1', '09:40:00', '16:00:00', 'Full Day', 'Not Late', '06:20', '', 'N', 'Y', '2020-07-11', '2020-07-11 16:00:31'),
(417, 15, '2020-07-11', '', '1', '09:45:00', '16:07:00', 'Full Day', 'Not Late', '06:22', '', 'N', 'Y', '2020-07-11', '2020-07-11 16:07:04'),
(418, 11, '2020-07-11', '', '1', '09:47:00', '18:06:00', 'Full Day', 'Not Late', '08:19', '', 'N', 'Y', '2020-07-11', '2020-07-11 18:06:36'),
(419, 22, '2020-07-11', '', '1', '09:50:00', '16:08:00', 'Full Day', 'Not Late', '06:18', '', 'N', 'Y', '2020-07-11', '2020-07-11 16:08:41'),
(420, 17, '2020-07-11', '', '1', '09:51:00', '16:06:00', 'Full Day', 'Not Late', '06:15', '', 'N', 'Y', '2020-07-11', '2020-07-11 16:06:15'),
(421, 67, '2020-07-11', '', '1', '09:52:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-11', '0000-00-00 00:00:00'),
(422, 39, '2020-07-11', '', '1', '09:55:00', '16:17:00', 'Full Day', 'Not Late', '06:22', '', 'N', 'Y', '2020-07-11', '2020-07-11 16:18:17'),
(423, 48, '2020-07-11', '', '1', '09:56:00', '16:16:00', 'Full Day', 'Not Late', '06:20', '', 'N', 'Y', '2020-07-11', '2020-07-11 16:16:59'),
(424, 27, '2020-07-11', '', '1', '10:00:00', '16:03:00', 'Full Day', 'Not Late', '06:03', '', 'N', 'Y', '2020-07-11', '2020-07-11 16:04:10'),
(425, 30, '2020-07-11', '', '1', '10:02:00', '16:10:00', 'Full Day', 'Not Late', '06:08', '', 'N', 'Y', '2020-07-11', '2020-07-11 16:10:54'),
(426, 26, '2020-07-11', '', '1', '10:02:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-11', '0000-00-00 00:00:00'),
(427, 20, '2020-07-11', '', '1', '10:14:00', '16:14:00', 'Full Day', 'Not Late', '06:00', '', 'N', 'Y', '2020-07-11', '2020-07-11 16:14:32'),
(428, 42, '2020-07-11', '', '1', '10:43:00', '15:11:00', 'Full Day', 'Not Late', '04:28', '', 'N', 'Y', '2020-07-11', '2020-07-11 15:11:02'),
(429, 13, '2020-07-11', '', '1', '11:35:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-11', '0000-00-00 00:00:00'),
(430, 66, '2020-07-13', '', '1', '09:43:00', '19:00:00', 'Full Day', 'Not Late', '09:17', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:00:07'),
(431, 48, '2020-07-13', '', '1', '09:45:00', '19:28:00', 'Full Day', 'Not Late', '09:43', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:28:47'),
(432, 15, '2020-07-13', '', '1', '09:47:00', '19:26:00', 'Full Day', 'Not Late', '09:39', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:26:43'),
(433, 67, '2020-07-13', '', '1', '09:50:00', '19:13:00', 'Full Day', 'Not Late', '09:23', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:13:17'),
(434, 18, '2020-07-13', '', '1', '09:52:00', '19:00:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:01:00'),
(435, 22, '2020-07-13', '', '1', '09:52:00', '22:01:00', 'Full Day', 'Not Late', '12:09', '', 'N', 'Y', '2020-07-13', '2020-07-13 22:01:50'),
(436, 27, '2020-07-13', '', '1', '09:55:00', '19:14:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:14:53'),
(437, 39, '2020-07-13', '', '1', '09:57:00', '19:22:00', 'Full Day', 'Not Late', '09:25', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:22:16'),
(438, 17, '2020-07-13', '', '1', '09:58:00', '19:03:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:03:23'),
(439, 13, '2020-07-13', '', '1', '09:59:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-13', '0000-00-00 00:00:00'),
(440, 30, '2020-07-13', '', '1', '10:00:00', '19:02:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:02:06'),
(441, 24, '2020-07-13', '', '1', '10:02:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-13', '0000-00-00 00:00:00'),
(442, 26, '2020-07-13', '', '1', '10:03:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-13', '0000-00-00 00:00:00'),
(443, 20, '2020-07-13', '', '1', '10:03:00', '19:30:00', 'Full Day', 'Not Late', '09:27', '', 'N', 'Y', '2020-07-13', '2020-07-13 19:30:38'),
(444, 42, '2020-07-13', '', '1', '10:50:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-13', '0000-00-00 00:00:00'),
(445, 11, '2020-07-13', '', '1', '10:55:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-13', '0000-00-00 00:00:00'),
(446, 15, '2020-07-14', '', '1', '09:30:00', '20:05:00', 'Full Day', 'Not Late', '10:35', '', 'N', 'Y', '2020-07-14', '2020-07-14 20:05:47'),
(447, 66, '2020-07-14', '', '1', '09:44:00', '19:43:00', 'Full Day', 'Not Late', '09:59', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:43:06'),
(448, 22, '2020-07-14', '', '1', '09:50:00', '19:30:00', 'Full Day', 'Not Late', '09:40', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:30:54'),
(449, 11, '2020-07-14', '', '1', '09:51:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-14', '0000-00-00 00:00:00'),
(450, 48, '2020-07-14', '', '1', '09:52:00', '19:00:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:00:32'),
(451, 17, '2020-07-14', '', '1', '09:52:00', '19:01:00', 'Full Day', 'Not Late', '09:09', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:01:51'),
(452, 18, '2020-07-14', '', '1', '09:52:00', '19:00:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:00:46'),
(453, 27, '2020-07-14', '', '1', '09:54:00', '19:02:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:03:29'),
(454, 39, '2020-07-14', '', '1', '09:57:00', '19:42:00', 'Full Day', 'Not Late', '09:45', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:42:12'),
(455, 26, '2020-07-14', '', '1', '09:58:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-14', '0000-00-00 00:00:00'),
(456, 67, '2020-07-14', '', '1', '10:00:00', '19:30:00', 'Full Day', 'Not Late', '09:30', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:30:01'),
(457, 20, '2020-07-14', '', '1', '10:01:00', '19:26:00', 'Full Day', 'Not Late', '09:25', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:26:08'),
(458, 30, '2020-07-14', '', '1', '10:02:00', '19:05:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:05:08'),
(459, 42, '2020-07-14', '', '1', '10:23:00', '21:44:00', 'Full Day', 'Not Late', '11:21', '', 'N', 'Y', '2020-07-14', '2020-07-14 21:44:42'),
(460, 13, '2020-07-14', '', '1', '10:41:00', '19:05:00', 'Full Day', 'Not Late', '08:24', '', 'N', 'Y', '2020-07-14', '2020-07-14 19:05:26'),
(461, 15, '2020-07-15', '', '1', '09:45:00', '19:36:00', 'Full Day', 'Not Late', '09:51', '', 'N', 'Y', '2020-07-15', '2020-07-15 19:36:39'),
(462, 48, '2020-07-15', '', '1', '09:46:00', '19:02:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-07-15', '2020-07-15 19:02:10'),
(463, 66, '2020-07-15', '', '1', '09:47:00', '19:01:00', 'Full Day', 'Not Late', '09:14', '', 'N', 'Y', '2020-07-15', '2020-07-15 19:01:14'),
(464, 27, '2020-07-15', '', '1', '09:48:00', '19:12:00', 'Full Day', 'Not Late', '09:24', '', 'N', 'Y', '2020-07-15', '2020-07-15 19:12:51'),
(465, 18, '2020-07-15', '', '1', '09:51:00', '19:02:00', 'Full Day', 'Not Late', '09:11', '', 'N', 'Y', '2020-07-15', '2020-07-15 19:02:47'),
(466, 22, '2020-07-15', '', '1', '09:51:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-15', '0000-00-00 00:00:00'),
(467, 39, '2020-07-15', '', '1', '09:54:00', '19:27:00', 'Full Day', 'Not Late', '09:33', '', 'N', 'Y', '2020-07-15', '2020-07-15 19:27:57'),
(468, 17, '2020-07-15', '', '1', '09:58:00', '05:30:00', 'Over Time', 'Not Late', '19:32', '3', 'N', 'Y', '2020-07-15', '2020-07-15 19:03:09'),
(469, 30, '2020-07-15', '', '1', '10:02:00', '19:03:00', 'Full Day', 'Not Late', '09:01', '', 'N', 'Y', '2020-07-15', '2020-07-15 19:03:07'),
(470, 26, '2020-07-15', '', '1', '10:05:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-15', '0000-00-00 00:00:00'),
(471, 20, '2020-07-15', '', '1', '10:11:00', '19:30:00', 'Full Day', 'Not Late', '09:19', '', 'N', 'Y', '2020-07-15', '2020-07-15 19:30:41'),
(472, 42, '2020-07-15', '', '1', '10:29:00', '19:04:00', 'Full Day', 'Not Late', '08:35', '', 'N', 'Y', '2020-07-15', '2020-07-15 19:04:13'),
(473, 67, '2020-07-15', '', '1', '10:38:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-15', '0000-00-00 00:00:00'),
(474, 11, '2020-07-15', '', '1', '20:04:00', '20:04:00', 'Absent', 'Late', '00:00', '', 'N', 'Y', '2020-07-15', '2020-07-15 20:04:45'),
(475, 15, '2020-07-16', '', '1', '09:49:00', '19:41:00', 'Full Day', 'Not Late', '09:52', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:41:53'),
(476, 22, '2020-07-16', '', '1', '09:52:00', '19:24:00', 'Full Day', 'Not Late', '09:32', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:24:27'),
(477, 66, '2020-07-16', '', '1', '09:53:00', '19:19:00', 'Full Day', 'Not Late', '09:26', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:19:16'),
(478, 39, '2020-07-16', '', '1', '09:53:00', '19:57:00', 'Full Day', 'Not Late', '10:04', '', 'N', 'Y', '2020-07-16', '2020-07-22 19:12:00'),
(479, 27, '2020-07-16', '', '1', '09:53:00', '19:09:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:10:30'),
(480, 67, '2020-07-16', '', '1', '09:54:00', '19:06:00', 'Full Day', 'Not Late', '09:12', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:06:56'),
(481, 18, '2020-07-16', '', '1', '09:55:00', '19:00:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:00:18'),
(482, 17, '2020-07-16', '', '1', '09:56:00', '19:14:00', 'Full Day', 'Not Late', '09:18', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:14:11'),
(483, 11, '2020-07-16', '', '1', '09:57:00', '22:43:00', 'Full Day', 'Not Late', '12:46', '', 'N', 'Y', '2020-07-16', '2020-07-16 22:43:25'),
(484, 26, '2020-07-16', '', '1', '10:01:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-16', '0000-00-00 00:00:00'),
(485, 20, '2020-07-16', '', '1', '10:04:00', '19:15:00', 'Full Day', 'Not Late', '09:11', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:15:08'),
(486, 48, '2020-07-16', '', '1', '09:53:00', '19:00:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:00:15'),
(487, 30, '2020-07-16', '', '1', '10:12:00', '19:05:00', 'Full Day', 'Not Late', '08:53', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:05:26'),
(488, 13, '2020-07-16', '', '1', '10:57:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-16', '0000-00-00 00:00:00'),
(489, 42, '2020-07-16', '', '1', '11:09:00', '19:16:00', 'Full Day', 'Not Late', '08:07', '', 'N', 'Y', '2020-07-16', '2020-07-16 19:16:19'),
(490, 17, '2020-07-17', '', '1', '09:39:00', '19:32:00', 'Full Day', 'Not Late', '09:53', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:32:46'),
(491, 66, '2020-07-17', '', '1', '09:52:00', '19:34:00', 'Full Day', 'Not Late', '09:42', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:34:59'),
(492, 18, '2020-07-17', '', '1', '09:52:00', '19:04:00', 'Full Day', 'Not Late', '09:12', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:04:36'),
(493, 15, '2020-07-17', '', '1', '09:53:00', '19:54:00', 'Full Day', 'Not Late', '10:01', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:54:55'),
(494, 48, '2020-07-17', '', '1', '09:54:00', '19:22:00', 'Full Day', 'Not Late', '09:28', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:22:44'),
(495, 39, '2020-07-17', '', '1', '09:56:00', '19:27:00', 'Full Day', 'Not Late', '09:31', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:27:30'),
(496, 67, '2020-07-17', '', '1', '09:57:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-17', '0000-00-00 00:00:00'),
(497, 22, '2020-07-17', '', '1', '10:00:00', '19:08:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:08:23'),
(498, 20, '2020-07-17', '', '1', '10:01:00', '19:23:00', 'Full Day', 'Not Late', '09:22', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:23:55'),
(499, 26, '2020-07-17', '', '1', '10:02:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-17', '0000-00-00 00:00:00'),
(500, 30, '2020-07-17', '', '1', '10:02:00', '19:05:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:05:06'),
(501, 27, '2020-07-17', '', '1', '10:07:00', '19:10:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:10:43'),
(502, 42, '2020-07-17', '', '1', '10:51:00', '19:40:00', 'Full Day', 'Not Late', '08:49', '', 'N', 'Y', '2020-07-17', '2020-07-17 19:40:56'),
(503, 11, '2020-07-17', '', '1', '22:59:00', '23:00:00', 'Absent', 'Late', '00:01', '', 'N', 'Y', '2020-07-17', '2020-07-17 23:00:06'),
(504, 15, '2020-07-20', '', '1', '09:41:00', '19:30:00', 'Full Day', 'Not Late', '09:49', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:30:24'),
(505, 27, '2020-07-20', '', '1', '09:47:00', '19:16:00', 'Full Day', 'Not Late', '09:29', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:17:19'),
(506, 39, '2020-07-20', '', '1', '09:49:00', '19:16:00', 'Full Day', 'Not Late', '09:27', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:16:37'),
(507, 22, '2020-07-20', '', '1', '09:51:00', '19:37:00', 'Full Day', 'Not Late', '09:46', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:37:40'),
(508, 66, '2020-07-20', '', '1', '09:52:00', '19:00:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:00:39'),
(509, 48, '2020-07-20', '', '1', '09:53:00', '19:09:00', 'Full Day', 'Not Late', '09:16', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:09:32'),
(510, 18, '2020-07-20', '', '1', '09:53:00', '19:01:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:01:43'),
(511, 17, '2020-07-20', '', '1', '09:58:00', '19:01:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:01:13'),
(512, 26, '2020-07-20', '', '1', '09:59:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-20', '0000-00-00 00:00:00'),
(513, 30, '2020-07-20', '', '1', '10:00:00', '19:04:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:05:56'),
(514, 11, '2020-07-20', '', '1', '10:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-20', '0000-00-00 00:00:00'),
(515, 20, '2020-07-20', '', '1', '10:03:00', '19:11:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:11:25'),
(516, 42, '2020-07-20', '', '1', '10:29:00', '19:27:00', 'Full Day', 'Not Late', '08:58', '', 'N', 'Y', '2020-07-20', '2020-07-20 19:27:15'),
(517, 13, '2020-07-20', '', '1', '10:36:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-20', '0000-00-00 00:00:00'),
(518, 67, '2020-07-20', '', '1', '15:46:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-20', '0000-00-00 00:00:00'),
(519, 66, '2020-07-21', '', '1', '09:36:00', '19:01:00', 'Full Day', 'Not Late', '09:25', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:01:06'),
(520, 15, '2020-07-21', '', '1', '09:39:00', '19:34:00', 'Full Day', 'Not Late', '09:55', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:34:10'),
(521, 22, '2020-07-21', '', '1', '09:50:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-21', '0000-00-00 00:00:00'),
(522, 27, '2020-07-21', '', '1', '09:54:00', '19:04:00', 'Full Day', 'Not Late', '09:10', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:05:36'),
(523, 18, '2020-07-21', '', '1', '09:55:00', '19:02:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:02:55'),
(524, 39, '2020-07-21', '', '1', '09:56:00', '19:20:00', 'Full Day', 'Not Late', '09:24', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:19:58'),
(525, 17, '2020-07-21', '', '1', '09:58:00', '19:02:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:02:03'),
(526, 48, '2020-07-21', '', '1', '09:58:00', '19:00:00', 'Full Day', 'Not Late', '09:02', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:00:21'),
(527, 30, '2020-07-21', '', '1', '10:00:00', '19:05:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:05:06'),
(528, 20, '2020-07-21', '', '1', '10:01:00', '19:05:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:05:42'),
(529, 67, '2020-07-21', '', '1', '10:08:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-21', '0000-00-00 00:00:00'),
(530, 26, '2020-07-21', '', '1', '10:27:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-21', '0000-00-00 00:00:00'),
(531, 42, '2020-07-21', '', '1', '10:34:00', '19:12:00', 'Full Day', 'Not Late', '08:38', '', 'N', 'Y', '2020-07-21', '2020-07-21 19:12:58'),
(532, 13, '2020-07-21', '', '1', '11:12:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-21', '0000-00-00 00:00:00'),
(533, 11, '2020-07-21', '', '1', '21:12:00', '21:12:00', 'Absent', 'Late', '00:00', '', 'N', 'Y', '2020-07-21', '2020-07-21 21:12:45'),
(534, 15, '2020-07-22', '', '1', '09:48:00', '20:11:00', 'Full Day', 'Not Late', '10:23', '', 'N', 'Y', '2020-07-22', '2020-07-22 20:11:32'),
(535, 48, '2020-07-22', '', '1', '09:50:00', '19:00:00', 'Full Day', 'Not Late', '09:10', '', 'N', 'Y', '2020-07-22', '2020-07-22 19:00:07'),
(536, 27, '2020-07-22', '', '1', '09:51:00', '19:14:00', 'Full Day', 'Not Late', '09:23', '', 'N', 'Y', '2020-07-22', '2020-07-22 19:14:45'),
(537, 67, '2020-07-22', '', '1', '09:52:00', '19:44:00', 'Full Day', 'Not Late', '09:52', '', 'N', 'Y', '2020-07-22', '2020-07-22 19:44:41'),
(538, 17, '2020-07-22', '', '1', '09:54:00', '19:01:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-07-22', '2020-07-22 19:01:17'),
(539, 18, '2020-07-22', '', '1', '09:55:00', '19:00:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-07-22', '2020-07-22 19:00:29'),
(540, 66, '2020-07-22', '', '1', '09:55:00', '19:16:00', 'Full Day', 'Not Late', '09:21', '', 'N', 'Y', '2020-07-22', '2020-07-22 19:16:41'),
(541, 39, '2020-07-22', '', '1', '09:57:00', '19:20:00', 'Full Day', 'Not Late', '09:23', '', 'N', 'Y', '2020-07-22', '2020-07-22 19:19:57'),
(542, 30, '2020-07-22', '', '1', '10:00:00', '19:09:00', 'Full Day', 'Not Late', '09:09', '', 'N', 'Y', '2020-07-22', '2020-07-22 19:09:18'),
(543, 26, '2020-07-22', '', '1', '10:05:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-22', '0000-00-00 00:00:00'),
(544, 11, '2020-07-22', '', '1', '10:07:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-22', '0000-00-00 00:00:00'),
(545, 20, '2020-07-22', '', '1', '10:08:00', '19:12:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-07-22', '2020-07-22 19:12:42'),
(546, 42, '2020-07-22', '', '1', '10:27:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-22', '0000-00-00 00:00:00'),
(547, 22, '2020-07-22', '', '1', '10:44:00', '20:21:00', 'Full Day', 'Late', '09:37', '', 'N', 'Y', '2020-07-22', '2020-07-22 20:21:19'),
(548, 15, '2020-07-23', '', '1', '09:48:00', '19:51:00', 'Full Day', 'Not Late', '10:03', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:51:54'),
(549, 48, '2020-07-23', '', '1', '09:53:00', '19:00:00', 'Full Day', 'Not Late', '09:07', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:00:35'),
(550, 66, '2020-07-23', '', '1', '09:53:00', '19:01:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:01:08'),
(551, 18, '2020-07-23', '', '1', '09:56:00', '19:05:00', 'Full Day', 'Not Late', '09:09', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:05:36'),
(552, 27, '2020-07-23', '', '1', '09:56:00', '19:09:00', 'Full Day', 'Not Late', '09:13', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:10:02'),
(553, 67, '2020-07-23', '', '1', '09:56:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-23', '0000-00-00 00:00:00'),
(554, 22, '2020-07-23', '', '1', '09:56:00', '20:24:00', 'Full Day', 'Not Late', '10:28', '', 'N', 'Y', '2020-07-23', '2020-07-23 20:24:59'),
(555, 39, '2020-07-23', '', '1', '09:57:00', '19:25:00', 'Full Day', 'Not Late', '09:28', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:25:20'),
(556, 17, '2020-07-23', '', '1', '09:58:00', '19:02:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:02:28'),
(557, 26, '2020-07-23', '', '1', '09:58:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-23', '0000-00-00 00:00:00'),
(558, 30, '2020-07-23', '', '1', '10:00:00', '19:04:00', 'Full Day', 'Not Late', '09:04', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:04:45'),
(559, 20, '2020-07-23', '', '1', '10:09:00', '19:26:00', 'Full Day', 'Not Late', '09:17', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:26:35'),
(560, 13, '2020-07-23', '', '1', '10:38:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-23', '0000-00-00 00:00:00'),
(561, 11, '2020-07-23', '', '1', '10:41:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-23', '0000-00-00 00:00:00'),
(562, 42, '2020-07-23', '', '1', '11:14:00', '19:14:00', 'Full Day', 'Not Late', '08:00', '', 'N', 'Y', '2020-07-23', '2020-07-23 19:14:54'),
(563, 15, '2020-07-24', '', '1', '09:43:00', '19:30:00', 'Full Day', 'Not Late', '09:47', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:30:23'),
(564, 48, '2020-07-24', '', '1', '09:50:00', '19:28:00', 'Full Day', 'Not Late', '09:38', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:29:02'),
(565, 27, '2020-07-24', '', '1', '09:52:00', '19:10:00', 'Full Day', 'Not Late', '09:18', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:10:53'),
(566, 66, '2020-07-24', '', '1', '09:53:00', '19:01:00', 'Full Day', 'Not Late', '09:08', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:01:15'),
(567, 22, '2020-07-24', '', '1', '09:54:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-24', '0000-00-00 00:00:00'),
(568, 18, '2020-07-24', '', '1', '09:55:00', '19:00:00', 'Full Day', 'Not Late', '09:05', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:00:35'),
(569, 39, '2020-07-24', '', '1', '09:57:00', '19:35:00', 'Full Day', 'Not Late', '09:38', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:35:19'),
(570, 17, '2020-07-24', '', '1', '09:58:00', '19:12:00', 'Full Day', 'Not Late', '09:14', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:12:22'),
(571, 30, '2020-07-24', '', '1', '10:02:00', '19:03:00', 'Full Day', 'Not Late', '09:01', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:03:25'),
(572, 20, '2020-07-24', '', '1', '10:03:00', '19:06:00', 'Full Day', 'Not Late', '09:03', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:06:51'),
(573, 26, '2020-07-24', '', '1', '10:09:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-24', '0000-00-00 00:00:00'),
(574, 11, '2020-07-24', '', '1', '10:09:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-24', '0000-00-00 00:00:00'),
(575, 13, '2020-07-24', '', '1', '10:53:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-24', '0000-00-00 00:00:00'),
(576, 42, '2020-07-24', '', '1', '11:04:00', '19:17:00', 'Full Day', 'Not Late', '08:13', '', 'N', 'Y', '2020-07-24', '2020-07-24 19:17:37'),
(577, 67, '2020-07-24', '', '1', '15:31:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-24', '0000-00-00 00:00:00'),
(578, 39, '2020-07-25', '', '1', '09:54:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(579, 66, '2020-07-25', '', '1', '09:54:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(580, 22, '2020-07-25', '', '1', '09:54:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(581, 15, '2020-07-25', '', '1', '09:54:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(582, 48, '2020-07-25', '', '1', '09:55:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(583, 27, '2020-07-25', '', '1', '09:55:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(584, 18, '2020-07-25', '', '1', '09:56:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(585, 11, '2020-07-25', '', '1', '09:59:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(586, 30, '2020-07-25', '', '1', '10:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(587, 67, '2020-07-25', '', '1', '10:08:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(588, 26, '2020-07-25', '', '1', '10:12:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(589, 20, '2020-07-25', '', '1', '10:16:00', '00:00:00', NULL, 'Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(590, 42, '2020-07-25', '', '1', '10:33:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(591, 13, '2020-07-25', '', '1', '10:51:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2020-07-25', '0000-00-00 00:00:00'),
(0, 135, '2023-06-07', '', '1', '08:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2023-06-07', '0000-00-00 00:00:00'),
(0, 135, '2023-06-01', '', '1', '01:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2023-06-07', '0000-00-00 00:00:00'),
(0, 29, '2023-06-01', '', '1', '01:00:00', '00:00:00', NULL, 'Not Late', NULL, NULL, 'N', 'Y', '2023-06-07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_attendance_break_time`
--

CREATE TABLE `hr_attendance_break_time` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `flag` enum('0','1') NOT NULL DEFAULT '1',
  `entry_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `day_type` varchar(100) DEFAULT NULL,
  `late_type` varchar(100) DEFAULT NULL,
  `total_hour` time DEFAULT NULL,
  `overTime` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_attendance_break_time`
--

INSERT INTO `hr_attendance_break_time` (`id`, `employee_id`, `attendance_id`, `date`, `type`, `flag`, `entry_time`, `out_time`, `day_type`, `late_type`, `total_hour`, `overTime`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 13, 3, '2020-05-19', '', '1', '21:50:00', '21:50:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-19', '2020-05-19 21:50:42'),
(2, 42, 7, '2020-05-21', '', '1', '10:00:00', '10:00:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-21', '2020-05-21 10:00:40'),
(3, 42, 7, '2020-05-21', '', '1', '13:07:00', '13:07:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-21', '2020-05-21 13:07:50'),
(4, 42, 7, '2020-05-21', '', '1', '13:07:00', '14:42:00', NULL, NULL, '01:35:00', NULL, 'N', 'Y', '2020-05-21', '2020-05-21 14:43:48'),
(5, 42, 10, '2020-05-22', '', '1', '10:07:00', '10:07:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 10:07:06'),
(6, 42, 10, '2020-05-22', '', '1', '10:07:00', '10:07:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 10:07:16'),
(7, 42, 10, '2020-05-22', '', '1', '10:07:00', '14:51:00', NULL, NULL, '04:44:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 14:52:25'),
(8, 42, 10, '2020-05-22', '', '1', '14:52:00', '14:52:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 14:53:32'),
(9, 42, 10, '2020-05-22', '', '1', '14:53:00', '14:53:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 14:56:49'),
(10, 42, 10, '2020-05-22', '', '1', '14:56:00', '14:56:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 14:57:50'),
(11, 42, 10, '2020-05-22', '', '1', '14:57:00', '14:57:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 14:58:31'),
(12, 42, 10, '2020-05-22', '', '1', '14:58:00', '14:59:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 15:01:44'),
(13, 42, 10, '2020-05-22', '', '1', '15:01:00', '15:01:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 15:01:55'),
(14, 42, 10, '2020-05-22', '', '1', '15:01:00', '15:01:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 15:02:26'),
(15, 42, 10, '2020-05-22', '', '1', '15:02:00', '15:02:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 15:02:46'),
(16, 40, 9, '2020-05-22', '', '1', '17:23:00', '19:22:00', NULL, NULL, '01:59:00', NULL, 'N', 'Y', '2020-05-22', '2020-05-22 19:22:03'),
(17, 42, 11, '2020-05-23', '', '1', '10:18:00', '14:12:00', NULL, NULL, '03:54:00', NULL, 'N', 'Y', '2020-05-23', '2020-05-23 14:13:52'),
(18, 42, 11, '2020-05-23', '', '1', '14:13:00', '14:13:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-23', '2020-05-23 14:15:14'),
(19, 42, 13, '2020-05-25', '', '1', '10:27:00', '11:38:00', NULL, NULL, '01:11:00', NULL, 'N', 'Y', '2020-05-25', '2020-05-25 11:39:16'),
(20, 42, 13, '2020-05-25', '', '1', '11:39:00', '11:41:00', NULL, NULL, '00:02:00', NULL, 'N', 'Y', '2020-05-25', '2020-05-25 11:41:58'),
(21, 40, 12, '2020-05-25', '', '1', '17:48:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-05-25', '0000-00-00 00:00:00'),
(22, 42, 15, '2020-05-26', '', '1', '10:49:00', '10:49:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-26', '2020-05-26 10:49:58'),
(23, 42, 15, '2020-05-26', '', '1', '10:49:00', '14:17:00', NULL, NULL, '03:28:00', NULL, 'N', 'Y', '2020-05-26', '2020-05-26 14:19:59'),
(24, 42, 15, '2020-05-26', '', '1', '14:20:00', '14:20:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-26', '2020-05-26 14:20:05'),
(25, 42, 18, '2020-05-27', '', '1', '10:25:00', '14:24:00', NULL, NULL, '03:59:00', NULL, 'N', 'Y', '2020-05-27', '2020-05-27 14:24:54'),
(26, 13, 24, '2020-05-28', '', '1', '11:41:00', '15:22:00', NULL, NULL, '03:41:00', NULL, 'N', 'Y', '2020-05-28', '2020-05-28 15:22:37'),
(27, 40, 21, '2020-05-28', '', '1', '18:17:00', '19:07:00', NULL, NULL, '00:50:00', NULL, 'N', 'Y', '2020-05-28', '2020-05-28 19:07:34'),
(28, 42, 26, '2020-05-29', '', '1', '11:00:00', '15:41:00', NULL, NULL, '04:41:00', NULL, 'N', 'Y', '2020-05-29', '2020-05-29 15:42:03'),
(29, 41, 27, '2020-05-29', '', '1', '14:08:00', '14:09:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-05-29', '2020-05-29 14:09:17'),
(30, 41, 27, '2020-05-29', '', '1', '14:09:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-05-29', '0000-00-00 00:00:00'),
(31, 40, 29, '2020-05-30', '', '1', '15:19:00', '15:19:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-05-30', '2020-05-30 15:19:19'),
(32, 13, 30, '2020-05-30', '', '1', '14:06:00', '15:47:00', NULL, NULL, '01:41:00', NULL, 'N', 'Y', '2020-05-30', '2020-05-30 15:47:46'),
(33, 40, 29, '2020-05-30', '', '1', '15:19:00', '16:00:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-05-30', '2020-05-30 16:00:34'),
(34, 42, 34, '2020-06-01', '', '1', '12:07:00', '15:38:00', NULL, NULL, '03:31:00', NULL, 'N', 'Y', '2020-06-01', '2020-06-01 15:38:52'),
(35, 40, 31, '2020-06-01', '', '1', '19:03:00', '19:03:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-01', '2020-06-01 19:03:39'),
(36, 13, 38, '2020-06-02', '', '1', '15:08:00', '15:55:00', NULL, NULL, '00:47:00', NULL, 'N', 'Y', '2020-06-02', '2020-06-02 15:55:47'),
(37, 42, 40, '2020-06-03', '', '1', '10:18:00', '10:40:00', NULL, NULL, '00:22:00', NULL, 'N', 'Y', '2020-06-03', '2020-06-03 10:40:44'),
(38, 42, 40, '2020-06-03', '', '1', '12:00:00', '18:13:00', NULL, NULL, '06:13:00', NULL, 'N', 'Y', '2020-06-03', '2020-06-03 18:13:47'),
(39, 4, 39, '2020-06-03', '', '1', '17:54:00', '17:55:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-03', '2020-06-03 18:37:29'),
(40, 42, 45, '2020-06-04', '', '1', '10:57:00', '14:22:00', NULL, NULL, '03:25:00', NULL, 'N', 'Y', '2020-06-04', '2020-06-04 14:23:04'),
(41, 42, 45, '2020-06-04', '', '1', '15:59:00', '18:03:00', NULL, NULL, '02:04:00', NULL, 'N', 'Y', '2020-06-04', '2020-06-04 18:03:15'),
(42, 42, 48, '2020-06-05', '', '1', '10:53:00', '14:33:00', NULL, NULL, '03:40:00', NULL, 'N', 'Y', '2020-06-05', '2020-06-05 14:33:32'),
(43, 41, 47, '2020-06-05', '', '1', '13:55:00', '14:33:00', NULL, NULL, '00:38:00', NULL, 'N', 'Y', '2020-06-05', '2020-06-05 15:31:14'),
(44, 13, 49, '2020-06-05', '', '1', '15:41:00', '15:41:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-05', '2020-06-05 16:06:23'),
(45, 42, 48, '2020-06-05', '', '1', '15:42:00', '17:12:00', NULL, NULL, '01:30:00', NULL, 'N', 'Y', '2020-06-05', '2020-06-05 17:12:58'),
(46, 41, 47, '2020-06-05', '', '1', '15:31:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-05', '0000-00-00 00:00:00'),
(48, 13, 49, '2020-06-05', '', '1', '20:36:00', '20:37:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-05', '2020-06-05 20:37:13'),
(49, 42, 57, '2020-06-08', '', '1', '10:59:00', '13:53:00', NULL, NULL, '02:54:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 13:53:35'),
(50, 66, 55, '2020-06-08', '', '1', '10:57:00', '12:29:00', NULL, NULL, '01:32:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 12:51:13'),
(51, 18, 53, '2020-06-08', '', '1', '13:33:00', '13:33:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 14:05:07'),
(52, 66, 55, '2020-06-08', '', '1', '12:51:00', '13:36:00', NULL, NULL, '00:45:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 13:52:39'),
(53, 41, 58, '2020-06-08', '', '1', '13:51:00', '13:52:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 14:52:41'),
(54, 42, 57, '2020-06-08', '', '1', '14:17:00', '16:01:00', NULL, NULL, '01:44:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 16:01:13'),
(55, 17, 54, '2020-06-08', '', '1', '13:44:00', '19:25:00', NULL, NULL, '05:41:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 19:25:49'),
(56, 15, 52, '2020-06-08', '', '1', '14:26:00', '14:26:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 15:02:09'),
(57, 48, 56, '2020-06-08', '', '1', '14:37:00', '14:56:00', NULL, NULL, '00:19:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 14:56:52'),
(58, 13, 59, '2020-06-08', '', '1', '15:36:00', '17:08:00', NULL, NULL, '01:32:00', NULL, 'N', 'Y', '2020-06-08', '2020-06-08 17:08:37'),
(59, 41, 58, '2020-06-08', '', '1', '14:52:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-08', '0000-00-00 00:00:00'),
(60, 17, 62, '2020-06-09', '', '1', '13:09:00', '13:10:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-09', '2020-06-09 13:54:28'),
(61, 4, 68, '2020-06-09', '', '1', '13:44:00', '13:44:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-09', '2020-06-09 13:44:55'),
(62, 41, 65, '2020-06-09', '', '1', '14:00:00', '14:00:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-09', '2020-06-09 15:20:45'),
(63, 48, 60, '2020-06-09', '', '1', '14:58:00', '15:38:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-06-09', '2020-06-09 15:38:16'),
(64, 18, 61, '2020-06-09', '', '1', '15:03:00', '15:03:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-09', '2020-06-09 15:04:18'),
(65, 18, 61, '2020-06-09', '', '1', '16:00:00', '18:12:00', NULL, NULL, '02:12:00', NULL, 'N', 'Y', '2020-06-09', '2020-06-09 19:00:44'),
(66, 41, 65, '2020-06-09', '', '1', '15:20:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-09', '0000-00-00 00:00:00'),
(67, 66, 71, '2020-06-10', '', '1', '11:41:00', '13:08:00', NULL, NULL, '01:27:00', NULL, 'N', 'Y', '2020-06-10', '2020-06-10 13:39:29'),
(68, 42, 74, '2020-06-10', '', '1', '13:37:00', '13:52:00', NULL, NULL, '00:15:00', NULL, 'N', 'Y', '2020-06-10', '2020-06-10 13:52:51'),
(69, 17, 72, '2020-06-10', '', '1', '13:51:00', '14:30:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-06-10', '2020-06-10 14:30:28'),
(70, 18, 73, '2020-06-10', '', '1', '14:05:00', '14:05:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-10', '2020-06-10 16:03:10'),
(71, 48, 70, '2020-06-10', '', '1', '15:04:00', '15:40:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-06-10', '2020-06-10 15:40:34'),
(72, 15, 69, '2020-06-10', '', '1', '19:02:00', '19:02:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-10', '2020-06-10 19:02:51'),
(73, 15, 69, '2020-06-10', '', '1', '19:02:00', '19:02:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-10', '2020-06-10 19:03:14'),
(74, 18, 78, '2020-06-11', '', '1', '13:23:00', '13:24:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-11', '2020-06-11 13:57:53'),
(75, 17, 80, '2020-06-11', '', '1', '13:45:00', '14:31:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-06-11', '2020-06-11 14:31:53'),
(76, 41, 82, '2020-06-11', '', '1', '14:31:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-11', '0000-00-00 00:00:00'),
(77, 48, 79, '2020-06-11', '', '1', '15:22:00', '16:01:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-06-11', '2020-06-11 16:02:03'),
(78, 13, 84, '2020-06-11', '', '1', '15:34:00', '16:06:00', NULL, NULL, '00:32:00', NULL, 'N', 'Y', '2020-06-11', '2020-06-11 16:16:35'),
(79, 15, 77, '2020-06-11', '', '1', '19:21:00', '19:30:00', NULL, NULL, '00:09:00', NULL, 'N', 'Y', '2020-06-11', '2020-06-11 19:30:06'),
(80, 66, 86, '2020-06-12', '', '1', '12:59:00', '12:59:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-12', '2020-06-12 13:38:13'),
(81, 18, 87, '2020-06-12', '', '1', '13:27:00', '13:30:00', NULL, NULL, '00:03:00', NULL, 'N', 'Y', '2020-06-12', '2020-06-12 14:08:47'),
(82, 41, 90, '2020-06-12', '', '1', '13:50:00', '13:50:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-12', '2020-06-12 14:24:56'),
(83, 15, 85, '2020-06-12', '', '1', '14:34:00', '14:34:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-12', '2020-06-12 15:14:23'),
(84, 41, 90, '2020-06-12', '', '1', '14:24:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-12', '0000-00-00 00:00:00'),
(85, 42, 89, '2020-06-12', '', '1', '15:08:00', '15:08:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-12', '2020-06-12 15:08:21'),
(86, 17, 88, '2020-06-12', '', '1', '15:13:00', '15:14:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-12', '2020-06-12 15:57:33'),
(87, 18, 87, '2020-06-12', '', '1', '19:08:00', '19:08:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-12', '2020-06-12 19:08:41'),
(88, 66, 95, '2020-06-13', '', '1', '09:55:00', '11:10:00', NULL, NULL, '01:15:00', NULL, 'N', 'Y', '2020-06-13', '2020-06-13 11:36:34'),
(89, 66, 95, '2020-06-13', '', '1', '13:37:00', '13:37:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-13', '2020-06-13 13:59:32'),
(90, 41, 97, '2020-06-13', '', '1', '14:01:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-13', '0000-00-00 00:00:00'),
(91, 17, 94, '2020-06-13', '', '1', '14:03:00', '14:05:00', NULL, NULL, '00:02:00', NULL, 'N', 'Y', '2020-06-13', '2020-06-13 14:41:48'),
(92, 15, 92, '2020-06-13', '', '1', '14:24:00', '14:24:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-13', '2020-06-13 14:54:08'),
(93, 48, 93, '2020-06-13', '', '1', '15:19:00', '15:20:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-13', '2020-06-13 15:40:47'),
(94, 18, 102, '2020-06-15', '', '1', '12:54:00', '13:17:00', NULL, NULL, '00:23:00', NULL, 'N', 'Y', '2020-06-15', '2020-06-15 13:49:25'),
(95, 66, 101, '2020-06-15', '', '1', '13:27:00', '13:27:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-15', '2020-06-15 14:07:53'),
(96, 15, 100, '2020-06-15', '', '1', '14:50:00', '14:50:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-15', '2020-06-15 15:34:36'),
(97, 41, 105, '2020-06-15', '', '1', '15:04:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-15', '0000-00-00 00:00:00'),
(98, 48, 103, '2020-06-15', '', '1', '15:37:00', '16:10:00', NULL, NULL, '00:33:00', NULL, 'N', 'Y', '2020-06-15', '2020-06-15 16:10:23'),
(99, 66, 109, '2020-06-16', '', '1', '12:57:00', '12:58:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-16', '2020-06-16 13:27:44'),
(100, 18, 110, '2020-06-16', '', '1', '12:56:00', '13:16:00', NULL, NULL, '00:20:00', NULL, 'N', 'Y', '2020-06-16', '2020-06-16 13:46:15'),
(101, 17, 112, '2020-06-16', '', '1', '14:00:00', '14:01:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-16', '2020-06-16 14:50:11'),
(102, 15, 108, '2020-06-16', '', '1', '14:15:00', '14:15:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-16', '2020-06-16 14:50:53'),
(103, 41, 114, '2020-06-16', '', '1', '14:30:00', '14:31:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-16', '2020-06-16 15:17:33'),
(104, 13, 113, '2020-06-16', '', '1', '14:57:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-16', '0000-00-00 00:00:00'),
(105, 48, 111, '2020-06-16', '', '1', '14:58:00', '15:39:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-06-16', '2020-06-16 15:39:39'),
(106, 41, 114, '2020-06-16', '', '1', '15:17:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-16', '0000-00-00 00:00:00'),
(107, 66, 116, '2020-06-17', '', '1', '14:02:00', '14:44:00', NULL, NULL, '00:42:00', NULL, 'N', 'Y', '2020-06-17', '2020-06-17 14:44:14'),
(108, 41, 122, '2020-06-17', '', '1', '14:45:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-17', '0000-00-00 00:00:00'),
(109, 15, 117, '2020-06-17', '', '1', '14:48:00', '14:48:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-17', '2020-06-17 15:19:15'),
(110, 18, 119, '2020-06-17', '', '1', '14:09:00', '14:53:00', NULL, NULL, '00:44:00', NULL, 'N', 'Y', '2020-06-17', '2020-06-17 15:29:32'),
(111, 17, 120, '2020-06-17', '', '1', '15:01:00', '15:02:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-17', '2020-06-17 15:37:08'),
(112, 48, 118, '2020-06-17', '', '1', '15:15:00', '15:55:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-06-17', '2020-06-17 15:55:12'),
(113, 41, 129, '2020-06-18', '', '1', '10:59:00', '11:21:00', NULL, NULL, '00:22:00', NULL, 'N', 'Y', '2020-06-18', '2020-06-18 11:21:13'),
(114, 18, 126, '2020-06-18', '', '1', '13:26:00', '13:26:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-18', '2020-06-18 14:01:46'),
(115, 15, 128, '2020-06-18', '', '1', '14:29:00', '14:30:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-18', '2020-06-18 15:12:51'),
(116, 17, 127, '2020-06-18', '', '1', '15:02:00', '15:48:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-06-18', '2020-06-18 15:49:03'),
(117, 48, 124, '2020-06-18', '', '1', '15:03:00', '15:37:00', NULL, NULL, '00:34:00', NULL, 'N', 'Y', '2020-06-18', '2020-06-18 15:37:50'),
(118, 13, 131, '2020-06-18', '', '1', '15:04:00', '15:04:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-18', '2020-06-18 15:47:16'),
(119, 41, 129, '2020-06-18', '', '1', '15:53:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-18', '0000-00-00 00:00:00'),
(120, 66, 132, '2020-06-19', '', '1', '13:02:00', '13:02:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-19', '2020-06-19 13:34:07'),
(121, 18, 133, '2020-06-19', '', '1', '13:30:00', '13:30:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-19', '2020-06-19 14:01:27'),
(122, 17, 135, '2020-06-19', '', '1', '14:33:00', '15:14:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-06-19', '2020-06-19 15:15:30'),
(123, 15, 136, '2020-06-19', '', '1', '14:43:00', '14:52:00', NULL, NULL, '00:09:00', NULL, 'N', 'Y', '2020-06-19', '2020-06-19 15:26:11'),
(124, 48, 134, '2020-06-19', '', '1', '15:18:00', '15:59:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-06-19', '2020-06-19 15:59:26'),
(125, 18, 133, '2020-06-19', '', '1', '19:05:00', '19:05:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-19', '2020-06-19 19:05:53'),
(126, 4, 150, '2020-06-22', '', '1', '11:43:00', '11:44:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:44:42'),
(127, 14, 151, '2020-06-22', '', '1', '11:47:00', '11:47:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:48:00'),
(128, 23, 153, '2020-06-22', '', '1', '11:49:00', '11:49:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:49:52'),
(129, 23, 153, '2020-06-22', '', '1', '11:49:00', '11:52:00', NULL, NULL, '00:03:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:53:10'),
(130, 29, 154, '2020-06-22', '', '1', '11:50:00', '11:50:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:50:56'),
(131, 29, 154, '2020-06-22', '', '1', '11:50:00', '11:51:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:53:26'),
(132, 11, 156, '2020-06-22', '', '1', '11:51:00', '11:51:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:51:50'),
(133, 22, 155, '2020-06-22', '', '1', '11:51:00', '11:51:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:51:38'),
(134, 14, 151, '2020-06-22', '', '1', '11:52:00', '11:53:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:53:18'),
(135, 26, 157, '2020-06-22', '', '1', '11:53:00', '11:57:00', NULL, NULL, '00:04:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 12:00:03'),
(136, 29, 154, '2020-06-22', '', '1', '11:53:00', '11:53:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:54:07'),
(137, 14, 151, '2020-06-22', '', '1', '11:49:00', '11:54:00', NULL, NULL, '00:05:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:54:33'),
(138, 29, 154, '2020-06-22', '', '1', '11:54:00', '11:56:00', NULL, NULL, '00:02:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:56:17'),
(139, 26, 157, '2020-06-22', '', '1', '11:52:00', '11:57:00', NULL, NULL, '00:05:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:57:31'),
(140, 24, 149, '2020-06-22', '', '1', '11:59:00', '11:59:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 11:59:53'),
(141, 24, 149, '2020-06-22', '', '1', '11:59:00', '12:59:00', NULL, NULL, '01:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 13:00:56'),
(142, 26, 157, '2020-06-22', '', '1', '12:00:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(143, 11, 156, '2020-06-22', '', '1', '11:51:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(144, 29, 154, '2020-06-22', '', '1', '11:56:00', '12:04:00', NULL, NULL, '00:08:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 12:05:05'),
(145, 29, 154, '2020-06-22', '', '1', '12:05:00', '18:43:00', NULL, NULL, '06:38:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 18:49:40'),
(146, 4, 150, '2020-06-22', '', '1', '11:58:00', '12:09:00', NULL, NULL, '00:11:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 12:09:27'),
(147, 34, 159, '2020-06-22', '', '1', '12:11:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(148, 67, 160, '2020-06-22', '', '1', '12:27:00', '12:27:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 12:27:39'),
(149, 67, 160, '2020-06-22', '', '1', '12:27:00', '12:27:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 12:27:47'),
(150, 66, 141, '2020-06-22', '', '1', '12:34:00', '12:34:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 12:52:03'),
(151, 24, 149, '2020-06-22', '', '1', '13:00:00', '13:01:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 13:01:05'),
(152, 24, 149, '2020-06-22', '', '1', '13:01:00', '13:01:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 13:01:27'),
(153, 24, 149, '2020-06-22', '', '1', '13:01:00', '13:02:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 13:02:05'),
(154, 24, 149, '2020-06-22', '', '1', '13:02:00', '13:03:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 13:03:17'),
(155, 17, 144, '2020-06-22', '', '1', '13:24:00', '13:24:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 14:10:04'),
(156, 41, 147, '2020-06-22', '', '1', '13:30:00', '13:31:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 14:05:11'),
(157, 18, 143, '2020-06-22', '', '1', '13:40:00', '13:40:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 14:06:00'),
(158, 39, 146, '2020-06-22', '', '1', '13:50:00', '14:00:00', NULL, NULL, '00:10:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 14:01:21'),
(159, 48, 142, '2020-06-22', '', '1', '14:41:00', '15:19:00', NULL, NULL, '00:38:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 15:19:41'),
(160, 15, 140, '2020-06-22', '', '1', '14:42:00', '14:47:00', NULL, NULL, '00:05:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 15:35:14'),
(161, 41, 147, '2020-06-22', '', '1', '14:05:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(162, 27, 162, '2020-06-22', '', '1', '16:15:00', '16:15:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 16:17:55'),
(163, 18, 143, '2020-06-22', '', '1', '19:00:00', '19:00:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-22', '2020-06-22 19:00:58'),
(164, 11, 164, '2020-06-23', '', '1', '09:45:00', '19:17:00', NULL, NULL, '09:32:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 19:19:06'),
(165, 18, 170, '2020-06-23', '', '1', '13:11:00', '13:21:00', NULL, NULL, '00:10:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 13:48:02'),
(166, 39, 166, '2020-06-23', '', '1', '13:31:00', '13:31:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 14:04:01'),
(167, 41, 180, '2020-06-23', '', '1', '13:41:00', '13:45:00', NULL, NULL, '00:04:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 14:10:36'),
(168, 27, 169, '2020-06-23', '', '1', '13:20:00', '13:52:00', NULL, NULL, '00:32:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 14:42:48'),
(169, 26, 176, '2020-06-23', '', '1', '13:59:00', '13:59:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 13:59:56'),
(170, 66, 167, '2020-06-23', '', '1', '14:32:00', '14:33:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 14:48:03'),
(171, 15, 174, '2020-06-23', '', '1', '14:26:00', '14:36:00', NULL, NULL, '00:10:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 15:23:01'),
(172, 26, 176, '2020-06-23', '', '1', '13:59:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(173, 22, 172, '2020-06-23', '', '1', '14:56:00', '14:56:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 15:24:32'),
(174, 17, 171, '2020-06-23', '', '1', '15:07:00', '15:07:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 15:47:06'),
(175, 30, 175, '2020-06-23', '', '1', '15:10:00', '15:10:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 15:55:40'),
(176, 48, 168, '2020-06-23', '', '1', '15:12:00', '15:52:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 15:52:43'),
(177, 41, 180, '2020-06-23', '', '1', '14:10:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(178, 42, 179, '2020-06-23', '', '1', '15:29:00', '15:29:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 15:29:38'),
(179, 39, 166, '2020-06-23', '', '1', '17:17:00', '17:17:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 17:33:23'),
(180, 67, 165, '2020-06-23', '', '1', '18:10:00', '18:10:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 18:11:47'),
(181, 67, 165, '2020-06-23', '', '1', '18:11:00', '18:28:00', NULL, NULL, '00:17:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 19:15:40'),
(182, 17, 171, '2020-06-23', '', '1', '19:03:00', '19:03:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 19:03:21'),
(183, 39, 166, '2020-06-23', '', '1', '18:12:00', '19:11:00', NULL, NULL, '00:59:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 19:11:39'),
(184, 67, 165, '2020-06-23', '', '1', '19:15:00', '19:15:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-23', '2020-06-23 19:15:43'),
(185, 11, 164, '2020-06-23', '', '1', '19:19:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(186, 11, 184, '2020-06-24', '', '1', '09:55:00', '09:56:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 09:59:04'),
(187, 11, 184, '2020-06-24', '', '1', '09:59:00', '09:59:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 09:59:44'),
(188, 11, 184, '2020-06-24', '', '1', '09:59:00', '10:00:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 10:00:20'),
(189, 11, 184, '2020-06-24', '', '1', '10:00:00', '10:00:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 10:00:29'),
(190, 18, 181, '2020-06-24', '', '1', '12:40:00', '12:40:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 13:13:22'),
(191, 17, 188, '2020-06-24', '', '1', '13:05:00', '13:06:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 13:57:09'),
(192, 39, 186, '2020-06-24', '', '1', '13:10:00', '13:10:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 13:54:05'),
(193, 26, 193, '2020-06-24', '', '1', '13:43:00', '13:43:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 14:16:04'),
(194, 27, 183, '2020-06-24', '', '1', '12:54:00', '13:52:00', NULL, NULL, '00:58:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 14:35:05'),
(195, 48, 185, '2020-06-24', '', '1', '14:16:00', '14:52:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 14:53:00'),
(196, 22, 182, '2020-06-24', '', '1', '14:38:00', '15:06:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 15:06:49'),
(197, 15, 190, '2020-06-24', '', '1', '14:55:00', '15:01:00', NULL, NULL, '00:06:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 15:48:28'),
(198, 30, 189, '2020-06-24', '', '1', '15:10:00', '15:10:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 15:40:13'),
(199, 42, 194, '2020-06-24', '', '1', '15:48:00', '16:06:00', NULL, NULL, '00:18:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 16:06:51'),
(200, 39, 186, '2020-06-24', '', '1', '17:06:00', '17:06:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 17:13:10'),
(201, 13, 195, '2020-06-24', '', '1', '18:23:00', '18:23:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 18:23:25'),
(202, 18, 181, '2020-06-24', '', '1', '19:02:00', '19:02:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 19:02:54'),
(203, 29, 199, '2020-06-24', '', '1', '19:10:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-24', '0000-00-00 00:00:00'),
(204, 24, 197, '2020-06-24', '', '1', '19:10:00', '19:21:00', NULL, NULL, '00:11:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 19:21:55'),
(205, 24, 197, '2020-06-24', '', '1', '19:21:00', '19:22:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 19:22:05'),
(206, 11, 184, '2020-06-24', '', '1', '19:23:00', '19:23:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 19:23:22'),
(207, 11, 184, '2020-06-24', '', '1', '19:23:00', '19:23:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-24', '2020-06-24 19:23:29'),
(208, 67, 203, '2020-06-25', '', '1', '09:49:00', '11:59:00', NULL, NULL, '02:10:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 11:59:14'),
(209, 18, 207, '2020-06-25', '', '1', '13:03:00', '13:20:00', NULL, NULL, '00:17:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 13:50:25'),
(210, 39, 208, '2020-06-25', '', '1', '13:21:00', '13:21:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 13:49:59'),
(211, 41, 219, '2020-06-25', '', '1', '12:29:00', '13:24:00', NULL, NULL, '00:55:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 14:00:26'),
(212, 66, 201, '2020-06-25', '', '1', '13:25:00', '13:25:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 14:02:05'),
(213, 24, 216, '2020-06-25', '', '1', '13:44:00', '13:45:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 14:30:03'),
(214, 26, 210, '2020-06-25', '', '1', '13:52:00', '13:52:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 14:49:05'),
(215, 27, 213, '2020-06-25', '', '1', '13:55:00', '13:55:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 14:34:28'),
(216, 17, 209, '2020-06-25', '', '1', '14:08:00', '14:58:00', NULL, NULL, '00:50:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 14:58:30'),
(217, 22, 204, '2020-06-25', '', '1', '14:50:00', '15:25:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 15:25:20'),
(218, 15, 202, '2020-06-25', '', '1', '14:53:00', '14:54:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 15:32:00'),
(219, 48, 217, '2020-06-25', '', '1', '14:55:00', '15:40:00', NULL, NULL, '00:45:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 15:40:21'),
(220, 26, 210, '2020-06-25', '', '1', '14:49:00', '14:57:00', NULL, NULL, '00:08:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 14:59:03'),
(221, 41, 219, '2020-06-25', '', '1', '14:00:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-25', '0000-00-00 00:00:00'),
(222, 42, 218, '2020-06-25', '', '1', '15:10:00', '16:47:00', NULL, NULL, '01:37:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 16:47:26'),
(223, 67, 203, '2020-06-25', '', '1', '16:02:00', '18:53:00', NULL, NULL, '02:51:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 18:53:35'),
(224, 30, 212, '2020-06-25', '', '1', '16:56:00', '18:05:00', NULL, NULL, '01:09:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 18:08:14'),
(225, 39, 208, '2020-06-25', '', '1', '17:19:00', '17:21:00', NULL, NULL, '00:02:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 17:46:07'),
(226, 11, 211, '2020-06-25', '', '1', '18:57:00', '19:01:00', NULL, NULL, '00:04:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 19:01:30'),
(227, 11, 211, '2020-06-25', '', '1', '19:01:00', '19:01:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 19:01:36'),
(228, 30, 212, '2020-06-25', '', '1', '18:08:00', '19:03:00', NULL, NULL, '00:55:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 19:03:15'),
(229, 24, 216, '2020-06-25', '', '1', '19:10:00', '19:11:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 19:11:11'),
(230, 39, 208, '2020-06-25', '', '1', '21:55:00', '21:55:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-25', '2020-06-25 21:55:48'),
(231, 66, 223, '2020-06-26', '', '1', '13:03:00', '13:04:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 13:58:36'),
(232, 18, 225, '2020-06-26', '', '1', '12:46:00', '13:09:00', NULL, NULL, '00:23:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 13:45:42'),
(233, 39, 237, '2020-06-26', '', '1', '13:10:00', '13:51:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 13:52:02'),
(234, 27, 226, '2020-06-26', '', '1', '13:40:00', '13:41:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 14:24:55'),
(235, 41, 235, '2020-06-26', '', '1', '13:59:00', '13:59:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 14:50:44'),
(236, 17, 229, '2020-06-26', '', '1', '14:02:00', '19:02:00', NULL, NULL, '05:00:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 19:07:40'),
(237, 26, 233, '2020-06-26', '', '1', '14:11:00', '14:11:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 15:05:28'),
(238, 42, 236, '2020-06-26', '', '1', '14:20:00', '14:55:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 14:55:06'),
(239, 22, 222, '2020-06-26', '', '1', '14:47:00', '14:49:00', NULL, NULL, '00:02:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 15:16:20'),
(240, 41, 235, '2020-06-26', '', '1', '14:50:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-26', '0000-00-00 00:00:00'),
(241, 15, 228, '2020-06-26', '', '1', '15:07:00', '15:09:00', NULL, NULL, '00:02:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 15:45:54'),
(242, 30, 231, '2020-06-26', '', '1', '15:10:00', '15:10:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 15:50:16'),
(243, 48, 224, '2020-06-26', '', '1', '15:25:00', '16:02:00', NULL, NULL, '00:37:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 16:02:16'),
(244, 39, 237, '2020-06-26', '', '1', '16:22:00', '17:31:00', NULL, NULL, '01:09:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 17:31:32'),
(245, 42, 236, '2020-06-26', '', '1', '17:53:00', '18:21:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 18:21:41'),
(246, 30, 231, '2020-06-26', '', '1', '18:19:00', '18:20:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 18:40:06'),
(247, 18, 225, '2020-06-26', '', '1', '19:03:00', '19:04:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 19:04:17'),
(248, 29, 238, '2020-06-26', '', '1', '19:05:00', '19:05:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 19:05:25'),
(249, 29, 238, '2020-06-26', '', '1', '19:05:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-26', '0000-00-00 00:00:00'),
(250, 27, 226, '2020-06-26', '', '1', '19:05:00', '19:06:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 19:06:15'),
(251, 39, 237, '2020-06-26', '', '1', '19:05:00', '19:06:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 19:07:02'),
(252, 11, 232, '2020-06-26', '', '1', '19:19:00', '19:19:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-26', '2020-06-26 19:19:20'),
(253, 39, 245, '2020-06-27', '', '1', '10:41:00', '10:41:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 10:41:00'),
(254, 39, 245, '2020-06-27', '', '1', '10:43:00', '10:43:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 10:43:25'),
(255, 39, 245, '2020-06-27', '', '1', '13:05:00', '13:55:00', NULL, NULL, '00:50:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 13:55:35'),
(256, 17, 247, '2020-06-27', '', '1', '13:31:00', '14:15:00', NULL, NULL, '00:44:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 14:15:08'),
(257, 18, 243, '2020-06-27', '', '1', '13:33:00', '14:04:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 14:04:16'),
(258, 26, 253, '2020-06-27', '', '1', '13:45:00', '14:24:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 14:24:31'),
(259, 41, 255, '2020-06-27', '', '1', '13:47:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(260, 27, 246, '2020-06-27', '', '1', '13:50:00', '14:39:00', NULL, NULL, '00:49:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 14:42:18'),
(261, 30, 250, '2020-06-27', '', '1', '14:40:00', '15:20:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 15:20:09'),
(262, 22, 240, '2020-06-27', '', '1', '14:48:00', '15:13:00', NULL, NULL, '00:25:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 15:13:56'),
(263, 48, 241, '2020-06-27', '', '1', '15:08:00', '15:24:00', NULL, NULL, '00:16:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 15:24:09'),
(264, 15, 244, '2020-06-27', '', '1', '15:09:00', '15:56:00', NULL, NULL, '00:47:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 15:56:10'),
(265, 66, 242, '2020-06-27', '', '1', '15:21:00', '15:41:00', NULL, NULL, '00:20:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 15:41:27'),
(266, 17, 247, '2020-06-27', '', '1', '16:00:00', '16:00:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 16:00:39'),
(267, 26, 253, '2020-06-27', '', '1', '16:08:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(268, 39, 245, '2020-06-27', '', '1', '16:11:00', '16:11:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 16:11:07'),
(269, 42, 256, '2020-06-27', '', '1', '16:18:00', '17:06:00', NULL, NULL, '00:48:00', NULL, 'N', 'Y', '2020-06-27', '2020-06-27 17:06:16'),
(270, 39, 265, '2020-06-29', '', '1', '13:22:00', '14:06:00', NULL, NULL, '00:44:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 14:06:57'),
(271, 66, 261, '2020-06-29', '', '1', '13:32:00', '14:00:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 14:00:06'),
(272, 17, 264, '2020-06-29', '', '1', '13:35:00', '14:13:00', NULL, NULL, '00:38:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 14:13:46'),
(273, 18, 263, '2020-06-29', '', '1', '13:47:00', '14:23:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 14:23:47'),
(274, 26, 270, '2020-06-29', '', '1', '13:55:00', '14:48:00', NULL, NULL, '00:53:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 14:48:57'),
(275, 27, 271, '2020-06-29', '', '1', '13:57:00', '14:40:00', NULL, NULL, '00:43:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 14:41:27'),
(276, 15, 260, '2020-06-29', '', '1', '14:32:00', '15:02:00', NULL, NULL, '00:30:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 15:02:28'),
(277, 41, 275, '2020-06-29', '', '1', '14:43:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-06-29', '0000-00-00 00:00:00'),
(278, 22, 262, '2020-06-29', '', '1', '14:44:00', '15:13:00', NULL, NULL, '00:29:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 15:13:17'),
(279, 48, 259, '2020-06-29', '', '1', '14:47:00', '15:13:00', NULL, NULL, '00:26:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 15:13:16'),
(280, 42, 274, '2020-06-29', '', '1', '15:01:00', '16:39:00', NULL, NULL, '01:38:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 16:39:58'),
(281, 30, 269, '2020-06-29', '', '1', '15:12:00', '15:52:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 15:52:03'),
(282, 39, 265, '2020-06-29', '', '1', '17:06:00', '17:24:00', NULL, NULL, '00:18:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 17:24:46'),
(283, 30, 269, '2020-06-29', '', '1', '18:10:00', '18:30:00', NULL, NULL, '00:20:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 18:30:06'),
(284, 39, 265, '2020-06-29', '', '1', '18:51:00', '18:52:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 18:52:58'),
(285, 17, 264, '2020-06-29', '', '1', '19:01:00', '19:01:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 19:01:19'),
(286, 42, 274, '2020-06-29', '', '1', '19:08:00', '19:08:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 19:08:45'),
(287, 32, 268, '2020-06-29', '', '1', '19:41:00', '19:41:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 19:41:38'),
(288, 32, 268, '2020-06-29', '', '1', '19:41:00', '20:06:00', NULL, NULL, '00:25:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 20:06:50'),
(289, 32, 268, '2020-06-29', '', '1', '20:06:00', '20:06:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-29', '2020-06-29 20:06:58'),
(290, 66, 278, '2020-06-30', '', '1', '12:56:00', '13:48:00', NULL, NULL, '00:52:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 13:48:46'),
(291, 39, 286, '2020-06-30', '', '1', '13:09:00', '13:48:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 13:48:22'),
(292, 18, 283, '2020-06-30', '', '1', '13:10:00', '19:15:00', NULL, NULL, '06:05:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 19:15:31'),
(293, 17, 282, '2020-06-30', '', '1', '14:20:00', '14:58:00', NULL, NULL, '00:38:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 14:58:01'),
(294, 26, 289, '2020-06-30', '', '1', '14:42:00', '15:44:00', NULL, NULL, '01:02:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 15:44:50'),
(295, 15, 277, '2020-06-30', '', '1', '14:50:00', '15:25:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 15:25:32'),
(296, 22, 281, '2020-06-30', '', '1', '14:55:00', '15:19:00', NULL, NULL, '00:24:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 15:18:59'),
(297, 48, 279, '2020-06-30', '', '1', '15:01:00', '15:53:00', NULL, NULL, '00:52:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 15:53:29'),
(298, 42, 291, '2020-06-30', '', '1', '15:04:00', '15:34:00', NULL, NULL, '00:30:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 15:34:54'),
(299, 30, 287, '2020-06-30', '', '1', '15:10:00', '15:50:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 15:50:51'),
(300, 39, 286, '2020-06-30', '', '1', '17:18:00', '17:26:00', NULL, NULL, '00:08:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 17:26:52'),
(301, 42, 291, '2020-06-30', '', '1', '18:05:00', '18:44:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 18:44:22'),
(302, 22, 281, '2020-06-30', '', '1', '18:06:00', '18:38:00', NULL, NULL, '00:32:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 18:38:15'),
(303, 30, 287, '2020-06-30', '', '1', '18:10:00', '18:30:00', NULL, NULL, '00:20:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 18:30:05'),
(304, 67, 285, '2020-06-30', '', '1', '18:38:00', '19:06:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 19:06:51'),
(305, 27, 280, '2020-06-30', '', '1', '19:02:00', '19:02:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 19:03:23'),
(306, 39, 286, '2020-06-30', '', '1', '19:09:00', '19:09:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 19:09:09'),
(307, 15, 277, '2020-06-30', '', '1', '19:19:00', '19:19:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-06-30', '2020-06-30 19:19:34'),
(309, 39, 301, '2020-07-01', '', '1', '13:24:00', '13:51:00', NULL, NULL, '00:27:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 13:51:46'),
(310, 18, 296, '2020-07-01', '', '1', '13:30:00', '14:10:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 14:10:50'),
(311, 26, 307, '2020-07-01', '', '1', '13:31:00', '14:17:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 14:17:54'),
(312, 17, 298, '2020-07-01', '', '1', '13:53:00', '14:47:00', NULL, NULL, '00:54:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 14:47:42'),
(313, 27, 299, '2020-07-01', '', '1', '14:01:00', '14:29:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 14:29:41'),
(314, 66, 295, '2020-07-01', '', '1', '14:07:00', '14:32:00', NULL, NULL, '00:25:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 14:32:06'),
(315, 22, 300, '2020-07-01', '', '1', '14:52:00', '15:21:00', NULL, NULL, '00:29:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 15:21:48'),
(316, 48, 294, '2020-07-01', '', '1', '15:03:00', '15:38:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 15:38:29'),
(317, 30, 304, '2020-07-01', '', '1', '15:10:00', '15:50:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 15:50:13'),
(318, 42, 308, '2020-07-01', '', '1', '15:23:00', '16:07:00', NULL, NULL, '00:44:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 16:07:24'),
(319, 67, 305, '2020-07-01', '', '1', '16:45:00', '17:58:00', NULL, NULL, '01:13:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 17:58:40'),
(320, 39, 301, '2020-07-01', '', '1', '17:46:00', '18:01:00', NULL, NULL, '00:15:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 18:01:37'),
(321, 30, 304, '2020-07-01', '', '1', '18:10:00', '18:30:00', NULL, NULL, '00:20:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 18:30:31'),
(322, 67, 305, '2020-07-01', '', '1', '19:12:00', '19:12:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-01', '2020-07-01 19:12:15'),
(324, 66, 311, '2020-07-02', '', '1', '12:49:00', '13:17:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 13:17:18'),
(325, 39, 315, '2020-07-02', '', '1', '13:12:00', '13:43:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 13:43:56'),
(326, 17, 318, '2020-07-02', '', '1', '13:36:00', '14:27:00', NULL, NULL, '00:51:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 14:27:01'),
(327, 18, 312, '2020-07-02', '', '1', '13:53:00', '14:29:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 14:29:13'),
(328, 66, 311, '2020-07-02', '', '1', '13:57:00', '14:26:00', NULL, NULL, '00:29:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 14:26:52'),
(329, 27, 314, '2020-07-02', '', '1', '15:03:00', '15:03:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 15:04:09'),
(330, 22, 313, '2020-07-02', '', '1', '15:06:00', '15:35:00', NULL, NULL, '00:29:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 15:35:11'),
(331, 48, 316, '2020-07-02', '', '1', '15:08:00', '15:43:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 15:44:00'),
(332, 30, 319, '2020-07-02', '', '1', '15:20:00', '16:00:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 16:00:14'),
(333, 15, 321, '2020-07-02', '', '1', '15:45:00', '16:18:00', NULL, NULL, '00:33:00', NULL, 'N', 'Y', '2020-07-02', '2020-07-02 16:18:36'),
(334, 27, 314, '2020-07-02', '', '1', '19:08:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-02', '0000-00-00 00:00:00'),
(335, 66, 330, '2020-07-03', '', '1', '12:36:00', '13:02:00', NULL, NULL, '00:26:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 13:02:36'),
(336, 39, 333, '2020-07-03', '', '1', '12:52:00', '13:31:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 13:31:57'),
(337, 18, 332, '2020-07-03', '', '1', '13:32:00', '14:03:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 14:04:03'),
(338, 27, 327, '2020-07-03', '', '1', '13:37:00', '14:05:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 14:06:04'),
(339, 17, 335, '2020-07-03', '', '1', '14:16:00', '15:02:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 15:02:01'),
(340, 22, 328, '2020-07-03', '', '1', '14:37:00', '15:03:00', NULL, NULL, '00:26:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 15:03:41'),
(341, 48, 331, '2020-07-03', '', '1', '14:39:00', '15:26:00', NULL, NULL, '00:47:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 15:26:38'),
(342, 15, 334, '2020-07-03', '', '1', '14:51:00', '15:29:00', NULL, NULL, '00:38:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 15:29:45'),
(343, 22, 328, '2020-07-03', '', '1', '15:04:00', '15:04:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 15:04:49'),
(344, 30, 336, '2020-07-03', '', '1', '15:20:00', '15:59:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 15:59:49'),
(345, 42, 339, '2020-07-03', '', '1', '15:25:00', '16:12:00', NULL, NULL, '00:47:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 16:12:43'),
(346, 39, 333, '2020-07-03', '', '1', '17:01:00', '17:25:00', NULL, NULL, '00:24:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 17:25:37'),
(347, 18, 332, '2020-07-03', '', '1', '19:02:00', '19:02:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 19:03:03'),
(348, 32, 338, '2020-07-03', '', '1', '19:07:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-03', '0000-00-00 00:00:00'),
(349, 17, 335, '2020-07-03', '', '1', '19:13:00', '19:15:00', NULL, NULL, '00:02:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 19:15:46'),
(350, 11, 329, '2020-07-03', '', '1', '19:35:00', '19:35:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-03', '2020-07-03 19:35:35'),
(351, 32, 341, '2020-07-04', '', '1', '10:07:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-04', '0000-00-00 00:00:00'),
(352, 17, 342, '2020-07-06', '', '1', '10:53:00', '11:05:00', NULL, NULL, '00:12:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 11:05:35'),
(353, 39, 348, '2020-07-06', '', '1', '13:05:00', '13:41:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 13:42:23'),
(354, 17, 342, '2020-07-06', '', '1', '13:54:00', '14:31:00', NULL, NULL, '00:37:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 14:31:44'),
(355, 18, 346, '2020-07-06', '', '1', '14:05:00', '19:12:00', NULL, NULL, '05:07:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 19:12:12'),
(356, 26, 350, '2020-07-06', '', '1', '14:19:00', '15:10:00', NULL, NULL, '00:51:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 15:10:51'),
(357, 48, 345, '2020-07-06', '', '1', '14:56:00', '15:36:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 15:36:22'),
(358, 42, 355, '2020-07-06', '', '1', '15:06:00', '15:40:00', NULL, NULL, '00:34:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 15:40:48'),
(359, 30, 349, '2020-07-06', '', '1', '15:10:00', '15:50:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 15:50:08'),
(360, 27, 353, '2020-07-06', '', '1', '15:18:00', '15:18:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 15:19:03'),
(361, 15, 343, '2020-07-06', '', '1', '15:21:00', '15:51:00', NULL, NULL, '00:30:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 15:51:16'),
(362, 39, 348, '2020-07-06', '', '1', '17:10:00', '17:15:00', NULL, NULL, '00:05:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 17:16:21'),
(363, 22, 347, '2020-07-06', '', '1', '19:08:00', '19:09:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 19:09:17'),
(364, 27, 353, '2020-07-06', '', '1', '19:09:00', '19:09:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 19:10:20'),
(365, 32, 354, '2020-07-06', '', '1', '19:14:00', '19:15:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 19:15:05'),
(366, 20, 352, '2020-07-06', '', '1', '19:15:00', '19:15:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 19:15:17'),
(367, 39, 348, '2020-07-06', '', '1', '19:26:00', '19:27:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-07-06', '2020-07-06 19:27:39');
INSERT INTO `hr_attendance_break_time` (`id`, `employee_id`, `attendance_id`, `date`, `type`, `flag`, `entry_time`, `out_time`, `day_type`, `late_type`, `total_hour`, `overTime`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(368, 18, 365, '2020-07-07', '', '1', '09:59:00', '09:59:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 09:59:21'),
(369, 66, 357, '2020-07-07', '', '1', '11:59:00', '12:25:00', NULL, NULL, '00:26:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 12:25:49'),
(370, 39, 362, '2020-07-07', '', '1', '13:14:00', '13:54:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 13:54:24'),
(371, 17, 361, '2020-07-07', '', '1', '13:46:00', '14:29:00', NULL, NULL, '00:43:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 14:29:21'),
(372, 27, 363, '2020-07-07', '', '1', '13:56:00', '14:36:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 14:36:43'),
(373, 26, 367, '2020-07-07', '', '1', '14:08:00', '15:03:00', NULL, NULL, '00:55:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 15:03:51'),
(374, 15, 366, '2020-07-07', '', '1', '14:18:00', '14:55:00', NULL, NULL, '00:37:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 14:55:48'),
(375, 18, 365, '2020-07-07', '', '1', '14:21:00', '14:51:00', NULL, NULL, '00:30:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 14:51:09'),
(376, 42, 370, '2020-07-07', '', '1', '14:39:00', '18:41:00', NULL, NULL, '04:02:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 18:41:45'),
(377, 48, 364, '2020-07-07', '', '1', '14:56:00', '15:31:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 15:31:30'),
(378, 30, 368, '2020-07-07', '', '1', '15:10:00', '15:52:00', NULL, NULL, '00:42:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 15:52:41'),
(379, 22, 359, '2020-07-07', '', '1', '15:36:00', '16:03:00', NULL, NULL, '00:27:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 16:03:23'),
(380, 39, 362, '2020-07-07', '', '1', '17:29:00', '17:39:00', NULL, NULL, '00:10:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 17:40:04'),
(381, 15, 366, '2020-07-07', '', '1', '19:11:00', '19:11:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 19:11:00'),
(382, 11, 358, '2020-07-07', '', '1', '19:50:00', '19:50:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-07', '2020-07-07 19:51:01'),
(383, 39, 378, '2020-07-08', '', '1', '13:10:00', '13:45:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 13:45:51'),
(384, 17, 375, '2020-07-08', '', '1', '13:35:00', '14:18:00', NULL, NULL, '00:43:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 14:18:50'),
(385, 27, 380, '2020-07-08', '', '1', '13:57:00', '14:38:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 14:38:52'),
(386, 39, 378, '2020-07-08', '', '1', '14:08:00', '14:08:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 14:08:53'),
(387, 15, 373, '2020-07-08', '', '1', '14:10:00', '14:44:00', NULL, NULL, '00:34:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 14:44:17'),
(388, 18, 372, '2020-07-08', '', '1', '14:17:00', '14:41:00', NULL, NULL, '00:24:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 14:41:33'),
(389, 39, 378, '2020-07-08', '', '1', '14:18:00', '14:18:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 14:18:40'),
(390, 22, 376, '2020-07-08', '', '1', '14:32:00', '15:08:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 15:08:05'),
(391, 66, 371, '2020-07-08', '', '1', '14:33:00', '15:01:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 15:01:32'),
(392, 48, 374, '2020-07-08', '', '1', '15:00:00', '15:40:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 15:41:00'),
(393, 30, 379, '2020-07-08', '', '1', '15:10:00', '15:50:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 15:50:12'),
(394, 42, 384, '2020-07-08', '', '1', '15:16:00', '16:17:00', NULL, NULL, '01:01:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 16:17:44'),
(395, 67, 382, '2020-07-08', '', '1', '15:30:00', '16:10:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 16:10:15'),
(396, 39, 378, '2020-07-08', '', '1', '17:11:00', '17:31:00', NULL, NULL, '00:20:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 17:31:18'),
(397, 48, 374, '2020-07-08', '', '1', '19:00:00', '19:00:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 19:00:24'),
(398, 67, 382, '2020-07-08', '', '1', '19:08:00', '19:08:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-08', '2020-07-08 19:08:50'),
(399, 39, 390, '2020-07-09', '', '1', '09:56:00', '09:58:00', NULL, NULL, '00:02:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 09:58:39'),
(400, 66, 387, '2020-07-09', '', '1', '12:39:00', '13:04:00', NULL, NULL, '00:25:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 13:04:46'),
(401, 39, 390, '2020-07-09', '', '1', '13:18:00', '13:59:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 13:59:14'),
(402, 18, 396, '2020-07-09', '', '1', '13:46:00', '14:16:00', NULL, NULL, '00:30:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 14:16:40'),
(403, 42, 399, '2020-07-09', '', '1', '13:47:00', '15:26:00', NULL, NULL, '01:39:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 15:26:48'),
(404, 27, 393, '2020-07-09', '', '1', '13:53:00', '14:32:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 14:33:17'),
(405, 66, 387, '2020-07-09', '', '1', '14:07:00', '14:30:00', NULL, NULL, '00:23:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 14:30:55'),
(406, 17, 391, '2020-07-09', '', '1', '14:48:00', '15:34:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 15:34:15'),
(407, 48, 386, '2020-07-09', '', '1', '14:50:00', '19:03:00', NULL, NULL, '04:13:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 19:03:10'),
(408, 22, 388, '2020-07-09', '', '1', '15:09:00', '19:49:00', NULL, NULL, '04:40:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 19:49:12'),
(409, 30, 394, '2020-07-09', '', '1', '15:10:00', '15:50:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 15:50:11'),
(410, 26, 395, '2020-07-09', '', '1', '15:11:00', '15:47:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 15:47:06'),
(411, 15, 389, '2020-07-09', '', '1', '15:20:00', '16:02:00', NULL, NULL, '00:42:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 16:02:28'),
(412, 67, 397, '2020-07-09', '', '1', '15:32:00', '19:05:00', NULL, NULL, '03:33:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 19:05:06'),
(413, 39, 390, '2020-07-09', '', '1', '17:07:00', '17:22:00', NULL, NULL, '00:15:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 17:23:19'),
(414, 27, 393, '2020-07-09', '', '1', '19:10:00', '19:10:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 19:10:54'),
(415, 22, 388, '2020-07-09', '', '1', '19:49:00', '19:49:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 19:49:35'),
(416, 11, 392, '2020-07-09', '', '1', '20:39:00', '20:39:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-09', '2020-07-09 20:40:00'),
(417, 39, 404, '2020-07-10', '', '1', '10:35:00', '12:24:00', NULL, NULL, '01:49:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 12:24:13'),
(418, 17, 410, '2020-07-10', '', '1', '13:46:00', '14:26:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 14:26:27'),
(419, 27, 406, '2020-07-10', '', '1', '13:47:00', '14:18:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 14:18:39'),
(420, 18, 403, '2020-07-10', '', '1', '13:55:00', '14:26:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 14:26:25'),
(421, 22, 405, '2020-07-10', '', '1', '14:09:00', '19:10:00', NULL, NULL, '05:01:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 19:10:51'),
(422, 15, 413, '2020-07-10', '', '1', '14:23:00', '15:02:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 15:02:35'),
(423, 42, 415, '2020-07-10', '', '1', '14:25:00', '15:17:00', NULL, NULL, '00:52:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 15:17:33'),
(424, 26, 409, '2020-07-10', '', '1', '14:28:00', '15:17:00', NULL, NULL, '00:49:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 15:17:50'),
(425, 48, 402, '2020-07-10', '', '1', '14:55:00', '15:13:00', NULL, NULL, '00:18:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 15:13:17'),
(426, 30, 408, '2020-07-10', '', '1', '15:10:00', '15:51:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 15:51:12'),
(427, 39, 404, '2020-07-10', '', '1', '17:20:00', '17:45:00', NULL, NULL, '00:25:00', NULL, 'N', 'Y', '2020-07-10', '2020-07-10 17:45:38'),
(428, 26, 409, '2020-07-10', '', '1', '19:04:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-10', '0000-00-00 00:00:00'),
(429, 66, 416, '2020-07-11', '', '1', '12:13:00', '12:30:00', NULL, NULL, '00:17:00', NULL, 'N', 'Y', '2020-07-11', '2020-07-11 12:30:31'),
(430, 39, 422, '2020-07-11', '', '1', '12:42:00', '13:10:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-11', '2020-07-11 13:11:02'),
(431, 27, 424, '2020-07-11', '', '1', '13:40:00', '14:14:00', NULL, NULL, '00:34:00', NULL, 'N', 'Y', '2020-07-11', '2020-07-11 14:15:25'),
(432, 17, 420, '2020-07-11', '', '1', '13:49:00', '14:36:00', NULL, NULL, '00:47:00', NULL, 'N', 'Y', '2020-07-11', '2020-07-11 14:35:59'),
(433, 15, 417, '2020-07-11', '', '1', '14:19:00', '14:53:00', NULL, NULL, '00:34:00', NULL, 'N', 'Y', '2020-07-11', '2020-07-11 14:53:35'),
(434, 26, 426, '2020-07-11', '', '1', '14:29:00', '15:17:00', NULL, NULL, '00:48:00', NULL, 'N', 'Y', '2020-07-11', '2020-07-11 15:17:35'),
(435, 67, 421, '2020-07-11', '', '1', '14:30:00', '15:14:00', NULL, NULL, '00:44:00', NULL, 'N', 'Y', '2020-07-11', '2020-07-11 15:14:11'),
(436, 48, 423, '2020-07-11', '', '1', '14:45:00', '15:11:00', NULL, NULL, '00:26:00', NULL, 'N', 'Y', '2020-07-11', '2020-07-11 15:11:45'),
(437, 30, 425, '2020-07-11', '', '1', '15:01:00', '16:00:00', NULL, NULL, '00:59:00', NULL, 'N', 'Y', '2020-07-11', '2020-07-11 16:00:15'),
(438, 67, 421, '2020-07-11', '', '1', '16:42:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-11', '0000-00-00 00:00:00'),
(439, 66, 430, '2020-07-13', '', '1', '12:56:00', '13:31:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 13:31:02'),
(440, 39, 437, '2020-07-13', '', '1', '13:12:00', '13:39:00', NULL, NULL, '00:27:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 13:39:25'),
(441, 17, 438, '2020-07-13', '', '1', '13:37:00', '14:23:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 14:23:54'),
(442, 18, 434, '2020-07-13', '', '1', '13:44:00', '14:14:00', NULL, NULL, '00:30:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 14:14:50'),
(443, 27, 436, '2020-07-13', '', '1', '14:01:00', '14:40:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 14:40:39'),
(444, 26, 442, '2020-07-13', '', '1', '14:11:00', '14:57:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 14:57:43'),
(445, 15, 432, '2020-07-13', '', '1', '14:40:00', '15:16:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 15:16:01'),
(446, 48, 431, '2020-07-13', '', '1', '15:04:00', '15:47:00', NULL, NULL, '00:43:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 15:47:29'),
(447, 30, 440, '2020-07-13', '', '1', '15:20:00', '16:02:00', NULL, NULL, '00:42:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 16:02:04'),
(448, 42, 444, '2020-07-13', '', '1', '15:24:00', '16:29:00', NULL, NULL, '01:05:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 16:29:06'),
(449, 67, 433, '2020-07-13', '', '1', '15:35:00', '16:09:00', NULL, NULL, '00:34:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 16:09:56'),
(450, 22, 435, '2020-07-13', '', '1', '15:37:00', '16:12:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 16:12:16'),
(451, 39, 437, '2020-07-13', '', '1', '17:11:00', '17:34:00', NULL, NULL, '00:23:00', NULL, 'N', 'Y', '2020-07-13', '2020-07-13 17:34:21'),
(452, 26, 442, '2020-07-13', '', '1', '19:25:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-13', '0000-00-00 00:00:00'),
(453, 39, 454, '2020-07-14', '', '1', '13:01:00', '13:40:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 13:40:49'),
(454, 18, 452, '2020-07-14', '', '1', '13:29:00', '14:09:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 14:10:04'),
(455, 42, 459, '2020-07-14', '', '1', '13:32:00', '14:07:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 14:07:46'),
(456, 27, 453, '2020-07-14', '', '1', '13:36:00', '14:12:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 14:12:59'),
(457, 26, 455, '2020-07-14', '', '1', '13:52:00', '14:42:00', NULL, NULL, '00:50:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 14:42:29'),
(458, 15, 446, '2020-07-14', '', '1', '14:34:00', '15:02:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 15:02:39'),
(459, 48, 450, '2020-07-14', '', '1', '14:39:00', '15:02:00', NULL, NULL, '00:23:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 15:02:58'),
(460, 17, 451, '2020-07-14', '', '1', '15:02:00', '15:34:00', NULL, NULL, '00:32:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 15:34:36'),
(461, 66, 447, '2020-07-14', '', '1', '15:03:00', '15:35:00', NULL, NULL, '00:32:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 15:35:10'),
(462, 30, 458, '2020-07-14', '', '1', '15:24:00', '16:00:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 16:00:13'),
(463, 67, 456, '2020-07-14', '', '1', '15:35:00', '16:10:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 16:10:13'),
(464, 39, 454, '2020-07-14', '', '1', '17:13:00', '17:31:00', NULL, NULL, '00:18:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 17:31:16'),
(465, 42, 459, '2020-07-14', '', '1', '18:04:00', '18:54:00', NULL, NULL, '00:50:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 18:54:19'),
(466, 67, 456, '2020-07-14', '', '1', '18:10:00', '18:10:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 18:10:23'),
(467, 66, 447, '2020-07-14', '', '1', '18:12:00', '18:25:00', NULL, NULL, '00:13:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 18:25:15'),
(468, 67, 456, '2020-07-14', '', '1', '18:29:00', '18:29:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 18:29:24'),
(469, 27, 453, '2020-07-14', '', '1', '19:02:00', '19:02:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 19:03:25'),
(470, 42, 459, '2020-07-14', '', '1', '19:27:00', '21:44:00', NULL, NULL, '02:17:00', NULL, 'N', 'Y', '2020-07-14', '2020-07-14 21:44:31'),
(471, 26, 455, '2020-07-14', '', '1', '19:31:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-14', '0000-00-00 00:00:00'),
(472, 66, 463, '2020-07-15', '', '1', '12:32:00', '12:49:00', NULL, NULL, '00:17:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 12:49:03'),
(473, 39, 467, '2020-07-15', '', '1', '13:11:00', '13:47:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 13:47:28'),
(474, 26, 470, '2020-07-15', '', '1', '13:30:00', '14:16:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 14:16:26'),
(475, 18, 465, '2020-07-15', '', '1', '13:38:00', '14:06:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 14:06:41'),
(476, 27, 464, '2020-07-15', '', '1', '14:10:00', '14:46:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 14:46:37'),
(477, 17, 468, '2020-07-15', '', '1', '14:13:00', '14:57:00', NULL, NULL, '00:44:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 14:57:18'),
(478, 48, 462, '2020-07-15', '', '1', '14:30:00', '14:55:00', NULL, NULL, '00:25:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 14:55:16'),
(479, 15, 461, '2020-07-15', '', '1', '14:30:00', '14:59:00', NULL, NULL, '00:29:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 14:59:31'),
(480, 42, 472, '2020-07-15', '', '1', '14:39:00', '15:38:00', NULL, NULL, '00:59:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 15:38:25'),
(481, 30, 469, '2020-07-15', '', '1', '15:10:00', '15:40:00', NULL, NULL, '00:30:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 15:40:40'),
(482, 22, 466, '2020-07-15', '', '1', '15:14:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-15', '0000-00-00 00:00:00'),
(483, 67, 473, '2020-07-15', '', '1', '15:40:00', '16:16:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 16:16:15'),
(484, 39, 467, '2020-07-15', '', '1', '16:53:00', '17:13:00', NULL, NULL, '00:20:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 17:13:21'),
(485, 67, 473, '2020-07-15', '', '1', '18:10:00', '18:28:00', NULL, NULL, '00:18:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 18:29:02'),
(486, 20, 471, '2020-07-15', '', '1', '19:30:00', '19:30:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-15', '2020-07-15 19:30:33'),
(487, 39, 478, '2020-07-16', '', '1', '13:20:00', '13:52:00', NULL, NULL, '00:32:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 13:52:37'),
(488, 18, 481, '2020-07-16', '', '1', '13:31:00', '14:02:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 14:02:12'),
(489, 42, 489, '2020-07-16', '', '1', '13:43:00', '14:35:00', NULL, NULL, '00:52:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 14:35:12'),
(490, 26, 484, '2020-07-16', '', '1', '13:53:00', '14:46:00', NULL, NULL, '00:53:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 14:46:24'),
(491, 27, 479, '2020-07-16', '', '1', '14:00:00', '14:40:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 14:41:11'),
(492, 66, 477, '2020-07-16', '', '1', '14:07:00', '14:48:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 14:48:55'),
(493, 15, 475, '2020-07-16', '', '1', '14:07:00', '14:42:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 14:42:49'),
(494, 17, 482, '2020-07-16', '', '1', '14:22:00', '14:59:00', NULL, NULL, '00:37:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 14:59:21'),
(495, 22, 476, '2020-07-16', '', '1', '14:48:00', '15:19:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 15:19:55'),
(496, 48, 486, '2020-07-16', '', '1', '14:56:00', '15:25:00', NULL, NULL, '00:29:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 15:25:32'),
(497, 30, 487, '2020-07-16', '', '1', '15:10:00', '15:51:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 15:51:52'),
(498, 67, 480, '2020-07-16', '', '1', '15:36:00', '16:00:00', NULL, NULL, '00:24:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 16:00:41'),
(499, 39, 478, '2020-07-16', '', '1', '17:43:00', '18:10:00', NULL, NULL, '00:27:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 18:10:29'),
(500, 67, 480, '2020-07-16', '', '1', '18:28:00', '19:04:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 19:04:59'),
(501, 11, 483, '2020-07-16', '', '1', '22:43:00', '22:43:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-16', '2020-07-16 22:43:30'),
(502, 66, 491, '2020-07-17', '', '1', '13:11:00', '13:32:00', NULL, NULL, '00:21:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 13:32:41'),
(503, 39, 495, '2020-07-17', '', '1', '13:11:00', '13:51:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 13:51:22'),
(504, 17, 490, '2020-07-17', '', '1', '13:17:00', '14:03:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 14:03:28'),
(505, 18, 492, '2020-07-17', '', '1', '13:29:00', '14:01:00', NULL, NULL, '00:32:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 14:01:34'),
(506, 27, 501, '2020-07-17', '', '1', '14:00:00', '14:38:00', NULL, NULL, '00:38:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 14:39:27'),
(507, 42, 502, '2020-07-17', '', '1', '14:19:00', '19:40:00', NULL, NULL, '05:21:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 19:40:51'),
(508, 26, 499, '2020-07-17', '', '1', '14:20:00', '14:55:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 14:55:30'),
(509, 15, 493, '2020-07-17', '', '1', '14:29:00', '15:08:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 15:08:36'),
(510, 48, 494, '2020-07-17', '', '1', '14:52:00', '15:20:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 15:20:42'),
(511, 30, 500, '2020-07-17', '', '1', '15:10:00', '15:50:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 15:50:24'),
(512, 22, 497, '2020-07-17', '', '1', '15:36:00', '16:04:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 16:04:28'),
(513, 39, 495, '2020-07-17', '', '1', '17:09:00', '17:20:00', NULL, NULL, '00:11:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 17:20:25'),
(514, 66, 491, '2020-07-17', '', '1', '19:34:00', '19:34:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-17', '2020-07-17 19:34:55'),
(515, 66, 508, '2020-07-20', '', '1', '12:58:00', '13:16:00', NULL, NULL, '00:18:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 13:16:02'),
(516, 18, 510, '2020-07-20', '', '1', '13:22:00', '13:53:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 13:53:25'),
(517, 17, 511, '2020-07-20', '', '1', '13:30:00', '14:13:00', NULL, NULL, '00:43:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 14:13:16'),
(518, 39, 506, '2020-07-20', '', '1', '13:51:00', '14:34:00', NULL, NULL, '00:43:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 14:34:35'),
(519, 27, 505, '2020-07-20', '', '1', '14:02:00', '14:45:00', NULL, NULL, '00:43:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 14:46:03'),
(520, 26, 512, '2020-07-20', '', '1', '14:03:00', '14:51:00', NULL, NULL, '00:48:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 14:51:10'),
(521, 22, 507, '2020-07-20', '', '1', '15:05:00', '15:36:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 15:36:16'),
(522, 48, 509, '2020-07-20', '', '1', '15:05:00', '15:47:00', NULL, NULL, '00:42:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 15:47:43'),
(523, 15, 504, '2020-07-20', '', '1', '15:18:00', '16:03:00', NULL, NULL, '00:45:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 16:03:46'),
(524, 30, 513, '2020-07-20', '', '1', '15:19:00', '16:00:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 16:00:48'),
(525, 42, 516, '2020-07-20', '', '1', '15:35:00', '16:02:00', NULL, NULL, '00:27:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 16:02:55'),
(526, 67, 518, '2020-07-20', '', '1', '15:46:00', '16:15:00', NULL, NULL, '00:29:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 16:16:03'),
(527, 39, 506, '2020-07-20', '', '1', '16:44:00', '17:01:00', NULL, NULL, '00:17:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 17:01:09'),
(528, 30, 513, '2020-07-20', '', '1', '19:04:00', '19:04:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-20', '2020-07-20 19:04:20'),
(529, 27, 505, '2020-07-20', '', '1', '19:17:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-20', '0000-00-00 00:00:00'),
(530, 39, 524, '2020-07-21', '', '1', '13:02:00', '13:05:00', NULL, NULL, '00:03:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 13:04:53'),
(531, 66, 519, '2020-07-21', '', '1', '13:22:00', '13:50:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 13:50:10'),
(532, 39, 524, '2020-07-21', '', '1', '13:26:00', '14:00:00', NULL, NULL, '00:34:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 14:00:16'),
(533, 18, 523, '2020-07-21', '', '1', '13:28:00', '13:46:00', NULL, NULL, '00:18:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 13:46:59'),
(534, 27, 522, '2020-07-21', '', '1', '13:35:00', '14:17:00', NULL, NULL, '00:42:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 14:18:19'),
(535, 17, 525, '2020-07-21', '', '1', '13:55:00', '14:36:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 14:36:12'),
(536, 26, 530, '2020-07-21', '', '1', '14:06:00', '14:55:00', NULL, NULL, '00:49:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 14:55:33'),
(537, 48, 526, '2020-07-21', '', '1', '14:39:00', '15:12:00', NULL, NULL, '00:33:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 15:12:20'),
(538, 15, 520, '2020-07-21', '', '1', '14:55:00', '15:42:00', NULL, NULL, '00:47:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 15:42:53'),
(539, 22, 521, '2020-07-21', '', '1', '15:00:00', '15:31:00', NULL, NULL, '00:31:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 15:31:10'),
(540, 42, 531, '2020-07-21', '', '1', '15:12:00', '16:21:00', NULL, NULL, '01:09:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 16:21:04'),
(541, 30, 527, '2020-07-21', '', '1', '15:13:00', '15:50:00', NULL, NULL, '00:37:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 15:50:07'),
(542, 67, 529, '2020-07-21', '', '1', '15:16:00', '16:00:00', NULL, NULL, '00:44:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 16:00:47'),
(543, 39, 524, '2020-07-21', '', '1', '17:09:00', '17:41:00', NULL, NULL, '00:32:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 17:40:54'),
(544, 22, 521, '2020-07-21', '', '1', '19:25:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-21', '0000-00-00 00:00:00'),
(545, 11, 533, '2020-07-21', '', '1', '21:12:00', '21:12:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-21', '2020-07-21 21:12:38'),
(546, 39, 541, '2020-07-22', '', '1', '13:25:00', '14:00:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 14:01:00'),
(547, 66, 540, '2020-07-22', '', '1', '13:31:00', '14:17:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 14:18:00'),
(548, 18, 539, '2020-07-22', '', '1', '14:02:00', '14:32:00', NULL, NULL, '00:30:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 14:32:18'),
(549, 27, 536, '2020-07-22', '', '1', '14:15:00', '14:49:00', NULL, NULL, '00:34:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 14:50:25'),
(550, 26, 543, '2020-07-22', '', '1', '14:17:00', '15:02:00', NULL, NULL, '00:45:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 15:02:35'),
(551, 17, 538, '2020-07-22', '', '1', '14:26:00', '15:05:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 15:05:42'),
(552, 22, 547, '2020-07-22', '', '1', '15:06:00', '15:34:00', NULL, NULL, '00:28:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 15:34:38'),
(553, 48, 535, '2020-07-22', '', '1', '15:08:00', '15:51:00', NULL, NULL, '00:43:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 15:51:13'),
(554, 15, 534, '2020-07-22', '', '1', '15:11:00', '15:50:00', NULL, NULL, '00:39:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 15:50:58'),
(555, 30, 542, '2020-07-22', '', '1', '15:12:00', '15:50:00', NULL, NULL, '00:38:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 15:50:07'),
(556, 67, 537, '2020-07-22', '', '1', '15:31:00', '16:17:00', NULL, NULL, '00:46:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 16:17:14'),
(557, 42, 546, '2020-07-22', '', '1', '15:34:00', '17:56:00', NULL, NULL, '02:22:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 17:56:41'),
(558, 39, 541, '2020-07-22', '', '1', '17:11:00', '17:35:00', NULL, NULL, '00:24:00', NULL, 'N', 'Y', '2020-07-22', '2020-07-22 17:35:45'),
(559, 17, 538, '2020-07-22', '', '1', '19:01:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-22', '0000-00-00 00:00:00'),
(560, 66, 550, '2020-07-23', '', '1', '13:08:00', '13:33:00', NULL, NULL, '00:25:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 13:33:06'),
(561, 39, 555, '2020-07-23', '', '1', '13:09:00', '13:45:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 13:45:03'),
(562, 18, 551, '2020-07-23', '', '1', '13:37:00', '14:07:00', NULL, NULL, '00:30:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 14:07:14'),
(563, 27, 552, '2020-07-23', '', '1', '13:38:00', '14:13:00', NULL, NULL, '00:35:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 14:14:37'),
(564, 17, 556, '2020-07-23', '', '1', '13:57:00', '14:35:00', NULL, NULL, '00:38:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 14:35:54'),
(565, 26, 557, '2020-07-23', '', '1', '14:05:00', '14:06:00', NULL, NULL, '00:01:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 14:06:12'),
(566, 26, 557, '2020-07-23', '', '1', '14:06:00', '14:53:00', NULL, NULL, '00:47:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 14:53:25'),
(567, 15, 548, '2020-07-23', '', '1', '14:44:00', '15:24:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 15:24:16'),
(568, 48, 549, '2020-07-23', '', '1', '14:49:00', '15:22:00', NULL, NULL, '00:33:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 15:22:58'),
(569, 30, 558, '2020-07-23', '', '1', '14:50:00', '15:30:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 15:30:06'),
(570, 42, 562, '2020-07-23', '', '1', '15:25:00', '16:34:00', NULL, NULL, '01:09:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 16:34:06'),
(571, 67, 553, '2020-07-23', '', '1', '15:35:00', '16:08:00', NULL, NULL, '00:33:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 16:08:41'),
(572, 39, 555, '2020-07-23', '', '1', '17:08:00', '17:20:00', NULL, NULL, '00:12:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 17:20:58'),
(573, 48, 549, '2020-07-23', '', '1', '19:00:00', NULL, NULL, NULL, NULL, NULL, 'N', 'Y', '2020-07-23', '0000-00-00 00:00:00'),
(574, 18, 551, '2020-07-23', '', '1', '19:05:00', '19:05:00', NULL, NULL, '00:00:00', NULL, 'N', 'Y', '2020-07-23', '2020-07-23 19:05:32'),
(575, 66, 566, '2020-07-24', '', '1', '12:49:00', '13:08:00', NULL, NULL, '00:19:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 13:09:03'),
(576, 39, 569, '2020-07-24', '', '1', '12:50:00', '13:33:00', NULL, NULL, '00:43:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 13:33:06'),
(577, 17, 570, '2020-07-24', '', '1', '13:20:00', '14:09:00', NULL, NULL, '00:49:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 14:09:32'),
(578, 18, 568, '2020-07-24', '', '1', '13:26:00', '14:02:00', NULL, NULL, '00:36:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 14:02:36'),
(579, 27, 565, '2020-07-24', '', '1', '13:33:00', '14:15:00', NULL, NULL, '00:42:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 14:16:22'),
(580, 15, 563, '2020-07-24', '', '1', '14:31:00', '15:12:00', NULL, NULL, '00:41:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 15:12:56'),
(581, 30, 571, '2020-07-24', '', '1', '14:50:00', '15:30:00', NULL, NULL, '00:40:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 15:30:45'),
(582, 42, 576, '2020-07-24', '', '1', '14:52:00', '16:15:00', NULL, NULL, '01:23:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 16:15:19'),
(583, 48, 564, '2020-07-24', '', '1', '15:13:00', '15:50:00', NULL, NULL, '00:37:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 15:50:49'),
(584, 22, 567, '2020-07-24', '', '1', '15:17:00', '15:46:00', NULL, NULL, '00:29:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 15:46:20'),
(585, 67, 577, '2020-07-24', '', '1', '15:31:00', '16:08:00', NULL, NULL, '00:37:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 16:08:39'),
(586, 39, 569, '2020-07-24', '', '1', '17:05:00', '17:21:00', NULL, NULL, '00:16:00', NULL, 'N', 'Y', '2020-07-24', '2020-07-24 17:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `hr_attendance_freeze_payroll`
--

CREATE TABLE `hr_attendance_freeze_payroll` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_attendance_freeze_payroll`
--

INSERT INTO `hr_attendance_freeze_payroll` (`id`, `organization_id`, `employee_id`, `month`, `year`, `date`, `start_date`, `end_date`) VALUES
(1, 1, 29, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(2, 1, 5, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(3, 1, 24, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(4, 1, 40, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(5, 1, 67, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(6, 1, 42, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(7, 1, 3, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(8, 1, 32, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(9, 1, 14, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(10, 1, 15, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(11, 1, 30, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(12, 1, 13, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(13, 1, 34, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(14, 1, 4, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(15, 1, 17, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(16, 1, 9, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(17, 1, 7, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(18, 1, 21, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(19, 1, 38, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(20, 1, 20, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(21, 1, 64, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(22, 1, 65, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(23, 1, 26, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(24, 1, 12, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(25, 1, 41, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(26, 1, 11, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(27, 1, 39, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(28, 1, 66, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(29, 1, 23, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(30, 1, 22, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(31, 1, 6, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(32, 1, 2, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(33, 1, 8, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(34, 1, 27, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(35, 1, 10, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(36, 1, 18, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(37, 1, 36, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(38, 1, 37, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(39, 1, 48, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30'),
(40, 1, 19, '06', '2020', '2020-07-13', '2020-06-01', '2020-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `hr_attendance_half_day`
--

CREATE TABLE `hr_attendance_half_day` (
  `id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_hour` varchar(100) DEFAULT NULL,
  `minimum_hour` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_attendance_half_day`
--

INSERT INTO `hr_attendance_half_day` (`id`, `attendance_id`, `employee_id`, `date`, `total_hour`, `minimum_hour`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 4, 42, '2020-05-20', '04:32', '04:00', 'N', 'Y', '2020-05-20', '0000-00-00 00:00:00'),
(2, 7, 42, '2020-05-21', '04:45', '04:00', 'N', 'Y', '2020-05-21', '0000-00-00 00:00:00'),
(3, 10, 42, '2020-05-22', '04:56', '04:00', 'N', 'Y', '2020-05-22', '0000-00-00 00:00:00'),
(4, 11, 42, '2020-05-23', '03:58', '02:00', 'N', 'Y', '2020-05-23', '0000-00-00 00:00:00'),
(5, 28, 13, '2020-05-29', '04:01', '04:00', 'N', 'Y', '2020-05-29', '2020-05-29 15:31:22'),
(6, 26, 42, '2020-05-29', '04:43', '04:00', 'N', 'Y', '2020-05-29', '0000-00-00 00:00:00'),
(7, 66, 42, '2020-06-09', '04:41', '04:00', 'N', 'Y', '2020-06-09', '0000-00-00 00:00:00'),
(8, 74, 42, '2020-06-10', '05:01', '04:00', 'N', 'Y', '2020-06-10', '0000-00-00 00:00:00'),
(9, 75, 41, '2020-06-10', '05:01', '04:00', 'N', 'Y', '2020-06-10', '0000-00-00 00:00:00'),
(10, 89, 42, '2020-06-12', '04:08', '04:00', 'N', 'Y', '2020-06-12', '0000-00-00 00:00:00'),
(11, 91, 13, '2020-06-12', '04:03', '04:00', 'N', 'Y', '2020-06-12', '0000-00-00 00:00:00'),
(12, 99, 42, '2020-06-13', '03:35', '02:00', 'N', 'Y', '2020-06-13', '0000-00-00 00:00:00'),
(13, 106, 42, '2020-06-15', '04:01', '04:00', 'N', 'Y', '2020-06-15', '0000-00-00 00:00:00'),
(14, 115, 42, '2020-06-16', '04:27', '04:00', 'N', 'Y', '2020-06-16', '0000-00-00 00:00:00'),
(15, 123, 42, '2020-06-17', '04:05', '04:00', 'N', 'Y', '2020-06-17', '0000-00-00 00:00:00'),
(16, 130, 42, '2020-06-18', '04:22', '04:00', 'N', 'Y', '2020-06-18', '0000-00-00 00:00:00'),
(17, 137, 42, '2020-06-19', '04:40', '04:00', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(18, 179, 42, '2020-06-23', '04:27', '04:00', 'N', 'Y', '2020-06-23', '0000-00-00 00:00:00'),
(19, 324, 42, '2020-07-02', '04:27', '04:00', 'N', 'Y', '2020-07-02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_attendance_incomplete_present`
--

CREATE TABLE `hr_attendance_incomplete_present` (
  `id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_hour` varchar(100) DEFAULT NULL,
  `minimum_hour` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_attendance_incomplete_present`
--

INSERT INTO `hr_attendance_incomplete_present` (`id`, `attendance_id`, `employee_id`, `date`, `total_hour`, `minimum_hour`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 1, 38, '2020-05-19', '02:05', '04:00', 'N', 'Y', '2020-05-19', '0000-00-00 00:00:00'),
(2, 3, 13, '2020-05-19', '03:41', '04:00', 'N', 'Y', '2020-05-19', '0000-00-00 00:00:00'),
(3, 6, 40, '2020-05-20', '00:00', '04:00', 'N', 'Y', '2020-05-20', '0000-00-00 00:00:00'),
(4, 13, 42, '2020-05-25', '01:14', '04:00', 'N', 'Y', '2020-05-25', '2020-05-25 11:42:18'),
(5, 15, 42, '2020-05-26', '03:31', '04:00', 'N', 'Y', '2020-05-26', '0000-00-00 00:00:00'),
(6, 18, 42, '2020-05-27', '03:59', '04:00', 'N', 'Y', '2020-05-27', '0000-00-00 00:00:00'),
(7, 20, 13, '2020-05-27', '02:53', '04:00', 'N', 'Y', '2020-05-27', '0000-00-00 00:00:00'),
(8, 22, 42, '2020-05-28', '00:00', '04:00', 'N', 'Y', '2020-05-28', '2020-05-28 10:43:33'),
(9, 24, 13, '2020-05-28', '03:41', '04:00', 'N', 'Y', '2020-05-28', '0000-00-00 00:00:00'),
(10, 32, 41, '2020-06-01', '03:03', '04:00', 'N', 'Y', '2020-06-01', '2020-06-01 14:05:14'),
(11, 33, 13, '2020-06-01', '03:37', '04:00', 'N', 'Y', '2020-06-01', '0000-00-00 00:00:00'),
(12, 34, 42, '2020-06-01', '03:31', '04:00', 'N', 'Y', '2020-06-01', '0000-00-00 00:00:00'),
(13, 36, 42, '2020-06-02', '00:00', '04:00', 'N', 'Y', '2020-06-02', '0000-00-00 00:00:00'),
(14, 46, 13, '2020-06-04', '03:56', '04:00', 'N', 'Y', '2020-06-04', '0000-00-00 00:00:00'),
(15, 50, 17, '2020-06-05', '00:02', '04:00', 'N', 'Y', '2020-06-05', '0000-00-00 00:00:00'),
(16, 63, 15, '2020-06-09', '00:00', '04:00', 'N', 'Y', '2020-06-09', '0000-00-00 00:00:00'),
(17, 76, 13, '2020-06-10', '03:35', '04:00', 'N', 'Y', '2020-06-10', '0000-00-00 00:00:00'),
(18, 83, 42, '2020-06-11', '02:58', '04:00', 'N', 'Y', '2020-06-11', '0000-00-00 00:00:00'),
(19, 118, 48, '2020-06-17', '00:00', '05:00', 'Y', 'N', '2020-06-17', '2020-06-17 19:56:21'),
(20, 138, 41, '2020-06-19', '00:00', '04:00', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(21, 139, 34, '2020-06-19', '00:00', '04:00', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(22, 145, 32, '2020-06-22', '00:00', '05:00', 'Y', 'N', '2020-06-22', '2020-06-22 12:14:22'),
(23, 149, 24, '2020-06-22', '00:00', '05:00', 'Y', 'N', '2020-06-22', '2020-06-22 11:54:37'),
(24, 155, 22, '2020-06-22', '00:04', '05:00', 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(25, 151, 14, '2020-06-22', '00:07', '05:00', 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(26, 159, 34, '2020-06-22', '00:00', '05:00', 'Y', 'N', '2020-06-22', '2020-06-22 12:11:23'),
(27, 162, 27, '2020-06-22', '00:00', '05:00', 'Y', 'N', '2020-06-22', '2020-06-22 16:14:57'),
(28, 196, 41, '2020-06-24', '03:49', '04:00', 'N', 'Y', '2020-06-24', '0000-00-00 00:00:00'),
(29, 197, 24, '2020-06-24', '04:38', '05:00', 'N', 'Y', '2020-06-24', '0000-00-00 00:00:00'),
(30, 206, 32, '2020-06-25', '00:00', '05:00', 'Y', 'N', '2020-06-25', '2020-06-25 19:03:23'),
(31, 239, 67, '2020-06-26', '02:13', '05:00', 'N', 'Y', '2020-06-26', '0000-00-00 00:00:00'),
(32, 258, 24, '2020-06-27', '02:05', '03:00', 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(33, 271, 27, '2020-06-29', '00:21', '05:00', 'Y', 'N', '2020-06-29', '2020-06-29 19:04:16'),
(34, 284, 32, '2020-06-30', '00:00', '05:00', 'N', 'Y', '2020-06-30', '2020-06-30 09:57:40'),
(35, 280, 27, '2020-06-30', '04:03', '05:00', 'Y', 'N', '2020-06-30', '2020-06-30 19:03:30'),
(36, 303, 11, '2020-07-01', '00:01', '05:00', 'Y', 'N', '2020-07-01', '2020-07-01 21:08:53'),
(37, 317, 67, '2020-07-02', '00:00', '05:00', 'N', 'Y', '2020-07-02', '0000-00-00 00:00:00'),
(38, 474, 11, '2020-07-15', '00:00', '05:00', 'N', 'Y', '2020-07-15', '0000-00-00 00:00:00'),
(39, 503, 11, '2020-07-17', '00:01', '05:00', 'N', 'Y', '2020-07-17', '0000-00-00 00:00:00'),
(40, 533, 11, '2020-07-21', '00:00', '05:00', 'N', 'Y', '2020-07-21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_attendance_overtime`
--

CREATE TABLE `hr_attendance_overtime` (
  `id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_hour` varchar(100) DEFAULT NULL,
  `minimum_hour` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_attendance_overtime`
--

INSERT INTO `hr_attendance_overtime` (`id`, `attendance_id`, `employee_id`, `date`, `total_hour`, `minimum_hour`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 118, 48, '2020-06-17', '10:07', '10:00', 'N', 'Y', '2020-06-17', '0000-00-00 00:00:00'),
(2, 152, 20, '2020-06-22', '23:49', '10:00', 'Y', 'N', '2020-06-22', '2020-06-22 11:59:57'),
(3, 146, 39, '2020-06-22', '10:12', '10:00', 'N', 'Y', '2020-06-22', '0000-00-00 00:00:00'),
(4, 208, 39, '2020-06-25', '12:03', '10:00', 'N', 'Y', '2020-06-25', '0000-00-00 00:00:00'),
(5, 226, 27, '2020-06-26', '10:01', '10:00', 'N', 'Y', '2020-06-26', '0000-00-00 00:00:00'),
(6, 227, 32, '2020-06-26', '11:14', '10:00', 'N', 'Y', '2020-06-26', '0000-00-00 00:00:00'),
(7, 244, 15, '2020-06-27', '07:14', '07:00', 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(8, 249, 11, '2020-06-27', '07:29', '07:00', 'N', 'Y', '2020-06-27', '0000-00-00 00:00:00'),
(9, 468, 17, '2020-07-15', '19:32', '16:00', 'N', 'Y', '2020-07-15', '2020-07-15 19:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `hr_certificate_type`
--

CREATE TABLE `hr_certificate_type` (
  `id` int(11) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_certificate_type`
--

INSERT INTO `hr_certificate_type` (`id`, `type`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'Mba', 'N', 'Y', '2019-07-08', '0000-00-00 00:00:00'),
(2, 'ENGINEERING', 'N', 'Y', '2019-07-08', '2019-07-08 14:32:00'),
(3, 'MCA', 'N', 'Y', '2019-07-08', '0000-00-00 00:00:00'),
(4, 'Sales', 'Y', 'N', '2019-07-09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_cities`
--

CREATE TABLE `hr_cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_selected` enum('Y','N','','') NOT NULL DEFAULT 'N',
  `is_active` enum('Y','N','','') NOT NULL DEFAULT 'Y',
  `delete_flag` enum('Y','N','','') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_cities`
--

INSERT INTO `hr_cities` (`city_id`, `city_name`, `name`, `is_selected`, `is_active`, `delete_flag`) VALUES
(1, 'Kolhapur', 'Maharashtra', 'N', 'Y', 'N'),
(2, 'Port Blair', 'Andaman & Nicobar Islands', 'N', 'Y', 'N'),
(3, 'Adilabad', 'Andhra Pradesh', 'N', 'Y', 'N'),
(4, 'Adoni', 'Andhra Pradesh', 'N', 'Y', 'N'),
(5, 'Amadalavalasa', 'Andhra Pradesh', 'N', 'Y', 'N'),
(6, 'Amalapuram', 'Andhra Pradesh', 'N', 'Y', 'N'),
(7, 'Anakapalle', 'Andhra Pradesh', 'N', 'Y', 'N'),
(8, 'Anantapur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(9, 'Badepalle', 'Andhra Pradesh', 'N', 'Y', 'N'),
(10, 'Banganapalle', 'Andhra Pradesh', 'N', 'Y', 'N'),
(11, 'Bapatla', 'Andhra Pradesh', 'N', 'Y', 'N'),
(12, 'Bellampalle', 'Andhra Pradesh', 'N', 'Y', 'N'),
(13, 'Bethamcherla', 'Andhra Pradesh', 'N', 'Y', 'N'),
(14, 'Bhadrachalam', 'Andhra Pradesh', 'N', 'Y', 'N'),
(15, 'Bhainsa', 'Andhra Pradesh', 'N', 'Y', 'N'),
(16, 'Bheemunipatnam', 'Andhra Pradesh', 'N', 'Y', 'N'),
(17, 'Bhimavaram', 'Andhra Pradesh', 'N', 'Y', 'N'),
(18, 'Bhongir', 'Andhra Pradesh', 'N', 'Y', 'N'),
(19, 'Bobbili', 'Andhra Pradesh', 'N', 'Y', 'N'),
(20, 'Bodhan', 'Andhra Pradesh', 'N', 'Y', 'N'),
(21, 'Chilakaluripet', 'Andhra Pradesh', 'N', 'Y', 'N'),
(22, 'Chirala', 'Andhra Pradesh', 'N', 'Y', 'N'),
(23, 'Chittoor', 'Andhra Pradesh', 'N', 'Y', 'N'),
(24, 'Cuddapah', 'Andhra Pradesh', 'N', 'Y', 'N'),
(25, 'Devarakonda', 'Andhra Pradesh', 'N', 'Y', 'N'),
(26, 'Dharmavaram', 'Andhra Pradesh', 'N', 'Y', 'N'),
(27, 'Eluru', 'Andhra Pradesh', 'N', 'Y', 'N'),
(28, 'Farooqnagar', 'Andhra Pradesh', 'N', 'Y', 'N'),
(29, 'Gadwal', 'Andhra Pradesh', 'N', 'Y', 'N'),
(30, 'Gooty', 'Andhra Pradesh', 'N', 'Y', 'N'),
(31, 'Gudivada', 'Andhra Pradesh', 'N', 'Y', 'N'),
(32, 'Gudur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(33, 'Guntakal', 'Andhra Pradesh', 'N', 'Y', 'N'),
(34, 'Guntur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(35, 'Hanuman Junction', 'Andhra Pradesh', 'N', 'Y', 'N'),
(36, 'Hindupur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(37, 'Hyderabad', 'Andhra Pradesh', 'N', 'Y', 'N'),
(38, 'Ichchapuram', 'Andhra Pradesh', 'N', 'Y', 'N'),
(39, 'Jaggaiahpet', 'Andhra Pradesh', 'N', 'Y', 'N'),
(40, 'Jagtial', 'Andhra Pradesh', 'N', 'Y', 'N'),
(41, 'Jammalamadugu', 'Andhra Pradesh', 'N', 'Y', 'N'),
(42, 'Jangaon', 'Andhra Pradesh', 'N', 'Y', 'N'),
(43, 'Kadapa', 'Andhra Pradesh', 'N', 'Y', 'N'),
(44, 'Kadiri', 'Andhra Pradesh', 'N', 'Y', 'N'),
(45, 'Kagaznagar', 'Andhra Pradesh', 'N', 'Y', 'N'),
(46, 'Kakinada', 'Andhra Pradesh', 'N', 'Y', 'N'),
(47, 'Kalyandurg', 'Andhra Pradesh', 'N', 'Y', 'N'),
(48, 'Kamareddy', 'Andhra Pradesh', 'N', 'Y', 'N'),
(49, 'Kandukur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(50, 'Karimnagar', 'Andhra Pradesh', 'N', 'Y', 'N'),
(51, 'Kavali', 'Andhra Pradesh', 'N', 'Y', 'N'),
(52, 'Khammam', 'Andhra Pradesh', 'N', 'Y', 'N'),
(53, 'Koratla', 'Andhra Pradesh', 'N', 'Y', 'N'),
(54, 'Kothagudem', 'Andhra Pradesh', 'N', 'Y', 'N'),
(55, 'Kothapeta', 'Andhra Pradesh', 'N', 'Y', 'N'),
(56, 'Kovvur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(57, 'Kurnool', 'Andhra Pradesh', 'N', 'Y', 'N'),
(58, 'Kyathampalle', 'Andhra Pradesh', 'N', 'Y', 'N'),
(59, 'Macherla', 'Andhra Pradesh', 'N', 'Y', 'N'),
(60, 'Machilipatnam', 'Andhra Pradesh', 'N', 'Y', 'N'),
(61, 'Madanapalle', 'Andhra Pradesh', 'N', 'Y', 'N'),
(62, 'Mahbubnagar', 'Andhra Pradesh', 'N', 'Y', 'N'),
(63, 'Mancherial', 'Andhra Pradesh', 'N', 'Y', 'N'),
(64, 'Mandamarri', 'Andhra Pradesh', 'N', 'Y', 'N'),
(65, 'Mandapeta', 'Andhra Pradesh', 'N', 'Y', 'N'),
(66, 'Manuguru', 'Andhra Pradesh', 'N', 'Y', 'N'),
(67, 'Markapur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(68, 'Medak', 'Andhra Pradesh', 'N', 'Y', 'N'),
(69, 'Miryalaguda', 'Andhra Pradesh', 'N', 'Y', 'N'),
(70, 'Mogalthur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(71, 'Nagari', 'Andhra Pradesh', 'N', 'Y', 'N'),
(72, 'Nagarkurnool', 'Andhra Pradesh', 'N', 'Y', 'N'),
(73, 'Nandyal', 'Andhra Pradesh', 'N', 'Y', 'N'),
(74, 'Narasapur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(75, 'Narasaraopet', 'Andhra Pradesh', 'N', 'Y', 'N'),
(76, 'Narayanpet', 'Andhra Pradesh', 'N', 'Y', 'N'),
(77, 'Narsipatnam', 'Andhra Pradesh', 'N', 'Y', 'N'),
(78, 'Nellore', 'Andhra Pradesh', 'N', 'Y', 'N'),
(79, 'Nidadavole', 'Andhra Pradesh', 'N', 'Y', 'N'),
(80, 'Nirmal', 'Andhra Pradesh', 'N', 'Y', 'N'),
(81, 'Nizamabad', 'Andhra Pradesh', 'N', 'Y', 'N'),
(82, 'Nuzvid', 'Andhra Pradesh', 'N', 'Y', 'N'),
(83, 'Ongole', 'Andhra Pradesh', 'N', 'Y', 'N'),
(84, 'Palacole', 'Andhra Pradesh', 'N', 'Y', 'N'),
(85, 'Palasa Kasibugga', 'Andhra Pradesh', 'N', 'Y', 'N'),
(86, 'Palwancha', 'Andhra Pradesh', 'N', 'Y', 'N'),
(87, 'Parvathipuram', 'Andhra Pradesh', 'N', 'Y', 'N'),
(88, 'Pedana', 'Andhra Pradesh', 'N', 'Y', 'N'),
(89, 'Peddapuram', 'Andhra Pradesh', 'N', 'Y', 'N'),
(90, 'Pithapuram', 'Andhra Pradesh', 'N', 'Y', 'N'),
(91, 'Pondur', 'Andhra pradesh', 'N', 'Y', 'N'),
(92, 'Ponnur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(93, 'Proddatur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(94, 'Punganur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(95, 'Puttur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(96, 'Rajahmundry', 'Andhra Pradesh', 'N', 'Y', 'N'),
(97, 'Rajam', 'Andhra Pradesh', 'N', 'Y', 'N'),
(98, 'Ramachandrapuram', 'Andhra Pradesh', 'N', 'Y', 'N'),
(99, 'Ramagundam', 'Andhra Pradesh', 'N', 'Y', 'N'),
(100, 'Rayachoti', 'Andhra Pradesh', 'N', 'Y', 'N'),
(101, 'Rayadurg', 'Andhra Pradesh', 'N', 'Y', 'N'),
(102, 'Renigunta', 'Andhra Pradesh', 'N', 'Y', 'N'),
(103, 'Repalle', 'Andhra Pradesh', 'N', 'Y', 'N'),
(104, 'Sadasivpet', 'Andhra Pradesh', 'N', 'Y', 'N'),
(105, 'Salur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(106, 'Samalkot', 'Andhra Pradesh', 'N', 'Y', 'N'),
(107, 'Sangareddy', 'Andhra Pradesh', 'N', 'Y', 'N'),
(108, 'Sattenapalle', 'Andhra Pradesh', 'N', 'Y', 'N'),
(109, 'Siddipet', 'Andhra Pradesh', 'N', 'Y', 'N'),
(110, 'Singapur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(111, 'Sircilla', 'Andhra Pradesh', 'N', 'Y', 'N'),
(112, 'Srikakulam', 'Andhra Pradesh', 'N', 'Y', 'N'),
(113, 'Srikalahasti', 'Andhra Pradesh', 'N', 'Y', 'N'),
(115, 'Suryapet', 'Andhra Pradesh', 'N', 'Y', 'N'),
(116, 'Tadepalligudem', 'Andhra Pradesh', 'N', 'Y', 'N'),
(117, 'Tadpatri', 'Andhra Pradesh', 'N', 'Y', 'N'),
(118, 'Tandur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(119, 'Tanuku', 'Andhra Pradesh', 'N', 'Y', 'N'),
(120, 'Tenali', 'Andhra Pradesh', 'N', 'Y', 'N'),
(121, 'Tirupati', 'Andhra Pradesh', 'N', 'Y', 'N'),
(122, 'Tuni', 'Andhra Pradesh', 'N', 'Y', 'N'),
(123, 'Uravakonda', 'Andhra Pradesh', 'N', 'Y', 'N'),
(124, 'Venkatagiri', 'Andhra Pradesh', 'N', 'Y', 'N'),
(125, 'Vicarabad', 'Andhra Pradesh', 'N', 'Y', 'N'),
(126, 'Vijayawada', 'Andhra Pradesh', 'N', 'Y', 'N'),
(127, 'Vinukonda', 'Andhra Pradesh', 'N', 'Y', 'N'),
(128, 'Visakhapatnam', 'Andhra Pradesh', 'N', 'Y', 'N'),
(129, 'Vizianagaram', 'Andhra Pradesh', 'N', 'Y', 'N'),
(130, 'Wanaparthy', 'Andhra Pradesh', 'N', 'Y', 'N'),
(131, 'Warangal', 'Andhra Pradesh', 'N', 'Y', 'N'),
(132, 'Yellandu', 'Andhra Pradesh', 'N', 'Y', 'N'),
(133, 'Yemmiganur', 'Andhra Pradesh', 'N', 'Y', 'N'),
(134, 'Yerraguntla', 'Andhra Pradesh', 'N', 'Y', 'N'),
(135, 'Zahirabad', 'Andhra Pradesh', 'N', 'Y', 'N'),
(136, 'Rajampet', 'Andhra Pradesh', 'N', 'Y', 'N'),
(137, 'Along', 'Arunachal Pradesh', 'N', 'Y', 'N'),
(138, 'Bomdila', 'Arunachal Pradesh', 'N', 'Y', 'N'),
(139, 'Itanagar', 'Arunachal Pradesh', 'N', 'Y', 'N'),
(140, 'Naharlagun', 'Arunachal Pradesh', 'N', 'Y', 'N'),
(141, 'Pasighat', 'Arunachal Pradesh', 'N', 'Y', 'N'),
(142, 'Abhayapuri', 'Assam', 'N', 'Y', 'N'),
(143, 'Amguri', 'Assam', 'N', 'Y', 'N'),
(144, 'Anandnagaar', 'Assam', 'N', 'Y', 'N'),
(145, 'Barpeta', 'Assam', 'N', 'Y', 'N'),
(146, 'Barpeta Road', 'Assam', 'N', 'Y', 'N'),
(147, 'Bilasipara', 'Assam', 'N', 'Y', 'N'),
(148, 'Bongaigaon', 'Assam', 'N', 'Y', 'N'),
(149, 'Dhekiajuli', 'Assam', 'N', 'Y', 'N'),
(150, 'Dhubri', 'Assam', 'N', 'Y', 'N'),
(151, 'Dibrugarh', 'Assam', 'N', 'Y', 'N'),
(152, 'Digboi', 'Assam', 'N', 'Y', 'N'),
(153, 'Diphu', 'Assam', 'N', 'Y', 'N'),
(154, 'Dispur', 'Assam', 'N', 'Y', 'N'),
(156, 'Gauripur', 'Assam', 'N', 'Y', 'N'),
(157, 'Goalpara', 'Assam', 'N', 'Y', 'N'),
(158, 'Golaghat', 'Assam', 'N', 'Y', 'N'),
(159, 'Guwahati', 'Assam', 'N', 'Y', 'N'),
(160, 'Haflong', 'Assam', 'N', 'Y', 'N'),
(161, 'Hailakandi', 'Assam', 'N', 'Y', 'N'),
(162, 'Hojai', 'Assam', 'N', 'Y', 'N'),
(163, 'Jorhat', 'Assam', 'N', 'Y', 'N'),
(164, 'Karimganj', 'Assam', 'N', 'Y', 'N'),
(165, 'Kokrajhar', 'Assam', 'N', 'Y', 'N'),
(166, 'Lanka', 'Assam', 'N', 'Y', 'N'),
(167, 'Lumding', 'Assam', 'N', 'Y', 'N'),
(168, 'Mangaldoi', 'Assam', 'N', 'Y', 'N'),
(169, 'Mankachar', 'Assam', 'N', 'Y', 'N'),
(170, 'Margherita', 'Assam', 'N', 'Y', 'N'),
(171, 'Mariani', 'Assam', 'N', 'Y', 'N'),
(172, 'Marigaon', 'Assam', 'N', 'Y', 'N'),
(173, 'Nagaon', 'Assam', 'N', 'Y', 'N'),
(174, 'Nalbari', 'Assam', 'N', 'Y', 'N'),
(175, 'North Lakhimpur', 'Assam', 'N', 'Y', 'N'),
(176, 'Rangia', 'Assam', 'N', 'Y', 'N'),
(177, 'Sibsagar', 'Assam', 'N', 'Y', 'N'),
(178, 'Silapathar', 'Assam', 'N', 'Y', 'N'),
(179, 'Silchar', 'Assam', 'N', 'Y', 'N'),
(180, 'Tezpur', 'Assam', 'N', 'Y', 'N'),
(181, 'Tinsukia', 'Assam', 'N', 'Y', 'N'),
(182, 'Amarpur', 'Bihar', 'N', 'Y', 'N'),
(183, 'Araria', 'Bihar', 'N', 'Y', 'N'),
(184, 'Areraj', 'Bihar', 'N', 'Y', 'N'),
(185, 'Arrah', 'Bihar', 'N', 'Y', 'N'),
(186, 'Asarganj', 'Bihar', 'N', 'Y', 'N'),
(187, 'Aurangabad', 'Bihar', 'N', 'Y', 'N'),
(188, 'Bagaha', 'Bihar', 'N', 'Y', 'N'),
(189, 'Bahadurganj', 'Bihar', 'N', 'Y', 'N'),
(190, 'Bairgania', 'Bihar', 'N', 'Y', 'N'),
(191, 'Bakhtiarpur', 'Bihar', 'N', 'Y', 'N'),
(192, 'Banka', 'Bihar', 'N', 'Y', 'N'),
(193, 'Banmankhi Bazar', 'Bihar', 'N', 'Y', 'N'),
(194, 'Barahiya', 'Bihar', 'N', 'Y', 'N'),
(195, 'Barauli', 'Bihar', 'N', 'Y', 'N'),
(196, 'Barbigha', 'Bihar', 'N', 'Y', 'N'),
(197, 'Barh', 'Bihar', 'N', 'Y', 'N'),
(198, 'Begusarai', 'Bihar', 'N', 'Y', 'N'),
(199, 'Behea', 'Bihar', 'N', 'Y', 'N'),
(200, 'Bettiah', 'Bihar', 'N', 'Y', 'N'),
(201, 'Bhabua', 'Bihar', 'N', 'Y', 'N'),
(202, 'Bhagalpur', 'Bihar', 'N', 'Y', 'N'),
(203, 'Bihar Sharif', 'Bihar', 'N', 'Y', 'N'),
(204, 'Bikramganj', 'Bihar', 'N', 'Y', 'N'),
(205, 'Bodh Gaya', 'Bihar', 'N', 'Y', 'N'),
(206, 'Buxar', 'Bihar', 'N', 'Y', 'N'),
(207, 'Chandan Bara', 'Bihar', 'N', 'Y', 'N'),
(208, 'Chanpatia', 'Bihar', 'N', 'Y', 'N'),
(209, 'Chhapra', 'Bihar', 'N', 'Y', 'N'),
(210, 'Colgong', 'Bihar', 'N', 'Y', 'N'),
(211, 'Dalsinghsarai', 'Bihar', 'N', 'Y', 'N'),
(212, 'Darbhanga', 'Bihar', 'N', 'Y', 'N'),
(213, 'Daudnagar', 'Bihar', 'N', 'Y', 'N'),
(214, 'Dehri-on-Sone', 'Bihar', 'N', 'Y', 'N'),
(215, 'Dhaka', 'Bihar', 'N', 'Y', 'N'),
(216, 'Dighwara', 'Bihar', 'N', 'Y', 'N'),
(217, 'Dumraon', 'Bihar', 'N', 'Y', 'N'),
(218, 'Fatwah', 'Bihar', 'N', 'Y', 'N'),
(219, 'Forbesganj', 'Bihar', 'N', 'Y', 'N'),
(220, 'Gaya', 'Bihar', 'N', 'Y', 'N'),
(221, 'Gogri Jamalpur', 'Bihar', 'N', 'Y', 'N'),
(222, 'Gopalganj', 'Bihar', 'N', 'Y', 'N'),
(223, 'Hajipur', 'Bihar', 'N', 'Y', 'N'),
(224, 'Hilsa', 'Bihar', 'N', 'Y', 'N'),
(225, 'Hisua', 'Bihar', 'N', 'Y', 'N'),
(226, 'Islampur', 'Bihar', 'N', 'Y', 'N'),
(227, 'Jagdispur', 'Bihar', 'N', 'Y', 'N'),
(228, 'Jamalpur', 'Bihar', 'N', 'Y', 'N'),
(229, 'Jamui', 'Bihar', 'N', 'Y', 'N'),
(230, 'Jehanabad', 'Bihar', 'N', 'Y', 'N'),
(231, 'Jhajha', 'Bihar', 'N', 'Y', 'N'),
(232, 'Jhanjharpur', 'Bihar', 'N', 'Y', 'N'),
(233, 'Jogabani', 'Bihar', 'N', 'Y', 'N'),
(234, 'Kanti', 'Bihar', 'N', 'Y', 'N'),
(235, 'Katihar', 'Bihar', 'N', 'Y', 'N'),
(236, 'Khagaria', 'Bihar', 'N', 'Y', 'N'),
(237, 'Kharagpur', 'Bihar', 'N', 'Y', 'N'),
(238, 'Kishanganj', 'Bihar', 'N', 'Y', 'N'),
(239, 'Lakhisarai', 'Bihar', 'N', 'Y', 'N'),
(240, 'Lalganj', 'Bihar', 'N', 'Y', 'N'),
(241, 'Madhepura', 'Bihar', 'N', 'Y', 'N'),
(242, 'Madhubani', 'Bihar', 'N', 'Y', 'N'),
(243, 'Maharajganj', 'Bihar', 'N', 'Y', 'N'),
(244, 'Mahnar Bazar', 'Bihar', 'N', 'Y', 'N'),
(245, 'Makhdumpur', 'Bihar', 'N', 'Y', 'N'),
(246, 'Maner', 'Bihar', 'N', 'Y', 'N'),
(247, 'Manihari', 'Bihar', 'N', 'Y', 'N'),
(248, 'Marhaura', 'Bihar', 'N', 'Y', 'N'),
(249, 'Masaurhi', 'Bihar', 'N', 'Y', 'N'),
(250, 'Mirganj', 'Bihar', 'N', 'Y', 'N'),
(251, 'Mokameh', 'Bihar', 'N', 'Y', 'N'),
(252, 'Motihari', 'Bihar', 'N', 'Y', 'N'),
(253, 'Motipur', 'Bihar', 'N', 'Y', 'N'),
(254, 'Munger', 'Bihar', 'N', 'Y', 'N'),
(255, 'Murliganj', 'Bihar', 'N', 'Y', 'N'),
(256, 'Muzaffarpur', 'Bihar', 'N', 'Y', 'N'),
(257, 'Narkatiaganj', 'Bihar', 'N', 'Y', 'N'),
(258, 'Naugachhia', 'Bihar', 'N', 'Y', 'N'),
(259, 'Nawada', 'Bihar', 'N', 'Y', 'N'),
(260, 'Nokha', 'Bihar', 'N', 'Y', 'N'),
(261, 'Patna', 'Bihar', 'N', 'Y', 'N'),
(262, 'Piro', 'Bihar', 'N', 'Y', 'N'),
(263, 'Purnia', 'Bihar', 'N', 'Y', 'N'),
(264, 'Rafiganj', 'Bihar', 'N', 'Y', 'N'),
(265, 'Rajgir', 'Bihar', 'N', 'Y', 'N'),
(266, 'Ramnagar', 'Bihar', 'N', 'Y', 'N'),
(267, 'Raxaul Bazar', 'Bihar', 'N', 'Y', 'N'),
(268, 'Revelganj', 'Bihar', 'N', 'Y', 'N'),
(269, 'Rosera', 'Bihar', 'N', 'Y', 'N'),
(270, 'Saharsa', 'Bihar', 'N', 'Y', 'N'),
(271, 'Samastipur', 'Bihar', 'N', 'Y', 'N'),
(272, 'Sasaram', 'Bihar', 'N', 'Y', 'N'),
(273, 'Sheikhpura', 'Bihar', 'N', 'Y', 'N'),
(274, 'Sheohar', 'Bihar', 'N', 'Y', 'N'),
(275, 'Sherghati', 'Bihar', 'N', 'Y', 'N'),
(276, 'Silao', 'Bihar', 'N', 'Y', 'N'),
(277, 'Sitamarhi', 'Bihar', 'N', 'Y', 'N'),
(278, 'Siwan', 'Bihar', 'N', 'Y', 'N'),
(279, 'Sonepur', 'Bihar', 'N', 'Y', 'N'),
(280, 'Sugauli', 'Bihar', 'N', 'Y', 'N'),
(281, 'Sultanganj', 'Bihar', 'N', 'Y', 'N'),
(282, 'Supaul', 'Bihar', 'N', 'Y', 'N'),
(283, 'Warisaliganj', 'Bihar', 'N', 'Y', 'N'),
(284, 'Ahiwara', 'Chhattisgarh', 'N', 'Y', 'N'),
(285, 'Akaltara', 'Chhattisgarh', 'N', 'Y', 'N'),
(286, 'Ambagarh Chowki', 'Chhattisgarh', 'N', 'Y', 'N'),
(287, 'Ambikapur', 'Chhattisgarh', 'N', 'Y', 'N'),
(288, 'Arang', 'Chhattisgarh', 'N', 'Y', 'N'),
(289, 'Bade Bacheli', 'Chhattisgarh', 'N', 'Y', 'N'),
(290, 'Balod', 'Chhattisgarh', 'N', 'Y', 'N'),
(291, 'Baloda Bazar', 'Chhattisgarh', 'N', 'Y', 'N'),
(292, 'Bemetra', 'Chhattisgarh', 'N', 'Y', 'N'),
(293, 'Bhatapara', 'Chhattisgarh', 'N', 'Y', 'N'),
(294, 'Bilaspur', 'Chhattisgarh', 'N', 'Y', 'N'),
(295, 'Birgaon', 'Chhattisgarh', 'N', 'Y', 'N'),
(296, 'Champa', 'Chhattisgarh', 'N', 'Y', 'N'),
(297, 'Chirmiri', 'Chhattisgarh', 'N', 'Y', 'N'),
(298, 'Dalli-Rajhara', 'Chhattisgarh', 'N', 'Y', 'N'),
(299, 'Dhamtari', 'Chhattisgarh', 'N', 'Y', 'N'),
(300, 'Dipka', 'Chhattisgarh', 'N', 'Y', 'N'),
(301, 'Dongargarh', 'Chhattisgarh', 'N', 'Y', 'N'),
(302, 'Durg-Bhilai Nagar', 'Chhattisgarh', 'N', 'Y', 'N'),
(303, 'Gobranawapara', 'Chhattisgarh', 'N', 'Y', 'N'),
(304, 'Jagdalpur', 'Chhattisgarh', 'N', 'Y', 'N'),
(305, 'Janjgir', 'Chhattisgarh', 'N', 'Y', 'N'),
(306, 'Jashpurnagar', 'Chhattisgarh', 'N', 'Y', 'N'),
(307, 'Kanker', 'Chhattisgarh', 'N', 'Y', 'N'),
(308, 'Kawardha', 'Chhattisgarh', 'N', 'Y', 'N'),
(309, 'Kondagaon', 'Chhattisgarh', 'N', 'Y', 'N'),
(310, 'Korba', 'Chhattisgarh', 'N', 'Y', 'N'),
(311, 'Mahasamund', 'Chhattisgarh', 'N', 'Y', 'N'),
(312, 'Mahendragarh', 'Chhattisgarh', 'N', 'Y', 'N'),
(313, 'Mungeli', 'Chhattisgarh', 'N', 'Y', 'N'),
(314, 'Naila Janjgir', 'Chhattisgarh', 'N', 'Y', 'N'),
(315, 'Raigarh', 'Chhattisgarh', 'N', 'Y', 'N'),
(316, 'Raipur', 'Chhattisgarh', 'N', 'Y', 'N'),
(317, 'Rajnandgaon', 'Chhattisgarh', 'N', 'Y', 'N'),
(318, 'Sakti', 'Chhattisgarh', 'N', 'Y', 'N'),
(319, 'Tilda Newra', 'Chhattisgarh', 'N', 'Y', 'N'),
(320, 'Amli', 'Dadra & Nagar Haveli', 'N', 'Y', 'N'),
(321, 'Silvassa', 'Dadra & Nagar Haveli', 'N', 'Y', 'N'),
(322, 'Daman and Diu', 'Daman & Diu', 'N', 'Y', 'N'),
(323, 'Daman and Diu', 'Daman & Diu', 'N', 'Y', 'N'),
(324, 'Asola', 'Delhi', 'N', 'Y', 'N'),
(325, 'Delhi', 'Delhi', 'N', 'Y', 'N'),
(326, 'Aldona', 'Goa', 'N', 'Y', 'N'),
(327, 'Curchorem Cacora', 'Goa', 'N', 'Y', 'N'),
(328, 'Madgaon', 'Goa', 'N', 'Y', 'N'),
(329, 'Mapusa', 'Goa', 'N', 'Y', 'N'),
(330, 'Margao', 'Goa', 'N', 'Y', 'N'),
(331, 'Marmagao', 'Goa', 'N', 'Y', 'N'),
(332, 'Panaji', 'Goa', 'N', 'Y', 'N'),
(333, 'Ahmedabad', 'Gujarat', 'N', 'Y', 'N'),
(334, 'Amreli', 'Gujarat', 'N', 'Y', 'N'),
(335, 'Anand', 'Gujarat', 'N', 'Y', 'N'),
(336, 'Ankleshwar', 'Gujarat', 'N', 'Y', 'N'),
(337, 'Bharuch', 'Gujarat', 'N', 'Y', 'N'),
(338, 'Bhavnagar', 'Gujarat', 'N', 'Y', 'N'),
(339, 'Bhuj', 'Gujarat', 'N', 'Y', 'N'),
(340, 'Cambay', 'Gujarat', 'N', 'Y', 'N'),
(341, 'Dahod', 'Gujarat', 'N', 'Y', 'N'),
(342, 'Deesa', 'Gujarat', 'N', 'Y', 'N'),
(343, 'Dharampur', ' India', 'N', 'Y', 'N'),
(344, 'Dholka', 'Gujarat', 'N', 'Y', 'N'),
(345, 'Gandhinagar', 'Gujarat', 'N', 'Y', 'N'),
(346, 'Godhra', 'Gujarat', 'N', 'Y', 'N'),
(347, 'Himatnagar', 'Gujarat', 'N', 'Y', 'N'),
(348, 'Idar', 'Gujarat', 'N', 'Y', 'N'),
(349, 'Jamnagar', 'Gujarat', 'N', 'Y', 'N'),
(350, 'Junagadh', 'Gujarat', 'N', 'Y', 'N'),
(351, 'Kadi', 'Gujarat', 'N', 'Y', 'N'),
(352, 'Kalavad', 'Gujarat', 'N', 'Y', 'N'),
(353, 'Kalol', 'Gujarat', 'N', 'Y', 'N'),
(354, 'Kapadvanj', 'Gujarat', 'N', 'Y', 'N'),
(355, 'Karjan', 'Gujarat', 'N', 'Y', 'N'),
(356, 'Keshod', 'Gujarat', 'N', 'Y', 'N'),
(357, 'Khambhalia', 'Gujarat', 'N', 'Y', 'N'),
(358, 'Khambhat', 'Gujarat', 'N', 'Y', 'N'),
(359, 'Kheda', 'Gujarat', 'N', 'Y', 'N'),
(360, 'Khedbrahma', 'Gujarat', 'N', 'Y', 'N'),
(361, 'Kheralu', 'Gujarat', 'N', 'Y', 'N'),
(362, 'Kodinar', 'Gujarat', 'N', 'Y', 'N'),
(363, 'Lathi', 'Gujarat', 'N', 'Y', 'N'),
(364, 'Limbdi', 'Gujarat', 'N', 'Y', 'N'),
(365, 'Lunawada', 'Gujarat', 'N', 'Y', 'N'),
(366, 'Mahesana', 'Gujarat', 'N', 'Y', 'N'),
(367, 'Mahuva', 'Gujarat', 'N', 'Y', 'N'),
(368, 'Manavadar', 'Gujarat', 'N', 'Y', 'N'),
(369, 'Mandvi', 'Gujarat', 'N', 'Y', 'N'),
(370, 'Mangrol', 'Gujarat', 'N', 'Y', 'N'),
(371, 'Mansa', 'Gujarat', 'N', 'Y', 'N'),
(372, 'Mehmedabad', 'Gujarat', 'N', 'Y', 'N'),
(373, 'Modasa', 'Gujarat', 'N', 'Y', 'N'),
(374, 'Morvi', 'Gujarat', 'N', 'Y', 'N'),
(375, 'Nadiad', 'Gujarat', 'N', 'Y', 'N'),
(376, 'Navsari', 'Gujarat', 'N', 'Y', 'N'),
(377, 'Padra', 'Gujarat', 'N', 'Y', 'N'),
(378, 'Palanpur', 'Gujarat', 'N', 'Y', 'N'),
(379, 'Palitana', 'Gujarat', 'N', 'Y', 'N'),
(380, 'Pardi', 'Gujarat', 'N', 'Y', 'N'),
(381, 'Patan', 'Gujarat', 'N', 'Y', 'N'),
(382, 'Petlad', 'Gujarat', 'N', 'Y', 'N'),
(383, 'Porbandar', 'Gujarat', 'N', 'Y', 'N'),
(384, 'Radhanpur', 'Gujarat', 'N', 'Y', 'N'),
(385, 'Rajkot', 'Gujarat', 'N', 'Y', 'N'),
(386, 'Rajpipla', 'Gujarat', 'N', 'Y', 'N'),
(387, 'Rajula', 'Gujarat', 'N', 'Y', 'N'),
(388, 'Ranavav', 'Gujarat', 'N', 'Y', 'N'),
(389, 'Rapar', 'Gujarat', 'N', 'Y', 'N'),
(390, 'Salaya', 'Gujarat', 'N', 'Y', 'N'),
(391, 'Sanand', 'Gujarat', 'N', 'Y', 'N'),
(392, 'Savarkundla', 'Gujarat', 'N', 'Y', 'N'),
(393, 'Sidhpur', 'Gujarat', 'N', 'Y', 'N'),
(394, 'Sihor', 'Gujarat', 'N', 'Y', 'N'),
(395, 'Songadh', 'Gujarat', 'N', 'Y', 'N'),
(396, 'Surat', 'Gujarat', 'N', 'Y', 'N'),
(397, 'Talaja', 'Gujarat', 'N', 'Y', 'N'),
(398, 'Thangadh', 'Gujarat', 'N', 'Y', 'N'),
(399, 'Tharad', 'Gujarat', 'N', 'Y', 'N'),
(400, 'Umbergaon', 'Gujarat', 'N', 'Y', 'N'),
(401, 'Umreth', 'Gujarat', 'N', 'Y', 'N'),
(402, 'Una', 'Gujarat', 'N', 'Y', 'N'),
(403, 'Unjha', 'Gujarat', 'N', 'Y', 'N'),
(404, 'Upleta', 'Gujarat', 'N', 'Y', 'N'),
(405, 'Vadnagar', 'Gujarat', 'N', 'Y', 'N'),
(406, 'Vadodara', 'Gujarat', 'N', 'Y', 'N'),
(407, 'Valsad', 'Gujarat', 'N', 'Y', 'N'),
(408, 'Vapi', 'Gujarat', 'N', 'Y', 'N'),
(409, 'Vapi', 'Gujarat', 'N', 'Y', 'N'),
(410, 'Veraval', 'Gujarat', 'N', 'Y', 'N'),
(411, 'Vijapur', 'Gujarat', 'N', 'Y', 'N'),
(412, 'Viramgam', 'Gujarat', 'N', 'Y', 'N'),
(413, 'Visnagar', 'Gujarat', 'N', 'Y', 'N'),
(414, 'Vyara', 'Gujarat', 'N', 'Y', 'N'),
(415, 'Wadhwan', 'Gujarat', 'N', 'Y', 'N'),
(416, 'Wankaner', 'Gujarat', 'N', 'Y', 'N'),
(417, 'Adalaj', 'Gujrat', 'N', 'Y', 'N'),
(418, 'Adityana', 'Gujrat', 'N', 'Y', 'N'),
(419, 'Alang', 'Gujrat', 'N', 'Y', 'N'),
(420, 'Ambaji', 'Gujrat', 'N', 'Y', 'N'),
(421, 'Ambaliyasan', 'Gujrat', 'N', 'Y', 'N'),
(422, 'Andada', 'Gujrat', 'N', 'Y', 'N'),
(423, 'Anjar', 'Gujrat', 'N', 'Y', 'N'),
(424, 'Anklav', 'Gujrat', 'N', 'Y', 'N'),
(425, 'Antaliya', 'Gujrat', 'N', 'Y', 'N'),
(426, 'Arambhada', 'Gujrat', 'N', 'Y', 'N'),
(427, 'Atul', 'Gujrat', 'N', 'Y', 'N'),
(428, 'Ballabhgarh', 'Hariyana', 'N', 'Y', 'N'),
(429, 'Ambala', 'Haryana', 'N', 'Y', 'N'),
(430, 'Ambala', 'Haryana', 'N', 'Y', 'N'),
(431, 'Asankhurd', 'Haryana', 'N', 'Y', 'N'),
(432, 'Assandh', 'Haryana', 'N', 'Y', 'N'),
(433, 'Ateli', 'Haryana', 'N', 'Y', 'N'),
(434, 'Babiyal', 'Haryana', 'N', 'Y', 'N'),
(435, 'Bahadurgarh', 'Haryana', 'N', 'Y', 'N'),
(436, 'Barwala', 'Haryana', 'N', 'Y', 'N'),
(437, 'Bhiwani', 'Haryana', 'N', 'Y', 'N'),
(438, 'Charkhi Dadri', 'Haryana', 'N', 'Y', 'N'),
(439, 'Cheeka', 'Haryana', 'N', 'Y', 'N'),
(440, 'Ellenabad 2', 'Haryana', 'N', 'Y', 'N'),
(441, 'Faridabad', 'Haryana', 'N', 'Y', 'N'),
(442, 'Fatehabad', 'Haryana', 'N', 'Y', 'N'),
(443, 'Ganaur', 'Haryana', 'N', 'Y', 'N'),
(444, 'Gharaunda', 'Haryana', 'N', 'Y', 'N'),
(445, 'Gohana', 'Haryana', 'N', 'Y', 'N'),
(446, 'Gurgaon', 'Haryana', 'N', 'Y', 'N'),
(447, 'Haibat(Yamuna Nagar)', 'Haryana', 'N', 'Y', 'N'),
(448, 'Hansi', 'Haryana', 'N', 'Y', 'N'),
(449, 'Hisar', 'Haryana', 'N', 'Y', 'N'),
(450, 'Hodal', 'Haryana', 'N', 'Y', 'N'),
(451, 'Jhajjar', 'Haryana', 'N', 'Y', 'N'),
(452, 'Jind', 'Haryana', 'N', 'Y', 'N'),
(453, 'Kaithal', 'Haryana', 'N', 'Y', 'N'),
(454, 'Kalan Wali', 'Haryana', 'N', 'Y', 'N'),
(455, 'Kalka', 'Haryana', 'N', 'Y', 'N'),
(456, 'Karnal', 'Haryana', 'N', 'Y', 'N'),
(457, 'Ladwa', 'Haryana', 'N', 'Y', 'N'),
(458, 'Mahendragarh', 'Haryana', 'N', 'Y', 'N'),
(459, 'Mandi Dabwali', 'Haryana', 'N', 'Y', 'N'),
(460, 'Narnaul', 'Haryana', 'N', 'Y', 'N'),
(461, 'Narwana', 'Haryana', 'N', 'Y', 'N'),
(462, 'Palwal', 'Haryana', 'N', 'Y', 'N'),
(463, 'Panchkula', 'Haryana', 'N', 'Y', 'N'),
(464, 'Panipat', 'Haryana', 'N', 'Y', 'N'),
(465, 'Pehowa', 'Haryana', 'N', 'Y', 'N'),
(466, 'Pinjore', 'Haryana', 'N', 'Y', 'N'),
(467, 'Rania', 'Haryana', 'N', 'Y', 'N'),
(468, 'Ratia', 'Haryana', 'N', 'Y', 'N'),
(469, 'Rewari', 'Haryana', 'N', 'Y', 'N'),
(470, 'Rohtak', 'Haryana', 'N', 'Y', 'N'),
(471, 'Safidon', 'Haryana', 'N', 'Y', 'N'),
(472, 'Samalkha', 'Haryana', 'N', 'Y', 'N'),
(473, 'Shahbad', 'Haryana', 'N', 'Y', 'N'),
(474, 'Sirsa', 'Haryana', 'N', 'Y', 'N'),
(475, 'Sohna', 'Haryana', 'N', 'Y', 'N'),
(476, 'Sonipat', 'Haryana', 'N', 'Y', 'N'),
(477, 'Taraori', 'Haryana', 'N', 'Y', 'N'),
(478, 'Thanesar', 'Haryana', 'N', 'Y', 'N'),
(479, 'Tohana', 'Haryana', 'N', 'Y', 'N'),
(480, 'Yamunanagar', 'Haryana', 'N', 'Y', 'N'),
(481, 'Arki', 'Himachal Pradesh', 'N', 'Y', 'N'),
(482, 'Baddi', 'Himachal Pradesh', 'N', 'Y', 'N'),
(483, 'Bilaspur', 'Himachal Pradesh', 'N', 'Y', 'N'),
(484, 'Chamba', 'Himachal Pradesh', 'N', 'Y', 'N'),
(485, 'Dalhousie', 'Himachal Pradesh', 'N', 'Y', 'N'),
(486, 'Dharamsala', 'Himachal Pradesh', 'N', 'Y', 'N'),
(487, 'Hamirpur', 'Himachal Pradesh', 'N', 'Y', 'N'),
(488, 'Mandi', 'Himachal Pradesh', 'N', 'Y', 'N'),
(489, 'Nahan', 'Himachal Pradesh', 'N', 'Y', 'N'),
(490, 'Shimla', 'Himachal Pradesh', 'N', 'Y', 'N'),
(491, 'Solan', 'Himachal Pradesh', 'N', 'Y', 'N'),
(492, 'Sundarnagar', 'Himachal Pradesh', 'N', 'Y', 'N'),
(493, 'Jammu', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(494, 'Achabbal', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(495, 'Akhnoor', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(496, 'Anantnag', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(497, 'Arnia', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(498, 'Awantipora', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(499, 'Bandipore', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(500, 'Baramula', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(501, 'Kathua', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(502, 'Leh', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(503, 'Punch', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(504, 'Rajauri', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(505, 'Sopore', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(506, 'Srinagar', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(507, 'Udhampur', 'Jammu & Kashmir', 'N', 'Y', 'N'),
(508, 'Amlabad', 'Jharkhand', 'N', 'Y', 'N'),
(509, 'Ara', 'Jharkhand', 'N', 'Y', 'N'),
(510, 'Barughutu', 'Jharkhand', 'N', 'Y', 'N'),
(511, 'Bokaro Steel City', 'Jharkhand', 'N', 'Y', 'N'),
(512, 'Chaibasa', 'Jharkhand', 'N', 'Y', 'N'),
(513, 'Chakradharpur', 'Jharkhand', 'N', 'Y', 'N'),
(514, 'Chandrapura', 'Jharkhand', 'N', 'Y', 'N'),
(515, 'Chatra', 'Jharkhand', 'N', 'Y', 'N'),
(516, 'Chirkunda', 'Jharkhand', 'N', 'Y', 'N'),
(517, 'Churi', 'Jharkhand', 'N', 'Y', 'N'),
(518, 'Daltonganj', 'Jharkhand', 'N', 'Y', 'N'),
(519, 'Deoghar', 'Jharkhand', 'N', 'Y', 'N'),
(520, 'Dhanbad', 'Jharkhand', 'N', 'Y', 'N'),
(521, 'Dumka', 'Jharkhand', 'N', 'Y', 'N'),
(522, 'Garhwa', 'Jharkhand', 'N', 'Y', 'N'),
(523, 'Ghatshila', 'Jharkhand', 'N', 'Y', 'N'),
(524, 'Giridih', 'Jharkhand', 'N', 'Y', 'N'),
(525, 'Godda', 'Jharkhand', 'N', 'Y', 'N'),
(526, 'Gomoh', 'Jharkhand', 'N', 'Y', 'N'),
(527, 'Gumia', 'Jharkhand', 'N', 'Y', 'N'),
(528, 'Gumla', 'Jharkhand', 'N', 'Y', 'N'),
(529, 'Hazaribag', 'Jharkhand', 'N', 'Y', 'N'),
(530, 'Hussainabad', 'Jharkhand', 'N', 'Y', 'N'),
(531, 'Jamshedpur', 'Jharkhand', 'N', 'Y', 'N'),
(532, 'Jamtara', 'Jharkhand', 'N', 'Y', 'N'),
(533, 'Jhumri Tilaiya', 'Jharkhand', 'N', 'Y', 'N'),
(534, 'Khunti', 'Jharkhand', 'N', 'Y', 'N'),
(535, 'Lohardaga', 'Jharkhand', 'N', 'Y', 'N'),
(536, 'Madhupur', 'Jharkhand', 'N', 'Y', 'N'),
(537, 'Mihijam', 'Jharkhand', 'N', 'Y', 'N'),
(538, 'Musabani', 'Jharkhand', 'N', 'Y', 'N'),
(539, 'Pakaur', 'Jharkhand', 'N', 'Y', 'N'),
(540, 'Patratu', 'Jharkhand', 'N', 'Y', 'N'),
(541, 'Phusro', 'Jharkhand', 'N', 'Y', 'N'),
(542, 'Ramngarh', 'Jharkhand', 'N', 'Y', 'N'),
(543, 'Ranchi', 'Jharkhand', 'N', 'Y', 'N'),
(544, 'Sahibganj', 'Jharkhand', 'N', 'Y', 'N'),
(545, 'Saunda', 'Jharkhand', 'N', 'Y', 'N'),
(546, 'Simdega', 'Jharkhand', 'N', 'Y', 'N'),
(547, 'Tenu Dam-cum- Kathhara', 'Jharkhand', 'N', 'Y', 'N'),
(548, 'Arasikere', 'Karnataka', 'N', 'Y', 'N'),
(549, 'Bangalore', 'Karnataka', 'N', 'Y', 'N'),
(550, 'Belgaum', 'Karnataka', 'N', 'Y', 'N'),
(551, 'Bellary', 'Karnataka', 'N', 'Y', 'N'),
(552, 'Chamrajnagar', 'Karnataka', 'N', 'Y', 'N'),
(553, 'Chikkaballapur', 'Karnataka', 'N', 'Y', 'N'),
(554, 'Chintamani', 'Karnataka', 'N', 'Y', 'N'),
(555, 'Chitradurga', 'Karnataka', 'N', 'Y', 'N'),
(556, 'Gulbarga', 'Karnataka', 'N', 'Y', 'N'),
(557, 'Gundlupet', 'Karnataka', 'N', 'Y', 'N'),
(558, 'Hassan', 'Karnataka', 'N', 'Y', 'N'),
(559, 'Hospet', 'Karnataka', 'N', 'Y', 'N'),
(560, 'Hubli', 'Karnataka', 'N', 'Y', 'N'),
(561, 'Karkala', 'Karnataka', 'N', 'Y', 'N'),
(562, 'Karwar', 'Karnataka', 'N', 'Y', 'N'),
(563, 'Kolar', 'Karnataka', 'N', 'Y', 'N'),
(564, 'Kota', 'Karnataka', 'N', 'Y', 'N'),
(565, 'Lakshmeshwar', 'Karnataka', 'N', 'Y', 'N'),
(566, 'Lingsugur', 'Karnataka', 'N', 'Y', 'N'),
(567, 'Maddur', 'Karnataka', 'N', 'Y', 'N'),
(568, 'Madhugiri', 'Karnataka', 'N', 'Y', 'N'),
(569, 'Madikeri', 'Karnataka', 'N', 'Y', 'N'),
(570, 'Magadi', 'Karnataka', 'N', 'Y', 'N'),
(571, 'Mahalingpur', 'Karnataka', 'N', 'Y', 'N'),
(572, 'Malavalli', 'Karnataka', 'N', 'Y', 'N'),
(573, 'Malur', 'Karnataka', 'N', 'Y', 'N'),
(574, 'Mandya', 'Karnataka', 'N', 'Y', 'N'),
(575, 'Mangalore', 'Karnataka', 'N', 'Y', 'N'),
(576, 'Manvi', 'Karnataka', 'N', 'Y', 'N'),
(577, 'Mudalgi', 'Karnataka', 'N', 'Y', 'N'),
(578, 'Mudbidri', 'Karnataka', 'N', 'Y', 'N'),
(579, 'Muddebihal', 'Karnataka', 'N', 'Y', 'N'),
(580, 'Mudhol', 'Karnataka', 'N', 'Y', 'N'),
(581, 'Mulbagal', 'Karnataka', 'N', 'Y', 'N'),
(582, 'Mundargi', 'Karnataka', 'N', 'Y', 'N'),
(583, 'Mysore', 'Karnataka', 'N', 'Y', 'N'),
(584, 'Nanjangud', 'Karnataka', 'N', 'Y', 'N'),
(585, 'Pavagada', 'Karnataka', 'N', 'Y', 'N'),
(586, 'Puttur', 'Karnataka', 'N', 'Y', 'N'),
(587, 'Rabkavi Banhatti', 'Karnataka', 'N', 'Y', 'N'),
(588, 'Raichur', 'Karnataka', 'N', 'Y', 'N'),
(589, 'Ramanagaram', 'Karnataka', 'N', 'Y', 'N'),
(590, 'Ramdurg', 'Karnataka', 'N', 'Y', 'N'),
(591, 'Ranibennur', 'Karnataka', 'N', 'Y', 'N'),
(592, 'Robertson Pet', 'Karnataka', 'N', 'Y', 'N'),
(593, 'Ron', 'Karnataka', 'N', 'Y', 'N'),
(594, 'Sadalgi', 'Karnataka', 'N', 'Y', 'N'),
(595, 'Sagar', 'Karnataka', 'N', 'Y', 'N'),
(596, 'Sakleshpur', 'Karnataka', 'N', 'Y', 'N'),
(597, 'Sandur', 'Karnataka', 'N', 'Y', 'N'),
(598, 'Sankeshwar', 'Karnataka', 'N', 'Y', 'N'),
(599, 'Saundatti-Yellamma', 'Karnataka', 'N', 'Y', 'N'),
(600, 'Savanur', 'Karnataka', 'N', 'Y', 'N'),
(601, 'Sedam', 'Karnataka', 'N', 'Y', 'N'),
(602, 'Shahabad', 'Karnataka', 'N', 'Y', 'N'),
(603, 'Shahpur', 'Karnataka', 'N', 'Y', 'N'),
(604, 'Shiggaon', 'Karnataka', 'N', 'Y', 'N'),
(605, 'Shikapur', 'Karnataka', 'N', 'Y', 'N'),
(606, 'Shimoga', 'Karnataka', 'N', 'Y', 'N'),
(607, 'Shorapur', 'Karnataka', 'N', 'Y', 'N'),
(608, 'Shrirangapattana', 'Karnataka', 'N', 'Y', 'N'),
(609, 'Sidlaghatta', 'Karnataka', 'N', 'Y', 'N'),
(610, 'Sindgi', 'Karnataka', 'N', 'Y', 'N'),
(611, 'Sindhnur', 'Karnataka', 'N', 'Y', 'N'),
(612, 'Sira', 'Karnataka', 'N', 'Y', 'N'),
(613, 'Sirsi', 'Karnataka', 'N', 'Y', 'N'),
(614, 'Siruguppa', 'Karnataka', 'N', 'Y', 'N'),
(615, 'Srinivaspur', 'Karnataka', 'N', 'Y', 'N'),
(616, 'Talikota', 'Karnataka', 'N', 'Y', 'N'),
(617, 'Tarikere', 'Karnataka', 'N', 'Y', 'N'),
(618, 'Tekkalakota', 'Karnataka', 'N', 'Y', 'N'),
(619, 'Terdal', 'Karnataka', 'N', 'Y', 'N'),
(620, 'Tiptur', 'Karnataka', 'N', 'Y', 'N'),
(621, 'Tumkur', 'Karnataka', 'N', 'Y', 'N'),
(622, 'Udupi', 'Karnataka', 'N', 'Y', 'N'),
(623, 'Vijayapura', 'Karnataka', 'N', 'Y', 'N'),
(624, 'Wadi', 'Karnataka', 'N', 'Y', 'N'),
(625, 'Yadgir', 'Karnataka', 'N', 'Y', 'N'),
(626, 'Adoor', 'Kerala', 'N', 'Y', 'N'),
(627, 'Akathiyoor', 'Kerala', 'N', 'Y', 'N'),
(628, 'Alappuzha', 'Kerala', 'N', 'Y', 'N'),
(629, 'Ancharakandy', 'Kerala', 'N', 'Y', 'N'),
(630, 'Aroor', 'Kerala', 'N', 'Y', 'N'),
(631, 'Ashtamichira', 'Kerala', 'N', 'Y', 'N'),
(632, 'Attingal', 'Kerala', 'N', 'Y', 'N'),
(633, 'Avinissery', 'Kerala', 'N', 'Y', 'N'),
(634, 'Chalakudy', 'Kerala', 'N', 'Y', 'N'),
(635, 'Changanassery', 'Kerala', 'N', 'Y', 'N'),
(636, 'Chendamangalam', 'Kerala', 'N', 'Y', 'N'),
(637, 'Chengannur', 'Kerala', 'N', 'Y', 'N'),
(638, 'Cherthala', 'Kerala', 'N', 'Y', 'N'),
(639, 'Cheruthazham', 'Kerala', 'N', 'Y', 'N'),
(640, 'Chittur-Thathamangalam', 'Kerala', 'N', 'Y', 'N'),
(641, 'Chockli', 'Kerala', 'N', 'Y', 'N'),
(642, 'Erattupetta', 'Kerala', 'N', 'Y', 'N'),
(643, 'Guruvayoor', 'Kerala', 'N', 'Y', 'N'),
(644, 'Irinjalakuda', 'Kerala', 'N', 'Y', 'N'),
(645, 'Kadirur', 'Kerala', 'N', 'Y', 'N'),
(646, 'Kalliasseri', 'Kerala', 'N', 'Y', 'N'),
(647, 'Kalpetta', 'Kerala', 'N', 'Y', 'N'),
(648, 'Kanhangad', 'Kerala', 'N', 'Y', 'N'),
(649, 'Kanjikkuzhi', 'Kerala', 'N', 'Y', 'N'),
(650, 'Kannur', 'Kerala', 'N', 'Y', 'N'),
(651, 'Kasaragod', 'Kerala', 'N', 'Y', 'N'),
(652, 'Kayamkulam', 'Kerala', 'N', 'Y', 'N'),
(653, 'Kochi', 'Kerala', 'N', 'Y', 'N'),
(654, 'Kodungallur', 'Kerala', 'N', 'Y', 'N'),
(655, 'Kollam', 'Kerala', 'N', 'Y', 'N'),
(656, 'Koothuparamba', 'Kerala', 'N', 'Y', 'N'),
(657, 'Kothamangalam', 'Kerala', 'N', 'Y', 'N'),
(658, 'Kottayam', 'Kerala', 'N', 'Y', 'N'),
(659, 'Kozhikode', 'Kerala', 'N', 'Y', 'N'),
(660, 'Kunnamkulam', 'Kerala', 'N', 'Y', 'N'),
(661, 'Malappuram', 'Kerala', 'N', 'Y', 'N'),
(662, 'Mattannur', 'Kerala', 'N', 'Y', 'N'),
(663, 'Mavelikkara', 'Kerala', 'N', 'Y', 'N'),
(664, 'Mavoor', 'Kerala', 'N', 'Y', 'N'),
(665, 'Muvattupuzha', 'Kerala', 'N', 'Y', 'N'),
(666, 'Nedumangad', 'Kerala', 'N', 'Y', 'N'),
(667, 'Neyyattinkara', 'Kerala', 'N', 'Y', 'N'),
(668, 'Ottappalam', 'Kerala', 'N', 'Y', 'N'),
(669, 'Palai', 'Kerala', 'N', 'Y', 'N'),
(670, 'Palakkad', 'Kerala', 'N', 'Y', 'N'),
(671, 'Panniyannur', 'Kerala', 'N', 'Y', 'N'),
(672, 'Pappinisseri', 'Kerala', 'N', 'Y', 'N'),
(673, 'Paravoor', 'Kerala', 'N', 'Y', 'N'),
(674, 'Pathanamthitta', 'Kerala', 'N', 'Y', 'N'),
(675, 'Payyannur', 'Kerala', 'N', 'Y', 'N'),
(676, 'Peringathur', 'Kerala', 'N', 'Y', 'N'),
(677, 'Perinthalmanna', 'Kerala', 'N', 'Y', 'N'),
(678, 'Perumbavoor', 'Kerala', 'N', 'Y', 'N'),
(679, 'Ponnani', 'Kerala', 'N', 'Y', 'N'),
(680, 'Punalur', 'Kerala', 'N', 'Y', 'N'),
(681, 'Quilandy', 'Kerala', 'N', 'Y', 'N'),
(682, 'Shoranur', 'Kerala', 'N', 'Y', 'N'),
(683, 'Taliparamba', 'Kerala', 'N', 'Y', 'N'),
(684, 'Thiruvalla', 'Kerala', 'N', 'Y', 'N'),
(685, 'Thiruvananthapuram', 'Kerala', 'N', 'Y', 'N'),
(686, 'Thodupuzha', 'Kerala', 'N', 'Y', 'N'),
(687, 'Thrissur', 'Kerala', 'N', 'Y', 'N'),
(688, 'Tirur', 'Kerala', 'N', 'Y', 'N'),
(689, 'Vadakara', 'Kerala', 'N', 'Y', 'N'),
(690, 'Vaikom', 'Kerala', 'N', 'Y', 'N'),
(691, 'Varkala', 'Kerala', 'N', 'Y', 'N'),
(692, 'Kavaratti', 'Lakshadweep', 'N', 'Y', 'N'),
(693, 'Ashok Nagar', 'Madhya Pradesh', 'N', 'Y', 'N'),
(694, 'Balaghat', 'Madhya Pradesh', 'N', 'Y', 'N'),
(695, 'Betul', 'Madhya Pradesh', 'N', 'Y', 'N'),
(696, 'Bhopal', 'Madhya Pradesh', 'N', 'Y', 'N'),
(697, 'Burhanpur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(698, 'Chhatarpur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(699, 'Dabra', 'Madhya Pradesh', 'N', 'Y', 'N'),
(700, 'Datia', 'Madhya Pradesh', 'N', 'Y', 'N'),
(701, 'Dewas', 'Madhya Pradesh', 'N', 'Y', 'N'),
(702, 'Dhar', 'Madhya Pradesh', 'N', 'Y', 'N'),
(703, 'Fatehabad', 'Madhya Pradesh', 'N', 'Y', 'N'),
(704, 'Gwalior', 'Madhya Pradesh', 'N', 'Y', 'N'),
(705, 'Indore', 'Madhya Pradesh', 'N', 'Y', 'N'),
(706, 'Itarsi', 'Madhya Pradesh', 'N', 'Y', 'N'),
(707, 'Jabalpur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(708, 'Katni', 'Madhya Pradesh', 'N', 'Y', 'N'),
(709, 'Kotma', 'Madhya Pradesh', 'N', 'Y', 'N'),
(710, 'Lahar', 'Madhya Pradesh', 'N', 'Y', 'N'),
(711, 'Lundi', 'Madhya Pradesh', 'N', 'Y', 'N'),
(712, 'Maharajpur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(713, 'Mahidpur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(714, 'Maihar', 'Madhya Pradesh', 'N', 'Y', 'N'),
(715, 'Malajkhand', 'Madhya Pradesh', 'N', 'Y', 'N'),
(716, 'Manasa', 'Madhya Pradesh', 'N', 'Y', 'N'),
(717, 'Manawar', 'Madhya Pradesh', 'N', 'Y', 'N'),
(718, 'Mandideep', 'Madhya Pradesh', 'N', 'Y', 'N'),
(719, 'Mandla', 'Madhya Pradesh', 'N', 'Y', 'N'),
(720, 'Mandsaur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(721, 'Mauganj', 'Madhya Pradesh', 'N', 'Y', 'N'),
(722, 'Mhow Cantonment', 'Madhya Pradesh', 'N', 'Y', 'N'),
(723, 'Mhowgaon', 'Madhya Pradesh', 'N', 'Y', 'N'),
(724, 'Morena', 'Madhya Pradesh', 'N', 'Y', 'N'),
(725, 'Multai', 'Madhya Pradesh', 'N', 'Y', 'N'),
(726, 'Murwara', 'Madhya Pradesh', 'N', 'Y', 'N'),
(727, 'Nagda', 'Madhya Pradesh', 'N', 'Y', 'N'),
(728, 'Nainpur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(729, 'Narsinghgarh', 'Madhya Pradesh', 'N', 'Y', 'N'),
(730, 'Narsinghgarh', 'Madhya Pradesh', 'N', 'Y', 'N'),
(731, 'Neemuch', 'Madhya Pradesh', 'N', 'Y', 'N'),
(732, 'Nepanagar', 'Madhya Pradesh', 'N', 'Y', 'N'),
(733, 'Niwari', 'Madhya Pradesh', 'N', 'Y', 'N'),
(734, 'Nowgong', 'Madhya Pradesh', 'N', 'Y', 'N'),
(735, 'Nowrozabad', 'Madhya Pradesh', 'N', 'Y', 'N'),
(736, 'Pachore', 'Madhya Pradesh', 'N', 'Y', 'N'),
(737, 'Pali', 'Madhya Pradesh', 'N', 'Y', 'N'),
(738, 'Panagar', 'Madhya Pradesh', 'N', 'Y', 'N'),
(739, 'Pandhurna', 'Madhya Pradesh', 'N', 'Y', 'N'),
(740, 'Panna', 'Madhya Pradesh', 'N', 'Y', 'N'),
(741, 'Pasan', 'Madhya Pradesh', 'N', 'Y', 'N'),
(742, 'Pipariya', 'Madhya Pradesh', 'N', 'Y', 'N'),
(743, 'Pithampur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(744, 'Porsa', 'Madhya Pradesh', 'N', 'Y', 'N'),
(745, 'Prithvipur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(746, 'Raghogarh-Vijaypur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(747, 'Rahatgarh', 'Madhya Pradesh', 'N', 'Y', 'N'),
(748, 'Raisen', 'Madhya Pradesh', 'N', 'Y', 'N'),
(749, 'Rajgarh', 'Madhya Pradesh', 'N', 'Y', 'N'),
(750, 'Ratlam', 'Madhya Pradesh', 'N', 'Y', 'N'),
(751, 'Rau', 'Madhya Pradesh', 'N', 'Y', 'N'),
(752, 'Rehli', 'Madhya Pradesh', 'N', 'Y', 'N'),
(753, 'Rewa', 'Madhya Pradesh', 'N', 'Y', 'N'),
(754, 'Sabalgarh', 'Madhya Pradesh', 'N', 'Y', 'N'),
(755, 'Sagar', 'Madhya Pradesh', 'N', 'Y', 'N'),
(756, 'Sanawad', 'Madhya Pradesh', 'N', 'Y', 'N'),
(757, 'Sarangpur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(758, 'Sarni', 'Madhya Pradesh', 'N', 'Y', 'N'),
(759, 'Satna', 'Madhya Pradesh', 'N', 'Y', 'N'),
(760, 'Sausar', 'Madhya Pradesh', 'N', 'Y', 'N'),
(761, 'Sehore', 'Madhya Pradesh', 'N', 'Y', 'N'),
(762, 'Sendhwa', 'Madhya Pradesh', 'N', 'Y', 'N'),
(763, 'Seoni', 'Madhya Pradesh', 'N', 'Y', 'N'),
(764, 'Seoni-Malwa', 'Madhya Pradesh', 'N', 'Y', 'N'),
(765, 'Shahdol', 'Madhya Pradesh', 'N', 'Y', 'N'),
(766, 'Shajapur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(767, 'Shamgarh', 'Madhya Pradesh', 'N', 'Y', 'N'),
(768, 'Sheopur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(769, 'Shivpuri', 'Madhya Pradesh', 'N', 'Y', 'N'),
(770, 'Shujalpur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(771, 'Sidhi', 'Madhya Pradesh', 'N', 'Y', 'N'),
(772, 'Sihora', 'Madhya Pradesh', 'N', 'Y', 'N'),
(773, 'Singrauli', 'Madhya Pradesh', 'N', 'Y', 'N'),
(774, 'Sironj', 'Madhya Pradesh', 'N', 'Y', 'N'),
(775, 'Sohagpur', 'Madhya Pradesh', 'N', 'Y', 'N'),
(776, 'Tarana', 'Madhya Pradesh', 'N', 'Y', 'N'),
(777, 'Tikamgarh', 'Madhya Pradesh', 'N', 'Y', 'N'),
(778, 'Ujhani', 'Madhya Pradesh', 'N', 'Y', 'N'),
(779, 'Ujjain', 'Madhya Pradesh', 'N', 'Y', 'N'),
(780, 'Umaria', 'Madhya Pradesh', 'N', 'Y', 'N'),
(781, 'Vidisha', 'Madhya Pradesh', 'N', 'Y', 'N'),
(782, 'Wara Seoni', 'Madhya Pradesh', 'N', 'Y', 'N'),
(783, 'Ahmednagar', 'Maharashtra', 'N', 'Y', 'N'),
(784, 'Akola', 'Maharashtra', 'N', 'Y', 'N'),
(785, 'Amravati', 'Maharashtra', 'N', 'Y', 'N'),
(786, 'Aurangabad', 'Maharashtra', 'N', 'Y', 'N'),
(787, 'Baramati', 'Maharashtra', 'N', 'Y', 'N'),
(788, 'Chalisgaon', 'Maharashtra', 'N', 'Y', 'N'),
(789, 'Chinchani', 'Maharashtra', 'N', 'Y', 'N'),
(790, 'Devgarh', 'Maharashtra', 'N', 'Y', 'N'),
(791, 'Dhule', 'Maharashtra', 'N', 'Y', 'N'),
(792, 'Dombivli', 'Maharashtra', 'N', 'Y', 'N'),
(793, 'Durgapur', 'Maharashtra', 'N', 'Y', 'N'),
(794, 'Ichalkaranji', 'Maharashtra', 'N', 'Y', 'N'),
(795, 'Jalna', 'Maharashtra', 'N', 'Y', 'N'),
(796, 'Kalyan', 'Maharashtra', 'N', 'Y', 'N'),
(797, 'Latur', 'Maharashtra', 'N', 'Y', 'N'),
(798, 'Loha', 'Maharashtra', 'N', 'Y', 'N'),
(799, 'Lonar', 'Maharashtra', 'N', 'Y', 'N'),
(800, 'Lonavla', 'Maharashtra', 'N', 'Y', 'N'),
(801, 'Mahad', 'Maharashtra', 'N', 'Y', 'N'),
(802, 'Mahuli', 'Maharashtra', 'N', 'Y', 'N'),
(803, 'Malegaon', 'Maharashtra', 'N', 'Y', 'N'),
(804, 'Malkapur', 'Maharashtra', 'N', 'Y', 'N'),
(805, 'Manchar', 'Maharashtra', 'N', 'Y', 'N'),
(806, 'Mangalvedhe', 'Maharashtra', 'N', 'Y', 'N'),
(807, 'Mangrulpir', 'Maharashtra', 'N', 'Y', 'N'),
(808, 'Manjlegaon', 'Maharashtra', 'N', 'Y', 'N'),
(809, 'Manmad', 'Maharashtra', 'N', 'Y', 'N'),
(810, 'Manwath', 'Maharashtra', 'N', 'Y', 'N'),
(811, 'Mehkar', 'Maharashtra', 'N', 'Y', 'N'),
(812, 'Mhaswad', 'Maharashtra', 'N', 'Y', 'N'),
(813, 'Miraj', 'Maharashtra', 'N', 'Y', 'N'),
(814, 'Morshi', 'Maharashtra', 'N', 'Y', 'N'),
(815, 'Mukhed', 'Maharashtra', 'N', 'Y', 'N'),
(816, 'Mul', 'Maharashtra', 'N', 'Y', 'N'),
(817, 'Mumbai', 'Maharashtra', 'N', 'Y', 'N'),
(818, 'Murtijapur', 'Maharashtra', 'N', 'Y', 'N'),
(819, 'Nagpur', 'Maharashtra', 'N', 'Y', 'N'),
(820, 'Nalasopara', 'Maharashtra', 'N', 'Y', 'N'),
(821, 'Nanded-Waghala', 'Maharashtra', 'N', 'Y', 'N'),
(822, 'Nandgaon', 'Maharashtra', 'N', 'Y', 'N'),
(823, 'Nandura', 'Maharashtra', 'N', 'Y', 'N'),
(824, 'Nandurbar', 'Maharashtra', 'N', 'Y', 'N'),
(825, 'Narkhed', 'Maharashtra', 'N', 'Y', 'N'),
(826, 'Nashik', 'Maharashtra', 'N', 'Y', 'N'),
(827, 'Navi Mumbai', 'Maharashtra', 'N', 'Y', 'N'),
(828, 'Nawapur', 'Maharashtra', 'N', 'Y', 'N'),
(829, 'Nilanga', 'Maharashtra', 'N', 'Y', 'N'),
(830, 'Osmanabad', 'Maharashtra', 'N', 'Y', 'N'),
(831, 'Ozar', 'Maharashtra', 'N', 'Y', 'N'),
(832, 'Pachora', 'Maharashtra', 'N', 'Y', 'N'),
(833, 'Paithan', 'Maharashtra', 'N', 'Y', 'N'),
(834, 'Palghar', 'Maharashtra', 'N', 'Y', 'N'),
(835, 'Pandharkaoda', 'Maharashtra', 'N', 'Y', 'N'),
(836, 'Pandharpur', 'Maharashtra', 'N', 'Y', 'N'),
(837, 'Panvel', 'Maharashtra', 'N', 'Y', 'N'),
(838, 'Parbhani', 'Maharashtra', 'N', 'Y', 'N'),
(839, 'Parli', 'Maharashtra', 'N', 'Y', 'N'),
(840, 'Parola', 'Maharashtra', 'N', 'Y', 'N'),
(841, 'Partur', 'Maharashtra', 'N', 'Y', 'N'),
(842, 'Pathardi', 'Maharashtra', 'N', 'Y', 'N'),
(843, 'Pathri', 'Maharashtra', 'N', 'Y', 'N'),
(844, 'Patur', 'Maharashtra', 'N', 'Y', 'N'),
(845, 'Pauni', 'Maharashtra', 'N', 'Y', 'N'),
(846, 'Pen', 'Maharashtra', 'N', 'Y', 'N'),
(847, 'Phaltan', 'Maharashtra', 'N', 'Y', 'N'),
(848, 'Pulgaon', 'Maharashtra', 'N', 'Y', 'N'),
(849, 'Pune', 'Maharashtra', 'N', 'Y', 'N'),
(850, 'Purna', 'Maharashtra', 'N', 'Y', 'N'),
(851, 'Pusad', 'Maharashtra', 'N', 'Y', 'N'),
(852, 'Rahuri', 'Maharashtra', 'N', 'Y', 'N'),
(853, 'Rajura', 'Maharashtra', 'N', 'Y', 'N'),
(854, 'Ramtek', 'Maharashtra', 'N', 'Y', 'N'),
(855, 'Ratnagiri', 'Maharashtra', 'N', 'Y', 'N'),
(856, 'Raver', 'Maharashtra', 'N', 'Y', 'N'),
(857, 'Risod', 'Maharashtra', 'N', 'Y', 'N'),
(858, 'Sailu', 'Maharashtra', 'N', 'Y', 'N'),
(859, 'Sangamner', 'Maharashtra', 'N', 'Y', 'N'),
(860, 'Sangli', 'Maharashtra', 'N', 'Y', 'N'),
(861, 'Sangole', 'Maharashtra', 'N', 'Y', 'N'),
(862, 'Sasvad', 'Maharashtra', 'N', 'Y', 'N'),
(863, 'Satana', 'Maharashtra', 'N', 'Y', 'N'),
(864, 'Satara', 'Maharashtra', 'N', 'Y', 'N'),
(865, 'Savner', 'Maharashtra', 'N', 'Y', 'N'),
(866, 'Sawantwadi', 'Maharashtra', 'N', 'Y', 'N'),
(867, 'Shahade', 'Maharashtra', 'N', 'Y', 'N'),
(868, 'Shegaon', 'Maharashtra', 'N', 'Y', 'N'),
(869, 'Shendurjana', 'Maharashtra', 'N', 'Y', 'N'),
(870, 'Shirdi', 'Maharashtra', 'N', 'Y', 'N'),
(871, 'Shirpur-Warwade', 'Maharashtra', 'N', 'Y', 'N'),
(872, 'Shirur', 'Maharashtra', 'N', 'Y', 'N'),
(873, 'Shrigonda', 'Maharashtra', 'N', 'Y', 'N'),
(874, 'Shrirampur', 'Maharashtra', 'N', 'Y', 'N'),
(875, 'Sillod', 'Maharashtra', 'N', 'Y', 'N'),
(876, 'Sinnar', 'Maharashtra', 'N', 'Y', 'N'),
(877, 'Solapur', 'Maharashtra', 'N', 'Y', 'N'),
(878, 'Soyagaon', 'Maharashtra', 'N', 'Y', 'N'),
(879, 'Talegaon Dabhade', 'Maharashtra', 'N', 'Y', 'N'),
(880, 'Talode', 'Maharashtra', 'N', 'Y', 'N'),
(881, 'Tasgaon', 'Maharashtra', 'N', 'Y', 'N'),
(882, 'Tirora', 'Maharashtra', 'N', 'Y', 'N'),
(883, 'Tuljapur', 'Maharashtra', 'N', 'Y', 'N'),
(884, 'Tumsar', 'Maharashtra', 'N', 'Y', 'N'),
(885, 'Uran', 'Maharashtra', 'N', 'Y', 'N'),
(886, 'Uran Islampur', 'Maharashtra', 'N', 'Y', 'N'),
(887, 'Wadgaon Road', 'Maharashtra', 'N', 'Y', 'N'),
(888, 'Wai', 'Maharashtra', 'N', 'Y', 'N'),
(889, 'Wani', 'Maharashtra', 'N', 'Y', 'N'),
(890, 'Wardha', 'Maharashtra', 'N', 'Y', 'N'),
(891, 'Warora', 'Maharashtra', 'N', 'Y', 'N'),
(892, 'Warud', 'Maharashtra', 'N', 'Y', 'N'),
(893, 'Washim', 'Maharashtra', 'N', 'Y', 'N'),
(894, 'Yevla', 'Maharashtra', 'N', 'Y', 'N'),
(895, 'Uchgaon', 'Maharashtra', 'N', 'Y', 'N'),
(896, 'Udgir', 'Maharashtra', 'N', 'Y', 'N'),
(897, 'Umarga', 'Maharastra', 'N', 'Y', 'N'),
(898, 'Umarkhed', 'Maharastra', 'N', 'Y', 'N'),
(899, 'Umred', 'Maharastra', 'N', 'Y', 'N'),
(900, 'Vadgaon Kasba', 'Maharastra', 'N', 'Y', 'N'),
(901, 'Vaijapur', 'Maharastra', 'N', 'Y', 'N'),
(902, 'Vasai', 'Maharastra', 'N', 'Y', 'N'),
(903, 'Virar', 'Maharastra', 'N', 'Y', 'N'),
(904, 'Vita', 'Maharastra', 'N', 'Y', 'N'),
(905, 'Yavatmal', 'Maharastra', 'N', 'Y', 'N'),
(906, 'Yawal', 'Maharastra', 'N', 'Y', 'N'),
(907, 'Imphal', 'Manipur', 'N', 'Y', 'N'),
(908, 'Kakching', 'Manipur', 'N', 'Y', 'N'),
(909, 'Lilong', 'Manipur', 'N', 'Y', 'N'),
(910, 'Mayang Imphal', 'Manipur', 'N', 'Y', 'N'),
(911, 'Thoubal', 'Manipur', 'N', 'Y', 'N'),
(912, 'Jowai', 'Meghalaya', 'N', 'Y', 'N'),
(913, 'Nongstoin', 'Meghalaya', 'N', 'Y', 'N'),
(914, 'Shillong', 'Meghalaya', 'N', 'Y', 'N'),
(915, 'Tura', 'Meghalaya', 'N', 'Y', 'N'),
(916, 'Aizawl', 'Mizoram', 'N', 'Y', 'N'),
(917, 'Champhai', 'Mizoram', 'N', 'Y', 'N'),
(918, 'Lunglei', 'Mizoram', 'N', 'Y', 'N'),
(919, 'Saiha', 'Mizoram', 'N', 'Y', 'N'),
(920, 'Dimapur', 'Nagaland', 'N', 'Y', 'N'),
(921, 'Kohima', 'Nagaland', 'N', 'Y', 'N'),
(922, 'Mokokchung', 'Nagaland', 'N', 'Y', 'N'),
(923, 'Tuensang', 'Nagaland', 'N', 'Y', 'N'),
(924, 'Wokha', 'Nagaland', 'N', 'Y', 'N'),
(925, 'Zunheboto', 'Nagaland', 'N', 'Y', 'N'),
(950, 'Anandapur', 'Orissa', 'N', 'Y', 'N'),
(951, 'Anugul', 'Orissa', 'N', 'Y', 'N'),
(952, 'Asika', 'Orissa', 'N', 'Y', 'N'),
(953, 'Balangir', 'Orissa', 'N', 'Y', 'N'),
(954, 'Balasore', 'Orissa', 'N', 'Y', 'N'),
(955, 'Baleshwar', 'Orissa', 'N', 'Y', 'N'),
(956, 'Bamra', 'Orissa', 'N', 'Y', 'N'),
(957, 'Barbil', 'Orissa', 'N', 'Y', 'N'),
(958, 'Bargarh', 'Orissa', 'N', 'Y', 'N'),
(959, 'Bargarh', 'Orissa', 'N', 'Y', 'N'),
(960, 'Baripada', 'Orissa', 'N', 'Y', 'N'),
(961, 'Basudebpur', 'Orissa', 'N', 'Y', 'N'),
(962, 'Belpahar', 'Orissa', 'N', 'Y', 'N'),
(963, 'Bhadrak', 'Orissa', 'N', 'Y', 'N'),
(964, 'Bhawanipatna', 'Orissa', 'N', 'Y', 'N'),
(965, 'Bhuban', 'Orissa', 'N', 'Y', 'N'),
(966, 'Bhubaneswar', 'Orissa', 'N', 'Y', 'N'),
(967, 'Biramitrapur', 'Orissa', 'N', 'Y', 'N'),
(968, 'Brahmapur', 'Orissa', 'N', 'Y', 'N'),
(969, 'Brajrajnagar', 'Orissa', 'N', 'Y', 'N'),
(970, 'Byasanagar', 'Orissa', 'N', 'Y', 'N'),
(971, 'Cuttack', 'Orissa', 'N', 'Y', 'N'),
(972, 'Debagarh', 'Orissa', 'N', 'Y', 'N'),
(973, 'Dhenkanal', 'Orissa', 'N', 'Y', 'N'),
(974, 'Gunupur', 'Orissa', 'N', 'Y', 'N'),
(975, 'Hinjilicut', 'Orissa', 'N', 'Y', 'N'),
(976, 'Jagatsinghapur', 'Orissa', 'N', 'Y', 'N'),
(977, 'Jajapur', 'Orissa', 'N', 'Y', 'N'),
(978, 'Jaleswar', 'Orissa', 'N', 'Y', 'N'),
(979, 'Jatani', 'Orissa', 'N', 'Y', 'N'),
(980, 'Jeypur', 'Orissa', 'N', 'Y', 'N'),
(981, 'Jharsuguda', 'Orissa', 'N', 'Y', 'N'),
(982, 'Joda', 'Orissa', 'N', 'Y', 'N'),
(983, 'Kantabanji', 'Orissa', 'N', 'Y', 'N'),
(984, 'Karanjia', 'Orissa', 'N', 'Y', 'N'),
(985, 'Kendrapara', 'Orissa', 'N', 'Y', 'N'),
(986, 'Kendujhar', 'Orissa', 'N', 'Y', 'N'),
(987, 'Khordha', 'Orissa', 'N', 'Y', 'N'),
(988, 'Koraput', 'Orissa', 'N', 'Y', 'N'),
(989, 'Malkangiri', 'Orissa', 'N', 'Y', 'N'),
(990, 'Nabarangapur', 'Orissa', 'N', 'Y', 'N'),
(991, 'Paradip', 'Orissa', 'N', 'Y', 'N'),
(992, 'Parlakhemundi', 'Orissa', 'N', 'Y', 'N'),
(993, 'Pattamundai', 'Orissa', 'N', 'Y', 'N'),
(994, 'Phulabani', 'Orissa', 'N', 'Y', 'N'),
(995, 'Puri', 'Orissa', 'N', 'Y', 'N'),
(996, 'Rairangpur', 'Orissa', 'N', 'Y', 'N'),
(997, 'Rajagangapur', 'Orissa', 'N', 'Y', 'N'),
(998, 'Raurkela', 'Orissa', 'N', 'Y', 'N'),
(999, 'Rayagada', 'Orissa', 'N', 'Y', 'N'),
(1000, 'Sambalpur', 'Orissa', 'N', 'Y', 'N'),
(1001, 'Soro', 'Orissa', 'N', 'Y', 'N'),
(1002, 'Sunabeda', 'Orissa', 'N', 'Y', 'N'),
(1003, 'Sundargarh', 'Orissa', 'N', 'Y', 'N'),
(1004, 'Talcher', 'Orissa', 'N', 'Y', 'N'),
(1005, 'Titlagarh', 'Orissa', 'N', 'Y', 'N'),
(1006, 'Umarkote', 'Orissa', 'N', 'Y', 'N'),
(1007, 'Karaikal', 'Pondicherry', 'N', 'Y', 'N'),
(1008, 'Mahe', 'Pondicherry', 'N', 'Y', 'N'),
(1009, 'Pondicherry', 'Pondicherry', 'N', 'Y', 'N'),
(1010, 'Yanam', 'Pondicherry', 'N', 'Y', 'N'),
(1011, 'Ahmedgarh', 'Punjab', 'N', 'Y', 'N'),
(1012, 'Amritsar', 'Punjab', 'N', 'Y', 'N'),
(1013, 'Barnala', 'Punjab', 'N', 'Y', 'N'),
(1014, 'Batala', 'Punjab', 'N', 'Y', 'N'),
(1015, 'Bathinda', 'Punjab', 'N', 'Y', 'N'),
(1016, 'Bhagha Purana', 'Punjab', 'N', 'Y', 'N'),
(1017, 'Budhlada', 'Punjab', 'N', 'Y', 'N'),
(1018, 'Chandigarh', 'Punjab', 'N', 'Y', 'N'),
(1019, 'Dasua', 'Punjab', 'N', 'Y', 'N'),
(1020, 'Dhuri', 'Punjab', 'N', 'Y', 'N'),
(1021, 'Dinanagar', 'Punjab', 'N', 'Y', 'N'),
(1022, 'Faridkot', 'Punjab', 'N', 'Y', 'N'),
(1023, 'Fazilka', 'Punjab', 'N', 'Y', 'N'),
(1024, 'Firozpur', 'Punjab', 'N', 'Y', 'N'),
(1025, 'Firozpur Cantt.', 'Punjab', 'N', 'Y', 'N'),
(1026, 'Giddarbaha', 'Punjab', 'N', 'Y', 'N'),
(1027, 'Gobindgarh', 'Punjab', 'N', 'Y', 'N'),
(1028, 'Gurdaspur', 'Punjab', 'N', 'Y', 'N'),
(1029, 'Hoshiarpur', 'Punjab', 'N', 'Y', 'N'),
(1030, 'Jagraon', 'Punjab', 'N', 'Y', 'N'),
(1031, 'Jaitu', 'Punjab', 'N', 'Y', 'N'),
(1032, 'Jalalabad', 'Punjab', 'N', 'Y', 'N'),
(1033, 'Jalandhar', 'Punjab', 'N', 'Y', 'N'),
(1034, 'Jalandhar Cantt.', 'Punjab', 'N', 'Y', 'N'),
(1035, 'Jandiala', 'Punjab', 'N', 'Y', 'N'),
(1036, 'Kapurthala', 'Punjab', 'N', 'Y', 'N'),
(1037, 'Karoran', 'Punjab', 'N', 'Y', 'N'),
(1038, 'Kartarpur', 'Punjab', 'N', 'Y', 'N'),
(1039, 'Khanna', 'Punjab', 'N', 'Y', 'N'),
(1040, 'Kharar', 'Punjab', 'N', 'Y', 'N'),
(1041, 'Kot Kapura', 'Punjab', 'N', 'Y', 'N'),
(1042, 'Kurali', 'Punjab', 'N', 'Y', 'N'),
(1043, 'Longowal', 'Punjab', 'N', 'Y', 'N'),
(1044, 'Ludhiana', 'Punjab', 'N', 'Y', 'N'),
(1045, 'Malerkotla', 'Punjab', 'N', 'Y', 'N'),
(1046, 'Malout', 'Punjab', 'N', 'Y', 'N'),
(1047, 'Mansa', 'Punjab', 'N', 'Y', 'N'),
(1048, 'Maur', 'Punjab', 'N', 'Y', 'N'),
(1049, 'Moga', 'Punjab', 'N', 'Y', 'N'),
(1050, 'Mohali', 'Punjab', 'N', 'Y', 'N'),
(1051, 'Morinda', 'Punjab', 'N', 'Y', 'N'),
(1052, 'Mukerian', 'Punjab', 'N', 'Y', 'N'),
(1053, 'Muktsar', 'Punjab', 'N', 'Y', 'N'),
(1054, 'Nabha', 'Punjab', 'N', 'Y', 'N'),
(1055, 'Nakodar', 'Punjab', 'N', 'Y', 'N'),
(1056, 'Nangal', 'Punjab', 'N', 'Y', 'N'),
(1057, 'Nawanshahr', 'Punjab', 'N', 'Y', 'N'),
(1058, 'Pathankot', 'Punjab', 'N', 'Y', 'N'),
(1059, 'Patiala', 'Punjab', 'N', 'Y', 'N'),
(1060, 'Patran', 'Punjab', 'N', 'Y', 'N'),
(1061, 'Patti', 'Punjab', 'N', 'Y', 'N'),
(1062, 'Phagwara', 'Punjab', 'N', 'Y', 'N'),
(1063, 'Phillaur', 'Punjab', 'N', 'Y', 'N'),
(1064, 'Qadian', 'Punjab', 'N', 'Y', 'N'),
(1065, 'Raikot', 'Punjab', 'N', 'Y', 'N'),
(1066, 'Rajpura', 'Punjab', 'N', 'Y', 'N'),
(1067, 'Rampura Phul', 'Punjab', 'N', 'Y', 'N'),
(1068, 'Rupnagar', 'Punjab', 'N', 'Y', 'N'),
(1069, 'Samana', 'Punjab', 'N', 'Y', 'N'),
(1070, 'Sangrur', 'Punjab', 'N', 'Y', 'N'),
(1071, 'Sirhind Fatehgarh Sahib', 'Punjab', 'N', 'Y', 'N'),
(1072, 'Sujanpur', 'Punjab', 'N', 'Y', 'N'),
(1073, 'Sunam', 'Punjab', 'N', 'Y', 'N'),
(1074, 'Talwara', 'Punjab', 'N', 'Y', 'N'),
(1075, 'Tarn Taran', 'Punjab', 'N', 'Y', 'N'),
(1076, 'Urmar Tanda', 'Punjab', 'N', 'Y', 'N'),
(1077, 'Zira', 'Punjab', 'N', 'Y', 'N'),
(1078, 'Zirakpur', 'Punjab', 'N', 'Y', 'N'),
(1079, 'Bali', 'Rajasthan', 'N', 'Y', 'N'),
(1080, 'Banswara', 'Rajastan', 'N', 'Y', 'N'),
(1081, 'Ajmer', 'Rajasthan', 'N', 'Y', 'N'),
(1082, 'Alwar', 'Rajasthan', 'N', 'Y', 'N'),
(1083, 'Bandikui', 'Rajasthan', 'N', 'Y', 'N'),
(1084, 'Baran', 'Rajasthan', 'N', 'Y', 'N'),
(1085, 'Barmer', 'Rajasthan', 'N', 'Y', 'N'),
(1086, 'Bikaner', 'Rajasthan', 'N', 'Y', 'N'),
(1087, 'Fatehpur', 'Rajasthan', 'N', 'Y', 'N'),
(1088, 'Jaipur', 'Rajasthan', 'N', 'Y', 'N'),
(1089, 'Jaisalmer', 'Rajasthan', 'N', 'Y', 'N'),
(1090, 'Jodhpur', 'Rajasthan', 'N', 'Y', 'N'),
(1091, 'Kota', 'Rajasthan', 'N', 'Y', 'N'),
(1092, 'Lachhmangarh', 'Rajasthan', 'N', 'Y', 'N'),
(1093, 'Ladnu', 'Rajasthan', 'N', 'Y', 'N'),
(1094, 'Lakheri', 'Rajasthan', 'N', 'Y', 'N'),
(1095, 'Lalsot', 'Rajasthan', 'N', 'Y', 'N'),
(1096, 'Losal', 'Rajasthan', 'N', 'Y', 'N'),
(1097, 'Makrana', 'Rajasthan', 'N', 'Y', 'N'),
(1098, 'Malpura', 'Rajasthan', 'N', 'Y', 'N'),
(1099, 'Mandalgarh', 'Rajasthan', 'N', 'Y', 'N'),
(1100, 'Mandawa', 'Rajasthan', 'N', 'Y', 'N'),
(1101, 'Mangrol', 'Rajasthan', 'N', 'Y', 'N'),
(1102, 'Merta City', 'Rajasthan', 'N', 'Y', 'N'),
(1103, 'Mount Abu', 'Rajasthan', 'N', 'Y', 'N'),
(1104, 'Nadbai', 'Rajasthan', 'N', 'Y', 'N'),
(1105, 'Nagar', 'Rajasthan', 'N', 'Y', 'N'),
(1106, 'Nagaur', 'Rajasthan', 'N', 'Y', 'N'),
(1107, 'Nargund', 'Rajasthan', 'N', 'Y', 'N'),
(1108, 'Nasirabad', 'Rajasthan', 'N', 'Y', 'N'),
(1109, 'Nathdwara', 'Rajasthan', 'N', 'Y', 'N'),
(1110, 'Navalgund', 'Rajasthan', 'N', 'Y', 'N'),
(1111, 'Nawalgarh', 'Rajasthan', 'N', 'Y', 'N'),
(1112, 'Neem-Ka-Thana', 'Rajasthan', 'N', 'Y', 'N'),
(1113, 'Nelamangala', 'Rajasthan', 'N', 'Y', 'N'),
(1114, 'Nimbahera', 'Rajasthan', 'N', 'Y', 'N'),
(1115, 'Nipani', 'Rajasthan', 'N', 'Y', 'N'),
(1116, 'Niwai', 'Rajasthan', 'N', 'Y', 'N'),
(1117, 'Nohar', 'Rajasthan', 'N', 'Y', 'N'),
(1118, 'Nokha', 'Rajasthan', 'N', 'Y', 'N'),
(1119, 'Pali', 'Rajasthan', 'N', 'Y', 'N'),
(1120, 'Phalodi', 'Rajasthan', 'N', 'Y', 'N'),
(1121, 'Phulera', 'Rajasthan', 'N', 'Y', 'N'),
(1122, 'Pilani', 'Rajasthan', 'N', 'Y', 'N'),
(1123, 'Pilibanga', 'Rajasthan', 'N', 'Y', 'N'),
(1124, 'Pindwara', 'Rajasthan', 'N', 'Y', 'N'),
(1125, 'Pipar City', 'Rajasthan', 'N', 'Y', 'N'),
(1126, 'Prantij', 'Rajasthan', 'N', 'Y', 'N'),
(1127, 'Pratapgarh', 'Rajasthan', 'N', 'Y', 'N'),
(1128, 'Raisinghnagar', 'Rajasthan', 'N', 'Y', 'N'),
(1129, 'Rajakhera', 'Rajasthan', 'N', 'Y', 'N'),
(1130, 'Rajaldesar', 'Rajasthan', 'N', 'Y', 'N'),
(1131, 'Rajgarh (Alwar)', 'Rajasthan', 'N', 'Y', 'N');
INSERT INTO `hr_cities` (`city_id`, `city_name`, `name`, `is_selected`, `is_active`, `delete_flag`) VALUES
(1132, 'Rajgarh (Churu', 'Rajasthan', 'N', 'Y', 'N'),
(1133, 'Rajsamand', 'Rajasthan', 'N', 'Y', 'N'),
(1134, 'Ramganj Mandi', 'Rajasthan', 'N', 'Y', 'N'),
(1135, 'Ramngarh', 'Rajasthan', 'N', 'Y', 'N'),
(1136, 'Ratangarh', 'Rajasthan', 'N', 'Y', 'N'),
(1137, 'Rawatbhata', 'Rajasthan', 'N', 'Y', 'N'),
(1138, 'Rawatsar', 'Rajasthan', 'N', 'Y', 'N'),
(1139, 'Reengus', 'Rajasthan', 'N', 'Y', 'N'),
(1140, 'Sadri', 'Rajasthan', 'N', 'Y', 'N'),
(1141, 'Sadulshahar', 'Rajasthan', 'N', 'Y', 'N'),
(1142, 'Sagwara', 'Rajasthan', 'N', 'Y', 'N'),
(1143, 'Sambhar', 'Rajasthan', 'N', 'Y', 'N'),
(1144, 'Sanchore', 'Rajasthan', 'N', 'Y', 'N'),
(1145, 'Sangaria', 'Rajasthan', 'N', 'Y', 'N'),
(1146, 'Sardarshahar', 'Rajasthan', 'N', 'Y', 'N'),
(1147, 'Sawai Madhopur', 'Rajasthan', 'N', 'Y', 'N'),
(1148, 'Shahpura', 'Rajasthan', 'N', 'Y', 'N'),
(1149, 'Shahpura', 'Rajasthan', 'N', 'Y', 'N'),
(1150, 'Sheoganj', 'Rajasthan', 'N', 'Y', 'N'),
(1151, 'Sikar', 'Rajasthan', 'N', 'Y', 'N'),
(1152, 'Sirohi', 'Rajasthan', 'N', 'Y', 'N'),
(1153, 'Sojat', 'Rajasthan', 'N', 'Y', 'N'),
(1154, 'Sri Madhopur', 'Rajasthan', 'N', 'Y', 'N'),
(1155, 'Sujangarh', 'Rajasthan', 'N', 'Y', 'N'),
(1156, 'Sumerpur', 'Rajasthan', 'N', 'Y', 'N'),
(1157, 'Suratgarh', 'Rajasthan', 'N', 'Y', 'N'),
(1158, 'Taranagar', 'Rajasthan', 'N', 'Y', 'N'),
(1159, 'Todabhim', 'Rajasthan', 'N', 'Y', 'N'),
(1160, 'Todaraisingh', 'Rajasthan', 'N', 'Y', 'N'),
(1161, 'Tonk', 'Rajasthan', 'N', 'Y', 'N'),
(1162, 'Udaipur', 'Rajasthan', 'N', 'Y', 'N'),
(1163, 'Udaipurwati', 'Rajasthan', 'N', 'Y', 'N'),
(1164, 'Vijainagar', 'Rajasthan', 'N', 'Y', 'N'),
(1165, 'Gangtok', 'Sikkim', 'N', 'Y', 'N'),
(1166, 'Calcutta', 'West Bengal', 'N', 'Y', 'N'),
(1167, 'Arakkonam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1168, 'Arcot', 'Tamil Nadu', 'N', 'Y', 'N'),
(1169, 'Aruppukkottai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1170, 'Bhavani', 'Tamil Nadu', 'N', 'Y', 'N'),
(1171, 'Chengalpattu', 'Tamil Nadu', 'N', 'Y', 'N'),
(1172, 'Chennai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1173, 'Chinna salem', 'Tamil nadu', 'N', 'Y', 'N'),
(1174, 'Coimbatore', 'Tamil Nadu', 'N', 'Y', 'N'),
(1175, 'Coonoor', 'Tamil Nadu', 'N', 'Y', 'N'),
(1176, 'Cuddalore', 'Tamil Nadu', 'N', 'Y', 'N'),
(1177, 'Dharmapuri', 'Tamil Nadu', 'N', 'Y', 'N'),
(1178, 'Dindigul', 'Tamil Nadu', 'N', 'Y', 'N'),
(1179, 'Erode', 'Tamil Nadu', 'N', 'Y', 'N'),
(1180, 'Gudalur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1181, 'Gudalur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1182, 'Gudalur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1183, 'Kanchipuram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1184, 'Karaikudi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1185, 'Karungal', 'Tamil Nadu', 'N', 'Y', 'N'),
(1186, 'Karur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1187, 'Kollankodu', 'Tamil Nadu', 'N', 'Y', 'N'),
(1188, 'Lalgudi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1189, 'Madurai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1190, 'Nagapattinam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1191, 'Nagercoil', 'Tamil Nadu', 'N', 'Y', 'N'),
(1192, 'Namagiripettai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1193, 'Namakkal', 'Tamil Nadu', 'N', 'Y', 'N'),
(1194, 'Nandivaram-Guduvancheri', 'Tamil Nadu', 'N', 'Y', 'N'),
(1195, 'Nanjikottai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1196, 'Natham', 'Tamil Nadu', 'N', 'Y', 'N'),
(1197, 'Nellikuppam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1198, 'Neyveli', 'Tamil Nadu', 'N', 'Y', 'N'),
(1199, 'O\' Valley', 'Tamil Nadu', 'N', 'Y', 'N'),
(1200, 'Oddanchatram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1201, 'P.N.Patti', 'Tamil Nadu', 'N', 'Y', 'N'),
(1202, 'Pacode', 'Tamil Nadu', 'N', 'Y', 'N'),
(1203, 'Padmanabhapuram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1204, 'Palani', 'Tamil Nadu', 'N', 'Y', 'N'),
(1205, 'Palladam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1206, 'Pallapatti', 'Tamil Nadu', 'N', 'Y', 'N'),
(1207, 'Pallikonda', 'Tamil Nadu', 'N', 'Y', 'N'),
(1208, 'Panagudi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1209, 'Panruti', 'Tamil Nadu', 'N', 'Y', 'N'),
(1210, 'Paramakudi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1211, 'Parangipettai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1212, 'Pattukkottai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1213, 'Perambalur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1214, 'Peravurani', 'Tamil Nadu', 'N', 'Y', 'N'),
(1215, 'Periyakulam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1216, 'Periyasemur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1217, 'Pernampattu', 'Tamil Nadu', 'N', 'Y', 'N'),
(1218, 'Pollachi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1219, 'Polur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1220, 'Ponneri', 'Tamil Nadu', 'N', 'Y', 'N'),
(1221, 'Pudukkottai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1222, 'Pudupattinam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1223, 'Puliyankudi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1224, 'Punjaipugalur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1225, 'Rajapalayam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1226, 'Ramanathapuram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1227, 'Rameshwaram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1228, 'Rasipuram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1229, 'Salem', 'Tamil Nadu', 'N', 'Y', 'N'),
(1230, 'Sankarankoil', 'Tamil Nadu', 'N', 'Y', 'N'),
(1231, 'Sankari', 'Tamil Nadu', 'N', 'Y', 'N'),
(1232, 'Sathyamangalam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1233, 'Sattur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1234, 'Shenkottai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1235, 'Sholavandan', 'Tamil Nadu', 'N', 'Y', 'N'),
(1236, 'Sholingur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1237, 'Sirkali', 'Tamil Nadu', 'N', 'Y', 'N'),
(1238, 'Sivaganga', 'Tamil Nadu', 'N', 'Y', 'N'),
(1239, 'Sivagiri', 'Tamil Nadu', 'N', 'Y', 'N'),
(1240, 'Sivakasi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1241, 'Srivilliputhur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1242, 'Surandai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1243, 'Suriyampalayam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1244, 'Tenkasi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1245, 'Thammampatti', 'Tamil Nadu', 'N', 'Y', 'N'),
(1246, 'Thanjavur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1247, 'Tharamangalam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1248, 'Tharangambadi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1249, 'Theni Allinagaram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1250, 'Thirumangalam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1251, 'Thirunindravur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1252, 'Thiruparappu', 'Tamil Nadu', 'N', 'Y', 'N'),
(1253, 'Thirupuvanam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1254, 'Thiruthuraipoondi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1255, 'Thiruvallur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1256, 'Thiruvarur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1257, 'Thoothukudi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1258, 'Thuraiyur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1259, 'Tindivanam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1260, 'Tiruchendur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1261, 'Tiruchengode', 'Tamil Nadu', 'N', 'Y', 'N'),
(1262, 'Tiruchirappalli', 'Tamil Nadu', 'N', 'Y', 'N'),
(1263, 'Tirukalukundram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1264, 'Tirukkoyilur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1265, 'Tirunelveli', 'Tamil Nadu', 'N', 'Y', 'N'),
(1266, 'Tirupathur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1267, 'Tirupathur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1268, 'Tiruppur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1269, 'Tiruttani', 'Tamil Nadu', 'N', 'Y', 'N'),
(1270, 'Tiruvannamalai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1271, 'Tiruvethipuram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1272, 'Tittakudi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1273, 'Udhagamandalam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1274, 'Udumalaipettai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1275, 'Unnamalaikadai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1276, 'Usilampatti', 'Tamil Nadu', 'N', 'Y', 'N'),
(1277, 'Uthamapalayam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1278, 'Uthiramerur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1279, 'Vadakkuvalliyur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1280, 'Vadalur', 'Tamil Nadu', 'N', 'Y', 'N'),
(1281, 'Vadipatti', 'Tamil Nadu', 'N', 'Y', 'N'),
(1282, 'Valparai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1283, 'Vandavasi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1284, 'Vaniyambadi', 'Tamil Nadu', 'N', 'Y', 'N'),
(1285, 'Vedaranyam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1286, 'Vellakoil', 'Tamil Nadu', 'N', 'Y', 'N'),
(1287, 'Vellore', 'Tamil Nadu', 'N', 'Y', 'N'),
(1288, 'Vikramasingapuram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1289, 'Viluppuram', 'Tamil Nadu', 'N', 'Y', 'N'),
(1290, 'Virudhachalam', 'Tamil Nadu', 'N', 'Y', 'N'),
(1291, 'Virudhunagar', 'Tamil Nadu', 'N', 'Y', 'N'),
(1292, 'Viswanatham', 'Tamil Nadu', 'N', 'Y', 'N'),
(1293, 'Agartala', 'Tripura', 'N', 'Y', 'N'),
(1294, 'Badharghat', 'Tripura', 'N', 'Y', 'N'),
(1295, 'Dharmanagar', 'Tripura', 'N', 'Y', 'N'),
(1296, 'Indranagar', 'Tripura', 'N', 'Y', 'N'),
(1297, 'Jogendranagar', 'Tripura', 'N', 'Y', 'N'),
(1298, 'Kailasahar', 'Tripura', 'N', 'Y', 'N'),
(1299, 'Khowai', 'Tripura', 'N', 'Y', 'N'),
(1300, 'Pratapgarh', 'Tripura', 'N', 'Y', 'N'),
(1301, 'Udaipur', 'Tripura', 'N', 'Y', 'N'),
(1302, 'Achhnera', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1303, 'Adari', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1304, 'Agra', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1305, 'Aligarh', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1306, 'Allahabad', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1307, 'Amroha', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1308, 'Azamgarh', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1309, 'Bahraich', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1310, 'Ballia', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1311, 'Balrampur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1312, 'Banda', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1313, 'Bareilly', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1314, 'Chandausi', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1315, 'Dadri', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1316, 'Deoria', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1317, 'Etawah', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1318, 'Fatehabad', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1319, 'Fatehpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1320, 'Fatehpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1321, 'Greater Noida', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1322, 'Hamirpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1323, 'Hardoi', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1324, 'Jajmau', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1325, 'Jaunpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1326, 'Jhansi', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1327, 'Kalpi', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1328, 'Kanpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1329, 'Kota', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1330, 'Laharpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1331, 'Lakhimpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1332, 'Lal Gopalganj Nindaura', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1333, 'Lalganj', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1334, 'Lalitpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1335, 'Lar', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1336, 'Loni', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1337, 'Lucknow', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1338, 'Mathura', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1339, 'Meerut', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1340, 'Modinagar', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1341, 'Muradnagar', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1342, 'Nagina', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1343, 'Najibabad', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1344, 'Nakur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1345, 'Nanpara', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1346, 'Naraura', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1347, 'Naugawan Sadat', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1348, 'Nautanwa', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1349, 'Nawabganj', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1350, 'Nehtaur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1351, 'NOIDA', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1352, 'Noorpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1353, 'Obra', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1354, 'Orai', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1355, 'Padrauna', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1356, 'Palia Kalan', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1357, 'Parasi', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1358, 'Phulpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1359, 'Pihani', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1360, 'Pilibhit', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1361, 'Pilkhuwa', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1362, 'Powayan', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1363, 'Pukhrayan', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1364, 'Puranpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1365, 'Purquazi', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1366, 'Purwa', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1367, 'Rae Bareli', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1368, 'Rampur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1369, 'Rampur Maniharan', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1370, 'Rasra', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1371, 'Rath', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1372, 'Renukoot', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1373, 'Reoti', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1374, 'Robertsganj', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1375, 'Rudauli', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1376, 'Rudrapur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1377, 'Sadabad', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1378, 'Safipur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1379, 'Saharanpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1380, 'Sahaspur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1381, 'Sahaswan', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1382, 'Sahawar', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1383, 'Sahjanwa', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1384, 'Saidpur', ' Ghazipur', 'N', 'Y', 'N'),
(1385, 'Sambhal', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1386, 'Samdhan', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1387, 'Samthar', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1388, 'Sandi', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1389, 'Sandila', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1390, 'Sardhana', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1391, 'Seohara', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1392, 'Shahabad', ' Hardoi', 'N', 'Y', 'N'),
(1393, 'Shahabad', ' Rampur', 'N', 'Y', 'N'),
(1394, 'Shahganj', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1395, 'Shahjahanpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1396, 'Shamli', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1397, 'Shamsabad', ' Agra', 'N', 'Y', 'N'),
(1398, 'Shamsabad', ' Farrukhabad', 'N', 'Y', 'N'),
(1399, 'Sherkot', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1400, 'Shikarpur', ' Bulandshahr', 'N', 'Y', 'N'),
(1401, 'Shikohabad', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1402, 'Shishgarh', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1403, 'Siana', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1404, 'Sikanderpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1405, 'Sikandra Rao', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1406, 'Sikandrabad', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1407, 'Sirsaganj', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1408, 'Sirsi', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1409, 'Sitapur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1410, 'Soron', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1411, 'Suar', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1412, 'Sultanpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1413, 'Sumerpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1414, 'Tanda', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1415, 'Tanda', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1416, 'Tetri Bazar', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1417, 'Thakurdwara', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1418, 'Thana Bhawan', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1419, 'Tilhar', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1420, 'Tirwaganj', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1421, 'Tulsipur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1422, 'Tundla', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1423, 'Unnao', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1424, 'Utraula', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1425, 'Varanasi', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1426, 'Vrindavan', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1427, 'Warhapur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1428, 'Zaidpur', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1429, 'Zamania', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1430, 'Almora', 'Uttarakhand', 'N', 'Y', 'N'),
(1431, 'Bazpur', 'Uttarakhand', 'N', 'Y', 'N'),
(1432, 'Chamba', 'Uttarakhand', 'N', 'Y', 'N'),
(1433, 'Dehradun', 'Uttarakhand', 'N', 'Y', 'N'),
(1434, 'Haldwani', 'Uttarakhand', 'N', 'Y', 'N'),
(1435, 'Haridwar', 'Uttarakhand', 'N', 'Y', 'N'),
(1436, 'Jaspur', 'Uttarakhand', 'N', 'Y', 'N'),
(1437, 'Kashipur', 'Uttarakhand', 'N', 'Y', 'N'),
(1438, 'kichha', 'Uttarakhand', 'N', 'Y', 'N'),
(1439, 'Kotdwara', 'Uttarakhand', 'N', 'Y', 'N'),
(1440, 'Manglaur', 'Uttarakhand', 'N', 'Y', 'N'),
(1441, 'Mussoorie', 'Uttarakhand', 'N', 'Y', 'N'),
(1442, 'Nagla', 'Uttarakhand', 'N', 'Y', 'N'),
(1443, 'Nainital', 'Uttarakhand', 'N', 'Y', 'N'),
(1444, 'Pauri', 'Uttarakhand', 'N', 'Y', 'N'),
(1445, 'Pithoragarh', 'Uttarakhand', 'N', 'Y', 'N'),
(1446, 'Ramnagar', 'Uttarakhand', 'N', 'Y', 'N'),
(1447, 'Rishikesh', 'Uttarakhand', 'N', 'Y', 'N'),
(1448, 'Roorkee', 'Uttarakhand', 'N', 'Y', 'N'),
(1449, 'Rudrapur', 'Uttarakhand', 'N', 'Y', 'N'),
(1450, 'Sitarganj', 'Uttarakhand', 'N', 'Y', 'N'),
(1451, 'Tehri', 'Uttarakhand', 'N', 'Y', 'N'),
(1452, 'Muzaffarnagar', 'Uttar Pradesh', 'N', 'Y', 'N'),
(1453, 'Adra', ' Purulia', 'N', 'Y', 'N'),
(1454, 'Alipurduar', 'West Bengal', 'N', 'Y', 'N'),
(1455, 'Arambagh', 'West Bengal', 'N', 'Y', 'N'),
(1456, 'Asansol', 'West Bengal', 'N', 'Y', 'N'),
(1457, 'Baharampur', 'West Bengal', 'N', 'Y', 'N'),
(1458, 'Bally', 'West Bengal', 'N', 'Y', 'N'),
(1459, 'Balurghat', 'West Bengal', 'N', 'Y', 'N'),
(1460, 'Bankura', 'West Bengal', 'N', 'Y', 'N'),
(1461, 'Barakar', 'West Bengal', 'N', 'Y', 'N'),
(1462, 'Barasat', 'West Bengal', 'N', 'Y', 'N'),
(1463, 'Bardhaman', 'West Bengal', 'N', 'Y', 'N'),
(1464, 'Bidhan Nagar', 'West Bengal', 'N', 'Y', 'N'),
(1465, 'Chinsura', 'West Bengal', 'N', 'Y', 'N'),
(1466, 'Contai', 'West Bengal', 'N', 'Y', 'N'),
(1467, 'Cooch Behar', 'West Bengal', 'N', 'Y', 'N'),
(1468, 'Darjeeling', 'West Bengal', 'N', 'Y', 'N'),
(1469, 'Durgapur', 'West Bengal', 'N', 'Y', 'N'),
(1470, 'Haldia', 'West Bengal', 'N', 'Y', 'N'),
(1471, 'Howrah', 'West Bengal', 'N', 'Y', 'N'),
(1472, 'Islampur', 'West Bengal', 'N', 'Y', 'N'),
(1473, 'Jhargram', 'West Bengal', 'N', 'Y', 'N'),
(1474, 'Kharagpur', 'West Bengal', 'N', 'Y', 'N'),
(1475, 'Kolkata', 'West Bengal', 'N', 'Y', 'N'),
(1476, 'Mainaguri', 'West Bengal', 'N', 'Y', 'N'),
(1477, 'Mal', 'West Bengal', 'N', 'Y', 'N'),
(1478, 'Mathabhanga', 'West Bengal', 'N', 'Y', 'N'),
(1479, 'Medinipur', 'West Bengal', 'N', 'Y', 'N'),
(1480, 'Memari', 'West Bengal', 'N', 'Y', 'N'),
(1481, 'Monoharpur', 'West Bengal', 'N', 'Y', 'N'),
(1482, 'Murshidabad', 'West Bengal', 'N', 'Y', 'N'),
(1483, 'Nabadwip', 'West Bengal', 'N', 'Y', 'N'),
(1484, 'Naihati', 'West Bengal', 'N', 'Y', 'N'),
(1485, 'Panchla', 'West Bengal', 'N', 'Y', 'N'),
(1486, 'Pandua', 'West Bengal', 'N', 'Y', 'N'),
(1487, 'Paschim Punropara', 'West Bengal', 'N', 'Y', 'N'),
(1488, 'Purulia', 'West Bengal', 'N', 'Y', 'N'),
(1489, 'Raghunathpur', 'West Bengal', 'N', 'Y', 'N'),
(1490, 'Raiganj', 'West Bengal', 'N', 'Y', 'N'),
(1491, 'Rampurhat', 'West Bengal', 'N', 'Y', 'N'),
(1492, 'Ranaghat', 'West Bengal', 'N', 'Y', 'N'),
(1493, 'Sainthia', 'West Bengal', 'N', 'Y', 'N'),
(1494, 'Santipur', 'West Bengal', 'N', 'Y', 'N'),
(1495, 'Siliguri', 'West Bengal', 'N', 'Y', 'N'),
(1496, 'Sonamukhi', 'West Bengal', 'N', 'Y', 'N'),
(1497, 'Srirampore', 'West Bengal', 'N', 'Y', 'N'),
(1498, 'Suri', 'West Bengal', 'N', 'Y', 'N'),
(1499, 'Taki', 'West Bengal', 'N', 'Y', 'N'),
(1500, 'Tamluk', 'West Bengal', 'N', 'Y', 'N'),
(1501, 'Tarakeswar', 'West Bengal', 'N', 'Y', 'N'),
(1502, 'Chikmagalur', 'Karnataka', 'N', 'Y', 'N'),
(1503, 'Davanagere', 'Karnataka', 'N', 'Y', 'N'),
(1504, 'Dharwad', 'Karnataka', 'N', 'Y', 'N'),
(1505, 'Gadag', 'Karnataka', 'N', 'Y', 'N'),
(1506, 'Chennai', 'Tamil Nadu', 'N', 'Y', 'N'),
(1507, 'Coimbatore', 'Tamil Nadu', 'N', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `hr_closure`
--

CREATE TABLE `hr_closure` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_complaints`
--

CREATE TABLE `hr_complaints` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_complaints`
--

INSERT INTO `hr_complaints` (`id`, `type`, `employee_id`, `image`, `details`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'Court', 6, NULL, 'dfdfdgf', 'N', 'Y', '2019-07-09', '0000-00-00 00:00:00'),
(2, 'Ministry of Human Resources', 7, NULL, 'retret', 'N', 'Y', '2019-07-09', '0000-00-00 00:00:00'),
(3, '', 0, NULL, '', 'N', 'Y', '2019-07-09', '0000-00-00 00:00:00'),
(4, 'Ministry of Human Resources', 4, 'travel_logo.png', 'ertretet', 'N', 'Y', '2019-07-09', '0000-00-00 00:00:00'),
(5, '', 0, 'travel_logo.png', '', 'N', 'Y', '2019-07-09', '0000-00-00 00:00:00'),
(6, 'Ministry of Human Resources', 10, 'download.jpg', 'ksbfskfnkwsnk', 'N', 'Y', '2019-07-14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_complaints_details`
--

CREATE TABLE `hr_complaints_details` (
  `id` int(11) NOT NULL,
  `complaints_id` int(11) NOT NULL,
  `details` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_complaints_details`
--

INSERT INTO `hr_complaints_details` (`id`, `complaints_id`, `details`, `start_date`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(2, 2, 'How are you', NULL, 'N', 'Y', '2019-07-10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_countries`
--

CREATE TABLE `hr_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_countries`
--

INSERT INTO `hr_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'North Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee`
--

CREATE TABLE `hr_employee` (
  `id` int(11) NOT NULL,
  `personal_image` varchar(255) DEFAULT NULL,
  `employee_no` varchar(255) DEFAULT NULL,
  `rf_no` varchar(100) NOT NULL,
  `file_no` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `dom` date DEFAULT NULL,
  `perma_addr` tinyint(4) NOT NULL,
  `contact_phone` text DEFAULT NULL,
  `contact_mobile` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `contact_address` text DEFAULT NULL,
  `contact_address1` varchar(255) DEFAULT NULL,
  `contact_state` varchar(100) DEFAULT NULL,
  `contact_pin` varchar(100) DEFAULT NULL,
  `contact_city` varchar(100) DEFAULT NULL,
  `contact_country` varchar(100) DEFAULT NULL,
  `home_phone` varchar(18) DEFAULT NULL,
  `home_mobile` varchar(15) DEFAULT NULL,
  `home_email` varchar(255) DEFAULT NULL,
  `home_address` text DEFAULT NULL,
  `home_address1` varchar(255) DEFAULT NULL,
  `home_state` varchar(100) DEFAULT NULL,
  `home_pin` varchar(100) DEFAULT NULL,
  `home_country` varchar(100) DEFAULT NULL,
  `home_city` varchar(100) DEFAULT NULL,
  `email_personal` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `confirmation_date` date DEFAULT NULL,
  `probation_period` varchar(100) DEFAULT NULL,
  `discontinued_date` date DEFAULT NULL,
  `gratuity_start_date` date DEFAULT NULL,
  `notice_period` varchar(100) DEFAULT NULL,
  `gratuity_amount` float(9,2) DEFAULT 0.00,
  `pro_name` varchar(255) DEFAULT NULL,
  `leave_per_month` int(11) DEFAULT NULL,
  `next_leave_due_date` date DEFAULT NULL,
  `increment_due_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `employee_category` varchar(255) DEFAULT NULL,
  `employee_title` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `no_of_children` varchar(255) DEFAULT NULL,
  `spouse_name` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `insurence_id` int(11) DEFAULT NULL,
  `original_password` varchar(100) DEFAULT NULL,
  `religion` varchar(266) DEFAULT NULL,
  `overtime` int(11) DEFAULT NULL,
  `work_shift` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `highest_qualification` varchar(255) DEFAULT NULL,
  `ctc_amount` varchar(100) DEFAULT NULL,
  `salary_structure_id` int(11) DEFAULT NULL,
  `salary_structure_details` longtext DEFAULT NULL,
  `pf` varchar(100) DEFAULT NULL,
  `reporting_manager` int(11) DEFAULT NULL,
  `subordinate` varchar(255) DEFAULT NULL,
  `salary_structure_breakup` varchar(225) DEFAULT NULL,
  `work_shift_id` int(11) NOT NULL,
  `voter_card` varchar(100) NOT NULL,
  `aadhar_card` varchar(100) NOT NULL,
  `pan_card` varchar(100) NOT NULL,
  `wfh` enum('0','1') DEFAULT '0',
  `office_email` varchar(100) DEFAULT NULL,
  `voter_image` text DEFAULT NULL,
  `pan_image` text DEFAULT NULL,
  `aadhar_image` text DEFAULT NULL,
  `access_permission` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee`
--

INSERT INTO `hr_employee` (`id`, `personal_image`, `employee_no`, `rf_no`, `file_no`, `first_name`, `middle_name`, `last_name`, `gender`, `marital_status`, `nationality`, `dob`, `dom`, `perma_addr`, `contact_phone`, `contact_mobile`, `contact_email`, `contact_address`, `contact_address1`, `contact_state`, `contact_pin`, `contact_city`, `contact_country`, `home_phone`, `home_mobile`, `home_email`, `home_address`, `home_address1`, `home_state`, `home_pin`, `home_country`, `home_city`, `email_personal`, `designation`, `department`, `status`, `hire_date`, `confirmation_date`, `probation_period`, `discontinued_date`, `gratuity_start_date`, `notice_period`, `gratuity_amount`, `pro_name`, `leave_per_month`, `next_leave_due_date`, `increment_due_date`, `note`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `employee_category`, `employee_title`, `father_name`, `mother_name`, `no_of_children`, `spouse_name`, `password`, `insurence_id`, `original_password`, `religion`, `overtime`, `work_shift`, `grade`, `highest_qualification`, `ctc_amount`, `salary_structure_id`, `salary_structure_details`, `pf`, `reporting_manager`, `subordinate`, `salary_structure_breakup`, `work_shift_id`, `voter_card`, `aadhar_card`, `pan_card`, `wfh`, `office_email`, `voter_image`, `pan_image`, `aadhar_image`, `access_permission`) VALUES
(1, '', '', '', '', 'sree', 'Case2', 'chattterjee', NULL, NULL, NULL, '0000-00-00', NULL, 0, '9573222886', '', 'developer.wiz11@gmail.com', 'Diamond Harbour Rd, Joka, 23, 23, 27F', '', '', '', 'Woodburn', 'India', '9573222886', '+919573222886', NULL, 'Diamond Harbour Rd, Joka, 23, 23, 27F', '', '', '', '', 'Kolkata', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-01-14', '2020-01-14 17:36:14', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 0, '', NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0', '', '', '', '', ''),
(2, '', 'SWS006', '6', '', 'Soumya ', '', 'Banerjee', 'Male', 'Unmarried', NULL, '1989-01-01', NULL, 0, '9836987431', '9836987431', 'soumya.ceo@gmail.com', '23/1 , Sashi Bhusan Banerjee Road', '', '', '', 'Kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '14', '3', 'Permanent', '2011-01-01', NULL, NULL, '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-15', '2020-04-17 11:14:27', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 5, '4', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(3, NULL, 'SWS040', '40', '', 'Jayanta', '', 'Sengupta', 'Female', NULL, NULL, '1968-11-21', NULL, 0, '9674324223', '9674324223', 'jayanta@sketchwebsolutions.com', 'E30 Ramgarh', '', '', '', 'Kolkata', 'India', NULL, NULL, NULL, 'E30, Ramgarh', '', '', '', 'India', 'Kolkata', NULL, '4', '8', 'Permanent', '2014-04-04', NULL, NULL, '2020-05-15', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-15', '2020-05-15 16:01:21', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(4, NULL, 'SE18', '238', '', 'Parishmita ', '', 'Saha', 'Female', 'Unmarried', NULL, '1990-01-17', NULL, 0, '', '9051250856', 'hrd@sketchwebsolutions.com', '20/2 Dakshin Para Road', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', '6', 'Permanent', '2019-05-13', NULL, NULL, '2020-05-14', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-15', '2020-05-18 12:34:08', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '3', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(5, '1685981879.png', 'SE099', '99', '', 'Anupit', '', 'Pan', 'Male', NULL, NULL, '2020-01-01', NULL, 0, '', '7890788050', 'anup@sketchwebsolutions.com', '', '', '', '', '', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '11', '22', 'Permanent', '2016-01-01', NULL, NULL, '2020-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-15', '2023-06-05 21:49:01', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'ASMPP5635L', NULL, '', NULL, NULL, NULL, '1'),
(6, '', 'SE115', '115', '', 'Somdeep ', 'Kumar', 'Kanu', 'Male', 'Married', NULL, '0000-00-00', NULL, 0, '', '8013179998', 'developer.wiz06@sketchwebsolutions.com', '', '', '', '', '', 'India', '', '8013179998', NULL, '', '', '', '', '', '', NULL, '11', '21', 'Permanent', '2017-12-12', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-15', '2020-03-24 13:02:31', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 21, '5', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', 'CIQPK6398K', NULL, '', '', '', '', ''),
(7, '', '', '86', '', 'Prasenjit', '', 'Mondal', 'Male', NULL, NULL, '2020-11-04', NULL, 0, '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', NULL, '4', '25', 'Permanent', '2018-11-15', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-15', '2020-03-27 18:56:52', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'BENPM3278L', NULL, '', '', '', '', ''),
(8, '', 'SE139', '139', '', 'Sourav ', '', 'Roy', 'Male', 'Unmarried', NULL, '1992-11-15', NULL, 0, '', '9775544268', 'developer.wiz05@sketchwebsolutions.com', '', '', '', '', 'kolkata', 'India', '', '8240253745', NULL, '', '', '', '', 'India', '', NULL, '9', '21', 'Permanent', '2016-06-13', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-15', '2020-01-30 15:52:27', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 5, '', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', 'BPRPR5590D', NULL, '', '', '', '', ''),
(9, '', 'SE222', '222', '', 'Pradipta', 'Km', 'Jana', 'Male', 'Married', NULL, '1989-04-23', NULL, 0, '', '8240210568', 'developer.wiz07@sketchwebsolutions.com', '', '', '', '', '', '', '', '8240210568', NULL, '', '', '', '', 'India', 'kolkata', NULL, '9', '21', 'Permanent', '2018-03-21', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-15', '2020-01-30 15:54:45', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '4', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', 'AOEPJ3893C', NULL, '', '', '', '', ''),
(10, '', 'SE125', '125', '', 'Sudip', 'Kumar', 'Khan', 'Male', 'Married', NULL, '1984-04-10', NULL, 0, '', '9733611035', 'developer.wiz03@sketchwebsolutions.com', '', '', '', '', '', 'India', '', '9733611035', NULL, '', '', '', '', 'India', 'kolkata', NULL, '9', '21', 'Permanent', '2016-04-20', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-15', '2020-02-06 11:04:05', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'CPPPK9115N', NULL, '', '', '', '', ''),
(11, NULL, 'SE018', '241', '', 'Saddam', '', 'Ansari', 'Male', NULL, NULL, '1994-09-02', NULL, 0, '', '9123328746', 'saddam.a@sketchwebsolutions.com', '', '', '', '', '', 'India', NULL, NULL, NULL, '', '', '', '', 'India', '', NULL, '9', '21', 'Permanent', '2019-07-08', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-15', '2020-06-19 19:34:42', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Muslim', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', 'CUMPA2604L', NULL, '', NULL, NULL, NULL, '1'),
(12, '1587630716.png', 'SE019', '246', '', 'Ria', '', 'Kundu', 'Female', 'Unmarried', NULL, '1991-04-30', NULL, 0, '', '9674570597', 'tester.wiz03@sketchwebsolutions.com', '', '', '', '', '', 'India', NULL, NULL, NULL, '', '', '', '', 'India', '', NULL, '12', '21', 'Permanent', '2019-08-19', NULL, NULL, '2020-04-23', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-15', '2020-04-23 14:01:59', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '4', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', 'BXTPK9123R', NULL, '', '', '', '', ''),
(13, NULL, 'SE216', '', '', 'Natasha ', '', 'Purkaystha', 'Female', 'Married', NULL, '1986-06-24', NULL, 0, '', '9836003718', 'cartface.sales4@gmail.com', '', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', 'India', 'kolkata', NULL, '11', '4', 'Permanent', '2017-11-06', NULL, NULL, '2020-05-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-15', '2020-05-19 13:39:54', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 10, '4', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'APRPM6026N', NULL, '', NULL, NULL, NULL, '1'),
(14, NULL, '', '248', '', 'Kartick', '', 'Hazra', 'Male', 'Unmarried', NULL, '1988-08-22', NULL, 0, '', '9051042827', 'kartick.hazra@sketchwebsolutions.com', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '13', '3', 'Permanent', '2019-09-19', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-15', '2020-07-13 12:06:10', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 20, '3', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', 'BXTPK9123R', NULL, '', NULL, NULL, NULL, '1'),
(15, NULL, 'SE129', '129', '121', 'Kaushik', '', 'Choudhury', 'Male', 'Unmarried', NULL, '1982-02-11', NULL, 0, '', '6903859773', 'kaushik@sketchwebsolutions.com', 'Behind Pump House N.O-11.G.I.P Colony,Jagachara,Satragachi Howrah-711112', '', '', '', 'Howrah', 'India', NULL, NULL, NULL, 'Behind Pump House N.O-11.G.I.P Colony,Jagachara,Satragachi Howrah-711112', '', '', '', 'India', 'Howrah', NULL, 'Select', '23', 'Permanent', '2016-05-02', NULL, NULL, '2020-06-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-05 18:51:19', 'Employee', NULL, 'Khitish Chandra Choudhury', 'Anjali Choudhury', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'BBZPC4054K', NULL, '', NULL, NULL, NULL, '1'),
(16, '', 'SE035', '35', '', 'Ranjan', '', 'Paul', 'Male', 'Unmarried', NULL, '1985-01-12', NULL, 0, '', '9830064436', 'ranjan@sketchwebsolutions.com', '51,Iswar Chatterjee Rd Prajatantra Pally Sukchar,kolkata-700115', '', '', '', 'kolkata', 'India', '', '9830064436', NULL, '', '', '', '', '', '', NULL, 'Select', 'Select', 'Permanent', '2013-12-04', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-01-16', '2020-01-30 16:26:15', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '3', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', 'AVLPP9037A', NULL, '', '', '', '', ''),
(17, NULL, 'SE191', '191', '', 'Piyali', '', 'Adhikari', 'Female', 'Unmarried', NULL, '1994-10-06', NULL, 0, '', '9088197057', 'piyaliadhikari@sketchwebsolutions.com', 'Bidhangar- Panchura Road Kolkata-66', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', '23', 'Permanent', '2017-07-10', NULL, NULL, '2020-06-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-05 18:45:39', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 10, '3', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'BHBPA3940G', NULL, '', NULL, NULL, NULL, '1'),
(18, NULL, 'SE192', '192', '', 'Tanushree', '', 'Das', 'Female', 'Married', NULL, '1990-11-10', NULL, 0, '', '8116458151', 'tanusree@sketchwebsolutions.com', 'E3/63,B2 Southan Fort,BBT Rd-kol-140', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', '23', 'Permanent', '2017-07-17', NULL, NULL, '2020-06-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-05 19:30:19', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 10, '5', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'BBOPD6212M', NULL, '', NULL, NULL, NULL, '1'),
(19, '', 'SE11', '195', '', 'Tarak', 'Nath', 'Banerjee', 'Male', 'Unmarried', NULL, '1993-09-08', NULL, 0, '', '9163853746', 'taraknath.banerjee@sketchwebsolutions.com', '', '', '', '', 'kolkata', 'India', '', '8013566125', NULL, 'No 3, Kali Charan Dutta Rd Rakhi Apartment Kolkata-61', '', '', '', 'India', 'kolkata', NULL, 'Select', '23', 'Permanent', '2019-01-07', NULL, NULL, '2020-03-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-16', '2020-03-14 15:50:32', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '4', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', 'CHEPB5835P', NULL, '', '', '', '', ''),
(20, NULL, 'SE170', '170', '', 'Raju', '', 'Banerjee', 'Male', 'Married', NULL, '1986-03-10', NULL, 0, '', '8512919293', 'developer.wiz08@sketchwebsolutions.com', 'Aligori,Tarakeswar,Hoogly', '', '', '', 'Hoogly', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9', '21', 'Permanent', '2017-01-02', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-19 19:33:29', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', 'APVPB8885L', NULL, '', NULL, NULL, NULL, '1'),
(21, NULL, 'SE030', '30', '', 'Pritam ', '', 'Paul', 'Male', 'Married', NULL, '1989-07-04', NULL, 0, '', '9804493622', 'pritam@sketchwebsolutions.com', '24/1A Vivekananda Pally R.K .Sarani ,Behala.Kolkata-60', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9', '21', 'Permanent', '0001-11-30', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-19 19:28:34', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 5, '4', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'BYCPP7268L', NULL, '', NULL, NULL, NULL, '1'),
(22, NULL, 'SE224', '224', '', 'Shadab', '', 'Mallick', 'Male', 'Married', NULL, '1988-09-20', NULL, 0, '', '7992285082', 'shadab.mallick@sketchwebsolutions.com', 'Hind Piri Tiwary Tank Road Ranchi', '', '', '', 'ranchi', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9', '21', 'Permanent', '2018-04-09', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-22 12:04:40', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Muslim', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', 'AZSPM7531M', NULL, '', NULL, NULL, NULL, '1'),
(23, NULL, 'SE42', '245', '', 'Sayan', '', 'Mukherjee', 'Male', 'Unmarried', NULL, '1988-07-15', NULL, 0, '03325684389', '9432177786', 'sayan.m@sketchwebsolutions.com', 'R.N.avenue Bye lane,Madhya Panshila,Kolkata-700112', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '11', '21', 'Permanent', '2019-08-05', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-19 19:03:43', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '4', NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(24, '1686112064.png', 'SE182', '182', '', 'Arka', '', 'Banerjee', 'Male', 'Unmarried', NULL, '1988-06-09', NULL, 0, '', '9051043750', 'developer.wiz09@sketchwebsolutions.com', 'P-182 Unique Park,Behala Kolkata-34', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9', '21', 'Permanent', '2017-03-09', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2023-06-07 09:58:07', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '4', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', 'AZVPB0915F', NULL, '', NULL, NULL, NULL, '1'),
(25, '', 'SE3', '240', '', 'Priyam', 'Kumar', 'Das', 'Male', 'Unmarried', NULL, '1997-07-20', NULL, 0, '', '8013336028', 'developer.wiz02@sketchwebsolutions.com', '121/72 Malancha MG road Thakurpukur,kol-104', '', '', '', 'kolkata', 'India', '', '8013336028', NULL, '', '', '', '', '', '', NULL, '9', '21', 'Permanent', '2019-06-03', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'N', '2020-01-16', '2020-01-27 18:46:02', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 10, '4', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(26, NULL, 'SE055', '55', '', 'Ravi', 'Kumar', 'Rao', 'Male', 'Married', NULL, '1986-05-03', NULL, 0, '', '9903584428', 'ravi@sketchwebsolutions.com', '7, Sabji Bagan Lane,Chetla', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9', '21', 'Permanent', '2014-04-11', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-19 19:34:13', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '3', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', 'ATWPR2233F', NULL, '', NULL, NULL, NULL, '1'),
(27, NULL, 'SE229', '234', '', 'Subha', '', 'Dutta', 'Male', 'Unmarried', NULL, '1996-01-09', NULL, 0, '', '8972893536', 'developer.wiz10@sketchwebsolutions.com', '42/73 Dumdum Road kol-700074', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, 'Balia Nawab gange,Malda-732128', '', '', '', 'India', 'Malda', NULL, '9', '21', 'Permanent', '2019-03-11', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-19 19:36:25', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 11, '4', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(28, '', 'SE15', 'RF237', 'FL237', 'Kalyan ', '', 'Bairagi test 1', 'Male', 'Unmarried', NULL, '1995-01-01', NULL, 0, '', '8583010067', 'kalyan.bairagi@sketchwebsolutions.com', 'Begore khal ,Udayan Sarani kolkata-141', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, 'Begore khal ,Udayan Sarani kolkata-141', '', '', '', 'India', 'kolkata', NULL, '2', '40', 'Permanent', '2019-01-01', NULL, NULL, '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'Y', 'N', '2020-01-16', '2020-04-17 12:58:04', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 23, '3', NULL, NULL, NULL, '', 3, '', NULL, 12, 'VOTERTEST1', 'AADHARTEST1', 'PANTEST1', NULL, '', '', '', '', ''),
(29, '1588076559.png', 'SE155', 'SE155', '', 'Anirban ', '', 'Mandal', 'Male', 'Married', NULL, '1981-01-01', NULL, 1, '', '7363906230', 'designer.suit02@sketchwebsolutions.com', 'V-MItiary,P.O-Pratap Nagar,P.S-Sonarpur,Dist-24 PGS(S)', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, 'V-MItiary,P.O-Pratap Nagar,P.S-Sonarpur,Dist-24 PGS(S)', '', '', '', 'India', 'kolkata', NULL, '9', '27', 'Permanent', '2016-01-01', NULL, NULL, '2023-06-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2023-06-05 11:04:49', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 19, '12345678', '', 'ARLPM3977A', NULL, '', '1587803741.png', NULL, NULL, '1'),
(30, NULL, 'SE1158', '158', '', 'Najib', '', 'Sultan', 'Male', 'Married', NULL, '1984-12-22', NULL, 0, '', '9231236281', 'designer.suit01@sketchwebsolutions.com', 'Axis Garden,BL-4,237 Harisava Math,Banshdroni,kolkata-84', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '10', '22', 'Permanent', '2017-09-05', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-19 19:31:50', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Muslim', NULL, NULL, 5, '9', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', 'CVFPS3633F', NULL, '', NULL, NULL, NULL, '1'),
(31, '', 'SE158', '', '', 'Najib', '', 'Sultan', 'Male', 'Married', NULL, '1984-12-22', NULL, 0, '', '9231236281', 'designer.suit01@sketchwebsolutions.com', 'Axis Garden,BL-4,237 Harisava Math,Banshdroni,kolkata-84', '', '', '', 'kolkata', 'India', '', '9231236281', NULL, '', '', '', '', '', '', NULL, '10', '22', 'Permanent', '2017-09-05', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-01-16', '2020-01-16 17:15:24', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Muslim', NULL, NULL, 5, '9', NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0', '', '', '', '', ''),
(32, NULL, 'SE45', '243', '', 'Jyotshna', 'Rani', 'Panda', 'Female', 'Unmarried', NULL, '1996-10-16', NULL, 0, '', '8338853353', 'jyotshnarani@sketchwebsolutions.com', 'Srikanthapur,Chidiapolo,Balasore', '', '', '', 'Balasore', 'India', NULL, NULL, NULL, 'Srikanthapur,Chidiapolo,Balasore', '', '', '', 'India', 'Balasore', NULL, '12', '21', 'Permanent', '2019-08-05', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-16', '2020-06-19 19:31:06', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 12, '3', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', 'EQMPP8813C', NULL, '', NULL, NULL, NULL, '1'),
(33, '', 'SE49', '252', '', 'Saurodeep', '', 'Basak', 'Male', 'Unmarried', NULL, '1993-01-16', NULL, 0, '', '7278772889', 'sauradeep@sketchwebsolutions.com', '23,Fakir Para Road behala,Kolkata-34', '', '', '', 'kolkata', 'India', '', '7278772889', NULL, '', '', '', '', '', '', NULL, 'Select', '23', 'Provisional', '2020-01-06', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-01-17', '2020-01-27 18:57:27', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 11, '3', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(34, NULL, 'SE48', '251', '', 'Pankaj ', 'Kumar ', 'Poddar', 'Male', 'Married', NULL, '1989-03-21', NULL, 0, '', '9123230235', 'pankaj@sketchwebsolutions.com', '195,MC Garden Road,Dumdum,kolkata-700030', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9', '21', 'Provisional', '2020-01-02', NULL, NULL, '2020-06-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-17', '2020-06-19 19:32:40', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, '5', NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(35, '', '', '14', '', 'Monica ', '', 'Mondal', 'Female', 'Married', NULL, '2000-11-08', NULL, 0, '', '8670704030', '', 'Thana-Bishnupur,PO-Dakhshin Baagi', '', '', '', 'kolkata', '', '', '8670704030', NULL, '', '', '', '', '', '', NULL, 'Select', 'Select', 'Trainee', '2019-03-22', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'Y', 'N', '2020-01-17', '2020-03-17 16:52:07', 'Labor', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 20, '', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(36, '', '', '', '', 'Tapan', '', 'Mondal', 'Male', 'Married', NULL, '0000-00-00', NULL, 0, '', '8961239814', '', '', '', '', '', '', '', '', '8961239814', NULL, '', '', '', '', '', '', NULL, 'Select', 'Select', 'Permanent', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-17', '2020-01-17 16:12:44', 'Labor', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 0, '', NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0', '', '', '', '', ''),
(37, '', '', '1003', '', 'Tapas', '', 'Ojha', 'Male', NULL, NULL, '1985-02-01', NULL, 0, '', '9679678020', '', 'Dist;W.Mednipur,Thana-Gopi Ballavpur,', '', '', '', 'Jhargram', 'India', '', '9679678020', NULL, '', '', '', '', '', '', NULL, '2', 'Select', 'Permanent', '2016-12-01', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-17', '2020-01-27 18:11:59', 'Labor', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 12, '', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(38, NULL, 'SE46', '249', '', 'Prodyut', 'Km', 'Sardar', 'Male', 'Unmarried', NULL, '1992-01-25', NULL, 0, '', '7890862417', 'sales@cartface.com', 'Gopal pur,BBT Road kol-143', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', '4', 'Provisional', '2019-08-22', NULL, NULL, '2020-05-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-27', '2020-05-19 14:54:41', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 12, NULL, NULL, NULL, NULL, '', 0, '', NULL, 12, '', '4', '4565', NULL, '', NULL, NULL, NULL, '1'),
(39, NULL, 'SE43', '244', '', 'Sanchari ', '', 'De', 'Female', NULL, NULL, '1992-11-26', NULL, 0, '', '9674259905', 'sanchari.d@sketchwebsolutions.com', '204/1A,Raja Ram Mohan Roy Road,Kol-08', '', '', '', 'kolkata', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9', '21', 'Permanent', '2019-08-05', NULL, NULL, '2020-05-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-27', '2020-06-19 19:21:17', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, NULL, NULL, NULL, NULL, '', 21, '6', NULL, 19, '', '', 'AMUPD3831A', NULL, '', NULL, NULL, NULL, '1'),
(40, '1587534855.png', '', '250', '', 'Ashish', 'Kumar', 'Jha', 'Male', 'Married', NULL, '1986-01-02', NULL, 0, '7739533710', '7739533710', 'sales@cartface.in', 'Flat No 101 Sarojini Bhavan Hindmotor', '', '', '', 'Hooghly', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '3', '4', 'Provisional', '2020-01-02', NULL, NULL, '2020-04-22', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-28', '2020-05-19 14:55:51', 'Employee', NULL, 'Gopalk JeeJha', '', '2', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, NULL, NULL, NULL, NULL, '', 0, '', NULL, 12, '677676677888', '', 'AQWPJ2456K', NULL, '', '1587534898.png', NULL, NULL, '1'),
(41, NULL, 'SE225', '', '', 'Rita', '', 'Mallick', 'Male', NULL, NULL, '1994-01-05', NULL, 0, '9007060891', '9007060891', 'cartface.sales1@gmail.com', 'Nilgang Bazar', '', '', '', 'Barasat', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', '4', 'Permanent', '2018-04-09', NULL, NULL, '2020-05-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-30', '2020-05-19 14:52:28', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 10, NULL, NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'CTXPM1111N', NULL, '', NULL, NULL, NULL, '1'),
(42, NULL, 'SE194', '', '', 'Indrani', '', 'Dutta', 'Female', NULL, NULL, '1982-04-17', NULL, 0, '7699855256', '7699855256', 'cartface.sales2@gmail.com', 'Krishnagang , rathtala', '', '', '', 'Bishnupur Bakura', 'India', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', '4', 'Permanent', '2017-07-06', NULL, NULL, '2020-05-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-01-30', '2020-05-19 14:48:26', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 10, NULL, NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', 'CBTPD7831G', NULL, '', NULL, NULL, NULL, '1'),
(43, '', '', '', '', 'Abdul', '', 'Manna', NULL, NULL, NULL, '0000-00-00', NULL, 0, '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'N', 'N', '2020-02-22', '2020-03-31 11:49:14', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, 12, 0, NULL, NULL, NULL, NULL, '', 0, '', NULL, 12, '', '', '', NULL, '', '', '', '', ''),
(44, '\r\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined index: image</p>\r\n<p>Filename: controllers/Admin.php</p>\r\n<p>Line Number: 259</p>\r\n\r\n\r', '', '', '', 'sree', 'Case2', 'chattterjee', 'Female', NULL, NULL, '2020-02-11', NULL, 0, '', '', '', '', '', '', '', '', 'India', '', '', NULL, '', '', '', '', 'India', '', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'Y', 'N', '2020-02-24', '2020-02-24 12:32:42', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(45, '15844236751196737246.png', '', '', '', 'Test2', 'Case2', '232', 'Male', NULL, NULL, '0000-00-00', NULL, 0, '', '', '', '', '', '', '', '', 'India', '', '', NULL, '', '', '', '', 'India', '', NULL, '2', '31', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'Y', 'N', '2020-02-24', '2020-03-18 15:22:10', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 12, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(46, '1584339197359878983.jpg', 'DRIVER01', 'DR011', 'FL011', 'driver', '', 'yadav', 'Male', 'Unmarried', NULL, '1990-01-01', NULL, 0, '07894561230', '', 'AYV@GMAIL.COM', '22/3 JOKA INCORM LANE ., OPP: JOKA IIM COLLAGE', '', '', '', 'KOLKATA', 'India', NULL, NULL, NULL, '22/3 JOKA INCORM LANE ., OPP: JOKA IIM COLLAGE', '', '', '', 'India', 'KOLKATA', NULL, '16', '29', 'Permanent', '2020-03-01', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-03-06', '2020-04-11 10:31:46', 'Labor', NULL, 'father yadav', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 22, NULL, NULL, NULL, NULL, '', 3, '4', NULL, 12, '1161515', '889616516', '5589651', NULL, '', '', '', '', ''),
(47, '', '', '', '', 'Tapati', '', 'Chakraborty', NULL, NULL, NULL, '2022-11-08', NULL, 0, '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', NULL, 'Select', 'Select', 'Trainee', '2020-11-03', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'Y', 'N', '2020-03-13', '2020-03-14 11:21:00', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(48, NULL, '', '', '', 'Tapati', '', 'Chakraborty', 'Female', 'Unmarried', NULL, '2000-02-01', NULL, 0, '', '7464649526', 'tapati@sketchwebsolutions.com', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', '23', 'Provisional', '2020-03-16', NULL, NULL, '2020-06-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-03-18', '2020-06-05 19:08:23', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 19, NULL, NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(49, '', '100001', '', '', 'Shankar', '', 'Prasad', 'Male', 'Unmarried', NULL, '1990-03-01', NULL, 0, '08965478952', '', 'nabincarriage123@gmail.com', '22/3 JOKA INCORM LANE ., OPP: JOKA IIM Csdhndgf', '', '', '', 'KOLKATA', 'India', '', '', NULL, '', '', '', '', '', '', NULL, 'Select', 'Select', 'Permanent', '2020-01-01', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-03-18', '2020-03-18 15:22:07', 'Employee', NULL, 'Ram Singh', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 24, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(50, '', '200002', '200002', '200002', 'Suresh ', '', 'Bora', 'Male', NULL, NULL, '1990-01-01', NULL, 0, '0000000000', '', 'customer@gmail.com', 'xxxxxxx', '', '', '', 'Kolkata', 'India', '', '', NULL, '', '', '', '', '', '', NULL, '18', '36', 'Permanent', '2001-01-20', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-03-19', '2020-03-19 12:41:20', 'Employee', NULL, 'Dinesh Bora', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 25, NULL, NULL, NULL, NULL, '', 0, '', NULL, 19, '', '', '', NULL, '', '', '', '', ''),
(51, '', '400004', '400004', '400004', 'Manoj ', '', 'Mora', 'Male', 'Married', NULL, '1995-09-25', NULL, 0, '08583010067', '', 'shaktifashion_01@yahoomail.com', '786, D.H ROAD, MUKERGEE GALTE 1', '', '', '', 'KOLKATA', 'India', '', '', NULL, '', '', '', '', 'India', '', NULL, '4', '37', 'Permanent', '2019-04-23', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'Y', 'N', '2020-03-19', '2020-03-25 19:11:51', 'Employee', NULL, 'Munni Lal Mora', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 21, NULL, NULL, NULL, NULL, '', 2, '', NULL, 20, '400004', '400004', '400004', NULL, '', '', '', '', ''),
(52, '', 'future employee', 'future employee', '', 'future employee', '', '', 'Male', NULL, NULL, '1989-03-22', NULL, 0, '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', NULL, '8', '22', 'Provisional', '2020-03-28', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-03-27', '2020-03-27 18:45:53', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 5, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(53, '', 'future employee', 'future employee', '', 'future employee 1', '', '', 'Male', NULL, NULL, '1989-03-22', NULL, 0, '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', NULL, '8', '22', 'Provisional', '2020-03-28', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'Y', 'N', '2020-03-27', '2020-03-27 18:46:27', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 5, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', '', '', '', ''),
(54, '', 'EN004', 'RF004', 'FL004', 'kalyan ', '', 'test 4(labour dept)', 'Male', 'Married', NULL, '1995-09-25', NULL, 0, '2498 9888', '8583010067', 'kalyan.bairagi@sketchwebsolutions.com', 'p 14/7 Begorkhal,Udayan Sarani,Maheshtala', '', '', '', 'Kolkata', 'India', NULL, NULL, NULL, '', '', '', '', 'India', '', NULL, '2', '40', 'Permanent', '2020-01-01', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-04-01', '2020-04-03 10:08:24', 'Labor', NULL, 'Father test 4(Lobur dept)', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 23, NULL, NULL, NULL, NULL, '', 2, '3,7,10', NULL, 19, 'VCN004', 'ADHRCN004', 'PAN004', NULL, '', '', '', '', ''),
(55, NULL, '', '', '', 'Test', '', 'Test', 'Female', NULL, NULL, '2020-04-23', NULL, 1, '', '6686868686', 'test@gmail.com', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '4', '3', 'Permanent', '2019-09-29', NULL, NULL, '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'Y', 'N', '2020-04-02', '2020-05-06 12:06:40', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 29, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', '1', '', NULL, NULL, NULL, NULL),
(56, '', 'EN05', 'RF05', 'FL05', 'KALYAN ', '', 'TEST 5(LABOUR-14800)', 'Male', 'Married', NULL, '1988-04-13', NULL, 1, '', '8583010067', 'shaktifashion_01@yahoomail.com', '786, D.H ROAD', 'MUKERGEE GALTE 1', 'WEST BENGAL', '700141', 'KOLKATA', 'India', NULL, NULL, NULL, '786, D.H ROAD', 'MUKERGEE GALTE 1', 'WEST BENGAL', '700141', 'India', 'KOLKATA', NULL, '2', '40', 'Permanent', '2020-01-01', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-04-03', '2020-04-03 14:38:28', 'Labor', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 23, NULL, NULL, NULL, NULL, '', 0, '', NULL, 19, 'VCNO05', 'ACNO05', 'PCN05', '1', '', '', '', '', ''),
(57, '', 'ENO06', 'RF06', 'FL06', 'Kalyan', '', 'Test 6(labour-300000)', 'Male', 'Married', NULL, '1984-04-12', NULL, 1, '', '6666666666', 'customer@gmail.com', 'xxxxxxx', '', 'West Bengal', '700000', 'Kolkata', 'India', NULL, NULL, NULL, 'xxxxxxx', '', 'West Bengal', '700000', 'India', 'Kolkata', NULL, '2', '40', 'Permanent', '2019-12-01', NULL, NULL, '2020-04-22', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'Y', 'N', '2020-04-03', '2020-04-22 18:17:24', 'Labor', NULL, 'shjgdf', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', 1, NULL, 23, NULL, NULL, NULL, NULL, '', 2, '', NULL, 19, 'VCN06', 'ANO06', 'PCN06', '1', '', '', '', '', ''),
(58, NULL, 'RF16', 'RF16', 'RF16', 'kalyan test 1234', '', '(NEW-16000rs13.04.2020)', 'Male', NULL, NULL, '2020-04-23', NULL, 1, '', '8583010067', 'kalyan.bairagi@sketchwebsolutions.com', '786, D.H ROAD', 'MUKERGEE GALTE 1', 'WEST BENGAL', '700141', 'KOLKATA', 'India', NULL, NULL, NULL, '786, D.H ROAD', 'MUKERGEE GALTE 1', 'WEST BENGAL', '700141', 'India', 'KOLKATA', NULL, '2', '40', 'Permanent', '2020-04-23', NULL, NULL, '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'Y', 'N', '2020-04-13', '2020-04-23 11:41:47', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 23, NULL, NULL, NULL, NULL, '', 2, '', NULL, 19, 'VOTERTEST1', 'AADHARTEST1', 'PANTEST1', NULL, 'kalyan.bairagi@sketchwebsolutions.com', '', '', '', ''),
(59, NULL, '', '', '', 'Test1', '', 'Test1', 'Female', NULL, NULL, '2020-04-23', NULL, 1, '', '0987456321', 'test1test1@gmail.cm', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '15', '3', 'Permanent', '2020-05-12', NULL, NULL, '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'Y', 'N', '2020-04-13', '2020-05-12 14:42:03', 'Employee', NULL, 'abc', 'xcv', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 5, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', NULL, '', NULL, NULL, NULL, NULL),
(60, '', 'future employee', '15', '200002', 'test-13.04.2020-16.16', '', 'xx', 'Male', NULL, NULL, '1998-04-01', NULL, 1, '', '8965478952', 'nabincarriage123@gmail.com', '', '', '', '', '', 'India', NULL, NULL, NULL, '', '', '', '', 'India', '', NULL, '9', '22', 'Trainee', '2020-01-01', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-04-13', '2020-04-13 16:18:01', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', 1, NULL, 12, NULL, NULL, NULL, NULL, '', 58, '', NULL, 19, 'VCN06', 'ANO06', 'CHEPB5835P', '1', 'customer@gmail.com', '', '', '', ''),
(63, NULL, '', '', '', 'Swapan', 'Kumar', 'Das', 'Male', NULL, NULL, '2020-05-04', NULL, 1, '', '9675748483', 'swapan@gmail.com', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', 'Select', 'Permanent', '2020-05-04', NULL, NULL, '2020-05-04', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'Y', 'N', '2020-05-04', '2020-05-08 15:34:34', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, 0, '', NULL, 12, '', '', '', '1', '', NULL, NULL, NULL, NULL),
(64, NULL, '', '', '', 'Ramesh', '', 'Shinde', 'Male', NULL, NULL, '2020-05-19', NULL, 1, '', '4574864521', 'info@cartface.in', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', 'Select', 'Provisional', '2020-01-02', NULL, NULL, '2020-05-19', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-05-19', '2020-05-19 15:04:19', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, 0, '', NULL, 12, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(65, NULL, '', '', '', 'Ranjan', '', 'Paul', 'Male', NULL, NULL, '2020-06-05', NULL, 1, '', '9830064436', 'ranjan@sketchwebsolutions.com', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '11', '23', 'Permanent', '2020-06-05', NULL, NULL, '2020-06-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-06-05', '2020-06-05 18:58:42', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, 0, '', NULL, 12, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(66, NULL, '', '', '', 'Saurodeep', '', 'Basak', 'Male', NULL, NULL, '2020-06-05', NULL, 1, '', '6515454486', 'sauradeep@sketchwebsolutions.com', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'Select', '23', 'Provisional', '2020-06-05', NULL, NULL, '2020-06-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-06-05', '2020-06-05 19:05:51', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, 0, '', NULL, 12, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(67, NULL, '', '', '', 'Avinaba', '', 'Pramanik', 'Male', NULL, NULL, '1991-04-01', NULL, 1, '', '9064519349', 'avinaba@sketchwebsolutions.com', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', NULL, '10', '22', 'Provisional', '2020-03-10', NULL, NULL, '2020-06-22', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2020-06-22', '2020-06-22 12:25:12', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, 0, '', NULL, 19, '', '', '', NULL, '', NULL, NULL, NULL, '1'),
(68, '1685950533.png', '46575764343', '465768783434', '66453434353434', 'Mohan', 'kumar', 'sharma', 'Male', NULL, NULL, '2023-06-05', NULL, 1, '', '7581043434', 'bootup786@gmail.com', '', '', '', '', '', 'India', NULL, NULL, NULL, '', '', '', '', 'India', '', NULL, '13', '25', 'Provisional', '2023-06-02', NULL, NULL, '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', 'ok test', 'N', 'Y', '2023-06-05', '2023-06-05 13:06:26', 'Labor', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, 26, '29,22', NULL, 12, '656565634343434', '64534235465763342', '35364656454', NULL, 'bootup354786@gmail.com', NULL, NULL, NULL, '1'),
(134, '1685951350.png', '', '', '', 'Rohit', 'kumar', 'sharma', 'Male', NULL, NULL, '2023-06-04', NULL, 1, '07581043434', '7581043434', 'bootup786@gmail.com', 'Vijay Nagar Ghaziabad', 'Noida 63', 'Uttar Pradesh', '201009', 'Vijay Nagar By Pass Choke ', 'India', NULL, NULL, NULL, 'Vijay Nagar Ghaziabad', 'Noida 63', 'Uttar Pradesh', '201009', 'India', 'Vijay Nagar By Pass Choke ', NULL, '3', '3', 'Provisional', '2023-06-07', NULL, NULL, '2023-06-05', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', 'ok', 'N', 'Y', '2023-06-05', '2023-06-05 13:46:39', 'Labor', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, 40, '29', NULL, 12, '', '', '', NULL, 'asadsdy123@gmail.com', NULL, NULL, NULL, '1'),
(135, '1686136677.png', '', '', '', 'Aman', 'kumar', 'Sharma', 'Male', NULL, NULL, '2023-06-07', NULL, 1, '', '7581043434', 'bootup786@gmail.com', '', '', '', '', '', 'India', NULL, NULL, NULL, '', '', '', '', 'India', '', NULL, '2', '3', 'Trainee', '2023-06-07', NULL, NULL, '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, '1970-01-01', '', 'N', 'Y', '2023-06-07', '2023-06-07 16:48:18', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'Hindu', NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, 0, '', NULL, 12, '', '', '', NULL, 'bootup786@gmail.com', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_assign_policy`
--

CREATE TABLE `hr_employee_assign_policy` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `policy_id` int(11) NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_assign_policy`
--

INSERT INTO `hr_employee_assign_policy` (`id`, `employee_id`, `policy_id`, `created_date`) VALUES
(1, 4, 1, '2019-03-07'),
(3, 0, 1, '2019-03-07'),
(4, 4, 0, '2019-03-12'),
(5, 4, 0, '2019-03-12'),
(6, 4, 0, '2019-04-02'),
(8, 10, 4, '2019-07-12'),
(9, 22, 4, '2019-07-14'),
(10, 21, 0, '2020-02-14'),
(11, 21, 4, '2020-02-14'),
(13, 28, 5, '2020-03-06'),
(14, 46, 10, '2020-03-16'),
(15, 51, 13, '2020-03-19'),
(16, 51, 14, '2020-03-19'),
(18, 2, 7, '2020-04-17'),
(19, 29, 5, '2020-04-17'),
(20, 29, 7, '2020-04-20'),
(22, 5, 5, '2020-04-22'),
(23, 29, 0, '2020-04-28'),
(24, 29, 0, '2020-04-28'),
(25, 29, 0, '2020-04-28'),
(26, 29, 5, '2020-04-28'),
(0, 5, 10, '2023-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_bank_details`
--

CREATE TABLE `hr_employee_bank_details` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) NOT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `agent_rtn_code` varchar(255) DEFAULT NULL,
  `default_bank` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_bank_details`
--

INSERT INTO `hr_employee_bank_details` (`id`, `employee_id`, `bank_name`, `branch_name`, `account_no`, `agent_rtn_code`, `default_bank`) VALUES
(1, 10, 'AXIS Bank', '', '123456789', 'sac4325', 1),
(2, 43, 'Axis', '', '12123131314242', '6556512', NULL),
(3, 7, 'Axis Bank', '', '12123131314242', '65565', 1),
(4, 43, 'Axis', '', '12123131314242', '6556512', NULL),
(5, 46, 'STATE BANK OF INDIA', '', '1865519846', 'SBIN0012348', NULL),
(6, 51, 'STATE BANK OF INDIA', '', 'bankaccountno.l1234', 'ifsc1234', NULL),
(7, 54, 'STATE BANK OF INDIA', '', 'SBIACTNO004', 'SBINIFSC004', 1),
(8, 64, ' Bank of Maharashtra', '', '68000073619', 'MAHB0001140', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_bkup_06_02_20`
--

CREATE TABLE `hr_employee_bkup_06_02_20` (
  `id` int(11) NOT NULL,
  `personal_image` varchar(255) DEFAULT NULL,
  `employee_no` varchar(255) DEFAULT NULL,
  `rf_no` varchar(100) NOT NULL,
  `file_no` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `dom` date DEFAULT NULL,
  `contact_phone` text DEFAULT NULL,
  `contact_mobile` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `contact_address` text DEFAULT NULL,
  `contact_city` varchar(100) DEFAULT NULL,
  `contact_country` varchar(100) DEFAULT NULL,
  `home_phone` varchar(18) DEFAULT NULL,
  `home_mobile` varchar(15) DEFAULT NULL,
  `home_email` varchar(255) DEFAULT NULL,
  `home_address` text DEFAULT NULL,
  `home_country` varchar(100) DEFAULT NULL,
  `home_city` varchar(100) DEFAULT NULL,
  `email_personal` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `confirmation_date` date DEFAULT NULL,
  `probation_period` varchar(100) DEFAULT NULL,
  `discontinued_date` date DEFAULT NULL,
  `gratuity_start_date` date DEFAULT NULL,
  `notice_period` varchar(100) DEFAULT NULL,
  `gratuity_amount` float(9,2) DEFAULT 0.00,
  `pro_name` varchar(255) DEFAULT NULL,
  `leave_per_month` int(11) DEFAULT NULL,
  `next_leave_due_date` date DEFAULT NULL,
  `increment_due_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `employee_category` varchar(255) DEFAULT NULL,
  `employee_title` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `no_of_children` varchar(255) DEFAULT NULL,
  `spouse_name` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `insurence_id` int(11) DEFAULT NULL,
  `original_password` varchar(100) DEFAULT NULL,
  `religion` varchar(266) DEFAULT NULL,
  `overtime` int(11) DEFAULT NULL,
  `work_shift` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `highest_qualification` varchar(255) DEFAULT NULL,
  `ctc_amount` varchar(100) DEFAULT NULL,
  `salary_structure_id` int(11) DEFAULT NULL,
  `salary_structure_details` longtext DEFAULT NULL,
  `pf` varchar(100) NOT NULL,
  `reporting_manager` int(11) DEFAULT NULL,
  `subordinate` varchar(255) DEFAULT NULL,
  `salary_structure_breakup` varchar(225) DEFAULT NULL,
  `work_shift_id` int(11) NOT NULL,
  `voter_card` varchar(100) NOT NULL,
  `aadhar_card` varchar(100) NOT NULL,
  `pan_card` varchar(100) NOT NULL,
  `wfh` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee_bkup_06_02_20`
--

INSERT INTO `hr_employee_bkup_06_02_20` (`id`, `personal_image`, `employee_no`, `rf_no`, `file_no`, `first_name`, `middle_name`, `last_name`, `gender`, `marital_status`, `nationality`, `dob`, `dom`, `contact_phone`, `contact_mobile`, `contact_email`, `contact_address`, `contact_city`, `contact_country`, `home_phone`, `home_mobile`, `home_email`, `home_address`, `home_country`, `home_city`, `email_personal`, `designation`, `department`, `status`, `hire_date`, `confirmation_date`, `probation_period`, `discontinued_date`, `gratuity_start_date`, `notice_period`, `gratuity_amount`, `pro_name`, `leave_per_month`, `next_leave_due_date`, `increment_due_date`, `note`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `employee_category`, `employee_title`, `father_name`, `mother_name`, `no_of_children`, `spouse_name`, `password`, `insurence_id`, `original_password`, `religion`, `overtime`, `work_shift`, `grade`, `highest_qualification`, `ctc_amount`, `salary_structure_id`, `salary_structure_details`, `pf`, `reporting_manager`, `subordinate`, `salary_structure_breakup`, `work_shift_id`, `voter_card`, `aadhar_card`, `pan_card`, `wfh`) VALUES
(10, '15662811721144594264.png', 'A1234567891', 'A1234567891', 'FT1122', 'Alex', '', 'Jackson', 'Male', 'Married', NULL, '1985-11-14', NULL, '5461646', '61646464646', 'deep_pm@outlook.com', 'llsnfslngl', 'dubai', 'United Arab Emirates', '61664646464', '24864616494', NULL, 'qefffqdqdqd', 'India', 'delhi', NULL, '3', '4', 'Trainee', '2016-06-01', NULL, NULL, '2019-07-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2019-07-04', '2020-02-06 11:30:53', 'Employee', NULL, 'kjnkl', 'dv,snfks', '1', 'efhao', 'd41d8cd98f00b204e9800998ecf8427e', 4, NULL, 'Christine', NULL, NULL, 5, NULL, '500196.25', 21, '[{\"id\":\"60\",\"master_salary_structure_id\":\"21\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"61\",\"master_salary_structure_id\":\"21\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"250000\",\"actual_amount\":\"0.00\"}]', '41683.02', 0, '', '[\"60##250196.25\",\"61##250000\"]', 12, '', '', '', NULL),
(16, '15622299881498437133.jpg', 'A6444616', '', 'F564454', 'PETER', '', 'JOHN', NULL, 'Married', NULL, '1988-03-09', NULL, '69464646', '822964841', 'hh@gmail.com', 'wegesthrj', 'efegggrrrt', 'Bangladesh', '', '5525132262666', NULL, 'hkjojol', 'United Kingdom', 'LONDON', NULL, '3', '4', 'On Service', '2019-07-01', NULL, NULL, '0000-00-00', '0000-00-00', NULL, 0.00, 'deep', 0, '0000-00-00', '0000-00-00', '', 'N', 'Y', '2019-07-04', '2019-07-16 15:35:30', 'Labor', 'MR', 'mvjvjv', 'nbb jhb', '1', 'kkhhholih', 'e10adc3949ba59abbe56e057f20f883e', NULL, '123456', '87', NULL, NULL, 5, NULL, '600000', 21, '[{\"id\":\"60\",\"master_salary_structure_id\":\"21\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"61\",\"master_salary_structure_id\":\"21\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"300000\",\"actual_amount\":\"0.00\"}]', '', 0, '', '[\"60##300000\",\"61##300000\"]', 11, '', '', '', '0'),
(22, '1563103833561566301.jpg', 'KPD12345', '', 'KD11015', 'Kapil', '', 'Dev', 'Male', 'Married', NULL, '2015-06-22', NULL, '656556', '5449791649464', 'fqwdqd@sdf.com', 'akdfakllnjokd', 'dubai', 'United Arab Emirates', '64646464644', '764969464565', NULL, 'kehdkfkqkq', 'India', 'Delhi', NULL, '14', '25', 'On Service', '2016-06-01', NULL, NULL, '0000-00-00', '2017-08-01', NULL, 0.00, 'deep', 4, '2019-08-01', '2020-08-01', 'kjsndkabdfkabkbk', 'N', 'Y', '2019-07-14', '2019-07-16 13:18:45', 'Employee', 'MR', 'Sanjiv Dev', 'Asha Pareekh', '2', 'Reena Dev', 'e10adc3949ba59abbe56e057f20f883e', NULL, '123456', 'Hindu', NULL, NULL, 11, NULL, '15000', 22, '[{\"id\":\"73\",\"master_salary_structure_id\":\"22\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"74\",\"master_salary_structure_id\":\"22\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"20.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"75\",\"master_salary_structure_id\":\"22\",\"component_id\":\"8\",\"operator\":\"*\",\"amount\":\"20.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"76\",\"master_salary_structure_id\":\"22\",\"component_id\":\"7\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"1500\",\"actual_amount\":\"0.00\"}]', '', 0, '', '[\"73##7500\",\"74##3000\",\"75##3000\",\"76##1500\"]', 11, '', '', '', '0'),
(23, '', 'SE155', '', '9999', 'SAYANTAN', '', 'Das', 'Male', 'Unmarried', NULL, '0000-00-00', NULL, '99887722', '9876543211', 'sayantangreat@gmail.com', '5/4C', 'KOLKATA', 'India', '99887722', '9876543211', NULL, '5/4C', 'India', 'KOLKATA', NULL, '13', '27', 'Trainee', '2019-12-10', NULL, NULL, '2020-01-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2019-10-15', '2020-01-21 12:32:15', 'Employee', NULL, 'D.P CHATTERJEE', 'M.CHATTERJEE', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'HINDU', NULL, NULL, 5, NULL, '300000', 46, '[{\"id\":\"276\",\"master_salary_structure_id\":\"46\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"277\",\"master_salary_structure_id\":\"46\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"20.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"}]', '', 0, '', 'null', 11, '', '86868686868686', '4545454', '0'),
(24, '', '2222', '', 'F2222', 'MIHIR', '', 'MUKHERJEE', 'Male', 'Unmarried', NULL, '0000-00-00', NULL, '22228888', '9988776622', 'sayantangreat@gmail.com', '17 LEE ROAD', 'KOLKATA', 'India', '22228888', '9988776622', NULL, '17 LEE RAOD', 'India', 'KOLKATA', NULL, '13', '27', 'On Service', '2018-10-16', NULL, NULL, '2019-10-25', '2019-10-16', NULL, 5000.00, 'KK', 1, '2019-10-18', '2020-11-16', '', 'N', 'Y', '2019-10-16', '2019-10-16 17:07:28', 'Employee', 'Mr', 'ALOK ', 'SAMITA', '', '', 'f1a7bc52174c328ea7e8a7e32b0bde03', NULL, 'MIHIR12', 'HINDU', NULL, NULL, 5, NULL, '700000', 33, '[{\"id\":\"117\",\"master_salary_structure_id\":\"33\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"118\",\"master_salary_structure_id\":\"33\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"119\",\"master_salary_structure_id\":\"33\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"20.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"120\",\"master_salary_structure_id\":\"33\",\"component_id\":\"8\",\"operator\":\"*\",\"amount\":\"60.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"}]', '', 0, '', '[\"117##70000\",\"118##70000\",\"119##140000\",\"120##420000\"]', 11, '', '', '', '0'),
(25, '', 'SE158', '', 'F6666', 'ARIRBAN', '', 'DAS', 'Male', 'Unmarried', NULL, '0000-00-00', NULL, '22223333', '9999888822', 'anirban@gmail.com', 'JAMES LONG ROAD', 'KOLKATA', 'India', '22223333', '9999888822', NULL, 'JAMES LONG ROAD', 'India', 'KOLKATA', NULL, '11', '23', 'Trainee', '2018-05-17', NULL, NULL, '2018-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2019-10-16', '2020-01-21 12:35:06', 'Employee', NULL, 'ALOK', 'AMITA', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'HINDU', NULL, NULL, 5, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '123456789089', '45565656', '0'),
(26, '', '9999', '', 'F9999', 'PRANAB', '', 'BOSE', 'Male', 'Unmarried', NULL, '0000-00-00', NULL, '22223333', '67893344', 'pranab@gmail.com', 'JAMES LONG RAOD', 'KOLKATA', 'India', '22223333', '67893344', NULL, 'JAMES LONG RAOD', 'India', 'KOLKATA', NULL, '4', '27', 'On Service', '2018-05-18', NULL, NULL, '2019-10-20', '2018-05-18', NULL, 0.00, '1', 2, '2019-10-24', '2019-10-24', '', 'N', 'Y', '2019-10-16', '2019-10-16 18:43:56', 'Employee', 'Mr.', 'PRABIR', 'LILA', '', '', 'f9034af7d9f6fcecc83b5e97de819e32', NULL, 'PRANAB1', 'HINDU', NULL, NULL, 5, NULL, '500000', 35, '[{\"id\":\"137\",\"master_salary_structure_id\":\"35\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"138\",\"master_salary_structure_id\":\"35\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"139\",\"master_salary_structure_id\":\"35\",\"component_id\":\"8\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"}]', '', NULL, '', '[\"137##250000\",\"138##125000\",\"139##125000\"]', 11, '', '', '', '0'),
(27, '', 'SWS040', '', 'F44444', 'PRITAM', '', 'PAL', 'Male', 'Unmarried', NULL, '0000-00-00', NULL, '22223333', '8977665511', 'pritam@gmail.com', 'JAMES LONG ROAD', 'KOLKATA', 'India', '22223333', '9988551111', NULL, 'JAMES LONG RAOD', 'India', 'KOLKATA', NULL, '14', '27', 'Trainee', '2018-10-10', NULL, NULL, '2018-08-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2019-10-17', '2020-01-21 12:33:33', 'Employee', NULL, 'AMIT PAL', 'JAYASREE PAL', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'HINDU', NULL, NULL, 5, NULL, '500000', 36, '[{\"id\":\"151\",\"master_salary_structure_id\":\"36\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"152\",\"master_salary_structure_id\":\"36\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"153\",\"master_salary_structure_id\":\"36\",\"component_id\":\"8\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"}]', '', 0, '', '[\"151##250000\",\"152##125000\",\"153##125000\"]', 11, '', '11311141435355', '45565656', '0'),
(28, '', 'A11223344', '', '11223344', 'AKHIL', '', 'ROY', 'Male', 'Unmarried', NULL, '0000-00-00', NULL, '22223333', '9866545445', 'akhil@gmail.com', 'JAMES LONG ROAD', 'KOLKATA', 'India', '22223333', '9866545445', NULL, 'JAMES LONG ROAD', 'India', 'KOLKATA', NULL, '12', '27', 'On Service', '2018-10-21', NULL, NULL, '2019-10-29', '2018-10-21', NULL, 10000.00, 'PRO11223344', 2, '2018-10-22', '2019-10-23', '', 'N', 'Y', '2019-10-21', '2019-10-21 16:04:03', 'Employee', 'Mr.', 'AMIT ROY', 'DEBARITA ROY', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '', 'HINDU', NULL, NULL, 5, NULL, NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0'),
(29, '15764994241592412941.png', 'S-123456', '', 'S121212', 'Sanchari', '', 'De', 'Female', 'Unmarried', NULL, '2017-07-25', NULL, '9674259905', '9674259905', 'sanchari.d@sketchwebsolutions.com', '204/ 1A, raja ram mohan roy road', 'Anantapur', 'India', '9674259905', '9674259905', NULL, '204/ 1A, raja ram mohan roy road', 'India', 'Worthington', NULL, '9', '21', 'Permanent', '2019-08-05', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'trtrtr22', 'N', 'Y', '2019-12-11', '2019-12-19 12:31:16', 'Employee', NULL, 'Tapan de', 'sanchayeeta de', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 20, NULL, '200000', 52, '[{\"id\":\"295\",\"master_salary_structure_id\":\"52\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"50.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"296\",\"master_salary_structure_id\":\"52\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"20.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"297\",\"master_salary_structure_id\":\"52\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"12.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"298\",\"master_salary_structure_id\":\"52\",\"component_id\":\"8\",\"operator\":\"*\",\"amount\":\"24.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"299\",\"master_salary_structure_id\":\"52\",\"component_id\":\"9\",\"operator\":\"*\",\"amount\":\"5.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\"},{\"id\":\"300\",\"master_salary_structure_id\":\"52\",\"component_id\":\"7\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"2000\",\"actual_amount\":\"0.00\"}]', '', 10, '', '[\"295##100000\",\"296##40000\",\"297##24000\",\"298##24000\",\"299##10000\",\"300##2000\"]', 11, '', '', '', '0'),
(30, '', '', '', '', 'sree', '', 'das', NULL, NULL, NULL, '0000-00-00', NULL, '', '', '', '', '', '', '', '9856455443', NULL, '', '', '', NULL, '13', '25', 'On Service', '2020-01-06', NULL, NULL, '0000-00-00', '0000-00-00', NULL, 0.00, '', 0, '0000-00-00', '0000-00-00', '', 'Y', 'N', '2019-12-16', '2019-12-16 18:45:27', 'Employee', 'title', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 19, NULL, NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0'),
(31, '', 'SE040', '', '', 'Jayanata ', '', 'Sengupta', 'Male', 'Unmarried', NULL, '1992-05-01', NULL, '9674324223', '9674324223', 'jayanta@sketchwebsolutions.com', 'joka', 'kolkata', 'India', '', '9674324223', NULL, '', '', '', NULL, '4', '3', 'Permanent', '2019-03-01', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2019-12-18', '2019-12-18 17:36:09', 'Employee', NULL, 'sourav sengupta', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 20, NULL, NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0'),
(32, '', 'E12345', '', 'E1212121', 'Test2', 'Case2', '232', 'Male', 'Unmarried', NULL, '2020-01-01', NULL, '123456789', '123456789', 'test2@eremaiia.com', '24/4 harisava lane behala kolkata 60', 'Select Zone Area', 'Aruba', '1234567', '09873222884', NULL, 'Behala Chowrasta (Janakalyan Bust Stop, 60, Diamond Harbour Road', 'American Samoa', 'Westmoreland', NULL, '8', '21', 'Trainee', '2020-01-01', NULL, NULL, '2020-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-02', '2020-01-03 13:30:28', 'Employee', NULL, 'Giridhari Panda', 'Rajalaxmi Panda', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 12, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', '0'),
(33, '', 'QA-12345', '', 'E1212121', 'Sourav', 'Case2', 'Sen', NULL, 'Unmarried', NULL, '2020-01-01', NULL, '1234567', '1234567', 'developer.wiz02@sketchwebsolutions.com', 'Behala Chowrasta (Janakalyan Bust Stop, 60, Diamond Harbour Road', 'Kolkata', 'India', '123456789', '123456789', NULL, '24/4 harisava lane behala kolkata 60', 'India', 'Select Zone Area', NULL, 'Select', 'Select', 'Trainee', '2020-01-14', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-02', '2020-01-02 12:30:17', 'Employee', NULL, 'Giridhari Panda', 'Rajalaxmi Panda', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 20, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', '0'),
(34, '', '123456', '', '9999', 'Test2', 'Case2', '232', NULL, NULL, NULL, '2020-01-15', NULL, '123456789', '123456789', 'test2@eremaiia.com', '24/4 harisava lane behala kolkata 60', 'Select Zone Area', 'India', '9674259905', '9674259905', NULL, '204/ 1A, raja ram mohan roy road', 'Austria', 'Anantapur', NULL, '10', '22', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-13', '2020-01-21 12:34:22', 'Employee', NULL, 'Giridhari Panda', 'Purnima De', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 15, '5', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '13111414545454', '45565656', '0'),
(35, '', '', '', '', 'deep', 'Case2', 'das', 'Male', NULL, NULL, '2020-01-09', NULL, '123456789', '', 'test2@eremaiia.com', '24/4 harisava lane behala kolkata 60', 'Select Zone Area', 'India', '9573222886', '123456789', NULL, 'Diamond Harbour Rd, Joka, 23, 23, 27F', '', 'Kolkata', NULL, 'Select', 'Select', 'Trainee', '2020-01-01', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-01-13', '2020-01-13 10:08:05', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 0, '5', NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0'),
(36, '', '', '', '', 'deep', 'Case2', 'das', 'Male', NULL, NULL, '2020-01-09', NULL, '123456789', '', 'test2@eremaiia.com', '24/4 harisava lane behala kolkata 60', 'Select Zone Area', 'India', '9573222886', '123456789', NULL, 'Diamond Harbour Rd, Joka, 23, 23, 27F', '', 'Kolkata', NULL, 'Select', 'Select', 'Trainee', '2020-01-01', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-01-13', '2020-01-13 10:08:33', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 0, '5', NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0'),
(37, '', '', '', '', 'sree', 'Case2', 'chattterjee', NULL, NULL, NULL, '0000-00-00', NULL, '9573222886', '', 'developer.wiz11@sketchwebsolutions.com', 'Diamond Harbour Rd, Joka, 23, 23, 27F', 'Kolkata', 'India', '9573222886', '9573222886', NULL, 'Diamond Harbour Rd, Joka, 23, 23, 27F', '', 'Zoe', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-01-13', '2020-01-13 12:38:52', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 0, '', NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0'),
(38, '', 'S-909090', '', 'S121212', 'sree', '', 'chattterjee', 'Male', NULL, NULL, '0000-00-00', NULL, '9573222886', '9573222886', 'developer.wiz11@sketchwebsolutions.com', 'Diamond Harbour Rd, Joka, 23, 23, 27F', 'Kolkata', 'India', '9878675565', '09878675565', NULL, 'Diamond Harbour Rd, Joka, 23, 23, 27F, behala', 'Barbados', 'Yorktown', NULL, 'Select', '4', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-13', '2020-01-13 13:23:22', 'Employee', NULL, 'Giridhari Panda', 'Purnima De', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 20, '', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', '0'),
(39, '', 'SE182', '', 'E1212121', 'sanchari', '', 'de', 'Female', NULL, NULL, '2020-01-14', NULL, '9674259905', '9878675565', 'sanchari.d@sketchwebsolutions.com', '204/ 1A, raja ram mohan roy road', 'Anantapur', '', '9573222886', '+919573222886', NULL, 'Diamond Harbour Rd, Joka, 23, 23, 27F', '', 'Kolkata', NULL, '4', '4', 'Trainee', '2019-12-31', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-13', '2020-02-05 08:00:11', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'HINDU', NULL, NULL, 10, '', NULL, NULL, NULL, '', 0, '', NULL, 11, '', '11311141435355', '4545454', NULL),
(40, '', '', '', '', 'sree', 'Case2', 'chattterjee', NULL, NULL, NULL, '0000-00-00', NULL, '9573222886', '', 'sanchari11@gmail.com', 'Diamond Harbour Rd, Joka, 23, 23, 27F', 'Yorktown', 'India', '9573222886', '+919573222886', NULL, 'Diamond Harbour Rd, Joka, 23, 23, 27F', '', 'Kolkata', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Y', 'N', '2020-01-20', '2020-01-20 08:01:54', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '', '', '0'),
(41, '', 'QA-12345e', '', '9999', 'sree', 'Case2', 'chattterjee', NULL, 'Married', NULL, '0000-00-00', NULL, '9573222886', '9573222886', 'developer.wiz11@44sketchwebsolutions.com', 'Diamond Harbour Rd, Joka, 23, 23, 27F', 'Zoe', 'India', '+919573222886', '+919573222886', NULL, 'Diamond Harbour Rd, Joka, 23, 23', 'India', 'Kolkata', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-20', '2020-01-20 09:33:14', 'Employee', NULL, 'Giridhari Panda', 'Purnima De', 'w', 'efhao', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'HINDU', NULL, NULL, 10, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '', '', '0'),
(42, '', 'QA-1234589', '', '999934', 'sree', '', 'chattterjee', NULL, NULL, NULL, '0000-00-00', NULL, '+919573222886', '+919573222886', 'developer.wiz11@sketchwebsolutions.com', 'Diamond Harbour Rd, Joka, 23, 23', 'Kolkata', 'India', '9873222884', '09873222884', NULL, 'Diamond Harbour Rd, Joka, 23', 'Afghanistan', 'Kolkata', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-20', '2020-01-20 10:23:48', 'Employee', NULL, 'Tapas De', 'Rajalaxmi Panda', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'hindu', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '6612', '86868612113131', '', '0'),
(43, '', '', '', '', 'deeep', '', 'chattterjee', NULL, NULL, NULL, '0000-00-00', NULL, '9573222886', '', 'developer.wiz11@gmail.com', 'Diamond Harbour Rd, Joka, 23, 23, 27F', 'Woodburn', '', '', '78787878787', NULL, '', '', '', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-21', '2020-01-21 06:54:03', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '13111414545454', '4545454', '0'),
(44, '', '', '', '', 'sunny', '', 'pal', NULL, NULL, NULL, '0000-00-00', NULL, '', '', '', '', '', '', '+919573222886', '67676768686', NULL, 'Diamond Harbour Rd, Joka, 23, 23', 'India', 'Kolkata', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-21', '2020-01-21 08:07:36', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '11311141435355', '45565656', '0'),
(45, '', '', '', '', 'Pritam', '', 'Paul', 'Male', 'Married', NULL, '2019-12-30', NULL, '9873222884', '', 'developer.wiz11@sketchwebsolutions.com', 'Diamond Harbour Rd, Joka, 23', 'Kolkata', '', '', '5757575757575', NULL, '', '', '', NULL, 'Select', 'Select', 'Trainee', '2019-12-30', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-22', '2020-01-22 06:14:34', 'Employee', NULL, 'Giridhari Panda', 'Rajalaxmi Panda', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'HINDU', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '86868686868686', '45565656', '1'),
(46, '', '', '12344', '', 'Test2', 'Case2', '232', NULL, NULL, NULL, '2019-12-29', NULL, '123456789', '', 'test2@eremaiia.com', '24/4 harisava lane behala kolkata 60', 'Select Zone Area', 'India', '9878675565', '09878675565', NULL, 'Diamond Harbour Rd, Joka, 23, 23, 27F, behala', '', 'Yorktown', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-27', '2020-01-27 07:38:33', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '3434343434353', '535353353', ''),
(47, '', '', '123441', '', 'sree', 'Case2', 'chattterjee', NULL, NULL, NULL, '2020-01-07', NULL, '9573222886', '', 'developer.wiz11@44sketchwebsolutions.com', 'Diamond Harbour Rd, Joka, 23, 23, 27F', 'Zoe', 'India', '1234567', '1234567', NULL, 'Behala Chowrasta (Janakalyan Bust Stop, 60, Diamond Harbour Road', '', 'Kolkata', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-27', '2020-01-27 07:43:20', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', 0, '', NULL, 11, '', '45454565768779797', '9080575757', NULL),
(48, '', '', '1234411', '', 'sree', 'qwq', 'qw', NULL, NULL, NULL, '0000-00-00', NULL, '9573222886', '', 'developer.wiz11@gmail.com', 'Diamond Harbour Rd, Joka, 23, 23, 27F', 'Woodburn', '', '', '575755755757', NULL, '', '', '', NULL, 'Select', 'Select', 'Trainee', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'N', 'Y', '2020-01-27', '2020-01-27 07:44:06', 'Employee', NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, '', NULL, 11, '', '131324355446', '6464464', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_education`
--

CREATE TABLE `hr_employee_education` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `marks` float(9,2) DEFAULT NULL,
  `cv` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_education`
--

INSERT INTO `hr_employee_education` (`id`, `employee_id`, `level`, `institute`, `year`, `marks`, `cv`) VALUES
(1, 42, 'utut', 'ttutututu', '2019', 56.89, NULL),
(2, 42, 'utut', 'ttutututu', '2020', 67.00, NULL),
(3, 44, 'utut', 'ttutututu', '2020', 78.00, NULL),
(4, 46, '10', 'WB', '2010', 50.00, NULL),
(5, 51, 'MBA', 'cu', '2018', 52.00, '1584611824_file_motoe4plus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_education_temp`
--

CREATE TABLE `hr_employee_education_temp` (
  `id` int(11) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `marks` float(9,2) DEFAULT NULL,
  `cv` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_esi`
--

CREATE TABLE `hr_employee_esi` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `esi_no` varchar(255) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee_esi`
--

INSERT INTO `hr_employee_esi` (`id`, `employee_id`, `esi_no`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 33, 'ESI123414', 'N', 'Y', '2020-01-02', '2020-01-02 12:30:17'),
(2, 46, 'SAGSH12358A', 'N', 'Y', '2020-03-06', '2020-04-11 10:31:46'),
(3, 51, 'esi1234', 'N', 'Y', '2020-03-19', '2020-03-25 19:11:51'),
(4, 54, 'ESI1234', 'N', 'Y', '2020-04-02', '2020-04-03 10:08:24'),
(5, 56, 'ESI05', 'N', 'Y', '2020-04-03', '0000-00-00 00:00:00'),
(6, 58, 'ESI1', 'N', 'Y', '2020-04-13', '2020-04-23 11:41:47'),
(7, 28, 'ESI12345', 'N', 'Y', '2020-04-17', '2020-04-17 12:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_expenses`
--

CREATE TABLE `hr_employee_expenses` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `expenses_name` varchar(255) DEFAULT NULL,
  `from_year` varchar(8) DEFAULT NULL,
  `to_year` varchar(8) DEFAULT NULL,
  `visa_cost` float(9,2) DEFAULT NULL,
  `insurance_cost` float(9,2) DEFAULT NULL,
  `other_cost` float(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_expenses`
--

INSERT INTO `hr_employee_expenses` (`id`, `employee_id`, `expenses_name`, `from_year`, `to_year`, `visa_cost`, `insurance_cost`, `other_cost`) VALUES
(9, 10, 'ghfgh', '2009', '2010', 44.00, 444.00, 555.00),
(11, 10, 'erty', '2009', '2010', 66.00, 666.00, 777.00);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_experience`
--

CREATE TABLE `hr_employee_experience` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `cv` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_experience`
--

INSERT INTO `hr_employee_experience` (`id`, `employee_id`, `company`, `job_title`, `from_date`, `to_date`, `cv`) VALUES
(1, 41, 'sketch web solutions', 'rtrt', '2019-12-29', '2020-01-23', NULL),
(2, 41, 'sketch web solutions', 'rtrt', '2019-12-29', '2020-01-23', NULL),
(3, 41, 'wew', 'wewe', '2019-12-29', '2020-01-13', NULL),
(4, 41, 'wew', 'wewew', '2019-12-30', '2020-02-05', NULL),
(5, 44, 'sketch web solutions', 'wewew', '2020-01-27', '2020-01-29', NULL),
(6, 44, 'sketch web solutions', 'wewew', '2019-12-29', '2020-02-08', '1579590444_file_800_issues_(1).pdf'),
(7, 46, 'TRANSPORT AGENCY', 'DRIVER', '2015-01-01', '2017-12-31', ''),
(8, 46, 'BRITANIA COMPANY', 'DRIVER', '2018-01-01', '2019-12-31', ''),
(9, 51, 'SKAKTI FASHION PVT. LTD.', 'manager', '2017-01-01', '2018-12-31', '1584611485_file_demo_attendance_(1).csv'),
(10, 51, 'SKAKTI FASHION PVT. LTD.', 'manager', '2017-01-01', '2018-12-31', '1584611628_file_demo_attendance_(1).csv'),
(11, 51, 'mega trade center', 'manager', '2018-01-01', '2019-04-19', '1584611824_file_motoe4plus.jpg'),
(12, 29, 'this is test', 'this is test', '2020-04-23', '2020-04-23', '1587619340_file_60e3736ffc760ddc35179c75d3b10406.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_experience_temp`
--

CREATE TABLE `hr_employee_experience_temp` (
  `id` int(11) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `cv` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_leaves`
--

CREATE TABLE `hr_employee_leaves` (
  `id` int(11) NOT NULL,
  `leave_application_id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `credited_month` varchar(100) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `leave_id` int(11) DEFAULT NULL,
  `opening_balance` varchar(255) DEFAULT NULL,
  `opening_leaves` varchar(255) NOT NULL,
  `credited_leaves` varchar(255) NOT NULL,
  `taken_leaves` varchar(255) NOT NULL,
  `leave_deduction` varchar(255) NOT NULL,
  `lop` varchar(11255) NOT NULL,
  `note` text NOT NULL,
  `entry_date` date DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `closing_balance` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_leaves`
--

INSERT INTO `hr_employee_leaves` (`id`, `leave_application_id`, `attendance_id`, `type`, `credited_month`, `employee_id`, `leave_id`, `opening_balance`, `opening_leaves`, `credited_leaves`, `taken_leaves`, `leave_deduction`, `lop`, `note`, `entry_date`, `modified_date`, `date`, `closing_balance`, `flag`) VALUES
(1, 0, 0, 'opening leave', 'January', 5, 1, '9', '9', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(2, 0, 0, 'opening leave', 'January', 5, 2, '27', '27', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '27', 0),
(3, 0, 0, 'opening leave', 'January', 7, 1, '11', '11', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '11', 0),
(4, 0, 0, 'opening leave', 'January', 7, 2, '26', '26', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '26', 0),
(5, 0, 0, 'opening leave', 'January', 6, 1, '3', '3', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(6, 0, 0, 'opening leave', 'January', 6, 2, '7', '7', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(7, 0, 0, 'opening leave', 'January', 13, 1, '6', '6', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(8, 0, 0, 'opening leave', 'January', 13, 2, '13', '13', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '13', 0),
(9, 0, 0, 'opening leave', 'January', 8, 1, '6', '6', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(10, 0, 0, 'opening leave', 'January', 8, 2, '21', '21', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '21', 0),
(11, 0, 0, 'opening leave', 'January', 10, 1, '4', '4', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(12, 0, 0, 'opening leave', 'January', 10, 2, '24', '24', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '24', 0),
(13, 0, 0, 'opening leave', 'January', 9, 1, '5', '5', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '5', 0),
(14, 0, 0, 'opening leave', 'January', 9, 2, '10', '10', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '10', 0),
(15, 0, 0, 'opening leave', 'January', 11, 1, '9', '9', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(16, 0, 0, 'opening leave', 'January', 11, 2, '3', '3', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(17, 0, 0, 'opening leave', 'January', 12, 1, '7', '7', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(18, 0, 0, 'opening leave', 'January', 12, 2, '4', '4', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(19, 0, 0, 'opening leave', 'January', 14, 1, '7', '7', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(20, 0, 0, 'opening leave', 'January', 14, 2, '3', '3', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(21, 0, 0, 'opening leave', 'January', 42, 1, '11', '11', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '11', 0),
(22, 0, 0, 'opening leave', 'January', 42, 2, '23.5', '24', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '23.5', 0),
(23, 0, 0, 'opening leave', 'January', 19, 1, '4', '4', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(24, 0, 0, 'opening leave', 'January', 19, 2, '1', '1', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '1', 0),
(25, 0, 0, 'opening leave', 'January', 41, 1, '6', '6', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(26, 0, 0, 'opening leave', 'January', 41, 2, '6', '6', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(27, 0, 0, 'opening leave', 'January', 21, 1, '8', '8', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(28, 0, 0, 'opening leave', 'January', 21, 2, '17', '17', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '17', 0),
(29, 0, 0, 'opening leave', 'January', 24, 1, '6', '6', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(30, 0, 0, 'opening leave', 'January', 24, 2, '10', '10', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '10', 0),
(31, 0, 0, 'opening leave', 'January', 15, 1, '9', '9', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(32, 0, 0, 'opening leave', 'January', 15, 2, '24', '24', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '24', 0),
(33, 0, 0, 'opening leave', 'January', 20, 1, '5', '5', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '5', 0),
(34, 0, 0, 'opening leave', 'January', 20, 2, '20', '20', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '20', 0),
(35, 0, 0, 'opening leave', 'January', 26, 1, '8', '8', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(36, 0, 0, 'opening leave', 'January', 26, 2, '28', '28', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '28', 0),
(37, 0, 0, 'opening leave', 'January', 22, 2, '9', '9', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(38, 0, 0, 'opening leave', 'January', 17, 1, '7', '7', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(39, 0, 0, 'opening leave', 'January', 17, 2, '4', '4', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(40, 0, 0, 'opening leave', 'January', 29, 1, '9', '9', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(41, 0, 0, 'opening leave', 'January', 29, 2, '9', '9', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(42, 0, 0, 'opening leave', 'January', 16, 1, '8', '8', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(43, 0, 0, 'opening leave', 'January', 16, 2, '15', '15', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '15', 0),
(44, 0, 0, 'opening leave', 'January', 30, 1, '1', '1', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '1', 0),
(45, 0, 0, 'opening leave', 'January', 30, 2, '4.5', '5', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '4.5', 0),
(46, 0, 0, 'opening leave', 'January', 18, 1, '9', '9', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(47, 0, 0, 'opening leave', 'January', 18, 2, '3', '3', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(48, 0, 0, 'opening leave', 'January', 28, 1, '11', '11', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '11', 0),
(49, 0, 0, 'opening leave', 'January', 28, 2, '10', '8', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(50, 0, 0, 'opening leave', 'January', 27, 1, '9', '9', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(51, 0, 0, 'opening leave', 'January', 27, 2, '2', '2', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '2', 0),
(52, 0, 0, 'opening leave', 'January', 4, 1, '7', '7', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(53, 0, 0, 'opening leave', 'January', 4, 2, '5', '5', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '5', 0),
(54, 0, 0, 'opening leave', 'January', 25, 1, '6', '6', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(55, 0, 0, 'opening leave', 'January', 25, 2, '7', '7', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(56, 0, 0, 'opening leave', 'January', 32, 1, '6', '6', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(57, 0, 0, 'opening leave', 'January', 32, 2, '2', '2', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '2', 0),
(58, 0, 0, 'opening leave', 'January', 39, 1, '8', '8', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(59, 0, 0, 'opening leave', 'January', 39, 2, '5', '5', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '5', 0),
(60, 0, 0, 'opening leave', 'January', 38, 1, '4', '4', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(61, 0, 0, 'opening leave', 'January', 38, 2, '3', '3', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(62, 0, 0, 'opening leave', 'January', 3, 1, '10', '10', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '10', 0),
(63, 0, 0, 'opening leave', 'January', 3, 2, '27', '27', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '27', 0),
(64, 0, 0, 'opening leave', 'January', 2, 1, '12', '12', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '12', 0),
(65, 0, 0, 'opening leave', 'January', 2, 2, '49', '49', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '49', 0),
(66, 0, 0, 'opening leave', 'January', 23, 1, '0.5', '1', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '0.5', 0),
(67, 0, 0, 'opening leave', 'January', 23, 2, '3', '3', '0', '0', '0', '0', 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(87, 0, 0, 'Late Deduction', 'February', 2, 1, '-1', '0', '0', '1', '0', '0', 'deduction', '2020-02-06', NULL, '2020-02-06', '11', 100),
(99, 3, 0, 'approved', 'January', 2, 1, '-1', '0', '0', '1', '0', '0', 'ddd', '2020-01-27', NULL, '2020-01-27', '6', 0),
(105, 0, 0, 'opening leave', 'January', 50, 1, '13', '0', '0', '0', '0', '0', '', '2020-03-19', NULL, '2020-03-19', '13', 0),
(106, 0, 0, 'opening leave', 'January', 50, 2, '1', '0', '0', '0', '0', '0', '', '2020-03-19', NULL, '2020-03-19', '1', 0),
(107, 0, 0, 'opening leave', 'January', 50, 3, '1', '0', '0', '0', '0', '0', '', '2020-03-19', NULL, '2020-03-19', '1', 0),
(124, 0, 5, 'Absent', 'January', 51, NULL, NULL, '0', '0', '0', '0', '1', 'deduction', '2020-01-08', NULL, '2020-01-08', '0', 0),
(127, 0, 0, 'Late Deduction', 'January', 11, 1, '-1', '0', '0', '1', '0', '0', 'deduction', '2020-01-14', NULL, '2020-01-14', '7', 100),
(129, 0, 35, 'Absent', 'June', 11, 1, '-1', '0', '0', '1', '0', '0', 'deduction', '2020-06-01', NULL, '2020-06-01', '5', 0),
(133, 0, 0, 'Late Deduction', 'January', 29, 1, '-1', '0', '0', '1', '0', '0', 'deduction', '2020-01-14', NULL, '2020-01-14', '7', 100),
(136, 0, 0, 'opening leave', 'January', 51, 1, '11', '11', '0', '0', '0', '0', 'opening leave', '2020-03-20', NULL, '2020-03-20', '11', 0),
(137, 0, 0, 'opening leave', 'January', 51, 2, '11', '11', '0', '0', '0', '0', 'opening leave', '2020-03-20', NULL, '2020-03-20', '11', 0),
(138, 0, 0, 'opening leave', 'March', 48, 1, '12', '12', '0', '0', '0', '0', 'opening leave', '2020-03-24', NULL, '2020-03-24', '12', 0),
(139, 0, 0, 'opening leave', 'March', 48, 2, '2', '2', '0', '0', '0', '0', 'opening leave', '2020-03-24', NULL, '2020-03-24', '2', 0),
(144, 0, 0, 'Late Deduction', 'February', 51, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-06', NULL, '2020-02-06', '', 100),
(145, 0, 0, 'Late Deduction', 'February', 51, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-10', NULL, '2020-02-10', '', 1),
(146, 0, 0, 'Late Deduction', 'February', 51, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-14', NULL, '2020-02-14', '', 2),
(147, 0, 0, 'Late Deduction', 'February', 51, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-19', NULL, '2020-02-19', '', 3),
(148, 0, 0, 'Late Deduction', 'February', 51, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-22', NULL, '2020-02-22', '', 4),
(149, 0, 0, 'Late Deduction', 'February', 51, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-26', NULL, '2020-02-26', '', 5),
(151, 0, 0, 'opening leave', 'March', 52, 1, '11', '', '', '', '', '', '', '2020-03-27', NULL, '2020-03-27', '11', 0),
(152, 0, 0, 'opening leave', 'April', 52, 2, '1', '', '', '', '', '', '', '2020-04-28', NULL, '2020-04-28', '1', 0),
(153, 0, 0, 'opening leave', 'April', 52, 3, '0', '', '', '', '', '', '', '2020-04-28', NULL, '2020-04-28', '0', 0),
(154, 0, 0, 'opening leave', 'March', 53, 1, '11', '', '', '', '', '', '', '2020-03-27', NULL, '2020-03-27', '11', 0),
(155, 0, 0, 'opening leave', 'April', 53, 2, '1', '', '', '', '', '', '', '2020-04-28', NULL, '2020-04-28', '1', 0),
(156, 0, 0, 'opening leave', 'April', 53, 3, '0', '', '', '', '', '', '', '2020-04-28', NULL, '2020-04-28', '0', 0),
(158, 0, 0, 'opening leave', 'January', 54, 1, '13', '', '', '', '', '', '', '2020-04-01', NULL, '2020-04-01', '13', 0),
(159, 0, 0, 'opening leave', 'January', 54, 2, '10', '', '', '', '', '', '', '2020-04-01', NULL, '2020-04-01', '1', 0),
(160, 0, 0, 'opening leave', 'January', 54, 3, '5', '', '', '', '', '', '', '2020-04-01', NULL, '2020-04-01', '0', 0),
(161, 7, 0, 'approved', 'March', 2, 2, '-2', '', '', '2', '', '', '', '2020-03-23', NULL, '2020-03-23', '47', 0),
(162, 7, 0, 'approved', 'March', 2, 2, '-2', '', '', '2', '', '', '', '2020-03-23', NULL, '2020-03-23', '45', 0),
(163, 7, 0, 'approved', 'March', 2, 2, '-2', '', '', '2', '', '', '', '2020-03-23', NULL, '2020-03-23', '43', 0),
(164, 7, 0, 'approved', 'March', 2, 2, '-2', '', '', '2', '', '', '', '2020-03-23', NULL, '2020-03-23', '41', 0),
(165, 7, 0, 'approved', 'March', 2, 2, '-2', '', '', '2', '', '', '', '2020-03-23', NULL, '2020-03-23', '39', 0),
(166, 7, 0, 'approved', 'March', 2, 2, '-2', '', '', '2', '', '', '', '2020-03-23', NULL, '2020-03-23', '37', 0),
(167, 7, 0, 'approved', 'March', 2, 2, '-2', '', '', '2', '', '', '', '2020-03-23', NULL, '2020-03-23', '35', 0),
(168, 7, 0, 'approved', 'March', 2, 2, '-2', '', '', '2', '', '', '', '2020-03-23', NULL, '2020-03-23', '33', 0),
(169, 7, 0, 'approved', 'March', 2, 2, '-2', '', '', '2', '', '', '', '2020-03-23', NULL, '2020-03-23', '31', 0),
(170, 14, 0, 'approved', 'March', 2, 2, '-1', '', '', '1', '', '', '', '2020-03-28', NULL, '2020-03-28', '30', 0),
(171, 2, 0, 'approved', 'February', 2, 1, '-3', '', '', '3', '', '', 'tytyt', '2020-02-18', NULL, '2020-02-18', '3', 0),
(172, 0, 0, 'opening leave', 'May', 55, 1, '1', '', '', '', '', '', '', '2020-05-02', NULL, '2020-05-02', '1', 0),
(173, 0, 0, 'opening leave', 'April', 55, 2, '1', '', '', '', '', '', '', '2020-04-02', NULL, '2020-04-02', '1', 0),
(174, 0, 0, 'opening leave', 'May', 55, 3, '1', '', '', '', '', '', '', '2020-05-02', NULL, '2020-05-02', '1', 0),
(177, 0, 0, 'opening leave', 'January', 56, 1, '12', '', '', '', '', '', '', '2020-04-03', NULL, '2020-04-03', '12', 0),
(178, 0, 0, 'opening leave', 'January', 56, 2, '5', '', '', '', '', '', '', '2020-04-03', NULL, '2020-04-03', '1', 0),
(179, 0, 0, 'opening leave', 'January', 56, 3, '12', '', '', '', '', '', '', '2020-04-03', NULL, '2020-04-03', '12', 0),
(180, 0, 0, 'opening leave', 'January', 57, 1, '12', '12', '', '', '', '', 'opening leave', '2020-04-03', NULL, '2020-04-03', '12', 0),
(181, 0, 0, 'opening leave', 'January', 57, 2, '5', '5', '', '', '', '', 'opening leave', '2020-04-03', NULL, '2020-04-03', '5', 0),
(203, 1, 0, 'approved', 'February', 2, 1, '-3', '', '', '3', '', '', 'rtrtrtrt', '2020-02-04', NULL, '2020-02-04', '0', 0),
(219, 0, 0, 'opening leave', 'April', 59, 1, '9', '', '', '', '', '', '', '2020-04-13', NULL, '2020-04-13', '9', 0),
(220, 0, 0, 'opening leave', 'April', 59, 2, '1', '', '', '', '', '', '', '2020-04-13', NULL, '2020-04-13', '1', 0),
(221, 0, 0, 'opening leave', 'April', 59, 3, '9', '', '', '', '', '', '', '2020-04-13', NULL, '2020-04-13', '9', 0),
(234, 0, 0, 'opening leave', 'January', 58, 1, '4', '4', '', '', '', '', 'opening leave', '2020-04-13', NULL, '2020-04-13', '4', 0),
(235, 0, 0, 'opening leave', 'January', 58, 2, '12', '12', '', '', '', '', 'opening leave', '2020-04-13', NULL, '2020-04-13', '12', 0),
(236, 0, 0, 'opening leave', 'January', 60, 1, '12', '', '', '', '', '', '', '2020-04-13', NULL, '2020-04-13', '12', 0),
(237, 0, 0, 'opening leave', 'January', 60, 2, '1', '', '', '', '', '', '', '2020-04-13', NULL, '2020-04-13', '1', 0),
(244, 23, 0, 'approved', 'January', 2, 2, '-2', '', '', '2', '', '', 'tour purpose', '2020-01-30', NULL, '2020-01-30', '28', 0),
(257, 0, 553, 'Half', 'January', 58, 1, '-.5', '', '', '.5', '', '', 'deduction', '2020-01-02', NULL, '2020-01-02', '', 0),
(259, 0, 0, 'Late Deduction', 'January', 58, 1, '-1', '', '', '1', '', '', 'deduction', '2020-01-28', NULL, '2020-01-28', '', 100),
(260, 0, 0, 'Late Deduction', 'February', 28, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-06', NULL, '2020-02-06', '', 100),
(261, 0, 0, 'Late Deduction', 'February', 28, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-10', NULL, '2020-02-10', '', 1),
(262, 0, 0, 'Late Deduction', 'February', 54, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-06', NULL, '2020-02-06', '', 100),
(263, 0, 0, 'Late Deduction', 'February', 54, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-10', NULL, '2020-02-10', '', 1),
(264, 0, 590, 'Absent', 'February', 54, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-11', NULL, '2020-02-11', '', 0),
(265, 0, 594, 'Absent', 'February', 54, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-18', NULL, '2020-02-18', '', 0),
(266, 0, 0, 'Late Deduction', 'February', 54, 1, '-1', '', '', '1', '', '', 'deduction', '2020-02-18', NULL, '2020-02-18', '', 2),
(267, 0, 595, 'Half', 'February', 54, 1, '-.5', '', '', '.5', '', '', 'deduction', '2020-02-19', NULL, '2020-02-19', '', 0),
(269, 29, 0, 'approved', 'February', 54, 1, '-1', '', '', '1', '', '', 'CL testing 17.04.2020', '2020-02-24', NULL, '2020-02-24', '-1', 0),
(278, 9, 0, 'approved', 'January', 50, 1, '-4', '', '', '4', '', '', 'feaber', '2020-01-16', NULL, '2020-01-16', '9', 0),
(280, 31, 0, 'approved', 'May', 29, 1, '-1', '', '', '1', '', '', 'personal', '2020-05-01', NULL, '2020-05-01', '3', 0),
(282, 30, 0, 'approved', 'April', 29, 1, '-1', '', '', '1', '', '', 'Family emergency', '2020-04-29', NULL, '2020-04-29', '2', 0),
(283, 27, 0, 'approved', 'January', 58, 2, '-2', '', '', '2', '', '', 'tour', '2020-01-30', NULL, '2020-01-30', '10', 0),
(284, 28, 0, 'approved', 'February', 54, 2, '-3', '', '', '3', '', '', '17.04.2020 PL checking purpose', '2020-02-20', NULL, '2020-02-20', '-2', 0),
(285, 11, 0, 'approved', 'February', 51, 1, '-1', '', '', '1', '', '', 'head pain', '2020-02-13', NULL, '2020-02-13', '-1', 0),
(286, 0, 0, 'opening leave', 'May', 61, 1, '8', '', '', '', '', '', '', '2020-05-04', NULL, '2020-05-04', '8', 0),
(287, 0, 0, 'opening leave', 'June', 61, 2, '1', '', '', '', '', '', '', '2020-06-04', NULL, '2020-06-04', '1', 0),
(288, 0, 0, 'opening leave', 'May', 62, 1, '8', '', '', '', '', '', '', '2020-05-04', NULL, '2020-05-04', '8', 0),
(289, 0, 0, 'opening leave', 'June', 62, 2, '1', '', '', '', '', '', '', '2020-06-04', NULL, '2020-06-04', '1', 0),
(290, 0, 0, 'opening leave', 'May', 63, 1, '8', '', '', '', '', '', '', '2020-05-04', NULL, '2020-05-04', '8', 0),
(291, 0, 0, 'opening leave', 'June', 63, 2, '1', '', '', '', '', '', '', '2020-06-04', NULL, '2020-06-04', '1', 0),
(297, 0, 635, 'Absent', 'May', 63, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-06', NULL, '2020-05-06', '', 0),
(299, 0, 636, 'Absent', 'May', 63, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-06', NULL, '2020-05-06', '', 0),
(307, 5, 0, 'approved', 'March', 29, 2, '-2', '', '', '2', '', '', '', '2020-03-05', NULL, '2020-03-05', '7', 0),
(309, 0, 638, 'Absent', 'May', 63, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-06', NULL, '2020-05-06', '', 0),
(319, 0, 0, 'opening leave', 'January', 64, 1, '12', '', '', '', '', '', '', '2020-05-19', NULL, '2020-05-19', '12', 0),
(320, 0, 0, 'opening leave', 'February', 64, 2, '1', '', '', '', '', '', '', '2020-02-02', NULL, '2020-02-02', '1', 0),
(321, 0, 0, 'opening leave', 'January', 64, 3, '12', '', '', '', '', '', '', '2020-05-19', NULL, '2020-05-19', '12', 0),
(322, 0, 1, 'Absent', 'May', 38, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-19', NULL, '2020-05-19', '', 0),
(323, 0, 3, 'Absent', 'May', 13, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-19', NULL, '2020-05-19', '', 0),
(324, 0, 6, 'Absent', 'May', 40, NULL, NULL, '', '', '', '', '1', 'deduction', '2020-05-20', NULL, '2020-05-20', '0', 0),
(325, 0, 4, 'Half', 'May', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-05-20', NULL, '2020-05-20', '0', 0),
(326, 0, 7, 'Half', 'May', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-05-21', NULL, '2020-05-21', '0', 0),
(327, 0, 10, 'Half', 'May', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-05-22', NULL, '2020-05-22', '0', 0),
(328, 0, 11, 'Half', 'May', 42, NULL, NULL, '', '', '', '', '1', 'deduction', '2020-05-23', NULL, '2020-05-23', '0', 0),
(332, 0, 13, 'Absent', 'May', 42, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-25', NULL, '2020-05-25', '', 0),
(333, 0, 15, 'Absent', 'May', 42, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-26', NULL, '2020-05-26', '', 0),
(334, 0, 18, 'Absent', 'May', 42, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-27', NULL, '2020-05-27', '', 0),
(335, 0, 20, 'Absent', 'May', 13, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-27', NULL, '2020-05-27', '', 0),
(337, 0, 22, 'Absent', 'May', 42, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-28', NULL, '2020-05-28', '', 0),
(338, 0, 0, 'Late Deduction', 'May', 13, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-28', NULL, '2020-05-28', '', 100),
(339, 0, 24, 'Absent', 'May', 13, 1, '-1', '', '', '1', '', '', 'deduction', '2020-05-28', NULL, '2020-05-28', '', 0),
(342, 0, 28, 'Half', 'May', 13, NULL, NULL, '', '', '', '', '', 'deduction', '2020-05-29', NULL, '2020-05-29', '0', 0),
(343, 0, 26, 'Half', 'May', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-05-29', NULL, '2020-05-29', '0', 0),
(347, 0, 32, 'Absent', 'June', 41, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-01', NULL, '2020-06-01', '', 0),
(348, 0, 33, 'Absent', 'June', 13, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-01', NULL, '2020-06-01', '', 0),
(349, 0, 34, 'Absent', 'June', 42, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-01', NULL, '2020-06-01', '', 0),
(350, 0, 36, 'Absent', 'June', 42, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-02', NULL, '2020-06-02', '', 0),
(351, 0, 0, 'Late Deduction', 'June', 13, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-04', NULL, '2020-06-04', '', 100),
(352, 0, 46, 'Absent', 'June', 13, 2, '-1', '', '', '1', '', '', 'deduction', '2020-06-04', NULL, '2020-06-04', '', 0),
(353, 0, 0, 'opening leave', 'June', 65, 1, '7', '', '', '', '', '', '', '2020-06-05', NULL, '2020-06-05', '7', 0),
(354, 0, 0, 'opening leave', 'July', 65, 2, '1', '', '', '', '', '', '', '2020-07-05', NULL, '2020-07-05', '1', 0),
(355, 0, 0, 'opening leave', 'June', 66, 1, '7', '', '', '', '', '', '', '2020-06-05', NULL, '2020-06-05', '7', 0),
(356, 0, 0, 'opening leave', 'July', 66, 2, '1', '', '', '', '', '', '', '2020-07-05', NULL, '2020-07-05', '1', 0),
(357, 0, 50, 'Absent', 'June', 17, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-05', NULL, '2020-06-05', '', 0),
(358, 0, 63, 'Absent', 'June', 15, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-09', NULL, '2020-06-09', '', 0),
(359, 0, 66, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-09', NULL, '2020-06-09', '0', 0),
(360, 0, 74, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-10', NULL, '2020-06-10', '0', 0),
(361, 0, 75, 'Half', 'June', 41, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-10', NULL, '2020-06-10', '0', 0),
(362, 0, 76, 'Absent', 'June', 13, 2, '-1', '', '', '1', '', '', 'deduction', '2020-06-10', NULL, '2020-06-10', '', 0),
(363, 0, 83, 'Absent', 'June', 42, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-11', NULL, '2020-06-11', '', 0),
(364, 0, 89, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-12', NULL, '2020-06-12', '0', 0),
(365, 0, 91, 'Half', 'June', 13, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-12', NULL, '2020-06-12', '0', 0),
(366, 0, 99, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '1', 'deduction', '2020-06-13', NULL, '2020-06-13', '0', 0),
(367, 0, 106, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-15', NULL, '2020-06-15', '0', 0),
(368, 0, 115, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-16', NULL, '2020-06-16', '0', 0),
(370, 0, 123, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-17', NULL, '2020-06-17', '0', 0),
(371, 0, 0, 'Late Deduction', 'June', 42, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-18', NULL, '2020-06-18', '', 100),
(372, 0, 130, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-18', NULL, '2020-06-18', '0', 0),
(373, 0, 138, 'Absent', 'June', 41, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-19', NULL, '2020-06-19', '', 0),
(374, 0, 137, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-19', NULL, '2020-06-19', '0', 0),
(375, 0, 139, 'Absent', 'June', 34, NULL, NULL, '', '', '', '', '1', 'deduction', '2020-06-19', NULL, '2020-06-19', '0', 0),
(378, 0, 155, 'Absent', 'June', 22, NULL, NULL, '', '', '', '', '1', 'deduction', '2020-06-22', NULL, '2020-06-22', '0', 0),
(379, 0, 151, 'Absent', 'June', 14, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-22', NULL, '2020-06-22', '', 0),
(381, 0, 0, 'opening leave', 'March', 67, 1, '10', '', '', '', '', '', '', '2020-06-22', NULL, '2020-06-22', '10', 0),
(382, 0, 0, 'opening leave', 'April', 67, 2, '1', '', '', '', '', '', '', '2020-04-10', NULL, '2020-04-10', '1', 0),
(383, 0, 179, 'Half', 'June', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-06-23', NULL, '2020-06-23', '0', 0),
(384, 0, 196, 'Absent', 'June', 41, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-24', NULL, '2020-06-24', '', 0),
(385, 0, 197, 'Absent', 'June', 24, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-24', NULL, '2020-06-24', '', 0),
(387, 0, 0, 'Late Deduction', 'June', 29, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-26', NULL, '2020-06-26', '', 100),
(388, 0, 239, 'Absent', 'June', 67, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-26', NULL, '2020-06-26', '', 0),
(389, 0, 258, 'Absent', 'June', 24, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-27', NULL, '2020-06-27', '', 0),
(393, 0, 284, 'Absent', 'June', 32, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-30', NULL, '2020-06-30', '', 0),
(394, 0, 0, 'Late Deduction', 'June', 42, 1, '-1', '', '', '1', '', '', 'deduction', '2020-06-30', NULL, '2020-06-30', '', 1),
(396, 0, 317, 'Absent', 'July', 67, 1, '-1', '', '', '1', '', '', 'deduction', '2020-07-02', NULL, '2020-07-02', '', 0),
(397, 0, 324, 'Half', 'July', 42, NULL, NULL, '', '', '', '', '', 'deduction', '2020-07-02', NULL, '2020-07-02', '0', 0),
(398, 0, 0, 'Late Deduction', 'July', 13, NULL, NULL, '', '', '', '', '1', 'deduction', '2020-07-08', NULL, '2020-07-08', '', 100),
(399, 0, 474, 'Absent', 'July', 11, 1, '-1', '', '', '1', '', '', 'deduction', '2020-07-15', NULL, '2020-07-15', '', 0),
(400, 0, 503, 'Absent', 'July', 11, 1, '-1', '', '', '1', '', '', 'deduction', '2020-07-17', NULL, '2020-07-17', '', 0),
(401, 0, 0, 'Late Deduction', 'July', 11, 1, '-1', '', '', '1', '', '', 'deduction', '2020-07-21', NULL, '2020-07-21', '', 100),
(402, 0, 533, 'Absent', 'July', 11, 1, '-1', '', '', '1', '', '', 'deduction', '2020-07-21', NULL, '2020-07-21', '', 0),
(0, 0, 0, 'opening leave', 'June', 134, 1, '-29', '', '', '', '', '', '', '2023-06-05', NULL, '2023-06-05', '-29', 0),
(0, 0, 0, 'opening leave', 'July', 134, 2, '1', '', '', '', '', '', '', '2023-07-07', NULL, '2023-07-07', '1', 0),
(0, 0, 0, 'opening leave', 'June', 134, 3, '-29', '', '', '', '', '', '', '2023-06-05', NULL, '2023-06-05', '-29', 0),
(0, 0, 0, 'opening leave', 'June', 135, 1, '-29', '', '', '', '', '', '', '2023-06-07', NULL, '2023-06-07', '-29', 0),
(0, 0, 0, 'opening leave', 'July', 135, 2, '1', '', '', '', '', '', '', '2023-07-07', NULL, '2023-07-07', '1', 0),
(0, 0, 0, 'opening leave', 'June', 135, 3, '-29', '', '', '', '', '', '', '2023-06-07', NULL, '2023-06-07', '-29', 0),
(0, 0, 0, 'approved', 'May', 24, NULL, NULL, '', '', '', '', '22', 'ok ', '2023-05-10', NULL, '2023-05-10', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_leaves_05_02_20`
--

CREATE TABLE `hr_employee_leaves_05_02_20` (
  `id` int(11) NOT NULL,
  `leave_application_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `credited_month` varchar(100) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `leave_id` int(11) DEFAULT NULL,
  `opening_balance` varchar(255) DEFAULT NULL,
  `opening_leaves` int(11) NOT NULL,
  `credited_leaves` int(11) NOT NULL,
  `taken_leaves` int(11) NOT NULL,
  `leave_deduction` int(11) NOT NULL,
  `lop` int(11) NOT NULL,
  `note` text NOT NULL,
  `entry_date` date DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `closing_balance` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_leaves_05_02_20`
--

INSERT INTO `hr_employee_leaves_05_02_20` (`id`, `leave_application_id`, `type`, `credited_month`, `employee_id`, `leave_id`, `opening_balance`, `opening_leaves`, `credited_leaves`, `taken_leaves`, `leave_deduction`, `lop`, `note`, `entry_date`, `modified_date`, `date`, `closing_balance`, `flag`) VALUES
(1, 0, 'opening leave', 'January', 5, 1, '9', 9, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(2, 0, 'opening leave', 'January', 5, 2, '27', 27, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '27', 0),
(3, 0, 'opening leave', 'January', 7, 1, '11', 11, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '11', 0),
(4, 0, 'opening leave', 'January', 7, 2, '26', 26, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '26', 0),
(5, 0, 'opening leave', 'January', 6, 1, '3', 3, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(6, 0, 'opening leave', 'January', 6, 2, '7', 7, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(7, 0, 'opening leave', 'January', 13, 1, '6', 6, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(8, 0, 'opening leave', 'January', 13, 2, '13', 13, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '13', 0),
(9, 0, 'opening leave', 'January', 8, 1, '6', 6, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(10, 0, 'opening leave', 'January', 8, 2, '21', 21, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '21', 0),
(11, 0, 'opening leave', 'January', 10, 1, '4', 4, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(12, 0, 'opening leave', 'January', 10, 2, '24', 24, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '24', 0),
(13, 0, 'opening leave', 'January', 9, 1, '5', 5, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '5', 0),
(14, 0, 'opening leave', 'January', 9, 2, '10', 10, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '10', 0),
(15, 0, 'opening leave', 'January', 11, 1, '9', 9, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(16, 0, 'opening leave', 'January', 11, 2, '3', 3, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(17, 0, 'opening leave', 'January', 12, 1, '7', 7, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(18, 0, 'opening leave', 'January', 12, 2, '4', 4, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(19, 0, 'opening leave', 'January', 14, 1, '7', 7, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(20, 0, 'opening leave', 'January', 14, 2, '3', 3, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(21, 0, 'opening leave', 'January', 42, 1, '11', 11, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '11', 0),
(22, 0, 'opening leave', 'January', 42, 2, '23.5', 24, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '23.5', 0),
(23, 0, 'opening leave', 'January', 19, 1, '4', 4, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(24, 0, 'opening leave', 'January', 19, 2, '1', 1, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '1', 0),
(25, 0, 'opening leave', 'January', 41, 1, '6', 6, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(26, 0, 'opening leave', 'January', 41, 2, '6', 6, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(27, 0, 'opening leave', 'January', 21, 1, '8', 8, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(28, 0, 'opening leave', 'January', 21, 2, '17', 17, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '17', 0),
(29, 0, 'opening leave', 'January', 24, 1, '6', 6, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(30, 0, 'opening leave', 'January', 24, 2, '10', 10, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '10', 0),
(31, 0, 'opening leave', 'January', 15, 1, '9', 9, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(32, 0, 'opening leave', 'January', 15, 2, '24', 24, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '24', 0),
(33, 0, 'opening leave', 'January', 20, 1, '5', 5, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '5', 0),
(34, 0, 'opening leave', 'January', 20, 2, '20', 20, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '20', 0),
(35, 0, 'opening leave', 'January', 26, 1, '8', 8, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(36, 0, 'opening leave', 'January', 26, 2, '28', 28, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '28', 0),
(37, 0, 'opening leave', 'January', 22, 2, '9', 9, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(38, 0, 'opening leave', 'January', 17, 1, '7', 7, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(39, 0, 'opening leave', 'January', 17, 2, '4', 4, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(40, 0, 'opening leave', 'January', 29, 1, '9', 9, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(41, 0, 'opening leave', 'January', 29, 2, '9', 9, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(42, 0, 'opening leave', 'January', 16, 1, '8', 8, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(43, 0, 'opening leave', 'January', 16, 2, '15', 15, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '15', 0),
(44, 0, 'opening leave', 'January', 30, 1, '1', 1, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '1', 0),
(45, 0, 'opening leave', 'January', 30, 2, '4.5', 5, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '4.5', 0),
(46, 0, 'opening leave', 'January', 18, 1, '9', 9, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(47, 0, 'opening leave', 'January', 18, 2, '3', 3, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(48, 0, 'opening leave', 'January', 28, 1, '11', 11, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '11', 0),
(49, 0, 'opening leave', 'January', 28, 2, '8', 8, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(50, 0, 'opening leave', 'January', 27, 1, '9', 9, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '9', 0),
(51, 0, 'opening leave', 'January', 27, 2, '2', 2, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '2', 0),
(52, 0, 'opening leave', 'January', 4, 1, '7', 7, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(53, 0, 'opening leave', 'January', 4, 2, '5', 5, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '5', 0),
(54, 0, 'opening leave', 'January', 25, 1, '6', 6, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(55, 0, 'opening leave', 'January', 25, 2, '7', 7, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '7', 0),
(56, 0, 'opening leave', 'January', 32, 1, '6', 6, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '6', 0),
(57, 0, 'opening leave', 'January', 32, 2, '2', 2, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '2', 0),
(58, 0, 'opening leave', 'January', 39, 1, '8', 8, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '8', 0),
(59, 0, 'opening leave', 'January', 39, 2, '5', 5, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '5', 0),
(60, 0, 'opening leave', 'January', 38, 1, '4', 4, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '4', 0),
(61, 0, 'opening leave', 'January', 38, 2, '3', 3, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0),
(62, 0, 'opening leave', 'January', 3, 1, '10', 10, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '10', 0),
(63, 0, 'opening leave', 'January', 3, 2, '27', 27, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '27', 0),
(64, 0, 'opening leave', 'January', 2, 1, '12', 12, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '12', 0),
(65, 0, 'opening leave', 'January', 2, 2, '49', 49, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '49', 0),
(66, 0, 'opening leave', 'January', 23, 1, '0.5', 1, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '0.5', 0),
(67, 0, 'opening leave', 'January', 23, 2, '3', 3, 0, 0, 0, 0, 'opening leave', '2020-01-30', NULL, '2020-01-01', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_leaves_06_02_20`
--

CREATE TABLE `hr_employee_leaves_06_02_20` (
  `id` int(11) NOT NULL,
  `leave_application_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `credited_month` varchar(100) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `leave_id` int(11) DEFAULT NULL,
  `opening_balance` varchar(255) DEFAULT NULL,
  `opening_leaves` int(11) NOT NULL,
  `credited_leaves` int(11) NOT NULL,
  `taken_leaves` int(11) NOT NULL,
  `leave_deduction` int(11) NOT NULL,
  `lop` int(11) NOT NULL DEFAULT 0,
  `note` text NOT NULL,
  `entry_date` date DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `closing_balance` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_leaves_06_02_20`
--

INSERT INTO `hr_employee_leaves_06_02_20` (`id`, `leave_application_id`, `type`, `credited_month`, `employee_id`, `leave_id`, `opening_balance`, `opening_leaves`, `credited_leaves`, `taken_leaves`, `leave_deduction`, `lop`, `note`, `entry_date`, `modified_date`, `date`, `closing_balance`, `flag`) VALUES
(1, 0, 'opening leave', 'January', 10, 1, '1', 1, 0, 0, 0, 0, 'opening leave', '2020-02-05', NULL, '2020-02-05', '1', 0),
(2, 0, 'opening leave', 'January', 10, 2, '2', 2, 0, 0, 0, 0, 'opening leave', '2020-02-05', NULL, '2020-02-05', '2', 0),
(3, 0, 'Late Deduction', 'January', 10, 1, '-1', 0, 0, 1, 0, 0, 'deduction', '2020-01-13', NULL, '2020-01-13', '0', 0),
(4, 0, 'Absent', 'January', 10, 2, '-1', 0, 0, 1, 0, 0, 'deduction', '2020-01-14', NULL, '2020-01-14', '1', 0),
(5, 0, 'Late Deduction', 'January', 10, 2, '-1', 0, 0, 1, 0, 0, 'deduction', '2020-01-20', NULL, '2020-01-20', '0', 1),
(6, 0, 'opening leave', 'January', 16, 1, '2', 2, 0, 0, 0, 0, 'opening leave', '2020-02-06', NULL, '2020-02-06', '2', 0),
(7, 0, 'opening leave', 'January', 16, 2, '2', 2, 0, 0, 0, 0, 'opening leave', '2020-02-06', NULL, '2020-02-06', '2', 0),
(8, 0, 'Absent', 'January', 16, 1, '-1', 0, 0, 1, 0, 0, 'deduction', '2020-01-02', NULL, '2020-01-02', '1', 0),
(9, 1, 'approved', 'January', 16, 2, '-2', 0, 0, 2, 0, 0, 'dddd', '2020-01-07', NULL, '2020-01-07', '0', 0),
(10, 0, 'Absent', 'January', 10, NULL, NULL, 0, 0, 0, 0, 1, 'deduction', '2020-01-14', NULL, '2020-01-14', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_leave_application`
--

CREATE TABLE `hr_employee_leave_application` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_type_id` varchar(200) DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `leave_total_days` int(11) NOT NULL,
  `leave_ticket` varchar(10) DEFAULT NULL,
  `leave_ticket_amount` float(9,2) NOT NULL DEFAULT 0.00,
  `leave_note` text DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `approved` varchar(5) DEFAULT NULL,
  `date_range` varchar(100) NOT NULL,
  `documents` text NOT NULL,
  `approvalnote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_leave_application`
--

INSERT INTO `hr_employee_leave_application` (`id`, `employee_id`, `leave_type_id`, `leave_from`, `leave_to`, `leave_total_days`, `leave_ticket`, `leave_ticket_amount`, `leave_note`, `create_date`, `approved`, `date_range`, `documents`, `approvalnote`) VALUES
(0, 24, '3', '2023-05-10', '2023-05-31', 22, NULL, 0.00, 'ok ', '2023-06-05', 'Yes', '10-5-2023 - 31-5-2023', 'ind.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_loan_application`
--

CREATE TABLE `hr_employee_loan_application` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `reference_name` varchar(255) DEFAULT NULL,
  `request_amount` float(9,2) NOT NULL DEFAULT 0.00,
  `loan_requirement_note` text DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `loan_approved` varchar(5) DEFAULT NULL,
  `loan_sanction_note` text DEFAULT NULL,
  `sanction_amount` float(9,2) NOT NULL DEFAULT 0.00,
  `installment_amount` float(9,2) NOT NULL DEFAULT 0.00,
  `installment_start_date` date DEFAULT NULL,
  `deduction_from_salary` varchar(5) DEFAULT NULL,
  `loan_issue_date` date DEFAULT NULL,
  `tenure_in_months` int(11) DEFAULT NULL,
  `loan_end_date` date DEFAULT NULL,
  `loan_cancel_note` text DEFAULT NULL,
  `entry_date` datetime NOT NULL DEFAULT current_timestamp(),
  `loan_close` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_loan_application`
--

INSERT INTO `hr_employee_loan_application` (`id`, `employee_id`, `reference_name`, `request_amount`, `loan_requirement_note`, `attachment`, `loan_approved`, `loan_sanction_note`, `sanction_amount`, `installment_amount`, `installment_start_date`, `deduction_from_salary`, `loan_issue_date`, `tenure_in_months`, `loan_end_date`, `loan_cancel_note`, `entry_date`, `loan_close`) VALUES
(5, 6, 'Subha', 7000.00, 'fdgdg', 'women.jpg,website_question_.docx', 'Yes', 'dffd', 70000.00, 5833.33, '2019-03-31', 'Yes', '2019-02-26', 12, '2020-03-31', '', '2019-02-25 16:16:53', 1),
(8, 10, 'rtret', 3000.00, 'kjlkjlkjl', 'vellore.pdf', 'Yes', 'kjlkjl', 70000.00, 6363.64, '2019-07-18', 'No', '2019-07-22', 11, '2020-06-18', '', '2019-07-12 11:21:42', 0),
(9, 22, 'AD110000', 100000.00, 'NEED', 'Cor_HR_Attendance_rules.jpg,Cor_HR_Leave_rule.jpg,Leave_employee_leave.jpg', NULL, '', 0.00, 0.00, '0000-00-00', NULL, '0000-00-00', 0, '0000-00-00', '', '2019-07-14 16:25:17', 0),
(11, 10, 'AL555', 100000.00, 'EBFJBCKABCKBBDKA', 'download1.jpg,vellore.pdf', NULL, '', 0.00, 0.00, '0000-00-00', NULL, '0000-00-00', 0, '0000-00-00', '', '2019-07-16 10:07:07', 0),
(13, 27, 'ttyt', 1200.00, '656565', NULL, 'Yes', '655655', 56565.00, 10.00, '2020-01-01', 'Yes', '2020-01-01', 5656, '2491-05-01', '', '2020-01-02 10:08:22', 0),
(14, 32, '3353535', 3535353.00, '545445454', NULL, 'Yes', '5454', 545454.00, 181818.00, '2020-01-01', 'No', '2020-01-06', 3, '2020-04-01', '', '2020-01-06 15:13:38', 0),
(15, 58, 'Travelling Car Purchase', 50000.00, 'Purchase a bike for travelling purpose', 'Car-Loan-Application-Letter-Template.png', 'Yes', 'approved that loan in one condition loan will be paid with in 4 month', 40000.00, 10000.00, '2020-01-01', 'Yes', '2020-01-01', 4, '2020-05-01', '', '2020-04-16 13:09:18', 0),
(17, 46, 'fgf', 566.00, '66', NULL, NULL, '', 0.00, 0.00, '0000-00-00', NULL, '0000-00-00', 0, '0000-00-00', '', '2020-04-20 12:08:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_loan_payment`
--

CREATE TABLE `hr_employee_loan_payment` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` float(9,2) NOT NULL DEFAULT 0.00,
  `create_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_loan_payment`
--

INSERT INTO `hr_employee_loan_payment` (`id`, `employee_id`, `loan_id`, `payment_date`, `amount`, `create_date`) VALUES
(2, 6, 5, '2019-02-28', 5833.33, '2019-02-26 17:19:29'),
(3, 6, 5, '2019-02-28', 5833.33, '2019-02-26 17:20:21'),
(4, 6, 5, '2019-02-28', 5833.33, '2019-02-26 17:52:13'),
(5, 6, 5, '2019-02-28', 5833.33, '2019-02-26 18:17:11'),
(6, 4, 7, '2019-03-01', 2083.33, '2019-02-26 19:48:59'),
(8, 4, 7, '2019-03-03', 2083.33, '2019-02-26 19:50:08'),
(9, 4, 7, '2019-03-04', 2083.33, '2019-02-26 19:50:36'),
(10, 4, 7, '0000-00-00', 3083.33, '2019-03-06 12:23:47'),
(11, 4, 0, '0000-00-00', 0.00, '2019-04-17 16:38:19'),
(12, 0, 8, '2019-07-31', 6363.64, '2019-07-16 10:12:15'),
(13, 0, 15, '0000-00-00', 10000.00, '2020-04-20 17:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_passport_visa`
--

CREATE TABLE `hr_employee_passport_visa` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `passport_no` varchar(255) DEFAULT NULL,
  `passport_place_of_issue` varchar(255) DEFAULT NULL,
  `passport_country` varchar(255) DEFAULT NULL,
  `passport_issue_date` date DEFAULT NULL,
  `passport_expiry_date` date DEFAULT NULL,
  `retained_with_company` varchar(10) DEFAULT NULL,
  `passport_image` text DEFAULT NULL,
  `employment_offer_image` text DEFAULT NULL,
  `employment_offer_date` date DEFAULT NULL,
  `employment_offer_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `work_permit_application_image` text DEFAULT NULL,
  `work_permit_application_date` date DEFAULT NULL,
  `work_permit_application_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `employment_contact_image` text DEFAULT NULL,
  `employment_contact_date` date DEFAULT NULL,
  `employment_contact_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `bank_gurantee_policy_no` varchar(255) DEFAULT NULL,
  `name_of_finance_institution` varchar(255) DEFAULT NULL,
  `bank_gurantee_finance_amount` float(9,2) NOT NULL DEFAULT 0.00,
  `electronic_work_permit` text DEFAULT NULL,
  `electronic_work_permit_date` date DEFAULT NULL,
  `electronic_work_permit_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `ministry_card_no` varchar(255) DEFAULT NULL,
  `personal_id` varchar(255) DEFAULT NULL,
  `ministry_card_issue_date` date DEFAULT NULL,
  `ministry_card_expiry_date` date DEFAULT NULL,
  `labor_card_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `labor_card_image` varchar(255) DEFAULT NULL,
  `employment_visa_in_country_issue_date` date DEFAULT NULL,
  `employment_visa_in_country_expiry_date` date DEFAULT NULL,
  `employment_visa_in_country_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `employment_visa_in_country_image` varchar(255) DEFAULT NULL,
  `employment_visa_out_country_issue_date` date DEFAULT NULL,
  `employment_visa_out_country_expiry_date` date DEFAULT NULL,
  `employment_visa_out_country_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `employment_visa_out_country_image` varchar(255) DEFAULT NULL,
  `employment_visa_out_country_entry_date` date DEFAULT NULL,
  `medical_test_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `medical_test_result_image` varchar(255) DEFAULT NULL,
  `emirates_id_application_image` varchar(255) DEFAULT NULL,
  `emirates_id_application_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `emirates_id_no` varchar(255) DEFAULT NULL,
  `emirates_id_application_issue_date` date DEFAULT NULL,
  `mirates_id_application_expiry_date` date DEFAULT NULL,
  `eid_card_front_image` varchar(255) DEFAULT NULL,
  `eid_card_back_image` varchar(255) DEFAULT NULL,
  `permanent_visa_application` varchar(255) DEFAULT NULL,
  `permanent_visa_cost` float(9,2) NOT NULL DEFAULT 0.00,
  `permanent_uid_no` varchar(255) DEFAULT NULL,
  `permanent_visa_issue_date` date DEFAULT NULL,
  `permanent_visa_expiry_date` date DEFAULT NULL,
  `permanent_visa_image` varchar(266) DEFAULT NULL,
  `emplyment_in_country_contact_image` text DEFAULT NULL,
  `date_submited` date DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_passport_visa`
--

INSERT INTO `hr_employee_passport_visa` (`id`, `employee_id`, `passport_no`, `passport_place_of_issue`, `passport_country`, `passport_issue_date`, `passport_expiry_date`, `retained_with_company`, `passport_image`, `employment_offer_image`, `employment_offer_date`, `employment_offer_cost`, `work_permit_application_image`, `work_permit_application_date`, `work_permit_application_cost`, `employment_contact_image`, `employment_contact_date`, `employment_contact_cost`, `bank_gurantee_policy_no`, `name_of_finance_institution`, `bank_gurantee_finance_amount`, `electronic_work_permit`, `electronic_work_permit_date`, `electronic_work_permit_cost`, `ministry_card_no`, `personal_id`, `ministry_card_issue_date`, `ministry_card_expiry_date`, `labor_card_cost`, `labor_card_image`, `employment_visa_in_country_issue_date`, `employment_visa_in_country_expiry_date`, `employment_visa_in_country_cost`, `employment_visa_in_country_image`, `employment_visa_out_country_issue_date`, `employment_visa_out_country_expiry_date`, `employment_visa_out_country_cost`, `employment_visa_out_country_image`, `employment_visa_out_country_entry_date`, `medical_test_cost`, `medical_test_result_image`, `emirates_id_application_image`, `emirates_id_application_cost`, `emirates_id_no`, `emirates_id_application_issue_date`, `mirates_id_application_expiry_date`, `eid_card_front_image`, `eid_card_back_image`, `permanent_visa_application`, `permanent_visa_cost`, `permanent_uid_no`, `permanent_visa_issue_date`, `permanent_visa_expiry_date`, `permanent_visa_image`, `emplyment_in_country_contact_image`, `date_submited`, `created_date`) VALUES
(2, 4, 'AB-123rtye44FG', 'Kolkata', '', '2030-11-01', '2030-11-01', 'Yes', 'XLformatSWS.xlsx,women.jpg,wait.png,women.jpg,wait.png', 'Testing_Credential_and_URL.txt,user_logo.png,Untitled-1.jpg', '2019-11-05', 0.00, 'trade_course_main.jpg,trade_course1.png', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, '', '', 0.00, NULL, '2019-11-12', 0.00, '', '', '0000-00-00', '0000-00-00', 0.00, '1551767810_file_women.jpg', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, NULL, NULL, 0.00, '', NULL, '0000-00-00', NULL, NULL, '', 0.00, '', '0000-00-00', '0000-00-00', NULL, 'tenies.jpg,team2.jpg', '0000-00-00', '2019-03-04 15:00:37'),
(3, 7, 'reert543545445', 'Dubai', '', '2019-04-16', '2019-04-22', 'Yes', 'medicine.jpg,logo.png', NULL, '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, '', '', 0.00, NULL, '0000-00-00', 0.00, 'ertretre', '', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, NULL, NULL, 0.00, '', NULL, '0000-00-00', NULL, NULL, '', 0.00, '', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '2019-04-15 14:41:27'),
(7, 0, '454545', '333333', 'Indian', '2019-12-01', '2020-01-11', 'Yes', 'vellore.pdf,travel_logo_(1).png,thankyou.jpg,vellore.pdf,travel_logo.png,thankyou.jpg,vellore.pdf,travel_logo_(1).png,smart.png', NULL, '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, '', '', 0.00, NULL, '0000-00-00', 0.00, '', '', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, NULL, NULL, 0.00, '', '0000-00-00', '0000-00-00', NULL, NULL, '', 0.00, '', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '2019-07-12 10:30:25'),
(8, 10, 'dsfds', 'dsfds', 'Australia', '2019-07-21', '2019-07-22', 'Yes', 'vellore.pdf,travel_logo_(1).png,thankyou.jpg', NULL, '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, '', '', 0.00, NULL, '0000-00-00', 0.00, '', '', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, NULL, NULL, 0.00, '', NULL, '0000-00-00', NULL, NULL, '', 0.00, '', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '2019-07-12 10:33:35'),
(9, 22, 'R521445665', 'Delhi', 'India', '0000-00-00', '0000-00-00', 'No', 'download1.jpg', 'SETTINGS_organisation_bank.jpg', '2019-05-01', 10000.00, 'Cor_HR_Leave_rule.jpg', '2019-05-08', 2000.00, 'Cor_HR_Attendance_rules.jpg', '2019-06-12', 5000.00, 'ADC254H', 'hgvhjvjb', 100000.00, 'Cor_HR_Tenancy_Contract.jpg', '2019-07-09', 45000.00, 'EMRTS11102546', 'ADFFC5541HHJ7', '2018-09-04', '2020-08-14', 1000.00, '1563101238_file_download_(1).jpg', '2019-07-01', '2019-09-30', 10000.00, '1563101238_file_download1.jpg', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 200000.00, NULL, '1563101238_file_SETTINGS_organisation_bank.jpg', 1500.00, 'E1316515255', NULL, '0000-00-00', NULL, NULL, '', 0.00, '', '0000-00-00', '0000-00-00', NULL, 'Cor_HR_Over_Time_formula.jpg', '2019-08-05', '2019-07-14 15:49:37'),
(10, 29, '454545', '333333', 'Tuvalu', '2001-11-30', '2001-11-30', 'Yes', 'file_image.png,word_image.png,file_image.png', NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 18:00:45'),
(11, 34, 'SE45', '33333367', 'Argentina', '2030-11-01', '2030-11-01', 'No', 'image_icon.png,pdf_image.png', NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 13:23:07'),
(12, 36, 'we120912', 'India', 'India', '2020-01-01', '2020-01-24', 'Yes', 'pdf_image.png', NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 14:38:33'),
(13, 51, 'PASSPORT 01', 'pakistan', 'India', '2020-02-01', '2020-03-31', 'Yes', NULL, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-19 14:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_payroll`
--

CREATE TABLE `hr_employee_payroll` (
  `id` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `modified_date` datetime NOT NULL,
  `ctc_amount` varchar(100) DEFAULT NULL,
  `salary_structure_id` int(11) DEFAULT NULL,
  `salary_structure_details` longtext DEFAULT NULL,
  `pf` enum('0','1') NOT NULL DEFAULT '0',
  `employeemothlypf` float(9,2) NOT NULL,
  `employeeyearlypf` float(9,2) NOT NULL,
  `employermothlypf` float(9,2) NOT NULL,
  `employeryearlypf` float(9,2) NOT NULL,
  `esi` enum('0','1') NOT NULL DEFAULT '0',
  `employeemothlyesi` float(9,2) NOT NULL,
  `employeeyearlyesi` float(9,2) NOT NULL,
  `esi_per_employee` float(9,2) NOT NULL,
  `employermothlyesi` float(9,2) NOT NULL,
  `employeryearlyesi` float(9,2) NOT NULL,
  `esi_per_employer` float(9,2) NOT NULL,
  `ptax` enum('0','1') NOT NULL DEFAULT '0',
  `mothlyptax` float(9,2) NOT NULL,
  `yearlyptax` float(9,2) NOT NULL,
  `salary_structure_breakup` varchar(225) DEFAULT NULL,
  `flag` enum('0','1') NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `application_date` date NOT NULL,
  `note` text NOT NULL,
  `pf_based_on` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `total_gross` float(9,2) NOT NULL,
  `total_deduction` float(9,2) NOT NULL,
  `take_home` float(9,2) NOT NULL,
  `withday` int(11) DEFAULT NULL,
  `withoutday` int(11) DEFAULT NULL,
  `payroll_month` int(11) NOT NULL,
  `payroll_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee_payroll`
--

INSERT INTO `hr_employee_payroll` (`id`, `month`, `year`, `employee_id`, `delete_flag`, `is_active`, `modified_date`, `ctc_amount`, `salary_structure_id`, `salary_structure_details`, `pf`, `employeemothlypf`, `employeeyearlypf`, `employermothlypf`, `employeryearlypf`, `esi`, `employeemothlyesi`, `employeeyearlyesi`, `esi_per_employee`, `employermothlyesi`, `employeryearlyesi`, `esi_per_employer`, `ptax`, `mothlyptax`, `yearlyptax`, `salary_structure_breakup`, `flag`, `create_date`, `application_date`, `note`, `pf_based_on`, `state`, `total_gross`, `total_deduction`, `take_home`, `withday`, `withoutday`, `payroll_month`, `payroll_year`) VALUES
(1, '01', '2020', 29, 'N', 'Y', '0000-00-00 00:00:00', '19166.666666667', NULL, NULL, '1', 1493.49, 0.00, 1493.49, 0.00, '1', 107.72, 0.00, 0.75, 466.78, 0.00, 3.25, '1', 110.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', 'Actual', 'West Bengal', 14362.42, 1711.21, 12651.21, NULL, NULL, 0, 0),
(2, '01', '2020', 28, 'N', 'Y', '0000-00-00 00:00:00', '8000', NULL, NULL, '1', 832.97, 0.00, 832.97, 0.00, '1', 52.06, 0.00, 0.75, 225.60, 0.00, 3.25, '1', 0.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', 'Actual', 'West Bengal', 6941.42, 885.03, 6056.39, NULL, NULL, 0, 0),
(3, '01', '2020', 54, 'N', 'Y', '0000-00-00 00:00:00', '21000', NULL, NULL, '1', 1800.00, 0.00, 1800.00, 0.00, '1', 139.47, 0.00, 0.75, 604.36, 0.00, 3.25, '1', 130.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', 'Fixed', 'West Bengal', 18595.67, 2069.47, 16526.20, NULL, NULL, 0, 0),
(4, '01', '2020', 56, 'N', 'Y', '0000-00-00 00:00:00', '14800', NULL, NULL, '1', 1541.00, 0.00, 1541.00, 0.00, '1', 96.31, 0.00, 0.75, 417.35, 0.00, 3.25, '1', 110.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', 'Actual', 'West Bengal', 12841.67, 1747.31, 11094.35, NULL, NULL, 0, 0),
(5, '01', '2020', 57, 'N', 'Y', '0000-00-00 00:00:00', '25000', NULL, NULL, '1', 5280.00, 0.00, 5280.00, 0.00, '1', 330.00, 0.00, 0.75, 1430.00, 0.00, 3.25, '1', 0.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', '', '', 44000.00, 5610.00, 38390.00, NULL, NULL, 0, 0),
(6, '01', '2020', 58, 'N', 'Y', '0000-00-00 00:00:00', '25000', NULL, NULL, '1', 5280.00, 0.00, 5280.00, 0.00, '1', 330.00, 0.00, 0.75, 1430.00, 0.00, 3.25, '1', 0.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', '', '', 44000.00, 5610.00, 38390.00, NULL, NULL, 0, 0),
(7, '01', '2020', 2, 'N', 'Y', '0000-00-00 00:00:00', '20000', NULL, NULL, '1', 1356.29, 0.00, 1356.29, 0.00, '1', 114.77, 0.00, 0.75, 497.33, 0.00, 3.25, '1', 130.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', 'Actual', 'West Bengal', 15302.42, 1601.06, 13701.36, 31, 0, 0, 0),
(8, '01', '2020', 55, 'N', 'Y', '0000-00-00 00:00:00', '45833.333333333', NULL, NULL, '1', 1800.00, 0.00, 1800.00, 0.00, '1', 319.86, 0.00, 0.75, 1386.04, 0.00, 3.25, '1', 200.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', 'Fixed', 'West Bengal', 42647.33, 2319.86, 40327.48, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_payroll_bkup`
--

CREATE TABLE `hr_employee_payroll_bkup` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `payroll_month` varchar(100) DEFAULT NULL,
  `payroll_year` varchar(100) DEFAULT NULL,
  `payroll_date` date DEFAULT NULL,
  `salary` float(10,2) DEFAULT NULL,
  `overtime` varchar(100) DEFAULT NULL,
  `bonus` varchar(100) DEFAULT NULL,
  `salary_details` longtext NOT NULL,
  `ctc_amount` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_payroll_details`
--

CREATE TABLE `hr_employee_payroll_details` (
  `id` int(11) NOT NULL,
  `employee_payroll_id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `amount` float(9,2) NOT NULL DEFAULT 0.00,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_payroll_details`
--

INSERT INTO `hr_employee_payroll_details` (`id`, `employee_payroll_id`, `component_id`, `amount`, `type`) VALUES
(1, 1, 3, 5750.00, 'Earning'),
(2, 1, 2, 1916.67, 'Earning'),
(3, 1, 4, 958.33, 'Earning'),
(4, 1, 20, 5737.42, 'Earning'),
(5, 2, 3, 3200.00, 'Earning'),
(6, 2, 34, 500.00, 'Earning'),
(7, 2, 4, 480.00, 'Earning'),
(8, 2, 5, 800.00, 'Earning'),
(9, 2, 11, 1000.00, 'Earning'),
(10, 2, 20, 961.42, 'Earning'),
(11, 3, 3, 8400.00, 'Earning'),
(12, 3, 34, 500.00, 'Earning'),
(13, 3, 4, 1260.00, 'Earning'),
(14, 3, 5, 2100.00, 'Earning'),
(15, 3, 11, 1000.00, 'Earning'),
(16, 3, 20, 5335.67, 'Earning'),
(17, 4, 3, 5920.00, 'Earning'),
(18, 4, 34, 500.00, 'Earning'),
(19, 4, 4, 888.00, 'Earning'),
(20, 4, 5, 1480.00, 'Earning'),
(21, 4, 11, 1000.00, 'Earning'),
(22, 4, 20, 3053.67, 'Earning'),
(23, 5, 3, 10000.00, 'Earning'),
(24, 5, 34, 10000.00, 'Earning'),
(25, 5, 4, 1500.00, 'Earning'),
(26, 5, 5, 2500.00, 'Earning'),
(27, 5, 11, 10000.00, 'Earning'),
(28, 5, 20, 10000.00, 'Earning'),
(29, 6, 3, 10000.00, 'Earning'),
(30, 6, 34, 10000.00, 'Earning'),
(31, 6, 4, 1500.00, 'Earning'),
(32, 6, 5, 2500.00, 'Earning'),
(33, 6, 11, 10000.00, 'Earning'),
(34, 6, 20, 10000.00, 'Earning'),
(35, 7, 3, 6000.00, 'Earning'),
(36, 7, 2, 4000.00, 'Earning'),
(37, 7, 5, 2000.00, 'Earning'),
(38, 7, 20, 3302.42, 'Earning'),
(39, 8, 3, 18333.33, 'Earning'),
(40, 8, 2, 1000.00, 'Earning'),
(41, 8, 4, 3666.67, 'Earning'),
(42, 8, 5, 4583.33, 'Earning'),
(43, 8, 8, 2291.67, 'Earning'),
(44, 8, 11, 3000.00, 'Earning'),
(45, 8, 20, 9772.33, 'Earning');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_payroll_leave_info`
--

CREATE TABLE `hr_employee_payroll_leave_info` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `opening_leave` varchar(100) DEFAULT NULL,
  `earn_leave_monthly` varchar(100) DEFAULT NULL,
  `leavetake` varchar(100) DEFAULT NULL,
  `balance_leave` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_pf`
--

CREATE TABLE `hr_employee_pf` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `employee_pf_no` varchar(255) DEFAULT NULL,
  `uan_no` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee_pf`
--

INSERT INTO `hr_employee_pf` (`id`, `employee_id`, `employee_pf_no`, `uan_no`, `no`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 33, 'ere45464644', '45464', '4664646464', 'N', 'Y', '2020-01-02', '2020-01-02 12:30:17'),
(2, 46, '6631649489', 'XFHDCG', 'SDGZB', 'N', 'Y', '2020-03-06', '2020-03-16 11:53:27'),
(3, 51, 'Manojpf1234', 'uan1234', 'no1234', 'N', 'Y', '2020-03-19', '2020-03-25 19:11:51'),
(4, 54, 'PF1234', '1234', '1234', 'N', 'Y', '2020-04-02', '2020-04-03 10:08:24'),
(5, 56, 'PFNO05', 'UAN05', 'NO05', 'N', 'Y', '2020-04-03', '0000-00-00 00:00:00'),
(6, 59, 'gygfyg', 'ytftfg', 'tfgyuh', 'N', 'Y', '2020-04-14', '2020-05-12 14:42:03'),
(7, 28, 'PF12345', '1234', '1234', 'N', 'Y', '2020-04-17', '2020-04-17 12:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_ptax`
--

CREATE TABLE `hr_employee_ptax` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `ptax_no` varchar(255) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee_ptax`
--

INSERT INTO `hr_employee_ptax` (`id`, `employee_id`, `ptax_no`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 33, 'ptax98944', 'N', 'Y', '2020-01-02', '2020-01-02 12:30:17'),
(2, 46, 'P15653', 'N', 'Y', '2020-03-06', '2020-04-11 10:31:46'),
(3, 51, 'ptax1234', 'N', 'Y', '2020-03-19', '2020-03-25 19:11:51'),
(4, 54, 'ptax1234', 'N', 'Y', '2020-04-02', '2020-04-03 10:08:24'),
(5, 56, 'PTAXNO05', 'N', 'Y', '2020-04-03', '0000-00-00 00:00:00'),
(6, 58, 'PTAX1', 'N', 'Y', '2020-04-13', '2020-04-23 11:41:47'),
(7, 28, 'ptax12345', 'N', 'Y', '2020-04-17', '2020-04-17 12:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_qualification_experience`
--

CREATE TABLE `hr_employee_qualification_experience` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `skill_details` varchar(255) DEFAULT NULL,
  `highest_qualification` varchar(255) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_qualification_experience`
--

INSERT INTO `hr_employee_qualification_experience` (`id`, `employee_id`, `cv`, `skill_details`, `highest_qualification`, `entry_date`, `modified_date`) VALUES
(1, 34, '', '5', '6', NULL, '2020-01-13 09:04:36'),
(2, 36, '1578906513_file_word_image.png', '7,9', '5', NULL, '2020-01-13 10:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_qualification_experience_bkup`
--

CREATE TABLE `hr_employee_qualification_experience_bkup` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `basic_category` varchar(255) DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `certificate_name` varchar(255) DEFAULT NULL,
  `year_graduation` date DEFAULT NULL,
  `no_of_year_experience` int(11) DEFAULT NULL,
  `no_of_project` int(11) DEFAULT NULL,
  `society_of_engineers` varchar(255) DEFAULT NULL,
  `society_expiry_date` date DEFAULT NULL,
  `society_id_front` varchar(255) DEFAULT NULL,
  `society_id_back` varchar(255) DEFAULT NULL,
  `uploaded_date` varchar(255) DEFAULT NULL,
  `society_reminder_date` date DEFAULT NULL,
  `minstry_labor_card` varchar(255) DEFAULT NULL,
  `minstry_labor_card_front` varchar(255) DEFAULT NULL,
  `minstry_labor_card_back` varchar(255) DEFAULT NULL,
  `minstry_labor_card_expire_date` date DEFAULT NULL,
  `minstry_labor_card_uploaded_date` date DEFAULT NULL,
  `minstry_labor_card_renewal_date` date DEFAULT NULL,
  `minstry_labor_card_reminder_date` date DEFAULT NULL,
  `immigration_card` varchar(255) DEFAULT NULL,
  `immigration_card_expire_date` date DEFAULT NULL,
  `immigration_card_front` varchar(255) DEFAULT NULL,
  `immigration_card_back` varchar(255) DEFAULT NULL,
  `immigration_card_uploaded_date` date DEFAULT NULL,
  `immigration_card_renewal_date` date DEFAULT NULL,
  `immigration_card_reminder_date` date DEFAULT NULL,
  `dubai_municipality` varchar(255) DEFAULT NULL,
  `dubai_municipality_category` varchar(255) DEFAULT NULL,
  `dubai_municipality_expiry_date` date DEFAULT NULL,
  `dubai_municipality_id_front` varchar(255) DEFAULT NULL,
  `dubai_municipality_id_back` varchar(255) DEFAULT NULL,
  `dubai_municipality_uploded_date` date DEFAULT NULL,
  `dubai_civil_defence_card` varchar(255) DEFAULT NULL,
  `dubai_civil_defence_card_front` varchar(255) DEFAULT NULL,
  `dubai_civil_defence_card_back` varchar(255) DEFAULT NULL,
  `dubai_civil_defence_card_expire_date` date DEFAULT NULL,
  `dubai_civil_defence_card_uploaded_date` date DEFAULT NULL,
  `dubai_civil_defence_card_renewal_date` date DEFAULT NULL,
  `dubai_municipality_reminder_date` date DEFAULT NULL,
  `dubai_civil_defence_card_reminder_date` date DEFAULT NULL,
  `safety_certificate` varchar(255) DEFAULT NULL,
  `safety_card_expire_date` date DEFAULT NULL,
  `safety_card_front` varchar(255) DEFAULT NULL,
  `safety_card_back` varchar(255) DEFAULT NULL,
  `trakhees` varchar(10) DEFAULT NULL,
  `trakhees_no_of_card` int(11) DEFAULT NULL,
  `trakhees_1st_card_color` varchar(255) DEFAULT NULL,
  `trakhees_1st_card_expiry_date` date DEFAULT NULL,
  `trakhees_1st_card_front` varchar(255) DEFAULT NULL,
  `trakhees_1st_card_back` varchar(255) DEFAULT NULL,
  `trakhees_1st_card_uplodaed_date` date DEFAULT NULL,
  `trakhees_2nd_card_color` varchar(255) DEFAULT NULL,
  `trakhees_2nd_card_expiry_date` date DEFAULT NULL,
  `trakhees_2nd_card_front` varchar(255) DEFAULT NULL,
  `trakhees_2nd_card_back` varchar(255) DEFAULT NULL,
  `trakhees_2nd_card_uplodaed_date` date DEFAULT NULL,
  `trakhees_reminder_date` date DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `skill_details` varchar(255) DEFAULT NULL,
  `highest_qualification` varchar(255) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_qualification_experience_bkup`
--

INSERT INTO `hr_employee_qualification_experience_bkup` (`id`, `employee_id`, `basic_category`, `university_name`, `certificate_name`, `year_graduation`, `no_of_year_experience`, `no_of_project`, `society_of_engineers`, `society_expiry_date`, `society_id_front`, `society_id_back`, `uploaded_date`, `society_reminder_date`, `minstry_labor_card`, `minstry_labor_card_front`, `minstry_labor_card_back`, `minstry_labor_card_expire_date`, `minstry_labor_card_uploaded_date`, `minstry_labor_card_renewal_date`, `minstry_labor_card_reminder_date`, `immigration_card`, `immigration_card_expire_date`, `immigration_card_front`, `immigration_card_back`, `immigration_card_uploaded_date`, `immigration_card_renewal_date`, `immigration_card_reminder_date`, `dubai_municipality`, `dubai_municipality_category`, `dubai_municipality_expiry_date`, `dubai_municipality_id_front`, `dubai_municipality_id_back`, `dubai_municipality_uploded_date`, `dubai_civil_defence_card`, `dubai_civil_defence_card_front`, `dubai_civil_defence_card_back`, `dubai_civil_defence_card_expire_date`, `dubai_civil_defence_card_uploaded_date`, `dubai_civil_defence_card_renewal_date`, `dubai_municipality_reminder_date`, `dubai_civil_defence_card_reminder_date`, `safety_certificate`, `safety_card_expire_date`, `safety_card_front`, `safety_card_back`, `trakhees`, `trakhees_no_of_card`, `trakhees_1st_card_color`, `trakhees_1st_card_expiry_date`, `trakhees_1st_card_front`, `trakhees_1st_card_back`, `trakhees_1st_card_uplodaed_date`, `trakhees_2nd_card_color`, `trakhees_2nd_card_expiry_date`, `trakhees_2nd_card_front`, `trakhees_2nd_card_back`, `trakhees_2nd_card_uplodaed_date`, `trakhees_reminder_date`, `cv`, `skill_details`, `highest_qualification`, `entry_date`, `modified_date`) VALUES
(5, 4, 'Other', 'Calcutta University', ' ', '2019-03-03', 12, 45, 'No', '2019-03-30', '', '', '', NULL, NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, 'No', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, '', '0000-00-00', '', '', 'No', 0, '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '0000-00-00', NULL, '1555155471_file_Alaa_W._Ayyad.pdf', '9', '7', '2019-02-15', '2019-04-13 17:07:51'),
(6, 7, 'Engineer', 'Test University', ' ', '2019-04-01', 10, 200, 'No', '0000-00-00', '', '', '', NULL, NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, 'No', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '', '0000-00-00', '', '', 'No', 0, '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '0000-00-00', NULL, '1562131786_file_thankyou.jpg', '5,7', '3', '2019-04-15', '2019-07-03 10:59:46'),
(7, 10, 'Other', '', ' ', '0000-00-00', 0, 0, NULL, '0000-00-00', '', '', '', NULL, NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '13', '3', '2019-07-04', '2019-07-04 12:56:58'),
(8, 16, 'Engineer', 'Rini boznzzzzzzzzzziii', 'MBA', '1983-06-30', 0, 0, 'No', '0000-00-00', '', '', '', NULL, NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, 'No', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 'No', 0, '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '0000-00-00', NULL, '1562230944_file_Oyo_Rooms_is_the_largest_branded_network_of_hotels_currently_operating_in_India_and_Malaysia.docx', '5', '4', '2019-07-04', '2019-07-04 14:32:24'),
(10, 20, 'PRO', '', NULL, '0000-00-00', 0, 0, NULL, '0000-00-00', '', '', '', NULL, 'No', '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 'No', '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', 'No', '', '', '2019-07-12', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '0000-00-00', NULL, '', '5,7', '3', '2019-07-11', '2019-07-11 20:26:40'),
(11, 22, 'Other', '', NULL, '0000-00-00', 0, 0, NULL, '0000-00-00', '', '', '', NULL, NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '0000-00-00', NULL, '1563100294_file_download_(1).jpg', '9', '5', '2019-07-14', '2019-07-14 16:01:34'),
(12, 22, 'Safety Officer', '', NULL, '0000-00-00', 0, 0, NULL, '0000-00-00', '', '', '', NULL, NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '0000-00-00', NULL, '1563178390_file_Future_System_Plan_(1)_(1)-convertednew.docx', '9', '5', '2019-07-15', '2019-07-15 13:43:10'),
(13, 22, 'Safety Officer', '', NULL, '0000-00-00', 0, 0, NULL, '0000-00-00', '', '', '', NULL, NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '0000-00-00', NULL, '1563178485_file_Account_Receivables_by_Deep.doc', '9', '5', '2019-07-15', '2019-07-15 13:44:45'),
(14, 22, 'Safety Officer', '', NULL, '0000-00-00', 0, 0, NULL, '0000-00-00', '', '', '', NULL, NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '0000-00-00', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '', '0000-00-00', NULL, '1563178609_file_Tally.ERP9_Integration_Capabilities.pdf', '9', '5', '2019-07-15', '2019-07-15 13:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_salary`
--

CREATE TABLE `hr_employee_salary` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `modified_date` datetime NOT NULL,
  `ctc_amount` varchar(100) DEFAULT NULL,
  `salary_structure_id` int(11) DEFAULT NULL,
  `salary_structure_details` longtext DEFAULT NULL,
  `pf` enum('0','1') NOT NULL DEFAULT '0',
  `employeemothlypf` float(9,2) NOT NULL,
  `employeeyearlypf` float(9,2) NOT NULL,
  `employermothlypf` float(9,2) NOT NULL,
  `employeryearlypf` float(9,2) NOT NULL,
  `esi` enum('0','1') NOT NULL DEFAULT '0',
  `employeemothlyesi` float(9,2) NOT NULL,
  `employeeyearlyesi` float(9,2) NOT NULL,
  `esi_per_employee` float(9,2) NOT NULL,
  `employermothlyesi` float(9,2) NOT NULL,
  `employeryearlyesi` float(9,2) NOT NULL,
  `esi_per_employer` float(9,2) NOT NULL,
  `ptax` enum('0','1') NOT NULL DEFAULT '0',
  `mothlyptax` float(9,2) NOT NULL,
  `yearlyptax` float(9,2) NOT NULL,
  `salary_structure_breakup` varchar(225) DEFAULT NULL,
  `flag` enum('0','1') NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `application_date` date NOT NULL,
  `note` text NOT NULL,
  `pf_based_on` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `not_part_ctc_component_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee_salary`
--

INSERT INTO `hr_employee_salary` (`id`, `employee_id`, `delete_flag`, `is_active`, `modified_date`, `ctc_amount`, `salary_structure_id`, `salary_structure_details`, `pf`, `employeemothlypf`, `employeeyearlypf`, `employermothlypf`, `employeryearlypf`, `esi`, `employeemothlyesi`, `employeeyearlyesi`, `esi_per_employee`, `employermothlyesi`, `employeryearlyesi`, `esi_per_employer`, `ptax`, `mothlyptax`, `yearlyptax`, `salary_structure_breakup`, `flag`, `create_date`, `application_date`, `note`, `pf_based_on`, `state`, `not_part_ctc_component_id`) VALUES
(1, 54, 'N', 'Y', '0000-00-00 00:00:00', '252000', 12, '[{\"id\":\"86\",\"master_salary_structure_id\":\"12\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"40.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"87\",\"master_salary_structure_id\":\"12\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"88\",\"master_salary_structure_id\":\"12\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"15.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"89\",\"master_salary_structure_id\":\"12\",\"component_id\":\"11\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Conveyance Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"No\",\"fixed\":\"Yes\"},{\"id\":\"90\",\"master_salary_structure_id\":\"12\",\"component_id\":\"34\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"6000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"HRA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"91\",\"master_salary_structure_id\":\"12\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"64028\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"}]', '1', 1800.00, 21600.00, 1800.00, 21600.00, '1', 139.00, 1674.00, 0.75, 604.00, 7252.00, 3.25, '1', 130.00, 1560.00, '[\"86##100800\",\"87##25200\",\"88##15120\",\"89##12000\",\"90##6000\",\"91##64028\"]', '0', '2020-04-03 14:25:43', '2020-01-01', '', 'Fixed', 'West Bengal', ''),
(2, 56, 'N', 'Y', '0000-00-00 00:00:00', '177600', 12, '[{\"id\":\"86\",\"master_salary_structure_id\":\"12\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"40.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"87\",\"master_salary_structure_id\":\"12\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"88\",\"master_salary_structure_id\":\"12\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"15.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"89\",\"master_salary_structure_id\":\"12\",\"component_id\":\"11\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Conveyance Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"No\",\"fixed\":\"Yes\"},{\"id\":\"90\",\"master_salary_structure_id\":\"12\",\"component_id\":\"34\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"6000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"HRA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"91\",\"master_salary_structure_id\":\"12\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"36644\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"}]', '1', 1541.00, 18492.00, 1541.00, 18492.00, '1', 96.00, 1156.00, 0.75, 417.00, 5008.00, 3.25, '1', 110.00, 1320.00, '[\"86##71040\",\"87##17760\",\"88##10656\",\"89##12000\",\"90##6000\",\"91##36644\"]', '0', '2020-04-03 14:39:43', '2020-01-01', '', 'Actual', 'West Bengal', ''),
(3, 57, 'N', 'Y', '0000-00-00 00:00:00', '300000', 12, '[{\"id\":\"86\",\"master_salary_structure_id\":\"12\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"40.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"87\",\"master_salary_structure_id\":\"12\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"88\",\"master_salary_structure_id\":\"12\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"15.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"89\",\"master_salary_structure_id\":\"12\",\"component_id\":\"11\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"120000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Conveyance Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"No\",\"fixed\":\"Yes\"},{\"id\":\"90\",\"master_salary_structure_id\":\"12\",\"component_id\":\"34\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"120000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"HRA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"91\",\"master_salary_structure_id\":\"12\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"120000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"}]', '1', 1800.00, 21600.00, 1800.00, 21600.00, '1', 169.00, 2022.00, 0.75, 730.00, 8763.00, 3.25, '1', 130.00, 1560.00, '[\"13##120000\",\"14##30000\",\"15##18000\",\"16##12000\",\"17##6000\",\"18##83637\"]', '0', '2020-04-09 16:45:26', '2019-01-01', '', '', '', ''),
(6, 55, 'N', 'Y', '0000-00-00 00:00:00', '550000', 8, '[{\"id\":\"56\",\"master_salary_structure_id\":\"8\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"40.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"57\",\"master_salary_structure_id\":\"8\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"58\",\"master_salary_structure_id\":\"8\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"20.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"59\",\"master_salary_structure_id\":\"8\",\"component_id\":\"2\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"House Rent Allowance\",\"type\":\"Earning\",\"pf\":\"No\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"60\",\"master_salary_structure_id\":\"8\",\"component_id\":\"8\",\"operator\":\"*\",\"amount\":\"5.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Children Education Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"61\",\"master_salary_structure_id\":\"8\",\"component_id\":\"11\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"36000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Conveyance Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"No\",\"fixed\":\"Yes\"},{\"id\":\"62\",\"master_salary_structure_id\":\"8\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"117268\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"63\",\"master_salary_structure_id\":\"8\",\"component_id\":\"28\",\"operator\":\"*\",\"amount\":\"2.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Deduction\",\"component\":\"TDS\",\"type\":\"Deduction\",\"pf\":\"No\",\"esi\":\"No\",\"fixed\":\"No\"}]', '1', 1800.00, 21600.00, 1800.00, 21600.00, '1', 320.00, 3838.00, 0.75, 1386.00, 16632.00, 3.25, '1', 200.00, 2400.00, '[\"56##220000\",\"57##55000\",\"58##44000\",\"59##12000\",\"60##27500\",\"61##36000\",\"62##117268\"]', '0', '2020-04-06 17:42:45', '2020-04-07', '', 'Fixed', 'West Bengal', ''),
(7, 28, 'N', 'Y', '0000-00-00 00:00:00', '96000', 12, '[{\"id\":\"86\",\"master_salary_structure_id\":\"12\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"40.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"87\",\"master_salary_structure_id\":\"12\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"88\",\"master_salary_structure_id\":\"12\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"15.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"89\",\"master_salary_structure_id\":\"12\",\"component_id\":\"11\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Conveyance Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"No\",\"fixed\":\"Yes\"},{\"id\":\"90\",\"master_salary_structure_id\":\"12\",\"component_id\":\"34\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"6000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"HRA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"91\",\"master_salary_structure_id\":\"12\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"11537\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"}]', '1', 833.00, 9996.00, 833.00, 9996.00, '1', 52.00, 625.00, 0.75, 226.00, 2707.00, 3.25, '1', 0.00, 0.00, '[\"86##38400\",\"87##9600\",\"88##5760\",\"89##12000\",\"90##6000\",\"91##11537\"]', '0', '2020-04-09 16:42:39', '2020-01-01', '', 'Actual', 'West Bengal', ''),
(8, 28, 'N', 'Y', '0000-00-00 00:00:00', '96000', 12, '[{\"id\":\"86\",\"master_salary_structure_id\":\"12\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"40.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"87\",\"master_salary_structure_id\":\"12\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"88\",\"master_salary_structure_id\":\"12\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"15.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"89\",\"master_salary_structure_id\":\"12\",\"component_id\":\"11\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Conveyance Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"No\",\"fixed\":\"Yes\"},{\"id\":\"90\",\"master_salary_structure_id\":\"12\",\"component_id\":\"34\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"6000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"HRA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"91\",\"master_salary_structure_id\":\"12\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"11537\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"}]', '1', 833.00, 9996.00, 833.00, 9996.00, '1', 52.00, 625.00, 0.75, 226.00, 2707.00, 3.25, '1', 0.00, 0.00, '[\"86##38400\",\"87##9600\",\"88##5760\",\"89##12000\",\"90##6000\",\"91##11537\"]', '0', '2020-04-09 16:42:39', '2020-01-01', '', 'Actual', 'West Bengal', ''),
(9, 28, 'N', 'Y', '0000-00-00 00:00:00', '96000', 12, '[{\"id\":\"86\",\"master_salary_structure_id\":\"12\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"40.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"87\",\"master_salary_structure_id\":\"12\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"88\",\"master_salary_structure_id\":\"12\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"15.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"89\",\"master_salary_structure_id\":\"12\",\"component_id\":\"11\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Conveyance Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"No\",\"fixed\":\"Yes\"},{\"id\":\"90\",\"master_salary_structure_id\":\"12\",\"component_id\":\"34\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"6000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"HRA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"91\",\"master_salary_structure_id\":\"12\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"11537\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"}]', '1', 833.00, 9996.00, 833.00, 9996.00, '1', 52.00, 625.00, 0.75, 226.00, 2707.00, 3.25, '1', 0.00, 0.00, '[\"86##38400\",\"87##9600\",\"88##5760\",\"89##12000\",\"90##6000\",\"91##11537\"]', '0', '2020-04-09 16:42:47', '2020-01-01', '', 'Actual', 'West Bengal', ''),
(10, 58, 'N', 'Y', '0000-00-00 00:00:00', '300000', 12, '[{\"id\":\"86\",\"master_salary_structure_id\":\"12\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"40.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"87\",\"master_salary_structure_id\":\"12\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"88\",\"master_salary_structure_id\":\"12\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"15.00\",\"base_on\":\"Basic Salary\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"89\",\"master_salary_structure_id\":\"12\",\"component_id\":\"11\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"120000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Conveyance Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"No\",\"fixed\":\"Yes\"},{\"id\":\"90\",\"master_salary_structure_id\":\"12\",\"component_id\":\"34\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"120000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"HRA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"91\",\"master_salary_structure_id\":\"12\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"120000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"}]', '1', 1800.00, 21600.00, 1800.00, 21600.00, '1', 169.00, 2022.00, 0.75, 730.00, 8763.00, 3.25, '1', 130.00, 1560.00, '[\"67##120000\",\"68##30000\",\"69##18000\",\"70##12000\",\"71##6000\",\"72##83637\"]', '0', '2020-04-16 12:59:52', '2019-01-01', '', '', '', ''),
(11, 2, 'N', 'Y', '0000-00-00 00:00:00', '240000', 2, '[{\"id\":\"8\",\"master_salary_structure_id\":\"2\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"30.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"alias\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"9\",\"master_salary_structure_id\":\"2\",\"component_id\":\"2\",\"operator\":\"*\",\"amount\":\"20.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"House Rent Allowance\",\"alias\":\"House Rent Allowance\",\"type\":\"Earning\",\"pf\":\"No\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"10\",\"master_salary_structure_id\":\"2\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"alias\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"11\",\"master_salary_structure_id\":\"2\",\"component_id\":\"19\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"19200\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"CONV\",\"alias\":\"CONV\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"12\",\"master_salary_structure_id\":\"2\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"39629\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"alias\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"14\",\"master_salary_structure_id\":\"2\",\"component_id\":\"6\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Annual\",\"component\":\"Bonus\",\"alias\":\"Bonus\",\"type\":\"Earning\",\"pf\":\"No\",\"esi\":\"No\",\"fixed\":\"Yes\"}]', '1', 1548.00, 18579.00, 1548.00, 18579.00, '1', 127.00, 1521.00, 0.75, 549.00, 6592.00, 3.25, '1', 130.00, 1560.00, '[\"8##72000\",\"9##48000\",\"10##24000\",\"11##19200\",\"12##39629\",\"14##12000\"]', '0', '2020-04-17 12:19:43', '0000-00-00', '', 'Actual', 'West Bengal', ''),
(12, 29, 'N', 'Y', '0000-00-00 00:00:00', '230000', 1, '[{\"id\":\"1\",\"master_salary_structure_id\":\"1\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"30.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"alias\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"2\",\"master_salary_structure_id\":\"1\",\"component_id\":\"2\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"House Rent Allowance\",\"alias\":\"House Rent Allowance\",\"type\":\"Earning\",\"pf\":\"No\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"3\",\"master_salary_structure_id\":\"1\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"5.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"alias\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"4\",\"master_salary_structure_id\":\"1\",\"component_id\":\"19\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"19200\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"CONV\",\"alias\":\"CONV\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"5\",\"master_salary_structure_id\":\"1\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"68849\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"alias\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"7\",\"master_salary_structure_id\":\"1\",\"component_id\":\"6\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Annual\",\"component\":\"Bonus\",\"alias\":\"Bonus\",\"type\":\"Earning\",\"pf\":\"No\",\"esi\":\"No\",\"fixed\":\"Yes\"}]', '1', 1685.00, 20226.00, 1685.00, 20226.00, '1', 120.00, 1437.00, 0.75, 519.00, 6225.00, 3.25, '1', 130.00, 1560.00, '[\"1##69000\",\"2##23000\",\"3##11500\",\"4##19200\",\"5##68849\",\"7##12000\"]', '0', '2020-04-17 19:51:48', '0000-00-00', '', 'Actual', 'West Bengal', ''),
(13, 39, 'N', 'Y', '0000-00-00 00:00:00', '240000', 2, '[{\"id\":\"8\",\"master_salary_structure_id\":\"2\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"30.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"alias\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"9\",\"master_salary_structure_id\":\"2\",\"component_id\":\"2\",\"operator\":\"*\",\"amount\":\"20.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"House Rent Allowance\",\"alias\":\"House Rent Allowance\",\"type\":\"Earning\",\"pf\":\"No\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"10\",\"master_salary_structure_id\":\"2\",\"component_id\":\"5\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"DA\",\"alias\":\"DA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"11\",\"master_salary_structure_id\":\"2\",\"component_id\":\"19\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"19200\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"CONV\",\"alias\":\"CONV\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"12\",\"master_salary_structure_id\":\"2\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"39629\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"alias\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"14\",\"master_salary_structure_id\":\"2\",\"component_id\":\"6\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Annual\",\"component\":\"Bonus\",\"alias\":\"Bonus\",\"type\":\"Earning\",\"pf\":\"No\",\"esi\":\"No\",\"fixed\":\"Yes\"}]', '1', 1548.00, 18579.00, 1548.00, 18579.00, '1', 127.00, 1521.00, 0.75, 549.00, 6592.00, 3.25, '1', 130.00, 1560.00, '[\"8##72000\",\"9##48000\",\"10##24000\",\"11##19200\",\"12##39629\",\"14##12000\"]', '0', '2020-07-13 10:05:13', '2020-07-13', 'cffs', 'Actual', 'West Bengal', ''),
(14, 14, 'N', 'Y', '0000-00-00 00:00:00', '90000', 13, '[{\"id\":\"94\",\"master_salary_structure_id\":\"13\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"1.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"alias\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"95\",\"master_salary_structure_id\":\"13\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"89100\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"alias\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"}]', '0', 0.00, 0.00, 0.00, 0.00, '0', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '1', 0.00, 0.00, '[\"94##900\",\"95##89100\"]', '0', '2020-07-13 13:37:51', '2020-07-13', 'eee', '', '', ''),
(15, 3, 'N', 'Y', '0000-00-00 00:00:00', '239999', 1, '[{\"id\":\"1\",\"master_salary_structure_id\":\"1\",\"component_id\":\"3\",\"operator\":\"*\",\"amount\":\"30.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Basic Salary\",\"alias\":\"Basic Salary\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"2\",\"master_salary_structure_id\":\"1\",\"component_id\":\"2\",\"operator\":\"*\",\"amount\":\"10.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"House Rent Allowance\",\"alias\":\"House Rent Allowance\",\"type\":\"Earning\",\"pf\":\"No\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"3\",\"master_salary_structure_id\":\"1\",\"component_id\":\"4\",\"operator\":\"*\",\"amount\":\"5.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"0.00\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"TA\",\"alias\":\"TA\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"No\"},{\"id\":\"4\",\"master_salary_structure_id\":\"1\",\"component_id\":\"19\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"19200\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"CONV\",\"alias\":\"CONV\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"5\",\"master_salary_structure_id\":\"1\",\"component_id\":\"20\",\"operator\":null,\"amount\":\"0.00\",\"base_on\":null,\"fixed_amount\":\"73129\",\"actual_amount\":\"0.00\",\"salary_type\":\"Earning\",\"component\":\"Special Allowance\",\"alias\":\"Special Allowance\",\"type\":\"Earning\",\"pf\":\"Yes\",\"esi\":\"Yes\",\"fixed\":\"Yes\"},{\"id\":\"7\",\"master_salary_structure_id\":\"1\",\"component_id\":\"6\",\"operator\":\"*\",\"amount\":\"0.00\",\"base_on\":\"CTC\",\"fixed_amount\":\"12000\",\"actual_amount\":\"0.00\",\"salary_type\":\"Annual\",\"component\":\"Bonus\",\"alias\":\"Bonus\",\"type\":\"Earning\",\"pf\":\"No\",\"esi\":\"No\",\"fixed\":\"Yes\"}]', '1', 1763.00, 21159.00, 1763.00, 21159.00, '1', 125.00, 1502.00, 0.75, 543.00, 6511.00, 3.25, '1', 130.00, 1560.00, '[\"1##72000\",\"2##24000\",\"3##12000\",\"4##19200\",\"5##73129\",\"7##12000\"]', '0', '2020-07-13 13:51:53', '2020-07-13', 'sss', 'Actual', 'West Bengal', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_salary_details`
--

CREATE TABLE `hr_employee_salary_details` (
  `id` int(11) NOT NULL,
  `employee_salary_id` int(11) NOT NULL,
  `master_salary_structure_id` int(11) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `operator` varchar(1) DEFAULT NULL,
  `amount` float(9,2) NOT NULL DEFAULT 0.00,
  `base_on` varchar(15) DEFAULT NULL,
  `fixed_amount` float(9,2) NOT NULL DEFAULT 0.00,
  `actual_amount` float(9,2) DEFAULT 0.00,
  `salary_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_salary_details`
--

INSERT INTO `hr_employee_salary_details` (`id`, `employee_salary_id`, `master_salary_structure_id`, `component_id`, `operator`, `amount`, `base_on`, `fixed_amount`, `actual_amount`, `salary_type`) VALUES
(1, 1, 12, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(2, 1, 12, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(3, 1, 12, 4, '*', 15.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(4, 1, 12, 11, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(5, 1, 12, 34, '*', 0.00, 'CTC', 6000.00, 0.00, 'Earning'),
(6, 1, 12, 20, NULL, 0.00, NULL, 64028.00, 0.00, 'Earning'),
(7, 2, 12, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(8, 2, 12, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(9, 2, 12, 4, '*', 15.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(10, 2, 12, 11, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(11, 2, 12, 34, '*', 0.00, 'CTC', 6000.00, 0.00, 'Earning'),
(12, 2, 12, 20, NULL, 0.00, NULL, 36644.00, 0.00, 'Earning'),
(35, 6, 8, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(36, 6, 8, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(37, 6, 8, 4, '*', 20.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(38, 6, 8, 2, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(39, 6, 8, 8, '*', 5.00, 'CTC', 0.00, 0.00, 'Earning'),
(40, 6, 8, 11, '*', 0.00, 'CTC', 36000.00, 0.00, 'Earning'),
(41, 6, 8, 20, NULL, 0.00, NULL, 117268.00, 0.00, 'Earning'),
(42, 6, 8, 28, '*', 2.00, 'CTC', 0.00, 0.00, 'Deduction'),
(43, 7, 12, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(44, 7, 12, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(45, 7, 12, 4, '*', 15.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(46, 7, 12, 11, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(47, 7, 12, 34, '*', 0.00, 'CTC', 6000.00, 0.00, 'Earning'),
(48, 7, 12, 20, NULL, 0.00, NULL, 11537.00, 0.00, 'Earning'),
(49, 8, 12, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(50, 8, 12, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(51, 8, 12, 4, '*', 15.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(52, 8, 12, 11, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(53, 8, 12, 34, '*', 0.00, 'CTC', 6000.00, 0.00, 'Earning'),
(54, 8, 12, 20, NULL, 0.00, NULL, 11537.00, 0.00, 'Earning'),
(55, 9, 12, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(56, 9, 12, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(57, 9, 12, 4, '*', 15.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(58, 9, 12, 11, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(59, 9, 12, 34, '*', 0.00, 'CTC', 6000.00, 0.00, 'Earning'),
(60, 9, 12, 20, NULL, 0.00, NULL, 11537.00, 0.00, 'Earning'),
(61, 3, 12, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(62, 3, 12, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(63, 3, 12, 4, '*', 15.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(64, 3, 12, 11, '*', 0.00, 'CTC', 120000.00, 0.00, 'Earning'),
(65, 3, 12, 34, '*', 0.00, 'CTC', 120000.00, 0.00, 'Earning'),
(66, 3, 12, 20, NULL, 0.00, NULL, 120000.00, 0.00, 'Earning'),
(73, 10, 12, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(74, 10, 12, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(75, 10, 12, 4, '*', 15.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(76, 10, 12, 11, '*', 0.00, 'CTC', 120000.00, 0.00, 'Earning'),
(77, 10, 12, 34, '*', 0.00, 'CTC', 120000.00, 0.00, 'Earning'),
(78, 10, 12, 20, NULL, 0.00, NULL, 120000.00, 0.00, 'Earning'),
(79, 11, 2, 3, '*', 30.00, 'CTC', 0.00, 0.00, 'Earning'),
(80, 11, 2, 2, '*', 20.00, 'CTC', 0.00, 0.00, 'Earning'),
(81, 11, 2, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(82, 11, 2, 19, '*', 0.00, 'CTC', 19200.00, 0.00, 'Earning'),
(83, 11, 2, 20, NULL, 0.00, NULL, 39629.00, 0.00, 'Earning'),
(84, 11, 2, 6, '*', 0.00, 'CTC', 12000.00, 0.00, 'Annual'),
(85, 12, 1, 3, '*', 30.00, 'CTC', 0.00, 0.00, 'Earning'),
(86, 12, 1, 2, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(87, 12, 1, 4, '*', 5.00, 'CTC', 0.00, 0.00, 'Earning'),
(88, 12, 1, 19, '*', 0.00, 'CTC', 19200.00, 0.00, 'Earning'),
(89, 12, 1, 20, NULL, 0.00, NULL, 68849.00, 0.00, 'Earning'),
(90, 12, 1, 6, '*', 0.00, 'CTC', 12000.00, 0.00, 'Annual'),
(91, 13, 2, 3, '*', 30.00, 'CTC', 0.00, 0.00, 'Earning'),
(92, 13, 2, 2, '*', 20.00, 'CTC', 0.00, 0.00, 'Earning'),
(93, 13, 2, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(94, 13, 2, 19, '*', 0.00, 'CTC', 19200.00, 0.00, 'Earning'),
(95, 13, 2, 20, NULL, 0.00, NULL, 39629.00, 0.00, 'Earning'),
(96, 13, 2, 6, '*', 0.00, 'CTC', 12000.00, 0.00, 'Annual'),
(97, 14, 13, 3, '*', 1.00, 'CTC', 0.00, 0.00, 'Earning'),
(98, 14, 13, 20, NULL, 0.00, NULL, 89100.00, 0.00, 'Earning'),
(99, 15, 1, 3, '*', 30.00, 'CTC', 0.00, 0.00, 'Earning'),
(100, 15, 1, 2, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(101, 15, 1, 4, '*', 5.00, 'CTC', 0.00, 0.00, 'Earning'),
(102, 15, 1, 19, '*', 0.00, 'CTC', 19200.00, 0.00, 'Earning'),
(103, 15, 1, 20, NULL, 0.00, NULL, 73129.00, 0.00, 'Earning'),
(104, 15, 1, 6, '*', 0.00, 'CTC', 12000.00, 0.00, 'Annual');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_salary_details_temp`
--

CREATE TABLE `hr_employee_salary_details_temp` (
  `id` int(11) NOT NULL,
  `employee_salary_temp_id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `amount` float(9,2) NOT NULL DEFAULT 0.00,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_employee_salary_details_temp`
--

INSERT INTO `hr_employee_salary_details_temp` (`id`, `employee_salary_temp_id`, `component_id`, `amount`, `type`) VALUES
(1, 1, 3, 5750.00, 'Earning'),
(2, 1, 2, 1916.67, 'Earning'),
(3, 1, 4, 958.33, 'Earning'),
(4, 1, 20, 5737.42, 'Earning'),
(5, 2, 3, 75.00, 'Earning'),
(6, 2, 20, 7425.00, 'Earning'),
(7, 3, 3, 6000.00, 'Earning'),
(8, 3, 2, 4000.00, 'Earning'),
(9, 3, 5, 2000.00, 'Earning'),
(10, 3, 20, 3302.42, 'Earning'),
(11, 4, 3, 6000.00, 'Earning'),
(12, 4, 2, 4000.00, 'Earning'),
(13, 4, 5, 2000.00, 'Earning'),
(14, 4, 20, 3302.42, 'Earning');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_salary_temp`
--

CREATE TABLE `hr_employee_salary_temp` (
  `id` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `modified_date` datetime NOT NULL,
  `ctc_amount` varchar(100) DEFAULT NULL,
  `salary_structure_id` int(11) DEFAULT NULL,
  `salary_structure_details` longtext DEFAULT NULL,
  `pf` enum('0','1') NOT NULL DEFAULT '0',
  `employeemothlypf` float(9,2) DEFAULT NULL,
  `employeeyearlypf` float(9,2) DEFAULT NULL,
  `employermothlypf` float(9,2) DEFAULT NULL,
  `employeryearlypf` float(9,2) DEFAULT NULL,
  `esi` enum('0','1') NOT NULL DEFAULT '0',
  `employeemothlyesi` float(9,2) DEFAULT NULL,
  `employeeyearlyesi` float(9,2) DEFAULT NULL,
  `esi_per_employee` float(9,2) DEFAULT NULL,
  `employermothlyesi` float(9,2) DEFAULT NULL,
  `employeryearlyesi` float(9,2) DEFAULT NULL,
  `esi_per_employer` float(9,2) DEFAULT NULL,
  `ptax` enum('0','1') NOT NULL DEFAULT '0',
  `mothlyptax` float(9,2) DEFAULT NULL,
  `yearlyptax` float(9,2) DEFAULT NULL,
  `salary_structure_breakup` varchar(225) DEFAULT NULL,
  `flag` enum('0','1') NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `application_date` date NOT NULL,
  `note` text NOT NULL,
  `pf_based_on` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `total_gross` float(9,2) NOT NULL,
  `total_deduction` float(9,2) NOT NULL,
  `take_home` float(9,2) NOT NULL,
  `withday` int(11) DEFAULT NULL,
  `withoutday` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee_salary_temp`
--

INSERT INTO `hr_employee_salary_temp` (`id`, `month`, `year`, `employee_id`, `delete_flag`, `is_active`, `modified_date`, `ctc_amount`, `salary_structure_id`, `salary_structure_details`, `pf`, `employeemothlypf`, `employeeyearlypf`, `employermothlypf`, `employeryearlypf`, `esi`, `employeemothlyesi`, `employeeyearlyesi`, `esi_per_employee`, `employermothlyesi`, `employeryearlyesi`, `esi_per_employer`, `ptax`, `mothlyptax`, `yearlyptax`, `salary_structure_breakup`, `flag`, `create_date`, `application_date`, `note`, `pf_based_on`, `state`, `total_gross`, `total_deduction`, `take_home`, `withday`, `withoutday`) VALUES
(1, '06', '2020', 29, 'N', 'Y', '0000-00-00 00:00:00', '19166.666666667', NULL, NULL, '1', 1493.49, 0.00, 1493.49, 0.00, '1', 107.72, 0.00, 0.75, 466.78, 0.00, 3.25, '1', 110.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', 'Actual', 'West Bengal', 14362.42, 1711.21, 12651.21, 30, 0),
(2, '06', '2020', 14, 'N', 'Y', '0000-00-00 00:00:00', '7500', NULL, NULL, '0', 0.00, 0.00, 0.00, 0.00, '0', 0.00, 0.00, 0.75, 0.00, 0.00, 3.25, '1', 0.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', '', '', 7500.00, 0.00, 7500.00, 30, 0),
(3, '06', '2020', 39, 'N', 'Y', '0000-00-00 00:00:00', '20000', NULL, NULL, '1', 1356.29, 0.00, 1356.29, 0.00, '1', 114.77, 0.00, 0.75, 497.33, 0.00, 3.25, '1', 130.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', 'Actual', 'West Bengal', 15302.42, 1601.06, 13701.36, 30, 0),
(4, '06', '2020', 2, 'N', 'Y', '0000-00-00 00:00:00', '20000', NULL, NULL, '1', 1356.29, 0.00, 1356.29, 0.00, '1', 114.77, 0.00, 0.75, 497.33, 0.00, 3.25, '1', 130.00, 0.00, NULL, '0', '0000-00-00 00:00:00', '0000-00-00', '', 'Actual', 'West Bengal', 15302.42, 1601.06, 13701.36, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_equipment`
--

CREATE TABLE `hr_equipment` (
  `id` int(11) NOT NULL,
  `equipment_name` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `assigned` int(11) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_equipment`
--

INSERT INTO `hr_equipment` (`id`, `equipment_name`, `quantity`, `assigned`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'Laptop 62', 50, NULL, 'Y', 'N', '2019-07-12', '2019-07-12 14:13:10'),
(2, 'Laptop', 10, 12, 'N', 'Y', '2019-07-12', '2020-03-28 11:43:54'),
(3, 'Desktop', 10, 1, 'N', 'Y', '2019-07-14', '0000-00-00 00:00:00'),
(4, 'mouse', 45, -2, 'Y', 'N', '2020-03-05', '2020-04-25 13:50:05'),
(5, 'chair', 60, -20, 'Y', 'N', '2020-03-16', '0000-00-00 00:00:00'),
(6, 'Chair', 10, 0, 'N', 'Y', '2020-03-19', '2020-03-28 11:45:13'),
(7, 'manager laptop', 2, 1, 'Y', 'N', '2020-03-19', '0000-00-00 00:00:00'),
(8, 'Car', 10, 1, 'N', 'Y', '2020-03-19', '2020-03-28 11:44:43'),
(9, 'Mobile', 10, 1, 'N', 'Y', '2020-03-19', '2020-03-28 11:43:43'),
(10, 'Notebook', 100, -10, 'Y', 'N', '2020-03-26', '0000-00-00 00:00:00'),
(11, 'Safety Boots', 10, NULL, 'N', 'Y', '2020-03-28', '0000-00-00 00:00:00'),
(12, 'Safety Dress', 10, NULL, 'N', 'Y', '2020-03-28', '0000-00-00 00:00:00'),
(13, 'Safety Gloves', 10, NULL, 'N', 'Y', '2020-03-28', '0000-00-00 00:00:00'),
(14, 'Safety Helmet', 10, NULL, 'N', 'Y', '2020-03-28', '0000-00-00 00:00:00'),
(15, 'NoteBook', 12, 12, 'Y', 'N', '2020-04-27', '0000-00-00 00:00:00'),
(0, 'Mouse', 50, NULL, 'N', 'Y', '2023-06-05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_esi_admin`
--

CREATE TABLE `hr_esi_admin` (
  `id` int(11) NOT NULL,
  `employee_esi_account_no` varchar(200) NOT NULL,
  `entry_date` datetime NOT NULL DEFAULT current_timestamp(),
  `employee_esi_percent` varchar(200) NOT NULL,
  `employer_esi_percent` varchar(300) NOT NULL,
  `is_active` enum('Y','N','','') NOT NULL DEFAULT 'Y',
  `delete_flag` enum('Y','N','','') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_esi_admin`
--

INSERT INTO `hr_esi_admin` (`id`, `employee_esi_account_no`, `entry_date`, `employee_esi_percent`, `employer_esi_percent`, `is_active`, `delete_flag`) VALUES
(2, 'W12345', '2019-12-11 18:16:11', '0.75', '3.25', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `hr_hold_freeze_payroll`
--

CREATE TABLE `hr_hold_freeze_payroll` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_hold_freeze_payroll`
--

INSERT INTO `hr_hold_freeze_payroll` (`id`, `employee_id`, `month`, `year`, `date`) VALUES
(1, 29, '06', '2020', '2020-07-13'),
(2, 14, '06', '2020', '2020-07-13'),
(3, 39, '06', '2020', '2020-07-13'),
(4, 2, '06', '2020', '2020-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `hr_increement_details`
--

CREATE TABLE `hr_increement_details` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `increement_date` date DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `amount` float(9,2) NOT NULL DEFAULT 0.00,
  `type` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_increement_details`
--

INSERT INTO `hr_increement_details` (`id`, `employee_id`, `increement_date`, `component_id`, `amount`, `type`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 10, '2019-07-16', 3, 1000.00, 'Fixed', 'N', 'N', '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_insurance_policies`
--

CREATE TABLE `hr_insurance_policies` (
  `id` int(11) NOT NULL,
  `policy_name` varchar(100) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `insurence_for` varchar(100) DEFAULT 'employee',
  `renewal_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `coverage` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_insurance_policies`
--

INSERT INTO `hr_insurance_policies` (`id`, `policy_name`, `type`, `insurence_for`, `renewal_date`, `expiry_date`, `coverage`, `note`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'Policy name', 'Workman Compensation', 'vehicle', '2019-01-10', '2019-02-09', 'Health', 'Lorem ipsum dolor sit amet.', 'N', 'Y', '2019-01-29', '2019-07-15 15:34:35'),
(4, 'AEGON Life Cover', 'Workman Compensation', '', '0000-00-00', '0000-00-00', 'On Working hours ', 'This policy applicable for all employee. It will cover if any problem occur on working hour.', 'N', 'Y', '2019-04-10', '2020-03-26 12:00:42'),
(5, 'Bajaj Allianz', 'Health Insurance', 'employee', '0000-00-00', '0000-00-00', 'Entire Life ', 'This policy cover entire life ', 'N', 'Y', '2019-05-21', '0000-00-00 00:00:00'),
(6, 'Bharti AXA ', 'Vehicle Insurance', 'vehicle', '2019-09-21', '2019-05-21', 'Bonnet to Bonnet coverage', 'It will cover bonnet to bonnet for four wheeler', 'N', 'Y', '2019-05-21', '2019-07-15 15:33:55'),
(7, 'Worman policy', 'Workman Compensation', 'employee', '0000-00-00', '0000-00-00', 'wedhwbwjb', '', 'N', 'Y', '2019-07-15', '0000-00-00 00:00:00'),
(8, 'HDFC two wheeler insurance', 'Vehicle Insurance', 'vehicle', '0000-00-00', '0000-00-00', '100000', 'ONLY BIKE DRIVER', 'N', 'Y', '2020-03-05', '2020-03-16 14:56:20'),
(9, 'HDFC four wheeler insurance', 'Vehicle Insurance', 'vehicle', '0000-00-00', '0000-00-00', '250000', 'Car driver only', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(10, 'HDFC Life Insurance', 'Health Insurance', 'employee', '2001-03-20', '2028-02-20', '550000', 'Only Manufacturing Employee purpose.', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(11, 'HDFC projects insurance', 'Projects Insurance', '', '2001-01-20', '2031-12-20', '5000000', 'only for dimond city projects purpose.', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(12, 'HDFC work compensation', 'Workman Compensation', '', '2001-01-20', '0000-00-00', '200000', 'working purpose if any employee heavy injured that purpose', 'N', 'Y', '2020-03-16', '2020-03-16 15:08:14'),
(13, 'manager health insurance', 'Health Insurance', '', '2001-01-20', '2031-12-20', '350000', 'only for manager ', 'N', 'Y', '2020-03-19', '2020-03-20 14:50:36'),
(14, 'manager car insurance', 'Vehicle Insurance', 'employee', '2001-01-20', '0000-00-00', '500000', '', 'N', 'Y', '2020-03-19', '0000-00-00 00:00:00'),
(15, 'Children Education Policy', 'Workman Compensation', '', '0000-00-00', '0000-00-00', '', '', 'N', 'Y', '2020-04-09', '2020-04-09 13:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `hr_leaves_freeze_payroll`
--

CREATE TABLE `hr_leaves_freeze_payroll` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `totaldays` varchar(100) NOT NULL,
  `lop` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_leaves_freeze_payroll`
--

INSERT INTO `hr_leaves_freeze_payroll` (`id`, `organization_id`, `employee_id`, `month`, `year`, `totaldays`, `lop`, `date`, `start_date`, `end_date`) VALUES
(1, 1, 29, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(2, 1, 5, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(3, 1, 24, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(4, 1, 40, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(5, 1, 67, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(6, 1, 42, '06', '2020', '29', '1', '2020-07-13', '2020-06-01', '2020-06-30'),
(7, 1, 3, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(8, 1, 32, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(9, 1, 14, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(10, 1, 15, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(11, 1, 30, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(12, 1, 13, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(13, 1, 34, '06', '2020', '29', '1', '2020-07-13', '2020-06-01', '2020-06-30'),
(14, 1, 4, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(15, 1, 17, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(16, 1, 9, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(17, 1, 7, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(18, 1, 21, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(19, 1, 38, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(20, 1, 20, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(21, 1, 64, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(22, 1, 65, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(23, 1, 26, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(24, 1, 12, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(25, 1, 41, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(26, 1, 11, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(27, 1, 39, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(28, 1, 66, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(29, 1, 23, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(30, 1, 22, '06', '2020', '29', '1', '2020-07-13', '2020-06-01', '2020-06-30'),
(31, 1, 6, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(32, 1, 2, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(33, 1, 8, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(34, 1, 27, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(35, 1, 10, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(36, 1, 18, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(37, 1, 36, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(38, 1, 37, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(39, 1, 48, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30'),
(40, 1, 19, '06', '2020', '30', '0', '2020-07-13', '2020-06-01', '2020-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `hr_leave_settlement`
--

CREATE TABLE `hr_leave_settlement` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `settlement_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `leave_type_id` int(11) NOT NULL,
  `settlement_leaves` varchar(100) NOT NULL,
  `basic_amount` float(9,2) NOT NULL,
  `total_days` varchar(100) NOT NULL,
  `amount` float(9,2) NOT NULL DEFAULT 0.00,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_leave_settlement`
--

INSERT INTO `hr_leave_settlement` (`id`, `transaction_id`, `employee_id`, `settlement_date`, `description`, `leave_type_id`, `settlement_leaves`, `basic_amount`, `total_days`, `amount`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'TNX/1/01/2020', 10, '2020-01-06', 'trtrtr', 2, '2', 10000.00, '31', 645.16, 'N', 'Y', '2020-01-06', '0000-00-00 00:00:00'),
(2, 'TNX/2/03/2020', 28, '2020-03-19', '', 1, '4', 30000.00, '30', 4000.00, 'N', 'Y', '2020-03-19', '0000-00-00 00:00:00'),
(3, 'TNX/3/05/2020', 55, '0000-00-00', '', 1, '4', 5000.00, '31', 645.16, 'N', 'Y', '2020-05-06', '0000-00-00 00:00:00'),
(4, 'TNX/4/05/2020', 29, '0000-00-00', '', 1, '2', 0.00, '31', 0.00, 'Y', 'N', '2020-05-06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_attendance`
--

CREATE TABLE `hr_master_attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `attendance_status` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_attendance_rules`
--

CREATE TABLE `hr_master_attendance_rules` (
  `id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `work_shift_id` int(11) NOT NULL,
  `day_type` varchar(100) NOT NULL,
  `leave_type_half` varchar(100) NOT NULL,
  `nos_half` varchar(100) NOT NULL,
  `leave_type` text NOT NULL,
  `nos` int(11) NOT NULL,
  `min_hrs_for_half_day` varchar(100) DEFAULT NULL,
  `min_hrs_for_full_day` varchar(100) DEFAULT NULL,
  `incomplete_present_for_less_then` varchar(100) DEFAULT NULL,
  `over_time_after_hour` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_attendance_rules`
--

INSERT INTO `hr_master_attendance_rules` (`id`, `grade`, `work_shift_id`, `day_type`, `leave_type_half`, `nos_half`, `leave_type`, `nos`, `min_hrs_for_half_day`, `min_hrs_for_full_day`, `incomplete_present_for_less_then`, `over_time_after_hour`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 0, 7, '', '', '', '0', 0, '05:00', NULL, '01:00', '08:00', 'Y', 'N', '2020-01-03', '2020-01-03 16:32:30'),
(2, 0, 5, '', '', '', '0', 0, '05:00', NULL, '01:00', '08:00', 'Y', 'N', '2020-01-03', '0000-00-00 00:00:00'),
(3, 0, 19, 'Half', '1', '0.5', '1', 1, '03:00', '04:00', '03:00', '20:00', 'N', 'Y', '2020-01-03', '2020-06-29 18:13:06'),
(4, 0, 9, '', '', '', '0', 0, '04:00', NULL, '02:00', '20:00', 'Y', 'N', '2020-01-03', '0000-00-00 00:00:00'),
(5, 0, 12, 'Full', '', '', '1,2', 1, '04:00', '06:00', '04:00', '16:00', 'Y', 'N', '2020-02-05', '2020-03-19 15:13:13'),
(6, 0, 20, 'Full', '1', '.5', '1,2,3', 1, '04:00', '07:00', '04:00', '09:00', 'Y', 'N', '2020-03-19', '2020-03-25 18:46:42'),
(7, 0, 19, 'Full', '1', '.5', '1', 1, '05:00', '06:00', '05:00', '20:00', 'N', 'Y', '2020-03-25', '2020-06-29 18:13:19'),
(8, 0, 12, 'Full', '3', '1', '1,2', 1, '02:00', '04:00', '01:00', '20:00', 'N', 'Y', '2020-03-27', '2020-06-29 18:13:34'),
(9, 0, 12, 'Half', '3', '1', '1,2', 1, '02:00', '04:00', '01:00', '20:00', 'N', 'Y', '2020-03-27', '2020-06-29 18:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_benefits_bonus_and_incentive`
--

CREATE TABLE `hr_master_benefits_bonus_and_incentive` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `premium` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_benefits_bonus_and_incentive`
--

INSERT INTO `hr_master_benefits_bonus_and_incentive` (`id`, `employee_id`, `start_date`, `end_date`, `premium`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 1, '2018-12-26', '2019-01-05', '1000000', 'Y', 'N', '2018-12-26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_benefits_gratuity`
--

CREATE TABLE `hr_master_benefits_gratuity` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `premium` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_benefits_gratuity`
--

INSERT INTO `hr_master_benefits_gratuity` (`id`, `employee_id`, `start_date`, `end_date`, `premium`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 2, '2018-11-27', '2019-01-04', '1000000', 'N', 'Y', '2018-12-26', '0000-00-00 00:00:00'),
(2, 1, '2018-11-28', '2018-12-27', '4754.346', 'Y', 'N', '2018-12-26', '0000-00-00 00:00:00'),
(3, 1, '2018-12-28', '2018-12-28', '100', 'N', 'Y', '2018-12-28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_benefits_insurance_policy`
--

CREATE TABLE `hr_master_benefits_insurance_policy` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `premium` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_benefits_insurance_policy`
--

INSERT INTO `hr_master_benefits_insurance_policy` (`id`, `employee_id`, `start_date`, `end_date`, `premium`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 2, '2018-12-26', '2019-01-05', '1000000', 'N', 'Y', '2018-12-26', '0000-00-00 00:00:00'),
(2, 2, '2018-12-29', '2019-01-02', '1000000', 'Y', 'N', '2018-12-26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_benefits_ltc`
--

CREATE TABLE `hr_master_benefits_ltc` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `premium` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_benefits_ltc`
--

INSERT INTO `hr_master_benefits_ltc` (`id`, `employee_id`, `start_date`, `end_date`, `premium`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 1, '2018-12-19', '2019-01-05', '1000000', 'N', 'Y', '2018-12-26', '0000-00-00 00:00:00'),
(2, 2, '2018-12-13', '2019-01-04', '1000000', 'Y', 'N', '2018-12-26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_benefits_project_insurance`
--

CREATE TABLE `hr_master_benefits_project_insurance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `premium` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_benefits_project_insurance`
--

INSERT INTO `hr_master_benefits_project_insurance` (`id`, `employee_id`, `start_date`, `end_date`, `premium`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 2, '2018-12-19', '2019-01-05', '1000000', 'N', 'N', '2018-12-26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_benefits_tenancy`
--

CREATE TABLE `hr_master_benefits_tenancy` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `premium` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_benefits_tenancy`
--

INSERT INTO `hr_master_benefits_tenancy` (`id`, `employee_id`, `start_date`, `end_date`, `premium`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 2, '2018-11-27', '2019-01-05', '345', 'N', 'N', '2018-12-26', '2018-12-26 10:37:33'),
(2, 2, '2018-11-27', '2018-11-27', '345', 'Y', 'N', '2018-12-26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_benefits_vehicles`
--

CREATE TABLE `hr_master_benefits_vehicles` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `premium` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_benefits_vehicles`
--

INSERT INTO `hr_master_benefits_vehicles` (`id`, `employee_id`, `start_date`, `end_date`, `premium`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 2, '2018-12-04', '2019-01-03', '1000000', 'N', 'Y', '2018-12-26', '2018-12-26 10:46:19'),
(2, 2, '2018-11-28', '2018-12-27', '346', 'Y', 'N', '2018-12-26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_benefits_vehicle_insurance`
--

CREATE TABLE `hr_master_benefits_vehicle_insurance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `premium` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_benefits_vehicle_insurance`
--

INSERT INTO `hr_master_benefits_vehicle_insurance` (`id`, `employee_id`, `start_date`, `end_date`, `premium`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 2, '2018-12-27', '2019-01-03', '1000000', 'N', 'Y', '2018-12-26', '0000-00-00 00:00:00'),
(2, 1, '2018-12-20', '2019-01-05', '1000000', 'Y', 'N', '2018-12-26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_benefits_workman_compensation`
--

CREATE TABLE `hr_master_benefits_workman_compensation` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `premium` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_benefits_workman_compensation`
--

INSERT INTO `hr_master_benefits_workman_compensation` (`id`, `employee_id`, `start_date`, `end_date`, `premium`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 2, '2018-12-19', '2019-01-05', '345', 'N', 'Y', '2018-12-26', '2018-12-26 10:07:22'),
(2, 2, '2018-12-21', '2019-01-03', '346', 'Y', 'N', '2018-12-26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_department`
--

CREATE TABLE `hr_master_department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `under` int(11) DEFAULT NULL,
  `overtime_id` int(11) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_department`
--

INSERT INTO `hr_master_department` (`id`, `department_name`, `under`, `overtime_id`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'tttt', 0, 0, 'Y', 'N', '2018-12-20', '2018-12-20 13:48:58'),
(2, 'de1', 0, 0, 'Y', 'N', '2018-12-20', '2018-12-20 13:49:42'),
(3, 'Administration', 0, 0, 'N', 'Y', '2019-01-28', '2019-04-04 16:50:15'),
(4, 'Sales & Marketing', 0, 0, 'N', 'Y', '2019-01-28', '2019-05-21 11:32:22'),
(5, 'Sales', 0, 0, 'Y', 'N', '2019-01-28', '0000-00-00 00:00:00'),
(6, 'Human Resource', 0, 0, 'N', 'Y', '2019-01-28', '2019-05-21 11:27:36'),
(7, 'Quality Analyst', 0, 0, 'N', 'N', '2019-01-28', '0000-00-00 00:00:00'),
(8, 'Finance ', 0, 0, 'N', 'Y', '2019-04-03', '2019-05-21 11:34:22'),
(9, 'another deptt', 0, 0, 'Y', 'N', '2019-04-08', '0000-00-00 00:00:00'),
(10, 'another deptt2', 0, 0, 'Y', 'N', '2019-04-08', '0000-00-00 00:00:00'),
(11, 'Another Deptttt', 0, 0, 'Y', 'N', '2019-04-08', '0000-00-00 00:00:00'),
(12, 'hello', 0, 0, 'Y', 'N', '2019-04-08', '0000-00-00 00:00:00'),
(13, 'another depttxx', 0, 0, 'Y', 'N', '2019-04-08', '0000-00-00 00:00:00'),
(14, 'New Deptt', 0, 0, 'Y', 'N', '2019-04-09', '0000-00-00 00:00:00'),
(15, 'anup', 0, 0, 'Y', 'N', '2019-04-09', '0000-00-00 00:00:00'),
(16, 'sadasdas', 0, 0, 'Y', 'N', '2019-04-09', '0000-00-00 00:00:00'),
(17, 'testtttttttttttttttttt', 0, 0, 'Y', 'N', '2019-04-11', '0000-00-00 00:00:00'),
(18, 'afsadadadasd', 0, 0, 'Y', 'N', '2019-04-11', '0000-00-00 00:00:00'),
(19, 'test ap', 0, 0, 'Y', 'N', '2019-04-11', '0000-00-00 00:00:00'),
(20, 'dzfdsfdsfdsfsdf', 0, 0, 'Y', 'N', '2019-04-11', '0000-00-00 00:00:00'),
(21, 'Development ', 0, 0, 'N', 'Y', '2019-04-13', '2019-05-21 11:31:51'),
(22, 'Design', 0, 0, 'N', 'Y', '2019-05-21', '0000-00-00 00:00:00'),
(23, 'Digital Marketing', 0, 0, 'N', 'Y', '2019-05-21', '0000-00-00 00:00:00'),
(24, 'IT', 0, 0, 'Y', 'N', '2019-07-07', '0000-00-00 00:00:00'),
(25, 'Business Development', 0, 0, 'N', 'Y', '2019-07-14', '0000-00-00 00:00:00'),
(26, 'Business Development', 0, 0, 'Y', 'N', '2019-07-14', '0000-00-00 00:00:00'),
(27, 'IT Product', 0, 0, 'N', 'Y', '2019-07-15', '0000-00-00 00:00:00'),
(28, 'Marketing', 0, 0, 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(29, 'Driver DEPT.', 0, 0, 'N', 'Y', '2020-03-14', '2020-03-18 15:28:10'),
(30, 'Administration', 0, 0, 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(31, 'Fourth Staff', 0, 0, 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(32, 'BACK OFFICE', 0, 0, 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(33, 'ADMIN', 0, 0, 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(34, 'WORKER', 0, 0, 'N', 'N', '2020-03-18', '0000-00-00 00:00:00'),
(35, 'Supervisor DEPT', 0, 0, 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(36, 'Account DEPT.', 0, 0, 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(37, 'Manager DEPT.', 0, 0, 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(38, 'Law DEPT.', 0, 0, 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(39, 'Dispatcher DEPT.', 0, 0, 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(40, 'Labour DEPT.(60k-3L)', 0, 0, 'N', 'Y', '2020-03-18', '2020-03-31 11:15:05'),
(41, 'Workman', 0, 0, 'Y', 'N', '2020-04-09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_designation`
--

CREATE TABLE `hr_master_designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_designation`
--

INSERT INTO `hr_master_designation` (`id`, `designation_name`, `description`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'test234', '23432asfasf', 'Y', 'N', '2018-12-20', '2018-12-20 13:54:52'),
(2, 'Labour', 'Labour', 'N', 'Y', '2018-12-20', '2019-01-28 18:18:46'),
(3, 'Junior Managerr', 'Junior Manager', 'N', 'Y', '2019-01-28', '2019-04-09 17:38:44'),
(4, 'Manager', 'Manager', 'N', 'Y', '2019-01-28', '0000-00-00 00:00:00'),
(5, 'mid man', 'hello', 'Y', 'N', '2019-04-09', '0000-00-00 00:00:00'),
(6, 'middddddd', 'sdfdsfds', 'Y', 'N', '2019-04-09', '0000-00-00 00:00:00'),
(7, 'fsfdsf', 'sfsdfdsf', 'Y', 'N', '2019-04-09', '0000-00-00 00:00:00'),
(8, 'Project Manager', 'Project Manager', 'N', 'Y', '2019-04-13', '2019-04-27 16:37:19'),
(9, 'Web Developer ', 'Web Developer', 'N', 'Y', '2019-04-27', '0000-00-00 00:00:00'),
(10, 'UX/UI Designer', 'UX/UI Designer', 'N', 'Y', '2019-04-27', '0000-00-00 00:00:00'),
(11, 'Team Lead', 'Team Lead', 'N', 'Y', '2019-04-27', '0000-00-00 00:00:00'),
(12, 'Quality Analyst ', 'Quality Analyst ', 'N', 'Y', '2019-04-27', '0000-00-00 00:00:00'),
(13, 'IT Project Manager', 'kehdwkehffl', 'N', 'Y', '2019-07-07', '2019-07-15 20:48:59'),
(14, 'General Manager', 'In charge of all business development related tasks in the company.', 'N', 'Y', '2019-07-14', '0000-00-00 00:00:00'),
(15, 'Despatcher', 'all local area related matter', 'N', 'Y', '2020-03-05', '2020-03-05 17:49:16'),
(16, 'Driver', '', 'N', 'Y', '2020-03-14', '2020-03-18 15:29:25'),
(17, 'Supervisor', '', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(18, 'Accountant', '', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(19, 'Jr. Accountant', '', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(20, 'Advocate', '', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(21, 'Dispatcher', '', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(22, 'CEO', 'Head of the Office.', 'N', 'Y', '2020-04-09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_docs_templates`
--

CREATE TABLE `hr_master_docs_templates` (
  `id` int(11) NOT NULL,
  `template_name` varchar(100) DEFAULT NULL,
  `templates` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_docs_templates`
--

INSERT INTO `hr_master_docs_templates` (`id`, `template_name`, `templates`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'test', '# Header Level 1\n\n**Pellentesque habitant morbi tristique** senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. _Aenean ultricies mi vitae est_. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, `commodo vitae`, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum  rutrum orci, sagittis tempus lacus enim ac dui. [Donec non enim](#) in turpis pulvinar facilisis. Ut felis.\n\n## Header Level 2\n\n  1. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n  2. Aliquam tincidunt mauris eu risus.\n\n\n> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur  massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.\n\n### Header Level 3\n\n  * Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n  * Aliquam tincidunt mauris eu risus.\n\n```\n#header h1 a {\n  display: block;\n  width: 300px;\n  height: 80px;\n}\n```', 'N', 'Y', '2018-12-28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_email_templates`
--

CREATE TABLE `hr_master_email_templates` (
  `id` int(11) NOT NULL,
  `template_name` varchar(100) DEFAULT NULL,
  `templates` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_email_templates`
--

INSERT INTO `hr_master_email_templates` (`id`, `template_name`, `templates`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'tewerter', 'dgd', 'Y', 'N', '2018-12-28', '2018-12-28 17:12:46'),
(2, 'test', '# Header Level 1\n\n**Pellentesque habitant morbi tristique** senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. _Aenean ultricies mi vitae est_. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, `commodo vitae`, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum  rutrum orci, sagittis tempus lacus enim ac dui. [Donec non enim](#) in turpis pulvinar facilisis. Ut felis.\n\n## Header Level 2\n\n  1. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n  2. Aliquam tincidunt mauris eu risus.\n\n\n> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur  massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.\n\n### Header Level 3\n\n  * Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n  * Aliquam tincidunt mauris eu risus.\n\n```\n#header h1 a {\n  display: block;\n  width: 300px;\n  height: 80px;\n}\n```', 'N', 'Y', '2018-12-28', '2018-12-28 17:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_expenses`
--

CREATE TABLE `hr_master_expenses` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `place_of_visit` varchar(100) DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_expenses_claim_rules`
--

CREATE TABLE `hr_master_expenses_claim_rules` (
  `id` int(11) NOT NULL,
  `claim_rules` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_expenses_details`
--

CREATE TABLE `hr_master_expenses_details` (
  `id` int(11) NOT NULL,
  `expenses_id` int(11) DEFAULT NULL,
  `expenses_desc` text DEFAULT NULL,
  `expenses_type` varchar(100) DEFAULT NULL,
  `expenses_amt` varchar(100) DEFAULT NULL,
  `expenses_doc` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_expenses_reimbursement`
--

CREATE TABLE `hr_master_expenses_reimbursement` (
  `id` int(11) NOT NULL,
  `reimbursement` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_grade`
--

CREATE TABLE `hr_master_grade` (
  `id` int(11) NOT NULL,
  `grade_name` varchar(100) DEFAULT NULL,
  `leave_rule_id` varchar(255) DEFAULT NULL,
  `late_rule_id` int(11) DEFAULT NULL,
  `overtime_rule_id` int(11) DEFAULT NULL,
  `work_shift_id` int(11) DEFAULT NULL,
  `min_salary` int(11) DEFAULT NULL,
  `max_salary` int(11) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_grade`
--

INSERT INTO `hr_master_grade` (`id`, `grade_name`, `leave_rule_id`, `late_rule_id`, `overtime_rule_id`, `work_shift_id`, `min_salary`, `max_salary`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'A3', NULL, NULL, NULL, NULL, 0, 0, 'Y', 'N', '2018-12-20', '2018-12-20 14:04:45'),
(5, 'Dispatcher salary', '1,2,3', 0, 2, 0, 120000, 240000, 'N', 'Y', '2018-12-29', '2020-03-18 16:47:12'),
(6, 'D', '1,2', 3, 2, 4, 100, 200, 'Y', 'N', '2019-04-09', '0000-00-00 00:00:00'),
(7, 'E', '1,2', 2, 2, 5, 120, 220, 'Y', 'N', '2019-04-09', '0000-00-00 00:00:00'),
(9, 'G', '1,2', 2, 2, 5, 1, 2, 'Y', 'N', '2019-04-09', '0000-00-00 00:00:00'),
(10, 'B', '1,2', 3, 2, 4, 9000, 17000, 'N', 'Y', '2019-07-07', '2019-07-15 20:49:35'),
(11, 'C', '1,2', 0, 4, 5, 6000, 8000, 'N', 'Y', '2019-07-14', '2020-03-18 13:05:40'),
(12, 'D', '1,2', 2, 4, 4, 9000, 20000, 'N', 'Y', '2019-07-15', '0000-00-00 00:00:00'),
(19, 'F', '1,2', 5, 3, 4, 100000, 500000, 'N', 'Y', '2019-12-11', '2019-12-18 15:27:22'),
(20, 'H', '1,2', 0, 0, 11, 20000, 90000, 'N', 'Y', '2019-12-18', '2020-07-13 12:07:07'),
(21, 'Manager Salary', '1,2,3', 1, 5, NULL, 300000, 500000, 'N', 'Y', '2020-03-05', '2020-03-19 17:32:06'),
(22, 'Driver Salary', '', 0, 0, NULL, 120000, 180000, 'N', 'Y', '2020-03-14', '2020-04-11 10:08:30'),
(23, 'Labor Salary (60k-3L)', '1,2,3', 1, 3, NULL, 60000, 300000, 'N', 'Y', '2020-03-17', '2020-03-31 11:14:31'),
(24, 'Supervisor Salary', '', 1, 5, NULL, 360000, 420000, 'N', 'Y', '2020-03-18', '2020-03-18 15:47:42'),
(25, 'Accountant salary', '1,2,3', 1, 2, NULL, 96000, 420000, 'N', 'Y', '2020-03-18', '2020-03-18 16:46:17'),
(26, 'Advocate salary', '1,2,3', 1, 4, NULL, 300000, 480000, 'N', 'Y', '2020-03-18', '2020-03-18 16:44:57'),
(27, '1a', '1,2', 1, 2, NULL, 120000, 180000, 'N', 'Y', '2020-03-25', '0000-00-00 00:00:00'),
(28, '1A', '1,2', 1, 2, NULL, 240000, 480000, 'Y', 'N', '2020-03-25', '2020-03-25 11:37:13'),
(29, 'New Test', '1,2,3', 1, 10, NULL, 220000, 650000, 'N', 'Y', '2020-04-02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_gratuity_formula`
--

CREATE TABLE `hr_master_gratuity_formula` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `based_on` varchar(100) DEFAULT NULL,
  `based_on_1` varchar(100) NOT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `operator_1` varchar(100) NOT NULL,
  `day` varchar(50) DEFAULT NULL,
  `no_of_year` varchar(50) DEFAULT NULL,
  `fixed_value` varchar(20) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_gratuity_formula`
--

INSERT INTO `hr_master_gratuity_formula` (`id`, `type`, `based_on`, `based_on_1`, `operator`, `operator_1`, `day`, `no_of_year`, `fixed_value`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'Resignation', 'Basic Salary', 'DA', '*', '+', NULL, 'Tenure of service completed in the company', '15/26', 'N', 'Y', '2020-01-02', '2020-01-03 11:24:07'),
(2, 'Termination', 'Basic Salary', 'DA', '*', '+', NULL, 'Tenure of service completed in the company', '15/26', 'N', 'Y', '2020-01-03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_holidays`
--

CREATE TABLE `hr_master_holidays` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `holiday_name` varchar(100) DEFAULT NULL,
  `holiday_start_date` date DEFAULT NULL,
  `holiday_end_date` date DEFAULT NULL,
  `holiday_image` varchar(100) DEFAULT NULL,
  `holiday_type` varchar(100) DEFAULT NULL,
  `holiday_off_type` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_holidays`
--

INSERT INTO `hr_master_holidays` (`id`, `organization_id`, `holiday_name`, `holiday_start_date`, `holiday_end_date`, `holiday_image`, `holiday_type`, `holiday_off_type`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 1, 'New Year', '2020-01-01', '2020-01-01', '', 'Regular', 'Full Day', 'N', 'Y', '2020-04-23', '0000-00-00 00:00:00'),
(2, 1, 'Netaji Birthday', '2020-01-23', '2020-01-23', '', 'Regular', 'Full Day', 'N', 'Y', '2020-04-23', '0000-00-00 00:00:00'),
(0, 1, 'Aman', '2023-06-07', '2023-06-08', '1686137649607398618.JPG', 'Regular', 'Full Day', 'N', 'Y', '2023-06-07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_holidays_location`
--

CREATE TABLE `hr_master_holidays_location` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `master_holiday_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_holidays_location`
--

INSERT INTO `hr_master_holidays_location` (`id`, `organization_id`, `master_holiday_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 1, 2),
(4, 4, 2),
(0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_late_rules`
--

CREATE TABLE `hr_master_late_rules` (
  `id` int(11) NOT NULL,
  `grade_id` text NOT NULL,
  `dept_id` text NOT NULL,
  `rule_name` varchar(100) DEFAULT NULL,
  `no_of_occu_allowed` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `occurrence_type` varchar(100) NOT NULL,
  `include` text DEFAULT NULL,
  `deduction_apply` enum('Y','N') NOT NULL DEFAULT 'N',
  `leave_type` text DEFAULT NULL,
  `nos` varchar(50) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_late_rules`
--

INSERT INTO `hr_master_late_rules` (`id`, `grade_id`, `dept_id`, `rule_name`, `no_of_occu_allowed`, `type`, `occurrence_type`, `include`, `deduction_apply`, `leave_type`, `nos`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, '23', '40', '4 late cut one CL (labour salary-First Occurence)', '4', 'Continuous', 'First Occurence', '', 'Y', '1', '1', 'N', 'Y', '2020-01-13', '2020-04-16 17:36:01'),
(2, '23', '40', '3 late cut one CL (labour salary-after first occurence)', '3', 'Continuous', 'After First Occurence', '', 'Y', '1', '1', 'N', 'Y', '2020-01-13', '2020-04-16 17:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_leave`
--

CREATE TABLE `hr_master_leave` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `leave_start_date` date DEFAULT NULL,
  `leave_end_date` date DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `leave_type` varchar(100) DEFAULT NULL,
  `reason_for_leave` text DEFAULT NULL,
  `leave_status` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_leave_rules`
--

CREATE TABLE `hr_master_leave_rules` (
  `id` int(11) NOT NULL,
  `rule_name` varchar(100) DEFAULT NULL,
  `encahasable` enum('Yes','No') NOT NULL DEFAULT 'No',
  `encahasable_type` varchar(100) NOT NULL,
  `encahasable_value` varchar(100) NOT NULL,
  `carried_forward` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `carried_forward_type` varchar(100) NOT NULL,
  `carriedforward_value` varchar(100) NOT NULL,
  `credit_month` varchar(100) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `period_day` varchar(50) DEFAULT NULL,
  `period_month` varchar(100) DEFAULT NULL,
  `is_entitlement_situational` enum('Yes','No') NOT NULL DEFAULT 'No',
  `status` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `applicable_for` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_leave_rules`
--

INSERT INTO `hr_master_leave_rules` (`id`, `rule_name`, `encahasable`, `encahasable_type`, `encahasable_value`, `carried_forward`, `carried_forward_type`, `carriedforward_value`, `credit_month`, `unit`, `period_day`, `period_month`, `is_entitlement_situational`, `status`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `applicable_for`) VALUES
(1, 'Casual Leave (CL)', 'Yes', 'Fixed', '', 'Yes', 'Maxlimit', '12', 'Yearly', '12', '1', 'January', 'Yes', 'Yes', 'N', 'Y', '2020-01-28', '2020-05-08 18:36:22', 'Provisional,Permanent'),
(2, 'Privilege Leave (PL)', 'No', '', '', 'No', '', '', 'Monthly', '1', '1', '', 'Yes', 'Yes', 'N', 'Y', '2020-01-28', '2020-05-08 18:36:09', 'Provisional,Permanent'),
(3, 'Half Casual Leave (CL)', 'No', '', '', 'No', '', '', 'Yearly', '1', '1', 'January', 'Yes', 'Yes', 'N', 'Y', '2020-03-16', '2020-05-08 18:36:33', 'Provisional,Permanent');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_lop`
--

CREATE TABLE `hr_master_lop` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `based_on` varchar(100) DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `operator_1` varchar(10) NOT NULL,
  `loss_day` varchar(100) DEFAULT NULL,
  `days_type` varchar(100) DEFAULT NULL,
  `fixed_days` varchar(100) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_lop`
--

INSERT INTO `hr_master_lop` (`id`, `grade_id`, `based_on`, `operator`, `operator_1`, `loss_day`, `days_type`, `fixed_days`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 10, 'Gross Salary', '*', '/', 'Loss of Pay Days', 'calendar day basis', '', 'N', 'Y', '2020-01-03', '0000-00-00 00:00:00'),
(2, 11, 'Gross Salary', '*', '/', 'Loss of Pay Days', 'fixed number of days basis', '26', 'N', 'Y', '2020-01-03', '0000-00-00 00:00:00'),
(3, 23, 'Gross Salary', '*', '/', 'Loss of Pay Days', 'fixed number of days basis', '30', 'N', 'Y', '2020-03-20', '2020-03-27 16:01:03'),
(4, 23, 'Gross Salary', '*', '/', 'Loss of Pay Days', 'calendar day basis', '', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(5, 21, 'Gross Salary', '*', '/', 'Loss of Pay Days', 'calendar day basis', '', 'N', 'N', '2020-03-23', '2020-03-23 12:02:08'),
(6, 21, 'Gross Salary', '*', '/', 'Loss of Pay Days', 'fixed number of days basis', '30', 'Y', 'N', '2020-03-25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_overtime_rules`
--

CREATE TABLE `hr_master_overtime_rules` (
  `id` int(11) NOT NULL,
  `overtime_name` varchar(100) DEFAULT NULL,
  `overtime_type` varchar(100) DEFAULT NULL,
  `component` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  `multiply_by` float(10,2) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `hour_take_leave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_overtime_rules`
--

INSERT INTO `hr_master_overtime_rules` (`id`, `overtime_name`, `overtime_type`, `component`, `day`, `hour`, `multiply_by`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `hour_take_leave`) VALUES
(2, 'test', 'Normal', 3, 15, 7, 8.76, 'N', 'N', '2019-03-25', '0000-00-00 00:00:00', ''),
(3, 'Midnight Shift', 'Weekend', 3, 2, 5, 4.00, 'Y', 'N', '2019-04-10', '0000-00-00 00:00:00', ''),
(4, 'test2 ', 'Normal', 3, 1, 2, 500.00, 'N', 'N', '2019-05-21', '0000-00-00 00:00:00', ''),
(5, 'KPLTest3', 'Normal', 3, 1, 1, 1.00, 'N', 'N', '2019-07-14', '0000-00-00 00:00:00', ''),
(6, 'production wise overtime calculate 1pcs/200rs(labour formula 2)', 'Special', 13, 0, 1, 200.00, 'N', 'Y', '2020-03-23', '2020-04-07 17:08:28', ''),
(7, 'production wise overtime calculate 1pcs/200rs', 'Normal', 29, 0, 1, 200.00, 'Y', 'N', '2020-03-25', '0000-00-00 00:00:00', ''),
(8, 'production wise overtime calculate 1pcs/200rs', 'Normal', 30, 0, 1, 200.00, 'Y', 'N', '2020-03-25', '0000-00-00 00:00:00', ''),
(9, 'Labour overtime rule', 'Normal', 33, 1, 0, 0.00, 'Y', 'N', '2020-03-25', '2020-03-27 16:54:30', ''),
(10, 'New Test', 'Normal', 3, 1, 12, 2.00, 'N', 'N', '2020-04-02', '0000-00-00 00:00:00', '6'),
(11, 'OFF DAY WORKING(labour formula 1)', 'Normal', 25, 1, 0, 1000.00, 'N', 'Y', '2020-04-03', '2020-04-07 17:08:06', '1'),
(12, 'Test test', 'Public Holiday', 3, 1, 6, 2.00, 'N', 'Y', '2020-04-10', '2020-04-10 13:40:38', '4');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_quali_educations`
--

CREATE TABLE `hr_master_quali_educations` (
  `id` int(11) NOT NULL,
  `level_name` varchar(100) DEFAULT NULL,
  `is_mandatory` enum('Yes','No') NOT NULL,
  `mandatory_grade` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_quali_educations`
--

INSERT INTO `hr_master_quali_educations` (`id`, `level_name`, `is_mandatory`, `mandatory_grade`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, '10', 'No', 'F', 'Y', 'N', '2018-12-20', '2019-01-28 18:11:18'),
(2, '12th', 'No', 'E', 'Y', 'N', '2018-12-20', '2019-01-28 18:11:36'),
(3, 'Graduate', 'No', 'B', 'N', 'Y', '2018-12-20', '2019-01-28 18:11:41'),
(4, 'Engineering', 'No', 'A', 'N', 'Y', '2019-01-28', '2019-05-22 15:06:28'),
(5, 'Master', 'No', 'A', 'N', 'Y', '2019-04-08', '0000-00-00 00:00:00'),
(6, 'PG', 'No', 'A', 'N', 'Y', '2019-04-08', '2019-05-21 11:35:35'),
(7, 'Bachelor', 'Yes', 'A', 'Y', 'N', '2019-04-13', '2019-05-21 11:35:47'),
(8, 'MBA-BD', 'Yes', 'A', 'N', 'Y', '2019-07-14', '0000-00-00 00:00:00'),
(9, 'IT Product Development', 'Yes', 'A', 'N', 'Y', '2019-07-15', '0000-00-00 00:00:00'),
(10, 'DRIVER', 'Yes', 'LICENCE', 'N', 'Y', '2020-03-14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_quali_licence`
--

CREATE TABLE `hr_master_quali_licence` (
  `id` int(11) NOT NULL,
  `licence_name` varchar(100) DEFAULT NULL,
  `is_mandatory` enum('Yes','No') NOT NULL,
  `mandatory_grade` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_quali_licence`
--

INSERT INTO `hr_master_quali_licence` (`id`, `licence_name`, `is_mandatory`, `mandatory_grade`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, '4', 'No', '', 'N', 'N', '2018-12-20', '0000-00-00 00:00:00'),
(2, '5', 'No', '', 'Y', 'N', '2018-12-20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_quali_membership`
--

CREATE TABLE `hr_master_quali_membership` (
  `id` int(11) NOT NULL,
  `membership_name` varchar(100) DEFAULT NULL,
  `is_mandatory` enum('Yes','No') NOT NULL,
  `mandatory_grade` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_quali_membership`
--

INSERT INTO `hr_master_quali_membership` (`id`, `membership_name`, `is_mandatory`, `mandatory_grade`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'erty23', 'No', '', 'Y', 'N', '2018-12-20', '2018-12-20 13:34:34'),
(2, 'wer', 'No', '', 'N', 'Y', '2018-12-20', '0000-00-00 00:00:00'),
(3, 'CCFC', 'No', 'yes', 'N', 'Y', '2018-12-28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_quali_skill`
--

CREATE TABLE `hr_master_quali_skill` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_quali_skill`
--

INSERT INTO `hr_master_quali_skill` (`id`, `skill_name`, `description`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'sdf222', 'sadf', 'Y', 'N', '2018-12-20', '2018-12-20 12:50:50'),
(2, 'df', 'we', 'Y', 'N', '2018-12-20', '0000-00-00 00:00:00'),
(3, 'Heavy Labor', 'Heavy Labor', 'Y', 'N', '2018-12-20', '2019-01-28 18:04:09'),
(4, '455643', '3456', 'Y', 'N', '2018-12-20', '0000-00-00 00:00:00'),
(5, 'Heavy Lifting', 'Heavy Lifting', 'N', 'Y', '2018-12-20', '2019-04-16 12:24:39'),
(6, '', '', 'Y', 'N', '2018-12-20', '0000-00-00 00:00:00'),
(7, 'Manual Dexterity', 'Manual Dexterity', 'N', 'Y', '2018-12-20', '2019-01-28 18:04:34'),
(8, 'Measuring', 'Measuring', 'N', 'Y', '2019-01-12', '2019-01-28 18:04:46'),
(9, 'Safety', 'Safety', 'N', 'Y', '2019-01-24', '2019-01-28 18:05:21'),
(10, 'hf', 'gjfj', 'Y', 'N', '2019-01-25', '0000-00-00 00:00:00'),
(11, 'WEB DEVELOPMENT ', 'Able to work on development tools like PHP  J QUERY JS', 'N', 'Y', '2019-05-20', '2019-05-20 13:02:26'),
(12, 'UI / UX DESIGNER ', 'Able to do PSD, HTML5', 'N', 'Y', '2019-05-20', '2019-05-20 13:06:10'),
(13, 'PROJECT MANAGER ', 'Able to manage & deliver the project ', 'N', 'Y', '2019-05-20', '0000-00-00 00:00:00'),
(14, 'IT Product Development', 'All Information Technology related products will be developed under his supervision.', 'N', 'Y', '2019-07-15', '0000-00-00 00:00:00'),
(15, 'Heavy Vehicle Driver', '5 YEARS DRIVEING', 'N', 'Y', '2020-03-14', '2020-03-14 14:51:30'),
(16, 'Quality Analyst', 'Testing Purpose', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(17, 'Quality Analyst', 'Testing Purpose', 'Y', 'N', '2020-03-16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_rec_candidates`
--

CREATE TABLE `hr_master_rec_candidates` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(225) DEFAULT NULL,
  `email_id` varchar(225) DEFAULT NULL,
  `phone_no_primary` varchar(100) DEFAULT NULL,
  `phone_no_secondary` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `job_opening_no` int(11) DEFAULT NULL COMMENT 'id of HR_master_rec_job_opening',
  `address_present` text DEFAULT NULL,
  `address_permanent` text DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `experience_year` varchar(50) DEFAULT NULL,
  `highest_qualification` varchar(100) DEFAULT NULL,
  `current_employer` varchar(150) DEFAULT NULL,
  `current_salary_package` varchar(225) DEFAULT NULL,
  `expected_salary_package` varchar(225) DEFAULT NULL,
  `skill_sets` varchar(225) DEFAULT NULL,
  `candidate_status` varchar(100) DEFAULT NULL,
  `candidate_source` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_rec_candidates_attachments`
--

CREATE TABLE `hr_master_rec_candidates_attachments` (
  `id` int(11) NOT NULL,
  `rec_candidate_id` int(11) DEFAULT NULL,
  `doc_name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_rec_candidates_educational_details`
--

CREATE TABLE `hr_master_rec_candidates_educational_details` (
  `id` int(11) NOT NULL,
  `rec_candidate_id` int(11) DEFAULT NULL,
  `institute` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `duration_start` varchar(100) DEFAULT NULL,
  `duration_end` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_rec_candidates_experience`
--

CREATE TABLE `hr_master_rec_candidates_experience` (
  `id` int(11) NOT NULL,
  `rec_candidate_id` int(11) DEFAULT NULL,
  `occupation_title` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `job_summary` text DEFAULT NULL,
  `duration_start` varchar(100) DEFAULT NULL,
  `duration_end` varchar(100) DEFAULT NULL,
  `current_employed` enum('Y','N') NOT NULL DEFAULT 'N',
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_rec_interviews`
--

CREATE TABLE `hr_master_rec_interviews` (
  `id` int(11) NOT NULL,
  `int_date` date DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `company_for` varchar(100) DEFAULT NULL,
  `post` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `interviewer` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `mail_candidate` enum('Y','N') NOT NULL DEFAULT 'N',
  `mail_interviewer` enum('Y','N') NOT NULL DEFAULT 'N',
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_rec_job_opening`
--

CREATE TABLE `hr_master_rec_job_opening` (
  `id` int(11) NOT NULL,
  `position_title` varchar(100) DEFAULT NULL,
  `assign_recruiter` varchar(100) DEFAULT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `target_date` date DEFAULT NULL,
  `opening_status` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `vacancies_no` varchar(50) DEFAULT NULL,
  `salary_package` varchar(100) DEFAULT NULL,
  `work_experience` varchar(50) DEFAULT NULL,
  `Ac_manager` varchar(100) DEFAULT NULL,
  `job_type` varchar(100) DEFAULT NULL,
  `date_opened` date DEFAULT NULL,
  `other_info` text DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `requirement` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_req_candidates`
--

CREATE TABLE `hr_master_req_candidates` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(225) DEFAULT NULL,
  `email_id` varchar(225) DEFAULT NULL,
  `phone_no_primary` varchar(100) DEFAULT NULL,
  `phone_no_secondary` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `job_opening_no` int(11) DEFAULT NULL COMMENT 'id of HR_master_rec_job_opening',
  `address_present` text DEFAULT NULL,
  `address_permanent` text DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `experience_year` varchar(50) DEFAULT NULL,
  `highest_qualification` varchar(100) DEFAULT NULL,
  `current_employer` varchar(150) DEFAULT NULL,
  `current_salary_package` varchar(225) DEFAULT NULL,
  `expected_salary_package` varchar(225) DEFAULT NULL,
  `skill_sets` varchar(225) DEFAULT NULL,
  `candidate_status` varchar(100) DEFAULT NULL,
  `candidate_source` varchar(225) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_req_candidates`
--

INSERT INTO `hr_master_req_candidates` (`id`, `candidate_name`, `email_id`, `phone_no_primary`, `phone_no_secondary`, `skype`, `job_opening_no`, `address_present`, `address_permanent`, `job_title`, `experience_year`, `highest_qualification`, `current_employer`, `current_salary_package`, `expected_salary_package`, `skill_sets`, `candidate_status`, `candidate_source`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'renu', 'renu@yopmail.com', '34534', '35645', 'test', 1, 'Diamond Harbour Road', 'Diamond Harbour Road', 'web developer', '3', 'BCA', 'SKETCH', '1.9', '2.5', 'TEST,TEST', 'WORKING', 'test', 'N', 'Y', '2019-01-23', '2019-01-23 17:18:27'),
(2, 'pritam', 'pritam@yopmail.com', '235456', '467546', 'pritam', 1, 'Diamond Harbour Road', 'Diamond Harbour Road', 'web developer', '6', 'BCA', 'SKETCH', '3.9', '4.5', 'TEST,TEST,TEST,TEST', 'WORKING', 'test', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(3, 'renu', 'renu@yopmail.com', '222', '22', 'test', 1, 'Diamond Harbour Road', 'Diamond Harbour Road', 'web developer', '3', 'BCA', 'SKETCH', '1.9', '2.5', 'TEST,TEST', 'WORKING', 'test', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(4, 'renu', 'test@yopmail.com', '57456', '456745', 'test', 1, 'dfghd', 'yrtyty', 'rtyrt', '6', 'BCA', 'SKETCH', '1.9', '2.5', 'TEST,TEST', 'WORKING', 'test', 'N', 'Y', '2019-01-23', '2019-01-23 18:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_req_candidates_attachments`
--

CREATE TABLE `hr_master_req_candidates_attachments` (
  `id` int(11) NOT NULL,
  `rec_candidate_id` int(11) DEFAULT NULL,
  `doc_name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_req_candidates_attachments`
--

INSERT INTO `hr_master_req_candidates_attachments` (`id`, `rec_candidate_id`, `doc_name`, `image`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(4, 1, '1', NULL, 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(5, 2, 'test', NULL, 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(6, 3, '2', NULL, 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(7, 4, 'test pic', '1548249927_file_sample.pdf', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_req_candidates_educational_details`
--

CREATE TABLE `hr_master_req_candidates_educational_details` (
  `id` int(11) NOT NULL,
  `rec_candidate_id` int(11) DEFAULT NULL,
  `institute` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `duration_start` varchar(100) DEFAULT NULL,
  `duration_end` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_req_candidates_educational_details`
--

INSERT INTO `hr_master_req_candidates_educational_details` (`id`, `rec_candidate_id`, `institute`, `subject`, `degree`, `duration_start`, `duration_end`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(4, 1, '1', '1', '1', '2019-01-01', '2019-01-10', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(5, 2, 'test 4', 'test 56', 'test 45', '2019-02-04', '2019-02-08', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(6, 3, '2', '2', '2', '2018-12-31', '2019-01-01', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(12, 4, 'test', 'test', 'xcvb', '2019-02-04', '2019-01-23', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_req_candidates_experience`
--

CREATE TABLE `hr_master_req_candidates_experience` (
  `id` int(11) NOT NULL,
  `rec_candidate_id` int(11) DEFAULT NULL,
  `occupation_title` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `job_summary` text DEFAULT NULL,
  `duration_start` varchar(100) DEFAULT NULL,
  `duration_end` varchar(100) DEFAULT NULL,
  `current_employed` enum('Y','N') NOT NULL DEFAULT 'N',
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_req_candidates_experience`
--

INSERT INTO `hr_master_req_candidates_experience` (`id`, `rec_candidate_id`, `occupation_title`, `company`, `job_summary`, `duration_start`, `duration_end`, `current_employed`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(6, 1, '1', '1', '1', '2019-01-29', '2019-01-30', 'Y', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(7, 1, '2', '2', '2', '2019-02-04', '2019-02-07', 'N', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(8, 2, 'test 6', 'test 2', '2', '2019-02-04', '2019-02-07', 'N', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(9, 3, 'test 6', '2', '2', '2019-02-04', '2019-02-04', 'N', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00'),
(15, 4, 'test 6', '2', '2', '2019-02-03', '2019-02-08', 'N', 'N', 'Y', '2019-01-23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_req_interviews`
--

CREATE TABLE `hr_master_req_interviews` (
  `id` int(11) NOT NULL,
  `date_set` date DEFAULT NULL,
  `job_opening_no` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `interviewer` varchar(100) DEFAULT NULL,
  `int_date_time` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `mail_candidate` enum('Y','N') NOT NULL DEFAULT 'N',
  `mail_interviewer` enum('Y','N') NOT NULL DEFAULT 'N',
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_req_interviews`
--

INSERT INTO `hr_master_req_interviews` (`id`, `date_set`, `job_opening_no`, `candidate_id`, `interviewer`, `int_date_time`, `location`, `comment`, `mail_candidate`, `mail_interviewer`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, '2019-01-25', 1, 1, 'test', '2019-01-30 14:00:00', 'kolkata', 'test', 'Y', 'N', 'N', 'Y', '2019-01-24', '2019-01-24 12:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_req_job_opening`
--

CREATE TABLE `hr_master_req_job_opening` (
  `id` int(11) NOT NULL,
  `position_title` varchar(100) DEFAULT NULL,
  `assign_recruiter` varchar(100) DEFAULT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `target_date` date DEFAULT NULL,
  `opening_status` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `vacancies_no` varchar(50) DEFAULT NULL,
  `salary_package` varchar(100) DEFAULT NULL,
  `work_experience` varchar(50) DEFAULT NULL,
  `Ac_manager` varchar(100) DEFAULT NULL,
  `job_type` varchar(100) DEFAULT NULL,
  `date_opened` date DEFAULT NULL,
  `other_info` text DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `requirement` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_req_job_opening`
--

INSERT INTO `hr_master_req_job_opening` (`id`, `position_title`, `assign_recruiter`, `industry`, `target_date`, `opening_status`, `location`, `vacancies_no`, `salary_package`, `work_experience`, `Ac_manager`, `job_type`, `date_opened`, `other_info`, `job_description`, `requirement`, `benefits`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'test test', 'test', 'test', '2019-01-10', 'test', 'kolkata', '4', '150000', '1 year', 'test', 'test', '2018-12-31', 'test', 'test', 'test', 'test', 'N', 'Y', '2018-12-31', '2019-01-08 16:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_salary_component`
--

CREATE TABLE `hr_master_salary_component` (
  `id` int(11) NOT NULL,
  `component` varchar(100) DEFAULT NULL,
  `alias` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `mode` varchar(100) DEFAULT NULL,
  `taxable` enum('Yes','No') NOT NULL DEFAULT 'No',
  `fixed` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `pf` enum('Yes','No') NOT NULL DEFAULT 'No',
  `esi` enum('Yes','No') NOT NULL DEFAULT 'No',
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `sequence` int(11) NOT NULL,
  `set_formula` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_salary_component`
--

INSERT INTO `hr_master_salary_component` (`id`, `component`, `alias`, `type`, `mode`, `taxable`, `fixed`, `pf`, `esi`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `sequence`, `set_formula`) VALUES
(2, 'House Rent Allowance', 'House Rent Allowance', 'Earning', 'Monthly', 'No', 'Yes', 'No', 'Yes', 'N', 'Y', '2019-12-19', '2020-03-18 18:08:07', 2, 'No'),
(3, 'Basic Salary', 'Basic Salary', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '2019-12-19 16:37:46', 1, 'No'),
(4, 'TA', 'TA', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '2020-03-19 15:50:11', 3, 'Yes'),
(5, 'DA', 'DA', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '2020-03-24 16:55:48', 4, 'No'),
(6, 'Bonus', 'Bonus', 'Earning', 'Annual', 'No', 'Yes', 'No', 'No', 'N', 'Y', '2019-12-19', '2020-02-20 08:04:52', 7, 'No'),
(7, 'BNS-EARNING', 'BNS-EARNING', 'Earning', 'Monthly', 'No', 'Yes', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 8, 'No'),
(8, 'Children Education Allowance', 'Children Education Allowance', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 9, 'No'),
(9, 'Fixed Allowance', 'Fixed Allowance', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 10, 'No'),
(11, 'Conveyance Allowance', 'Conveyance Allowance', 'Earning', 'Monthly', 'No', 'Yes', 'Yes', 'No', 'N', 'Y', '2019-12-19', '2020-03-30 12:50:26', 11, 'No'),
(12, 'Leave Encashment', 'Leave Encashment', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 12, 'No'),
(13, 'Production Incentive', 'Production Incentive', 'Incentive', 'Adhoc', 'No', 'No', 'Yes', 'No', 'N', 'Y', '2019-12-31', '2019-12-31 15:12:28', 13, 'No'),
(14, 'Holiday Incentive', 'Holiday Incentive', 'Incentive', 'Adhoc', 'No', 'No', 'No', 'No', 'N', 'Y', '2019-12-31', '0000-00-00 00:00:00', 14, 'No'),
(18, 'Deduction2', 'Deduction2', 'Deduction', 'Adhoc', 'Yes', 'Yes', 'Yes', 'No', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 15, 'No'),
(19, 'CONV', 'CONV', 'Earning', 'Monthly', 'No', 'Yes', 'Yes', 'Yes', 'Y', 'N', '2020-02-18', '0000-00-00 00:00:00', 5, 'No'),
(20, 'Special Allowance', 'Special Allowance', 'Earning', 'Monthly', 'No', 'Yes', 'Yes', 'Yes', 'N', 'Y', '2020-02-18', '0000-00-00 00:00:00', 50, 'No'),
(21, 'Deduction', 'Deduction', 'Deduction', 'Adhoc', 'No', 'Yes', 'No', 'No', 'N', 'Y', '2020-02-26', '0000-00-00 00:00:00', 16, 'No'),
(22, 'OT', 'OT', 'Earning', 'Monthly', 'No', 'No', 'No', 'No', 'Y', 'N', '2020-03-05', '0000-00-00 00:00:00', 0, 'No'),
(25, 'Holiday Incentive', 'Holiday Incentive', 'Incentive', 'Annual', 'No', 'No', 'No', 'No', 'N', 'Y', '2020-03-11', '2020-04-17 11:22:36', 49, 'Yes'),
(26, 'Production Incentive', 'Production Incentive', 'Incentive', 'Annual', 'No', 'No', 'No', 'No', 'Y', 'N', '2020-03-11', '2020-03-11 14:22:30', 50, 'Yes'),
(27, 'annually bonus', 'annually bonus', 'Incentive', 'Adhoc', 'No', 'No', 'No', 'No', 'N', 'Y', '2020-03-18', '2020-03-18 18:37:09', 1, 'No'),
(28, 'TDS', 'TDS', 'Deduction', 'Monthly', 'No', 'No', 'No', 'No', 'N', 'Y', '2020-03-19', '0000-00-00 00:00:00', 1, 'No'),
(29, 'monthly hourly over time', 'monthly hourly over time', 'Incentive', 'Adhoc', 'No', 'No', 'No', 'Yes', 'N', 'Y', '2020-03-20', '2020-03-20 15:50:47', 1, 'Yes'),
(30, 'monthly qty.basis over time', 'monthly qty.basis over time', 'Incentive', 'Adhoc', 'No', 'No', 'No', 'Yes', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00', 1, 'Yes'),
(31, 'canteen deductions', 'canteen deductions', 'Deduction', 'Adhoc', 'No', 'Yes', 'No', 'No', 'N', 'Y', '2020-03-20', '2020-03-20 17:01:52', 1, 'No'),
(32, 'salary advance paid', 'salary advance', 'Incentive', 'Adhoc', 'No', 'No', 'No', 'No', 'N', 'Y', '2020-03-20', '2020-04-20 17:50:16', 1, 'No'),
(33, 'Labour overtime head', 'Labour overtime head', 'Reimbursement', 'Monthly', 'No', 'Yes', 'No', 'No', 'N', 'Y', '2020-03-25', '2020-03-27 16:40:26', 1, 'No'),
(34, 'HRA', 'HRA', 'Earning', 'Monthly', 'No', 'Yes', 'Yes', 'Yes', 'N', 'Y', '2020-03-30', '2020-03-30 13:05:10', 2, 'No'),
(35, 'Loan paid', 'Loan paid', 'Deduction', 'Adhoc', 'No', 'No', 'No', 'No', 'N', 'Y', '2020-04-16', '0000-00-00 00:00:00', 1, 'No'),
(36, 'Advance Salary Deducted', 'Advance Salary Deducted', 'Deduction', 'Adhoc', 'No', 'No', 'No', 'No', 'N', 'Y', '2020-04-17', '0000-00-00 00:00:00', 1, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_salary_component_bkup`
--

CREATE TABLE `hr_master_salary_component_bkup` (
  `id` int(11) NOT NULL,
  `component` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `mode` varchar(100) DEFAULT NULL,
  `taxable` enum('Yes','No') NOT NULL DEFAULT 'No',
  `fixed` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `pf` enum('Yes','No') NOT NULL DEFAULT 'No',
  `esi` enum('Yes','No') NOT NULL DEFAULT 'No',
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_salary_component_bkup`
--

INSERT INTO `hr_master_salary_component_bkup` (`id`, `component`, `type`, `mode`, `taxable`, `fixed`, `pf`, `esi`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(3, 'Basic Salary', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-01-28', '2019-03-08 13:07:28'),
(4, 'Allowance', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-01-28', '2019-12-14 12:00:17'),
(5, 'House Rent Allowance', 'Earning', 'Monthly', 'No', 'No', 'No', 'No', 'N', 'Y', '2019-01-28', '2019-07-15 16:21:49'),
(6, 'Misc.Allowance', 'Earning', 'Monthly', 'No', 'No', 'No', 'No', 'Y', 'N', '2019-01-28', '0000-00-00 00:00:00'),
(7, 'Special Allowance', 'Earning', 'Monthly', 'No', 'Yes', 'No', 'No', 'N', 'Y', '2019-03-27', '2019-12-14 12:07:55'),
(8, 'Transport Allowance', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-04-13', '2019-12-14 12:06:19'),
(9, 'Bonus', 'Earning', 'Annual', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-04-15', '2019-12-14 12:05:48'),
(10, 'P Tax ', 'Deduction', 'Monthly', 'No', 'Yes', 'No', 'No', 'Y', 'N', '2019-05-20', '2019-05-20 12:24:38'),
(11, 'ESI ', 'Deduction', 'Monthly', 'No', 'Yes', 'No', 'No', 'Y', 'N', '2019-05-20', '2019-05-20 12:24:18'),
(12, 'D A ', 'Earning', 'Annual', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-05-20', '2019-12-14 12:05:56'),
(13, 'Basic', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-10-16', '2019-12-14 12:05:39'),
(14, 'D A', 'Earning', 'Monthly', 'No', 'Yes', 'No', 'No', 'Y', 'N', '2019-10-17', '0000-00-00 00:00:00'),
(17, 'Deduction', 'Deduction', 'Monthly', 'No', 'No', 'No', 'No', 'N', 'Y', '2019-05-20', '2019-05-20 12:24:38'),
(18, 'Adjustment', 'Earning', 'Monthly', 'No', 'Yes', 'No', 'No', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_salary_component_bkup_17`
--

CREATE TABLE `hr_master_salary_component_bkup_17` (
  `id` int(11) NOT NULL,
  `component` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `mode` varchar(100) DEFAULT NULL,
  `taxable` enum('Yes','No') NOT NULL DEFAULT 'No',
  `fixed` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `pf` enum('Yes','No') NOT NULL DEFAULT 'No',
  `esi` enum('Yes','No') NOT NULL DEFAULT 'No',
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `sequence` int(11) NOT NULL,
  `set_formula` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_salary_component_bkup_17`
--

INSERT INTO `hr_master_salary_component_bkup_17` (`id`, `component`, `type`, `mode`, `taxable`, `fixed`, `pf`, `esi`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `sequence`, `set_formula`) VALUES
(2, 'House Rent Allowance', 'Earning', 'Monthly', 'No', 'No', 'No', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 2, 'No'),
(3, 'Basic Salary', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '2019-12-19 16:37:46', 1, 'No'),
(4, 'Transport Allowance', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 3, 'No'),
(5, 'Travelling Allowance', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 4, 'No'),
(6, 'Bonus', 'Earning', 'Annual', 'No', 'Yes', 'No', 'No', 'N', 'Y', '2019-12-19', '2020-02-20 08:04:52', 7, 'No'),
(7, 'Commission', 'Earning', 'Monthly', 'No', 'Yes', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 8, 'No'),
(8, 'Children Education Allowance', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 9, 'No'),
(9, 'Fixed Allowance', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 10, 'No'),
(11, 'Conveyance Allowance', 'Earning', 'Monthly', 'No', 'No', 'No', 'No', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 11, 'No'),
(12, 'Leave Encashment', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 12, 'No'),
(13, 'Production Incentive', 'Incentive', 'Adhoc', 'No', 'No', 'Yes', 'No', 'N', 'Y', '2019-12-31', '2019-12-31 15:12:28', 13, 'No'),
(14, 'Holiday Incentive', 'Incentive', 'Adhoc', 'No', 'No', 'No', 'No', 'N', 'Y', '2019-12-31', '0000-00-00 00:00:00', 14, 'No'),
(18, 'Deduction2', 'Deduction', 'Adhoc', 'Yes', 'Yes', 'Yes', 'No', 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00', 15, 'No'),
(19, 'Phone', 'Earning', 'Monthly', 'No', 'Yes', 'Yes', 'Yes', 'N', 'Y', '2020-02-18', '0000-00-00 00:00:00', 5, 'No'),
(20, 'Special Allowance', 'Earning', 'Monthly', 'No', 'Yes', 'Yes', 'Yes', 'N', 'Y', '2020-02-18', '0000-00-00 00:00:00', 6, 'No'),
(21, 'Deduction', 'Deduction', 'Adhoc', 'No', 'Yes', 'No', 'No', 'N', 'Y', '2020-02-26', '0000-00-00 00:00:00', 16, 'No'),
(22, 'OT', 'Earning', 'Monthly', 'No', 'No', 'No', 'No', 'Y', 'N', '2020-03-05', '0000-00-00 00:00:00', 0, 'No'),
(23, 'Production Incentive', 'Incentive', 'Annual', 'No', 'No', 'No', 'No', 'N', 'Y', '2019-12-31', '2020-03-11 18:26:09', 13, 'Yes'),
(24, 'Holiday Incentive', 'Incentive', 'Annual', 'No', 'No', 'No', 'No', 'N', 'Y', '2019-12-31', '2020-03-11 18:25:15', 14, 'Yes'),
(25, 'DA', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00', 1, 'No'),
(26, 'DA', 'Deduction', 'Monthly', 'No', 'No', 'Yes', 'No', 'Y', 'N', '2020-03-16', '0000-00-00 00:00:00', 1, 'No'),
(27, 'TA', 'Earning', 'Monthly', 'No', 'No', 'Yes', 'Yes', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00', 1, 'No'),
(28, 'HRA', 'Earning', 'Monthly', 'No', 'Yes', 'No', 'No', 'N', 'Y', '2020-03-16', '2020-03-16 18:30:35', 1, 'No'),
(29, 'CONV', 'Earning', 'Monthly', 'No', 'No', 'No', 'No', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00', 1, 'No'),
(30, 'BNS-EARNING', 'Earning', 'Monthly', 'No', 'No', 'No', 'Yes', 'N', 'Y', '2020-03-16', '2020-03-16 13:19:06', 1, 'No'),
(31, 'BNS-INCENTIVE', 'Incentive', 'Monthly', 'No', 'No', 'No', 'No', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00', 1, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_salary_component_formula`
--

CREATE TABLE `hr_master_salary_component_formula` (
  `id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `component` varchar(100) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `day_type` varchar(100) DEFAULT NULL,
  `day_type_1` varchar(100) DEFAULT NULL,
  `fixed_amount` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_salary_component_formula`
--

INSERT INTO `hr_master_salary_component_formula` (`id`, `component_id`, `component`, `operator`, `day_type`, `day_type_1`, `fixed_amount`) VALUES
(1, 24, '3,20,19', '+,+,+', 'No of Days', 'No of Holidays', '200'),
(2, 23, 'gross_amount', '', 'No of Days', 'No of OverTime Days', ''),
(4, 4, '3,Select', '+,Select', 'Select', 'Select', ''),
(5, 30, 'gross_amount', '', 'No of Days', 'No of OverTime Days', ''),
(6, 29, 'gross_amount', '', 'No of OverTime Days', 'No of OverTime Days', ''),
(7, 25, '3,5', '+,+', 'No of Holidays', 'No of Days', '200');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_salary_structure`
--

CREATE TABLE `hr_master_salary_structure` (
  `id` int(11) NOT NULL,
  `structure_name` varchar(100) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `pf` enum('1','0','','') DEFAULT '0' COMMENT '1=>yes,0=>no',
  `employee_pf_percent` varchar(20) NOT NULL,
  `employer_pf_percent` varchar(20) NOT NULL,
  `employee_pf_amount` float(9,2) NOT NULL,
  `employer_pf_amount` float(9,2) NOT NULL,
  `esi` enum('1','0','','') NOT NULL DEFAULT '0',
  `employee_esi_percent` varchar(100) NOT NULL,
  `employer_esi_percent` varchar(100) NOT NULL,
  `employee_esi_amount` float(9,2) NOT NULL,
  `employer_esi_amount` float(9,2) NOT NULL,
  `ptax` enum('1','0','','') NOT NULL DEFAULT '0',
  `state` varchar(20) NOT NULL,
  `ptax_num` varchar(100) NOT NULL,
  `ptax_amount` float(9,2) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `CTC` float(9,2) NOT NULL,
  `not_part_ctc_component_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_salary_structure`
--

INSERT INTO `hr_master_salary_structure` (`id`, `structure_name`, `grade_id`, `dept_id`, `pf`, `employee_pf_percent`, `employer_pf_percent`, `employee_pf_amount`, `employer_pf_amount`, `esi`, `employee_esi_percent`, `employer_esi_percent`, `employee_esi_amount`, `employer_esi_amount`, `ptax`, `state`, `ptax_num`, `ptax_amount`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `CTC`, `not_part_ctc_component_id`) VALUES
(1, '3Lacks', 5, 3, '1', '12', '12', 26762.00, 26762.00, '1', '0.75', '3.25', 1898.00, 8223.00, '1', 'West Bengal', '12331', 123.00, 'N', 'Y', '2020-02-24', '0000-00-00 00:00:00', 300000.00, ''),
(2, '5 lacks', 5, 3, '1', '12', '12', 40061.00, 40061.00, '1', '0.75', '3.25', 3254.00, 14100.00, '1', 'West Bengal', '12345645', 456.00, 'N', 'Y', '2020-03-11', '0000-00-00 00:00:00', 500000.00, ''),
(5, 'driver', 22, 29, '1', '12', '12', 45610.00, 45610.00, '1', '0.75', '3.25', 3301.00, 14303.00, '1', 'West Bengal', '12113113131', 200.00, 'N', 'Y', '2020-03-17', '0000-00-00 00:00:00', 500000.00, ''),
(6, '50 Thousand', 11, 31, '1', '12', '12', 50438.00, 50438.00, '1', '0.75', '3.25', 3265.00, 14148.00, '1', 'West Bengal', '12113113131', 200.00, 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00', 500000.00, ''),
(7, 'm', 21, 37, '1', '12', '12', 24824.00, 24824.00, '1', '0.75', '3.25', 1641.00, 7113.00, '1', 'West Bengal', 'companyptax1234', 130.00, 'Y', 'N', '2020-03-19', '0000-00-00 00:00:00', 250800.00, ''),
(8, 'manager salary structure', 21, 37, '1', '12', '12', 24824.00, 24824.00, '1', '0.75', '3.25', 1641.00, 7113.00, '1', 'West Bengal', 'companyptax1234', 130.00, 'N', 'Y', '2020-03-19', '0000-00-00 00:00:00', 250800.00, ''),
(9, 'labour 1', 23, 38, '', '12', '12', 0.00, 0.00, '', '0.75', '3.25', 0.00, 0.00, '1', '', '', 0.00, 'Y', 'N', '2020-03-24', '0000-00-00 00:00:00', 120000.00, ''),
(10, 'labour 6k-3;', 23, 40, '', '12', '12', 0.00, 0.00, '', '0.75', '3.25', 0.00, 0.00, '1', '', '', 0.00, 'Y', 'N', '2020-03-31', '0000-00-00 00:00:00', 252000.00, ''),
(11, 'labour 6k-3;', 23, 40, '1', '12', '12', 26239.00, 26239.00, '1', '0.75', '3.25', 1640.00, 7106.00, '1', 'West Bengal', 'company', 130.00, 'Y', 'N', '2020-03-31', '0000-00-00 00:00:00', 252000.00, ''),
(12, 'labour salary structure (test 4 60k-3lL)', 23, 40, '1', '12', '12', 37484.00, 37484.00, '1', '0.75', '3.25', 2343.00, 10152.00, '1', 'West Bengal', 'NaN', 200.00, 'N', 'Y', '2020-04-03', '0000-00-00 00:00:00', 360000.00, ''),
(13, 'months', 5, 6, '', '12', '12', 0.00, 0.00, '', '0.75', '3.25', 0.00, 0.00, '1', '', '', 0.00, 'N', 'Y', '2020-07-13', '0000-00-00 00:00:00', 90000.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_salary_structure_bkup`
--

CREATE TABLE `hr_master_salary_structure_bkup` (
  `id` int(11) NOT NULL,
  `structure_name` varchar(100) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `pf` enum('1','0','','') DEFAULT '0',
  `employee_pf_percent` varchar(20) NOT NULL,
  `employer_pf_percent` varchar(20) NOT NULL,
  `employee_pf_amount` float(9,2) NOT NULL,
  `employer_pf_amount` float(9,2) NOT NULL,
  `esi` enum('1','0','','') NOT NULL DEFAULT '0',
  `employee_esi_percent` varchar(100) NOT NULL,
  `employer_esi_percent` varchar(100) NOT NULL,
  `employee_esi_amount` float(9,2) NOT NULL,
  `employer_esi_amount` float(9,2) NOT NULL,
  `ptax` enum('1','0','','') NOT NULL DEFAULT '0',
  `state` varchar(20) NOT NULL,
  `ptax_num` varchar(100) NOT NULL,
  `ptax_amount` float(9,2) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_salary_structure_bkup`
--

INSERT INTO `hr_master_salary_structure_bkup` (`id`, `structure_name`, `grade_id`, `dept_id`, `pf`, `employee_pf_percent`, `employer_pf_percent`, `employee_pf_amount`, `employer_pf_amount`, `esi`, `employee_esi_percent`, `employer_esi_percent`, `employee_esi_amount`, `employer_esi_amount`, `ptax`, `state`, `ptax_num`, `ptax_amount`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(2, '4re', 2, 3, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'Y', 'N', '2018-12-24', '0000-00-00 00:00:00'),
(3, 'sam', 4, 3, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'Y', 'N', '2019-01-31', '0000-00-00 00:00:00'),
(4, 'testing salary', 3, 3, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'N', '2019-02-06', '2019-02-06 16:03:34'),
(16, 'New Testing Salary', 5, 4, '1', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-03-27', '2019-08-22 10:42:36'),
(17, 'Renu Testing', 2, 4, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-03-28', '0000-00-00 00:00:00'),
(18, 'test', 5, 3, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-04-12', '2019-08-19 14:34:48'),
(19, 'For project manager and garde A', 4, 21, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'Y', 'N', '2019-04-15', '0000-00-00 00:00:00'),
(20, 'Project manager test salary', 4, 21, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-04-15', '0000-00-00 00:00:00'),
(21, 'Sales & marketing', 5, 4, '1', '12', '12', 0.00, 0.00, '0', '', '', 0.00, 0.00, '1', 'Delhi', '', 0.00, 'N', 'Y', '2019-07-11', '0000-00-00 00:00:00'),
(22, 'TEST3', 11, 25, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-07-14', '2019-07-16 12:31:00'),
(23, 'New Testing structure', 5, 4, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-07-15', '0000-00-00 00:00:00'),
(24, 'rrrrr', 11, 25, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-07-15', '2019-07-16 11:02:51'),
(25, 'test1', 5, 3, '1', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-08-20', '0000-00-00 00:00:00'),
(26, 'test12', 5, 4, '1', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-08-20', '0000-00-00 00:00:00'),
(27, 'test13', 10, 3, '1', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-08-20', '0000-00-00 00:00:00'),
(28, 'test14', 5, 3, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-08-20', '0000-00-00 00:00:00'),
(29, 'test15', 10, 4, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-08-20', '0000-00-00 00:00:00'),
(30, 'test16', 10, 4, '1', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-08-20', '0000-00-00 00:00:00'),
(31, 'MIHIR MUKHERJEE', 5, 27, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-10-16', '2019-10-16 13:41:28'),
(32, 'MIHIR MUKHERJEE', 5, 27, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-10-16', '0000-00-00 00:00:00'),
(33, 'Sketch salary for group A', 5, 27, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-10-16', '2019-10-16 16:59:52'),
(34, 'Sketch Enterprise', 5, 3, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-10-16', '2019-10-16 18:17:29'),
(35, 'Sketch Enterprise-B ', 5, 27, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-10-16', '2019-10-17 13:05:14'),
(36, 'Sketch_New_Payroll', 5, 27, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'Y', 'N', '2019-10-17', '2019-10-21 17:22:34'),
(37, 'Sketch_New_Payroll', 5, 27, '', '', '', 0.00, 0.00, '0', '', '', 0.00, 0.00, '0', '', '', 0.00, 'N', 'Y', '2019-10-21', '2019-10-21 17:20:41'),
(59, 'sketch-1234(basic 15000above)', 19, 21, '1', '12', '12', 36000.00, 36000.00, '', '10', '10', 0.00, 0.00, '1', 'Delhi', '123456', 40.00, 'N', 'Y', '2019-12-18', '0000-00-00 00:00:00'),
(63, 'sketch3434', 20, 21, '1', '12', '12', 22200.00, 22200.00, '1', '10', '10', 24620.00, 24620.00, '1', '', '', 0.00, 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00'),
(64, 'Sketch12345', 20, 21, '1', '12', '12', 27000.00, 27000.00, '1', '10', '10', 40500.00, 40500.00, '1', 'Delhi', '123456', 40.00, 'N', 'Y', '2019-12-19', '0000-00-00 00:00:00'),
(65, 'Sketch26', 20, 21, '1', '12', '12', 21600.00, 21600.00, '1', '10', '10', 45440.00, 45440.00, '1', 'Delhi', '123456', 40.00, 'N', 'Y', '2019-12-26', '0000-00-00 00:00:00'),
(66, 'New123', 20, 21, '1', '12', '12', 21600.00, 21600.00, '1', '10', '10', 46610.00, 46610.00, '1', 'West Bengal', '1233', 123.00, 'N', 'Y', '2019-12-30', '0000-00-00 00:00:00'),
(67, 'Anupam Sen', 5, 22, '', '12', '12', 0.00, 0.00, '', '10', '10', 0.00, 0.00, '1', '', '', 0.00, 'N', 'Y', '2020-01-02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_salary_structure_component`
--

CREATE TABLE `hr_master_salary_structure_component` (
  `id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `formula` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_salary_structure_formula`
--

CREATE TABLE `hr_master_salary_structure_formula` (
  `id` int(11) NOT NULL,
  `master_salary_structure_id` int(11) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `operator` varchar(1) DEFAULT NULL,
  `amount` float(9,2) NOT NULL DEFAULT 0.00,
  `base_on` varchar(15) DEFAULT NULL,
  `fixed_amount` float(9,2) NOT NULL DEFAULT 0.00,
  `actual_amount` float(9,2) DEFAULT 0.00,
  `salary_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_master_salary_structure_formula`
--

INSERT INTO `hr_master_salary_structure_formula` (`id`, `master_salary_structure_id`, `component_id`, `operator`, `amount`, `base_on`, `fixed_amount`, `actual_amount`, `salary_type`) VALUES
(1, 1, 3, '*', 30.00, 'CTC', 0.00, 0.00, 'Earning'),
(2, 1, 2, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(3, 1, 4, '*', 5.00, 'CTC', 0.00, 0.00, 'Earning'),
(4, 1, 19, '*', 0.00, 'CTC', 19200.00, 0.00, 'Earning'),
(5, 1, 20, NULL, 0.00, NULL, 98815.00, 0.00, 'Earning'),
(6, 1, 0, '', 0.00, '', 0.00, 0.00, 'Deduction'),
(7, 1, 6, '*', 0.00, 'CTC', 12000.00, 0.00, 'Annual'),
(8, 2, 3, '*', 30.00, 'CTC', 0.00, 0.00, 'Earning'),
(9, 2, 2, '*', 20.00, 'CTC', 0.00, 0.00, 'Earning'),
(10, 2, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(11, 2, 19, '*', 0.00, 'CTC', 19200.00, 0.00, 'Earning'),
(12, 2, 20, NULL, 0.00, NULL, 114639.00, 0.00, 'Earning'),
(13, 2, 0, '', 0.00, '', 0.00, 0.00, 'Deduction'),
(14, 2, 6, '*', 0.00, 'CTC', 12000.00, 0.00, 'Annual'),
(32, 5, 3, '*', 30.00, 'CTC', 0.00, 0.00, 'Earning'),
(33, 5, 2, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(34, 5, 4, '*', 5.00, 'CTC', 0.00, 0.00, 'Earning'),
(35, 5, 5, '*', 7.00, 'CTC', 0.00, 0.00, 'Earning'),
(36, 5, 19, '*', 0.00, 'CTC', 19200.00, 0.00, 'Earning'),
(37, 5, 20, NULL, 0.00, NULL, 150887.00, 0.00, 'Earning'),
(38, 5, 0, '', 0.00, '', 0.00, 0.00, 'Deduction'),
(39, 5, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Annual'),
(40, 6, 3, '*', 5.00, 'CTC', 0.00, 0.00, 'Earning'),
(41, 6, 2, '*', 3.00, 'CTC', 0.00, 0.00, 'Earning'),
(42, 6, 8, '*', 8.00, 'CTC', 0.00, 0.00, 'Earning'),
(43, 6, 7, '*', 0.00, 'CTC', 500.00, 0.00, 'Earning'),
(44, 6, 20, NULL, 0.00, NULL, 354815.00, 0.00, 'Earning'),
(45, 6, 0, '', 0.00, '', 0.00, 0.00, 'Deduction'),
(46, 6, 6, '*', 0.00, 'CTC', 99.00, 0.00, 'Annual'),
(47, 7, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(48, 7, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(49, 7, 4, '*', 20.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(50, 7, 8, '*', 5.00, 'CTC', 0.00, 0.00, 'Earning'),
(51, 7, 2, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(52, 7, 11, '*', 0.00, 'CTC', 36000.00, 0.00, 'Earning'),
(53, 7, 20, NULL, 0.00, NULL, 12859.00, 0.00, 'Earning'),
(54, 7, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Deduction'),
(55, 7, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Annual'),
(56, 8, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(57, 8, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(58, 8, 4, '*', 20.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(59, 8, 2, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(60, 8, 8, '*', 5.00, 'CTC', 0.00, 0.00, 'Earning'),
(61, 8, 11, '*', 0.00, 'CTC', 36000.00, 0.00, 'Earning'),
(62, 8, 20, NULL, 0.00, NULL, 12859.00, 0.00, 'Earning'),
(63, 8, 28, '*', 2.00, 'CTC', 0.00, 0.00, 'Deduction'),
(64, 8, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Annual'),
(65, 9, 3, '*', 50.00, 'CTC', 0.00, 0.00, 'Earning'),
(66, 9, 5, '*', 20.00, 'CTC', 0.00, 0.00, 'Earning'),
(67, 9, 2, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(68, 9, 4, '*', 10.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(69, 9, 11, '*', 0.00, 'CTC', 6000.00, 0.00, 'Earning'),
(70, 9, 9, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(71, 9, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Earning'),
(72, 9, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Deduction'),
(73, 9, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Annual'),
(74, 10, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Earning'),
(75, 10, 20, NULL, 0.00, NULL, 0.00, 0.00, 'Earning'),
(76, 10, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Deduction'),
(77, 10, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Annual'),
(78, 11, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(79, 11, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(80, 11, 4, '*', 15.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(81, 11, 11, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(82, 11, 34, '*', 0.00, 'CTC', 6000.00, 0.00, 'Earning'),
(83, 11, 20, NULL, 0.00, NULL, 59535.00, 0.00, 'Earning'),
(84, 11, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Deduction'),
(85, 11, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Annual'),
(86, 12, 3, '*', 40.00, 'CTC', 0.00, 0.00, 'Earning'),
(87, 12, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(88, 12, 4, '*', 15.00, 'Basic Salary', 0.00, 0.00, 'Earning'),
(89, 12, 11, '*', 0.00, 'CTC', 12000.00, 0.00, 'Earning'),
(90, 12, 34, '*', 0.00, 'CTC', 6000.00, 0.00, 'Earning'),
(91, 12, 20, NULL, 0.00, NULL, 92764.00, 0.00, 'Earning'),
(92, 12, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Deduction'),
(93, 12, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Annual'),
(94, 13, 3, '*', 1.00, 'CTC', 0.00, 0.00, 'Earning'),
(95, 13, 20, NULL, 0.00, NULL, 89100.00, 0.00, 'Earning'),
(96, 13, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Deduction'),
(97, 13, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Annual');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_salary_structure_formula_bkup`
--

CREATE TABLE `hr_master_salary_structure_formula_bkup` (
  `id` int(11) NOT NULL,
  `master_salary_structure_id` int(11) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `operator` varchar(1) DEFAULT NULL,
  `amount` float(9,2) NOT NULL DEFAULT 0.00,
  `base_on` varchar(15) DEFAULT NULL,
  `fixed_amount` float(9,2) NOT NULL DEFAULT 0.00,
  `actual_amount` float(9,2) DEFAULT 0.00,
  `salary_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_master_salary_structure_formula_bkup`
--

INSERT INTO `hr_master_salary_structure_formula_bkup` (`id`, `master_salary_structure_id`, `component_id`, `operator`, `amount`, `base_on`, `fixed_amount`, `actual_amount`, `salary_type`) VALUES
(5, 4, 3, '*', 10.00, 'CTC', 0.00, 0.00, ''),
(6, 4, 5, '-', 7.00, 'Basic Salary', 0.00, 0.00, ''),
(50, 17, 3, '*', 20.00, 'CTC', 0.00, 0.00, ''),
(51, 17, 4, '*', 70.00, 'CTC', 0.00, 0.00, ''),
(52, 17, 5, '*', 10.00, 'CTC', 0.00, 0.00, ''),
(54, 19, 3, '*', 10.00, 'CTC', 0.00, 0.00, ''),
(55, 19, 4, '*', 2.00, 'Basic Salary', 0.00, 0.00, ''),
(56, 19, 7, '*', 0.00, 'CTC', 1200.00, 0.00, ''),
(57, 20, 3, '*', 20.00, 'CTC', 0.00, 0.00, ''),
(58, 20, 4, '*', 10.00, 'Basic Salary', 0.00, 0.00, ''),
(59, 20, 5, '*', 0.00, 'CTC', 390000.00, 0.00, ''),
(60, 21, 3, '*', 50.00, 'CTC', 0.00, 0.00, ''),
(61, 21, 5, '*', 0.00, 'CTC', 250000.00, 0.00, ''),
(63, 23, 3, '*', 60.00, 'CTC', 0.00, 0.00, ''),
(64, 23, 5, '*', 0.00, 'CTC', 200000.00, 0.00, ''),
(73, 22, 3, '*', 50.00, 'CTC', 0.00, 0.00, ''),
(74, 22, 5, '*', 20.00, 'CTC', 0.00, 0.00, ''),
(75, 22, 8, '*', 20.00, 'CTC', 0.00, 0.00, ''),
(76, 22, 7, '*', 0.00, 'CTC', 50000.00, 0.00, ''),
(77, 18, 3, '*', 10.00, 'CTC', 0.00, 0.00, ''),
(78, 18, 4, '*', 2.00, 'Basic Salary', 0.00, 0.00, ''),
(79, 25, 0, '*', 0.00, 'CTC', 0.00, 0.00, ''),
(80, 26, 0, '*', 0.00, 'CTC', 0.00, 0.00, ''),
(81, 27, 0, '*', 0.00, 'CTC', 0.00, 0.00, ''),
(82, 28, 0, '*', 0.00, 'CTC', 0.00, 0.00, ''),
(83, 29, 0, '*', 0.00, 'CTC', 0.00, 0.00, ''),
(84, 30, 0, '*', 0.00, 'CTC', 0.00, 0.00, ''),
(87, 16, 3, '*', 5.00, 'CTC', 0.00, 0.00, ''),
(88, 16, 4, '*', 5.00, 'Basic Salary', 0.00, 0.00, ''),
(107, 31, 3, '*', 10.00, 'CTC', 0.00, 0.00, ''),
(108, 31, 5, '*', 5.00, 'Basic Salary', 0.00, 0.00, ''),
(109, 31, 8, '*', 5.00, 'Basic Salary', 0.00, 0.00, ''),
(110, 32, 3, '*', 10.00, 'CTC', 0.00, 0.00, ''),
(111, 32, 5, '*', 5.00, 'Basic Salary', 0.00, 0.00, ''),
(112, 32, 8, '*', 5.00, 'Basic Salary', 0.00, 0.00, ''),
(117, 33, 3, '*', 10.00, 'CTC', 0.00, 0.00, ''),
(118, 33, 4, '*', 10.00, 'CTC', 0.00, 0.00, ''),
(119, 33, 5, '*', 20.00, 'CTC', 0.00, 0.00, ''),
(120, 33, 8, '*', 60.00, 'CTC', 0.00, 0.00, ''),
(134, 34, 3, '*', 50.00, 'CTC', 0.00, 0.00, ''),
(135, 34, 5, '*', 50.00, 'Basic Salary', 0.00, 0.00, ''),
(136, 34, 8, '*', 50.00, 'Basic Salary', 0.00, 0.00, ''),
(147, 35, 3, '*', 50.00, 'CTC', 0.00, 0.00, ''),
(148, 35, 5, '*', 50.00, 'Basic Salary', 0.00, 0.00, ''),
(149, 35, 8, '*', 50.00, 'Basic Salary', 0.00, 0.00, ''),
(150, 35, 12, '*', 0.00, 'CTC', 10000.00, 0.00, ''),
(249, 37, 3, '*', 50.00, 'CTC', 0.00, 0.00, ''),
(250, 37, 5, '*', 50.00, 'Basic Salary', 0.00, 0.00, ''),
(251, 37, 8, '*', 50.00, 'Basic Salary', 0.00, 0.00, ''),
(252, 37, 12, '*', 20.00, 'CTC', 0.00, 0.00, ''),
(253, 36, 3, '*', 50.00, 'CTC', 0.00, 0.00, ''),
(254, 36, 5, '*', 50.00, 'Basic Salary', 0.00, 0.00, ''),
(255, 36, 8, '*', 50.00, 'Basic Salary', 0.00, 0.00, ''),
(256, 38, 3, '*', 10.00, 'CTC', 0.00, 0.00, ''),
(337, 59, 3, '*', 60.00, 'CTC', 0.00, 0.00, 'Earning'),
(338, 59, 5, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(339, 59, 4, '*', 8.00, 'CTC', 0.00, 0.00, 'Earning'),
(340, 59, 8, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(341, 59, 7, '*', 0.00, 'CTC', 14000.00, 0.00, 'Earning'),
(342, 59, 17, '*', 3.00, 'CTC', 0.00, 0.00, 'Deduction'),
(343, 59, 0, '*', 3.00, 'CTC', 0.00, 0.00, 'Annual'),
(359, 63, 3, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(360, 63, 5, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(361, 63, 4, '*', 15.00, 'CTC', 0.00, 0.00, 'Earning'),
(362, 63, 8, '*', 10.00, 'CTC', 0.00, 0.00, 'Earning'),
(363, 63, 7, '*', 0.00, 'CTC', 1200.00, 0.00, 'Earning'),
(364, 63, 18, NULL, 0.00, NULL, 196980.00, 0.00, 'Earning'),
(365, 63, 17, '*', 2.00, 'CTC', 0.00, 0.00, 'Deduction'),
(366, 63, 9, '*', 2.00, 'CTC', 0.00, 0.00, 'Annual'),
(367, 64, 3, '*', 45.00, 'CTC', 0.00, 0.00, 'Earning'),
(368, 64, 2, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(369, 64, 4, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(370, 64, 6, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(371, 64, 18, NULL, 0.00, NULL, 27500.00, 0.00, 'Earning'),
(372, 64, 0, '', 0.00, '', 0.00, 0.00, 'Deduction'),
(373, 64, 0, '', 0.00, '', 0.00, 0.00, 'Annual'),
(374, 65, 3, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(375, 65, 2, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(376, 65, 4, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(377, 65, 5, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(378, 65, 18, NULL, 0.00, NULL, 192960.00, 0.00, 'Earning'),
(379, 65, 0, '', 0.00, '', 0.00, 0.00, 'Deduction'),
(380, 65, 0, '', 0.00, '', 0.00, 0.00, 'Annual'),
(381, 66, 3, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(382, 66, 2, '*', 15.00, 'CTC', 0.00, 0.00, 'Earning'),
(383, 66, 5, '*', 12.00, 'CTC', 0.00, 0.00, 'Earning'),
(384, 66, 18, NULL, 0.00, NULL, 236790.00, 0.00, 'Earning'),
(385, 66, 0, '', 0.00, '', 0.00, 0.00, 'Deduction'),
(386, 66, 0, '', 0.00, '', 0.00, 0.00, 'Annual'),
(387, 67, 0, '*', 0.00, 'CTC', 0.00, 0.00, 'Earning'),
(388, 67, 18, NULL, 0.00, NULL, 0.00, 0.00, 'Earning'),
(389, 67, 0, '', 0.00, '', 0.00, 0.00, 'Deduction'),
(390, 67, 0, '', 0.00, '', 0.00, 0.00, 'Annual');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_travel_rules`
--

CREATE TABLE `hr_master_travel_rules` (
  `id` int(11) NOT NULL,
  `travel_rules` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_wfh_rules`
--

CREATE TABLE `hr_master_wfh_rules` (
  `id` int(11) NOT NULL,
  `grade_id` varchar(255) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `limit` varchar(100) DEFAULT NULL,
  `enanle_type` varchar(100) NOT NULL,
  `period_month` varchar(100) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `deduction_apply` enum('Y','N') NOT NULL DEFAULT 'N',
  `leave_type` text NOT NULL,
  `nos` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `max_per_month` int(11) NOT NULL,
  `max_hrs_per_month` int(11) NOT NULL,
  `max_hrs_apply_per_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_wfh_rules`
--

INSERT INTO `hr_master_wfh_rules` (`id`, `grade_id`, `dept_id`, `limit`, `enanle_type`, `period_month`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `deduction_apply`, `leave_type`, `nos`, `type`, `max_per_month`, `max_hrs_per_month`, `max_hrs_apply_per_day`) VALUES
(1, '23', '40', '3', 'employee_enable_wfh', 'Janaury', 'N', 'Y', '2020-01-24', '2020-04-22 18:18:04', 'Y', '1,2,3', '1', 'wfh', 0, 0, 0),
(2, '5,11', '4,21', '6', 'all_employee', 'Janaury', 'Y', 'N', '2020-01-28', '2020-02-05 08:41:58', 'N', '', '', '', 0, 0, 0),
(3, '23', '40', '', '', '', 'N', 'Y', '2020-04-16', '2020-04-22 18:18:34', '', '', '', 'personal', 3, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_work_shift`
--

CREATE TABLE `hr_master_work_shift` (
  `id` int(11) NOT NULL,
  `work_shift_name` varchar(100) DEFAULT NULL,
  `color` varchar(100) NOT NULL,
  `weekoff` varchar(255) NOT NULL,
  `rule_1` varchar(100) NOT NULL,
  `work_hour_start_1` varchar(100) DEFAULT NULL,
  `work_hour_end_1` varchar(100) DEFAULT NULL,
  `work_hour_duration_1` varchar(100) DEFAULT NULL,
  `rule_2` varchar(100) NOT NULL,
  `work_hour_start_2` varchar(100) NOT NULL,
  `work_hour_end_2` varchar(100) NOT NULL,
  `work_hour_duration_2` varchar(100) NOT NULL,
  `work_hour_grace` varchar(100) DEFAULT NULL,
  `off_day` varchar(255) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_work_shift`
--

INSERT INTO `hr_master_work_shift` (`id`, `work_shift_name`, `color`, `weekoff`, `rule_1`, `work_hour_start_1`, `work_hour_end_1`, `work_hour_duration_1`, `rule_2`, `work_hour_start_2`, `work_hour_end_2`, `work_hour_duration_2`, `work_hour_grace`, `off_day`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(11, 'Default Shift 10:00', '', 'rule_1', 'rule_1', '10:00', '19:00', '9', 'rule_2', '12:00', '14:00', '2.00', '00:15', '', 'Y', 'N', '2020-01-29', '2020-03-30 10:59:12'),
(12, 'Default Shift 11:00', '', 'rule_1', 'rule_1', '11:00', '20:00', '9', 'rule_2', '11:00', '16:00', '5.00', '00:15', '', 'N', 'Y', '2020-02-05', '2020-06-19 19:17:06'),
(13, 'Day 6am-2pm', '', '', '', '08:00', '14:00', '8 hours', '', '', '', '', '00:15', '', 'Y', 'N', '2020-03-05', '2020-03-05 17:55:16'),
(14, 'Day&Night 2pm-10pm', '', 'rule_1', 'rule_1', '14:00', '23:00', '9:0', 'rule_2', '12:00', '14:00', '2.00', '00:15', '', 'Y', 'N', '2020-03-05', '2020-03-30 10:56:24'),
(15, 'Night 10pm-6am', '', 'rule_1', 'rule_1', '22:00', '06:00', '8', 'rule_2', '22:00', '03:00', '5.00', '00:30', '', 'Y', 'N', '2020-03-05', '2020-05-14 15:16:12'),
(16, 'Half Day', '', 'rule_1', 'rule_1', '10:00', '16:00', '06', 'rule_2', '10:00', '16:00', '6.00', '00:15', '', 'Y', 'N', '2020-03-16', '2020-05-14 15:14:20'),
(17, 'dfdfdfd', '', '', '', '12:00', '12:00', '9', '', '', '', '', '00:15', '', 'Y', 'N', '2020-03-16', '0000-00-00 00:00:00'),
(18, 'day shift 09am-05pm', '', '', '', '10:00', '19:00', '9', '', '', '', '', '10:15', '', 'Y', 'N', '2020-03-18', '2020-03-18 17:25:41'),
(19, 'Default Shift 10:00', '', 'rule_2', 'rule_1', '10:00', '19:00', '9', 'rule_2', '10:00', '16:00', '6:0', '00:15', '', 'N', 'Y', '2020-03-18', '2020-06-19 19:16:41'),
(20, 'Shift 10AM to 7PM', '', '', 'rule_1', '10:00', '19:00', '9:0', 'rule_2', '10:00', '16:00', '6:0', '00:15', '', 'Y', 'N', '2020-03-20', '0000-00-00 00:00:00'),
(21, 'driver shift', '', 'rule_1', 'rule_1', '09:30', '19:30', '10.00', 'rule_2', '09:30', '16:30', '7.00', '00:15', '', 'Y', 'N', '2020-04-11', '2020-05-14 15:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_work_shift_off_day`
--

CREATE TABLE `hr_master_work_shift_off_day` (
  `id` int(11) NOT NULL,
  `work_shift_id` varchar(255) DEFAULT NULL,
  `week_no` int(11) NOT NULL,
  `weekname` varchar(255) DEFAULT NULL,
  `weekvalue` varchar(255) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_work_shift_off_day`
--

INSERT INTO `hr_master_work_shift_off_day` (`id`, `work_shift_id`, `week_no`, `weekname`, `weekvalue`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(28, '13', 1, 'Sunday', 'Full', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(29, '13', 1, 'Saturday', 'Full', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(30, '13', 2, 'Sunday', 'Full', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(31, '13', 2, 'Saturday', 'Half', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(32, '13', 3, 'Sunday', 'Full', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(33, '13', 3, 'Saturday', 'Full', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(34, '13', 4, 'Sunday', 'Full', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(35, '13', 4, 'Saturday', 'Half', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(36, '13', 5, 'Sunday', 'Full', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(37, '13', 5, 'Saturday', 'Half', 'N', 'Y', '2020-03-05', '0000-00-00 00:00:00'),
(67, '17', 1, 'Sunday', 'Full', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(68, '17', 2, 'Sunday', 'Full', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(69, '17', 3, 'Sunday', 'Full', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(70, '17', 4, 'Sunday', 'Full', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(71, '17', 5, 'Sunday', 'Full', 'N', 'Y', '2020-03-16', '0000-00-00 00:00:00'),
(86, '18', 1, 'Sunday', 'Full', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(87, '18', 1, 'Saturday', 'Full', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(88, '18', 2, 'Sunday', 'Full', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(89, '18', 3, 'Sunday', 'Full', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(90, '18', 3, 'Saturday', 'Full', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(91, '18', 4, 'Sunday', 'Full', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(92, '18', 5, 'Sunday', 'Full', 'N', 'Y', '2020-03-18', '0000-00-00 00:00:00'),
(125, '20', 1, 'Sunday', 'Full', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(126, '20', 1, 'Monday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(127, '20', 1, 'Tuseday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(128, '20', 1, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(129, '20', 1, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(130, '20', 1, 'Friday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(131, '20', 1, 'Saturday', 'Full', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(132, '20', 2, 'Sunday', 'Full', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(133, '20', 2, 'Monday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(134, '20', 2, 'Tuseday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(135, '20', 2, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(136, '20', 2, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(137, '20', 2, 'Friday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(138, '20', 2, 'Saturday', 'rule_2', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(139, '20', 3, 'Sunday', 'Full', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(140, '20', 3, 'Monday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(141, '20', 3, 'Tuseday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(142, '20', 3, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(143, '20', 3, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(144, '20', 3, 'Friday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(145, '20', 3, 'Saturday', 'Full', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(146, '20', 4, 'Sunday', 'Full', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(147, '20', 4, 'Monday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(148, '20', 4, 'Tuseday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(149, '20', 4, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(150, '20', 4, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(151, '20', 4, 'Friday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(152, '20', 4, 'Saturday', 'rule_2', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(153, '20', 5, 'Sunday', 'Full', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(154, '20', 5, 'Monday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(155, '20', 5, 'Tuseday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(156, '20', 5, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(157, '20', 5, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(158, '20', 5, 'Friday', 'rule_1', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(159, '20', 5, 'Saturday', 'rule_2', 'N', 'Y', '2020-03-20', '0000-00-00 00:00:00'),
(372, '14', 1, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(373, '14', 1, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(374, '14', 1, 'Tuesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(375, '14', 1, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(376, '14', 1, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(377, '14', 1, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(378, '14', 1, 'Saturday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(379, '14', 2, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(380, '14', 2, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(381, '14', 2, 'Tuesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(382, '14', 2, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(383, '14', 2, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(384, '14', 2, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(385, '14', 2, 'Saturday', 'rule_2', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(386, '14', 3, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(387, '14', 3, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(388, '14', 3, 'Tuesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(389, '14', 3, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(390, '14', 3, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(391, '14', 3, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(392, '14', 3, 'Saturday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(393, '14', 4, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(394, '14', 4, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(395, '14', 4, 'Tuesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(396, '14', 4, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(397, '14', 4, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(398, '14', 4, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(399, '14', 4, 'Saturday', 'rule_2', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(400, '14', 5, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(401, '14', 5, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(402, '14', 5, 'Tuesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(403, '14', 5, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(404, '14', 5, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(405, '14', 5, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(406, '14', 5, 'Saturday', 'rule_2', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(442, '11', 1, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(443, '11', 1, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(444, '11', 1, 'Tuesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(445, '11', 1, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(446, '11', 1, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(447, '11', 1, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(448, '11', 1, 'Saturday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(449, '11', 2, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(450, '11', 2, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(451, '11', 2, 'Tuesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(452, '11', 2, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(453, '11', 2, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(454, '11', 2, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(455, '11', 2, 'Saturday', 'rule_2', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(456, '11', 3, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(457, '11', 3, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(458, '11', 3, 'Tuesday', 'rule_2', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(459, '11', 3, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(460, '11', 3, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(461, '11', 3, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(462, '11', 3, 'Saturday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(463, '11', 4, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(464, '11', 4, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(465, '11', 4, 'Tuesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(466, '11', 4, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(467, '11', 4, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(468, '11', 4, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(469, '11', 4, 'Saturday', 'rule_2', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(470, '11', 5, 'Sunday', 'Full', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(471, '11', 5, 'Monday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(472, '11', 5, 'Tuesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(473, '11', 5, 'Wednesday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(474, '11', 5, 'Thursday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(475, '11', 5, 'Friday', 'rule_1', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(476, '11', 5, 'Saturday', 'rule_2', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00'),
(792, '16', 1, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(793, '16', 1, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(794, '16', 1, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(795, '16', 1, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(796, '16', 1, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(797, '16', 1, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(798, '16', 1, 'Saturday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(799, '16', 2, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(800, '16', 2, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(801, '16', 2, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(802, '16', 2, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(803, '16', 2, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(804, '16', 2, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(805, '16', 2, 'Saturday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(806, '16', 3, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(807, '16', 3, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(808, '16', 3, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(809, '16', 3, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(810, '16', 3, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(811, '16', 3, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(812, '16', 3, 'Saturday', 'rule_2', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(813, '16', 4, 'Sunday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(814, '16', 4, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(815, '16', 4, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(816, '16', 4, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(817, '16', 4, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(818, '16', 4, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(819, '16', 4, 'Saturday', 'rule_2', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(820, '16', 5, 'Sunday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(821, '16', 5, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(822, '16', 5, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(823, '16', 5, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(824, '16', 5, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(825, '16', 5, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(826, '16', 5, 'Saturday', 'rule_2', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(827, '15', 1, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(828, '15', 1, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(829, '15', 1, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(830, '15', 1, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(831, '15', 1, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(832, '15', 1, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(833, '15', 1, 'Saturday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(834, '15', 2, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(835, '15', 2, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(836, '15', 2, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(837, '15', 2, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(838, '15', 2, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(839, '15', 2, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(840, '15', 2, 'Saturday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(841, '15', 3, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(842, '15', 3, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(843, '15', 3, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(844, '15', 3, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(845, '15', 3, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(846, '15', 3, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(847, '15', 3, 'Saturday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(848, '15', 4, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(849, '15', 4, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(850, '15', 4, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(851, '15', 4, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(852, '15', 4, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(853, '15', 4, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(854, '15', 4, 'Saturday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(855, '15', 5, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(856, '15', 5, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(857, '15', 5, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(858, '15', 5, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(859, '15', 5, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(860, '15', 5, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(861, '15', 5, 'Saturday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(862, '21', 1, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(863, '21', 1, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(864, '21', 1, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(865, '21', 1, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(866, '21', 1, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(867, '21', 1, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(868, '21', 1, 'Saturday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(869, '21', 2, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(870, '21', 2, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(871, '21', 2, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(872, '21', 2, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(873, '21', 2, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(874, '21', 2, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(875, '21', 2, 'Saturday', 'rule_2', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(876, '21', 3, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(877, '21', 3, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(878, '21', 3, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(879, '21', 3, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(880, '21', 3, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(881, '21', 3, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(882, '21', 3, 'Saturday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(883, '21', 4, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(884, '21', 4, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(885, '21', 4, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(886, '21', 4, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(887, '21', 4, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(888, '21', 4, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(889, '21', 4, 'Saturday', 'rule_2', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(890, '21', 5, 'Sunday', 'Full', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(891, '21', 5, 'Monday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(892, '21', 5, 'Tuesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(893, '21', 5, 'Wednesday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(894, '21', 5, 'Thursday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(895, '21', 5, 'Friday', 'rule_1', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(896, '21', 5, 'Saturday', 'rule_2', 'N', 'Y', '2020-05-14', '0000-00-00 00:00:00'),
(897, '19', 1, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(898, '19', 1, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(899, '19', 1, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(900, '19', 1, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(901, '19', 1, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(902, '19', 1, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(903, '19', 1, 'Saturday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(904, '19', 2, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(905, '19', 2, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(906, '19', 2, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(907, '19', 2, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(908, '19', 2, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(909, '19', 2, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(910, '19', 2, 'Saturday', 'rule_2', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(911, '19', 3, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(912, '19', 3, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(913, '19', 3, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(914, '19', 3, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(915, '19', 3, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(916, '19', 3, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(917, '19', 3, 'Saturday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(918, '19', 4, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(919, '19', 4, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(920, '19', 4, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(921, '19', 4, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(922, '19', 4, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(923, '19', 4, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(924, '19', 4, 'Saturday', 'rule_2', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(925, '19', 5, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(926, '19', 5, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(927, '19', 5, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(928, '19', 5, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(929, '19', 5, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(930, '19', 5, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(931, '19', 5, 'Saturday', 'rule_2', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(932, '12', 1, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(933, '12', 1, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(934, '12', 1, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(935, '12', 1, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(936, '12', 1, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(937, '12', 1, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(938, '12', 1, 'Saturday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(939, '12', 2, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(940, '12', 2, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(941, '12', 2, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(942, '12', 2, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(943, '12', 2, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(944, '12', 2, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(945, '12', 2, 'Saturday', 'rule_2', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(946, '12', 3, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(947, '12', 3, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(948, '12', 3, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(949, '12', 3, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(950, '12', 3, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(951, '12', 3, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(952, '12', 3, 'Saturday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(953, '12', 4, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(954, '12', 4, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(955, '12', 4, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(956, '12', 4, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(957, '12', 4, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(958, '12', 4, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(959, '12', 4, 'Saturday', 'rule_2', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(960, '12', 5, 'Sunday', 'Full', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(961, '12', 5, 'Monday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(962, '12', 5, 'Tuesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(963, '12', 5, 'Wednesday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(964, '12', 5, 'Thursday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(965, '12', 5, 'Friday', 'rule_1', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00'),
(966, '12', 5, 'Saturday', 'rule_2', 'N', 'Y', '2020-06-19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_master_work_week`
--

CREATE TABLE `hr_master_work_week` (
  `id` int(11) NOT NULL,
  `week_days` varchar(100) DEFAULT NULL,
  `week_1` varchar(100) DEFAULT NULL,
  `week_2` varchar(100) DEFAULT NULL,
  `week_3` varchar(100) DEFAULT NULL,
  `week_4` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_master_work_week`
--

INSERT INTO `hr_master_work_week` (`id`, `week_days`, `week_1`, `week_2`, `week_3`, `week_4`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'Monday', 'Full Day', 'Full Day', 'Full Day', 'Full Day', 'N', 'Y', '2018-12-18', '2019-01-24 10:22:50'),
(2, 'Tuesday', 'Full Day', 'Full Day', 'Full Day', 'Full Day', 'N', 'Y', '2018-12-18', '2019-01-24 10:22:50'),
(3, 'Wednesday', 'Full Day', 'Full Day', 'Full Day', 'Full Day', 'N', 'Y', '2018-12-18', '2019-01-24 10:22:50'),
(4, 'Thursday', 'Full Day', 'Full Day', 'Full Day', 'Full Day', 'N', 'Y', '2018-12-18', '2019-01-24 10:22:50'),
(5, 'Friday', 'Full Day', 'Full Day', 'Full Day', 'Full Day', 'N', 'Y', '2018-12-18', '2019-01-24 10:22:50'),
(6, 'Saturday', 'Full Day', 'Full Day', 'Full Day', 'Full Day', 'N', 'Y', '2018-12-18', '2019-01-24 10:22:50'),
(7, 'Sunday', 'Full Day', 'Full Day', 'Full Day', 'Full Day', 'N', 'Y', '2018-12-18', '2019-01-24 10:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `hr_maste_employee_system_config`
--

CREATE TABLE `hr_maste_employee_system_config` (
  `id` int(11) NOT NULL,
  `auto` enum('Yes','No') NOT NULL DEFAULT 'No',
  `prefix` varchar(100) DEFAULT NULL,
  `no` varchar(100) DEFAULT NULL,
  `suffix` varchar(100) DEFAULT NULL,
  `cal_basic_salary` varchar(100) DEFAULT NULL,
  `min_basic_salary` varchar(100) DEFAULT NULL,
  `basic_per_ctc` varchar(100) DEFAULT NULL,
  `payslip_format` varchar(100) DEFAULT NULL,
  `max_res_holiday` varchar(100) DEFAULT NULL,
  `base_day` varchar(100) DEFAULT NULL,
  `cut_off_day` varchar(100) DEFAULT NULL,
  `cut_off_rule_start` date DEFAULT NULL,
  `cut_off_rule_end` date DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_maste_employee_system_config`
--

INSERT INTO `hr_maste_employee_system_config` (`id`, `auto`, `prefix`, `no`, `suffix`, `cal_basic_salary`, `min_basic_salary`, `basic_per_ctc`, `payslip_format`, `max_res_holiday`, `base_day`, `cut_off_day`, `cut_off_rule_start`, `cut_off_rule_end`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'Yes', 'SK', '00001', 'CTR', 'CTC', 'CTC', 'CTC', 'CTC', 'CTC', 'Actual Days in Month', 'Actual Days in Month', '2019-01-31', NULL, 'N', 'Y', '2019-01-03', '2019-01-03 15:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `hr_notice`
--

CREATE TABLE `hr_notice` (
  `id` int(11) NOT NULL,
  `employee_id` text NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_notice`
--

INSERT INTO `hr_notice` (`id`, `employee_id`, `subject`, `content`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, '28', 'warning request for salary.', 'you are faired for each and every time requesting for your panding salary.', 'Y', 'N', '2020-03-05', '0000-00-00 00:00:00'),
(2, '12,13', 'Work From Home', 'Work From Home from 23 rd march to 31st march. Work From Home from 23 rd march to 31st march.Work From Home from 23 rd march to 31st march. Work From Home from 23 rd march to 31st march. Work From Home from 23 rd march to 31st march. Work From Home from 23 rd march to 31st march. Work From Home from 23 rd march to 31st march. Work From Home from 23 rd march to 31st march.', 'N', 'Y', '2020-03-24', '2020-04-22 17:35:33'),
(3, '55', 'CLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCLCL', 'On 15.04.2020', 'Y', 'N', '2020-04-10', '2020-04-23 13:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `hr_offcycle_temp`
--

CREATE TABLE `hr_offcycle_temp` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `component` int(11) DEFAULT NULL,
  `amount` float(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_off_cycle_payroll`
--

CREATE TABLE `hr_off_cycle_payroll` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `component_id` int(11) NOT NULL,
  `amount` float(9,2) NOT NULL,
  `off_cycle_date` date NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=> not final save , 1=> final save'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_off_cycle_payroll`
--

INSERT INTO `hr_off_cycle_payroll` (`id`, `transaction_id`, `employee_id`, `type`, `component_id`, `amount`, `off_cycle_date`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `status`) VALUES
(1, 'TNS/30/03/2020/20', 12, 'pay', 2, 189.00, '2020-03-30', 'N', 'Y', '2020-03-30', '2020-03-30 00:00:00', '1'),
(2, 'TNS/30/03/2020/20', 12, 'pay', 6, 450.00, '2020-03-30', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00', '1'),
(3, 'TNS/30/03/2020/20', 12, 'deduction', 21, 120.00, '2020-03-30', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00', '1'),
(4, 'TNS/30/03/2020/20', 12, 'deduction', 28, 500.00, '2020-03-30', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00', '1'),
(5, 'TNS/30/03/2020/20', 39, 'pay', 2, 1234.00, '2020-03-30', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00', '1'),
(6, 'TNS/30/03/2020/20', 39, 'pay', 6, 450.00, '2020-03-30', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00', '1'),
(7, 'TNS/30/03/2020/20', 39, 'deduction', 21, 120.00, '2020-03-30', 'N', 'Y', '2020-03-30', '0000-00-00 00:00:00', '1'),
(8, 'TNS/30/03/2020/20', 39, 'deduction', 28, 500.00, '2020-03-30', 'N', 'Y', '2020-03-30', '2020-04-03 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hr_payroll_addhoc_details`
--

CREATE TABLE `hr_payroll_addhoc_details` (
  `id` bigint(20) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `credit` float(9,2) NOT NULL DEFAULT 0.00,
  `debit` float(9,2) NOT NULL DEFAULT 0.00,
  `month` varchar(10) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_payroll_hold_details`
--

CREATE TABLE `hr_payroll_hold_details` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `credit` float(9,2) NOT NULL DEFAULT 0.00,
  `debit` float(9,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_pay_schdule`
--

CREATE TABLE `hr_pay_schdule` (
  `id` int(11) NOT NULL,
  `processing_month` varchar(100) DEFAULT NULL,
  `day_of_processing` varchar(100) NOT NULL,
  `based_on` varchar(100) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_pay_schdule`
--

INSERT INTO `hr_pay_schdule` (`id`, `processing_month`, `day_of_processing`, `based_on`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'February', '7', 'actual_days', 'N', 'Y', '2020-01-09', '2020-01-09 13:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `hr_pf_admin`
--

CREATE TABLE `hr_pf_admin` (
  `id` int(11) NOT NULL,
  `employee_pf_account_no` varchar(200) NOT NULL,
  `entry_date` datetime NOT NULL DEFAULT current_timestamp(),
  `employee_pf_percent` varchar(200) NOT NULL,
  `employer_pf_percent` varchar(300) NOT NULL,
  `is_active` enum('Y','N','','') NOT NULL DEFAULT 'Y',
  `delete_flag` enum('Y','N','','') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_pf_admin`
--

INSERT INTO `hr_pf_admin` (`id`, `employee_pf_account_no`, `entry_date`, `employee_pf_percent`, `employer_pf_percent`, `is_active`, `delete_flag`) VALUES
(1, '32132135416546', '2019-08-19 11:05:03', '12', '12', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `hr_project`
--

CREATE TABLE `hr_project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr_project`
--

INSERT INTO `hr_project` (`id`, `project_name`, `employee_id`, `description`, `image`, `start_date`, `end_date`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'project 1', '10', 'This is project about e-commerce', '1548930260455901777.jpg', '2019-01-31', '2019-01-31', 'N', 'Y', '2019-01-31', '2019-01-31 17:08:03'),
(2, 'project 2s', '6', 'This is project about hostel management', '15555839781360247255.jpg', '2019-01-31', '2019-01-31', 'N', 'Y', '2019-04-18', '2019-04-18 16:09:53'),
(3, 'project 3', '6', 'This is project about Scool management', '1555582891967544890.jpg', '2019-01-31', '2019-01-31', 'N', 'Y', '2019-04-18', '2019-04-18 15:51:33'),
(4, 'project 4', '4', 'This is project about Hr management', '1548930260455901777.jpg', '2019-01-31', '2019-01-31', 'N', 'Y', '2019-01-31', '2019-01-31 16:02:43'),
(5, 'project 5', '', 'This is project about restaurent management', '1548930260455901777.jpg', '2019-01-31', '2019-01-31', 'N', 'Y', '2019-01-31', '2019-01-31 16:03:12'),
(6, 'Book Management System', NULL, 'test', '15507599361270222932.png', '2019-02-21', '2019-07-19', 'N', 'Y', '2019-02-21', '2019-02-21 20:09:20'),
(7, 'This is test Project', NULL, 'this is test', '15520429151382627459.jpg', '2019-03-08', '2019-03-29', 'N', 'Y', '2019-03-08', '2019-03-08 16:31:57'),
(8, 'ccccc1', '22', 'kdffkntrtngrkng', '156309911529867216.jpg', '2019-07-10', '2019-07-19', 'N', 'Y', '2019-07-14', '2019-07-14 15:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_p_tax`
--

CREATE TABLE `hr_p_tax` (
  `id` int(11) NOT NULL,
  `p_tax_no` varchar(500) DEFAULT NULL,
  `p_tax` varchar(200) DEFAULT NULL,
  `amount_to` varchar(200) NOT NULL,
  `amount_from` varchar(300) NOT NULL,
  `state` varchar(500) NOT NULL,
  `is_active` enum('Y','N','','') NOT NULL DEFAULT 'Y',
  `delete_flag` enum('Y','N','','') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_p_tax`
--

INSERT INTO `hr_p_tax` (`id`, `p_tax_no`, `p_tax`, `amount_to`, `amount_from`, `state`, `is_active`, `delete_flag`) VALUES
(1, '123456', '0', '10000', '1', ' Bulandshahr', 'N', 'Y'),
(2, '123456', '110', '15000', '10001', ' Bulandshahr', 'N', 'Y'),
(3, '123456', '130', '25000', '15001', ' Bulandshahr', 'N', 'Y'),
(4, '123456', '150', '40000', '25001', ' Bulandshahr', 'N', 'Y'),
(5, '123456', '200', '5', '40001', ' Bulandshahr', 'N', 'Y'),
(6, 'company', '0', '10000', '1', 'West Bengal', 'Y', 'N'),
(7, 'company', '110', '15000', '10001', 'West Bengal', 'Y', 'N'),
(8, 'company', '130', '25000', '15001', 'West Bengal', 'Y', 'N'),
(9, 'company', '150', '40000', '25001', 'West Bengal', 'Y', 'N'),
(10, 'company', '200', '99999999', '40001', 'West Bengal', 'Y', 'N'),
(12, 'Agra123456', '50', '10000', '1', '', 'N', 'Y'),
(13, 'Agra123456', '100', '20000', '10001', '', 'N', 'Y'),
(14, 'Agra123456', '150', '30000', '20001', '', 'N', 'Y'),
(15, 'Agra123456', '200', '40000', '30001', '', 'N', 'Y'),
(16, 'Agra1234', '50', '10000', '1', '', 'N', 'Y'),
(17, 'Agra1234', '100', '20000', '10001', '', 'N', 'Y'),
(18, 'Agra1234', '150', '30000', '20001', '', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hr_setting_organization`
--

CREATE TABLE `hr_setting_organization` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `mailing_name` varchar(100) DEFAULT NULL,
  `nick_name` varchar(100) DEFAULT NULL,
  `apt_no` varchar(100) DEFAULT NULL,
  `building_name` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `incorporation_date` date DEFAULT NULL,
  `corporate_no` varchar(100) DEFAULT NULL,
  `pan_no` varchar(100) DEFAULT NULL,
  `tan_no` varchar(100) DEFAULT NULL,
  `cit` varchar(100) DEFAULT NULL,
  `tan_circle` varchar(100) DEFAULT NULL,
  `pf_no` varchar(100) DEFAULT NULL,
  `pf_reg_date` date DEFAULT NULL,
  `pf_rule_all_employee` enum('Yes','No') DEFAULT 'No',
  `pf_signatory_name` varchar(100) DEFAULT NULL,
  `pf_signatory_designation` varchar(100) DEFAULT NULL,
  `pf_signatory_father_name` varchar(100) DEFAULT NULL,
  `esi_no` varchar(100) DEFAULT NULL,
  `esi_reg_date` date DEFAULT NULL,
  `esi_signatory_name` varchar(100) DEFAULT NULL,
  `esi_signatory_designation` varchar(100) DEFAULT NULL,
  `esi_signatory_father_name` varchar(100) DEFAULT NULL,
  `p_tax_no` varchar(100) DEFAULT NULL,
  `p_tax_reg_date` date DEFAULT NULL,
  `p_tax_signatory_name` varchar(100) DEFAULT NULL,
  `other_details` text DEFAULT NULL,
  `form16_signatory_name` varchar(100) DEFAULT NULL,
  `form16_signatory_designation` varchar(100) DEFAULT NULL,
  `form16_signatory_pan` varchar(100) DEFAULT NULL,
  `form16_apt_no` varchar(100) DEFAULT NULL,
  `form16_building_name` varchar(100) DEFAULT NULL,
  `form16_country` varchar(100) DEFAULT NULL,
  `form16_state` varchar(100) DEFAULT NULL,
  `form16_city` varchar(100) DEFAULT NULL,
  `form16_zip` varchar(100) DEFAULT NULL,
  `form16_telephone` varchar(100) DEFAULT NULL,
  `form16_mobile` varchar(100) DEFAULT NULL,
  `form16_email` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `pf_apply` int(11) NOT NULL,
  `esi_apply` int(11) NOT NULL,
  `ptax_apply` int(11) NOT NULL,
  `gratuity_apply` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_setting_organization`
--

INSERT INTO `hr_setting_organization` (`id`, `parent_id`, `image`, `company_name`, `mailing_name`, `nick_name`, `apt_no`, `building_name`, `country`, `state`, `city`, `zip`, `telephone`, `mobile`, `email`, `incorporation_date`, `corporate_no`, `pan_no`, `tan_no`, `cit`, `tan_circle`, `pf_no`, `pf_reg_date`, `pf_rule_all_employee`, `pf_signatory_name`, `pf_signatory_designation`, `pf_signatory_father_name`, `esi_no`, `esi_reg_date`, `esi_signatory_name`, `esi_signatory_designation`, `esi_signatory_father_name`, `p_tax_no`, `p_tax_reg_date`, `p_tax_signatory_name`, `other_details`, `form16_signatory_name`, `form16_signatory_designation`, `form16_signatory_pan`, `form16_apt_no`, `form16_building_name`, `form16_country`, `form16_state`, `form16_city`, `form16_zip`, `form16_telephone`, `form16_mobile`, `form16_email`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `pf_apply`, `esi_apply`, `ptax_apply`, `gratuity_apply`) VALUES
(1, 0, '16861248941863802823.png', 'Sketch Web Solution', 'Soumya banerjee', 'Soumya', 'Flat no 9', 'Minerva Garden', 'India', 'Westbengal', 'Kolkata', '700104', '+919804493626', '', 'pritam@sketchwebsolutions.com', '0001-11-30', 'U 67190 TN 2014 PTC 096978', 'SDJ34KKY883N9', 'PDES03028F', 'DDF221122PN', 'UAE ', 'ADFSGS123486', '0001-11-30', 'No', 'sdfdf', '', '', 'ESI1234', '0001-11-30', '', '', '', 'PTax1234', '0001-11-30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', 'Y', '2018-12-31', '2023-06-07 13:31:35', 1, 1, 1, 1),
(3, 1, '15786433421864951117.png', 'Sketch Enterprise', 'sree chattterjee', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', 'Y', '0000-00-00', '2020-04-23 13:27:52', 0, 0, 0, 0),
(4, 1, '', 'SKAKTI FASHION PVT. LTD.', 'RAJGHARIA GARMENT', 'DEW DROP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2001-01-20', '1255ASDF1', 'SHAKT1234F', 'ASD123456D', 'ADSG1233', 'INDIA', 'ADFSGS123486', '2001-01-20', 'No', 'MR. ACCOUNTENT', 'SR. ACCOUNTENT', 'MR.X ACCOUNTENT', 'SAGSH12358A', '2001-01-20', 'MR. ACCOUNTENT', 'SR. ACCOUNTENT', 'MR.X ACCOUNTENT', 'PTAX1234NUMBER', '2001-01-20', 'MR. ACCOUNTENT', '', 'MR. ACCOUNTENT', 'SR. ACCOUNTENT', 'SRACC1234T', '2345', 'ASGHHS', 'India', 'WEST BENGAL', 'KOLKATA', '700141', '08583010067', '', 'shaktifashion_01@yahoomail.com', 'N', 'Y', '0000-00-00', '2020-03-06 11:14:54', 0, 0, 0, 0),
(0, 1, '', 'Narmada Infotech', 'narinfo@gmail.com', 'NarmadaTech', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '678568757657', 'EDEPS0422M', '1023904839473', '89786786', '76869798', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '', 'Amam', 'dfdff', 'EDEPS0422M', '12', '345', 'India', 'Telangana', 'Hyd', '4656553', '345465', '07581043434', 'bootup786@gmail.com', 'Y', 'N', '0000-00-00', '2023-06-05 10:50:56', 0, 0, 0, 0),
(0, 1, '16859425171163324654.png', 'Narmada Infotech', 'narinfo@gmail.com', 'NarmadaTech', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'N', '0000-00-00', '2023-06-05 10:52:47', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hr_setting_organization_bank_details`
--

CREATE TABLE `hr_setting_organization_bank_details` (
  `id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `apt_no` varchar(100) DEFAULT NULL,
  `building_name` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `acc_type` varchar(100) DEFAULT NULL,
  `acc_no` varchar(100) DEFAULT NULL,
  `ifsc_code` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_setting_organization_bank_details`
--

INSERT INTO `hr_setting_organization_bank_details` (`id`, `org_id`, `bank_name`, `branch`, `apt_no`, `building_name`, `country`, `state`, `city`, `zip`, `telephone`, `mobile`, `email`, `acc_type`, `acc_no`, `ifsc_code`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 1, 'axis', 'tollygange', '12A/C', 'Behala', 'India', 'Westbengal', 'Kolkata', '700104', '+919804493626', '78878787877', 'pritam@gmail.com', '12131121313131', '132434As', '1313131', 'N', 'Y', '2019-01-03', '2023-06-07 13:31:35'),
(2, 3, 'Axis', '', '', '', '', 'West Bengal', 'Kolkata', '700104', '9573222886', '', 'developer.wiz11@sketchwebsolutions.com', '', '', '', 'N', 'Y', '0000-00-00', '2020-04-23 13:27:52'),
(3, 4, 'STATE BANK OF INDIA', 'RABINDRANAGAR', 'DSGS545', 'ASGLLKL1559,GS48H', 'India', 'WEST BENGAL', 'KOLKATA', '700141', '08583010067', '2498988800', 'shaktifashion_01@yahoomail.com', 'CURRENT', '1234589632147852', 'AGD5462', 'N', 'Y', '0000-00-00', '2020-03-06 11:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `hr_setting_org_location`
--

CREATE TABLE `hr_setting_org_location` (
  `id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `location_heading` varchar(255) NOT NULL,
  `building_name` varchar(100) DEFAULT NULL,
  `apt_no` varchar(100) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_setting_org_location`
--

INSERT INTO `hr_setting_org_location` (`id`, `org_id`, `location_heading`, `building_name`, `apt_no`, `country`, `state`, `city`, `zip`, `telephone`, `mobile`, `email`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 1, '332322', 'Minerva Garden', 'Flat no 9', 'India', 'Uttar Pradesh', 'Vijay Nagar By Pass Choke', '201009', '07581043434', '07581043434', 'vijay123@gmail.com', 'N', 'Y', '0000-00-00', '2023-06-07 13:31:35'),
(2, 3, '', 'Diamond Harbour Rd, Joka, 23, 23', '27F', 'India', 'West Bengal', 'Kolkata', '700104', '+919573222886', '', 'developer.wiz11@sketchwebsolutions.com', 'N', 'Y', '0000-00-00', '2020-04-23 13:27:52'),
(3, 4, '', '786, D.H ROAD', 'MUKERGEE GALTE 1', 'India', 'WEST BENGAL', 'KOLKATA', '700141', '08583010067', '', 'shaktifashion_01@yahoomail.com', 'N', 'Y', '0000-00-00', '2020-03-06 11:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `hr_setting_org_location_bkup`
--

CREATE TABLE `hr_setting_org_location_bkup` (
  `id` int(11) NOT NULL,
  `location_type` varchar(100) DEFAULT NULL,
  `location_heading` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `address` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_setting_org_location_bkup`
--

INSERT INTO `hr_setting_org_location_bkup` (`id`, `location_type`, `location_heading`, `address`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'Head Office', 'India : (Kolkata) Head Office', '<p>Sketch Web Solutions<br>\nFlat No. 9, 4th Floor,<br>\nMinerva Garden, D.H Road, Opp. Joka IIM<br>\nKolkata – 700104, India</p>\n<p>Mobile:+91 8017338231 (HR)<br>\n+91 9038449732<br>\n+913324381439</p>\n<p>E-mail: <a href=\"mailto:info@sketchwebsolutions.com\">info@sketchwebsolutions.com</a><br>\n<a href=\"mailto:marketing@sketchwebsolutions.com\">marketing@sketchwebsolutions.com</a></p>', 'N', 'Y', '2019-01-24', '2019-05-20 14:10:28'),
(2, 'Branch Office', 'Branch Office', '<p>Sketch Web Solutions<br>\nSaltlake<br>\nMerlin Matrix Building<br>\n8th Floor, Room no: 803.<br>\nCollege more,Salt Lake Sector-5,<br>\nKolkata, West Bengal 700091</p>\n<p>Mobile:+91 9051335696<br>\n</p>', 'N', 'N', '2019-01-24', '2019-07-08 14:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `hr_setting_system_config`
--

CREATE TABLE `hr_setting_system_config` (
  `id` int(11) NOT NULL,
  `default_currency` varchar(100) DEFAULT NULL,
  `default_currency_symbol` text CHARACTER SET utf8 DEFAULT NULL,
  `currency_position` varchar(100) DEFAULT NULL,
  `date_format` varchar(100) DEFAULT NULL,
  `jquery_date_format` varchar(100) NOT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `financial_year_start_month` int(11) NOT NULL,
  `based_on_days` varchar(255) NOT NULL,
  `day_of_processing` varchar(100) NOT NULL,
  `pay_frequency` varchar(100) NOT NULL,
  `based_on` varchar(100) NOT NULL,
  `working_days` varchar(255) NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `salary_cycle` varchar(100) NOT NULL,
  `cut_of_day` varchar(100) NOT NULL,
  `loan` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'Yes->module_active,No->module inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_setting_system_config`
--

INSERT INTO `hr_setting_system_config` (`id`, `default_currency`, `default_currency_symbol`, `currency_position`, `date_format`, `jquery_date_format`, `timezone`, `financial_year_start_month`, `based_on_days`, `day_of_processing`, `pay_frequency`, `based_on`, `working_days`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `salary_cycle`, `cut_of_day`, `loan`) VALUES
(1, 'INR', 'Rs.', 'Left', 'd-m-Y', 'DD-M-YYYY', NULL, 1, 'last_working_day', '', 'Monthly', 'actual_days', '', 'N', 'Y', '2019-01-03', '2023-06-05 11:41:33', 'Actualdays', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `hr_state`
--

CREATE TABLE `hr_state` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_active` enum('Y','N','','') NOT NULL DEFAULT 'Y',
  `delete_flag` enum('Y','N','','') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_state`
--

INSERT INTO `hr_state` (`id`, `name`, `is_active`, `delete_flag`) VALUES
(1, 'WB', 'N', 'Y'),
(2, 'UP', 'N', 'Y'),
(3, 'WB', 'N', 'Y'),
(4, 'UP', 'N', 'Y'),
(5, 'fellow', 'N', 'Y'),
(6, 'fellow', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hr_templates`
--

CREATE TABLE `hr_templates` (
  `id` int(11) NOT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `email_from` varchar(255) DEFAULT NULL,
  `email_subject` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_templates`
--

INSERT INTO `hr_templates` (`id`, `template_name`, `email_from`, `email_subject`, `description`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'DEMO', 'admin@sketchwebsoltions.com', 'DEMO TEMPLATE', '<p>Dear&nbsp;[var.first_name]</p>\n\n<p>[var.employee_code]</p>\n\n<p>[var.department]</p>\n\n<p>[var.designation],</p>\n\n<p>&nbsp;</p>\n\n<p>We are all really excited to&nbsp;welcome&nbsp;you to our team!</p>\n\n<p>&nbsp;</p>\n\n<p>At Sketch, we care about giving our team members everything they need to perform their best. As you will notice, we have prepared your workstation with all necessary equipment. Our team will help you setup your computer, software and online accounts on your first day.</p>\n\n<p>&nbsp;</p>\n\n<p>We&rsquo;ve planned your first days to help you settle in properly. For your first week, we have also planned a few training sessions to give you a better understanding of our company and operations. As you have joined as a&nbsp;Content Writer&nbsp;,These will be explained to you by your reporting manager&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Our team is excited to meet you and look forward to introducing themselves to you during the day.</p>\n\n<p>&nbsp;</p>\n\n<p>Employee&nbsp;HandBook&nbsp;has been attached with&nbsp;this email. If you have any questions please feel free to email or meet me and I&rsquo;ll be more than happy to help you.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>We are looking forward to working with you and seeing you achieve great things!</p>\n\n<p>&nbsp;</p>\n\n<p><em><strong>THANKS &amp; REGARDS</strong></em></p>\n\n<p><em><strong>PARISHMITA SAHA</strong></em></p>\n\n<p><em><strong>HR DEPARTMENT</strong></em></p>\n\n<p>[var.company_name]</p>\n\n<p><em><strong>Address :&nbsp;[var.company_address]</strong></em></p>\n\n<p>&nbsp;</p>\n', 'N', 'Y', '2020-04-04', '2020-04-08 12:54:52'),
(2, 'Offer Letter', 'souvik@sketchwebsolutions.com', 'Offer Letter', '<pre>\nDear [var.first_name] [var.last_name],</pre>\n\n<p>This is example offer letter for you .</p>\n\n<p>Thanks &amp; regards,</p>\n\n<p>[var.company_name]</p>\n\n<p>[var.company_address]</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', 'N', 'Y', '2020-04-04', '2020-04-04 13:56:10'),
(3, 'Appointment Letter ', 'admin@sketchwebsoltions.com', 'Appointment Template', '<p>[var.date]</p>\n\n<p>Hi [var.first_name] ,</p>\n\n<p>After a thorough and comprehensive review, I am pleased to announce that SketchWebSollutions would like to offer you the position of [var.designation].</p>\n\n<p>Your role will begin on [var.date]. You will report every weekday to the Grayson Facility in Workton, IL, between the hours of 10:00 AM and 7:00 PM, &nbsp;In your role as [var.designation], you will report to [var.first_name] [var.last_name].</p>\n\n<p>The salary for this position will be Rs-*********/- per year. This amount will be paid by check or direct deposit in bi-weekly increments of Rs:*****/-, minus appropriate withholdings.</p>\n\n<p>This role will be considered exempt, so you will not be eligible for overtime compensation. As an exempt employee, you will be entitled to standard federal holidays plus 80 hours of paid time-off per year, which may be used at your discretion. You will also be eligible to participate in our employer sponsored health plan. Please review the enclosed Plan Summary for more information.</p>\n\n<p>The agreement between you and Quality Business Co. will be classified as at-will, which means either party may terminate the agreement at any time, for any reason, with or without notice.</p>\n\n<p>All employees of SketchWeb Sollutions. are expected to abide by the policies outlined in our Employee Handbook, which covers safety rules, conduct and behavior, and our business casual dress code. To find the full text of the Employee Handbook, please visit the company website and click on the tab marked &ldquo;Handbook, Full Text&rdquo;.</p>\n\n<p>If you choose to accept this position, please sign the enclosed Employee Agreement Form and Procedures Compliance Form and return both to my office by .</p>\n\n<p>When you report on your first day, you will be asked to present a state issued photo ID.</p>\n\n<p>For more information about this position or about Sketchweb Solutions, please contact my office at any time.</p>\n\n<p>Sincerely,</p>\n\n<p>Parismita Saha,</p>\n\n<p>HR Manager,</p>\n\n<p>Sketchweb Soluitons</p>\n', 'N', 'Y', '2020-04-08', '2020-04-10 11:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `hr_tenancy`
--

CREATE TABLE `hr_tenancy` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `labor_name` text DEFAULT NULL,
  `camp_details` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_tenancy`
--

INSERT INTO `hr_tenancy` (`id`, `type`, `name`, `labor_name`, `camp_details`, `details`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 'Camp', 'sketch', 'test44', 'test6', '', 'N', 'Y', '2019-01-29', '2019-05-21 17:21:16'),
(2, 'Office', 'k2', 'dsdsfsdf', 'sdsdf', '', 'N', 'Y', '2019-01-29', '2019-05-21 17:21:06'),
(3, 'Villa', 'Test Case', '', '', 'test', 'N', 'Y', '2019-01-29', '2019-01-29 18:35:16'),
(4, 'Office', 'hshsjsjd', '', '', '', 'N', 'Y', '2019-01-31', '2019-05-21 16:54:13'),
(5, 'Store', 'dfdsfsdf', '', '', '', 'N', 'Y', '2019-04-10', '0000-00-00 00:00:00'),
(6, 'Office', 'Anup Pan', 'lab1', 'hello world', '', 'N', 'Y', '2019-04-12', '2019-05-21 17:03:12'),
(7, 'Office', 'Sketch Web ', '', '', '', 'N', 'Y', '2019-05-21', '0000-00-00 00:00:00'),
(8, 'Store', 'Sketch Web 2', 'Sourav', '', '', 'N', 'Y', '2019-05-21', '2019-05-21 17:05:06'),
(9, 'Office', 'Sketch Web', '', '', '', 'N', 'Y', '2019-05-21', '0000-00-00 00:00:00'),
(10, 'Office', 'Sketch Web', '', '', '', 'N', 'Y', '2019-05-21', '0000-00-00 00:00:00'),
(11, 'Office', 'Sketch Web', '', '', '', 'N', 'Y', '2019-05-21', '0000-00-00 00:00:00'),
(12, 'Office', 'Sketch Web 2', '', '', '', 'N', 'Y', '2019-05-21', '0000-00-00 00:00:00'),
(13, 'Store', 'tyty', '', '', '', 'N', 'Y', '2019-05-21', '2019-05-22 11:17:47'),
(14, 'Apartment', 'Deep', '', '', 'kjsnvksnvknv', 'N', 'Y', '2019-07-14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_tenancy_contracts`
--

CREATE TABLE `hr_tenancy_contracts` (
  `id` int(11) NOT NULL,
  `tenancy_id` int(11) NOT NULL,
  `contract_no` varchar(100) DEFAULT NULL,
  `landloard_name` varchar(100) DEFAULT NULL,
  `contract_amount` varchar(100) DEFAULT NULL,
  `security_deposite_amount` varchar(100) DEFAULT NULL,
  `no_of_rooms` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_tenancy_contracts`
--

INSERT INTO `hr_tenancy_contracts` (`id`, `tenancy_id`, `contract_no`, `landloard_name`, `contract_amount`, `security_deposite_amount`, `no_of_rooms`, `start_date`, `expiry_date`, `delete_flag`, `is_active`, `entry_date`, `modified_date`) VALUES
(1, 1, 'eewr', 'erewr', 'ewrewr', '3000', '23', '2019-07-10', '2019-07-14', 'N', 'Y', '2019-07-09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_timeoff`
--

CREATE TABLE `hr_timeoff` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `work_status` char(3) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `entry_time` varchar(100) NOT NULL,
  `out_time` varchar(100) NOT NULL,
  `purpose` text NOT NULL,
  `approved` varchar(100) DEFAULT NULL,
  `delete_flag` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=>''Yes'',N=>''No''',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y=>''Yes'',N=>''No''',
  `entry_date` date NOT NULL,
  `modified_date` datetime NOT NULL,
  `deduction_type` varchar(100) NOT NULL,
  `approvalnote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_timeoff`
--

INSERT INTO `hr_timeoff` (`id`, `employee_id`, `type`, `work_status`, `date`, `time`, `from_date`, `to_date`, `entry_time`, `out_time`, `purpose`, `approved`, `delete_flag`, `is_active`, `entry_date`, `modified_date`, `deduction_type`, `approvalnote`) VALUES
(1, 32, 'Official', 'WFH', '0000-00-00', '', '2020-06-22', '2020-06-22', '12:00 AM', '12:00 AM', 'jjhj', NULL, 'Y', 'N', '2020-06-22', '0000-00-00 00:00:00', 'Full', ''),
(0, 24, 'Official', 'OD', '0000-00-00', '', '2023-06-05', '2023-06-05', '12:00 AM', '12:00 AM', 'OK I am Do It Now !', NULL, 'N', 'Y', '2023-06-05', '0000-00-00 00:00:00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr_employee`
--
ALTER TABLE `hr_employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr_employee`
--
ALTER TABLE `hr_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
