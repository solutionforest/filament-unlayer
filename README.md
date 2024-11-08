# This is my package filament-unlayer

[![Latest Version on Packagist](https://img.shields.io/packagist/v/solutionforest/filament-unlayer.svg?style=flat-square)](https://packagist.org/packages/solutionforest/filament-unlayer)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/solutionforest/filament-unlayer/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/solutionforest/filament-unlayer/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/solutionforest/filament-unlayer/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/solutionforest/filament-unlayer/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/solutionforest/filament-unlayer.svg?style=flat-square)](https://packagist.org/packages/solutionforest/filament-unlayer)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require solution-forest/filament-unlayer
php artisan filament:assets
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-unlayer-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-unlayer-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-unlayer-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

This field will save both html and design data as json.

```php
\SolutionForest\FilamentUnlayer\FilamentUnlayer::make('content');
```


## Exporting html

Mount the html state by using function mountHtmlStateTo.

```php
\SolutionForest\FilamentUnlayer\FilamentUnlayer::make('json-content')->mountHtmlStateTo('data.content');
Hidden::make('content');
```

Alternatively, get the html from the field data.

```php
class EditRecord
{
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['content'] = $data['json-content']['html'];
        return $data;
    }
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [kelseylee](https://github.com/solutionforest)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
