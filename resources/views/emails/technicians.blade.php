<p>Hello, {{$technicians->name}} {{ $technicians->surname }}</p>
<p>The test <b>{{ $job_quizz->name }}</b> for the position of <b>{{ $job->title }}</b> has been finished by {{ $candidate->name }} {{ $candidate->surname }} and is awaiting your evaluation in Testing GW, or here: <a href="{{\URL::to('/')}}/results/{{ $candidate->id }}/{{ $assignement->id }}/{{ $job_quizz->id }}">Link</a></p>
<p>Regards,<br />
Testing GW</p>
<p><b><i><small>This notification is automatically generated.<br />
Please do not reply to this email.</small></i></b></p>