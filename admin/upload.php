<?php include 'includes/header.php' ?>
<?php include "includes/top_nav.php"?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<?php include "includes/sidebar.php" ?>
<!-- /.navbar-collapse -->
</nav>
<?php if(!$session->is_signed_in()){redirect("login.php");}?>
<?php
$message = "";
if(isset($_POST['submit'])){
    $photo =new Photo();
    $photo->title = $_POST['title'];
    $photo->description = $_POST['description'];
    $photo->set_file( $_FILES['file_upload']);

    if($photo->save()){
        $message = "Photo Added Successfully";
    }else{
        $message = join("<br>",$photo->errors);
    }
}?>
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   upload
                    <small>page</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>

                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                        <small id="emailHelp" class="form-text text-muted">Choose a uniqe one.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">file</label>
                        <input type="file" name="file_upload" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>