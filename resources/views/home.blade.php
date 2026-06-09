<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MPM PNJ</title>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  
  <style>
.navbar {
  position: fixed;
  width: 100%;
  padding: 20px;
  transition: 0.3s;
}

.navbar.scrolled {
  background: rgba(0,0,0,0.8);
  padding: 10px;
}
</style>

<script>
window.addEventListener("scroll", function() {
  let navbar = document.querySelector(".navbar");
  navbar.classList.toggle("scrolled", window.scrollY > 50);
});
</script>
</head>
<body>

  <header class="navbar">
    <div class="logo">
      <img src="{{ asset('assets/logo-mpm.png') }}" alt="Logo MPM"> 
    </div>
    
    <nav class="nav-links">
    <a href="{{ url('/') }}#home">Home</a>
    <a href="{{ url('/') }}#about">About</a>
    <a href="{{ url('/') }}#activity">Our Activity</a>
    <a href="{{ url('/structure') }}">Anggota</a>
    <a href="{{ url('/pusat-data') }}">Pusat Data MPM</a>
    <a href="{{ url('/profile') }}">Profile</a>

    <a href="{{ url('/login') }}" class="btn-login">Login</a>
    </nav>
  </header>

  <main>
    <section class="hero">
      <div class="hero-overlay"></div>
      <div class="hero-text">
        <h1>MAJELIS PERMUSYAWARATAN MAHASISWA</h1>
        <h2>Politeknik Negeri Jakarta</h2>
      </div>
    </section>
  </main>

  <section id="about" class="about" data-aos="fade-up">
    <div class="container-about">
      <h2><b>ABOUT US</b></h2>
      
      <p class="lead-text">
        Majelis Permusyawaratan Mahasiswa (MPM) adalah lembaga tertinggi dalam struktur Ikatan Keluarga Mahasiswa Politeknik Negeri Jakarta (IKM PNJ). Secara fungsional, MPM berperan sebagai badan legislatif (pembuat aturan) yang juga memegang fungsi yudikatif (pengawasan dan pengadilan organisasi).
      </p>

      <div class="about-grid">
        <div class="about-item">
          <h3>Keanggotaan</h3>
          <ul>
            <li><strong>Jalur Independen:</strong> 13 orang pilihan mahasiswa.</li>
            <li><strong>Perwakilan Jurusan:</strong> 1 wakil dari setiap jurusan.</li>
            <li><strong>Perwakilan BO:</strong> 1 orang via musyawarah mufakat.</li>
          </ul>
        </div>

        <div class="about-item">
          <h3>Wewenang & Jabatan</h3>
          <p>Masa jabatan 1 tahun. Memiliki hak amandemen, anggaran, angket, hingga hak mencabut mandat Ketua Umum BEM/HMJ jika diperlukan.</p>
        </div>
      </div>

      <div class="regulasi-section">
        <h3>Sasaran Regulasi MPM</h3>
        <p>Menyusun GBHK dan produk hukum yang mengikat bagi:</p>
        <div class="regulasi-tags">
          <span>BEM</span>
          <span>HMJ</span>
          <span>Badan Otonom (BO)</span>
          <span>UKM & KSM</span>
          <span>Seluruh Mahasiswa IKM PNJ</span>
        </div>
      </div>
    </div>
    <section id="vision-mission" class="vision-mission">
  <div class="container-vm">
    <div class="vm-box vision-card">
      <div class="vm-badge">VISI</div>
      <h2>MPM PNJ 2026</h2>
      <p class="vision-text">
        "Mewujudkan MPM PNJ sebagai lembaga legislatif yang <strong>adaptif, tegas, dan akuntabel</strong> dalam membangun sinergi ormawa yang <strong>partisipatif</strong> serta taat pada landasan hukum IKM PNJ"
      </p>
    </div>
    
    <div class="vm-box mission-card">
      <div class="vm-badge">MISI</div>
      <h2>MPM PNJ 2026</h2>
      <div class="mission-list">
        <div class="mission-item">
          <span>1</span>
          <div>
            <strong>Transformasi Legislasi & Pengawasan</strong>
            <p>Menjalankan fungsi legislasi dan pengawasan secara efektif, transparan, dan terukur, serta memperkuat budaya evaluasi internal.</p>
          </div>
        </div>
        <div class="mission-item">
          <span>2</span>
          <div>
            <strong>Literasi & Edukasi Regulasi</strong>
            <p>Meningkatkan pemahaman IKM PNJ terhadap peraturan melalui informasi yang komunikatif, ringkas, dan mudah diakses.</p>
          </div>
        </div>
        <div class="mission-item">
          <span>3</span>
          <div>
            <strong>Komunikasi Aspiratif & Inklusif</strong>
            <p>Membangun sistem komunikasi dua arah yang terbuka untuk menyerap aspirasi secara aktif dan relevan.</p>
          </div>
        </div>
        <div class="mission-item">
          <span>4</span>
          <div>
            <strong>Kolaborasi & Sinergi Kolektif</strong>
            <p>Menciptakan ruang diskusi dengan seluruh unsur kampus demi tata kelola organisasi yang partisipatif.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </section>

<section id="activity" class="activity">
  <h2> <b>OUR ACTIVITY</b></h2>

  <div class="activity-wrapper">
    
    <div class="activity-card">
      <img src="{{ asset('assets/sertijab-mpm.jpg') }}" alt="sertijab-mpm"> 
      <div class="activity-text">
        <h3> Serah Terima Jabatan</h3>
        <p>13 Januari 2026</p>
      </div>
    </div>

    <div class="activity-card">
      <img src="{{ asset('assets/ppok-mpm.jpeg') }}" alt="ppok-mpm"> 
      <div class="activity-text">
        <h3>PPOK (Pelantikan Pengurus Organisasi Kemahasiswaan)</h3>
        <p> 18 Februari 2026 </p>
      </div>
    </div>

    <div class="activity-card">
      <img src="{{ asset('assets/cermin-mpm.jpeg') }}" alt="cermin-mpm">
      <div class="activity-text">
        <h3> Pencerdasan Administrasi </h3>
        <p> 31 Maret 2026 </p>
      </div>
    </div>

  </div>
</section>

<section id="structure" class="structure">
  <h2><b> STRUKTUR ORGANISASI </b></h2>

  <div class="structure-container">
    <img src="{{ asset('assets/struktur-mpm.png') }}" onclick="openImage(this.src)">
  </div>
</section>


<script src="script.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init();
</script>
</body>
<footer class="footer">
  <div class="footer-content">
    <p>&copy; 2026 MPM PNJ - Parlemen Satyakara</p>
    <div class="socials">
      <a href="https://www.instagram.com/mpm_pnj?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a>
      <a href="https://id.linkedin.com/company/mpm-pnj">LinkedIn</a>
      <a href="https://youtube.com/@mpmpnj?si=ZN-yMZNoP6FkZgye">YouTube</a>
    </div>
  </div>
</footer>
</html>