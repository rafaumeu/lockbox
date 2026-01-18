<div class="navbar bg-base-100">
  <div class="flex-1">
    <a href="/notas" class="btn btn-ghost text-xl">LockBox</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li>
        <a href="/mostrar">
          <i class="ph ph-eye"></i>
        </a>
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