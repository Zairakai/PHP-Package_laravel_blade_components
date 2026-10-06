---
component: zk-scripts
family: utility
alias: x-zk-scripts
internal: x-utility.scripts
---

# zk-scripts

> Prints the scripts that the components of the page need, in one `<script>` tag that takes a CSP nonce, and nothing else.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `nonce` | `string\|null` | `null` | Nonce of your content security policy; by default the one of `Vite::cspNonce()` when there is one |
| `features` | `array\|string` | `[]` | Scripts to print even if no component asked for them, as a list or a string (`"share, theme"`); `all` for every one |

## How it chooses

A component that needs a script asks for it while it renders: a dismissible `zk-alert` asks for `dismiss`, `zk-copy-button` and `zk-code-block` for `copy`, `zk-modal` for `modal`, and so on. `zk-scripts` prints the scripts that were asked for, each once, and nothing when there are none. A page that uses no such component gets no `<script>` at all.

So `zk-scripts` must come **after** the components in the layout, for example at the end of `<body>`:

```blade
<body>
    @yield('content')

    <x-zk-scripts />
</body>
```

Content that is rendered later (a cached fragment, a lazy component) is not seen. For those, name the scripts: `<x-zk-scripts features="copy, share" />`.

## The scripts

| Name | Used by | Data attributes it reads |
| ---- | ------- | ------------------------ |
| `dismiss` | `zk-alert`, `zk-banner`, `zk-toast` (dismissible) | `data-zk-dismiss=".alert"`: removes the closest element that matches |
| `copy` | `zk-copy-button`, `zk-code-block`, `zk-terminal`, `zk-json-viewer` | `data-zk-copy="text"` or `"#id"`: copies the text, sets `data-copied` for two seconds |
| `modal` | `zk-modal`, `zk-drawer`, `zk-confirm-dialog`, `zk-lightbox` | `data-zk-modal="id"`: opens the dialog (for browsers without `commandfor`) |
| `carousel` | `zk-carousel` | `data-zk-carousel`, `data-autoplay`, `data-loop`: buttons, current indicator, autoplay |
| `countdown` | `zk-countdown` | `data-zk-countdown="date"`: updates the numbers every second |
| `share` | `zk-share-button` | `data-zk-share`, `data-title`, `data-text`, `data-url` |
| `theme` | `zk-theme-switcher` | `data-zk-theme-switcher`, `data-mode`, `data-storage-key`, `data-attribute` |
| `consent` | `zk-cookie-banner` | `data-zk-consent`, `data-zk-consent-action`, `data-category`: shows the banner, stores the choice |

The components never use an inline handler (`onclick`) nor an inline `style`. A policy without `unsafe-inline` only has to allow this tag, and the one of [zk-styles](./styles.md), by their nonce. With `Vite::useCspNonce()` in a service provider the nonce is found by itself. Without the scripts everything else works; only these actions do nothing.

## Examples

```blade
{{-- the nonce of Vite::cspNonce(), when there is one --}}
<x-zk-scripts />

{{-- your own nonce --}}
<x-zk-scripts :nonce="$nonce" />

{{-- build it yourself: publish the files and import the ones you want --}}
{{-- php artisan vendor:publish --tag=zairakai-assets --}}
```
