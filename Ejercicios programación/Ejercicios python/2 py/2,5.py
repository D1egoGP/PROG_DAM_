def encontrar_numero_mayor():
    numeros = [] 


    print("Ingresa números uno por uno. Escribe 'hecho' para terminar.")


    while True:
        entrada = input("Entrada: ")


        if entrada.lower() == "hecho":  
            break  
        else:
            numeros.append(int(entrada))  
   
    if len(numeros) > 0:
        mayor = numeros[0]  
        for numero in numeros:  
            if numero > mayor:  
                mayor = numero


        print(f"El número mayor ingresado es {mayor}.")
    else:
        print("No se ingresaron números.")  




encontrar_numero_mayor()
