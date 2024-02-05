<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <!-- <link rel="stylesheet" href=""> -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">WebSite</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                  </ul>
                </div>
                <?php session_start(); if(isset($_SESSION["userid"])):?>
                  <ul>
                    <li class="list-group-item"><?php echo $_SESSION["username"] ?></li>
                    <li class="list-group-item"><a href="./includes/logout.inc.php">Logout</a></li>
                  </ul>
                <?php  else:?>
                <ul class="d-flex px-3">
                  <li class="list-group-item"><a href="#" class="mx-2">SIGN UP</a></li>
                  <li class="list-group-item"><a href="#" class="mx-2">LOGIN</a></li>
                <?php endif;?>

              </div>
            </nav>    

            <div class="container my-5 d-flex ">


                <div class="col-md-6 mx-4">
                    <form action="./includes/signup.inc.php" method="post">
                        <legend>Signup</legend>
                        
                        <div class="mb-3">
                          <label for="username" class="form-label"> Username </label>
                          <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
                        </div>

                        <div class="mb-3">
                          <label for="password" class="form-label"> Password </label>
                          <input type="password" id="password" name="password" class="form-control" placeholder="password">
                        </div>

                        <div class="mb-3">
                          <label for="repetedPassword" class="form-label"> Repeted Password </label>
                          <input type="password" id="repetedPassword" name="passwordrepeat" class="form-control" placeholder="Re-Enter Password">
                        </div>

                        <div class="mb-3">
                          <label for="Email" class="form-label"> Email </label>
                          <input type="text" id="Email" name="email" class="form-control" placeholder="Enter Email">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="col-md-6 mx-4">
                      <form action="./includes/login.inc.php" method="post">
                          <legend>Login</legend>
                          
                          <div class="mb-3">
                            <label for="username" class="form-label"> Username </label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
                          </div>

                          <div class="mb-3">
                            <label for="password" class="form-label"> Password </label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="password">
                          </div>

                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>

            </div>
        </body>
    </html>