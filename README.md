# zairakai/laravel-blade-components

[![Main][pipeline-main-badge]][pipeline-main-link]
[![Develop][pipeline-develop-badge]][pipeline-develop-link]
[![Coverage][coverage-badge]][coverage-link]

[![GitLab Release][gitlab-release-badge]][gitlab-release]
[![Packagist][packagist-badge]][packagist]
[![Downloads][downloads-badge]][packagist]
[![License][license-badge]][license]

[![PHP][php-badge]][php]
[![Laravel][laravel-badge]][laravel]
[![Static Analysis][phpstan-badge]][phpstan]
[![Code Style][pint-badge]][pint]

62 reusable Blade components for forms, layouts, content, and media — auto-registered with the `zk-` prefix, with full i18n support for 21 languages.

---

## Features

- **62 components** auto-registered as `<x-zk-*>` — no manual setup required
- **Form components** (30) — input, select, textarea, checkbox, radio, field, label, button, file, password, switch, and more
- **Layout components** (16) — container, grid, row, column, section, nav, breadcrumb, pagination, tabs, wrapper, and more
- **Content components** (6) — heading, paragraph, link, list, blockquote, msr
- **Media components** (10) — image, video, audio, figure, iframe, canvas, source, track, and more
- **Internal cross-component aliases** — `form.field`, `form.input`, `layout.container`, etc.
- **Publishable assets** — views, translations, and config per individual tags
- **i18n** — 21 supported locales: `en`, `fr`, `es`, `de`, `it`, `pt`, `nl`, `ar`, `zh`, `ja`, `ko`, `ru`, `uk`, `pl`, `cs`, `ro`, `tr`, `sv`, `da`, `fi`, `no`
- **Config** — password minimum length, select icon configurable without publishing views

---

## Install

```bash
composer require zairakai/laravel-blade-components
```

No service provider registration needed — the package auto-discovers via Laravel's package discovery.

---

## Usage

### Form

```blade
{{-- Labeled field with input --}}
<x-zk-field label="Email address" :required="true">
    <x-zk-input type="email" name="email" :value="old('email')" />
</x-zk-field>

{{-- Select --}}
<x-zk-select name="role" :options="$roles" />

{{-- Password --}}
<x-zk-password name="password" />

{{-- Submit button --}}
<x-zk-submit>Save changes</x-zk-submit>
```

### Layout

```blade
<x-zk-container>
    <x-zk-grid>
        <x-zk-grid-item :span="4">
            <x-zk-aside>Sidebar</x-zk-aside>
        </x-zk-grid-item>
        <x-zk-grid-item :span="8">
            <x-zk-main>Main content</x-zk-main>
        </x-zk-grid-item>
    </x-zk-grid>
</x-zk-container>

{{-- Navigation --}}
<x-zk-nav>
    <x-zk-link :href="route('home')">Home</x-zk-link>
    <x-zk-link :href="route('about')">About</x-zk-link>
</x-zk-nav>

{{-- Breadcrumb --}}
<x-zk-breadcrumb :items="$breadcrumbs" />

{{-- Pagination --}}
<x-zk-pagination :paginator="$users" />
```

### Content

```blade
<x-zk-heading level="2">Section title</x-zk-heading>
<x-zk-paragraph>Introductory text.</x-zk-paragraph>
<x-zk-blockquote>A quoted passage.</x-zk-blockquote>

<x-zk-list :items="$features" />
```

### Media

```blade
<x-zk-figure>
    <x-zk-image src="/img/photo.jpg" alt="Photo" />
    <x-zk-figcaption>Caption text</x-zk-figcaption>
</x-zk-figure>

<x-zk-video src="/media/clip.mp4" controls />
```

---

## Config

Publish and customize the package config:

```bash
php artisan vendor:publish --tag=zairakai-config
```

`config/blade-components.php`:

```php
return [
    'password' => [
        'min_characters' => 8,  // minimum password length validation hint
    ],
    'select' => [
        'icon_after' => 'keyboard_arrow_down',  // dropdown icon
    ],
];
```

---

## Publishing

Customize views, translations, or config individually:

```bash
# Blade views (customize any component template)
php artisan vendor:publish --tag=zairakai-components

# Translations (21 locales)
php artisan vendor:publish --tag=zairakai-lang

# Config
php artisan vendor:publish --tag=zairakai-config

# Everything at once
php artisan vendor:publish --tag=zairakai-all
```

Published views land in `resources/views/vendor/zairakai/` and can be freely modified.

---

## Development

```bash
make quality        # pint + phpstan + rector + insights + markdownlint + shellcheck
make quality-fast   # pint + phpstan + markdownlint
make test           # phpunit with coverage
```

---

## Getting Help

[![License][license-badge]][license]
[![Security Policy][security-badge]][security]
[![Issues][issues-badge]][issues]

**Made with ❤️ by [Zairakai][ecosystem]**

<!-- Reference Links -->
[pipeline-main-badge]: https://gitlab.com/zairakai/php-packages/laravel-blade-components/badges/main/pipeline.svg?ignore_skipped=true&key_text=Main
[pipeline-main-link]: https://gitlab.com/zairakai/php-packages/laravel-blade-components/commits/main
[pipeline-develop-badge]: https://gitlab.com/zairakai/php-packages/laravel-blade-components/badges/develop/pipeline.svg?ignore_skipped=true&key_text=Develop
[pipeline-develop-link]: https://gitlab.com/zairakai/php-packages/laravel-blade-components/commits/develop
[coverage-badge]: https://gitlab.com/zairakai/php-packages/laravel-blade-components/badges/main/coverage.svg
[coverage-link]: https://gitlab.com/zairakai/php-packages/laravel-blade-components/-/commits/main
[gitlab-release-badge]: https://img.shields.io/gitlab/v/release/zairakai/php-packages/laravel-blade-components?logo=gitlab
[gitlab-release]: https://gitlab.com/zairakai/php-packages/laravel-blade-components/-/releases
[packagist-badge]: https://img.shields.io/packagist/v/zairakai/laravel-blade-components
[packagist]: https://packagist.org/packages/zairakai/laravel-blade-components
[downloads-badge]: https://img.shields.io/packagist/dt/zairakai/laravel-blade-components
[license-badge]: https://img.shields.io/badge/license-MIT-blue.svg
[license]: ./LICENSE
[security-badge]: https://img.shields.io/badge/security-scanned-green.svg
[security]: ./SECURITY.md
[issues-badge]: https://img.shields.io/gitlab/issues/open-raw/zairakai%2Fphp-packages%2Flaravel-blade-components?logo=gitlab&label=Issues
[issues]: https://gitlab.com/zairakai/php-packages/laravel-blade-components/-/issues
[php-badge]: https://img.shields.io/badge/php-8.4-blue?logo=php
[php]: https://www.php.net
[laravel-badge]: https://img.shields.io/badge/Laravel-12%20%7C%2013-red?logo=laravel
[laravel]: https://laravel.com
[phpstan-badge]: https://img.shields.io/badge/static%20analysis-phpstan-5B2C6F.svg?logo=php
[phpstan]: https://phpstan.org
[pint-badge]: https://img.shields.io/badge/code%20style-pint-22C55E.svg
[pint]: https://laravel.com/docs/pint
[ecosystem]: https://gitlab.com/zairakai
