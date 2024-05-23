<?php
function listHTML($data, $class) {
    $StepUL = str_replace('ulStart','<ul class="'.$class.'">',$data);
    $stepUlEnd = str_replace('ulEnd','</ul>',$StepUL);
    $stepLI = str_replace('listStart','<li>',  $stepUlEnd);
    $text = str_replace('listEnd','</li>', $stepLI);
    return $text;
}
function lineBreak($data) {
   return str_replace('*','<br/>', $data); 
}
function strongHTML($data){
    $setp1 = str_replace('strongStart', '<strong class="dayweek">', $data);
    return str_replace('strongEnd', ' </strong>', $setp1);
}
function linkHTML ($data) {
    $link = null;
    $startTag = "titleLinkStart";
    $endTag = "titleLinkEnd";
    $linkPattern = '/titleLinkStart (.*?) titleLinkEnd \[(https?:\/\/[^\]]+)\]/s';
    if (preg_match($linkPattern, $data, $matches)) {
        $text = $matches[1];
        $url = $matches[2];
        $link = '<a class="link" href="' . htmlspecialchars($url) . '">' . htmlspecialchars($text) . '</a>';

        $data = preg_replace($linkPattern, $link, $data);
    }
    return $data;
}
function selectHTML($data, $label, $selectList) {
    echo '<div class="publish">
    '.$selectList[$data].'
    <label for="'.$label.'"></label>';
    echo '<select name="'.$label.'">';
    for ($i=0; $i <count($selectList); $i++) { 
        if($data == $i) {
            echo '<option value="'.$i.'" selected>'.$selectList[$i].'</option>';
        } else {
            echo '<option value="'.$i.'">'.$selectList[$i].'</option>';
        }
    }
    echo '</select></div>';  
}