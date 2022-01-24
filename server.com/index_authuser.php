<?php

session_start();

require_once __DIR__ . '/includes/errors.php';
require_once __DIR__ . '/includes/database.php';
require_once __DIR__ . '/templates/header.php';
?>
<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
<input type="search" class="form-control form-control-blue" placeholder="Search Artefact" aria-label="Search">
</form>
<?php

if (!empty($_SESSION['is_auth']) && !empty($_SESSION['user_id'])):
    $database = database_connect();

    $statement = $database->prepare('SELECT * FROM `users` WHERE `id` = :id');
    $statement->execute(['id' => $_SESSION['user_id']]);

    $user = $statement->fetch();
if (is_array($user)):
echo '<div>
<nav  class="col-8">
  <ul>
   <li> <a style="color:lightblue">' . $user['email'] . '</a>
      <ul>
       <li><a href="#">  <a style="color:lightblue">Admin Panel</a></li>
       <li><form method="LINK" action="http://server.com/logout.php">
       <input type="submit" class="btn btn-outline-light me-2"value="Logout">
       </form></li>
      </ul>
  </li>
  </ul>
</nav>
</div>';
echo "<link rel='stylesheet' href='/css/loggeduser.css'>";
endif;
endif;
?>
<body>
</ul>
</div>
</header>
<div class="container mt-5">
<h3 class="mb-5">
<p style="color:lightblue">Posts</p>
</h3>
</div>
<div class="d-flex flex-wrap">

<?php
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
