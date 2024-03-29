<?php
//start a new session
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Thank You!</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/thank-you.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.css">
  <script src="https://kit.fontawesome.com/b95e0dbf48.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

</head>

<body class="text-center" style="background-color: rgb(255, 224, 225)">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">
    <header class="masthead mb-auto">
      <div class="inner">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
          <a class="navbar-brand pl-md-5 ml-md-5 pr-md-5 mr-md-5" href="index.html">EVACARE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mr-4 text-dark">
                
                <a class="nav-link" href="#"><i class="fa fa-user"></i> Hi, <b> <?php echo htmlspecialchars($_SESSION["username"]); ?> </b></a>
              </li>
              <li class="nav-item mr-4 text-dark">
                <a class="nav-link" href="index.html">Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <main role="main" class="inner cover" style="color: #022f42;">
      <h3 class="cover-heading">Your request has been received and is in processing</h3>
      <p class="lead">We will contact you as soon as you get a match for you</p>
      <h4 class="cover-heading">
        Have a nice day!
      </h4>
    </main>

    <footer class="mastfoot mt-auto">
      <div class="inner mb-0">
        <p>Copyright &copy;
          <script>
            document.write(new Date().getFullYear());
          </script>
          All rights reserved.
        </p>
      </div>
    </footer>
  </div>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>