---
component: zk-rating-input
family: form
alias: x-zk-rating-input
internal: x-form.rating-input
---

# zk-rating-input

> A rating the user chooses, a group of radio buttons with stars.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `name` | `string` | `required` | Name of the field |
| `value` | `int\|null` | `null` | Current value (the old input wins) |
| `max` | `int` | `5` | Number of stars |
| `legend` | `string\|null` | `null` | Text of the legend |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

Real radio buttons: it works in a form with no script and with the keyboard. Hide the inputs and light the stars with `input:checked ~ span` in your style; the text for assistive technology is in `.visually-hidden`. No JavaScript.

## Examples

### Review

```blade
<x-zk-rating-input name="stars" legend="Your rating" :value="4" />
```
