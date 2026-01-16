<div class="grid grid-cols-2">
  <div class="hero min-h-screen flex ml-40">
    <div class="hero-content -mt-20">
      <div>
        <p class="py-2 text-xl">Bem vindo ao</p>
        <h1 class="text-6xl font-bold">LockBox</h1>
        <p class="pt-2 pb-4 text-xl">onde você guarda <span class="italic">tudo</span> com segurança.</p>

      </div>
    </div>
  </div>
  <div class="bg-white hero mr-40 min-h-screen text-black">
    <div class="hero-content -mt-20">
      <form method="post" action="/login">
        <?php
        $validacoes = flash()->get('validacoes');
        ?>
        <div class="card">
          <div class="card-body">
            <div class="card-title">Faça o seu login</div>
            <?php if ($mensagem = flash()->get('mensagem')): ?>
              <div role="alert" class="alert">
                <?= $mensagem ?>
              </div>
            <?php endif; ?>
            <label class="form-control w-full">
              <div class="label">
                <span class="label-text text-black">Email</span>
              </div>
              <input type="text" value="<?= old('email') ?>" name="email" class="input input-bordered w-full max-w-xs bg-white border-gray-200">

              <?php if (isset($validacoes['email'])) : ?>
                <div class="mt-1 text-xs text-error">
                  <?= $validacoes['email'][0] ?>
                </div>
              <?php endif; ?>
            </label>
            <label class="form-control w-full" x-data="{show: false}">
              <div class="label">
                <span class="label-text text-black">Senha</span>
              </div>
              <div class="relative max-w-xs">
                <input :type="show ? 'text' : 'password'" type="password" name="senha" class="input input-bordered w-full max-w-xs bg-white border-gray-200">
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
            <div class="card-actions justify-end">
              <button class="btn btn-primary btn-block">Login</button>
              <a href="/registrar" class="btn btn-link">Quero me registrar</a>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>