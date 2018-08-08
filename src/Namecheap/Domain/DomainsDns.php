<?php 

namespace Namecheap\Domain;

use Namecheap\Api;
use Namecheap\Exception\NamecheapException;
/**
 * Namecheap API wrapper
 *
 * Method DomainsDns
 * Manage Domains DNS
 *
 * @author Saddam Hossain <saddamrhossain@gmail.com>
 *
 * @version 1
 */
class DomainsDns extends Api {

	protected $command = 'namecheap.domains.dns';

	/**
	 * @todo Sets domain to use our default DNS servers. Required for free services like Host record management, URL forwarding, email forwarding, dynamic dns and other value added services.
	 *
	 * @param str|SLD|Req : SLD of the DomainName
	 * @param str|TLD|Req : TLD of the DomainName
	 */
	public function setDefault($std, $tld) {
		return $this->get($this->command.__FUNCTION__, ['STD' => $std, 'TLD' => $tld]);
	}

	/**
	 * @todo Sets domain to use custom DNS servers. NOTE: Services like URL forwarding, Email forwarding, Dynamic DNS will not work for domains using custom nameservers.
	 *
	 * @param str|SLD|Req : SLD of the DomainName
	 * @param str|TLD|Req : TLD of the DomainName
	 * @param str|Nameservers|Req : A comma-separated list of name servers to be associated with this domain
	 * 
	 * @NOTE: Services like URL forwarding, Email forwarding, Dynamic DNS will not work for domains using custom nameservers
	 */
	public function setCustom($std, $tld, $ns) {
		return $this->get($this->command.__FUNCTION__, ['STD' => $std, 'TLD' => $tld, 'Nameservers' => $ns]);
	}

	/**
	 * @todo Gets a list of DNS servers associated with the requested domain
	 *
	 * @param str|SLD|Req : SLD of the DomainName
	 * @param str|TLD|Req : TLD of the DomainName
	 */
	public function getList($std, $tld) {
		return $this->get($this->command.__FUNCTION__, ['STD' => $std, 'TLD' => $tld]);
	}

	/**
	 * @todo Retrieves DNS host record settings for the requested domain

	 * @param str|SLD|Req : SLD of the DomainName
	 * @param str|TLD|Req : TLD of the DomainName
	 */
	public function getHosts($std, $tld) {
		return $this->get($this->command.__FUNCTION__, ['STD' => $std, 'TLD' => $tld]);
	}

	/**
	 * @todo Gets email forwarding settings for the requested domain
	 * 
	 * @param str|DomainName|req : Domain name to get settings
	 */
	public function getEmailForwarding($domainName) {
		return $this->get($this->command.__FUNCTION__, ['DomainName' => $domainName]);
	}

	/**
	 * @todo Sets email forwarding for a domain name
	 *
	 * @param str|DomainName|req : Domain name to set settings
	 * @param str|MailBox[1..n]|req : MailBox for which you wish to set email forwarding. For example:example@namecheap.com
	 * @param str|ForwardTo[1..n]|req : Email address to forwardto.For example:example@gmail.com
	 *
	 * @NOTE: The [ ] brackets are used to represent optional values (e.g.[1...n]). Do not include the [ ] brackets in your API requests.Please refer to the example API request given below.
	 */
	public function setEmailForwarding($domainName, array $mailBox, array $forwardTo) {
		# mailBox Example : ['mailbox1' => 'info', 'mailbox2' => 'careers'];
		# ForwardTo Example : ['ForwardTo1' => 'domaininfo@gmail.com', 'ForwardTo2' => 'domaincareer@gmail.com'];
		$data = ['DomainName' => $domainName];
		return $this->get($this->command.__FUNCTION__, array_merge($data, $mailBox, $forwardTo));
	}

	/**
	 * @todo Sets DNS host records settings for the requested domain.
	 * @IMPORTANT:  We recommend you use HTTPPOST method when setting more than 10 hostnames. All host records that are not included into the API call will be deleted, so add them in addition to new host records.
	 * 
	 * @param str|SLD|req : SLD of the domain to setHosts
	 * @param str|TLD|req : TLD of the domain to setHosts
	 * @param str|HostName[1..n]|req : Sub-domain/hostname to create the record for
	 * @param str|RecordType[1..n]|req : Possible values: A, AAAA, CNAME, MX, MXE, NS, TXT, URL, URL301, FRAME
	 * @param str|Address[1..n]|req : Possible values are URL or IP address. The value for this parameter is based on RecordType.
	 * @param str|MXPref[1..n]|req : MX preference for host. Applicable for MX records only.
	 *
	 * @param str|EmailType|opt : Possible values are MXE, MX, FWD, OX
	 * @param str|TTL[1..n]|opt : Time to live for all record types.Possible values: any value between 60 to 60000 Default Value: 1800
	 *
	 * @NOTE: The [ ] brackets are used to represent optional values (e.g.[1...n]). Do not include the [ ] brackets in your API requests.
	 */
	public function setHosts($sld, $tld, array $hostName, array $recordType, array $address, array $mXPref, $emailType=null, array $ttl=[]) {
		$data = ['SLD' => $sld, 'TLD' => $tld, 'EmailType' => $emailType];
		return $this->post($this->command.__FUNCTION__, array_merge($data, $hostName, $recordType, $address, $mXPref, $ttl));
	}
}

?>