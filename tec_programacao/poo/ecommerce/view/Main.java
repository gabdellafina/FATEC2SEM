package tec_programacao.poo.ecommerce.view;

import tec_programacao.poo.ecommerce.controller.CarrinhoDeCompras;
import tec_programacao.poo.ecommerce.model.Produto;
import tec_programacao.poo.ecommerce.controller.CarrinhoDeCompras;

public class Main {
	public static void main(String[] args) {
		var carrinho = new CarrinhoDeCompras();
		Produto prod1 = new Produto(1,"Celular",
				"Celular Top",500,10);
		Produto prod2 = new Produto(2,"PC",
				"XUXA",800,5);
		prod1.exibirInformacoes();
		prod2.exibirInformacoes();
		//ItemCarrinho item = new ItemCarrinho(prod2,2);
		carrinho.adicionarItem(prod2, 2);
		carrinho.adicionarItem(prod1, 2);
		carrinho.adicionarItem(prod2, 4);
		//carrinho.removerItem(prod1);
		carrinho.exibirCarrinho();
		System.out.println(carrinho.calcularTotal());
		
		
	}
}
