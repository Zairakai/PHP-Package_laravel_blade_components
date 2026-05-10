---
component: zk-msr
family: content
alias: x-zk-msr
internal: x-content.msr
---

# zk-msr

> Renders a Material Symbols icon as `<span class="msr">icon_name</span>`.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string\|null` | `null` | Additional CSS class(es) — merged with the base `msr` class |

## Examples

### Basic icon

```blade
<x-zk-msr>home</x-zk-msr>
{{-- renders: <span class="msr">home</span> --}}
```

### With additional class

```blade
<x-zk-msr class="icon-lg">settings</x-zk-msr>
{{-- renders: <span class="msr icon-lg">settings</span> --}}
```

## Notes

- The `msr` base class is always present and cannot be removed.
- Requires the Material Symbols font to be loaded in the consuming application.
