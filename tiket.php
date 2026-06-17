<?php
// FILE: tiket.php
require_once 'toko_model.php'; // Ini akan otomatis memanggil subclasstiket dan Tiket.php induknya

$model = new ModelTiket();
$semuaTiket = $model->ambilSemuaObjek();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tiket Bioskop Dinamis</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; padding: 30px; color: #333; }
        .container { max-width: 1100px; margin: auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #1e293b; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #0f172a; color: white; font-weight: 600; }
        tr:hover { background-color: #f8fafc; }
        .badge { padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .bg-regular { background-color: #e0f2fe; color: #0369a1; }
        .bg-imax { background-color: #fef3c7; color: #b45309; }
        .bg-velvet { background-color: #f3e8ff; color: #6b21a8; }
        .harga-total { font-weight: bold; color: #16a34a; }
    </style>
</head>
<body>

<div class="container">
    <h1>🎬 Komponen Antarmuka Pemesanan Tiket Bioskop (Tahap 6)</h1>

    <table>
        <thead>
            <tr>
                <th>Nama Film</th>
                <th>Jenis Studio</th>
                <th>Spesifikasi Fasilitas Unik (Polimorfik)</th>
                <th>Total Harga (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($semuaTiket)): ?>
                <?php foreach ($semuaTiket as $tiket): ?>
                    <?php 
                        $className = get_class($tiket);
                        $badgeClass = 'bg-regular';
                        $studioLabel = 'Regular';
                        
                        if ($className === 'TiketIMAX') { $badgeClass = 'bg-imax'; $studioLabel = 'IMAX'; }
                        if ($className === 'TiketVelvet') { $badgeClass = 'bg-velvet'; $studioLabel = 'Velvet'; }
                    ?>
                    <tr>
                        <td><strong>Film Terpilih</strong></td>
                        <td><span class="badge <?= $badgeClass; ?>"><?= $studioLabel; ?></span></td>
                        <td><small><?= $tiket->tampilkanInfoFasilitas(); ?></small></td>
                        <td class="harga-total">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center; color: #64748b;">Belum ada data tiket dinamis dalam database.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>