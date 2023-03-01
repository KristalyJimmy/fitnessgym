<?php 
  class Admins extends Controller {
        
    public function __construct() {
      $this->adminModel = $this->model('Admin');
      $this->userModel = $this->model('User');
    }
    /************ INDEX **************/
    public function index() {
      $activeMembers = $this->adminModel->findActiveMembers();
      $planNumbers = $this->adminModel->findPlanNumbers();  
      $availableTrainers = $this->adminModel->findAvailableTrainers();
      $data = [
        'activeMembers' => $activeMembers,
        'planNumbers' => $planNumbers,
        'availableTrainers' =>  $availableTrainers
        
      ];
      $this->view('admins/index', $data);
    }


    
    /************ PLANS **************/
    public function plans(){
      $plans = $this->adminModel->findPlans();
      $distinctPlan = $this->adminModel->findDistinctPlans();
      $data = [
          'plans' =>  $plans,
          'distinctPlan' => $distinctPlan
      ];
      $this->view('admins/plans', $data);
      }
      public function createPlan() {
        $data = [
            'plan' => '',
            'type' => '',
            'amount' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'plan' => trim($_POST['plan']),
                'type' => trim($_POST['type']),
                'amount' => trim($_POST['amount'])
            ];
                if($this->adminModel->createPlans($data)) {
                header("location:".URLROOT."/admins/plans");
            } else {
                die("Valami hiba történt, próbálja meg újra!");
            }    
        } else {
            $this->view('admins/plans', $data);
        }
    
        $this->view('admins/plans', $data);
        }
      public function deletePlan($plan_id){
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              if($this->adminModel->deletePlans($plan_id)) {
                      header("Location: " . URLROOT . "/admins/plans");
              } else {
              die('Hiba történt!');
              }
          }
      }
      public function editPlan($plan_id) {
        $editPlan = $this->adminModel->findPlanById($plan_id);
        
        $data = [
          'plan_id' => $plan_id,
          'editPlan' => $editPlan,
          'plan' => '',
          'type' => '',
          'amount' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'plan_id' => $plan_id,
          'editPlan' => $editPlan,
          'plan' => trim($_POST['plan']),
          'type' => trim($_POST['type']),
          'amount' => trim($_POST['amount'])
        ];
        if($this->adminModel->editPlans($data)) {
          header("location:".URLROOT."/admins/plans");

        } else {
          die("Valami hiba történt, próbálja meg újra!");
        }
      }
      $this->view('admins/plans', $data);
    }


    /************ TRAINERS **************/
    public function trainers(){
      $trainers = $this->adminModel->findTrainers();
      $data = [
        'trainers' =>  $trainers
      ];
      $this->view('admins/trainers', $data);
    }
    public function createTrainers() {
      $data = [
        'trainer_id' => '',
        'trainer_name' => '',
        'gender' => '',
        'contact' => '',
        'email' => ''
      ];
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'trainer_id' => trim($_POST['trainer_id']),
            'trainer_name' => trim($_POST['trainer_name']),
            'gender' => trim($_POST['gender']),
            'contact' => trim($_POST['contact']),
            'email' => trim($_POST['email'])
        ];
        
            if($this->adminModel->createTrainer($data)) {
              header("location:".URLROOT."/admins/trainers");
          } else {
              die("Valami hiba történt, próbálja meg újra!");
          }    
      } else {
        $this->view('admins/trainers', $data);
      }

      $this->view('admins/trainers', $data);
    }
    public function deleteTrainer($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($this->adminModel->deleteTrainers($id)) {
                header("Location: " . URLROOT . "/admins/trainers");
        } else {
          die('Hiba történt!');
        }
      }
    }
    public function editTrainer($id) {
      $editTrainer = $this->adminModel->findTrainerById($id);
      
      $data = [
        'id' => $id,
        'editTrainer' => $editTrainer,
        'trainer_id' => '',
        'trainer_name' => '',
        'gender' => '',
        'contact' => '',
        'email' => '',
        'status' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'id' => $id,
        'editTrainer' => $editTrainer,
        'trainer_id' => trim($_POST['trainer_id']),
        'trainer_name' => trim($_POST['trainer_name']),
        'gender' => trim($_POST['gender']),
        'contact' => trim($_POST['contact']),
        'email' => trim($_POST['email']),
        'status' => trim($_POST['status'])
    ];
      if($this->adminModel->editTrainers($data)) {
        header("location:".URLROOT."/admins/trainers");

      } else {
        die("Valami hiba történt, próbálja meg újra!");
      }
    }
    $this->view('admins/trainers', $data);
  }



    /************ MEMBERS **************/
    public function members(){
      $members = $this->adminModel->findMembers();
      $data = [
        'members' =>  $members
      ];
      $this->view('admins/members', $data);
    }
    public function createMembers() {
      $data = [
        'member_id' => '',
        'member_name' => '',
        'gender' => '',
        'contact' => '',
        'email' => '',
      ];
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'member_id' => trim($_POST['member_id']),
            'member_name' => trim($_POST['member_name']),
            'gender' => trim($_POST['gender']),
            'contact' => trim($_POST['contact']),
            'email' => trim($_POST['email'])
        ];
        
            if($this->adminModel->createMember($data)) {
              header("location:".URLROOT."/admins/members");
          } else {
              die("Valami hiba történt, próbálja meg újra!");
          }    
      } else {
        $this->view('admins/members', $data);
      }

      $this->view('admins/members', $data);
    }
    public function deleteMember($id) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($this->adminModel->deleteMembers($id)) {
                header("Location: " . URLROOT . "/admins/members");
        } else {
          die('Hiba történt!');
        }
      }
    }
    public function editMember($id) {
      $editMember = $this->adminModel->findMemberById($id);
      
      $data = [
        'id' => $id,
        'editMember' => $editMember,
        'member_id' => '',
        'member_name' => '',
        'gender' => '',
        'contact' => '',
        'email' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'id' => $id,
        'editMember' => $editMember,
        'member_id' => trim($_POST['member_id']),
        'member_name' => trim($_POST['member_name']),
        'gender' => trim($_POST['gender']),
        'contact' => trim($_POST['contact']),
        'email' => trim($_POST['email']),
    ];
      if($this->adminModel->editMembers($data)) {
        header("location:".URLROOT."/admins/members");

      } else {
        die("Valami hiba történt, próbálja meg újra!");
      }
    }
    $this->view('admins/members', $data);
  }



    /************ MEMBERSHIP **************/
    public function membershipValidity(){
      $membershipValidity = $this->adminModel->findMembershipValidity();
      $members = $this->adminModel->findMembers();
      $plans = $this->adminModel->findPlans();
      $trainers = $this->adminModel->findTrainers();

      $data = [
        'membershipValidity' =>  $membershipValidity,
        'members' => $members,
        'plans' => $plans,
        'trainers' => $trainers
      ];
      
      $this->view('admins/membershipValidity', $data);
    }

    public function createMembership() {
      $data = [
        'member_id' => '',
        'plan_id' => '',
        'trainer_id' => '',
        'start_date' => ''
      ];
     
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'member_id' => trim($_POST['member_id']),
          'plan_id' => trim($_POST['plan_id']),
          'trainer_id' => trim($_POST['trainer_id']),
          'start_date' => trim($_POST['start_date'])
        ];
          if($this->adminModel->createMemberships($data)) {
              $this->adminModel->createPayments($data);
              $this->adminModel->updateTrainersStatus($data);
              header("location:".URLROOT."/admins/membershipValidity");
             
          } else {
              die("Valami hiba történt, próbálja meg újra!");
          }    
      } else {
        $this->view('admins/membershipValidity', $data);
      }

      $this->view('admins/membershipValidity', $data);
    }
    public function deleteMembership($id) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($this->adminModel->deleteMemberships($id)) {
                header("Location: " . URLROOT . "/admins/membershipValidity");
        } else {
          die('Hiba történt!');
        }
      }
    }
    public function editMembership($membership_id) {
      $editMembership = $this->adminModel->findMembershipById($membership_id);
      
      $data = [
        'membership_id' => $membership_id,
        'editMembership' => $editMembership,
        'member_id' => '',
        'plan_id' => '',
        'trainer_id' => '',
        'start_date' => '',
        'end_date' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'membership_id' => $membership_id,
        'editMembership' => $editMembership,
        'member_id' => trim($_POST['member_id']),
        'plan_id' => trim($_POST['plan_id']),
        'trainer_id' => trim($_POST['trainer_id']),
        'start_date' => trim($_POST['start_date']),
        'end_date' => trim($_POST['end_date'])
    ];
      if($this->adminModel->editMemberships($data)) {
        header("location:".URLROOT."/admins/membershipValidity");

      } else {
        die("Valami hiba történt, próbálja meg újra!");
      }
    }
    $this->view('admins/membershipValidity', $data);
  }






    /************ PAYMENT **************/
    public function payment() {
      $payment = $this->adminModel->findPayments();
      $members = $this->adminModel->findMembers();
      $plans = $this->adminModel->findPlans();
      $data = [
        'members' => $members,
        'plans' => $plans,
        'payment' => $payment
      ];
      $this->view('admins/payment', $data);
    }
    public function deletePayment($payment_id) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($this->adminModel->deletePayments($payment_id)) {
                header("Location: " . URLROOT . "/admins/payment");
        } else {
          die('Hiba történt!');
        }
      }
    }



    /************ MESSAGE **************/
    public function message() {
      $message = $this->adminModel->findContactMessage();

      $data = [
        'message' => $message
      ];
      $this->view('admins/message', $data);
    }
    public function deleteMessage($id) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($this->adminModel->deleteContactMessage($id)) {
                header("Location: " . URLROOT . "/admins/message");
        } else {
          die('Hiba történt!');
        }
      }
    }



    /************ USERS **************/
    public function users(){
      $users = $this->adminModel->findUsers();
      $distinctUsers = $this->adminModel->findDistinctUsers();
      $data = [
        'users' =>  $users,
        'distinctUsers' => $distinctUsers
      ];
      $this->view('admins/users', $data);
    }
    public function createAdminUsers() {
      $data = [
        'username' => '',
        'email' => '',
        'password' => '',
        'confirmPassword' => '',
        'type' => '',
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
            'type' => trim($_POST['type']),
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' =>''
        ];
      $nameValidation = "/^[a-zA-Z0-9]*$/";
      $passwordValidation = "/^(.{7,20}|[^a-z]*|[^\d]*)$/i";
      
      if(empty($data['username'])) {
          $data['usernameError'] = 'Kérem, adja meg a felhasználó nevét!';
      } elseif (!preg_match($nameValidation, $data['username'])) {
          $data['usernameError'] = 'A felhasználónév csak számokat és betüket tartalmazhat!';
      } else {
          if($this->userModel->findUserByUsername($data['username'])) {
              $data['usernameError'] = 'Az felhasználónév már foglalt!';
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

            if($this->adminModel->registerAdmin($data)) {
              header('location:'.URLROOT.'/admins/users');
            } else {
                die('Hiba történt!');
            }
        } 
      }
    }
    $this->view('admins/users', $data);
  }
  public function deleteUser($id) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      if($this->adminModel->deleteUsers($id)) {
              header("Location: " . URLROOT . "/admins/users");
      } else {
        die('Hiba történt!');
      }
    }
  }
 
  public function editUser($id) {
    $editUser = $this->adminModel->findUserById($id);
    
    $data = [
      'id' => $id,
      'editUser' => $editUser,
      'username' => '',
      'email' => '',
      'password' => '',
      'type' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'id' => $id,
        'editUser' => $editUser,
        'username' => trim($_POST['username']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'type' => trim($_POST['type'])
      ];
      if($this->adminModel->editUsers($data)) {
        header("location:".URLROOT."/admins/users");

      } else {
        die("Valami hiba történt, próbálja meg újra!");
      }
    }
    $this->view('admins/users', $data);
  }
  
}
?>
