import java.util.Scanner;

public class parImpar {
    public static void main(String[] args) {
        Scanner ler = new Scanner(System.in);

        System.out.println("Digite um número inteiro: ");
        int num = ler.nextInt();

        if (num % 2 == 0){
            System.out.println("O número é par");
        } else {
            System.out.println("O número é ímpar");
        }
    }
}
