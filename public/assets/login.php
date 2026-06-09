<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - MPM PNJ</title>
  <style>
    /* Styling Dasar */
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Kotak Form Login */
    .login-container {
      background-color: #ffffff;
      padding: 40px 40px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 350px;
      text-align: center;
    }

    /* Logo dan Judul */
    .login-logo {
      width: 80px;
      margin-bottom: 15px;
    }

    .login-container h2 {
      margin: 0 0 5px 0;
      color: #002244;
      font-size: 1.5em;
    }

    .login-container p {
      color: #666;
      font-size: 0.9em;
      margin-bottom: 25px;
    }

    /* Input Fields */
    .input-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .input-group label {
      display: block;
      font-size: 0.85em;
      color: #333;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .input-group input {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      font-size: 1em;
      transition: border-color 0.3s;
    }

    .input-group input:focus {
      outline: none;
      border-color: #00509E;
    }

    /* Tombol Login */
    .btn-submit {
      width: 100%;
      padding: 12px;
      background-color: #002244;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 1em;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 10px;
    }

    .btn-submit:hover {
      background-color: #00509E;
    }

    /* Link Kembali */
    .back-link {
      display: inline-block;
      margin-top: 20px;
      color: #666;
      text-decoration: none;
      font-size: 0.85em;
      transition: color 0.3s;
    }

    .back-link:hover {
      color: #002244;
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <img src="logo-mpm.png" alt="Logo MPM" class="login-logo">
    <h2> Login Admin</h2>
    <p>Silakan masuk untuk mengelola sistem MPM</p>

    <!-- Nanti form ini akan diarahkan ke file PHP untuk validasi -->
    <form action="dashboard.php" method="POST">
      
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
      </div>

      <button type="submit" class="btn-submit">Masuk</button>
      
    </form>

    <a href="index.html" class="back-link">← Kembali ke Halaman Utama</a>
  </div>

</body>
</html>