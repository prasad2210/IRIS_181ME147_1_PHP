<?php

  session_start();

  if (array_key_exists("id1", $_COOKIE) && $_COOKIE['id1']) {      
    $_SESSION['id'] = $_COOKIE['id1'];

  }

  if (array_key_exists("id", $_SESSION) ) {
              
    include("../php//connection.php");

    $query = "SELECT id, collegeID FROM `users`";
    $row = mysqli_fetch_array(mysqli_query($conn, $query));
  }
  else{
    header("Location: ../../index.php?logout=1");
  }

  $mainBody = '';
  $count = 0;
  $query = "SELECT * FROM `issue`";
  $result = mysqli_query($conn, $query);
  if($result){
      if(mysqli_num_rows($result)>0){
          while($row1 = mysqli_fetch_assoc($result)){
            if($row1['tag'] == "2"){
              $count++;
              $diff = abs(strtotime($row1['returnDate']) - strtotime($row1['issueDate']));
              $duration = floor($diff/ (60*60*24));
              if($duration == "1" || $duration == "0"){
                $duration .= " day";
              }
              else if($duration > "1"){
                $duration .= " days";
              }
              else{
                $duration = "--";
              }
             $query2 = "SELECT * FROM `books` WHERE id = '".mysqli_real_escape_string($conn, $row1['bookID'])."'";
             $row2 = mysqli_fetch_array(mysqli_query($conn, $query2));
             $query3 = "SELECT `name` FROM `users` WHERE id = '".mysqli_real_escape_string($conn, $row1['userID'])."'";
             $row3 = mysqli_fetch_array(mysqli_query($conn, $query3));
             $mainBody .= '<tr>
             <th scope="row">'.$count.'</th>
             <td>'.$row3["name"].'</td>
             <td>'.$row2["title"].'</td>
             <td>'.$row1["issueDate"].'</td>
             <td>'.$row1["returnDate"].'</td>
             <td>'.$duration.'</td>


           </tr>';
         }
       }
     }
   }
//    $error = '';
//   if(array_key_exists("returnBook", $_POST)){
//     $query = "UPDATE `issue` SET tag = '".mysqli_real_escape_string($conn, $_POST['returnBook'])."', returnDate = '".date('Y-m-d')."'
//     WHERE  id = '".mysqli_real_escape_string($conn, $_POST['id'])."'LIMIT 1";
    
//     if(mysqli_query($conn, $query)){
//       $query = "SELECT `bookID` FROM `issue` WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'";
//       $result = mysqli_query($conn, $query);
//       $row1 = mysqli_fetch_array($result);

//       $query = "SELECT `quantity` FROM `books` WHERE id = '".mysqli_real_escape_string($conn, $row1['bookID'])."'";
//       $row2 = mysqli_fetch_array(mysqli_query($conn, $query));
//       if($row2['quantity']){
//         $row2['quantity'] = $row2['quantity'] + 1;
//         $query1 = "UPDATE `books` SET quantity = '".mysqli_real_escape_string($conn, $row2['quantity'])."' WHERE id = '".mysqli_real_escape_string($conn, $row1['bookID'])."'";
//         if(mysqli_query($conn, $query1)) {
//           header("Refresh:0");
//           $error = '<div class="alert alert-success text-center col-md-12" role="alert">Book returned successfully<button type="button" class="close" data-dismiss="alert">x</button> </div>';
//           }
//         else{
//           $error = '<div class="alert alert-danger text-center col-md-12" role="alert">Could not return a book. please try again<button type="button" class="close" data-dismiss="alert">x</button> </div>';
//         }
//       }
//     }
//   }
  include("../php//header.php");


//   include("../php//connection.php");
//   $mainBody = '';
//   $query1 = "SELECT * FROM `books`";
//   $result1 = mysqli_query($conn, $query1);
//   if (mysqli_num_rows($result1) > 0) {
//     // output data of each row
//     while($row1 = mysqli_fetch_assoc($result1)){
//       $count = 0;
//       $isbn = $row1['isbn'];
//       $query2 = "SELECT file_name FROM `paths` WHERE isbn = '$isbn'";
//       $result2 = mysqli_query($conn, $query2);
//       $subBody = '';
//       if($result2){
//         if(mysqli_num_rows($result2)>0){
//           while($row2 = mysqli_fetch_assoc($result2)){

//             if($count==0){
//               $subBody .= '<div class="carousel-item active">
//               <img class="d-block w-100" src="../'.$row2['file_name'].'" alt="'.$row2['file_name'].'">
//               </div>';
//             }
//             // echo $count++;
//             else{
//               $subBody .= '<div class="carousel-item">
//               <img class="d-block w-100" src="../'.$row2['file_name'].'" alt="'.$row2['file_name'].'">
//               </div>';
//             }
//             $count++;
//           }
//           //echo $subBody."<br><br>";
//         }
//       }
//       $mainBody .=
//       '<div class="col-md-3">
//       <div>
//         <div class="card">
//            <div id="'.$row1['id'].'" class="carousel slide" data-ride="carousel" style="height:250px; width:170px; margin: 0 auto;">
//               <div class="carousel-inner">
//               '.
//                 $subBody
//               .'
//               </div>
//               <a class="carousel-control-prev" href="#'.$row1['id'].'" role="button" data-slide="prev">
//                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
//                   <span class="sr-only">Previous</span>
//               </a>
//               <a class="carousel-control-next" href="#'.$row1['id'].'" role="button" data-slide="next">
//                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
//                   <span class="sr-only">Next</span>
//               </a>
//               </div>
//           <div class="card-body">
//             <h5 class="card-title">'.$row1["title"].'</h5>
//             <p class="card-text">'.$row1["description"].'</p>
//           </div>
//           <ul class="list-group list-group-flush">
//             <li class="list-group-item">ISBN:       '.$row1["isbn"] .'</li>
//             <li class="list-group-item">Quantities: '.$row1["quantity"].'</li>
//           </ul>
//           <div class="card-body mb-4" style="margin:0 auto; position:relative; top: 8px; ">
//           <form id="submit-button" method="POST">
//           <button type="submit" name="submit1" value="'.$row1['id'].'" id="'.$row1['id'].'" class="btn btn-outline-primary">Create Request</button>
//           </form>
//           </div>
//         </div>
//       </div>
//     </div>';
//     } 
//   }
//   $error = '';
//   $tag = 0;
//   if(array_key_exists("submit1", $_POST)){
//     $query = "INSERT INTO `issue` (`userID`, `bookID`) VALUES ('".mysqli_real_escape_string($conn, $_SESSION['id'])."', '".mysqli_real_escape_string($conn, $_POST['submit1'])."')";
//     if(!mysqli_query($conn, $query)){
//       $error = '<div class="alert alert-danger text-center col-md-12" role="alert">Could not send a request. please try again.<button type="button" class="close" data-dismiss="alert">x</button> </div>';
//     }
//     else{
//       $error = '<div class="alert alert-success text-center col-md-12" role="alert">issue request is sent.<button type="button" class="close" data-dismiss="alert">x</button> </div>'; 
//     }
//   }
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
        <a href="../../index.php?logout=1"><button type="button" class="btn btn-primary" id="log-out">
         Log-out
        </button></a>
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
            <li class="breadcrumb-item"><a href="../../index.php?logout=1">Library</a></li>
            <li class="breadcrumb-item"><a href="./admin.php">admin</a></li>
            <li class="breadcrumb-item">Transactions</li>
          </ol>
        </nav>
      </div>
      <div class="col-md-4 pl-4">
        <figure><img src="../../images/3rd_pic.PNG" width="250px" height="35px" style="position: relative; top: 10px;"></figure>
      </div>
    </div>
  </div>
    <div class="row bg-light" style="opacity: .7;">
      <div class="col-md-12 py-2 px-5 border">
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
          <li class="nav-item">
            <a class="nav-link" href="./admin.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropmenu" data-toggle="collapse" data-target="#submenu">Issues</a>
            <!-- <div id="submenu" class="collapse"> -->
              <ul>
                <li><a href="./issuePending.php"  >Pending</a></li>
                <li><a href="./issueApproved.php">Approved</a></li>
                <li><a href="./issueRejected.php">Rejected</a></li>
              </ul>
            <!-- </div> -->
          </li>
          <li class="nav-item bg-primary rounded">
            <a class="nav-link text-light"  disabled>Transactions</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 py-2" id="main-area">
      <!-- <div class="alert alert-success text-center col-md-12" role="alert">
        Logged in successfully!!.
        <button type="button" class="close" data-dismiss="alert">x</button> 
        </div> -->
        <?php //echo $error;?>
        <div class="row text-center mx-2">
        <table class="table table-striped ">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Student Name</th>
                <th scope="col">Book Name</th>
                <th scope="col">Issue Date</th>
                <th scope="col">Return Date</th>
                <th scope="col">Duration</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $mainBody;?>
            </tbody>
            </table>
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
    
//     $(document).ready(function() {
//       $('#submit-button button').on('click', function(e){
//       $("#editModal").val(this.id);
//       
//       e.preventDefault();
//   });
// });

  </script>
</body>

</html>
