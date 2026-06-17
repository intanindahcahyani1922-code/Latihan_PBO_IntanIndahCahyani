<?php
// FILE: SubclassTiket.php
require_once 'Tiket.php';

// 1. Subclass TiketRegular
class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id, $film, $jadwal, $kursi, $harga, $tipeAudio, $lokasiBaris) {
        parent::__construct($id, $film, $jadwal, $kursi, $harga);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // TAHAP 5: Method Overriding Tarif Standar Murni
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas() {
        return "🔊 Audio: " . ($this->tipeAudio ?? '-') . " | 💺 Baris: " . ($this->lokasiBaris ?? '-');
    }
}

// 2. Subclass TiketIMAX
class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id, $film, $jadwal, $kursi, $harga, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id, $film, $jadwal, $kursi, $harga);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // TAHAP 5: Method Overriding Tambahan Biaya Layar Lebar & Audio Flat Rp35.000
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        $kacamata = $this->kacamata3dId ? "Kacamata ID: " . $this->kacamata3dId : "Tanpa Kacamata 3D";
        return "🎬 Efek: " . ($this->efekGerakFitur ?? '-') . " (" . $kacamata . ")";
    }
}

// 3. Subclass TiketVelvet
class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id, $film, $jadwal, $kursi, $harga, $bantalSelimutPack, $layananButler) {
        parent::__construct($id, $film, $jadwal, $kursi, $harga);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // TAHAP 5: Method Overriding Surcharge Kelas Premium Sebesar 50%
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        $bantal = $this->bantalSelimutPack == 1 ? "Include Bantal & Selimut" : "Tanpa Bantal";
        $butler = $this->layananButler == 1 ? "Layanan Butler Aktif" : "Tanpa Butler";
        return "🛌 " . $bantal . " | 🤵 " . $butler;
    }
}