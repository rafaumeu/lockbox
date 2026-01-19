<?php $validacoes = flash()->get('validacoes'); ?>
<div class="bg-base-300 rounded-box w-full flex flex-col items-center text-3xl font-bold pt-20">
  <form action="/mostrar" method="POST" class="max-w-md flex flex-col gap-4">
    <div class="text-center">Digite a sua senha novamente para começar a ver todas as suas notas descriptografadas</div>
    <label class="form-control " x-data="{show: false}">
      <div class="label">
        <span class="label-text">Senha</span>
      </div>
      <div class="relative w-full">
        <input :type="show ? 'text' : 'password'" type="password" name="senha" class="input input-bordered w-full bg-white border-gray-200 text-black">
        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
          <i class="ph ph-eye text-black text-xl" :class="show ? 'ph-eye-closed' : 'ph-eye'"></i>
        </button>
      </div>
      <div class="mt-1 text-xs text-error">
        <?php if (isset($validacoes['senha'])) : ?>
          <?= $validacoes['senha'][0] ?>
        <?php endif; ?>
      </div>
    </label>
    <input type="hidden" name="__method" value="POST">
    <button class="btn btn-primary mt-4">Abrir Minhas notas</button>
  </form>
</div>