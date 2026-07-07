---
component: zk-checkbox
family: form
alias: x-zk-checkbox
internal: x-form.checkbox
---

# zk-checkbox

> Renders an `<input type="checkbox">`. When `field` is true, delegates to `zk-input` for full field wrapper support.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `name` | `string\|null` | `null` | `name` attribute |
| `id` | `string\|null` | `null` | `id` — falls back to `name` |
| `field` | `bool` | `true` | Wrap in field structure via `zk-input` |
| `labelBefore` | `bool` | `false` | Overrides `zk-input`'s own `true` default — "☐ Label" reads better than the reverse |

All other [`zk-input`](./input.md) props are accepted when `field` is `true` (delegated). When `field` is `false`, all undeclared attributes forward directly to the `<input>`.

## Examples

### Basic

```blade
<x-zk-checkbox name="agree" label="I agree to the terms" />
```

### Pre-checked

```blade
<x-zk-checkbox name="newsletter" label="Subscribe to newsletter" :checked="$user->newsletter" />
```

### Bare checkbox (no field wrapper)

```blade
<x-zk-checkbox name="active" :field="false" value="1" checked />
```

### With Alpine.js

```blade
<x-zk-checkbox name="accept" :field="false" x-model="accepted" />
```
