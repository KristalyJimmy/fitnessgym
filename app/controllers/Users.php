<?php
    class Users extends Controller {

        public function __construct() {
            $this->userModel = $this->model('User');
        }
        public function register() {
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' =>''
                ];
                $nameValidation = "/^[a-zA-Z0-9]*$/";
                $passwordValidation = "/(?i)^(?=.*[a-z])(?=.*\d).{8,}$/i";
                
                if(empty($data['username'])) {
                    $data['usernameError'] = 'Kérem, adja meg a felhasználó nevét!';
                } elseif (!preg_match($nameValidation, $data['username'])) {
                    $data['usernameError'] = 'A felhasználónév csak számokat és betüket tartalmazhat!';
                } else {
                    if($this->userModel->findUserByUsername($data['username'])) {
                        $data['usernameError'] = 'A felhasználónév már foglalt!';
                    }
                }
                if(empty($data['email'])) {
                    $data['emailError'] = 'Kérem, adja meg az email címét!';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Kérem, adja meg a helyes formátumot!';
                } else {
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['emailError'] = 'Az email cím már foglalt!';
                    }
                }
                
                if(empty($data['password'])) {
                    $data['passwordError'] = 'Kérem, adja meg a jelszavát!';
                } elseif(strlen($data['password']) <= 8) {
                    $data['passwordError'] = 'A jelszó legalább 8 karaktert kell tartalmazzon!';
                } elseif (!preg_match($passwordValidation, $data['password'])) {
                    $data['passwordError'] = 'A jelszó legalább egy számjegyet kell tartalmazzon!';
                }
               
                if(empty($data['confirmPassword'])) {
                    $data['confirmPasswordError'] = 'Kérem, erősítse meg a jelszavát!';
                }  else {
                    if($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'A jelszó nem egyezik, próbálja újra!';
                    }
                }
            
                if(empty($data['usernameError']) &&
                   empty($data['emailError']) &&
                   empty($data['passwordError']) &&
                   empty($data['confirmPasswordError'])) {
                      
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                       if($this->userModel->register($data)) {
                        header('location:'.URLROOT.'/users/login');
                       } else {
                           die('Hiba történt!');
                       }
                   } 

            }
            $this->view('users/register', $data);
        }

        public function login() {
            $data = [
                'title' => '',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => ''
            ];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => ''
                ];
                if(empty($data['username'])) {
                    $data['usernameError'] = 'Kérem, adja meg a felhasználó nevét!';
                }

                if(empty($data['password'])) {
                    $data['passwordError'] = 'Kérem, adja meg a jelszavát!';
                }
                if($this->userModel->findUserEmail($_POST['username'])) {
                    $userEmail = $this->userModel->findUserEmail($_POST['username']);
                    if($userEmail->type == "Admin") {
                    } else {
                        if(!$this->userModel->findUserValidation($userEmail->email)) {
                            $data['emailError'] = 'Nem rendelkezik érvényes tagsággal!';
                        }
                    }
                } else {
                    $data['emailError'] = 'Nincs ilyen felhasználó az adatbázisban!';
                }
                if(empty($data['usernameError']) && empty($data['passwordError']) && empty($data['emailError'])) {
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                    if($loggedInUser) {
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['passwordError'] = 'Jelszó vagy felhasználónév hibás! Kérem, adja meg újra!';

                        $this->view('users/login', $data);
                    }
                }
            } else {
                $data = [
                    'username' => '',
                    'password' => '',
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => ''
                ];
            }
            $this->view('users/login', $data);
        }
        
        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['email'] = $user->email;
            $_SESSION['type'] = $user->type;
        
            if($_SESSION['type'] == 'Member') {
            header('location:'.URLROOT.'/members/index');
            } elseif($_SESSION['type'] == 'Admin') {
                header('location:'.URLROOT.'/admins/index');
            } else {
                header('location:'.URLROOT.'/pages/index');
            }
        }
        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            unset($_SESSION['type']);
            header('location:'.URLROOT.'/users/login');
        }
    }