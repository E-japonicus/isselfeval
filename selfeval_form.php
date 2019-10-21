<?php
//　前回設定した目標の取得
$setgoal_sql = 'SELECT * FROM {issetgoal_rubrics} WHERE user_id = ? AND issetgoal_id = (SELECT id from {issetgoal} WHERE year = ? AND subject = ? AND times <= ? ORDER BY times DESC LIMIT 1);';
$setgoal_records = $DB->get_record_sql($setgoal_sql, array($USER->id, $isselfeval->year, $isselfeval->subject, $isselfeval->times));
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

<form method="post" action="" name="selfeval_rubrics">
    <table class="table table-bordered table-checked" style="height:200px;">
        <thead class="thead">
            <tr>
                <th style="text-align:center" rowspan="2" width="15%">規準</th>
                <th style="text-align:center" colspan="4">基準</th>
            </tr>
            <tr>
                <th style="text-align:center" width="15%">レベル０</th>
                <th style="text-align:center" width="15%">レベル１</th>
                <th style="text-align:center" width="15%">レベル２</th>
                <th style="text-align:center" width="15%">レベル３</th>
            </tr>
        </thead>
        <tbody>
        <?php for ($i=1; $i <= 11 ; $i++): ?>
            <tr height="150">
                <th>
                    <?php echo get_string("rubric[{$i}]", 'isselfeval')?>
                </th>
                <?php for ($j=0; $j < 4; $j++) :?>
                <!-- 設定した目標のspanを表示 -->
    			<?php $setgoal_label =  ($setgoal_records->{"rubric_{$i}"} === "{$j}") ? '</br></br><span class="last-time">設定した目標</span>' : '' ?>
                <td>
                    <label style="display: block; width:100%; height:100%;">
                        <input type="radio" name="rubric_<?php echo $i?>" value="<?php echo $j?>" required>
                        <?php echo get_string("rubric[{$i}]_score{$j}", 'isselfeval') ?>
                        <?php echo $setgoal_label ?>
                    </label>
                </td>   
                <?php endfor; ?>
            </tr>              
        <?php endfor; ?>
        </tbody>
    </table>
    <button class="submit-button" name="rubrics_submit">自己評価結果を登録する</button>
</form>

<script>
// ラジオボタン背景色
$(function(){
    $('.table-checked :radio').change(
        function() { 
            $('.table-checked td :radio').closest('td').removeClass('this-time');
            $('.table-checked td :checked').closest('td').addClass('this-time');
        }
    ).trigger('change');
});
</script>