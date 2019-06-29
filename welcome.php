<?php
    include 'dbconfig.php';
    session_start();

    if(isset($_POST['logout'])) {
        unset($_SESSION);
        session_destroy();
        header('Location: logout.php');
    }

    $query="SELECT uid FROM users WHERE username='{$_SESSION['username']}'";
    $result=mysqli_query($conn,$query);
    $uid=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MARGIN | Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body style="background-color: #fde5d5;">
    <!-- navigation bar starts here -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ff7b23;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="Logo" style="width:35px;">
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">
                <h4 style="color: white;">MARGIN mail</h4>
            </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="color: white;">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#" style="color: white;">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: white;">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"
                        style="color: white;">Disabled</a>
                </li> -->
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a href="#">
                    <h4 class="mr-sm-2"><?php echo $_SESSION['username']; ?></h4>
                </a>
                <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
                <button class="btn btn-danger my-2 my-sm-0" type="submit" name="logout">LOGOUT</button>
            </div>
        </div>
    </nav>
    <!-- navigation bar ends here -->

    <div class="welcome">
    <center>
        <h1 style="color:#fc6500;">Welcome to MARGIN mail</h1>
        <br>
        <h3 style="color:#ff954e;">Hey rishan, I'm glad you are here. We welcome you to our community. Let's get
            started.
        </h3>
        <h3 style="color:#ff954e;">Click below to get started.</h3>
        <br>
        <a href="inbox.php" class="btn btn-info">
            <h3>Get started</h3>
        </a>
    </center>
    </div>




    <!-- footer bar starts here -->
    <footer class="page-footer font-small teal pt-4" style="background-color: #ff9650;">

        <div class="container text-center text-md-left">

            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase font-weight-bold">About Margin mail</h5>
                    <p>Margin mail a practice project to enhance my skills that I have learnt and apply
                        it using basic web technologies like HTML, CSS, JS, PHP and its relevant libraries
                        as well. Any suggestions are welcomed and you can contact me on my Github handle below
                        <a href="www.github.com/ri5han">github.com/ri5han</a>
                    </p>
                </div>

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- <div class="col-md-6 mb-md-0 mb-3">
                    <h5 class="text-uppercase font-weight-bold">Footer text 2</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi
                        earum
                        commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam,
                        aspernatur id
                        excepturi hic.</p>
                </div> -->
            </div>
        </div>

        <div class="footer-copyright text-center py-3" style="background-color: #ff7b23; z-index: 600;">© 2019
            Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> marginmail.com</a>
        </div>
    </footer>
    <!-- footer bar ends here -->

</body>

</html>