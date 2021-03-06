# Tad Chat - chat app
A Simple video/text chat app created with Codeigniter,  WebSocket, WebRTC and create RESTful API so it can integrate with other platforms

## Table of contents
* [Introduction](#introduction)
* [Technologies](#technologies)
* [API](#api)
* [Demo](#demo)

## Introduction <span id="introduction"></span>
I created this app because I want to learn more about  WebSocket and WebRTC and how to implement them. Another reason is that I want to create an iOS app that is integrate with this web so i created api to make connection between iOS and web.
 
## Technologies <span id="technologies"></span>
Project created with:
- Codeigniter 4 (PHP 8.0.12)
- WebSocket (Ratchet)
- WebRTC
- JavaScript
- Ajax
- Material Design for Bootstrap

A great resources that explain WebRTC and how it works [here](https://javascript.plainenglish.io/lets-build-a-video-chat-app-with-javascript-and-webrtc-de745072c38c "here") and [here](https://medium.com/dvt-engineering/introduction-to-webrtc-cad0c6900b8e "here")

## RESTful API <span id="api"></span>

For Login Authentication
```
domain/api/UserLogin?userEmail&userPassword
```
and it take two parameters: userEmail, userPassword

Example:
```json
{
    "userEmail": "khater@gmail.com",
    "userPassword": "123"
}
```

For Registering
```
domain/api/userRegister?firstName&lastName&userEmail&userPassword
```
and it takes four parameters:

Example:
```json
{
    "userFirstName": "Mohamed",
    "userLastName": "Khater",
    "userEmail": "khater@gmail.com",
    "userPassword": "123",
}
```

The response of this two requests is object that contain user info:
```json
{
    "body": {
        "firstName": "Fady",
        "lastName": "Victor",
        "email": "fady@gmail.com",
        "avatar": null
    }
}
```

and also error if it occure:
```json
{
    "error": {
        "code": 510,
        "description": "The email not found"
    }
}
```


## Demo <span id="demo"></span>

Video:
<p align="center">
  <img src="./demo/demo.gif" width="700">
</p>

Images:
<p align="center">
  <img src="./demo/First.jpg" width="">
  <img src="./demo/SecondHigh.jpg" width="">
</p>
