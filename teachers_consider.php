<?php
// 値が変化したルーブリックのレコードを取得
$consider_records_sql = 
    'SELECT CO.*, {isselfeval_consider_updown}.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username 
    FROM ((SELECT * from {isselfeval_consider} where isselfeval_id = ?) CO
    INNER JOIN {user} on CO.user_id = {user}.id) 
    INNER JOIN {isselfeval_consider_updown} ON CO.id = {isselfeval_consider_updown}.consider_id';
$consider_records = $DB->get_records_sql($consider_records_sql, array($isselfeval->id));
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th width="10%">Ru.</th>
            <th width="10%">名前</th>
            <th width="10%">ユーザー名</th>
            <th width="10%">UP_DOWN</th>
            <th width="60%">理由</th>
        </tr>
    </thead>
    <?php for ($i=1; $i <= 11; $i++) : ?>
    <?php foreach ($consider_records as $record) : ?>
    <?php if (!empty($record->{"rubric_{$i}_updown"})) :?>
    <tbody>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $record->name; ?></td>
            <td><?php echo $record->username; ?></td>
            <td><?php echo $record->{"rubric_{$i}_updown"}; ?></td>
            <td><?php echo $record->{"rubric_{$i}"}; ?></td>
        </tr>
    </tbody>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php endfor; ?>
</table>