agenda = {}
while True:
    nombre = input("Ingresa el nombre del contacto (o 'fin' para terminar): ")
    if nombre.lower() == 'fin':
        break
    numero = input(f"Ingresa el numero del contacto {nombre}: ")
    agenda[nombre] = numero
print("Contactos: ")
for nombre, numero in agenda.items():
    print("{nombre}: {numero}")
busqueda = input("Ingresa el nombre del contacto: ")
if busqueda in agenda:
    print(f"El numero de telefono de {busqueda} es {agenda[busqueda]}")
else:
    print(f"No se encontro el contacto {busqueda}")
       
