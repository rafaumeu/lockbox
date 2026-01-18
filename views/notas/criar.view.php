  <div class="bg-base-300 rounded-l-box w-56">
    <div class="bg-base-200 p-4">
      <i class="ph ph-plus"></i> Nova Nota
    </div>
  </div>
  <div class="bg-base-200 rounded-r-box w-full p-10">
    <form action="/notas/criar" method="POST" class="flex flex-col space-y-6">
      <label class="form-control">
        <div class="label">
          <span class="label-text">Título</span>
        </div>
        <input type="text" placeholder="type here..." class="input input-bordered w-full">
      </label>
      <label class="form-control">
        <div class="label">
          <span class="label-text">Sua nota</span>
        </div>
        <textarea class="textarea textarea-bordered h-24 w-full" placeholder="Escreva sua nota aqui..."></textarea>
      </label>
      <div class="flex justify-end items-center">
        <button class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>