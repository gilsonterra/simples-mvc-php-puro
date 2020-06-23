<style>
  #form-container-pesquisa {
    display: flex;
  }
  .acoes-container {
    display: flex;    
  }
  #total-usuario {
    font-weight: bold;    
  }
</style>

<div class="card container">
  <div id="lista_usuarios" class="w3-margin">
    <h2>Pesquisar Usuário</h2>
    <form id="form-container-pesquisa">
      <div class="width-100"><input class="w3-input w3-border w3-margin-top" id="filtro-nome" type="text" placeholder="Nome"></div>
      <div><button class="w3-button w3-theme w3-margin-left w3-margin-top" type="submit" id="btn-pesquisar">Buscar</button></div>
    </form>
    <a class="w3-button w3-theme w3-margin-top width-100" href="/usuario-cadastro">Cadastrar novo usuário</a>

    <table class="width-100">
      <thead>
        <tr>
          <th>Nome</td>
          <th>Login</td>
          <th>Ativo</td>
          <th class="td-action text-align">Opções</td>
        </tr>
      </thead>
      <tbody id="table-usuario-pesquisar">
        <?php foreach ($usuarios as $usuario) : ?>
          <tr>
            <td><?php echo $usuario['nome_completo']; ?></td>
            <td><?php echo $usuario['login']; ?></td>
            <td><?php echo $usuario['ativo'] == 'S' ? 'Sim' : 'Não'; ?></td>
            <td>
              <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-user-times"></i></button>
              <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4" class="text-right">
            Total de registros: <span id="total-usuario">0</span>
          </td>
        </tr>
      </tfoot>
    </table>
    
  </div>
</div>

<script src="<?php echo URL_SERVER; ?>/static/js/usuario/pesquisa.js"></script>