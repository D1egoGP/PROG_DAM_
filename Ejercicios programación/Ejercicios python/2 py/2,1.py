palabra = input("Por favor, ingresa una palabra: ")


palabra_invertida = ""
for i in range(len(palabra) - 1, -1, -1):
    palabra_invertida += palabra[i]
print("La palabra invertida es:", palabra_invertida)