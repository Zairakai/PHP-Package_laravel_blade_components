---
component: zk-alert
family: feedback
alias: x-zk-alert
internal: x-feedback.alert
---

# zk-alert

> A message in the page, with a variant, a title and a close button.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `variant` | `string` | `'info'` | `info`, `success`, `warning` or `error`: `data-variant`. `warning` and `error` have `role="alert"`, the others `role="status"` |
| `title` | `string\|null` | `null` | Title |
| `dismissible` | `bool` | `false` | Shows a close button (`data-zk-dismiss=".alert"`, needs `zk-scripts`) |
| `closeLabel` | `string` | `'Close'` | Accessible name of the close button |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Message |
| `icon` | Icon |
| `actions` | Buttons or links |

Class hooks: `alert`, `alert-icon`, `alert-body`, `alert-title`, `alert-content`, `alert-actions`, `alert-close`. The close button needs the script of [zk-scripts](../utility/scripts.md), which takes a CSP nonce; there is no inline handler.

## Examples

### Error

```blade
<x-zk-alert variant="error" title="Payment failed" :dismissible="true">
    Your card was declined.
</x-zk-alert>
```
