---
component: zk-password
family: form
alias: x-zk-password
internal: x-form.password
---

# zk-password

> Renders a password input with configurable minimum length and an optional show/hide toggle driven by vanilla JS — no external dependency required.

## Props

All [`zk-input`](./input.md) props are accepted and forwarded. Additional props:

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `min` | `int` | `config('blade-components.password.min_characters', 8)` | Minimum character length enforced via `pattern` |
| `showToggle` | `bool` | `config('blade-components.password.show_toggle', true)` | Render a show/hide toggle button |

## Named slots

| Slot | Description |
| ---- | ----------- |
| `iconShow` | Icon displayed when password is hidden (click to reveal). Overrides config default. |
| `iconHide` | Icon displayed when password is visible (click to conceal). Overrides config default. |

Slots accept any content: emoji, SVG, icon font markup, plain text.

## Config

```php
// config/blade-components.php
'password' => [
    'min_characters' => 8,
    'show_toggle'    => true,
    // Defaults reference the icon sprite shipped with the package
    // (resources/views/icons/sprite.blade.php, injected once per page).
    'icon_show'      => '<svg width="20" height="20"><use href="#icon-visibility"></use></svg>',
    'icon_hide'      => '<svg width="20" height="20"><use href="#icon-visibility-off"></use></svg>',
],
```

Priority: **named slot > app config > component default (emoji)**.

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

### Custom icons via named slots

```blade
{{-- Material Symbols --}}
<x-zk-password name="password" label="Password">
    <x-slot name="iconShow"><span class="msr">visibility</span></x-slot>
    <x-slot name="iconHide"><span class="msr">visibility_off</span></x-slot>
</x-zk-password>

{{-- Font Awesome --}}
<x-zk-password name="password" label="Password">
    <x-slot name="iconShow"><i class="fa-regular fa-eye"></i></x-slot>
    <x-slot name="iconHide"><i class="fa-regular fa-eye-slash"></i></x-slot>
</x-zk-password>

{{-- SVG --}}
<x-zk-password name="password" label="Password">
    <x-slot name="iconShow"><svg>...</svg></x-slot>
    <x-slot name="iconHide"><svg>...</svg></x-slot>
</x-zk-password>
```

### Global icon override via config

```php
// config/blade-components.php — applies to every x-zk-password in the app
'password' => [
    'icon_show' => '<span class="msr">visibility</span>',
    'icon_hide' => '<span class="msr">visibility_off</span>',
],
```

## Notes

- The toggle is driven by an inline vanilla JS snippet injected once per page via `@once` — no Alpine.js or other external dependency needed.
- The icon sprite (`icons.sprite`) is injected once per page via its own `@once`, regardless of how many `x-zk-password` fields are on the page.
- `data-icon-show` is visible when the field is in `type="password"` state; `data-icon-hide` when in `type="text"`.
- The toggle button uses `data-label-show` / `data-label-hide` for i18n `aria-label` (translated in 21 languages).
- The generated `pattern` is `^.{N,}$` where N is the `min` value.
- Internally the button renders via `x-form.input`'s `trailingContent` prop (raw HTML, scoped strictly to `[data-input]`) rather than `iconAfter` — `iconAfter` is also mirrored into `x-form.label`, which would duplicate an interactive button into the `<label>` element. Consuming apps should position `[data-toggle-visibility]` relative to `[data-password-toggle] [data-input]`, not the outer `[data-password-toggle]` wrapper, so it stays aligned with the input regardless of a validation message rendered below it.
