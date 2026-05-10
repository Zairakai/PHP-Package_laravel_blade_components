---
component: zk-figure
family: medias
alias: x-zk-figure
internal: x-medias.figure
---

# zk-figure

> Renders a `<figure>` element. Typically paired with `zk-figcaption`.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string\|null` | `null` | CSS class(es) |

## Example

```blade
<x-zk-figure>
    <x-zk-image src="/img/chart.png" alt="Monthly sales chart" />
    <x-zk-figcaption>Figure 1 — Monthly sales Q4 2024</x-zk-figcaption>
</x-zk-figure>
```
