---
component: zk-track
family: medias
alias: x-zk-track
internal: x-medias.track
---

# zk-track

> Renders a `<track>` element for timed text (subtitles, captions, chapters). Child of `zk-video` or `zk-audio`.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | `string\|null` | `null` | URL of the `.vtt` file |
| `label` | `string\|null` | `null` | User-visible track label |
| `kind` | `string\|null` | `null` | `subtitles`, `captions`, `descriptions`, `chapters`, `metadata` |
| `srclang` | `string\|null` | `null` | BCP 47 language tag (e.g. `en`, `fr`) |
| `default` | `bool` | `false` | Set as default track |

## Example

```blade
<x-zk-video sources="/video/talk.mp4">
    <x-zk-track src="/tracks/en.vtt" kind="subtitles" srclang="en" label="English" default />
    <x-zk-track src="/tracks/fr.vtt" kind="subtitles" srclang="fr" label="Français" />
</x-zk-video>
```
