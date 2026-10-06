---
component: zk-accordion-item
family: display
alias: x-zk-accordion-item
internal: x-display.accordion-item
---

# zk-accordion-item

> One expandable item, a native `<details>`.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `title` | `string\|null` | `null` | Text of the trigger |
| `open` | `bool` | `false` | Open at first |
| `name` | `string\|null` | `null` | Group name: only one item of the group is open at a time |
| `level` | `int` | `3` | Level of the heading around the title (`h2` to `h6`) |
| `disabled` | `bool` | `false` | Adds `data-disabled` and `aria-disabled` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Panel content |
| `header` | Replaces the title |

Class hooks: `accordion-item`, `accordion-trigger`, `accordion-header`, `accordion-panel`. Style the state with `[open]`. `disabled` only marks the item: add `pointer-events: none` to the trigger of `[data-disabled]`.

## Examples

### Item

```blade
<x-zk-accordion-item title="Shipping">Delivered in 3 days.</x-zk-accordion-item>
```
