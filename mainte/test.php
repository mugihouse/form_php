<?php
  // echo __FILE__;
  // // /Applications/MAMP/htdocs/php_test/mainte/test.php

  // echo '<br>';
  // // パスワードの暗号化
  // echo (password_hash('password123', PASSWORD_BCRYPT));

  $contactFile = '.contact.dat';

  // ファイル丸ごと読み込み
  // $fileContents = file_get_contents($contactFile);

  // echo $fileContents;

  // ファイルに書き込み（上書き）
  // file_put_contents($contactFile, 'test');

  // $addText = "テスト" . "\n";

  // ファイルに書き込み（追記）
  // file_put_contents($contactFile, $addText, FILE_APPEND);

  // $addData = file($contactFile);

  // foreach($addData as $lineData) {
  //   $lines = explode(',', $lineData);
  //   echo $lines[0].'<br>';
  //   echo $lines[1].'<br>';
  //   echo $lines[2].'<br>';
  // }

  $contents = fopen($contactFile, 'a+');

  $addText = '1行追記' . '\n';

  fwrite($contents, $addText);
  fclose($contents);
?>
