# Twig Extension for Generating `mailto:` Links
This Twig extension allows you to easily create `mailto:` links in your templates.

## Installation
Install the library with Composer:

```
composer require 1tomany/twig-mailto
```

Tag the `OneToMany\Twig\MailtoExtension` as a Twig extension in your services configuration:

```yaml
services:
    OneToMany\Twig\MailtoExtension:
        tags: [twig.extension]
```

## Usage
This extension exposes a single function named `mailto()` with the following signature:

```php
function mailto(string $email, string $subject = '', string $content = ''): string;
```

In your Twig template, create a `mailto:` link by calling it like this:

```twig
<a href="{{ mailto('contact@example.com', 'I need help!', 'Please help me. Thank you!') }}">
  Email us for help
</a>
```

This will generate the following value:

```html
mailto:contact@example.com?subject=I%20need%20help%21&amp;body=Please%20help%20me.%20Thank%20you%21
```

## Testing
``` bash
./vendor/bin/phpunit
```

## Credits
- [Vic Cherubini](https://github.com/viccherubini), [1:N Labs, LLC](https://1tomany.com)

## License
The MIT License
