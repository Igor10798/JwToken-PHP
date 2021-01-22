# JwToken
This is s short and light library that lets you create your jwt Token with SHA-256, SHA-384 and SHA-512.  
This library check the token for multiple aspects: it controls if the key is correct, if it has been inserted a valid algorithm (in order to avoid "none algorithm") and if the data matches with the user's, guaranteeing a high-security level. 

Getting started
---------------
You can import this library simply downloading the archive and importing the file in your project.

How it works
------------
### Standard header and payloads:  
If you don't set up any attributes, standard one are  
Header: ```["alg"=> "HS256", "typ"=> "JWT"];```  
Payload: ```["id"=> "$this->userID", "email"=> "$this->userEmail"];```  
Payload (if your algorithm is nor SHA-256"): ```["id"=> "$this->userID", "email"=> "$this->userEmail", "admin"=> true];```  

### Recalling class and defining variables:
Firstly, ou have to recall the class Token() in your file, and, if you want to use standard token, specify userID, userEmail and admin:  
```tk = new Token($userID, $userEmail, true);```  

### Available functions:
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

Example
-------
### Build a token  
Firstly, we define the parameters for Payload (or define an our own Payload or Header):  
```$userId = 'id';``` and ```$userEmail = 'email';```  
Then, we recall the class:  
``` $token = new Token($userId, $userEmail);```  
Now we have to choose a key for our token:  
```$key = 'key';```  
Now we can build our token with every algorithm we desire:  
```$token->encodeHS256($key);```  
This will output the following token:  
```eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6InVzZXJJRCIsImVtYWlsIjoidXNlckVtYWlsIn0.OiPJ-aUppP04heWHrAShMbwzqcrQPbhHDgh474Ds6mg```  
### Check a token  
In order to check a token you simply have to use the opposite command used to create the token, in this case:  
```$token->checkHS256('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6InVzZXJJRCIsImVtYWlsIjoidXNlckVtYWlsIn0.OiPJ-aUppP04heWHrAShMbwzqcrQPbhHDgh474Ds6mg', $key);```  
It will output ```true``` or ```false```, while it will ```die``` an error if mistaken algorithm is chosen.
