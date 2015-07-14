<p>Hello, </p>
<p>The test(s) for the position of <b>{{ $job->title }}</b> has been finished by {{$candidate->name}} {{ $candidate->surname }} and the final score is available in Testing GW.</p>
<p>
<?php 
foreach($maxi as $max) {
	foreach ($max as $ma) {
		echo 'Test Name: '.$ma['quizz_name'].': '.$ma['rate'].'%<br />';
	}
}
?>
</p>
<p>Regards,<br />
Testing GW</p>
<p><b><i><small>This notification is automatically generated.<br />
Please do not reply to this email.</small></i></b></p>