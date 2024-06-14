<?php
Class Comissionado extends Funcionario{
    private $vendas;

    public function __construct($_codigo, $_nome, $_valorHora, $horasTrabalhadas, $_vendas)
	{
		parent::__construct($_codigo, $_nome, $_valorHora, $horasTrabalhadas);
        $this->vendas = $_vendas;
    }

    public function setVendas($_vendas){
		$this->vendas = $_vendas;
	}  

	public function getVendas(){
		return $this->vendas;
	}


    public function calcularSalario2($_valorHora, $_horasTrabalhadas,$_vendas){
        return ($_valorHora*$_horasTrabalhadas)+($_vendas*0.15);


    }
    
}
?>
