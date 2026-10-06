---
component: zk-divider
family: display
alias: x-zk-divider
internal: x-display.divider
---

# zk-divider

> A separator, a plain `<hr>` or a labelled one.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `orientation` | `string` | `'horizontal'` | `horizontal` or `vertical`: `data-orientation` |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Label in the middle of the line, optional |

Without a label and when horizontal it is an `<hr>`; otherwise a `div` with `role="separator"`.

## Examples

### Plain

```blade
<x-zk-divider />
```

### Labelled

```blade
<x-zk-divider>or</x-zk-divider>
```

### Vertical

```blade
<x-zk-divider orientation="vertical" />
```
