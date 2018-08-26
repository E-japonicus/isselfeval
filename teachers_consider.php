<?php
$consider_records_sql = 
    'SELECT CO.*, {isselfeval_consider_updown}.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username 
    FROM ((SELECT * from {isselfeval_consider} where isselfeval_id = ?) CO
    INNER JOIN {user} on CO.user_id = {user}.id) 
    INNER JOIN {isselfeval_consider_updown} ON CO.id = {isselfeval_consider_updown}.consider_id';
$consider_records = $DB->get_records_sql($consider_records_sql, array($isselfeval->id));
?>

<div>
<?php
for ($n=1; $n < 12; $n++) :
?>
<span style="font-size: 2em;"><?php echo "rubric_".$n ?></span>
<table class="table table-striped">
    <tr>
        <th width="10%">名前</th>
        <th width="10%">ユーザー名</th>
        <th width="10%">UP_DOWN</th>
        <th width="70%">理由</th>
    </tr>
    <?php
    foreach ($consider_records as $record) :
    ?>
    <tr>
        <td>
            <?php echo $record->name; ?>
        </td>
        <td>
            <?php echo $record->username; ?>
        </td>
        <td>
             <?php echo $record->{"rubric_{$n}_updown"}; ?>
        </td>
        <td>
             <?php echo $record->{"rubric_{$n}"}; ?>
        </td>
    </tr>
    <?php
    endforeach;
    ?>
</table>

<?php
endfor;
?>

</div>