---
component: zk-section
family: layout
alias: x-zk-section
internal: x-layout.section
---

# zk-section

> Renders a `<section>` element. Wraps slot content in a `zk-container` by default.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string\|null` | `null` | CSS class(es) on the `<section>` element |
| `container` | `bool` | `true` | Wrap slot content in `<x-zk-container>` |

## Examples

### Default (with container)

```blade
<x-zk-section class="hero">
    <x-zk-heading :level="1">Welcome</x-zk-heading>
</x-zk-section>
{{-- renders: <section class="hero"><div class="container">...</div></section> --}}
```

### Without container

```blade
<x-zk-section class="full-bleed" :container="false">
    <img src="/hero.jpg" alt="Hero image">
</x-zk-section>
```
