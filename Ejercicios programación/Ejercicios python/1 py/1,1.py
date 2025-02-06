num1 = float(input("Ingrese el primer número: "))


num2 = float(input("Ingrese el segundo número: "))


operacion = input("Ingrese la operación (suma, resta, multiplicación, división): ")


if operacion == "suma":
    resultado = num1 + num2
    print("El resultado es:", resultado)
elif operacion == "resta":
    resultado = num1 - num2
    print("El resultado es:", resultado)
elif operacion == "multiplicación":
    resultado = num1 * num2
    print("El resultado es:", resultado)
elif operacion == "división":
    if num2 == 0:
        print("Error: No se puede dividir entre cero.")
    else:
        resultado = num1 / num2
        print("El resultado es:", resultado)
else:
    print("Operación no válida. Intente de nuevo.")
