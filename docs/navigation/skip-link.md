---
component: zk-skip-link
family: navigation
alias: x-zk-skip-link
internal: x-navigation.skip-link
---

# zk-skip-link

> A link that jumps over the navigation to the main content.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `href` | `string` | `'#main'` | Target |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Text, by default "Skip to the content" |

Put it first in the page and show it on focus: `.skip-link:not(:focus) { position: absolute; left: -999px }`. No JavaScript.

## Examples

### Basic

```blade
<x-zk-skip-link />
...
<x-zk-main id="main">...</x-zk-main>
```
