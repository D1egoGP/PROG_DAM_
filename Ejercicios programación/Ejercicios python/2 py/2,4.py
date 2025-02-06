def verificacion_contraseña():
    contraseña_correcta = "python123"  
    ingresada_correctamente = False  


    print("Introduce la contraseña:")


    while not ingresada_correctamente:
        contraseña_ingresada = input("Entrada: ")


        if contraseña_ingresada == contraseña_correcta:
            ingresada_correctamente = True  
            print("¡Acceso concedido!")  
        else:
            print("Contraseña incorrecta, intenta de nuevo.")  




verificacion_contraseña()