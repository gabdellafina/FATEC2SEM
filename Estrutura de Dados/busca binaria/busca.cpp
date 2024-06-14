#include <iostream>

#include <vector>

#include <algorithm>

void ordenaVet(std::vector<int> &vetor);

int num = vetor.size();

for (int i = 0; i < num - 1; i++)
{

    for (int j = 0; j < num - i - 1; j++)
    {

        if (vetor[j] > vetor[j + 1])
        {

            swap(vetor[j], vetor[j + 1]);
        }
    }
}

int buscaBin(std::vector<int> &vetor, int valor)
{

    int inicio = 0;

    int fim = vetor.size() - 1;

    while (inicio <= fim)
    {

        int meio = inicio + (fim - inicio) / 2;

        if (vetor[meio] == valor)
        {
            return meio;
        }

        if (vetor[meio] < valor)
        {
            inicio = meio + 1;
        }
        else
        {

            fim = meio - 1;
        }
    }

    return -1;
}

int main()
{

    std::vector<int> vetor = {5, 2, 9, 6, 1, 7, 8, 3, 4};

    ordenaVet(vetor);

    std::cout << "Vetor ordenado: ";

    for (int valor : vetor)
    {

        std::cout << valor << "";
    }

    std::cout << std::endl;

    int valorBusca = 6;

    int indice = buscaBin(vetor, valorBusca);

    if (indice != -1)
    {

        std::cout << "O valor " << valorBusca << " foi encontrado no índice " << indice << std::endl;
    }
}