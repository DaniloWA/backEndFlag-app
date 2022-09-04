# Matéria

<br/>

## Índice
### [Criando](#post-subjects)
### [Todos os dados](#get-subjects)
### [Pesquisa](#get-subjectsuuid)
### [Atualizando](#put-subjectsuuid)
### [Deletando](#del-subjectsuuid)
### [EER](#diagrama-eer)
#### [Voltar pro Readme](/README.md)

---
<br/>
<br/>

## POST /subjects

```
  http://[SUA_URL]/api/subjects
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br>

#### BODY

![Body store subjects](/img/body_store_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
    "departament_id":"200",
    "name":"Portugues",
    "workload":"399",
    "description":"Lorem ipsum dolor sit amet consectetur",
    "num_registered_students":"299"
}
```

</details>

<br/>

#### Response Success 201

![Response](/img/response_success_store_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Subject successfully created",
  "data": {
    "subject": {
      "name": "Portugues",
      "workload": "399",
      "description":"Lorem ipsum dolor sit amet consectetur",
      "num_registered_students": "299",
      "uuid": "3d48c8a7-3d0e-47fe-ae9d-d7088da244c7",
      "slug": "portugues",
      "updated_at": "2022-09-02T14:20:18.000000Z",
      "created_at": "2022-09-02T14:20:18.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_store_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "We need your [ NAME ] to continue! (and 4 more errors)",
  "errors": {
    "name": [
      "We need your [ NAME ] to continue!"
    ],
    "workload": [
      "We need your [ WORKLOAD ] to continue!"
    ],
    "description": [
      "We need your [ DESCRIPTION ] to continue!"
    ],
    "num_registered_students": [
      "We need your [ NUM REGISTERED STUDENTS ] to continue!"
    ],
    "departament_id": [
      "We need your [ DEPARTAMENT ID ] to continue!"
    ]
  }
}
```

</details>

<br>

[Início](#matéria)

---
<br/>
<br/>

## GET /subjects

```
  http://[SUA_URL]/api/subjects
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

![Response](/img/response_success_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "All Subjects Loaded!",
  "data": {
    "subjects": [
      {
        "uuid": "b9ded19c-70fd-4888-922b-e10db9654232",
        "slug": "defesa-contra-as-artes-das-trevas",
        "name": "Defesa Contra as Artes das Trevas",
        "workload": 6834,
        "description": "Defesa Contra as Artes das Trevas (às vezes escrita como D.C.A.T.) é uma matéria obrigatória na Escola de Magia e Bruxaria de Hogwarts, na qual os alunos aprendem como se defender magicamente contra criaturas e contra praticantes das Artes das Trevas.",
        "num_registered_students": 18,
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

![Response](/img/response_success_params_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "All Subjects Loaded!",
  "data": {
    "subjects": [
      {
        "department_uuid": "1198770f-80b8-4aa3-bd51-eaac9ebb3434",
        "department_name": "biológicas",
        "uuid": "b9ded19c-70fd-4888-922b-e10db9654232",
        "slug": "nam",
        "name": "Nam",
        "workload": 6834,
        "description": "Voluptas sequi labore aperiam omnis maxime ipsum recusandae. Quas eum atque ut. Quibusdam est voluptatem nulla et harum.",
        "num_registered_students": 17,
        "created_at": "2022-09-02T14:10:52.000000Z",
        "updated_at": "2022-09-02T14:10:52.000000Z"
      },
      ...
    ]
}
```

</details>

<br>

[Início](#matéria)

---
<br/>
<br/>


## GET /subjects/{{uuid}}

```
  http://[SUA_URL]/api/subjects/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_show_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Subject successfully found!",
  "data": {
    "subject": {
      "uuid": "3d48c8a7-3d0e-47fe-ae9d-d7088da244c7",
      "slug": "portugues",
      "name": "Portugues",
      "workload": 399,
      "description":"Lorem ipsum dolor sit amet consectetur",
      "num_registered_students": 299,
      "created_at": "2022-09-02T14:20:18.000000Z",
      "updated_at": "2022-09-02T14:20:18.000000Z",
      "departament": {
        "uuid": "2894a46a-6520-4217-a355-3742de68b5f0",
        "slug": "qui-cupiditate",
        "name": "Qui cupiditate",
        "created_at": "2022-09-02T14:10:57.000000Z",
        "updated_at": "2022-09-02T14:10:57.000000Z"
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

[Início](#matéria)

---
<br/>
<br/>

## PUT /subjects/{{uuid}}

```
  http://[SUA_URL]/api/subjects/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### BODY

![Body put subjects](/img/body_put_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
    "departament_id":"200",
    "name":"Matemática",
    "workload":"5559",
    "description":"Lorem ipsum dolor sit amet consectetur",
    "num_registered_students":"99"
}
```

</details>

<br/>

#### Response Success 200

![Response](/img/response_success_put_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Subject successfully updated",
  "data": {
    "subject": {
      "uuid": "3d48c8a7-3d0e-47fe-ae9d-d7088da244c7",
      "slug": "portugues",
      "name": "Matemática",
      "workload": "5559",
      "description":"Lorem ipsum dolor sit amet consectetur",
      "num_registered_students": "99",
      "created_at": "2022-09-02T14:20:18.000000Z",
      "updated_at": "2022-09-02T14:21:40.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_put_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "We need your [ NAME ] to continue! (and 2 more errors)",
  "errors": {
    "name": [
      "We need your [ NAME ] to continue!"
    ],
    "workload": [
      "We need your [ WORKLOAD ] to continue!"
    ],
    "departament_id": [
      "We need your [ DEPARTAMENT ID ] to continue!"
    ]
  }
}
```

</details>

<br>

[Início](#matéria)

---
<br/>
<br/>

## DEL /subjects/{{uuid}}

```
  http://[SUA_URL]/api/subjects/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_del_subjects.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "The subject has been successfully removed!",
  "data": {
    "subject": {
      "uuid": "3d48c8a7-3d0e-47fe-ae9d-d7088da244c7",
      "slug": "portugues",
      "name": "Matemática",
      "workload": 5559,
      "description":"Lorem ipsum dolor sit amet consectetur",
      "num_registered_students": 99,
      "created_at": "2022-09-02T14:20:18.000000Z",
      "updated_at": "2022-09-02T14:21:40.000000Z"
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

[Início](#matéria)

# Diagrama EER
![eer](/img/eer-subjects-rell-api.png)
