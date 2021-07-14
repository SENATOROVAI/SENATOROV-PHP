<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authorization</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <?php
    if ($_COOKIE['user'] == false):
    ?>
    <div class="row">
        <div class="col">
            <h1>Registration</h1>
            <form action="reg.php" method="POST">
                <input type="text" class="form-control" name="login" id="login" placeholder="login"><br>
                <input type="text" class="form-control" name="name" id="name" placeholder="name"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="password"><br>
                <button type="submit" class="btn btn-success">REGISTRATION</button>
            </form>
        </div>
        <div class="col">
            <h1>Authorization</h1>
            <form action="auth.php" method="POST">
                <input type="text" class="form-control" name="login" id="login" placeholder="login"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="password"><br>
                <button type="submit" class="btn btn-success">Auth</button>
            </form>
        </div>
    </div>
    <?php else: ?>
    <p>
        Hi, <?php echo ucwords($_COOKIE['user']); ?>!<br>You want Sign out? ->  <a href="/exit.php">click</a>
    </p>
    <?php endif; ?>
</div>
</body>
</html>
