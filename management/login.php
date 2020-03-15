<?php
session_start();
$_SESSION['admin']='';
$_SESSION['names']='';
$_SESSION['role']= '';

if(isset($_SESSION['newLogin'])){
  $error=$_SESSION['newLogin'];
}
include 'functions/actions.php';
$obj=new DataOperations();
$error='';

if(isset($_POST['submit']))
{
    $username=$obj->con->real_escape_string(htmlentities($_POST['username']));
    $password=md5($_POST['password']);

    $check="SELECT * FROM users WHERE username='$username'";
    $r_check=mysqli_query($obj->con,$check);
    $d_check=mysqli_fetch_array($r_check);
    $job_id=$d_check['job_id'];



  if($job_id==$username){
    $_SESSION['reg']=$job_id;
    header('location:reg');

  }else{
    $where=array('username'=>$username,'password'=>$password);
    $login = $obj->fetch_records('users',$where);
    if($login)
    {

        foreach($login as $row)
        {
          $account = $row['role'];
          $name = $row['name'];
          $role = $row['role'];
        }

        $_SESSION['admin']=$username;
        $_SESSION['names']=$name;
        $_SESSION['role']=$role;

        if($account==1){

          header('location:index');

        }else{

          header('location:insights');
        }
        
        //remember me
        if(!empty($_POST['remember']))
        {
            setcookie("username",$username,time()+(10*365*24*60*60));
            setcookie("password",$_POST['password'],time()+(10*365*24*60*60));
        }
        else{
            if(isset($_COOKIE['username'])){
                setcookie('username','');
            }
            if(isset($_COOKIE['password'])){
                setcookie('password','');
            }
        }
    }
    else
    {
        $error="Wrong username or password";
    }
  }

}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>5Elements | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href=" plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">CMS LOGIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php if($error){$obj->errorDisplay($error);}?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required="required" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required="required" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE['username'])){?> checked <?php }?>>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src=" plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=" plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src=" dist/js/adminlte.min.js"></script>

</body>
</html>
