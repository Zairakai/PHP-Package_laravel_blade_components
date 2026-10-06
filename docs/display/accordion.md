---
component: zk-accordion
family: display
alias: x-zk-accordion
internal: x-display.accordion
---

# zk-accordion

> A group of expandable items. It is only a wrapper: the items are `zk-accordion-item`.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The `zk-accordion-item` elements |

Items that share a `name` open one at a time, by the native behaviour of `<details name>`.

## Examples

### Exclusive

```blade
<x-zk-accordion>
    <x-zk-accordion-item title="One" name="faq" :open="true">First</x-zk-accordion-item>
    <x-zk-accordion-item title="Two" name="faq">Second</x-zk-accordion-item>
</x-zk-accordion>
```
