<?php
ini_set('display_errors', on );
error_reporting(E_ALL);

include 'db_accecse.php';

$index .= "<div class='table-responsive'>" ."<table class='table'>";
$index .= "<tr><th align='center'>". "品目" ."</th><th>" ."詳細" ."</th><th>" ."支出" ."</th><th>"　."収入" ."</th></tr>";

$db =new DB();
$sql = "SELECT * FROM money_records";
$res = $db->executeSQL($sql,null);
while($row = $res->fetch(PDO::FETCH_ASSOC)){
  $result .= "<tr><td>" .$row['id'] ."</td><td>" .$row['item'] ."</td><td>"  .$row['detail'] ."</td><td>" .$row['outocome'] ."</td><td>" .$row['income'] ."</td></tr>";
}
$result .= "</table>" ."</div>";


/*if(isset($_POST['insert'])){
    #echo $_POST['item'],$_POST['detail'],$_POST['outcome'],$_POST['income'];
    echo '<br />';
    $USER = 'finance';
    $PW = 'Finance10+*';
    $dnsinfo = "mysql:dbname=finance;host=localhost;charset=utf8";
    try{
      $pdo = new PDO($dnsinfo,$USER,$PW);
      $sql = "INSERT INTO money VALUES(?,?,?,?)";
      $stmt = $pdo->prepare($sql);
      $array = array($_POST['item'],$_POST['detail'],$_POST['outcome'],$_POST['income']);
      $res = $stmt->execute($array);
      echo $res;
      $ok ='登録が完了しました。<br />';
      echo $ok;
      }catch(Exception $e){
        $res = $e->getMessage();
        echo '失敗！';
      }
}*/

/*
$ItemName = array("食費","書籍費","学費","美容費","医療費","被服費","年金","保険","家電","PC関連費","文具費","日用品","雑費");
$items = "<select name='item'>";
$items .= "<option value=''>" ."選択してください";
for ($i=0;$i<13;$i++){
  $items .= "<option value='$ItemName[$i]'>$ItemName[$i]</option>";
}
$items .= "</select>";

if(isset($_POST['detail'])){
  $item = $_POST['item'];
  $outcome = $_POST['detail'];
  $result =  "「{$item}」として「{$outcome}」を入力しました。";
}*/


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>家計簿(単式簿記)システム</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/style2.css" />
  <link rel="stylesheet" href="./css/reset.css">
</head>
<body>
  <meta name="viewport" content="width=device-width" >
  <header>
    <h1>家計簿</h1>
  </header>
  <div id="branding">
      <p>個人用家計簿</p>
  </div>
  <nav>
    <ul>
      <li><a href="./">入力</a></li>
      <li><a href="list.php">リスト表記</a></li>
      <li><a href="graphical.php">グラフ</a></li>
    </ul>
  </nav>
  <main>
    <?php echo $index;?>
    <?php echo $result;?>
  </main>
<footer>
  <address>
    Copyright 2018 N,Allright Reserved.
  </address>
</footer>
</body>
</html>
