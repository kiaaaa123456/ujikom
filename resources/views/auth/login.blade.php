<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CAFE</title>
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Log in.</h1>
                    <form action="{{ route('cekLogin') }}" method="POST" novalidate>
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="email" class="form-control" @error('email') is-invalid @enderror
                                        placeholder="Email" name="email"id="email" value="{{ old('email') }}"
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="password" class="form-control"
                                        @error('password')
                                        is-invalid
                                        @enderror
                                        placeholder="Password" name="password" value="{{ old('password') }}"
                                        id="password">
                                    <div class="form-control-icon" id="togglePassword" style="cursor: pointer;">
                                        <i class="bi bi-eye"></i>
                                        <i class="bi bi-eye-slash d-none"></i>
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @error('nofound')
                            <div class="row mb-2">
                                <div class="col-12 text-center text-danger">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const showPasswordIcon = togglePassword.querySelector('.bi-eye');
        const hidePasswordIcon = togglePassword.querySelector('.bi-eye-slash');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye icons
            showPasswordIcon.classList.toggle('d-none');
            hidePasswordIcon.classList.toggle('d-none');
        });
    </script>
</body>

</html>
