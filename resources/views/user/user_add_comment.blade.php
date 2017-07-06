@extends('user.user_layout')

@section('content')

<div class="col-md-12" style="text-align :left;">
    <div class = "col-md-12" style ="margin-bottom: 50px" >

      
            
                <form  action="user_add_comment&<?php echo $id ?>" method="get">
                 <input type="text" name="title" class="" style="width:300px;" />
                    <br><br>
                    <textarea  width="80px" cols="80" id="editor1" name="editor1" rows="10">
                    </textarea>
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
                    <br>
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <br>
                    <p>
                        <input type="submit" value="Submit">
                    </p>
                </form>

         
       
    </div>
</div>


@endsection