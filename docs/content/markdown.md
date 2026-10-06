---
component: zk-markdown
family: content
alias: x-zk-markdown
internal: x-content.markdown
---

# zk-markdown

> Markdown turned into HTML on the server, without raw HTML and without dangerous links by default.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `text` | `string\|null` | `null` | The text. Without it, the content of the slot |
| `allowHtml` | `bool` | `false` | Keep the HTML written in the text: only for text you wrote |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | The Markdown, when there is no `text` |

It uses `Str::markdown()` of Laravel with `html_input` set to `strip` and `allow_unsafe_links` off. Class hook: `markdown`. No script.

## Examples

### Basic

```blade
<x-zk-markdown :text="$post->body" />
```
