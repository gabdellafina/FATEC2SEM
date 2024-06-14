package tec_programacao.poo.veiculo.model;

public class Moto extends Veiculo {
    private boolean bagageiro;

   public Moto(String placa, String modelo, String marca, boolean bagageiro) {
      super(placa, modelo, marca);
      this.bagageiro = bagageiro;
   }

   public void empinar() {
      System.out.println("A moto está empinando!");
   }

   public String toString() {
      return "Moto = "
              + "{Placa: "+ this.getPlaca()
              + " | Marca: "+ this.getMarca()
              + " | Modelo: "+ this.getModelo()
              + " | Bagageiro: " + (this.bagageiro ? "Possui Bagageiro" : "Não Possui Bagageiro") + "}";
   }
}
