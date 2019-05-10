<?php

function tje_average($records){

    // TJEの合計
    $think_sum = array($records->rubric_1, $records->rubric_2, $records->rubric_3, $records->rubric_4, $records->rubric_5, $records->rubric_10, $records->rubric_11);
    $judge_sum = array($records->rubric_1, $records->rubric_3, $records->rubric_5, $records->rubric_7, $records->rubric_8, $records->rubric_10);
    $expre_sum = array($records->rubric_4, $records->rubric_6, $records->rubric_9, $records->rubric_10);

    // TJEの値
    $think = round((array_sum($think_sum) * (10/21)), 1);
    $judge = round((array_sum($judge_sum) * (10/18)), 1);
    $expre = round((array_sum($expre_sum) * (10/12)), 1);

    $tje_sum = $think + $judge + $expre;

    $data_label = '['. $think .','. $judge .','. $expre. ']';

    return array('think' => $think, 'judge' => $judge, 'expre' => $expre, 'sum' => $tje_sum, 'data_label' => $data_label);
}

?>