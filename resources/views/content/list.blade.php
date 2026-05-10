@props([
    'id' => null,
    'class' => null,
    'items' => [],
    'ordered' => false,
])

@php
    $tag = $ordered ? 'ol' : 'ul';
@endphp

<{{ $tag }} {{ $attributes->merge(['id' => $id, 'class' => $class])->filter(fn ($v) => ! is_null($v)) }}>
    @if ('' !== trim($slot))
        {{ $slot }}
    @else
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
                        :msr="$item['msr'] ?? null"
                        :iconBefore="$item['iconBefore'] ?? null"
                        :iconAfter="$item['iconAfter'] ?? null">
                        {{ $item['label'] }}
                    </x-content.link>
                @elseif ('button' === $item['type'])
                    <x-form.button
                        :type="$item['buttonType'] ?? 'button'"
                        :name="$item['name'] ?? null"
                        :value="$item['value'] ?? null"
                        :class="$item['class'] ?? null"
                        :disabled="$item['disabled'] ?? false"
                        :field="false">
                        {{ $item['label'] ?? '' }}
                    </x-form.button>
                @elseif ('form' === $item['type'])
                    <x-form.form
                        :route="$item['route'] ?? null"
                        :action="$item['action'] ?? null"
                        :method="$item['method'] ?? 'post'">
                        <x-form.submit>
                            {{ $item['label'] ?? '' }}
                        </x-form.submit>
                    </x-form.form>
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
                        {{ $item['label'] ?? '' }}
                    @elseif ('paragraph' === $item['type'])
                        <x-content.paragraph
                            :id="$item['id'] ?? null"
                            :class="$item['class'] ?? null">
                            {{ $item['label'] ?? '' }}
                        </x-content.paragraph>
                    @endif
                @endif

                {{-- Recursion for nested lists --}}
                @if (! empty($item['children']))
                    <x-content.list
                        :items="$item['children']['items'] ?? $item['children']"
                        :ordered="$item['children']['ordered'] ?? false" />
                @endif
            </li>
        @endforeach
    @endif
</{{ $tag }}>
