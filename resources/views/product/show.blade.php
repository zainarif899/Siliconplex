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

<center><h1> Product Show</h1></center>

<table id="customers">
  <tr>
    <th>product id</th>
    <th>product name</th>
    <th>Category id</th>
  </tr>
  <tr>

        
  
    <td>{{$product->id}}</td>
    <td>{{$product->name}}</td>
    <td>{{$product->cat_id}}</td>
  
</table>

</body>
</html>

