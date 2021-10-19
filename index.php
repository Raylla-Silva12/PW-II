<form action="" method="post">
    Digite seu NICK:
    <input type="text" name="nick">
    <br>
    <button>Entrar ></button>
</form>

<?php
session_start();
if ($_POST) {
    $nick = $_POST['nick'];
    $_SESSION['nick'] = $nick;
    header('Location: chat.php');
}
?>