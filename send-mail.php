<?php
// send-mail.php

// Podesi na koji email da stižu poruke:
$to = "info@modusrem.com"; // <-- OVDE STAVI MAIL KOJI ŽELIŠ

// Ako je forma poslata:
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Pokupi podatke iz forme
    $name    = isset($_POST["name"])    ? trim($_POST["name"])    : "";
    $email   = isset($_POST["email"])   ? trim($_POST["email"])   : "";
    $message = isset($_POST["message"]) ? trim($_POST["message"]) : "";

    // Osnovna validacija
    if ($name === "" || $email === "" || $message === "") {
        $error = "Sva polja su obavezna.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email adresa nije ispravna.";
    } else {
        // Subject i telo poruke
        $subject = "Nova poruka sa MODUS REM sajta";
        $body  = "Ime / Firma: " . $name . "\n";
        $body .= "Email: " . $email . "\n\n";
        $body .= "Poruka:\n" . $message . "\n";

        // Headers
        $headers   = "From: MODUS REM kontakt <" . $to . ">\r\n";
        $headers  .= "Reply-To: " . $email . "\r\n";
        $headers  .= "X-Mailer: PHP/" . phpversion();

        // Pošalji mail
        $mailSent = mail($to, $subject, $body, $headers);

        if ($mailSent) {
            $success = true;
        } else {
            $error = "Došlo je do greške pri slanju poruke. Pokušajte ponovo.";
        }
    }
} else {
    $error = "Forma nije poslata ispravno.";
}
?>
<!DOCTYPE html>
<html lang="sr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kontakt · MODUSREM</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<header class="site-header">
  <div class="container header-inner">
    <a href="index.html" class="logo logo-combo">
      <img src="assets/img/logo-modusrem.webp" alt="Modus Rem Logo" />
      <div class="logo-text">
        <span class="logo-main">MODUSREM</span>
        <span class="logo-sub"></span>
      </div>
    </a>
  </div>
</header>

<main class="section">
  <div class="container">
    <?php if (!empty($success)): ?>
      <h1 class="section-title">Poruka je poslata ✅</h1>
      <p class="section-subtitle">
        Hvala, <strong><?php echo htmlspecialchars($name); ?></strong>.  
        Uskoro ćemo vam se javiti.
      </p>
    <?php else: ?>
      <h1 class="section-title">Greška ❌</h1>
      <p class="section-subtitle">
        <?php echo htmlspecialchars($error); ?>
      </p>
    <?php endif; ?>

    <a href="contact.html" class="btn primary">Nazad na kontakt</a>
  </div>
</main>

<footer class="site-footer">
  <div class="container footer-inner">
    <span>&copy; <span id="year"></span> MODUS REM · CODEX</span>
    <span class="footer-note">Telefon: +381603200443 · Dizajn &amp; implementacija: Dejan</span>
  </div>
</footer>

<script src="js/main.js"></script>
</body>
</html>
