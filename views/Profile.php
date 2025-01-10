<?php
            require_once '../database/Connection.php';            
            require_once __DIR__ . '/../classes/gestion_profile.php';


            $pdo = (new Connection())->getPDO();
            $profileManager = new GestionProfile($pdo);


            if (!isset($_SESSION['user']['id_user'])) {
                die("Vous devez être connecté.");
            }
            
            $id_user = $_SESSION['user']['id_user'];
            $profileData = $profileManager->getProfileById($id_user);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = $_POST['username'] ?? '';
                $prenom = $_POST['prenom'] ?? '';
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';

                $profile_image = null;
                if (isset($_FILES['profile_image'])) {
                    $uploadDir = '../uploads/';
                    $imageName = basename($_FILES['profile_image']['name']);
                    $imagePath = $uploadDir . $imageName;

                    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $imagePath)) {
                        $profile_image = $imageName;
                    }
                }

                $profileManager->updateProfile($id_user, $nom, $prenom, $email, $password, $profile_image);
                header("Location: profile.php");
                exit();
            }
?>

<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
   <title>Abstract</title>
   <meta name="description" content="">  
   <meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="../css/base.css">
   <link rel="stylesheet" href="../css/vendor.css">  
   <link rel="stylesheet" href="../css/main.css">
        

   <!-- script
   ================================================== -->
   <script src="js/modernizr.js"></script>
   <script src="js/pace.min.js"></script>

   <!-- favicons
   ================================================== -->
   <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
   <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

   <!-- header 
   ================================================== -->
   <header class="short-header">   

    <div class="gradient-block"></div>   

    <div class="row header-content">

        <div class="logo">
            <a href="index.php">Author</a>
        </div>

        <nav id="main-nav-wrap">
				<ul class="main-navigation sf-menu">
					<li class="current"><a href="index.php" title="">Home</a></li>									
					<li class="has-children">
						<a href="category.html" title="">Categories</a>
						<ul class="sub-menu">
			            <li><a href="category.html">Wordpress</a></li>
			            <li><a href="category.html">HTML</a></li>
			            <li><a href="category.html">Photography</a></li>
			            <li><a href="category.html">UI</a></li>
			            <li><a href="category.html">Mockups</a></li>
			            <li><a href="category.html">Branding</a></li>
			         </ul>
					</li>
					<li class="has-children">
						<ul class="sub-menu">
			            <li><a href="single-video.html">Video Post</a></li>
			            <li><a href="single-audio.html">Audio Post</a></li>
			            <li><a href="single-gallery.html">Gallery Post</a></li>
			            <li><a href="single-standard.html">Standard Post</a></li>
			         </ul>
					</li>
					<li><a href="Profile.php" title="">Profile</a></li>	
					<li><a href="favori.php" title="">article favori</a></li>										
				</ul>
			</nav> <!-- end main-nav-wrap -->

        <div class="search-wrap">
            
            <form role="search" method="get" class="search-form" action="#">
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="s" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#" id="close-search" class="close-btn">Close</a>

        </div> <!-- end search wrap -->  

        <div class="triggers">
            <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
            <a class="menu-toggle" href="#"><span>Menu</span></a>
        </div> <!-- end triggers -->   
       
    </div>         
    
   </header> <!-- end header -->


   <!-- content
   ================================================== -->
   <section id="content-wrap" class="site-page">
    <div class="row">
        <div class="col-twelve">

            <section>  

                <div class="content-media">      
                    <?php                
                $profileManager->affichage($_SESSION['user']['id_user']);
                ?>   
                </div>

                <div class="primary-content">

                    <h1 class="entry-title add-bottom">GESTION DE PROFIL</h1>    

                    <!-- Formulaire de gestion de profil -->
                    <form  method="POST">
                       
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur:</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Entrez votre nom d'utilisateur" required>
                        </div>

						<div class="form-group">
                            <label for="prenom">Prénom:</label>
                            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Entrez votre prénom" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse email:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre adresse email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe:</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Entrez un nouveau mot de passe" required>
                        </div>


                        <button type="submit" name="sub" class="button">Enregistrer les modifications</button>
                    </form>

                </div>                        

            </section>         

        </div> <!-- end col-twelve -->
    </div> <!-- end row -->
        
   </section> <!-- end content -->

   
   <!-- footer
   ================================================== -->
   <footer>

    <div class="footer-main">
   
        <div class="row">  

            <div class="col-four tab-full mob-full footer-info">            

                <h4>About Our Site</h4>

                   <p>
                   Lorem ipsum Ut velit dolor Ut labore id fugiat in ut fugiat nostrud qui in dolore commodo eu magna Duis cillum dolor officia esse mollit proident Excepteur exercitation nulla. Lorem ipsum In reprehenderit commodo aliqua irure labore.
                   </p>

              </div> <!-- end footer-info -->

            <div class="col-two tab-1-3 mob-1-2 site-links">

            <h4>Site Links</h4>

            <ul>
                <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>

            </div> <!-- end site-links -->  

            <div class="col-two tab-1-3 mob-1-2 social-links">

            <h4>Social</h4>

            <ul>
                <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Dribbble</a></li>
                    <li><a href="#">Google+</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
                        
            </div> <!-- end social links --> 

            <div class="col-four tab-1-3 mob-full footer-subscribe">

            <h4>Subscribe</h4>

            <p>Keep yourself updated. Subscribe to our newsletter.</p>

            <div class="subscribe-form">
            
                <form id="mc-form" class="group" novalidate="true">

                        <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Type &amp; press enter" required=""> 
                
                        <input type="submit" name="subscribe" >
                
                        <label for="mc-email" class="subscribe-message"></label>
                
                        </form>

            </div>                 
                
            </div> <!-- end subscribe -->         

          </div> <!-- end row -->

    </div> <!-- end footer-main -->

      <div class="footer-bottom">
        <div class="row">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright Abstract 2016</span> 
                    <span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>                 
                 </div>

                 <div id="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
                 </div>         
            </div>

        </div> 
      </div> <!-- end footer-bottom -->  

   </footer>  

   <div id="preloader"> 
        <div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>

</body>

</html>
