---
component: zk-app-bar
family: navigation
alias: x-zk-app-bar
internal: x-navigation.app-bar
---

# zk-app-bar

> The bar at the top of an application.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `sticky` | `bool` | `false` | Adds `data-sticky`, for `position: sticky` in your style |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The centre |
| `start` | Left side (logo, back button) |
| `end` | Right side (actions, menu) |

A `<header>`. Class hooks: `app-bar`, `app-bar-start`, `app-bar-content`, `app-bar-end`. No JavaScript.

## Examples

### Basic

```blade
<x-zk-app-bar :sticky="true">
    <x-slot:start>
        <a href="/">Logo</a>
    </x-slot>
    Dashboard
    <x-slot:end>
        <x-zk-dropdown id="user"><x-slot:trigger>Ada</x-slot></x-zk-dropdown>
    </x-slot>
</x-zk-app-bar>
```
