package tec_programacao.poo.conta_bancaria.model;

public class ContaBancaria {
   private int numConta;
   private int agencia;
   private String tipoConta;
   private String nmCliente;
   private double valor = 0;
   private double limite = 200;

   public ContaBancaria(int numConta, int agencia, String tipoConta, String nmCliente) {
      this.numConta = numConta;
      this.agencia = agencia;
      this.tipoConta = tipoConta;
      this.nmCliente = nmCliente;
   }

   public void getValor() {
      System.out.println("Seu Saldo: " + this.valor);
      System.out.println("Seu Limite: " + this.limite);
   }
   public void depositarValor(double valor) {
      if (this.limite < 200) {
         this.limite += valor;
         if (this.limite > 200) {
            double resto = this.limite - 200;
            this.valor += resto;
            this.limite -= resto;
         }
      } else {
         this.valor += valor;
      }
      this.getValor();
   }

   public void sacarValor(double valor) {
      if (this.valor >= valor) {
         this.valor -= valor;
      } else if (this.limite >= valor) {
         if (this.valor > 0) {
            this.valor -= valor;
            this.limite += this.valor;
            this.valor = 0;
         }
      } else {
         System.out.println("Você não tem limite para saque");
      }
      this.getValor();
   }
}