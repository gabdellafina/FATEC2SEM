import java.util.Scanner;

public class numMaior {
    public static void main(String[] args) {
        Scanner ler = new Scanner(System.in);
  
          System.out.println("Digite o primeiro número: ");
          double num1 = ler.nextDouble(); 
  
          System.out.println("Digite o segundo número: ");
          double num2 = ler.nextDouble();
  
          if (num1 > num2) {
              System.out.println("Números diferentes, o primeiro ("+num1+") é maior.");
          } else if (num2 > num1) {
              System.out.println("Números diferentes, o segundo ("+num2+") é maior.");
          } else if (num1 == num2) {
              System.out.println("Números iguais.");
          }
      }
}
