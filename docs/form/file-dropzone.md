---
component: zk-file-dropzone
family: form
alias: x-zk-file-dropzone
internal: x-form.file-dropzone
---

# zk-file-dropzone

> A zone to drop files on, around a real file input.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `name` | `string` | `required` | Name of the field (`name[]` when `multiple`) |
| `accept` | `string\|null` | `null` | Accepted types |
| `multiple` | `bool` | `false` | Several files |
| `required` | `bool` | `false` | Required |
| `disabled` | `bool` | `false` | Disabled |
| `label` | `string` | `'Drop files here or'` | Text |
| `browseLabel` | `string` | `'browse'` | Text of the link to the file picker |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

The input is a real one: the browser accepts the files dropped on it and sends them with the form. Make the input cover `.file-dropzone-area` with `opacity: 0` in your style. The list of files and the previews of the Vue component are not ported. No script.

## Examples

### Documents

```blade
<x-zk-file-dropzone name="documents" accept=".pdf" :multiple="true" />
```
