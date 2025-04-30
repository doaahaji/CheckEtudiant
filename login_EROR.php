<!-- 
--------------------------------------------------------------------------------------
-- Ce fichier affiche un message d'erreur lorsque l'authentification échoue.         
-- L'utilisateur est informé que son login ou son mot de passe est incorrect         
-- et a la possibilité de retourner à la page de connexion.                          
--------------------------------------------------------------------------------------
-->

<?php include 'header.php'; ?>

<main>
    <form action="index.php" method="POST">
        <p>Votre login ou mot de passe est incorrecte</p>
        <a class="retour" href="index.php">Retourner</a>
    </form>
</main>

<?php include 'footer.php'; ?>