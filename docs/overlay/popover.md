---
component: zk-popover
family: overlay
alias: x-zk-popover
internal: x-overlay.popover
---

# zk-popover

> A panel opened by a button, with the native `popover` attribute.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string` | `required` | Identifier of the panel |
| `mode` | `string` | `'auto'` | `auto` (closes with Escape and a click outside) or `manual` |
| `label` | `string\|null` | `null` | Accessible name of the panel |
| `placement` | `string` | `'bottom'` | `data-placement` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Panel content |
| `trigger` | Content of the button that opens it |

No script. Class hooks: `popover-wrapper`, `popover-trigger`, `popover`. Place it with CSS anchor positioning or your own rules, using `data-placement`.

## Examples

### Basic

```blade
<x-zk-popover id="help" label="Help">
    <x-slot:trigger>Help</x-slot>
    Press <x-zk-kbd>?</x-zk-kbd> anywhere.
</x-zk-popover>
```
