Namecheap SDK for APIs
=======================

[![Latest Version](https://img.shields.io/badge/release-v1.0-blue.svg)]()
[![Build Status](https://img.shields.io/badge/build-error-lightgrey.svg)]()
[![Total Downloads](https://img.shields.io/badge/downloads-1k-green.svg)]()

Namecheap SDK is a PHP lib that makes it easy to manage Namecheap APIs.

## API Methods Examples:
#### domains
```php
$ncDomains = new  Namecheap\Domain\Domains($apiUser, $apiKey, $userName, $clientIp);
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
