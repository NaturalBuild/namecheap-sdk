Namecheap SDK for APIs
=======================

[![Latest Version](https://img.shields.io/badge/release-v1.0-blue.svg)]()
[![Build Status](https://img.shields.io/badge/build-error-lightgrey.svg)]()
[![Total Downloads](https://img.shields.io/badge/downloads-1k-green.svg)]()

Namecheap SDK is a PHP lib that makes it easy to manage Namecheap APIs.

## API Methods Examples:

### Create a connection to the Namecheap API which you can then pass into other services, e.g. domains, later on
```php
$client = new Namecheap\Api($apiUser, $apiKey, $userName, $clientIp, $returnType);
// Return type can be: xml (default), array, json
$ncDomains = new  Namecheap\Domain\Domains($client);
$domainList = $ncDomains->getList();
$contactsInfo = $ncDomains->getContacts($domainName);
$result = $ncDomains->create($dataArr);
```

### Enable / Disable sandbox mode (sandbox is disabled by default) 
```php
$client = new Namecheap\Api($apiUser, $apiKey, $userName, $clientIp, $returnType);
$client->enableSandbox();
$client->disableSandbox();
```

### Json Response example
```json
{
	"ApiResponse": {
		"Errors": "",
		"RequestedCommand": "namecheap.domains.getList",
		"CommandResponse": {
			"DomainGetListResult": {
				"Domain": [
					{
						"_ID": "127",
						"_Name": "domain1.com",
						"_User": "owner",
						"_Created": "02/15/2016",
						"_Expires": "02/15/2022",
						"_IsExpired": "false",
						"_IsLocked": "false",
						"_AutoRenew": "false",
						"_WhoisGuard": "ENABLED",
						"_IsPremium": "true",
						"_IsOurDNS": "true"
					},
					{
						"_ID": "381",
						"_Name": "domain2.com",
						"_User": "owner",
						"_Created": "04/28/2016",
						"_Expires": "04/28/2023",
						"_IsExpired": "false",
						"_IsLocked": "false",
						"_AutoRenew": "true",
						"_WhoisGuard": "NOTPRESENT",
						"_IsPremium": "false",
						"_IsOurDNS": "true"
					},
					{
						"_ID": "385",
						"_Name": "domain3.com",
						"_User": "owner",
						"_Created": "05/22/2016",
						"_Expires": "05/22/2023",
						"_IsExpired": "false",
						"_IsLocked": "false",
						"_AutoRenew": "true",
						"_WhoisGuard": "ENABLED",
						"_IsPremium": "false",
						"_IsOurDNS": "false"
					}
				]
			},
			"Paging": {
				"TotalItems": "2",
				"CurrentPage": "1",
				"PageSize": "10"
			},
			"_Type": "namecheap.domains.getList"
		},
		"Server": "SERVER-NAME",
		"GMTTimeDifference": "+5",
		"ExecutionTime": "0.078",
		"_xmlns": "http://api.namecheap.com/xml.response",
		"_Status": "OK"
	}
}
```

#### domains
```php
$ncDomains = new  Namecheap\Domain\Domains($apiUser, $apiKey, $userName, $clientIp, 'json');
$domainList = $ncDomains->getList();
$contactsInfo = $ncDomains->getContacts($domainName);
$result = $ncDomains->create($dataArr);
```

#### domains.dns
```php
$ncDomainsDns = new  Namecheap\Domain\DomainsDns($apiUser, $apiKey, $userName, $clientIp);
$list = $ncDomainsDns->getList('domain', 'com');
$default = $ncDomainsDns->setDefault('domain', 'com');
```

#### domains.ns
```php
$ncDomainsNs = new  Namecheap\Domain\DomainsNs($apiUser, $apiKey, $userName, $clientIp);
$list = $ncDomainsNs->create('domain', 'com', 'ns1.domain.com', '192.165.15.103');
```

#### domains.transfer
```php
$ncDomainsTrns = new  Namecheap\Domain\DomainsTransfer($apiUser, $apiKey, $userName, $clientIp);
$getStatus = $ncDomainsTrns->getStatus($transferID);
```
#### ssl
```php
$ncSsl = new  Namecheap\Ssl\Ssl($apiUser, $apiKey, $userName, $clientIp);
$result = $ncSsl->create($Years, $Type, $SANStoADD, $PromotionCode);
```

#### users
```php
$ncUsers = new  Namecheap\Users\Users($apiUser, $apiKey, $userName, $clientIp);
$pricing = $ncUsers->getPricing('DOMAIN');
$userBal = $ncUsers->getBalances();
# Change password
$result = $ncUsers->changePassword($oldPassword, $newPassword);
# Reset pass
$result = $ncUsers->changePassword($resetCode, $newPassword, true);
```

#### users.address
```php
$ncUsersAddr = new  Namecheap\Users\UsersAddress($apiUser, $apiKey, $userName, $clientIp);
$getStatus = $ncUsersAddr->getInfo($AddressId);
```

#### whoisguard
```php
$ncWhoisguard = new  Namecheap\Whoisguard\Whoisguard($apiUser, $apiKey, $userName, $clientIp);
$result = $ncWhoisguard->getInfo($WhoisguardID, $ForwardedToEmail);
```

## Help and docs

## Installing

The recommended way to install Namecheap-sdk is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Namecheap-sdk:

```bash
php composer.phar require saddamrhossain/namecheap-sdk
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update namecheap-sdk using composer:

 ```bash
composer.phar update
 ```


## Version Guidance

| Version | Status     | Packagist           | Namespace    | Repo                | Docs                | PSR-7 | PHP Version |
|---------|------------|---------------------|--------------|---------------------|---------------------|-------|-------------|
| 1.x     | ---        | `saddamrhossain/namecheap-sdk`     | `Namecheap`     | - | - | No    | >= 5.6    |
