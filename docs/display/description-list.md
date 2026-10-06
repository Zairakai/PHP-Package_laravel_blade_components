---
component: zk-description-list
family: display
alias: x-zk-description-list
internal: x-display.description-list
---

# zk-description-list

> Terms and their descriptions, a `<dl>`.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `items` | `array` | `[]` | Pairs `term => description` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Extra `<div><dt>…</dt><dd>…</dd></div>` groups |

Class hooks: `description-list`, `description-list-item`. No JavaScript.

## Examples

### Pairs

```blade
<x-zk-description-list :items="['Name' => 'Ada', 'Role' => 'Engineer']" />
```
