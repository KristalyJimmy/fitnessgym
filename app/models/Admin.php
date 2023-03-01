<?php
    class Admin {
        private $db;

        public function __construct(){
            $this->db = new Database();
        }


        /************ INDEX **************/
        public function findActiveMembers() {
            $this->db->query("SELECT * FROM membership_validity WHERE membership_status LIKE 'Aktív'");
 
             $result = $this->db->rowCount();
             return $result;
         }
         public function findPlanNumbers() {
             $this->db->query("SELECT * FROM plans");
  
             $result = $this->db->rowCount();
             return $result;
          }
          public function findAvailableTrainers() {
             $this->db->query("SELECT * FROM trainers WHERE status LIKE 'Elérhető'");
             $result = $this->db->rowCount();
             return $result;
              
          }




        /************ PLANS **************/
        public function findPlans() {
            $this->db->query('SELECT * FROM plans ORDER BY plan_id');

            $result = $this->db->resultSet();
            return $result;
        }
        public function findDistinctPlans() {
            $this->db->query('SELECT DISTINCT type FROM plans');

            $result = $this->db->resultSet();
            return $result;
        }
        public function deletePlans($plan_id) {
            $this->db->query('DELETE FROM plans WHERE plan_id = :plan_id');
    
            $this->db->bind(':plan_id', $plan_id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function findPlanById($plan_id) {
            $this->db->query('SELECT * FROM plans WHERE plan_id = :plan_id');
            

            $this->db->bind(':plan_id', $plan_id);

            $row = $this->db->single();

            return $row;
        }
        public function editPlans($data) {
            $this->db->query('UPDATE plans SET plan = :plan, type = :type, amount = :amount WHERE plan_id =:plan_id ');

            $this->db->bind(':plan_id', $data['plan_id']);
            $this->db->bind(':plan',  $data['plan']);
            $this->db->bind(':type',  $data['type']);
            $this->db->bind(':amount',  $data['amount']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function createPlans($data) {
            $this->db->query('INSERT INTO plans(plan_id, plan, type, amount) VALUES (:plan_id, :plan, :type, :amount)');

            $this->db->bind(':plan_id', $data['plan_id']);
            $this->db->bind(':plan', $data['plan']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':amount', $data['amount']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }




        /************ TRAINERS **************/
        public function findTrainers() {
            $this->db->query('SELECT * FROM trainers WHERE trainer_id != 0 ORDER BY id');

            $result = $this->db->resultSet();
            return $result;
        }
        public function deleteTrainers($id) {
            $this->db->query('DELETE FROM trainers WHERE id = :id');
    
            $this->db->bind(':id', $id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function createTrainer($data) {
            $this->db->query('INSERT INTO trainers(trainer_id, trainer_name, gender, contact, email) VALUES (:trainer_id, :trainer_name, :gender, :contact, :email)');

            $this->db->bind(':trainer_id', $data['trainer_id']);
            $this->db->bind(':trainer_name', $data['trainer_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':email', $data['email']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function findTrainerById($id) {
            $this->db->query('SELECT * FROM trainers WHERE id = :id');
            

            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
        public function editTrainers($data) {
            $this->db->query('UPDATE trainers SET trainer_id = :trainer_id, trainer_name = :trainer_name, gender = :gender, contact = :contact, email = :email, status = :status WHERE id =:id ');

            $this->db->bind(':id', $data['id']);
            $this->db->bind(':trainer_id',  $data['trainer_id']);
            $this->db->bind(':trainer_name',  $data['trainer_name']);
            $this->db->bind(':gender',  $data['gender']);
            $this->db->bind(':contact',  $data['contact']);
            $this->db->bind(':email',  $data['email']);
            $this->db->bind(':status',  $data['status']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function updateTrainersStatus($data) {
             
            $trainer = trim($data['trainer_id']);
            $this->db->query('UPDATE trainers SET status = :status WHERE trainer_id = :trainer_id');
            

            $this->db->bind(':trainer_id', $trainer);
            $this->db->bind(':status', "Foglalt");

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        




        /************ MEMBERS **************/
        public function findMembers() {
            $this->db->query('SELECT * FROM members ORDER BY id');

            $result = $this->db->resultSet();
            return $result;
        }
        public function deleteMembers($id) {
            $this->db->query('DELETE FROM members WHERE id = :id');
    
            $this->db->bind(':id', $id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function createMember($data) {
            $this->db->query('INSERT INTO members(member_id, member_name, gender, contact, email) VALUES (:member_id, :member_name, :gender, :contact, :email)');

            $this->db->bind(':member_id', $data['member_id']);
            $this->db->bind(':member_name', $data['member_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':email', $data['email']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function findMemberById($id) {
            $this->db->query('SELECT * FROM members WHERE id = :id');
            

            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }
        public function editMembers($data) {
            $this->db->query('UPDATE members SET member_id = :member_id, member_name = :member_name, gender = :gender, contact = :contact, email = :email WHERE id =:id ');

            $this->db->bind(':id', $data['id']);
            $this->db->bind(':member_id',  $data['member_id']);
            $this->db->bind(':member_name',  $data['member_name']);
            $this->db->bind(':gender',  $data['gender']);
            $this->db->bind(':contact',  $data['contact']);
            $this->db->bind(':email',  $data['email']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }





        /************ MEMBERSHIP **************/
        public function findMembershipValidity() {
            $this->db->query('SELECT * FROM membership_validity
            INNER JOIN members ON membership_validity.member_id = members.member_id
            INNER JOIN plans ON membership_validity.plan_id = plans.plan_id
            INNER JOIN trainers ON membership_validity.trainer_id = trainers.trainer_id
            ORDER BY membership_id ASC');

            $result = $this->db->resultSet();
            return $result;
        }
        public function findMembershipById($membership_id) {
            $this->db->query('SELECT * FROM membership_validity WHERE membership_id = :membership_id');
            

            $this->db->bind(':membership_id', $membership_id);
            $row = $this->db->single();
            return $row;
        }
        public function createMemberships($data) {
            $this->db->query('INSERT INTO membership_validity (member_id, plan_id, trainer_id, start_date, end_date, membership_status) VALUES (:member_id, :plan_id, :trainer_id, :start_date, :end_date, :membership_status)');
            
            $planId = explode('-' , $data['plan_id']);
            $planId = explode(' ' , $planId[1]);
            $plan = $planId[1];
            $type = $planId[2];
            $result = "";

            switch($type){
             case 'hónap': $result = "month";
                break;
            case 'alkalom': $result = "day";
                break;
            case 'hét': $result = "week";
            }
                   
            $endDate = date('Y-m-d', strtotime($data['start_date']. '+' .$plan.$result));
            $status = "";
            if($data['start_date'] > date('Y-m-d') && $data['start_date'] < $endDate) {
                $status =  "Még nem aktív";
            } elseif($data['start_date'] < $endDate && date('Y-m-d') >= $endDate) {
                $status =  "Lejárt";
                
            } elseif($data['start_date'] < $endDate && $data['start_date'] <= date('Y-m-d') && date('Y-m-d') < $endDate) {
                $status =  "Aktív";
            }
            $this->db->bind(':member_id', $data['member_id']);
            $this->db->bind(':plan_id', $data['plan_id']);
            $this->db->bind(':trainer_id', $data['trainer_id']);
            $this->db->bind(':start_date', $data['start_date']);
            $this->db->bind(':end_date', $endDate);
            $this->db->bind(':membership_status', $status);
           
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function deleteMemberships($membership_id) {
            $this->db->query('DELETE FROM membership_validity WHERE membership_id = :membership_id');
    
            $this->db->bind(':membership_id', $membership_id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function editMemberships($data) {
            $this->db->query('UPDATE membership_validity SET member_id = :member_id, plan_id = :plan_id, trainer_id = :trainer_id, start_date = :start_date, end_date = :end_date WHERE membership_id = :membership_id ');

            $this->db->bind(':membership_id', $data['membership_id']);
            $this->db->bind(':member_id', $data['member_id']);
            $this->db->bind(':plan_id', $data['plan_id']);
            $this->db->bind(':trainer_id', $data['trainer_id']);
            $this->db->bind(':start_date', $data['start_date']);
            $this->db->bind(':end_date',   $data['end_date']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        


        /************ PAYMENT **************/
        public function findPayments() {
            $this->db->query('SELECT payment.payment_id, members.member_id, members.member_name, plans.type, plans.plan, plans.amount, payment.date_created FROM payment  
            INNER JOIN plans ON payment.plan_id = plans.plan_id
            INNER JOIN members ON payment.member_id = members.member_id
            ORDER BY payment_id ASC');

            $result = $this->db->resultSet();
            return $result;
        }
        public function deletePayments($payment_id) {
            $this->db->query('DELETE FROM payment WHERE payment_id = :payment_id');
    
            $this->db->bind(':payment_id', $payment_id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function createPayments($data) {
            $this->db->query('INSERT INTO payment (member_id, plan_id) VALUES (:member_id, :plan_id)');

            $this->db->bind(':member_id', $data['member_id']);
            $this->db->bind(':plan_id', $data['plan_id']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }




        /************ MESSAGE **************/
        public function findContactMessage() {
            $this->db->query('SELECT * FROM contact 
            INNER JOIN message_category ON contact.category = message_category.id
            ');

            $result = $this->db->resultSet();
            return $result;
        }
        public function deleteContactMessage($id) {
            $this->db->query('DELETE FROM contact WHERE id = :id');
    
            $this->db->bind(':id', $id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        




        /************ USERS **************/
        public function findUsers() {
            $this->db->query('SELECT * FROM users ORDER BY id');

            $result = $this->db->resultSet();
            return $result;
        }
        public function findUserById($id) {
            $this->db->query('SELECT * FROM users WHERE id = :id');

            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
        public function findDistinctUsers() {
            $this->db->query('SELECT DISTINCT type FROM users');

            $result = $this->db->resultSet();
            return $result;
        }
        public function editUsers($data) {
            $this->db->query('UPDATE users SET username = :username, email = :email, password = :password, type = :type WHERE id = :id ');

            $this->db->bind(':id', $data['id']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':type', $data['type']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function deleteUsers($id) {
            $this->db->query('DELETE FROM users WHERE id = :id');
    
            $this->db->bind(':id', $id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function registerAdmin($data) {
            $this->db->query('INSERT INTO users(username, email, password, type) VALUES (:username, :email, :password, :type)');

            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':type', $data['type']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
       

       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        /*public function findPlanById($id) {
            $this->db->query('SELECT * FROM plans WHERE id = :id');

            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }*/
    }
?>