# **JwToken**
This is s short and light library that lets you create your jwt Token with SHA-256, SHA-384 and SHA-512.  
I am currently adding other algorithms to this library.

Getting started
===============
You can import this library in 2 ways:  
**on-line mode**: using HTTPS link to this file: *link*.  
**off-line mode**: just downloading the archive and importing the file in your project.

How it works
============
## Standard header and payloads:  
If you don't set up any attributes, standard one are  
Header: ```["alg"=> "HS256", "typ"=> "JWT"];```  
Payload: ```["id"=> "$this->userID", "email"=> "$this->userEmail"];```  
Payload (if your algorithm is nor SHA-256"): ```["id"=> "$this->userID", "email"=> "$this->userEmail", "admin"=> true];```  

## Recalling class and defining variables:
Firstly, ou have to recall the class Token() in your file, and, if you want to use standard token, specify userID, userEmail and admin:  
```tk = new Token($userID, $userEmail, true);```  

## Available functions:
  ```encodeToken($key, $header, $payload);```   
Only "key" is a mandatory attribute to this function, if you left empy the others it will output a token hashed with SHA-256 with e-mail and id information.
  ```encodeHS256($key, $payload);```  
Only "key" is a mandatory attribute to this function, if you left empy the others it will output a token with e-mail and id information.  
  ```encodeHS384($key, $payload);```  
Only "key" is a mandatory attribute to this function, if you left empy the others it will output a token with e-mail, id and admin information.  
  ```encodeHS512($key, $payload);```  
Only "key" is a mandatory attribute to this function, if you left empy the others it will output a token with e-mail, id and admin information.  
  ```checkToken($token, $key, $headerCheck, $payloadCheck);```  
Only "key" is a mandatory attribute to this function, if you left empy the others it will check a token hashed with SHA-256 with e-mail and id information.  
  ```checkHS256($token, $key, $payload);```  
Only "key" is a mandatory attribute to this function, if you left empy the others it will check a token with e-mail and id information.  
  ```checkHS384($token, $key, $payload);```  
Only "key" is a mandatory attribute to this function, if you left empy the others it will check a token with e-mail, id and admin information.  
  ```checkHS512($token, $key, $payload);```  
Only "key" is a mandatory attribute to this function, if you left empy the others it will check a token with e-mail, id and admin information.  
