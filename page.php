<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include '_header.php'; ?>
    <title><?php echo ucfirst($_GET['q']); ?></title>
</head>

<body>
    <?php
    $q = $_GET['q'];

    if ((isset($_REQUEST['page'])) && (!empty($_REQUEST['page']))) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $apiKey = '1b79a37546864c5cb3390f790ba43392';
    $lang = 'fr';

    $url = 'http://newsapi.org/v2/everything?q=' . $q . '&apiKey=' . $apiKey . '&page=' . $page . '&language=' . $lang . '&pageSize=20';

    // Importer la fonction loadJson dans le fichier function_curl.php
    // REMPLACER file_get_contents($url) par function loadJson($url)
    // ATTENTION Utiliser HTTP et non HTTPS !
    //$response = file_get_contents($url);
    include 'function_curl.php';
    $response = loadJson($url);
    // ----------------------------------------------------------------------
    $json = json_decode($response, true);

    $nbResultats = $json['totalResults'];
    ?>

    <div class="container-scroller">
        <div class="main-panel">
            <!-- partial:../partials/_navbar.html -->
            <?php include 'nav.php'; ?>
            <!-- partial -->
            <div class="content-wrapper">
                <div class="container">
                    <div class="col-sm-12">
                        <div class="card" data-aos="fade-up">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1 class="font-weight-600 mb-4">
                                            <?php echo ucfirst($q); ?>
                                        </h1>
                                    </div>

                                    Page Courante <?php echo ($page) ?> / Nombre de résultats : <?php echo ($nbResultats) ?>
                                    <ul>
                                        <?php if ($page > 1) { ?>
                                            <li><a href="page.php?q=<?php echo $q ?>&page=<?php echo ($page - 1) ?>">Page Précente <?php echo ($page - 1) ?></a></li>
                                        <?php } ?>

                                        <?php if ($nbResultats > ($page * 20)) { ?>
                                            <li><a href="page.php?q=<?php echo $q ?>&page=<?php echo ($page + 1) ?>">Page Suivante <?php echo ($page + 1) ?></a></li>
                                        <?php } ?>
                                    </ul>

                                </div>
                                <div class="row">
                                    <!--Boucle 1 a 3-->
                                    <div class="col-lg-8">
                                        <?php foreach ($json['articles'] as $article) { ?>
                                            <div class="row">
                                                <div class="col-sm-4 grid-margin">
                                                    <div class="rotate-img">
                                                        <img src="<?php echo isset($article['urlToImage']) ? $article['urlToImage'] : 'news.jpg'; ?>" alt="banner" class="img-fluid" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-8 grid-margin">
                                                    <h2 class="font-weight-600 mb-2">
                                                        <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a>
                                                    </h2>
                                                    <p class="fs-13 text-muted mb-0">
                                                        <span class="mr-2">Photo </span><?php echo $article['publishedAt'] ?>
                                                    </p>
                                                    <p class="fs-15">
                                                        <?php echo $article['description'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php  } ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2 class="mb-4 text-primary font-weight-600">
                                            Latest news
                                        </h2>
                                        <!--Boucle 1 a 3-->
                                        <?php foreach (array_slice($json['articles'], 1, 4) as $article) { ?>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div a class="border-bottom pb-4 pt-4">
                                                        <div a class="row">
                                                            <div class="col-sm-8">
                                                                <h5 class="font-weight-600 mb-1">
                                                                    <h5 class="font-weight-600 mb-1">
                                                                        <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a>
                                                                    </h5>
                                                                    <p><?php echo $article['description']; ?></p>
                                                                </h5>
                                                                <p class="fs-13 text-muted mb-0">
                                                                    <span class="mr-2">Photo </span><?php echo $article['publishedAt'] ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="rotate-img">
                                                                    <img src="<?php echo isset($article['urlToImage']) ? $article['urlToImage'] : 'news.jpg'; ?>" alt="banner" class="img-fluid" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="trending">
                                            <h2 class="mb-4 text-primary font-weight-600">
                                                Trending
                                            </h2>
                                            <!--Boucle 1 a 3-->
                                            <?php foreach (array_slice($json['articles'], 1, 4) as $article) { ?>
                                                <div class="mb-4">
                                                    <div class="rotate-img">
                                                        <img src="<?php echo isset($article['urlToImage']) ? $article['urlToImage'] : 'news.jpg'; ?>" alt="banner" class="img-fluid" />
                                                    </div>
                                                    <h3 class="mt-3 font-weight-600">
                                                        <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a>
                                                    </h3>
                                                    <p class="fs-13 text-muted mb-0">
                                                        <span class="mr-2">Photo </span><?php echo $article['publishedAt'] ?>
                                                    </p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- main-panel ends -->
            <!-- container-scroller ends -->

            <!-- partial:../partials/_footer.html -->
            <?php include '_footer.php'; ?>

            <!-- partial -->
        </div>
    </div>
    <?php include '_script.php'; ?>
</body>

</html>