<?php
// 今回の自己評価結果の取得
$this_time_records = $DB->get_record('isselfeval_rubrics', $composite_key);
// 前回の自己評価結果の取得
$last_sql = 'SELECT * FROM {isselfeval_rubrics} WHERE user_id = ? AND isselfeval_id = (SELECT id from {isselfeval} WHERE year = ? AND subject = ? AND times < ? ORDER BY times DESC LIMIT 1);';
$last_time_records = $DB->get_record_sql($last_sql, array($USER->id, $isselfeval->year, $isselfeval->subject, $isselfeval->times));

$up_rubrics = array();
$down_rubrics = array();
for ($i=1; $i <= 11; $i++) { 
    if ($this_time_records->{"rubric_{$i}"} > $last_time_records->{"rubric_{$i}"}) {
        // 自己評価結果が上昇した評価規準
        $up_rubrics[] = $i;

    } elseif ($this_time_records->{"rubric_{$i}"} < $last_time_records->{"rubric_{$i}"}) {
        // 自己評価結果が低下した評価規準
        $down_rubrics[] = $i;
    }
}

// considerが登録されている場合
$consider = $DB->get_record('isselfeval_consider', $composite_key);
?>

<link rel="stylesheet" type="text/css" href="./style.css">
<!-- ページ遷移制限のためのjQueryの読み込み -->
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>

<table class="table table-bordered sticky" style="background-color:#fcfff9">
	<tbody>
		<tr>
			<th style="text-align:center" width="50%">相互評価用チェックリスト</th>
			<th style="text-align:center" width="50%">演習目標(作問の要件)</th>
		</tr>
		<tr>
			<td><?php echo get_string('good_quiz_help', 'isselfeval')?></td>
			<td><?php echo nl2br($isselfeval->target);?></td>
		</tr>
	</tbody>
</table>

<div style="padding: 20px 0px;">
今回のあなたの結果→<span class="this-time">&emsp;&emsp;</span>
前回のあなたの結果→<span class="last-time">前回</span>
</div>

<form method="post" action="" name="selfeval_consider">
<?php if(!empty($up_rubrics)):?>
<h1>前回から自己評価が向上した理由の考察</h1>
<table class="table table-bordered">
    <tbody>
        <tr>
			<th style="text-align:center" rowspan="2" width="15%">規準</th>
			<th style="text-align:center" colspan="4">基準</th>
			<th style="text-align:center" rowspan="2" width="25%">自己評価が変化した理由</th>
		</tr>
		<tr>
			<th style="text-align:center" width="15%">レベル0</th>
			<th style="text-align:center" width="15%">レベル1</th>
			<th style="text-align:center" width="15%">レベル2</th>
			<th style="text-align:center" width="15%">レベル3</th>
		</tr>
    <?php foreach ($up_rubrics as $up_key) :?>
        <tr height="150">
            <th>
                <?php echo get_string("rubric[{$up_key}]", 'isselfeval')?>
            </th>
            <?php for ($j=0; $j < 4; $j++) :?>
            <!-- ルーブリックの取得 -->
            <?php ${"dis_rubric_".$j} = (get_string("rubric[{$up_key}]_score{$j}", 'isselfeval') === '') ? '' : get_string("rubric[{$up_key}]_suffix", 'isselfeval').get_string("rubric[{$up_key}]_score{$j}", 'isselfeval') ?>
            <!-- 今回の結果のセルの色を変える -->
			<?php $this_time_class = ($this_time_records->{"rubric_{$up_key}"} === "{$j}") ? 'this-time' : '' ?>
            <!-- 前回の結果のspanを表示 -->
			<?php $last_time_label =  ($last_time_records->{"rubric_{$up_key}"} === "{$j}") ? '</br></br><span class="last-time">前回の結果</span>' : '' ?>
            <td class=<?php echo $this_time_class ?>>
                <?php echo ${"dis_rubric_".$j} ?>
                <?php echo $last_time_label ?>
            </td>
            <?php endfor;?>
            <td>
                <textarea name="<?php echo "rubric_{$up_key}"?>" rows="5" style="width:90%" placeholder="自己評価が向上した理由を記入してください" required><?php if (isset($consider->{"rubric_{$up_key}"})) { echo $consider->{"rubric_{$up_key}"};}?></textarea>
                <input type="hidden" name="<?php echo "rubric_{$up_key}_updown"?>" value="up">
            </td>
    <?php endforeach;?>
    </tbody>
</table>
<?php endif;?>

<?php if(!empty($down_rubrics)):?>
<h1>前回から自己評価が低下した理由の考察</h1>
<table class="table table-bordered">
    <tbody>
        <tr>
			<th style="text-align:center" rowspan="2" width="15%">規準</th>
			<th style="text-align:center" colspan="4">基準</th>
			<th style="text-align:center" rowspan="2" width="25%">自己評価が変化した理由</th>
		</tr>
		<tr>
			<th style="text-align:center" width="15%">レベル0</th>
			<th style="text-align:center" width="15%">レベル1</th>
			<th style="text-align:center" width="15%">レベル2</th>
			<th style="text-align:center" width="15%">レベル3</th>
		</tr>
    <?php foreach ($down_rubrics as $down_key) :?>
        <tr height="150">
            <th>
                <?php echo get_string("rubric[{$down_key}]", 'isselfeval')?>
            </th>
            <?php for ($j=0; $j < 4; $j++) :?>
            <!-- ルーブリックの取得 -->
            <?php ${"dis_rubric_".$j} = (get_string("rubric[{$down_key}]_score{$j}", 'isselfeval') === '') ? '' : get_string("rubric[{$down_key}]_suffix", 'isselfeval').get_string("rubric[{$down_key}]_score{$j}", 'isselfeval') ?>
            <!-- 今回の結果のセルの色を変える -->
			<?php $this_time_class = ($this_time_records->{"rubric_{$down_key}"} === "{$j}") ? 'this-time' : '' ?>
            <!-- 前回の結果のspanを表示 -->
			<?php $last_time_label =  ($last_time_records->{"rubric_{$down_key}"} === "{$j}") ? '</br></br><span class="last-time">前回の結果</span>' : '' ?>
            <td class=<?php echo $this_time_class ?>>
                <?php echo ${"dis_rubric_".$j} ?>
                <?php echo $last_time_label ?>
            </td>
            <?php endfor;?>
            <td>
                <textarea name="<?php echo "rubric_{$down_key}"?>" rows="5" style="width:90%" placeholder="自己評価が向上した理由を記入してください" required><?php if (isset($consider->{"rubric_{$down_key}"})) { echo $consider->{"rubric_{$down_key}"};}?></textarea>
                <input type="hidden" name="<?php echo "rubric_{$down_key}_updown"?>" value="down">
            </td>
    <?php endforeach;?>
    </tbody>
</table>
<?php endif;?>

<button class="submit-button" name="consider_submit">変化した理由を保存する</button>
</form>

<!-- form入力途中のページ遷移を制限する -->
<script>
$(function(){
var form_change_flg = false;
	window.onbeforeunload = function(e) {
		if (form_change_flg) {
			e.returnValue = "入力画面を閉じようとしています。入力中の情報がありますがよろしいですか？";
		}
	}
    //フォームの内容が変更されたらフラグを立てる
    $("form textarea").change(function() {
  		form_change_flg = true;
  	});
    // フォーム送信時はアラートOFF
    $('form[name=selfeval_consider]').submit(function(){
        form_change_flg = false;
    });
});
</script>