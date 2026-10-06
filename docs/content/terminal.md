---
component: zk-terminal
family: content
alias: x-zk-terminal
internal: x-content.terminal
---

# zk-terminal

> A shell session: commands with a prompt, their output, and a button that copies the commands only.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `lines` | `array` | `[]` | Commands (strings) or arrays with `type` (`command` or `output`) and `text` |
| `prompt` | `string` | `'$'` | Prompt shown before a command |
| `title` | `string\|null` | `null` | Title |
| `copyable` | `bool` | `true` | Shows the copy button |
| `copyLabel` | `string` | `'Copy'` | Text of the button |
| `id` | `string\|null` | `null` | Identifier |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

Needs the script `copy` of [zk-scripts](../utility/scripts.md): the component asks for it by itself. The prompt is decorative (`aria-hidden`) and is not copied. Class hooks: `terminal`, `terminal-header`, `terminal-title`, `terminal-copy`, `terminal-body`, `terminal-line` (`data-type`), `terminal-prompt`.

## Examples

### Install

```blade
<x-zk-terminal title="Install" :lines="[
    'composer require zairakai/laravel-blade-components',
    ['type' => 'output', 'text' => 'Using version ^3.1'],
]" />
```
