'''
Crea un script en Python que contenga una clase Estudiante con los atributos nombre y 
promedio. 
'''

class Estudiante:
    def __init__(self, nombre:str, promedio:float):
        self.nombre = nombre
        self.promedio = self.__validar_promedio(promedio)

    # Valida el promedio ingresado antes de asignarlo en el constructor
    def __validar_promedio(self, promedio:float):
        try:
            if promedio < 0.0:
                raise ValueError("Número inválido")
            return promedio
        # En caso de un promedio negativo, asignar cero
        except ValueError:
            return 0.0


# Ingresar tamaño de la lista de estudiante mayor o igual a 5
while(True):
    n = int(input("Ingrese la cantidad de estudiantes: "))

    # Salir del ciclo cuando el valor es mayor o igual a 5
    if(n >= 5):
        break

    print("Cantidad inválida, inténtelo nuevamente. \n")

# Crear lista de estudiantes
estudiantes = []

# Llenar lista
for i in range(n):
    print(f"{i+1}.\n") # mostrar número de estudiante
    nombre = input("Nombre: ")
    promedio = float(input("Promedio: "))
    print()
    estudiantes.append(Estudiante(nombre, promedio))


# Filtrar estudiantes con promedio mayor o igual a 14
estudiantes_mayor = list(filter(lambda e: e.promedio >= 14.0, estudiantes))

# Mostrar estudiantes
if(len(estudiantes_mayor) == 0):
    print("No hay estudiantes con promedio mayor o igual a 14 puntos")
else:
    print("**********Estudiantes con promedio mayor o igual a 14 puntos**********\n\n")
    for e in estudiantes_mayor:
        print(f"Nombre: {e.nombre}. \nPromedio: {e.promedio}\n\n")