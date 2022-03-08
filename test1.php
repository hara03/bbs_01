<?php
session_start();
require_once('dbconnect.php');
if(!empty($_POST)) {
    if($_POST['name'] == "") {
        $error['name'] = 'blank';
    }
    if($_POST['email'] == "") {
        $error['email'] = 'blank';
    }
    if(strlen($_POST['password'])<6) {
        $error['password'] = 'length';
    }
    if(empty($error)) {
        $_SESSION['join'] = $_POST;
        header('Location:test2.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>会員登録</title>
</head>
<body>
    <form action="" method="post">
        <table  border="0">
            <tr>
                <td>ユーザー名 </td>
                <td><input type="text" name="name" width="200" value="<?php echo htmlspecialchars($_POST['name']??"", ENT_QUOTES) ?>"></td>
            </tr>
            <tr>
                <td colspan="2" height="25">
                    <?php if(isset($error['name']) && ($error['name'] == 'blank')): ?>
                        <nobr><font color="red">名前を入力してください</font></nobr>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td>e-mail</td>
                <td><input type="text" name="email" width="200" value="<?php echo htmlspecialchars($_POST['email']??"", ENT_QUOTES); ?>"></td>
            </tr>
            <tr>
                <td colspan="2" height="25">
                    <?php if(isset($error['email']) && ($error['email'] == 'blank')): ?>
                        <nobr><font color="red">e-mailを入力してください</font></nobr>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td><input type="password" name="password" width="200" value="<?php echo htmlspecialchars($_POST['password']??"", ENT_QUOTES) ?>"></td>
            </tr>
            <tr>
                <td colspan="2" height="25">
                    <?php if(isset($error['password']) && ($error['password'] == 'length')): ?>
                        <nobr><font color="red">6文字以上入力してください</font></nobr>
                    <?php endif ?>
                </td>
            </tr>
        </table>
        <input type="submit" value="確認する">
        
    </form>

</body>
</html>