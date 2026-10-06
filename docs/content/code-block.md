---
component: zk-code-block
family: content
alias: x-zk-code-block
internal: x-content.code-block
---

# zk-code-block

> A block of code with its language, a title, line numbers, highlighted lines and a copy button.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `code` | `string\|null` | `null` | The code. Without it, the content of the slot |
| `language` | `string\|null` | `null` | Language: a `language-x` class on `<code>` and a label |
| `title` | `string\|null` | `null` | Title, usually a file name |
| `lineNumbers` | `bool` | `false` | Adds `data-line-numbers`: number the lines with CSS counters on `.code-line::before` |
| `highlightLines` | `array` | `[]` | Numbers of the lines to mark (`data-highlight`) |
| `wrap` | `bool` | `false` | Adds `data-wrap`: your style lets the long lines wrap |
| `copyable` | `bool` | `true` | Shows the copy button |
| `copyLabel` | `string` | `'Copy'` | Text of the copy button |
| `id` | `string\|null` | `null` | Identifier of the `<code>`; by default made from the code |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

There is no syntax highlighting: the text is escaped and each line is a `<span class="code-line">`. To highlight, render the code with your highlighter on the server and style its classes, or load one in the browser on `.language-x`. Needs the script `copy` of [zk-scripts](../utility/scripts.md): the component asks for it by itself. Class hooks: `code-block`, `code-block-header`, `code-block-title`, `code-block-language`, `code-block-copy`, `code-block-pre`, `code-line`.

## Examples

### Basic

```blade
<x-zk-code-block language="php" title="index.php" :line-numbers="true" :highlight-lines="[2]" :code="$source" />
```
