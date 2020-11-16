<?php
session_start();

require_once '../vendor/autoload.php';

use App\Classes\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$auth = new Auth();
$mail = new PHPMailer(true);

// ========== start register all function ============

if(isset($_POST['action']) && $_POST['action'] === 'register'){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $r_email = $_POST['r_email'];
    $password = password_hash($_POST['r_password'], PASSWORD_DEFAULT);

    if($auth->user_exists($r_email) > 0 ){
        echo $auth->showMessage('warning ','this '.$r_email.' Already Eexists our system');
    }else{
        if($auth->register($name, $username, $r_email, $password )){
            echo 'ok';
            $_SESSION['user_name'] = $name;
            $_SESSION['user_username'] = $username;
            $_SESSION['user_email'] = $r_email;
            
        }else{
        echo $auth->showMessage('warning ', 'Somthing wrong....');
        }
        
    }
}
// ========== ens register all function ============

// ========== start login all function ============
if(isset($_POST['action']) && $_POST['action'] === 'login'){
    $l_email = $_POST['l_email'];
    $password = $_POST['password'];
    $rememberMe = isset($_POST['rememberMe']) ? 1 : 0;

    $result = $auth->login($l_email);
    if($result->num_rows === 1){
        $row = $result->fetch_assoc();
            if (password_verify($password, $row['pssword'])) {
                if($row['status'] === '1'){
                    echo 'ok';
                    if($rememberMe){
                        setcookie('user_email',$l_email, time() + (7 * 24 * 60 * 60 ));
                        setcookie('user_password',$password, time() + (7 * 24 * 60 * 60 ));
                    }else{
                        setcookie('user_email', '' , -time() + (7 * 24 * 60 * 60 ));
                        setcookie('user_password', '' , -time() + (7 * 24 * 60 * 60 ));
                    }
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_username'] = $row['username'];
                    $_SESSION['user_email'] = $l_email;


                }else{
                    echo $auth->showMessage('warning ', 'your account currently not approved.');
                }
                
            }else{
                echo $auth->showMessage('warning ', 'your password is incorrect.');
            }
    }else{
        echo $auth->showMessage('warning ', 'These credentials do not match our records.');
    } 
}
// ========== start forget Password all function ============

if(isset($_POST['action']) && $_POST['action'] === 'forgetPassword'){
    $email = $_POST['email'];

    $result = $auth->getuseremail($email);
    if($result->num_rows === 1){
        // $token1 = uniqid();
        // $token1 = uniqid().rand(22222 , 99999);
        $token = rand(22222 , 99999);
        if($auth->tokenupdate($token , $email)){
            try {
                //Server settings
                
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = '8b1287a94e6895';                     // SMTP username
                $mail->Password   = '7fd2398cdfd64a';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                $mail->Port       = 2525;                                    
            
                //Recipients
                $mail->setFrom('mdsofiul@gmail.com', 'MD Sofiul Bashar');
                $mail->addAddress ($email);     
                // Content
                $mail->isHTML(true);                                  
                $mail->Subject = 'Reset Your password';
                $mail->Body    = '<div style="width: 50%; font-family: sans-serif; margin: 50px auto 0; border: 1px solid #dddddd; padding: 10px; border-radius: 5px; text-align: center;">
                Reset your password??
                <br>
                <br>
                <a style="background: #3898db;text-decoration: none; color: antiquewhite; border-radius: 5px; padding: 5px 10px; " href="http://localhost/ssit-new-project/admin/passwordreset.php?email=' . $email. '&token=' . $token . '"> Click here</a>
                <p style="text-align: left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, adipisci autem illo repellat ad inventore eaque. Expedita laudantium tempora eveniet possimus ipsam praesentium impedit laborum, facilis vero, dignissimos, odit cum!</p>
                <p style="text-align: left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, adipisci autem illo repellat ad inventore eaque. Expedita laudantium tempora eveniet possimus ipsam praesentium impedit laborum, facilis vero, dignissimos, odit cum!</p>
                <p style="text-align: left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, adipisci autem illo repellat ad inventore eaque. Expedita laudantium tempora eveniet possimus ipsam praesentium impedit laborum, facilis vero, dignissimos, odit cum!</p>
                </div>';
            
                $mail->send();
                echo $auth->showMessage( 'success ', 'Your reset password linke generate successful please check your email ');
            } catch (Exception $e) {
                echo $auth->showMessage( 'danger ', 'Message could not be sent. Mailer Error: ' .$mail->ErrorInfo);
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else{
        echo $auth->showMessage( 'danger ', 'Sumething wrong.....');
        }
    }else{
        echo $auth->showMessage( 'danger ', 'This ' . $email . ' email do not match our records.');
    }
}

if(isset($_POST['action']) && $_POST['action'] === 'resetPassword'){
    $email = $_POST['email'];
    $confirm_password = $_POST['confirm_password'];
    $reset_password = $_POST['reset_password'];
    if($email !== null || $reset_password !== null || $confirm_password !== null ){
    $password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
        if( $auth->resetpassword( $email , $password ) ){
            echo $auth->showMessage( 'success  ', 'This password Update successful. Please <a href="login.php">Login</a>
            ');
        }else{
        echo $auth->showMessage( 'danger', 'This password not Update successful .');
        }

    }else{
        echo $auth->showMessage( 'danger', 'Sumething wrong......');
    }
    



}









?>