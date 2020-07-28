<?php for ($i=1; $i <= 8; $i++) :?>
<?php
$sql = "SELECT rubric_{$i} as rubric_{$i}_score, count(*) as score_count from {isselfeval_rubrics} WHERE isselfeval_id = ? GROUP BY rubric_{$i}";
$overall_records = $DB->get_records_sql($sql, array($isselfeval->id));

// 変数score_$nに値を代入する
for ($n=0; $n < 4; $n++) { 
    if (is_null($overall_records["{$n}"]->score_count)) {
        ${"score_".$n} = "0";
    } else {
        ${"score_".$n} = $overall_records["{$n}"]->score_count;
    }
}

if (!empty(get_string("rubric[{$i}]_score3", 'isselfeval')) && !empty(get_string("rubric[{$i}]_score0", 'isselfeval'))) {
    // score0~3が存在するルーブリックの場合
    $data_lab = 'labels: ["レベル3","レベル2", "レベル1", "レベル0"],';
    $data_col = 'backgroundColor: ["#32cd32", "#FF6384", "#36A2EB", "#FFCE56"],';
    $data_val = "data: [{$score_3}, {$score_2}, {$score_1}, {$score_0}]";
} elseif (!empty(get_string("rubric[{$i}]_score3", 'isselfeval')) && empty(get_string("rubric[{$i}]_score0", 'isselfeval'))){
    // score3が存在し，score0が存在しないルーブリックの場合
    $data_lab = 'labels: ["レベル3", "レベル2", "レベル1"],';
    $data_col = 'backgroundColor: ["#32cd32", "#FF6384", "#36A2EB"],';
    $data_val = "data: [{$score_3}, {$score_2}, {$score_1}]";
} else {
    // それ以外のルーブリックの場合
    $data_lab = 'labels: ["レベル2", "レベル1", "レベル0"],';
    $data_col = 'backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],';
    $data_val = "data: [{$score_2}, {$score_1}, {$score_0}]";
}

?>

<script>
var ctx = document.getElementById("rubric-graph-<?php echo $i ?>");
var myPieChart = new Chart(ctx, {
  //グラフの種類
  type: 'pie',
  //データの設定
  data: {
      //データ項目のラベル
      <?php echo $data_lab ?>
      
      //データセット
      datasets: [{
          //背景色
          <?php echo $data_col ?>
          //グラフのデータ
          <?php echo $data_val ?>
      }]
  },
  options: {
	  animation: {
		  animateRotate: false
	  },
	  legend: {
		  reverse: true
	  }
  }
	// 
});
</script>
<?php endfor;?>