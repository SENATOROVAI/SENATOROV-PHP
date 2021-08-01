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
    <form class="mt-4">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="avatart" class="form-label">Fullname</label>
            <input type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">User Avatar</label>
            <input type="file" class="form-control" id="avatar">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" id="password_confirm">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>