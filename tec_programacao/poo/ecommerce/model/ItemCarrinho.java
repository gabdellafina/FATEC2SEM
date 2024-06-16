package tec_programacao.poo.ecommerce.model;

public class ItemCarrinho {
	private Produto produto;
	private int qtd;
	public ItemCarrinho(Produto produto, int qtd) {
		this.produto = produto;
		this.qtd = qtd;
	}
	public Produto getProduto() {
		return this.produto;
	}
	public int getQTD() {
		return this.qtd;
	}
	public double calcularValor() {
		return produto.getPreco() * this.qtd;
	}
	public void mostraItem() {
		System.out.println("Produto: " + this.produto.getNome()
		+ " Quantidade: " + this.qtd);
	}
	
	
	
	
	
	
}
