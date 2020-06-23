<div id="login-container">
  <div class="card">
    <img id="logo-cliente" class="w3-margin-top" src="static/imagens/logo_cliente.jpg" />
    <form id="form-login">
      <input class="w3-input w3-border w3-margin-top" id="login" type="text" required placeholder="Usuário">
      <input class="w3-input w3-border w3-margin-top" id="senha" type="password" required placeholder="Senha">
      <button class="w3-button w3-theme w3-margin-top w3-block" type="submit">Logar</button>
    </form>
    <a href="http://www.santri.com.br">
      <img id="logo-santri" class="w3-right w3-margin-top" src="static/imagens/logo_santri.svg" />
    </a>
  </div>
</div>

<script src="<?php echo URL_SERVER; ?>/static/js/login.js"></script>

<style>
  #login-container {
    display: flex;
    justify-content: center;
    height: 100vh;
    width: 100wh;
  }

  #login-container div {
    margin-top: 5%;
    width: 350px;
    height: 480px;
  }

  #logo-cliente {
    max-width: 100%;
    margin: auto;
    width: 700px;
  }

  #logo-santri {
    max-width: 50%;
    margin: auto;
    width: 380px;
  }
</style>