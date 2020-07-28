<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 * English strings for isselfeval
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_isselfeval
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['modulename'] = '自己評価モジュール(H30後期~)';
$string['modulenameplural'] = '自己評価モジュール(H30後期~)';
$string['modulename_help'] = '学習者がルーブリックを基に自己評価を行うモジュールです。';
$string['isselfeval:addinstance'] = 'Add a new isselfeval';
$string['isselfeval:submit'] = 'Submit isselfeval';
$string['isselfeval:view'] = 'View isselfeval';
$string['isselfevalfieldset'] = 'Custom example fieldset';
$string['isselfevalname'] = '自己評価タイトル';
$string['isselfevalname_help'] = '入力したテキストはコースへ追加した際に表示されます。<br />例) 第x回自己評価';
$string['isselfeval'] = 'isselfeval';
$string['pluginadministration'] = 'isselfeval administration';
$string['pluginname'] = 'isselfeval';

// 相互評価用チェックリスト
$string['good_quiz_help'] = '
・問題文や答え，解説が正しい<br>
・誤答選択肢には妥当な選択肢が設定されている（明らかに誤答と分かる選択肢がない）<br>
・解説に答えを導く計算過程が書かれており，不正解した学生が見て分かりやすい解説になっている<br>
・話し言葉でなく書き言葉を用いており，文体を統一している<br>
・誤字脱字がない<br>
・曖昧な表現や分かりにくい表現がない（主語述語のねじれや同じ言葉の繰り返しがない）<br>
・専門用語を正しく用いている<br>
・指定された形式で問題を作成している<br>
・参照した文献の文献番号やウェブサイトのURL，アクセス日を記載している<br>
';

$string['rubric[1]']        = '作問課題に関連する単元や内容を列挙して構造化する';
$string['rubric[1]_help']   = '';
$string['rubric[1]_suffix'] = '';
$string['rubric[1]_score0'] = '・作問課題の出題範囲を<span class="highlight">見直していない</span><br>・作問課題に関連する単元や内容を<span class="highlight">十分に理解していない</span>';
$string['rubric[1]_score1'] = '今回の作問課題に関連する単元や内容を<span class="highlight">列挙した</span>';
$string['rubric[1]_score2'] = '今回の作問課題に関連する単元や内容を<span class="highlight">列挙し、それらの関連性を分析した</span>';
$string['rubric[1]_score3'] = '今回の作問課題に関連する単元や内容を<span class="highlight">比較・分類し、どのような問題が作れそうか予測した</span>';
$string['rubric[1]_ability'] = '"思考力[作問を通じた創造的思考力]：利用できると思われる出題箇所の列挙<br>判断力：利用できると思われる出題箇所の列挙"';

$string['rubric[2]']        = '解答者がどの程度正解しそうか仮説を形成し出題する内容を決定する';
$string['rubric[2]_help']   = '';
$string['rubric[2]_suffix'] = '';
$string['rubric[2]_score0'] = '解答者がどの程度正解しそうか仮説を<span class="highlight">形成（予測）しないで、出題する内容を決定した</span>';
$string['rubric[2]_score1'] = '過去問題の正答率や作問学習の<span class="highlight">結果を把握したうえで</span>出題する内容を決定した';
$string['rubric[2]_score2'] = '過去問題の正答率や作問学習の結果を<span class="highlight">分析し、今回の出題範囲の知識との関連性を比較したうえで、</span>出題する内容を決定した';
$string['rubric[2]_score3'] = '過去問題の正答率や作問学習の結果を<span class="highlight">分析し、今回の出題範囲の知識との関連性を比較したうえで、解答者がどの程度正解しそうか仮説を形成（予測）して</span>出題する内容を決定した';
$string['rubric[2]_ability'] = '思考力[推論,仮説]：知識や情報に基づく仮説の形成<br>判断力：出題箇所の比較・決定';

$string['rubric[3]']        = '自分で工夫した問題を作成することができる';
$string['rubric[3]_help']   = '';
$string['rubric[3]_suffix'] = '';
$string['rubric[3]_score0'] = '・問題(選択肢、解説を含む)を<span class="highlight">作成しなかった</span><br>・既存の問題と<span class="highlight">ほぼ同じ問題を作成した</span>';
$string['rubric[3]_score1'] = '既存の問題を列挙し、既存の問題の<span class="highlight">一部を修正（選択肢や数字を変える等）して</span>問題を作成した';
$string['rubric[3]_score2'] = '既存の問題を比較・分析し、既存の問題と<span class="highlight">類似した問題（同じ解法で解答できる問題等）</span>を作成した';
$string['rubric[3]_score3'] = '既存の問題を比較・分析し、<span class="highlight">既存の問題の解法を新しい場面や状況に応用した</span>問題を作成した';
$string['rubric[3]_ability'] = '';

$string['rubric[4]']        = '相互評価用チェックリストに従った問題を作成できる';
$string['rubric[4]_help']   = '';
$string['rubric[4]_suffix'] = '';
$string['rubric[4]_score0'] = '相互評価用チェックリストの項目を<span class="highlight">意識せずに</span>問題を作成した';
$string['rubric[4]_score1'] = '相互評価用チェックリストの項目を<span class="highlight">意識して</span>問題を作成した';
$string['rubric[4]_score2'] = '相互評価用チェックリストの項目を<span class="highlight">逐次確認しながら</span>問題を作成した';
$string['rubric[4]_score3'] = '相互評価用チェックリストの項目を<span class="highlight">満たしているか、逐次評価しながら</span>問題を作成した';
$string['rubric[4]_ability'] = '表現力：作問時における文法的表現';

$string['rubric[5]']        = '相互評価用チェックリストに従ってグループメンバーの問題を正しく評価できる';
$string['rubric[5]_help']   = '';
$string['rubric[5]_suffix'] = '';
$string['rubric[5]_score0'] = '相互評価用チェックリストを<span class="highlight">意識せずに</span>グループメンバーの問題を評価した';
$string['rubric[5]_score1'] = '相互評価用チェックリストの項目を<span class="highlight">意識して</span>グループメンバーの問題を評価した';
$string['rubric[5]_score2'] = '相互評価用チェックリストの項目を<span class="highlight">逐次確認しながら</span>グループメンバーの問題を評価した';
$string['rubric[5]_score3'] = '相互評価用チェックリストの項目を<span class="highlight">満たしているか、逐次評価しながら</span>グループメンバーの問題を評価した';
$string['rubric[5]_ability'] = '判断力：問題の評価・選択';

$string['rubric[6]']        = '問題の相互評価の際に、グループメンバーの問題の表現や難易度等の改善点について自分の意見や考えを伝えることができる';
$string['rubric[6]_help']   = '';
$string['rubric[6]_suffix'] = '';
$string['rubric[6]_score0'] = '自分の意見や考えを<span class="highlight">伝えることができなかった（コメントを投稿しなかった）</span>';
$string['rubric[6]_score1'] = 'グループメンバーの<span class="highlight">問題を解いた感想</span>を伝えることができた';
$string['rubric[6]_score2'] = 'グループメンバーの<span class="highlight">問題の表現や難易度等の改善点について自分の意見</span>を伝えることができた';
$string['rubric[6]_score3'] = 'グループメンバーの<span class="highlight">問題の表現や難易度等の改善点について自分の意見や考えを具体例を示しながら相手に分かりやすく</span>伝えることができた';
$string['rubric[6]_ability'] = '表現力：グループセッションにおける意思疎通、表現';

$string['rubric[7]']        = 'グループメンバーからの意見を理解し活用することができる';
$string['rubric[7]_help']   = '';
$string['rubric[7]_suffix'] = '';
$string['rubric[7]_score0'] = '・グループメンバーから<span class="highlight">意見をもらっていない、または、確認していない</span><br>・相互評価の際のグループメンバーからの<span class="highlight">意見を理解できなかった</span>';
$string['rubric[7]_score1'] = '相互評価の際のグループメンバーからの<span class="highlight">意見を十分に理解できた</span>';
$string['rubric[7]_score2'] = 'グループメンバーからの意見を<span class="highlight">十分に理解し、問題を見直して修正した</span>';
$string['rubric[7]_score3'] = 'グループメンバーからの意見に基づいて<span class="highlight">問題を修正することでどのように問題が改善されるかを予測したうえで、</span>問題を修正した';
$string['rubric[7]_ability'] = '思考力[作問を通じた創造的思考力]：出題箇所の問題化<br>判断力：受け取った指摘を採用するかの意思決定<br>表現力：グループセッションにおける意思疎通、表現<br>表現力：作問時における文法的表現（記号や図表なども含む）<br>三要素の中のひとつである多様性の向上';

$string['rubric[8]']        = '今回の作問や相互評価の結果を踏まえ、次回の作問に向けた出題範囲や難易度を検討・調整できる';
$string['rubric[8]_help']   = '';
$string['rubric[8]_suffix'] = '';
$string['rubric[8]_score0'] = '次回の作問に向けて出題範囲や難易度の調整を<span class="highlight">どのようにすればいいのか分からない（検討していない）</span>';
$string['rubric[8]_score1'] = '次回の作問に向けた出題範囲や難易度の<span class="highlight">改善点を列挙できる</span>';
$string['rubric[8]_score2'] = '今回の作問や相互評価の結果を踏まえ、次回の作問に向けた出題範囲や難易度の<span class="highlight">改善点を具体的に説明できる</span>';
$string['rubric[8]_score3'] = '今回の作問や相互評価の結果を踏まえ、次回の作問に向けた出題範囲や難易度の<span class="highlight">改善や調整を計画している</span>';
$string['rubric[8]_ability'] = '思考力[作問を通じた創造的思考力]：結果に基づいた次の作問演習に向けた考察<br>判断力：問題難易度の基準調整';