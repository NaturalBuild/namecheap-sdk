Namecheap SDK for APIs
=======================

[![Latest Version](https://img.shields.io/badge/release-v1.0-blue.svg)]()
[![Build Status](https://img.shields.io/badge/build-error-lightgrey.svg)]()
[![Total Downloads](https://img.shields.io/badge/downloads-1k-green.svg)](https://packagist.org/packages/guzzlehttp/guzzle)

Namecheap SDK is a PHP lib that makes it easy to manage Namecheap APIs.

## API Methods Examples:
#### Domains
```php
$ncDomains = new  Namecheap\Domains\Domains($apiUser, $apiKey, $userName, $clientIp);
$domainList = $ncDomains->getList();
$contactsInfo = $ncDomains->getContacts($domainName);
$result = $ncDomains->create($dataArr);
```
#### Users
```php
$ncUsers = new  Namecheap\Users\Users($apiUser, $apiKey, $userName, $clientIp);
$pricing = $ncUsers->getPricing('DOMAIN');
$userBal = $ncUsers->getBalances();
# Change password
$result = $ncUsers->changePassword($oldPassword, $newPassword);
# Reset pass
$result = $ncUsers->changePassword($resetCode, $newPassword, true);
```
## Help and docs

## Installing

The recommended way to install Guzzle is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Guzzle:

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
