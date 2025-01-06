<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard Administrateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/vendor.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/modernizr.js"></script>
    <script src="../js/pace.min.js"></script>
</head>

<body id="top">
    <!-- Header -->
    <header class="short-header">
        <div class="gradient-block"></div>	
        <div class="row header-content">
            <div class="logo">
                <a href="admin_dashboard.html">Dashboard Administrateur</a>
            </div>

            <nav id="main-nav-wrap">
                <ul class="main-navigation sf-menu">
                    <li class="current"><a href="admin_dashboard.html" title="">Dashboard</a></li>
                    <li><a href="logout.php" title="">Déconnexion</a></li>
                </ul>
            </nav>
        </div>     		
    </header>

    <!-- Main Content -->
    <section id="bricks" class="section">
        <div class="row">
            <div class="col-twelve">
                <h1 class="title has-text-centered">Bienvenue, Administrateur</h1>
                <p class="subtitle has-text-centered">Gérez les catégories, utilisateurs et articles ici.</p>
            </div>
        </div>

        <div class="row bricks-wrapper">
            <!-- Gestion des catégories -->
            <div class="col-four">
                <div class="card">
                    <h3>Gestion des Catégories</h3>
                    <a href="add_category.php" class="button">Ajouter une Catégorie</a><br>
                    <a href="edit_category.php" class="button">Modifier une Catégorie</a><br>
                    <a href="delete_category.php" class="button">Supprimer une Catégorie</a>
                </div>
            </div>

            <!-- Gestion des utilisateurs -->
            <div class="col-four">
                <div class="card">
                    <h3>Gestion des Utilisateurs</h3>
                    <a href="view_users.php" class="button">Voir les Utilisateurs</a><br>
                    <a href="ban_user.php" class="button">Bannir un Utilisateur</a>
                </div>
            </div>

            <!-- Gestion des articles -->
            <div class="col-four">
                <div class="card">
                    <h3>Gestion des Articles</h3>
                    <a href="article_admin.php" class="button">Voir les Articles</a>
                </div>
            </div>
        </div>
    </section>


    <script src="../js/jquery-2.1.3.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/jquery.appear.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
