---
component: zk-spacer
family: layout
alias: x-zk-spacer
internal: x-layout.spacer
---

# zk-spacer

> An empty element that pushes the others apart.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

Hidden from assistive technology. Give `.spacer` `flex: 1` in your style.

## Examples

### In a bar

```blade
<x-zk-flex>Logo <x-zk-spacer /> Menu</x-zk-flex>
```
