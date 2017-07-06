<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>guitarInn</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="{{asset('img/favicon.png') }}">
        
        <!-- Theme CSS -->
        <link href="css/agency.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="user_welcome">guitarInn</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#index.php"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#page-top">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">guitarInn</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#team">Team</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="user_guitars">Guitars</a>
                        </li>
                        <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in">Welcome To guitarInn!</div>
                    <div class="intro-heading">Largest guitar database on the net!</div>
                    <form  action="user_search" method="get">
                        <div id="custom-search-input">
                            <div class="input-group col-md-12">           
                                <input type="text" class="  search-query form-control" name="search" placeholder="Search" style="font-family:Montserrat">
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="submit" style="background-color:#fed136; border-color:#fed136">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>         
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </header>


        <!-- About Section -->
        <section id="about" style="padding:20px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="text-align: center;margin: 20px;">
                        <img src="../guitarinn.png" alt="GuitarInn" style="width:250px;height:219px;border:0;padding-bottom: 10px">
                        <h4 class="subheading">GuitarInn has as its primary task to provide detailed and accurate information about guitars.</h4>
                        <h4 class="subheading">You can search, vote, favourite and even compare guitars!</h4>
                    </div>
                    <div class="col-lg-12 text-center" >
                        <?php
                        foreach ($Guitars as $value) {
                            ?>
                            <div class="col-lg-4" style="  padding :5px; ">
                                <p>
                                    <?php
                                    echo '<strong>' . $value->Title . '</strong>';
                                    echo '</br>';
                                    echo '</br>';
                                    ?>
                                </p>
                                <a href="user_details&<?php echo $value->id; ?>">
                                    <img src="storage/upload/<?php echo $value->Image; ?>" alt="just another guitar" style="width:100%; height: 100%;border:0;">
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
                                    echo '</br>';
                                    echo '<strong>Neck Pickup: </strong>' . $value->NeckPick;
                                    echo '</br>';
                                    echo '<strong>Mid Pickup: </strong>' . $value->MidPick;
                                    echo '</br>';
                                    echo '<strong>Body Wood: </strong>' . $value->BodyWood;
                                    ?>
                                </p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a href="user_guitars" class="page-scroll btn btn-xl" style="width: auto;margin:50px;">Browse More Guitars</a>
                    </div>
                </div>

            </div>
        </section>


        <!-- Team Section -->
        <section id="team" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Our Amazing Team</h2>
                        <h3 class="section-subheading text-muted">who made guitarInn!</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="team-member">
                            <img src="../img/team/Burak.JPG" class="img-responsive img-circle" alt="">
                            <h4>Burak Öz</h4>
                            <p class="text-muted">the man</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="https://www.linkedin.com/in/burakoz1/"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="team-member">
                            <img src="../img/team/Kerem.jpg" class="img-responsive img-circle" alt="">
                            <h4>Kerem Tunçer</h4>
                            <p class="text-muted">adam</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="https://www.linkedin.com/in/kerem-tun%C3%A7er-54645892/"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Copyright &copy; guitarInn 2017</span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li><a href="#">Privacy Policy</a>
                            </li>
                            <li><a href="#">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="js/agency.min.js"></script>

    </body>

</html>
