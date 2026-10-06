---
component: zk-toast-container
family: feedback
alias: x-zk-toast-container
internal: x-feedback.toast-container
---

# zk-toast-container

> The live region that holds the toasts, to put once in the layout.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `placement` | `string` | `'bottom-end'` | `data-placement`: where your style puts it |
| `label` | `string` | `'Notifications'` | Accessible name |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The `zk-toast` elements |

`role="region"` and `aria-live="polite"`: what is added to it is announced. The toasts are rendered by the server; there is no timer. To remove them after a few seconds, use a CSS animation on `.toast`, or your own script. No script of its own.

## Examples

### Flash messages

```blade
<x-zk-toast-container>
    @if (session('status'))
        <x-zk-toast variant="success">{{ session('status') }}</x-zk-toast>
    @endif
</x-zk-toast-container>
```
