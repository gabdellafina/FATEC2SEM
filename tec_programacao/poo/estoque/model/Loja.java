package tec_programacao.poo.estoque.model;
import java.util.ArrayList;
import java.util.List;

public class Loja {
    private final List<Produto> produtos = new ArrayList<>();

   public void adicionarProduto(Produto produto){
      if(produto.getQTD() > 0){
         this.produtos.add(produto);
      } else {
         System.out.println("Não há quantidade suficiente!");
      }
   }
   public void removerProduto(Produto produto){
      for(Produto prod : this.produtos){
         if(prod.getCodigo().equals(produto.getCodigo())){
            this.produtos.remove(produto);
         } else {
            System.out.println("Não foi possível remover o produto");
         }
      }
   }
   public void buscarProduto(String nome){
      for(Produto prod : this.produtos){
         if(prod.getNome().equals(nome)){
            System.out.println("Produto " + nome + " encontrado!");
         } else {
            System.out.println("Produto não encontrado!");
         }
      }
   }
   public void calcularEstoque(){
      double soma = 0;
      for(Produto prod : this.produtos) {
        soma += prod.calcularValorEstoqueProduto();
      }
      System.out.println("VALOR ESTOQUE TOTAL: " + soma);
   }
   public void exibirProdutos(){
      System.out.println("PRODUTOS DA LOJA: ");
      for(Produto prod : this.produtos){
         System.out.println(prod.getNome());
      }
   }
}
