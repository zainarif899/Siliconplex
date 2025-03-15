<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<center><h2>Extension Form</h2></center>

<div class="container">
  <form action="{{ route('update-extension', $extension->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="col-25">
        <label for="fname">Extension Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name" value="{{ $extension->name }}" placeholder="Enter Your Extension Name">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Extension Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="lname" name="image">
        @if($extension->image)
          <br>
          <img src="{{ asset('images/'.$extension->image) }}" alt="Extension Image" width="150">
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="price">Extension Price</label>
      </div>
      <div class="col-75">
        <input type="text" id="price" name="price" value="{{ $extension->price }}" placeholder="Enter Extension Price">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="subject">Extension Description</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="description" placeholder="Write something.." style="height:200px">{{ $extension->description }}</textarea>
      </div>
    </div>

    <div class="row">
      <input type="submit" value="Update">
    </div>

    <!-- Display Validation Errors -->
    @foreach ($errors->all() as $message)
      <strong>{!! $message !!}</strong><br>
    @endforeach
  </form>
</div>

</body>
</html>
