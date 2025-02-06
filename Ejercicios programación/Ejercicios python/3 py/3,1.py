playlist = []
while True:
    cancion = input ("introducir nombre de la cancion (o 'fin' para terminar): ")
    if cancion.lower() == 'fin':
        break
    playlist.append(cancion)    
print("lista de canciones:")
for cancion in playlist:
     print(cancion)
   
cancion_seleccionada = input("Ingresar el nombre de la cancion que se quiera reproducir:")
if cancion_seleccionada in playlist:
        print(f'reproduciendo"{cancion_seleccionada}" ...')
else:
        print("La cancion no esta en la lista")
