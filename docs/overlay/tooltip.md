---
component: zk-tooltip
family: overlay
alias: x-zk-tooltip
internal: x-overlay.tooltip
---

# zk-tooltip

> A short text that describes an element.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string` | `required` | Identifier of the tooltip |
| `text` | `string\|null` | `null` | Text |
| `placement` | `string` | `'top'` | `top`, `bottom`, `left` or `right`: `data-placement` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The element described (a button, a link) |

Put `aria-describedby` with the same id on the element. Showing it is yours, with CSS: `.tooltip-wrapper:hover .tooltip, .tooltip-wrapper:focus-within .tooltip { ... }` (it has `role="tooltip"`). Class hooks: `tooltip-wrapper`, `tooltip`.

## Examples

### Basic

```blade
<x-zk-tooltip id="copy-tip" text="Copy the link">
    <button aria-describedby="copy-tip">Copy</button>
</x-zk-tooltip>
```
