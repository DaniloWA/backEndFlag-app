# Api Auth

<br/>

## Índice
### [Registrando](#post-apiauthregister)
### [Logando](#post-apiauthlogin)
### [Usuário](#get-apiauthme)
### [Deslogando](#post-apiauthlogout)
#### [Voltar pro Readme](/README.md)

<hr>
<br/>
<br/>

## POST /api/auth/register

```
  http://[SUA_URL]/api/auth/register
```

#### BODY

![Body register](/img/body_register_auth.png)

<details> 
  <summary>Code</summary>

```json
{
    "name": "UserTeste",
    "email": "User@gmail.com",
    "password": "123123123",
    "password_confirmation": "123123123",
    "token_name": "Token do UserTeste"
}
```

</details>

<br/>

#### Response Success 201

![Response](/img/response_success_register.png)

<details> 
  <summary>Code</summary>

```json
{
    "status": "Success",
    "message": "User created!",
    "data": {
        "user": {
        "name": "UserTeste",
        "email": "user@gmail.com",
        "updated_at": "2022-09-02T14:11:52.000000Z",
        "created_at": "2022-09-02T14:11:52.000000Z"
        },
        "token": "1|etuMWNMmMVIgWOfDDiibQFhuIG3cc5NJS2RzzTys"
    }
}
```

</details>

<br/>

#### Response Error 422

![Response](/img/response_error_register.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "Someone already picked this [ EMAIL ] try another one!",
  "errors": {
    "email": [
      "Someone already picked this [ EMAIL ] try another one!"
    ]
  }
}
```

</details>

<br>

[Início](#api-auth)

<hr>
<br/>
<br/>

## POST /api/auth/login

```
  http://[SUA_URL]/api/auth/login
```
<br/>

#### BODY

![Body login](/img/body_login.png)

<details> 
  <summary>Code</summary>

```json
{
    "email": "admin@local.com",
    "password": "password"
}
```

</details>

<br/>

#### Response Success 200

![Response](/img/response_success_login.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": null,
  "data": {
    "token": "2|n53V5YRqOEkFUaVmt6rJqLvQB5b1b66NqlQkOdMK",
    "user": {
      "name": "Braum de freljord",
      "email": "admin@local.com",
      "email_verified_at": null,
      "created_at": "2022-09-02T14:11:52.000000Z",
      "updated_at": "2022-09-02T14:11:52.000000Z"
    }
  }
}
```

</details>

<br/>

#### Response Error 401

![Response](/img/response_error_login_auth.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Error",
  "message": "Credentials not match",
  "data": null
}
```

</details>

<br>

[Início](#api-auth)

<hr>
<br/>
<br/>


## GET /api/auth/me

```
  http://[SUA_URL]/api/auth/me
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_me_auth.png)

<details> 
  <summary>Code</summary>

```json
{
  "name": "UserTeste",
  "email": "user@gmail.com",
  "email_verified_at": null,
  "created_at": "2022-09-02T14:11:52.000000Z",
  "updated_at": "2022-09-02T14:11:52.000000Z"
}
```

</details>

<br/>

#### Response Error 401

![Response](/img/response_error_me_auth.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "Unauthenticated."
}
```

</details>

<br>

[Início](#api-auth)

<hr>
<br/>
<br/>

## POST api/auth/logout

```
  http://[SUA_URL]/api/auth/logout
```
#### Header

```json
  { 
    "Authorization": "Bearer {{ token }}"
 }
```

<br/>

#### Response Success 200

![Response](/img/response_success_logout_auth.png)

<details> 
  <summary>Code</summary>

```json
{
  "status": "Success",
  "message": "Tokens Revoked",
  "data": []
}
```

</details>

<br/>

#### Response Error 401

![Response](/img/response_error_logout_auth.png)

<details> 
  <summary>Code</summary>

```json
{
  "message": "Unauthenticated."
}
```

</details>

<br>

[Início](#api-auth)

