---
component: zk-canvas
family: medias
alias: x-zk-canvas
internal: x-medias.canvas
---

# zk-canvas

> Renders a `<canvas>` element.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `width` | `int\|null` | `null` | Canvas width in pixels |
| `height` | `int\|null` | `null` | Canvas height in pixels |
| `class` | `string\|null` | `null` | CSS class(es) |

## Example

```blade
<x-zk-canvas id="chart" :width="800" :height="400">
    Your browser does not support the canvas element.
</x-zk-canvas>
```
