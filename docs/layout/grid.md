---
component: zk-grid
family: layout
alias: x-zk-grid
internal: x-layout.grid
---

# zk-grid

> Renders a `<div class="grid">` wrapper with optional column count class.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `columns` | `int\|null` | `null` | Appends `grid-cols-{N}` class when set |
| `class` | `string\|null` | `null` | Replaces the base `grid` class when provided |

## Examples

### Default grid

```blade
<x-zk-grid>
    <x-zk-grid-item>A</x-zk-grid-item>
    <x-zk-grid-item>B</x-zk-grid-item>
</x-zk-grid>
{{-- renders: <div class="grid">...</div> --}}
```

### With column count

```blade
<x-zk-grid :columns="3">
    ...
</x-zk-grid>
{{-- renders: <div class="grid grid-cols-3">...</div> --}}
```

### Custom class (replaces grid)

```blade
<x-zk-grid class="product-grid">
    ...
</x-zk-grid>
{{-- renders: <div class="product-grid">...</div> --}}
```

## Notes

- When `class` is provided it **replaces** the base `grid` class, unlike most other layout components where `class` is merged.
