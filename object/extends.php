<?php
  class BaseProduct {
    public function echoProduct() {
      echo '親クラスです';
    }
  }

  class Product extends BaseProduct{

    //アクセス修飾子, private(外からアクセスできない), protected(自分・継承したクラス), public(公開)

    //変数
    private $product = [];

    //関数

    //クラスを呼び出した初回に起動する
    function __construct($product = null){

      $this->product = $product;
    }

    public function getProduct(){
      echo $this->product;
    }

    public function addProduct($item){
      $this->product .= $item;
    }

    public static function getStaticProduct($str){
      echo $str;
    }

  }

  $instance = new Product('テスト');

  var_dump($instance);

  $instance->getProduct();
  echo '<br>';

  $instance->echoProduct();
  echo '<br>';

  $instance->addProduct('追加分');
  echo '<br>';

  $instance->getProduct();
  echo '<br>';

  //静的(static)→クラスメソッド クラス名::関数名
  Product::getStaticProduct('静的');
  echo '<br>';

?>
