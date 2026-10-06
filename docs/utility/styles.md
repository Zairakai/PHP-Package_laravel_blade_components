---
component: zk-styles
family: utility
alias: x-zk-styles
internal: x-utility.styles
---

# zk-styles

> The CSS that some components need, printed once in the layout, with a CSP nonce.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `nonce` | `string\|null` | `null` | Nonce of your content security policy; by default the one of `Vite::cspNonce()` when there is one |
| `features` | `array\|string` | `[]` | Styles to print even if no component asked for them (`carousel`, `code-group`, `all`) |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

Like [zk-scripts](./scripts.md): it prints only the styles of the components rendered before it, in one `<style>` tag, and nothing when none is needed. It exists so that no component needs an inline `style` attribute. Put it after the content, or name the styles with `features` to print them in the `<head>`; or publish the CSS (`php artisan vendor:publish --tag=zairakai-assets`) and import it in your own style sheet.

## Examples

### In the layout

```blade
<x-zk-styles />
```
