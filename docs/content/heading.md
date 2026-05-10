---
component: zk-heading
family: content
alias: x-zk-heading
internal: x-content.heading
---

# zk-heading

> Renders a semantic heading (`<h1>`–`<h6>`) based on the `level` prop.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `level` | `int` | `1` | Heading level 1–6, clamped automatically |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the element |

## Examples

### Basic

```blade
<x-zk-heading :level="2">Section Title</x-zk-heading>
{{-- renders: <h2>Section Title</h2> --}}
```

### Dynamic level

```blade
<x-zk-heading :level="$depth" class="section-title">
    {{ $section->title }}
</x-zk-heading>
```

## Notes

- Level is clamped between 1 and 6 — passing `0` renders `<h1>`, passing `9` renders `<h6>`.
