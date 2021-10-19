<?php
session_start();
if (!isset($_SESSION['nick'])) {
    header('location: index.php');
}

$conexao = new mysqli("localhost", "root", "usbw", "chat");
?>

<style>
    .chat {
        width: 80vw;
        height: 70vh;
        margin-top: 5vh;
        margin-left: 10vw;
        border: 1px solid blue;
    }
</style>

<div class="chat"></div>

<form method="post">
    Mensagem:
    <textarea name="msg"></textarea>
    <button>Enviar</button>
</form>

<?php
    if ($_POST) {
        $sql = 'INSERT INTO msg(null, "'.$_SESSION['nick'].'","'.$_POST['msg'].'")';
    }
    $conexao->query($sql);
?>