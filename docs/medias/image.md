---
component: zk-image
family: medias
alias: x-zk-image
internal: x-medias.image
---

# zk-image

> Renders an `<img>` element with full attribute support including srcset, crossorigin, and loading.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `src` | `string\|null` | `null` | Image URL |
| `alt` | `string\|null` | `null` | Alt text |
| `class` | `string\|null` | `null` | CSS class(es) |
| `width` | `int\|null` | `null` | Intrinsic width |
| `height` | `int\|null` | `null` | Intrinsic height |
| `srcset` | `string\|null` | `null` | `srcset` attribute |
| `sizes` | `string\|null` | `null` | `sizes` attribute |
| `loading` | `string\|null` | `null` | `lazy` or `eager` |
| `decoding` | `string\|null` | `null` | `async`, `sync`, or `auto` |
| `fetchpriority` | `string\|null` | `null` | `high`, `low`, or `auto` |
| `crossorigin` | `string\|null` | `null` | `anonymous` or `use-credentials` — invalid values are silently ignored |
| `referrerpolicy` | `string\|null` | `null` | Referrer policy |
| `ismap` | `bool` | `false` | Server-side image map |
| `usemap` | `string\|null` | `null` | Client-side image map reference |
| `longdesc` | `string\|null` | `null` | URL of long description |

## Examples

### Basic

```blade
<x-zk-image src="/img/hero.jpg" alt="Hero image" />
```

### Responsive with srcset

```blade
<x-zk-image
    src="/img/photo.jpg"
    alt="A photo"
    srcset="/img/photo-480.jpg 480w, /img/photo-800.jpg 800w"
    sizes="(max-width: 600px) 480px, 800px"
    :width="800"
    :height="600"
    loading="lazy" />
```

### With explicit dimensions for CLS

```blade
<x-zk-image
    src="{{ $product->image_url }}"
    alt="{{ $product->name }}"
    :width="400"
    :height="400"
    loading="lazy"
    decoding="async" />
```
