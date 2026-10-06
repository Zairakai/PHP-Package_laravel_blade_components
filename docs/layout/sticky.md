---
component: zk-sticky
family: layout
alias: x-zk-sticky
internal: x-layout.sticky
---

# zk-sticky

> An element that stays in view while scrolling.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `edge` | `string` | `'top'` | `top` or `bottom`: `data-edge` |
| `as` | `string` | `'div'` | Root element |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Content |

It carries `data-sticky` and `data-edge`: write `position: sticky` in your style (`[data-sticky][data-edge="top"] { top: 0 }`). No script.

## Examples

### Header

```blade
<x-zk-sticky as="header">...</x-zk-sticky>
```
