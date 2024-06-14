package tec_programacao.poo.estoque.model;

public class Produto {
    private String codigo;
   private String nome;
   private int quantidade;
   private double preco;

   public Produto(String codigo, String nome, int quantidade, double preco) {
      this.codigo = codigo;
      this.nome = nome;
      this.quantidade = quantidade;
      this.preco = preco;
   }

   public String getCodigo() {
      return this.codigo;
   }
   public String getNome() {
      return this.nome;
   }
   public int getQTD() {
      return this.quantidade;
   }
   public double getPreco() {
      return this.preco;
   }

   public void atualizarQuantidade(int novaQuantidade) {
      this.quantidade = novaQuantidade;
   }
   public double calcularValorEstoqueProduto(){
      return this.quantidade * this.preco;
   }
   public void exibirInforamcoes(){
      System.out.println("CODIGO: " + this.codigo);
      System.out.println("NOME: " + this.nome);
      System.out.println("QUANTIDADE: " + this.quantidade);
      System.out.println("PRECO: " + this.preco);
}
}