<?php require_once 'config/init.conf.php' ;
    if(isset($_POST['save'])){
        $utilisateurs = new utilisateurs();
        $utilisateurs->hydrate($_POST);
        print_r2($utilisateurs);
        $utilisateursManager = new utilisateursManager($bdd);
        $utilisateursEnBdd = $utilisateursManager->getbyemail($utilisateurs->getemail());
        $isConnect = password_verify($utilisateurs->getmdp(), $utilisateursEnBdd->getmdp());
        var_dump($isConnect);
        if ($isConnect == true ){
            $sid = md5($utilisateurs->getemail(). time());
            setcookie('sid', $sid ,time()+800000);
            $utilisateurs->setsid($sid);
            $utilisateursManager->updatebyemail($utilisateurs);
        }
        if($utilisateursManager->get_result() == true){
            $_SESSION['notification']['result'] = 'success';
            $_SESSION['notification']['message'] = 'votre utilisateur est connecter';
            header("Location: index.php");
        }
        else{
            $_SESSION['notification']['result'] = 'danger';
            $_SESSION['notification']['message'] = 'une erreur est survenue pendant la connection';
            header("Location: connexion.php");
        }
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
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-12">
                    <h1 class="font-weight-light"><?php echo "Bienvenue dans le formulaire pour vous connecter" ?></h1>
                    <p>Ajoutez un article avec le bouton "AddArticles"</p>
                </div>
            </div>

            <?php
            if (isset($_SESSION['notification'])){
            ?>

            <div class="alert alert-<?= $_SESSION['notification']['result'] ?> alert-dismissible mt-3 " role="alert">
                <?= $_SESSION['notification']['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                
            <?php
            unset($_SESSION['notification']);
            }
            ?>
            <form method=POST id="utilisateursForm" action="connexion.php" enctype="multipart/form-data">
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
                <button type="submit" class="btn btn-primary" name="save" >se connecter</button>
            </form>
            <br>
        </div>
        <?php include 'includes/footer.inc.php';?>
    </body>
</html>

    <?php 
} print_r2($_POST['save']);
print_r2($_POST['save']);
print_r2($_POST['save']);
print_r2($_POST['save']);
?>