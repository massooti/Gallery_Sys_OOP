<?php require_once 'includes/header.php' ?>
<?php
if ($session->is_signed_in()){
    redirect("index.php");
}


if (isset($_POST['submit'])){
$username=trim($_POST['username']);
$password=trim($_POST['password']);

    $user_found=User::verify_user($username,$password);

    if($user_found){
        $session->login($user_found);
        redirect('index.php');
    }else{
        $the_message="Youre Password or Username is incorrect";
    }

}else{

    $username="";
    $password="";
}
?>
<div class="col-md-4 col-md-offset-3">
    <form action="" method="post">
        <div class="form-group">
            <label for="username">User name</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="username">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
    </form>
</div>

