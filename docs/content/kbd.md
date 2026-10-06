---
component: zk-kbd
family: content
alias: x-zk-kbd
internal: x-content.kbd
---

# zk-kbd

> A key, or a combination of keys.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `keys` | `array` | `[]` | Keys of a combination, shown each in a `<kbd>` |
| `separator` | `string` | `'+'` | Text between the keys |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | A single key |

Class hooks: `kbd`, `kbd-combo`, `kbd-key`, `kbd-separator` (hidden from assistive technology).

## Examples

### Key

```blade
<x-zk-kbd>Esc</x-zk-kbd>
```

### Combination

```blade
<x-zk-kbd :keys="['Ctrl', 'K']" />
```
