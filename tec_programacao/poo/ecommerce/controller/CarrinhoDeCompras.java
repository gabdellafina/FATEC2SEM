package tec_programacao.poo.ecommerce.controller;

import tec_programacao.poo.ecommerce.model.ItemCarrinho;
import tec_programacao.poo.ecommerce.model.Produto;

import java.util.ArrayList;
import java.util.List;

public class CarrinhoDeCompras {
	private List<ItemCarrinho> itens = new ArrayList<>();
	
	public void adicionarItem(Produto produto, int qtd) {
		if(produto.verificarDisponibilidade(qtd)) {
			ItemCarrinho itemC = new ItemCarrinho(produto, qtd);
			this.itens.add(itemC);
			produto.removerEstoque(qtd);
		}else {
			System.out.println("Quantidade Insuficiente");
		}
	}
	public void removerItem(Produto produto) {
		ItemCarrinho itemParaRemover = null;
		for(ItemCarrinho item : this.itens ) {
			if(item.getProduto().getId() == produto.getId()) {
				itemParaRemover = item;
				produto.adicionarEstoque(item.getQTD());
			}
		}
		if(itemParaRemover == null) {
			System.out.println("Não há produtos com esse nome");
		}else {
			this.itens.remove(itemParaRemover);
		}
	}
	//calcularTotal exibirCarrinho
	public double calcularTotal() {
		double total = 0;
		for(ItemCarrinho item : this.itens) {
			total += item.calcularValor();
		}
		return total;
	}
	public void exibirCarrinho() {
		for(ItemCarrinho item : this.itens) {
			item.mostraItem();
		}
	}
}





