texto = input("ingresar una cadena de texto:")
contador_vocales = 0
vocales = "aeiouAEIOU"
for letra in texto:
    if letra in vocales:
        contador_vocales += 1
        print(f"Número de vocales en la cadena: {contador_vocales}")


