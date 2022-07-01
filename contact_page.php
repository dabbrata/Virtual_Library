<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="navandtopbarStyle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <title>Contact</title>

    <style>
       label{
           margin-left: 2px;
           margin-bottom: 3px !important;
       }
       img{
         margin-bottom:4px;
       }
       .txt{
           color: rgb(13, 17, 73)rgb(13, 17, 73);
           font-weight: 600;
       }
       .border{
           border:1px solid rgb(13, 17, 73) !important;
       }
       .area{
            display:flex;
            justify-content:center;
            
       }
       .contact{
           margin:10px;
           border:1px solid rgba(13, 17, 73,.5);
           padding:35px;
           border-radius:5px;
           width:40%;

       }
       .backgroundColor{
           background-color: rgb(13, 17, 73) !important;
       }
       button:hover{
           background-color: rgb(44, 48, 114) !important;
       }
       #my-form-status{
           text-align: center;
           padding:10px;
           margin-top:5px;
           color: rgb(42, 13, 63);
           font-weight: bold;
       }
        
    </style>
</head>
<body>
    <?php
        include("header2.php");
    ?>

    <div class="area">
    <div class="contact">
    <form action="https://formspree.io/f/mwkalnpd" method="POST" id="my-form">

     <h2>Contact with us</h2>
     <br>   
     <img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png" height="18px" width="21px"> 

     
     Username
     <div class="input-group">
         <span class="input-group-text border">First and last name</span>
         <input type="text" aria-label="First name" name="first-name" class="form-control border" required>
         <input type="text" aria-label="Last name" name="last-name" class="form-control border" required>
       </div><br>
     <div class="mb-1">
         <img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/envelope-512.png" height="18px" width="21px">
         Email address
         <input type="email" class="form-control border" name="email" id="exampleFormControlInput1" placeholder="name@example.com" required>
       </div><br>
       <div class="mb-1 ">
         <img src="https://img.icons8.com/ios/452/text.png" height="20px" width="23px">
         Text
         <textarea class="form-control border" name="txtArea" id="exampleFormControlTextarea1" rows="3" placeholder="Text" required></textarea>
       </div><br>
       <div class="d-grid gap-2">
         <button class="btn btn-primary backgroundColor" type="submit">Submit</button>
       <div id="my-form-status">

       </div>  
   </div>
 </form>

    </div>
    </div>

    <?php
        include("footer.php");
    ?>
     <script>
        var form = document.getElementById("my-form");
        
        async function handleSubmit(event) {
          event.preventDefault();
          var status = document.getElementById("my-form-status");
          var data = new FormData(event.target);
          fetch(event.target.action, {
            method: form.method,
            body: data,
            headers: {
                'Accept': 'application/json'
            }
          }).then(response => {
            status.innerHTML = "Thanks for your submission!";
            form.reset()
          }).catch(error => {
            status.innerHTML = "Oops! There was a problem submitting your form"
          });
        }
        form.addEventListener("submit", handleSubmit)
    </script>
</body>
</html>