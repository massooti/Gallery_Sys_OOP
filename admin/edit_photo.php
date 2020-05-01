<?php include 'includes/header.php' ?>
<?php if(!$session->is_signed_in()){redirect("login.php");}?>

<!-- Brand and toggle get grouped for better mobile display -->
<?php include "includes/top_nav.php" ?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<?php include "includes/sidebar.php" ?>
<!-- /.navbar-collapse -->
</nav>
<?php   $photos =Photo::find_all() ?>
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

            <div class="col-md-12">
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
        </div>
        <!-- /.row -->

    </div>