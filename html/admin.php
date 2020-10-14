<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    /* #dashboard{
        height: 100%;
        width: 200px;
        border: 2px black solid;
        margin: 10px 0px 0px 10px;
         */
    .main-content {
      background-color: #fff;
    }

    a {
      color: inherit;
    }

    .breadcrumb {
      background-color: transparent !important;
      padding: .1rem 0rem !important;
      margin-bottom: .25rem !important;
    }

    .dropmenu::after {
      display: inline-block;
      width: 0;
      height: 0;
      margin-left: 1.6em;
      content: "";
      border-top: .3em solid;
      border-right: .3em solid transparent;
      border-bottom: 0;
      border-left: .3em solid transparent;
    }

    ul {
      list-style-type: none;
    }
    #log-in{
      position: relative;
      top: 20px;
      left: 10px;
    } 
  </style>

  <title>Library Management</title>
</head>


<body>
  <!-- <div class="pt-3 border pl-3">
    <nav class="navbar navbar-expand-sm bg-white navbar-primary ">
    
      <a class="navbar-brand" href="#" style="margin-left: 20px;"><img src="./images//logo.PNG" alt="Logo"
          width="150"></a>
    </nav>
  </div> -->

  <div class="row ">
      <figure><img src="../images/top_nav.PNG" width="100%" height="40px"></figure>
  </div>
  <div class="row">
    <div class="col-xl-10">
      <figure><img src="../images/second_nav.PNG" width="100%" height="80px"></figure>
    </div>
    <div class="col-xl-2">
      <div class="dropdown">
        <button type="button" class="btn btn-primary" id="log-in">
          Admin
        </button>
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
            <li class="breadcrumb-item">Library</li>
          </ol>
        </nav>
      </div>
      <div class="col-md-4 pl-4">
        <figure><img src="../images/3rd_pic.PNG" width="250px" height="35px" style="position: relative; top: 10px;"></figure>
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
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropmenu" data-toggle="collapse" data-target="#submenu">Issues</a>
            <div id="submenu" class="collapse">
              <ul>
                <li><a href="">Pending</a></li>
                <li><a href="">Approved</a></li>
                <li><a href="">Rejected</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Transactions</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 py-2" id="main-area">
        <div class="row text-center">
          <div class="col-md-3">
            <div class="border py-2">  
              <figure><img src="../images/logo.PNG" width="90%" height="280"> </figure>
              <button>dscwd</button>
            </div>
          </div>
          <div class="col-md-3">
            <div class="border py-2">  
              <figure><img src="../images/logo.PNG" width="90%" height="280"> </figure>
              <button>dscwd</button>
            </div>
          </div>
          <div class="col-md-3">
            <div class="border py-2">  
              <figure><img src="../images/logo.PNG" width="90%" height="280"> </figure>
              <button>dscwd</button>
            </div>
          </div>
          <div class="col-md-3">
            <div class="border py-2">  
              <figure><img src="../images/logo.PNG" width="90%" height="280"> </figure>
              <button>dscwd</button>
            </div>
          </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
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
  </script>
</body>

</html>