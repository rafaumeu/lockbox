<div class="bg-base-300 rounded-l-box w-56 flex flex-col divide-y divide-base-100">
  <?php foreach ($notas as $key => $nota): ?>
    <a href="/notas?id=<?= $nota->id ?><?= request()->get('pesquisar', '', '&pesquisar=') ?>" class="w-full p-2 cursor-pointer hover:bg-base-200 
    <?php if ($key === 0): ?>rounded-tl-box<?php endif; ?>
      <?php if ($nota->id === $notaSelecionada->id): ?>bg-base-200<?php endif; ?>
      ">
      <?= $nota->titulo ?>
    </a>
  <?php endforeach; ?>
</div>
<div class="bg-base-200 rounded-r-box w-full p-10 flex flex-col space-y-6">
  <label class="form-control">
    <div class="label">
      <span class="label-text">Título</span>
    </div>
    <input name="titulo" value="<?= $notaSelecionada->titulo ?>" type="text" placeholder="type here..." class="input input-bordered w-full">
  </label>
  <label class="form-control">
    <div class="label">
      <span class="label-text">Sua nota</span>
    </div>
    <textarea name="nota" class="textarea textarea-bordered h-24 w-full" placeholder="Escreva sua nota aqui..."><?= $notaSelecionada->nota ?></textarea>
  </label>
  <div class="flex justify-between items-center">
    <button class="btn btn-error">Deletar</button>
    <button class="btn btn-primary">Atualizar</button>
  </div>
</div>