---
component: zk-toast
family: feedback
alias: x-zk-toast
internal: x-feedback.toast
---

# zk-toast

> A short message in a toast container.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `variant` | `string` | `'info'` | `data-variant`; `warning` and `error` have `role="alert"` |
| `dismissible` | `bool` | `true` | Shows a close button (`data-zk-dismiss=".toast"`, needs `zk-scripts`) |
| `closeLabel` | `string` | `'Close'` | Accessible name of the close button |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Message |

Class hooks: `toast`, `toast-body`, `toast-close`.

## Examples

### Basic

```blade
<x-zk-toast variant="success">Saved.</x-zk-toast>
```
