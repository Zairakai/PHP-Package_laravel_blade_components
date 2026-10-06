---
component: zk-scripts
family: utility
alias: x-zk-scripts
internal: x-utility.scripts
---

# zk-scripts

> The one script of the library, to print once in the layout. It takes a CSP nonce.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `nonce` | `string\|null` | `null` | Nonce of your content security policy; by default the one of Laravel `Vite::cspNonce()` when there is one |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

It prints one `<script>` that listens to the clicks on three data attributes:

| Attribute | Does |
| --------- | ---- |
| `data-zk-dismiss=".alert"` | removes the closest element that matches the selector (alert, banner, toast) |
| `data-zk-copy="text"` or `data-zk-copy="#id"` | copies the text, or the text of the element, and sets `data-copied` for two seconds |
| `data-zk-modal="id"` | opens the dialog with that id (for browsers without `commandfor`) |

The components never use an inline handler (`onclick`), so a policy without `unsafe-inline` for scripts only has to allow this tag by its nonce. Without the script everything else works; only these three actions do nothing. With `Vite::useCspNonce()` in a service provider, the nonce is found by itself.

## Examples

### In the layout

```blade
<x-zk-scripts />

{{-- or, with your own nonce --}}
<x-zk-scripts :nonce="$nonce" />
```
