---
component: zk-iframe
family: medias
alias: x-zk-iframe
internal: x-medias.iframe
---

# zk-iframe

> Renders an `<iframe>` element for embedded external content.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `src` | `string\|null` | `null` | Embed URL |
| `srcdoc` | `string\|null` | `null` | Inline HTML content |
| `class` | `string\|null` | `null` | CSS class(es) |
| `width` | `int\|null` | `null` | Display width |
| `height` | `int\|null` | `null` | Display height |
| `allow` | `string\|null` | `null` | Permissions policy |
| `allowfullscreen` | `bool` | `false` | Allow fullscreen |
| `allowpaymentrequest` | `bool` | `false` | Allow payment request API |
| `loading` | `string\|null` | `null` | `lazy` or `eager` |
| `name` | `string\|null` | `null` | Frame name |
| `referrerpolicy` | `string\|null` | `null` | Referrer policy |
| `sandbox` | `string\|null` | `null` | Sandbox restrictions |

## Examples

### YouTube embed

```blade
<x-zk-iframe
    src="https://www.youtube.com/embed/dQw4w9WgXcQ"
    :width="560"
    :height="315"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen />
```

### Sandboxed iframe

```blade
<x-zk-iframe
    src="/preview"
    sandbox="allow-scripts allow-same-origin"
    loading="lazy" />
```
