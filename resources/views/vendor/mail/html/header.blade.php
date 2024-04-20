<tr>
<td class="header">
<a href="{{ env("url") }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://edupass.vagary.tech/public/assets/Logo/edupass_logo.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
