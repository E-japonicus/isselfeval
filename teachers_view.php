<link rel="stylesheet" type="text/css" href="./style.css">
<!-- グラフのライブラリの読み込み -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#form">フォーム</a></li>
  <li><a data-toggle="tab" href="#charts">全体の傾向</a></li>
  <li><a data-toggle="tab" href="#list">ルーブリック登録一覧</a></li>
  <li><a data-toggle="tab" href="#consider">自己評価が変化した理由一覧</a></li>
</ul>

<div class="tab-content">
  <div id="form" class="tab-pane fade fade in active">
    <?php require_once("{$CFG->dirroot}/mod/isselfeval/selfeval_form.php"); ?>
  </div>

  <div id="charts" class="tab-pane fade">
    <?php require_once("{$CFG->dirroot}/mod/isselfeval/teachers_charts.php"); ?>
  </div>

  <div id="list" class="tab-pane fade">
    <?php require_once("{$CFG->dirroot}/mod/isselfeval/teachers_list.php"); ?>
  </div>

  <div id="consider" class="tab-pane">
    <?php require_once("{$CFG->dirroot}/mod/isselfeval/teachers_consider.php"); ?>
  </div>
</div>
  

