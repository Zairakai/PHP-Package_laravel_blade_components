---
component: zk-multi-select
family: form
alias: x-zk-multi-select
internal: x-form.multi-select
---

# zk-multi-select

> A `<select multiple>`: [zk-select](./select.md) with several choices allowed. It has the name that `@zairakai/vue-components` gives its component.

## Props

The props of [zk-select](./select.md). `multiple` is already on, and the field is named `name[]`.

## Examples

### Basic

```blade
<x-zk-multi-select name="roles" label="Roles" :options="$roles" :selected="old('roles', [])" />
```

It is the native element: no search box and no chips like the Vue component.
