<?php
// 全てのレコードを取得する
$rubric_records = $DB->get_records_sql(
    'SELECT A.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username
    from (select * from {isselfeval_rubrics} where isselfeval_id = ?) A 
    inner join {user} on A.user_id = {user}.id
    order by A.user_id',
    array($isselfeval->id));
?>
<div>
    <span><?php echo count($rubric_records); ?>件</span>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>名前</th>
          <th>ユーザ名</th>

          <th>ﾙｰﾌﾞﾘｯｸ[1]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[2]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[3]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[4]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[5]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[6]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[7]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[8]</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rubric_records as $record): ?>
          <tr>
            <th><?php echo $record->name      ; ?></th>
            <th><?php echo $record->username  ; ?></th>

            <?php
            for ($i=1; $i <= 8; $i++) {
              echo "<th>".$record->{"rubric_{$i}"}."</th>";
            }
            ?>

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>