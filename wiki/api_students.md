# Estudantes

<br/>

## Índice
### [Criando](#post-students)
### [Todos os dados](#get-students)
### [Pesquisa](#get-studentsuuid)
### [Atualizando](#put-studentsuuid)
### [Deletando](#del-studentsuuid)
### [EER](#diagrama-eer)
#### [Voltar pro Readme](/README.md)

---
<br/>
<br/>

## POST /students

```
  http://[SUA_URL]/api/students
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br>

#### BODY

![Body store students](/img/body_store_students.png)

<details> 
  <summary>Code</summary>

```json
{
    "first_name":"Eduardo",
    "last_name":"Pereira",
    "nif":"123125124",
    "status":"1",
    "sex":"M",
    "father_full_name":"Carlos",
    "mother_full_name":"Bruna",
    "email":"Eduardo@teste",
    "phone_num":"31231313",
    "country":"Portugal",
    "street_name":"Dão pedro primeiro",
    "postal_code":"1451-4123",
    "course_id":"15"
}
```

</details>

<br/>

#### Response Success 201

![Response](/img/response_success_store_students.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Student successfully created",
  "data": {
    "student": {
      "first_name": "Eduardo",
      "last_name": "Pereira",
      "nif": "123125124",
      "status": "1",
      "sex": "M",
      "father_full_name": "Carlos",
      "mother_full_name": "Bruna",
      "email": "eduardo@teste",
      "phone_num": "31231313",
      "country": "Portugal",
      "street_name": "Dão pedro primeiro",
      "postal_code": "1451-4123",
      "uuid": "a06415c9-cd38-46df-90c2-8b381c965350",
      "slug": "eduardo-pereira",
      "updated_at": "2022-09-02T14:13:31.000000Z",
      "created_at": "2022-09-02T14:13:31.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_store_students.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "Someone already picked this [ NIF ] try another one! (and 1 more error)",
  "errors": {
    "nif": [
      "Someone already picked this [ NIF ] try another one!"
    ],
    "email": [
      "Someone already picked this [ EMAIL ] try another one!"
    ]
  }
}
```

</details>

<br>

[Início](#estudantes)

---
<br/>
<br/>

## GET /students

```
  http://[SUA_URL]/api/students
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
    "with_course": "true"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_students.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "All Students Loaded!",
  "data": {
    "students": [
      {
        "uuid": "be27c1a3-a90f-4374-9959-3f14be44a3ed",
        "slug": "luxanna-crownguard",
        "first_name": "Luxanna",
        "last_name": "Crownguard",
        "nif": "782110039",
        "status": 1,
        "sex": "F",
        "father_full_name": "Pieter Crownguard",
        "mother_full_name": "Augatha Crownguard",
        "email": "little.light@demacia.com",
        "phone_num": "+16417960670",
        "country": "demacia",
        "street_name": "high silvermere",
        "postal_code": "98872-2752",
        "created_at": "2022-09-02T14:10:54.000000Z",
        "updated_at": "2022-09-02T14:10:54.000000Z"
      },
      ...
    ]
}
```

</details>

<br/>

#### Response Success com parametro 200

![Response](/img/response_success_params_students.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "All Students Loaded!",
  "data": {
    "students": [
      {
        "course_uuid": "3c33db3b-d595-4975-b92d-9a0fefde6f04",
        "course_name": "Hogwarts",
        "uuid": "be27c1a3-a90f-4374-9959-3f14be44a3ed",
        "slug": "luxanna-crownguard",
        "first_name": "Luxanna",
        "last_name": "Crownguard",
        "nif": "782110039",
        "status": 1,
        "sex": "F",
        "father_full_name": "Pieter Crownguard",
        "mother_full_name": "Augatha Crownguard",
        "email": "little.light@demacia.com",
        "phone_num": "+16417960670",
        "country": "demacia",
        "street_name": "high silvermere",
        "postal_code": "98872-2752",
        "created_at": "2022-09-02T14:10:54.000000Z",
        "updated_at": "2022-09-02T14:10:54.000000Z"
      },
      ...
    ]
}
```

</details>

<br>

[Início](#estudantes)

---
<br/>
<br/>


## GET /students/{{uuid}}

```
  http://[SUA_URL]/api/students/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_show_students.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Student successfully found!",
  "data": {
    "student": {
      "uuid": "a06415c9-cd38-46df-90c2-8b381c965350",
      "slug": "eduardo-pereira",
      "first_name": "Eduardo",
      "last_name": "Pereira",
      "nif": "123125124",
      "status": 1,
      "sex": "M",
      "father_full_name": "Carlos",
      "mother_full_name": "Bruna",
      "email": "eduardo@teste",
      "phone_num": "31231313",
      "country": "Portugal",
      "street_name": "Dão pedro primeiro",
      "postal_code": "1451-4123",
      "created_at": "2022-09-02T14:13:31.000000Z",
      "updated_at": "2022-09-02T14:13:31.000000Z",
      "course": {
        "uuid": "4fc7653c-3998-419f-b2ec-facc4d1f1c41",
        "slug": "adipisci",
        "name": "Adipisci",
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

[Início](#estudantes)

---
<br/>
<br/>

## PUT /students/{{uuid}}

```
  http://[SUA_URL]/api/students/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### BODY

![Body put students](/img/body_put_students.png)

<details> 
  <summary>Code</summary>

```json
{
    "first_name":"Pereira",
    "last_name":"Eduardo",
    "nif":"123125164",
    "status":"1",
    "sex":"M",
    "father_full_name":"Carlos",
    "mother_full_name":"Bruna",
    "email":"Eduardo@testes",
    "phone_num":"31231313",
    "country":"Portugal",
    "street_name":"Dão pedro primeiro",
    "postal_code":"1451-4123",
    "course_id":"15"
}
```

</details>

<br/>

#### Response Success 200

![Response](/img/response_success_put_students.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Student successfully updated",
  "data": {
    "student": {
      "uuid": "a06415c9-cd38-46df-90c2-8b381c965350",
      "slug": "eduardo-pereira",
      "first_name": "Pereira",
      "last_name": "Eduardo",
      "nif": "123125164",
      "status": "1",
      "sex": "M",
      "father_full_name": "Carlos",
      "mother_full_name": "Bruna",
      "email": "eduardo@testes",
      "phone_num": "31231313",
      "country": "Portugal",
      "street_name": "Dão pedro primeiro",
      "postal_code": "1451-4123",
      "created_at": "2022-09-02T14:13:31.000000Z",
      "updated_at": "2022-09-02T14:15:27.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_put_students.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "Someone already picked this [ NIF ] try another one! (and 1 more error)",
  "errors": {
    "nif": [
      "Someone already picked this [ NIF ] try another one!"
    ],
    "email": [
      "Someone already picked this [ EMAIL ] try another one!"
    ]
  }
}
```

</details>

<br>

[Início](#estudantes)

---
<br/>
<br/>

## DEL /students/{{uuid}}

```
  http://[SUA_URL]/api/students/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_del_students.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "The student has been successfully removed!",
  "data": {
    "student": {
      "uuid": "a06415c9-cd38-46df-90c2-8b381c965350",
      "slug": "eduardo-pereira",
      "first_name": "Pereira",
      "last_name": "Eduardo",
      "nif": "123125164",
      "status": 1,
      "sex": "M",
      "father_full_name": "Carlos",
      "mother_full_name": "Bruna",
      "email": "eduardo@testes",
      "phone_num": "31231313",
      "country": "Portugal",
      "street_name": "Dão pedro primeiro",
      "postal_code": "1451-4123",
      "created_at": "2022-09-02T14:13:31.000000Z",
      "updated_at": "2022-09-02T14:15:27.000000Z"
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

[Início](#estudantes)

# Diagrama EER
![eer](/img/eer-students-rell-api.png)
