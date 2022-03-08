<?php
session_start();
require('dbconnect.php');
 
if(!empty($_POST)) {
    if(($_POST['email'] != '') && ($_POST['password'] != '')) {
        $login = $db->prepare('SELECT * FROM members WHERE email=?');
        $login->execute(array($_POST['email']));
        $member=$login->fetch();
        
        if(password_verify($_POST['password'],$member['password'])) {
            $_SESSION['id'] = $member['id'];
            $_SESSION['time'] =time();
            header('Location: test4.php');
            exit();
        } else {
            $error['login']='failed';
        } 
    } else {
        $error['login'] ='blank';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
</head>
<body>
 
    <form action='' method="post">
        <table border="0">
            <tr>
                <td style="width:100px">e-mail</td>
                <td><input type="text" name="email" style="width:200px" value="<?php echo htmlspecialchars($_POST['email']??"", ENT_QUOTES) ?>"></td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td><input type="password" name="password" style="width:200px" value="<?php echo htmlspecialchars($_POST['password']??"", ENT_QUOTES) ?>"></td>
            </tr>
            <tr>
                <td colspan="2" height="25">
                    <?php if (isset($error['login']) &&  ($error['login'] =='blank')): ?>
                        <nobr class="error"><font color="red">メールアドレスとパスワードを入力してください</font></nobr>
                    <?php endif ?>
 
                    <?php if( isset($error['login']) &&  $error['login'] =='failed'): ?>
                        <nobr class="error"><font color="red">メールアドレスまたはパスワードが間違っています</font></nobr>
                    <?php endif ?>
                </td>
            </tr>
        </table>
        <div class="login2"><input type="submit" value="ログインする" class="button"></div>
         
    </form>
    <div class="head">
        <span class="registration"><a href="test1.php">新規登録はこちら</a></span>
    </div>
 
</body>
</html>