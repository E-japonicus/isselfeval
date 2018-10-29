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

// 良問の基準
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
$string['exercise_goal_help'] = '
・順列の分野の問題を作成する<br>
・正答率70％の難易度の問題を作成する';

$string['rubric[1]']        = '作問課題に関連する単元や内容を列挙する';
$string['rubric[1]_help']   = '';
$string['rubric[1]_suffix'] = '作問課題に関連する単元や内容を';
$string['rubric[1]_score0'] = '<span class="highlight">1つも見つけることができなかった</span>';
$string['rubric[1]_score1'] = '<span class="highlight">1つ見つけることができた</span>';
$string['rubric[1]_score2'] = '<span class="highlight">2つ見つけることができた</span>';
$string['rubric[1]_score3'] = '<span class="highlight">3つ以上見つけることができた</span>';
$string['rubric[1]_ability'] = '思考力[作問を通じた創造的思考力]，判断力：利用できると思われる出題箇所の列挙';

$string['rubric[2]']        = '各単元や内容についてそれぞれの関係性を構造化する';
$string['rubric[2]_help']   = '';
$string['rubric[2]_suffix'] = '出題できそうな単元や内容についてそれぞれの関係性を';
$string['rubric[2]_score0'] = '<span class="highlight">見つけることができなかった</span>';
$string['rubric[2]_score1'] = '見つけることができたが、<span class="highlight">それらの関係性を図などを用いて説明することができない</span>';
$string['rubric[2]_score2'] = '見つけることができ、<span class="highlight">それらの関係性を図などを用いて説明することができる</span>';
$string['rubric[2]_score3'] = '';
$string['rubric[2]_ability'] = '思考力[作問を通じた創造的思考]：出題箇所に含まれる知識技能の構造化';

$string['rubric[3]']        = '解答者がどの程度正解しそうか仮説を形成し出題する内容を決定する';
$string['rubric[3]_help']   = '';
$string['rubric[3]_suffix'] = '出題する内容を決めるときに';
$string['rubric[3]_score0'] = '<span class="highlight">何も考えずに</span>利用する内容を決定した';
$string['rubric[3]_score1'] = '<span class="highlight">直感的に</span>解答者がどの程度正解しそうか仮説を形成(予測)し、出題する内容を決定した';
$string['rubric[3]_score2'] = '<span class="highlight">今までの作問演習の結果や経験に基づいて</span>解答者がどの程度正解しそうか仮説を形成(予測)し、 出題する内容を決定した';
$string['rubric[3]_score3'] = '';
$string['rubric[3]_ability'] = '思考力[推論,仮説]：知識や情報に基づく仮説の形成，<br />判断力：出題箇所の比較・決定';

// 良問の基準
$string['rubric[4]']        = '良問の基準に適した問題を作ることができる';
$string['rubric[4]_help']   = '';
$string['rubric[4]_suffix'] = '';
$string['rubric[4]_score0'] = '';
$string['rubric[4]_score1'] = '<span class="highlight">半分程度</span>の基準を満たした問題を作成できた';
$string['rubric[4]_score2'] = '<span class="highlight">8割程度</span>の基準を満たした問題を作成できた';
$string['rubric[4]_score3'] = '<span class="highlight">すべての基準</span>を満たした問題を作成できた';
$string['rubric[4]_ability'] = '思考力[推論,仮説]：結果の予測，<br />思考力[作問を通じた創造的思考力]：出題箇所の問題化，<br />判断力：作問に関する意思決定（出題形式の選択など），<br />表現力：作問時における文法的表現（記号や図表なども含む）';

$string['rubric[5]']        = 'グループメンバーからの意見の活用';
$string['rubric[5]_help']   = '';
$string['rubric[5]_suffix'] = '自分が作った問題について';
$string['rubric[5]_score0'] = 'グループメンバーから<span class="highlight">意見を貰っていない</span>';
$string['rubric[5]_score1'] = 'グループメンバーからの<span class="highlight">指摘を活用し、自分の問題を再度検討した</span>';
$string['rubric[5]_score2'] = 'グループメンバーからの<span class="highlight">指摘を活用し、自分の問題を再度検討し、よりよい問題に改善できた</span>';
$string['rubric[5]_score3'] = '';
$string['rubric[5]_ability'] = '思考力[作問を通じた創造的思考力]：出題箇所の問題化，<br />表現力：グループセッションにおける意思疎通、表現，<br />表現力：作問時における文法的表現（記号や図表なども含む），<br />三要素の中のひとつである多様性の向上';

// 良問の基準
$string['rubric[6]']        = 'グループメンバーの問題から最も良問に適していると思われる問題の選択';
$string['rubric[6]_help']   = '';
$string['rubric[6]_suffix'] = '自分が選んだ問題が良問の基準を';
$string['rubric[6]_score0'] = '';
$string['rubric[6]_score1'] = '<span class="highlight">半分程度</span>満たしていた';
$string['rubric[6]_score2'] = '<span class="highlight">8割程度</span>満たしていた';
$string['rubric[6]_score3'] = '<span class="highlight">すべて</span>満たしていた';
$string['rubric[6]_ability'] = '思考力[推論,仮説]：結果の予測，<br />判断力：最も演習目標に近いと思われる問題の選択・決定';

$string['rubric[7]']        = '次回の作問における出題内容の見直しや難易度の調整を行うことができる';
$string['rubric[7]_help']   = '';
$string['rubric[7]_suffix'] = '今回の作問演習の結果から';
$string['rubric[7]_score0'] = '<span class="highlight">何を改善すればいいのかわからない</span>';
$string['rubric[7]_score1'] = '何かを改善する必要があると考えているが、<span class="highlight">どのように改善すればいいかわからない</span>';
$string['rubric[7]_score2'] = '何を改善すればいいとわかっており、<span class="highlight">どのように改善すればいいかわかっている</span>';
$string['rubric[7]_score3'] = '';
$string['rubric[7]_ability'] = '思考力[作問を通じた創造的思考力]：結果に基づいた次の作問演習に向けた考察';

$string['rubric[8]']        = '相互評価の結果から、次回の作問における出題内容の見直しや難易度の調整を行うことができる';
$string['rubric[8]_help']   = '';
$string['rubric[8]_suffix'] = '';
$string['rubric[8]_score0'] = '相互評価を終えても、今回の出題範囲の中で、<span class="highlight">何が難しくて何が簡単なのかがうまく理解できていない</span>';
$string['rubric[8]_score1'] = '次回の作問における<span class="highlight">出題内容の見直しや難易度の調整をどのようにすればいいかわからない</span>';
$string['rubric[8]_score2'] = '次回の作問における<span class="highlight">出題内容の見直しや難易度の調整を行うことができそうだ</span>';
$string['rubric[8]_score3'] = '';
$string['rubric[8]_ability'] = '判断力：問題難易度の基準調整';

$string['rubric[9]']        = '誤字脱字や分かりづらい表現のない問題を作成することができる';
$string['rubric[9]_help']   = '';
$string['rubric[9]_suffix'] = '作成された問題に';
$string['rubric[9]_score0'] = '<span class="highlight">誤字脱字があり、適切でない単語表現や曖昧で分かりにくい表現</span>が含まれていた';
$string['rubric[9]_score1'] = '誤字脱字はなかったが、<span class="highlight">文章が簡潔にまとめられていない箇所や分かりにくい表現</span>があった';
$string['rubric[9]_score2'] = '誤字脱字がなく、<span class="highlight">誰にでも分かりやすい表現</span>で問題を作成することができた';
$string['rubric[9]_score3'] = '';
$string['rubric[9]_ability'] = '表現力：作問時における文法的表現';

$string['rubric[10]']        = 'メンバーの一員としてグループセッションに参加することができ，自分の考えについて意見を述べることができる';
$string['rubric[10]_help']   = '';
$string['rubric[10]_suffix'] = 'グループメンバーの問題にコメントを';
$string['rubric[10]_score0'] = '<span class="highlight">投稿しなかった</span>';
$string['rubric[10]_score1'] = '投稿したが、<span class="highlight">自分の意見や考えをうまく伝えることができなかった</span>';
$string['rubric[10]_score2'] = '投稿した際に、<span class="highlight">自分の意見や考えを誤解なくグループメンバーに伝えることができた</span>';
$string['rubric[10]_score3'] = '';
$string['rubric[10]_ability'] = '表現力：グループセッションにおける意思疎通、表現';

// 演習目標
$string['rubric[11]']        = '演習目標に則した問題の選択・決定ができる';
$string['rubric[11]_help']   = '';
$string['rubric[11]_suffix'] = '演習目標の出題分野と目標とする正答率の';
$string['rubric[11]_score0'] = '<span class="highlight">どちらも満たしておらず</span>、問題の選択・決定を見直す必要がある';
$string['rubric[11]_score1'] = '<span class="highlight">どちらか一方しか</span>満たしていない';
$string['rubric[11]_score2'] = '<span class="highlight">どちらも満たした</span>問題を作成している';
$string['rubric[11]_score3'] = '';
$string['rubric[11]_ability'] = '判断力：最も演習目標に近いと思われる問題の選択・決定';