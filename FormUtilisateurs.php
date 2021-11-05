<?php require_once 'config/init.conf.php' ;
    if(isset($_POST['submit'])){
        $utilisateurs = new utilisateurs();
        $utilisateurs->hydrate($_POST);
        $utilisateurs->setmdp(password_hash($utilisateurs->getmdp(), PASSWORD_DEFAULT));
        $utilisateursManager = new utilisateursManager($bdd);
        $utilisateursManager->addUtilisateurs($utilisateurs);
        if($utilisateursManager->get_result() == true){
            $_SESSION['notification']['result'] = 'success';
            $_SESSION['notification']['message'] = 'votre utilisateur est ajouter';
        }
        else{
            $_SESSION['notification']['result'] = 'danger';
            $_SESSION['notification']['message'] = 'une erreur est survenue pendant la creation';
        }
    header("Location: index.php");
    exit();
    }
    else{  
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/header.inc.php';?>
    <body>
        <?php include 'includes/menu.inc.php';?>
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-12">
                    <h1 class="font-weight-light"><?php echo "Bienvenue dans le formulaire pour ajouter des utilisateurs" ?></h1>
                    <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
                </div>
            </div>
            <form method=POST id="utilisateursForm" action="FormUtilisateurs.php" enctype="multipart/form-data">
                <div class="mb-3">
                <label for="texte" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="texte" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                 <div class="mb-3">
                <label for="texte" class="form-label">prenom</label>
                    <input type="text" name="prenom" class="form-control" id="texte" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                <label for="texte" class="form-label">email</label>
                    <input type="email" name="email" class="form-control" id="texte" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                <label for="texte" class="form-label">mdp</label>
                    <input type="password" name="mdp" class="form-control" id="texte" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <br><br>
                 <button type="submit" class="btn btn-primary" name="submit" >Ajouter Mon utilisateurs</button>
            </form>
            <br>
        </div>
        <?php include 'includes/footer.inc.php';?>
    </body>
</html>
    <?php 
} 
?>