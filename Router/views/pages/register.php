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
    <h2 class="mt-4">Sing Up</h2>
    <form class="mt-4" action="/project/auth/register" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" name="email" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="avatart" class="form-label">Fullname</label>
            <input type="text" name="full_name" class="form-control" id="full_name">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">User Avatar</label>
            <input type="file" name="avatar" class="form-control" id="avatar">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirm" class="form-control" id="password_confirm">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>