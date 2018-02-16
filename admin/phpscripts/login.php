<?php

  function logIn($username, $password, $ip) {
    require_once('connect.php');
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);
    $stringLog = "SELECT * FROM tbl_user WHERE user_name = '{$username}'  AND user_pass = '{$password}'";
    $user_set = mysqli_query($link, $stringLog);

    if(mysqli_num_rows($user_set)){
      $founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
      $id = $founduser['user_id'];

      $_SESSION['user_id'] = $id;
      $_SESSION['user_name'] = $founduser['user_fname'];

        $_SESSION['prev_log'] = $founduser['user_prevLogin'];

      if(mysqli_query($link, $stringLog)){
						$updatestring = "UPDATE tbl_user SET user_ip = '{$ip}' WHERE user_id={$id}";
            $upatedPrevLog = "UPDATE tbl_user SET user_prevLogin = NOW() WHERE user_id = {$id}";

          $updateQuery = mysqli_query($link, $updatestring);
          $updateQuery2 = mysqli_query($link, $upatedPrevLog);
					}
    	redirect_to("admin_index.php");
    }else{
      $message = "Username and or password is incorrect";
      return $message;
    }
		mysqli_close($link);
  }

  // //MY BROKEN CODE FOR 3 FAIL ATTEMPTS//
  //
  //       //Gives the login fail the value of 1 out of the 3 tries.
  //       $message = "Username and or password is incorrect";
  //       // $message['login_fail'] = 1;
  //       // //Returns $message, then increments $message by one
  //       // $message['login_fail']++;
  //       return $message;
  //
  //       //When attempts hits 3, message wil show user that they are locked out//
  //       // if ($_Message['login_fail'] > 3) {$lockout[] = 'You Got it Wrong 3 Times, You Are locked out' . $_Message['login_fail'];//
  // }
  //
  //   }
 ?>
