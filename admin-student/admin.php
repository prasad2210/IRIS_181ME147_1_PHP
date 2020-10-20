<?php
  

  session_start();
  if (array_key_exists("id1", $_COOKIE) && $_COOKIE['id1']) {      
    $_SESSION['id'] = $_COOKIE['id1'];
  }

  //log in details
  if (array_key_exists("id", $_SESSION)) {
              
    include("../php//connection.php");
    
    $query = "SELECT collegeID FROM `users` WHERE id = ".mysqli_real_escape_string($conn, $_SESSION['id'])." LIMIT 1";
    $row = mysqli_fetch_array(mysqli_query($conn, $query));
  }
  else{

    header("Location: ../index.php?logout=1");
  }



  //add books
  $statueLog = '';
  if(isset($_POST['submit'])){
    $query = "SELECT * FROM `books` WHERE isbn = '".mysqli_real_escape_string($conn, $_POST['isbn'])."'";
    $result = mysqli_query($conn, $query);
    if(!(mysqli_num_rows($result)> 0)){

      include("../php//connection.php");

      //alert massages
      $dir = './dataset/';
      $title = $_POST['title'];
      $description = $_POST['description'];
      $quantity = $_POST['quantity'];
      $isbn = $_POST['isbn'];
      $insertTobooks = 0;
      //$allowTypes = array('jpg','png','jpeg','gif');

      $fileNames = array_filter($_FILES['files']['name']);

      if(!empty($fileNames)){

        foreach($_FILES['files']['name'] as $key=>$val){

          $fileName = basename($_FILES['files']['name'][$key]);
          $target = $dir.$fileName;
      
          if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], ".".$target)){
            $target = '.'.$target;
            $query = "INSERT INTO `paths` (`file_name`, `isbn`) VALUES ('".mysqli_real_escape_string($conn, $target)."','".mysqli_real_escape_string($conn, $_POST['isbn'])."')";
            $result = mysqli_query($conn, $query);

            if(!$result){
              $insertTobooks = 1;
            }
          }
        }
        if(!$insertTobooks){

          $query = "INSERT INTO `books`(`title`, `description`, `quantity`, `isbn`) VALUES('$title',
          '$description', '$quantity', '$isbn')";
          $result = mysqli_query($conn, $query);

          if(!$result){

            $statueLog = '<div class="alert alert-danger text-center col-md-12" role="alert">There was an error adding a book please try again.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
          }
          else{
            header("Location: admin.php");
            $statueLog = '<div class="alert alert-success text-center col-md-12" role="alert">Book added successfully!!<button type="button" class="close" data-dismiss="alert">x</button> </div>';
          }
        }
      }
    }
    else{
      $statueLog = '<div class="alert alert-danger text-center col-md-12" role="alert">This book already exists in a database<button type="button" class="close" data-dismiss="alert">x</button> </div>';
    }
  }

  //display books
  include("../php//connection.php");
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
              <img class="d-block w-100" src="../'.$row2['file_name'].'" alt="'.$row2['file_name'].'">
              </div>';
            }
            // echo $count++;
            else{
              $subBody .= '<div class="carousel-item">
              <img class="d-block w-100" src="../'.$row2['file_name'].'" alt="'.$row2['file_name'].'">
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
           <div id="carouselExampleControls'.$row1["id"].'" class="carousel slide" data-ride="carousel" style="height:250px; width:170px; margin: 0 auto;">
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
          <div class="card-body mb-4" style="margin:0 auto; position:relative; top:8px ">
          <form id="submit-button">
          <button type="submit" name="submit1" id="'.$row1['id'].'" class="btn btn-outline-primary">Edit Book</button>
          </form>
          </div>
        </div>
      </div>
    </div>';
    } 
  }

  if(array_key_exists("edit", $_POST)){

    $query = "SELECT * FROM `books` WHERE id = '".mysqli_real_escape_string($conn, $_POST['editModal'])."'";
    $result = mysqli_query($conn, $query);
    $row1 = mysqli_fetch_array($result);
    echo $row1['isbn'];
    if(file_exists($_FILES['files']['tmp_name'][0]) || is_uploaded_file($_FILES['files']['tmp_name'][0])){
      $query = "DELETE FROM `paths` WHERE isbn = '".mysqli_real_escape_string($conn, $row1['isbn'])."'";
      $result = mysqli_query($conn, $query);
      if($result) {
        
        $dir = './dataset/';
        $UpdateTobooks = 0;
        //$allowTypes = array('jpg','png','jpeg','gif');

        $fileNames = array_filter($_FILES['files']['name']);

        if(!empty($fileNames)){

          foreach($_FILES['files']['name'] as $key=>$val){

            $fileName = basename($_FILES['files']['name'][$key]);
            $target = $dir.$fileName;
        
            if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], ".".$target)){
              $target = '.'.$target;
              $query = "INSERT INTO `paths` (`file_name`, `isbn`) VALUES ('".mysqli_real_escape_string($conn, $target)."','".mysqli_real_escape_string($conn, $row1['isbn'])."')";
              $result = mysqli_query($conn, $query);
            }
          }
        }
      }
    }
    if(isset($_POST['title'])){
      $query = "UPDATE `books` SET title = '".mysqli_real_escape_string($conn, $_POST['title'])."' WHERE isbn = '".mysqli_real_escape_string($conn, $row1['isbn'])."'";
      if(mysqli_query($conn, $query)){
        header("Location: admin.php");
        $statueLog = '<div class="alert alert-success text-center col-md-12" role="alert">Changes are saved<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
    else{
        $statueLog = '<div class="alert alert-danger text-center col-md-12" role="alert">Did not save the changes try again.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
    }
    if(isset($_POST['description'])){
      $query = "UPDATE `books` SET `description` = '".mysqli_real_escape_string($conn, $_POST['description'])."' WHERE isbn = '".mysqli_real_escape_string($conn, $row1['isbn'])."'";
      if(mysqli_query($conn, $query)){
        header("Location: admin.php");
        $statueLog = '<div class="alert alert-success text-center col-md-12" role="alert">Changes are saved<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
      else{
        $statueLog = '<div class="alert alert-danger text-center col-md-12" role="alert">Did not save the changes try again.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
    }
    if(isset($_POST['quantity'])){
      $query = "UPDATE `books` SET quantity = '".mysqli_real_escape_string($conn, $_POST['quantity'])."' WHERE isbn = '".mysqli_real_escape_string($conn, $row1['isbn'])."'";
      if(mysqli_query($conn, $query)){
        header("Location: admin.php");
        $statueLog = '<div class="alert alert-success text-center col-md-12" role="alert">Changes are saved<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
      else{
        $statueLog = '<div class="alert alert-danger text-center col-md-12" role="alert">Did not save the changes try again.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
    }
    if(isset($_POST['isbn'])){
      $query = "UPDATE `books` SET isbn = '".mysqli_real_escape_string($conn, $_POST['isbn'])."' WHERE isbn = '".mysqli_real_escape_string($conn, $row1['isbn'])."'";
      if(mysqli_query($conn, $query)){
        header("Location: admin.php");
        $statueLog = '<div class="alert alert-success text-center col-md-12" role="alert">Changes are saved<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
      else{
        $statueLog = '<div class="alert alert-danger text-center col-md-12" role="alert">Did not save the changes try again.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
      }
    }
  }

  
  include("../php//header.php");
?>

<body>
  <!-- <div class="pt-3 border pl-3">
    <nav class="navbar navbar-expand-sm bg-white navbar-primary ">
    
      <a class="navbar-brand" href="#" style="margin-left: 20px;"><img src="./images//logo.PNG" alt="Logo"
          width="150"></a>
    </nav>
  </div> -->

  <div class="row ">
      <figure><img src="../../images/top_nav.PNG" width="100%" height="40px"></figure>
  </div>
  <div class="row">
    <div class="col-xl-10">
      <figure><img src="../../images/second_nav.PNG" width="100%" height="80px"></figure>
    </div>
    <div class="col-xl-1 mt-4 font-weight-bold">
        <?php echo $row["collegeID"]; ?>
    </Div>
    <div class="col-xl-1 mt-3">
        <a href="../../index.php?logout=1"><button type="button" class="btn btn-primary" id="logout">
         Log-out
        </button></a>
    </div>
</div>

<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-md-10 justify-content-center">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit Book</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <form method="post" enctype="multipart/form-data" class="justify-content-center">
              <div class="card" style="">
                      <div class="form-group text-center" id="input-image" style="height:200px; background-color:gray;">
                          <label for="exampleFormControlFile1 text-"><h2>Images</h2></label>
                          <input type="file" class="form-control-file  mt-4" id="File" name="files[]" multiple 
                          accept="image/*" style="background-color:gray;" > 
                          
                        </div>
                  <div class="card-body" style="position:relative; top:-10px">
                      <label for="title">title</label>
                      <input type="text" class="form-control" id="title" name="title"  placeholder="title of a book" required>
                      <label for="description">description</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="description of a book" required>
                  </div>
                  <ul class="list-group list-group-flush card-body">
                      <li class="list-group-item row"><label for="isbn" class="col-md-5">ISBN</label><input type="number" id="text" class="control-form col-md-7" name="isbn" required> </li>
                      <li class="list-group-item row"><label for="quantity" class="col-md-5">Quantity</label><input type="number" id="quantity" class="control-form col-md-7" 
                      name="quantity" min="1"  required></li>
                  </ul>
                  <div class="card-body">
                      <input type="hidden" name="editModal" id="editModal" value="" />
                      <button class="btn btn-primary" name="edit" value="edit">Edit</button>
                  </div>
              </div>
            </form>
        </div>

      </div>
    </div>
  </div>
</div>
  <div class="container-fluid border">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-7 py-2">
        <h5>Library Dashboard</h5>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb remalign">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href = "../../index.php?logout=1">Library</a></li>
            <li class="breadcrumb-item">admin</li>
          </ol>
        </nav>
      </div>
      <div class="col-md-4 pl-4">
        <figure><img src="../../images/3rd_pic.PNG" width="250px" height="35px" style="position: relative; top: 10px;"></figure>
      </div>
    </div>
  </div>
    <div class="row bg-light" style="opacity: .7;">
      <div class="col-md-12 py-2 px-5 ">
            <a href="#" class="nav-link"  onclick="hideShowMenu()" id="hideShowMenu">
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
          <li class="nav-item bg-primary rounded">
            <a class="nav-link text-light disabled" >Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropmenu" data-toggle="collapse" data-target="#submenu">Issues</a>
            <div id="submenu" class="collapse">
              <ul>
                <li><a href="./issuePending.php">Pending</a></li>
                <li><a href="./issueApproved.php">Approved</a></li>
                <li><a href="./issueRejected.php">Rejected</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./adminTransaction.php">Transactions</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 py-2" id="main-area">
      <div class="alert alert-success text-center col-md-12" role="alert">
        Logged in successfully!!.
        <button type="button" class="close" data-dismiss="alert">x</button> 
        </div>
        <?php echo $statueLog;?>
        <div class="row text-center">
        
        <div class="col-md-3 border centered">
            <div>
                <form method="post" enctype="multipart/form-data">
                    <div class="card" style="width: 18rem;">
                            <div class="form-group text-center" id="input-image" style="height:200px; background-color:gray;">
                                <label for="exampleFormControlFile1 text-"><h2>Images</h2></label>
                                <input type="file" class="form-control-file  mt-4" id="File" name="files[]" multiple 
                                accept="image/*" style="background-color:gray;" required> 
                                
                              </div>
                        <div class="card-body" style="position:relative; top:-10px">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="title of a book" required>
                            <label for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="description of a book" required>
                        </div>
                        <ul class="list-group list-group-flush card-body">
                            <li class="list-group-item row"><label for="isbn" class="col-md-5">ISBN</label><input type="number" id="text" class="control-form col-md-7" name="isbn"required> </li>
                            <li class="list-group-item row"><label for="quantity" class="col-md-5">Quantity</label><input type="number" id="quantity" class="control-form col-md-7" 
                            name="quantity" min="1" required></li>
                        </ul>
                        <div class="card-body">
                            <button class="btn btn-primary" id="submit10" name="submit" value="UPLOAD">Add Book</button>
                        </div>
                    </div>
                  </form>
              </div>
          </div>
          <?php echo $mainBody;?>
        </div>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js"></script>
  <script type="text/javascript">
    function hideShowMenu(){
      if($("#hideShowMenuText").html() == "Close Menu"){
        $("#hideShowMenuIcon").removeClass("fa-align-right");
        $("#hideShowMenuIcon").addClass("fa-align-left");
        $("#hideShowMenuText").html("Show module menu");
        $("#dash").attr("hidden", true);
        $("#main-area").removeClass("col-md-10");
        $("#main-area").addClass("col-md-12");
      }
      else{
        $("#hideShowMenuIcon").removeClass("fa-align-left");
        $("#hideShowMenuIcon").addClass("fa-align-right");
        $("#hideShowMenuText").html("Close Menu");
        $("#dash").attr("hidden", false);
        $("#main-area").removeClass("col-md-12");
        $("#main-area").addClass("col-md-10");
      }
    }
    // $("form").submit(function(e){
    //     if(!($("#inputPassword2").val() === $("#repeatPassword2").val())){
    //         $("#error").html('<div class="alert alert-warning" role="alert">Passwords does not matches!! Try again</div>');
    //         return false;
    //     }
    //     else {
    //         $("#error").html("");
    //         return true;
    //     }
    // });

    // $("#submit-button").submit(function(e){
    //   $('#registration').modal('show');
    //   return false;
    // });
    
    
    $("#submit10").click(function(){
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length)>4){
         alert("You can only upload a maximum of 4 files");
        }
    });    

    $(document).ready(function() {
      $('#submit-button button').on('click', function(e){
      $("#editModal").val(this.id);
      $('#modalForm').modal('show');
      e.preventDefault();
  });
});

  </script>
</body>

</html>
