---
component: zk-banner
family: feedback
alias: x-zk-banner
internal: x-feedback.banner
---

# zk-banner

> A full-width notice, for the site or the page.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `variant` | `string` | `'info'` | `data-variant`; `warning` and `error` have `role="alert"` |
| `dismissible` | `bool` | `false` | Shows a dismiss button that removes the banner (inline `onclick`) |
| `dismissLabel` | `string` | `'Dismiss'` | Accessible name of the button |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Message |
| `icon` | Icon |
| `actions` | Buttons or links |

Class hooks: `banner`, `banner-icon`, `banner-content`, `banner-actions`, `banner-dismiss`.

## Examples

### Maintenance

```blade
<x-zk-banner variant="warning">Maintenance on Sunday at 2 am.</x-zk-banner>
```
