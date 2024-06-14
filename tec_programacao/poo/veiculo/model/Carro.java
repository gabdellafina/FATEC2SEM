package tec_programacao.poo.veiculo.model;

public  class Carro extends Veiculo {
    private int qtdPortas;
    private boolean tetoSolar;

   public Carro(String placa, String marca, String modelo, int qtdPortas, boolean tetoSolar) {
      super(placa, marca, modelo);
      this.qtdPortas = qtdPortas;
      this.tetoSolar = tetoSolar;
   }
   public void drift() {
      System.out.println("Cantou pneu ");
   }
   public String toString() {
      return "Carro = "
              + "{Placa: "+ this.getPlaca()
              + " | Marca: "+ this.getMarca()
              + " | Modelo: "+ this.getModelo()
              + " | Portas: " + this.qtdPortas
              + " | TetoSolar:" + (this.tetoSolar ? " Possui" : "Nao Possui") + "}";
   }
}
