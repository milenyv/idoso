<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Desconto Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Cadastro do Cliente</h2>
    <form method="post">
        <label>Nome do Cliente:</label>
        <input type="text" name="nome" required>

        <label>Idade:</label>
        <input type="number" name="idade" min="0" required>

        <label>Valor da Compra (R$):</label>
        <input type="number" name="valor" step="0.01" required>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $idade = intval($_POST["idade"]);
        $valorCompra = floatval($_POST["valor"]);

        // Aplica desconto só se idade >= 65 E compra >= 1000
        if ($idade >= 65 && $valorCompra >= 1000) {
            $valorPagar = $valorCompra - ($valorCompra * 0.10);
        } else {
            $valorPagar = $valorCompra;
        }

        echo "<div class='resultado'>";
        echo "<strong>Nome do Cliente:</strong> $nome <br>";
        echo "<strong>Idade:</strong> $idade anos <br>";
        echo "<strong>Valor da Compra:</strong> R$ " . number_format($valorCompra, 2, ',', '.') . "<br>";
        echo "<strong>Valor a Pagar:</strong> R$ " . number_format($valorPagar, 2, ',', '.') . "<br>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
