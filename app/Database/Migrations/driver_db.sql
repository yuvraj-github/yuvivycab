-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 06:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `vycabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `iCurrencyId` int(8) NOT NULL,
  `vName` varchar(10) NOT NULL,
  `vSymbol` varchar(20) CHARACTER SET utf8 NOT NULL,
  `iDispOrder` int(11) NOT NULL,
  `eDefault` enum('Yes','No') NOT NULL DEFAULT 'No',
  `Ratio` double(10,4) NOT NULL,
  `fThresholdAmount` float(13,6) NOT NULL COMMENT 'Admin will enter min currency value for driver to be request',
  `eStatus` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`iCurrencyId`, `vName`, `vSymbol`, `iDispOrder`, `eDefault`, `Ratio`, `fThresholdAmount`, `eStatus`) VALUES
(1, 'GBP', '£', 3, 'No', 0.8300, 83.000000, 'Active'),
(2, 'USD', '$', 2, 'No', 1.0900, 109.000000, 'Active'),
(3, 'EUR', '€', 1, 'Yes', 1.0000, 100.000000, 'Active'),
(4, 'AUD', 'A$', 4, 'No', 1.4500, 145.000000, 'Active'),
(5, 'CAD', '$', 5, 'No', 1.3700, 137.000000, 'Active'),
(6, 'INR', '₹', 5, 'No', 82.7600, 8276.000000, 'Active'),
(7, 'SAR', '﷼', 7, 'No', 4.0900, 409.000000, 'Active'),
(8, 'CNY', '¥', 8, 'No', 6.9300, 693.000000, 'Active'),
(9, 'CHF', 'chf', 9, 'No', 1.0200, 102.000000, 'Active'),
(10, 'AED', 'د.إ', 10, 'No', 4.0000, 400.000000, 'Active'),
(11, 'MAD', 'د.م.', 11, 'No', 10.6000, 1060.000000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `register_driver`
--

CREATE TABLE `register_driver` (
  `iDriverId` int(11) NOT NULL,
  `iRefUserId` int(11) NOT NULL,
  `eRefType` enum('Driver','Rider') NOT NULL,
  `vFbId` varchar(500) NOT NULL DEFAULT '0',
  `iCompanyId` int(11) NOT NULL,
  `vName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vLastName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vEmail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vLoginId` varchar(100) NOT NULL,
  `vPassword` varchar(100) NOT NULL,
  `eGender` enum('','Male','Female') CHARACTER SET utf8 NOT NULL,
  `vCode` varchar(50) NOT NULL,
  `vPhone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `vLang` varchar(50) NOT NULL,
  `vLatitude` varchar(50) NOT NULL,
  `vLongitude` varchar(50) NOT NULL,
  `iDriverVehicleId` varchar(50) NOT NULL,
  `vCompany` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vCaddress` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vCadress2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vCity` varchar(10) NOT NULL,
  `vState` varchar(10) NOT NULL,
  `vZip` varchar(255) NOT NULL,
  `vInviteCode` varchar(255) NOT NULL,
  `dBirthDate` date NOT NULL,
  `vFathersName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vBackCheck` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vServiceLoc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vAvailability` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vCarType` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vAvgRating` varchar(255) NOT NULL DEFAULT '0.0',
  `iGcmRegId` text NOT NULL,
  `vImage` varchar(255) NOT NULL,
  `vCreditCard` varchar(255) NOT NULL,
  `vExpMonth` varchar(255) NOT NULL,
  `vExpYear` varchar(255) NOT NULL,
  `vCvv` varchar(255) NOT NULL,
  `iTripId` int(11) NOT NULL,
  `vTripStatus` varchar(50) NOT NULL DEFAULT 'NONE',
  `eStatus` enum('active','inactive','Deleted','Suspend') CHARACTER SET utf8 NOT NULL DEFAULT 'inactive',
  `vVat` varchar(10) NOT NULL,
  `eAccess` enum('Deaf','None') NOT NULL DEFAULT 'None',
  `vCountry` varchar(10) NOT NULL,
  `tLastOnline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tOnline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tSwitchOnline` datetime NOT NULL COMMENT 'Time when driver press online switch and becomes online',
  `vLicence` varchar(255) NOT NULL,
  `vNoc` varchar(255) NOT NULL,
  `vCerti` varchar(255) NOT NULL,
  `dLicenceExp` date NOT NULL,
  `eDeviceType` enum('Android','Ios') NOT NULL DEFAULT 'Android',
  `eDebugMode` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'This applies to IOS devices only',
  `vCurrencyDriver` varchar(255) NOT NULL,
  `tRegistrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `eSentNotification` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dSentNotification` date NOT NULL,
  `eDeliverModule` enum('Yes','No') NOT NULL DEFAULT 'No',
  `iAppVersion` int(11) NOT NULL DEFAULT 1,
  `vRefCode` varchar(50) NOT NULL,
  `dRefDate` datetime NOT NULL,
  `vPaymentEmail` varchar(500) CHARACTER SET utf8 NOT NULL,
  `vBankAccountHolderName` varchar(500) CHARACTER SET utf8 NOT NULL,
  `vAccountNumber` varchar(500) CHARACTER SET utf8 NOT NULL,
  `vBankLocation` varchar(500) CHARACTER SET utf8 NOT NULL,
  `vBankName` varchar(500) CHARACTER SET utf8 NOT NULL,
  `vBIC_SWIFT_Code` varchar(500) CHARACTER SET utf8 NOT NULL,
  `eEmailVerified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ePhoneVerified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `tProfileDescription` text CHARACTER SET utf8 NOT NULL,
  `vStripeToken` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vStripeCusId` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Working as cardUserKey for iyzipay payment gateway',
  `vBrainTreeToken` text CHARACTER SET utf8 NOT NULL,
  `vBrainTreeCustId` text CHARACTER SET utf8 NOT NULL,
  `vBrainTreeCustEmail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vPaymayaCustId` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vPaymayaToken` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vOmiseCustId` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vOmiseToken` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vAdyenToken` text CHARACTER SET utf8 NOT NULL,
  `vXenditAuthId` varchar(500) CHARACTER SET utf8 NOT NULL,
  `vXenditToken` varchar(500) CHARACTER SET utf8 NOT NULL,
  `vPasswordToken` varchar(255) NOT NULL,
  `eSignUpType` enum('Normal','Facebook','Twitter','Google','LinkedIn') NOT NULL DEFAULT 'Normal',
  `tSessionId` text CHARACTER SET utf8 NOT NULL,
  `vPassword_token` varchar(255) NOT NULL,
  `vRideCountry` varchar(10) NOT NULL,
  `tDeviceSessionId` text CHARACTER SET utf8 NOT NULL,
  `eFemaleOnlyReqAccept` enum('Yes','No') NOT NULL DEFAULT 'No',
  `vFirebaseDeviceToken` text NOT NULL,
  `eLogout` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `vTimeZone` varchar(255) NOT NULL,
  `tLocationUpdateDate` datetime NOT NULL,
  `vWorkLocation` text NOT NULL,
  `vWorkLocationLatitude` text NOT NULL,
  `vWorkLocationLongitude` text NOT NULL,
  `vWorkLocationRadius` varchar(200) NOT NULL,
  `eChangeLang` enum('Yes','No') NOT NULL DEFAULT 'No',
  `vVerificationCount` int(11) NOT NULL DEFAULT 0,
  `dSendverificationDate` datetime NOT NULL,
  `eSelectWorkLocation` enum('Dynamic','Fixed') CHARACTER SET utf8 NOT NULL DEFAULT 'Dynamic',
  `vVerificationCountEmergency` int(11) NOT NULL DEFAULT 0,
  `dSendverificationDateEmergency` datetime NOT NULL,
  `eIsFeatured` enum('Yes','No') NOT NULL DEFAULT 'No',
  `eIsBlocked` enum('Yes','No') NOT NULL DEFAULT 'No',
  `tBlockeddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eTestUser` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'This is not used',
  `vEmailVarificationCode` varchar(500) CHARACTER SET utf8 NOT NULL,
  `eEnableDemoLocDispatch` enum('Yes','No') NOT NULL DEFAULT 'No',
  `iAdvertBannerId` int(11) NOT NULL DEFAULT 0,
  `tSeenAdvertiseTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `vPoolDestLat` varchar(255) NOT NULL,
  `vPoolDestLang` varchar(255) NOT NULL,
  `eEnableServiceAtLocation` enum('Yes','No') NOT NULL DEFAULT 'No',
  `tApiFileName` text NOT NULL COMMENT 'Field is for name of api file',
  `tVersion` text NOT NULL COMMENT 'Field is for version name of application',
  `tDeviceData` text NOT NULL,
  `eDestinationMode` enum('Yes','No') NOT NULL DEFAULT 'No',
  `iDestinationCount` int(11) NOT NULL,
  `tDestinationModifiedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `BankStripeID` varchar(255) NOT NULL,
  `isFavurite` enum('Yes','No') NOT NULL DEFAULT 'No',
  `vBookingRefId` varchar(255) DEFAULT NULL,
  `booking_com_driver_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`iCurrencyId`);

--
-- Indexes for table `register_driver`
--
ALTER TABLE `register_driver`
  ADD PRIMARY KEY (`iDriverId`),
  ADD KEY `iCompanyId` (`iCompanyId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `iCurrencyId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `register_driver`
--
ALTER TABLE `register_driver`
  MODIFY `iDriverId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- Table structure for table `user_wallet`
--

CREATE TABLE `user_wallet` (
  `iUserWalletId` int(11) NOT NULL,
  `iUserId` int(11) NOT NULL,
  `eUserType` enum('Driver','Rider') NOT NULL,
  `iBalance` float(10,2) NOT NULL,
  `eType` enum('Credit','Debit') NOT NULL DEFAULT 'Credit',
  `iTripId` varchar(100) NOT NULL,
  `eFor` enum('Deposit','Booking','Refund','Withdrawl','Charges','Referrer') CHARACTER SET utf8 NOT NULL DEFAULT 'Deposit',
  `tDescription` text CHARACTER SET utf8 NOT NULL,
  `ePaymentStatus` enum('Settelled','Unsettelled') NOT NULL DEFAULT 'Unsettelled',
  `dDate` datetime NOT NULL,
  `fRatio_GBP` double(10,4) NOT NULL DEFAULT 1.0000,
  `fRatio_EUR` double(10,4) NOT NULL DEFAULT 1.0000,
  `fRatio_USD` double(10,4) NOT NULL DEFAULT 1.0000,
  `fRatio_AUD` double(10,4) NOT NULL DEFAULT 1.0000,
  `fRatio_CAD` double(10,4) NOT NULL DEFAULT 1.0000,
  `fRatio_INR` double(10,4) NOT NULL DEFAULT 1.0000,
  `fRatio_SAR` double(10,4) NOT NULL DEFAULT 1.0000,
  `fRatio_MAD` float(10,2) NOT NULL DEFAULT 0.00,
  `fRatio_AED` float(10,2) NOT NULL DEFAULT 0.00,
  `fRatio_CHF` float(10,2) NOT NULL DEFAULT 0.00,
  `fRatio_CNY` float(10,2) NOT NULL DEFAULT 0.00,
  `iOrderId` int(11) NOT NULL,
  `iTransactionId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_wallet`
--
ALTER TABLE `user_wallet`
  ADD PRIMARY KEY (`iUserWalletId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_wallet`
--
ALTER TABLE `user_wallet`
  MODIFY `iUserWalletId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
