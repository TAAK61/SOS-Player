<?php
    /**
     * 
     */
    function AfficheMatch(){

    }

    /**
    * Nettoie une valeur insérée dans une page HTML* Doit être utilisée à chaque insertion de données dynamique dans une page HTML
    * Permet d'éviter les problèmes d'exécution de code indésirable (XSS)
    * @param string $data Valeur à nettoyer
    * @return string Valeur nettoyée
    */
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
        return $data;
    }
?>