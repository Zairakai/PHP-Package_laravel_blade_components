---
component: zk-rating
family: display
alias: x-zk-rating
internal: x-display.rating
---

# zk-rating

> A read-only rating drawn with stars.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `value` | `int\|float` | `0` | Value; half a star is shown from .5 |
| `max` | `int` | `5` | Number of stars |
| `label` | `string\|null` | `null` | Accessible name, by default `value / max` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

The stars are decorative (`aria-hidden`): the root is `role="img"` with the accessible name. Each star has `data-state` (`full`, `half` or `empty`). To let the user choose a rating, use `zk-rating-input`. No JavaScript.

## Examples

### Basic

```blade
<x-zk-rating :value="3.5" />
```
