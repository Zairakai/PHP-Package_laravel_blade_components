@props([
    'class' => null,
    'title' => 'Cookies',
    'categories' => [],
    'storageKey' => 'zk-consent',
    'acceptLabel' => 'Accept all',
    'rejectLabel' => 'Reject all',
    'customizeLabel' => 'Customize',
    'saveLabel' => 'Save my choices',
])

@php
    app(\Zairakai\LaravelBladeComponents\AssetRegistry::class)->script('consent');
    $titleId = 'cookie-banner-' . substr(md5($storageKey . $title), 0, 8);
@endphp

<div
    role="dialog"
    aria-modal="false"
    aria-labelledby="{{ $titleId }}"
    hidden
    data-zk-consent
    data-storage-key="{{ $storageKey }}"
    {{ $attributes->merge(['class' => trim('cookie-banner ' . $class)]) }}>
    <p id="{{ $titleId }}" class="cookie-banner-title">{{ $title }}</p>
    <div class="cookie-banner-text">{{ $slot }}</div>
    @if ([] !== $categories)
        <details class="cookie-banner-details">
            <summary>{{ $customizeLabel }}</summary>
            <fieldset class="cookie-banner-categories">
                <legend class="cookie-banner-legend">{{ $customizeLabel }}</legend>
                @foreach ($categories as $category)
                    <label class="cookie-banner-category">
                        <input type="checkbox" data-category="{{ $category['id'] }}" @checked(! empty($category['required'])) @disabled(! empty($category['required']))>
                        <span>{{ $category['label'] }}</span>
                        @if (! empty($category['description']))
                            <small>{{ $category['description'] }}</small>
                        @endif
                    </label>
                @endforeach
            </fieldset>
            <button type="button" class="cookie-banner-save" data-zk-consent-action="save">{{ $saveLabel }}</button>
        </details>
    @endif
    <div class="cookie-banner-actions">
        <button type="button" class="cookie-banner-reject" data-zk-consent-action="reject">{{ $rejectLabel }}</button>
        <button type="button" class="cookie-banner-accept" data-zk-consent-action="accept">{{ $acceptLabel }}</button>
    </div>
</div>
