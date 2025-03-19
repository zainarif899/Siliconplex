<!DOCTYPE html>
<html>
<style>
    input[type=text],
    select {
        width: 109vh;
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
        padding: 4px;
    }
</style>

<body>

    <center>
        <h3>Product Create page</h3>
    </center>

    <div>
        <form action="{{ route('product-store') }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row">
                <div class="col-25">
                  <label for="fname">Product Name</label>
                </div>
                <div class="col-75">
                  <input type="text" id="fname" name="name" placeholder="Enter Your Extension Name">
                </div>
              </div>


            <div class="row">
                <div class="col-25">
                  <label for="subject">Product Description</label>
                </div>
                <div class="col-75">
                  <textarea id="subject" name="description" placeholder="Write something.." style="height:200px; width: 109vh;"></textarea>
                </div>
              </div>


            <div class="row">
                <div class="col-25">
                  <label for="price">Product Price</label>
                </div>
                <div class="col-75">
                  <input type="text" id="price" name="price" placeholder="Enter Extension Price">
                </div>
              </div>

            <div class="row">
                <div class="col-25">
                  <label for="lname">Product Image</label>
                </div>
                <div class="col-75">
                  <input type="file" id="lname" name="image">
                </div>
              </div>
            <label for="cars">Choose a Category:</label>

            <select name="cat_id" id="cars">
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                @endforeach
            </select>
            <input type="submit" value="Submit">
            @foreach ($errors->all() as $message)
            <strong>{!! $message !!}</strong>
            @endforeach
        </form>
    </div>

</body>

</html>
