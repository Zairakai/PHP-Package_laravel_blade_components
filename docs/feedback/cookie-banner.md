---
component: zk-cookie-banner
family: feedback
alias: x-zk-cookie-banner
internal: x-feedback.cookie-banner
---

# zk-cookie-banner

> A consent banner that the script shows when no choice was made, and remembers the choice.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `title` | `string` | `'Cookies'` | Title |
| `categories` | `array` | `[]` | Items with `id`, `label` and, optionally, `description` and `required` |
| `storageKey` | `string` | `'zk-consent'` | Key of the `localStorage` that holds the choice |
| `acceptLabel` | `string` | `'Accept all'` | Text of the button |
| `rejectLabel` | `string` | `'Reject all'` | Text of the button (required categories stay accepted) |
| `customizeLabel` | `string` | `'Customize'` | Text of the summary and the legend |
| `saveLabel` | `string` | `'Save my choices'` | Text of the button |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The explanation |

Needs the script `consent` of [zk-scripts](../utility/scripts.md): the component asks for it by itself. The banner is `hidden` in the HTML and shown by the script only when the key is empty: without the script nobody sees it. The choice is `{"essential": true, "stats": false}`, and the event `zk:consent` (with it in `detail`) is sent on `document`: load your scripts from it. The choice is not sent to the server.

## Examples

### Basic

```blade
<x-zk-cookie-banner :categories="[
    ['id' => 'essential', 'label' => 'Essential', 'required' => true],
    ['id' => 'stats', 'label' => 'Statistics'],
]">
    We use cookies to measure the audience.
</x-zk-cookie-banner>
```
