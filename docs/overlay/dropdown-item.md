---
component: zk-dropdown-item
family: overlay
alias: x-zk-dropdown-item
internal: x-overlay.dropdown-item
---

# zk-dropdown-item

> An item of a dropdown: a link, or a button.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `href` | `string\|null` | `null` | Makes it a link |
| `disabled` | `bool` | `false` | Disables it; a disabled item is always a button |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Label |

Class hook: `dropdown-item`. A button has no behaviour: wrap the dropdown in a `form` or add your own attributes.

## Examples

### Link

```blade
<x-zk-dropdown-item href="/profile">Profile</x-zk-dropdown-item>
```
