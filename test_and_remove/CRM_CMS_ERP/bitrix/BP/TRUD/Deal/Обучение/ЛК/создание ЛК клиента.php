<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;
require_once($_SERVER['DOCUMENT_ROOT'] . "/local/MyFunctions/IncludeFunctions.php");

//#C- Const
$deal_id = {{ID}};
$numerator = {=Variable:Numerator};
$backnumerator = $numerator;
$error = '';
$user_names = '';
//#-----

$Ar_get_idContact = \Bitrix\Crm\Binding\DealContactTable::getDealContactIDs($deal_id);

foreach ($Ar_get_idContact as $id) {
    $Ar_get = CCrmContact::GetByID($id);
    $type = $Ar_get['TYPE_ID'];

    if ($type == '1') {
        $Ar_learnContact[] = $id;
    }    
}

if (empty($Ar_learnContact)) {
    $error = 'No_learn';
} else {
    foreach ($Ar_learnContact as $id) {
        $Ar_get =  CCrmContact::GetByID($id);

    //#C -  GET EMAIL in CONTACT
        $arFilter  = [
            'ENTITY_ID'   =>  'CONTACT' ,
            'ELEMENT_ID'  =>  $id ,
            'TYPE_ID'     =>  'EMAIL' ,
        ];
        $arEmail  = \CCrmFieldMulti::GetListEx([], $arFilter , false ,[ 'nTopCount' => 1 ],[ 'VALUE' ]);//,[ 'VALUE' ]);
        $resmail = $arEmail->fetch();
        $mail = $resmail['VALUE'];
    //#C----- 

    //#C - str_replace("что","чем",$где);
        $name = $Ar_get['NAME'];
        $name = trim($name, " ");
        $lastname = $Ar_get['LAST_NAME'];
        $lastname = trim($lastname, " ");
		$FIname = $lastname .= "_$name";
        $translit_FI = transliterator_transliterate('Russian-Latin/BGN; Lower()', "$FIname");
        $get_username = $USER_FIELD_MANAGER->GetUserFieldValue('CRM_CONTACT', 'UF_CRM_CONTACT_USERNAME_LEARN',$id);
        if (empty($get_username)) {
            $username = $translit_FI; $username .= "_$numerator";
        } else {
            $username = $get_username;
        }
            $chars = ["'", ',' , 'ʹ'];
            $username = str_replace($chars, '', $username);
        $password = random_password(22);

    //#C - check on exist email,firstname,lastname
        $Ar_user_email = rest_get_user_moodle('email',"$mail");
        $exist = sizeof($Ar_user_email['users']);

        if (empty($mail) || $exist == 0) {
            $email = $username . "@trud-rf.ru";
        } else {
            $email = $mail;
        }
        if (empty($name)) {
            $name = $lastname;
        }
        if (empty($lastname)) {
            $lastname = $name;
        }
    //#C-----
        $Ar_user = rest_get_user_moodle('username',"$username");
        $Ar_email = rest_get_user_moodle('email',"$email");
		$create_user = sizeof($Ar_user['users']);
        $create_email = sizeof($Ar_email['users']);
        
		if ($create_user == 0 && $create_email == 0) {
            if ($numerator != 0 && $numerator != 1) {
                //$backnumerator = $numerator;
                $new_user_id = rest_create_user_moodle($username, $password, $name, $lastname, $email, $deal_id);
                $new_exist = sizeof($new_user_id[0]['id']);
                if ($new_exist !== 0) {
                    $backnumerator = $numerator;
                    $id_num = $new_user_id[0]['id'];
                    $id_num = (int)$id_num;
                    $update_learn_id = $USER_FIELD_MANAGER->Update('CRM_CONTACT', $id, array("UF_CRM_CONTACT_ID_USER_LEARN" => $numerator));
                    $update_learn_id = $USER_FIELD_MANAGER->Update('CRM_CONTACT', $id, array("UF_CRM_CONTACT_USERNAME_LEARN" => $username));
                    $update_learn_id = $USER_FIELD_MANAGER->Update('CRM_CONTACT', $id, array("UF_CRM_CONTACT_PASSWORD_LEARN" => $password));
                    $numerator = $id_num + 1;
                    $user_names = $usernames .= ", $username";
                    $ar_Contactids[] = $id;
                    $Ar_emails[] = $email;
                } else {
                    $error = $error .= "ошибка - пользователь - $username in contact_id:$id не был создан";
                }  
            } else {
                $check_created_user = rest_get_user_moodle('id',"$backnumerator");
                $exist_created_user = sizeof($check_created_user['users']);
                if ($exist_created_user !== 0) {
                    $numerator = $backnumerator + 1;
                }
                $error = $error .= "ошибка - пользователь - $username in contact_id:$id присвоен не тот id\n";
            }
		} else {
			$error = $error .= "пользователь - $username in contact_id:$id уже существует, либо пользователь с таким же email - \"$email\" в moodle существует; \n";
		}     
    }
}
$count_users = count($ar_Contactids);
$count_users = (int)$count_users;
$rootActivity->SetVariable("Count_users",$count_users);
$rootActivity->SetVariable("Error",$error);
$rootActivity->SetVariable("Numerator",$numerator);
$rootActivity->SetVariable("Usersnames",$user_names);
$rootActivity->SetVariable("Ids_contact",$ar_Contactids);
$rootActivity->SetVariable("Emails",$Ar_emails);
