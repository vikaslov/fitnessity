@extends('admin.layouts.layout')



@section('content')

<style>
/* Absolute Center Spinner */
.loader {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: visible;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loader:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.loader:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loader:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>


<div class="loader" style="display:none;"></div>

     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Upload File for Business Claim</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <label>Choose File: </label>
            <input type="file" name="file" id="file" onchange="readURL(this)" />
            <p class='err' style="color:red;padding-top:10px;"></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="upload-csv" class="btn btn-primary">Upload File</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModal2Label">Repeated Data</h4>
        
      </div>
      <div class="modal-body" style=" height: 65vh;overflow-y: auto;">
        <table id="myTable" class="table">
            
        </table>
        <p id="myp"></p>
        <table id="myTable2" class="table">
            
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        <!--<button type="button" id="ignore-csv" class="btn btn-secondary" data-dismiss="modal">Add New</button>-->
        <button type="button" id="replace-csv" class="btn btn-primary">Replace</button>
      </div>
    </div>
  </div>
</div>

    <div id="systemMessage"></div>

    <p>

        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-success">Upload CSV</a>

    </p>



    <div class="panel panel-default">



        <div class="panel-heading">

            
             <div class="row">

            List of Business

             <div class="col-md-2" style="float:right;">

              <input type="text" name="filter-title" id="filter-title" placeholder="Search" class="form-control">

            </div>

          </div>

        </div>

        <div class="panel-body">

          <!--<div class="row">-->

            

          <!--   <div class="col-md-2" style="float:right;">-->

              <!--<input type="text" name="filter-title" id="filter-title" placeholder="Search by Name" class="form-control">-->

          <!--  </div>-->

          <!--</div>-->

        </div>

        <div class="panel-body">

        

            <div class="table-responsive">
              <table id="plan_list" class="table table-bordered table-striped {{ count($claims) > 0 ? 'datatable' : '' }} table-hover ">

                <thead>

                    <tr>

                      <th><input type="checkbox" id="checkAll"></th>

                      <th>Business Name</th>

                      <th>Activity</th>

                      <th>Location</th>

                      <th>Website</th>

                      <th>Phone Number</th>

                      <th>Address</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>

                </thead>

                

                <tbody>

                    @if (count($claims) > 0)

                    <?php $i = 0 ?>

                        @foreach ($claims as $value)

                          <?php $i++ ?>

                            <tr id="item-{!! $value->id !!}">

                                <td><input type="checkbox" name="planIds[]" value="{{$value->id}}"></td>



                            

                  <td>{{ $value->business_name}}</td>

                  <td>{{ $value->activity}}</td>

                  <td>{{ $value->location}}</td>
                  <td>{{ $value->website}}</td>
                  <td>{{ $value->phone}}</td>
                  <td>{{ $value->address}}</td>
                  <td>@if($value->is_verified == 1) Verfied @else Unclaimed @endif</td>
                  <td><a href="{{route('claim_delete',['id'=>$value->id])}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>

                        @endforeach

                    @else

                        <tr>

                            <td colspan="8">no record found</td>

                        </tr>

                    @endif

                </tbody>



                <!-- <tfoot>-->

                <!--    <th>-->

                <!--    <button type="submit" id="submit_delete_plans" name="submit_delete_plans" class="btn btn-danger btn-xs" title="Deactivate Selected Plans" onclick="return confirm('Do you really want to deactivate selected Plans?');" value="1"><i class="fa fa-ban" aria-hidden="true"></i></button>-->

                <!--    </th>-->

                <!--    <th colspan="6"></th>-->

                <!--</tfoot>-->

            </table>
            </div>


        </div>

    </div>

<input type="hidden" id="ajaxToken" name="_token" value="{{ csrf_token() }}">
<script>
var profile_pic_var = '';
        var ext = '';
    function readURL(input) {
      //  $('.err').html('')
        //console.log("FFFffff")
        if (input.files && input.files[0]) {
            
            const name = input.files[0].name;
  const lastDot = name.lastIndexOf('.');

  const fileName = name.substring(0, lastDot);
   ext = name.substring(lastDot + 1);
            //console.log(ext)
            
            var reader = new FileReader();

            reader.onload = function (e) {
                
            };
            profile_pic_var = input.files[0];
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    
</script>
<script>
    $(document).ready(function(){
        
        console.log('called')
        var repeat_data1;
         $('#ignore-csv').click(function(){
             myData("ignore")
         })
         
         $('#replace-csv').click(function(){
             myData("replace")
         })
         
         function myData(val){
              var formdata = new FormData();
              console.log($('input[name="selected_ids"]:checked'))
              var searchIDs = $("#myTable input:checkbox:checked").map(function(){
      return $(this).val();
    }).get(); // <----
    console.log(searchIDs);
                formdata.append('datas',JSON.stringify(repeat_data1));
                formdata.append('searchIDs',JSON.stringify(searchIDs));
                formdata.append('ignore_replace',val);
                 formdata.append('_token','{{csrf_token()}}')
                 $.ajax({
                      url:'/admin/ignore-replace-claimbusiness',
                      type:'post',
                      dataType: 'json',
                     enctype: 'application/json',
                      data:formdata,
                      processData: false,
                      contentType: false,
                      headers: {'X-CSRF-TOKEN': $("#_token").val()},
                      beforeSend: function () {
                         $('.loader').show();
                      },
                      complete: function () {
                         $('.loader').hide();
                      },
                      success: function (response) { 
                          if(response.status == 200){
                              //window.location.reload();
                              $('#exampleModal2').modal('hide');
                              showSystemMessages('#systemMessage', 'success', 'File import successfully');
                              setTimeout(function(){
                                  window.location.reload();
                              },2000)
                             window.location.reload();
                              
                          //console.log(response.status);
                      }
                 
                }
                 })
         }
             
        $('#upload-csv').click(function(){
            if(profile_pic_var == ''){
                showSystemMessages('#systemMessage', 'danger', 'Select file to upload.');
            }
            else if(ext != 'csv' && ext != 'csvx' && ext != 'xls' && ext != 'xlsx'){
                showSystemMessages('#systemMessage', 'danger', 'File format is not supported.');
                $('.err').html('File format is not supported.')
            }
            else{
                var formdata = new FormData();
                formdata.append('import_file',profile_pic_var);
                 formdata.append('_token','{{csrf_token()}}')
                 $.ajax({
                      url:'/admin/import-claimbusiness',
                      type:'post',
                      dataType: 'json',
                      enctype: 'multipart/form-data',
                      data:formdata,
                      processData: false,
                      contentType: false,
                      headers: {'X-CSRF-TOKEN': $("#_token").val()},
                       beforeSend: function () {
                         $('.loader').show();
                       },
                       complete: function () {
                         $('.loader').hide();
                       },
                      success: function (response) { 
                          console.log("myresponse")
                          console.log(response)
                          console.log("myresponse")
                          if(response.status == 200){
                              //window.location.reload();
                              $('#exampleModal').modal('hide');
                              if(response.repeat_data.length == 0 && response.not_repeat_data.length == 0)
                                 showSystemMessages('#systemMessage', 'success', response.message);
                              console.log(response.repeat_data.length)
                              if(response.repeat_data.length == 0 && response.not_repeat_data.length == 0){
                              setTimeout(function(){
                                  window.location.reload();
                              },2000)
                              }
                              else{
                                  repeat_data1 = response.repeat_data;
                                 var not_repeat_data1 = response.not_repeat_data;
                                 if(response.repeat_data.length == 0){
                                     $('#replace-csv').hide()
                                 }
                                $('#file').val('');
                                var str='';
                                str = str+'<thead><tr> <td>S. No</td><td></td><td>Business Name</td><td>Activity</td><td>Location</td><td>Website</td><td>Phone</td><td>Address</td></tr></thead><tbody>'
                                for(var i=0;i<response.repeat_data.length;i++){
                                    str = str+'<tr><td>'+(i+1)+'</td><td><input type="checkbox" name="selected_ids[]" value="'+i+'" /></td><td>'+response.repeat_data[i][0]+'</td><td>'+response.repeat_data[i][1]+'</td><td>'+response.repeat_data[i][2]+'</td><td>'+response.repeat_data[i][3]+'</td><td>'+response.repeat_data[i][4]+'</td><td>'+response.repeat_data[i][5]+'</td></tr>'
                                    if((i+1) == response.repeat_data.length){
                                        str = str+'</tbody>';
                                    }
                                    
                                }
                                if(response.not_repeat_data.length != 0){
                                    $('#myp').html("Following Business is already available and it can not uplaoad")
                                var str2='';
                                str2 = str2+'<thead><tr> <td>S. No</td><td></td><td>Business Name</td><td>Activity</td><td>Location</td><td>Website</td><td>Phone</td><td>Address</td></tr></thead><tbody>'
                                    for(var i=0;i<response.not_repeat_data.length;i++){
                                        str2 = str2+'<tr><td>'+(i+1)+'</td><td><input type="checkbox" name="selected_ids[]" value="'+i+'" /></td><td>'+response.not_repeat_data[i][0]+'</td><td>'+response.not_repeat_data[i][1]+'</td><td>'+response.not_repeat_data[i][2]+'</td><td>'+response.not_repeat_data[i][3]+'</td><td>'+response.not_repeat_data[i][4]+'</td><td>'+response.not_repeat_data[i][5]+'</td></tr>'
                                        if((i+1) == response.not_repeat_data.length){
                                            str2 = str2+'</tbody>';
                                        }
                                        
                                    }
                                    $('#myTable2').html(str2);
                                }
                                $('#myTable').html(str);
                                $('#exampleModal').modal('hide');
                                $('#exampleModal2').modal('show');
                              }
                          }
                          else{
                              showSystemMessages('#systemMessage', 'danger', response.message);
                              $('#file').val('')
                              $('#exampleModal').modal('hide');
                          }
                          //console.log(response.status);
                      }
                 
                });
            }
        })
    });
</script>

<?php if(count($claims)){?>

<script>



  $(function () {
      setTimeout(function(){
          $('#plan_list_filter').hide()

      },2000)
      
     var oTable;

      oTable = $('#plan_list').DataTable({
        "columns": [
    { "searchable": true },
    { "searchable": true },
    { "searchable": true },
    { "searchable": true },
    { "searchable": true },
    { "searchable": true },
    { "searchable": true },
    { "searchable": true },
    null
  ],
      "paging": true,

      "lengthChange": true,

      "searching": true,

      "ordering": true,

      "aoColumnDefs": [

        {

           bSortable: false,

           aTargets: [ -1,-7]

        }],

      "info": true,

      "lengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],

      "iDisplayLength": 20,

      "autoWidth": false,

      'aaSorting': [[1, 'asc']],

      "language": {

        "searchPlaceholder" : "Search"

      }

    });



    $.fn.dataTable.ext.search.push(

    function( settings, data, dataIndex ) 

    {

        var status              = $('#filter-select').val(),

            status_clm          =  data[5];

        

         if(status == 'Yes') {

            

            if (status_clm == 'Yes')

            {

                return true;

            }

            return false;



        } else if(status == 'No') {



          if (status_clm == 'No')

            {

                return true;

            }

            return false;



        } else {



            return true;

        }

    });



    $('#filter-title').on('keyup', function (e) {

      console.log('change');
         //.column(4)
       // oTable.draw();
    //     console.log()
    //     oTable
    // .column(1)
    // .search(this.value)
    // .draw();
        oTable.search( this.value ).draw();
    });



    jQuery('#checkAll').on('click', function()

    {

        // Get all rows with search applied

        var rows = oTable.rows({ 'search': 'applied' }).nodes();

        console.log(rows);

        // Check/uncheck checkboxes for all rows in the table

        jQuery('input[type="checkbox"]', rows).prop('checked', this.checked);

     });

  });



  var moduleConfig = {

        deletePlanUrl: '{!! route('delete-plan') !!}',

        deactivatePlanUrl: '{!! route('deactivate-plan') !!}',

        activatePlanUrl: '{!! route('activate-plan') !!}'

  };



  jQuery(document).ready(function()

  {

      jQuery('.delete-item').on('click', function()

      {

          deletePlan(this);

      });



      jQuery('.active-item').on('click', function()

      {

            activePlan(this);

      });

  });



  function deletePlan(element)

  {

    var status    = confirm("Are you Sure want to Deactivate Membership Plan ?"),

        elementId = jQuery(element).data('id');



    if(status == false)

    {

      return false;

    }



    jQuery.ajax({

      url: moduleConfig.deactivatePlanUrl,

      type: 'POST',

      dataType: 'JSON',

      data: {

        'id': elementId,

        '_token': jQuery("#ajaxToken").val()

      },

      success: function(data)

      {

        if(data.status == true)

        {

          jQuery("#item-" + elementId ).find(".is_deleted_column").html('No');

          setTimeout(function(){

               window.location.reload(1);

            }, 2000);

          showSystemMessages('#systemMessage', 'success', 'Deactivated Membership Plan Successfully!');

        }

      },

      error: function(data)

      {

        showSystemMessages('#systemMessage', 'danger', 'Unable to Deactivated Membership Plan');

      }

    });

  }



  function activePlan(element)

  {

    var status    = confirm("Are you Sure want to Activate Membership Plan ?"),

        elementId = jQuery(element).data('id');



    if(status == false)

    {

      return false;

    }



    jQuery.ajax({

      url: moduleConfig.activatePlanUrl,

      type: 'POST',

      dataType: 'JSON',

      data: {

        'id': elementId,

        '_token': jQuery("#ajaxToken").val()

      },

      success: function(data)

      {

        if(data.status == true)

        {

          jQuery("#item-" + elementId ).find(".is_deleted_column").html('No');

          setTimeout(function(){

               window.location.reload(1);

            }, 2000);

          showSystemMessages('#systemMessage', 'success', 'Activated Membership Plan Successfully!');

        }

      },

      error: function(data)

      {

        showSystemMessages('#systemMessage', 'danger', 'Unable to Activated Membership Plan');

      }

    });

  }

</script>

<?php } ?>

@endsection