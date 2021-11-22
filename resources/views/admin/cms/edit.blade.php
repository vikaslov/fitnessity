@extends('admin.layouts.layout')

@section('content')

  {!! Form::open(array('files' => true , 'enctype' => 'multipart/form-data', 'id' => 'postCmsModule')) !!}
  <!-- Content Wrapper. Contains page content -->
      @foreach($module_details as $detail)
       

      <div class="panel panel-default">
        <div class="panel-heading">
          Edit {{$detail->content_title}}
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 form-group{{ $errors->has('edit_title') ? ' has-error' : '' }}">
            {!! Form::label('edit_title', 'Title', ['class' => 'control-label']) !!} <span class="color-red">*</span>
            <input type="text" name="edit_title" id="edit_title" value="{{$detail->content_title}}" class="form-control input-lg" title="Title">
            @if($errors->has('edit_title'))
                <p class="help-block">
                      {{ $errors->first('edit_title') }}
                </p>
            @endif
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-12 form-group{{ $errors->has('banner_image') ? ' has-error' : '' }}">
            
            @if($detail['banner_image'])
               <img src="{{ asset('public/uploads/cms/'.$detail->banner_image) }}" height="100px" width="100px" id="banner"> <br>
               {!! Form::label('banner', 'Banner Image', ['class' => 'control-label']) !!}
            @else
               {!! Form::label('banner', 'Upload Banner', ['class' => 'control-label']) !!} 
            @endif
          
            <input type="file" name="banner_image" id="banner_image" class="form-control">
            @if($errors->has('banner_image'))
              <p class="help-block">
                  {{ $errors->first('banner_image') }}
              </p>
            @endif
            </div>
          </div> 
          <br>

          <div class="row">
          <div class="col-md-12 form-group{{ $errors->has('video') ? ' has-error' : '' }}">
            
            @if($detail['video'])
                <video width="220" height="150"  controls>
                    <source src="{{ asset('public/'.$detail->video) }}" type="video/mp4">
                </video>
                <br>
               {!! Form::label('video', 'Video', ['class' => 'control-label']) !!}
            @else
               {!! Form::label('video', 'Upload Video', ['class' => 'control-label']) !!} 
            @endif
            <input type="hidden" name="video-name" id="video-name"  value="{{$detail->video}}">
            <input type="file" name="video" id="video" class="form-control" accept="video/*">
            @if($errors->has('video'))
              <p class="help-block">
                  {{ $errors->first('video') }}
              </p>
            @endif
            </div>
          </div> 
          <br/>

          <div class="row">
            <div class="col-md-12 form-group {{ $errors->has('edit_content') ? ' has-error' : '' }}">
               {!! Form::label('edit_content', 'Content', ['class' => 'control-label']) !!} <span class="color-red">*</span>

               <textarea class="ckeditor form-control" name="edit_content" id="edit_content" rows="6">
                 {{$detail->content}}
               </textarea>
               @if($errors->has('edit_content'))
                <p class="help-block">
                      {{ $errors->first('edit_content') }}
                </p>
              @endif
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="id" id="id" value="{{$detail->id}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-12 form-group">
              <div class="box-footer text-center">          
               <button type="submit" id="submit" class="btn btn-primary">Submit</button>
               <a href="\admin\cms" class="btn btn-danger ">Cancel</a>
              </div>
            </div>
        </div>

        </div>
      </div>
      @endforeach
  {!! Form::close() !!}

  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        //CKEDITOR.replace( 'detail' );
        CKEDITOR.replace( 'edit_content', {
            
            allowedContent:true,
            filebrowserUploadMethod: 'form',
            toolbar: 'Full',
            enterMode : CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P
        });
    </script>
 
 <script>

 // $('#postCmsModule').submit(function(e) {
 //      e.preventDefault();

 //       $('#postCmsModule').validate({
 //        rules: {
 //          edit_title: {
 //            required: true
 //          },
 //        },
 //        messages: {
 //          edit_title: {
 //            required: "Provide a title",
 //          },
 //        },
 //      submitHandler: saveCms
 //      });

 //  });

 //  function saveCms()
 //  {
 //    if ($('#postCmsModule').valid()) {
 //     $('form#postCmsModule').unbind().submit(); 
 //    }
 //  }

  $(document).ready(function(){
    
    var ckconfig = {
      toolbarGroups: [
          {"name":"basicstyles","groups":["basicstyles"]},
          // {"name":"links","groups":["links"]}
          {"name":"paragraph","groups":["list","align"]},
          {"name":"insert","groups":["insert"]},
          {"name":"colors" },
          {"name":"document","groups":["mode"]},
          {"name":"styles","groups":["styles"]},
          {"name":"tools","groups":[ 'Maximize']},
        ],
        // Remove the redundant buttons from toolbar groups defined above.
        removeButtons: 'Strike,Subscript,Superscript,Anchor,Specialchar,NewPage,Save,ShowBlocks,Flash,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format',
        height : 350
      };

      CKEDITOR.replace( 'edit_content', ckconfig );

  });   
 </script>
@endsection