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
    <title>NB Barta - Home</title>
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
        .dot{
            font-size:30px;
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
  </head>
  <body onload="startTime()">
    <!-----Navigation-Bar-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark py-2">
        <!--https://youtu.be/1ItKist58rs-->
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
        <span class="navbar-toggler-icon">
      </button>

      <div
        class="collapse navbar-collapse"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav px-4 ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"
              >Home <span class="sr-only">(current)</span></a
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
    <div class="elfsight-app-e9e7b4b3-c5df-4024-baa5-0df34a894a58" style="margin-top:85px;"></div>
	<!-- Headline -->
	<div class="container py-3">
 
	      <h4 class="py-2 text-uppercase text-danger">
					Breaking News :
        </h4>
        <div class="tcontainer">
				<div class="ticker-wrap">
			<div class="ticker-move py-3 text-secondary">
          <?php 
      $sql2 = "SELECT * FROM news WHERE isBreaking = 1 ORDER BY news_id DESC LIMIT 0,2";
      $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));    
       if(mysqli_num_rows($res2) > 0){
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
     if($bnews == 1 && $deleted == 0){
      echo "
           <div class='ticker-item topic'>
            <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >$topic</a>
           </div>
           <span class='text-dark dot'>&middot;</span>
          ";
     }
    }
  }
         ?>
         </div>
		</div>
		</div>
  </div>
  <br>
  <!-- Headline End -->
 

  <!-- latest News container start -->

      <div class='container latest-news-container'>
    
      <h4>Latest News In North Bengal</h4>
      <br/>
      <div class='row'>

    <?php 
      $sql2 = "SELECT * FROM news WHERE cat_id = 9 && isDeleted = 0 ORDER BY news_id DESC LIMIT 0,6";
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
     if($category == 9 && $deleted == 0){
      echo "
      <div class='col-md-4'>
    <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' class='img-fluid' alt=''>
      <br/> <br/>
    <b class='topic'>$topic</b>
      <br/>
      <small class='text-muted'><b>$reportdate</b></small>
       <p class='pt-2 text-secondary show-more-less-p'>$news_desc</p>
    </a>
    <br/><br/>
      </div>
    ";
     }
    }
  }
         if($number_of_rows > 2 && $deleted != 1){
          echo "
          <div class='container' align='center'><a class='btn btn-secondary' href='https://nbbarta.com/news.php'>More News</a></div>";
       }
        ?>
           </div>
      </div>
      <br/><br/>

  <!-- latest News container end -->



 <!-- weather container start -->

 <div class="container mb-5">
   <a class="weatherwidget-io" href="https://forecast7.com/en/22d9987d85/west-bengal/" data-label_1="NORTH BENGAL" data-label_2="WEATHER" data-icons="Climacons Animated" data-days="3" data-theme="original" data-basecolor="#DC3545" data-highcolor="#ffcccb" data-lowcolor="#ffccbb" data-cloudfill="#DC3545" >NORTH BENGAL WEATHER</a>
  </div>
    



    <!-- weather container end -->


  <!-- covid container start -->

  <div class="container covid-news-container mb-5">
    
  <h4>Covid 19</h4>
  <br/>

  <div class="row">
   
    <?php 
      $sql2 = "SELECT * FROM news WHERE cat_id = 1 && isDeleted = 0 ORDER BY news_id DESC LIMIT 0,3";
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
     if($category == 1 && $deleted == 0){
      echo "
      <div class='col-md-4'>
    <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' class='img-fluid' alt=''>
      <br/> <br/>
    <b class='topic'>$topic</b>
      <br/>
      <small class='text-muted'><b>$reportdate</b></small>
       <p class='pt-2 text-secondary show-more-less-p'>$news_desc</p>
    </a>
    <br/><br/>
      </div>
    ";
     }
    }
  }
         if($number_of_rows > 2 && $deleted != 1){
          echo "
          <div class='container' align='center'><a class='btn btn-secondary' href='https://nbbarta.com/news.php'>More News</a></div>";
       }
        ?>
  </div>

  </div>
 

  <!-- COVID container end -->
 
  

    <!-- sports container start -->

    <div class="container sports-news-container mb-5">
    
    <h4>Sports</h4>
    <br/>
  
    <div class="row">
  
   <?php 
      $sql2 = "SELECT * FROM news WHERE cat_id = 2 && isDeleted = 0 ORDER BY news_id DESC LIMIT 0,3";
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
     if($category == 2 && $deleted == 0){
      echo "
      <div class='col-md-4'>
    <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' alt='' class='img-fluid'>
      <br/> <br/>
   <b class='topic'>$topic</b>
      <br/>
      <small class='text-muted'><b>$reportdate</b></small>
       <p class='pt-2 text-secondary show-more-less-p'>$news_desc</p>
    </a>
     <br/><br/>
      </div>
          ";
     }
    }
  }
        if($number_of_rows > 2 && $deleted != 1){
          echo "
          <div class='container' align='center'><a class='btn btn-secondary' href='https://nbbarta.com/category-2.php'>More News</a></div>";
       }
        
        ?>
    </div>
  
    </div>
    
  
    <!-- sports container end -->


     <!-- youtube-video start -->


  <div class="container sports-news-container">
  <h4>Video News</h4>
    <div class="row pt-5 pb-5">
      <div class="col-md-4 p-4">
      <div class="embed-responsive embed-responsive-21by9">
      <iframe src="https://www.youtube.com/embed/Af2xmdcxWHY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
      </div>
      <div class="col-md-4 p-4">
      <div class="embed-responsive embed-responsive-21by9">
          <iframe src="https://www.youtube.com/embed/aei9d8aKvas" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
      </div>
      <div class="col-md-4 p-4">
      <div class="embed-responsive embed-responsive-21by9">
       <iframe src="https://www.youtube.com/embed/IuKn5nCTn1s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
      </div>
      </div>
		</div>

    <!-- youtube-video end  -->
        <!-- Entertainment container start -->

        <div class="container entertainment-news-container mb-5">
    
    <h4>Entertainment</h4>
    <br/>
  
    <div class="row">
  

    <?php 
      $sql2 = "SELECT * FROM news WHERE cat_id = 3 && isDeleted = 0 ORDER BY news_id DESC LIMIT 0,3";
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
     if($category == 3 && $deleted == 0){
      echo "
      <div class='col-md-4'>
    <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' alt='' class='img-fluid'>
      <br/> <br/>
   <b class='topic'>$topic</b>
      <br/>
      <small class='text-muted'><b>$reportdate</b></small>
       <p class='pt-2 text-secondary show-more-less-p'>$news_desc</p>
    </a>
     <br/><br/>
      </div>
          ";
     }
    }
  }
        if($number_of_rows > 2 && $deleted != 1){
          echo "
          <div class='container' align='center'><a class='btn btn-secondary' href='https://nbbarta.com/category-3.php'>More News</a></div>";
       }
        ?>
    </div>
  
    </div>

  
    <!-- entertainment container end -->

           <!-- politics container start -->

           <div class="container politics-news-container">
    
    <h4>Politics</h4>
    <br/>
  
    <div class="row">
  

    <?php 
      $sql2 = "SELECT * FROM news WHERE cat_id = 4 && isDeleted = 0 ORDER BY news_id DESC LIMIT 0,3";
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
     if($category == 4 && $deleted == 0){
      echo "
      <div class='col-md-4'>
     <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' alt='' class='img-fluid'>
      <br/> <br/>
   <b class='topic'>$topic</b>
      <br/>
      <small class='text-muted'><b>$reportdate</b></small>
       <p class='pt-2 text-secondary show-more-less-p'>$news_desc</p>
    </a>
     <br/><br/>
      </div>
          ";
     }
    }
  }
          if($number_of_rows > 2 && $deleted != 1){
          echo "
          <div class='container pt-2' align='center'><a class='btn btn-secondary' href='https://nbbarta.com/category-4.php'>More News</a></div><br/>";
       }
        ?>
    </div>
  
    </div>
  
    <!-- politics container end -->


         <!-- ad-1 start -->


    
 <div class="container mt-5 mb-5">
    <video autoplay muted loop class="img-fluid img-responsive h-50 w-100">
  <source src="./ads/ad-1.mp4" type="video/mp4">
</video>
  </div>


  <!-- ad-1 end -->

           <!-- international container start -->

           <div class="container international-news-container mb-5">
    
    <h4>International</h4>
    <br/>
  
    <div class="row">
  
 
    <?php 
      $sql2 = "SELECT * FROM news WHERE cat_id = 5 && isDeleted = 0 ORDER BY news_id DESC LIMIT 0,3";
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
     if($category == 5 && $deleted == 0){
      echo "
      <div class='col-md-4'>
     <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' alt='' class='img-fluid'>
      <br/> <br/>
    <b class='topic'>$topic</b>
      <br/>
      <small class='text-muted'><b>$reportdate</b></small>
       <p class='pt-2 text-secondary show-more-less-p'>$news_desc</p>
    </a>
     <br/><br/>
      </div>
          ";
     }
    }
  }
       if($number_of_rows > 2 && $deleted != 1){
          echo "
          <div class='container' align='center'><a class='btn btn-secondary' href='https://nbbarta.com/category-5.php'>More News</a></div>";
       }
        ?>
    </div>
  
    </div>

  
    <!-- international container end -->


           <!-- Health container start -->

           <div class="container health-news-container mb-5">
    
    <h4>Health</h4>
    <br/>
  
    <div class="row">
  

    <?php 
      $sql2 = "SELECT * FROM news WHERE cat_id = 6 && isDeleted = 0 ORDER BY news_id DESC LIMIT 0,3";
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
     if($category == 6 && $deleted == 0){
      echo "
      <div class='col-md-4'>
     <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' alt='' class='img-fluid'>
      <br/> <br/>
  <b class='topic'>$topic</b>
      <br/>
      <small class='text-muted'><b>$reportdate</b></small>
       <p class='pt-2 text-secondary show-more-less-p'>$news_desc</p>
    </a>
     <br/><br/>
      </div>
          ";
     }
    }
  }
        if($number_of_rows > 2 && $deleted != 1){
          echo "
          <div class='container' align='center'><a class='btn btn-secondary' href='https://nbbarta.com/category-6.php'>More News</a></div>";
       }
        ?>
    </div>
  
    </div>
  
    <!-- health container end -->

   
         <!-- ad-2 start -->


    <!--<div class="container text-center mb-5">-->
    
    <!--</div>-->

<!-- ad-2 end -->


           <!-- Technology container start -->

           <div class="container technology-news-container mb-5">
    
    <h4>Technology</h4>
    <br/>
  
    <div class="row">
  
    
    <?php 
      $sql2 = "SELECT * FROM news WHERE cat_id = 7 && isDeleted = 0 ORDER BY news_id DESC LIMIT 0,3";
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
     if($category == 7 && $deleted == 0){
      echo "
      <div class='col-md-4'>
     <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' alt='' class='img-fluid'>
      <br/> <br/>
  <b class='topic'>$topic</b>
      <br/>
      <small class='text-muted'><b>$reportdate</b></small>
       <p class='pt-2 text-secondary show-more-less-p'>$news_desc</p>
    </a>
     <br/><br/>
      </div>
          ";
     }
    }
  }
          if($number_of_rows > 2 && $deleted != 1){
          echo "
          <div class='container' align='center'><a class='btn btn-secondary' href='https://nbbarta.com/category-7.php'>More News</a></div>";
       }
        ?>
    </div>
  
    </div>
  
    <!-- technology container end -->

           <!-- environment container start -->

           <div class="container environment-news-container mb-5">
    
    <h4>Environment</h4>
    <br/>
  
    <div class="row">
  
   <?php 
      $sql2 = "SELECT * FROM news WHERE cat_id = 8 && isDeleted = 0 ORDER BY news_id DESC LIMIT 0,3";
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
     if($category ==8 && $deleted == 0){
      echo "
      <div class='col-md-4'>
     <a class='news_display' href='display_news.php?news_id=$news_id&category=$category' >
      <img src='./images/$images' alt='' class='img-fluid'>
      <br/> <br/>
   <b class='topic'>$topic</b>
      <br/>
      <small class='text-muted'><b>$reportdate</b></small>
       <p class='pt-2 text-secondary show-more-less-p'>$news_desc</p>
    </a>
     <br/><br/>
      </div>
          ";
     }
    }
  }
          if($number_of_rows > 2 && $deleted != 1){
          echo "
          <div class='container' align='center'><a class='btn btn-secondary' href='https://nbbarta.com/category-8.php'>More News</a></div>";
       }
        ?>
        
    </div>
  
    </div>
  
    <!-- environment container end -->

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
    <script type="text/javascript" scr="js/app.js"></script>
    
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
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
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
