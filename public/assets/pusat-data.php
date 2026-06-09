<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pusat Data - MPM PNJ</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  
  <style>
    /* Navbar Styling menyesuaikan tema utama */
    .navbar {
      position: fixed;
      width: 100%;
      padding: 20px;
      transition: 0.3s;
      background: #002244; /* Warna biru gelap / Dongker */
      z-index: 999;
      top: 0;
      box-sizing: border-box;
    }

    /* Bagian Konten Pusat Data */
    .pusat-data-section {
      padding: 140px 20px 80px; /* Padding atas diperbesar agar tidak tertabrak navbar */
      max-width: 1100px;
      margin: 0 auto;
      text-align: center;
      font-family: sans-serif;
    }

    .pusat-data-section h2 {
      color: #003366; /* Tema biru */
      font-size: 2.5em;
      margin-bottom: 10px;
    }

    .pusat-data-section p {
      color: #666;
      margin-bottom: 50px;
      font-size: 1.1em;
    }

    /* Grid Layout (Membuat kotak-kotak menyamping) */
    .data-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 25px;
    }

    /* Styling Kotak/Card */
    .data-card {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #ffffff;
      padding: 30px 20px;
      border-radius: 12px;
      text-decoration: none;
      color: #003366;
      font-weight: bold;
      font-size: 1.15em;
      border-left: 8px solid #00509E; /* Garis aksen biru di sebelah kiri */
      box-shadow: 0 4px 15px rgba(0,0,0,0.06);
      transition: all 0.3s ease;
    }

    /* Efek saat kursor diarahkan ke kotak (Hover) */
    .data-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 80, 158, 0.2);
      background: #00509E; /* Latar berubah jadi biru */
      color: #ffffff; /* Teks berubah jadi putih */
      border-left-color: #002244;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="logo">
      <img src="logo-mpm.png" alt="Logo MPM" style="height: 40px;"> 
    </div>
    
    <nav class="nav-links">
      <a href="index.php">Home</a>
      <a href="index.php #about">About</a>
      <a href="index.php #activity">Our Activity</a>
      <a href="structure.html">Anggota</a>
      <a href="pusat-data.html" style="font-weight: bold; color: #66b3ff;">Pusat Data</a>
      <a href="Profile.php">Profile</a>
    </nav>
  </header>

  <!-- KONTEN UTAMA -->
  <main>
    <section class="pusat-data-section" data-aos="fade-up">
      <h2><b>PUSAT DATA MPM PNJ</b></h2>
      <p>Kumpulan arsip dokumen, peraturan, dan layanan administrasi Majelis Permusyawaratan Mahasiswa.</p>

      <div class="data-grid">
        
        <!-- 1. Link Google Drive AD/ART -->
        <a href="https://drive.google.com/drive/folders/1mIfsh0QKFnoOkMzX6xK7BF6kFKcFJBxc?usp=sharing" target="_blank" class="data-card">
          AD/ART IKM PNJ
        </a>

        <!-- 2. Link Peraturan PNJ -->
        <a href="https://drive.google.com/drive/folders/1k8Yfog-L-V-ryagkhwqj-2ElGCIzweEt?usp=sharing" target="_blank" class="data-card">
          Peraturan PNJ
        </a>

        <!-- 3. Link Perpustakaan TAP -->
        <a href="https://drive.google.com/drive/folders/1xdPAjzZEjpYYBpi8NWZpXozLZNGIHhLZ?usp=sharing" target="_blank" class="data-card">
          Perpustakaan TAP MPM
        </a>

        <!-- 4. Link Form Perizinan -->
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSfRAvucPKsvyusk0ljPsrsvXBdl7uadBBEf0oXkt8ndSjvFDg/viewform" target="_blank" class="data-card">
          Perizinan Publikasi Ormawa 2026
        </a>

        <!-- 5. Link Form Pengaduan -->
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdtj6rG_Mzua2GcJUnnMG8w8lcT-CpAsoJVh7ufV6ekwvmyYg/viewform" target="_blank" class="data-card">
          Form Laporan Pengaduan IKM PNJ
        </a>

        <!-- 6. Link YouTube MPM PNJ -->
        <a href="https://www.youtube.com/@mpmpnj" target="_blank" class="data-card">
          YouTube MPM
        </a>

      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-content">
      <p>&copy; 2026 MPM PNJ - Parlemen Satyakara</p>
      <div class="socials">
        <a href="https://www.instagram.com/mpm_pnj?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">Instagram</a>
        <a href="https://id.linkedin.com/company/mpm-pnj" target="_blank">LinkedIn</a>
        <a href="https://youtube.com/@mpmpnj?si=ZN-yMZNoP6FkZgye" target="_blank">YouTube</a>
      </div>
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>