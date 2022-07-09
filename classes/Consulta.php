<?php
include_once("../classes/Conexao.php");
include_once("../classes/Utilidades.php");
class Consulta
{

    private $id;
    private $fk_id_animal;
    private $fk_id_cliente;
    private $data;
    private $hora;

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
    public function getFkIdAnimal()
    {
        return $this->fk_id_animal;
    }
    public function getFkIdCliente()
    {
        return $this->fk_id_cliente;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getHora()
    {
        return $this->hora;
    }

    public function setId($id)
    {
        //validacao
        return $this->id = $id;
    }
    public function setFkIdAnimal($fk_id_animal)
    {
        //validacao
        return $this->fk_id_animal = $fk_id_animal;
    }
    public function setFkIdCliente($fk_id_cliente)
    {
        //validacao
        return $this->fk_id_cliente = $fk_id_cliente;
    }
    public function setData($data)
    {
        //validacao
        return $this->data = $data;
    }
    public function setHora($hora)
    {
        //validacao
        return $this->hora = $hora;
    }

    public function cadastrar()
    {

        if ($this->getFkIdAnimal() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO consulta (id_animal, data, hora) 
            VALUES (?, ?, ?)");
            $id_animal = $this->getFkIdAnimal();
            $data = $this->getData();
            $hora = $this->getHora();
            $interacaoMySql->bind_param('iss', $id_animal, $data, $hora);
            $retorno = $interacaoMySql->execute();

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $id, "admin.php?rota=visualizar_consulta", "A consulta foi cadastrada com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro, cadastro não realizado! Animal e/ou Cliente não foi/foram infomado(s).");
        }
    }
    public function selecionarConsultas()
    {
        $sql = "select *, A.id as id_animal from consulta 
                JOIN (animal A NATURAL JOIN cliente)
                ON A.id = consulta.id_animal";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
}
