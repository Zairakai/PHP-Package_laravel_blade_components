---
component: zk-carousel
family: display
alias: x-zk-carousel
internal: x-display.carousel
---

# zk-carousel

> A row of slides that scrolls and snaps, to build with CSS `scroll-snap`.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `label` | `string\|null` | `null` | Accessible name of the region |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The `zk-carousel-slide` elements |

The region takes the focus (`tabindex="0"`) so that the arrow keys scroll it. The snapping is yours: `.carousel { display: flex; overflow-x: auto; scroll-snap-type: x mandatory } .carousel-slide { flex: 0 0 100%; scroll-snap-align: start }`. There are no previous and next buttons: add links to the ids of your slides. No JavaScript.

## Examples

### Photos

```blade
<x-zk-carousel label="Photos">
    <x-zk-carousel-slide label="1 of 2"><img src="/a.jpg" alt="First"></x-zk-carousel-slide>
    <x-zk-carousel-slide label="2 of 2"><img src="/b.jpg" alt="Second"></x-zk-carousel-slide>
</x-zk-carousel>
```
