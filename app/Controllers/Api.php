<?php 

namespace App\Controllers;

use App\Models\UsersModel;

class Api extends BaseController {



    /*
    |-----------------------------------------------------------------
    |   Login::Check User
    |-----------------------------------------------------------------
    */
    public function userLogin(){
        // Check request method
        if($this->request->getMethod(true) != 'POST'){
            return $this->response
                        ->setJSON([
                            'error' => [
                                'code' => 0,
                                'description' => 'Request must be post request',
                            ]
                        ]);
        }
        
        // Get the email and password from request
        $email = htmlspecialchars($this->request->getPost('userEmail'));
        $password = htmlspecialchars($this->request->getPost('userPassword'));

        

        // check if email or password are empty
        if(empty($email) || empty($password)){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return $this->response
                            ->setJSON([
                                'error' => [
                                    'code' => 400,
                                    'description' => 'the email or password are empty',
                                ]
                            ]);
            }
        }
        
        // Check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $this->response
                        ->setJSON([
                            'error' => [
                                'code' => 501,
                                'description' => 'Email not Valid',
                            ]
                        ]);
        }

        // obj form Users Tabel
        $userModel = new UsersModel();

        // Get user with this email
        $user = $userModel->where('email', $email)->first();

        // check if user is found by his email
        if(empty($user)){
            return $this->response
                        ->setJSON([
                            'error' => [
                                'code' => 510,
                                'description' => 'The email not found',
                            ]
                        ]);
        }

        // Validate the password of user with given password
        if(!password_verify($password, $user['password'])){
            return $this->response
                        ->setJSON([
                            'error' => [
                                'code' => 513,
                                'description' => 'The password is not correct',
                            ]
                        ]);
        }

        // Create response array
        $responseData = array();

        // set response
        $responseData['body'] = [
            'id' => (int)$user['id'],
            'firstName' => $user['firstName'],
            'lastName' => $user['lastName'],
            'email' => $user['email'],
            'avatar' => $user['avatar'],
        ];

        // Send response
        return $this->response
                    ->setStatusCode(200)
                    ->setJSON($responseData);
    }




    /*
    |-----------------------------------------------------------------
    |   Creating User::Register
    |-----------------------------------------------------------------
    */
    public function userRegister(){
        // Check request method
        if($this->request->getMethod(true) != 'POST'){
            return $this->response
                        ->setJSON([
                            'error' => [
                                'code' => 0,
                                'description' => 'Request must be post request',
                            ]
                        ]);
        }



        $firstName = htmlspecialchars($this->request->getPost('userFirstName'));
        $lastName = htmlspecialchars($this->request->getPost('userLastName'));
        $email = htmlspecialchars($this->request->getPost('userEmail'));
        $password = htmlspecialchars($this->request->getPost('userPassword'));
        $avatar = htmlspecialchars($this->request->getPost('userAvatar'));


        // Check if there is empty varibale
        if(empty($firstName) || empty($lastName) || empty($email) || empty($password)){
            return $this->response
                        ->setJSON([
                            'error' => [
                                'code' => 400,
                                'description' => 'There is empty field',
                            ]
                        ]);
        }

        // Check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $this->response
                        ->setJSON([
                            'error' => [
                                'code' => 501,
                                'description' => 'Email not Valid',
                            ]
                        ]);
        }

        // obj from User Tabel
        $userModel = new UsersModel();

        // Check if Email exits
        if($userModel->where('email', $email)->first()){
            return $this->response
                        ->setJSON([
                            'error' => [
                                'code' => 403,
                                'description' => 'The email is already exists',
                            ]
                        ]);
        }

        // Hashing the input password
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        // Array of input user information
        $newUser = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $hashPassword,
            'avatar' => $avatar,
        ];

        // insert user info to Database
        $userModel->insert($newUser);

        
        // Create response array
        $responseData = array();

        // Remove password from user info array
        unset($newUser['password']);

        // Set response data 
        $responseData['body'] = $newUser;
        // Set id of the new user
        $responseData['body']['id'] = $userModel->getInsertID();

        // Send Response
        return $this->response
                    ->setStatusCode(200)
                    ->setJSON($responseData);
    }
}