<p>Hello, {{$user->name}} - {{ $user->surname }}</p>
<p>The test for the position of {{ $job->title }} has been assigned to you.</p>
<p>Details:</p>
<p><a href="{{\URL::to('/')}}">Link</a></p>
<p>Login: {{$user->login}}</p>
<p>Pasword: {{$user->login}}</p>
<p>Good Luck!</p>