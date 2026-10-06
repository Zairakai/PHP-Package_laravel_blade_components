---
component: zk-otp
family: form
alias: x-zk-otp
internal: x-form.otp
---

# zk-otp

> A one-time code field.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `name` | `string` | `'code'` | Name of the field |
| `length` | `int` | `6` | Number of characters |
| `numeric` | `bool` | `true` | Digits only (`inputmode="numeric"` and a `pattern`) |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

A single `<input>` with `autocomplete="one-time-code"`, so that the phone proposes the code received by SMS. No JavaScript.

## Examples

### Basic

```blade
<x-zk-otp name="token" :length="6" />
```
