<div id="lista_usuarios" class="w3-margin container card">

  <h2>Cadastro de usuários</h2>


  <form id="formulario">
    <input type="hidden" value="<?php echo $dados['usuario_id']; ?>" id="usuario_id">

    <div class="form-group">
      <label>Nome</label>
      <input type="text" value="<?php echo $dados['nome_completo']; ?>" id="nome" class="w3-input w3-block w3-border" autofocus maxlength="50" required>
    </div>

    <div class="form-group">
      <label>Login</label>
      <input type="text" id="login" value="<?php echo $dados['login']; ?>" class="w3-input w3-block w3-border" maxlength="30" autocomplete="off" required>
    </div>

    <div class="form-group">
      <label>Senha</label>
      <input type="password" id="senha"  value="<?php echo $dados['senha']; ?>" class="w3-input w3-block w3-border" maxlength="30" autocomplete="off" required>
    </div>


    <div class="form-group">
      <label>Ativo</label>
      <input type="checkbox" id="ativo"  checked="<?php echo $dados['ativo'] == 1 ? true : false; ?>" >
    </div>

    <button class="w3-button w3-theme w3-margin-top w3-margin-bottom" type="submit" id="btnSalvar"><?php echo !empty($dados['usuario_id']) ? 'Alterar': 'Salvar'; ?></button>
    <a class="w3-button w3-margin-top w3-margin-bottom w3-right" href="/usuario-pesquisa">Cancelar</a>
  </form>

</div>

<script src="<?php echo URL_SERVER; ?>/static/js/usuario/cadastro.js"></script>