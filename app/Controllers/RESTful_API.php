<?php 

namespace App\Controllers;

use App\Models\UsersModel;

class RESTful_API extends BaseController {

    public function userLogin(){
        $responseData = array();

        $userModel = new UsersModel();

        $email = htmlspecialchars($this->request->getVar('userEmail'));
        $password = htmlspecialchars($this->request->getVar('userPassword'));

        if(empty($email) || empty($password)){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $responseData['error'] = [
                    'code' => 400,
                    'description' => 'the email or password are empty',
                ];
    
                return $this->response
                            ->setContentType('application/json')
                            ->setBody(json_encode($responseData));
            }
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $responseData['error'] = [
                'code' => 501,
                'description' => 'Email not Valid',
            ];

            return $this->response
                        ->setContentType('application/json')
                        ->setBody(json_encode($responseData));
        }

        $user = $userModel->where('email', $email)->first();
        
        if(empty($user)){
            $responseData['error'] = [
                'code' => 510,
                'description' => 'The email not found',
            ];

            return $this->response
                        ->setContentType('application/json')
                        ->setBody(json_encode($responseData));
        }


        if(!password_verify($password, $user['password'])){
            $responseData['error'] = [
                'code' => 513,
                'description' => 'The password is not correct',
            ];

            return $this->response
                        ->setContentType('application/json')
                        ->setBody(json_encode($responseData));
        }

        $responseData['body'] = [
            'firstName' => $user['firstName'],
            'lastName' => $user['lastName'],
            'email' => $user['email'],
            'avatar' => $user['avatar'],
        ];

        return $this->response
                    ->setStatusCode(200)
                    ->setContentType('application/json')
                    ->setBody(json_encode($responseData));
    }



    public function userRegister(){
        $firstName = htmlspecialchars($this->request->getVar('userFirstName'));
        $lastName = htmlspecialchars($this->request->getVar('userLastName'));
        $email = htmlspecialchars($this->request->getVar('userEmail'));
        $password = htmlspecialchars($this->request->getVar('userPassword'));
        $avatar = htmlspecialchars($this->request->getVar('userAvatar'));

        if(empty($firstName) || empty($lastName) || empty($email) || empty($password)){
            $responseData['error'] = [
                'code' => 400,
                'description' => 'There is empty field',
            ];

            return $this->response
                        ->setContentType('application/json')
                        ->setBody(json_encode($responseData));
        }


        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $responseData['error'] = [
                'code' => 501,
                'description' => 'Email not Valid',
            ];

            return $this->response
                        ->setContentType('application/json')
                        ->setBody(json_encode($responseData));
        }

        $userModel = new UsersModel();

        if($userModel->where('email', $email)->first()){
            $responseData['error'] = [
                'code' => 403,
                'description' => 'The email is already exists',
            ];

            return $this->response
                        ->setContentType('application/json')
                        ->setBody(json_encode($responseData));
        }

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $newUser = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $hashPassword,
            'avatar' => $avatar,
        ];

        

        $userModel->insert($newUser);

        unset($newUser['password']);

        $newUser['id'] = $userModel->getInsertID();

        return $this->response
                    ->setStatusCode(200)
                    ->setContentType('application/json')
                    ->setBody(json_encode(['body' => $newUser]));
    }
}