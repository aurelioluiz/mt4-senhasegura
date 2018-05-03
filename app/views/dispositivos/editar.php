<main>
  <div class="container p-4">
    <h3 class="float-left">Editar dispositivo</h3>
    <a href="<?php echo BASE . 'index.php/dispositivos' ?>" class="btn btn-danger btn-sm float-right"><i class="fa fa-angle-double-left"></i> Voltar</a>
    <div class="clearfix"></div>
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="<?php echo BASE . 'index.php/dispositivos/editar/' . $row['id'] ?>" method="post">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $row['nome'] ?>">
      </div>
      <div class="form-group">
        <label for="ip">IP</label>
        <input type="text" class="form-control" id="ip" name="ip" placeholder="IP" value="<?php echo $row['ip'] ?>">
      </div>
      <div class="form-group">
        <label for="tipo">Tipo</label>
        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" value="<?php echo $row['tipo'] ?>">
      </div>
      <div class="form-group">
        <label for="fabricante">Fabricante</label>
        <input type="text" class="form-control" id="fabricante" name="fabricante" placeholder="Fabricante" value="<?php echo $row['fabricante'] ?>">
      </div>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
    </form>
  </div>
</main>
