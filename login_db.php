<?php 
session_start();
        if(isset($_POST['m_username'])){
                  include("condb.php");
                  $m_username = mysqli_real_escape_string($condb,$_POST['m_username']);
                  $m_password = mysqli_real_escape_string($condb,sha1($_POST['m_password']));

                  $sql="SELECT * FROM tbl_member 
                  WHERE  m_username='".$m_username."'  AND  m_password='".$m_password."' ";

                  $result = mysqli_query($condb,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["m_id"] = $row["m_id"];
                      $_SESSION["m_level"] = $row["m_level"];

                      if($_SESSION["m_level"]=="admin"){ 
                        Header("Location: admin.php");
                      }
                      if($_SESSION["m_level"]=="member"){
                        Header("Location: member.php");
                      }
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                  }
        }else{
             Header("Location: index.php");
        }
?>