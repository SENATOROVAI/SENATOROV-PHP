<?php include 'foo.php'; ?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>SENATOROV</title>

</head>
<body>
<h6 style="text-align: right;">soft: SENATOROV.</h6>

<hr>
<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn-success mt-2" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i></button>
            <table class="table table-striped table-hover mt-2">
                <thead class="thead-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
                </thead>
                <tbody>
                <tr>
                <?php foreach ($result as $res) {?>
                <td><?php echo $res->id; ?></td>
                <td><?php echo $res->name; ?></td>
                <td><?php echo $res->email; ?></td>
                <td><a href="?id=<?php echo $res->id; ?>" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $res->id; ?>"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $res->id; ?>"><i class="fa fa-trash-alt"></i></a>
                </td>
                </tr>

                <div class="modal fade" id="edit<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">EDIT NOTE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="?id=<?php echo $res->id; ?>" method="POST">
                                    <div class="form-group">
                                        <small>Name</small>
                                        <input type="text" class="form-control" name="name" value="<?php echo $res->name; ?>">
                                    </div>
                                    <div class="form-group">
                                        <small>Email</small>
                                        <input type="text" class="form-control" name="email" value="<?php echo $res->email; ?>">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                <button type="submit" class="btn btn-primary" name="edit">SAVE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--delete-->
                <div class="modal fade" id="delete<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delete">DELETE NOTE #<?php echo $res->id; ?></h5>
                                <button type="button" class="close" data-dismiss="delete" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <form action="?id=<?php echo $res->id; ?>" method="POST">
                                    <button type="button" class="btn btn-secondary" data-dismiss="delete">CLOSE</button>
                                    <button type="submit" class="btn btn-danger" name="delete">DELETE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">ADD NOTE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="?id=<?php echo $res->id; ?>" method="POST">
                    <div class="form-group">
                        <small>Name</small>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <small>Email</small>
                        <input type="text" class="form-control" name="email">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                <button type="submit" class="btn btn-primary" name="add">SAVE</button>
                </form>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
\
