<main>
  <div class="container p-4">
    <h3>Criptografia</h3>
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
      <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php if ($openssl): ?>
    <form action="<?php echo BASE . 'index.php/criptografia' ?>" method="post">
      <div class="form-row form-group">
        <div class="col">
          <input type="text" class="form-control" id="texto_d" name="texto_d" placeholder="Texto" value="<?php echo $texto_d; ?>">
        </div>
        <div class="col-2">
          <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-lock"></i> Criptografar</button>
        </div>
      </div>
      <?php if (!empty($cripto_c)): ?>
        <div class="alert alert-secondary" role="alert">
          <h4 class="alert-heading">Texto criptografado</h4>
          <hr>
          <pre class="m-0">Cifra de César: <?php echo $cripto_c; ?><br />AES256 + BASE64: <?php echo $cripto_a; ?></pre>
        </div>
      <?php endif; ?>
      <div class="form-row form-group">
        <div class="col">
          <input type="text" class="form-control" id="texto_c" name="texto_c" placeholder="Texto" value="<?php echo $texto_c; ?>">
        </div>
        <div class="col-2">
          <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-unlock"></i> Descriptografar</button>
        </div>
      </div>
      <?php if (!empty($decripto_c)): ?>
        <div class="alert alert-secondary" role="alert">
          <h4 class="alert-heading">Texto descriptografado</h4>
          <hr>
          <pre class="m-0">Cifra de César: <?php echo htmlspecialchars($decripto_c); ?> <br />AES256 + BASE64: <?php echo $decripto_a; ?></pre>
        </div>
      <?php endif; ?>
    </form>
    <?php endif; ?>
  </div>
</main>
