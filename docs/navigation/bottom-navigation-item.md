---
component: zk-bottom-navigation-item
family: navigation
alias: x-zk-bottom-navigation-item
internal: x-navigation.bottom-navigation-item
---

# zk-bottom-navigation-item

> A link of the bottom navigation.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `href` | `string` | `required` | Target |
| `label` | `string\|null` | `null` | Text, by default the slot |
| `active` | `bool` | `false` | Marks the current page (`aria-current="page"`) |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Text, when there is no `label` |
| `icon` | Icon above the text |

Class hooks: `bottom-navigation-item`, `bottom-navigation-icon`, `bottom-navigation-label`.

## Examples

### Link

```blade
<x-zk-bottom-navigation-item href="/" label="Home" :active="true">
    <x-slot:icon>⌂</x-slot>
</x-zk-bottom-navigation-item>
```
