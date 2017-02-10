<?php
require "/includes/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title'];  ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

   <?php include "/includes/header.php"; ?>

   <?php
   $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = 1");
   //. (int) $_GET['id'])

   if ( mysqli_num_rows($article) <= 0 ){
    ?>
    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a></a>
              <h3>Статья не найдена!</h3>
              <div class="block__content">
                <div class="full-text">
                  Запрашиваемая Вами статья не существует!
                </div>
              </div>
            </div>
          </section>
          <section class="content__right col-md-4">
            <?php include "includes/sidebar.php"; ?>
          </section>
        </div>
      </div>
    </div>
    <?php
  } else{
    $art = mysqli_fetch_assoc($article);
    mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $art);
    ?>
    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a><?php echo $art['views'] ;?> просмотров</a>
              <h3><?php echo $art['title'];?></h3>
              <div class="block__content">
                <img src="static/img/<?php echo $art['images'];?>" alt="" style="max-width:100%">
                <div class="full-text">
                 <?php echo $art['text'];?>
               </div>
             </div>
           </div>
         </section>

         <div class="block">
          <h3>Комментарии</h3>
          <div class="block__content">
            <div class="articles articles__vertical">

              <?php 
              $comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 5");
              ?>

              <?php
              while( $comment = mysqli_fetch_assoc($comments)){
                ?>
                <article class="article">
                  <div class="article__image" style="background-image: url(https://gravatar.com/avatar/<?php echo md5($comment['email']); ?>?s=80);"></div>
                  <div class="article__info">
                    <a href="article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $comment['autor'] ?></a>
                    <div class="article__info__meta"></div>
                    <div class="article__info__preview"><?php echo mb_substr(strip_tags($comment['text']), 0, 100, 'utf-8') . ' ...'; ?></div>
                  </div>
                </article>

                <?php
              }
              ?>

            </div>
          </div>
        </div>
        
        <section class="content__right col-md-4">
          <?php include "includes/sidebar.php"; ?>
        </section>
      </div>
    </div>
  </div>
  <?php
}
?>


<?php include "/includes/footer.php"; ?>

</div>

</body>
</html>