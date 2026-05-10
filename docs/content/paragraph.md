---
component: zk-paragraph
family: content
alias: x-zk-paragraph
internal: x-content.paragraph
---

# zk-paragraph

> Renders a `<p>` element.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `id` | `string\|null` | `null` | HTML `id` attribute |
| `class` | `string\|null` | `null` | CSS class(es) |

## Examples

### Basic

```blade
<x-zk-paragraph>This is a paragraph.</x-zk-paragraph>
```

### With id and class

```blade
<x-zk-paragraph id="intro" class="lead">
    Welcome to the application.
</x-zk-paragraph>
```
