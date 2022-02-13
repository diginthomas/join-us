<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
      
       
    </head>
    <body><center>
        
 
        <?php
          
            if (!isset($_GET['submit'])) {
              echo "   Enter Text";
                $formOut = <<<FORM
                <form action="$_SERVER[PHP_SELF]" method="get">
                    <input type="text" name="inputString">
                    <br>
                    <input type="submit" name="submit" value="convert">
                </form>
                        
FORM;
                 echo $formOut;
            } else { 

                $inputString = $_GET['inputString'];

                if($inputString) {
                    $words = explode(" ", $inputString);
                    $newPhrase = "";

                  
                    foreach($words as $word) {

                    
                        $word = trim($word, ".,;:'\"? \t\n-()_0..9");

                      
                        if($word) {

                            if(stristr("aeiou", substr($word, 0 ,1))) {

                              
                                $word .= "way";

                            } else {

                              
                                $firstLetter = substr($word, 0, 1);
                                $word = substr($word, 1) . $firstLetter . "ay";

                            }

                           
                            $newPhrase .= $word . " ";

                        }
                    }


                
                    echo $inputString." : "
                        .$newPhrase;
                } else {

                   
                    echo "plz enter text";
                }
            } 
        ?>
    </body>
</html>