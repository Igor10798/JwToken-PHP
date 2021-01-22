# JwToken
This is s short and light library that lets you create your jwt Token with SHA-256, SHA-384 and SHA-512.  
I am currently adding other algorithms to this library.

Getting started
---------------
You can import this library in 2 ways:  
**on-line mode**: using HTTPS link to this file: *link*.  
**off-line mode**: just downloading the archive and importing the file in your project.

How it works
------------
### Standard header and payloads:  
If you don't set up any attributes, standard one are (payloadSt is used if your algorithm is nor SHA-256"):
<html> standardHeader = ["alg"=> "HS256", "typ"=> "JWT"]; <br>
       standardPayload = ["id"=> "$this->userID", "email"=> "$this->userEmail"]; <br>
       payloadSt = ["id"=> "$this->userID", "email"=> "$this->userEmail", "admin"=> true];
</html>  
### Recalling class and defining variables:
Firstly, ou have to recall the class Token() in your file, and, if you want to use standard token, specify userID, userEmail and admin:
<html> tk = new Token($userID, $userEmail, true);
</html>
### Available functions:
  encodeToken(key, header, payload);  
  <html>
    <p>only "key" is a mandatory attribute to this function, id you left empy the others it will print a token hashed with SHA-256 with e-mail and id information <br>
  </p>
  </html>
  encodeHS256($key, $payload);
  encodeHS384($key, $payload);
  encodeHS512($key, $payload);
  checkToken($token, $key, $headerCheck, $payloadCheck);
  checkHS256($token, $key, $payload);
  checkHS384($token, $key, $payload);
  checkHS512($token, $key, $payload);
