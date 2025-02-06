def calcular_longitud(palabra):
    return len(palabra)


palabras = ["holo", "planeta", "programación", "python", "java"]


resultado = list(map(calcular_longitud, palabras))
print(resultado)


