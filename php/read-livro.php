<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM livros");
$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="../css/style-create.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="read-livro.php">Listar Livros</a></li>
                <li><a href="create-livro.php">Adicionar Livro</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Livros</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Data de Lançamento</th>
                    <th>Editora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <td><?= $livro['id'] ?></td>
                        <td><?= $livro['titulo'] ?></td>
                        <td><?= $livro['autor'] ?></td>
                        <td><?= $livro['data_lancamento'] ?></td>
                        <td><?= $livro['editora'] ?></td>
                        <td>
                            <a href="update-livro.php?id=<?= $livro['id'] ?>">Editar</a>
                            <a href="delete-livro.php?id=<?= $livro['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <script>

        const listarLivros = () => {
                        const listContainer = document.createElement('div');
                        listContainer.id = 'lista-livros';
                        document.body.appendChild(listContainer);
        
                        livros.forEach(livro => {
                            const livroItem = document.createElement('div');
                            livroItem.className = 'livro-item';
                            livroItem.innerHTML = `<h3>${livro.titulo}</h3><p>Autor: ${livro.autor}</p><p>Data de Lançamento: ${livro.data_lancamento}</p><p>Editora: ${livro.editora}</p>`;
                            listContainer.appendChild(livroItem);
                        });
                    };
    </script>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Livros</p>
    </footer>
</body>
</html>
