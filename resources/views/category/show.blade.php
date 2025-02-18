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

<center><h1>Show Category </h1></center>

<table id="customers">
  <tr>
    <th>Service id</th>
    <th>Service name</th>
  </tr>
  <tr>
    <td>{{$category->id}}</td>
    <td>{{$category->cat_name}}</td>
</table>

</body>
</html>

