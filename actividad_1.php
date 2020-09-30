<?php
include  "conection.php";
include "paises.inc";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>



<div class="container row">
    <div class="offset-3 col-sm-6 mt-5 form-group card card-body">
        <div id="formMessage"></div>
        <h2>Submit your Favorite movies</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="from1">
            <label for="titulo"> Titulo</label>
            <input type="text" class="form-control form-control-lg" name="titulo" id="titulo" required>

            <label for="director"> Director</label>
            <input type="text" class="form-control form-control-lg" name="director" id="director">

            <label for="anio"> Año</label>
            <input type="text" class="form-control form-control-lg" name="anio" id="anio">
            <select class="custom-select my-3" name="paises" id="paises">
                <option selected value="">Paises</option>
                <?php
                foreach ($paises as $key => $values){
                    echo "<option value='$values'>$values</option>";
                }

                ?>
            </select>
            <button type="submit" id="submit" class="btn btn-lg btn-block btn-primary">Submit</button>
        </form>

    </div>
</div>

<!--Import libraries-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $(function (){
        $("#from1").on("submit", function (event){
            event.preventDefault();
            //Data
            let dataToPost = $(this).serializeArray();
            console.log(dataToPost);
            //sending throw ajax
            $.ajax({
                url: "almancer.php",
                type: "POST",
                data: dataToPost,
                success: data => {
                    $("#formMessage").html(data);

                },
                error: () => {
                    $("#formMessage").html("<div class='alert alert-danger'>Ha occurido un error, Intentalo De nueveo!</div>")
                }

            });
        })
    })
</script>
</body>
</html>