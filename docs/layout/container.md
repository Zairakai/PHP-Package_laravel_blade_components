---
component: zk-container
family: layout
alias: x-zk-container
internal: x-layout.container
---

# zk-container

> Renders a `<div class="container">` element.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string\|null` | `null` | Additional CSS class(es) — merged with base `container` class |

## Example

```blade
<x-zk-container>
    Page content here.
</x-zk-container>
{{-- renders: <div class="container">...</div> --}}
```

## Notes

- The `container` base class is always present.
- Used automatically by `zk-section` unless opted out with `:container="false"`.
