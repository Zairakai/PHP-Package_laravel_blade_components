---
component: zk-figcaption
family: medias
alias: x-zk-figcaption
internal: x-medias.figcaption
---

# zk-figcaption

> Renders a `<figcaption>` element. Child of `zk-figure`.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string\|null` | `null` | HTML `id` attribute |
| `class` | `string\|null` | `null` | CSS class(es) |

## Example

```blade
<x-zk-figure>
    <x-zk-image src="/img/diagram.png" alt="Architecture diagram" />
    <x-zk-figcaption>Figure 1 — System architecture</x-zk-figcaption>
</x-zk-figure>
```
