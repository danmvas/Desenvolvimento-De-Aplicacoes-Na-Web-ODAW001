from django.db import models


class Veterinario (models.Model):
    vet_nome = models.CharField(max_length=50)
    salario = models.CharField(max_length=10)
    endereco = models.CharField(max_length=100)

    def __str__(self):
        return self.vet_nome