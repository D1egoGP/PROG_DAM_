def calcular_doble(numero):
    return numero * 2


numeros = [1, 2, 3, 4, 5]


resultado = list(map(calcular_doble, numeros))
print(resultado)