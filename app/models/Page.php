<?php
    class Page {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        public function sendContactMessage($data) {
            $this->db->query('INSERT INTO contact (name, email, telephone, message, category) VALUES (:name, :email, :telephone, :message, :category)');

            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':telephone', $data['telephone']);
            $this->db->bind(':message', $data['message']);
            $this->db->bind(':category', $data['category']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function queryPlans() {
            $this->db->query('SELECT * FROM plans ORDER BY plan_id');

            $result = $this->db->resultSet();
            return $result;
        }
        public function findMessageCategory() {
            $this->db->query('SELECT * FROM message_category ORDER BY id');

            $result = $this->db->resultSet();
            return $result;
        }

    }