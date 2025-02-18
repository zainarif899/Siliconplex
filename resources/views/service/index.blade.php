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

<center><h1>Show Service </h1></center>

<table id="customers">
  <tr>
    <th>Service id</th>
    <th>Service name</th>
    <th>Service Description</th>
    <th>Action</th>
  </tr>
  <tr>
    @foreach ($services as $showservie)
        
    <td>{{$showservie->id}}</td>
    <td>{{$showservie->names}}</td>
    <td>{{$showservie->description}}</td>
    <td><a href="{{route('service-show',$showservie->id)}}">Show</a>--<a href="{{route('service-delete',$showservie->id)}}">Deleted</a>-- <a href="{{route('service-edit',$showservie->id)}}">Edite</a></td>
  </tr>
  @endforeach
</table>

</body>
</html>