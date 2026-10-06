---
component: zk-code-group
family: content
alias: x-zk-code-group
internal: x-content.code-group
---

# zk-code-group

> Several code blocks in tabs (npm, yarn, pnpm...), chosen with radio buttons, so with no script.

## Props

| Prop | Type | Default | Description |
| ---- | ---- | ------- | ----------- |
| `tabs` | `array` | `[]` | Items with `label`, `code` and, optionally, `language` and `title` |
| `label` | `string` | `'Code'` | Accessible name of the group |
| `id` | `string\|null` | `null` | Identifier, also the `name` of the radio buttons |
| `class` | `string\|null` | `null` | CSS class(es) merged onto the root element |

Undeclared attributes forward to the root element.

Each tab is a radio, a label and a panel that follow each other: the panel of the checked tab is shown by `.code-group-input:checked + .code-group-tab + .code-group-panel`, which is the style `zk-styles` prints (`code-group`). The choice is not kept between pages.

## Examples

### Install

```blade
<x-zk-code-group :tabs="[
    ['label' => 'npm', 'code' => 'npm install @zairakai/vue-components'],
    ['label' => 'yarn', 'code' => 'yarn add @zairakai/vue-components'],
]" />

<x-zk-styles />
```
