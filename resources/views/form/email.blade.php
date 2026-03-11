@props([
    'pattern' => config('blade-components.email.pattern', '[^@]+@[^@]+\.[a-zA-Z]{2,}'),
])

<x-form.input
    type="email"
    pattern="{!! $pattern !!}"
    :attributes="$attributes" />
