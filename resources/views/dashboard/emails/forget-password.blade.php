@component('mail::message')
# Hi, {{ $admin['name'] }}

You request to reset your password password 

@component('mail::button', ['url' => route('dashboard.reset-password',$token)])
 Go To Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
