<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<center><h3>Services Page</h3></center>

<div>
  <form action="{{route('service-update',$service->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="fname">Service Name</label>
    <input type="text" id="fname" name="names" value="{{$service->names}}" placeholder="Your name..">

    <label for="lname">Service Description</label>
    <input type="text" id="lname" name="description" value="{{$service->description}}" placeholder="Your last name..">

    <input type="submit" value="Update">
  </form>
</div>

</body>
</html>