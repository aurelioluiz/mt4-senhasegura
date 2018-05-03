<main>
  <div class="container p-4">
    <h3 class="float-left">Dispositivos</h3>
    <a href="<?php echo BASE . 'index.php/dispositivos/cadastrar' ?>" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Novo</a>
    <div class="clearfix"></div>
    <?php if (!empty($success)): ?>
      <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
    <?php endif; ?>
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">IP</th>
          <th scope="col">Tipo</th>
          <th scope="col">Fabricante</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php if (!empty($dispositivos)): ?>
        <?php foreach ($dispositivos as $d): ?>
          <tr>
            <th scope="row"><?php echo $d['id'] ?></th>
            <td><?php echo $d['nome'] ?></td>
            <td><?php echo $d['ip'] ?></td>
            <td><?php echo $d['tipo'] ?></td>
            <td><?php echo $d['fabricante'] ?></td>
            <td class="text-nowrap text-right" width="1">
              <a href="<?php echo BASE . 'index.php/dispositivos/editar/' . $d['id'] ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
              <a href="<?php echo BASE . 'index.php/dispositivos/excluir/' . $d['id'] ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Excluir"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center">Nenhum registro encontrado.</td>
        </tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>
