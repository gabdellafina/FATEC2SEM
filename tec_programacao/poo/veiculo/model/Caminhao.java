package tec_programacao.poo.veiculo.model;

public class Caminhao extends Veiculo {
    private double capacidadeCarga;

    public Caminhao(String placa, String marca, String modelo, double capacidadeCarga) {
       super(placa, modelo, marca);
       this.capacidadeCarga = capacidadeCarga;
    }
 
    public double getCapacidadeCarga() {
       return capacidadeCarga;
    }
 
    public void setCapacidadeCarga(double capacidadeCarga) {
       this.capacidadeCarga = capacidadeCarga;
    }
 
    public void acoplarReboque() {
       System.out.println("O caminhão acoplou um reboque!");
    }
 
    public String toString() {
       return "Caminhão = "
               + "{Placa: "+ this.getPlaca()
               + " | Marca: "+ this.getMarca()
               + " | Modelo: "+ this.getModelo()
               + " | Capacidade de Carga: " + this.getCapacidadeCarga() + "}";
    }
}
