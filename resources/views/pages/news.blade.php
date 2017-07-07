@extends('pages.master')

@section('content')
<div class="row"  style="text-align : justify; padding:50px">
    <?php
    foreach ($News as $value) {
        ?>
        <div class="col-sm-9" style=" padding:30px">
            <p>
                <?php
                echo $value->title;
                echo $value->content;
                echo '</br>';
                ?>
            </p>
            <img height="250px" src="storage/upload/images/<?php echo $value->image; ?>"  >
        </div>
        <?php
    }
    ?>
</div>
@endsection