<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php include '_header.php'; ?>
  <title>World Time</title>
</head>

<body>

  <?php
  // Get the content of the JSON file using file_get_contents():
  $str = file_get_contents('news.json');

  // Now decode the JSON using json_decode():
  $json = json_decode($str, true); // decode the JSON into an associative array
  ?>

  <div class="container-scroller">
    <div class="main-panel">
      <!-- partial:partials/_navbar.html -->
      <?php include 'nav.php'; ?>
      <!-- partial -->
    </div>
    <div class="content-wrapper">
      <div class="container">
        <div class="row" data-aos="fade-up">
          <div class="col-xl-8 stretch-card grid-margin">
            <?php $article = $json['articles'][0] ?>
            <div class="position-relative">
              <img src="<?php echo $article['urlToImage'] ?>" alt="banner" class="img-fluid" />
              <div class="banner-content">
                <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                  global news
                </div>
                <h1 class="mb-0">SPORTS</h1>
                <h1 class="mb-2">
                <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a>
                </h1>
                <div class="fs-12">
                <span class="mr-2">Photo </span><?php echo $article['publishedAt'] ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 stretch-card grid-margin">
            <div class="card bg-dark text-white">
              <div class="card-body">
                <h2>Latest news</h2>
                <?php for ($index = 0; $index < 3; $index++) {
                  $article = $json['articles'][$index] ?>
                  <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                    <div class="pr-3">
                    <h5><a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a></h5>
                      <div class="fs-12">
                      <span class="mr-2">Photo </span><?php echo $article['publishedAt'] ?>
                      </div>
                    </div>
                    <div class="rotate-img">
                      <img src="<?php echo $article['urlToImage'] ?>" alt="thumb" class="img-fluid img-lg " />
                    </div>
                  </div>
                <?php  } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-lg-3 stretch-card grid-margin">
            <div class="card">
              <div class="card-body">
                <h2>Catégories</h2>
                <ul class="vertical-menu">
                  <li><a href="./page.php?q=soccer">Soccer</a></li>  
                  <li><a href="./page.php?q=hockey">Hockey</a></li>
                  <li><a href="./page.php?q=football">Football</a></li>
                  <li><a href="./page.php?q=natation">Natation</a></li>
                  <li><a href="./page.php?q=basketball">Basketball</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-9 stretch-card grid-margin">
            <div class="card">
              <div class="card-body">
                <!--Boucle 1 a 3-->
                <?php for ($index = 0; $index < 3; $index++) {
                  $article = $json['articles'][$index] ?>
                  <div class="row">
                    <div class="col-sm-4 grid-margin">
                      <div class="position-relative">
                        <div class="rotate-img">
                          <img src="<?php echo $article['urlToImage'] ?>" alt="banner" class="img-fluid" />
                        </div>
                        <div class="badge-positioned">
                          <span class="badge badge-danger font-weight-bold">Flash news</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-8  grid-margin">
                      <h2 class="mb-2 font-weight-600">
                      <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a>
                      </h2>
                      <div class="fs-13 mb-2">
                      <span class="mr-2">Photo </span><?php echo $article['publishedAt'] ?>
                      </div>
                      <p class="mb-0">
                      <h5><?php echo $article['description']; ?></h5>
                      </p>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-sm-12 grid-margin">
          </div>
        </div>
      </div>
    </div>
    <!-- main-panel ends -->
    <!-- container-scroller ends -->

    <!-- partial:partials/_footer.html -->
    <?php include '_footer.php'; ?>

    <!-- partial -->
  </div>
  </div>
  <?php include '_script.php'; ?>
</body>

</html>