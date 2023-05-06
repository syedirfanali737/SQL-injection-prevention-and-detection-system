<?php session_start();?>

<?php include('header.php') ?>
            <div class="jumbotron text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>
                                <span><a href="index.php" class="btn btn-success " style="float: left;">HOME</a></span>
                            ADMIN LOGIN
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 jumbotron">
                            <form action="login.php" method="post">
                              <div class="form-group">
                                  Username:<input type="text" class="form-control" name="user" placeholder=" Enter Username" required>
                              </div>
                            <div class="form-group">
                                  Password:<input type="password" class="form-control" name="password" placeholder="Enter Passoword" required>
                            </div>
                              <div class="form-group">
                                  <input type="submit" name="login" value="LOGIN" class="btn btn-success btn-block text-center" > 
                              </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    include ('dbcon.php');

    if (isset($_POST['login'])) {

        $user = $_POST['user'];
        $password = $_POST['password'];


//Defensive code to prevent SQL Injection Attack
/*
                    $user=stripcslashes($user);
                    $password=stripcslashes($password);

/*stripcslashes() function removes backslashes added by the addcslashes()
function.This function can be used to clean up data retrieved from a database or from an HTML form.*/

/*
 //$result =get_result();
 $student_name= $_POST["user"];
 $studentid= "SELECT * FROM admin WHERE username='$user'";

$student_password= $_POST["password"];
$student_password= "SELECT * FROM admin WHERE password='$password' "; 

            $user=mysqli_real_escape_string($conn,$user);
            $password=mysqli_real_escape_string($conn,$password);

*/
/*mysqli_real_escape_string() function is an inbuilt function in PHP which is used to
escape all special characters for use in an SQL query. It is used before inserting a string
in a database, as it removes any special characters that may interfere with the query operations. 
*/








        $qry = "SELECT * FROM admin WHERE username='$user' AND password='$password'";
        
        $run  = mysqli_query($conn, $qry);

       $row = mysqli_num_rows($run);




        if($row > 0) {
         $data = mysqli_fetch_assoc($run);
                    $id= $data['id'];
                    $_SESSION['uid'] = $id;
                    header('location:admin/admindash.php');

           
        } else {
      ?>             
    <script>
        alert('username or passoword invalid');
        window.open('login.php','_self');
    </script>
    <?php
                   
                }

}
?>

<?php include('footer.php') ?>

