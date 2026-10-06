---
component: zk-timeline
family: display
alias: x-zk-timeline
internal: x-display.timeline
---

# zk-timeline

> An ordered list of events.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The `zk-timeline-item` elements |

It is an `<ol>`. No JavaScript.

## Examples

### Basic

```blade
<x-zk-timeline>
    <x-zk-timeline-item title="Shipped" time="Oct 6" datetime="2026-10-06" variant="success">
        Left the depot.
    </x-zk-timeline-item>
    <x-zk-timeline-item title="Ordered" time="Oct 4">Payment received.</x-zk-timeline-item>
</x-zk-timeline>
```
