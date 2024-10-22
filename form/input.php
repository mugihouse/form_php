<?php

  session_start();

  require 'validation.php';

  header('X-FRAME-OPTIONS-DENY');

  function h($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
  }

  if(!empty($_POST)) {
    echo  '<pre>';
    var_dump($_POST);
    echo '</pre>';
  }


  $pageFlag = 0;

  $errors = validation($_POST);

  if(!empty($_POST['btn_confirm']) && empty($errors)) {
    $pageFlag = 1;
  }

  if(!empty($_POST['btn_submit'])) {
    $pageFlag = 2;
  }
?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>

<body>
  <?php if($pageFlag === 0): ?>
    <?php if(!isset($_SESSION['csrfToken'])) {
      $csrfToken = bin2hex(random_bytes(32));
      $_SESSION['csrfToken'] =$csrfToken;
      }
      $token = $_SESSION['csrfToken'];
    ?>

    <?php if (!empty($errors) && !empty($_POST['btn_confirm'])) :?>
      <?php echo '<ul>' ;?>
        <?php foreach ($errors as $error) {
          echo '<li>' . $error . '</li>';
        }?>
      <?php echo '</ul>' ;?>
    <?php endif ;?>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
        <form method="POST" action="input.php">
          <div class="form-group">
          <label for="your_name">氏名</label>
          <input type="text" class="form-control" id="your_name" name="your_name" value="<?php if(!empty($_POST['your_name'])) {echo h($_POST['your_name']);} ?>" required>
          </div>
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if(!empty($_POST['email'])) {echo h($_POST['email']);} ?>">
          </div>
          <div class="form-group">
            <label for="url">ホームページ</label>
            <input type="url" class="form-control" id="url" name="url" value="<?php if(!empty($_POST['url'])) {echo h($_POST['url']);} ?>">
          </div>
          <div class="form-check form-check-inline">
            性別
            <input type="radio" class="form-check-input" id="gender1" name="gender" value="0" <?php if(isset($_POST['gender']) && $_POST['gender'] === '0') { echo 'checked'; } ?>>
            <label class="form-check-label" for="gender1">男性</label>
            <input type="radio" class="form-check-input" id="gender2" name="gender" value="1" <?php if(isset($_POST['gender']) && $_POST['gender'] === '1') { echo 'checked'; } ?>>
            <label class="form-check-label" for="gender2">女性</label>
          </div>
          <div class="form-group">
            <label for="age">年齢</label>
            <select name="age" id="age" class="form-control">
              <option value="">選択してください</option>
              <option value="1" <?php if(isset($_POST['age']) && $_POST['age'] === '1') { echo 'selected'; } ?>>〜19歳</option>
              <option value="2" <?php if(isset($_POST['age']) && $_POST['age'] === '2') { echo 'selected'; } ?>>20歳〜29歳</option>
              <option value="3" <?php if(isset($_POST['age']) && $_POST['age'] === '3') { echo 'selected'; } ?>>30歳〜39歳</option>
              <option value="4" <?php if(isset($_POST['age']) && $_POST['age'] === '4') { echo 'selected'; } ?>>40歳〜49歳</option>
              <option value="5" <?php if(isset($_POST['age']) && $_POST['age'] === '5') { echo 'selected'; } ?>>50歳〜59歳</option>
              <option value="6" <?php if(isset($_POST['age']) && $_POST['age'] === '6') { echo 'selected'; } ?>>60歳〜</option>
            </select>
          </div>
          <div class="form-group">
            <label for="contact">お問い合わせ内容</label>
            <textarea class="form-control" name="contact" id="contact" rows="3">
              <?php if(!empty($_POST['contact'])) {echo h($_POST['contact']);} ?>
            </textarea>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="caution" id="caution" value="1">
            <label class="form-check-label" for="caution">注意事項のチェックする</label>
          </div>
          <input type="submit" class="btn btn-info" name="btn_confirm" value="確認する">
          <input type="hidden" name="csrf" value="<?php echo $token;?>">
        </form>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if($pageFlag === 1): ?>
    <?php if($_POST['csrf'] === $_SESSION['csrfToken']):?>
      <form method="POST" action="input.php">
        氏名
        <?php echo h($_POST['your_name']); ?>
        <br>
        メールアドレス
        <?php echo h($_POST['email']); ?>
        <br>
        ホームページ
        <?php echo h($_POST['url'])?>
        <br>
        性別
        <?php
          if($_POST['gender'] === '0') { echo '男性'; }
          if($_POST['gender'] === '1') { echo '女性'; }
        ?>
        <br>
        年齢
        <?php
          if($_POST['age'] === '1') { echo '〜19歳'; }
          if($_POST['age'] === '2') { echo '20歳〜29歳'; }
          if($_POST['age'] === '3') { echo '30歳〜39歳'; }
          if($_POST['age'] === '4') { echo '40歳〜49歳'; }
          if($_POST['age'] === '5') { echo '50歳〜59歳'; }
          if($_POST['age'] === '6') { echo '60歳〜'; }
        ?>
        <br>
        お問い合わせ内容
        <?php echo h($_POST['contact'])?>
        <br>
        <br>
        <input type="submit" name="back" value="戻る">
        <input type="submit" name="btn_submit" value="送信する">
        <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
        <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
        <input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
        <input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
        <input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
        <input type="hidden" name="contact" value="<?php echo h($_POST['contact']); ?>">
        <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
      </form>
    <?php endif; ?>
  <?php endif; ?>

  <?php if($pageFlag === 2): ?>
    <?php if($_POST['csrf'] === $_SESSION['csrfToken']):?>
      <?php require '../mainte/insert.php';

      insertContact($_POST);
      ?>

      送信が完了しました
      <?php unset($_SESSION['csrfToken']);?>
    <?php endif; ?>
  <?php endif; ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
