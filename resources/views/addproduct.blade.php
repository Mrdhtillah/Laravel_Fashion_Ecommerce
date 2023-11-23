<!-- <div> -->
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<!-- </div> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulir</title>

    <head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            max-width: 400px;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        .form-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #0056b3;
        }

        .form-message {
            text-align: center;
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
</head>
      
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/addproduct" method="post" enctype="multipart/form-data">
        @csrf
        
        <label for="product_name">Product Name :</label>
        <input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}">
        @error('product_name')
            <div>{{ $message }}</div>
        @enderror

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}">
        @error('description')
            <div>{{ $message }}</div>
        @enderror

        <label for="price">Price</label>
        <input type="number" step="1" name="price" id="price" value="{{ old('price') }}">
        @error('price')
            <div>{{ $message }}</div>
        @enderror

        <label for="quantity">Quantity</label>
        <input type="number" step="1" name="quantity" id="quantity" value="{{ old('quantity') }}">
        @error('quantity')
            <div>{{ $message }}</div>
        @enderror

        <label for="image"></label>
        <input type="file" name="image" id="image">
        @error('image')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Submit</button>
    </form>

    <!-- <img src="{{ asset('gambar/1695871672.png')}}" alt="Uploaded Image" width="200"> -->


<!-- 
@if (session('view'))
    @include('view')
@endif -->

</body>
</html>

