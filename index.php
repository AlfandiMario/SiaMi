<!-- <!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

     <title>Preloader</title>
</head>

<body>
     <!-- <div class="container" style="margin-top:20%; margin-bottom:20%;margin-right:20%;margin-left:20%">
          <h1 style="text-align: center;">Sebentar ya adik adik....</h1>
          <div class="spinner-border mx-auto" role="status">
               <span class="sr-only"></span>
          </div>
     </div> -->
<!-- <div class="d-flex justify-content-center">
          <h1>Sebentar ya adik adik....</h1>
          <div class="spinner-border mx-auto" role="status">
               <span class="sr-only"></span>
          </div>
     </div>
     <?php
     header("refresh:2;url=view/wellcome/dist/index.html") ?> -->

<!-- </body> -->
<!-- <script>
     function setTimeout(() => {
          document.location.href = "view/login.php"

     }, 3000);
</script> -->

<!-- </html> -->

<head>
     <title>
          WELCOME TO MY WEBSITE
     </title>
     <link rel="stylesheet" href="css/preloader.css">
</head>

<body>
     <div id="loader"></div>
     <div id="content">
          <!-- Everything in your body should go under here-->
          <!-- End of body-->
     </div>
     <script>
          var preloader = document.getElementById('loader');

          function preLoaderHandler() {
               preloader.style.display = 'none';
          }
     </script>
</body>