<?php
// FILE: koneksi_toko.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    // Sesuaikan dengan nama database format Tahap 1 Anda
    private $db_name = "db_latihan_pbo_ti-1d_intanindahcahyani"; 
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Koneksi ke database gagal: " . $this->conn->connect_error);
        }
    }
}