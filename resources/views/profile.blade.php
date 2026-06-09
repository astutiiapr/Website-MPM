<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Anggota - MPM PNJ</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

  <header class="navbar">
    <div class="logo">
      <img src="{{ asset('assets/logo-mpm.png') }}" alt="Logo MPM"> 
    </div>
    <nav class="nav-links">
      <a href="{{ url('/') }}#home">Home</a>
      <a href="{{ url('/structure') }}">Anggota</a>>
    </nav>
  </header>

  <main class="profile-page-container">
    <section id="profile" class="activity">
    <h1><b>PROFILE</b></h1>
      <div class="profile-wrapper">

        <div class="profile-card">
          <img src="{{ asset('assets/ratu.jpg') }}" alt="Ratu Jelita">
          <div class="profile-text">
            <h3>Ratu Jelita</h3>
            <p class="nim">2403421020</p>
            <p class="prodi">Broadband Multimedia A - 24</p>
          </div>
        </div>

        <div class="profile-card">
          <img src="{{ asset('assets/astuti.jpg') }}" alt="Astuti">
          <div class="profile-text">
            <h3>Astuti</h3>
            <p class="nim">2403421046</p> <p class="prodi">Broadband Multimedia A - 24</p>
          </div>
        </div>

      </div>
      
      <div style="text-align: center; margin-top: 30px;">
        <a href="{{ url('/') }}#home" class="btn">Kembali ke Beranda</a>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="footer-content">
      <p>&copy; 2026 MPM PNJ - Parlemen Satyakara</p>
    </div>
  </footer>

</body>
</html>