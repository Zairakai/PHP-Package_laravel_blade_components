---
component: zk-bottom-navigation
family: navigation
alias: x-zk-bottom-navigation
internal: x-navigation.bottom-navigation
---

# zk-bottom-navigation

> The navigation bar at the bottom of a small screen.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `label` | `string` | `'Main'` | Accessible name of the `<nav>` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The `zk-bottom-navigation-item` links |

No JavaScript.

## Examples

### Basic

```blade
<x-zk-bottom-navigation>
    <x-zk-bottom-navigation-item href="/" label="Home" :active="true" />
    <x-zk-bottom-navigation-item href="/me" label="Me" />
</x-zk-bottom-navigation>
```
