<?php 
  class Members extends Controller {
        
    public function __construct() {
      $this->memberModel = $this->model('Member');
    }

    public function index() {
        $activeMember = $this->memberModel->findActiveMembers();
        $membershipValidity = $this->memberModel->findMembershipValidity(); 
        $availableTrainers = $this->memberModel->findAvailableTrainers();
        $data = [
          'activeMember' => $activeMember,
          'membershipValidity' => $membershipValidity,
          'availableTrainers' =>  $availableTrainers
          
        ];
        $this->view('members/index', $data);
      }
    public function plans(){
        $plans = $this->memberModel->findPlans();
        $data = [
            'plans' =>  $plans,
        ];
        $this->view('members/plans', $data);
    }
    public function trainers(){
        $trainers = $this->memberModel->findTrainers();
        $data = [
            'trainers' =>  $trainers
        ];
        $this->view('members/trainers', $data);
    }
    public function membershipValidity(){
        $membershipValidity = $this->memberModel->findMembershipValidity();
        $members = $this->memberModel->findMembers();
        $plans = $this->memberModel->findPlans();
        $trainers = $this->memberModel->findTrainers();
  
        $data = [
          'membershipValidity' =>  $membershipValidity,
          'members' => $members,
          'plans' => $plans,
          'trainers' => $trainers
        ];
        
        $this->view('members/membershipValidity', $data);
      }
}