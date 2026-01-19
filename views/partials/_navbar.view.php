<div class="navbar bg-base-100">
  <div class="flex-1">
    <a href="/notas" class="btn btn-ghost text-xl">LockBox</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li>
        <?php if (session()->get('mostrar')): ?>
          <a href="/esconder">
            <i class="ph ph-eye"></i>
          </a>
        <?php else: ?>
          <a href="/confirmar">
            <i class="ph ph-eye-closed"></i>
          </a>
        <?php endif; ?>
      </li>
      <li>
        <details>
          <summary><?= auth()->nome ?></summary>
          <ul class="bg-base-100 rounded-t-none p-2">
            <li><a href="/logout" class="hover:text-red-500"><i class="ph ph-sign-out"></i>Sair</a></li>
          </ul>
        </details>
      </li>
    </ul>
  </div>
</div>