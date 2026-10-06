---
component: zk-flex
family: layout
alias: x-zk-flex
internal: x-layout.flex
---

# zk-flex

> A flex container.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The items |

A `<div class="flex">`: the layout is in your style (for example `mithril-scss`). No script.

## Examples

### Row

```blade
<x-zk-flex>
    <x-zk-flex-item>One</x-zk-flex-item>
    <x-zk-flex-item>Two</x-zk-flex-item>
</x-zk-flex>
```
