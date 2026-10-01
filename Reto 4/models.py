from django.db import models

# Traducción de tabla estudiantes
class Estudiante(models.Model):
    cedula = models.CharField(max_length=10) 
    nombre_completo = models.CharField(max_length=70)
    fecha_naciemiento = models.DateField()
