# Postman

<br/>

## Índice
### [Importando](#importando-suite)
### [Variáveis ambiente](#variáveis-environments)
### [Seções endpoints](#seções)
- [Auth](#api-auth)
- [Estudantes](#students)
- [Cursos](#courses)
- [Professores](#teachers)
- [Máterias](#subjects)
- [Departamentos](#departments)

### [Scripts Variáveis](#scripts)
### [Ordem de Testes](#ordem-de-uso)
#### [Voltar pro Readme](/README.md)

---
<br>

# Importando suite

### Importar suite de endpoints para o [Postman](/postman) (ficheiros)

```bash
  cd ./postman
```

<br>

### Passo a Passo para importação do ficheiro do endpoint pelo GUI

![import collection](/img/gif-import-collection-api.gif)

<br>

### Passo a Passo para importação do ficheiro do environment pelo GUI

![import environment](/img/gif-import-environment-api.gif)


#### (Opcional) Para visualizar os dados dos endpoints

```bash
  cat .\api_backendflag.postman_collection.json 
```

#### (Opcional) Para visualizar os dados do ambiente local do environment

```bash
  cat .\api_backendflag.postman_environment.json

```
<br>

[Início](#postman)

---

<br>

# Variáveis environments

| Variáveis   | Descrição                           |
| :---------- | :---------------------------------- |
| `apiroute` | Url de todos os Endpoints|
| `api_token` | Token de autenticação em todos os endpoints|
| `course_uuid` | UUID da secção dos cursos |
| `student_uuid` | UUID da secção dos estudantes |
| `teacher_uuid` | UUID da secção dos professores |
| `subject_uuid` | UUID da secção das máterias |
| `department_uuid` | UUID da secção dos departamentos |

<br>

[Início](#postman)

---

<br>

# Seções

<br>

## Api Auth  

#### API Register

> Rota utilizada para registrar usuário na api

<br>

```
  POST /api/auth/register
```

<br>

[Início](#postman)

---

<br>

#### API Login

> Rota utilizada para logar usuário na api

<br>

```
  GET /api/auth/login
```

<br>

[Início](#postman)

---

<br>

#### Api User

> Rota retorna usuário logado na api

```
  GET /api/auth/me
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>

#### Api Logout

> Rota Desloga o usuário da api

```
  POST /api/auth/logout
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>



## Students 

#### Students - Store

> Rota cria um estudante

```
  POST /api/students
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Students - Index

> Rota retorna todos os estudantes com os cursos ou sem.

```
  GET /api/students
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

| params   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `with_course` | `true` | **Opicional**. Faz com que retorne o curso de cada usuario |

<br>

[Início](#postman)

---

<br>


#### Students - Show

> Retorna o usuario encontrado pelo UUID

```
  GET /api/students/{{student_uuidd}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |


<br>

[Início](#postman)

---

<br>


#### Students - Put

> Rota atualiza um estudante pelo UUID

```
  GET /api/students/{{student_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Students - Delete

> Rota deleta um estudante pelo UUID

```
  GET /api/students/{{student_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>

## Courses 

#### Courses - Store

> Rota cria um curso

```
  POST /api/courses
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Courses - Index

> Rota retorna todos os cursos com os departamentos ou sem.

```
  GET /api/courses
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

| params   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `with_department` | `true` | **Opicional**. Faz com que retorne o departamento de cada curso |

<br>

[Início](#postman)

---

<br>


#### Courses - Show

> Retorna o curso encontrado pelo UUID

```
  GET /api/courses/{{course_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |


<br>

[Início](#postman)

---

<br>


#### Courses - Put

> Rota atualiza um curso pelo UUID

```
  GET /api/courses/{{course_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Courses - Delete

> Rota deleta um curso pelo UUID

```
  GET /api/courses/{{course_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>

## Teachers 

#### Teachers - Store

> Rota cria um professor

```
  POST /api/teachers
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Teachers - Index

> Rota retorna todos os professores com os departamentos ou sem.

```
  GET /api/teachers
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

| params   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `with_department` | `true` | **Opicional**. Faz com que retorne o departamento de cada professor |

<br>

[Início](#postman)

---

<br>


#### Teachers - Show

> Retorna o professor encontrado pelo UUID

```
  GET /api/teachers/{{teacher_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |


<br>

[Início](#postman)

---

<br>


#### Teachers - Put

> Rota atualiza um professor pelo UUID

```
  GET /api/teachers/{{teacher_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Teachers - Delete

> Rota deleta um professor pelo UUID

```
  GET /api/teachers/{{teacher_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>

## Subjects 

#### Subjects - Store

> Rota cria uma máteria

```
  POST /api/subjects
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Subjects - Index

> Rota retorna todos as máterias com os departamentos ou sem.

```
  GET /api/subjects
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

| params   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `with_department` | `true` | **Opicional**. Faz com que retorne o departamento de cada máteria |

<br>

[Início](#postman)

---

<br>


#### Subjects - Show

> Retorna a máteria encontrada pelo UUID

```
  GET /api/subjects/{{subject_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |


<br>

[Início](#postman)

---

<br>


#### Subjects - Put

> Rota atualiza uma máteria pelo UUID

```
  GET /api/subjects/{{subject_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Subjects - Delete

> Rota deleta uma máteria pelo UUID

```
  GET /api/subjects/{{subject_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


## Departments 

#### Departments  - Store

> Rota cria um departamento

```
  POST /api/departments
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Departments - Index

> Rota retorna todos os departamentos.

```
  GET /api/departments
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Departments - Show

> Retorna um departamento encontrado pelo UUID

```
  GET /api/departments/{{department_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |


<br>

[Início](#postman)

---

<br>


#### Departments - Put

> Rota atualiza um departamento pelo UUID

```
  GET /api/departments/{{department_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>


#### Departments - Delete

> Rota deleta um departamento pelo UUID

```
  GET /api/departments/{{department_uuid}}
```

| Headers   | value       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `Authorization` | `Bearer {{api_token}}` | **Obrigatório**. Token do usuário |

<br>

[Início](#postman)

---

<br>

# Scripts

Os endpoints [Register](#api-register) e [Login](#api-login) teem esse script que preenche a variavel {{ api_token }} automaticamente assim que é feito a requisição de login ou register para facilitar o acesso ao resto das rotas!

```javascript
var response = JSON.parse(responseBody);

postman.setEnvironmentVariable('api_token', response.data.token);
```
<br>

Todos os endpoints - Store teem esse script para preencher as variaveis {{ [name]_uuid }}

Agilizando o acesso as rotas de pesquisa, atualização e de remoção dos recursos.

exemplo :
```javascript
var response = JSON.parse(responseBody);

postman.setEnvironmentVariable('student_uuid', response.data.student.uuid);
```

<br>

[Início](#postman)

---

<br>

# Ordem de Uso

Por questão dos scripts e variavies recomendo que sigam esse cronograma para um perfeito funcionamento da collection.

#### Register ou Login
> Assim será preenchido a variavel do Token de todas as rotas.

#### Store, sempre primeiro!
> Assim será preenchido a variavel do UUID da secção.

<br>

[Início](#postman)
