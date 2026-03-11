@props([
    'id' => null,
    'class' => null,
    'items' => [],
    'ordered' => false,
])

@php
    $tag = $ordered ? 'ol' : 'ul';
@endphp

<{{ $tag }}
    @if($id) id="{{ $id }}" @endif
    @if($class) class="{{ $class }}" @endif>
    @foreach ($items as $item)
        <li>
            @if (in_array($item['type'], ['route', 'href']))
                <x-content.link
                    :route="$item['route'] ?? null"
                    :href="$item['href'] ?? null"
                    :target="$item['target'] ?? null"
                    :rel="$item['rel'] ?? null"
                    :id="$item['id'] ?? null"
                    :class="$item['class'] ?? null"
                    :title="$item['title'] ?? null"
                    :ariaLabel="$item['ariaLabel'] ?? null"
                    :download="$item['download'] ?? null"
                    :referrerpolicy="$item['referrerpolicy'] ?? null"
                    :hreflang="$item['hreflang'] ?? null"
                    :type="$item['type'] ?? null"
                    :msr="$item['msr'] ?? null"
                    :iconBefore="$item['iconBefore'] ?? null"
                    :iconAfter="$item['iconAfter'] ?? null">
                    {{ $item['label'] }}
                </x-content.link>
            @elseif (in_array($item['type'], ['icon', 'img']))
                @if ('icon' === $item['type'])
                    <x-content.msr>
                        {{ $item['icon'] }}
                    </x-content.msr>
                @elseif ('img' === $item['type'])
                    <x-medias.image
                        :src="$item['img'] ?? null"
                        :alt="$item['alt'] ?? null"
                        :id="$item['id'] ?? null"
                        :width="$item['width'] ?? null"
                        :height="$item['height'] ?? null"
                        :srcset="$item['srcset'] ?? null"
                        :sizes="$item['sizes'] ?? null"
                        :class="$item['class'] ?? null"
                        :crossorigin="$item['crossorigin'] ?? null"
                        :loading="$item['loading'] ?? null"
                        :longdesc="$item['longdesc'] ?? null"
                        :referrerpolicy="$item['referrerpolicy'] ?? null"
                        :ismap="$item['ismap'] ?? null"
                        :usemap="$item['usemap'] ?? null" />
                @endif
            @elseif (in_array($item['type'], ['text', 'paragraph']))
                @if ('text' === $item['type'])
                    {{ isset($item['label']) ? $item['label'] : '' }}
                @elseif ('paragraph' === $item['type'])
                    <x-content.paragraph
                        :id="$item['id'] ?? null"
                        :class="$item['class'] ?? null"></x-content.paragraph>
                @endif
            @endif

            {{-- Récursion pour les sous-éléments --}}
            @if (! empty($item['children']))
                <x-content.list
                    :items="$item['children']['children']"
                    :ordered="$item['children']['ordered']" />
            @endif
        </li>
    @endforeach
</{{ $tag }}>
