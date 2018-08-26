<?php

function tje_average($records){

    // TJEの合計
    $think_sum = array((int)$records->rubric_1, (int)$records->rubric_2, (int)$records->rubric_3, (int)$records->rubric_4, (int)$records->rubric_5, (int)$records->rubric_6, (int)$records->rubric_7);
    $judge_sum = array((int)$records->rubric_1, (int)$records->rubric_3, (int)$records->rubric_4, (int)$records->rubric_8, (int)$records->rubric_11);
    $expre_sum = array((int)$records->rubric_4, (int)$records->rubric_5, (int)$records->rubric_9, (int)$records->rubric_10);

    // TJEの値
    $think = round((array_sum($think_sum) * (10/18)), 1);
    $judge = round((array_sum($judge_sum) * (10/13)), 1);
    $expre = round((array_sum($expre_sum) * (10/11)), 1);

    $tje_sum = $think + $judge + $expre;

    $data_label = '['. $think .','. $judge .','. $expre. ']';

    return array('think' => $think, 'judge' => $judge, 'expre' => $expre, 'sum' => $tje_sum, 'data_label' => $data_label);
}

?>