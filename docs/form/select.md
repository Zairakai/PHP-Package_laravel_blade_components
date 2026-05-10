---
component: zk-select
family: form
alias: x-zk-select
internal: x-form.select
---

# zk-select

> Renders a `<select>` element with optional optgroup support, default placeholder option, and validation integration.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `name` | `string\|null` | `null` | `name` attribute |
| `id` | `string\|null` | `null` | `id` — falls back to `name` |
| `options` | `array` | `[]` | Key-value pairs. Nested arrays create `<optgroup>` |
| `selected` | `mixed` | `null` | Pre-selected value — uses `old()` automatically |
| `multiple` | `bool` | `false` | Multi-select — appends `[]` to name |
| `required` | `bool` | `false` | Adds `required` and `aria-required="true"` |
| `disabled` | `bool` | `false` | Adds `disabled` attribute |
| `autofocus` | `bool` | `false` | Adds `autofocus` attribute |
| `form` | `string\|null` | `null` | Associates with a form by id |
| `label` | `string\|null` | `null` | Label text |
| `labelBefore` | `bool` | `false` | Place label before the select |
| `class` | `string\|null` | `null` | CSS class(es) on the `<select>` element |
| `field` | `bool` | `true` | Wrap in field structure |
| `fieldClass` | `string\|null` | `null` | CSS class(es) on the field wrapper |
| `iconBefore` | `string\|null` | `null` | Leading icon |
| `iconAfter` | `string\|null` | `config('blade-components.select.icon_after')` | Trailing icon — defaults to `keyboard_arrow_down` |
| `supportingText` | `string\|null` | `null` | Helper text below the field |
| `supportingCounter` | `string\|null` | `null` | Counter text |

## Examples

### Basic

```blade
<x-zk-select
    name="country"
    label="Country"
    :options="['fr' => 'France', 'de' => 'Germany', 'gb' => 'United Kingdom']"
    :selected="$user->country" />
```

### With optgroups

```blade
<x-zk-select
    name="timezone"
    label="Timezone"
    :options="[
        'Europe' => ['Europe/Paris' => 'Paris', 'Europe/London' => 'London'],
        'America' => ['America/New_York' => 'New York', 'America/Chicago' => 'Chicago'],
    ]" />
```

### Required with default placeholder

```blade
<x-zk-select
    name="role"
    label="Role"
    :options="['admin' => 'Admin', 'user' => 'User']"
    required />
{{-- A blank placeholder option is prepended automatically when required --}}
```

### Multiple select

```blade
<x-zk-select
    name="tags"
    label="Tags"
    :options="$tags"
    :selected="$post->tags->pluck('id')"
    multiple />
```

### Without trailing icon

```blade
<x-zk-select name="size" :options="$sizes" :iconAfter="null" />
```

## Notes

- A blank default option is prepended automatically when `required` is set and all options are within optgroups.
- Selected value comparison is strict string equality — integer and string keys are both handled correctly.
- `old()` is called automatically.
