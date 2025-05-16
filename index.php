<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Landing Page Example</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      max-width: 1400px;
      margin: 60px auto;
      padding: 0 20px;
    }

    .text-section {
      max-width: 600px;
    }

    .text-section h1 {
      font-size: 2.8rem;
      font-weight: 900;
      margin-bottom: 20px;
      line-height: 1.2;
    }

    .text-section p {
      font-size: 1.1rem;
      color: #555;
      margin-bottom: 30px;
    }

    .btn-signup {
      background-color:rgb(59, 45, 255);
      color: white;
      padding: 14px 30px;
      border: none;
      border-radius: 30px;
      font-weight: bold;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .image-section img {
      max-width: 450px;
      height: auto;
      user-select: none;
    }

  </style>
</head>
<body>

<nav class="navbar">
    <div class="brand">WELCOME</div>
    <ul>
      <a href="from/login.php"">Login</a>
    </ul>
</nav>

  <div class="container">
    <div class="text-section">
      <h1>Selamat datang diRumah bunga dan inspirasi!</h1>
      <p>Temukan rangkaian bunga segar dan desain yang menginspirasi untuk setiap momen spesialmu.</p>
      <a href="from/register.php" class="btn-signup">Sign up</a>
    </div>
    <div class="image-section">
      <img src="w3images/Desain Tanpa Judul.png" alt="Illustration" />
    </div>
  </div>

</body>
</html>
