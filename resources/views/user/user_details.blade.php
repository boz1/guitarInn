@extends('user.user_layout')

@section('content')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */ 
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {    
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 95px;
        left: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    #hearts { color: #fed136;}
    #hearts-existing { color: #fed136;}

    @import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

    .detailBox {
        width:320px;
        border:1px solid #bbb;
        margin:50px;
    }
    .titleBox {
        background-color:#fdfdfd;
        padding:10px;
    }
    .titleBox label{
        color:#444;
        margin:0;
        display:inline-block;
    }

    .commentBox {
        padding:10px;
        border-top:1px dotted #bbb;
    }
    .commentBox .form-group:first-child, .actionBox .form-group:first-child {
        width:80%;
    }
    .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
        width:18%;
    }
    .actionBox .form-group * {
        width:100%;
    }
    .taskDescription {
        margin-top:10px 0;
    }
    .commentList {
        padding:0;
        list-style:none;
        max-height:200px;
        overflow:auto;
    }
    .commentList li {
        margin:0;
        margin-top:10px;
    }
    .commentList li > div {
        display:table-cell;
    }
    .commenterImage {
        width:30px;
        margin-right:5px;
        height:100%;
        float:left;
    }
    .commenterImage img {
        width:100%;
        border-radius:50%;
    }
    .commentText p {
        margin:0;
    }
    .sub-text {
        color:#aaa;
        font-family:verdana;
        font-size:11px;
    }
    .actionBox {
        border-top:1px dotted #bbb;
        padding:10px;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }

</style>

<div class="row"  style="padding-top:20px">
    <div class="col-md-12">
        <?php
        foreach ($Guitars as $value) {
            ?>
            <div class="col-md-6" style=" padding :5px; text-align:left;">
                <p>
                    <?php
                    echo '<h3><strong>' . $value->Title . '</strong></h3>';
                    ?>
                </p>
                </br>
                <img id="myImg" src="storage/upload/<?php echo $value->Image; ?>" alt="just another guitar" style="width:534px; height: 180px;border-radius:5px;">
                </br>
                <p>
                    <?php
                    $totalVote = $value->TotalVote;
                    $numberOfVoters = $value->NumberOfVoters;
                    $vote = round($totalVote / $numberOfVoters);
                    ?>
                </p>
                <p>Average Rating<span id="count-existing"> <?php echo $vote; ?></span> star(s)</p>
                <div id="hearts-existing" class="starrr" data-rating='<?php echo $vote; ?>'></div>
                <p>
                    <?php
                    echo '<strong>Brand: </strong>' . $value->Brand_Name;
                    echo '</br>';
                    echo '<strong>Color: </strong>' . $value->Color_Type;
                    echo '</br>';
                    echo '<strong>Year: </strong>' . $value->Year;
                    echo '</br>';
                    echo '<strong>Country: </strong>' . $value->Country_Name;
                    echo '</br>';
                    echo '<strong>Body Wood: </strong>' . $value->BodyWood;
                    echo '</br>';
                    echo '<strong>Top Wood: </strong>' . $value->TopWood;
                    echo '</br>';
                    echo '<strong>Neck Wood: </strong>' . $value->NeckWood;
                    echo '</br>';
                    echo '<strong>Fretboard Wood: </strong>' . $value->FretWood;
                    echo '</br>';
                    echo '<strong>Body Shape: </strong>' . $value->BodyShape_Type;
                    echo '</br>';
                    echo '<strong>Neck Shape: </strong>' . $value->NeckShape_Type;
                    echo '</br>';
                    echo '<strong>Configuration: </strong>' . $value->Config_Type;
                    echo '</br>';
                    echo '<strong>Neck Pickup: </strong>' . $value->NeckPick;
                    echo '</br>';
                    echo '<strong>Mid Pickup: </strong>' . $value->MidPick;
                    echo '</br>';
                    echo '<strong>Bridge Pickup: </strong>' . $value->BridgePick;
                    echo '</br>';
                    echo '<strong>Number of Strings: </strong>' . $value->NumberOfStrings;
                    echo '</br>';
                    echo '<strong>Number of Frets: </strong>' . $value->NumberOfFrets;
                    echo '</br>';
                    ?>
                    </br>
                    <button id="add-button"><span  class="glyphicon glyphicon-plus" style="color: green;"></span> Favorite</button>
                    </br>
                    </br>
                    <a href="user_comment&<?php echo $value->id; ?>" style="color: black;">
                        <button ><span  class="glyphicon glyphicon-pencil"></span> Comment</button>
                    </a>


                </p>
                </br>


                <p>Click on a star to rate</p>

                <div>
                    <div id="hearts" class="starrr" data-id = "<?php echo $value->id; ?>"></div>
                    You gave a rating of <span id="count">0</span> star(s)
                </div>

                <!-- The Modal -->
                <div id="myModal" class="modal" style="z-index:3;">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>


            <div class="col-md-6" style="text-align: center;">

                <h3 style="margin-bottom:36px"><strong>Comments</strong></h3 >    
                <div class="col-md-12" style=" padding :15px; text-align: left; background-color: white;border-radius: 5px;">

                    <?php
                    foreach ($Comments as $comment) {
                        ?>

                        <?php
                        if ($comment->GuitarId == $value->id) {
                            echo '<strong>Title: </strong>' . $comment->Title;
                            echo '</br>';
                            echo '<strong>Content: </strong>' . $comment->Content;
                            echo '</br>';
                            echo '<strong>Created at: </strong>' . $comment->updated_at;
                            echo '</br>';
                            echo '<hr>';
                        }
                        ?>

                        <?php
                    }
                    ?>
                    <div  style="text-align:center">
                        <?php
                    
                            echo $Comments->render();
                     
                      
                        ?>
                    </div>
                </div>
            </div>
            <?php
            $guitarId = $value->id;
        }
        ?>
    </div>



    <?php $userId = Auth::user()->id; ?>
    <script type="text/javascript">
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        $(document).ready(function () {
            var userId = "<?php echo $userId; ?>";
            var guitarId = "<?php echo $guitarId; ?>";
            $("#add-button").click(function (e) {
                e.preventDefault();
                $("#add-button").text("adding");
                          $("#add-button").attr("disabled","disab");
                $.ajax({
                    type: "POST",
                    data: {userId: userId, guitarId: guitarId},
                    url: 'insert.php',
                    success: function (data) {
                        alert(data);
                        $("#add-button").text("Added");
                        $("#add-button").attr("disabled","disab");
                        $("#add-button").unbind("click");
                    },
                    error: function(data) {
                        $("#add-button").text("Favorite");
                        $("#add-button").attr("disabled");
                    }
                });
            });
            //your code here
        });

    </script>

</div>

@endsection