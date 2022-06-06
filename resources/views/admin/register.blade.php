<!DOCTYPE html>
<html>
<head>
    <title>System Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            /* background: #60a3bc !important; */
            background-image: url(https://scr.vn/wp-content/uploads/2020/08/H%C3%ACnh-n%E1%BB%81n-vector-%C4%91%E1%BA%B9p.jpg);
            background-size: cover;
        }
        .user_card {
            height: 550ps;
            width: 450px;
            margin-top: auto;
            margin-bottom: auto;
            background: rgb(121, 171, 228);
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }
        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -70px;
            border-radius: 50%;
            background: #60a3bc;
            padding: 10px;
            text-align: center;
        }
        .brand_logo {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            border: 2px solid white;
        }
        .form_container {
            margin-top: 100px;
        }
        .login_btn {
            width: 100%;
            background: #064706 !important;
            color: white !important;
        }
        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .login_container {
            padding: 0 2rem;
        }
        /* .input-group-text {
            background: #c0392b !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        } */
        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: black !important;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @toastr_css

</head>
<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="http://www.thptvietnhat.edu.vn/img_data/images/122958373184_avatar1.png"
                            class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form>
                        <h2 class="text-center" style="color: #064706">Register System Admin !</h2>
                        <br>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" id="username" class="form-control input_user" value="" placeholder="Username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="password" class="form-control input_pass" value=""
                                placeholder="Password">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="repassword" class="form-control input_pass" value=""
                                placeholder="Re_Password">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="button" id="buttonRegister" class="btn login_btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@jquery
@toastr_js
@toastr_render
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){
        $("#buttonRegister").click(function(){
            var payload = {
                'username'     :   $("#username").val(),
                'password'     :   $("#password").val(),
                'repassword'     :   $("#repassword").val(),
            };
            $.ajax({
                    url: '/admin/register',
                    type: 'post',
                    data: payload,
                    success: function($data){
                        location.replace("/admin/register")
                        toastr.success('Đã tạo tài khoản thành công !');
                        },
                    error: function($error){
                        var listerror = ($error.responseJSON.errors);
                        $.each( listerror, function( key, value ) {
                            toastr.error(value[0]);
                            });
                    }

                });
        });

    });
</script>
</html>
