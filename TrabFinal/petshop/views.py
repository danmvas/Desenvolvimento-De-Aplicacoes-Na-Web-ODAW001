from rest_framework import viewsets, generics
from petshop.models import Pet, Veterinario, Consulta
from petshop.serializer import PetSerializer, VeterinarioSerializer, ConsultaSerializer
from rest_framework.authentication import BasicAuthentication
from rest_framework.permissions import IsAuthenticated


class PetsViewSet(viewsets.ModelViewSet):
    """    Exibindo todos os pets    """
    queryset = Pet.objects.all().order_by('pet_nome')
    serializer_class = PetSerializer
    authentication_classes = [BasicAuthentication]
    permission_classes = [IsAuthenticated]


class VeterinariosViewSet(viewsets.ModelViewSet):
    """    Exibindo todos os veterinarios    """
    queryset = Veterinario.objects.all().order_by('vet_nome')
    serializer_class = VeterinarioSerializer
    authentication_classes = [BasicAuthentication]
    permission_classes = [IsAuthenticated]


class ConsultasViewSet(viewsets.ModelViewSet):
    """    Exibindo todas as consultas    """
    queryset = Consulta.objects.all().order_by('datahora_consulta')
    serializer_class = ConsultaSerializer
    authentication_classes = [BasicAuthentication]
    permission_classes = [IsAuthenticated]