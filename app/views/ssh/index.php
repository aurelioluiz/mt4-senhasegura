<main>
  <div class="container p-4">
    <h3>Integração SSH</h3>
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
      <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
    <?php endif; ?>
    <form action="<?php echo BASE . 'index.php/ssh' ?>" method="post">
      <div class="form-row form-group">
        <div class="col">
          <label for="dispositivo">Dispositivo</label>
          <select class="form-control" name="dispositivo" id="dispositivo">
            <option value="">Selecione</option>
            <?php foreach ($dispositivos as $d): ?>
              <option value="<?php echo $d['ip'] ?>" <?php echo $d['ip'] == $ip ? 'selected' : ''; ?>><?php echo $d['nome'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col">
          <label for="porta">Porta</label>
          <input type="text" class="form-control" id="porta" name="porta" value="<?php echo $porta ?>" placeholder="Porta (22)">
        </div>
        <div class="col">
          <label for="usuario">Usuário</label>
          <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario ?>" placeholder="Usuário">
        </div>
        <div class="col">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $senha ?>" placeholder="Senha">
        </div>
      </div>
    <?php if (!empty($auth)): ?>
      <div class="form-row form-group">
        <div class="col">
          <label for="comando">Comando</label>
          <input type="text" class="form-control" id="comando" name="comando" value="<?php echo $comando ?>" placeholder="Comando">
        </div>
      </div>
      <div class="form-row form-group">
        <div class="col">
          <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-terminal"></i> Executar comando</button>
        </div>
      </div>
      <?php if (!empty($resposta)): ?>
        <div class="alert alert-secondary" role="alert">
          <h4 class="alert-heading">Resultado</h4>
          <hr>
          <pre><?php echo $resposta; ?></pre>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <div class="form-row form-group">
        <div class="col">
          <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-plug"></i> Conectar</button>
        </div>
      </div>
    <?php endif; ?>
    </form>
  </div>
</main>
