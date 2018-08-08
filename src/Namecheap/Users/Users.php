<?php 

namespace Namecheap\Users;

use Namecheap\Api;
use Namecheap\Exception\NamecheapException;
/**
 * Namecheap API wrapper
 *
 * Method Users
 * Manage Users
 *
 * @author Saddam Hossain <saddamrhossain@gmail.com>
 *
 * @version 1
 */
class Users extends Api {

	protected $command = 'namecheap.users.';

	/**
	 * @todo Returns pricing information for a requested product type.
	 *
	 * @param str|ProductType|req : Product Type to get pricing information
	 * @param str|ProductCategory|opt : Specific category within a product type
	 * @param str|PromotionCode|opt : Promotional (coupon) code for the user
	 * @param str|ActionName|opt : Specific action within a product type
	 * @param str|ProductName|opt : The name of the product within a product type
	 * 
	 * @note : Possible values for ProductType, ProductCategory, ActionName and ProductName parameters:
	 * DOMAIN : ActionName -> REGISTER,RENEW,REACTIVATE,TRANSFER
	 * SSLCERTIFICATE : ActionName -> PURCHASE,RENEW
	 * WHOISGUARD : ActionName -> PURCHASE,RENEW
	 */
	public function getPricing($productType='DOMAIN', $productCategory=null, $promotionCode=null, $actionName=null, $productName=null) {
		$data = [
			'ProductType' => $productType,
			'ProductCategory' => $productCategory,
			'PromotionCode' => $promotionCode,
			'ActionName' => $actionName,
			'ProductName' => $productName,
		];
		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Gets information about fund in the user's account.This method returns the following information: Available Balance, Account Balance, Earned Amount, Withdrawable Amount and Funds Required for AutoRenew.
	 */
	public function getBalances() {
		return $this->get($this->command.__FUNCTION__);
	}

	/**
	 * @todo Changes password of the particular user's account.
	 * @param str|OldPassword/ResetCode| req : Old password of the user/The password reset code you get after calling namecheap.users.resetpassword API
	 * @param str|NewPassword|req : New password of the user
	 */
	public function changePassword($oldPasswordOrResetCode, $newPassword, $resetPass=false) {
		if ($resetPass) {
			$data = ['ResetCode' => $oldPasswordOrResetCode, 'NewPassword' => $newPassword];
			$this->userName = null; // UserName should be omitted for this API call.All other Global parameters must be included.
		} else {
			$data = ['OldPassword' => $oldPasswordOrResetCode, 'NewPassword' => $newPassword];
		}
		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Updates user account information for the particular user.
	 *
	 * @param str|FirstName|req 	: First name of the user
	 * @param str|LastName|req 		: Last name of the user
	 * @param str|Address1|req 		: StreetAddress1 of the user
	 * @param str|City|req 			: City of the user
	 * @param str|StateProvince|req : State/Province of the user
	 * @param str|Zip|req 			: Zip/Postal code of the user
	 * @param str|Country|req 		: Two letter country code of the user
	 * @param str|EmailAddress|req 	: Email address of the user
	 * @param str|Phone|req 		: Phone number in the format +NNN.NNNNNNNNNN
	 *
	 * @param str|JobTitle|opt 		: Job designation of the user
	 * @param str|Organization|opt 	: Organization of the user
	 * @param str|Address2|opt 		: StreetAddress2 of the user
	 * @param str|PhoneExt|opt 		: PhoneExt of the user
	 * @param str|Fax|opt 			: Fax number in the format +NNN.NNNNNNNNNN

	 */
	public function update(array $param) {

		$requiredParams = ['FirstName', 'LastName', 'Address1', 'City', 'StateProvince', 'Zip', 'Country', 'EmailAddress', 'Phone'];

		$data = [
			'FirstName' 	=> !empty($param['firstName']) ? $param['firstName'] : null,
			'LastName' 		=> !empty($param['lastName']) ? $param['lastName'] : null,
			'Address1' 		=> !empty($param['address1']) ? $param['address1'] : null,
			'City' 			=> !empty($param['city']) ? $param['city'] : null,
			'StateProvince' => !empty($param['stateProvince']) ? $param['stateProvince'] : null,
			'Zip' 			=> !empty($param['zip']) ? $param['zip'] : null,
			'Country' 		=> !empty($param['country']) ? $param['country'] : null,
			'EmailAddress' 	=> !empty($param['emailAddress']) ? $param['emailAddress'] : null,
			'Phone' 		=> !empty($param['phone']) ? $param['phone'] : null,
			
			'JobTitle' 		=> !empty($param['jobTitle']) ? $param['jobTitle'] : null,
			'Organization' 	=> !empty($param['organization']) ? $param['organization'] : null,
			'Address2' 		=> !empty($param['address2']) ? $param['address2'] : null,
			'PhoneExt' 		=> !empty($param['phoneExt']) ? $param['phoneExt'] : null,
			'Fax' 			=> !empty($param['fax']) ? $param['fax'] : null,
		];

		$reqFields = $this->checkRequiredFields($data, $requiredParams);
		if (count($reqFields)) {
			$flist = implode(', ', $reqFields);
			throw new \Exception($flist . " : these fields are required!", 2010324);
		}

		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Creates a request to add funds through a credit card
	 *
	 * @param str|Username|req 		: Username to add funds to
	 * @param str|PaymentType|req 	: Allowed payment value: Creditcard
     * @param num|Amount|req  		: Amount to add
	 * @param str|ReturnUrl|req 	: A valid URL to which the user should be redirected once payment is complete
	 
	 * ### 3 steps to adding funds:
		#### Step 1: Make your application call namecheap.users.createaddfundsrequest command (as shown in the example request given below).

		#### Step 2: If your API call is executed successfully, you will see an XML response with Tokenid, ReturnURL and RedirectURL (as shown in the example response given below).

		A Tokenid is a unique alphanumeric value. The Tokenid can be used to find out if funds were added successfully or if there was an error adding funds. The RedirectURL should be used to submit credit card details.

		#### Step 3: Make your application to programmatically redirect customer to the RedirectURL so that the customer can submit credit card details.

		Once payment is processed, you will be automatically redirected to the URL you've specified in the createaddfundsrequest call.
	 */
	public function createaddfundsrequest($username, $paymentType, $amount, $returnUrl) {
		$this->userName = null; // make the user name null by default
		$data = [
			'username' => $username, 
			'paymentType' => $paymentType, 
			'amount' => $amount, 
			'returnUrl' => $returnUrl,
		];
		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Gets the status of add funds request.
	 *
	 * @param str|TokenId|req : The Unique ID that you received after calling namecheap.users.createaddfundsrequest method
	 */
	public function getAddFundsStatus($tokenId) {
		return $this->get($this->command.__FUNCTION__, ['TokenId' => $tokenId]);
	}

	/**
	 * @todo Creates a new account at NameCheap under this ApiUser.
	 *
	 *
	 * @param str|NewUserName|req : Username for the new user account
	 * @param str|NewUserPassword|req : Password for the new user account
	 * @param str|EmailAddress|req : Email address of the user
	 * @param str|FirstName|req : First name of the user
	 * @param str|LastName|req : Last name of the user 
	 * @param num|AcceptTerms|req : Terms of agreement. The Value should be 1 for user account creation. Default Value: 1
	 * @param str|Address1|req : StreetAddress1 of the user
	 * @param str|City|req : City of the user
	 * @param str|StateProvince|req : State/Province of the user
	 * @param str|Zip|req : Zip/Postal code of the user
	 * @param str|Country|req : Two letter country code of the user
	 * @param str|Phone|req : Phone number in the format +NNN.NNNNNNNNNN
	 *
	 * @param str|IgnoreDuplicateEmailAddress|opt : By default, it ignores to check if the email address is already in use. Default Value: Yes
	 * @param num|AcceptNews|opt : Possible values are 0 and 1. Value should be 1 if the user wants to recieve newsletters else it should be 0.
	 * @param str|JobTitle|opt : Job designation of the user
	 * @param str|Organization|opt : Organization of the user
	 * @param str|Address2|opt : StreetAddress2 of the user
	 * @param str|PhoneExt|opt : PhoneExt of the user
	 * @param str|Fax|opt : Fax number in the format +NNN.NNNNNNNNNN
	 */
	public function create(array $param) {
		$requiredParams = ['NewUserName', 'NewUserPassword', 'EmailAddress', 'FirstName', 'LastName', 'AcceptTerms', 'Address1', 'City', 'StateProvince', 'Zip', 'Country', 'Phone'];

		$data = [
			'NewUserName' 	=> !empty($param['newUserName']) ? $param['newUserName'] : null,
			'NewUserPassword' 	=> !empty($param['newUserPassword']) ? $param['newUserPassword'] : null,
			'EmailAddress' 	=> !empty($param['emailAddress']) ? $param['emailAddress'] : null,
			'FirstName' 	=> !empty($param['firstName']) ? $param['firstName'] : null,
			'LastName' 	=> !empty($param['lastName']) ? $param['lastName'] : null,
			'AcceptTerms' 	=> !empty($param['acceptTerms']) ? $param['acceptTerms'] : null,
			'Address1' 	=> !empty($param['address1']) ? $param['address1'] : null,
			'City' 	=> !empty($param['city']) ? $param['city'] : null,
			'StateProvince' 	=> !empty($param['stateProvince']) ? $param['stateProvince'] : null,
			'Zip' 	=> !empty($param['zip']) ? $param['zip'] : null,
			'Country' 	=> !empty($param['country']) ? $param['country'] : null,
			'Phone' 	=> !empty($param['phone']) ? $param['phone'] : null,

			'IgnoreDuplicateEmailAddress' 	=> !empty($param['ignoreDuplicateEmailAddress']) ? $param['ignoreDuplicateEmailAddress'] : null,
			'AcceptNews' 	=> !empty($param['acceptNews']) ? $param['acceptNews'] : null,
			'JobTitle' 	=> !empty($param['jobTitle']) ? $param['jobTitle'] : null,
			'Organization' 	=> !empty($param['organization']) ? $param['organization'] : null,
			'Address2' 	=> !empty($param['address2']) ? $param['address2'] : null,
			'PhoneExt' 	=> !empty($param['phoneExt']) ? $param['phoneExt'] : null,
			'Fax' 	=> !empty($param['fax']) ? $param['fax'] : null,
		];

		$reqFields = $this->checkRequiredFields($data, $requiredParams);
		if (count($reqFields)) {
			$flist = implode(', ', $reqFields);
			throw new \Exception($flist . " : these fields are required!", 2010324);
		}

		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Validates the username and password of user accounts you have created using the API command namecheap.users.create.
	 * @note : You cannot use this command to validate user accounts created directly at namecheap.com
	 * @IMPORTANT NOTE: Use the global parameter UserName to specify the username of the user account.
	 *
	 * @param str|Password|req : Password of the user account
	 */
	public function login($password) {
		return $this->get($this->command.__FUNCTION__, ['Password' => $password]);
	}

	/**
	 * @todo When you call this API, a link to reset password will be emailed to the end user's profile email id.The end user needs to click on the link to reset password.
	 * @note : UserName should be omitted for this API call.All other Global parameters must be included.
	 *
	 * @param str|FindBy|req : Possible values:EMAILADDRESS, DOMAINNAME,USERNAME
	 * @param str|FindByValue|req : The username/email address/domain of the user
	 * @param str|EmailFromName|opt : Enter a different value to overwrite the default value - Default Value: namecheap.com
	 * @param str|EmailFrom|opt : Enter a different value to overwrite the default value - Default Value: support@namecheap.com
	 * @param str|URLPattern|opt : Enter a different URL to overwrite namecheap.com. Refer Example Request#2 - Default Value: http://namecheap.com [RESETCODE]
	 */
	public function resetPassword($findBy='EMAILADDRESS', $findByValue, $emailFromName=null, $emailFrom=null, $uRLPattern=null) {
		$this->userName = null; // UserName should be omitted for this API call.All other Global parameters must be included.

		$data =  [
			'FindBy' => $findBy, 'FindByValue' => $findByValue, 
			'EmailFromName' => $emailFromName, 'EmailFrom' => $emailFrom, 
			'URLPattern' => $uRLPattern,];

		return $this->get($this->command.__FUNCTION__, $data);
	}
}

?>
