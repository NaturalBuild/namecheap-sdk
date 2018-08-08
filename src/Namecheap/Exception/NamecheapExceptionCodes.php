<?php 

namespace Namecheap\Exception;

class NamecheapExceptionCodes {
	
	public static self::$ncErrorCodes = [
	    # Common for all commands
	    'globalErrorCodes' => [
	    	1010101 => 	'Parameter APIUser is missing',
			1030408 => 	'Unsupported authentication type',
			1010104 => 	'Parameter Command is missing',
			1010102 =>  'Parameter APIKey is missing',
			1011102 =>  'Parameter APIKey is missing',
			1010105 =>  'Parameter ClientIP is missing',
			1011105 =>  'Parameter ClientIP is missing',
			1050900 => 	'Unknown error when validating APIuser',
			1011150 => 	'Parameter RequestIP is invalid',
			1017150 => 	'Parameter RequestIP is disabled or locked',
			1017105 => 	'Parameter ClientIP is disabled or locked',
			1017101 => 	'Parameter ApiUser is disabled or locked',
			1017410 => 	'Too many declined payments',
			1017411 => 	'Too many login attempts',
			1019103 => 	'Parameter UserName is not available',
			1016103 => 	'Parameter UserName is unauthorized',
			1017103 => 	'Parameter UserName is disabled or locked',
	    ],
		
		# namecheap.domains.getList
		5019169 =>	'Unknown exceptions while retriving Domain list',

		# namecheap.domains.getContacts
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associate with your account',
		4019337 => 'Unable to retrieve domain contacts',
		3016166 => 'Domain is not associate with Enom',
		3019510 => 'This domain has either expired/ was transferred out/ is not associated with your account',
		3019510 => 'Error response from provider',
		3050900 => 'Unknown response from provider',
		5050900 => 'Unknown exceptions',

		# namecheap.domains.create
		2033409 => 'Possibly a logical error in authentication phase. The order chargeable for Username is not found',
		2033407 =>  'Cannot enable Whoisguard when AddWhoisguard is set as NO',
		2033270 =>  'Cannot enable Whoisguard when AddWhoisguard is set as NO',
		2015267 => 'EUAgreeDelete option should not be set as NO',
		2011170 => 'Validation error from PromotionCode',
		2015182 => 'The contact phone is invalid. The phone number format is +NNN.NNNNNNNNNN',
		2011280 => 'Validation error from TLD',
		2015167 => 'Validation error from Years',
		2030280 => 'TLD is not supported in API',
		2011168 => 'Nameservers are not valid',
		2011322 => 'Extended Attributes are not Valid',
		2010323 => 'Check required field for billing domain contacts',
		2528166 => 'Order creation failed',
		3019166 =>  'Domain not available',
		4019166 =>  'Domain not available',
		3031166 => 'Error while getting information from provider',
		3028166 => 'Error from Enom ( Errcount <> 0 )',
		3031900 => 'Unknown Response from provider',
		4023271 => 'Error while adding free positive ssl for the domain',
		3031166 => 'Error while getting Domin status from Enom',
		4023166 => 'Error while adding domain',
		5050900 => 'Unknown error while adding domain to your account',
		4026312 => 'Error in refunding funds',
		5026900 => 'Unknown exceptions error while refunding funds',

		# namecheap.domains.getTldList
		2011166	=> 'UserName is invalid',
		3050900	=> 'Unknown response from provider',

		# namecheap.domains.setContacts
		2019166 => 'Domain not found',
		2030166 => 'Edit permission for domain is not supported',
		2010324 => 'Registrant contacts such as firstname, lastname etc are missing',
		2015182 => 'The contact phone is invalid. The phone number format is +NNN.NNNNNNNNNN',
		2010325 => 'Tech contacts such as firstname, lastname etc are missing',
		2010326 => 'Admin contacts such as firstname, lastname etc are missing',
		2010327 => 'AuxBilling contacts such as firstname, lastname etc are missing',
		2016166 => 'Domain is not associated with your account',
		2011280 => 'Cannot see the contact information for your TLD',
		4022323 => 'Error from retrieving domain Contacts',
		2011323 => 'Error retrieving domain Contacts from Enom (Invalid errors)',
		3031510 => 'Error From Enom when error count <>0',
		3050900 => 'Unknown error from Enom',

		'namecheap.domains.check' => [
			3031510	=> 'Error response from Enom when the error count != 0',
			3011511	=> 'UnKnown response from Provider',
		],
		

		# namecheap.domains.reactivate
		2033409	=> 'Possibly a logical error in authentication phase. Order chargeable for Username is not found',
		2019166 => 'Domain not found',
		2030166 => 'Edit permission for Domain is not supported',
		2011170 => 'Promotion Code is invalid',
		2011280 => 'TLD is invalid',
		2528166 => 'Order creation failed',
		3024510 => 'Error Response from Enom while updating domain',
		3050511 => 'Unknown error response from Enom',
		2020166 => 'Domain does not meet the expire date',
		2016166 => 'Domain is not associate with your account',
		5050900 => 'Unhandled exceptions',
		4024166 => 'Failed to update domain in your account',

		# namecheap.domains.renew
		2033409 => 'Possibly a logical error in authentication phase. Order chargeable for ,Username is not found',
		2011170 => 'Promotion Code is invalid',
		2011280 => 'TLD is invalid',
		2528166 => 'Order creation failed',
		2020166 => 'Domain has expired.Please reactivate your domain',
		3028166 => 'Failed to renew error from Enom',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',
		2016166 => 'Domain is not associated with your account',
		4024167 => 'Failed to update years for your domain',
		4023166 => 'Error occured while domain renewal',
		4022337 => 'Error in refunding funds',

		# namecheap.domains.getRegistrarLock
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associate with your account',
		3031510 => 'Error response from provider when errorcount !=0',
		3050900 => 'Unknown error response from Enom',
		5050900 => 'Unknown exceptions',

		# namecheap.domains.setRegistrarLock
		2015278 => 'Invalid data specified for LockAction',
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associate with your account',
		3031510 => 'Error From Enom when Errorcount <> 0',
		2030166 => 'Edit permission for Domain is not supported',
		3050900 => 'Unknown error response from Enom',
		5050900 => 'Unknown exceptions',

		# namecheap.domains.getInfo
		5019169	=> 'Unknown exceptions',

		# namecheap.domains.dns.setDefault
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associated with your account',
		2030166 => 'Edit permission for domain is not supported',
		3013288 => 'Too many records',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',
		4022288 => 'Unable to get nameserver list',

		# namecheap.domains.dns.setCustom
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associated with your account',
		2030166 => 'Edit permission for domain is not supported',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',
		4022288 => 'Unable to get nameserver list',

		# namecheap.domains.dns.getList
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associated with your account',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',
		4022288 => 'Unable to get nameserver list',

		# namecheap.domains.dns.getHosts
		2019166 => 'Domain not found',
		2030166 => 'Edit Permission for Domainname is not supported',
		4023330 => 'Unable to get DNS hosts from list',
		3031510 => 'Error From Enom when Errorcount <> 0',
		2030288 => 'Cannot complete this command as this domain is not using proper DNS servers',
		3050900 => 'Unknown error from Enom',
		3011288 => 'Invalid nameserver specified',
		5050900 => 'Unhandled Exceptions',

		# namecheap.domains.dns.setHosts
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associated with your account',
		2030166 => 'Edit Permission for domain is not supported',
		3013288 => 'Too many records',
		4013288 => 'Too many records',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',
		4022288 => 'Unable to get nameserver list',

		# namecheap.domains.dns.getEmailForwarding
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associated with your account',
		2030166 => 'Edit Permission for domain is not supported',
		3013288 => 'Too many records',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',
		2030288 => 'Cannot complete this command as this domain is not using proper DNS servers',
		4022288 => 'Unable to get nameserver list',

		# domains.ns.create
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associated with your account',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',

		# domains.ns.update
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associated with your account',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',

		# domains.ns.delete
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associated with your account',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',

		# domains.ns.getInfo
		2019166 => 'Domain not found',
		2016166 => 'Domain is not associated with your account',
		3031510 => 'Error From Enom when Errorcount <> 0',
		3050900 => 'Unknown error from Enom',

		# domains.transfer.create
		2033409 => 'Possibly a logical error in authentication phase. Order chargeable for Username is not found',
		2011170 => 'Validation error from promotion code',
		2011280 => 'TLD is not valid',
		2030280 => 'TLD is not supported for API',
		2528166 => 'Order creation failed',
		5050900 => 'Unhandled exceptions',

		# domains.transfer.updateStatus
		4019329 => 'TransferStatus not available',
		2010293 => 'No Action Specified',
		5050900 => 'Unhandled exceptions',

		# domains.transfer.getList
		4019329 => 'TransferStatus not available',
		2010293 => 'No Action Specified',
		5050900 => 'Unhandled exceptions',

		# domains.transfer.getStatus
		4019329 => 'TransferStatus not available',
		5050900 => 'Unhandled exceptions',

		# namecheap.users.changePassword
		2015103 => 'Cannot change UserName and ResetCode at a time',
		2010302 => 'OldPassword is missing',
		2010103 => 'UserName is missing',
		2010303 => 'ResetCode is missing',
		4011331 => 'Invalid status',
		4022335 => 'Unable to change password',
		5050900 => 'Unhandled exceptions',

		# namecheap.users.login
		2011335	=> 'Parameter Password is missing',
		2019166	=> 'UserName is not available',
		2010335	=> 'Invalid password',
		2017166	=> 'User is disabled or locked',
		2013410	=> 'Too many declined payments',
		2017289	=> 'Parameter IP Blocked',
		2011166	=> 'UserName is invalid',
		5050900	=> 'Unhandled exceptions',

		# namecheap.users.getAddFundsStatus
		2012342 => 'TokenID mismatch',
		5050900 => 'Unknown Exceptions',

		# namecheap.users.createAddfundsRequest
		2030343 => 'Parameter PaymentType is unsupported',
		2019103 => 'Username not found',
		2015312 => 'Minimum amount should be added',
		2013312 => 'Amount is out of range',
		2029341 => 'Credit card not approved',
		5050900 => 'Unknown Exceptions',

		# namecheap.users.getBalances
		4022312 => 'Balance information is not available',

		# namecheap.users.getPricing
		2011170	=> 'PromotionCode is invalid',
		2011298	=> 'ProductType is invalid',

		# namecheap.users.resetPassword
		2011315 => 'FindBy is invalid',
		4027153 => 'Failed to send email',
		4022335 => 'Unable to reset password',
		5050900 => 'Unhandled exceptions',

		# namecheap.users.update
		4011331 => 'StatusCode for update is invalid',
		4024103 => 'Failed to update user',
		2015182 => 'The contact phone is invalid. The phone number format is +NNN.NNNNNNNNNN',

		# namecheap.users.address.create
		4011331 => 'StatusCode for create is invalid',
		2015182 => 'The contact phone is invalid. The phone number format is +NNN.NNNNNNNNNN',
		4023336 => 'Failed to add user\'s address',

		# namecheap.users.address.delete
		4011331	=> 'StatusCode for delete is invalid',
		4023336	=> 'Failed to delete user\'s address',

		# namecheap.users.address.getInfo
		4011331	=> 'StatusCode for getInfo is invalid',
		4022336	=> 'Failed to retrieve user\'s address',

		# namecheap.users.address.getList
		4011331	=> 'StatusCode for update is invalid',

		# namecheap.users.address.update
		4011331	=> 'StatusCode for update is invalid',
		4024336	=> 'Failed to update user\'s address',
		2015182	=> 'The contact phone is invalid. The phone number format is +NNN.NNNNNNNNNN',

		# namecheap.users.address.setDefault
		4023336	=> 'Failed to get set default user\'s address',

		# namecheap.ssl.activate
		2010326 => 'Error while validating administrative address',
		2011294 => 'CertificateID is invalid',
		4011294 => 'CertificateID is invalid',
		2019331 => 'Certificate status is not available',
		4020294 => 'Activation period for this certificate is over',
		4011331 => 'Certificate status is invalid',
		4011297 => 'WebServerType is invalid',
		2011297 => 'WebServerType is invalid',
		3011166 => 'Invalid renewal order domain',
		3011296 => 'The CSR provided is invalid',
		4024295 => 'Unable to update ApproverEmail in database',
		4024331 => 'Unable to update status in database',
		3028301 => 'Failed to purchase certificate',
		3011295 => 'ApproverEmail is not valid',
		2015182 => 'The contact phone is invalid. The phone number format is +NNN.NNNNNNNNNN',
		2011300 => 'Validation for True Business with EV',
		2030332 => 'Config file value does not support for activation',
		2010297 => 'WebServerType is missing',
		4011296 => 'CSR invalid error from Provider',
		4024294 => 'Failed to update CertificateID',
		4027295 => 'Failed to send ApproverEmail',
		2011510 => 'Partner name is invalid',
		5050900 => 'Unhandled exceptions',
		2011333 => 'xmlfile is missing error while getting xml form from filepath and xmlstring from config file',
		4050900 => 'Unhandled exception from database error',

		# namecheap.ssl.create
		2033409 => 'Possibly a logical error in authentication phase. Order chargeable for Username is not found',
		2015167 => 'Number of years should be maximum 10',
		2011301 => 'SSLType is invalid',
		2011170 => 'Promotion code is invalid',
		4011299 => 'The Purchasevalidationid already exists.The certificate cannot be created',
		2528166 => 'Order creation failed',
		5050900 => 'Unhandled exceptions',

		# namecheap.ssl.reissue
		2010326 'Error while validating administrative address',
		2011294 'CertificateID is invalid',
		4011294 'CertificateID is invalid',
		2019331 'Certificate status is not available',
		4011331 'Certificate status is invalid',
		4011297 'WebServerType is invalid',
		2011297 'WebServerType is invalid',
		3011166 'Invalid renewal order domain',
		3011296 'The CSR provided is invalid',
		4024295 'Unable to update ApproverEmail in database',
		4024331 'Unable to update status in database',
		3028301 'Failed to purchase certificate',
		3011295 'ApproverEmail is not valid',
		2015182 'The contact phone is invalid. The phone number format is +NNN.NNNNNNNNNN',
		2011300 'Validation for True Business with EV',
		2030332 'Config file value does not support for activation',
		2010297 'WebServerType is missing',
		4011296 'CSR invalid error from Provider',
		4024294 'Failed to update CertificateID',
		4027295 'Failed to send ApproverEmail',
		2011510 'Partner name is invalid',
		5050900 'Unhandled exceptions',
		2011333 'xmlfile is missing error while getting xml form from filepath and xmlstring from config file',
		4050900 'Unhandled exception from database error',

		# namecheap.ssl.getApproverEmailList
		2011296 => 'CSR is invalid',
		2011300 => 'CertificateType is invalid',
		4011300 => 'CertificateType is invalid',
		2011166 => 'DomainName is invalid',
		3022295 => 'Failed to retrieve ApproverEmail',
		5050900 => 'Unhandled exceptions',

		# namecheap.ssl.getInfo
		2011294 => 'CertificateID is invalid',
		5050900 => 'Unhandled exceptions',

		# namecheap.ssl.parseCSR
		2011300	=> 'CertificateType is invalid',
		3022296	=> 'Failed to retrieve CSR details from provider',
		5050900	=> 'Unhandled exceptions',

		# namecheap.ssl.getList
		2011272	=> 'ListType is invalid',
		5050900	=> 'Unhandled exceptions',

		# namecheap.ssl.renew
		2033409 => 'Possibly a logical error in authentication phase. Order chargeable for Username is not found',
		2015167 => 'Number of years should be maximum 10',
		2011301 => 'SSLType is invalid',
		2011170 => 'Promotion code is invalid',
		4011294 => 'CertificateID is invalid',
		2528166 => 'Order creation failed',
		5050900 => 'Unhandled exceptions',

		# namecheap.ssl.resendApproverEmail
		2011294 => 'CertificateID is invalid',
		2011331 => 'Status is invalid',
		3011295 => 'ApproverEmail is invalid',
		5050900 => 'Unhandled exceptions',

		# namecheap.ssl.resendFullfillmentEmail
		2011294	=> 'CertificateID is invalid',
		2011331	=> 'Status is invalid',
		3022334	=> 'Failed to resend fulfillment email',
		5050900	=> 'Unhandled exceptions',

		# namecheap.ssl.purchasemoresans
		2033409 => 'Possibly a logical error in authentication phase. Order chargeable for Username is not found',
		2015167 => 'Number of years should be maximum 10',
		2011301 => 'SSLType is invalid',
		2011170 => 'Promotion code is invalid',
		4011299 => 'The Purchasevalidationid already exists.The certificate cannot be created',
		2528166 => 'Order creation failed',
		5050900 => 'Unhandled exceptions',

		# namecheap.ssl.revokecertificate
		4011331	=> 'Status is invalid',
		2011300	=> 'Wrong SSL certificate selection. The type provided is not supported by command',

		# namecheap.whoisguard.changeEmailAdrress
		2011331	=> 'WhoisGuard does not exists (or) WhoisGuard is not associated with any domain (or) WhoisGuard is not associated with this user',

		# namecheap.whoisguard.enable
		2011331	=> 'WhoisGuard does not exists (or) WhoisGuard is not associated with any domain (or) WhoisGuard is not associated with this user',
		2011369	=> 'Error WhoisGuard forwarded Email address is not valid',

		# namecheap.whoisguard.disable
		2011331	=> 'WhoisGuard does not exists (or) WhoisGuard is not associated with any domain (or) WhoisGuard is not associated with this user',

		# namecheap.whoisguard.unallot
		2011331	=> 'WhoisGuard is not associated with any domain. So cannot unallot the WhoisGuard (or) WhoisGuard does not exists. So cannot unallot the WhoisGuard (or) WhoisGuard is not associated with this user. So cannot unallot the WhoisGuard',

		# namecheap.whoisguard.discard
		2011331	=> 'WhoisGuard is not associated with this user, WhoisGuard is not discarded due to associated with domain',

		# namecheap.whoisguard.allot
		2011331	=> 'WHOISGUARD ALREADY EXISTS FOR THIS DOMAIN (or) THIS WHOISGUARD ALREADY ASSOCIATED WITH ANOTHER DOMAIN (or) WhoisGuard is not associated with this user (or) WHOISGUARD EXPIRED OR WHOISGUARD IS NOT IN USE',
		2011369	=> 'WhoisGuard forwarded Email address is not valid',
		2011280 => 'WhoisGuard cannot be alloted/enabled for this domain',

	];

}

?>