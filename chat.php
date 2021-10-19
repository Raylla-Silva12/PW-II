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

    .meu {
        color: purple;
    }
</style>

<div class="chat">
    <?php
    $sql = 'SELECT origem, mensagem FROM msg';
    $resultado = $conexao->query($sql);

    while ($msg = $resultado->fetch_array()) {
        $cor = ($msg['origem'] == $_SESSION['nick']) ? 'meu' : '';
        echo '<b class="'.$cor.'">';
        echo $msg['origem'] . ":</b> " . $msg['mensagem'];
        echo "<br>";
    }
    ?>
</div>

<form method="post">
    Mensagem:
    <textarea name="msg"></textarea>
    <button>Enviar</button>
</form>

<?php
if ($_POST) {
    $sql = 'INSERT INTO msg VALUES (null, "' . $_SESSION['nick'] . '","' . $_POST['msg'] . '")';
    $resultado = $conexao->query($sql);
    if (!$resultado) {
        echo "mensagem não enviada: " . $conexao->error;
    }
}

?>