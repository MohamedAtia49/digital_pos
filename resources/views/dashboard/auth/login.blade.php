<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Digital - Login</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'><link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="{{ asset('dashboard_files/auth/css/style.css') }}">
    <link href="https://fonts.cdnfonts.com/css/betsy-flanagan" rel="stylesheet">

</head>
<body>
    <!-- partial:index.partial.html -->
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="screen-1">
                <img class="logo" src="{{ asset('dashboard_files/dist/img/logo.png') }}" alt="">
                <div>
                    <h5 class="welcome-text">Welcome To</h5>
                    <h1 class="logo-name">Digital</h1>
                </div>
                <div class="email @error('email') is-invalid @enderror">
                    <label for="email">Email Address</label>
                    <div class="sec-2">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" placeholder="Username@gmail.com" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="password">
                    <label for="password">Password</label>
                    <div class="sec-2">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" placeholder="············" class="pas @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                        <ion-icon class="show-hide" name="eye-outline"></ion-icon>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="remember">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>

                <button class="login">Login </button>
        </div>
    </form>
    <!-- partial -->
    <script src="{{ asset('dashboard_files/auth/js/show_password.js') }}"></script>
</body>
</html>
