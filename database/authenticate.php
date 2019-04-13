<?php
$user_password =  '12+#æ345';
$pass = urlencode($user_password));
$pass_crypt = crypt($pass);

if ($pass_crypt == crypt($pass, $pass_crypt)) {
  echo "Correct password"; //user has logged in
}

else {
  echo "Invalid password";  
}
?>
