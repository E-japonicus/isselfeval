<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>

<div>
<table class="table table-bordered">
	<tbody>
		<tr>
			<th style="text-align:center" width="50%">良問の基準</th>
			<th style="text-align:center" width="50%">演習目標</th>
		</tr>
		<tr>
			<td><?php echo get_string('good_quiz_help', 'isselfeval')?></td>
			<td><?php echo get_string('exercise_goal_help', 'isselfeval')?></td>
		</tr>
	</tbody>
</table>

<form method="post" action="" name="selfeval_rubrics">
    <table class="table table-bordered table-checked" style="height:200px;">
        <tbody>
            <tr>
                <th style="text-align:center" rowspan="2" colspan="2" width="15%">規準</th>
                <th style="text-align:center" colspan="4">基準</th>
            </tr>
            <tr>
                <th style="text-align:center" width="15%">レベル０</th>
                <th style="text-align:center" width="15%">レベル１</th>
                <th style="text-align:center" width="15%">レベル２</th>
                <th style="text-align:center" width="15%">レベル３</th>
            </tr>
            <?php for ($i=1; $i <= 11 ; $i++): ?>
                <tr height="150">
                    <th width="2%">
                        <?php echo $i ?>
                    </th>
                    <th>
                        <?php echo get_string("rubric[{$i}]", 'isselfeval')?>
                    </th>
                    <?php for ($j=0; $j < 4; $j++) :?>
                        <?php if (get_string("rubric[{$i}]_score{$j}", 'isselfeval') === '') :?>
                            <td></td>
                        <?php else:?>
                        <td>
                            <label style="display: block; width:100%; height:100%;">
                                <input type="radio" name="rubric_<?php echo $i?>" value="<?php echo $j?>" required>
                                <?php echo get_string("rubric[{$i}]_suffix", 'isselfeval').get_string("rubric[{$i}]_score{$j}", 'isselfeval') ?>
                            </label>
                        </td>
                        <?php endif;?>                    
                    <?php endfor; ?>
                </tr>              
            <?php endfor; ?>
            
        </tbody>
    </table>
    <button class="submit-button" name="rubrics_submit">自己評価結果を登録する</button>
    </form>
</div>

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