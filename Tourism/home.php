  
<php?
include 'app_view.php';
?>

<!DOCTYPE html>
<html> 
    <head>  
    <link rel="icon" href="" size="16x16" type=""/>
        <title>Home</title>  
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!--        <link rel="stylesheet" type="text/css" href="style.css">-->
       <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
        <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
        <style type="text/css">
             body{
                background-image: url("");
                 background-repeat: round;
        background-attachment: fixed;
            }
        </style>
    </head> 
    <body>  
       <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="#" class="navbar-brand">TOURISM CENTER</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active"></a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">HOME</a>
                <div class="dropdown-menu">
                   
                    <a href="#" class="dropdown-item"></a>
                   
                </div>
            </div>
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">NATIONAL_PARKS</a>
                <div class="dropdown-menu">
                   
                    <a href="#" class="dropdown-item"></a>
                   
                </div>
            </div>
        </div>
        <form class="form-inline" action="search.php" method="get">
            <div class="input-group">                    
                <input type="search" class="form-control" placeholder="Search" name="q">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <div class="navbar-nav">
           <a href="javascript:void(0)" class="nav-item nav-link">      
       <strong class="text-primary"><i class="fas fa-user"></i> Hi, 
     </strong>
 
    
            <a href="index.php?logout='1'" class="nav-item nav-link">Logout</a>
        </div>
    </div>
</nav>
<main class="container-fluid">
    <div class="row mt-2">
        
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card shadow mt-3">
                <div class="card-body">
                <h5 class="font-weight-bold">TOURISM SERVICES </h5>  
                 <h5 class="text-muted">CUSTOMER ID:<?php echo $data['id']; ?> </h5>
                <h5 class="text-muted">TELPHONE:<?php echo $data['phone_number']; ?> </h5>
                <h5 class="text-muted">STATUS:<?php echo $data['status']; ?></h5>
             <h5 class="text-muted">DATE_ORDERED:<?php echo $data['date_ordered']; ?> </h5>
               

                
                </div>
            </div>
        </div>
       
    </div>
</main>
 
       
    </body> 
</html>

