---
component: zk-card
family: display
alias: x-zk-card
internal: x-display.card
---

# zk-card

> A card with an optional header, a body and an optional footer.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `as` | `string` | `'div'` | Root element (`div`, `article`, `section`...) |
| `title` | `string\|null` | `null` | Text of the header, when there is no `header` slot |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Body of the card |
| `header` | Replaces the title in the header |
| `footer` | Footer, shown only when given |

Class hooks: `card`, `card-header`, `card-body`, `card-footer`.

## Examples

### Basic

```blade
<x-zk-card title="Profile">
    Body
    <x-slot:footer>
        <a href="/edit">Edit</a>
    </x-slot>
</x-zk-card>
```
