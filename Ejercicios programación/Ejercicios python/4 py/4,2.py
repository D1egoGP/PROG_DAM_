def encontrar_maximo(numeros):
    if not numeros:  
        return None  
    maximo = numeros[0]
    for numero in numeros:
        if numero > maximo:
            maximo = numero
    return maximo
print(encontrar_maximo([3, 5, 2, 9, 1]))
