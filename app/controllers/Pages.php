<?php
    class Pages extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->pageModel = $this->model('Page');
        }
        public function index(){
            $users = $this->userModel->getUsers();
            
            $data = [
                'users' =>$users
            ];

            $this->view('pages/index',$data);
        }
    

        public function contact(){
            $category = $this->pageModel->findMessageCategory();
            $data = [
                'name' => '',
                'email' => '',
                'telephone' => '',
                'message' => '',
                'category' => $category
                
            ];
           
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'telephone' => trim($_POST['telephone']),
                    'message' => trim($_POST['message']),
                    'category' => trim($_POST['category'])
                ];
                if($this->pageModel->sendContactMessage($data)) {
                    
                    header('location:'.URLROOT.'/pages/contact');
                   } else {
                       die('Something went wrong!');
                   }
            }
            $this->view('pages/contact', $data);
        } 
        public function about() {
            $price = $this->pageModel->queryPlans();
          
            $data = [
                'price' => $price
                
            ];
            $this->view('pages/about', $data);
        }
        public function findMessageCat() {
           
            $data = [
                
                
            ];
            $this->view('pages/about', $data);
        }
    }