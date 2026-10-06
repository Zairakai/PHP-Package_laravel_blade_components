---
component: zk-copy-button
family: utility
alias: x-zk-copy-button
internal: x-utility.copy-button
---

# zk-copy-button

> A button that copies a text.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `text` | `string\|null` | `null` | Text to copy |
| `target` | `string\|null` | `null` | Selector of the element whose text is copied (`#command`), over `text` |
| `label` | `string` | `'Copy'` | Text of the button, when there is no slot |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Replaces the label |

Needs `zk-scripts`. While copied, the button has `data-copied`: style it.

## Examples

### Command

```blade
<code id="cmd">composer require zairakai/laravel-blade-components</code>
<x-zk-copy-button target="#cmd" />

<x-zk-scripts />
```
