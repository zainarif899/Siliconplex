<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<center><h1>list product </h1></center>

<table id="customers">
  <tr>
    <th>product id</th>
    <th>product name</th>
    <th>Category Name</th>
    <th>Action</th>
  </tr>
  <tr>
    @foreach ($product as $productshow)
        
    <td>{{$productshow->id}}</td>
    <td>{{$productshow->name}}</td>
    <td>{{$productshow->category->cat_name}}</td>
    <td><a href="{{route('product-show',$productshow->id)}}">Show</a></td>
    {{-- <td><a href="{{route('service-show',$showservie->id)}}">Show</a>--<a href="{{route('service-delete',$showservie->id)}}">Deleted</a>-- <a href="{{route('service-edit',$showservie->id)}}">Edite</a></td> --}}
  </tr>
  @endforeach
</table>

</body>
</html>