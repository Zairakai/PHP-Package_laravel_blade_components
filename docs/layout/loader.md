---
component: zk-loader
family: layout
alias: x-zk-loader
internal: x-layout.loader
---

# zk-loader

> A loading indicator that gives way to the content.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `loading` | `bool` | `true` | Shows the indicator; when false, shows the slot |
| `status` | `string` | `''` | Text for the indicator |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Content shown once loaded |

`role="status"`, `aria-live="polite"` and `aria-busy="true"` while loading. Animate `.loader-animation` in your style.

## Examples

### Basic

```blade
<x-zk-loader :loading="$loading" status="Loading">
    {{ $content }}
</x-zk-loader>
```
