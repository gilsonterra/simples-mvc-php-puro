<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>santri</title>

  <link rel="stylesheet" href="<?php echo URL_SERVER; ?>/static/css/w3.css">
  <link rel="stylesheet" href="<?php echo URL_SERVER; ?>/static/css/santri.css">
  <link rel="stylesheet" href="<?php echo URL_SERVER; ?>/static/css/toastr.css">

  <link rel="stylesheet" href="<?php echo URL_SERVER; ?>/static/css-awesome/brands.css">
  <link rel="stylesheet" href="<?php echo URL_SERVER; ?>/static/css-awesome/fontawesome.css">
  <link rel="stylesheet" href="<?php echo URL_SERVER; ?>/static/css-awesome/regular.css">
  <link rel="stylesheet" href="<?php echo URL_SERVER; ?>/static/css-awesome/solid.css">
  <link rel="stylesheet" href="<?php echo URL_SERVER; ?>/static/css-awesome/svg-with-js.css">
  <link rel="stylesheet" href="<?php echo URL_SERVER; ?>/static/css-awesome/v4-shims.css">
</head>

<body>
  <script src="<?php echo URL_SERVER; ?>/static/js/jquery.js"></script>
  <script src="<?php echo URL_SERVER; ?>/static/js/toastr.min.js"></script>
  <script>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-center",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
  </script>

  <div class="container">
    <?php if (!empty($_SESSION['logado'])) : ?>
      <header class="header">
        <div class="float-left">
          Usuário: <b><?php echo $_SESSION['logado']['nome_completo']; ?></b>
        </div>
        <div class="float-right">
          <a class="w3-button" href="/logout">Sair</a>
        </div>
      </header>
    <?php endif; ?>
    <br>
    <section>
      <?php include $content; ?>
    </section>
  </div>
</body>

</html>