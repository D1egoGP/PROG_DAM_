menu = {
    "cafe": (1.5, 50),
    "te": (1.0, 0),
    "bocadillo": (3.0, 300),
    "ensalada": (2.5, 150)
}


print("Menú:")
for producto, (precio, calorias) in menu.items():
    print(f"- {producto}: {precio}€ ({calorias} cal)")


pedido = []
total_precio = 0
total_calorias = 0


while True:
    eleccion = input("Ingresa el nombre del producto que deseas agregar (o 'fin' para terminar): ")
   
    if eleccion.lower() == 'fin':
        break
   
    if eleccion in menu:
        pedido.append(eleccion)
        precio, calorias = menu[eleccion]
        total_precio += precio
        total_calorias += calorias
    else:
        print("Producto no encontrado en el menú. Intenta de nuevo.")


print("Tu pedido:")
for item in pedido:
    print(f"- {item}")


print(f"Total a pagar: {total_precio:.2f}€")
print(f"Calorías totales: {total_calorias} cal")
