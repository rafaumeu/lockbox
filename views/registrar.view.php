<?php $validacoes = flash()->get('validacoes'); ?>
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
    <div class="hero-content">
      <form method="post" action="/registrar">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Crie a sua conta</div>
            <label class="form-control w-full">
              <div class="label">
                <span class="label-text text-black">Nome</span>
              </div>
              <input type="text" value="<?= old('nome') ?>" name="nome" class="input input-bordered w-full max-w-xs bg-white border-gray-200">
              <?php if (isset($validacoes['nome'])) : ?>
                <div class="mt-1 text-xs text-error">
                  <?= $validacoes['nome'][0] ?>
                </div>
              <?php endif; ?>
            </label>
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
            <label class="form-control w-full">
              <div class="label">
                <span class="label-text text-black">Confirme o seu email</span>
              </div>
              <input type="text" value="<?= old('email_confirmacao') ?>" name="email_confirmacao" class="input input-bordered w-full max-w-xs bg-white border-gray-200"
                x-model="senha">
              <?php if (isset($validacoes['email'])) : ?>
                <div class="mt-1 text-xs text-error">
                  <?= $validacoes['email'][0] ?>
                </div>
              <?php endif; ?>
            </label>
            <label class="form-control w-full"
              x-data="{
                show: false,
                senha: '',
                get forca() {
                    let score = 0;
                    if(this.senha.length > 7) score += 30; // Ganha pontos por tamanho
                    if(/[A-Z]/.test(this.senha)) score += 20; // Maiúscula
                    if(/\d/.test(this.senha)) score += 20;    // Número
                    if(/[^a-zA-Z0-9]/.test(this.senha)) score += 30; // Especial
                    return Math.min(100, score);
                },
                get cor() {
                    if(this.forca <= 40) return 'bg-error'; // Usando cores do DaisyUI (red)
                    if(this.forca <= 80) return 'bg-warning'; // amarelo
                    return 'bg-success'; // verde
                },
                get texto() {
                    if(this.forca <= 40) return 'Fraca';
                    if(this.forca <= 80) return 'Média';
                    return 'Forte';
                }
              }">
              <div class="label">
                <span class="label-text text-black">Senha</span>
              </div>
              <div class="relative max-w-xs">
                <input :type="show ? 'text' : 'password'" type="password" name="senha" class="input input-bordered w-full max-w-xs bg-white border-gray-200"
                  x-model="senha">
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                  <i class="ph ph-eye text-black text-xl" :class="show ? 'ph-eye-closed' : 'ph-eye'"></i>
                </button>
              </div>
              <div class="max-w-xs flex items-center justify-between mt-2" x-show="senha" x-transition>
                <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden mr-2">
                  <div class="h-2 w-full transition-all duration-300" :class="cor" :style="'width: ' + forca + '%'"></div>
                </div>
                <span class="text-xs font-bold" x-text="texto"></span>
              </div>
              <?php if (isset($validacoes['senha'])) : ?>
                <div class="mt-1 text-xs text-error">
                  <?= $validacoes['senha'][0] ?>
                </div>
              <?php endif; ?>
            </label>
            <div class="card-actions justify-end">
              <button class="btn btn-primary btn-block">Registrar</button>
              <a href="/login" class="btn btn-link">Já tenho uma conta</a>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>