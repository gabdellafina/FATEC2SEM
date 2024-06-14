<?php

$salario = $_GET['txtSalbase'];

$Codigodofuncionario = $_GET['txtCodigo'];

$HorasMensaistrabalhadas = $_GET['txtHrmensal'];

$Horasextranomes = $_GET['txtExtra'];

$Valoremreaisdahoratrabalhada = $_GET['txtValor'];

$Numerodedependentes = $_GET['txtDependentes'];

$salariobase = $HorasMensaistrabalhadas * $Valoremreaisdahoratrabalhada;

$salarioExtra = $Horasextranomes * ($Valoremreaisdahoratrabalhada * 1.5);

$acrescimoDependentes = $salariobase * ($Numerodedependentes * 0.03);

$descontoTransporte = $salariobase * 0.06;

$salarioTotal = ($salariobase + $salarioExtra + $acrescimoDependentes - $descontoTransporte);

echo "Código do Funcionário" . $Codigodofuncionario . "<br>";

echo "Salário Bruto: R$ " . number_format($salariobase, 2, ',', '.') . "<br>";

echo "Valor Ganho por Hora Extra: R$ " . number_format($salarioExtra, 2, ',', '.') . "<br>";

echo "Acréscimo Total por Dependentes: R$ " . number_format($acrescimoDependentes, 2, '.', '.') . '<br>';

echo "Desconto Cartão Transporte: R$ " . number_format($descontoTransporte, 2, ",", ".") . "<br>";

echo "Salario total : " . number_format($salarioTotal, 2, ",", ".") . "<br>";