<!DOCTYPE html>
<html>
    <head>
    <link rel="icon" href="image/favicon.png" size="16x16" type="image/x-icon"/>
        <title>LOGIN | TOURISM CENTER</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center mt-2">
                <div class="col-md-12 col-lg-6 col-xl-6">
                        <h4 class="text-center">LOGIN</h4>
                        <div class="card card-body shadow mt-2">
                            <form method="post" action="auth.php" id="loginForm">
                                <input type="hidden" name="login" value="1"/>
                                <div class="input-group">
                                    <label>Username</label> &nbsp;&nbsp;&nbsp;
                                    <input type="text" name="username" class="edit-input" autocomplete="off" required/>
                                </div>
                                <div class="input-group">
                                    <label>Password</label>&nbsp;&nbsp;&nbsp;
                                    <input type="password" name="password" class="edit-input" autocomplete="off" required/>
                                </div><br/>
                                <div class="form-group row justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary btn-sm login-btn">Login to your Dashboard</button>
                                </div>
                                <div class="form-goup row justify-content-center">
                                <div class="response d-none">
                                        <span class="spinner-border spinner-border-sm text-success"></span> Authenticating...
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/tourism.js"></script>
    </body>
</html>