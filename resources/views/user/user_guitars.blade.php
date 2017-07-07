@extends('user.user_layout')

@section('content')
<div class="col-md-12" style="text-align : center;">
    <div class = "col-md-12" style ="margin-bottom: 50px" >
        <?php
        foreach ($Guitars as $value) {
            ?>
            <div class="col-md-6" style="  padding :10px; border: 1px solid #000; text-align:center">
                <p>
                    <?php
                    echo '<h3><strong>' . $value->Title . '</strong></h3>';
                    echo '</br>';
                    echo '</br>';
                    ?>
                </p>
                <a href="user_details&<?php echo $value->id; ?>">
                    <img src="storage/upload/<?php echo $value->Image; ?>" alt="just another guitar" style="width:534px; height: 180px;border:0;">
                </a>
                </br>
                </br>
                <p>
                    <?php
                    echo '<strong>Brand: </strong>' . $value->Brand_Name;
                    echo '</br>';
                    echo '<strong>Color: </strong>' . $value->Color_Type;
                    echo '</br>';
                    echo '<strong>Year: </strong>' . $value->Year;
                    ?>
                </p>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    echo $Guitars->render();
    ?>
</div>


@endsection