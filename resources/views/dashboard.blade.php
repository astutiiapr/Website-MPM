<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - MPM PNJ</title>
  <style>
    /* Reset & Variabel Umum */
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: sans-serif; }
    body { display: flex; background-color: #f4f6f9; color: #333; }

    /* Sidebar Styling */
    .sidebar { width: 250px; background-color: #002244; color: white; height: 100vh; position: fixed; padding-top: 20px; }
    .sidebar-header { text-align: center; padding-bottom: 20px; border-bottom: 1px solid #003366; margin-bottom: 20px; }
    .sidebar-header img { width: 60px; margin-bottom: 10px; border-radius: 50%; }
    
    .sidebar-menu { list-style: none; }
    .sidebar-menu li { padding: 15px 20px; transition: 0.3s; cursor: pointer; }
    .sidebar-menu li:hover, .sidebar-menu li.active { background-color: #00509E; border-left: 4px solid #66b3ff; }
    .sidebar-menu li a { color: white; text-decoration: none; display: block; font-weight: bold; }
    
    .logout-btn { position: absolute; bottom: 20px; width: 100%; border-left: none !important; }
    .logout-btn:hover { background-color: transparent !important; opacity: 0.8; }
    .logout-btn a { color: #ff4d4d; font-weight: bold; cursor: pointer; }

    /* Konten Utama */
    .main-content { margin-left: 250px; padding: 30px; width: calc(100% - 250px); }
    .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
    .header h1 { font-size: 1.8em; color: #002244; }
    
    /* Tombol Interaksi Form */
    .btn-add { background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; transition: 0.3s; }
    .btn-add:hover { background-color: #218838; }
    .btn-edit, .btn-delete { padding: 6px 12px; color: white; border: none; border-radius: 4px; font-size: 0.85em; margin-right: 5px; cursor: pointer; }
    .btn-edit { background-color: #ffc107; color: #333; display: inline-block; text-decoration: none; }
    .btn-edit:hover { background-color: #e0a800; }
    .btn-delete { background-color: #dc3545; }
    .btn-delete:hover { background-color: #c82333; }

    /* Styling Tabel & Kartu Grid */
    .table-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 25px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; vertical-align: top; }
    th { background-color: #002244; color: white; }
    tr:hover { background-color: #f1f1f1; }

    /* Halaman Section (Mengendalikan Tab Menu) */
    .content-section { display: none; animation: fadeIn 0.5s; }
    .content-section.active { display: block; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

    /* Ringkasan Statistik Grid di Beranda Admin Utama */
    .stats-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 30px; }
    .stat-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); text-align: center; border-top: 5px solid #00509E; }
    .stat-card h3 { color: #666; margin-bottom: 10px; }
    .stat-card h2 { font-size: 2.5em; color: #002244; }

    /* Komponen Overlay Pop-up Modal Form */
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
    .modal-box h2 { margin-bottom: 20px; color: #002244; font-size: 1.4em; border-bottom: 2px solid #f4f6f9; padding-bottom: 10px; }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; font-size: 0.9em; margin-bottom: 5px; font-weight: bold; }
    .form-group input, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em; }
    .form-group textarea { resize: vertical; height: 80px; font-family: sans-serif; }
    .modal-buttons { display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px; }
    .btn-cancel { background: #6c757d; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
    .btn-save { background: #002244; color: white; padding: 10px 25px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
    .btn-save:hover { background: #00509E; }
    
    /* Notifikasi Alert Sukses */
    .alert-success { background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #c3e6cb; }
  </style>
</head>
<body>

  <aside class="sidebar">
    <div class="sidebar-header">
      <img src="{{ asset('logo-mpm.png') }}" alt="Logo MPM" onerror="this.onerror=null; this.src='https://placehold.co/60x60?text=MPM';">
      <h3>Admin MPM</h3>
    </div>
    <ul class="sidebar-menu">
      <li id="nav-dashboard" class="active" onclick="switchTab('dashboard')"><a href="#">Dashboard</a></li>
      <li id="nav-pusat-data" onclick="switchTab('pusat-data')"><a href="#">Kelola Pusat Data</a></li>
      <li id="nav-activity" onclick="switchTab('activity')"><a href="#">Kelola Activity</a></li>
      <li class="logout-btn">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">🚪 Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
  </aside>

  <main class="main-content">
    
    @if(session('success'))
      <div class="alert-success">
          {{ session('success') }}
      </div>
    @endif
    
    <div id="sec-dashboard" class="content-section active">
      <div class="header">
        <h1>Selamat Datang, Admin!</h1>
      </div>
      <p style="margin-bottom: 20px; color: #666;">Ringkasan sistem manajemen website MPM PNJ saat ini:</p>
      
      <div class="stats-grid">
        <div class="stat-card" onclick="switchTab('pusat-data')" style="cursor: pointer;">
            <h3>Total Dokumen Pusat Data</h3>
            <h2>{{ $total_dokumen }}</h2>
        </div>
        <div class="stat-card" onclick="switchTab('activity')" style="cursor: pointer;">
          <h3>Total Kegiatan (Our Activity)</h3>
          <h2>{{ $activities->count() }}</h2>
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
          <tbody>
            @forelse($pusat_data as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $data->nama_dokumen }}</strong></td>
                <td>
                    <a href="{{ $data->url_link }}" target="_blank" style="color: #00509E; text-decoration: none;">
                        {{ $data->url_link }}
                    </a>
                </td>
                <td>
                    <button class="btn-edit" onclick="openModal('modal-dokumen', 'Edit Dokumen', '{{ $data->id }}', '{{ e($data->nama_dokumen) }}', '{{ e($data->url_link) }}')">Edit</button>
                    
                    <form action="{{ route('pusat-data.destroy', $data->id) }}" method="POST" style="display:none;" id="delete-form-doc-{{ $data->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button type="button" class="btn-delete" onclick="confirmDelete('{{ $data->id }}', '{{ e($data->nama_dokumen) }}')">Hapus</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center; color: #888;">Belum ada data dokumen di database.</td>
            </tr>
            @endforelse
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
            <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal Pelaksanaan</th>
                <th>Deskripsi Kegiatan</th>
                <th>Status Foto</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($activities as $index => $act)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td><strong>{{ $act->nama_kegiatan }}</strong></td>
              <td>{{ \Carbon\Carbon::parse($act->tanggal_pelaksanaan)->translatedFormat('d F Y') }}</td>
              <td>
                <p style="max-width: 300px; font-size: 0.9em; color: #555; line-height: 1.4;">
                  {{ $act->deskripsi ?? '-' }}
                </p>
              </td>
              <td>
                @if($act->foto_kegiatan && $act->foto_kegiatan !== '')
                    <span style="color: green; font-weight: bold;">Terunggah ({{ $act->foto_kegiatan }})</span>
                @else
                    <span style="color: red; font-weight: bold;">Belum ada foto</span>
                @endif
              </td>
              <td>
                <button class="btn-edit" onclick="openModal('modal-activity', 'Edit Kegiatan', '{{ $act->id }}', '{{ e($act->nama_kegiatan) }}', '{{ $act->tanggal_pelaksanaan }}', '{{ e($act->deskripsi) }}')">Edit</button>
                
                <form action="{{ route('activity.destroy', $act->id) }}" method="POST" style="display:none;" id="delete-form-act-{{ $act->id }}">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" class="btn-delete" onclick="confirmDeleteActivity('{{ $act->id }}', '{{ e($act->nama_kegiatan) }}')">Hapus</button>
              </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; color: #888;">Belum ada data kegiatan di database.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </main>

  <div id="modal-dokumen" class="modal-overlay">
    <div class="modal-box">
        <div id="dokumen-title"><h2>Tambah Dokumen Baru</h2></div>
        
        <form action="{{ route('pusat-data.store') }}" method="POST" id="form-dokumen">
          @csrf
          <input type="hidden" name="_method" id="doc-method" value="POST">
          <input type="hidden" id="doc-id" name="id_dokumen">
    
          <div class="form-group">
            <label>Nama Dokumen / Link</label>
            <input type="text" id="doc-name" name="nama_dokumen" placeholder="Contoh: AD/ART IKM PNJ" required>
          </div>
          <div class="form-group">
            <label>Tautan Asli (URL Link)</label>
            <input type="url" id="doc-link" name="url_link" placeholder="Contoh: https://drive.google.com/..." required>
          </div>
            
          <div class="modal-buttons">
            <button type="button" class="btn-cancel" onclick="closeModal('modal-dokumen')">Batal</button>
            <button type="submit" class="btn-save">Simpan Data</button>
          </div>
        </form>
    </div>
  </div>

  <div id="modal-activity" class="modal-overlay">
    <div class="modal-box">
      <div id="activity-title"><h2>Tambah Kegiatan Baru</h2></div>
      
      <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data" id="form-activity">
        @csrf
        <input type="hidden" name="_method" id="act-method" value="POST">
        <input type="hidden" id="act-id" name="id_activity">

        <div class="form-group">
          <label>Nama Kegiatan / Proker</label>
          <input type="text" id="act-name" name="nama_kegiatan" placeholder="Contoh: PPOK 2026" required>
        </div>
        <div class="form-group">
          <label>Tanggal Pelaksanaan</label>
          <input type="date" id="act-date" name="tanggal_pelaksanaan" required>
        </div>
        <div class="form-group">
          <label>Deskripsi Kegiatan</label>
          <textarea id="act-desc" name="deskripsi" placeholder="Tuliskan deskripsi singkat kegiatan..."></textarea>
        </div>
        <div class="form-group">
          <label>Unggah Foto Kegiatan</label>
          <input type="file" name="foto_kegiatan" accept="image/*">
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
  // 1. Fungsi Mengalihkan Status Tampilan Tab Menu Aktif (Sidebar / Ringkasan)
  function switchTab(tabName) {
    document.querySelectorAll('.content-section').forEach(sec => sec.classList.remove('active'));
    document.querySelectorAll('.sidebar-menu li').forEach(li => li.classList.remove('active'));
    
    var targetSec = document.getElementById('sec-' + tabName);
    var targetNav = document.getElementById('nav-' + tabName);
    
    if (targetSec) targetSec.classList.add('active');
    if (targetNav) targetNav.classList.add('active');
  }

  // 2. Fungsi Eksekusi Pembukaan Jendela Modal Dialog Pop-up Form (Tambah & Edit)
  function openModal(modalId, titleText, idVal = '', nameVal = '', linkOrDateVal = '', descVal = '') {
    var modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.add('show');
    }
    
    // Konfigurasi Parameter Isian Modal Dokumen Pusat Data
    if (modalId === 'modal-dokumen') {
      if (document.getElementById('dokumen-title')) {
        document.getElementById('dokumen-title').innerHTML = `<h2>${titleText}</h2>`;
      }
      if (document.getElementById('doc-id')) document.getElementById('doc-id').value = idVal;
      if (document.getElementById('doc-name')) document.getElementById('doc-name').value = nameVal;
      if (document.getElementById('doc-link')) document.getElementById('doc-link').value = linkOrDateVal;
      
      var formDokumen = document.getElementById('form-dokumen');
      var docMethod = document.getElementById('doc-method');
      if (formDokumen) {
          if (idVal !== '') {
              formDokumen.action = "{{ url('admin/pusat-data') }}/" + idVal;
              docMethod.value = "PUT"; 
          } else {
              formDokumen.action = "{{ route('pusat-data.store') }}";
              docMethod.value = "POST";
          }
      }
    } 
    // Konfigurasi Parameter Isian Modal Data Kegiatan Internal (Activity)
    else if (modalId === 'modal-activity') {
      if (document.getElementById('activity-title')) {
        document.getElementById('activity-title').innerHTML = `<h2>${titleText}</h2>`;
      }
      if (document.getElementById('act-id')) document.getElementById('act-id').value = idVal;
      if (document.getElementById('act-name')) document.getElementById('act-name').value = nameVal;
      if (document.getElementById('act-date')) document.getElementById('act-date').value = linkOrDateVal;
      if (document.getElementById('act-desc')) document.getElementById('act-desc').value = descVal;
      
      var formActivity = document.getElementById('form-activity');
      var actMethod = document.getElementById('act-method');
      if (formActivity) {
          if (idVal !== '') {
              formActivity.action = "{{ url('admin/activity') }}/" + idVal;
              actMethod.value = "PUT";
          } else {
              formActivity.action = "{{ route('activity.store') }}";
              actMethod.value = "POST";
          }
      }
    }
  }

  // 3. Fungsi Menutup Tampilan Modal Pop-up Form
  function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.remove('show');
    }
  }

  // 4. Trigger Pengiriman Instruksi Formulir Hapus Data Dokumen
  function confirmDelete(id, name) {
    if (confirm(`Apakah Anda yakin ingin menghapus dokumen "${name}"?`)) {
        document.getElementById('delete-form-doc-' + id).submit();
    }
  }

  // 5. Trigger Pengiriman Instruksi Formulir Hapus Data Kegiatan (Activity)
  function confirmDeleteActivity(id, name) {
    if (confirm(`Apakah Anda yakin ingin menghapus kegiatan "${name}"?`)) {
        document.getElementById('delete-form-act-' + id).submit();
    }
  }
</script>

</body>
</html>