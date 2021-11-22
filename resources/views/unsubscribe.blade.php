@extends('layouts.app')

@section('content')
<div class="row col-md-12" style="padding-top:50px">
    <div class="container">
    	<div class="col-md-3"></div>
   		<div class="location-right" style="padding-bottom:30px">
		    <div id="systemMessage_comment"></div>
		      <form method="post" id="submit_unsubscribe">

		      	<input type="email" placeholder="Enter E-mail Address" name="email" id="email" autocomplete="off" />

		      	<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">

                <div class="row col-md-12 form-group">
                    <button class="btn-u" id="unsubscribe_submit" type="submit">Unsubscribe</button>
                </div>
            </form>
		</div>
    </div>
</div>
<script>
    $('#submit_unsubscribe').submit(function(e){
		e.preventDefault();
		$('#submit_unsubscribe').validate(
		{
			rules:{
				email:{required:true,email:true}				
			},
			messages:{
				email:{
					required:"Email is required",
					email:"Please enter a valid email address",
				}
			}
		});
		if(!$('#submit_unsubscribe').valid()){
			return false;
		}
		else
		{
			$.ajax(
			{
				type:"POST",
				url:'/unsubscribe',
				data:$('#submit_unsubscribe').serialize(),
				dataType:'json',
				beforeSend:function(){
					$('#unsubscribe_submit').prop('disabled',true);
				},
				complete:function(){
					$('#unsubscribe_submit').prop('disabled',false);
				},
				success:function(response){
					$('#submit_unsubscribe')[0].reset();
					showSystemMessages('#systemMessage_comment',response.type,response.msg);
				}
			});
		}
	});
</script>
@endsection