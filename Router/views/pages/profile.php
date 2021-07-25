<?php

use App\Services\Page;

if (!$_SESSION["user"]){
    \App\Services\Router::redirect('/login');
}
?>

<!doctype html>
<html lang="en">
<?php
Page::part('head');
?>
<body>
<?php
Page::part('navbar');
?>


<div class="container">

    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">WELCOME! <?php echo $_SESSION["user"]["full_name"] ?></h1>
            <p class="col-md-8 fs-4">Let's go!</p>
            <img src="<? echo $_SESSION["user"]["avatart"] ?>"  height="300" alt="">
            <a class="btn btn-primary btn-lg" type="button" href="/project/login">Sing In</a>
        </div>
    </div>

</div>

</body>
</html>