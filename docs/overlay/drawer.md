---
component: zk-drawer
family: overlay
alias: x-zk-drawer
internal: x-overlay.drawer
---

# zk-drawer

> A panel that slides from a side, a native `<dialog>`.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string` | `required` | Identifier |
| `title` | `string\|null` | `null` | Title |
| `side` | `string` | `'right'` | `left`, `right`, `top` or `bottom`: `data-side` |
| `closedby` | `string` | `'any'` | `any`, `closerequest` or `none` |
| `closeLabel` | `string` | `'Close'` | Accessible name of the close button |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Body |
| `footer` | Footer |

It opens like the modal. The slide is yours: `.drawer[data-side="left"]` and the size with `--zk-drawer-size`. Class hooks: `drawer`, `drawer-header`, `drawer-title`, `drawer-close`, `drawer-body`, `drawer-footer`.

## Examples

### Menu

```blade
<button commandfor="menu" command="show-modal">Menu</button>

<x-zk-drawer id="menu" title="Menu" side="left">
    <x-zk-nav>...</x-zk-nav>
</x-zk-drawer>
```
