<?php


abstract class Tiket {
    // Properti Terenkapsulasi (protected) sesuai ketentuan soal
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    // Konstruktor wajib untuk memetakan data kolom database
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // Fungsi Getter pembantu untuk mengambil nilai properti terenkapsulasi
    public function getId() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwal() { return $this->jadwal_tayang; }
    public function getKursi() { return $this->jumlah_kursi; }
    public function getHargaDasar() { return $this->hargaDasarTiket; }

    // METODE ABSTRAK (Wajib tanpa isi/body)
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();
}