---
component: zk-diff
family: content
alias: x-zk-diff
internal: x-content.diff
---

# zk-diff

> A unified diff, line by line, with the old and new line numbers.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `diff` | `string` | `''` | The diff, as `git diff` writes it |
| `lineNumbers` | `bool` | `true` | Shows the numbers (`data-old` and `data-new`, to print with CSS) |
| `title` | `string\|null` | `null` | Title |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

The added lines are `<ins>`, the removed ones `<del>`; each line has `data-type` (`add`, `remove`, `context`, `hunk` or `meta`). Only the unified view is made. No script.

## Examples

### From git

```blade
<x-zk-diff title="app.php" :diff="$diff" />
```
