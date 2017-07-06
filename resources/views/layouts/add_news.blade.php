@extends('layouts.app')

@section('content')
<script src="{{ asset('../ckeditor.js') }}"></script>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form  action="insert_news" method="post"  enctype="multipart/form-data">
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
                    <input type="file" name="image">
                    <br>
                    <p>
                        <input type="submit" value="Submit">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection