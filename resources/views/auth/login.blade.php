<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Car Rental</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon (1).ico') }}">
    <style>
        body{
            background-color: #F8F8F8;
        }
        .login-container{
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 300px;
            height: 400px;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .login-container>ion-icon{
            font-size: 25px;
            color: red;
        }
        .login-container input{
            height: 30px;
            margin: 5px 0;
        }
        .login-container button{
            display: flex;
            justify-content: center;
            border: none;
            color: white;
            background-color: #FA4226;
            padding: 5px 10px;
            margin-bottom: 10px;
            cursor: pointer;
            margin-top: 5px;
        }
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .error-message{
            display: flex;
            color: red;
            align-items: center;
            height: 15px;
        }
        form ion-icon{
            margin: 0;
            height: 15px;
        }
        #resgiter{
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <ion-icon name="car-sport" onclick="window.location.href='http://127.0.0.1:8000/';" style="cursor: pointer"></ion-icon>
        <h2>Đăng nhập</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" >
            @error('email')
                <div class="error-message">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <input type="password" name="password" placeholder="Mật khẩu">
            @error('password')
                <div class="error-message">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <button type="submit">Đăng nhập</button>
        </form>
        <div>
            <a href="{{route('password.request')}}">Quên mật khẩu?</a>
            <div id="resgiter">
                <p>bạn chưa có tài khoản?</p>
                <a href="/register">nhấn để đăng kí</a>
            </div>
        </div>
    </div>
</body>
</html>
