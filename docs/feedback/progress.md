---
component: zk-progress
family: feedback
alias: x-zk-progress
internal: x-feedback.progress
---

# zk-progress

> A progress bar (the native `<progress>`) or a circular one.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `value` | `int\|float\|null` | `null` | Current value; without it the progress is indeterminate (`data-indeterminate`) |
| `max` | `int\|float` | `100` | Maximum |
| `variant` | `string` | `'default'` | `data-variant` |
| `circular` | `bool` | `false` | Draws a circle with `role="progressbar"` and the `aria-value*` attributes |
| `label` | `string\|null` | `null` | Accessible name |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Content after the bar, for a circle the text inside it |

Class hooks: `progress`; for the circle `progress-track` and `progress-bar`.

## Examples

### Linear

```blade
<x-zk-progress :value="40" label="Upload" />
```

### Circular

```blade
<x-zk-progress :circular="true" :value="30" :max="60" label="Step 1 of 2" />
```
