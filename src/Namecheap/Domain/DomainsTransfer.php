<?php 

namespace Namecheap\Domain;

use Namecheap\Api;
use Namecheap\Exception\NamecheapException;
/**
 * Namecheap API wrapper
 *
 * Method DomainsTransfer
 * Manage Domains transfer
 *
 * @author Saddam Hossain <saddamrhossain@gmail.com>
 *
 * @version 1
 */
class DomainsTransfer extends Api {

	protected $command = 'namecheap.domains.transfer.';

	/**
	 * @todo Transfers a domain to Namecheap. You can only transfer .biz, .ca, .cc, .co, .co.uk, .com, .com.es, .com.pe, .es, .in, .info, .me, .me.uk, .mobi, .net, .net.pe, .nom.es, .org, .org.es, .org.pe, .org.uk, .pe, .tv, .us domains through API at this time.
	 *
	 * @param str|DomainName|Req : Domain name to transfer
	 * @param str|Years|Req : Number of years to renew after a successful transfer
	 * @param str|EPPCode|Req : The EPPCode is required for transferring .biz, .ca, .cc, .co, .com, .com.pe, .in, .info, .me, .mobi, .net, net.pe, .org, .org.pe, .pe, .tv, .us domains only.
	 *
	 * @param str|PromotionCode|Opt : Promotional (coupon) code for transfer
	 * @param str|AddFreeWhoisguard|Opt : Adds free Whoisguard for the domain Default Value: Yes
	 * @param str|WGenable|Opt : Enables free WhoisGuard for the domain Default Value: No
	 */
	public function create($domainName, $years, $eppCode, $promotionCode=null, $addFreeWhoisguard=null, $wgEnable=null) {
		$data = [
			'DomainName' => $domainName, 'Years' => $years, 
			'EPPCode' => $eppCode, 'PromotionCode' => $promotionCode,
			 'AddFreeWhoisguard' => $addFreeWhoisguard, 'WGEnable' => $wgEnable
		];
		return $this->get($this->command.__FUNCTION__, $data);
	}
	
	/**
	 * @todo Gets the status of a particular transfer.
	 *
	 * @param num|TransferID|Req : The unique Transfer ID which you get after placing a transfer request
	 */
	public function getStatus($transferID) {
		return $this->get($this->command.__FUNCTION__, ['TransferID' => $transferID]);
	}

	/**
	 * @todo Updates the status of a particular transfer. Allows you to re-submit the transfer after releasing the registry lock.
	 *
	 * @param num|TransferID|req : The unique Transfer ID which you get after placing a transfer request
	 * @param str|Resubmit|req : The value 'true' resubmits the transfer
	 */
	public function updateStatus($transferID, $resubmit) {
		return $this->get($this->command.__FUNCTION__, ['TransferID' => $transferID, 'Resubmit'=>$resubmit]);
	}
	
	/**
	 * @todo Gets the list of domain transfers.
	 *
	 *
	 * @param str|ListType|Opt : Possible values are ALL,INPROGRESS, CANCELLED,COMPLETED Default Value: ALL
	 * @param str|SearchTerm|Opt : The keyword should be a domain name.
	 * @param num|Page|Opt : Page to return Default Value: 1
	 * @param num|PageSize|Opt : Number of transfer to be listed on a page. Minimum value: 10; Maximum value: 100 Default Value: 10
	 * @param str|SortBy|Opt : Possible values are DOMAINNAME, DOMAINNAME_DESC,TRANSFERDATE, TRANSFERDATE_DESC,STATUSDATE, STATUSDATE_DESC Default Value: DOMAINNAME
	 */
	public function getList($listType=null, $searchTerm=null, $page=null, $pageSize=null, $sortBy=null) {
		$data = ['ListType' => $listType, 'SearchTerm' => $searchTerm, 'Page' => $page, 'PageSize' => $pageSize, 'SortBy' => $sortBy];
		return $this->get($this->command.__FUNCTION__, $data);
	}

}

?>