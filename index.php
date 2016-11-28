<?php
    // Start the session
    session_start();
    if (!isset($_SESSION["authenticated"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Math Game</title>
        <link rel="stylesheet" href="style/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="style/style.css" type="text/css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php 
                    if (!isset($total)) {
                        $total = 0;
                    }
                    if (!isset($score)) {
                        $score = 0;
                    }
                    extract($_POST);
                    if ( isset($first_number) 
                        && isset($operator) 
                        && isset($second_number) 
                        && isset($answer) 
                    ) {
                        $correct = "";
                        if ( !is_numeric($answer) ) {
                            $correct = "<p class='wrong'>You must enter a number for your answer.</p>";
                        } else
                        switch ($operator) {
                            case "+":
                                $result = $first_number + $second_number;
                                if ($result == $answer) {
                                    $correct = "<p class='right'>Correct</p>";
                                    $score++;
                                } else {
                                    $correct = "<p class='wrong'>INCORRECT, $first_number + $second_number is $result.</p>";
                                }
                                $total++;
                                break;
                            case "-":
                                $result = $first_number - $second_number;
                                if ($result == $answer) {
                                    $correct = "<p class='right'>Correct</p>";
                                    $score++;                    
                                } else {
                                    $correct = "<p class='wrong'>INCORRECT, $first_number - $second_number is $result.</p>";
                                }
                                $total++;
                                break;
                        }
                    }
                    $num1 = rand(0,20);
                    $num2 = rand(0,20);
                    $operation_integer = rand(1,2);
                    $operation_string = "";
                    
                    switch ($operation_integer) {
                        case 1:
                            $operation_string = "+";
                            break;
                        case 2:
                            $operation_string = "-";
                            break;
                    }
                
                ?>
                <div class="form-group">
                    <label class="col-sm-offset-4 col-sm-5 control-label"><h1>Math Game</h1></label>
                    <div class="col-sm-1">
                        <a href='logout.php' class='btn btn-default'>Logout</a>
                    </div>
                </div>
            </div>
            <div class='col-sm-offset-3 col-sm-1'>
                <?php echo $num1 ?>
            </div>
            <div class='col-sm-offset-1 col-sm-1'>
                <?php echo $operation_string ?>
            </div>
            <div class='col-sm-offset-1 col-sm-1'>
                <?php echo $num2 ?>
            </div>

            

            <form action="index.php" method="post" class="form-horizontal">
                <input type="hidden" name="first_number" value="<?php echo $num1; ?>" />
                <input type="hidden" name="operator" value="<?php echo $operation_string; ?>" />
                <input type="hidden" name="second_number" value="<?php echo $num2; ?>" />
                <input type="hidden" name="total" value="<?php echo $total; ?>" />
                <input type="hidden" name="score" value="<?php echo $score; ?>" />
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-3">
                        <input class="form-control" type="text" id="result" name="answer" placeholder="Enter answer">
                    </div>
                </div>
                <div class="col-sm-offset-4 col-sm-2">
                    <input type="submit" name="submit" class="btn btn-primary form-control" value="Submit" />
                </div>
            </form>
            <br />
            <hr>
            <div class='col-sm-offset-4'>
                <?php echo $correct; ?>
                <?php echo "Score: $score / $total"; ?>
            </div>
        </div>
    </body>
</html>