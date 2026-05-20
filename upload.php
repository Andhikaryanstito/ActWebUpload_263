<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Master - Pearl</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="liquid-mesh">
    <div class="blob blob-1"></div><div class="blob blob-2"></div><div class="blob blob-3"></div><div class="blob blob-4"></div>
</div>

<div class="glass-panel" style="max-width: 1400px; padding: 80px;">
    <header>
  <header>
        <h1>CLOUD VAULT SYSTEM</h1>
        <p>Sinkronisasi Penyimpanan Cloud Mahasiswa UMY</p>
    </header>
    <?php
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
    
    if (isset($_POST["submit"]) && !empty($_FILES['filesToUpload']['name'][0])) {
        $count = count($_FILES['filesToUpload']['name']);
        for ($i = 0; $i < $count; $i++) {
            $filename = basename($_FILES["filesToUpload"]["name"][$i]);
            $target_file = $target_dir . $filename;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            if (in_array($fileType, ['jpg','jpeg','png','gif','webp','jfif'])) {
                move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file);
            }
        }
    }

    $files = glob($target_dir . "*.{jpg,jpeg,png,gif,webp,jfif}", GLOB_BRACE);
    
    if (count($files) > 0) {
        echo "<div class='gallery'>";
        foreach ($files as $file) {
            $name = basename($file);
            echo "<div class='gallery-item'>";
            
            // Tambahkan event onclick="openLightbox(this.src)" pada tag img
            echo "  <div class='gallery-img'><img src='uploads/{$name}' alt='Aset Resolusi Tinggi' onclick='openLightbox(this.src)'></div>";
            
            echo "  <div class='item-name' title='{$name}'>{$name}</div>";
            echo "  <div class='btn-group'>";
            echo "      <a href='uploads/{$name}' download class='btn-action btn-dl'>Unduh Aset</a>";
            echo "      <a href='delete.php?file=" . urlencode($name) . "' class='btn-action btn-del' onclick=\"return confirm('Otorisasi: Hancurkan aset ini secara permanen?')\">Hapus Permanen</a>";
            echo "  </div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<div style='padding: 100px; font-size: 28px; color: var(--text-secondary); font-weight:800;'>📭 Direktori cloud kosong. Segera inisiasi unggahan baru.</div>";
    }
    ?>
    
    <a href="index.html" class="btn-back">Kembali ke Studio Upload</a>
</div>

<div class="lightbox-modal" id="lightbox" onclick="closeLightbox(event)">
    <span class="lightbox-close" onclick="closeLightbox(event)">&times;</span>
    <img class="lightbox-content" id="lightbox-img" src="" alt="Enlarged Server Preview">
</div>

<script>
    // Fungsi Membuka Lightbox
    function openLightbox(imageSrc) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        lightboxImg.src = imageSrc;
        lightbox.classList.add('active');
    }

    // Fungsi Menutup Lightbox
    function closeLightbox(event) {
        if (event.target.id === 'lightbox' || event.target.className.includes('lightbox-close')) {
            document.getElementById('lightbox').classList.remove('active');
        }
    }
</script>

</body>
</html>