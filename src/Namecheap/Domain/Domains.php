<?php 

namespace Namecheap\Domain;

use Namecheap\Api;
use Namecheap\Exception\NamecheapException;
/**
 * Namecheap API wrapper
 *
 * Method Domains
 * Manage Domains
 *
 * @author Saddam Hossain <saddamrhossain@gmail.com>
 *
 * @version 1
 */
class Domains extends Api {

	protected $command = 'namecheap.domains.';

	/**
     * @todo Returns a list of domains for the particular user..
     *
     * @param str|listType|opt : Possible values are ALL, EXPIRING, or EXPIRED | Default : ALL
     * @param str|searchTerm|opt :Keyword to look for in the domain list
     * @param num|page|opt : Page to return | Default Value: 1
     * @param num|pageSize|opt :Number of domains to be listed on a page. Minimum value is 10, and maximum value is 100. | Default Value: 20
     * @param str|sortBy|opt : Possible values are NAME, NAME_DESC, EXPIREDATE, EXPIREDATE_DESC, CREATEDATE, CREATEDATE_DESC
     */
	public function getList($searchTerm=null, $listType=null, $page=null, $pageSize=null, $sortBy=null) {
		$data = [
			'ListType' => $listType, 
			'SearchTerm' => $searchTerm, 
			'Page' => $page, 
			'PageSize' => $pageSize, 
			'SortBy' => $sortBy
		];
		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
     * @todo Gets contact information of the requested domain.
     *
     * @param str|domainName|req : Domain to get contacts
	*/
	public function getContacts($domainName) {
		return $this->get($this->command.__FUNCTION__, ['DomainName'=>$domainName]);
	}

	
	/**
	 * @todo Registers a new domain name.
	 * 
	 * @param str|domainName|Req : Domain name to register 
	 * @param num|years|Req : Number of years to register Default Value: 2
	 *
	 * @param str|registrantFirstName|Req : First name of the Registrant user
	 * @param str|registrantLastName|Req : Second name of the Registrant user
	 * @param str|registrantAddress1|Req : Address1 of the Registrant user
	 * @param str|registrantCity|Req : City of the Registrant user
	 * @param str|registrantStateProvince|Req : State/Province of the Registrant user
	 * @param str|registrantPostalCode|Req : PostalCode of the Registrant user
	 * @param str|registrantCountry|Req : Country of the Registrant user
	 * @param str|registrantPhone|Req : Phone number in the format +NNN.NNNNNNNNNN
	 * @param str|registrantEmailAddress|Req : Email address of the Registrant user
	 *
	 * @param str|registrantOrganizationName|Opt : Organization of the Registrant user
	 * @param str|registrantJobTitle|Opt : Job title of the Registrant user
	 * @param str|registrantAddress2|Opt : Address2 of the Registrant user
	 * @param str|registrantStateProvinceChoice|Opt : StateProvinceChoice of the Registrant user
	 * @param str|registrantPhoneExt|Opt : PhoneExt of the Registrant user
	 * @param str|registrantFax|Opt : Fax number in the format +NNN.NNNNNNNNNN
	 *
	 * @param str|techFirstName|Req : First name of the tech user
	 * @param str|techLastName|Req : Second name of the tech user
	 * @param str|techAddress1|Req : Address1 of the tech user
	 * @param str|techCity|Req : City of the tech user
	 * @param str|techStateProvince|Req : State/Province of the tech user
	 * @param str|techPostalCode|Req : PostalCode of the tech user
	 * @param str|techCountry|Req : Country of the tech user
	 * @param str|techPhone|Req : Phone number in the format +NNN.NNNNNNNNNN
	 * @param str|techEmailAddress|Req : Email address of the tech user
	 *
	 * @param str|techOrganizationName|Opt : Organization of the tech user
	 * @param str|techJobTitle|Opt : Job title of the tech user
	 * @param str|techAddress2|Opt : Address2 of the tech user
	 * @param str|techStateProvinceChoice|Opt : StateProvinceChoice of the tech user
	 * @param str|techPhoneExt|Opt : PhoneExt of the tech user
	 * @param str|techFax|Opt : Fax number in the format +NNN.NNNNNNNNNN
	 *
	 * @param str|adminFirstName|Req : First name of the admin user
	 * @param str|adminLastName|Req : Second name of the admin user
	 * @param str|adminAddress1|Req : Address1 of the admin user
	 * @param str|adminCity|Req : City of the admin user
	 * @param str|adminStateProvince|Req : State/Province of the admin user
	 * @param str|adminPostalCode|Req : PostalCode of the admin user
	 * @param str|adminCountry|Req : Country of the admin user
	 * @param str|adminPhone|Req : Phone number in the format +NNN.NNNNNNNNNN
	 * @param str|adminEmailAddress|Req : Email address of the admin user
	 *
	 * @param str|adminOrganizationName|Opt : Organization of the admin user
	 * @param str|adminJobTitle|Opt : Job title of the admin user
	 * @param str|adminAddress2|Opt : Address2 of the admin user
	 * @param str|adminStateProvinceChoice|Opt : StateProvinceChoice of the admin user
	 * @param str|adminPhoneExt|Opt : PhoneExt of the admin user
	 * @param str|adminFax|Opt : Fax number in the format +NNN.NNNNNNNNNN
	 *
	 * @param str|auxBillingFirstName|Req : First name of the auxBilling user
	 * @param str|auxBillingLastName|Req : Second name of the auxBilling user
	 * @param str|auxBillingAddress1|Req : Address1 of the auxBilling user
	 * @param str|auxBillingCity|Req : City of the auxBilling user
	 * @param str|auxBillingStateProvince|Req : State/Province of the auxBilling user
	 * @param str|auxBillingPostalCode|Req : PostalCode of the auxBilling user
	 * @param str|auxBillingCountry|Req : Country of the auxBilling user
	 * @param str|auxBillingPhone|Req : Phone number in the format +NNN.NNNNNNNNNN
	 * @param str|auxBillingEmailAddress|Req : Email address of the auxBilling user
	 *
	 * @param str|auxBillingOrganizationName|Opt : Organization of the auxBilling user
	 * @param str|auxBillingJobTitle|Opt : Job title of the auxBilling user
	 * @param str|auxBillingAddress2|Opt : Address2 of the auxBilling user
	 * @param str|auxBillingStateProvinceChoice|Opt : StateProvinceChoice of the auxBilling user
	 * @param str|auxBillingPhoneExt|Opt : PhoneExt of the auxBilling user
	 * @param str|auxBillingFax|Opt : Fax number in the format +NNN.NNNNNNNNNN
	 *
	 * @param str|billingFirstName|Opt : First name of the billing user
	 * @param str|billingLastName|Opt : Second name of the billing user
	 * @param str|billingAddress1|Opt : Address1 of the billing user
	 * @param str|billingCity|Opt : City of the billing user
	 * @param str|billingStateProvince|Opt : State/Province of the billing user
	 * @param str|billingPostalCode|Opt : PostalCode of the billing user
	 * @param str|billingCountry|Opt : Country of the billing user
	 * @param str|billingPhone|Opt : Phone number in the format +NNN.NNNNNNNNNN
	 * @param str|billingEmailAddress|Opt : Email address of the billing user
	 * @param str|billingAddress2|Opt : Address2 of the billing user
	 * @param str|billingStateProvinceChoice|Opt : StateProvinceChoice of the billing user
	 * @param str|billingPhoneExt|Opt : PhoneExt of the billing user
	 * @param str|billingFax|Opt : Fax number in the format +NNN.NNNNNNNNNN
	 * 
	 * @param str|idnCode|Opt : Code of Internationalized Domain Name (please refer to the note below)
	 * @param str|nameservers|Opt : Comma-separated list of custom nameservers to be associated with the domain name
	 * @param str|addFreeWhoisguard|Opt : Adds free WhoisGuard for the domain Default Value: no
	 * @param str|wGEnabled|Opt : Enables free WhoisGuard for the domain Default Value: no
	 * @param bool|isPremiumDomain|Opt : Indication if the domain name is premium
	 * @param Currency|premiumPrice|Opt : Registration price for the premium domain
	 * @param Currency|eapFee|Opt : Purchase fee for the premium domain during Early Access Program (EAP)*
	 */
	public function create(array $domainInfo, array $contactInfo) {
		$data = $this->parseDomainData($domainInfo, $contactInfo);
		return $this->post($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Returns a list of tlds available in namecheap
	 */
	public function getTldList() {
		return $this->get($this->command.__FUNCTION__);
	}

	/**
	 * @todo Sets contact information for the domain.
	 *
	 * @param str|registrantFirstName|Req : First name of the Registrant user
	 * @param str|registrantLastName|Req : Second name of the Registrant user
	 * @param str|registrantAddress1|Req : Address1 of the Registrant user
	 * @param str|registrantCity|Req : City of the Registrant user
	 * @param str|registrantStateProvince|Req : State/Province of the Registrant user
	 * @param str|registrantPostalCode|Req : PostalCode of the Registrant user
	 * @param str|registrantCountry|Req : Country of the Registrant user
	 * @param str|registrantPhone|Req : Phone number in the format +NNN.NNNNNNNNNN
	 * @param str|registrantEmailAddress|Req : Email address of the Registrant user
	 *
	 * @param str|registrantOrganizationName|Opt : Organization of the Registrant user
	 * @param str|registrantJobTitle|Opt : Job title of the Registrant user
	 * @param str|registrantAddress2|Opt : Address2 of the Registrant user
	 * @param str|registrantStateProvinceChoice|Opt : StateProvinceChoice of the Registrant user
	 * @param str|registrantPhoneExt|Opt : PhoneExt of the Registrant user
	 * @param str|registrantFax|Opt : Fax number in the format +NNN.NNNNNNNNNN
	 *
	 * @param str|techFirstName|Req : First name of the tech user
	 * @param str|techLastName|Req : Second name of the tech user
	 * @param str|techAddress1|Req : Address1 of the tech user
	 * @param str|techCity|Req : City of the tech user
	 * @param str|techStateProvince|Req : State/Province of the tech user
	 * @param str|techPostalCode|Req : PostalCode of the tech user
	 * @param str|techCountry|Req : Country of the tech user
	 * @param str|techPhone|Req : Phone number in the format +NNN.NNNNNNNNNN
	 * @param str|techEmailAddress|Req : Email address of the tech user
	 *
	 * @param str|techOrganizationName|Opt : Organization of the tech user
	 * @param str|techJobTitle|Opt : Job title of the tech user
	 * @param str|techAddress2|Opt : Address2 of the tech user
	 * @param str|techStateProvinceChoice|Opt : StateProvinceChoice of the tech user
	 * @param str|techPhoneExt|Opt : PhoneExt of the tech user
	 * @param str|techFax|Opt : Fax number in the format +NNN.NNNNNNNNNN
	 *
	 * @param str|adminFirstName|Req : First name of the admin user
	 * @param str|adminLastName|Req : Second name of the admin user
	 * @param str|adminAddress1|Req : Address1 of the admin user
	 * @param str|adminCity|Req : City of the admin user
	 * @param str|adminStateProvince|Req : State/Province of the admin user
	 * @param str|adminPostalCode|Req : PostalCode of the admin user
	 * @param str|adminCountry|Req : Country of the admin user
	 * @param str|adminPhone|Req : Phone number in the format +NNN.NNNNNNNNNN
	 * @param str|adminEmailAddress|Req : Email address of the admin user
	 *
	 * @param str|adminOrganizationName|Opt : Organization of the admin user
	 * @param str|adminJobTitle|Opt : Job title of the admin user
	 * @param str|adminAddress2|Opt : Address2 of the admin user
	 * @param str|adminStateProvinceChoice|Opt : StateProvinceChoice of the admin user
	 * @param str|adminPhoneExt|Opt : PhoneExt of the admin user
	 * @param str|adminFax|Opt : Fax number in the format +NNN.NNNNNNNNNN
	 *
	 * @param str|auxBillingFirstName|Req : First name of the auxBilling user
	 * @param str|auxBillingLastName|Req : Second name of the auxBilling user
	 * @param str|auxBillingAddress1|Req : Address1 of the auxBilling user
	 * @param str|auxBillingCity|Req : City of the auxBilling user
	 * @param str|auxBillingStateProvince|Req : State/Province of the auxBilling user
	 * @param str|auxBillingPostalCode|Req : PostalCode of the auxBilling user
	 * @param str|auxBillingCountry|Req : Country of the auxBilling user
	 * @param str|auxBillingPhone|Req : Phone number in the format +NNN.NNNNNNNNNN
	 * @param str|auxBillingEmailAddress|Req : Email address of the auxBilling user
	 *
	 * @param str|auxBillingOrganizationName|Opt : Organization of the auxBilling user
	 * @param str|auxBillingJobTitle|Opt : Job title of the auxBilling user
	 * @param str|auxBillingAddress2|Opt : Address2 of the auxBilling user
	 * @param str|auxBillingStateProvinceChoice|Opt : StateProvinceChoice of the auxBilling user
	 * @param str|auxBillingPhoneExt|Opt : PhoneExt of the auxBilling user
	 * @param str|auxBillingFax|Opt : Fax number in the format +NNN.NNNNNNNNNN
	 */
	public function setContacts(array $domainInfo, array $contactInfo) {
		$data = $this->parseContactInfo($contactInfo);
		return $this->post($this->command.__FUNCTION__, array_merge($domainInfo, $data));
	}

	/**
     * @todo Checks the availability of domains.
     * @param str or Array|domain|req : The list of domains or a single domain name
     */
	public function check($domain) {
		if (is_array($domain)) {
			$domainString = implode(',', $domain);
			$data['DomainList'] = $domainString;
		} else if (is_string($domain)) {
			$data['DomainList'] = $domain;
		}

		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Reactivates an expired domain.
	 *
	 * @param str|domainName|req : Domain name to reactivate
	 * @param str|PromotionCode|opt : Promotional (coupon) code for reactivating the domain
	 * @param num|yearsToAdd|opt : Number of years after expiry
	 * @param bool|isPremiumDomain|opt : Indication if the domain name is premium
	 * @param num|premiumPrice|opt : Reactivation price for the premium domain
	 */
	public function reactivate($domainName, $promotionCode=null, $yearsToAdd=null, $isPremiumDomain=null, $premiumPrice=null) {
		$data = [
			'DomainName' => $domainName,
			'PromotionCode' => $promotionCode,
			'YearsToAdd' => $yearsToAdd,
			'IsPremiumDomain' => $isPremiumDomain,
			'PremiumPrice' => $premiumPrice,
		];
		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Renew an expired domain.
	 *
	 * @param str|domainName|req : Domain name to reactivate
	 * @param num|years|req : Number of years to renew
	 * @param str|promotionCode	|opt : Promotional (coupon) code for renewing the domain
	 * @param bool|isPremiumDomain|opt : Indication if the domain name is premium
	 * @param num|premiumPrice|opt : Reactivation price for the premium domain
	 */
	public function renew($domainName, $years, $promotionCode=null, $isPremiumDomain=null, $premiumPrice=null) {
		$data = [
			'DomainName' 	=> $domainName,
			'Years' 		=> $years,
			'PromotionCode' => $promotionCode,
			'IsPremiumDomain' => $isPremiumDomain,
			'PremiumPrice' 	=> $premiumPrice,
		];
		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Gets the RegistrarLock status of the requested domain.
	 *
	 * @param str|DomainName|req : Domain name to get status for	
	 */
	public function getRegistrarLock($domainName) {
		$data=['DomainName' => $domainName];
		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Sets the RegistrarLock status for a domain.
	 *
	 * @param str|DomainName|req : Domain name to get status for	
	 * @param str|LockAction|opt : Possible values: LOCK, UNLOCK. | Default Value: LOCK.	
	 */
	public function setRegistrarLock($domainName, $lockAction=null) {
		$data=[
			'DomainName' => $domainName,
			'LockAction' => $lockAction,
		];
		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
	 * @todo Returns information about the requested domain.
	 * @param str|domainName|req : Domain name for which domain information needs to be requested	
	 * @param str|hostName|opt : Hosted domain name for which domain information needs to be requested
	 */
	public function getInfo($domainName, $hostName=null) {
		$data=[
			'DomainName' => $domainName,
			'HostName'   => $hostName,
		];
		return $this->get($this->command.__FUNCTION__, $data);
	}


	# Helper methods
	private function parseDomainData($dd, $cd) {
		//Extended attributes : not used
		$domainInfo = [
			#Req
			'DomainName' 				=> !empty($dd['domainName']) ? $dd['domainName'] : null,
			'Years' 					=> !empty($dd['years']) ? $dd['years'] : null,
			#Opt
			'PromotionCode'	 			=> !empty($dd['promotionCode']) ? $dd['promotionCode'] : null,
		];

		$billing = [
			#opt
			'BillingFirstName' 		=> !empty($cd['billingFirstName']) ? $cd['billingFirstName'] : null,
			'BillingLastName' 		=> !empty($cd['billingLastName']) ? $cd['billingLastName'] : null,
			'BillingAddress1' 		=> !empty($cd['billingAddress1']) ? $cd['billingAddress1'] : null,
			'BillingAddress2' 		=> !empty($cd['billingAddress2']) ? $cd['billingAddress2'] : null,
			'BillingCity' 	    	=> !empty($cd['billingCity']) ? $cd['billingCity'] : null,
			'BillingStateProvince' 	=> !empty($cd['billingStateProvince']) ? $cd['billingStateProvince'] : null,
			'BillingStateProvinceChoice' 	=> !empty($cd['billingStateProvinceChoice']) ? $cd['billingStateProvinceChoice'] : null,
			'BillingPostalCode' 	=> !empty($cd['billingPostalCode']) ? $cd['billingPostalCode'] : null,
			'BillingCountry' 		=> !empty($cd['billingCountry']) ? $cd['billingCountry'] : null,
			'BillingPhone' 			=> !empty($cd['billingPhone']) ? $cd['billingPhone'] : null,
			'BillingPhoneExt' 		=> !empty($cd['billingPhoneExt']) ? $cd['billingPhoneExt'] : null,
			'BillingFax' 		    => !empty($cd['billingFax']) ? $cd['billingFax'] : null,
			'BillingEmailAddress'   => !empty($cd['billingEmailAddress']) ? $cd['billingEmailAddress'] : null,
			
		];

		$extra = [
			#Req

			#opt
			'IdnCode' 			=> !empty($dd['idnCode']) ? $dd['idnCode'] : null,
			'Nameservers' 		=> !empty($dd['nameservers']) ? $dd['nameservers'] : null,
			'AddFreeWhoisguard' => !empty($dd['addFreeWhoisguard']) ? $dd['addFreeWhoisguard'] : null,
			'WGEnabled' 		=> !empty($dd['wGEnabled']) ? $dd['wGEnabled'] : null,
			'IsPremiumDomain' 	=> !empty($dd['isPremiumDomain']) ? $dd['isPremiumDomain'] : null,
			'PremiumPrice' 		=> !empty($dd['premiumPrice']) ? $dd['premiumPrice'] : null,
			'EapFee' 			=> !empty($dd['eapFee']) ? $dd['eapFee'] : null,
		];

		return array_merge($domainInfo, $this->parseContactInfo($cd), $billing, $extra);
	}

	private function parseContactInfo($d) {

		$requiredFields = [
			'FirstName', 'LastName', 'Address1', 'City', 'StateProvince', 'PostalCode', 'Country', 'Phone', 'EmailAddress',
		];

		$requiredRegistrant = array_map(function($f) { return 'Registrant'.$f; }, $requiredFields);
		$requiredTech 		= array_map(function($f) { return 'Tech'.$f; }, $requiredFields);
		$requiredAdmin 		= array_map(function($f) { return 'Admin'.$f; }, $requiredFields);
		$requiredAuxBilling = array_map(function($f) { return 'AuxBilling'.$f; }, $requiredFields);

		$registrant = [
			'RegistrantFirstName' 		=> !empty($d['registrantFirstName']) ? $d['registrantFirstName'] : null,
			'RegistrantLastName'  		=> !empty($d['registrantLastName']) ? $d['registrantLastName'] : null,
			'RegistrantAddress1'  		=> !empty($d['registrantAddress1']) ? $d['registrantAddress1'] : null,
			'RegistrantCity'  			=> !empty($d['registrantCity']) ? $d['registrantCity'] : null,
			'RegistrantStateProvince'  	=> !empty($d['registrantStateProvince']) ? $d['registrantStateProvince'] : null,	
			'RegistrantPostalCode'  	=> !empty($d['registrantPostalCode']) ? $d['registrantPostalCode'] : null,
			'RegistrantCountry'  		=> !empty($d['registrantCountry']) ? $d['registrantCountry'] : null,
			'RegistrantPhone'  			=> !empty($d['registrantPhone']) ? $d['registrantPhone'] : null,
			'RegistrantEmailAddress'  	=> !empty($d['registrantEmailAddress']) ? $d['registrantEmailAddress'] : null,
			#opt
			'RegistrantOrganizationName'=> !empty($d['RegistrantOrganizationName']) ? $d['RegistrantOrganizationName'] : null,
			'RegistrantJobTitle'		=> !empty($d['registrantJobTitle']) ? $d['registrantJobTitle'] : null,
			'RegistrantAddress2'  		=> !empty($d['registrantAddress2']) ? $d['registrantAddress2'] : null,
			'RegistrantStateProvinceChoice' => !empty($d['registrantStateProvinceChoice']) ? $d['registrantStateProvinceChoice'] : null,
			'RegistrantPhoneExt'  		=> !empty($d['registrantPhoneExt']) ? $d['registrantPhoneExt'] : null,
			'RegistrantFax'  			=> !empty($d['registrantFax']) ? $d['registrantFax'] : null,
		];
		
		$tech = [
			#Req
			'TechFirstName' 		=> !empty($d['techFirstName']) ? $d['techFirstName'] : null,
			'TechLastName' 			=> !empty($d['techLastName']) ? $d['techLastName'] : null,
			'TechAddress1' 			=> !empty($d['techAddress1']) ? $d['techAddress1'] : null,
			'TechCity' 				=> !empty($d['techCity']) ? $d['techCity'] : null,
			'TechStateProvince' 	=> !empty($d['techStateProvince']) ? $d['techStateProvince'] : null,
			'TechPostalCode' 		=> !empty($d['techPostalCode']) ? $d['techPostalCode'] : null,
			'TechCountry' 			=> !empty($d['techCountry']) ? $d['techCountry'] : null,
			'TechPhone' 			=> !empty($d['techPhone']) ? $d['techPhone'] : null,
			'TechEmailAddress' 		=> !empty($d['techEmailAddress']) ? $d['techEmailAddress'] : null,

			#opt
			'TechOrganizationName' 	=> !empty($d['techOrganizationName']) ? $d['techOrganizationName'] : null,
			'TechJobTitle' 			=> !empty($d['techJobTitle']) ? $d['techJobTitle'] : null,
			'TechAddress2' 			=> !empty($d['techAddress2']) ? $d['techAddress2'] : null,
			'TechStateProvinceChoice' => !empty($d['techStateProvinceChoice']) ? $d['techStateProvinceChoice'] : null,
			'TechPhoneExt' 			=> !empty($d['techPhoneExt']) ? $d['techPhoneExt'] : null,
			'TechFax' 				=> !empty($d['techFax']) ? $d['techFax'] : null,
		];

		$admin = [
			#Req
			'AdminFirstName' 		=> !empty($d['adminFirstName']) ? $d['adminFirstName'] : null,
			'AdminLastName' 		=> !empty($d['adminLastName']) ? $d['adminLastName'] : null,
			'AdminAddress1' 		=> !empty($d['adminAddress1']) ? $d['adminAddress1'] : null,
			'AdminCity' 			=> !empty($d['adminCity']) ? $d['adminCity'] : null,
			'AdminStateProvince' 	=> !empty($d['adminStateProvince']) ? $d['adminStateProvince'] : null,
			'AdminPostalCode' 		=> !empty($d['adminPostalCode']) ? $d['adminPostalCode'] : null,
			'AdminCountry' 			=> !empty($d['adminCountry']) ? $d['adminCountry'] : null,
			'AdminPhone' 			=> !empty($d['adminPhone']) ? $d['adminPhone'] : null,
			'AdminEmailAddress' 	=> !empty($d['adminEmailAddress']) ? $d['adminEmailAddress'] : null,

			#opt
			'AdminOrganizationName' => !empty($d['adminOrganizationName']) ? $d['adminOrganizationName'] : null,
			'AdminJobTitle' 		=> !empty($d['adminJobTitle']) ? $d['adminJobTitle'] : null,
			'AdminAddress2' 		=> !empty($d['adminAddress2']) ? $d['adminAddress2'] : null,
			'AdminStateProvinceChoice' => !empty($d['adminStateProvinceChoice']) ? $d['adminStateProvinceChoice'] : null,
			'AdminPhoneExt' 		=> !empty($d['adminPhoneExt']) ? $d['adminPhoneExt'] : null,
			'AdminFax' 				=> !empty($d['adminFax']) ? $d['adminFax'] : null,
		];

		$auxBilling = [
			#Req
			'AuxBillingFirstName' 	=> !empty($d['auxBillingFirstName']) ? $d['auxBillingFirstName'] : null,
			'AuxBillingLastName' 	=> !empty($d['auxBillingLastName']) ? $d['auxBillingLastName'] : null,
			'AuxBillingAddress1' 	=> !empty($d['auxBillingAddress1']) ? $d['auxBillingAddress1'] : null,
			'AuxBillingCity' 		=> !empty($d['auxBillingCity']) ? $d['auxBillingCity'] : null,
			'AuxBillingStateProvince' => !empty($d['auxBillingStateProvince']) ? $d['auxBillingStateProvince'] : null,
			'AuxBillingPostalCode' 	=> !empty($d['auxBillingPostalCode']) ? $d['auxBillingPostalCode'] : null,
			'AuxBillingCountry' 	=> !empty($d['auxBillingCountry']) ? $d['auxBillingCountry'] : null,
			'AuxBillingPhone' 		=> !empty($d['auxBillingPhone']) ? $d['auxBillingPhone'] : null,
			'AuxBillingEmailAddress'=> !empty($d['auxBillingEmailAddress']) ? $d['auxBillingEmailAddress'] : null,

			#opt
			'AuxBillingOrganizationName' 	=> !empty($d['auxBillingOrganizationName']) ? $d['auxBillingOrganizationName'] : null,
			'AuxBillingJobTitle' 			=> !empty($d['auxBillingJobTitle']) ? $d['auxBillingJobTitle'] : null,
			'AuxBillingAddress2'			=> !empty($d['auxBillingAddress2']) ? $d['auxBillingAddress2'] : null,
			'AuxBillingStateProvinceChoice' => !empty($d['auxBillingStateProvinceChoice']) ? $d['auxBillingStateProvinceChoice'] : null,
			'AuxBillingPhoneExt'			=> !empty($d['auxBillingPhoneExt']) ? $d['auxBillingPhoneExt'] : null,
			'AuxBillingFax' 				=> !empty($d['auxBillingFax']) ? $d['auxBillingFax'] : null,
		];

		# Validation fields
		$reqFields = $this->checkRequiredFields($registrant, $requiredRegistrant);
		if (count($reqFields)) {
			$flist = implode(', ', $reqFields);
			throw new \Exception($flist . " : these fields are required!", 2010324);
		} else {
			// validate / replaced values with $registrant array for tech, admin, auxBilling
			$reqFields = $this->checkRequiredFields($tech, $requiredTech);
			foreach ($reqFields as $k) $tech[$k] = $registrant['Registrant'.substr($k, strlen('Tech'))];

			$reqFields = $this->checkRequiredFields($admin, $requiredAdmin);
			foreach ($reqFields as $k) $admin[$k] = $registrant['Registrant'.substr($k, strlen('Admin'))];

			$reqFields = $this->checkRequiredFields($auxBilling, $requiredAuxBilling);
			foreach ($reqFields as $k) $auxBilling[$k] = $registrant['Registrant'.substr($k, strlen('AuxBilling'))];
		}

		return array_merge($registrant, $tech, $admin, $auxBilling);
	}
}
?>