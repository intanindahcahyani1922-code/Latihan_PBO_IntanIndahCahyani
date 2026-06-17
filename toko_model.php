<?php
// FILE: toko_model.php
require_once 'koneksi_toko.php';
require_once 'subclasstiket.php';

class ModelTiket extends Database {
    public function ambilSemuaObjek() {
        // Ambil data dari tabel_tiket
        $query = "SELECT * FROM tabel_tiket ORDER BY jenis_studio ASC, jadwal_tayang ASC";
        $result = $this->conn->query($query);
        
        $daftarTiket = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Instansiasi objek secara dinamis berdasarkan kolom 'jenis_studio' di database
                if ($row['jenis_studio'] === 'Regular' || $row['jenis_studio'] === 'Reguler') {
                    $daftarTiket[] = new TiketRegular(
                        $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                        $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                        $row['tipe_audio'], $row['lokasi_baris']
                    );
                } elseif ($row['jenis_studio'] === 'IMAX') {
                    $daftarTiket[] = new TiketIMAX(
                        $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                        $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                        $row['kacamata_3d_id'], $row['efek_gerak_fitur']
                    );
                } elseif ($row['jenis_studio'] === 'Velvet') {
                    $daftarTiket[] = new TiketVelvet(
                        $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                        $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                        $row['bantal_selimut_pack'], $row['layanan_butler']
                    );
                }
            }
        }
        return $daftarTiket;
    }
}