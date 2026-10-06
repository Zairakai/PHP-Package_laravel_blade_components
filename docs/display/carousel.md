---
component: zk-carousel
family: display
alias: x-zk-carousel
internal: x-display.carousel
---

# zk-carousel

> Slides that scroll and snap with the native scroll, with indicators, previous and next buttons, and an optional autoplay.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `items` | `array` | `[]` | Slides: strings (escaped) or `HtmlString`. With none, give the slides as `zk-carousel-slide` in the slot |
| `id` | `string\|null` | `null` | Identifier, used by the links of the indicators; by default made from the content |
| `label` | `string\|null` | `null` | Accessible name of the region |
| `controls` | `bool` | `true` | Previous and next buttons (shown by the script) |
| `indicators` | `bool` | `true` | One link per slide |
| `autoplay` | `int` | `0` | Moves on by itself every this many milliseconds (script); not when the visitor prefers less motion, and paused on hover and focus |
| `loop` | `bool` | `true` | Go back to the first slide after the last |
| `previousLabel` | `string` | `'Previous slide'` | Accessible name of the button |
| `nextLabel` | `string` | `'Next slide'` | Accessible name of the button |
| `slideLabel` | `string` | `'{n} of {total}'` | Accessible name of a slide |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Extra `zk-carousel-slide` elements |

Without any script it is a scroller: the track takes the focus, so the arrow keys, Home and End scroll it, and the indicators are links to the slides. The script of `carousel` adds the buttons (they are `hidden` until then), marks the current indicator with `aria-current`, and runs the autoplay. The functional CSS (flex, overflow, snapping) is printed by `<x-zk-styles />` (`carousel`), so that no inline style is needed. Class hooks: `carousel`, `carousel-track`, `carousel-slide`, `carousel-controls`, `carousel-previous`, `carousel-next`, `carousel-indicators`, `carousel-indicator`.

## Examples

### Items

```blade
<x-zk-carousel label="Photos" :items="$images" :autoplay="5000" />

<x-zk-styles />
<x-zk-scripts />
```

### Your own slides

```blade
<x-zk-carousel label="Photos">
    <x-zk-carousel-slide label="1 of 2"><img src="/a.jpg" alt="First"></x-zk-carousel-slide>
    <x-zk-carousel-slide label="2 of 2"><img src="/b.jpg" alt="Second"></x-zk-carousel-slide>
</x-zk-carousel>
```
