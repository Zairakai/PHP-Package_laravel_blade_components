---
component: zk-stat
family: display
alias: x-zk-stat
internal: x-display.stat
---

# zk-stat

> A figure with its label and, optionally, its change.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `label` | `string\|null` | `null` | Label |
| `value` | `string\|int\|null` | `null` | Value, when there is no slot |
| `change` | `int\|float\|null` | `null` | Change in percent: gives the direction (`up`, `down`, `flat`) and the text |
| `sentiment` | `string\|null` | `null` | `positive`, `negative` or `neutral`. By default, up is positive and down is negative |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Replaces the value |

Class hooks: `stat`, `stat-list`, `stat-label`, `stat-value`, `stat-change`, `stat-arrow`, `stat-change-text`; `data-direction` and `data-sentiment` on `stat-change`.

## Examples

### With a change

```blade
<x-zk-stat label="Visits" value="1.2K" :change="12" />
```

### A fall that is good news

```blade
<x-zk-stat label="Errors" :change="-3" sentiment="positive">42</x-zk-stat>
```
