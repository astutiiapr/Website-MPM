<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pusat Data - MPM PNJ</title>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  
  <style>
    .navbar {
      position: fixed;
      width: 100%;
      padding: 20px;
      transition: 0.3s;
      background: #002244;
      z-index: 999;
      top: 0;
      box-sizing: border-box;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar .logo img {
      height: 40px;
    }

    .navbar .nav-links a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: bold;
    }

    .navbar .nav-links a:hover {
      color: #66b3ff;
    }

    .pusat-data-section {
      padding: 140px 20px 80px;
      max-width: 1100px;
      margin: 0 auto;
      text-align: center;
      font-family: sans-serif;
      min-height: 70vh;
    }

    .pusat-data-section h2 {
      color: #003366;
      font-size: 2.5em;
      margin-bottom: 10px;
    }

    .pusat-data-section p {
      color: #666;
      margin-bottom: 50px;
      font-size: 1.1em;
    }

    .data-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 25px;
    }

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
      border-left: 8px solid #00509E;
      box-shadow: 0 4px 15px rgba(0,0,0,0.06);
      transition: all 0.3s ease;
    }

    .data-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 80, 158, 0.2);
      background: #00509E;
      color: #ffffff;
      border-left-color: #002244;
    }

    .footer {
      background-color: #001122;
      color: white;
      padding: 30px 20px;
      text-align: center;
      font-family: sans-serif;
      margin-top: auto;
    }

    .footer-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1100px;
      margin: 0 auto;
      flex-wrap: wrap;
      gap: 15px;
    }

    .footer .socials a {
      color: #66b3ff;
      text-decoration: none;
      margin-left: 15px;
    }

    .footer .socials a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="logo">
      <img src="{{ asset('logo-mpm.png') }}" alt="Logo MPM" onerror="this.onerror=null; this.src='https://placehold.co/60x60?text=MPM';">
    </div>
    
    <nav class="nav-links">
      <a href="{{ url('/') }}#home">Home</a>
      <a href="{{ url('/') }}#about">About</a>
      <a href="{{ url('/') }}#activity">Our Activity</a>
      <a href="{{ url('/structure') }}">Anggota</a>
      <a href="{{ url('/pusat-data') }}">Pusat Data MPM</a>
      <a href="{{ url('/profile') }}">Profile</a>
    </nav>
  </header>

  <!-- KONTEN UTAMA -->
  <main>
    <section class="pusat-data-section" data-aos="fade-up">
      <h2><b>PUSAT DATA MPM PNJ</b></h2>
      <p>Kumpulan arsip dokumen, peraturan, dan layanan administrasi Majelis Permusyawaratan Mahasiswa.</p>

      <div class="data-grid">
        @forelse($pusat_data as $data)
          <a href="{{ $data->url_link }}" target="_blank" class="data-card">
            {{ $data->nama_dokumen }}
          </a>
        @empty
          <p style="grid-column: 1 / -1; color: #888; font-style: italic; padding: 20px;">
            Belum ada arsip dokumen yang diunggah oleh pihak admin.
          </p>
        @endforelse
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
