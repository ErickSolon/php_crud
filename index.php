<?php
    //CONEXÃO AO BANCO DE DADOS
    $conn = new mysqli("endereco", "usuario", "senha", "database");

    //CHECAR SE HA ERRO AO CONECTAR AO BANCO DE DADOS
    if($conn->connect_error) {
        echo "Erro: ".$conn->connect_error;
    }

    //INSERIR NO BANCO DE DADOS
    $nome = "Rafael";
    $idade = 20;
    $stmt = $conn->prepare("INSERT INTO Pessoas(nome, idade) VALUES(?, ?)");
    $stmt->bind_param("ss", $nome, $idade);
    $stmt->execute();

    // LISTAR DO BANCO DE DADOS
    $data = array();
    $result = $conn->query("SELECT * FROM Pessoas");
    while($row = $result->fetch_array()) {
        array_push($data, $row);
    }
    foreach($data as $pessoas) {
        echo $pessoas["nome"]."<br>";
    }

    //UPDATE NO BANCO DE DADOS
    $nome = "Daniel";
    $idade = 20;
    $id = 2;
    $stmt = $conn->prepare("UPDATE Pessoas SET nome = ? WHERE id = ?");
    $stmt->bind_param("ss", $nome, $id);
    $stmt->execute();

    // DELETE NO BANCO DE DADOS
    $id = 2;
    $stmt = $conn->prepare("DELETE FROM Pessoas WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
?>