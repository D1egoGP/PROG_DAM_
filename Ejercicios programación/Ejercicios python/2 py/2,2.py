def calcular_promedio():
    suma_total = 0
    conteo_numeros = 0
    continuar = True


    print("Introduce números enteros. Ingresa 0 para terminar.")


    while continuar:
        numero = int(input("Entrada: "))


        if numero == 0:
            continuar = False  
        else:
            suma_total += numero  
            conteo_numeros += 1    


   
    if conteo_numeros > 0:
        promedio = suma_total / conteo_numeros  
        print(f"El promedio de los números introducidos es {promedio}.")
    else:
        print("No se introdujeron números.")


calcular_promedio()
