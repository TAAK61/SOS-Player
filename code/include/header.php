<header>
    <!--Title and logo-->
    <div id="site_title">
        <a href="index.php"><img src="./img/logo.png" alt="M2l logo" id="logo" sizes="100px"></a>
        <h3>L’application de gestion des buvettes du festival Sp’Or</h3>
    </div>
    <!-- Fixed navbar -->
    <nav class="topnav">

        <a href="index.php">Nouveauté</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="recherchemembres.php">Recherche membres</a>
        <a href="affectations.php">Affectation</a>
        <a href="prive.php">Administrateur</a>
        <!-- Affiche le lien de déconnexion après qu'il soit connecté -->
        <?php
        if (isset($_SESSION["login"])) {
        ?>
        <a href="./deconnect.php" id="log_out">Se déconnecté</a>
        <?php
        }
        ?>
    </nav>
</header>