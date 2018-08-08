<?php
namespace Namecheap\Users;

use Namecheap\Api;
use Namecheap\Exception\NamecheapException;
/**
 * Namecheap API wrapper
 *
 * Method UsersAddress
 * Manage Users address
 *
 * @author Saddam Hossain <saddamrhossain@gmail.com>
 *
 * @version 1
 */
class UsersAddress extends Api {

	protected $command = 'namecheap.users.address.';

	/**
	 * @todo Creates a new address for the user
	 *
	 * @param str|AddressName|req 	: Address name to create
	 * @param str|EmailAddress|req 	: Email address of the user
	 * @param str|FirstName|req 	: First name of the user
	 * @param str|LastName|req 		: Last name of the user
	 * @param str|Address1|req 		: StreetAddress1 of the user
	 * @param str|City|req 			: City of the user
	 * @param str|StateProvince|req : State/Province of the user
	 * @param str|StateProvinceChoice|req : State/Province choice of the user
	 * @param str|Zip|req 			: Zip/Postal code of the user
	 * @param str|Country|req 		: Two letter country code of the user
	 * @param str|Phone|req 		: Phone number in the format +NNN.NNNNNNNNNN
	 *
	 * @param num|DefaultYN|opt 	: Possible values are 0 and 1.If the value of this parameter is set to 1, the address is set as default address for the user.
	 * @param str|JobTitle|opt 		: Job designation of the user
	 * @param str|Organization|opt 	: Organization of the user
	 * @param str|Address2|opt 		: StreetAddress2 of the user
	 * @param str|PhoneExt|opt 		: PhoneExt of the user
	 * @param str|Fax|opt 			: Fax number in the format +NNN.NNNNNNNNNN
	 */
	public function create(array $param) {
		$requiredParams = ['AddressName', 'EmailAddress', 'FirstName', 'LastName', 'Address1', 'City', 'StateProvince', 'StateProvinceChoice', 'Zip', 'Country', 'Phone'];

		$data = [
			'AddressName' 	=> !empty($param['addressName']) ? $param['addressName'] : null,
			'EmailAddress' 	=> !empty($param['emailAddress']) ? $param['emailAddress'] : null,
			'FirstName' 	=> !empty($param['firstName']) ? $param['firstName'] : null,
			'LastName' 		=> !empty($param['lastName']) ? $param['lastName'] : null,
			'Address1' 		=> !empty($param['address1']) ? $param['address1'] : null,
			'City' 			=> !empty($param['city']) ? $param['city'] : null,
			'StateProvince' => !empty($param['stateProvince']) ? $param['stateProvince'] : null,
			'StateProvinceChoice'=> !empty($param['stateProvinceChoice']) ? $param['stateProvinceChoice'] : null,
			'Zip' 			=> !empty($param['zip']) ? $param['zip'] : null,
			'Country' 		=> !empty($param['country']) ? $param['country'] : null,
			'Phone' 		=> !empty($param['phone']) ? $param['phone'] : null,

			'DefaultYN' 	=> !empty($param['defaultYN']) ? $param['defaultYN'] : null,
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
	 * @todo Deletes the particular address for the user.
	 *
	 * @param num|AddressId|req : The unique AddressID to delete
	 */
	public function delete($addressId) {
		return $this->get($this->command.__FUNCTION__, ['AddressID' => $addressId]);
	}

	/**
	 * @todo Gets information for the requested addressID.
	 *
	 * @param num|AddressId|req : The unique AddressID
	 */
	public function getInfo($addressId) {
		return $this->get($this->command.__FUNCTION__, ['AddressID' => $addressId]);
	}

	/**
	 * @todo Gets a list of addressIDs and addressnames associated with the user account.
	 */
	public function getList() {
		return $this->get($this->command.__FUNCTION__);
	}

	/**
	 * @todo Sets default address for the user.
	 *
	 * @param num|AddressId|req : The unique addressID to set default
	 */
	public function setDefault($addressId) {
		return $this->get($this->command.__FUNCTION__, ['AddressID' => $addressId]);
	}

	/**
	 * @todo Updates the particular address of the user
	 *
	 * @param num|AddressId|req 		: The unique address ID to update
	 * @param str|AddressName|req 		: The AddressName to update
	 * @param str|EmailAddress|req 		: Email address of the user
	 * @param str|FirstName|req 		: First name of the user
	 * @param str|LastName|req 			: Last name of the user
	 * @param str|Address1|req 			: StreetAddress1 of the user
	 * @param str|City|req 				: City of the user
	 * @param str|StateProvince|req 	: State/Province of the user
	 * @param str|StateProvinceChoice|req : State/Province choice of the user
	 * @param str|Zip|req 				: Zip/Postal code of the user
	 * @param str|Country|req 			: Two letter country code of the user
	 * @param str|Phone|req 			: Phone number in the format +NNN.NNNNNNNNNN
	 *
	 * @param num|DefaultYN|req 	: Possible values are 0 and 1. If the value of this parameter is set to 1, the updated address is also set as default address for the user.	 
	 * @param str|JobTitle|req 		: Job designation of the user
	 * @param str|Organization|req 	: Organization of the user
	 * @param str|Address2|req 		: StreetAddress2 of the user
	 * @param str|PhoneExt|req 		: PhoneExt of the user
	 * @param str|Fax|req 			: Fax number in the format +NNN.NNNNNNNNNN
	 */
	public function update(array $param) {
		$requiredParams = ['AddressId', 'AddressName', 'EmailAddress', 'FirstName', 'LastName', 'Address1', 'City', 'StateProvince', 'StateProvinceChoice', 'Zip', 'Country', 'Phone'];

		$data = [
			'AddressId' 		=> !empty($param['addressId']) ? $param['addressId'] : null,
			'AddressName' 		=> !empty($param['addressName']) ? $param['addressName'] : null,
			'EmailAddress' 		=> !empty($param['emailAddress']) ? $param['emailAddress'] : null,
			'FirstName' 		=> !empty($param['firstName']) ? $param['firstName'] : null,
			'LastName' 			=> !empty($param['lastName']) ? $param['lastName'] : null,
			'Address1' 			=> !empty($param['address1']) ? $param['address1'] : null,
			'City' 				=> !empty($param['city']) ? $param['city'] : null,
			'StateProvince' 	=> !empty($param['stateProvince']) ? $param['stateProvince'] : null,
			'StateProvinceChoice'=> !empty($param['stateProvinceChoice']) ? $param['stateProvinceChoice'] : null,
			'Zip' 				=> !empty($param['zip']) ? $param['zip'] : null,
			'Country' 			=> !empty($param['country']) ? $param['country'] : null,
			'Phone' 			=> !empty($param['phone']) ? $param['phone'] : null,

			'DefaultYN' 		=> !empty($param['defaultYN']) ? $param['defaultYN'] : null,
			'JobTitle' 			=> !empty($param['jobTitle']) ? $param['jobTitle'] : null,
			'Organization' 		=> !empty($param['organization']) ? $param['organization'] : null,
			'Address2' 			=> !empty($param['address2']) ? $param['address2'] : null,
			'PhoneExt' 			=> !empty($param['phoneExt']) ? $param['phoneExt'] : null,
			'Fax' 				=> !empty($param['fax']) ? $param['fax'] : null,
		];

		$reqFields = $this->checkRequiredFields($data, $requiredParams);
		if (count($reqFields)) {
			$flist = implode(', ', $reqFields);
			throw new \Exception($flist . " : these fields are required!", 2010324);
		}

		return $this->get($this->command.__FUNCTION__, $data);	
	}

}

?>