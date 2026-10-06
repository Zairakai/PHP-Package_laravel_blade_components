---
component: zk-back-to-top
family: navigation
alias: x-zk-back-to-top
internal: x-navigation.back-to-top
---

# zk-back-to-top

> A link to the top of the page.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `href` | `string` | `'#top'` | Target (give an `id="top"` to the top of the page) |
| `label` | `string` | `'Back to top'` | Accessible name |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Content, by default an arrow |

No JavaScript.

## Examples

### Basic

```blade
<x-zk-back-to-top />
```
