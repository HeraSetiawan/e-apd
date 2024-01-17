<div class="mb-3">
    @if ($foto)
    <h4 class="text-center">Preview Foto</h4>
    <img class="d-block mx-auto img-thumbnail" src="{{ $foto->temporaryUrl() }}" width="150">
    @elseif ($old_foto)
    <h4 class="text-center">Foto</h4>
    <img class="d-block mx-auto img-thumbnail" src="{{ asset($old_foto) }}" width="150"> 
    @else
    <img class="d-block mx-auto img-thumbnail" src="https://placehold.co/100?text=Preview+Gambar"> 
    @endif
  <label for="foto" class="form-label">Foto Admin</label>
  <input wire:model='foto' type="file" class="form-control" name="foto" id="foto" >
  @error('foto')
  <small id="fileHelpId" class="form-text text-danger">{{ $message }}</small>
  @enderror
</div>