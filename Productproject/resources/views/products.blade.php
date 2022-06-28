
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
<br>
<div class="card-body">
      <div class="container mt-5">
        <div class="card-header bg-primary" >
        <h2 class="text-center text-white">Add product</h2>
      </div>

  <form action="" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="mb-3 mt-3">
                <label for="email">Product Name:</label>
                <input type="text" class="form-control" id="pname" placeholder="Enter product" name="pname">
                @if ($errors->has('pname'))
                <span class="text-danger">{{ $errors->first('pname') }}</span>
                @endif    
          </div>
          <div class="form-group">
                <label for="state">Category</label>
                <select class="form-control" id="category" name="category" onclick="demofun()">
                <option value="">Select Category</option> 
                @foreach ($categories as $item)
                <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
                </select>
                @if ($errors->has('category'))
                <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif  
          </div>                        
          <div class="form-group">
                <label for="city">Subcategory</label>
                <select class="form-control" id="subcategory" name="subcategory" aria-placeholder="enter " >
                <option value="">Select Subcategory</option>
                @foreach ($subcategories as $item)
                <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
                </select>
                @if ($errors->has('subcategory'))
                <span class="text-danger">{{ $errors->first('subcategory') }}</span>
                @endif 
          </div>

          <div class="mb-3 mt-3">
                <label for="email">Price:</label>
                <input type="text" class="form-control" id="price" placeholder="Enter product" name="price" onchange="toFloat()">
                @if ($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif 
          </div>
          <div class="mb-3 mt-3">
              <label for="email">Image:</label>
              <input type="file" class="form-control" id="pic" placeholder="Enter product" name="pic">
              @if ($errors->has('pic'))
              <span class="text-danger">{{ $errors->first('pic') }}</span>
              @endif
          </div>
          <div class="mb-3 mt-3">
              <label for="email">Description:</label>
              <input type="text" class="form-control" id="email" placeholder="Enter some decription" name="desc">
              @if ($errors->has('desc'))
              <span class="text-danger">{{ $errors->first('desc') }}</span>
              @endif
          </div>
          <label for="">Status:</label>
          <div class="form-check">
                  <input type="radio" class="form-check-input"  name="status" value="Active">
                  <label class="form-check-label" for="Active">Active</label>
          </div>
          <div class="form-check">
                  <input type="radio" class="form-check-input"  name="status" value="Not Active">
                  <label class="form-check-label">Not Active</label>
                  <br>
                  @if ($errors->has('status'))
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                  @endif   
          </div>
          <div class="mb-3">
                  <label for="pwd">Quantity:</label>
                  <input type="text" class="form-control" id="qty" placeholder="Enter quantity" name="quantity" onchange= "changes()">
                  @if ($errors->has('quantity'))
                  <span class="text-danger">{{ $errors->first('quantity') }}</span>
                  @endif        
                  <button type="submit" class="btn btn-primary">Add Product</button>
          <div>
  </form>

</div>

@endsection
<script>
  function toFloat(){

    var number= document.getElementById('price').value;
    document.getElementById('price').value=parseFloat(number).toFixed(2);
   }


    // for 0 to out of stocks
function demofun(){
  var select = document.getElementById('category');
  
var text = select.options[select.selectedIndex].value;
if(text == "Eletronics")
{
  document.getElementById('subcategory').value = "Mobiles";
}
else if(text='Vehicles')
{
  document.getElementById('subcategory').value = "Cars";
}

}



</script>
</body>
</html>
