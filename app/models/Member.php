<?php
    class Member {
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
        public function findActiveMembers() {
            $this->db->query("SELECT * FROM users 
            INNER JOIN members ON users.email = members.email WHERE users.email LIKE :session_email");

            $this->db->bind(':session_email', $_SESSION['email']);
            $result = $this->db->resultSet();
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
          public function findPlans() {
            $this->db->query('SELECT * FROM plans ORDER BY plan_id');

            $result = $this->db->resultSet();
            return $result;
        }
        public function findTrainers() {
            $this->db->query('SELECT * FROM trainers WHERE trainer_id != 0 ORDER BY id');

            $result = $this->db->resultSet();
            return $result;
        }
        public function findMembershipValidity() {
            $this->db->query(
                'SELECT  * FROM membership_validity
                 INNER JOIN members ON members.member_id = membership_validity.member_id
                 INNER JOIN plans ON plans.plan_id = membership_validity.plan_id  
                 INNER JOIN trainers ON trainers.trainer_id = membership_validity.trainer_id
                 INNER JOIN users ON users.email = members.email
                 WHERE users.email LIKE :session_email
                 ORDER BY membership_validity.membership_id ASC
                 
                 ');
         
             $this->db->bind(':session_email', $_SESSION['email']);
            $result = $this->db->resultSet();
            return $result;
        }

    }