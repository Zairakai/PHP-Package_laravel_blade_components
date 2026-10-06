---
component: zk-meter
family: display
alias: x-zk-meter
internal: x-display.meter
---

# zk-meter

> A gauge, the native `<meter>`.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `value` | `int\|float` | `required` | Current value |
| `min` | `int\|float` | `0` | Minimum |
| `max` | `int\|float` | `100` | Maximum |
| `low` | `int\|float\|null` | `null` | Upper limit of the low range |
| `high` | `int\|float\|null` | `null` | Lower limit of the high range |
| `optimum` | `int\|float\|null` | `null` | Best value |
| `label` | `string\|null` | `null` | Accessible name |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Fallback text, by default the value |

The browser colours it by range; style `meter::-webkit-meter-optimum-value` and the `-moz-meter-*` selectors to change that. Use `zk-progress` for a task that advances. No JavaScript.

## Examples

### Disk usage

```blade
<x-zk-meter :value="60" :low="30" :high="80" :optimum="0" label="Disk usage" />
```
