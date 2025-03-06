<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .product-image {
            width: 40%;
            margin-right: 20px;
        }

        .product-image img {
            width: 45%;
            height: 445px;
            object-fit: cover;
            border-radius: 10px;
            margin-left: 37vh;
        }

        /* .product-image img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
} */

        .product-details {
            width: 50%;
        }

        .product-details h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .product-details p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .rating-review {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .rating-review h3 {
            font-size: 18px;
            margin-right: 10px;
        }

        .price {
            margin-bottom: 20px;
        }

        .price h3 {
            font-size: 18px;
            color: #00698f;
        }

        .buy-now {
            background-color: #00698f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .buy-now:hover {
            background-color: #0085b2;
        }

        .reviews {
            margin-top: 50px;
        }

        .reviews h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .review {
            background-color: #f7f7f7;
            padding: 20px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .review h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .rating {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .rating h4 {
            font-size: 16px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="product-container">
        <div class="product-image">
            <img src="{{ asset('images/' . $shows->image) }}" alt="Product Image">
        </div>
        <div class="product-details">
            <h2>{{ $shows->name }}</h2>
            <p>{{$shows->description}}</p>
            <div class="rating-review">
                <h3>Rating: 4.5/5</h3>
                <p>Reviews: 100+</p>
            </div>
            <div class="price">
                <h3>Price: $100</h3>
            </div>
            <button class="buy-now">Buy Now</button>
        </div>
        <div class="">
            <a href="{{route('rating-page')}}">Review</a>
        </div>
    </div>
    <div class="reviews">
        <h2>Reviews</h2>
        <div class="review">
            <h3>Review 1</h3>
            <p>This product is amazing! I love it.</p>
            <div class="rating">
                <h4>Rating: 5/5</h4>
            </div>
        </div>
        <div class="review">
            <h3>Review 2</h3>
            <p>This product is okay. It's not that great.</p>
            <div class="rating">
                <h4>Rating: 3/5</h4>
            </div>
        </div>
    </div>
</body>

</html>
