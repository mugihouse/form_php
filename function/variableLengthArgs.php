<?php
  // 可変変数
  function combine(string ...$name): string
  {
    $combineName = '';
    for($i = 0; $i < count($name); $i++){
      $combineName .= $name[$i];
      if($i != count($name) - 1) {
        $combineName .= '・';
      }
    }
    return $combineName;
  }

  $lName = '名前';
  $fName = '苗字';
  $name1 = combine($fName, $lName);

  echo '結合結果：' . $name1;
  echo '<br>';

  $variableLength = combine('テスト１', 'テスト２', 'テスト３');
  echo $variableLength;
?>
