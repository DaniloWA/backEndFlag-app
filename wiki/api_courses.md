# Cursos

<br/>

## Índice
### 1 [Criando](#post-courses)
### 2 [Todos os dados](#get-courses)
### 3 [Pesquisa](#get-coursesuuid)
### 4 [Atualizando](#put-coursesuuid)
### 5 [Deletando](#del-coursesuuid)

<hr>
<br/>
<br/>

## POST /courses

```
  http://[SUA_URL]/api/courses
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br>

#### BODY

![Body store courses](/img/body_store_courses.png)

<details> 
  <summary>Code</summary>

```json
{
    "departament_id":"4",
    "name":"Programação Full Stack"
}
```

</details>

<br/>

#### Response Success 201

![Response](/img/response_success_store_courses.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Course successfully created",
  "data": {
    "course": {
      "name": "Programação full stack",
      "uuid": "5c50dba5-734b-4bbe-aa33-7d2fabb04914",
      "slug": "programacao-full-stack",
      "updated_at": "2022-09-02T14:16:17.000000Z",
      "created_at": "2022-09-02T14:16:17.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_store_courses.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "We need your [ NAME ] to continue! (and 1 more error)",
  "errors": {
    "name": [
      "We need your [ NAME ] to continue!"
    ],
    "departament_id": [
      "We need your [ DEPARTAMENT ID ] to continue!"
    ]
  }
}
```

</details>

<br>

[Início](#cursos)

<hr>
<br/>
<br/>

## GET /courses

```
  http://[SUA_URL]/api/courses
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

#### (Opicional) Params

```json
  { 
    "with_department": "true"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_courses.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "All Courses Loaded!",
  "data": {
    "courses": [
      {
        "uuid": "3c33db3b-d595-4975-b92d-9a0fefde6f04",
        "slug": "hogwarts",
        "name": "Hogwarts",
        "created_at": "2022-09-02T14:10:52.000000Z",
        "updated_at": "2022-09-02T14:10:52.000000Z"
      },
      ...
    ]
}
```

</details>

<br/>

#### Response Success com parametro 200

![Response](/img/response_success_params_courses.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "All Courses Loaded!",
  "data": {
    "courses": [
      {
        "department_uuid": "34271383-0d87-4d99-b4c4-c9da7359209e",
        "department_name": "ciências humanas",
        "uuid": "3c33db3b-d595-4975-b92d-9a0fefde6f04",
        "slug": "et",
        "name": "Et",
        "created_at": "2022-09-02T14:10:52.000000Z",
        "updated_at": "2022-09-02T14:10:52.000000Z"
      },
      ...
    ]
}
```

</details>

<br>

[Início](#cursos)

<hr>
<br/>
<br/>


## GET /courses/{{uuid}}

```
  http://[SUA_URL]/api/courses/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_show_courses.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Course successfully found!",
  "data": {
    "course": {
      "uuid": "5c50dba5-734b-4bbe-aa33-7d2fabb04914",
      "slug": "programacao-full-stack",
      "name": "Programação full stack",
      "created_at": "2022-09-02T14:16:17.000000Z",
      "updated_at": "2022-09-02T14:16:17.000000Z",
      "departament": {
        "uuid": "958b1670-4d97-4bbf-a12a-3ce1cbe69393",
        "slug": "estagio",
        "name": "Estágio",
        "created_at": "2022-09-02T14:10:52.000000Z",
        "updated_at": "2022-09-02T14:10:52.000000Z"
      }
    }
  }
}
```

</details>

<br/>

#### Response Error 404

![Response](/img/response_error_generic_404.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Error",
  "message": "The searched resource does not exist",
  "data": null
}
```

</details>

<br>

[Início](#cursos)

<hr>
<br/>
<br/>

## PUT /courses/{{uuid}}

```
  http://[SUA_URL]/api/courses/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### BODY

![Body put courses](/img/body_put_courses.png)

<details> 
  <summary>Code</summary>

```json
{
    "departament_id":"3",
    "name":"Programação Full Stack"
}
```

</details>

<br/>

#### Response Success 200

![Response](/img/response_success_put_courses.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Course successfully updated",
  "data": {
    "course": {
      "uuid": "5c50dba5-734b-4bbe-aa33-7d2fabb04914",
      "slug": "programacao-full-stack",
      "name": "Programação full stack",
      "created_at": "2022-09-02T14:16:17.000000Z",
      "updated_at": "2022-09-02T14:17:39.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_put_courses.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "We need your [ NAME ] to continue! (and 1 more error)",
  "errors": {
    "name": [
      "We need your [ NAME ] to continue!"
    ],
    "departament_id": [
      "We need your [ DEPARTAMENT ID ] to continue!"
    ]
  }
}
```

</details>

<br>

[Início](#cursos)

<hr>
<br/>
<br/>

## DEL /courses/{{uuid}}

```
  http://[SUA_URL]/api/courses/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_del_courses.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "The course has been successfully removed!",
  "data": {
    "course": {
      "uuid": "5c50dba5-734b-4bbe-aa33-7d2fabb04914",
      "slug": "programacao-full-stack",
      "name": "Programação full stack",
      "created_at": "2022-09-02T14:16:17.000000Z",
      "updated_at": "2022-09-02T14:17:39.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 404

![Response](/img/response_error_generic_404.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Error",
  "message": "Unable to perform deletion. The requested resource does not exist!",
  "data": null
}
```

</details>

<br>

[Início](#cursos)
