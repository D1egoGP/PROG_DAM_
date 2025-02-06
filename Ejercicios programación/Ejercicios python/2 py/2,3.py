def recoleccion_nombres():
    nombres = []  
    continuar = True  


    print("Ingresa nombres uno por uno. Escribe 'fin' para terminar.")


    while continuar:
        nombre = input("Entrada: ")


        if nombre.lower() == "fin":  
            continuar = False  
        else:
            nombres.append(nombre)  


   
    print(f"Los nombres ingresados son: {nombres}")


   
    print("\nLista de nombres:")
    for nombre in nombres:
        print(f"- {nombre}")


recoleccion_nombres()
