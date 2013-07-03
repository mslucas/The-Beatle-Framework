<div class="container">
<?php
if(isset($AppPanel_dados)){

   foreach($AppPanel_dados as $key => $value){
        echo $key.' - ';
        if(is_array($value)){
            var_dump($value);     
        }
        else{
            echo $value;
        }
        echo '<br>';
    }
}
?>
</div><!-- fim container -->