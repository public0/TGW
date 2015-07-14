<p>Hello, {{$user->name}} {{ $user->surname }}</p>
<p>The test(s) for the position of <b>{{ $job->title }}</b> are available here: <a href="{{\URL::to('/')}}">Link</a></p>
<p>Your login credentials are:<br />
User: {{$user->login}}<br />
Pasword: {{$user->login}}</p>
<p>If there is more than one test, once you finish the first test you will be directed to the next test and so on.</p>
<p>Good Luck!</p>
<p><b><i><small>This notification is automatically generated.<br />
Please do not reply to this email.</small></i></b></p>
