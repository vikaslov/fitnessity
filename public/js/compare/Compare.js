/// <reference path="jquery-1.12.3.js" />



(function ($) {

    var list = [];



    /* function to be executed when product is selected for comparision*/



    $(document).on('click', '.addToCompare', function () {

        $(".comparePanle").show();

        $(this).toggleClass("rotateBtn");

        $(this).parents(".selectProduct").toggleClass("selected");

        var productID = $(this).parents('.selectProduct').attr('data-title');



        var inArray = $.inArray(productID, list);

        if (inArray < 0) {

            if (list.length > 2) {

                $("#WarningModal").show();

                $("#warningModalClose").click(function () {

                    $("#WarningModal").hide();

                });

                $(this).toggleClass("rotateBtn");

                $(this).parents(".selectProduct").toggleClass("selected");

                return;

            }



            if (list.length < 3) {

                list.push(productID);



                var displayTitle = $(this).parents('.selectProduct').attr('data-name');



                // var image = $(this).siblings(".productImg").attr('src');

                var image = $(this).parents('.selectProduct').find(".productImg").attr('src');



                $(".comparePan").append('<div id="' + productID + '" class="relPos titleMargin w3-margin-bottom   w3-col l3 m4 s4"><div class="titleMargin"><a class="selectedItemCloseBtn w3-closebtn cursor">&times</a><img src="' + image + '" alt="image" style="height:100px;"/><p id="' + productID + '" class="topmargin10">' + displayTitle + '</p></div></div>');



                // change add to compare text

                $(this).addClass('active-link');

                $(this).html('Added to Compare');

                $(this).attr('title', 'Click here again to Remove from Compare');

            }

        } else {

            list.splice($.inArray(productID, list), 1);

            var prod = productID.replace(" ", "");

            $('#' + prod).remove();

            hideComparePanel();



            $(this).removeClass('active-link');

            $(this).html('+ Add to Compare');

            $(this).attr('title', 'Add to Compare');

            

        }

        if (list.length > 1) {

            $(".cmprBtn").addClass("active");

            $(".cmprBtn").removeAttr('disabled');

        } else {

            $(".cmprBtn").removeClass("active");

            $(".cmprBtn").attr('disabled', '');

        }



    });

    /*function to be executed when compare button is clicked*/

    $(document).on('click', '.cmprBtn', function () {

        if ($(".cmprBtn").hasClass("active")) {

            /* this is to print the  features list statically*/

            // $(".contentPop").append(

            //     '<div class="w3-col s3 m3 l3 compareItemParent relPos">' 

            //     + '<ul class="product">' 

            //     + ' <li class=" relPos compHeader"><p class="w3-display-middle">Features</p></li>' 

            //     + ' <li>&nbsp;</li>'

            //     + ' <li>Name</li>' 

            //     + ' <li>Company Name</li>' 

            //     + ' <li>Professional Type</li>' 

            //     + ' <li>Email</li>' 

            //     + ' <li>State</li>' 

            //     + ' <li>Experience Level</li>'

            //     + ' <li>Provides training to</li>'

            //     + ' <li>Personality</li>'

            //     + ' <li>Sports</li>'

            //     + ' <li>Certifications</li>'

            //     + ' <li>Services Offers</li>'

            //     + ' <li>Availability</li>'

            //     + ' <li>Willing To Travel</li>'

            //     // + ' <li>Travel Miles</li>'                

            //     + '</ul>' 

            //     + '</div>');

            //$(".contentPop").append('<table compareItemParent relPos">');

            var imagtd = "";

            var bookinglink = "";

            var nametd = "";

            var companytd = "";
            var companyvertd = "";

            var proftype = "";

            var emailtd = "";

            var statetd = "";

            var exptd = "";

            var traintd = "";

            var personalitytd = "";

            var sporttd = "";

            var certitd = "";

            var servicetd = "";

            var availtd = "";

            var travel = "";



            //get profile detail

            var professional_ids = new Array();

            for (var i = 0; i < list.length; i++) {

                product = $('.selectProduct[data-title="' + list[i] + '"]');

                professional_ids[i] = $(product).data('id');

            }

            var professional_ids_str = professional_ids.join(",");



            $.ajax({

                  url:'direct-hire/getCompareProfessionalDetail/'+professional_ids_str,

                  type:'GET',

                  dataType: 'json',

                  beforeSend: function () {

                  },

                  complete: function () {

                  },

                  success: function (response) {
                    $('.contentPop').empty();

                    var tablecolumn = parseInt(list.length);

                    var columnwidth = (85 / parseInt(tablecolumn)).toFixed(2);

                    for (var i = 0; i < list.length; i++) {

                        /* this is to add the items to popup which are selected for comparision */
                        if(list.length == 2)
                            var w = 42.5
                          else
                            var w = 28.33
                        product = $('.selectProduct[data-title="' + list[i] + '"]');

                        var profile_detail = response.data['profile_'+$(product).data('id')];

                        var image = $('.selectProduct[data-title="' + list[i] + '"]').find(".productImg").attr('src');

                        var name = $('.selectProduct[data-title="' + list[i] + '"]').attr('data-id');

                        /*appending to div*/

                        // var html = '<div class="w3-col s3 m3 l3 compareItemParent relPos">' 

                        //     + '<ul class="product">' 

                        //     + ' <li class="compHeader"><img src="' + image + '" class="compareThumb">' + '</li>' 

                        //     + ' <li>' + '<a href="/directhire/bookprofile/'+$(product).data('id')+'" class="book-professional-link">BOOK THIS PROFESSIONAL</a>' + '</li>'

                        //     + ' <li>' + $(product).data('name') + ' ('+ $(product).data('gender') +')' + '</li>' 

                        //     + ' <li>' + $(product).data('companyname') + '</li>' 

                        //     + ' <li>' + profile_detail.professional_type + '</li>' 

                        //     + ' <li>' + $(product).data('email') 

                        //     + ' <li>' + $(product).data('address') + '</li>' 

                        //     + ' <li>' + profile_detail.explevel + '</li>'

                        //     + ' <li>' + profile_detail.train_to + '</li>'

                        //     + ' <li>' + profile_detail.personality + '</li>'

                        //     + ' <li>' + profile_detail.sport + '</li>'

                        //     + ' <li>' + profile_detail.certification + '</li>'

                        //     + ' <li>' + profile_detail.service + '</li>'

                        //     + ' <li>' + profile_detail.availability + '</li>'



                        //     + ' <li>' + profile_detail.willing_to_travel;

                            // + ' <li>' + profile_detail.travel_miles + '</li>'

                        // if(profile_detail.willing_to_travel == "Yes")

                        //     html += ', ' + profile_detail.travel_miles + ' Miles';



                        // html += '</li>';

                        // html +=  '</ul>' 

                        //     + '</div>';



                        //$(".contentPop").append(html);

                        // <a href="/directhire/bookprofile/'+$(product).data('id')+'" class="book-professional-link">BOOK THIS PROFESSIONAL</a>

                        imagtd += ' <td style="width:' + w + '%" class="compHeader"><img src="' + image + '" class="compareThumb"></td>' ;

                        bookinglink += '<td class="booking_btn">' + '<button type="button" class="btn btn-info btn-lg header-right-menu" href="/directhire/bookprofile/'+$(product).data('id')+'"> BOOK AN ACTIVITY <i class="fa fa-angle-right"></i></button>' + '</td>'; 

                        nametd += ' <td>' + $(product).data('name') + '</td>';
                        //nametd += ' <td> Company Rep </td>';
                        companyvertd+= '<td>Yes</td>'

                        companytd += ' <td>' + profile_detail.company_names + '</td>' ;

                        proftype += '<td>' + profile_detail.professional_type + '</td>'; 

                        emailtd += ' <td>' + $(product).data('email') + '</td>';

                        statetd += ' <td>' + $(product).data('address').replaceAll('_',' ') + '</td>'; 
                    var ex= '';
                    if(profile_detail.explevel != '-'){
                    for (var key in profile_detail.explevel) {
                        ex = ex+profile_detail.explevel[key];
                        if (key !=  (Object.keys(profile_detail.explevel).length-1)) {
                            ex = ex+', ';
                            //console.log(key + " -> " + p[key]);
                        }
                    }
                    }
                    else{
                        ex= '-';
                    }
                    var tt= '';
                    if(profile_detail.train_to != '-'){
                    for (var key in profile_detail.train_to) {
                        tt = tt+profile_detail.train_to[key];
                        if (key !=  (Object.keys(profile_detail.train_to).length-1)) {
                            tt = tt+', ';
                            //console.log(key + " -> " + p[key]);
                        }
                    }
                    }
                    else{
                        tt= '-';
                    }
                    var pp= '';
                    if(profile_detail.personality != '-'){
                    for (var key in profile_detail.personality) {
                        pp = pp+profile_detail.personality[key];
                        if (key !=  (Object.keys(profile_detail.personality).length-1)) {
                            pp = pp+', ';
                            //console.log(key + " -> " + p[key]);
                        }
                    }
                    }
                    else{
                        pp= '-';
                    }
                        exptd += ' <td>' + ex.replaceAll('_',' ') + '</td>';

                        traintd += ' <td>' + tt.replaceAll('_',' ') + '</td>';

                        personalitytd += ' <td>' + pp.replaceAll('_',' ') + '</td>';

                        sporttd += ' <td>' + profile_detail.sport.replaceAll('_',' ') + '</td>';

                        certitd += ' <td>' + profile_detail.certification.replaceAll('_',' ') + '</td>';

                        servicetd += ' <td>' + profile_detail.service + '</td>';
    if(profile_detail.availability != '-'){
    var ret1 = '<table><tr><td>Day</td><td>Start Time</td><td>End Time</td></tr><tr><td>Sunday</td><td>'+profile_detail.availability.sunday_start+'</td><td>'+profile_detail.availability.sunday_end+'</td></tr><tr><td>Monday</td><td>'+profile_detail.availability.monday_start+'</td><td>'+profile_detail.availability.monday_end+'</td></tr><tr><td>Tuesday</td><td>'+profile_detail.availability.tuesday_start+'</td><td>'+profile_detail.availability.tuesday_end+'</td></tr><tr><td>Wednesday</td><td>'+profile_detail.availability.wednesday_start+'</td><td>'+profile_detail.availability.wednesday_end+'</td></tr><tr><td>Thrusday</td><td>'+profile_detail.availability.thrusday_start+'</td><td>'+profile_detail.availability.thrusday_end+'</td></tr><tr><td>Friday</td><td>'+profile_detail.availability.friday_start+'</td><td>'+profile_detail.availability.friday_end+'</td></tr><tr><td>Saturday</td><td>'+profile_detail.availability.saturday_start+'</td><td>'+profile_detail.availability.saturday_end+'</td></tr></table>'
    }
    else{
        var ret1 = '-'
    }
    
    
    
    
                        availtd += ' <td>' + ret1 + '</td>';

                        travel += '<td>' + profile_detail.willing_to_travel;

                        if(profile_detail.willing_to_travel == "Yes")

                            travel += ', ' + profile_detail.travel_miles + ' Miles';

                        travel += '</td>';

                        

                    }



                    $(".contentPop").append('<table class="compareItemParent relPos comparetable" border="1">'

                        + '<tr class="d_none"><th width="15%">&nbsp;</th><th width="'+columnwidth+'%">&nbsp;</th><th width="'+columnwidth+'%">&nbsp;</th></tr>'

                        + '<tr>' + '<td class="bg_color">Features</td>' + imagtd + '</tr>'

                        + '<tr>' + '<td  class="bg_color">&nbsp;</td>' + bookinglink + '</tr>'

                        + '<tr>' + '<td class="bg_color">Name</td>' + nametd + '</tr>'

                        + '<tr>' + '<td class="bg_color">Company Name</td>' + companytd + '</tr>'
                        
                        + '<tr>' + '<td class="bg_color">Business Verification</td>' + companyvertd + '</tr>'

                        // + '<tr>' + '<td class="bg_color">Email</td>' + emailtd + '</tr>'

                        + '<tr>' + '<td class="bg_color">State</td>' + statetd + '</tr>'

                        + '<tr>' + '<td class="bg_color">Experience Level</td>' + exptd + '</tr>'

                        + '<tr>' + '<td class="bg_color">Provides training to</td>' + traintd + '</tr>'

                        + '<tr>' + '<td class="bg_color">Personality</td>' + personalitytd + '</tr>'

                        + '<tr>' + '<td class="bg_color">Sports</td>' + sporttd + '</tr>'

                        + '<tr>' + '<td class="bg_color">Certifications</td>' + certitd + '</tr>'

                        + '<tr>' + '<td class="bg_color">Services Offers</td>' + servicetd + '</tr>'

                        // + '<tr>' + '<td class="bg_color">Availability</td>' + availtd + '</tr>'

                        + '<tr>' + '<td class="bg_color">Hours of Operations</td>' + availtd + '</tr>'

                        + '</table>');

                  }

            });



            // for (var i = 0; i < list.length; i++) {

            //     /* this is to add the items to popup which are selected for comparision */

            //     product = $('.selectProduct[data-title="' + list[i] + '"]');

            //     var image = $('[data-title=' + list[i] + ']').find(".productImg").attr('src');

            //     var name = $('[data-title=' + list[i] + ']').attr('data-id');

            //     /*appending to div*/

            //     $(".contentPop").append(

            //         '<div class="w3-col s3 m3 l3 compareItemParent relPos">' 

            //         + '<ul class="product">' 

            //         + ' <li class="compHeader"><img src="' + image + '" class="compareThumb"></li>' 

            //         + ' <li>' + $(product).data('name') + '('+ $(product).data('companyname') +')' + '</li>' 

            //         + ' <li>' + $(product).data('companyname') + '</li>' 

            //         + ' <li>' + $(product).data('email') 

            //         + ' <li>' + $(product).data('address') + '</li>' 

            //         + ' <li>' + $(product).data('explevel') + '</li>'

            //         + ' <li>' + $(product).data('trainingto') + '</li>'

            //         + ' <li>' + $(product).data('availability') + '</li>'

            //         + ' <li>' + $(product).data('services') + '</li>'

            //         + '</ul>' 

            //         + '</div>');

            // }

        }

        $(".modPos").show();

    });



    /* function to close the comparision popup */

    $(document).on('click', '.closeBtn', function () {

        $(".contentPop").empty();

        $(".comparePan").empty();

        $(".comparePanle").hide();

        $(".modPos").hide();

        $(".selectProduct").removeClass("selected");

        $(".cmprBtn").attr('disabled', '');

        list.length = 0;

        $(".rotateBtn").toggleClass("rotateBtn");



        $('.addToCompare').removeClass('active-link');

        $('.addToCompare').html('+ Add to Compare');

        $('.addToCompare').attr('title', 'Add to Compare');

    });



    /*function to remove item from preview panel*/

    $(document).on('click', '.selectedItemCloseBtn', function () {



        var test = $(this).siblings("p").attr('id');

        $('[data-title=' + test + ']').find(".addToCompare").click();

        hideComparePanel();

    });



    function hideComparePanel() {

        if (!list.length) {

            $(".comparePan").empty();

            $(".comparePanle").hide();

        }

    }

})(jQuery);