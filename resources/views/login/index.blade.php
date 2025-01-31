<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | K-One</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Full screen background radial gradient */
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(ellipse at center, hsl(218, 41%, 35%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%);
            height: 100vh; /* Make sure the background covers the full viewport */
            width: 100vw; /* Full width of the viewport */
        }

        #radius-shape-1, #radius-shape-2 {
            position: absolute;
            background: radial-gradient(#44006b, #ad1fff);
            z-index: 0;
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            border-radius: 50%;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
            border-radius: 15px;
            position: relative;
            z-index: 1;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden; /* Hide scrollbars */
        }

        .card {
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .card-header {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            background: #ffffff;
            border-bottom: 1px solid #ddd;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .social-btns i {
            font-size: 20px;
        }

        .social-btns button {
            margin: 5px;
        }
    </style>
</head>
<body>
    <section class="background-radial-gradient overflow-hidden d-flex align-items-center">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start">
            <div class="row gx-lg-5 align-items-center">
                <!-- Left side text content (optional) -->
                <div class="col-lg-6 mb-5 mb-lg-0 text-light">
                    <h1 class="display-5 fw-bold ls-tight">
                    Kelola <br />
                        <span style="color: hsl(218, 81%, 75%)"> Dokumen Sumatif & Formatif</span>
                    </h1>
                    <p class="opacity-70">
                    Simpan, akses, dan kelola data dengan lebih efisien dan terstruktur.
                    </p>
                </div>

                <!-- Right side form login -->
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="shadow-5-strong"></div>

                    <!-- Login Card -->
                    <div class="card bg-glass">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body px-4 py-5 px-md-5">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login.post') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Enter your password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
