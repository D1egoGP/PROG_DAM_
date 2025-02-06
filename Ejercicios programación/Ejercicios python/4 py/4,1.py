def contar_pares(numeros):
    conteo = 0
    for numero in numeros:
        if numero % 2 == 0:
            conteo += 1
    return conteo
print(contar_pares([1, 2, 3, 4, 5, 6]))  
