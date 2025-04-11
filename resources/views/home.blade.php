<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Professional Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #2c3e50;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
        }

        .navbar a:hover {
            background-color: #1abc9c;
            border-radius: 5px;
        }

        .search-container {
            display: flex;
        }

        .search-container input {
            padding: 5px;
            border: none;
            border-radius: 3px;
        }

        .search-container button {
            background-color: #1abc9c;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .header {
            text-align: center;
            padding: 50px;
            background: #1abc9c;
            color: white;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .sidebar {
            width: 30%;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            width: 70%;
            background: white;
            padding: 20px;
            margin-left: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .fakeimg {
            background: #ddd;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .content {
                width: 100%;
                margin-left: 0;
                margin-top: 20px;
            }

            .sidebar {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div>
            <a href="#">Service</a>
            <a href="#">Product</a>
            <a href="#">Category</a>
        </div>
        <form action="{{ route('searching') }}" method="get">
            <div class="search-container">
                <input type="text" placeholder="Search.." name="name" id="search" list="suggestions">
                <button type="submit"><i class="fa fa-search"></i></button>
                <datalist id="suggestions"></datalist>
            </div>
        </form>

        <a href="#">Logout</a>
    </div>

    <div class="header">
        <h1>My Professional Website</h1>
        <p>A refined and modern website layout.</p>
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>About Me</h2>
            <div class="fakeimg" style="height:200px;">Profile Image</div>
            <p>Brief introduction about yourself.</p>
        </div>

        <div class="content">
            <h2>Title Heading</h2>
            <p><small>December 7, 2022</small></p>
            <div class="fakeimg" style="height:200px;">Image</div>
            <p>Some informative content goes here.</p>
        </div>
    </div>

</body>

<script>
    document.getElementById('search').addEventListener('input', function () {
        let query = this.value;

        if (query.length < 1) return; // Empty input par request na bheje

        fetch(`/autocomplete?query=${query}`)
            .then(response => response.json())
            .then(data => {
                let dataList = document.getElementById('suggestions');
                dataList.innerHTML = ""; // Pehle ke suggestions hatao

                data.forEach(item => {
                    let option = document.createElement('option');
                    option.value = item;
                    dataList.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching suggestions:', error));
    });
</script>

</html>
