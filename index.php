<?php  
require_once 'config/init.conf.php' ;
print_r2($_SESSION);
$articles = new articles();
$articles->setTitre('mon titre');
$tab =[
'id'=> 1,
'titre'=>'mon titre',
];
$articles->hydrate($tab);
print_r2($articles);
$articlesManager = new articlesManager($bdd);
$articles = $articlesManager->get(1);
print_r2($articles);
$articlesManager = new articlesManager($bdd);
$ListArticles = $articlesManager->getList2();
print_r2($articles);
define('__nb_articles_par_page', 2);
$page = !empty($_GET['p']) ? $_GET ['p'] : 1;
$nbArticlesTotalLAPublie = $articlesManager->countArticlesPublie();
$nbpage = ceil($nbArticlesTotalLAPublie / __nb_articles_par_page);
$indexDepart = ($page -1) * __nb_articles_par_page;
$ListArticles = $articlesManager->getList3($indexDepart, __nb_articles_par_page);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/header.inc.php';?>
    <body>
        <?php include 'includes/menu.inc.php';?>
        <div class="container px-4 px-lg-5">
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
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-12">
                    <h1 class="font-weight-light"><?php echo "Voici mon blog" ?></h1>
                    <p>J'aime bien mon blog</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5">
            <?php
            foreach ($ListArticles as $key => $articles){ 
            ?>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                    <img class="card-img-top" src="img/<?= $articles->getId() ?>.jpg">
                        <div class="card-body">
                            <h2 class="card-title"><?= $articles->getTitre();?></h2>
                            <p class="card-text"><?= $articles->getTexte();?></p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!"><?=$articles->getDate();?></a></div>
                    </div>
                </div>
        <?php
              }
        ?>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                        <?php for ($index=1; $index <= $nbpage; $index++) { ?>
                            <li class="page-item <?php if ($page == $index) { ?>active<?php } ?>">
                            <a class="page-link" href="index.php?p=<?= $index ?>"><?= $index ?></a>
                            </li>
                            <?php
                        }?>
                        </ul>
                    </nav>
                </div>     
            </div>
        </div>
        <?php include 'includes/footer.inc.php';?>
    </body>
</html>