<?php
ini_set('display_errors', on );
error_reporting(E_ALL);

$no = '';
if(isset($_POST['submit'])){
  echo $_POST['type'];
  echo $_POST['detail'];
  echo $_POST['spend'];
  echo $_POST['income'];
    $USER = 'finance';
    $PW = 'Finance10+*';
    $dnsinfo = "mysql:dbname=finance;host=localhost;charset=utf8";
    try{
      $pdo = new PDO($dnsinfo,$USER,$PW);
      $sql = "INSERT INTO kakeibo VALUES(?,?,?,?,?)";
      $stmt = $pdo->prepare($sql);
      $array = array($no,$_POST['type'],$_POST['detail'],$_POST['spend'],$_POST['income']);
      var_dump ($array);
      $res = $stmt->execute($array);
      $ok ='登録が完了しました。<br />';
      #$ok .= $date;
      }catch(Exception $e){
        $res = $e->getMessage();
        echo '失敗！';
      }
}
$ItemName = array("食費","書籍費","学費","美容費","医療費","被服費","年金","保険","家電","PC関連費","文具費","日用品","雑費");
$items = "<select name='type'>";
$items .= "<option value=''>" ."選択してください";
for ($i=0;$i<13;$i++){
  $items .= "<option value='$ItemName[$i]'>$ItemName[$i]</option>";
}
$items .= "</select>";

if(isset($_POST['detail'])){
  $type = $_POST['type'];
  $itemname = $_POST['detail'];
  $result =  "「{$type}」として「{$itemname}」を入力しました。";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>家計簿(単式簿記)システム</title>
  <link rel="stylesheet" href="./css/style.css">
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
      <li><a href="/>">入力</a></li>
      <li><a href="list.php">リスト表記</a></li>
      <li><a href="graphical.php">グラフ</a></li>
    </ul>
  </nav>
  <main>
    <form action="" method="post">
      <table border="1">
        <tr>
          <th align="center">
            品目
          </th>
          <th>
            詳細
          </th>
          <th>
            支出
          </th>
          <th>
            収入
          </th>
        </tr>
          <td>
            <?php echo $items;?>
          </td>
          <td>
            <input type="text" name="detail" size="10" value=""/>
          </td>
          <td>
            <input type="text" name="spend" value="0" size="5">
          </td>
          <td>
            <input type="text" name="income" value="0" size="5">
          </td>
      </table>
      <input type="submit" name="submit" value="確定">
    </form>
    <?php// echo $result;?>
  </main>
<footer>
  <address>
    Copyright 2018 N,Allright Reserved.
  </address>
</footer>
</body>
</html>
