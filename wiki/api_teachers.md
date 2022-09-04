# Professores

<br/>

## Índice
### [Criando](#post-teachers)
### [Todos os dados](#get-teachers)
### [Pesquisa](#get-teachersuuid)
### [Atualizando](#put-teachersuuid)
### [Deletando](#del-teachersuuid)
#### [Voltar pro Readme](/README.md)

<hr>
<br/>
<br/>

## POST /teachers

```
  http://[SUA_URL]/api/teachers
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br>

#### BODY

![Body store teachers](/img/body_store_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
    "departament_id":"1",
    "first_name":"Alberto",
    "last_name":"da silva",
    "status":"1"
}
```

</details>

<br/>

#### Response Success 201

![Response](/img/response_success_store_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Teacher successfully created",
  "data": {
    "teacher": {
      "first_name": "Alberto",
      "last_name": "Da silva",
      "status": "1",
      "uuid": "892e3062-e1b3-4bea-93d3-913b505a0b1c",
      "slug": "alberto-da-silva",
      "updated_at": "2022-09-02T14:18:34.000000Z",
      "created_at": "2022-09-02T14:18:34.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_store_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "We need your [ FIRST NAME ] to continue! (and 3 more errors)",
  "errors": {
    "first_name": [
      "We need your [ FIRST NAME ] to continue!"
    ],
    "last_name": [
      "We need your [ LAST NAME ] to continue!"
    ],
    "status": [
      "We need your [ STATUS ] to continue!"
    ],
    "departament_id": [
      "We need your [ DEPARTAMENT ID ] to continue!"
    ]
  }
}
```

</details>

<br>

[Início](#professores)

<hr>
<br/>
<br/>

## GET /teachers

```
  http://[SUA_URL]/api/teachers
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

![Response](/img/response_success_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "All Teachers Loaded!",
  "data": {
    "teachers": [
      {
        "uuid": "4f72962e-d640-4d03-bdd4-05899f07d3f9",
        "slug": "severus-snape",
        "first_name": "Severus ",
        "last_name": "Snape",
        "status": 1,
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

![Response](/img/response_success_params_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "All Teachers Loaded!",
  "data": {
    "teachers": [
      {
        "department_uuid": "8c23d0aa-f908-40ac-865b-b3c3138ec5d5",
        "department_name": "matemática",
        "uuid": "4f72962e-d640-4d03-bdd4-05899f07d3f9",
        "slug": "lizzie-grady",
        "first_name": "Lizzie",
        "last_name": "Grady",
        "status": 1,
        "created_at": "2022-09-02T14:10:52.000000Z",
        "updated_at": "2022-09-02T14:10:52.000000Z"
      },
      ...
    ]
}
```

</details>

<br>

[Início](#professores)

<hr>
<br/>
<br/>


## GET /teachers/{{uuid}}

```
  http://[SUA_URL]/api/teachers/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_show_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Teacher successfully found!",
  "data": {
    "teacher": {
      "uuid": "892e3062-e1b3-4bea-93d3-913b505a0b1c",
      "slug": "alberto-da-silva",
      "first_name": "Alberto",
      "last_name": "Da silva",
      "status": 1,
      "created_at": "2022-09-02T14:18:34.000000Z",
      "updated_at": "2022-09-02T14:18:34.000000Z",
      "departament": {
        "uuid": "34271383-0d87-4d99-b4c4-c9da7359209e",
        "slug": "ciencias-humanas",
        "name": "Ciências humanas",
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

[Início](#professores)

<hr>
<br/>
<br/>

## PUT /teachers/{{uuid}}

```
  http://[SUA_URL]/api/teachers/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### BODY

![Body put teachers](/img/body_put_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
    "departament_id":"3",
    "first_name":"Pedro",
    "last_name":"Eduardo",
    "status":"1"
}
```

</details>

<br/>

#### Response Success 200

![Response](/img/response_success_put_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Teacher successfully updated",
  "data": {
    "teacher": {
      "uuid": "892e3062-e1b3-4bea-93d3-913b505a0b1c",
      "slug": "alberto-da-silva",
      "first_name": "Pedro",
      "last_name": "Eduardo",
      "status": "1",
      "created_at": "2022-09-02T14:18:34.000000Z",
      "updated_at": "2022-09-02T14:19:45.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_put_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "We need your [ FIRST NAME ] to continue! (and 1 more error)",
  "errors": {
    "first_name": [
      "We need your [ FIRST NAME ] to continue!"
    ],
    "departament_id": [
      "We need your [ DEPARTAMENT ID ] to continue!"
    ]
  }
}
```

</details>

<br>

[Início](#professores)

<hr>
<br/>
<br/>

## DEL /teachers/{{uuid}}

```
  http://[SUA_URL]/api/teachers/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_del_teachers.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "The teacher has been successfully removed!",
  "data": {
    "teacher": {
      "uuid": "892e3062-e1b3-4bea-93d3-913b505a0b1c",
      "slug": "alberto-da-silva",
      "first_name": "Pedro",
      "last_name": "Eduardo",
      "status": 1,
      "created_at": "2022-09-02T14:18:34.000000Z",
      "updated_at": "2022-09-02T14:19:45.000000Z"
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

[Início](#professores)
