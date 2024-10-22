<?php

  session_start();

?>

<head></head>
<html>
<body>

<?php

  echo 'セッション破棄';

  $_SESSION = [];

  if(isset($_COOKIE['PHPSESSID'])) {
    setcookie('PHPSESSID', '', time() - 1800, '/' );
  }

  echo 'セッション';
  echo '<pre>';
  var_dump($_SESSION);
  echo'</pre>';

  echo 'クッキー';
  echo '<pre>';
  var_dump($_COOKIE);
  echo'</pre>';
?>
</body>
</html>
