<?php 
namespace Namecheap;

use Namecheap\Exception\AuthenticationException;
use Namecheap\Xml;
/**
 * Namecheap API wrapper
 *
 * Main Abstract class
 *
 * @author Saddam Hossain <saddamrhossain@gmail.com>
 *
 * @version 1
 */
class Api {

	public $endPoint = 'https://api.namecheap.com/xml.response';
	public $apiUser;
	public $apiKey;
	public $userName;
	public $clientIp;
	public $curl_options;
	public $returnType = 'xml';

	public function __construct() {
		$num_args = func_num_args();

		if ($num_args === 1) {
			$args = func_get_args();
			$client = $args[0];
			$this->apiUser  = $client->apiUser;
			$this->apiKey   = $client->apiKey;
			$this->userName = $client->userName;
			$this->clientIp = $client->clientIp;
			$this->curl_options = $client->curl_options;
			$this->returnType = $client->returnType;
		} else if ($num_args >= 4) {
			$args = func_get_args();
			$this->apiUser  = $args[0];
			$this->apiKey   = $args[1];
			$this->userName = $args[2];
			$this->clientIp = $args[3];

			if (isset($args[4]) && !empty($args[4])) {
				$this->returnType = $args[4];
			}
		}
	}

	public function endPoint($endPoint) { $this->endPoint  = $endPoint; }
	public function apiUser($apiUser) 	{ $this->apiUser  = $apiUser; }
	public function apiKey($apiKey) 	{ $this->apiKey   = $apiKey;  }
	public function userName($userName) { $this->userName = $userName;}
	public function clientIp($clientIp) { $this->clientIp = $clientIp;}
	public function setCurlOption($key, $value) { $this->curl_options[$key] = $value; }
	public function setReturnType($returnType) { $this->returnType = $returnType; }

	public function enableSandbox() {
		$this->endPoint('https://api.sandbox.namecheap.com/xml.response');
	}

	public function disableSandbox() {
		$this->endPoint('https://api.namecheap.com/xml.response');
	}

	/*API call method for sending requests using GET*/
	public function get($command, array $data = []) {
		return $this->request($command, $data, 'get');
	}

	/*API call method for sending requests using POST*/
	public function post($command, array $data = []) {
		return $this->request($command, $data, 'post');
	}

	/* Return null if empty or is not set */
	protected function checkEmpty($v) {
		return !empty($v) ? $v : null;
	}

	protected function checkRequiredFields($dataArr, $requiredFields) {
		$reqFields = [];
		foreach ($requiredFields as $key => $f) {
			if(empty($dataArr[$f])) $reqFields[] = $f;
		}
		return $reqFields;
	}

	protected function request($command, array $data = [], $type='get') {
		if (!isset($this->apiUser) || !isset($this->apiKey) || !isset($this->clientIp)) {
			throw new AuthenticationException('Authentication information must be provided.');
		}

		$url = $this->endPoint;
		$data['ApiUser']  = $this->apiUser;
    	$data['ApiKey']   = $this->apiKey;
    	$data['UserName'] = $this->userName;
    	$data['ClientIp'] = $this->clientIp;
        $data['Command']  = $command;

		//Removes null entries
		$data = array_filter($data, function ($val) {  return !is_null($val); });

		$default_curl_options = [
            CURLOPT_VERBOSE        => false,
            CURLOPT_FORBID_REUSE   => true,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER         => false,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_SSL_VERIFYPEER => true,
        ];

        $curl_options = $default_curl_options;
        if (isset($this->curl_options) && is_array($this->curl_options)) {
            $curl_options = array_replace($default_curl_options, $this->curl_options);
        }
        $user_agent = __FILE__;
        $ch = curl_init();
        curl_setopt_array($ch, $curl_options);

        if (strtolower($type) === 'get') {
            $url .= '?'.http_build_query($data);
        } else if (strtolower($type) === 'post') {
          	curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } else {
        	throw new \Exception("Invalid request method", 1);
        }
 
        curl_setopt($ch, CURLOPT_URL, $url);

        $xmlData = curl_exec($ch);
        $error = curl_error($ch);
        $information = curl_getinfo($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (in_array($http_code, [401, 403])) {
            throw new UnauthorizedException('No Permission to perform this request');
        }

        if(!empty($error)) {
    		throw new \Exception($error);
    	}
        
        if ($this->returnType === 'json') {
        	return json_encode(Xml::createArray($xmlData));
        } else if ($this->returnType === 'array') {
        	return Xml::createArray($xmlData);
        }
        return $xmlData;
	}
}

?>
