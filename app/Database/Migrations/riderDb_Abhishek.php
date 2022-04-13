CREATE TABLE `register_user` (
  `iUserId` int(11) NOT NULL,
  `iCompanyId` int(10) NOT NULL,
  `iRefUserId` int(11) NOT NULL,
  `eRefType` enum('Driver','Rider') NOT NULL,
  `vFbId` varchar(100) NOT NULL DEFAULT '0',
  `iHotelId` int(11) NOT NULL,
  `vName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vLastName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vEmail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vPassword` varchar(255) NOT NULL,
  `vCountry` varchar(10) NOT NULL,
  `vState` varchar(255) NOT NULL,
  `vPhone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `eGender` enum('','Male','Female') CHARACTER SET utf8 NOT NULL,
  `vCreditCard` varchar(255) NOT NULL,
  `dBirthDate` date NOT NULL,
  `vExpMonth` varchar(255) NOT NULL,
  `vExpYear` varchar(255) NOT NULL,
  `vCvv` varchar(255) NOT NULL,
  `vImgName` varchar(255) NOT NULL,
  `vAvgRating` varchar(100) NOT NULL DEFAULT '0.0',
  `vLogoutDev` enum('true','false') NOT NULL DEFAULT 'false',
  `iGcmRegId` text NOT NULL,
  `vCallFromDriver` varchar(100) CHARACTER SET utf8 NOT NULL,
  `iTripId` int(11) NOT NULL DEFAULT 0 COMMENT 'Link with trips',
  `vTripStatus` varchar(25) NOT NULL DEFAULT 'NONE' COMMENT 'Link with trips ''iActive''',
  `vTripPaymentMode` enum('Cash','Paypal','NONE','Card') NOT NULL DEFAULT 'NONE',
  `iSelectedCarType` int(11) NOT NULL,
  `fPickUpPrice` float NOT NULL DEFAULT 1,
  `fNightPrice` float NOT NULL DEFAULT 1,
  `tDestinationLatitude` text NOT NULL,
  `tDestinationLongitude` text NOT NULL,
  `tDestinationAddress` text CHARACTER SET utf8 NOT NULL,
  `vInviteCode` varchar(100) NOT NULL,
  `vCouponCode` varchar(255) NOT NULL,
  `vLang` varchar(10) NOT NULL,
  `eStatus` enum('Active','Inactive','Deleted') CHARACTER SET utf8 NOT NULL DEFAULT 'Active',
  `vPhoneCode` varchar(10) CHARACTER SET utf8 NOT NULL,
  `vZip` varchar(255) NOT NULL,
  `vPassToken` varchar(255) NOT NULL,
  `eDeviceType` enum('Android','Ios') NOT NULL DEFAULT 'Android',
  `eDebugMode` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'This applies to IOS devices only',
  `vCurrencyPassenger` varchar(300) NOT NULL,
  `tRegistrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `iCabBookingId` int(11) NOT NULL COMMENT 'related to cab_booking ',
  `vStripeToken` varchar(255) NOT NULL,
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
  `eType` enum('Ride','Deliver','UberX') NOT NULL DEFAULT 'Ride',
  `iPackageTypeId` int(11) NOT NULL,
  `vReceiverName` varchar(50) NOT NULL,
  `vReceiverMobile` varchar(50) NOT NULL,
  `tPickUpIns` text NOT NULL,
  `tDeliveryIns` text NOT NULL,
  `tPackageDetails` text NOT NULL,
  `eDeliverModule` enum('Yes','No') NOT NULL DEFAULT 'No',
  `iUserPetId` int(11) NOT NULL DEFAULT 0,
  `iAppVersion` int(11) NOT NULL DEFAULT 1,
  `vRefCode` varchar(50) NOT NULL,
  `dRefDate` datetime NOT NULL,
  `vLatitude` varchar(100) NOT NULL,
  `vLongitude` varchar(100) NOT NULL,
  `tLastOnline` varchar(100) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `eEmailVerified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ePhoneVerified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `iQty` int(11) NOT NULL DEFAULT 1,
  `iUserVehicleId` int(11) NOT NULL,
  `vPasswordToken` varchar(255) NOT NULL,
  `eSignUpType` enum('Normal','Facebook','Twitter','Google') NOT NULL DEFAULT 'Normal',
  `tSessionId` text CHARACTER SET utf8 NOT NULL,
  `vPassword_token` varchar(255) NOT NULL,
  `vRideCountry` varchar(10) NOT NULL,
  `tDeviceSessionId` text CHARACTER SET utf8 NOT NULL,
  `eHail` enum('Yes','No') NOT NULL DEFAULT 'No',
  `vFirebaseDeviceToken` text NOT NULL,
  `fTollPrice` float NOT NULL DEFAULT 0,
  `vTollPriceCurrencyCode` varchar(300) NOT NULL,
  `eTollSkipped` enum('Yes','No') NOT NULL DEFAULT 'No',
  `vTimeZone` varchar(255) NOT NULL,
  `eLogout` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `eIsBlocked` enum('Yes','No') NOT NULL DEFAULT 'No',
  `tBlockeddate` varchar(100) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tLocationUpdateDate` datetime NOT NULL,
  `eIs_Kiosk` enum('Yes','No') CHARACTER SET utf8 NOT NULL DEFAULT 'No',
  `eChangeLang` enum('Yes','No') NOT NULL DEFAULT 'No',
  `vVerificationCount` int(11) NOT NULL DEFAULT 0,
  `dSendverificationDate` datetime NOT NULL,
  `fTripsOutStandingAmount` float NOT NULL DEFAULT 0,
  `vVerificationCountEmergency` int(11) NOT NULL DEFAULT 0,
  `dSendverificationDateEmergency` datetime NOT NULL,
  `eOutstandingAdjustment` enum('Yes','No') NOT NULL DEFAULT 'No',
  `eTestUser` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'This is not used',
  `vEmailVarificationCode` varchar(500) CHARACTER SET utf8 NOT NULL,
  `eReviewModeLogin` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'This apply to IOS app only',
  `iAdvertBannerId` int(11) NOT NULL DEFAULT 0,
  `tSeenAdvertiseTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `tApiFileName` text NOT NULL COMMENT 'Field is for name of api file',
  `tVersion` text NOT NULL COMMENT 'Field is for version name of application',
  `tDeviceData` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`iUserId`, `iCompanyId`, `iRefUserId`, `eRefType`, `vFbId`, `iHotelId`, `vName`, `vLastName`, `vEmail`, `vPassword`, `vCountry`, `vState`, `vPhone`, `eGender`, `vCreditCard`, `dBirthDate`, `vExpMonth`, `vExpYear`, `vCvv`, `vImgName`, `vAvgRating`, `vLogoutDev`, `iGcmRegId`, `vCallFromDriver`, `iTripId`, `vTripStatus`, `vTripPaymentMode`, `iSelectedCarType`, `fPickUpPrice`, `fNightPrice`, `tDestinationLatitude`, `tDestinationLongitude`, `tDestinationAddress`, `vInviteCode`, `vCouponCode`, `vLang`, `eStatus`, `vPhoneCode`, `vZip`, `vPassToken`, `eDeviceType`, `eDebugMode`, `vCurrencyPassenger`, `tRegistrationDate`, `iCabBookingId`, `vStripeToken`, `vStripeCusId`, `vBrainTreeToken`, `vBrainTreeCustId`, `vBrainTreeCustEmail`, `vPaymayaCustId`, `vPaymayaToken`, `vOmiseCustId`, `vOmiseToken`, `vAdyenToken`, `vXenditAuthId`, `vXenditToken`, `eType`, `iPackageTypeId`, `vReceiverName`, `vReceiverMobile`, `tPickUpIns`, `tDeliveryIns`, `tPackageDetails`, `eDeliverModule`, `iUserPetId`, `iAppVersion`, `vRefCode`, `dRefDate`, `vLatitude`, `vLongitude`, `tLastOnline`, `eEmailVerified`, `ePhoneVerified`, `iQty`, `iUserVehicleId`, `vPasswordToken`, `eSignUpType`, `tSessionId`, `vPassword_token`, `vRideCountry`, `tDeviceSessionId`, `eHail`, `vFirebaseDeviceToken`, `fTollPrice`, `vTollPriceCurrencyCode`, `eTollSkipped`, `vTimeZone`, `eLogout`, `eIsBlocked`, `tBlockeddate`, `tLocationUpdateDate`, `eIs_Kiosk`, `eChangeLang`, `vVerificationCount`, `dSendverificationDate`, `fTripsOutStandingAmount`, `vVerificationCountEmergency`, `dSendverificationDateEmergency`, `eOutstandingAdjustment`, `eTestUser`, `vEmailVarificationCode`, `eReviewModeLogin`, `iAdvertBannerId`, `tSeenAdvertiseTime`, `tApiFileName`, `tVersion`, `tDeviceData`) VALUES
(1, 0, 0, '', '10216426366785437', 0, 'Deepak', 'Verma', 'abhi.av728@gmail.com', '', 'FR', '', '9592660455', '', '', '0000-00-00', '', '', '', '10216426366785437.jpg', '0.0', 'false', '', '', 0, 'NONE', 'NONE', 0, 1, 1, '', '', '', '', '', 'FR', 'Active', '33', '', '', 'Android', 'No', 'EUR', '2019-07-10 06:14:05', 0, '', '', '', '', '', '', '', '', '', '', '', '', 'Ride', 0, '', '', '', '', '', 'No', 0, 1, 'pr17fop6245', '2019-07-10 11:44:29', '', '', '0000-00-00 00:00:00', 'No', 'No', 1, 0, '', 'Facebook', '', '', '', '', 'No', '', 0, '', 'No', '', 'Yes', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'No', 'Yes', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 'No', 'No', '', 'No', 0, '2019-07-10 08:14:05', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`iUserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `iUserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
