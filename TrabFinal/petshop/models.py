from django.db import models


class Veterinario (models.Model):
    vet_nome = models.CharField(max_length=50)
    salario = models.CharField(max_length=10)
    endereco = models.CharField(max_length=100)

    def __str__(self):
        return self.vet_nome


class Pet (models.Model):
    pet_nome = models.CharField(max_length=30)
    idade = models.IntegerField()
    responsavel = models.CharField(max_length=50)
    especie = models.CharField(max_length=10)

    def __str__(self):
        return self.pet_nome


class Consulta(models.Model):
    vet_id = models.ForeignKey(Veterinario, on_delete=models.CASCADE)
    pet_id = models.ForeignKey(Pet, on_delete=models.CASCADE)
    datahora_consulta = models.DateTimeField()

    def __str__(self):
        return self.vet_id.vet_nome + ' - ' + self.pet_id.pet_nome
