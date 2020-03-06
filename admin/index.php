<?php require_once 'includes/init.php' ?>
<?php require_once 'includes/header.php' ?>
<?php if(!$session->is_signed_in()){redirect("login.php");}?>
            <!-- Top Menu Items -->
           <?php include "includes/top_nav.php"?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <?php include "includes/sidebar.php" ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
         <?php include "includes/content.php" ?>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

?>