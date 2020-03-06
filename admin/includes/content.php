<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>page</small>
            </h1>
            <?php
//            $result_set=User::find_all_users();
//            while($row=mysqli_fetch_array($result_set)){
//                echo $row['first_name'] . ' ' . $row['last_name'] ."<br>";
////            }
            $find_user=User::find_user_by_id(2);
//            $user=User::instatiation($find_user);
//            //            echo  $find_user['first_name'];
                        echo $find_user->id;
//            $users=User::find_all_users();
//            foreach ($users as $user){
//                echo $user->id . "<br>";
//            }
////
//            $the_pictures=new Picture();

            ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>