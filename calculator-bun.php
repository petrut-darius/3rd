<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <input type="number" value="a" placeholder="Numarul 1">
        <input type="number" value="b" placeholder="Numarul 2">
        <select name='operator'>
            <optin value="add">+</optin>
            <optin value="minus">-</optin>
            <optin value="multiply">*</optin>
            <optin value="substract">:</optin>
        </select>
        <button>Submit</button>
        
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //dau valoare a ce trimit utilizatorii
            $a = filter_input(INPUT_POST, "a" ,FILTER_VALIDATE_FLOAT);
            $b = filter_input(INPUT_POST, "b" ,FILTER_VALIDATE_FLOAT);
            $operator = htmlspecialchars($_POST['operator']);


            // in cazul in care nu merge cum trebuie
            $erors = false;
            
            if(empty($a) or empty($b)){
                echo "<p>fill all the fields</p>";
                $erors = true;
            }

            if(!is_numeric($a) or !is_numeric($b)){
                echo "<p>Only use numbers</p>";
                $erors = true;
            }

            // aici calculez numerele daca nu sunt probleme
            if($erors = false){
                $value = 0;
                switch($operator){
                    case 'add':
                        $value = $a + $b;
                        break;
                    case 'minus':
                        $value = $a - $b;
                        break;
                    case 'multiply':
                         $value = $a * $b;
                         break;
                    case 'divide':
                        $value = $a / $b;
                        break;
                    deflate:
                        echo"<p>Something went wrong</p>";
                    }
                
                echo '<p> Result is ' . $value;
            }
        }
    
    ?>




    </form>    


</body>
</html>
