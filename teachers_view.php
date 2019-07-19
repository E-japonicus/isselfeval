<link rel="stylesheet" type="text/css" href="./style.css">

<!-- グラフのライブラリの読み込み -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>



<!-- タブボタン部分 -->
<div class="tab-button">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a href="#form" class="nav-link active" data-toggle="tab">フォーム</a>
    </li>
    <li class="nav-item">
      <a href="#charts" class="nav-link" data-toggle="tab">全体の傾向</a>
    </li>
    <li class="nav-item">
      <a href="#list" class="nav-link" data-toggle="tab">登録一覧</a>
    </li>
    <li class="nav-item">
      <a href="#consider" class="nav-link" data-toggle="tab">変化理由一覧</a>
    </li>
  </ul>
</div>
  
<!--タブのコンテンツ部分-->
<div class="tab-content">
  <div id="form" class="tab-pane active">
    <?php require_once("{$CFG->dirroot}/mod/isselfeval/selfeval_form.php"); ?>
  </div>
  <div id="charts" class="tab-pane">
    <?php require_once("{$CFG->dirroot}/mod/isselfeval/teachers_charts.php"); ?>
  </div>
  <div id="list" class="tab-pane">
    <?php require_once("{$CFG->dirroot}/mod/isselfeval/teachers_list.php"); ?>
  </div>
  <div id="consider" class="tab-pane">
    <?php require_once("{$CFG->dirroot}/mod/isselfeval/teachers_consider.php"); ?>
  </div>
</div>