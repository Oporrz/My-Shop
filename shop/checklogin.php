<?php
//print_r($_POST);
//exit();
session_start();
        if(isset($_POST['a_user'])){
                  include("Backend/connections.php");
                  $a_user = $_POST['a_user'];
                  $a_pass = $_POST['a_pass'];

                  $sql="SELECT * FROM tbl_admin 
                  WHERE  a_user='".$a_user."' 
                  AND  a_pass='".$a_pass."' ";
                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["user_id"] = $row["a_id"];
                      $_SESSION["a_name"] = $row["a_name"];
                      
                      if ($_SESSION["user_id"] != ""){
                      $_SESSION["level"] = $row["level"];
 
                      Header("Location: Backend/index.php");
                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
        }else{

             Header("Location: index.php"); //user & password incorrect back to login again
 
        }
?>