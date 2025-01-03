<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard Auteur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/vendor.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>
</head>

<body id="top">

    <!-- Header -->
    <header class="short-header">
        <div class="gradient-block"></div>	
        <div class="row header-content">
            <div class="logo">
                <a href="dashboard.html">Dashboard Auteur</a>
            </div>

            <nav id="main-nav-wrap">
                <ul class="main-navigation sf-menu">
                    <li class="current"><a href="dashboard.html" title="">Dashboard</a></li>
                    <li><a href="add_article.html" title="">Ajouter un Article</a></li>
                    <li><a href="my_articles.html" title="">Mes Articles</a></li>
                    <li><a href="logout.html" title="">Déconnexion</a></li>
                </ul>
            </nav>
        </div>     		
    </header>

    <!-- Main Content -->
    <section id="bricks" class="section">
        <div class="row">
            <div class="col-twelve">
                <h1 class="title has-text-centered">Bienvenue sur votre Dashboard</h1>
                <p class="subtitle has-text-centered">Gérez vos articles facilement ici.</p>
            </div>
        </div>

        <div class="row bricks-wrapper">
            <div class="col-four">
                <a href="formule_article.php" class="button is-primary is-fullwidth">Ajouter un Article</a>
            </div>
            <div class="col-four">
                <a href="mes_articles.php" class="button is-primary is-fullwidth">Voir Mes Articles</a>
            </div>
            <div class="col-four">
                <a href="logout.html" class="button is-primary is-fullwidth">Déconnexion</a>
            </div>
        </div>
    </section>


    

    <div id="preloader"> 
        <div id="loader"></div>
    </div> 

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
