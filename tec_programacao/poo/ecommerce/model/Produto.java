package tec_programacao.poo.ecommerce.model;

public class Produto {
	//id, nome, desc, preco, qtd
	private int id;
	private String nome;
	private String desc;
	private double preco;
	private int qtd;
	public Produto(int id, String nome, String desc,
					double preco, int qtd) {
		this.id = id;
		this.nome = nome;
		this.desc = desc;
		this.preco = preco;
		this.qtd = qtd;
	}
	public void atualizarPreco(double novoPreco) {
		this.preco = novoPreco;
	}
	public void adicionarEstoque(int qtd) {
		this.qtd += qtd;
	}
	public void removerEstoque(int qtd) {
		this.qtd -= qtd;
	}
	public boolean verificarDisponibilidade(int qtd) {
		return this.qtd >= qtd;
	}
	public double getPreco() {
		return this.preco;
	}
	public void exibirInformacoes() {
		System.out.println("ID: " + this.id);
		System.out.println("NOME: " + this.nome);
		System.out.println("PREÇO: " + this.preco);
		System.out.println("QUANTIDADE: " + this.qtd);
	}
	public int getId() {
		// TODO Auto-generated method stub
		return this.id;
	}
	public String getNome() {
		// TODO Auto-generated method stub
		return this.nome;
	}
	
	

}
