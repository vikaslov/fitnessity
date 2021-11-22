@include('emails.header')
	Hello {!! $user->firstname !!} {!! $user->lastname !!}, 
	<br><br>

	Welcome to Fitnessity !!<br><br>

	Your email address verified successfully.<br><br>
	
	<a href="{!! url('/') !!}">Click here</a> to login to Fitnessity.

@include('emails.footer')