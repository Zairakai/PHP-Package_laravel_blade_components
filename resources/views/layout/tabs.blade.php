@props([
    'class' => null,
    'tabs' => [],
])

<div {{ $attributes }}>
    <ul class="nav nav-tabs @if($class) {{ $class }} @endif">
        @foreach ($tabs as $index => $tab)
            <li class="nav-item">
                <a
                    class="nav-link @if(0 === $index) active @endif"
                    data-bs-toggle="tab"
                    href="#tab{{ $index }}">
                    {{ $tab['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach ($tabs as $index => $tab)
            <div
                id="tab{{ $index }}"
                class="tab-pane fade @if(0 === $index) show active @endif">
                {{ $tab['content'] }}
            </div>
        @endforeach
    </div>
</div>
