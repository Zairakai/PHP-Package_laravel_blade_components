---
component: zk-password
family: form
alias: x-zk-password
internal: x-form.password
---

# zk-password

> Renders a password input with configurable minimum length and an optional Alpine.js-powered show/hide toggle.

## Props

All [`zk-input`](./input.md) props are accepted and forwarded. Additional props:

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `min` | `int` | `config('blade-components.password.min_characters', 8)` | Minimum character length enforced via `pattern` |
| `showToggle` | `bool` | `config('blade-components.password.show_toggle', true)` | Render a show/hide eye button |

## Config

```php
// config/blade-components.php
'password' => [
    'min_characters' => 8,
    'show_toggle'    => true,
],
```

## Examples

### Basic

```blade
<x-zk-password name="password" label="Password" required />
```

### Confirm password (no toggle)

```blade
<x-zk-password
    name="password_confirmation"
    label="Confirm password"
    :showToggle="false" />
```

### Custom minimum length

```blade
<x-zk-password name="password" label="Password" :min="12" required />
```

## Notes

- When `showToggle` is enabled, requires Alpine.js in the consuming application.
- The toggle button uses `data-label-show` / `data-label-hide` attributes for i18n labels (translated in 21 languages) to avoid Alpine.js quote-escaping issues.
- The generated `pattern` is `^.{N,}$` where N is the `min` value.
