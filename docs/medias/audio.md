---
component: zk-audio
family: medias
alias: x-zk-audio
internal: x-medias.audio
---

# zk-audio

> Renders an `<audio>` element with source and track support. Accepts a sources array or a single URL string.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `sources` | `array\|string\|null` | `null` | Source URL (string) or array of source objects |
| `tracks` | `array\|string\|null` | `null` | Track URL (string) or array of track objects |
| `controls` | `bool` | `true` | Show browser controls |
| `autoplay` | `bool` | `false` | Auto-play on load |
| `loop` | `bool` | `false` | Loop playback |
| `muted` | `bool` | `false` | Mute |
| `preload` | `string\|null` | `null` | `auto`, `metadata`, or `none` |
| `class` | `string\|null` | `null` | CSS class(es) |

## Examples

### Single source

```blade
<x-zk-audio sources="/audio/podcast.mp3" />
```

### Multiple sources

```blade
<x-zk-audio :sources="[
    ['src' => '/audio/track.ogg',  'type' => 'audio/ogg'],
    ['src' => '/audio/track.mp3',  'type' => 'audio/mpeg'],
]" />
```

## Notes

- A fallback text is rendered inside the element from `zairakai::layout.medias.audio` for browsers that do not support the `<audio>` element.
- The source object structure mirrors [`zk-video`](./video.md).
