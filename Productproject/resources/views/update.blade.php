
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @extends('layouts.app')

    @section('content')

  <div class="card-body">
<div class="container mt-5">
      <div class="card-header bg-primary" >
        <h2 class="text-center text-white">Add product</h2>
  </div>

  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
      <label for="email">Product Name:</label>
      <input type="text" class="form-control" id="pname" placeholder="Enter product" name="pname" value="{{$updatedata->pname}}">
    </div>
    <div class="form-group">
        <label for="state">Category</label>
         <select class="form-control" id="state-dropdown" name="category" >
            <option value="" >{{$updatedata->category}}</option> 
            @foreach ($categories as $item)
                <option value="{{$item->name}}">{{$item->name}}</option>
            @endforeach
        
        </select>
    </div>                        
    <div class="form-group">
        <label for="city">Subcategory</label>
        <select class="form-control" id="city-dropdown" name="subcategory">
            <option value="">{{$updatedata->subcategory}}</option>

            @foreach ($subcategories as $item)
                <option value="{{$item->name}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
        <div class="mb-3 mt-3">
            <label for="email">Price:</label>
            <input type="text" class="form-control" id="price" placeholder="Enter product" name="price" value="{{$updatedata->price}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email">Image:</label>
            <input type="file" class="form-control" id="pic" placeholder="Enter product" name="pic">            <img src="{{ asset('uploads/students/'.$updatedata->pic) }}" width="70px" height="70px" alt="Image">

        </div>
        <div class="mb-3 mt-3">
            <label for="email">Description:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter some decription" name="desc" value="{{$updatedata->desc}}">
        </div>
        <label for="">Status:</label>
        <div class="form-check">
            <input type="radio" class="form-check-input"  name="status" value="Active" checked>
            <label class="form-check-label" for="Active">Active</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input"  name="status" value="Not Active">
            <label class="form-check-label">Not Active</label>
        </div>
        <div class="mb-3">
          <label for="pwd">Quantity:</label>
          <input type="number" class="form-control" id="pwd" placeholder="Enter quantity" name="quantity" value="{{$updatedata->quantity}}">
        </div>
   
          <button type="submit" class="btn btn-primary">Update Product</button>
    <div>
  </form>
</div>
</div>

 </div>

@endsection
</body>
</html>
