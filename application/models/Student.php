<?php
    class Student extends CI_Model{
        function register($student){
            $query = "INSERT INTO students (email, first_name, last_name, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
            $values = array($student["email"], $student["first_name"], $student["last_name"], $student["password"], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
            return $this->db->query($query, $values);
        }

        function login($email, $password){
            $this->db->select("*");
            $this->db->from("students");
            $this->db->where("email", $email);
            $this->db->where("password", MD5($password));
            $query = $this->db->get();

            return $query->row_array();
        }
    }
?>