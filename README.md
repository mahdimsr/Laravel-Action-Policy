# a laravel package that handle authorization actions by user

[![Latest Version on Packagist](https://img.shields.io/packagist/v/msr/laravel-action-policy.svg?style=flat-square)](https://packagist.org/packages/msr/laravel-action-policy)
[![run-tests](https://github.com/mahdimsr/Laravel-Action-Policy/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/mahdimsr/Laravel-Action-Policy/actions/workflows/run-tests.yml)
[![Check & fix styling](https://github.com/mahdimsr/Laravel-Action-Policy/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/mahdimsr/Laravel-Action-Policy/actions/workflows/php-cs-fixer.yml)

the mindset of this package is the application scenarios separate to some layers, and each layer has its own work todo. so the authorization of an action can be checked in a policy class and as usual
each model has its policy... so for each function/scenario you want to check the authority of the auth user you can use this package

## Installation

You can install the package via composer:

```bash
composer require msr/laravel-action-policy
```

## Usage

```php
$response = \Msr\ActionPolicy\ActionPolicy::builder()
                                ->policy('your policy class or instance')
                                ->policyMethod('method of your policy check authority','parameters you need in method')
                                ->model('your model class or instance')
                                ->modelMethod('method you want to call in you model','parameters you need in method')
                                ->build()->run();
                                
if ($response->allowed())
{
    // do your work
}
elseif ($response->denied())
{
    // show up some error
    log($response->message())
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mahdi Msr](https://github.com/mahdimsr)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
