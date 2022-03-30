<?php
require_once("conn/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
     <link href="https://fonts.googleapis.com/css2?family=Galada&display=swap" rel="stylesheet">
<style>
        .news_display{
            text-decoration:none !important;
            color:#666;
        }
        .news_display:hover{
            color:#666;
        }
         .topic{
            font-family:'Galada', cursive;
            font-size:19px;
            color:#333 !important;
            font-weight:500 !important;
        }
            #scrolltoTop {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 50px; /* Place the button at the bottom of the page */
        right: 30px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        font-size: 20px; /* Increase font size */
        
}
 #scrolltoTop :hover{
     color:white;
     
 }
    </style>
    <title>NB Barta</title>
  </head>
  <body onload="startTime()">

    <!-----Navigation-Bar-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark py-2">
    <a class="navbar-brand" href="https://nbbarta.com" >
 <img src="./graphics/logo.png" alt="Logo" height="60" width="60">
    </a>  
     <a class=" text-light nav-link"> Time : <well id="time"></well></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav px-3 ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="news.php">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="category-1.php">Covid 19</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="category-2.php">Sports</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="category-3.php">Entertainment <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="category-4.php">Politics</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="category-5.php">International</a>
          </li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="category-6.php">Health</a>
          <a class="dropdown-item" href="category-7.php">Technology</a>
          <a class="dropdown-item" href="category-8.php">Environment</a>
      </li>
  
   
        </ul>
      </div>
    </nav>
    <!-- Navigation-Bar-End-->

     <!-- The news start-->
<br/>
<?php 
echo " <br/><br/><br/><br/>";
      $sql2 = "SELECT * FROM news  WHERE cat_id = 3 ORDER BY news_id DESC";
      $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));    
       if(mysqli_num_rows($res2) > 0){
        while($row = mysqli_fetch_assoc($res2)){
            $news_id = $row['news_id'];
              $topic = $row['topic'];
              $news_desc = $row['news_description'];
              $dist = $row['d_id'];
              $city = $row['city'];
              $reportdate = $row ['report_date'];
              $reportedBy = $row['reported_by'];
              $category = $row['cat_id'];
              $bnews    = $row['isBreaking'];
              $deleted    = $row['isDeleted'];
              $images = $row['images'];
     if($category == 3 && $deleted == 0){
      echo "
      <div class='container-fluid>
      <div class='row'>
              <div class='col-md-12'>
               <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
                  <div class='card p-3'>
                    <div class='row'>
                    <img class='card-img-top col-md-3 img-fluid' src='./images/$images' alt=Card image cap'>
                      <div class='card-block col-md-9'>
                           <h4 class='card-title topic pt-3'>$topic</h4>
                          <small class='text-muted'><b>$reportdate</b></small>
                          <br/><br/>
                          <h6 class='card-subtitle mb-2 text-secondary show-more-less-p'>$news_desc</h6>
                      </div>
                      </div>
                  </div>
                  </a>
              </div>
        </div>
        </div>
        <br/><br/>
          ";
     }
    }
  }
         ?>

    <!-- The news end -->

<button class="btn btn-dark" onclick="topFunction()" id="scrolltoTop"><i class="fa fa-arrow-up" title="Go to top"></i></button>
<!-- Footer-Start-->
<footer class="footer bg-dark text-white text-center py-4">
    <div class="container text-center">
					<ul class="list-unstyled list-inline social text-center">
					<li class="list-inline-item px-2"><a href="https://www.facebook.com/NBbarta2020" class="text-primary lead" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item px-2"><a href="https://www.instagram.com/nbbarta/" class="text-light lead" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item px-2"><a href="https://www.youtube.com/channel/UCGpMZCmlqVhDUqYlE0RHxbQ" class="text-danger lead" target="_blank"><i class="fa fa-youtube"></i></a></li>
						<li class="list-inline-item px-2"><a href="https://twitter.com/NbBarta" class="text-info lead" target="_blank"><i class="fa fa-twitter"></i></a></li>
					</ul>
        </div>
      Copyrights &copy;
      <a class="text-light text-decoration-none" href="#">NB Barta</a>
      2020
      <br>
     Website created by
      <a class="text-info text-decoration-none" href="https://codealpha.in/" target="_blank">CodeAlpha</a>
    </footer>
    <!---Footer-End-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    
    <script src="js/showmoreless.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(e){
            $('.show-more-less-p').myOwnLineShowMoreLess({
                showLessLine:5
            });
         
        });
    </script>
    
        <script>
    $(document).ready(function(){
    $(document).bind("cut copy",function(e) {
    e.preventDefault();
    });
});
</script>
<script>
$(document).ready(function(){
   $(document).bind("contextmenu",function(e){
      return false;
   });
});
</script>

<script>
    function startTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('time').innerHTML =
      h + ":" + m + ":" + s ;
      var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }

    </script>
    <script>
        //Get the button:
mybutton = document.getElementById("scrolltoTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
    </script>
    
</body>
</html>