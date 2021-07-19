<?php
use App\Services\Page;
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
            <h1 class="display-5 fw-bold">WELCOME!</h1>
            <p class="col-md-8 fs-4">Let's go!</p>
            <a class="btn btn-primary btn-lg" type="button" href="/project/login">Sing In</a>
        </div>
    </div>

</div>

</body>
</html>