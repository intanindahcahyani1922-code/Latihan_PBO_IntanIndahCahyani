<?php
// FILE: SubclassTiket.php
require_once 'tiket.php'; // Menyertakan class induk Tiket

// 1. Subclass TiketRegular memiliki tipeAudio dan lokasiBaris
class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id, $film, $jadwal, $kursi, $harga, $tipeAudio, $lokasiBaris) {
        // Melempar data global ke konstruktor milik parent class (Tiket)
        parent::__construct($id, $film, $jadwal, $kursi, $harga);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Mengisi badan fungsi dari abstract method induk
    public function hitungTotalHarga() {
        return $this->hargaDasarTiket; // Regular tidak ada tambahan biaya
    }

    public function tampilkanInfoFasilitas() {
        return "Audio: " . ($this->tipeAudio ?? '-') . " | Baris: " . ($this->lokasiBaris ?? '-');
    }
}

// 2. Subclass TiketIMAX memiliki kacamata3dId dan efekGerakFitur
class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id, $film, $jadwal, $kursi, $harga, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id, $film, $jadwal, $kursi, $harga);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function hitungTotalHarga() {
        return $this->hargaDasarTiket; 
    }

    public function tampilkanInfoFasilitas() {
        $kacamata = $this->kacamata3dId ? "Kacamata ID: " . $this->kacamata3dId : "Tanpa Kacamata 3D";
        return "Fitur: " . ($this->efekGerakFitur ?? '-') . " (" . $kacamata . ")";
    }
}

// 3. Subclass TiketVelvet memiliki bantalSelimutPack dan layananButler
class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id, $film, $jadwal, $kursi, $harga, $bantalSelimutPack, $layananButler) {
        parent::__construct($id, $film, $jadwal, $kursi, $harga);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function hitungTotalHarga() {
        return $this->hargaDasarTiket; 
    }

    public function tampilkanInfoFasilitas() {
        $bantal = $this->bantalSelimutPack == 1 ? "Include Bantal & Selimut" : "Tanpa Bantal";
        $butler = $this->layananButler == 1 ? "Layanan Butler Aktif" : "Tanpa Butler";
        return $bantal . " | " . $butler;
    }
}