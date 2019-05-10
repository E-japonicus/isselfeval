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

$string['modulename'] = 'Self Evalution(H30 Second half~)';
$string['modulenameplural'] = 'Self Evalution(H30 Second half~)';
$string['modulename_help'] = 'It is a module that learners self-evaluate based on rubric.';
$string['isselfeval:addinstance'] = 'Add a new isselfeval';
$string['isselfeval:submit'] = 'Submit isselfeval';
$string['isselfeval:view'] = 'View isselfeval';
$string['isselfevalfieldset'] = 'Custom example fieldset';
$string['isselfevalname'] = 'Self-evaluation title';
$string['isselfevalname_help'] = 'The text you entered will be displayed when you add it to the course. <br /> Example) x th self assessment.';
$string['isselfeval'] = 'isselfeval';
$string['pluginadministration'] = 'isselfeval administration';
$string['pluginname'] = 'isselfeval';

// 相互評価用チェックリスト
$string['good_quiz_help'] = '
・解説に答えを導く計算過程が書かれており、不正解した学習者が見てわかりやすい解説になっているか？<br>
・著作権を侵害していないか？（参考文献が記載されているか？）<br>
・誤字脱字がないか？<br>
・曖昧な表現やわかりにくい表現はないか？<br>
・問題内容・答え・解説は正しいか？<br>
・誤答選択肢には妥当な選択肢が設定されているか？<br>
　（明らかに誤答とわかる選択肢はないか？）
';

// 演習目標
$string['exercise_goal_help'] = '';

$string['rubric[1]']        = '作問課題に関連する単元や内容を考察する';
$string['rubric[1]_help']   = '';
$string['rubric[1]_suffix'] = '';
$string['rubric[1]_score0'] = '今回の作問課題に関連する単元や内容を<span class="highlight">1つだけ見つけて問題を作成した</span>';
$string['rubric[1]_score1'] = '今回の作問課題の出題範囲を見直した上で、作問課題に関連する単元や内容を<span class="highlight">1つだけ見つけて問題を作成した</span>';
$string['rubric[1]_score2'] = '今回の作問課題の出題範囲を見直した上で、作問課題に関連する単元や内容を<span class="highlight">2つ以上見つけて問題を作成した</span>';
$string['rubric[1]_score3'] = '今回の作問課題の出題範囲を見直した上で、作問課題に関連する単元や内容を<span class="highlight">2つ以上見つけ、その中から最も適切な単元や内容を選んで問題を作成した</span>';
$string['rubric[1]_ability'] = '思考力[作問を通じた創造的思考力]：利用できると思われる出題箇所の列挙、<br />判断力：利用できると思われる出題箇所の列挙';

$string['rubric[2]']        = '各単元や内容についてそれぞれの関係性を構造化する';
$string['rubric[2]_help']   = '';
$string['rubric[2]_suffix'] = '';
$string['rubric[2]_score0'] = '出題できそうな単元や内容について、それぞれの関係性を<span class="highlight">見つけることができなかった</span>';
$string['rubric[2]_score1'] = '出題できそうな単元や内容について、それぞれの関係性を<span class="highlight">見つけることができたが、それらの関係性を図などを用いて表現することができない</span>';
$string['rubric[2]_score2'] = '出題できそうな単元や内容について、それぞれの関係性を<span class="highlight">図などを用いて表現することができる</span>';
$string['rubric[2]_score3'] = '出題できそうな単元や内容について、それぞれの関係性を<span class="highlight">図などを用いて表現することができ、その単元や内容の要点を説明できる</span>';
$string['rubric[2]_ability'] = '思考力[作問を通じた創造的思考]：出題箇所に含まれる知識技能の構造化';

$string['rubric[3]']        = '解答者がどの程度正解しそうか仮説を形成し出題する内容を決定する';
$string['rubric[3]_help']   = '';
$string['rubric[3]_suffix'] = '';
$string['rubric[3]_score0'] = '出題する内容を決めるときに<span class="highlight">何も考えずに利用する内容を決定した</span>';
$string['rubric[3]_score1'] = '出題する内容を決めるときに<span class="highlight">直感的に解答者がどの程度正解しそうか仮説を形成(予測)し、出題する内容を決定した</span>';
$string['rubric[3]_score2'] = '出題する内容を決めるときに<span class="highlight">今までの作問学習の結果や経験に基づいて解答者がどの程度正解しそうか仮説を形成(予測)し、出題する内容を決定した</span>';
$string['rubric[3]_score3'] = '出題する内容を決めるときに<span class="highlight">過去に出題した問題の正答率等を分析し、解答者がどの程度正解しそうか仮説を形成(予測)し、出題する内容を決定した</span>';
$string['rubric[3]_ability'] = '思考力[推論,仮説]：知識や情報に基づく仮説の形成，<br />判断力：出題箇所の比較・決定';

$string['rubric[4]']        = '自分で工夫した問題を作成することができる';
$string['rubric[4]_help']   = '';
$string['rubric[4]_suffix'] = '';
$string['rubric[4]_score0'] = '問題(選択肢、解説を含む)を<span class="highlight">作成しなかった</span>';
$string['rubric[4]_score1'] = '作成した問題は、既存の問題の<span class="highlight">一部のみ(数字だけを変える等)を修正した問題だった</span>';
$string['rubric[4]_score2'] = '作成した問題は、既存の問題に<span class="highlight">類似した問題(同じ解法で解答できる問題等)だった</span>';
$string['rubric[4]_score3'] = '作成した問題は、既存の問題を参考にし、<span class="highlight">大部分を自分自身で考えた問題だった</span>';
$string['rubric[4]_ability'] = '思考力[作問を通じた創造的思考力]：出題箇所の問題化、<br />表現力：作問時における文法的表現';

$string['rubric[5]']        = '作問の要件(出題範囲と正答率)を満たす問題を作成できる';
$string['rubric[5]_help']   = '';
$string['rubric[5]_suffix'] = '';
$string['rubric[5]_score0'] = '作問の要件(出題範囲と正答率)を<span class="highlight">満たした問題を作成できなかった</span>';
$string['rubric[5]_score1'] = '作問の要件(出題範囲と正答率)の<span class="highlight">一部のみを満たした問題を作成できた</span>';
$string['rubric[5]_score2'] = '作問の要件(出題範囲と正答率)を<span class="highlight">概ね満たした問題を作成できた</span>';
$string['rubric[5]_score3'] = '作問の要件(出題範囲と正答率)を<span class="highlight">全て満たした問題を作成できた</span>';
$string['rubric[5]_ability'] = '思考力[推論,仮説]：結果の予測、<br />思考力[作問を通じた創造的思考力]：出題箇所の問題化、<br />判断力：作問に関する意思決定（出題形式の選択など）';

$string['rubric[6]']        = '相互評価用チェックリストに従った問題を作成できる';
$string['rubric[6]_help']   = '';
$string['rubric[6]_suffix'] = '';
$string['rubric[6]_score0'] = '作成した問題は相互評価用チェックリストの項目の<span class="highlight">半分も満たしていなかった</span>';
$string['rubric[6]_score1'] = '作成した問題は相互評価用チェックリストの項目の<span class="highlight">6割を満たしていた</span>';
$string['rubric[6]_score2'] = '作成した問題は相互評価用チェックリストの項目の<span class="highlight">8割を満たしていた</span>';
$string['rubric[6]_score3'] = '作成した問題は相互評価用チェックリストの項目の<span class="highlight">全てを満たしていた</span>';
$string['rubric[6]_ability'] = '表現力：作問時における文法的表現';

$string['rubric[7]']        = '相互評価用チェックリストに従ってグループメンバーの問題を正しく評価できる';
$string['rubric[7]_help']   = '';
$string['rubric[7]_suffix'] = '';
$string['rubric[7]_score0'] = 'グループメンバーの問題を評価する際に、相互評価用チェックリストを<span class="highlight">全く評価(確認)しなかった</span>';
$string['rubric[7]_score1'] = 'グループメンバーの問題を評価する際に、相互評価用チェックリストの<span class="highlight">一部の項目だけ評価(確認)できた</span>';
$string['rubric[7]_score2'] = 'グループメンバーの問題を評価する際に、相互評価用チェックリストの<span class="highlight">各項目を概ね評価(確認)できた</span>';
$string['rubric[7]_score3'] = 'グループメンバーの問題を評価する際に、相互評価用チェックリストの<span class="highlight">すべての項目を正しく評価(確認)できた</span>';
$string['rubric[7]_ability'] = '判断力：問題の評価・選択';

$string['rubric[8]']        = '作問の要件(出題範囲と正答率)を満たしている問題を選択できる';
$string['rubric[8]_help']   = '';
$string['rubric[8]_suffix'] = '';
$string['rubric[8]_score0'] = 'グループメンバー(自分も含む)が作成した問題の中から、作問の要件(出題範囲と正答率)を満たした問題を<span class="highlight">全く選択できていなかった</span>';
$string['rubric[8]_score1'] = 'グループメンバー(自分も含む)が作成した問題の中から、作問の要件(出題範囲と正答率)を満たした問題を<span class="highlight">一部選択できた</span>';
$string['rubric[8]_score2'] = 'グループメンバー(自分も含む)が作成した問題の中から、作問の要件(出題範囲と正答率)を満たした問題を<span class="highlight">概ね選択できた</span>';
$string['rubric[8]_score3'] = 'グループメンバー(自分も含む)が作成した問題の中から、作問の要件(出題範囲と正答率)を満たした問題を<span class="highlight">すべて正しく選択できた</span>';
$string['rubric[8]_ability'] = '判断力：問題の評価・選択';

$string['rubric[9]']        = '問題の相互評価の際に、グループメンバーの問題の表現や難易度等の改善点について自分の意見や考えを伝えることができる';
$string['rubric[9]_help']   = '';
$string['rubric[9]_suffix'] = '';
$string['rubric[9]_score0'] = '問題の相互評価の際に、<span class="highlight">自分の意見や考えを伝えることができなかった(コメントを投稿しなかった)</span>';
$string['rubric[9]_score1'] = '問題の相互評価の際に、グループメンバーの<span class="highlight">問題を解いた感想を伝えることができた</span>';
$string['rubric[9]_score2'] = '問題の相互評価の際に、グループメンバーの<span class="highlight">問題の表現や難易度等の改善点について自分の意見や考えを概ね伝えることができた</span>';
$string['rubric[9]_score3'] = '問題の相互評価の際に、グループメンバーの<span class="highlight">問題の表現や難易度等の改善点について自分の意見や考えをうまく伝えることができた</span>';
$string['rubric[9]_ability'] = '表現力：グループセッションにおける意思疎通、表現';

$string['rubric[10]']        = 'グループメンバーからの意見を理解し活用することができる';
$string['rubric[10]_help']   = '';
$string['rubric[10]_suffix'] = '';
$string['rubric[10]_score0'] = '相互評価の際のグループメンバーからの意見を<span class="highlight">理解できなかった(グループメンバーから意見を貰っていない)</span>';
$string['rubric[10]_score1'] = '相互評価の際のグループメンバーからの意見を<span class="highlight">理解できた</span>';
$string['rubric[10]_score2'] = '相互評価の際のグループメンバーからの意見を<span class="highlight">理解し、問題を見直して改善点を検討した</span>';
$string['rubric[10]_score3'] = '相互評価の際のグループメンバーからの意見を<span class="highlight">理解し、その意見を自分の問題に反映してよりよい問題に改善できた</span>';
$string['rubric[10]_ability'] = '思考力[作問を通じた創造的思考力]：出題箇所の問題化、<br />判断力：受け取った指摘を採用するかの意思決定、<br />表現力：グループセッションにおける意思疎通、表現、<br />表現力：作問時における文法的表現（記号や図表なども含む）、<br />三要素の中のひとつである多様性の向上';

$string['rubric[11]']        = '今回の作問や相互評価の結果を踏まえ、次回の作問に向けた出題範囲や難易度を検討・調整できる';
$string['rubric[11]_help']   = '';
$string['rubric[11]_suffix'] = '';
$string['rubric[11]_score0'] = '今回の作問や相互評価の結果を踏まえ、次回の作問に向けた<span class="highlight">出題範囲や難易度の検討・調整を全く行わなかった</span>';
$string['rubric[11]_score1'] = '今回の作問や相互評価の結果を踏まえ、次回の作問に向けた<span class="highlight">出題範囲や難易度の検討・調整を少し行った</span>';
$string['rubric[11]_score2'] = '今回の作問や相互評価の結果を踏まえ、次回の作問に向けた<span class="highlight">出題範囲や難易度の検討・調整をある程度行った</span>';
$string['rubric[11]_score3'] = '今回の作問や相互評価の結果を踏まえ、次回の作問に向けた<span class="highlight">出題範囲や難易度の検討・調整を十分に行った</span>';
$string['rubric[11]_ability'] = '思考力[作問を通じた創造的思考力]：結果に基づいた次の作問演習に向けた考察';