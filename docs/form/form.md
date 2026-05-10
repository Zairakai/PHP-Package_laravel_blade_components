---
component: zk-form
family: form
alias: x-zk-form
internal: x-form.form
---

# zk-form

> Renders a `<form>` with automatic CSRF token, HTTP method spoofing, and multipart detection.

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `route` | `string\|null` | `null` | Laravel route name — generates `action` |
| `routeParams` | `array` | `[]` | Parameters passed to `route()` |
| `action` | `string\|null` | `null` | Explicit action URL — takes precedence over `route` |
| `method` | `string\|null` | `null` | HTTP method. Defaults to `POST` when `route` is set, `GET` otherwise |
| `enctype` | `string\|null` | `null` | Encoding type — auto-set to `multipart/form-data` when a file input is detected in the slot |
| `autocomplete` | `string\|null` | `null` | `autocomplete` attribute (`on` / `off`) |
| `id` | `string\|null` | `null` | HTML `id` attribute |

## Examples

### POST form via route name

```blade
<x-zk-form route="user.update" :routeParams="['user' => $user]">
    <x-zk-input name="name" label="Name" :value="$user->name" />
    <x-zk-submit>Save</x-zk-submit>
</x-zk-form>
```

### DELETE action

```blade
<x-zk-form route="post.destroy" :routeParams="['post' => $post]" method="delete">
    <x-zk-submit>Delete</x-zk-submit>
</x-zk-form>
```

### GET search form

```blade
<x-zk-form route="search" method="get">
    <x-zk-input name="q" :field="false" placeholder="Search..." />
    <x-zk-submit>Search</x-zk-submit>
</x-zk-form>
```

### File upload (enctype auto-detected)

```blade
<x-zk-form route="avatar.update">
    <x-zk-file name="avatar" label="Profile picture" />
    <x-zk-submit>Upload</x-zk-submit>
</x-zk-form>
{{-- enctype="multipart/form-data" is added automatically --}}
```

## Notes

- `@csrf` is always injected automatically.
- Non-standard HTTP methods (`PUT`, `PATCH`, `DELETE`) inject `@method(...)` automatically.
- `enctype` auto-detection checks the slot content for `type="file"`.
