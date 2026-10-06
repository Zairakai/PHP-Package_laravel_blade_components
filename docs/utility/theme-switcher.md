---
component: zk-theme-switcher
family: utility
alias: x-zk-theme-switcher
internal: x-utility.theme-switcher
---

# zk-theme-switcher

> Buttons that choose the colour scheme and remember it.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `modes` | `array` | `['light', 'dark', 'system']` | The modes |
| `labels` | `array` | `['light' => 'Light', 'dark' => 'Dark', 'system' => 'System']` | Text of each mode |
| `label` | `string` | `'Theme'` | Accessible name of the group |
| `storageKey` | `string` | `'zk-theme'` | Key of the `localStorage` |
| `attribute` | `string` | `'data-theme'` | Attribute set on `<html>` |
| `default` | `string` | `'system'` | Mode without a stored choice |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

Needs the script `theme` of [zk-scripts](../utility/scripts.md): the component asks for it by itself. It sets the attribute on `<html>` (`system` removes it) and `aria-pressed` on the buttons. Write your colours for `html[data-theme="dark"]`.

## Examples

### Basic

```blade
<x-zk-theme-switcher />
```
