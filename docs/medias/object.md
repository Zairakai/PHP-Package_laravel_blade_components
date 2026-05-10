---
component: zk-object
family: medias
alias: x-zk-object
internal: x-medias.object
---

# zk-object

> Renders an `<object>` element for embedded external resources (PDF, SVG, Flash legacy).

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `data` | `string\|null` | `null` | Resource URL |
| `type` | `string\|null` | `null` | MIME type of the resource |
| `width` | `int\|null` | `null` | Display width |
| `height` | `int\|null` | `null` | Display height |
| `name` | `string\|null` | `null` | `name` attribute |
| `form` | `string\|null` | `null` | Associated form id |
| `class` | `string\|null` | `null` | CSS class(es) |

## Example

```blade
<x-zk-object data="/documents/report.pdf" type="application/pdf" :width="800" :height="600">
    <p>Your browser does not support PDF embedding. <a href="/documents/report.pdf">Download</a></p>
</x-zk-object>
```
