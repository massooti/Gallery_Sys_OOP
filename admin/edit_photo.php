<?php include 'includes/header.php' ?>
<?php if(!$session->is_signed_in()){redirect("login.php");}?>

<!-- Brand and toggle get grouped for better mobile display -->
<?php include "includes/top_nav.php" ?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<?php include "includes/sidebar.php" ?>
<!-- /.navbar-collapse -->
</nav>
<?php
if(isset($_POST['update'])){

    echo "it works";
}
?>
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Photos
                    <small>page</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
            <form action="" method="post">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Caption">Caption</label>
                        <input type="text" name="caption" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="Caption">Alternate Text</label>
                        <input type="text" name="alternate_text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="Caption">Description</label>
                        <textarea type="text" name="description" class="form-control" id="" rows="38" col="10"></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="photo-info-box">
                        <h4>save<span id="toggle" class="glyphicon glyphicon-menu-up"></span></h4>
                    </div>
                    <div class="inside">
                        <div class="box-inner">
                            <p class="text">
                                <span class="glyphicon glyphicon-calendar"></span>Uploaded on:
                            </p>
                            <p class="text">
                                Photo Id: <span class="data photo_id_box">34</span>
                            </p>
                            <p class="text">
                                Filename: <span class="data">image.jpg</span>
                            </p>
                            <p class="text">
                                File Type: <span class="data">JPG</span>
                            </p>
                            <p class="text">
                                File Size: <span class="data">34444</span>
                            </p>
                        </div>
                        <div class="info-box-footer clearfix">
                            <div class="info-box-delete pull-left">
                                <a href="delete_photo.php?=id<?php echo $photo->id;?>"></a>
                            </div>
                            <div class="info-box-update pull-right">
                                <input type="submit" name="update" value="Update">
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <!-- /.row -->

    </div>