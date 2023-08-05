<?php 
header('Content-Type: application/json; charset=utf-8');

//  __  __             _                     _  ____          _           _   _      _   
// |  \/  | __ _ _ __ | |__   __ _          (_)/ ___|___   __| | ___ _ __| \ | | ___| |_ 
// | |\/| |/ _` | '_ \| '_ \ / _` |  _____  | | |   / _ \ / _` |/ _ \ '__|  \| |/ _ \ __|
// | |  | | (_| | | | | |_) | (_| | |_____| | | |__| (_) | (_| |  __/ |  | |\  |  __/ |_ 
// |_|  |_|\__,_|_| |_|_.__/ \__,_|         |_|\____\___/ \__,_|\___|_|  |_| \_|\___|\__|
    
//                       _   _ _            _         ____             
//                      | \ | (_)_ __   ___| |_ _   _|  _ \  _____   __
//                      |  \| | | '_ \ / _ \ __| | | | | | |/ _ \ \ / /
//                      | |\  | | | | |  __/ |_| |_| | |_| |  __/\ V / 
//                      |_| \_|_|_| |_|\___|\__|\__, |____/ \___| \_/  
//                                              |___/                  


function info($q){
    $url = "https://yt1s.com/api/ajaxSearch/index";
    $ch = curl_init();
    $data = array("q" => $q, "vt" => "home");
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

function convert($vid, $k){
    $url = "https://yt1s.com/api/ajaxConvert/convert";
    $ch = curl_init();
    $data = array("vid" => $vid, "k" => $k);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}


# ISHLATISH UCHUN QO'LLANMA
// echo json_encode(info("https://www.youtube.com/watch?v=133sMCoachg")); # Video url
// echo json_encode(convert("133sMCoachg", "0+LoAkSCJuuiQtKEWMc8zhdiPRF1HVrD5l7v2cVU6cPC3DKGWvLg%5C/HeOOD+ehrU04m7c")); # Infodan kelgan VIDID va DOWN KEY




# AGAR YT VIDEO THUMBNAIL (RASMINI) OLMOQCHI BO'LSANGIZ
// https://i.ytimg.com/vi/VIDID/0.jpg # VIDID -> video id 




# Bu bo'lim faqat GET so'rovi orqali malumot olish uchun
if(!isset($_GET['method'])) {
    echo json_encode(array("status" => 'error', "mess" => "Method not entered"));
    exit();
}

$method = $_GET['method'];
if($method == 'info'){
    try {
        $url = $_GET['url'];
        echo json_encode(info($url));
    }catch(Exception $e) {
        echo json_encode(array("status" => 'error', "mess" => $e->getMessage()));
    }
}
elseif($method == "convert"){
    try {
        $vid = $_GET['vid'];
        $k = str_replace(" ", "+", $_GET['k']); # GET so'rovda + yo'qolib qolishi inobatga olinib
        echo json_encode(convert($vid, $k));
    }catch(Exception $e) {
        echo json_encode(array("status" => 'error', "mess" => $e->getMessage()));
    }
}else{
    echo json_encode(array("status" => 'error', "mess" => "There is no such method"));
    exit();
}

# ISHLATISH UCHUN QO'LLANMA
// .../api.php?method=info&url=https://www.youtube.com/watch?v=133sMCoachg
// .../api.php?method=convert&vid=133sMCoachg&k=0+LoAkSCJuuiQtKEWMc8zhdiPRF1HVrD5l7v2cVU6cPC3DKGWvLg%5C/HeOOD+ehrU04m7c



//  __  __             _                     _  ____          _           _   _      _   
// |  \/  | __ _ _ __ | |__   __ _          (_)/ ___|___   __| | ___ _ __| \ | | ___| |_ 
// | |\/| |/ _` | '_ \| '_ \ / _` |  _____  | | |   / _ \ / _` |/ _ \ '__|  \| |/ _ \ __|
// | |  | | (_| | | | | |_) | (_| | |_____| | | |__| (_) | (_| |  __/ |  | |\  |  __/ |_ 
// |_|  |_|\__,_|_| |_|_.__/ \__,_|         |_|\____\___/ \__,_|\___|_|  |_| \_|\___|\__|
    
//                       _   _ _            _         ____             
//                      | \ | (_)_ __   ___| |_ _   _|  _ \  _____   __
//                      |  \| | | '_ \ / _ \ __| | | | | | |/ _ \ \ / /
//                      | |\  | | | | |  __/ |_| |_| | |_| |  __/\ V / 
//                      |_| \_|_|_| |_|\___|\__|\__, |____/ \___| \_/  
//                                              |___/                  

?>