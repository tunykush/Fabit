
----encrypt pass----

<?php
$password = 'your_password_here';
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
echo $hashedPassword;
?>