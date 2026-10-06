---
component: zk-avatar
family: display
alias: x-zk-avatar
internal: x-display.avatar
---

# zk-avatar

> A user picture, with the initials of the name or the slot as a fallback.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `src` | `string\|null` | `null` | URL of the picture |
| `name` | `string\|null` | `null` | Name: gives the initials (two letters) and the accessible name |
| `alt` | `string\|null` | `null` | Accessible name, over the name |
| `size` | `string` | `'medium'` | `small`, `medium` or `large`: `data-size` |
| `shape` | `string` | `'circle'` | `circle` or `square`: `data-shape` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Content shown when there is no picture and no name |

The root has `role="img"` and an `aria-label`; the picture itself is decorative (`alt=""`).

## Examples

### Picture

```blade
<x-zk-avatar src="/ada.png" name="Ada Lovelace" />
```

### Initials

```blade
<x-zk-avatar name="Ada Lovelace" />
```
