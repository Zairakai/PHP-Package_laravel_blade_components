@props([
    'id' => null,
    'route' => null,
    'routeParams' => [],
    'action' => null,
    'method' => null,
    'enctype' => null,
    'autocomplete' => null,
])

@php
    // Default to POST when a route name is provided — data-submitting forms are POST by convention.
    // Pass method="get" explicitly for search forms.
    if (is_null($method)) {
        $method = $route ? 'post' : 'get';
    }

    if (is_null($action) && $route) {
        $action = route($route, $routeParams);
    }

    if (is_null($enctype) && Str::contains($slot, 'type="file"')) {
        $enctype = 'multipart/form-data';
    }
@endphp

<form
    @if ($id) id="{{ $id }}" @endif
    action="{{ $action }}"
    @if (in_array(strtolower($method), ['get', 'post'])) method="{{ strtoupper($method) }}" @else method="POST" @endif
    @if($enctype) enctype="{{ $enctype }}" @endif
    @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif>
    @csrf
    @if (! in_array(strtolower($method), ['get', 'post']))
        @method(strtoupper($method))
    @endif

    {{ $slot }}
</form>
