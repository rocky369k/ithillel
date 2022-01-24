<?php

session_start();

require_once __DIR__ . '/includes/errors.php';
require_once __DIR__ . '/includes/database.php';
require_once __DIR__ . '/templates/header.php';
$database = database_connect();
$postID = (int)$_GET['id'];
$statement = $database->prepare('SELECT * FROM `posts` WHERE `id` = :id AND `is_enabled`= 1');
$statement->execute([
  'id'=> $postID]);
$post = $statement->fetch();
if(!$post['id']){
  header('HTTP/1.1 404 Not Found');
  exit;
}
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
<div class="container">
      <div class="row">
        <div class="col">
        <p class="lead">
         <p style="color:lightblue"><?php echo $post['tittle'] ?>
         </p>
        </p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 100%; height: auto; border-radius: 21px 21px 0 0;">
      <article><?php echo $post['content'] ?></article>
      <img src="img/<?php echo $post['image'] ?>.png" class="img-thumbnail">
      <a style="color:silver"><?php echo $post['created_at'] ?></a>
      <?php require_once __DIR__ . '/comments.php'; ?>
      </div>
    </div>
<div class="_34dh2eyzMvJfjCBLeoWiDD"style="color:lightblue">Artefact Inc © 2022 . All rights reserved</div>
</div>
</body>
</html>
