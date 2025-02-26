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

<center><h1>list Extension </h1></center>

<table id="customers">
  <tr>
    <th>Extension id</th>
    <th>Extension name</th>
    <th>Extension description</th>
    <th>Extension image</th>

  </tr>
  <tr>
    @foreach ($Extension as $extensions)
        
    <td>{{$extensions->id}}</td>
    <td>{{$extensions->name}}</td>
    <td>{{$extensions->description}}</td>
    <td><img src="{{ asset('images/'.$extensions->image) }}" alt="Extension Image" width="100" height="100"></td>
    {{-- <td><a href="{{route('category-show',$showcategory->id)}}">Show</a></td> --}}
  </tr>
  {{-- --<a href="{{route('service-delete',$showservie->id)}}">Deleted</a>-- <a href="{{route('service-edit',$showservie->id)}}">Edite</a> --}}
  @endforeach
</table>

</body>
</html>