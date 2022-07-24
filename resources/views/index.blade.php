<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        a{
            text-decoration: none;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Thêm cửa hàng mới</h3>
        <form class="form-inline mt-5" action="{{ route('shopify') }}" method="post">
            @csrf
            <label for="email">Nhập tên shop : </label>
            <input type="text" class="form-control ml-3" placeholder="Tên shop" id="shop" name="shop">
            <button type="submit" class="btn btn-primary ml-3">Đồng ý</button>
        </form>
        <hr class="mt-5 mb-5">
        <h3>Danh sách cửa hàng hiện có</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Domain</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($dataShop !== [])
                @foreach($dataShop as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->domain}}</td>
                    <td>{{$item->customer_email}}</td>
                    <td><a class="btn btn-primary" style="color: white;" href="productManage/{{$item->id}}">Quản lý</a></td>
                </tr>
                @endforeach
                @else
                <div class="">
                    Chưa có shop nào được kết nối
                </div>
                @endif

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>