<!DOCTYPE html>
<html>
<head>
    <title>Contact Laravel 8 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  
<div class="card container">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="index" method="POST"  enctype="multipart/form-data"> 
         @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>price</label></br>
        <input type="text" name="price" id="price" class="form-control"></br>
        <label>description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <input type="date" name="date" class="form-control"></br>
        <label class="form-label" for="inputImage">Image:</label>
        <input type="file" name="image" id="image"> 
        <label class="form-label" for="inputImage">multi Image:</label>
        <input type="file" name="multiimg[]" id="multiimg[]" multiple> 
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  </div>
</div>
   
</body>
</html>