---
component: zk-callout
family: content
alias: x-zk-callout
internal: x-content.callout
---

# zk-callout

> A note set apart from the text.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `variant` | `string` | `'info'` | `info`, `success`, `warning` or `error`: `data-variant` |
| `title` | `string\|null` | `null` | Title, by default the variant with a capital letter |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Body |
| `icon` | Icon before the title |

It is an `<aside role="note">`. Class hooks: `callout`, `callout-title`, `callout-icon`, `callout-body`.

## Examples

### Warning

```blade
<x-zk-callout variant="warning" title="Careful">
    This resets your settings.
</x-zk-callout>
```
