# Form

Form controls, wrappers, and validation support.

## Architecture

```
zk-form                  ← <form> wrapper (CSRF, method spoofing, enctype auto-detection)
  zk-fieldset            ← <fieldset> + optional <legend>
    zk-input             ← base input — all typed inputs delegate to this
    zk-textarea          ← <textarea>
    zk-select            ← <select> with optgroup support
    zk-checkbox          ← <input type="checkbox">
    zk-switch            ← styled checkbox (delegates to zk-checkbox)
    zk-password          ← <input type="password"> with optional show/hide toggle
    zk-button            ← <button>
    zk-submit            ← <button type="submit"> (delegates to zk-button)
    zk-reset             ← <button type="reset"> (delegates to zk-button)
  zk-field               ← field wrapper (.field div + error class)
  zk-label               ← <label> with icon/prefix/suffix support
  zk-additional          ← supporting text + character counter
  zk-hidden              ← <input type="hidden"> (no field wrapper)
  zk-datalist            ← <datalist> element
```

## Typed Input Shorthands

These components are thin wrappers around `zk-input` with `type` pre-set. They accept all `zk-input` props.

| Component | Type | Notes |
| --------- | ---- | ----- |
| [color](./color.md) | `color` | |
| [date](./date.md) | `date` | |
| [datetime](./datetime.md) | `datetime-local` | |
| [email](./email.md) | `email` | Adds browser-side `pattern` from config |
| [file](./file.md) | `file` | |
| [month](./month.md) | `month` | |
| [number](./number.md) | `number` | |
| [range](./range.md) | `range` | |
| [search](./search.md) | `search` | |
| [tel](./tel.md) | `tel` | |
| [time](./time.md) | `time` | |
| [url](./url.md) | `url` | |
| [week](./week.md) | `week` | |

## All Components

| Component | Alias | Description |
| --------- | ----- | ----------- |
| [additional](./additional.md) | — | Supporting text and character counter |
| [button](./button.md) | `x-zk-button` | `<button>` element |
| [checkbox](./checkbox.md) | `x-zk-checkbox` | `<input type="checkbox">` |
| [color](./color.md) | `x-zk-color` | `<input type="color">` |
| [datalist](./datalist.md) | `x-zk-datalist` | `<datalist>` element |
| [date](./date.md) | `x-zk-date` | `<input type="date">` |
| [datetime](./datetime.md) | `x-zk-datetime` | `<input type="datetime-local">` |
| [email](./email.md) | `x-zk-email` | `<input type="email">` |
| [field](./field.md) | — | Field wrapper div with error support |
| [fieldset](./fieldset.md) | `x-zk-fieldset` | `<fieldset>` + legend |
| [file](./file.md) | `x-zk-file` | `<input type="file">` |
| [form](./form.md) | `x-zk-form` | `<form>` with CSRF and method spoofing |
| [hidden](./hidden.md) | `x-zk-hidden` | `<input type="hidden">` |
| [input](./input.md) | `x-zk-input` | Base input — all types |
| [label](./label.md) | — | `<label>` with icon/prefix/suffix |
| [month](./month.md) | `x-zk-month` | `<input type="month">` |
| [number](./number.md) | `x-zk-number` | `<input type="number">` |
| [password](./password.md) | `x-zk-password` | `<input type="password">` with toggle |
| [radio](./radio.md) | `x-zk-radio` | `<input type="radio">` |
| [range](./range.md) | `x-zk-range` | `<input type="range">` |
| [reset](./reset.md) | `x-zk-reset` | `<button type="reset">` |
| [search](./search.md) | `x-zk-search` | `<input type="search">` |
| [select](./select.md) | `x-zk-select` | `<select>` with optgroup support |
| [submit](./submit.md) | `x-zk-submit` | `<button type="submit">` |
| [switch](./switch.md) | `x-zk-switch` | Styled checkbox |
| [tel](./tel.md) | `x-zk-tel` | `<input type="tel">` |
| [textarea](./textarea.md) | `x-zk-textarea` | `<textarea>` |
| [time](./time.md) | `x-zk-time` | `<input type="time">` |
| [url](./url.md) | `x-zk-url` | `<input type="url">` |
| [week](./week.md) | `x-zk-week` | `<input type="week">` |
