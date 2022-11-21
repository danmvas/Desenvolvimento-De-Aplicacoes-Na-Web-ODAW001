from django.contrib import admin
from petshop.models import Veterinario, Pet, Consulta

# Register your models here.


class Veterinarios(admin.ModelAdmin):
    list_display = ('id', 'vet_nome', 'salario', 'endereco')
    list_display_links = ('id', 'vet_nome')
    search_fields = ('vet_nome',)
    list_per_page = 20


class Pets(admin.ModelAdmin):
    list_display = ('id', 'pet_nome', 'idade', 'responsavel', 'especie')
    list_display_links = ('id', 'pet_nome')
    search_fields = ('pet_nome',)
    list_per_page = 20


class Consultas(admin.ModelAdmin):
    list_display = ('id', 'vet_id', 'pet_id', 'datahora_consulta')
    list_display_links = ('id', 'vet_id')
    search_fields = ('vet_id',)
    list_per_page = 20


# admin.site.register (Modelo -> Qual o modelo estamos usando? , Configuração do ModelAdmin que fizemos)
admin.site.register(Veterinario, Veterinarios)
admin.site.register(Pet, Pets)
admin.site.register(Consulta, Consultas)
