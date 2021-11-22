@extends('layouts.header')
@section('content')

<style>
    #suggestions {
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border: 1px solid black;

        background-color: white;
        font-size: 12px;
    }

    .option {
        display: none;
        color: '#000';
        cursor: pointer;
        padding: 10px;
    }

    #option-box {
        font-size: 15px;
    }

</style>
<div class="claiming-section" style="margin-top:50px">

    <div class="container">

        <div class="col-md-6 claiming-business-block">

            <h3>CLAIMING YOUR BUSINESS</h3>

            <p>
                By continuing, you agree to Fitnessity's <a href="#"> Terms of Service</a> and acknowledge Fitnessity's <a href="#">Privacy Policy</a>. You also represent that you have the authority to claim this account on behalf of this business.
            </p>

            <h5>How Would You Would Like to Verify?</h5>

            <div class="claiming-boxn">
                <h4><i class="fa fa-envelope" aria-hidden="true"></i> EMAIL ME</h4>
                <p>Fitnessity will send a verisication email to work email address below. Please check your email to verify.</p>
                <form>
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control" placeholder="email username">
                        <span>@gmail.com</span>
                    </div>
                    <input type="submit" value="Send" class="btnsend">
                </form>
            </div>

            <div class="claiming-boxn twon">
                <h4><i class="fa fa-mobile" aria-hidden="true"></i> TEXT ME</h4>
                <p>Fitnessity will send a 4-digit verisication code via SMS, You'll submit this code on the next screen.</p>
                <form>
                    <div class="form-group">
                        <span>Send text to:</span>
                        <input type="number" name="" id="" class="form-control" placeholder="555-555-5555">
                    </div>
                    <input type="submit" value="Send" class="btnsend">
                </form>
            </div>

            <div class="claiming-boxn twon">
                <h4><i class="fa fa-phone" aria-hidden="true"></i> CALL ME</h4>
                <p>Fitnessity will call you and a verisication code will be displayed on the next screen. Submit this code using your phone.</p>
                <form>
                    <div class="form-group">
                        <span>Call this number:</span>
                        <input type="number" name="" id="" class="form-control" placeholder="555-555-5555">
                    </div>
                    <input type="submit" value="Send" class="btnsend">
                </form>
            </div>

        </div>

        <div class="col-md-6 claiming-business-block-right">

            <p>
                Claim your business or create a new profile today for free! Update your profile so we can showcase what you do to everyone looking for your services.
            </p>

            <img src="{{ url('public/img/claim-d.jpg') }}">

        </div>

    </div>

</div>
@include('layouts.footer')

<script>
    $(document).ready(function () {

        $("document").on("click", "#makeloginpopup", function () {
            console.log("gggggg")
            $("#loginbtn").click();
        })

        $('#business_name').keyup(function () {
            $.ajax({
                url: '/get-my-location-business?location=' + $('#pac-input1').val() + '&business_name=' + $('#business_name').val(),
                type: 'GET',
                beforeSend: function () {
                    $('.loader').show();
                    //showSystemMessages('#systemMessage', 'info', 'Please wait while we create a company with Fitnessity.');
                },
                complete: function () {
                    // $('.loader').hide();ccccccc
                    // $('.s_form').prop('disabled', false);
                },
                success: function (response) {
                    $('.loader').hide();
                    showSystemMessages('#systemMessage', response.type, response.msg);
                    if (response.status == 200) {
                        var str = '';
                        var check = "{{Auth::check()}}";
                        if (check == false) {
                            str = str + '<div class="option topsec-opt" style="padding-left:10px;"><div class="col-sm-12 text-left"><span>My Business isn\'t here</span> <a  type="button" data-toggle="modal" data-target="#login_modal" href="/auth/jsModallogin" class="addnewclaim-btn" id="makeloginpopup">Add New</button></div></div><br/>';
                        }
                        if (response.search_data2.length != 0 && response.search_data.length != 0) {
                            response.search_data2.forEach(function (value, key) {
                                var mysrc = "{{Config::get('constants.USER_IMAGE_THUMB')}}"
                                str = str + '<div class="option" style="padding-left:10px;" onclick="setValueInput(\'' + value.business_name + ' ' + value.location + '\',' + value.id + ',\'claimed\');"><div class="col-sm-12 row"><div class="col-sm-2"><img src="' + mysrc + '/' + value.logo + '" style="width:30px;height:30px;" /></div><div>' + value.business_name + '&nbsp;' + value.location + '</div></div></div>';
                                if (key + 1 == response.search_data2.length) {
                                    response.search_data.forEach(function (value, key) {
                                        var mysrc = "{{Config::get('constants.FRONT_IMAGE')}}"
                                        str = str + '<div class="option" style="padding-left:10px;" onclick="setValueInput(\'' + value.business_name + ' ' + value.location + '\',' + value.id + ',\'unclaimed\');"><div class="col-sm-12 row"><div  class="col-sm-2"><img src="' + mysrc + '/business_large_square.png' + '" style="width:30px;height:30px;" /></div><div>' + value.business_name + '&nbsp;' + value.location + '</div></div></div>';
                                        if (key + 1 == response.search_data.length) {
                                            $('#option-box').empty();
                                            $('#option-box').append(str);
                                            $('.option').show()
                                        }
                                    })
                                }
                            })
                        } else {
                            response.search_data2.forEach(function (value, key) {
                                var mysrc = "{{Config::get('constants.USER_IMAGE_THUMB')}}"
                                str = str + '<div class="option" style="padding-left:10px;" onclick="setValueInput(\'' + value.business_name + ' ' + value.location + '\',' + value.id + ',\'claimed\');"><div class="col-sm-12 row"><div class="col-sm-2"><img src="' + mysrc + '/' + value.logo + '" style="width:30px;height:30px;" /></div><div>' + value.business_name + '&nbsp;' + value.location + '</div></div></div>';
                                if (key + 1 == response.search_data2.length) {
                                    $('#option-box').empty();
                                    $('#option-box').append(str);
                                    $('.option').show()
                                }
                            })
                            response.search_data.forEach(function (value, key) {
                                var mysrc = "{{Config::get('constants.FRONT_IMAGE')}}"
                                str = str + '<div class="option" style="padding-left:10px;" onclick="setValueInput(\'' + value.business_name + ' ' + value.location + '\',' + value.id + ',\'unclaimed\');"><div class="col-sm-12 row"><div  class="col-sm-2"><img src="' + mysrc + '/business_large_square.png' + '" style="width:30px;height:30px;" /></div><div>' + value.business_name + '&nbsp;' + value.location + '</div></div></div>';
                                if (key + 1 == response.search_data.length) {
                                    $('#option-box').empty();
                                    $('#option-box').append(str);
                                    $('.option').show()
                                }
                            })
                        }
                        //   response.search_data2.forEach(function(value,key){
                        //       var mysrc = "{{Config::get('constants.USER_IMAGE_THUMB')}}"
                        //       str=str+'<div class="option" style="padding-left:10px;" onclick="setValueInput(\''+value.business_name +' '+ value.location+'\','+value.id+',\'claimed\');"><div class="col-sm-12 text-left"><img src="'+mysrc+'/'+value.logo+'" style="width:30px;height:30px;" />&nbsp;'+value.business_name+'&nbsp;'+value.location+'</div></div>';
                        //       if(key+1 ==  response.search_data2.length){
                        //           if( response.search_data.length == 0)
                        //             $('#option-box').empty();
                        //           $('#option-box').append(str);
                        //           $('.option').show()
                        //       }
                        //   })

                        //   response.search_data.forEach(function(value,key){
                        //       str=str+'<div class="option" style="padding-left:10px;" onclick="setValueInput(\''+value.business_name +' '+ value.location+'\','+value.id+',\'unclaimed\');"><div class="col-sm-12 text-left"><i class="fa fa-building" style="color:red; aria-hidden="true"></i>&nbsp;'+value.business_name+'&nbsp;'+value.location+'</div></div>';
                        //       if(key+1 ==  response.search_data.length){

                        //           $('#option-box').empty();
                        //           $('#option-box').append(str);
                        //           $('.option').show()
                        //       }
                        //   })
                        //   response.search_data2.forEach(function(value,key){
                        //       var mysrc = "{{Config::get('constants.USER_IMAGE_THUMB')}}"
                        //       str=str+'<div class="option" style="padding-left:10px;" onclick="setValueInput(\''+value.business_name +' '+ value.location+'\','+value.id+',\'claimed\');"><div class="col-sm-12 text-left"><img src="'+mysrc+'/'+value.logo+'" style="width:30px;height:30px;" />&nbsp;'+value.business_name+'&nbsp;'+value.location+'</div></div>';
                        //       if(key+1 ==  response.search_data2.length){
                        //           if( response.search_data.length == 0)
                        //             $('#option-box').empty();
                        //           $('#option-box').append(str);
                        //           $('.option').show()
                        //       }
                        //   })
                    }
                }
            });


            // console.log("aaaaa")
            // $('.option').show()
        })
    })

</script>
<script>
    function setValueInput(setValueInput1, valueid, type) {

        if (type == 'unclaimed') {
            if ("{{Auth::check()}}") {
                document.getElementById('pac-input1').value = setValueInput1
                window.location.href = '/get-business-detail/' + valueid
            } else {
                console.log("1")
                localStorage.setItem('custom_url', '/get-business-detail/' + valueid);

                document.getElementById('login_modal').modal();
                return;
            }
        } else {
            if ("{{Auth::check()}}") {
                window.location.href = '/pcompany/view/' + valueid;
            } else {
                localStorage.setItem('custom_url', '/pcompany/view/' + valueid);
                document.getElementById('login_modal').modal();
                return;
            }
        }
    }

</script>
@endsection
