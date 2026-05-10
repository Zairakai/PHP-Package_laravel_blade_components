---
component: zk-field
family: form
alias: —
internal: x-form.field
---

# zk-field

> Wraps form controls in a `.field` div. Adds an `error` class automatically when `$errors->has($name)`. Used internally by `zk-input`, `zk-select`, and `zk-textarea`.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Field name — used to detect validation errors |
| `class` | `string\|null` | `null` | Additional CSS class(es) on the wrapper div |
| `field` | `bool` | `true` | Render the wrapper — set `false` to render slot content directly |

## Examples

### Wrap a custom control

```blade
<x-form.field name="avatar">
    <input type="file" name="avatar">
</x-form.field>
{{-- Renders: <div class="field error">...</div> when validation fails --}}
```

### Opt out

```blade
<x-form.field :field="false">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</x-form.field>
{{-- Renders slot content directly, no wrapping div --}}
```

## Notes

- This component has no public `x-zk-*` alias — it is used internally by other form components.
- The `.error` CSS class is appended automatically when the `$errors` bag contains an entry for `name`.
