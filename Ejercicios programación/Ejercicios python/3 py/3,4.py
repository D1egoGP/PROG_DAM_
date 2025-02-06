calificaciones = {}
while True:
    asignatura = input("Ingresa el nombre de la asignatura (o 'fin' para terminar): ")
   
    if asignatura.lower() == 'fin':
        break


    calificacion = float(input(f"Ingresa la calificación de {asignatura}: "))
    calificaciones[asignatura] = calificacion
print("Resumen de calificaciones:")
for asignatura, calificacion in calificaciones.items():
    print(f"- {asignatura}: {calificacion}")
if calificaciones:
    media = sum(calificaciones.values()) / len(calificaciones)
    print(f"Calificación media: {media:.2f}")
else:
    print("No se ingresaron calificaciones.")
