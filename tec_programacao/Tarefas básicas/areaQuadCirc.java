import java.util.Scanner;

public class areaQuadCirc {
    public static void main(String[] args) {
      Scanner ler = new Scanner(System.in);

        System.out.println("""
                Escolha uma opção:
                1 - Calcular área do quadrado
                2 - Calcular área do círculo
                """);
        int opcao = ler.nextInt(); 

        switch (opcao) {
            case 1:
                System.out.println("Digite o valor do lado: ");
                double lado = ler.nextDouble();
                double area = lado * lado;
                System.out.println("A área é: "+ Math.round(area));
                break;

            case 2:
                System.out.println("Digite o valor do raio: ");
                double raio = ler.nextDouble();
                double areaC = Math.PI * raio;
                System.out.println("A área é: "+ Math.round(areaC));
                break;
        
            default:
                break;
        }
    }
  
}