---
component: zk-datalist
family: form
alias: x-zk-datalist
internal: x-form.datalist
---

# zk-datalist

> Renders a `<datalist>` element for input autocomplete suggestions.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string\|null` | `null` | `id` attribute — must match the `list` prop on the linked input |
| `options` | `array` | `[]` | Key-value pairs: `value => label` |

## Examples

### Linked to an input

```blade
<x-zk-input name="city" label="City" list="city-suggestions" :field="false" />
<x-zk-datalist id="city-suggestions" :options="[
    'paris' => 'Paris',
    'lyon'  => 'Lyon',
    'nice'  => 'Nice',
]" />
```
