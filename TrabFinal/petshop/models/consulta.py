from django.db import models

class Consulta(models.Model):
    vet_id = models.ForeignKey(Veterinario, on_delete=models.CASCADE)
    pet_id = models.ForeignKey(Pet, on_delete=models.CASCADE)
    datahora_consulta = models.DateTimeField()

    def __str__(self):
        return self.vet_id.vet_nome + ' - ' + self.pet_id.pet_nome
		