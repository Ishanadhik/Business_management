<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
<form method="post" action="{{action([\App\Http\Controllers\PagesController::class,'update'])}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$product->id}}">
    <label>Product_name</label>
    <input type="text" name="product_name" value="{{$product->product_name}}"required>
    <label>Product_price</label>
    <input type="text" name="product_price" value="{{$product->product_price}}"required>
    <label>Product_quantity</label>
    <input type="text" name="product_quantity" value="{{$product->product_quantity}}" required>
    <label>Date_added</label>
    <input type="date" name="Date_added" value="{{$product->date_added}}" required>
    <label>Image</label>
    <input type="file" name="image" value="{{$product->image}}" required>
    <input type="submit">
</form>

</body>
</html>
