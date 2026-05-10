---
component: zk-textarea
family: form
alias: x-zk-textarea
internal: x-form.textarea
---

# zk-textarea

> Renders a `<textarea>` element with label and field wrapper support.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `name` | `string\|null` | `null` | `name` attribute |
| `id` | `string\|null` | `null` | `id` — falls back to `name` |
| `value` | `string\|null` | `null` | Content — uses `old()` automatically |
| `placeholder` | `string\|null` | `null` | Placeholder text |
| `label` | `string\|null` | `null` | Label text |
| `labelBefore` | `bool` | `false` | Place label before the textarea (default: after) |
| `required` | `bool` | `false` | Adds `required` and `aria-required="true"` |
| `disabled` | `bool` | `false` | Adds `disabled` attribute |
| `readonly` | `bool` | `false` | Adds `readonly` attribute |
| `autofocus` | `bool` | `false` | Adds `autofocus` attribute |
| `rows` | `int\|null` | `null` | `rows` attribute |
| `cols` | `int\|null` | `null` | `cols` attribute |
| `maxlength` | `int\|null` | `null` | `maxlength` attribute |
| `wrap` | `string\|null` | `null` | `wrap` attribute (`hard` / `soft`) |
| `dirname` | `string\|null` | `null` | `dirname` attribute |
| `form` | `string\|null` | `null` | Associates with a form by id |
| `class` | `string\|null` | `null` | CSS class(es) on the `<textarea>` element |
| `field` | `bool` | `true` | Wrap in field structure |
| `fieldClass` | `string\|null` | `null` | CSS class(es) on the field wrapper |
| `iconBefore` | `string\|null` | `null` | Leading icon |
| `iconAfter` | `string\|null` | `null` | Trailing icon |
| `prefix` | `string\|null` | `null` | Text prefix |
| `suffix` | `string\|null` | `null` | Text suffix |
| `supportingText` | `string\|null` | `null` | Helper text — overridden by validation error |
| `supportingCounter` | `string\|null` | `null` | Character counter text |

## Examples

### Basic

```blade
<x-zk-textarea name="bio" label="Biography" />
```

### With constraints

```blade
<x-zk-textarea
    name="description"
    label="Description"
    :rows="5"
    :maxlength="500"
    :value="$product->description"
    required />
```

### Label before the textarea

```blade
<x-zk-textarea name="notes" label="Notes" :labelBefore="true" />
```

### Alpine.js character counter

```blade
<x-zk-textarea
    name="bio"
    label="Bio"
    :maxlength="280"
    x-model="bio"
    :supportingCounter="null" />
```
