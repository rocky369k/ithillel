<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>artefact.com</title>
</head>
<body>
 <header class="p-3 bg-yellow text-blue">
     <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-blue text-decoration-none">
      <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
      <a>
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-3 justify-content-center mb-md-0">
      <li><a href="#" class="nav-link px-1 text-secondary">
      <p style="color:lightblue">ARTEFACT</p></a></li>
      </ul>
      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
      <input type="search" class="form-control form-control-blue" placeholder="Search Artefact" aria-label="Search">
      </form>

<div class="text-end">
          <form method="LINK" action="http://server.com/login.php">
          <input type="submit" class="btn btn-outline-light me-2"value="Login">
          </form>
          </div>
          <form method="LINK" action="http://server.com/register.php">
          <input type="submit" class="btn btn-warning"value="Signup">
          </form>
      </div>
    </div>
  </header>
  <div class="container mt-5">
  <h3 class="mb-5">
    <p style="color:lightblue">Posts</p>
  </h3>
</div>
<div class="d-flex flex-wrap">
  <?php
require_once __DIR__ . '/includes/database.php';
  $database = database_connect();
  $statement = $database->prepare(
   'SELECT * FROM `posts` WHERE `is_enabled` = 1 ORDER BY `created_at` DESC'
  );

  $statement->execute();
  $posts = $statement->fetchAll();
  ?>
  <?php foreach ($posts as $post): ?>
      <div class="card rounded-0 mx-5 shadow-sm w-25">
              <div class="card-header py-1">
                <h4 class="my-0 fw-normal">
                  <time style="color:silver">
                <?php echo $post['created_at'] ?>
              </time>
            </h4>
           </div>
              <div class="card-body">
                <img src="img/<?php echo $post['image'] ?>.png" class="img-thumbnail">
                <ul class="list-unstyled mt-3 mb-4">
                  <li><?php echo $post['tittle'] ?></li>
                  </ul>
                  <a href="/post.php?id=<?php echo $post['id'] ?>" class="w-50 btn btn-lg btn-outline-primary">Read</a>
              </div>
            </div>
          <?php endforeach ?>
    </div>
    </div>
  </div>
  </body>
  <div class="_34dh2eyzMvJfjCBLeoWiDD"style="color:lightblue">Artefact Inc © 2022 . All rights reserved</div>
  </html>
