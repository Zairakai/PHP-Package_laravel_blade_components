---
component: zk-video
family: medias
alias: x-zk-video
internal: x-medias.video
---

# zk-video

> Renders a `<video>` element with source and track support. Accepts a sources array or a single URL string.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `sources` | `array\|string\|null` | `null` | Source URL (string) or array of source objects |
| `tracks` | `array\|string\|null` | `null` | Track URL (string) or array of track objects |
| `controls` | `bool` | `true` | Show browser controls |
| `autoplay` | `bool` | `false` | Auto-play on load |
| `loop` | `bool` | `false` | Loop playback |
| `muted` | `bool` | `false` | Mute audio |
| `width` | `int\|null` | `null` | Video display width |
| `height` | `int\|null` | `null` | Video display height |
| `poster` | `string\|null` | `null` | Poster image URL |
| `preload` | `string\|null` | `null` | `auto`, `metadata`, or `none` |
| `class` | `string\|null` | `null` | CSS class(es) |

## Source Object Structure

```php
[
    'src'    => '/video/clip.webm',  // required
    'type'   => 'video/webm',        // default: 'video/webm'
    'sizes'  => null,
    'media'  => null,
    'srcset' => null,
]
```

## Examples

### Single source (string shorthand)

```blade
<x-zk-video sources="/video/demo.mp4" />
```

### Multiple sources for compatibility

```blade
<x-zk-video :sources="[
    ['src' => '/video/demo.webm', 'type' => 'video/webm'],
    ['src' => '/video/demo.mp4',  'type' => 'video/mp4'],
]" poster="/img/poster.jpg" />
```

### Muted autoplay (hero video)

```blade
<x-zk-video
    sources="/video/hero.mp4"
    autoplay
    loop
    muted
    :controls="false"
    class="hero-video" />
```

### With subtitles

```blade
<x-zk-video
    sources="/video/talk.mp4"
    :tracks="[
        ['src' => '/subtitles/en.vtt', 'kind' => 'subtitles', 'srclang' => 'en', 'label' => 'English', 'default' => true],
        ['src' => '/subtitles/fr.vtt', 'kind' => 'subtitles', 'srclang' => 'fr', 'label' => 'Français'],
    ]" />
```
