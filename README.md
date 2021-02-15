# Laravel RESTful API com Passport

Aplicação desenvolvida em PHP com Laravel/MySQL.

# Especificações

  - Laravel: 8.0
  - PHP: 7.4
  - MySQL: 10.4.17

# Configuração

  - Atualizar as dependências com o composer ($ composer install);
  - Criar o database no MySQL (basta apenas a base);
  - Configurar o arquivo ".env" com os dados do database;
  - Rodar o comando de migrate/seed (ver: migrations e dummy datas);
  - Gerar uma nova chave para a aplicação (ver: chave de encriptação);
  - Startar a aplicação com o serve nativo ($ php artisan serve).

# Migrations e dummy datas

A aplicação conta com migrations para auxiliar na configuração do database e dummy datas para testes. 

Processando **migrations**:
```sh
$ php artisan migrate
```
Processando **dummy data**:
```sh
$ php artisan db:seed
```

**Observação:** Todos os usuários possuem a senha "password" como padrão.

# Chave de encriptação

A aplicação necessita de uma nova chave de encriptação toda vez que um novo projeto for instanciado.

Processando **chave de encriptação**:
```sh
$ php artisan key:generate
```

# Instalando o Passport

A aplicação utiliza a biblioteca Passport para manter o controle de acesso. 

Inicializando o **Passport**:
```sh
$ php artisan passport:install
```

# Requisições

Exemplo de **Registro**:

**_POST**

- **URL:** /api/register/
- **Restrições:** [campos = requeridos], [email = único]
- **Body:**
```json
{
    "name": "Rafael",
    "email": "rafaelgrd@gmail.com",
    "phone": "(37) 2242-6401",
    "password": "12345",
    "password_confirm": "12345",
    "role_id": 1
}
```
- **Retorno:**
```json
{
    "id": 26,
    "name": "Rafael",
    "email": "rafaelgrd@gmail.com",
    "phone": "(37) 2242-6401",
    "role": [
        {
            "id": 1,
            "name": "Admin"
        }
    ]
}
```

Exemplo de **Login**:

**_POST**

- **URL:** /api/login/
- **Restrições:** [campos = requeridos]
- **Body:**
```json
{
    "email": "rafaelgrd@gmail.com",
    "password": "12345"
}
```
- **Retorno:**
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiM2JiODUzNzQyNTM4OTU2ZGFlYmY3MjA0YWUwMGFmMTAzMTY3OGUzOTBhYTQ1NzU3YjdlZjJjOWQ4ZDM3MWU1NWNjMDhlOGEyNzkwODZjYjUiLCJpYXQiOiIxNjEyMjk4MjAxLjgzNDUwNiIsIm5iZiI6IjE2MTIyOTgyMDEuODM0NTEzIiwiZXhwIjoiMTY0MzgzNDIwMS43NTU4OTciLCJzdWIiOiIyNiIsInNjb3BlcyI6W119.OKyunLGdhO5kChlo_LICI8cNsen1NNAIbTmtjCmEY9Lgui9qHFP7c5u_x7FDyVLDuNqO8srbYyj9N1_GW7mZFA1G4NqqlE7NvYXgKVIXFaOZxSgtmnCtGBDJZ6uAwXCFiHH26LIEDepfFrpedDucM8naURB-SdSCb99x7XSC-S4vsPdTef_ZqbaXv4kSX-832nb_UUn5rXRIqJbtf3sB_tmFqLSm6BJzQ4imZhwoLIxDTKHf5ioVmKgMBCnZ8zpydYmXmGQ7NpKWNq12kMWvUy0YGyyUTuR4B4pioZVOLOS7ETLdXLgETLOEgx0fQa82CL5r7Nc9NA0fmdHRiPN7Ler7uc45i_mGUNddkw4awWYibco8I_bsbdUBbgXi2OOi86AbHNOH3YnN6vhdfsmb2Vt2tUjbCywsFacGWmh6oJ-HQY7gu-Elum_Fl6DhqykcjwxSwZVYt2pqZgj40O1Q9l-UZVn3EIMZ2NSN3jS-XMbKlD7qnHxNbJbNMbshiak0IIeJE7lJo7k_1kZgQsXG14Vd3GjrVVfnf5nMu6jU8clqO1DN4VESNju6zY1cYmtsV9fipy51SUH-hx5QMS63nNbOQQMzka0aJsC6Xr3NURkw5J73Aj8aAKowAx_numeQmkdTLVqZZlccZlPusA40eP7jLHXIRTzCKzBQgET1KQU"
}
```

Exemplo de **Logout**:

**_POST**

- **URL:** /api/logout/
- **Header:** Authorization: "Bearer + token"
- **Restrições:** [campos = requeridos]
- **Retorno:**
```json
{
    "message": "success"
}
```

Exemplos da entidade **User**:

**_GET (Todos)**

- **URL:** /api/users/
- **Header:** Authorization: "Bearer + token"
- **Retorno:**
```json
{
    "data": {
        "id": 1,
        "name": "Adriel Faro",
        "email": "kevin44@example.org",
        "phone": "(53) 92688-0283",
        "role": [
            {
                "id": 2,
                "name": "Editor"
            }
        ]
    }
}
```

**_GET (Único por ID)**

- **URL:** /api/users/{user_id}
- **Header:** Authorization: "Bearer + token"
- **Retorno:**
```json
{
    "data": {
        "id": 1,
        "name": "Adriel Faro",
        "email": "kevin44@example.org",
        "phone": "(53) 92688-0283",
        "role": [
            {
                "id": 2,
                "name": "Editor"
            }
        ]
    }
}
```

**_POST**

- **URL:** /api/users/
- **Header:** Authorization: "Bearer + token"
- **Restrições:** [campos = requeridos], [email = único]
- **Body:**
```json
{
    "name": "Tiago Freitas",
    "email": "tiagoft@gmail.com",
    "phone": "(37) 2242-6401",
    "password": "12345",
    "password_confirm": "12345",
    "role_id": 1
}
```
- **Retorno:**
```json
{
    "id": 29,
    "name": "Tiago Freitas",
    "email": "tiagoft@gmail.com",
    "phone": "(37) 2242-6401",
    "role": [
        {
            "id": 1,
            "name": "Admin"
        }
    ]
}
```

**_PUT**

- **URL:** /api/users/{user_id}
- **Header:** Authorization: "Bearer + token"
- **Restrições:** [email = único]
- **Body:**
```json
{
    "name": "João Paulo",
    "email": "joãogrd@gmail.com"
}
```
- **Retorno:**
```json
{
    "id": 29,
    "name": "João Paulo",
    "email": "joãogrd@gmail.com",
    "phone": "(37) 2242-6401",
    "role": [
        {
            "id": 1,
            "name": "Admin"
        }
    ]
}
```

**_DELETE**

- **URL:** /api/users/{user_id}
- **Header:** Authorization: "Bearer + token"
- **Retorno:**
```json
204 No Content
```

Exemplos da entidade **Role**:

**_GET (Todos)**

- **URL:** /api/roles/
- **Header:** Authorization: "Bearer + token"
- **Retorno:**
```json
{
    "data": [
        {
            "id": 1,
            "name": "Admin",
            "permissions": [
                {
                    "id": 1,
                    "name": "view_users"
                },
                {
                    "id": 2,
                    "name": "edit_users"
                },
                {
                    "id": 3,
                    "name": "view_roles"
                },
                {
                    "id": 4,
                    "name": "edit_roles"
                }
            ]
        },
        {
            "id": 2,
            "name": "Editor",
            "permissions": [
                {
                    "id": 1,
                    "name": "view_users"
                },
                {
                    "id": 2,
                    "name": "edit_users"
                },
                {
                    "id": 3,
                    "name": "view_roles"
                }
            ]
        },
        {
            "id": 3,
            "name": "Viewer",
            "permissions": [
                {
                    "id": 1,
                    "name": "view_users"
                },
                {
                    "id": 3,
                    "name": "view_roles"
                }
            ]
        }
    ]
}
```

**_GET (Único por ID)**

- **URL:** /api/roles/{role_id}
- **Header:** Authorization: "Bearer + token"
- **Retorno:**
```json
{
    "data": {
        "id": 1,
        "name": "Admin",
        "permissions": [
            {
                "id": 1,
                "name": "view_users"
            },
            {
                "id": 2,
                "name": "edit_users"
            },
            {
                "id": 3,
                "name": "view_roles"
            },
            {
                "id": 4,
                "name": "edit_roles"
            }
        ]
    }
}
```

Exemplo da entidade **Permission**:

**_GET (Todos)**

- **URL:** /api/permissions/
- **Header:** Authorization: "Bearer + token"
- **Retorno:**
```json
{
    "data": [
        {
            "id": 1,
            "name": "view_users"
        },
        {
            "id": 2,
            "name": "edit_users"
        },
        {
            "id": 3,
            "name": "view_roles"
        },
        {
            "id": 4,
            "name": "edit_roles"
        }
    ]
}
```

# Questões

**O que são requisitos funcionais? Cite 3 exemplos para este sistema.**  
**R:** Requisitos funcionais dizem como o sistema deve se comportar.  
**Ex:** POST de Users, GET de Roles e listagem de Users no frontend.

**O que são requisitos não funcionais? Cite 3 exemplos para este sistema.**  
**R:** Requisitos não funcionais dizem como cada comportamento deve funcionar.  
**Ex:** GET deve retornar um collection, cada requisição deve levar no máximo 1 segundo e o token de acesso deve expirar em 3600 segundos.
