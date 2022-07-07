<?php
include_once("../classes/Conexao.php");
include_once("../classes/Utilidades.php");
class Animal
{

    private $id;
    private $nome;
    private $id_cliente;

    private $utilidades;

    public $retornoBD;
    public $conexaoBD;

    public function  __construct()
    {
        $objConexao = new Conexao();
        $this->conexaoBD = $objConexao->getConexao();
        $this->utilidades = new Utilidades();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function setNome($nome)
    {
        //validacao
        return $this->nome =  mb_strtoupper($nome, 'UTF-8');
    }

    public function setId($id)
    {
        //validacao
        return $this->id = $id;
    }
    public function setIdCliente($id)
    {
        //validacao
        return $this->id_cliente = $id;
    }

    public function cadastrar()
    {

        if ($this->getNome() != null and $this->getIdCliente() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO animal(nome, id_cliente) VALUES (?,?)");
            $nome = $this->getNome();
            $id_cliente = $this->getIdCliente();
            $interacaoMySql->bind_param('si', $nome, $id_cliente);
            $retorno = $interacaoMySql->execute();

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $id, "admin.php?rota=visualizar_animal", "O animal foi cadastrado com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro, cadastro não realizado! Nome e/ou Cliente não foi infomado.");
        }
    }
    public function editar()
    {

        if ($this->getId() != null) {
            $nome = $this->getNome();
            $id_cliente = $this->getIdCliente();
            $id = $this->getId();
            $interacaoMySql = $this->conexaoBD->prepare("UPDATE animal set nome=?, id_cliente=? WHERE id=?");
            $interacaoMySql->bind_param('sii', $nome, $id_cliente, $id);
            $retorno = $interacaoMySql->execute();
            if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
            }

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $this->getId(), "admin.php?rota=visualizar_animal", "Os dados do animal foram alterados com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro! ID não foi infomado.");
        }
    }

    public function selecionarPorId($id)
    {
        $sql = "select * from animal where id=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
    public function selecionarPorNome($nome)
    {
        $sql = "select * from animal where nome LIKE '%$nome%'";;
        if ($nome != " " and $nome != '') {
            $this->retornoBD = $this->conexaoBD->query($sql);
        } else {
            $this->selecionarAnimais();
        }
    }
    public function selecionarPorIdCliente($id_cliente)
    {
        $sql = "select * from animal where id_cliente LIKE '%$id_cliente%'";
        if ($id_cliente != " " and $id_cliente != '') {
            $this->retornoBD = $this->conexaoBD->query($sql);
        } else {
            $this->selecionarAnimais();
        }
    }
    public function selecionarAnimais()
    {
        $sql = "select * from animal order by id DESC";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }

    public function deletar($id)
    {
        $sql = "DELETE from animal where id=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD, 'admin.php?rota=visualizar_animal', 'O animal foi deletado com sucesso!');
    }
}
