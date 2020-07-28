<?php
// 今回の自己評価結果の取得
$this_time_records = $DB->get_record('isselfeval_rubrics', $composite_key);

// considerが登録されている場合
$consider = $DB->get_record('isselfeval_consider', $composite_key);
?>

<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

<div class="sticky">
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
</div>

<div style="padding: 20px 0px;">
今回のあなたの結果→<span class="this-time">&emsp;&emsp;</span>
</div>

<form method="post" action="" name="selfeval_consider">
<h1>基準を選択した理由の考察</h1>
<table class="table table-bordered">
    <thead class="thead">
        <tr>
			<th style="text-align:center" rowspan="2" width="15%">規準</th>
			<th style="text-align:center" colspan="4">基準</th>
			<th style="text-align:center" rowspan="2" width="25%">基準を選択した理由</th>
		</tr>
		<tr>
			<th style="text-align:center" width="15%">レベル0</th>
			<th style="text-align:center" width="15%">レベル1</th>
			<th style="text-align:center" width="15%">レベル2</th>
			<th style="text-align:center" width="15%">レベル3</th>
		</tr>
    </thead>
    <tbody>
    <?php for ($i=1; $i <= 8; $i++) :?>
        <tr height="150">
            <th>
                <?php echo get_string("rubric[{$i}]", 'isselfeval')?>
            </th>
            <?php for ($j=0; $j < 4; $j++) :?>
            <!-- 今回の結果のセルの色を変える -->
			<?php $this_time_class = ($this_time_records->{"rubric_{$i}"} === "{$j}") ? 'this-time' : '' ?>
            <td class=<?php echo $this_time_class ?>>
                <?php echo get_string("rubric[{$i}]_score{$j}", 'isselfeval') ?>
            </td>
            <?php endfor;?>
            <td>
                <textarea name="<?php echo "rubric_{$i}"?>" rows="5" style="width:90%" placeholder="基準を選択した理由を記入してください"><?php if (isset($consider->{"rubric_{$i}"})) { echo $consider->{"rubric_{$i}"};}?></textarea>
                <input type="hidden" name="<?php echo "rubric_{$i}_updown"?>" value="1st">
            </td>
    <?php endfor;?>
    </tbody>
</table>

<button class="submit-button" name="consider_submit">選択した理由を登録する</button>
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