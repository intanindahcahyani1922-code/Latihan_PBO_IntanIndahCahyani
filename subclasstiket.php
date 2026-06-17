<?php
// FILE: subclasstiket.php

// 1. CLASS INDUK (Taruh di sini agar dibaca oleh semua subclass & file tiket.php)
class Tiket {
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    public function __construct($id, $film, $jadwal, $kursi, $harga) {
        $this->id_tiket = $id;
        $this->nama_film = $film;
        $this->jadwal_tayang = $jadwal;
        $this->jumlah_kursi = $kursi;
        $this->hargaDasarTiket = $harga;
    }

    public function getId() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwal() { return $this->jadwal_tayang; }
    public function getKursi() { return $this->jumlah_kursi; }
    public function getHargaDasar() { return $this->hargaDasarTiket; }

    public function hitungTotalHarga() { return 0; }
    public function tampilkanInfoFasilitas() { return ""; }
}

// 2. SUBCLASS - TIKET REGULAR
class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id, $film, $jadwal, $kursi, $harga, $tipeAudio, $lokasiBaris) {
        parent::__construct($id, $film, $jadwal, $kursi, $harga);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas() {
        return "🔊 Audio: " . ($this->tipeAudio ?? '-') . " | 💺 Baris: " . ($this->lokasiBaris ?? '-');
    }
}

// 3. SUBCLASS - TIKET IMAX
class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id, $film, $jadwal, $kursi, $harga, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id, $film, $jadwal, $kursi, $harga);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        $kacamata = $this->kacamata3dId ? "Kacamata ID: " . $this->kacamata3dId : "Tanpa Kacamata";
        return "🎬 Efek: " . ($this->efekGerakFitur ?? '-') . " (" . $kacamata . ")";
    }
}

// 4. SUBCLASS - TIKET VELVET
class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id, $film, $jadwal, $kursi, $harga, $bantalSelimutPack, $layananButler) {
        parent::__construct($id, $film, $jadwal, $kursi, $harga);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        $bantal = $this->bantalSelimutPack == 1 ? "Include Bantal & Selimut" : "Tanpa Bantal";
        $butler = $this->layananButler == 1 ? "Layanan Butler Aktif" : "Tanpa Butler";
        return "🛌 " . $bantal . " | 🤵 " . $butler;
    }
}