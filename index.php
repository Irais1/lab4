<?php
    $backgroundImage = "Slider/img/sea.jpg";
    if(isset($_GET['keyword']))
    {
        include 'Slider/api/pixabayAPI.php';
        $keyword = $_GET['keyword'];
        $imageURLs = getImageURLs($keyword);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    // else{
    //     $backgroundImage = "img/sea.jpg";
    // }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset = "utf-8">
        <link href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet">
       
        <style>
            @import url("Slider/css/styles.css");
            body{
                background-image:url(<?=$backgroundImage?>);
            }
        </style>
    </head>
    <body>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>-->
        
        <br/>
        <?php
            if(!isset($imageURLs))
             {
                echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com</h2>";
            
             }else {
               //Display Carousel Here
            
             
        
        ?>
        <!--<h1>You searched for </h1>-->
        <div id  = "carousel-example-generic" class = "carousel slide" data-ride = "carousel">
            <ol class ="carousel-indicators">
            
            <?php
                for($i = 0; $i < 7; $i++)
                {
                    echo "<li data-target ='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0) ? "class ='active'" : "";
                    echo "></li>";
                }
                ?>
            </ol>
            <div class = "carousel-inner" role = "listbox">
                
                <?php
                    for($i = 0; $i < 7; $i++)
                    {
                        do{
                            $randomIndex = rand(0,count($imageURLs));
                        }while(!isset($imageURLs[$randomIndex]));
                        echo '<div class="item ';
                        echo ($i ==0) ? "active" : "";
                        echo '">';
                        echo '<img src = "' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>    
           
            
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
            }
        ?>
        <form>
            <input type ="text" name = "keyword" placeholder = "Keyword" value = "<?=$_GET['keyword']?>"/>
            <input type = "radio" id = "lhorizontal" name = "layout" value = "horizontal">
            <label  for = "Horizontal"></lable><label for = "lhorizontal">Horizontal</lable>
            <input type = "radio" id = "lvertical" name = "layout" value = "vertical">
            <lable for "vertical"></lable><label for="lvertical">Vertical</label>
            <select name = "category">
                <option value = "">Select One</option>
                <option value = "ocean">Sea</option>
                <option value = "forest">Forest</option>
                <option value = "montain">Montain</option>
                <option value = "<?$keyword='snow'?>">Snow</option>
            </select>
            <input type = "submit" value = "Submit"/>
        </form>
        <br/>
        <br/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.bundle.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </body>
</html>