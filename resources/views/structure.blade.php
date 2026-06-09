<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Anggota MPM</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

<style>
body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
  background: #f5f5f5;
}

/* NAVBAR */
.navbar {
  background: #222;
  color: white;
  padding: 15px;
  text-align: center;
}

/* SECTION */
section {
  padding: 60px 10%;
  text-align: center;
}

/* GRID */
.team {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
}

/* CARD */
.card {
  background: white;
  border-radius: 15px;
  width: 250px;
  padding: 20px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  transition: 0.3s;
}

.card:hover {
  transform: translateY(-10px);
}

/* FOTO */
.card img {
  width: 100%;
  border-radius: 10px;
}

/* NAMA */
.card h3 {
  margin: 10px 0 5px;
}

/* JABATAN */
.card p {
  color: gray;
  margin-bottom: 10px;
}

/* SOSIAL */
.social a {
  margin: 0 5px;
  text-decoration: none;
  color: #ff6600;
}

/* BUTTON */
.btn {
  display: inline-block;
  margin-top: 10px;
  padding: 8px 15px;
  background: #ff6600;
  color: white;
  border-radius: 20px;
  text-decoration: none;
}
</style>

</head>

<body>
<header class="navbar" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 5%;">
    <div class="logo">
      <img src="{{ asset('assets/logo-mpm.png') }}" alt="Logo MPM" style="height: 40px;">
    </div>

    <nav class="nav-links" style="display: flex; gap: 20px;">
      <a href="{{ url('/') }}" style="color: white; text-decoration: none; font-weight: 600;">Home</a>

      <a href="{{ url('/structure') }}" style="color: white; text-decoration: none; font-weight: 600;">Anggota</a>

      <a href="{{ url('/profile') }}" style="color: white; text-decoration: none; font-weight: 600;">Profile</a>

      <a href="{{ url('/') }}" style="color: #ff6600; text-decoration: none; font-weight: 600; margin-left: 10px;">← Back</a>
    </nav>
</header>
<!-- NAVBAR -->
<div class="navbar">
  <h2>Parlemen Satyakara</h2>
</div>

<!-- SECTION -->
<section>
  <h1>Anggota Majelis Permusyawaratan Mahasiswa</h1>

  <div class="team">

    <!-- CARD 1 -->
    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/Ketua.jpg') }}">
      <h3>Ratu Jelita</h3>
      <p>Ketua Umum</p>
      <div class="social">
        <a href="https://www.instagram.com/rtjell?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a>
      </div>
    </div>

    <!-- CARD 2 -->
    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/Sekum.jpg') }}">
      <h3>Astuti</h3>
      <p>Sekretaris Umum</p>
      <div class="social">
        <a href="https://www.instagram.com/astutiiapr?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a>
      </div>
    </div>

    <!-- CARD 3 -->
    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/Kakom2.jpg') }}">
      <h3>Jeniffer Tirza Ampugo</h3>
      <p>Ketua Komisi 1 Bidang Pengawasan Kelembagaan</p>
      <div class="social">
        <a href="https://www.instagram.com/jnfr.trza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a>
      </div>
    </div>

    <!-- CARD 4 -->
    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/Kakom1.jpg') }}">
      <h3>Riviera Rafa Andara</h3>
      <p>Ketua Komisi 2 Bidang Legislasi</p>
      <div class="social">
        <a href="https://www.instagram.com/rrfndraa_27/?utm_source=ig_web_button_share_sheet">Instagram</a>
      </div>
    </div>

     <!-- CARD 4 -->
    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/Kakom3.jpg') }}">
      <h3>Alessandro Aly Ayubi</h3>
      <p>Ketua Komisi 3 Perwakilan Jurusan Akuntansi </p>
      <div class="social">
        <a href="#">Instagram</a>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/DistrikHMM.jpg') }}">
      <h3> Althaf Malik</h3>
      <p>MPM Perwakilan Jurusan Teknik Mesin </p>
      <div class="social">
        <a href="https://www.instagram.com/althafmlk?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/DistrikHMS.jpg') }}">
      <h3> Keisha Bunga Azizah </h3>
      <p>MPM Perwakilan Jurusan Teknik Sipil</p>
      <div class="social">
        <a href="https://www.instagram.com/keishaabunga/?utm_source=ig_web_button_share_sheet">Instagram</a>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/DistrikHME.jpg') }}">
      <h3>Novi Nur Ramadhani</h3>
      <p>MPM Perwakilan Jurusan Teknik Elektro</p>
      <div class="social">
        <a href="https://www.instagram.com/novinuraaa?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/DistrikHMAN.jpg') }}">
      <h3> Nabila Juliana </h3>
      <p>MPM Perwakilan Jurusan Administrasi Niaga</p>
      <div class="social">
        <a href="https://www.instagram.com/nabilaaaajuliana?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/DistrikHMGP.jpg') }}">
      <h3> Andhika Kartiko </h3>
      <p>MPM Perwakilan Jurusan Teknik Grafika dan Penerbitan</p>
      <div class="social">
        <a href="https://www.instagram.com/tikolevrone/?utm_source=ig_web_button_share_sheet">Instagram</a>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/DistrikHIMATIK.jpg') }}">
      <h3> Hari Bernardo</h3>
      <p>MPM Perwakilan Jurusan Teknik Informatika dan Komputer </p>
      <div class="social">
        <a href="">Instagram</a>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('assets/Folder Gambar/MPMBO.jpg') }}">
      <h3>Nabiilah Wulandari</h3>
      <p>MPM Badan Otonom (BO)</p>
      <div class="social">
        <a href="#">Instagram</a>
      </div>
    </div>
  </div>
</section>

</body>
</html>