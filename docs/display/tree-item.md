---
component: zk-tree-item
family: display
alias: x-zk-tree-item
internal: x-display.tree-item
---

# zk-tree-item

> A branch (with children) or a leaf of a tree.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `label` | `string\|null` | `null` | Text |
| `open` | `bool` | `false` | Expanded at first (a branch only) |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The child `zk-tree-item` elements; with none, the item is a leaf |

Class hooks: `tree-item`, `tree-label`, `tree-group`.

## Examples

### Branch

```blade
<x-zk-tree-item label="src">
    <x-zk-tree-item label="index.php" />
</x-zk-tree-item>
```
