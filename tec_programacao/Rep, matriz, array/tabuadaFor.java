import java.util.Scanner;

public class tabuadaFor {
    public static void main(String[] args) {
        Scanner ler = new Scanner(System.in);
  
          System.out.println("Digite um número: ");
          double num = ler.nextDouble(); 
  
          for (int i = 1; i <= 10; i++){
              double tabuada = num * i;
              System.out.println(Math.round(tabuada));
  
          }
      }
}
