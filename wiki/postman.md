# Postman Collection e Environment

Facilitando os testes!

## Instalação

Instale my-project com npm

```bash
  npm install my-project
  cd my-project
```

## Rodando localmente

Clone o projeto

```bash
  git clone https://link-para-o-projeto
```

Entre no diretório do projeto

```bash
  cd my-project
```

Instale as dependências

```bash
  npm install
```

Inicie o servidor

```bash
  npm run start
```


## Documentação da API

## Postman

Para facilitar os testes na api estou disponibilizando a collection e o environment utilizado durante a criação da api!

[Postman files](/postman)

Tem sua própria [Documentação](/postman/readme_postman.md). Recomendo dar uma olhada!

### Todos os Endpoints disponíveis

#### Api Auth [mais informações](/wiki/endpoints/api_auth.md).
- POST /api/auth/register
- POST /api/auth/login
- GET /api/auth/me
- POST /api/auth/logout

#### Students [mais informações](/wiki/endpoints/students.md).
- POST /api/students
- GET /api/students
- GET /api/students/${uuid}
- PUT /api/students/${uuid}
- DEL /api/students/${uuid}

#### Courses [mais informações](/wiki/endpoints/courses.md).
- POST /api/courses
- GET /api/courses
- GET /api/courses/${uuid}
- PUT /api/courses/${uuid}
- DEL /api/courses/${uuid}

#### Teachers [mais informações](/wiki/endpoints/teacher.md).
- POST /api/teachers
- GET /api/teachers
- GET /api/teachers/${uuid}
- PUT /api/teachers/${uuid}
- DEL /api/teachers/${uuid}

#### Subjects [mais informações](/wiki/endpoints/students.md).
- POST /api/subjects
- GET /api/subjects
- GET /api/subjects/${uuid}
- PUT /api/subjects/${uuid}
- DEL /api/subjects/${uuid}

#### Department [mais informações](/wiki/endpoints/department.md).
- POST /api/epartment
- GET /api/epartment
- GET /api/epartment/${uuid}
- PUT /api/epartment/${uuid}
- DEL /api/epartment/${uuid}

# Exemplo de response success

![Success Response](/img/example_response_success.png)

# Exemplo de response error

![Success Response](/img/example_response_error.png)


