<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aset Dieliminasi - Pearl</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="liquid-mesh">
    <div class="blob blob-1"></div><div class="blob blob-2"></div><div class="blob blob-3"></div><div class="blob blob-4"></div>
</div>

<div class="glass-panel" style="max-width: 700px; padding: 80px;">
    <?php
    $file = isset($_GET['file']) ? $_GET['file'] : '';
    
    if ($file && file_exists("uploads/" . $file)) {
        unlink("uploads/" . $file);
        echo "<div style='font-size: 90px; margin-bottom: 25px; filter: drop-shadow(0 20px 30px rgba(225,29,72,0.4));'>🔥</div>";
        echo "<header><h1 style='font-size: 48px; background: linear-gradient(135deg, #e11d48, #fb7185); -webkit-background-clip: text; -webkit-text-fill-color: transparent;'>ASET DIBAKAR</h1>";
        echo "<p style='color: var(--text-secondary); font-size: 18px; margin-top: 25px; letter-spacing: 1px;'>Berkas visual <strong style='color: var(--text-primary);'>{$file}</strong> berhasil dihilangkan tanpa jejak dari server utama.</p></header>";
    } else {
        echo "<div style='font-size: 90px; margin-bottom: 25px; filter: drop-shadow(0 20px 30px rgba(245,158,11,0.4));'>⚠️</div>";
        echo "<header><h1 style='font-size: 48px; background: linear-gradient(135deg, #d97706, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent;'>AKSES DITOLAK</h1><p>Aset tidak valid atau sudah terhapus.</p></header>";
    }
    ?>
    <a href="upload.php" class="btn-primary" style="margin-top: 40px;">Kembali ke Database Master</a>
</div>
</body>
</html>