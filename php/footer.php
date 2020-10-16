
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
    $("form").submit(function(e){
        if(!($("#inputPassword2").val() === $("#repeatPassword2").val())){
            $("#error").html('<div class="alert alert-warning" role="alert">Passwords does not matches!! Try again</div>');
            return false;
        }
        else {
            $("#error").html("");
            return true;
        }
    });
  </script>
</body>

</html>
