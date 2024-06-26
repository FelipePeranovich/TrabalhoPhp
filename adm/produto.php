<?php
    include_once '../funcoes/banco.php';
    $bd = conectar();
    $consulta = "select * from fornecedor order by id_fornecedor";
    $resultado = $bd->query($consulta);
    $consulta2 = "select * from categorias order by id_categoria";
    $resultado2 = $bd->query($consulta2);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">      
  <title>Cadastro de Produtos - Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../estilo/styles.css">
  <link rel="stylesheet" href="../estilo/login.css">
   <!-- JavaScript -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="../telas/index.php"><img style="width:70px" src="../imagens/LogoAtletaShop.png"></a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../adm/produto.php" id="ativo">Cadastro produto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/fornecedor.php" >Cadastro fornecedor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/excluirproduto.php">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/excluirfornecedor.php" >Fornecedores</a>
      </li>

</nav>
</nav>

<div class="container mt-4">
    
    <div class="row">
        <div class="col-md-6">
            <!-- Lado Esquerdo -->
            <form id="produtoForm" method="post" action="../funcoes/cadastroProduto.php">
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto:</label>
                    <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" required>
                </div>
                <div class="form-group">
                    <label for="descricaoProduto">Descrição do Produto:</label>
                    <input type="text" class="form-control" id="descricaoProduto" name="descricaoProduto" rows="3" required>
                </div>
                <div>
                <label for="tipoProduto">Tipo do Produto:</label>
                    <select class="form-control" id="tipoProduto" name="tipoProduto">
                    <option value=""></option>
                    <?php
                while($cat = $resultado2->fetch()){
                echo "<option value=".$cat["id_categoria"].">".$cat['nm_categoria']."</option>";
            }
        ?> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="arquivo">Carregue a imagem aqui:</label>
                    <input type="file" id="fileInput" name="arquivo">
                    <div id="image-container">
                        <span> Imagem será exibida aqui</span>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <!-- Lado Direito -->
                <div class="form-group">
                    <label for="valorProduto">Valor do Produto (R$):</label>
                    <input type="number" step="0.01" class="form-control" id="valorProduto" name="valorProduto" required>
                </div>
                <div class="form-group">
                    <label for="quantidadeProduto">Quantidade do Produto:</label>
                    <input type="number" class="form-control" id="quantidadeProduto" name="quantidadeProduto" required min="1">
                </div>
                <div>
                    <label for="tipoFornecedor">Fornecedor:</label>
                    <select class="form-control" id="tipoFornecedor" name="tipoFornecedor">
                    <option value=""></option>
                    <?php
                while($for = $resultado->fetch()){
                echo "<option value=".$for["id_fornecedor"].">".$for['nm_fornecedor']."</option>";
            }
            $resultado = null;
            $bd = null;
        ?> 
                    </select>
                
            </div>
        </div>
        <!-- Botões de Enviar e Limpar -->
        <div class="col-md-12 text-center mt-3"> 
            <button type="submit" class="btn btn-primary" style="background-color: rgba(11, 47, 88, 0.95)" >Enviar</button>
            <button type="button" class="btn btn-danger" onclick="limparCampos()">Cancelar</button>
        </div>
    </form>    
</div>
    <a href="imagens.php"><button type="button" class="btn btn-dark" >Editar imagem de produto existente</button></a>

<script>
    function limparCampos() {
        document.getElementById("produtoForm").reset();
    }
    //Código uploud imagem.
    const fileInput = document.getElementById('fileInput');
    const imageContainer = document.getElementById('image-container');

        let file;

        // Ao selecionar um arquivo
        fileInput.addEventListener('change', (event) => {
            file = event.target.files[0];
        });

        // Ao clicar fora do input de seleção
        document.addEventListener('click', (event) => {
            if (!fileInput.contains(event.target) && file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement('img');
                    img.src = e.target.result;

                    // Limpa o container e adiciona a nova imagem
                    imageContainer.innerHTML = '';
                    imageContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
                file = null; // Reseta o arquivo para evitar múltiplos carregamentos
            }
        });
</script>
<style>
  #image-container {
            width: 150px;
            height: 150px;
            border: 2px dashed #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        #image-container img {
            max-width: 100%;
            max-height: 100%;
        }
</style>
</body>
</html>



