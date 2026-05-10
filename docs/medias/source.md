---
component: zk-source
family: medias
alias: x-zk-source
internal: x-medias.source
---

# zk-source

> Renders a `<source>` element. Child of `zk-video` or `zk-audio`. Also used via the `sources` prop on those components.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | `string\|null` | `null` | Source URL |
| `type` | `string\|null` | `null` | MIME type (`video/webm`, `audio/ogg`, etc.) |
| `sizes` | `string\|null` | `null` | `sizes` attribute |
| `media` | `string\|null` | `null` | Media query |
| `srcset` | `string\|null` | `null` | `srcset` attribute |

## Example

```blade
<x-zk-video>
    <x-zk-source src="/video/clip.webm" type="video/webm" />
    <x-zk-source src="/video/clip.mp4"  type="video/mp4" />
</x-zk-video>
```
