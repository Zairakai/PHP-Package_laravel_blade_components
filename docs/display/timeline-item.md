---
component: zk-timeline-item
family: display
alias: x-zk-timeline-item
internal: x-display.timeline-item
---

# zk-timeline-item

> One event of a timeline.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `title` | `string\|null` | `null` | Title |
| `time` | `string\|null` | `null` | Date as it is shown |
| `datetime` | `string\|null` | `null` | Machine-readable date (`datetime` of the `<time>`) |
| `variant` | `string` | `'default'` | `data-variant` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Description |

Class hooks: `timeline-item`, `timeline-marker`, `timeline-content`, `timeline-time`, `timeline-title`, `timeline-body`.

## Examples

### Event

```blade
<x-zk-timeline-item title="Shipped" time="Oct 6">Left the depot.</x-zk-timeline-item>
```
