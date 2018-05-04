<main>
  <div class="container p-4">
    <h3>Hashes</h3>
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
      <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
    <?php endif; ?>
    <form action="<?php echo BASE . 'index.php/hash' ?>" method="post">
      <div class="form-row form-group">
        <div class="col">
          <input type="text" class="form-control" id="texto" name="texto" placeholder="Texto" value="<?php echo $texto; ?>">
        </div>
        <div class="col-2">
          <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-lock"></i> Criptografar</button>
        </div>
      </div>
      <?php if (!empty($hash)): ?>
        <div class="alert alert-secondary" role="alert">
          <h4 class="alert-heading">Texto criptografado</h4>
          <hr>
          <pre class="m-0">SHA512: <?php echo $hash; ?> <br/>HMAC: <?php echo $hmac; ?></pre>
        </div>
      <?php endif; ?>
    </form>
  </div>
</main>
