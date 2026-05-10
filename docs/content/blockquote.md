---
component: zk-blockquote
family: content
alias: x-zk-blockquote
internal: x-content.blockquote
---

# zk-blockquote

> Renders a `<blockquote>` element.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `cite` | `string\|null` | `null` | URL of the quoted source (`cite` HTML attribute) |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the element |

## Examples

### Basic

```blade
<x-zk-blockquote>
    The best way to predict the future is to invent it.
</x-zk-blockquote>
```

### With citation

```blade
<x-zk-blockquote cite="https://example.com/source">
    The best way to predict the future is to invent it.
</x-zk-blockquote>
```
