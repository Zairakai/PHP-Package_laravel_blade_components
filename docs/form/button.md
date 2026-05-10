---
component: zk-button
family: form
alias: x-zk-button
internal: x-form.button
---

# zk-button

> Renders a `<button>` element. Optionally wraps in a field structure.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `type` | `string` | `'button'` | Button type: `button`, `submit`, `reset` |
| `name` | `string\|null` | `null` | `name` attribute |
| `value` | `mixed` | `null` | `value` attribute — uses `old()` automatically |
| `form` | `string\|null` | `null` | Associates with a form by id |
| `disabled` | `bool` | `false` | Adds `disabled` attribute |
| `autofocus` | `bool` | `false` | Adds `autofocus` attribute |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the element |
| `icon` | `string\|null` | `null` | Material Symbols icon name — rendered as `data-icon` attribute |
| `field` | `bool` | `false` | Wrap in field structure (off by default) |
| `fieldClass` | `string\|null` | `null` | CSS class(es) on the field wrapper |

## Examples

### Basic button

```blade
<x-zk-button>Click me</x-zk-button>
```

### With icon (data attribute for CSS)

```blade
<x-zk-button icon="add" class="btn-primary">Add item</x-zk-button>
{{-- renders: <button ... data-icon="add" class="btn-primary">Add item</button> --}}
```

### Disabled

```blade
<x-zk-button :disabled="! $form->isDirty()">Save</x-zk-button>
```

### Alpine.js integration

```blade
<x-zk-button @click="open = true" x-bind:disabled="loading">Open</x-zk-button>
```

## Notes

- `zk-submit` and `zk-reset` are thin wrappers around this component with `type` pre-set.
- `field` defaults to `false` unlike most form components — buttons rarely need a field wrapper.
