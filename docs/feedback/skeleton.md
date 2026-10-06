---
component: zk-skeleton
family: feedback
alias: x-zk-skeleton
internal: x-feedback.skeleton
---

# zk-skeleton

> A placeholder shown while the content loads.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `variant` | `string` | `'text'` | `text`, `circle` or `rect`: `data-variant` |
| `count` | `int` | `1` | Number of placeholders, in a `skeleton-group` |
| `width` | `string\|null` | `null` | CSS width |
| `height` | `string\|null` | `null` | CSS height |
| `animated` | `bool` | `true` | Adds `data-animated` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

It is hidden from assistive technology (`aria-hidden`); a group has `aria-busy="true"`. The width and height are the only inline styles.

## Examples

### Lines

```blade
<x-zk-skeleton :count="3" />
```

### Picture

```blade
<x-zk-skeleton variant="circle" width="3rem" height="3rem" />
```
