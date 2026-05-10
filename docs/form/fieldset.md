---
component: zk-fieldset
family: form
alias: x-zk-fieldset
internal: x-form.fieldset
---

# zk-fieldset

> Renders a `<fieldset>` with an optional `<legend>` element.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `legend` | `string\|null` | `null` | Legend text |
| `legendBefore` | `bool` | `false` | Place legend before slot content (default: after) |
| `class` | `string\|null` | `null` | CSS class(es) |

## Examples

### Basic grouping

```blade
<x-zk-fieldset legend="Personal information">
    <x-zk-input name="first_name" label="First name" />
    <x-zk-input name="last_name" label="Last name" />
</x-zk-fieldset>
```

### Legend before content

```blade
<x-zk-fieldset legend="Address" :legendBefore="true">
    <x-zk-input name="street" label="Street" />
    <x-zk-input name="city" label="City" />
</x-zk-fieldset>
```
