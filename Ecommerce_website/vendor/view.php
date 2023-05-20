<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
        .parent{
            width:fit-content;
            padding:20px;
            background-color:bisque;
            display:inline-block;
            margin-left:10px;
            margin-top:10px;

        }
        .parent img{
            width:auto;
            height:200px;
        }
    </style>
</head>
<body>
    
</body>
</html>



<?php


    include 'menu.php';

    if(isset($_SESSION['username1']))
    {
        include_once "../shared/connection.php";

        $username=$_SESSION['username1'];

        $query="select * from product where username='$username'";

        $mysqli_obj=mysqli_query($conn,$query);

        while($row=mysqli_fetch_assoc($mysqli_obj))
        {
            $pid=$row['pid'];
            $name=$row['name'];
            $price=$row['price'];
            $details=$row['details'];
            $impath=$row['impath'];
            $pfpath=$row['pfpath'];

            echo "<div class='parent'>
                    <h2>$name</h2>
                    <embed src='$pfpath'>
                    <h3>$price</h3>
                    <p>$details</p>


                    <div class='text-center'>
                        <a href='update.php?pid=$pid&name=$name&price=$price&details=$details&impath=$impath'>
                        <button class='btn btn-warning p-2'><i class='fas fa-edit'></i></button>
                        </a>
                        <a href='delete_product.php?pid=$pid'>                                       <!--To delete particular product-->
                        <button class='btn btn-danger p-2'><i class='fas fa-trash'></i></button>
                        </a>
                    </div>
                </div>";  
        }
    }
    else
    {
        echo "<script>
        alert('Please login to see your uploaded products');
        window.location.href='index.php';
        </script>"; 

    }


?>