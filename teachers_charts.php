<?php
// 全体の平均
$overall_sql = 'SELECT AVG(rubric_1) as rubric_1, AVG(rubric_2) as rubric_2, AVG(rubric_3) as rubric_3, AVG(rubric_4) as rubric_4, AVG(rubric_5) as rubric_5, AVG(rubric_6) as rubric_6, 
				AVG(rubric_7) as rubric_7, AVG(rubric_8) as rubric_8, AVG(rubric_9) as rubric_9, AVG(rubric_10) as rubric_10, AVG(rubric_11) as rubric_11 FROM {isselfeval_rubrics} WHERE isselfeval_id = ?';
$overall_records = $DB->get_record_sql($overall_sql, array($isselfeval->id));
include './TJE_average.php';
$overall_avg   = tje_average($overall_records);
?>

<h1>レーダーチャート</h1>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td style="text-align:center;" width="40%" rowspan="5"><canvas id="graph_radar" width=“30” height=“30”></canvas></td>
			<td style="text-align:center;" width="10%"></td>
			<th class="table-title" width="10%">全体の平均</th>
		</tr>
		<tr>
			<th class="table-title">思考力</br>(満点10点)</th>
			<td class="table-val"><?php echo $overall_avg['think'] ?></td>
		</tr>
		<tr>
			<th class="table-title">判断力</br>(満点10点)</th>
			<td class="table-val"><?php echo $overall_avg['judge'] ?></td>
		</tr>
		<tr>
			<th class="table-title">表現力</br>(満点10点)</th>
			<td class="table-val"><?php echo $overall_avg['expre'] ?></td>
		</tr>
		<tr>
			<th class="table-title">総点</br>(満点30点)</th>
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
	<tbody>
		<tr>
			<th style="text-align:center" rowspan="2" width="15%">規準</th>
			<th style="text-align:center" colspan="4">基準</th>
			<th style="text-align:center" rowspan="2">全体の傾向</th>
		</tr>
		<tr>
			<th style="text-align:center" width="15%">レベル０</th>
			<th style="text-align:center" width="15%">レベル１</th>
			<th style="text-align:center" width="15%">レベル２</th>
			<th style="text-align:center" width="15%">レベル３</th>
		</tr>
		<?php for ($i=1; $i <= 11 ; $i++): ?>
			<tr>
				<th><?php echo get_string("rubric[{$i}]", 'isselfeval')?></th>
				<?php for ($j=0; $j < 4; $j++) : ?>
				<!-- ルーブリックの取得 -->
				<?php ${"dis_rubric_".$j} = (get_string("rubric[{$i}]_score{$j}", 'isselfeval') === '') ? '' : get_string("rubric[{$i}]_suffix", 'isselfeval').get_string("rubric[{$i}]_score{$j}", 'isselfeval') ?>
				<td>
					<?php echo ${"dis_rubric_".$j} ?>
				</td>
				<?php endfor; ?>
				<!-- グラフの描写 -->
				<td><?php echo "<canvas height='180' id='rubric_graph_{$i}'></canvas>"?></td>
			</tr>			
		<?php endfor; ?>
		
	</tbody>
</table>

<!-- レーダーチャートの読み込み -->
<?php include_once './create_radar_teacher.php' ?>
<!-- 円グラフの読み込み -->
<?php include_once './create_pie_chart.php' ?>