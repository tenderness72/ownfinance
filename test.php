<html>
<head><title>PHP TEST</title></head>
<body>

<?php

$dsn = 'mysql:dbname=finance;host=localhost;charset=utf8';
$user = 'finance';
$password = 'Finance10+*';

try{
    $dbh = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');

    $dbh->query('SET NAMES sjis');

    $sql = 'select * from money_records';
    foreach ($dbh->query($sql) as $row) {
        print($row['id']);
        print($row['$item'];
        print($row['detail']);
        print($row['outcome']);
        print($row['income'] .'<br>');
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>

</body>
</html>
