<tr>
<td class="header">
    <a href="{{ $url }}">
        <img class="logo" src="{{$img}}">
    </a>
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</td>
</tr>
