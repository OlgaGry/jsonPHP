<!DOCTYPE html>
<html lang="zxx">

<head>

  <?php include '_header.php'; ?>

  <title>World Time</title>

</head>

<body>
  <div class="container-scroller">
    <!-- partial:../partials/_navbar.html -->
    <?php include 'nav.php'; ?>
    <!-- partial -->
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card" data-aos="fade-up">
              <div class="card-body">
                <div class="aboutus-wrapper">
                  <h1 class="mt-5 text-center mb-5">
                    Olga Grytsai
                  </h1>
                  <div class="row">
                    <div class="col-lg-12 mb-5 mb-sm-2">
                      <form>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <textarea class="form-control textarea" placeholder="Commentaire *" id="message"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Nom *" />
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Courriel *" />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <a href="#" class="btn btn-lg btn-dark font-weight-bold mt-3">Envoyer le message</a>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- container-scroller ends -->
  <!-- partial:/partials/_footer.html -->
  <?php include '_footer.php'; ?>
  <!-- partial -->
  <?php include '_script.php'; ?>
</body>

</html>