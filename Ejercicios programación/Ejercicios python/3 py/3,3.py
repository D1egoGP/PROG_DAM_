viaje = ["Madrid", "Barcelona", "Valencia", "Sevilla"]
print("viaje")
for i, ciudad in enumerate(viaje, start = 0):
    print(i + 1, ". ", viaje[i])
posicion = int(input("Ingresa la posición: "))
if 1 <= posicion <= len(viaje):
    print(viaje[posicion - 1])
else:
    print("Posición inválida")
