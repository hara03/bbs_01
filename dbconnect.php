<?php
try {
    $db = new PDO ('mysql:dbname=bbs;host=localhost;charset=utf8mb4',
    'root',
    'root',
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

} catch (PDOException $e) {
echo $e->getMessage();
exit;
}
?>

