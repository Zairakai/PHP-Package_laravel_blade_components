---
component: zk-carousel-slide
family: display
alias: x-zk-carousel-slide
internal: x-display.carousel-slide
---

# zk-carousel-slide

> One slide of a carousel.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `label` | `string\|null` | `null` | Accessible name, for example `1 of 3` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Content |

## Examples

### Slide

```blade
<x-zk-carousel-slide label="1 of 3">...</x-zk-carousel-slide>
```
