 <div class="flex space-x-4 ">
   <form action="/notas" class="w-full">
     <label class="input input-bordered flex items-center gap-2 w-full">
       <input value="<?= request()->get('pesquisar', '') ?>" type="text" name="pesquisar" placeholder="Pesquisar notas no LockBox...">
       <i class="ph ph-magnifying-glass h-4 w-4 opacity-70"></i>
     </label>
   </form>
   <a href="/notas/criar" class="btn btn-primary"><i class="ph ph-plus"></i> Item</a>
 </div>