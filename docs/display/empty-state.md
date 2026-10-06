---
component: zk-empty-state
family: display
alias: x-zk-empty-state
internal: x-display.empty-state
---

# zk-empty-state

> What to show when a list or a page has nothing to show.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `title` | `string\|null` | `null` | Title |
| `description` | `string\|null` | `null` | Text, when there is no slot |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

## Slots

| Slot | Description |
| ---- | ----------- |
| `default` | Replaces the description |
| `icon` | Icon above the title |
| `actions` | Buttons or links |

## Examples

### Basic

```blade
<x-zk-empty-state title="No project yet" description="Create your first one.">
    <x-slot:actions>
        <a href="/projects/new">New project</a>
    </x-slot>
</x-zk-empty-state>
```
