---
component: zk-list-item
family: display
alias: x-zk-list-item
internal: x-display.list-item
---

# zk-list-item

> An item of a list, with a title, a subtitle, and parts before and after.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `title` | `string\|null` | `null` | Title |
| `subtitle` | `string\|null` | `null` | Second line |
| `href` | `string\|null` | `null` | Makes the item a link |
| `disabled` | `bool` | `false` | `data-disabled` and `aria-disabled`; a disabled item is never a link |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Extra content |
| `prepend` | Before the text (icon, avatar) |
| `append` | After the text (count, action) |

An `<li>`: put it in a `<ul>` or `<ol>`. Class hooks: `list-item`, `list-item-body`, `list-item-prepend`, `list-item-content`, `list-item-title`, `list-item-subtitle`, `list-item-append`.

## Examples

### Inbox

```blade
<ul>
    <x-zk-list-item title="Inbox" subtitle="3 new" href="/inbox">
        <x-slot:append>3</x-slot>
    </x-zk-list-item>
</ul>
```
