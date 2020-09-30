

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .numbers{
            border: chocolate 1px solid;
            text-align: center;
            border-radius: 50%;
            padding: 4px 0;
            min-height: 20px;
        }

    </style>
</head>
<body>



<div class="container mt-5 mx-auto row ">
    <div class="offset-3 col-sm-6">
        <textarea class="offset-1 col-10 p-3 form-control" style="resize: none;border: chocolate 1px solid;border-radius: 10px" id="output">0.00</textarea>
        <div class="row mt-2 tecla">
            <div class="offset-1 col-sm-9 row">
                <button class="col-3 m-1 numbers" value="1">1</button>
                <button class="col-3 m-1 numbers" value="2">2</button>
                <button class="col-3 m-1 numbers" value="3">3</button>
                <button class="col-3 m-1 numbers" value="4">4</button>
                <button class="col-3 m-1 numbers" value="5">5</button>
                <button class="col-3 m-1 numbers" value="6">6</button>
                <button class="col-3 m-1 numbers" value="7">7</button>
                <button class="col-3 m-1 numbers" value="8">8</button>
                <button class="col-3 m-1 numbers" value="9">9</button>
                <button class="col-3 m-1 numbers" value=".">.</button>



            </div>
            <div class="col-sm-2 row commands">
                <button class="col-sm-12 my-1 numbers" value="+" >+</button>
                <button class="col-sm-12 my-1 numbers" value="-">-</button>
                <button class="col-sm-12 my-1 numbers" value="/">/</button>
                <button class="col-sm-12 my-1 numbers" value="*">*</button>



            </div>
            <div class="offset-1 col-sm-10 mt-3">
                <button type="submit" id="submit" class="btn btn-lg btn-block btn-info">=  /   Reset</button>
            </div>
        </div>



        </div>
        </div>

</div>
<!--Import libraries-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    let dataA = "";
    let commandValue;
    //Key events
    //On type
    $(".numbers").on("click", event=>{
        dataA += event.target.value;
        $(".commands ").on('click',(event)=>{
            commandValue = event.target.value;
        })
        console.log(dataA);
        $("#output").html(dataA);


    });
    // on Press =
    $("#submit").on('click',()=>{
        let integers = dataA.toString().split(commandValue);
        console.log(integers);
        let number1 = parseFloat(integers[0]);
        let number2 = parseFloat(integers[1]);
        console.log({"number1" : number1, "number2" : number2, "func" : commandValue});
        //send data by ajax to calulador.php
        $.ajax({
            url: "calculator.php",
            type: "POST",
            data: {"number1" : number1, "number2" : number2, "func" : commandValue},
            success: data => {
                $("#output").html(data);
                //reset data grabber
                dataA = "";
            },
            error: ()=>{
                $("textarea").html("ERROR");
            }
        })


    });


</script>
</body>
</html>