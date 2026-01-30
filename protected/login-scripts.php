<?php

$conn=mysqli_connect(DB_HOST, DB_INSERTER, DB_INS_PASS, DB_NAME);

if(!$conn){
    die("insert connection failed".mysqli_connect_error());
}//end of !$conn

$dbc_select=mysqli_connect(DB_HOST, DB_SELECTER, DB_INS_PASS ,DB_NAME);

if(!$dbc_select){
    die("select connection failed".mysqli_connect_error());
}//end of !$conn

///////////////////////////////////////////////////////////////////////////// registration code /////////////////////////////////////////////////////////////////////////////

if(isset($_POST['form__sub'])){    
    $first=$_POST['f_name'];
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $enc_pass=$_POST['password2'];
    $email=$_POST['email'];

    // checking to see if the email in unique
    $check="SELECT user_id 
                FROM users
                WHERE email='$email'";


    // $check="SELECT user_id 
    //             FROM users
    //             WHERE email='".mysqli_real_escape_string($dbc_select,$email)."'";

    $check_res=mysqli_query($dbc_select, $check);

    if(!$check_res){
        // sql code failed 
        die("select connection failed".mysqli_error($dbc_select));
    }else{
        // sql code ran correctly did we get any reults
        if(mysqli_num_rows($check_res) !=0){
            // write code to say email already exists
            echo"<script> alert('This email is already registered, please try another')</script>"; 
        }else{
            $options=[
                'memory_cost'=>2048,
                'time_cost'=>4,
                'threads'=>3,
            ];//end of options 
            $enc_pass=password_hash($pass, PASSWORD_ARGON2ID, $options);
        
            $sql="INSERT INTO users
                    (fullname,username,password,enc_pass,email)
                    VALUES('$first','$user','$pass','$enc_pass','$email')";
            
            // echo "$sql<br>";

            $result=mysqli_query($conn,$sql);

            if(!$result){
                echo mysqli_error($conn);
            }else{
                echo"<script> alert('You are now registered, please login');    </script>";
            }
            
        
        }//end of mysqli_num_rows
    }//end of if !$check_res  
}//end of isset


///////////////////////////////////////////////////////////////////////////// login script /////////////////////////////////////////////////////////////////////////////

if(isset($_POST['log__but'])){
    $email = $_POST['l_email'];
    $pass = $_POST['password3'];
    //echo "$email <br> $pass";

    $query_pass = "SELECT user_id, enc_pass, account_type
                    FROM users
                    WHERE email = '$email'";

    $query_user = "SELECT fullname, username
                    FROM users
                    WHERE user_ID";
    $res2=mysqli_query($dbc_select, $query_pass);
    
    if(!$res2){
        echo "Oops we have died";
    }else{
        $num_rows=mysqli_num_rows($res2);
        if($num_rows == 0){
            //user does not exist
        }else if($num_rows !== 1){
            //technical error
        }else{
            $data=mysqli_fetch_object($res2);
            // echo $data->enc_pass;
            //1 row returned user exists
            if(password_verify($pass, $data->enc_pass)){
                //echo "it matches";
                mysqli_close($conn);
                mysqli_close($dbc_select);
                $_SESSION['user_id'] = $data->user_id;
                $_SESSION['email'] = $email;
                $_SESSION['account_type'] = $data->account_type;
                if($data->account_type === 'staff'){
                    header('location:admin.php');
                }else{
                    header('Location:account.php');
                    exit;
                }
                header('Location:account.php');
                exit;
            }else{
                echo"me no know you";
            }//end of if password
        }//end of if num rows
    }//end of if !$res2
}//end of isset $_Post log__but
mysqli_close($conn);
mysqli_close($dbc_select);
?>