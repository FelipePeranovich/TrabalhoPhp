/* der_atletashop: */

CREATE TABLE Clientes (
    id_cliente int(11) PRIMARY KEY,
    nm_cliente varchar(255),
    cpf_cliente varchar(11),
    telefone varchar(11),
    cep varchar(8),
    nro int(11),
    email_cliente varchar(255),
    senha_cliente varchar(16)
);

CREATE TABLE Produtos (
    ds_produto varchar(255),
    valor_prod float(10,2),
    nm_produto varchar(255),
    id_produto int(11) PRIMARY KEY,
    fk_Categorias_id_categoria int(11),
    fk_Fornecedor_id_fornecedor int(11)
);

CREATE TABLE Categorias (
    id_categoria int(11) PRIMARY KEY,
    nm_categoria varchar(255)
);

CREATE TABLE Imagem (
    id_imagem int(11) PRIMARY KEY,
    url_imagem varchar(255),
    fk_Produtos_id_produto int(11)
);

CREATE TABLE Vendedor (
    id_vendedor int(11) PRIMARY KEY,
    nm_vendedor varchar(255)
);

CREATE TABLE Compra (
    id_compra int(11) PRIMARY KEY,
    dt_compra date,
    valor_frete float(10,2),
    valor_comissao float(10,2),
    fk_Transportadora_id_transportadora int(11),
    fk_Clientes_id_cliente int(11),
    fk_Vendedor_id_vendedor int(11)
);

CREATE TABLE Transportadora (
    id_transportadora int(11) PRIMARY KEY,
    nm_transportadora varchar(255),
    cnpj_transportadora varchar(15),
    cep_transportadora varchar(8),
    nro_transportadora int(11),
    telefone_transportadora varchar(11)
);

CREATE TABLE Fornecedor (
    id_fornecedor int(11) PRIMARY KEY,
    nm_fornecedor varchar(255),
    cnpj_fornecedor varchar(15),
    atividade_fornecedor varchar(50),
    cep_fornecedor varchar(8),
    nro_fornecedor int(11),
    telefone_fornecedor varchar(11)
);

CREATE TABLE tamanho (
    tamanho_produto varchar(20),
    qtd_tamanho int(11),
    fk_Produtos_id_produto int(11)
);

CREATE TABLE ItemCompra (
    fk_Produtos_id_produto int(11),
    fk_Compra_id_compra int(11),
    quantidade int(11),
    valor int(11)
);
 
ALTER TABLE Produtos ADD CONSTRAINT FK_Produtos_2
    FOREIGN KEY (fk_Categorias_id_categoria)
    REFERENCES Categorias (id_categoria)
    ON DELETE CASCADE;
 
ALTER TABLE Produtos ADD CONSTRAINT FK_Produtos_3
    FOREIGN KEY (fk_Fornecedor_id_fornecedor)
    REFERENCES Fornecedor (id_fornecedor)
    ON DELETE CASCADE;
 
ALTER TABLE Imagem ADD CONSTRAINT FK_Imagem_2
    FOREIGN KEY (fk_Produtos_id_produto)
    REFERENCES Produtos (id_produto)
    ON DELETE CASCADE;
 
ALTER TABLE Compra ADD CONSTRAINT FK_Compra_2
    FOREIGN KEY (fk_Transportadora_id_transportadora)
    REFERENCES Transportadora (id_transportadora)
    ON DELETE RESTRICT;
 
ALTER TABLE Compra ADD CONSTRAINT FK_Compra_3
    FOREIGN KEY (fk_Clientes_id_cliente)
    REFERENCES Clientes (id_cliente)
    ON DELETE CASCADE;
 
ALTER TABLE Compra ADD CONSTRAINT FK_Compra_4
    FOREIGN KEY (fk_Vendedor_id_vendedor)
    REFERENCES Vendedor (id_vendedor)
    ON DELETE CASCADE;
 
ALTER TABLE tamanho ADD CONSTRAINT FK_tamanho_1
    FOREIGN KEY (fk_Produtos_id_produto)
    REFERENCES Produtos (id_produto)
    ON DELETE CASCADE;
 
ALTER TABLE ItemCompra ADD CONSTRAINT FK_ItemCompra_1
    FOREIGN KEY (fk_Produtos_id_produto)
    REFERENCES Produtos (id_produto)
    ON DELETE SET NULL;
 
ALTER TABLE ItemCompra ADD CONSTRAINT FK_ItemCompra_2
    FOREIGN KEY (fk_Compra_id_compra)
    REFERENCES Compra (id_compra)
    ON DELETE SET NULL;