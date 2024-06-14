package tec_programacao.poo.conta_bancaria.view;

import tec_programacao.poo.conta_bancaria.model.ContaBancaria;

public class Main {
    public static void main(String[] args) {
        ContaBancaria minhaConta = new ContaBancaria(001,001,"Corrente","Rigoni");
        minhaConta.depositarValor(30);
        minhaConta.sacarValor(90);
     }
}
