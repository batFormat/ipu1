<?php
require 'db.php';

$data = $_POST;
if ( isset($data['do_login']) )
{
    $user = R::findOne('ls', 'nlic = ?', array($data['nlic'])); //ls таблица в бд
    if ( $user )
    {
        //логин существует
        if($data['house'] === $user->house) //проверка соостветсвия пароля
        {
            //если пароль совпадает, то нужно авторизовать пользователя
            $_SESSION['logged_user'] = $user;

            echo 'Ваш адрес $<br/><a href="ipu.php">Передать показания</a><hr>';
        }else
        {
            $errors[] = 'Неверно введен пароль!';
        }

    }else
    {
        $errors[] = 'Пользователь с таким логином не найден!';
    }

    if ( ! empty($errors) )
    {
        //выводим ошибки авторизации
        echo '<div idls="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
    }

}

?>


<form action="login.php" method="POST">
    <strong>Логин</strong>
    <input type="text" name="nlic" value="<?php echo @$data['nlic']; ?>"><br/>

    <strong>Пароль</strong>
    <input type="varchar" name="house" value="<?php echo @$data['house']; ?>"><br/>

    <button type="submit" name="do_login">Войти</button>
</form>