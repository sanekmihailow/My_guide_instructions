<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Tasks;
use \Bitrix\Forum;

$taskId = {{Task ID}};
$forumId = \Bitrix\Tasks\Integration\Forum\Task\Comment::getForumId();

$messages = \Bitrix\Forum\MessageTable::getList(
[
   'select' => ['ID','POST_MESSAGE','AUTHOR_ID'],
   'filter' => 
   [
      'REAL_TOPIC.FORUM_ID' => $forumId,
      'REAL_TOPIC.XML_ID'   => 'TASK_'.$taskId,
      '!=PARAM1' => 'TK',
   ],
   'runtime' => 
   [
      new \Bitrix\Main\Entity\ReferenceField(
         'REAL_TOPIC',
         '\Bitrix\Forum\TopicTable',
         ['=this.TOPIC_ID' => 'ref.ID']
      )
   ],
]);

$arComments = [];
foreach ($messages as $message) {
    $arComments[] = [
               'ID'           => $message['ID'],
               'POST_MESSAGE' => $message['POST_MESSAGE'],
               'AUTHOR_ID'    => $message['AUTHOR_ID']
            ];
}

$arrTrue = [];
foreach ($arComments as $i){
    $comment = $i['POST_MESSAGE'];
    $pattern = "/^(в|В|B):\d\d.\d\d.\d{4}/";
    if(preg_match("$pattern", $comment)) {
       $arrTrue[] = $comment;
       $arr = explode("-", $comment);
       $date_str = substr($arr[0],3);
       $date_str = trim($date_str, " ");
       $date = date('d.m.Y', strtotime($date_str));
       $arDate[]= $date;
       $num = $arr[1];
       $num = trim($num, " ");
       $arNumbl[] = $num;
    }
}

$count_true = count($arrTrue);
if (empty($count_true)) {
} else {
    $rootActivity->SetVariable("CommentsV",$arrTrue);
    $rootActivity->SetVariable("DatesV",$arDate);
    $rootActivity->SetVariable("NumblanksV",$arNumbl);
}
