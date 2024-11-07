<?php
  function combineSpace(string $firstName, string $lastName)
  {
    return $lastName . ' ' . $firstName;
  }

  $nameParam = ['名前', '苗字'];

  // コールバック関数
  function useCombine(array $name, callable $func)
  {
    $concatName = $func(...$name);
    print($func.'関数での結合結果' . $concatName . '<br>');
  }

  useCombine($nameParam, 'combineSpace');
?>
