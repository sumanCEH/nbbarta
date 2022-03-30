<?php
require_once("conn/conn.php");
mysqli_query($conn, 'SET CHARACTER SET utf8');

 function real_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

      $this_news_id = $_GET['news_id'];
      $this_cat_id = $_GET['category'];
      $sql2 = "SELECT * FROM news WHERE news_id = '".$this_news_id."' && isDeleted = 0";
      $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));    
       if(mysqli_num_rows($res2) > 0){
        while($row = mysqli_fetch_assoc($res2)){
              $news_id = $row['news_id'];
              $topic = real_input($row['topic']);
              $news_desc = $row['news_description'];
              $dist = $row['d_id'];
              $city = $row['city'];
              $reportdate = $row ['report_date'];
              $reportedBy = $row['reported_by'];
              $category = $row['cat_id'];
              $bnews    = $row['isBreaking'];
              $deleted    = $row['isDeleted'];
              $image = $row['images'];
        }
       }
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="<?php echo $topic; ?>" />
     <meta property="og:image" content="https://nbbarta.com/images/<?php echo $image; ?>" />
    <link rel="stylesheet" href="css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Galada&display=swap" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <title>NB Barta</title>
  </head>
  <style>
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
  <body onload="startTime()">

    <!-----Navigation-Bar-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark py-2">
     <a class="navbar-brand" href="https://nbbarta.com" >
     <img src="./graphics/logo.png" alt="Logo" height="50" width="50">
     
      <a class=" text-light nav-link"> Time : <well id="time"></well></a>
 
    </a>  
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
          <li class="nav-item">
            <a class="nav-link" href="category-3.php">Entertainment</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="category-4.php">Politics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="category-8.php">Environment</a>
          </li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="category-6.php">Health</a>
          <a class="dropdown-item" href="category-7.php">Technology</a>
          <a class="dropdown-item" href="category-5.php">International</a>
      </li>
  
        </ul>
      </div>
    </nav>
    <!-- Navigation-Bar-End-->

      <!-- The news start-->
<br/>
<?php 
echo " <br/><br/>";
      $this_news_id = $_GET['news_id'];
      $sql2 = "SELECT * FROM news ORDER BY news_id DESC";
      $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));    
       if(mysqli_num_rows($res2) > 0){
        while($row = mysqli_fetch_assoc($res2)){
              $news_id = $row['news_id'];
              $topic = $row['topic'];
              $news_desc = nl2br($row['news_description']);
              $dist = $row['d_id'];
              $city = $row['city'];
              $reportdate = date('d-m-Y', strtotime($row['report_date']));
              $reportedBy = $row['reported_by'];
              $category = $row['cat_id'];
              $bnews    = $row['isBreaking'];
              $deleted  = $row['isDeleted'];
              $images = $row['images'];
            if($this_news_id == $news_id){
                echo "
                <div class='container-fluid px-4'>
                <div class='row'>
                        <div class='col-md-12 mt-3 mb-3'>
                            <div class='card p-3' style='border:none;'>
                              <div class='row'>
                              <img class='card-img-top col-md-4 h-75 w-100' src='./images/$images' alt=Card image cap'>
                                <div class='card-block col-md-8'>
                                    <h4 class='card-title mt-2 topic'>$topic</h4>
                                    <small class='text-muted'><b>$reportdate</b></small>
                                    <br/><br/>
                                    <h6 class='card-subtitle mb-2 text-secondary'>$news_desc</h6>
                   <br/>              <div class='text-left sharethis-inline-share-buttons'></div>
                                </div>
                                </div>
                            </div>
                        </div>
                  </div>
                  </div>
                  <br/><br/>
                    ";
            }
   
    }
  }
         ?>
         
          
 <!-- Related Post container start -->
 

      <div class='container-fluid latest-news-container px-5'>
    
      <h4>Related Post</h4>
      <br/>
      <div class='row'>

    <?php 
    $this_news_id = $_GET['news_id'];
    $this_cat_id = $_GET['category'];
      $sql2 = "SELECT * FROM news WHERE news_id != $this_news_id && cat_id = $this_cat_id ORDER BY news_id DESC LIMIT 0,3";
      $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
      $number_of_rows = mysqli_num_rows($res2);
       if($number_of_rows > 0){
        while($row = mysqli_fetch_assoc($res2)){
              $news_id = $row['news_id'];
              $topic = $row['topic'];
              $news_desc = $row['news_description'];
              $dist = $row['d_id'];
              $city = $row['city'];
              $reportdate = date('d-m-Y', strtotime($row['report_date']));
              $reportedBy = $row['reported_by'];
              $category = $row['cat_id'];
              $bnews    = $row['isBreaking'];
              $deleted    = $row['isDeleted'];
              $images = $row['images'];
     if( $deleted == 0){
      echo "
      <div class='col-md-4'>
    <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' class='img-fluid' alt=''>
      <br/> <br/>
    <b class='topic text-dark'>$topic</b>
                      </br>              <small class='text-muted'><b>$reportdate</b></small>
    </a>
    <br/><br/>
      </div>
    ";
     }
    }
       }
        ?>
           </div>
      </div>
      <br/><br/>

 
  <!-- Related Post container end -->
         

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
  <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<script src="js/showmoreless.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(e){
        $('.show-more-less-p').myOwnLineShowMoreLess({
            showLessLine:5
        });
     
    });
</script>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f5fa118f875b3001244a690&product=inline-share-buttons" async="async"></script>

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