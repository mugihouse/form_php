<?php

  session_start();

?>

<head></head>
<html>
<body>

<?php
  if(!isset($_SESSION['visited'])) {
    echo '初回訪問です';

    $_SESSION['visited'] = 1;
    $_SESSION['date'] = date('c');
  } else {
    $visited = $_SESSION['visited'];
    $visited++;
    $_SESSION['visited'] = $visited;

    echo $visited . '回目の訪問です';
    if(isset($_SESSION['visited'])) {
      echo '前回の訪問は' . $_SESSION['date']. 'です';
      $_SESSION['date'] = date('c');
    }
  }

  echo '<pre>';
  var_dump($_SESSION);
  echo'</pre>';

  echo '<pre>';
  var_dump($_COOKIE);
  echo'</pre>';

?>
</body>
</html>
