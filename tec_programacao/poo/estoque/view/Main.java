package tec_programacao.poo.estoque.view;

import tec_programacao.poo.estoque.model.Loja;
import tec_programacao.poo.estoque.model.Produto;

public class Main {
    public static void main(String[] args) {
      Loja loja = new Loja();
      Produto produto1 = new Produto("1","Caneta",5,3);
      Produto produto2 = new Produto("2","Copo",10,2);

      produto1.atualizarQuantidade(6);
      produto1.calcularValorEstoqueProduto();
      produto2.calcularValorEstoqueProduto();
      produto1.exibirInforamcoes();
      produto2.exibirInforamcoes();

      loja.adicionarProduto(produto1);
      loja.adicionarProduto(produto2);
      loja.exibirProdutos();
      loja.buscarProduto("Caneta");
      loja.calcularEstoque();
   }
}
