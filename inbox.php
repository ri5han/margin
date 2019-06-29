<?php
include 'dbconfig.php';
session_start();

$showmailquery = "SELECT * FROM mails WHERE mto='{$_SESSION['username']}'";
$showmailresult = mysqli_query($conn, $showmailquery);
$showmail = mysqli_fetch_all($showmailresult, MYSQLI_ASSOC);

if (isset($_POST['logout'])) {
    unset($_SESSION);
    session_destroy();
    header('Location: logout.php');
}

if (isset($_POST['send'])) {
    $mto = $_POST['mto'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sent = 1;

    $query = "INSERT INTO mails(mfrom,mto,subject,message,sent) VALUES('{$_SESSION['username']}','$mto','$subject','$message','$sent')";
    mysqli_query($conn, $query);
    echo "sent";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MARGIN | Inbox</title>
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
                    <h4 class="mr-sm-2">rishan</h4>
                </a>
                <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
                <form method="POST" action="inbox.php">
                    <button name="logout" class="btn btn-danger my-2 my-sm-0" type="submit">LOGOUT</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- navigation bar ends here -->


    <div class="sidenav">
        <a href="#" class="btn btn-outline-success" data-toggle="modal"
            data-target="#exampleModal">
            <h1>COMPOSE</h1>
    </a>
        <a href="inbox.php" class="btn btn-outline-primary">
            <h2>Inbox</h2>
        </a>
        <a href="sent.php" class="btn btn-outline-info">
            <h2>Sent</h2>
        </a>
        <a href="bin.php" class="btn btn-outline-danger">
            <h2>Bin</h2>
        </a>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ff7b23;">
                    <h5 class="modal-title" id="exampleModalLabel">Compose a mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #fde5d5;">
                    <form method="POST" action="inbox.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">To:</label>
                            <input name="mto" type="text" class="form-control" id="recipient-name"
                                placeholder="Username of person you want to send....">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Subject:</label>
                            <input name="subject" type="text" class="form-control" id="recipient-name"
                                placeholder="Mention the subject of the mail....">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea name="message" rows="10" class="form-control" id="message-text" placeholder="Start writing your message here...."></textarea>
                        </div>
                        <div class="modal-footer" style="background-color: #ff9650;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                            <button name="send" type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="main">
        <h1 style="color: #ff6600; font-weight: 900;">INBOX</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">From</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $count=1; foreach($showmail as $sm): ?>
                <tr>
                    <th scope="row"><?php echo $count++; ?></th>
                    <td><?php echo $sm['mfrom']; ?></td>
                    <td><a href="#"><?php echo $sm['subject']; ?></a></td>
                    <td><?php echo $sm['time']; ?></td>
                    <td><a href="inbox.php?mid=<?php echo $sm['mid']; ?>" type="submit" class="btn btn-danger">Delete</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="hr-warning"><br>
    <h4 style="text-align:center; color: #ff7b23;">Your mail's end here.</h4>


    <!-- footer bar starts here -->
    <!-- <footer class="page-footer font-small teal pt-4" style="background-color: #ff9650;">

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

                 <div class="col-md-6 mb-md-0 mb-3">
                    <h5 class="text-uppercase font-weight-bold">Footer text 2</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi
                        earum
                        commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam,
                        aspernatur id
                        excepturi hic.</p>
                </div>
            </div>
        </div>

        <div class="footer-copyright text-center py-3" style="background-color: #ff7b23; z-index: 600;">© 2019 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> marginmail.com</a>
        </div>
    </footer> -->
    <!-- footer bar ends here -->

</body>

</html>
