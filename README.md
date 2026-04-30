<p align="center"><a href="https://solutionforest.com" target="_blank"><img src="https://github.com/solutionforest/.github/blob/main/docs/images/sf.png?raw=true" width="200"></a></p>

# Filament Unlayer

[![Latest Version on Packagist](https://img.shields.io/packagist/v/solution-forest/filament-unlayer.svg?style=flat-square)](https://packagist.org/packages/solution-forest/filament-unlayer)
[![Total Downloads](https://img.shields.io/packagist/dt/solution-forest/filament-unlayer.svg?style=flat-square)](https://packagist.org/packages/solution-forest/filament-unlayer)


> **Filament Unlayer** is a custom field package designed for [Filaletter](https://filaletter.solutionforest.net), the Filament Newsletter plugin. It enables rich, drag-and-drop email template editing within your FilamentPHP admin panel, powered by the Unlayer editor.

With Filament Unlayer, you can:

- Build and edit email templates visually with Unlayer’s intuitive interface
- Store both the HTML and JSON design data for each template
- Reuse, duplicate, and manage templates for different campaigns or use cases
- Integrate seamlessly as a custom field in any FilamentPHP resource or form
- Export clean, production-ready HTML for sending with your preferred email service
- Customize the Unlayer editor’s appearance and options to fit your workflow

---

## Features

- **Drag-and-drop email builder**: Integrates Unlayer for visual email design.
- **Saves both HTML and JSON design data**: Store and reuse templates flexibly.
- **Easy integration**: Use as a custom field in your Filament forms.
- **Export HTML**: Easily extract the generated HTML for sending.

---

## Installation


| Filament Version | Filament Newsletter Version |
|------------------|---------------------------|
| v3.x             | v0.x               |
| v4.x             | v2.x
| v5.x             | >= v2.0.7


Install via Composer:

```bash
composer require solution-forest/filament-unlayer
php artisan filament:assets
```

Publish the config file (optional):

```bash
php artisan vendor:publish --tag="filament-unlayer-config"
```

Publish the views (optional):

```bash
php artisan vendor:publish --tag="filament-unlayer-views"
```

---


## Usage

### 1. Prepare Your Database

First, ensure your table has a `json` column to store the Unlayer design and HTML. For example, in a migration:

```php
$table->json('content');
```

### 2. Add the Unlayer Field to Your Filament Form

Add the Unlayer field to your resource or form:

```php
use SolutionForest\FilamentUnlayer\FilamentUnlayer;

FilamentUnlayer::make('content');
```

This field will save both the HTML and the Unlayer design JSON into your `content` column.

### 3. Exporting HTML

If you want to store only the HTML in a separate field, you can mount the HTML state to another field:

```php
FilamentUnlayer::make('json-content')->mountHtmlStateTo('data.content');

Hidden::make('content');
```

Or, extract the HTML from the field data before saving:

```php
protected function mutateFormDataBeforeSave(array $data): array
{
    $data['content'] = $data['json-content']['html'];
    return $data;
}
```

---

## Testing

```bash
composer test
```

---

## Changelog

See [CHANGELOG](CHANGELOG.md) for recent updates.

---

## Contributing

See [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

---

## Security

See [security policy](../../security/policy) for reporting vulnerabilities.

---

## Credits

- [kelseylee](https://github.com/solutionforest)
- [All Contributors](../../contributors)

---

## License

MIT. See [License File](LICENSE.md) for details.
