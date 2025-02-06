import random


def adivina_el_numero():
   
    numero_secreto = random.randint(1, 100)
    intentos = 0


    print("¡Bienvenido al juego de adivinar el número!")
    print("He elegido un número entre 1 y 100. ¡Intenta adivinarlo!")


    while True:
   
        intento = input("Ingresa tu número: ")


       
        if intento.isdigit():
            intento = int(intento)
            intentos += 1


            if intento < 1 or intento > 100:
                print("Por favor, ingresa un número entre 1 y 100.")
            elif intento < numero_secreto:
                print("Demasiado bajo. Intenta nuevamente.")
            elif intento > numero_secreto:
                print("Demasiado alto. Intenta nuevamente.")
            else:
                print(f"¡Correcto! El número secreto era {numero_secreto}.")
                print(f"Te tomó {intentos} intentos adivinarlo.")
                break  
        else:
            print("Por favor, ingresa un número válido.")


adivina_el_numero()


