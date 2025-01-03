<!DOCTYPE html>
<html class="no-js" lang="en"> 
<head>
   <meta charset="utf-8">
	<title>Abstract</title>
	<meta name="description" content="">  
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/vendor.css">  
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/mes_articles.css">
    <link rel="stylesheet" href="../css/article_form.css">
    <script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
	<link rel="icon" href="../favicon.ico" type="image/x-icon">
</head>
<body id="top">
<header class="short-header">
        <div class="gradient-block"></div>	
        <div class="row header-content">
            <div class="logo">
                <a href="dashboard.html">Dashboard Auteur</a>
            </div>

            <nav id="main-nav-wrap">
                <ul class="main-navigation sf-menu">
                    <li class="current"><a href="auteur_dashboard.php" title="">Dashboard</a></li>
                    <li><a href="formule_article.php" title="">Ajouter un Article</a></li>
                    <li><a href="my_articles.html" title="">Mes Articles</a></li>
                    <li><a href="logout.html" title="">Déconnexion</a></li>
                </ul>
            </nav>
        </div>     		
    </header>

<?php
            require_once '../database/Connection.php';
            require_once '../classes/display_articl.php';

           
            $pdo = (new Connection())->getPDO();

           
            $DisplayArticle = new displayArticle($pdo);

     
            $DisplayArticle->displayART();
            ?>
</body>