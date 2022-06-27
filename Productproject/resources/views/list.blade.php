  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>See your product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  </head>
  <body>
    @extends('layouts.app')

    @section('content')
  <div class="container mt-3">
    <div class="card-header bg-primary text-center text-white">
    <h2>See Products Rows</h2>
  </div>
  <br>
  <a href="products" class="btn btn-primary">Add your Prodocuts </a>
  <br>
  <br>
    <table class="table table-bordered table-hover" id="myTable">

      @if (session('message'))
      <h6 class="alert alert-success">{{ session('message') }}</h6>
  @endif      <thead class="bg-primary text-white text-center">
        <tr>
          <th>Images  </th>
          <th>Product</th>
          <th>Category</th>
          <th>Subcategory</th>
          <th>Price</th>
          <th>Decription</th>
          <th>Status</th>
          <th>Quantity</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($productdata as $item)

         <tr>
          <td>
            <img src="{{ asset('uploads/students/'.$item->pic) }}" width="70px" height="70px" alt="Image">
        </td> 
        <td>{{ $item->pname }}</td>
        <td>{{ $item->category }}</td>
        <td>{{ $item->subcategory }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->desc }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->quantity }}</td>
        
       <td> <a href="{{ url('update/'.$item->id) }}" class="btn btn-primary ">update</a>
        <a href="{{ url('delete/'.$item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product')">Delete </a>
          </td>
         </tr>
         @endforeach

       
      </tbody>
    </table>
  </div>

  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>
  @endsection

  </body>
  </html>
