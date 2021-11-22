<div id="buisnessuser">
    <ul id="">
        @if(count($AllProfessionals) > 0)
        <?php $i = 0; ?>
        @foreach($AllProfessionals as $professional)
        <?php 
        $id = $professional_id = $fav_user_id = $firstname = $lastname = $company_name = $gender = $email = $profile_pic = $states = $user_sports = $zipcode = "";
        if(isset($professional['id']) && !empty($professional['id'])) {
            $id = $professional['id'];
        }
        if(isset($professional['professional_id']) && !empty($professional['professional_id'])) {
            $professional_id = $professional['professional_id'];
        }
        if(isset($professional['fav_user_id']) && !empty($professional['fav_user_id'])) {
            $fav_user_id = $professional['fav_user_id'];
        }
        if(isset($professional['firstname']) && !empty($professional['firstname'])) {
            $firstname = $professional['firstname'];
        }
        if(isset($professional['lastname']) && !empty($professional['lastname'])) {
            $lastname = $professional['lastname'];
        }
        if(isset($professional['company_name']) && !empty($professional['company_name'])) {
            $company_name = $professional['company_name'];
        }
        if(isset($professional['gender']) && !empty($professional['gender'])) {
            $gender = $professional['gender'];
        }
        if(isset($professional['email']) && !empty($professional['email'])) {
            $email = $professional['email'];
        }
        if(isset($professional['profile_pic']) && !empty($professional['profile_pic'])) {
            $profile_pic = $professional['profile_pic'];
        }
        if(isset($professional['states']['state_name']) && !empty($professional['states']['state_name'])) {
            $states = $professional['states']['state_name'];
        }
        if(isset($professional['user_sports']) && !empty($professional['user_sports'])) {
            $user_sports = $professional['user_sports'];
        }
        if(isset($professional['zipcode']) && !empty($professional['zipcode'])) {
            $zipcode = $professional['zipcode'];
        }
        $i++; 
        ?>
        <li class="product selectProduct" data-id="{{ $id }}" data-title="{{ $firstname }}{{ $id }}"  data-name="{{ $firstname }} {{ $lastname }}" data-companyname="{{ $company_name }}" data-gender="{{ $gender }}" data-email="{{ $email }}" data-address="{{ $states }}">
            <div class="direc-right-listdiv">
                <a href="#">
                    @if($profile_pic != '' && file_exists(public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'profile_pic'.DIRECTORY_SEPARATOR.'thumb'.DIRECTORY_SEPARATOR.$profile_pic))
                    <img src="<?php echo Config::get('constants.USER_IMAGE_THUMB') . $profile_pic ?>" class="productImg"/>
                    @else
                    <img src="<?php echo Config::get('constants.FRONT_IMAGE') . 'user.png' ?>" class="productImg"/>
                    @endif
                </a>
                <div class="direc-list-name">
                    <p>{{ $company_name }}</p> 
                    <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>18</a>
                </div>
                <div class="direc-list-detail">
                    <p> @if($user_sports != '')
                        <?php
                        $user_sport = explode(",", $user_sports);
                        $user_sports = str_replace(",", " ", $user_sports);
                        $sports_title = '';
                        foreach ($user_sport as $key => $value) {
                            $sports_title .= @$sport_names[$value] . ' ';
                        }
                        $count = 2;
                        if (count($user_sport) < 2)
                            $count = count($user_sport);
                        ?>
                        <span title="{{ $sports_title }}" style="float:left;">
                            <i class="fa fa-futbol-o" aria-hidden="true" ></i>
                            @for($i=0; $i<$count; $i++)
                            {{ @$sport_names[$user_sport[$i]] }}
                            @endfor
                            @if(count($user_sport)>$count)
                            ...
                            @endif
                        </span>
                        @else
                        <i class="fa fa-futbol-o" aria-hidden="true" ></i>
                        @endif
                        <span> <i class="fa fa-map-marker" aria-hidden="true"></i>
                            {{ $states }} {{ $zipcode }} </span>
                    </p>
                </div>
                <a href="/directhire/viewprofile/{{ $professional_id }}" class="view-more-right">VIEW MORE                            
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
                <span id="userFavourite_{{ $professional_id }}" style="padding-left: 25px;">
                    @if(@$professional_id == @$fav_user_id)
                    <a onclick="favourite({{ $professional_id }}, 'unfavourite');" class="removefavourite_{{ $professional_id }}" ><i class="fa fa-star fav-star"></i></a>
                    @else
                    &nbsp;<a onclick="favourite({{ $professional_id }}, 'favourite');" class="makefavourite_{{ $professional_id }}"><i class="fa fa-star-o unfav-star"></i></a>
                    @endif
                </span>
            </div>
            <a class="addToCompare" title="Add to Compare">+ Add to Compare</a>
        </li>
        @endforeach
        @else
        No Record Found
        @endif
    </ul>
    <br/>
    <div class="pagination_div" style="position: relative;">
        {!! $AllProfessionals->render() !!}
        <div>
            <div>
<style>
    ul.pagination li {
        padding: 0;
    }
</style>
<script>
    $(document).ready(function(){
        $('.pagination li a').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var form = $("form#frmsearchCategory").serialize();
            $.ajax({
                url:url,
                type:'POST',
                headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}',
                },
                data: {
                "_token": '{{csrf_token()}}',
                        data : form
                },
                success:function(response){

                $('.direc-right div#buisnessuser').empty();
                $('.direc-right div#buisnessuser').html(response);
                }
            });
        });
    });
</script>