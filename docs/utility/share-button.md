---
component: zk-share-button
family: utility
alias: x-zk-share-button
internal: x-utility.share-button
---

# zk-share-button

> A button that opens the share sheet of the device, or copies the link.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `title` | `string\|null` | `null` | Title shared; by default the one of the page |
| `text` | `string\|null` | `null` | Text shared |
| `url` | `string\|null` | `null` | URL shared; by default the one of the page |
| `label` | `string` | `'Share'` | Text of the button, when there is no slot |
| `copiedLabel` | `string` | `'Link copied'` | Announced after a copy |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Replaces the label |

Needs the script `share` of [zk-scripts](../utility/scripts.md): the component asks for it by itself. It uses `navigator.share` when the browser has it and copies the URL otherwise; the copy is announced in a `role="status"` and sets `data-copied`.

## Examples

### Basic

```blade
<x-zk-share-button title="Blade components" />
```
