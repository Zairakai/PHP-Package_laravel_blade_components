# zairakai/laravel-blade-components

[![Main][pipeline-main-badge]][pipeline-main-link]
[![Develop][pipeline-develop-badge]][pipeline-develop-link]
[![Coverage][coverage-badge]][coverage-link]

[![GitLab Release][gitlab-release-badge]][gitlab-release]
[![Packagist][packagist-badge]][packagist]
[![Docs][docs-badge]][docs]
[![Downloads][downloads-badge]][packagist]
[![License][license-badge]][license]

[![PHP][php-badge]][php]
[![Laravel][laravel-badge]][laravel]
[![Static Analysis][phpstan-badge]][phpstan]
[![Code Style][pint-badge]][pint]

128 reusable Blade components for forms, layouts, content, display, feedback, navigation, overlays, and media — auto-registered with the `zk-` prefix, with full i18n support for 21 languages.

**Documentation: [laravel-blade-components-c26c8e.gitlab.io][docs]**

---

## Features

- **128 components** auto-registered as `<x-zk-*>` — no manual setup required
- **Form components** (33) — input, select, textarea, checkbox, radio, field, label, button, file, password, switch, and more
- **Layout components** (21) — container, grid, row, column, section, nav, breadcrumb, pagination, tabs, wrapper, and more
- **Content components** (15) — heading, paragraph, link, list, blockquote, msr, code, kbd, callout, code-block, code-group, terminal, diff, json-viewer, markdown
- **Display components** (20) — card, badge, avatar, divider, accordion, chip, stat, empty-state, rating, timeline, meter, description-list, tree, carousel (with indicators, buttons and autoplay), chip-group, list-item
- **Feedback components** (7) — alert, banner, progress, skeleton, toast, cookie-banner
- **Navigation components** (6) — stepper, skip-link, back-to-top, app-bar, bottom-navigation
- **Overlay components** (7) — modal, drawer, confirm-dialog, tooltip, popover, dropdown, on native `dialog` and `popover`, no script
- **Data components** (1) — table, with sort links
- **Only what the page needs** — `<x-zk-scripts />` and `<x-zk-styles />` print only the scripts and styles of the components that were rendered, in one tag each that takes a CSP nonce; no component uses an inline handler or an inline style
- **Media components** (12) — image, video, audio, figure, iframe, canvas, source, track, and more
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

<x-zk-callout variant="warning" title="Careful">This resets your settings.</x-zk-callout>
<x-zk-kbd :keys="['Ctrl', 'K']" />
```

### Display and feedback

The new components are unstyled: they give the markup, the accessibility and the same class hooks and `data-*` attributes as [`@zairakai/vue-components`](https://www.npmjs.com/package/@zairakai/vue-components) (`.badge[data-variant="success"]`, `.alert[data-variant="error"]`), so one style sheet serves both.

```blade
<x-zk-card title="Profile">
    <x-zk-avatar name="Ada Lovelace" />
    <x-zk-badge variant="success">Active</x-zk-badge>
</x-zk-card>

<x-zk-alert variant="error" title="Payment failed" :dismissible="true">Your card was declined.</x-zk-alert>
<x-zk-progress :value="40" label="Upload" />
```

### Content security policy

Most components need no script. The few that do (dismiss, copy, carousel buttons and autoplay, countdown, share, theme, cookie consent, opening a modal on older browsers) are written as data attributes, and they ask for their script while they render. Put these after your content, and only what the page uses is printed, with your nonce:

```blade
@yield('content')

<x-zk-styles />
<x-zk-scripts />                    {{-- the nonce of Vite::cspNonce(), when there is one --}}
<x-zk-scripts :nonce="$nonce" />    {{-- or yours --}}
```

A page with no such component gets no `<script>` and no `<style>`. Publish the files (`php artisan vendor:publish --tag=zairakai-assets`) to import the ones you want in your own bundle.

### Overlays

```blade
<button commandfor="confirm" command="show-modal">Delete</button>

<x-zk-modal id="confirm" title="Delete this project?">
    This cannot be undone.
</x-zk-modal>

<x-zk-dropdown id="account" label="Account">
    <x-slot:trigger>Account</x-slot>
    <x-zk-dropdown-item href="/profile">Profile</x-zk-dropdown-item>
</x-zk-dropdown>
```

A closing `</x-slot>` must be followed by a line break, or Blade reads the next word as part of the directive.

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

## Statistics

![Statistics of laravel-blade-components][stats-card]

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
[docs]: https://laravel-blade-components-c26c8e.gitlab.io
[docs-badge]: https://img.shields.io/badge/docs-online-blue
[stats-card]: https://gitlab.com/zairakai/gitlab-profile/-/raw/main/assets/projects/laravel-blade-components.svg
