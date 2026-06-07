@php
    $honeypotField = \App\Support\Honeypot::fieldName();
    $honeypotTimeField = \App\Support\Honeypot::timeFieldName();
    $honeypotStartedAt = \App\Support\Honeypot::startedAt();
@endphp

<div
    aria-hidden="true"
    style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;opacity:0;pointer-events:none"
>
    <label for="{{ $honeypotField }}">Leave this field empty</label>
    <input id="{{ $honeypotField }}" name="{{ $honeypotField }}" type="text" value="" tabindex="-1" autocomplete="off">
    <input id="{{ $honeypotTimeField }}" name="{{ $honeypotTimeField }}" type="text" value="{{ $honeypotStartedAt }}" tabindex="-1" autocomplete="off">
</div>
