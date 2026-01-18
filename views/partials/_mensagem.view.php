<?php if ($mensagem = flash()->get('mensagem')): ?>
  <div role="alert" class="alert">
    <?= $mensagem ?>
  </div>
<?php endif; ?>