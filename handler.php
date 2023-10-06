<?php

/**
 * Version: v1.5
 * Developer: @DearAhmadi
 * Join us @DarkMindsTm 
 * Group: @DarkMindsGp
 * برای حمایت از من با منبع اسکی برید!
 * جوین شدن توی چنل هوش سیاه فراموش نشه!
 */

class handler extends BPT
{
    /**
     * timeleft for sendall | forall
     * 200 send per min
     *
     * @param [type] $count
     * @return float|int
     */
    public function timeleft(
        int $fil
        ) 
    {
        $ret = ceil($fil / 200);
        if ($fil <= 200)
        {
            $ret = 1;
        }
        return $ret;
    }

    /**
     * saving step datas
     *
     * @param [type] $User
     * @param [type] $data
     * @return null
     */
    public function saveData(
        $User, 
        $data
        ) 
    {
        global $connect, $time;
        if (is_array($data))
        {
            $query = null;
            foreach ($data as $step => $value)
                $query .= "INSERT INTO `step` (`id` , `step` , `data` , `inserttime`) VALUES ($User, '$step', '$value', $time);" . PHP_EOL;
            
            $connect->multi_query($query);
        }
        else
            $connect->query("UPDATE `user` SET `step` = '$data' WHERE `id` = $User LIMIT 1;");
    }

    /**
     * fet data from db
     *
     * @param [type] $data
     * @param [type] $User
     * @return string
     */
    public function getData(
        $data, 
        $User
        ) 
    {
        global $connect;
        if (is_array($data))
        {
            $result = array();
            foreach ($data as $step)
            {
                $getData =$connect->query("SELECT * FROM `step` WHERE `id` = $User AND `step` = '$step' ORDER BY `inserttime` DESC LIMIT 1;")->fetch_assoc();
                $result[$step] = $getData['data'];
            }
        }
          else
        {
            $getData =$connect->query("SELECT * FROM `step` WHERE `id` = $User AND `step` = '$data' ORDER BY `inserttime` DESC LIMIT 1;")->fetch_assoc();
            $result = $getData['data'];
        }
        return $result;
    }

    /**
     * clear user cache ( step datas )
     *
     * @return null
     */
    public function clearCache(
        $User
        ) 
    {
        global $connect;
        $connect->query("DELETE FROM `step` WHERE `id` = $User");
        $connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = $User LIMIT 1;");	
    }

    /**
     * check start string with
     *
     * @param [type] $string
     * @param [type] $startString
     */
    public function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return substr($string, 0, $len) === $startString;
    }

    /**
     * quick get info
     *
     * @param [type] $User
     * @param [type] $what
     * @return string
     */
    public function quickGet(
        $User,
        $what
        ) 
    {
        $get = parent::getChat(['chat_id' => $User]);
        return $get['result'][$what];
    }
    
    /**
     * check sendall
     *
     * @return bool
     */
    public function checkSendAll() 
    {
        global $connect;
        $sendforall =   $connect->query("SELECT * FROM `sfall`;")->fetch_assoc();
        $result =       ($sendforall['sendall'] == 0 && $sendforall['forall'] == 0) ? false : true;
        return $result;
    }

    /**
     * gen channels managment
     *
     * @return array
     */
    public function CreateChnnelLocksKey() 
    {
        global $connect;
        $chns =             $connect->query("SELECT * FROM `channels` ORDER BY `createtime` ASC;");
        if ($chns->num_rows > 0)
        {
            while ($row =       $chns->fetch_assoc()) 
            {
                $ChannelName =  parent::getChat(['chat_id' => $row['idoruser']])['result']['title'];
                $result[] =     [["🔑 $ChannelName",$row['link']],["📛 حذف",'deleteChannelLock_'.$row['idoruser']],["🔗 تنظیم لینک",'setNewLink_'.$row['idoruser']]];
            }
        }
        else
            $result[] =         [["⚠️ هیچ کانالی اضافه نشده است", 'none']];   
        
        return $result;
    }

    /**
     * convert numbers to emoji
     *
     * @param integer $num
     * @return string
     */
    public function convertToEmoji(int $num)
    {
        if ($num == 10)
            $result = '🔟';
        else
        {
            $emojis = ['0️⃣','1️⃣','2️⃣','3️⃣','4️⃣','5️⃣','6️⃣','7️⃣','8️⃣','9️⃣'];
            $result = str_replace(range(0,9), $emojis, $num);
        }
        return $result;
    }

    /**
     * user Join Checker
     *
     * @param [type] $from_id
     * @param string $callback_data
     * @param boolean $channel_name
     * @return array
     */
    public function checkJoin(
        $from_id,
        $callback_data = 'checkJoin',
        $channel_name = true
    )
    {
        global $connect;
        $chs =              $connect->query("SELECT * FROM `channels`;");
        $result =           ['ok' => true, 'keys' => []];
        $num =              0;
        if ($chs->num_rows > 0) 
        {
            while ($row = $chs->fetch_assoc())
            {
                $Accepted = [
                    'administrator', 
                    'creator', 
                    'member'
                ];
                $Req =          parent::getChatMember(['chat_id' => $row['idoruser'], 'user_id' => $from_id])['result'];
                if (!in_array($Req['status'], $Accepted))
                {
                    $num +=     1;
                    if ($channel_name == true)
                        $name = parent::getChat(['chat_id' => $row['idoruser']])['result']['title'];
                    else
                    {
                        $name = $this->convertToEmoji($num);
                    }
                    array_push($result['keys'], [["$name", $row['link']]]);
                }
            }
            if ($num > 0)
            {
                $result['ok'] = false;
                array_push($result['keys'], [['☑️ عضو شدم', $callback_data]]);
            }
        }
        return $result;
    }

    /**
     * forward Message for forall
     *
     * @param integer $to_id
     * @param integer $from_id
     * @param integer $from_msgid
     * @return array
     */
    public function forwardMsg(
        int $to_id, 
        int $from_id, 
        int $from_msgid
        )
    {
        global $BPTSettings;
        $params = [
            'chat_id' =>        $to_id, 
            'from_chat_id' =>   $from_id, 
            'message_id' =>     $from_msgid
        ];
        $base_url =             $BPTSettings['handler']['base_url'];
        $result =               $this->openLink($base_url . API_KEY . '/' . 'forwardMessage', 'POST', $params, [], true);
        return $result;
    }

    /**
     * open any Link
     *
     * @param string $url
     * @param integer $timeout
     * @param boolean $decode
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return array|string
     */
    public function openLink(
        string $url,
        string $method = 'GET',
        array $params = [],
        array $headers = [],
        bool $decode = false,
        int $timeout = 15
        )
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($method == 'POST')
        {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        if (count($headers) > 0)
        {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ch);
        if ($decode == true)
        {
            $response = json_decode($response, true);
        }
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpcode != 200)
            $response = null;
        
        curl_close($ch);
        return $response;
    }
}