---
component: zk-json-viewer
family: content
alias: x-zk-json-viewer
internal: x-content.json-viewer
---

# zk-json-viewer

> A JSON value as nested, expandable lists, with a copy button.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `value` | `mixed` | `null` | Array, object or scalar |
| `expanded` | `int` | `1` | Number of levels open at first |
| `label` | `string` | `'JSON'` | Accessible name |
| `copyable` | `bool` | `true` | Shows the copy button |
| `copyLabel` | `string` | `'Copy'` | Text of the button |
| `id` | `string\|null` | `null` | Identifier |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

Branches are `<details>`, so they open with no script; each node has `data-type`. Needs the script `copy` of [zk-scripts](../utility/scripts.md): the component asks for it by itself. The search of the Vue component is not ported.

## Examples

### Payload

```blade
<x-zk-json-viewer :value="$payload" :expanded="2" />
```
