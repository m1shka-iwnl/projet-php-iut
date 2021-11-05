<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/header.inc.php';?>
    <body>
        <?php include 'includes/menu.inc.php';?>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-12">
                    <h1 class="font-weight-light"><?php echo "Bienvenue dans le formulaire pour ajouter des articles" ?></h1>
                    <p>Ajouter un formulaire : </p>
                </div>
            </div>
            <form>
                <div class="mb-3">
                <label for="texte" class="form-label">Titre</label>
                    <input type="text" name="texte" class="form-control" id="texte" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Mettre le texte de l'article ici</span>
                    <textarea class="form-control" name="texte" aria-label="With textarea"></textarea>
                </div>
                <br><br>
                 <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control" id="image">
                    <label class="input-group-text" for="inputGroupFile02">Choisir Une Image</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name = "publie" class="form-check-input" id="publie">
                    <label class="form-check-label" for="exampleCheck1">Publie</label>
                 </div>
                <button type="submit" class="btn btn-primary">Ajouter Mon Article</button>
            </form>
            <br>
        </div>
        <?php include 'includes/footer.inc.php';?>
    </body>
</html>