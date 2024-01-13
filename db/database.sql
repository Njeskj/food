CREATE TABLE restaurantes (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    NomeRestaurante VARCHAR(100),
    Descricao VARCHAR(255),
    Endereco VARCHAR(200),
    Telefone VARCHAR(20),
    Email VARCHAR(100)
);

CREATE TABLE pratos (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    RestauranteID INT,
    NomePrato VARCHAR(100),
    Descricao VARCHAR(255),
    Preco DECIMAL(10, 2),
    FOREIGN KEY (RestauranteID) REFERENCES restaurantes(ID)
);

-- Crie outras tabelas aqui, como categorias, restaurantes_categorias, etc.
