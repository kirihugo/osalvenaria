<?php
class FilmeRepositorio
{
    private $conn; // Sua conexão com o banco de dados
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function cadastrar(filme $filme)
    {

        $sql = "INSERT INTO filmes (genero, 
    nome, sinopse, imagem) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssss",
            $filme->getGenero(),
            $filme->getNome(),
            $filme->getSinopse(),
            $filme->getImagemDiretorio()
        );

          // Executa a declaração preparada
          $resultado = $stmt->execute();

          // Fecha a declaração
          $stmt->close();

          return $resultado;
    }

    
    public function atualizarFilme(Filme $filme)
    {
        if (empty($filme->getImagem())) {
            // Prepara a declaração SQL
            $sql = "UPDATE filmes SET genero = ?, nome = ?,
            sinopse = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);

            // Extrai os atributos do objeto filme
            $genero = $filme->getGenero();
            $nome = $filme->getNome();
            $sinopse = $filme->getSinopse();
            $id = $filme->getId();

            // Vincula os parâmetros
            $stmt->bind_param(
                'sssi',
                $genero,
                $nome,
                $sinopse,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();

            // Fecha a declaração
            $stmt->close();

            return $resultado;
        } else {
            // Prepara a declaração SQL
            $sql = "UPDATE filmes SET genero = ?, nome = ?,
            sinopse = ?, imagem = ? WHERE id = ?";

            $stmt = $this->conn->prepare($sql);
            // Extrai os atributos do objeto filme
            $genero = $filme->getGenero();
            $nome = $filme->getNome();
            $sinopse = $filme->getSinopse();
            $imagem = $filme->getImagemDiretorio();
            $id = $filme->getId();

            // Vincula os parâmetros
            $stmt->bind_param(
                'ssssi',
                $genero,
                $nome,
                $sinopse,
                $imagem,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();

            // Fecha a declaração
            $stmt->close();

            return $resultado;
        }
    }

    public function listarTerrorPorId($id)
    {
        $sql = "SELECT * FROM filmes WHERE genero = 'Terror' AND id = ?";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $stmt->execute();

        // Obtém os resultados
        $result = $stmt->get_result();

        $filme = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $filme = new Filme(
                $row['id'],
                $row['genero'],
                $row['nome'],
                $row['sinopse'],
                $row['imagem']
            );
        }

        // Fecha a declaração
        $stmt->close();

        return $filme;
    }

    public function listarRomancePorId($id)
    {
        $sql = "SELECT * FROM filmes WHERE genero = 'Romance' AND id = ?";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $stmt->execute();

        // Obtém os resultados
        $result = $stmt->get_result();

        $filme = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $filme = new Filme(
                $row['id'],
                $row['genero'],
                $row['nome'],
                $row['sinopse'],
                $row['imagem']
            );
        }

        // Fecha a declaração
        $stmt->close();

        return $filme;
    }

    public function listarFiccaoPorId($id)
    {
        $sql = "SELECT * FROM filmes WHERE genero = 'Ficçao' AND id = ?";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $stmt->execute();

        // Obtém os resultados
        $result = $stmt->get_result();

        $filme = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $filme = new Filme(
                $row['id'],
                $row['genero'],
                $row['nome'],
                $row['sinopse'],
                $row['imagem']
            );
        }

        // Fecha a declaração
        $stmt->close();

        return $filme;
    }

    public function listarAcaoPorId($id)
    {
        $sql = "SELECT * FROM filmes WHERE genero = 'Açao' AND id = ?";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $stmt->execute();

        // Obtém os resultados
        $result = $stmt->get_result();

        $filme = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $filme = new Filme(
                $row['id'],
                $row['genero'],
                $row['nome'],
                $row['sinopse'],
                $row['imagem']
            );
        }

        // Fecha a declaração
        $stmt->close();

        return $filme;
    }
    public function listarAnimacaoPorId($id)
    {
        $sql = "SELECT * FROM filmes WHERE genero = 'Animaçao' AND id = ?";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $stmt->execute();

        // Obtém os resultados
        $result = $stmt->get_result();

        $filme = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $filme = new Filme(
                $row['id'],
                $row['genero'],
                $row['nome'],
                $row['sinopse'],
                $row['imagem']
            );
        }

        // Fecha a declaração
        $stmt->close();

        return $filme;
    }

    public function listarTerror()
    {
        $sql = "SELECT * FROM filmes where genero = 'Terror' ORDER BY id";
        $result = $this->conn->query($sql);

        $filmes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filme = new Filme(
                    $row['id'],
                    $row['genero'],
                    $row['nome'],
                    $row['sinopse'],
                    $row['imagem']
                );
                $filmes[] = $filme;
            }
        }

        return $filmes;
    }


    public function listarRomances()
    {
        $sql = "SELECT * FROM filmes where genero = 'Romance' ORDER BY id";
        $result = $this->conn->query($sql);

        $filmes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filme = new Filme(
                    $row['id'],
                    $row['genero'],
                    $row['nome'],
                    $row['sinopse'],
                    $row['imagem']
                );
                $filmes[] = $filme;
            }
        }

        return $filmes;
    }
    public function listarAcao()
    {
        $sql = "SELECT * FROM filmes where genero = 'Açao' ORDER BY id";
        $result = $this->conn->query($sql);

        $filmes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filme = new Filme(
                    $row['id'],
                    $row['genero'],
                    $row['nome'],
                    $row['sinopse'],
                    $row['imagem']
                );
                $filmes[] = $filme;
            }
        }

        return $filmes;
    }

    public function listarFiccao()
    {
        $sql = "SELECT * FROM filmes where genero = 'Ficçao' ORDER BY id";
        $result = $this->conn->query($sql);

        $filmes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filme = new Filme(
                    $row['id'],
                    $row['genero'],
                    $row['nome'],
                    $row['sinopse'],
                    $row['imagem']
                );
                $filmes[] = $filme;
            }
        }

        return $filmes;
    }

    public function listarAnimacao()
    {
        $sql = "SELECT * FROM filmes where genero = 'Animaçao' ORDER BY id";
        $result = $this->conn->query($sql);

        $filmes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filme = new Filme(
                    $row['id'],
                    $row['genero'],
                    $row['nome'],
                    $row['sinopse'],
                    $row['imagem']
                );
                $filmes[] = $filme;
            }
        }

        return $filmes;
    }

    public function excluirFilmePorId($id)
    {
        $sql = "DELETE FROM filmes WHERE  
             id = ?";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $success = $stmt->execute();

        // Fecha a declaração
        $stmt->close();

        return $success;
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM filmes ORDER BY genero, id asc";
        $result = $this->conn->query($sql);

        $filmes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filme = new Filme(
                    $row['id'],
                    $row['genero'],
                    $row['nome'],
                    $row['sinopse'],
                    $row['imagem']
                );
                $filmes[] = $filme;
            }
        }
        return $filmes;
    }
}
