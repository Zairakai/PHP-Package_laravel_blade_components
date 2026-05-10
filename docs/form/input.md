---
component: zk-input
family: form
alias: x-zk-input
internal: x-form.input
---

# zk-input

> Base input component. Renders `<input>` wrapped in a field structure. All typed input shorthands (`zk-email`, `zk-date`, etc.) delegate to this component.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `type` | `string` | `'text'` | Input type attribute |
| `name` | `string\|null` | `null` | `name` attribute |
| `id` | `string\|null` | `null` | `id` attribute — auto-generated from `name` when a label is present |
| `value` | `mixed` | `null` | Input value — uses `old()` automatically on repopulation |
| `placeholder` | `string\|null` | `null` | Placeholder text |
| `label` | `string\|null` | `null` | Label text — renders a `<label>` element |
| `labelBefore` | `bool` | `false` | Place the label before the input when `true` (default: after) |
| `required` | `bool` | `false` | Adds `required` and `aria-required="true"` |
| `disabled` | `bool` | `false` | Adds `disabled` attribute |
| `readonly` | `bool` | `false` | Adds `readonly` attribute |
| `multiple` | `bool` | `false` | Adds `multiple` attribute |
| `autofocus` | `bool` | `false` | Adds `autofocus` attribute |
| `checked` | `bool` | `false` | Adds `checked` attribute (for checkbox/radio types) |
| `autocomplete` | `string\|null` | `null` | `autocomplete` attribute |
| `pattern` | `string\|null` | `null` | `pattern` validation attribute |
| `min` | `string\|null` | `null` | `min` attribute |
| `max` | `string\|null` | `null` | `max` attribute |
| `step` | `string\|null` | `null` | `step` attribute |
| `maxlength` | `int\|null` | `null` | `maxlength` attribute |
| `accept` | `string\|null` | `null` | `accept` attribute (file inputs) |
| `list` | `string\|null` | `null` | `list` attribute — links to a `<datalist>` id |
| `size` | `int\|null` | `null` | `size` attribute |
| `width` | `int\|null` | `null` | `width` attribute |
| `height` | `int\|null` | `null` | `height` attribute |
| `class` | `string\|null` | `null` | CSS class(es) on the `<input>` element |
| `field` | `bool` | `true` | Wrap in field structure — set `false` to render bare input |
| `fieldClass` | `string\|null` | `null` | CSS class(es) on the field wrapper |
| `iconBefore` | `string\|null` | `null` | Leading icon name (Material Symbols) |
| `iconAfter` | `string\|null` | `null` | Trailing icon name |
| `prefix` | `string\|null` | `null` | Text prefix inside the input wrapper |
| `suffix` | `string\|null` | `null` | Text suffix inside the input wrapper |
| `supportingText` | `string\|null` | `null` | Helper text below the field — overridden by validation error |
| `supportingCounter` | `string\|null` | `null` | Character counter text below the field |

## Examples

### Basic text input

```blade
<x-zk-input name="username" label="Username" />
```

### With validation and repopulation

```blade
<x-zk-input
    name="email"
    type="email"
    label="Email address"
    :value="$user->email"
    required />
```

### No field wrapper (bare input)

```blade
<x-zk-input name="q" placeholder="Search..." :field="false" />
```

### Label before the input

```blade
<x-zk-input name="username" label="Username" :labelBefore="true" />
```

### With icons and supporting text

```blade
<x-zk-input
    name="email"
    label="Email"
    iconBefore="mail"
    supportingText="We will never share your email." />
```

### With prefix/suffix

```blade
<x-zk-input name="price" type="number" prefix="€" suffix="HT" />
```

### With datalist

```blade
<x-zk-input name="city" list="cities-list" />
<x-zk-datalist id="cities-list" :options="['Paris' => 'Paris', 'Lyon' => 'Lyon']" />
```

### Alpine.js integration

```blade
<x-zk-input name="q" x-model="query" @input.debounce="search" />
```

## Notes

- `old()` is called automatically — no need to wrap value in `old($name, $value)` manually.
- `id` is auto-generated from `name` only when a `label` is present, to maintain correct `<label for="">` linkage.
- Validation errors from `$errors` bag automatically populate `supportingText`.
