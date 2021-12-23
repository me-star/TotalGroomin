<?php 
    $title = 'User Login';

    if (isset($_SESSION['id'])) unset($_SESSION['id']);
   
    require_once 'includes/header.php';
    require_once 'db/user.php'; 
    require_once 'db/conn.php';
  
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password. $username);

        $result = $user->getUser($username,$new_password);
        

        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is Incorrect! Please try again. </div>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $result['id'];
            header("Location: scripts/viewrecords.php");
        }
    }
?>

<h1 class="text-center"><?php echo $title ?> </h1>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="username">Username: *</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?php if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="password">Password: *</label>
                                <input type="password" name="password" class="form-control" id="password" value="<?php if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['password']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 text-center">
                            <button class="btn btn-primary" type="submit">Login</button>
                            <a href="#"> Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form><br/><br/><br/> 

<?php include_once 'includes/footer.php' ?>    