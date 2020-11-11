<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no">

        <title>Maxibin - Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/logreg.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
    <div class="login-register-container d-flex align-items-center justify-content-center">
        <form class="login-register-form text-center" method="POST" action="{{ route('login') }}">
            <h1 class="mb-5 font-weight-light text-uppercase">Login</h1>
            <div class="input-group input-group-joined input-group-solid mb-2">
            @csrf
            <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" focus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <div class="alert alert-danger">
                            {{__('Email atau Password Salah, silahkan periksa kembali')}}
                        </div>
                    </span>
                @enderror
            </div>
            <div class="input-group-append">
                <div class="input-group-text">
                <i class="fas fa-lock"></i>
                </div>
                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="Password" focus>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <div class="alert alert-danger">
                            {{__('Email atau Password Salah, silahkan periksa kembali')}}
                        </div>
                    </span>
                @enderror
            </div>
            <div class="forgot-link d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remeber">Remember Password</label>
                </div>

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forget Password</a>
                @endif
            </div>
            <button type="submit" class="btn mt-3 text-uppercase btn-custom btn-block rounded-pill button-lg">Login</button>
            <p class="mt-3 font-weight-normal">Not have an account ?<a href="register"><strong>Register Now</strong></a></p>
        </form>
    </div>

     
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    </body>
</html>