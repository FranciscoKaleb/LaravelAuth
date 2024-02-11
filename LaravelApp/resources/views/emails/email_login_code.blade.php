<!-- resources/views/emails/email_confirmation.blade.php -->

<p>Hello!</p>
<p>Your temporary log in code is: {{ $data['token'] }}</p>
<p>You can log in using this code, thank you!</p>