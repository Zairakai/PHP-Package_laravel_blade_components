---
component: zk-dropdown
family: overlay
alias: x-zk-dropdown
internal: x-overlay.dropdown
---

# zk-dropdown

> A list of links and buttons opened by a button, with the native `popover` attribute.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string` | `required` | Identifier of the list |
| `label` | `string\|null` | `null` | Accessible name of the list |
| `placement` | `string` | `'bottom-start'` | `data-placement` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The `zk-dropdown-item` elements |
| `trigger` | Content of the button that opens it |

It is a disclosure (a button that shows a list), not an ARIA `menu`: the arrow keys do not move between items, the tab key does. Escape and a click outside close it. If you need the arrow keys, use `FloatingDropdown` of `@zairakai/vue-components`.

## Examples

### Account menu

```blade
<x-zk-dropdown id="account" label="Account">
    <x-slot:trigger>Account</x-slot>
    <x-zk-dropdown-item href="/profile">Profile</x-zk-dropdown-item>
    <x-zk-dropdown-item>Sign out</x-zk-dropdown-item>
</x-zk-dropdown>
```
