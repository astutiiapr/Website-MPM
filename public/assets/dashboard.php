<?php 
// Memanggil file koneksi agar halaman ini bisa terhubung ke MySQL
include 'koneksi.php'; 

// Mengambil total count data secara dinamis dari database untuk kartu statistik
$query_hitung_dokumen = mysqli_query($koneksi, "SELECT * FROM pusat_data");
$total_dokumen = mysqli_num_rows($query_hitung_dokumen);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - MPM PNJ</title>
  <style>
    /* Reset & Variabel */
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: sans-serif; }
    body { display: flex; background-color: #f4f6f9; color: #333; }

    /* Sidebar Styling */
    .sidebar { width: 250px; background-color: #002244; color: white; height: 100vh; position: fixed; padding-top: 20px; }
    .sidebar-header { text-align: center; padding-bottom: 20px; border-bottom: 1px solid #003366; margin-bottom: 20px; }
    .sidebar-header img { width: 60px; margin-bottom: 10px; }
    .sidebar-menu { list-style: none; }
    .sidebar-menu li { padding: 15px 20px; transition: 0.3s; }
    .sidebar-menu li:hover, .sidebar-menu li.active { background-color: #00509E; cursor: pointer; border-left: 4px solid #66b3ff; }
    .sidebar-menu li a { color: white; text-decoration: none; display: block; font-weight: bold; pointer-events: none; }
    .logout-btn { position: absolute; bottom: 20px; width: 100%; border-left: none !important;}
    .logout-btn:hover { background-color: transparent !important; opacity: 0.8;}
    .logout-btn a { color: #ff4d4d; pointer-events: auto; }

    /* Konten Utama */
    .main-content { margin-left: 250px; padding: 30px; width: calc(100% - 250px); }
    .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
    .header h1 { font-size: 1.8em; color: #002244; }
    
    /* Tombol Aksi */
    .btn-add { background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; transition: 0.3s; }
    .btn-add:hover { background-color: #218838; }
    .btn-edit, .btn-delete { padding: 6px 12px; color: white; border: none; border-radius: 4px; font-size: 0.85em; margin-right: 5px; cursor: pointer; }
    .btn-edit { background-color: #ffc107; color: #333; }
    .btn-edit:hover { background-color: #e0a800; }
    .btn-delete { background-color: #dc3545; }
    .btn-delete:hover { background-color: #c82333; }

    /* Styling Tabel & Kartu */
    .table-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background-color: #002244; color: white; }
    tr:hover { background-color: #f1f1f1; }

    /* Halaman Section (Untuk JS Toggle) */
    .content-section { display: none; animation: fadeIn 0.5s; }
    .content-section.active { display: block; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

    /* Kartu Statistik Dashboard Utama */
    .stats-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
    .stat-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); text-align: center; border-top: 5px solid #00509E; }
    .stat-card h3 { color: #666; margin-bottom: 10px; }
    .stat-card h2 { font-size: 2.5em; color: #002244; }

    /* Styling Modal Form */
    .modal-overlay {
      position: fixed; top: 0; left: 0; width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center;
      opacity: 0; pointer-events: none; transition: opacity 0.3s ease; z-index: 999;
    }
    .modal-overlay.show { opacity: 1; pointer-events: auto; }
    .modal-box {
      background: white; padding: 30px; border-radius: 10px; width: 100%; max-width: 450px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2); animation: slideUp 0.3s ease;
    }
    @keyframes slideUp { from { transform: translateY(20px); } to { transform: translateY(0); } }
    .modal-box h2 { margin-bottom: 20px; color: #002244; font-size: 1.4em; border-bottom: 2px solid #f4f6f9; padding-bottom: 10px;}
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; font-size: 0.9em; margin-bottom: 5px; font-weight: bold; }
    .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em; }
    .modal-buttons { display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px; }
    .btn-cancel { background: #6c757d; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;}
    .btn-save { background: #002244; color: white; padding: 10px 25px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;}
    .btn-save:hover { background: #00509E; }
  </style>
</head>
<body>

  <aside class="sidebar">
    <div class="sidebar-header">
      <img src="logo-mpm.png" alt="Logo MPM">
      <h3>Admin MPM</h3>
    </div>
    <ul class="sidebar-menu">
      <li id="nav-dashboard" class="active" onclick="switchTab('dashboard')"><a href="#">Dashboard</a></li>
      <li id="nav-pusat-data" onclick="switchTab('pusat-data')"><a href="#">Kelola Pusat Data</a></li>
      <li id="nav-activity" onclick="switchTab('activity')"><a href="#">Kelola Activity</a></li>
      <li class="logout-btn"><a href="index.php">🚪 Logout</a></li>
    </ul>
  </aside>

  <main class="main-content">
    
    <div id="sec-dashboard" class="content-section active">
      <div class="header">
        <h1>Selamat Datang, Admin!</h1>
      </div>
      <p style="margin-bottom: 20px; color: #666;">Ringkasan sistem manajemen website MPM PNJ saat ini:</p>
      <div class="stats-grid">
        <div class="stat-card">
          <h3>Total Dokumen Pusat Data</h3>
          <h2><?php echo $total_dokumen; ?></h2> </div>
        <div class="stat-card">
          <h3>Total Kegiatan (Our Activity)</h3>
          <h2>3</h2>
        </div>
      </div>
    </div>

    <div id="sec-pusat-data" class="content-section">
      <div class="header">
        <h1>Manajemen Pusat Data</h1>
        <button class="btn-add" onclick="openModal('modal-dokumen', 'Tambah Dokumen Baru')">+ Tambah Dokumen</button>
      </div>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Dokumen / Link</th>
              <th>Tautan Asli (URL)</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <div id="sec-pusat-data" class="content-section">
        <tbody>
            <?php
            // Ambil data dari database db_mpm
            $query = mysqli_query($koneksi, "SELECT * FROM pusat_data ORDER BY id ASC");
            $no = 1;

            // Lakukan looping untuk menampilkan semua baris data
            while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><strong><?php echo htmlspecialchars($data['nama_dokumen']); ?></strong></td>
                <td>
                    <a href="<?php echo htmlspecialchars($data['url_link']); ?>" target="_blank">
                        (<?php echo htmlspecialchars($data['url_link']); ?>)
                    </a>
                </td>
                <td>
                    <button class="btn-edit" onclick="openModal('modal-dokumen', 'Edit Dokumen', '<?php echo $data['id']; ?>', '<?php echo addslashes($data['nama_dokumen']); ?>', '<?php echo addslashes($data['url_link']); ?>')">Edit</button>
                    <button class="btn-delete" onclick="confirmDelete('<?php echo $data['id']; ?>', '<?php echo addslashes($data['nama_dokumen']); ?>')">Hapus</button>
                </td>
            </tr>
            <?php 
            } // Penutup loop while
            ?>
        </tbody>
        </table>
      </div>
    </div>

    <div id="sec-activity" class="content-section">
      <div class="header">
        <h1>Manajemen Activity</h1>
        <button class="btn-add" onclick="openModal('modal-activity', 'Tambah Kegiatan Baru')">+ Tambah Kegiatan</button>
      </div>
      <div class="table-container">
        <table>
          <thead>
            <tr><th>No</th><th>Nama Kegiatan</th><th>Tanggal Pelaksanaan</th><th>Status Foto</th><th>Aksi</th></tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td><td><strong>Serah Terima Jabatan</strong></td><td>13 Januari 2026</td><td style="color: green;">Terunggah (serah-terima.jpg)</td>
              <td>
                <button class="btn-edit" onclick="openModal('modal-activity', 'Edit Kegiatan', 'Serah Terima Jabatan', '2026-01-13')">Edit</button>
                <button class="btn-delete" onclick="confirmDelete('Serah Terima Jabatan')">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>2</td><td><strong>PPOK (Pelantikan Pengurus Organisasi)</strong></td><td>18 Februari 2026</td><td style="color: green;">Terunggah (ppok.jpg)</td>
              <td>
                <button class="btn-edit" onclick="openModal('modal-activity', 'Edit Kegiatan', 'PPOK (Pelantikan Pengurus Organisasi)', '2026-02-18')">Edit</button>
                <button class="btn-delete" onclick="confirmDelete('PPOK')">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>3</td><td><strong>Pencerdasan Administrasi</strong></td><td>31 Maret 2026</td><td style="color: green;">Terunggah (pencerdasan-adm.jpg)</td>
              <td>
                <button class="btn-edit" onclick="openModal('modal-activity', 'Edit Kegiatan', 'Pencerdasan Administrasi', '2026-03-31')">Edit</button>
                <button class="btn-delete" onclick="confirmDelete('Pencerdasan Administrasi')">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </main>

 <div id="modal-dokumen" class="modal-overlay">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('modal-dokumen')">&times;</span>
        
        <div id="dokumen-title">
            <h2>Tambah Dokumen Baru</h2>
        </div>
        
        <form action="proses_tambah_dokumen.php" method="POST">
          <input type="hidden">
          <form action="proses_tambah_dokumen.php" method="POST" id="form-dokumen">
           <input type="hidden" id="doc-id" name="id_dokumen">
    
          <div class="form-group">
            <label>Nama Dokumen / Link</label>
            <input type="text" id="doc-name" name="nama_dokumen" placeholder="Contoh: AD/ART IKM PNJ" required>
          </div>

            
            <div class="form-group">
                <label>Tautan Asli (URL Link)</label>
                <input type="url" id="doc-link" name="url_link" placeholder="Context: https://drive.google.com/..." required>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModal('modal-dokumen')">Batal</button>
                <button type="submit" name="simpan_dokumen" class="btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

  <div id="modal-activity" class="modal-overlay">
    <div class="modal-box">
      <div id="activity-title"><h2>Tambah/Edit Kegiatan</h2></div>
      <form onsubmit="saveMockup(event)">
        <div class="form-group">
          <label>Nama Kegiatan / Proker</label>
          <input type="text" id="act-name" placeholder="Contoh: PPOK 2026" required>
        </div>
        <div class="form-group">
          <label>Tanggal Pelaksanaan</label>
          <input type="date" id="act-date" required>
        </div>
        <div class="form-group">
          <label>Unggah Foto Kegiatan</label>
          <input type="file" accept="image/*">
          <small style="color: #666;">*Kosongkan jika tidak ingin mengubah foto</small>
        </div>
        <div class="modal-buttons">
          <button type="button" class="btn-cancel" onclick="closeModal('modal-activity')">Batal</button>
          <button type="submit" class="btn-save">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>

 <script>
  // 1. Fungsi Pindah Tab Menu (Sidebar)
  function switchTab(tabName) {
    document.querySelectorAll('.content-section').forEach(sec => sec.classList.remove('active'));
    document.querySelectorAll('.sidebar-menu li').forEach(li => li.classList.remove('active'));
    
    // Cek apakah ID elemennya ada, baru aktifkan (mencegah eror)
    var targetSec = document.getElementById('sec-' + tabName);
    var targetNav = document.getElementById('nav-' + tabName);
    
    if (targetSec) targetSec.classList.add('active');
    if (targetNav) targetNav.classList.add('active');
  }

  // 2. Fungsi Membuka Pop-up Form (Tambah / Edit)
  function openModal(modalId, titleText, idVal = '', nameVal = '', linkVal = '') {
    var modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.add('show');
    }
    
    // Khusus Modal Dokumen / Pusat Data
    if (modalId === 'modal-dokumen') {
      if (document.getElementById('dokumen-title')) {
        document.getElementById('dokumen-title').innerHTML = `<h2>${titleText}</h2>`;
      }
      if (document.getElementById('doc-id')) document.getElementById('doc-id').value = idVal;
      if (document.getElementById('doc-name')) document.getElementById('doc-name').value = nameVal;
      if (document.getElementById('doc-link')) document.getElementById('doc-link').value = linkVal;
      
      // Atur rute form: ke proses_edit atau proses_tambah
      var formDokumen = document.getElementById('form-dokumen');
      if (formDokumen) {
          if (idVal !== '') {
              formDokumen.action = 'proses_edit_dokumen.php';
          } else {
              formDokumen.action = 'proses_tambah_dokumen.php';
          }
      }
    } 
    // Khusus Modal Activity (jika ada)
    else if (modalId === 'modal-activity') {
      if (document.getElementById('activity-title')) {
        document.getElementById('activity-title').innerHTML = `<h2>${titleText}</h2>`;
      }
      if (document.getElementById('act-name')) document.getElementById('act-name').value = nameVal;
      if (document.getElementById('act-date')) document.getElementById('act-date').value = linkVal;
    }
  }

  // 3. Fungsi Menutup Pop-up Form
  function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.remove('show');
    }
  }

  // 4. Fungsi Konfirmasi Hapus Data
  function confirmDelete(id, name) {
    if (confirm(`Apakah Anda yakin ingin menghapus dokumen "${name}"?`)) {
        window.location.href = 'proses_hapus_dokumen.php?id=' + id;
    }
  }
</script>

</body>
</html>