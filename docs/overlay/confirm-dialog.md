---
component: zk-confirm-dialog
family: overlay
alias: x-zk-confirm-dialog
internal: x-overlay.confirm-dialog
---

# zk-confirm-dialog

> A confirmation (or a notice) in a native dialog, with its buttons.
>
> Also available as `x-zk-dialog`, the name that `@zairakai/vue-components` gives it.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string` | `required` | Identifier, to open it |
| `title` | `string\|null` | `null` | Title |
| `message` | `string\|null` | `null` | Text, when there is no slot |
| `confirmLabel` | `string` | `'OK'` | Text of the confirm button (`value="confirm"`) |
| `cancelLabel` | `string` | `'Cancel'` | Text of the cancel button (`value="cancel"`) |
| `alert` | `bool` | `false` | A notice: no cancel button, and Escape does not close it |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Replaces the message |

The buttons are in a `<form method="dialog">`: the dialog closes by itself and its `returnValue` is `confirm` or `cancel`; listen to the `close` event of the dialog to act. Needs the script `modal` of [zk-scripts](../utility/scripts.md): the component asks for it by itself. Class hooks: `dialog`, `dialog-title`, `dialog-message`, `dialog-actions`, `dialog-cancel`, `dialog-confirm`.

## Examples

### Delete

```blade
<button commandfor="del" command="show-modal">Delete</button>

<x-zk-confirm-dialog id="del" title="Delete the project?" message="This cannot be undone." confirm-label="Delete" />
```
