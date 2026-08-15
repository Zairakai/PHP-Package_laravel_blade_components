{{--
    Rendered separately from password.blade.php and passed as the iconAfter
    slot of x-form.input, so it lives inside [data-input] — scoped exactly to
    the input's own box, never affected by a validation message rendered
    below it at the x-form.field level.
--}}
<button
    type="button"
    data-toggle-visibility
    aria-label="{{ __('zairakai::layout.password.show') }}"
    data-label-show="{{ __('zairakai::layout.password.show') }}"
    data-label-hide="{{ __('zairakai::layout.password.hide') }}">
    <span data-icon-show>{!! $iconShow !!}</span>
    <span data-icon-hide hidden>{!! $iconHide !!}</span>
</button>
