from django.db import models


class Pet (models.Model):
    pet_nome = models.CharField(max_length=30)
    idade = models.IntegerField()
    responsavel = models.CharField(max_length=50)
    especie = models.CharField(max_length=10)

    def __str__(self):
        return self.pet_nome