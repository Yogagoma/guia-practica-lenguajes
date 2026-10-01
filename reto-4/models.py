from django.db import models

# Traducción de tabla estudiantes
class Estudiante(models.Model):
    cedula = models.CharField(max_length=10) 
    nombre_completo = models.CharField(max_length=70)
    fecha_naciemiento = models.DateField()

'''
El ORM de Django es más seguro porque sanitiza los parámetros de forma automática (similar a lo que ocurre en PHP al usar pdo->prepare()), lo cual previene la inyección SQL.
Además, su uso acelera el desarrollo al facilitar la interpretación de los registros como objetos de Python, sin necesidad de escribir consultas en SQL.
'''