---
component: zk-tabs
family: layout
alias: x-zk-tabs
internal: x-layout.tabs
---

# zk-tabs

> Renders a Bootstrap-compatible tab navigation with panels from a data array. Tab IDs are unique per instance.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `tabs` | `array` | `[]` | Array of tab definitions |
| `class` | `string\|null` | `null` | Additional CSS class(es) on the `<ul>` nav element |

All undeclared attributes forward to the outer `<div>` wrapper.

## Tab Item Structure

| Key | Type | Required | Description |
|-----|------|----------|-------------|
| `label` | `string` | Yes | Tab button label |
| `content` | `string` | Yes | Panel HTML content |

## Examples

### Basic tabs

```blade
<x-zk-tabs :tabs="[
    ['label' => 'Overview',  'content' => '<p>Overview content</p>'],
    ['label' => 'Details',   'content' => '<p>Details content</p>'],
    ['label' => 'Reviews',   'content' => '<p>Reviews content</p>'],
]" />
```

### From controller data

```blade
<x-zk-tabs :tabs="$product->tabsData()" id="product-tabs" />
```

### Multiple instances on same page

```blade
{{-- Safe — each instance generates a unique ID prefix internally --}}
<x-zk-tabs :tabs="$tabs1" />
<x-zk-tabs :tabs="$tabs2" />
```

## Notes

- Requires Bootstrap JS for tab functionality (`data-bs-toggle="tab"`).
- The first tab is active by default.
- Tab panel IDs are prefixed with `uniqid()` — safe for multiple instances on the same page.
