---
component: zk-breadcrumb
family: layout
alias: x-zk-breadcrumb
internal: x-layout.breadcrumb
---

# zk-breadcrumb

> Renders a `<nav>` + `<ol>` breadcrumb trail from a data array.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `items` | `array` | `[]` | Array of breadcrumb item definitions |
| `ariaLabel` | `string` | `'breadcrumb'` | `aria-label` on the `<nav>` element |
| `class` | `string\|null` | `null` | CSS class(es) on the `<nav>` element |

## Item Structure

| Key | Type | Required | Description |
|-----|------|----------|-------------|
| `label` | `string` | Yes | Display text |
| `url` | `string` | No | Link URL — renders `<a>` when present, `<span>` otherwise |
| `aria-current` | `string` | No | Value for `aria-current` attribute on the `<span>` |

## Examples

### Basic trail

```blade
<x-zk-breadcrumb :items="[
    ['label' => 'Home',     'url' => '/'],
    ['label' => 'Blog',     'url' => '/blog'],
    ['label' => 'My Post',  'aria-current' => 'page'],
]" />
```

### From route data

```blade
<x-zk-breadcrumb :items="$breadcrumbs" />
```

```php
// In controller or view composer:
$breadcrumbs = [
    ['label' => 'Home',      'url' => route('home')],
    ['label' => $category->name, 'url' => route('category.show', $category)],
    ['label' => $post->title, 'aria-current' => 'page'],
];
```
