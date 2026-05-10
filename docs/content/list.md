---
component: zk-list
family: content
alias: x-zk-list
internal: x-content.list
---

# zk-list

> Renders a `<ul>` or `<ol>` element. Supports a slot for custom markup or a data-driven `items` array with typed entries.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string\|null` | `null` | HTML `id` attribute |
| `class` | `string\|null` | `null` | CSS class(es) |
| `ordered` | `bool` | `false` | Renders `<ol>` when true, `<ul>` when false |
| `items` | `array` | `[]` | Array of item definitions (see Item Types below) |

## Item Types

Each item in `items` must have a `type` key. Supported types:

| Type | Renders | Required keys |
| ---- | ------- | ------------- |
| `route` | `<x-zk-link>` with route | `route`, `label` |
| `href` | `<x-zk-link>` with href | `href`, `label` |
| `button` | `<x-zk-button>` | `label` |
| `form` | `<x-zk-form>` + `<x-zk-submit>` | `route` or `action`, `label` |
| `text` | Plain text | `label` |
| `paragraph` | `<x-zk-paragraph>` | `label` |
| `icon` | `<x-zk-msr>` | `icon` |
| `img` | `<x-zk-image>` | `img`, `alt` |

All item types also accept a `children` key for nested lists:

```php
'children' => [
    'ordered' => false,
    'items'   => [...],
]
// or shorthand:
'children' => [...items array...]
```

## Examples

### Slot-based (custom markup)

```blade
<x-zk-list class="nav-list">
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
</x-zk-list>
```

### Data-driven navigation links

```blade
<x-zk-list :items="[
    ['type' => 'route', 'route' => 'home',    'label' => 'Home'],
    ['type' => 'route', 'route' => 'about',   'label' => 'About'],
    ['type' => 'href',  'href'  => '/contact', 'label' => 'Contact'],
]" />
```

### Ordered list

```blade
<x-zk-list :ordered="true" :items="[
    ['type' => 'text', 'label' => 'First step'],
    ['type' => 'text', 'label' => 'Second step'],
]" />
```

### With nested list

```blade
<x-zk-list :items="[
    [
        'type'     => 'text',
        'label'    => 'Parent item',
        'children' => [
            ['type' => 'text', 'label' => 'Child item 1'],
            ['type' => 'text', 'label' => 'Child item 2'],
        ],
    ],
]" />
```

### Action list (form submissions)

```blade
<x-zk-list :items="[
    ['type' => 'form', 'route' => 'logout', 'method' => 'post', 'label' => 'Sign out'],
]" />
```

## Notes

- When a slot is provided it takes full precedence over `items`.
- `type` values `route` and `href` both render `<x-zk-link>` — use `route` for named routes, `href` for explicit URLs.
