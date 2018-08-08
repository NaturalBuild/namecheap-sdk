<?php 

namespace Namecheap\Whoisguard;

use Namecheap\Api;
use Namecheap\Exception\NamecheapException;
/**
 * Namecheap API wrapper
 *
 * Method whoisguard
 * Manage whoisguard
 *
 * @author Saddam Hossain <saddamrhossain@gmail.com>
 *
 * @version 1
 */
class Whoisguard extends Api {

	protected $command = 'namecheap.whoisguard.';

	/**
	 * @todo Changes WhoisGuard email address
	 *
	 * @param num|WhoisguardID|req :The unique WhoisGuardID that you wish to change
	 */
	public function changeemailaddress($whoisguardID) {
		return $this->get($this->command.__FUNCTION__, ['WhoisguardID' => $whoisguardID]);
	}

	/**
     * @todo Enables WhoisGuard privacy protection.
	 * @param num|WhoisguardID|req 		: The unique WhoisGuardID which you get
	 * @param str|ForwardedToEmail|req 	: The email address to which WhoisGuard emails are to be forwarded
	 */
	public function enable($whoisguardID, $forwardedToEmail) {
		return $this->get($this->command.__FUNCTION__, ['WhoisguardID' => $whoisguardID, 'ForwardedToEmail' => $forwardedToEmail]);
	}

	/**
     * @todo Disables WhoisGuard privacy protection. 
     * @todo num|WhoisguardID|req : The unique WhoisGuardID which has to be disabled.
	 */
	public function disable($whoisguardID) {
		return $this->get($this->command.__FUNCTION__, ['WhoisguardID' => $whoisguardID]);
	}

	/**
     * @todo Unallots WhoisGuard privacy protection. 
     * @param num|WhoisguardID|req : The unique WhoisGuardID that has to be unalloted.
	 */
	public function unallot($whoisguardID) {
		return $this->get($this->command.__FUNCTION__, ['WhoisguardID' => $whoisguardID]);
	}

	/**
     * @todo Discards whoisguard. 
     * @todo num|WhoisguardID|req : The WhoisGuardID you wish to discard
	 */
	public function discard($whoisguardID) {
		return $this->get($this->command.__FUNCTION__, ['WhoisguardID' => $whoisguardID]);
	}

	/**
     * @todo Allots WhoisGuard 
	 * @param num|WhoisguardId|req 	: The unique WhoisGuardID
	 * @param str|DomainName|req 	: Domain that you wish to allot WhoisGuard to
	 * @param str|ForwardedToEmail|opt : The email to which you wish to forward your WhoisGuard emails
	 * @param str|EnableWG|opt 		: Possible Values: True and False Default Value:False
	 */
	public function allot($whoisguardId, $domainName, $forwardedToEmail=null, $enableWG=null) {

		$data = [
			'WhoisguardId' => $whoisguardId,
			'DomainName' => $domainName,
			'ForwardedToEmail' => $forwardedToEmail,
			'EnableWG' => $enableWG,
		];

		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
     * @todo Gets the list of WhoisGuard privacy protection. 
	 * @param num|ListType|opt : Possible values are ALL, ALLOTED, FREE, DISCARD. Default Value: ALL
	 * @param num|Page|opt : Page to return Default Value: 1
	 * @param num|PageSize|opt : Number of WhoisGuard to be listed on a page. Minimum value: 2; Maximum value: 100
	 */
	public function getList($listType=null, $page=null, $pageSize=null) {
		$data = [
			'ListType' => $listType,
			'Page' => $page,
			'PageSize' => $pageSize,
		];

		return $this->get($this->command.__FUNCTION__, $data);
	}

	/**
     * @todo Renews WhoisGuard privacy protection.
	 * @param num|WhoisguardID|req : WhoisGuardID to renew 
	 * @param num|Years|req : Number of years to renew Default Value: 1 
	 * @param num|PromotionCode|opt : Promotional (coupon) code for renewing the WhoisGuard
	 */
	public function renew($whoisguardID, $years=1, $promotionCode=null) {
		$data =[
			'WhoisguardID' => $whoisguardID, 
			'Years' => $years, 
			'PromotionCode' => $promotionCode, 
		];
		return $this->get($this->command.__FUNCTION__, $data);
	}

}
?>