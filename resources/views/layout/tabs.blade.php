@props([
    'class' => null,
    'tabs' => [],
])

@php
    $tabPrefix = uniqid('tab-');
    $navClass = trim('nav nav-tabs' . ($class ? ' ' . $class : ''));
@endphp

<div {{ $attributes }}>
    <ul class="{{ $navClass }}">
        @foreach ($tabs as $index => $tab)
            <li class="nav-item">
                <a
                    class="nav-link @if(0 === $index) active @endif"
                    data-bs-toggle="tab"
                    href="#{{ $tabPrefix }}-{{ $index }}">
                    {{ $tab['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach ($tabs as $index => $tab)
            <div
                id="{{ $tabPrefix }}-{{ $index }}"
                class="tab-pane fade @if(0 === $index) show active @endif">
                {{ $tab['content'] }}
            </div>
        @endforeach
    </div>
</div>
