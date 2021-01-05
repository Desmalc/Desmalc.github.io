<?php
require('Persistence.php');
$comment_post_ID = 1;
$db = new Persistence();
$comments = $db->get_comments($comment_post_ID);
$has_comments = (count($comments) > 0);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Desmalc Blog</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Custom Fonts -->
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/shade.css">

  <!-- Custom CSS -->
  <link href="css/stylish-portfoio.min.css" rel="stylesheet">

</head>
    
<body id="page-top">

  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
<nav class="navbar navbar-dark bg-primary navbar-expand-sm fixed-top">
    <div class="container">
    <div class="row">
                <div class="col-1 d-sm-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon" ></span>
        </button>
            </div>
    <div class=" col-sm-5 collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active"><a class="nav-link active"><i class="fa fa-home fa-lg"></i>Home</a></li>
    <li class="nav-item"><a class="nav-link" href="aboutus.html"><i class="fa fa-info fa-lg"></i>About Us</a></li>
    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-list fa-lg"></i>Menu</a></li>
    <li class="nav-item"><a class="nav-link" href="contactus.html"><i class="fa fa-address-card fa-lg"></i>Contact</a></li>
    </ul>
        <span class="btn btn-primary navbar-text">
            <a data-toggle="modal" id="modalbutton" >Login</a>
        </span>
        <span class="btn btn-primary navbar-text">
            <a href="register.php" >Register as a Programmer</a>
        </span>
    </div>
                <div class="col-3  offset-1 col-sm-2 offset-sm-2">
            <a class="navbar-brand mr-20px " href="#"><h3 style="color:rgba(250, 255, 255, 0.1) 0%; font-family: reqqe;">Desmalc<br> Programmers blog</h3></a>
            </div>
        <div class="col-2 offset-3 col-sm -3 offset-sm-0 order-sm-first" >
        <img style="height: 40px; width:83px; padding: 0px 0px; margin: 0px 0px 0px 0px;"   src="img/blackdefault1.png"/>
            </div>   
    </div>
    </div>
    </nav>
    
    <body>
    <div class="container">
    <div class="row row-content">
           <div class="col-12">
              <h3>Welcome to the blog</h3>
           </div>
           <div class="col-12 col-md-9 mt-100px">
<h1 class="mt-100px">Tracking Welcome welcome to the blog <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bdd4c7c8d9d8ced0d2d3d98985fddad0dcd4d193ded2d0">[email&#160;protected]</a></h1>
            
<h4><span id="Problemmsg"></span></h4>
<ol id="posts-list" class="hfeed<?php echo($has_comments?' has-comments':’); ?>">
  <li class="no-comments">Be the first to add a comment.</li>
  <?php
    foreach ($comments as $comment) {
      ?>
      <li><article id="comment_<?php echo($comment['id']); ?>" class="hentry">  
        <footer class="post-info">
          <abbr class="published" title="<?php echo($comment['date']); ?>">
            <?php echo( date('d F Y', strtotime($comment['date']) ) ); ?>
          </abbr>

          <address class="vcard author">
            By <a class="url fn" href="#"><?php echo($comment['comment_author']); ?></a>
          </address>
        </footer>

        <div class="entry-content">
          <p><?php echo($comment['comment']); ?></p>
        </div>
      </article></li>
      <?php
    }
  ?>
</ol>
               
<div id="respond">
  <h3>Leave a Comment</h3>

  <form  method="POST" id="commentform">
<input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
    <label for="comment_author" class="required">Your name</label>
    <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">

    <label for="email" class="required">Your email;</label>
    <input type="email" name="email" id="email" value="" tabindex="2" required="required">

    <label for="comment" class="required">Your message</label>
    <textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>

    <!-- comment_post_ID value hard-coded as 1 -->
    <input type="hidden" name="comment_post_ID" value="1" id="comment_post_ID" />
    <input name="submit" type="submit" value="Submit comment" />
    </form>
    
</div>
</div>
        </div>
        </div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        
          <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/stylish-portfolio.min.js"></script>
         
        <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
   <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="js1/scripts.js"></script>
    <script src="js1/blogpost.js"></script>
        </body>
    
               <p> Logout as a programmer?<a href="logout.php">Logout</a></p>
            