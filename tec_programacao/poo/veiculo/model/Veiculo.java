package tec_programacao.poo.veiculo.model;

public class Veiculo {
    private String placa;
   private String marca;
   private String modelo;

   public Veiculo(String placa, String marca, String modelo) {
      this.placa = placa;
      this.marca = marca;
      this.modelo = modelo;
   }
   public String getPlaca() {
      return placa;
   }
   public void setPlaca(String placa) {
      this.placa = placa;
   }
   public String getMarca() {
      return marca;
   }
   public void setMarca(String marca) {
      this.marca = marca;
   }
   public String getModelo() {
      return modelo;
   }
   public void setModelo(String modelo) {
      this.modelo = modelo;
   }
   public void ligar() {
      System.out.println("Ligou! ");
   }
   public void desligar() {
      System.out.println("Desligou! ");
   }

   @Override
   public String toString() {
      return "Veículo = "
              + "{Placa: " + this.getPlaca()
              + " | Marca: " + this.getMarca()
              + " | Modelo: " + this.getModelo() + "}";
   }
}
