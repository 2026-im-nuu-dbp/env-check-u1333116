<?php
$arr=['桂花'=>30, '梅花'=>70, ' 梨花'=>24,  '茶花'=>134, '桔梗'=>33,      '山櫻'=>234, '吉野櫻'=>43
];
foreach($arr as $key=>$value){
    echo $key.'=>'.$value.'<br>';
}
asort($arr);
foreach($arr as $key=>$value){
    echo $key.'=>'.$value.'<br>';
}
?>