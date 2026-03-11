@props([
    'id' => null,
    'route' => null,
    'action' => null,
    'method' => null,
    'enctype' => null,
    'autocomplete' => null,
])

@php
    if (is_null($method) && $route) {
        $routeInfo = Route::getRoutes()->getByName($route);
        $method = $routeInfo ? strtolower($routeInfo->methods()[0]) : 'post';
    }

    if (is_null($action) && $route) {
        $action = route($route);
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
