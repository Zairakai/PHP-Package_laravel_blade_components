---
component: zk-countdown
family: utility
alias: x-zk-countdown
internal: x-utility.countdown
---

# zk-countdown

> The time left until a date, written by the server and kept up to date by the script.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `target` | `string\|DateTimeInterface` | `required` | The date |
| `showDays` | `bool` | `false` | Show the days even when there are none |
| `units` | `array` | `['days' => 'd', 'hours' => 'h', 'minutes' => 'm', 'seconds' => 's']` | Text after each number |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

A `<time datetime="PT…S">` with one `<span class="countdown-part" data-unit>` per unit. Needs the script `countdown` of [zk-scripts](../utility/scripts.md): the component asks for it by itself. Without it the text is the time left when the page was made. It does not announce each second to assistive technology.

## Examples

### Launch

```blade
<x-zk-countdown target="2027-01-01 00:00:00" />
```
