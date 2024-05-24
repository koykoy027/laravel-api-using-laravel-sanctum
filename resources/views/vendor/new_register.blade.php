@component('mail::message')

<h1>Welcome {{ $firstname }}!</h1>
<p>Your account has been successfully created</p>
<p>Sign in your account using this credentials</p>

<p>
    Email:
    <br>
    <strong>{{ $email }}</strong>
</p>
<p>
    Password: 
    <br>
    <strong>{{ $password }}</strong>
</p>

@component('mail::button', ['url' => 'https://github.com/koykoy027?email=' . $email, 'color' => 'primary'])
Login here
@endcomponent

<h1>If this wasn't you</h1>
<p>Rest assured, no action is needed at the moment as your email still requires verification. Additionally, please remember not to share any OTPs you may receive with anyone.</p>

@component('mail::subcopy')
<p>This notification has been sent to the email address associated with your {{ config('app.name') }} account.</p>
<p>This email message was auto-generated. Please do not respond. If you need additional help, please visit {{ config('app.name') }} Support.</p>
@endcomponent


@component('mail::panel')
<p>Thanks,</p>
<p>{{ config('app.name') }} Team</p>
@endcomponent

@endcomponent