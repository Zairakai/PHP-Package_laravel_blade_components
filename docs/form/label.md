---
component: zk-label
family: form
alias: —
internal: x-form.label
---

# zk-label

> Renders a `<label>` element with optional icon, prefix, and suffix slots. Used internally by `zk-input`, `zk-select`, and `zk-textarea`.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | `string\|null` | `null` | Label text |
| `for` | `string\|null` | `null` | Explicit `for` attribute — takes priority over `id` and `name` |
| `name` | `string\|null` | `null` | Fallback for `for` resolution |
| `id` | `string\|null` | `null` | Fallback for `for` resolution when `for` is absent |
| `msr` | `string\|null` | `null` | Material Symbols icon as label content |
| `class` | `string\|null` | `null` | CSS class(es) |
| `iconBefore` | `string\|null` | `null` | Leading icon |
| `iconAfter` | `string\|null` | `null` | Trailing icon |
| `prefix` | `string\|null` | `null` | Text prefix inside the label |
| `suffix` | `string\|null` | `null` | Text suffix inside the label |

## `for` resolution order

1. Explicit `for` prop
2. `id` prop
3. `name` prop

## Examples

### Standalone label

```blade
<x-form.label label="Email address" for="user-email" />
```

### Icon-only label (accessibility)

```blade
<x-form.label msr="search" for="search-input" />
```

## Notes

- This component has no public `x-zk-*` alias — it is used internally by other form components.
- The `for` resolution means you rarely need to pass `for` explicitly if `name` or `id` is already provided.
