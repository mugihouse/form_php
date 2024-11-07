<?php

  declare(strict_types = 1); // 強い型宣言

  ini_set("display_errors", 1);
  error_reporting(E_ALL);


  echo 'タイプヒンティング'. '<br>';
  /**
   * @param $string
   */
  function noTypeHint($string) {
    var_dump($string);
  }

  noTypeHint(['テスト']);
  echo '<br>';


  function typeTest(string $string) {
    var_dump($string);
  }

  typeTest('配列文字');

?>
