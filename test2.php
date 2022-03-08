<?php
    session_start();
    require_once('dbconnect.php');
    if(!isset($_SESSION['join'])) {
        header('Location:test.php');
        exit();
    }
    $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);
    if(!empty($_POST)) {
        $statement = $db->prepare('INSERT INTO members SET name=?, email=?, password=?, created=NOW()');
        $statement->execute(array(
            $_SESSION['join']['name'],
            $_SESSION['join']['email'],
            $hash));
        unset($_SESSION['join']);
        header('Location:test3.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>確認画面</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="action" value="submit">
            <table border="0">
                <tr>
                    <td>ユーザー名</td>
                    <td><span class="check"><?php echo(htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES)) ?></span></td>
                </tr>
                <tr>
                    <td>e-mail</td>
                    <td><span class="check"><?php echo(htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES)) ?></span></td>
                </tr>
                <tr>
                    <td>パスワード</td>
                    <td><span class="check">[セキュリティー保護のため非表示]</span></td>
                </tr>
            </table>
        <input type="button" onclick=history.back() value="修正する" name="rewrite" class="button02">
        <input type="submit" onclick="location.href='test3.php'" value="登録する" name="registration" class="button">

    </form>
    
</body>
</html>