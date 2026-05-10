---
component: zk-switch
family: form
alias: x-zk-switch
internal: x-form.switch
---

# zk-switch

> Styled checkbox rendered as a toggle switch. Delegates to `zk-checkbox` with a `switch` field class applied automatically.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `name` | `string\|null` | `null` | `name` attribute |
| `id` | `string\|null` | `null` | `id` — falls back to `name` |
| `value` | `mixed` | `null` | `value` attribute |
| `checked` | `bool` | `false` | Pre-checked state |
| `label` | `string\|null` | `null` | Label text |
| `class` | `string\|null` | `null` | CSS class(es) on the input |
| `field` | `bool` | `true` | Wrap in field structure |
| `fieldClass` | `string\|null` | `null` | Additional field class — merged with base `switch` class |

## Examples

### Basic toggle

```blade
<x-zk-switch name="notifications" label="Enable notifications" />
```

### Pre-enabled

```blade
<x-zk-switch name="dark_mode" label="Dark mode" :checked="$user->dark_mode" />
```

### Without field wrapper

```blade
<x-zk-switch name="active" :field="false" :checked="true" />
```

## Notes

- Always renders with `class="switch"` on the field wrapper — this is the CSS hook for toggle styling.
- Visually depends on CSS in the consuming application.
