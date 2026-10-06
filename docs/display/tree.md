---
component: zk-tree
family: display
alias: x-zk-tree
internal: x-display.tree
---

# zk-tree

> A tree of nested lists, with expandable branches.
>
> Also available as `x-zk-tree-view`, the name that `@zairakai/vue-components` gives it.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `label` | `string\|null` | `null` | Accessible name of the list |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The `zk-tree-item` elements |

It is made of lists and `<details>`, not an ARIA `tree`: no arrow-key navigation, the tab key goes through the labels. No JavaScript.

## Examples

### Files

```blade
<x-zk-tree label="Files">
    <x-zk-tree-item label="src" :open="true">
        <x-zk-tree-item label="index.php" />
    </x-zk-tree-item>
    <x-zk-tree-item label="README.md" />
</x-zk-tree>
```
