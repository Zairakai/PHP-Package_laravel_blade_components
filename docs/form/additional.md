---
component: zk-additional
family: form
alias: —
internal: x-form.additional
---

# zk-additional

> Renders supporting text and/or a character counter below a form field. Used internally by `zk-input`, `zk-select`, and `zk-textarea`.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `text` | `string\|null` | `null` | Supporting/helper text |
| `counter` | `string\|null` | `null` | Character counter text |

## Notes

- Renders nothing when both `text` and `counter` are `null`.
- This component has no public `x-zk-*` alias — it is used internally.
- Validation errors in `zk-input`, `zk-select`, and `zk-textarea` automatically populate `text` from the `$errors` bag.
