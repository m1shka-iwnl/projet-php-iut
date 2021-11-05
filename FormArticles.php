<?php 
    require_once 'config/init.conf.php' ;
    if(isset($_POST['submit'])){
        $articles = new articles();
        $articles->hydrate($_POST);
        $articles->setDate(date('Y-m-d'));
        $publie = $articles->getPublie() === 'on' ? 1 : 0;
        $articlesManager = new articlesManager($bdd);
        $articlesManager->addArticles($articles);
            
        if ($_FILES['image']['error'] == 0) {
            $fileInfos = pathinfo($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'],

            'img/'.$articlesManager->get_getLastInsertId()
            . '.' . $fileInfos['extension']);
        }

        if($articlesManager->get_result() == true){
            $_SESSION['notification']['result'] = 'success';
            $_SESSION['notification']['message'] = 'votre article est ajouter';
        }
        else{
            $_SESSION['notification']['result'] = 'danger';
            $_SESSION['notification']['message'] = 'une erreur est survenue pendant la creation';
        }
  
    header("Location: index.php");
    exit();
    }else{  
   
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/header.inc.php';?>
    <body>
        <!-- Responsive navbar-->
        <?php include 'includes/menu.inc.php';?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-12">
                    <h1 class="font-weight-light"><?php echo "Bienvenue dans le formulaire pour ajouter des articles" ?></h1>
                    <p>Cliquez sur "AddArticles" pour ajouter un article</p>
                </div>
            </div>
            <form method=POST id="articleForm" action="FormArticles.php" enctype="multipart/form-data">
                <!-- Titre--> 
                <div class="mb-3">
                <label for="texte" class="form-label">Titre</label>
                    <input type="text" name="titre" class="form-control" id="texte" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <!-- Texte--> 
                <div class="input-group">
                    <span class="input-group-text">Article texte</span>
                    <textarea class="form-control" name="texte" aria-label="With textarea"></textarea>
                </div>
                <br><br>
                 <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control" id="image">
                    <label class="input-group-text" for="inputGroupFile02">Choisir Une Image</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="publie" class="form-check-input" id="publie">
                    <label class="form-check-label" for="exampleCheck1">Publie</label>
                 </div>
                <button type="submit" class="btn btn-primary" name="submit" >Ajouter Mon Article</button>
            </form>
        <br>
    </div>
        <?php include 'includes/footer.inc.php';?>
    </body>
</html>
<?php } ?>