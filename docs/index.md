# Laravel Blade Components

Opinionated Laravel Blade component library organised in four families.

## Families

| Family | Description |
|--------|-------------|
| [content](./content/index.md) | Typography and inline content elements |
| [form](./form/index.md) | Form controls, wrappers and validation |
| [layout](./layout/index.md) | Structural and semantic page elements |
| [medias](./medias/index.md) | Images, video, audio and embeds |

## Aliases

Every component is registered under two aliases:

| Alias | Example | Purpose |
|-------|---------|---------|
| `x-zk-*` | `<x-zk-input>` | Public usage in consumer apps |
| `x-[family].*` | `<x-form.input>` | Internal usage inside package templates |

## Attribute Forwarding

All components forward undeclared attributes to their root HTML element via `$attributes`. Any attribute not listed in a component's prop table passes through directly.

```blade
<x-zk-input name="q" wire:model="query" x-bind:disabled="loading" data-tracking="search" />
```

## Boolean Props

Boolean props accept PHP booleans (`:prop="true"`) or bare HTML attributes (`prop`). Passing string `"false"` is also handled correctly via internal `filter_var` casting.

```blade
{{-- All equivalent --}}
<x-zk-input name="email" required />
<x-zk-input name="email" :required="true" />
<x-zk-input name="email" required="true" />
```

## Installation

```bash
composer require zairakai/laravel-blade-components
```

Publish assets optionally:

```bash
# Views only
php artisan vendor:publish --tag=zairakai-components

# Translations only
php artisan vendor:publish --tag=zairakai-lang

# Config only
php artisan vendor:publish --tag=zairakai-config

# Everything
php artisan vendor:publish --tag=zairakai-all
```
