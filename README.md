# API Básica de Viagens
Este é um projeto de API básica para gerenciamento de viagens.

## Descrição
A API permite que os usuários realizem operações CRUD (Create, Read, Update, Delete) em viagens, incluindo a criação, listagem, atualização e exclusão de viagens.

### Recursos
- Criação de viagens
- Listagem de viagens
- Atualização de viagens
- Exclusão de viagens

### Endpoints
__Listar todas as viagens:__

```
/api/travel/
```
Retorna todas as viagens cadastradas.


__Criar uma nova viagem__
```
/api/travel/store
```
Cria uma nova viagem com os dados fornecidos.

__Atualizar uma viagem existente__
```
/api/travel/{id}
```
Atualiza os dados de uma viagem existente com o ID fornecido.


__Excluir uma viagem__
```
/travel
```
Exclui a viagem com o ID fornecido.

### Instalação
1. Clone o repositório
2. Renomear o arquivo .env.example para .env
3. Gerar a key: php artisan key:generate
4. Rodar as migrations: php artisan migrate

### Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir um pull request ou relatar problemas.

### Licença
Este projeto está licenciado sob a MIT License.

Espero que este exemplo seja útil para você!
