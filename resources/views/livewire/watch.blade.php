<div>
<div class="card container">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form   wire:submit.prevent="forms"   enctype="multipart/form-data"> 
         @csrf
        <label>Name</label></br>
        <input type="text" wire:model="name" class="form-control"></br>
        <label>price</label></br>
        <input type="text" wire:model="price" class="form-control"></br>
        <label>description</label></br>
        <input type="text" wire:model="description" id="description" class="form-control"></br>
        <input type="date" wire:model="date" class="form-control"></br>
        <label class="form-label" for="inputImage">Image:</label>
        <input type="file" wire:model="image" name="image"> 
        @if($image)
        <img src="{{$image->temporaryUrl()}}">
        @endif
        <label class="form-label" for="inputImage">multi Image:</label>
        <input type="file" wire:model="multiimg" multiple> 
        <input type="submit"  class="btn btn-success"></br>
    </form>
  </div>
  
</div>
</div>
