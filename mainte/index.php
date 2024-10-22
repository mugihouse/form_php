<?php

  require 'db_connection.php';

  // ユーザー入力なし　
  // query
  // $sql = 'select * from contacts where id = 3';
  // $stmt = $pdo->query($sql); // sql実行

  // $result = $stmt->fetchAll();

  // echo '<pre>';
  // var_dump($result);
  // echo '</pre>';


  // ユーザー入力あり prepare bind execute
  // delete *　のようなsqlインジェクションへの対策を行う
  // $sql = 'select * from contacts where id = :id'; // 名前付きプレースホルダ
  // $stmt = $pdo->prepare($sql);
  // $stmt->bindValue('id', 3, PDO::PARAM_INT);
  // $stmt->execute();

  // $result = $stmt->fetchAll();

  // echo '<pre>';
  // var_dump($result);
  // echo '</pre>';

  $pdo->beginTransaction();

  try {
    // sql処理
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('id', 3, PDO::PARAM_INT);
    $stmt->execute();

    $pdo->commit();
  } catch (PDOException $e) {
    $pdo->rollBack();
  }
?>
