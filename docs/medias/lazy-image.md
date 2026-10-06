---
component: zk-lazy-image
family: medias
alias: x-zk-lazy-image
internal: x-medias.lazy-image
---

# zk-lazy-image

> An image loaded when it comes into view, with `srcset` and a way to fit it.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `src` | `string` | `required` | URL |
| `alt` | `string` | `''` | Alternative text |
| `srcset` | `string\|null` | `null` | `srcset` |
| `sizes` | `string\|null` | `null` | `sizes` |
| `eager` | `bool` | `false` | Load at once (`loading="eager"`), for the image at the top of the page |
| `fit` | `string` | `'cover'` | `data-fit`: `cover`, `contain`... for `object-fit` in your style |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

The browser does the work (`loading="lazy"` and `decoding="async"`). Give `width` and `height` to avoid the shift of the page. The placeholder and the error state of the Vue component are not ported.

## Examples

### Basic

```blade
<x-zk-lazy-image src="/a.jpg" alt="A cliff" srcset="/a-2x.jpg 2x" width="800" height="600" />
```
