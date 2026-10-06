---
component: zk-modal
family: overlay
alias: x-zk-modal
internal: x-overlay.modal
---

# zk-modal

> A modal window, a native `<dialog>`.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string` | `required` | Identifier, used to open it and to build the ids of the title and the body |
| `title` | `string\|null` | `null` | Title: gives the accessible name |
| `alert` | `bool` | `false` | `role="alertdialog"` |
| `closedby` | `string` | `'any'` | `any` (Escape and a click outside), `closerequest` or `none` |
| `closeLabel` | `string` | `'Close'` | Accessible name of the close button |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Body |
| `footer` | Footer with the actions |

The close button and any `<form method="dialog">` close it with no script. To open it, use a button with `commandfor` and `command="show-modal"` (supported by current browsers) or, for older ones, `onclick="document.getElementById('confirm').showModal()"`.

Class hooks: `modal`, `modal-header`, `modal-title`, `modal-close`, `modal-body`, `modal-footer`. Style the open one with `.modal[open]` and the backdrop with `.modal::backdrop`.

## Examples

### Open it

```blade
<button commandfor="confirm" command="show-modal">Delete</button>

<x-zk-modal id="confirm" title="Delete this project?">
    This cannot be undone.
    <x-slot:footer>
        <form method="dialog">
            <button>Cancel</button>
            <button value="delete">Delete</button>
        </form>
    </x-slot>
</x-zk-modal>
```
