---
component: zk-badge
family: display
alias: x-zk-badge
internal: x-display.badge
---

# zk-badge

> A small label. Its variant and size are data attributes.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `variant` | `string` | `'default'` | `default`, `info`, `success`, `warning` or `error`: written in `data-variant` |
| `size` | `string` | `'medium'` | `small`, `medium` or `large`: written in `data-size` |
| `dot` | `bool` | `false` | Adds `data-dot`, for a badge that is only a dot |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Text of the badge |

Style it with `.badge[data-variant="success"]`.

## Examples

### Variants

```blade
<x-zk-badge variant="success">Paid</x-zk-badge>
<x-zk-badge variant="warning" size="small">Late</x-zk-badge>
```
