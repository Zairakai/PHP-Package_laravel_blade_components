---
component: zk-link
family: content
alias: x-zk-link
internal: x-content.link
---

# zk-link

> Renders an `<a>` element with optional route resolution, active class injection, and icon slots.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `href` | `string\|null` | `null` | Explicit URL |
| `route` | `string\|null` | `null` | Laravel route name — generates `href` and adds `active` class when current |
| `routeParams` | `array` | `[]` | Parameters passed to `route()` |
| `target` | `string\|null` | `null` | Link target (`_blank`, `_self`, etc.) |
| `rel` | `string\|null` | `null` | `rel` attribute value |
| `id` | `string\|null` | `null` | HTML `id` attribute |
| `class` | `string\|null` | `null` | CSS class(es) — `active` is appended automatically when route matches |
| `title` | `string\|null` | `null` | `title` tooltip attribute |
| `ariaLabel` | `string\|null` | `null` | `aria-label` attribute |
| `download` | `string\|null` | `null` | `download` attribute value |
| `referrerpolicy` | `string\|null` | `null` | `referrerpolicy` attribute |
| `hreflang` | `string\|null` | `null` | `hreflang` attribute |
| `type` | `string\|null` | `null` | MIME type — ignored if not a valid MIME string |
| `msr` | `string\|null` | `null` | Material Symbols icon name rendered as `<span class="msr">` |
| `iconBefore` | `string\|null` | `null` | Icon name rendered before the label |
| `iconAfter` | `string\|null` | `null` | Icon name rendered after the label |

## Examples

### Simple href

```blade
<x-zk-link href="https://example.com">Visit site</x-zk-link>
```

### Named route with active class

```blade
<x-zk-link route="dashboard">Dashboard</x-zk-link>
{{-- adds class="active" when request()->routeIs('dashboard') --}}
```

### Route with parameters

```blade
<x-zk-link route="user.show" :routeParams="['user' => $user]">
    {{ $user->name }}
</x-zk-link>
```

### With icons

```blade
<x-zk-link route="settings" iconBefore="settings">Settings</x-zk-link>

<x-zk-link href="/download" iconAfter="download" download="file.pdf">
    Download
</x-zk-link>
```

### Icon-only link

```blade
<x-zk-link route="home" msr="home" ariaLabel="Go to homepage" />
```

### External link

```blade
<x-zk-link href="https://example.com" target="_blank" rel="noopener noreferrer">
    External
</x-zk-link>
```

## Notes

- When both `href` and `route` are provided, `href` takes precedence.
- `type` is validated as a MIME type — non-MIME strings (e.g. `"button"`) are silently ignored.
- When icons or `msr` are present alongside slot content, the text is wrapped in a `<span>` automatically.
