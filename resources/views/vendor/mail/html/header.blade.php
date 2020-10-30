<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('image/logo.png') }}" class="logo" alt="Tikety Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
