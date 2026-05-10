---
component: zk-email
family: form
alias: x-zk-email
internal: x-form.email
---

# zk-email

> Renders an `<input type="email">` with a configurable browser-side validation pattern.

See [zk-input](./input.md) for the full props reference.

## Config

```php
// config/blade-components.php
'email' => [
    'pattern' => '[^@]+@[^@]+\.[a-zA-Z]{2,}',
],
```

## Example

```blade
<x-zk-email name="email" label="Email address" required />
```

## Notes

- The `pattern` is applied as an HTML `pattern` attribute for browser-side validation.
- Override via config or pass `pattern` directly as a prop to bypass config.
