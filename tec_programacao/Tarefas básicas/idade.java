import java.util.Scanner;

public class idade {
    public static void main(String[] args) {
        Scanner ler = new Scanner(System.in);

        System.out.println("Digite sua idade: ");
        int idade = ler.nextInt();

        if (idade < 18){
            System.out.println("Você é menor de idade.");
        } else if (idade > 18 && idade < 60){
            System.out.println("Você é adulto.");
        } else {
            System.out.println("Você é idoso.");;
        }
    }
}
