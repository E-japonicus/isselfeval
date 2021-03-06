<?php
// 今回の自己評価結果の取得
$this_time_records = $DB->get_record('isselfeval_rubrics', $composite_key);
// 前回の自己評価結果の取得
$last_sql = 'SELECT * FROM {isselfeval_rubrics} WHERE user_id = ? AND isselfeval_id = (SELECT id from {isselfeval} WHERE year = ? AND subject = ? AND times < ? ORDER BY times DESC LIMIT 1);';
$last_time_records = $DB->get_record_sql($last_sql, array($USER->id, $isselfeval->year, $isselfeval->subject, $isselfeval->times));
// 全体の平均
$overall_sql = 'SELECT AVG(rubric_1) as rubric_1, AVG(rubric_2) as rubric_2, AVG(rubric_3) as rubric_3, AVG(rubric_4) as rubric_4, AVG(rubric_5) as rubric_5, AVG(rubric_6) as rubric_6, 
				AVG(rubric_7) as rubric_7, AVG(rubric_8) as rubric_8, AVG(rubric_9) as rubric_9, AVG(rubric_10) as rubric_10, AVG(rubric_11) as rubric_11 FROM {isselfeval_rubrics} WHERE isselfeval_id = ?';
$overall_records = $DB->get_record_sql($overall_sql, array($isselfeval->id));
// 自己評価が変化した理由
$consider_records = $DB->get_record('isselfeval_consider', $composite_key);

include './TJE_average.php';
$this_time_avg = tje_average($this_time_records);
$last_time_avg = tje_average($last_time_records);
$overall_avg   = tje_average($overall_records);

?>

<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
<!-- グラフのライブラリの読み込み -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

<h1>レーダーチャート</h1>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td style="text-align:center;" width="40%" rowspan="5"><canvas id="graph-radar" width=“30” height=“30”></canvas></td>
			<td style="text-align:center;" width="10%"></td>
			<th class="table-title" width="10%">今回の得点</th>
			<th class="table-title" width="10%">前回の得点</th>
			<th class="table-title" width="10%">全体の平均</th>
		</tr>
		<tr>
			<th class="table-title">思考力</br>(満点10点)</th>
			<td class="table-val"><?php echo $this_time_avg['think'] ?></td>
			<td class="table-val"><?php echo $last_time_avg['think'] ?></td>
			<td class="table-val"><?php echo $overall_avg['think'] ?></td>
		</tr>
		<tr>
			<th class="table-title">判断力</br>(満点10点)</th>
			<td class="table-val"><?php echo $this_time_avg['judge'] ?></td>
			<td class="table-val"><?php echo $last_time_avg['judge'] ?></td>
			<td class="table-val"><?php echo $overall_avg['judge'] ?></td>
		</tr>
		<tr>
			<th class="table-title">表現力</br>(満点10点)</th>
			<td class="table-val"><?php echo $this_time_avg['expre'] ?></td>
			<td class="table-val"><?php echo $last_time_avg['expre'] ?></td>
			<td class="table-val"><?php echo $overall_avg['expre'] ?></td>
		</tr>
		<tr>
			<th class="table-title">総点</br>(満点30点)</th>
			<td class="table-val"><?php echo $this_time_avg['sum'] ?></td>
			<td class="table-val"><?php echo $last_time_avg['sum'] ?></td>
			<td class="table-val"><?php echo $overall_avg['sum'] ?></td>
		</tr>
	</tbody>
</table>

<h1>あなたの結果と全体の傾向</h1>
<div style="padding: 20px 0px;">
今回のあなたの結果→<span class="this-time">&emsp;&emsp;</span>
前回のあなたの結果→<span class="last-time">前回</span>
</div>

<table class="table table-bordered">
	<thead class="thead">
		<tr>
			<th style="text-align:center" rowspan="2" width="15%">規準</th>
			<th style="text-align:center" colspan="4">基準</th>
            <th style="text-align:center" rowspan="2" width="25%">自己評価が変化した理由</th>
			<th style="text-align:center" rowspan="2">全体の傾向</th>
		</tr>
		<tr>
			<th style="text-align:center" width="15%">レベル０</th>
			<th style="text-align:center" width="15%">レベル１</th>
			<th style="text-align:center" width="15%">レベル２</th>
			<th style="text-align:center" width="15%">レベル３</th>
		</tr>
	</thead>
	<tbody>
	<?php for ($i=1; $i <= 8 ; $i++): ?>
		<tr>
			<th>
				<?php echo get_string("rubric[{$i}]", 'isselfeval') ?>
			</th>
			<?php for ($j=0; $j < 4; $j++) : ?>
				<!-- 今回の結果のセルの色を変える -->
				<?php $this_time_class = ($this_time_records->{"rubric_{$i}"} === "{$j}") ? 'this-time' : '' ?>
				<!-- 前回の結果のspanを表示 -->
				<?php $last_time_label =  ($last_time_records->{"rubric_{$i}"} === "{$j}") ? '</br></br><span class="last-time">前回の結果</span>' : '' ?>

				<td class=<?php echo $this_time_class ?>>
					<?php echo get_string("rubric[{$i}]_score{$j}", 'isselfeval') ?>
					<?php echo $last_time_label ?>
				</td>
			<?php endfor; ?>
			<td>
				<?php echo $consider_records->{"rubric_{$i}"} ?>
			</td>
			<td>
				<!-- グラフの描写 -->
				<?php echo "<canvas height='180' id='rubric-graph-{$i}'></canvas>"?>
			</td>
		</tr>			
	<?php endfor; ?>
	</tbody>
</table>

<table class="table table-bordered" style="background-color:#fcfff9">
	<thead>
		<tr>
			<th style="text-align:center" width="50%">相互評価用チェックリスト</th>
			<th style="text-align:center" width="50%">演習目標(作問の要件)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo get_string('good_quiz_help', 'isselfeval')?></td>
			<td><?php echo nl2br($isselfeval->target);?></td>
		</tr>
	</tbody>
</table>

<?php if ($last_time_records) :?>
<form method="post" action="" name="selfeval_consider_edit">
	<button class="submit-button" name="consider_edit">自己評価が変化した理由を編集する</button>
</form>
<?php else: ?>
<form method="post" action="" name="selfeval_reason_edit">
	<button class="submit-button" name="reason_edit">基準を選択した理由を編集する</button>
</form>
<?php endif;?>

<!-- レーダーチャートの読み込み -->
<?php include_once './create_radar_chart.php' ?>
<!-- 円グラフの読み込み -->
<?php include_once './create_pie_chart.php' ?>