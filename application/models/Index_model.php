<?php

    class Index_model extends CI_Model{

        public function get_messages()
        {
            $query = $this->db->query("SELECT * FROM message ORDER BY post_date DESC;");
            return $query->result_array();
        }

        public function add_to_db($table, $data)
        {
            return $this->db->insert($table, $data, true); //エスケープを施したのち（第三引数で指定）テーブルに書き込む。論理値を返す。
        }

        public function get_password($email)
        {
            $sql = "SELECT * FROM member WHERE email = ?;";
            $query = $this->db->query($sql, $email); //バインドでエスケープも兼ねる
            return $query->row_array();
        }
    }