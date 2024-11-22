# Base de datos simulada
clientes = {}  # Diccionario para almacenar información de clientes: clave=identificación, valor=diccionario con datos del cliente.
historial_compras = {}  # Diccionario para almacenar historial de compras: clave=identificación, valor=lista de compras.


def registrar_cliente():
    """
    Registra un nuevo cliente en el sistema.
    """
    print("\n--- Registro de Cliente ---")
    identificacion = input("Ingrese el número de identificación: ")
    if identificacion in clientes:  # Verifica si el cliente ya está registrado.
        print("Error: El cliente ya está registrado.")
        return
    # Solicita los datos del cliente.
    nombre = input("Ingrese el nombre completo: ")
    direccion = input("Ingrese la dirección: ")
    telefono = input("Ingrese el teléfono: ")
    correo = input("Ingrese el correo electrónico: ")
    # Agrega el cliente al diccionario `clientes`.
    clientes[identificacion] = {
        "nombre": nombre,
        "direccion": direccion,
        "telefono": telefono,
        "correo": correo
    }
    print("Cliente registrado con éxito.")


def realizar_compra():
    """
    Permite a un cliente realizar una compra y guarda los detalles en el historial.
    """
    print("\n--- Realizar Compra ---")
    identificacion = input("Ingrese el número de identificación: ")
    if identificacion not in clientes:  # Verifica si el cliente está registrado.
        print("Error: El cliente no está registrado.")
        return
    print("Ingrese los detalles de la compra.")
    productos = []  # Lista para almacenar los productos de la compra.
    while True:
        producto = input("Nombre del producto (o 'fin' para terminar): ")
        if producto.lower() == 'fin':  # Finaliza la entrada de productos.
            break
        cantidad = int(input(f"Cantidad de {producto}: "))
        productos.append((producto, cantidad))  # Agrega el producto y la cantidad a la lista.
    # Calcula el total de la compra (precio ficticio de 10 por unidad).
    total = sum(cantidad * 10 for _, cantidad in productos)
    # Guarda la compra en el historial del cliente.
    if identificacion not in historial_compras:
        historial_compras[identificacion] = []
    historial_compras[identificacion].append({
        "productos": productos,
        "total": total
    })
    print(f"Compra registrada con éxito. Total: ${total}")


def visualizar_clientes():
    """
    Muestra una lista de todos los clientes registrados.
    """
    print("\n--- Lista de Clientes Registrados ---")
    if not clientes:  # Verifica si no hay clientes registrados.
        print("No hay clientes registrados.")
        return
    for identificacion, info in clientes.items():  # Itera sobre cada cliente.
        # Muestra los datos del cliente.
        print(f"ID: {identificacion} | Nombre: {info['nombre']} | Dirección: {info['direccion']} | Teléfono: {info['telefono']} | Correo: {info['correo']}")


def buscar_cliente():
    """
    Busca y muestra los detalles de un cliente por su número de identificación.
    """
    print("\n--- Buscar Cliente ---")
    identificacion = input("Ingrese el número de identificación del cliente: ")
    if identificacion in clientes:  # Verifica si el cliente existe.
        info = clientes[identificacion]
        # Muestra los datos del cliente.
        print(f"ID: {identificacion} | Nombre: {info['nombre']} | Dirección: {info['direccion']} | Teléfono: {info['telefono']} | Correo: {info['correo']}")
    else:
        print("Cliente no encontrado.")


def seguimiento_compra():
    """
    Muestra el historial de compras de un cliente.
    """
    print("\n--- Seguimiento de Compra ---")
    identificacion = input("Ingrese el número de identificación del cliente: ")
    if identificacion not in historial_compras:  # Verifica si el cliente tiene compras registradas.
        print("No hay compras registradas para este cliente.")
        return
    print(f"Historial de compras para el cliente {clientes[identificacion]['nombre']}:")
    for idx, compra in enumerate(historial_compras[identificacion], 1):  # Itera sobre el historial del cliente.
        print(f"\nCompra {idx}:")
        for producto, cantidad in compra["productos"]:  # Detalla los productos de la compra.
            print(f"- {producto}: {cantidad} unidades")
        print(f"Total: ${compra['total']}")


def menu():
    """
    Menú principal del programa.
    Permite al usuario elegir entre registrar clientes, realizar compras, visualizar clientes,
    buscar clientes, consultar el historial de compras o salir.
    """
    while True:
        # Opciones del menú principal.
        print("\n--- Menú Principal ---")
        print("1. Registrar cliente")
        print("2. Realizar compra")
        print("3. Visualizar clientes")
        print("4. Buscar cliente")
        print("5. Seguimiento de compra")
        print("6. Salir")
        opcion = input("Seleccione una opción: ")
        # Llama a la función correspondiente según la opción elegida.
        if opcion == "1":
            registrar_cliente()
        elif opcion == "2":
            realizar_compra()
        elif opcion == "3":
            visualizar_clientes()
        elif opcion == "4":
            buscar_cliente()
        elif opcion == "5":
            seguimiento_compra()
        elif opcion == "6":
            print("Saliendo del sistema...")
            break
        else:
            print("Opción no válida, intente de nuevo.")


# Ejecutar el programa
menu()  # Llama al menú principal para iniciar el programa.


