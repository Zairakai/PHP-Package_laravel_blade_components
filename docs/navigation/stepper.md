---
component: zk-stepper
family: navigation
alias: x-zk-stepper
internal: x-navigation.stepper
---

# zk-stepper

> The steps of a process, with the current one marked.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `steps` | `array` | `[]` | Labels, or arrays with `label` and `description` |
| `current` | `int` | `1` | Number of the current step (from 1) |
| `label` | `string\|null` | `null` | Accessible name |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

An `<ol>`; each `step` has `data-state` (`complete`, `current` or `upcoming`) and the current one has `aria-current="step"`. No JavaScript.

## Examples

### Checkout

```blade
<x-zk-stepper label="Checkout" :current="2" :steps="['Cart', ['label' => 'Address', 'description' => 'Where to'], 'Payment']" />
```
