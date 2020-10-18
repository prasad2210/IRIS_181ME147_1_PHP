<?php
  session_start();

  include("./php//header.php");
  $error = "";
  $main_content = "";

  if (array_key_exists("logout", $_GET)) {
        
    unset($_SESSION);
    setcookie("id1", "", time() - 60*60);
    $_COOKIE["id1"] = "";  
    
    session_destroy();
  }
  else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id1", $_COOKIE) AND $_COOKIE['id1'])){
    $query = "SELECT collegeID FROM `users` WHERE id = '".mysqli_real_escape_string($conn, $_SESSION['collegeId'])."'";
    $row = mysqli_fetch_array(mysqli_query($conn, $query));
    if($_COOKIE['id1'] == "admin"){

      header("Location: ./admin-student//admin.php");
    }
    else{

      header("Location: ./admin-student//student.php");
    }
  }

  if(array_key_exists("submit", $_POST)){

    include("./php//connection.php");
    
    if($_POST["signUp"] == '1'){

      $query = "SELECT id FROM `users` WHERE collegeID = '" .mysqli_real_escape_string($conn, $_POST['collegeId'])."' LIMIT 1";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0) {

        $error = '<div class="alert alert-danger text-center col-md-10" role="alert">This College ID is Taken. Please try other.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
      else {
        $query = "INSERT INTO `users` (`collegeID`, `passward`, `name`) VALUES ('".mysqli_real_escape_string($conn, $_POST['collegeId'])."', '".mysqli_real_escape_string($conn, $_POST['pass'])."', '".mysqli_real_escape_string($conn, $_POST['yourName'])."')";
        
        if (!mysqli_query($conn, $query)) {

          $error = '<div class="alert alert-danger text-center col-md-10" role="alert">Could not sign you up - please try again later.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
        
        } 
        else{
          $id = mysqli_insert_id($conn);
          $query = "UPDATE `users` SET passward = '".md5(md5(mysqli_insert_id($conn)).$_POST['pass'])."' WHERE id = '".mysqli_insert_id($conn)."' LIMIT 1";
          if(mysqli_query($conn, $query)){
            $error = '<div class="alert alert-success text-center col-md-10" role="alert">Account added successfully. Please log in.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
          }
        }
      }
    }
    else{
      $query = "SELECT * FROM `users` WHERE collegeID = '".mysqli_real_escape_string($conn, $_POST['collegeId'])."'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      if (isset($row)) {

        $hashedPassword = md5(md5($row['id']).$_POST['pass']);

        if ($hashedPassword == $row['passward']) {

          $_SESSION['id'] = $row['id'];
          setcookie("id1", $row['id'], time() + 60*60*24*365);
          echo $_COOKIE['id1'];

          if($row['collegeID'] == "admin"){
            header("Location: ./admin-student//admin.php");
          }
          else{
            header("Location: ./admin-student//student.php");
          }
        }
        else{
          $error = '<div class="alert alert-danger text-center col-md-10" role="alert">College Id or passward is incorrect, try again.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
        }
      }
      else{
        $error = '<div class="alert alert-danger text-center col-md-10" role="alert">College Id or passward is incorrect, try again.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
    }
  }
  include("./php//connection.php");
  $mainBody = '';
  $query1 = "SELECT * FROM `books`";
  $result1 = mysqli_query($conn, $query1);
  if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)){
      $count = 0;
      $isbn = $row1['isbn'];
      $query2 = "SELECT file_name FROM `paths` WHERE isbn = '$isbn'";
      $result2 = mysqli_query($conn, $query2);
      $subBody = '';
      if($result2){
        if(mysqli_num_rows($result2)>0){
          while($row2 = mysqli_fetch_assoc($result2)){

            if($count==0){
              $subBody .= '<div class="carousel-item active">
              <img class="d-block w-100" src="'.substr($row2['file_name'],1).'" alt="'.substr($row2['file_name'],1).'">
              </div>';
            }
            // echo $count++;
            else{
              $subBody .= '<div class="carousel-item">
              <img class="d-block w-100" src="'.substr($row2['file_name'],1).'" alt="'.substr($row2['file_name'],1).'">
              </div>';
            }
            $count++;
          }
          //echo $subBody."<br><br>";
        }
      }
      $mainBody .=
      '<div class="col-md-3">
      <div>
        <div class="card">
           <div id="carouselExampleControls'.$row1['id'].'" class="carousel slide" data-ride="carousel" style="height:250px; width:170px; margin: 0 auto;">
              <div class="carousel-inner">
              '.
                $subBody
              .'
              </div>
                <a class="carousel-control-prev" href="#carouselExampleControls'.$row1["id"].'" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls'.$row1["id"].'" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
          <div class="card-body">
            <h5 class="card-title">'.$row1["title"].'</h5>
            <p class="card-text">'.$row1["description"].'</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">ISBN:       '.$row1["isbn"] .'</li>
            <li class="list-group-item">Quantities: '.$row1["quantity"].'</li>
          </ul>
          <div class="card-body mb-4" style="margin:0 auto; position:relative; top:-8px ">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLRForm" id="log-in">Edit</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLRForm" id="log-in">issue request</button>
          </div>
        </div>
      </div>
    </div>';
    } 
  }
?>


<!-- <div class="pt-3 border pl-3">
    <nav class="navbar navbar-expand-sm bg-white navbar-primary ">
    
      <a class="navbar-brand" href="#" style="margin-left: 20px;"><img src="./images//logo.PNG" alt="Logo"
          width="150"></a>
    </nav>
  </div> -->

<div class="row ">
  <figure><img src="./images/top_nav.PNG" width="100%" height="40px"></figure>
</div>
<div class="row">
  <div class="col-xl-10">
    <figure><img src="./images/second_nav.PNG" width="100%" height="80px"></figure>
  </div>
  <div class="col-xl-2">
    <div class="dropdown">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLRForm" id="log-in">
        sign in
      </button>
    </div>
  </div>
</div>

<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3 justify-content-center" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab"><i class="fas fa-user mr-1"></i>
              Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel2" role="tab"><i class="fas fa-user-plus mr-1"></i>
              Register</a>
          </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel1" role="tabpanel">

            <!--Body-->
            <form method="POST">
              <div class="form-group mx-5 my-2 text-center">
                <label for="collegeId">Enter College ID</label>
                <input type="text" class="form-control" id="collegeId" name="collegeId" aria-describedby="emailHelp"
                  placeholder="Ex. 181ME147" required>
              </div>
              <div class="form-group mx-5 text-center">
                <label for="InputPassword1">Password</label>
                <input type="password" class="form-control" name="pass" id="InputPassword1" placeholder="Password" required>
              </div>
              <div class="text-center my-2">
                <input type="hidden" name="signUp" value="0">
                <button type="submit" name="submit" class="btn btn-outline-primary">sign in</button>
              </div>
            </form>
            <!-- Footer
            <div class="modal-footer">
              <div class="options text-center text-md-right mt-1">
                <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
                <p>Forgot <a href="#" class="blue-text">Password?</a></p>
              </div>
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div> -->

          </div>
          <!--/.Panel 7-->

          <!--Panel 8-->
          <div class="tab-pane fade" id="panel2" role="tabpanel">
            <div id="error" class="text-center mx-2">
            </div>

            <!--Body-->
            <form method="POST">
              <div class="form-group mx-5 my-2 text-center">
              <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="yourName" aria-describedby="collegeIdreg"
                  placeholder="Your Name" required>
                <label for="collegeId">College ID</label>
                <input type="text" class="form-control" id="collegeId1" name="collegeId" aria-describedby="collegeIdreg"
                  placeholder="Ex. 181ME147" required>
              </div>
              <div class="form-group mx-5 text-center">
                <label for="inputPassword2">Password</label>
                <input type="password" class="form-control" name="pass" id="inputPassword2" placeholder="Password" required>
              </div>
              <div class="form-group mx-5 text-center">
                <label for="repeatPassword2">Repeat Password</label>
                <input type="password" class="form-control" id="repeatPassword2" placeholder=" Repeat Password" required> 
              </div>
              <div class="text-center my-2">
                <input type="hidden" name="signUp" value="1">
                <button type="submit" name="submit" class="btn btn-outline-primary">sign up</button>
              </div>
            </form>
            <!-- Footer
            <div class="modal-footer">
              <div class="options text-right">
                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
              </div>
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div> -->
          </div>
          <!--/.Panel 8-->
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login / Register Form-->
<div class="row" height="80%">
  <div class="col-md-1"></div>
  <?php echo $error; ?>
  <div class="col-md-1"></div>
</div>
<div class="container-fluid border">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7 py-2">
      <h5>Library Dashboard</h5>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb remalign">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Library</li>
        </ol>
      </nav>
    </div>
    <div class="col-md-4 pl-4">
      <figure><img src="./images/3rd_pic.PNG" width="250px" height="35px" style="position: relative; top: 10px;">
      </figure>
    </div>
  </div>
</div>

<div class="row bg-light" style="opacity: .7;">
  <div class="col-md-12 py-2 px-5 border">
    <a href="#" class="nav-link" onclick="hideShowMenu()" id="hideShowMenu">
      <i class="fa fa-align-right mr-2 " id="hideShowMenuIcon"></i>
      <span class="hide-text-md ml-2" id="hideShowMenuText">Close Menu</span>
    </a>
    <!-- <i class="fa fa-align-right pl-4"></i>
        <a class="pl-3" >Close menu</a> -->
  </div>
</div>
<div class="row main-content border border-top-0">
  <div class="col-md-2 border border-top-0 py-2" id="dash" style="text-align: center;">

    <ul class="nav flex-column">
      <li class="nav-item ">
        <a class="nav-link disabled" href="javascript:void(0);">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link dropmenu disabled" data-toggle="collapse" data-target="#submenu">Issues</a>
        <div id="submenu" class="collapse">
          <ul>
            <li><a href="">Pending</a></li>
            <li><a href="">Approved</a></li>
            <li><a href="">Rejected</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Transactions</a>
      </li>
    </ul>
  </div>
  <div class="col-md-10 py-2" id="main-area">
    <div class="row">
      <?php echo $mainBody;?>
      
      </div>
    </div>
  </div>
</div>

<?php include("./php//footer.php");?>