<html>
    <head>

    </head>
    <body>
    <a href="{{url('/create')}}"><button>Create</button></a>
    <br>
        <table>
            <tr>Name of product</tr>
            <tr>Price of product</tr>
            <tr>Quantity of product</tr>
            <tr>Date  added</tr>
            <tr>Image </tr>
            @foreach($product as $product)
                <tr>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->product_quantity}}</td>
                    <td>{{$product->date_added}}</td>
                    <td><img src="{{asset('storage/image/'.$product->image)}}"></td>
                    <td><a href="{{url('edit/'.$product->id)}}">Edit</a> </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
