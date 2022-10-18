<?php
include_once 'includes/user.php';
include_once 'includes/con_fig.php';
include_once 'includes/session.php';
include_once 'includes/function.php';

session_start();

 if(!isset($_SESSION['user_session_id'])){
    header("Location: index.php");
    exit;
 }

 $user = User::find($session->userid);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
  <section class="vh-100" style="background-color: #eee;">



    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div><?php echo $result; ?></div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Dashboard</p>

                  <div class="card">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top" alt="Fissure in Sandstone" />
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $user->name ?></h5>
                      <p class="card-text"> <?php echo $user->email ?>.</p>
                      <a href="logout.php" class="btn btn-primary">Logout</a>
                    </div>
                  </div>

                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>

  <script type="text/javascript">

    function check_session_id(){
      var session_id = '<?php echo $_SESSION['user_session_id']; ?>';
       
      fetch('check_session.php').then(function(response) {
        return response.json();
      }).then(function(data) {
        if(data.output == '0'){
          window.location.href = 'index.php';
        }
      });
      
    }

    setInterval(function(){
      check_session_id();
    }, 1000);

    
  </script>
</body>

</html>