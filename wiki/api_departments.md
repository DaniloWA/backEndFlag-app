# Departamentos

<br/>

## Índice
### [Criando](#post-departments)
### [Todos os dados](#get-departments)
### [Pesquisa](#get-departmentsuuid)
### [Atualizando](#put-departmentsuuid)
### [Deletando](#del-departmentsuuid)
### [EER](#diagrama-eer)
#### [Voltar pro Readme](/README.md)

---
<br/>
<br/>

## POST /departments

```
  http://[SUA_URL]/api/departments
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br>

#### BODY

![Body store departments](/img/body_store_departments.png)

<details> 
  <summary>Code</summary>

```json
{
    "name":"Biologia"
}
```

</details>

<br/>

#### Response Success 201

![Response](/img/response_success_store_departments.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Department successfully created",
  "data": {
    "department": {
      "name": "Biologia",
      "uuid": "cd4306e9-fbd5-4a94-b054-ec98942d7871",
      "slug": "biologia",
      "updated_at": "2022-09-02T14:22:08.000000Z",
      "created_at": "2022-09-02T14:22:08.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_store_departments.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "We need your [ NAME ] to continue!",
  "errors": {
    "name": [
      "We need your [ NAME ] to continue!"
    ]
  }
}
```

</details>

<br>

[Início](#departamentos)

---
<br/>
<br/>

## GET /departments

```
  http://[SUA_URL]/api/departments
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_departments.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "All Departments Loaded!",
  "data": {
    "departments": [
      {
        "uuid": "34271383-0d87-4d99-b4c4-c9da7359209e",
        "slug": "departamento-de-cooperação-internacional-em-magia",
        "name": "Departamento de Cooperação Internacional em Magia",
        "created_at": "2022-09-02T14:10:52.000000Z",
        "updated_at": "2022-09-02T14:10:52.000000Z"
      },
      ...
    ]
}
```

</details>

<br/>

[Início](#departamentos)

---
<br/>
<br/>


## GET /departments/{{uuid}}

```
  http://[SUA_URL]/api/departments/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_show_departments.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Department successfully found!",
  "data": {
    "department": {
      "uuid": "cd4306e9-fbd5-4a94-b054-ec98942d7871",
      "slug": "biologia",
      "name": "Biologia",
      "created_at": "2022-09-02T14:22:08.000000Z",
      "updated_at": "2022-09-02T14:22:08.000000Z"
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

[Início](#departamentos)

---
<br/>
<br/>

## PUT /departments/{{uuid}}

```
  http://[SUA_URL]/api/departments/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### BODY

![Body put departments](/img/body_put_departments.png)

<details> 
  <summary>Code</summary>

```json
{
    "name":"Biologia"
}
```

</details>

<br/>

#### Response Success 200

![Response](/img/response_success_put_departments.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Department successfully updated",
  "data": {
    "department": {
      "uuid": "cd4306e9-fbd5-4a94-b054-ec98942d7871",
      "slug": "biologia",
      "name": "Biologia",
      "created_at": "2022-09-02T14:22:08.000000Z",
      "updated_at": "2022-09-02T14:22:08.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_put_departments.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "We need your [ NAME ] to continue!",
  "errors": {
    "name": [
      "We need your [ NAME ] to continue!"
    ]
  }
}
```

</details>

<br>

[Início](#departamentos)

---
<br/>
<br/>

## DEL /departments/{{uuid}}

```
  http://[SUA_URL]/api/departments/{{uuid}}
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_del_departments.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "The department has been successfully removed!",
  "data": {
    "department": {
      "uuid": "cd4306e9-fbd5-4a94-b054-ec98942d7871",
      "slug": "biologia",
      "name": "Biologia",
      "created_at": "2022-09-02T14:22:08.000000Z",
      "updated_at": "2022-09-02T14:22:08.000000Z"
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

[Início](#departamentos)

# Diagrama EER
![eer](/img/eer-departments-rell-api.png)
