<?php
        session_start();

        function isLoggedInAdmin() {
            if(isset($_SESSION['user_id']) && $_SESSION['type'] == 'Admin') {
                return true;
            } else {
                return false;
            }
        }
        
        function isLoggedInMember() {
            if(isset($_SESSION['user_id']) && $_SESSION['type'] == 'Member') {
                return true;
            } else {
                return false;
            }
        }
       
?>