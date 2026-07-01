<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    <link href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body{
    margin:0;
    padding:0;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:'Poppins',sans-serif;
    background:linear-gradient(135deg,#eaf7ef,#f5f8fc);
}

.login-card{
    width:430px;
    background:#fff;
    border-radius:22px;
    padding:40px;
    box-shadow:0 20px 50px rgba(0,0,0,.12);
    transition:.3s;
}

.login-card:hover{
    transform:translateY(-4px);
}

.logo{
    width:95px;
    margin:auto;
    display:block;
    margin-bottom:15px;
}

.title{
    font-size:30px;
    font-weight:700;
    color:#198754;
    text-align:center;
    margin-bottom:5px;
}

.subtitle{
    color:#6c757d;
    text-align:center;
    margin-bottom:30px;
}

.form-label{
    font-weight:600;
    color:#333;
}

.form-control{
    height:50px;
    border-radius:12px;
    border:1px solid #dcdcdc;
    transition:.3s;
}

.form-control:focus{
    border-color:#198754;
    box-shadow:0 0 0 .18rem rgba(25,135,84,.15);
}

.input-group .btn{
    border-radius:0 12px 12px 0;
    font-weight:600;
}

.btn-login{
    width:100%;
    height:50px;
    border:none;
    border-radius:12px;
    background:#198754;
    color:#fff;
    font-size:17px;
    font-weight:600;
    transition:.3s;
}

.btn-login:hover{
    background:#157347;
    transform:translateY(-2px);
}

.demo-box{
    margin-top:20px;
    padding:18px;
    border:2px dashed #b9dfc6;
    background:#f7fffa;
    border-radius:15px;
}

.demo-box h6{
    color:#198754;
    font-weight:700;
}

.btn-home{
    width:100%;
    margin-top:15px;
    border-radius:12px;
    height:48px;
}

.alert{
    border-radius:12px;
}

.invalid-feedback{
    display:block;
}
    </style>

</head>
<body>

<div class="login-card">

    <div class="text-center mb-4">

        <div class="logo">
            <img src="{{ asset('asset/gambar/logo/akk.png') }}" width="90">
        </div>
        <h1 class="title">AKEKA</h1>
        <h3 class="subtitle">Login</h3>
        

        

    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.proses') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">Username</label>

            <input
                type="text"
                name="username"
                value="{{ old('username') }}"
                class="form-control @error('username') is-invalid @enderror"
                placeholder="Masukkan username">

            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">Password</label>

            <div class="input-group">

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan password">

                <button
                    type="button"
                    class="btn btn-outline-secondary"
                    onclick="togglePassword()"
                    id="btnShow">
                    Show
                </button>

            </div>

            @error('password')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <button class="btn-login">
            Login
        </button>

    </form>

    <div class="demo-box text-center">

        <h6>Demo Login Admin</h6>

        <p class="mb-1">
            Username : <strong>admin</strong>
        </p>

        <p class="mb-0">
            Password : <strong>admin123</strong>
        </p>

    </div>

    <a href="/" class="btn btn-outline-success btn-home">
        ← Kembali ke Home
    </a>

</div>

<script>

function togglePassword(){

    let password=document.getElementById("password");
    let button=document.getElementById("btnShow");

    if(password.type==="password"){
        password.type="text";
        button.innerHTML="Hide";
    }else{
        password.type="password";
        button.innerHTML="Show";
    }

}

</script>

</body>
</html>