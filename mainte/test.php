<?php
  echo __FILE__;
  // /Applications/MAMP/htdocs/php_test/mainte/test.php

  echo '<br>';
  // パスワードの暗号化
  echo (password_hash('password123', PASSWORD_BCRYPT));

?>
