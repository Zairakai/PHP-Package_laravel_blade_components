---
component: zk-lightbox
family: medias
alias: x-zk-lightbox
internal: x-medias.lightbox
---

# zk-lightbox

> Thumbnails that open the image in a modal window.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `items` | `array` | `[]` | Items with `src` and, optionally, `thumbnail`, `alt` and `caption` |
| `id` | `string\|null` | `null` | Prefix of the ids of the dialogs |
| `thumbnails` | `bool` | `true` | Show the thumbnails (otherwise open the dialogs from your own buttons) |
| `closeLabel` | `string` | `'Close'` | Accessible name of the close button |
| `openLabel` | `string` | `'View {alt}'` | Accessible name of a thumbnail |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

Each image has its own native `<dialog>`, opened by its thumbnail (`commandfor`, with `data-zk-modal` as a fallback). Needs the script `modal` of [zk-scripts](../utility/scripts.md): the component asks for it by itself. The previous and next buttons of the Vue component are not ported: close, then open another.

## Examples

### Gallery

```blade
<x-zk-lightbox :items="[
    ['src' => '/a.jpg', 'thumbnail' => '/a-small.jpg', 'alt' => 'Dawn', 'caption' => 'Dawn on the cliff'],
    ['src' => '/b.jpg', 'alt' => 'Dusk'],
]" />
```
