<?php
function users_notification($org_name, $org_id, $bul_id)
{
    $API_ACCESS_KEY = getenv('FCM_API_KEY');

    
    if ($API_ACCESS_KEY) {
        $topic = '/topics/tulip_org_'.$org_id;

        $userdata = array(
            'org_id' => $org_id,
            'bul_id' => $bul_id            
        );

        $data = array(
            "content-available" => "1",
            "no-cache" => "1",
            'forceShow' => 'true'          
        );


        #prep the bundle
        $msg = array(
            'body' => 'Há um novo boletim para você!',
            'title' => $org_name,
            'icon' => 'fcm_push_icon', /*Default Icon*/
            "tag" => $org_id,
            'sound' => 'default',
            'org_id' => $org_id,
            'bul_id' => $bul_id  
        );

        

        $fields = array(
            'to' => $topic,
            'data' => $msg,     
            'additionalData' => $data,
        );

        $headers = array
            (
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json',
        );

#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
    }

}
