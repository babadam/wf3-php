<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Revision </title>
    </head>
    <body>
        <form action="traitement.php" method="post">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" value="" id="pseudo" placeholder="Votre pseudo">
            <label for="email">Email</label>
            <input type="text" name="email" value="" id="email" placeholder="Votre email">

            <input type="submit" name="" value="Connexion">

            <?php echo '<pre>'; print_r($_POST); echo '</pre>' ?>

        </form>
    </body>
</html>
