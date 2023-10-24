<?php
/** ----------- Check Included ---------- */
if (!in_array(__FILE__,get_included_files())){
    endPage();
}

/** --------- Check Php version --------- */
if(PHP_MAJOR_VERSION === 5){
    $newline = PHP_SAPI !== 'cli' ? '<br>' . PHP_EOL : PHP_EOL;
    die("You can't run this library on php version lower then 7.0$newline supported versions: php 7.0+$newline recommended version: php 8.0$newline");
}

function endPage(){
    die("<div style='width:98vw;height:98vh;display:flex;justify-content:center;align-items:center;font-size:25vw'>BPT</div>");
}

/**
 * BPT CLASS
 * Simple class for handling telegram bot and write it very easily
 * BOT API version : 6.0
 *
 * @method getUpdates($array = [])
 * @method getUp($array = [])
 * @method updates($array = [])
 * @method setWebhook($array = [])
 * @method setWeb($array = [])
 * @method webhook($array = [])
 * @method deleteWebhook($array = [])
 * @method deleteWeb($array = [])
 * @method delWeb($array = [])
 * @method getWebhookInfo($array = [])
 * @method getWeb($array = [])
 * @method getMe($array = [])
 * @method me($array = [])
 * @method logOut($array = [])
 * @method close($array = [])
 * @method sendMessage($array)
 * @method send($array)
 * @method forwardMessage($array)
 * @method forward($array)
 * @method copyMessage($array)
 * @method copy($array)
 * @method sendPhoto($array)
 * @method photo($array)
 * @method sendAudio($array)
 * @method audio($array)
 * @method sendDocument($array)
 * @method sendDoc($array)
 * @method document($array)
 * @method doc($array)
 * @method sendVideo($array)
 * @method video($array)
 * @method sendAnimation($array)
 * @method animation($array)
 * @method sendGif($array)
 * @method gif($array)
 * @method sendVoice($array)
 * @method voice($array)
 * @method sendVideoNote($array)
 * @method videoNote($array)
 * @method sendMediaGroup($array)
 * @method mediaGroup($array)
 * @method media($array)
 * @method sendLocation($array)
 * @method sendLoc($array)
 * @method location($array)
 * @method loc($array)
 * @method editMessageLiveLocation($array)
 * @method editLiveLoc($array)
 * @method stopMessageLiveLocation($array)
 * @method stopLiveLoc($array)
 * @method sendVenue($array)
 * @method venue($array)
 * @method sendContact($array)
 * @method contact($array)
 * @method sendPoll($array)
 * @method poll($array)
 * @method sendDice($array = [])
 * @method dice($array = [])
 * @method sendChatAction($array = [])
 * @method chatAction($array = [])
 * @method action($array = [])
 * @method getUserProfilePhotos($array = [])
 * @method userPhotos($array = [])
 * @method getFile($array = [])
 * @method file($array = [])
 * @method banChatMember($array = [])
 * @method ban($array = [])
 * @method kickChatMember($array = []) DEPRECATED! use banChatMember instead
 * @method unbanChatMember($array = [])
 * @method unban($array = [])
 * @method kick($array = []) This is not alice with kickChatMember , will use unban method to kick user
 * @method restrictChatMember($array)
 * @method restrict($array)
 * @method promoteChatMember($array)
 * @method promote($array)
 * @method setChatAdministratorCustomTitle($array)
 * @method banChatSenderChat($array)
 * @method banSender($array)
 * @method unbanChatSenderChat($array)
 * @method unbanSender($array)
 * @method customTitle($array)
 * @method setChatPermissions($array)
 * @method permissions($array)
 * @method exportChatInviteLink($array = [])
 * @method link($array = [])
 * @method createChatInviteLink($array = [])
 * @method crLink($array = [])
 * @method editChatInviteLink($array = [])
 * @method edLink($array = [])
 * @method revokeChatInviteLink($array = [])
 * @method reLink($array = [])
 * @method approveChatJoinRequest($array = [])
 * @method acceptJoin($array = [])
 * @method declineChatJoinRequest($array = [])
 * @method denyJoin($array = [])
 * @method setChatPhoto($array)
 * @method deleteChatPhoto($array = [])
 * @method setChatTitle($array)
 * @method title($array)
 * @method setChatDescription($array)
 * @method description($array)
 * @method pinChatMessage($array)
 * @method pin($array)
 * @method unpinChatMessage($array = [])
 * @method unpin($array = [])
 * @method unpinAllChatMessages($array = [])
 * @method unpinall($array = [])
 * @method leaveChat($array = [])
 * @method leave($array = [])
 * @method getChat($array = [])
 * @method chat($array = [])
 * @method getChatAdministrators($array = [])
 * @method admins($array = [])
 * @method getChatMemberCount($array = []) DEPRECATED! Use getChatMembersCount instead
 * @method getChatMembersCount($array = [])
 * @method membersCount($array = [])
 * @method getChatMember($array = [])
 * @method member($array = [])
 * @method setChatStickerSet($array)
 * @method setSticker($array)
 * @method deleteChatStickerSet($array)
 * @method delSticker($array)
 * @method answerCallbackQuery($array = [])
 * @method answer($array = [])
 * @method setMyCommands($array)
 * @method setCommands($array)
 * @method deleteMyCommands($array = [])
 * @method deleteCommands($array = [])
 * @method getMyCommands($array = [])
 * @method getCommands($array = [])
 * @method setChatMenuButton($array = [])
 * @method setMenuButton($array = [])
 * @method setMenu($array = [])
 * @method setButton($array = [])
 * @method getChatMenuButton($array = [])
 * @method getMenuButton($array = [])
 * @method getMenu($array = [])
 * @method getButton($array = [])
 * @method setMyDefaultAdministratorRights($array = [])
 * @method setMyDefaultAdminRights($array = [])
 * @method setMyDefaultRights($array = [])
 * @method setDefaultRights($array = [])
 * @method getMyDefaultAdministratorRights($array = [])
 * @method getMyDefaultAdminRights($array = [])
 * @method getMyDefaultRights($array = [])
 * @method getDefaultRights($array = [])
 * @method editMessageText($array)
 * @method editText($array)
 * @method editMessageCaption($array)
 * @method editCap($array)
 * @method editCaption($array)
 * @method editMessageMedia($array)
 * @method editMedia($array)
 * @method editMessageReplyMarkup ($array = [])
 * @method editReply($array = [])
 * @method editKeyboard($array = [])
 * @method stopPoll($array)
 * @method deleteMessage($array = [])
 * @method del($array = [])
 * @method sendSticker($array)
 * @method sticker($array)
 * @method getStickerSet($array)
 * @method uploadStickerFile($array)
 * @method uploadSticker($array)
 * @method createNewStickerSet($array)
 * @method createSticker($array)
 * @method addStickerToSet($array)
 * @method addSticker($array)
 * @method setStickerPositionInSet($array)
 * @method setStickerPosition($array)
 * @method setStickerPos($array)
 * @method deleteStickerFromSet($array)
 * @method deleteSticker($array)
 * @method setStickerSetThumb($array)
 * @method setStickerThumb($array)
 * @method answerInlineQuery($array = [])
 * @method answerInline($array = [])
 * @method answerWebAppQuery($array)
 * @method answerWebApp($array)
 * @method answerWeb($array)
 * @method sendInvoice($array)
 * @method invoice($array)
 * @method answerShippingQuery($array)
 * @method answerShipping($array)
 * @method answerPreCheckoutQuery($array)
 * @method answerPreCheckout($array)
 * @method answerPreCheck($array)
 * @method setPassportDataErrors($array)
 * @method setPassport($array)
 * @method sendGame($array)
 * @method game($array)
 * @method setGameScore($array)
 * @method gameScore($array)
 * @method getGameHighScores($array = [])
 * @method getGameHigh($array = [])
 *
 * @link https://bpt-proto.ir
 */
class BPT {
    private $version = 2.021;

    private $token;

    private $settings;

    /**
     * telegram update will saved in this var as object , does not effected by array_update option
     */
    public $update;

    public $db;

    public $bot_id;

    private $curl_handler = null;

    private $web_answered = false;

    public function __construct (array $settings) {
        $settings['logger'] = $settings['logger'] ?? false;
        $settings['log_size'] = $settings['log_size'] ?? false;
        $settings['auto_update'] = $settings['auto_update'] ?? false;
        $settings['max_connection'] = $settings['max_connection'] ?? 40;
        $settings['certificate'] = $settings['certificate'] ?? null;
        $settings['base_url'] = $settings['base_url'] ?? 'https://api.telegram.org/bot';
        $settings['down_url'] = $settings['down_url'] ?? 'https://api.telegram.org/file/bot';
        $settings['forgot_time'] = isset($settings['forgot_time']) && is_numeric($settings['forgot_time']) ? $settings['forgot_time'] : 100;
        $settings['receive'] = $settings['receive'] ?? 'webhook';
        $settings['handler'] = $settings['handler'] ?? true;
        $settings['allowed_updates'] = $settings['allowed_updates'] ?? ['update_id', 'message', 'callback_query', 'inline_query', 'my_chat_member', 'chat_member'];
        $settings['security'] = $settings['security'] ?? true;
        $settings['secure_folder'] = $settings['secure_folder'] ?? true;
        $settings['array_update'] = $settings['array_update'] ?? false;
        $settings['split_update'] = $settings['split_update'] ?? true;
        $settings['multi'] = $settings['multi'] ?? false;
        $settings['debug'] = $settings['debug'] ?? false;
        $settings['telegram_verify'] = $settings['telegram_verify'] ?? true;
        $this->settings = $settings;
        if ($settings['logger']) {
            $log_size = $settings['log_size'];
            if ($log_size !== false) {
                $log_size = is_numeric($log_size) ? round($log_size, 1) : 10;
                if (file_exists('BPT.log')) {
                    if (!(filesize('BPT.log') > $log_size * 1024 * 1024)) {
                        define('LOG', fopen('BPT.log', 'a'));
                    }
                    else {
                        define('LOG', fopen('BPT.log', 'w'));
                        fwrite(LOG,"♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nTnx for using our library\nSome information about us :\nAuthor : @Im_Miaad\nHelper : @A_LiReza_ME\nChannel : @BPT_CH\nOur Website : https://bpt-proto.ir\n\nIf you have any problem with our library\nContact to our supports\n♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nINFO : BPT PROTO LOG STARTED ...\nWARNING : THIS FILE AUTOMATICALLY DELETED WHEN ITS SIZE REACHED $log_size MB\n\n");
                    }
                }
                else {
                    define('LOG', fopen('BPT.log', 'a'));
                    fwrite(LOG,"♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nTnx for using our library\nSome information about us :\nAuthor : @Im_Miaad\nHelper : @A_LiReza_ME\nChannel : @BPT_CH\nOur Website : https://bpt-proto.ir\n\nIf you have any problem with our library\nContact to our supports\n♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nINFO : BPT PROTO LOG STARTED ...\nWARNING : THIS FILE AUTOMATICALLY DELETED WHEN ITS SIZE REACHED $log_size MB\n\n");
                }
            }
            else {
                if (file_exists('BPT.log')) {
                    if (!(filesize('BPT.log') > 10 * 1024 * 1024)) {
                        define('LOG', fopen('BPT.log', 'a'));
                    }
                    else {
                        define('LOG', fopen('BPT.log', 'w'));
                        fwrite(LOG,"♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nTnx for using our library\nSome information about us :\nAuthor : @Im_Miaad\nHelper : @A_LiReza_ME\nChannel : @BPT_CH\nOur Website : https://bpt-proto.ir\n\nIf you have any problem with our library\nContact to our supports\n♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nINFO : BPT PROTO LOG STARTED ...\nWARNING : THIS FILE AUTOMATICALLY DELETED WHEN ITS SIZE REACHED 10 MB\n\n");
                    }
                }
                else {
                    define('LOG', fopen('BPT.log', 'a'));
                    fwrite(LOG,"♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nTnx for using our library\nSome information about us :\nAuthor : @Im_Miaad\nHelper : @A_LiReza_ME\nChannel : @BPT_CH\nOur Website : https://bpt-proto.ir\n\nIf you have any problem with our library\nContact to our supports\n♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nINFO : BPT PROTO LOG STARTED ...\nWARNING : THIS FILE AUTOMATICALLY DELETED WHEN ITS SIZE REACHED 10 MB\n\n");
                }
            }
        }

        if (isset($settings['token'])) {
            if ($this->isToken(['token' => $settings['token']])) {
                $this->token = $settings['token'];
                $this->bot_id = explode(':', $settings['token'])[0];
                if (!$settings['debug']) {
                    if ($settings['security']) {
                        ini_set('magic_quotes_gpc', 'off');
                        ini_set('sql.safe_mode', 'on');
                        ini_set('max_execution_time', 30);
                        ini_set('max_input_time', 30);
                        ini_set('memory_limit', '20M');
                        ini_set('post_max_size', '8K');
                        ini_set('expose_php', 'off');
                        ini_set('file_uploads', 'off');
                        ini_set('display_errors', 0);
                        ini_set('error_reporting', 0);
                    }
                    if ($settings['secure_folder']) {
                        $address = explode('/', $_SERVER['REQUEST_URI']);
                        unset($address[count($address) - 1]);
                        $address = implode('/', $address) . '/BPT.php';
                        $text = "ErrorDocument 404 $address\nErrorDocument 403 $address\n Options -Indexes\n  Order Deny,Allow\nDeny from all\nAllow from 127.0.0.1\n<Files *.php>\n    Order Allow,Deny\n    Allow from all\n</Files>";
                        if (!file_exists('.htaccess') || filesize('.htaccess') != strlen($text)) {
                            file_put_contents('.htaccess', $text);
                        }
                    }
                }
                if (!isset($settings['db'])) {
                    if (!empty($settings['db'])) {
                        $settings['db'] = ['type' => 'json', 'file_name' => 'BPT-DB.json'];
                        if (!file_exists($settings['db']['file_name'])) {
                            file_put_contents($settings['db']['file_name'], json_encode(['private' => [], 'group' => [], 'supergroup' => [], 'channel' => []]));
                        }
                    }
                    else $this->db = null;
                }
                else {
                    if (!isset($settings['db']['type'])) {
                        $settings['db']['type'] = 'json';
                    }
                    if ($settings['db']['type'] === 'sql') {
                        if (!isset($settings['db']['host'])) {
                            $settings['db']['host'] = 'localhost';
                        }
                        if (!isset($settings['db']['port'])) {
                            $settings['db']['port'] = 3306;
                        }
                        if (!isset($settings['db']['user'])) {
                            $this->logger('error', 'db user parameter not found , sql type need user parameter');
                            throw new exception('sql user parameter');
                        }
                        if (!isset($settings['db']['pass'])) {
                            $this->logger('error', 'db pass parameter not found , sql type need pass parameter');
                            throw new exception('sql pass parameter');
                        }
                        if (!isset($settings['db']['name'])) {
                            $this->logger('error', 'db name parameter not found , sql type need name parameter');
                            throw new exception('sql name parameter');
                        }
                        $db = new mysqli($settings['db']['host'], $settings['db']['user'], $settings['db']['pass'], $settings['db']['name'], $settings['db']['port']);
                        if ($db->errno) {
                            $this->logger('error', 'sql connection has problem , error : ' . $db->error);
                            throw new exception('sql connection problem');
                        }
                        $check = $db->query("SELECT `TABLE_NAME` FROM `information_schema`.`tables` WHERE `table_schema` = '{$settings['db']['name']}' AND `table_name` in ('private','chats','users')");
                        if ($check->num_rows < 3) {
                            $db->query("
CREATE TABLE IF NOT EXISTS `chats` (
    `id` bigint(20) NOT NULL,
    `type` enum('group','supergroup','channel') NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `private` (
    `id` bigint(20) NOT NULL,
    `last_active` int(11) NOT NULL DEFAULT 0,
    `phone_number` varchar(16) DEFAULT NULL,
    `step` varchar(32) DEFAULT NULL,
    `value` text DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
    `id` bigint(20) NOT NULL,
    `gid` bigint(20) NOT NULL,
    `last_active` int(11) NOT NULL DEFAULT 0,
    `step` varchar(32) DEFAULT NULL,
    `value` text DEFAULT NULL,
    PRIMARY KEY (`id`,`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");
                        }
                        $this->db = $db;
                    }
                    elseif ($settings['db']['type'] === 'json') {
                        if (!isset($settings['db']['file_name'])) {
                            $settings['db']['file_name'] = 'BPT-DB.json';
                        }
                        $this->db = $settings['db'];
                        if (!file_exists($settings['db']['file_name'])) {
                            file_put_contents($settings['db']['file_name'], json_encode(['private' => [], 'group' => [], 'supergroup' => [], 'channel' => []]));
                        }
                    }
                    else {
                        $this->logger('error', 'Wrong db type , it must be json or sql in lowercase');
                        throw new exception('wrong db type');
                    }
                }
                if ($this->settings['auto_update']) {
                    $this->bptUpdate();
                }
                if($settings['receive'] === 'webhook'){
                    if ($settings['multi']) {
                        if (!file_exists('BPT-M.look')) {
                            if (!file_exists('BPT-MC.look')) {
                                if (file_exists('BPT.look')) {
                                    unlink('BPT.look');
                                }
                                if (file_exists('getUpdate.lock')) {
                                    unlink('getUpdate.lock');
                                }
                                if (empty($settings['certificate'])) {
                                    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                                    $settings['certificate'] = null;
                                }
                                else {
                                    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                                    if (file_exists($settings['certificate'])) {
                                        $settings['certificate'] = new CURLFile($settings['certificate']);
                                    }
                                }
                                $file = basename($_SERVER['REQUEST_URI']);
                                $url2 = str_replace($file, 'receiver.php', $url);
                                if (function_exists('exec') && !in_array('exec', array_map('trim', explode(', ', ini_get('disable_functions')))) && strtolower(ini_get('safe_mode')) != 1) {
                                    file_put_contents('receiver.php', '<?php
$BPT = file_get_contents("php://input");
$id = json_decode($BPT, true)[\'update_id\'];
file_put_contents("{$_SERVER[\'REMOTE_ADDR\']}-$id.update",$BPT);
exec("php ' . $file . ' > /dev/null &");');
                                    $res = $this->setWebhook(['url' => $url2, 'allowed_updates' => json_encode($settings['allowed_updates']), 'max_connections' => $settings['max_connection'], 'certificate' => $settings['certificate']]);
                                    if ($res['ok'] === true) {
                                        $this->logger('info', 'webhook was set successfully');
                                        touch('BPT-M.look');
                                        die('webhook was set');
                                    }
                                    else {
                                        $this->logger('error', "there is some problem with setWebhook , telegram response :\n" . json_encode($res));
                                        unlink('receiver.php');
                                        print_r($res);
                                        die();
                                    }
                                }
                                else {
                                    $url3 = str_replace($file, basename(__FILE__), $url);
                                    $times = [];
                                    for ($i = 0; $i < 10; $i ++) {
                                        $ch = curl_init($url3);
                                        curl_setopt_array($ch, [CURLOPT_POSTFIELDS => json_encode([]), CURLOPT_TIMEOUT_MS => 100, CURLOPT_NOBODY => true, CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false, CURLOPT_CONNECTTIMEOUT_MS => 100, CURLOPT_HTTPHEADER => ['accept: application/json', 'content-type: application/json']]);
                                        $start = microtime(true);
                                        curl_exec($ch);
                                        $times[] = ((microtime(true) - $start) * 1000);
                                    }
                                    $timeout = round(array_sum($times) / count($times));
                                    $timeout = $timeout > 50 ? $timeout + 10 : 50;
                                    file_put_contents('receiver.php', '<?php http_response_code(200);ignore_user_abort();$ch = curl_init(\'' . $url . '\');curl_setopt_array($ch, [CURLOPT_POSTFIELDS => json_encode([\'update\'=>file_get_contents(\'php://input\'),\'ip\'=>$_SERVER[\'REMOTE_ADDR\']]), CURLOPT_TIMEOUT_MS => ' . $timeout . ', CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false, CURLOPT_CONNECTTIMEOUT_MS => ' . $timeout . ', CURLOPT_HTTPHEADER => [\'accept: application/json\', \'content-type: application/json\']]);curl_exec($ch);curl_close($ch);?>');
                                    $res = $this->setWebhook(['url' => $url2, 'allowed_updates' => json_encode($settings['allowed_updates']), 'max_connections' => $settings['max_connection'], 'certificate' => $settings['certificate']]);
                                    if ($res['ok'] === true) {
                                        $this->logger('info', 'webhook was set successfully');
                                        touch('BPT-MC.look');
                                        die('webhook was setted');
                                    }
                                    else {
                                        $this->logger('error', "there is some problem with setWebhook , telegram response :\n" . json_encode($res));
                                        unlink('receiver.php');
                                        print_r($res);
                                        die();
                                    }
                                }
                            }
                            elseif ($_SERVER['REMOTE_ADDR'] !== $_SERVER['SERVER_ADDR']) {
                                $this->logger('warning', 'not authorized access denied');
                                endPage();
                            }
                            else {
                                $input = json_decode(file_get_contents("php://input"), true);
                                $ip = $input['ip'];
                                if ($settings['telegram_verify'] && !$this->isTelegram(['ip' => $ip])) {
                                    $this->logger('warning', 'not authorized access denied');
                                    endPage();
                                }
                                $updates = $input['update'];
                            }
                        }
                        else {
                            $up = glob('*.update');
                            if (isset($up[0])) {
                                $up = end($up);
                                $ip = explode('-', $up)[0];
                                if ($settings['telegram_verify'] && !$this->isTelegram(['ip' => $ip])) {
                                    $this->logger('warning', 'not authorized access denied');
                                    endPage();
                                }
                                $updates = file_get_contents($up);
                                unlink($up);
                            }
                            else {
                                $this->logger('warning', 'not authorized access denied');
                                endPage();
                            }
                        }
                    }
                    else {
                        if (!file_exists('BPT.look')) {
                            if (file_exists('BPT-M.look')) {
                                unlink('BPT-M.look');
                            }
                            if (file_exists('BPT-MC.look')) {
                                unlink('BPT-MC.look');
                            }
                            if (file_exists('getUpdate.lock')) {
                                unlink('getUpdate.lock');
                            }
                            if (empty($settings['certificate'])) {
                                $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                            }
                            else {
                                $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                                if (file_exists($settings['certificate'])) {
                                    $settings['certificate'] = new CURLFile($settings['certificate']);
                                }
                            }
                            $res = $this->setWebhook(['url' => $url, 'allowed_updates' => json_encode($settings['allowed_updates']), 'max_connections' => $settings['max_connection'], 'certificate' => $settings['certificate']]);
                            if ($res['ok'] === true) {
                                touch('BPT.look');
                                $this->logger('info', 'webhook was set successfully');
                                die('Done');
                            }
                            else {
                                $this->logger('error', "there is some problem with setWebhook , telegram response :\n" . json_encode($res));
                                print_r($res);
                                die();
                            }
                        }
                        else {
                            if ($settings['telegram_verify']) {
                                if (!$this->isTelegram(['ip' => $_SERVER['REMOTE_ADDR']])) {
                                    $this->logger('warning', 'not authorized access denied. IP : '.$_SERVER['REMOTE_ADDR']);
                                    endPage();
                                }
                            }
                            $updates = file_get_contents("php://input");
                        }
                    }
                    $update = json_decode($updates, $settings['array_update']);
                    if ($update) {
                        $this->update = json_decode($updates);
                        if ($settings['array_update']) {
                            if((isset($update['message']) && isset($update['message']['text']))||(isset($update['edited_message']) && isset($update['edited_message']['text']))){
                                if (isset($update['message'])) $type = 'message';
                                else $type = 'edited_message';

                                $text = &$update[$type]['text'];
                                if ($settings['security']){
                                    $text = strip_tags(htmlspecialchars(stripslashes(trim($text))));
                                }
                                if (strpos($text,'/') === 0){
                                    preg_match('/\/([a-zA-Z_0-9]{1,64})(@[a-zA-Z]\w{1,28}bot)?( [\S]{1,64})?/',$text,$result);
                                    if (!empty($result[1])){
                                        $update[$type]['commend'] = $result[1];
                                    }
                                    if (!empty($result[2])){
                                        $update[$type]['commend_username'] = $result[2];
                                    }
                                    if (!empty($result[3])){
                                        $update[$type]['commend_payload'] = $result[3];
                                    }
                                }
                            }
                        }
                        else {
                            if((isset($update->message) && isset($update->message->text)) || (isset($update->edited_message) && isset($update->edited_message->text))){
                                if (isset($update->message)) $type = 'message';
                                else $type = 'edited_message';

                                $text = &$update->$type->text;
                                if ($settings['security']){
                                    $text = strip_tags(htmlspecialchars(stripslashes(trim($text))));
                                }
                                if (strpos($text,'/') === 0){
                                    preg_match('/\/([a-zA-Z_0-9]{1,64})(@[a-zA-Z]\w{1,28}bot)?( [\S]{1,64})?/',$text,$result);
                                    if (!empty($result[1])){
                                        $update->$type->commend = $result[1];
                                    }
                                    if (!empty($result[2])){
                                        $update->$type->commend_username = $result[2];
                                    }
                                    if (!empty($result[3])){
                                        $update->$type->commend_payload = $result[3];
                                    }
                                }
                            }
                        }
                        $this->logger('', "BPT update received");
                        if ($settings['handler']) {
                            if ($settings['split_update']) {
                                $message_update = method_exists($this, 'message');
                                $inline_query = method_exists($this, 'inline_query');
                                $callback_query = method_exists($this, 'callback_query');
                                $edited_message = method_exists($this, 'edited_message');
                                $something_else = method_exists($this, 'something_else');
                            }
                            else {
                                $all = method_exists($this, 'all');
                            }
                            if ($settings['split_update']) {
                                if ($settings['array_update']) {
                                    if (isset($update['message']) && $message_update === true) {
                                        $this->users($update['message'], 'message');
                                        $this->message($update['message']);
                                    }
                                    elseif (isset($update['callback_query']) && $callback_query === true) {
                                        $this->users($update['callback_query'], 'callback');
                                        $this->callback_query($update['callback_query']);
                                    }
                                    elseif (isset($update['inline_query']) && $inline_query === true) {
                                        $this->users($update['inline_query'], 'inline');
                                        $this->inline_query($update['inline_query']);
                                    }
                                    elseif (isset($update['edited_message']) && $edited_message === true) {
                                        $this->users($update['edited_message'], 'edit');
                                        $this->edited_message($update['edited_message']);
                                    }
                                    elseif ($something_else === true) {
                                        $this->something_else($update);
                                    }
                                }
                                else {
                                    if (isset($update->message) && $message_update === true) {
                                        $this->users($update->message, 'message');
                                        $this->message($update->message);
                                    }
                                    elseif (isset($update->callback_query) && $callback_query === true) {
                                        $this->users($update->callback_query, 'callback');
                                        $this->callback_query($update->callback_query);
                                    }
                                    elseif (isset($update->inline_query) && $inline_query === true) {
                                        $this->users($update->inline_query, 'inline');
                                        $this->inline_query($update->inline_query);
                                    }
                                    elseif (isset($update->edited_message) && $edited_message === true) {
                                        $this->users($update->edited_message, 'edit');
                                        $this->edited_message($update->edited_message);
                                    }
                                    elseif ($something_else === true) {
                                        $this->something_else($update);
                                    }
                                }
                            }
                            elseif ($all === true) {
                                $this->all($update);
                            }
                            else{
                                $this->logger('warning', " If you want use the library with out split update , you most define `all` method in handler");
                            }
                        }
                    }
                }
                elseif ($settings['receive'] === 'getupdates') {
                    if ($settings['handler']) {
                        if (file_exists('getUpdate.lock')) {
                            $last_update = file_get_contents('getUpdate.lock');
                        }
                        else {
                            if (file_exists('BPT.look')) {
                                unlink('BPT.look');
                            }
                            if (file_exists('BPT-M.look')) {
                                unlink('BPT-M.look');
                            }
                            if (file_exists('BPT-MC.look')) {
                                unlink('BPT-MC.look');
                            }
                            $this->deleteWebhook();
                            $last_update = 0;
                            file_put_contents('getUpdate.lock', 0);
                        }
                        if ($settings['split_update']) {
                            $message_update = method_exists($this, 'message');
                            $inline_query = method_exists($this, 'inline_query');
                            $callback_query = method_exists($this, 'callback_query');
                            $edited_message = method_exists($this, 'edited_message');
                            $something_else = method_exists($this, 'something_else');
                        }
                        else {
                            $all = method_exists($this, 'all');
                        }
                        while (true){
                            if (!file_exists('getUpdate.lock')) exit();
                            $updates = $this->getUpdates(['allowed_updates' => $settings['allowed_updates'], 'offset' => $last_update, 'return_array' => $settings['array_update']]);
                            $updates = $updates->result ?? $updates['result'];
                            foreach ($updates as $update) {
                                if ($settings['array_update']) {
                                    $this->update = json_decode(json_encode($update));
                                    if ($settings['split_update']) {
                                        if (isset($update['message']) && $message_update === true) {
                                            $message = $update['message'];
                                            if ($settings['security']) {
                                                $message['text'] = strip_tags(htmlspecialchars(stripslashes(trim($message['text']))));
                                            }
                                            $this->users($message, 'message');
                                            $this->message($message);
                                        }
                                        elseif (isset($update['callback_query']) && $callback_query === true) {
                                            $this->users($update['callback_query'], 'callback');
                                            $this->callback_query($update['callback_query']);
                                        }
                                        elseif (isset($update['inline_query']) && $inline_query === true) {
                                            $this->users($update['inline_query'], 'inline');
                                            $this->inline_query($update['inline_query']);
                                        }
                                        elseif (isset($update['edited_message']) && $edited_message === true) {
                                            $this->users($update['edited_message'], 'edit');
                                            $this->edited_message($update['edited_message']);
                                        }
                                        elseif ($something_else === true) {
                                            $this->something_else($update);
                                        }
                                    }
                                    elseif ($all === true) {
                                        $this->all($update);
                                    }
                                    file_put_contents('getUpdate.lock', $update['update_id']+1);
                                    $last_update = $update['update_id']+1;
                                }
                                else {
                                    $this->update = $update;
                                    if ($settings['split_update']) {
                                        if (isset($update->message) && $message_update === true) {
                                            $message = $update->message;
                                            if ($settings['security']) {
                                                $message->text = strip_tags(htmlspecialchars(stripslashes(trim($message->text))));
                                            }
                                            $this->users($message, 'message');
                                            $this->message($message);
                                        }
                                        elseif (isset($update->callback_query) && $callback_query === true) {
                                            $this->users($update->callback_query, 'callback');
                                            $this->callback_query($update->callback_query);
                                        }
                                        elseif (isset($update->inline_query) && $inline_query === true) {
                                            $this->users($update->inline_query, 'inline');
                                            $this->inline_query($update->inline_query);
                                        }
                                        elseif (isset($update->edited_message) && $edited_message === true) {
                                            $this->users($update->edited_message, 'edit');
                                            $this->edited_message($update->edited_message);
                                        }
                                        elseif ($something_else === true) {
                                            $this->something_else($update);
                                        }
                                    }
                                    elseif ($all === true) {
                                        $this->all($update);
                                    }
                                    file_put_contents('getUpdate.lock', $update->update_id+1);
                                    $last_update = $update->update_id+1;
                                }
                            }
                        }
                    }
                    else {
                        $this->logger('error', 'you can\'t use getupdates receiver when handler is off');
                        throw new exception('getupdates not allowed');
                    }
                }
            }
            else {
                $this->logger('error', 'token format is not true');
                throw new exception('token is not true');
            }
        }
        else {
            $this->logger('error', 'token not found');
            throw new exception('token missing');
        }
    }

    public function __destruct() {
        if(defined('LOG') && is_resource(LOG)) {
            $estimated = (microtime(true)-$_SERVER['REQUEST_TIME_FLOAT'])*1000;
            $this->logger('',"BPT Done in $estimated ms");
        }
        if ($this->curl_handler){
            curl_close($this->curl_handler);
        }
    }

    public function __call ($action, $data) {
        if (isset($data[0])) $data = $data[0];
        $req_action = str_replace('_', '', strtolower($action));
        $action = $this->methodsAction($req_action);
        if (!empty($action)) {
            $defaults = $this->methodsDefault($action);
            foreach ($defaults as $key => $default) {
                if (is_numeric($key)) {
                    if (!isset($data[$default])){
                        $data[$default] = $this->catchFields(['field' => $default]);
                    }
                }
                elseif (isset($this->update->$key) || $key === 'other') {
                    foreach ($default as $def) {
                        if (!isset($data[$def])){
                            $data[$def] = $this->catchFields(['field' => $def]);
                        }
                    }
                    break;
                }
            }
            if ($this->settings['debug']) {
                $requires = $this->methodsRequire($action);
                $req_param = [];
                foreach ($requires as $require) {
                    if (!isset($data[$require])) {
                        $req_param[] = $require;
                    }
                }
                if (count($req_param) > 0){
                    $this->logger('error', "required parameter for this method is not founded.\ninfo : these req parameters are not set :" . json_encode($req_param));
                    throw new exception('required parameters not found');
                }
            }
            if ($req_action === 'kick') {
                if (isset($data['only_if_banned'])) {
                    unset($data['only_if_banned']);
                }
            }
            if ($action === 'sendMediaGroup') {
                foreach ($data['media'] as $key => $media) {
                    if (file_exists($media['media'])) {
                        $data['media'][$key] = new CURLFile($media['media']);
                    }
                }
            }
            else {
                $file_params = $this->methodsFile($action);
                foreach ($file_params as $param) {
                    if (isset($data[$param]) && file_exists($data[$param])) {
                        $data[$param] = new CURLFile($data[$param]);
                    }
                }
            }
        }
        else{
            $this->logger('warning',"$req_action methods not found , but its called anyway");
            $action = $req_action;
        }

        if (isset($data['answer'])) {
            if (!$this->web_answered) {
                if ($this->settings['multi'] === true) {
                    $this->logger('error', 'you can\'t use answer mode when multi is on');
                    throw new exception('answer mode not allowed bc multi');
                }
                if (isset($data['token'])) {
                    unset($data['token']);
                }
                if (isset($data['forgot'])) {
                    unset($data['forgot']);
                }
                if (isset($data['return_array'])) {
                    unset($data['return_array']);
                }
                foreach ($data as $key=>&$value){
                    if (!isset($value)){
                        unset($data[$key]);
                        continue;
                    }
                    if (is_array($value) || (is_object($value) && !is_a($value,'CURLFile'))){
                        $value = json_encode($value);
                    }
                }
                $this->web_answered = true;
                $data["method"] = $action;
                $payload = json_encode($data);
                header('Content-Type: application/json;Content-Length: ' . strlen($payload));
                echo $payload;
                return true;
            }
            else {
                $this->logger('error', 'you can use answer mode only once for each webhook update and you already did');
                throw new exception('answer mode not allowed');
            }
        }
        else {
            if (isset($data['token']) && $data['token'] != $this->token) {
                $token = $data['token'];
                unset($data['token']);
                $curl_handler = curl_init("{$this->settings['base_url']}$token/");
                curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl_handler, CURLOPT_SSL_VERIFYPEER, false);
            }
            else{
                $token = $this->token;
                if (!isset($this->curl_handler)){
                    $this->curl_handler = curl_init("{$this->settings['base_url']}$token/");
                    curl_setopt($this->curl_handler, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($this->curl_handler, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($this->curl_handler, CURLOPT_TCP_KEEPALIVE, 1);
                }
                $curl_handler = $this->curl_handler;
            }

            if (isset($data['return_array'])) {
                $return_array = $data['return_array'];
                unset($data['return_array']);
            }
            else{
                $return_array = true;
            }

            foreach ($data as $key=>&$value){
                if (is_array($value) || (is_object($value) && !is_a($value,'CURLFile'))){
                    $value = json_encode($value);
                }
            }

            $data['method'] = $action;
            curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $data);
            $result = curl_exec($curl_handler);
            if (curl_errno($curl_handler)) {
                $this->logger('warning',curl_error($curl_handler));
            }

            if ($token != $this->token) {
                curl_close($curl_handler);
            }
            return json_decode($result, true);
        }
    }

    private function methodsAction($input){
        return [
                'getupdates'                      => 'getUpdates',
                'getup'                           => 'getUpdates',
                'updates'                         => 'getUpdates',
                'setwebhook'                      => 'setWebhook',
                'setweb'                          => 'setWebhook',
                'webhook'                         => 'setWebhook',
                'deletewebhook'                   => 'deleteWebhook',
                'deleteweb'                       => 'deleteWebhook',
                'delweb'                          => 'deleteWebhook',
                'getwebhookinfo'                  => 'getWebhookInfo',
                'getweb'                          => 'getWebhookInfo',
                'getme'                           => 'getMe',
                'me'                              => 'getMe',
                'logout'                          => 'logOut',
                'close'                           => 'close',
                'sendmessage'                     => 'sendMessage',
                'send'                            => 'sendMessage',
                'forwardmessage'                  => 'forwardMessage',
                'forward'                         => 'forwardMessage',
                'copymessage'                     => 'copyMessage',
                'copy'                            => 'copyMessage',
                'sendphoto'                       => 'sendPhoto',
                'photo'                           => 'sendPhoto',
                'sendaudio'                       => 'sendAudio',
                'audio'                           => 'sendAudio',
                'senddocument'                    => 'sendDocument',
                'senddoc'                         => 'sendDocument',
                'document'                        => 'sendDocument',
                'doc'                             => 'sendDocument',
                'sendvideo'                       => 'sendVideo',
                'video'                           => 'sendVideo',
                'sendanimation'                   => 'sendAnimation',
                'animation'                       => 'sendAnimation',
                'sendgif'                         => 'sendAnimation',
                'gif'                             => 'sendAnimation',
                'sendvoice'                       => 'sendVoice',
                'voice'                           => 'sendVoice',
                'sendvideonote'                   => 'sendVideoNote',
                'videonote'                       => 'sendVideoNote',
                'sendmediagroup'                  => 'sendMediaGroup',
                'mediagroup'                      => 'sendMediaGroup',
                'media'                           => 'sendMediaGroup',
                'sendlocation'                    => 'sendLocation',
                'sendloc'                         => 'sendLocation',
                'location'                        => 'sendLocation',
                'loc'                             => 'sendLocation',
                'editmessagelivelocation'         => 'editMessageLiveLocation',
                'editliveloc'                     => 'editMessageLiveLocation',
                'stopmessagelivelocation'         => 'stopMessageLiveLocation',
                'stopliveloc'                     => 'stopMessageLiveLocation',
                'sendvenue'                       => 'sendVenue',
                'venue'                           => 'sendVenue',
                'sendcontact'                     => 'sendContact',
                'contact'                         => 'sendContact',
                'sendpoll'                        => 'sendPoll',
                'poll'                            => 'sendPoll',
                'senddice'                        => 'sendDice',
                'dice'                            => 'sendDice',
                'sendchataction'                  => 'sendChatAction',
                'chataction'                      => 'sendChatAction',
                'action'                          => 'sendChatAction',
                'getuserprofilephotos'            => 'getUserProfilePhotos',
                'userphotos'                      => 'getUserProfilePhotos',
                'getfile'                         => 'getFile',
                'file'                            => 'getFile',
                'banchatmember'                   => 'banChatMember',
                'ban'                             => 'banChatMember',
                'kickchatmember'                  => 'banChatMember',
                'kick'                            => 'unbanChatMember',
                'unbanchatmember'                 => 'unbanChatMember',
                'unban'                           => 'unbanChatMember',
                'restrictchatmember'              => 'restrictChatMember',
                'restrict'                        => 'restrictChatMember',
                'promotechatmember'               => 'promoteChatMember',
                'promote'                         => 'promoteChatMember',
                'setchatadministratorcustomtitle' => 'setChatAdministratorCustomTitle',
                'customtitle'                     => 'setChatAdministratorCustomTitle',
                'banchatsenderchat'               => 'banChatSenderChat',
                'banSender'                       => 'banChatSenderChat',
                'unbanchatsenderchat'             => 'unbanChatSenderChat',
                'unbanSender'                     => 'unbanChatSenderChat',
                'setchatpermissions'              => 'setChatPermissions',
                'permissions'                     => 'setChatPermissions',
                'exportchatinvitelink'            => 'exportChatInviteLink',
                'link'                            => 'exportChatInviteLink',
                'createchatinvitelink'            => 'createChatInviteLink',
                'crlink'                          => 'createChatInviteLink',
                'editchatinvitelink'              => 'editChatInviteLink',
                'edlink'                          => 'editChatInviteLink',
                'revokechatinvitelink'            => 'revokeChatInviteLink',
                'relink'                          => 'revokeChatInviteLink',
                'approvechatjoinrequest'          => 'approveChatJoinRequest',
                'acceptjoin'                      => 'approveChatJoinRequest',
                'declinechatjoinrequest'          => 'declineChatJoinRequest',
                'denyjoin'                        => 'declineChatJoinRequest',
                'setchatphoto'                    => 'setChatPhoto',
                'deletechatphoto'                 => 'deleteChatPhoto',
                'setchattitle'                    => 'setChatTitle',
                'title'                           => 'setChatTitle',
                'setchatdescription'              => 'setChatDescription',
                'description'                     => 'setChatDescription',
                'pinchatmessage'                  => 'pinChatMessage',
                'pin'                             => 'pinChatMessage',
                'unpinchatmessage'                => 'unpinChatMessage',
                'unpin'                           => 'unpinChatMessage',
                'unpinallchatmessages'            => 'unpinAllChatMessages',
                'unpinall'                        => 'unpinAllChatMessages',
                'leavechat'                       => 'leaveChat',
                'leave'                           => 'leaveChat',
                'getchat'                         => 'getChat',
                'chat'                            => 'getChat',
                'getchatadministrators'           => 'getChatAdministrators',
                'admins'                          => 'getChatAdministrators',
                'getchatmembercount'              => 'getChatMembersCount',
                'getchatmemberscount'             => 'getChatMembersCount',
                'memberscount'                    => 'getChatMembersCount',
                'getchatmember'                   => 'getChatMember',
                'member'                          => 'getChatMember',
                'setchatstickerset'               => 'setChatStickerSet',
                'setsticker'                      => 'setChatStickerSet',
                'deletechatstickerset'            => 'deleteChatStickerSet',
                'delsticker'                      => 'deleteChatStickerSet',
                'answercallbackquery'             => 'answerCallbackQuery',
                'answer'                          => 'answerCallbackQuery',
                'setmycommands'                   => 'setMyCommands',
                'setcommands'                     => 'setMyCommands',
                'deletemycommands'                => 'deleteMyCommands',
                'deletecommands'                  => 'deleteMyCommands',
                'getmycommands'                   => 'getMyCommands',
                'getcommands'                     => 'getMyCommands',
                'setchatmenubutton'               => 'setChatMenuButton',
                'setmenubutton'                   => 'setChatMenuButton',
                'setmenu'                         => 'setChatMenuButton',
                'setbutton'                       => 'setChatMenuButton',
                'getchatmenubutton'               => 'getChatMenuButton',
                'getmenubutton'                   => 'getChatMenuButton',
                'getmenu'                         => 'getChatMenuButton',
                'getbutton'                       => 'getChatMenuButton',
                'setmydefaultadministratorrights' => 'setMyDefaultAdministratorRights',
                'setmydefaultadminrights'         => 'setMyDefaultAdministratorRights',
                'setmydefaultrights'              => 'setMyDefaultAdministratorRights',
                'setdefaultrights'                => 'setMyDefaultAdministratorRights',
                'getmydefaultadministratorrights' => 'getMyDefaultAdministratorRights',
                'getmydefaultadminrights'         => 'getMyDefaultAdministratorRights',
                'getmydefaultrights'              => 'getMyDefaultAdministratorRights',
                'getdefaultrights'                => 'getMyDefaultAdministratorRights',
                'editmessagetext'                 => 'editMessageText',
                'edittext'                        => 'editMessageText',
                'editmessagecaption'              => 'editMessageCaption',
                'editcap'                         => 'editMessageCaption',
                'editcaption'                     => 'editMessageCaption',
                'editmessagemedia'                => 'editMessageMedia',
                'editmedia'                       => 'editMessageMedia',
                'editmessagereplymarkup'          => 'editMessageReplyMarkup',
                'editreply'                       => 'editMessageReplyMarkup',
                'editkeyboard'                    => 'editMessageReplyMarkup',
                'stoppoll'                        => 'stopPoll',
                'deletemessage'                   => 'deleteMessage',
                'del'                             => 'deleteMessage',
                'sendsticker'                     => 'sendSticker',
                'sticker'                         => 'sendSticker',
                'getstickerset'                   => 'getStickerSet',
                'uploadstickerfile'               => 'uploadStickerFile',
                'uploadsticker'                   => 'uploadStickerFile',
                'createnewstickerset'             => 'createNewStickerSet',
                'createsticker'                   => 'createNewStickerSet',
                'addstickertoset'                 => 'addStickerToSet',
                'addsticker'                      => 'addStickerToSet',
                'setstickerpositioninset'         => 'setStickerPositionInSet',
                'setstickerposition'              => 'setStickerPositionInSet',
                'setstickerpos'                   => 'setStickerPositionInSet',
                'deletestickerfromset'            => 'deleteStickerFromSet',
                'deletesticker'                   => 'deleteStickerFromSet',
                'setstickersetthumb'              => 'setStickerSetThumb',
                'setstickerthumb'                 => 'setStickerSetThumb',
                'answerinlinequery'               => 'answerInlineQuery',
                'answerinline'                    => 'answerInlineQuery',
                'answerwebappquery'               => 'answerWebAppQuery',
                'answerwebapp'                    => 'answerWebAppQuery',
                'answerweb'                       => 'answerWebAppQuery',
                'sendinvoice'                     => 'sendInvoice',
                'invoice'                         => 'sendInvoice',
                'answershippingquery'             => 'answerShippingQuery',
                'answershipping'                  => 'answerShippingQuery',
                'answerprecheckoutquery'          => 'answerPreCheckoutQuery',
                'answerprecheckout'               => 'answerPreCheckoutQuery',
                'answerprecheck'                  => 'answerPreCheckoutQuery',
                'setpassportdataerrors'           => 'setPassportDataErrors',
                'setpassport'                     => 'setPassportDataErrors',
                'sendgame'                        => 'sendGame',
                'game'                            => 'sendGame',
                'setgamescore'                    => 'setGameScore',
                'gamescore'                       => 'setGameScore',
                'getgamehighscores'               => 'getGameHighScores',
                'getgamehigh'                     => 'getGameHighScores'
            ][$input]??'';
    }

    private function methodsDefault($input){
        return [
                'getUpdates'                      => [],
                'setWebhook'                      => ['url'],
                'deleteWebhook'                   => [],
                'getWebhookInfo'                  => [],
                'getMe'                           => [],
                'logOut'                          => [],
                'close'                           => [],
                'sendMessage'                     => ['chat_id'],
                'forwardMessage'                  => ['from_chat_id','message_id'],
                'copyMessage'                     => ['from_chat_id','message_id'],
                'sendPhoto'                       => ['chat_id'],
                'sendAudio'                       => ['chat_id'],
                'sendDocument'                    => ['chat_id'],
                'sendVideo'                       => ['chat_id'],
                'sendAnimation'                   => ['chat_id'],
                'sendVoice'                       => ['chat_id'],
                'sendVideoNote'                   => ['chat_id'],
                'sendMediaGroup'                  => ['chat_id'],
                'sendLocation'                    => ['chat_id'],
                'editMessageLiveLocation'         => [],
                'stopMessageLiveLocation'         => [],
                'sendVenue'                       => [],
                'sendContact'                     => ['chat_id'],
                'sendPoll'                        => ['chat_id'],
                'sendDice'                        => ['chat_id'],
                'sendChatAction'                  => ['chat_id','action'],
                'getUserProfilePhotos'            => ['user_id'],
                'getFile'                         => ['file_id'],
                'banChatMember'                   => ['chat_id','user_id'],
                'kickChatMember'                  => ['chat_id','user_id'],
                'unbanChatMember'                 => ['chat_id','user_id'],
                'restrictChatMember'              => ['chat_id','user_id'],
                'promoteChatMember'               => ['chat_id','user_id'],
                'setChatAdministratorCustomTitle' => ['chat_id','user_id'],
                'banChatSenderChat'               => ['chat_id'],
                'unbanChatSenderChat'             => ['chat_id'],
                'setChatPermissions'              => ['chat_id'],
                'exportChatInviteLink'            => ['chat_id'],
                'createChatInviteLink'            => ['chat_id'],
                'editChatInviteLink'              => ['chat_id'],
                'revokeChatInviteLink'            => ['chat_id'],
                'approveChatJoinRequest'          => ['chat_id','user_id'],
                'declineChatJoinRequest'          => ['chat_id','user_id'],
                'setChatPhoto'                    => ['chat_id'],
                'deleteChatPhoto'                 => ['chat_id'],
                'setChatTitle'                    => ['chat_id'],
                'setChatDescription'              => ['chat_id'],
                'pinChatMessage'                  => ['chat_id'],
                'unpinChatMessage'                => ['chat_id'],
                'unpinAllChatMessages'            => ['chat_id'],
                'leaveChat'                       => ['chat_id'],
                'getChat'                         => ['chat_id'],
                'getChatAdministrators'           => ['chat_id'],
                'getChatMembersCount'             => ['chat_id'],
                'getChatMember'                   => ['chat_id','user_id'],
                'setChatStickerSet'               => ['chat_id'],
                'deleteChatStickerSet'            => ['chat_id'],
                'answerCallbackQuery'             => ['callback_query_id'],
                'setMyCommands'                   => [],
                'deleteMyCommands'                => [],
                'getMyCommands'                   => [],
                'setChatMenuButton'               => [],
                'getChatMenuButton'               => [],
                'setMyDefaultAdministratorRights' => [],
                'getMyDefaultAdministratorRights' => [],
                'editMessageText'                 => ['inline_query'=>['inline_message_id'],'other'=>['chat_id','message_id']],
                'editMessageCaption'              => ['inline_query'=>['inline_message_id'],'other'=>['chat_id','message_id']],
                'editMessageMedia'                => ['inline_query'=>['inline_message_id'],'other'=>['chat_id','message_id']],
                'editMessageReplyMarkup'          => ['inline_query'=>['inline_message_id'],'other'=>['chat_id','message_id']],
                'stopPoll'                        => ['chat_id','message_id'],
                'deleteMessage'                   => ['chat_id','message_id'],
                'sendSticker'                     => ['chat_id'],
                'getStickerSet'                   => [],
                'uploadStickerFile'               => ['user_id'],
                'createNewStickerSet'             => ['user_id'],
                'addStickerToSet'                 => ['user_id'],
                'setStickerPositionInSet'         => [],
                'deleteStickerFromSet'            => [],
                'setStickerSetThumb'              => ['user_id'],
                'answerInlineQuery'               => ['inline_query_id'],
                'sendInvoice'                     => ['chat_id'],
                'answerWebAppQuery'               => [],
                'answerShippingQuery'             => ['shipping_query_id'],
                'answerPreCheckoutQuery'          => ['pre_checkout_query_id'],
                'setPassportDataErrors'           => ['user_id'],
                'sendGame'                        => ['chat_id'],
                'setGameScore'                    => ['user_id','inline_query'=>['inline_message_id'],'other'=>['chat_id','message_id']],
                'getGameHighScores'               => ['user_id','inline_query'=>['inline_message_id'],'other'=>['chat_id','message_id']]
            ][$input]??[];
    }

    private function methodsRequire($input){
        return [
                'getUpdates'                      => [],
                'setWebhook'                      => [],
                'deleteWebhook'                   => [],
                'getWebhookInfo'                  => [],
                'getMe'                           => [],
                'logOut'                          => [],
                'close'                           => [],
                'sendMessage'                     => ['text'],
                'forwardMessage'                  => ['chat_id'],
                'copyMessage'                     => ['chat_id'],
                'sendPhoto'                       => ['photo'],
                'sendAudio'                       => ['audio'],
                'sendDocument'                    => ['document'],
                'sendVideo'                       => ['video'],
                'sendAnimation'                   => ['animation'],
                'sendVoice'                       => ['voice'],
                'sendVideoNote'                   => ['video_note'],
                'sendMediaGroup'                  => ['media'],
                'sendLocation'                    => ['latitude', 'longitude'],
                'editMessageLiveLocation'         => ['latitude', 'longitude'],
                'stopMessageLiveLocation'         => [],
                'sendVenue'                       => ['latitude', 'longitude', 'title', 'address'],
                'sendContact'                     => ['phone_number', 'first_name'],
                'sendPoll'                        => ['question', 'options'],
                'sendDice'                        => [],
                'sendChatAction'                  => [],
                'getUserProfilePhotos'            => [],
                'getFile'                         => [],
                'banChatMember'                   => [],
                'kickChatMember'                  => [],
                'unbanChatMember'                 => [],
                'restrictChatMember'              => ['permissions'],
                'promoteChatMember'               => [],
                'setChatAdministratorCustomTitle' => ['custom_title'],
                'banChatSenderChat'               => ['sender_chat_id'],
                'unbanChatSenderChat'             => ['sender_chat_id'],
                'setChatPermissions'              => ['permissions'],
                'exportChatInviteLink'            => [],
                'createChatInviteLink'            => [],
                'editChatInviteLink'              => ['invite_link'],
                'revokeChatInviteLink'            => ['invite_link'],
                'approveChatJoinRequest'          => [],
                'declineChatJoinRequest'          => [],
                'setChatPhoto'                    => ['photo'],
                'deleteChatPhoto'                 => [],
                'setChatTitle'                    => ['title'],
                'setChatDescription'              => [],
                'pinChatMessage'                  => [],
                'unpinChatMessage'                => [],
                'unpinAllChatMessages'            => [],
                'leaveChat'                       => [],
                'getChat'                         => [],
                'getChatAdministrators'           => [],
                'getChatMembersCount'             => [],
                'getChatMember'                   => [],
                'setChatStickerSet'               => ['sticker_set_name'],
                'deleteChatStickerSet'            => [],
                'answerCallbackQuery'             => [],
                'setMyCommands'                   => ['commands'],
                'deleteMyCommands'                => [],
                'getMyCommands'                   => [],
                'setChatMenuButton'               => [],
                'getChatMenuButton'               => [],
                'setMyDefaultAdministratorRights' => [],
                'getMyDefaultAdministratorRights' => [],
                'editMessageText'                 => ['text',],
                'editMessageCaption'              => [],
                'editMessageMedia'                => ['media',],
                'editMessageReplyMarkup'          => [],
                'stopPoll'                        => [],
                'deleteMessage'                   => [],
                'sendSticker'                     => ['sticker'],
                'getStickerSet'                   => ['name'],
                'uploadStickerFile'               => ['png_sticker'],
                'createNewStickerSet'             => ['name','title','emojis'],
                'addStickerToSet'                 => ['name','emojis'],
                'setStickerPositionInSet'         => ['position','sticker'],
                'deleteStickerFromSet'            => ['sticker'],
                'setStickerSetThumb'              => ['name'],
                'answerInlineQuery'               => ['results'],
                'answerwebappquery'               => ['web_app_query_id','result'],
                'sendInvoice'                     => ['title','description','payload','provider_token','currency','prices'],
                'answerShippingQuery'             => ['ok'],
                'answerPreCheckoutQuery'          => ['ok'],
                'setPassportDataErrors'           => ['errors'],
                'sendGame'                        => ['game_short_name'],
                'setGameScore'                    => ['score'],
                'getGameHighScores'               => []
            ][$input]??[];
    }

    private function methodsFile($input){
        return [
                'sendPhoto'           => ['photo'],
                'sendAudio'           => ['audio', 'thumb'],
                'sendDocument'        => ['document', 'thumb'],
                'sendVideo'           => ['video', 'thumb'],
                'sendAnimation'       => ['animation', 'thumb'],
                'sendVoice'           => ['voice', 'thumb'],
                'sendVideoNote'       => ['video_note', 'thumb'],
                'setChatPhoto'        => ['photo'],
                'sendSticker'         => ['sticker'],
                'uploadStickerFile'   => ['png_sticker'],
                'createNewStickerSet' => ['png_sticker', 'tgs_sticker'],
                'addStickerToSet'     => ['png_sticker', 'tgs_sticker'],
                'setStickerSetThumb'  => ['thumb'],
            ][$input]??[];
    }

    private function bptUpdate(){
        if(!file_exists('update.lock') || filemtime('update.lock')+300 < time()){
            touch('update.lock');
            $res = file_get_contents("https://dl.bptlib.ir/update.php?ver=$this->version");
            if($res !== '[]'){
                $res = json_decode($res,true);
                if (isset($res['file'])){
                    copy('https://dl.bptlib.ir/BPT.php','BPT.php');
                }
            }
        }
    }

    private function logger($type,$text){
        if($this->settings['logger']){
            if($type === '') fwrite(LOG, date('Y/m/d H:i:s') . " : $text\n");
            else fwrite(LOG, date('Y/m/d H:i:s') . " : ⤵\n$type : $text\n");
        }
    }

    private function users($update, $update_type) {
        if(!empty($this->db)){
            if($this->settings['db']['type'] === 'json'){
                $BPT_DB = json_decode(file_get_contents($this->settings['db']['file_name']), true);
                if($update_type === 'message' || $update_type === 'edit') {
                    if ($this->settings['array_update']){
                        $type = $update['chat']['type'];
                        $id = $update['chat']['id'];
                        $user_id = $update['from']['id'];
                        if (isset($update['left_chat_member'])) $left = $update['left_chat_member'];
                        elseif (isset($update['new_chat_members'])) $news = $update['new_chat_members'];
                    }
                    else{
                        $type = $update->chat->type;
                        $id = $update->chat->id;
                        $user_id = $update->from->id;
                        if (isset($update->left_chat_member)) $left = $update->left_chat_member;
                        elseif (isset($update->new_chat_members)) $news = $update->new_chat_members;
                    }
                    if(!isset($BPT_DB[$type][$id])) $BPT_DB[$type][$id] = [];
                    if ($type !== 'private'){
                        if (isset($left)){
                            $user_id = $left['id'] ?? $left->id;
                            $BPT_DB[$type][$id]['users'][$user_id]['leaved'] = true;
                        }
                        elseif (isset($news)){
                            foreach ($news as $user){
                                $user_id = $user['id'] ?? $user->id;
                                if (!isset($BPT_DB[$type][$id]['users'][$user_id])) $BPT_DB[$type][$id]['users'][$user_id] = [];
                                else unset($BPT_DB[$type][$id]['users'][$user_id]['leaved']);
                            }
                        }
                        elseif (!isset($BPT_DB[$type][$id]['users'][$user_id])) $BPT_DB[$type][$id]['users'][$user_id] = [];
                        $BPT_DB[$type][$id]['users'][$user_id]['last_active'] = time();
                    }
                    else $BPT_DB[$type][$id]['last_active'] = time();
                }
                elseif($update_type === 'inline') {
                    $id = $this->settings['array_update'] ? $update['from']['id'] : $update->from->id;
                    if(!isset($BPT_DB['private'][$id])) $BPT_DB['private'][$id] = ['last_active'=>time()];
                    else $BPT_DB['private'][$id]['last_active'] = time();
                }
                elseif($update_type === 'callback') {
                    if ($this->settings['array_update']){
                        $type = $update['message']['chat']['type'];
                        $id = $update['message']['chat']['id'];
                        $user_id = $update['message']['from']['id'];
                    }
                    else{
                        $type = $update->message->chat->type;
                        $id = $update->message->chat->id;
                        $user_id = $update->message->from->id;
                    }
                    if(!isset($BPT_DB[$type][$id])) $BPT_DB[$type][$id] = [];
                    if ($type !== 'private'){
                        if (!isset($BPT_DB[$type][$id]['users'][$user_id])) $BPT_DB[$type][$id]['users'][$user_id] = [];
                        $BPT_DB[$type][$id]['users'][$user_id]['last_active'] = time();
                    }
                    else $BPT_DB[$type][$id]['last_active'] = time();
                }
                file_put_contents($this->settings['db']['file_name'], json_encode($BPT_DB));
            }
            elseif($this->settings['db']['type'] === 'sql'){
                if($update_type === 'message' || $update_type === 'edit') {
                    if ($this->settings['array_update']){
                        $type = $update['chat']['type'];
                        $id = $update['chat']['id'];
                        $user_id = $update['from']['id'];
                    }
                    else{
                        $type = $update->chat->type;
                        $id = $update->chat->id;
                        $user_id = $update->from->id;
                    }
                    if ($type === 'private'){
                        $info = $this->db->query("select `id` from `private` where `id` = $user_id limit 1")->num_rows;
                        if ($info < 1) $this->db->query("INSERT INTO `private`(`id`) VALUES ($user_id)");
                        else $this->db->query("update `private` set `last_active` = ".time()." where `id` = $user_id limit 1");
                    }else{
                        $info = $this->db->query("select `id` from `chats` where `id` = $id limit 1")->num_rows;
                        if ($info < 1) $this->db->query("INSERT INTO `chats`(`id`,`type`) VALUES ($id,'$type')");
                        else{
                            $time = time();
                            $info = $this->db->query("select `id` from `users` where `id` = $id and `gid` = $id limit 1")->num_rows;
                            if ($info < 1) $this->db->query("INSERT INTO `users`(`id`,`gid`,`last_active`) VALUES ($id,'$type',$time)");
                            else $this->db->query("update `users` set `last_active` = $time where `id` = $user_id and `gid` = $id limit 1");
                        }
                    }
                }
                elseif($update_type === 'inline') {
                    $id = $this->settings['array_update'] ? $update['from']['id'] : $update->from->id;
                    $info = $this->db->query("select `id` from `private` where `id` = $id limit 1")->num_rows;
                    if ($info < 1) $this->db->query("INSERT INTO `private`(`id`) VALUES ($id)");
                    else $this->db->query("update `private` set `last_active` = ".time()." where `id` = $id limit 1");
                }
                elseif($update_type === 'callback') {
                    if ($this->settings['array_update']){
                        $type = $update['message']['chat']['type'];
                        $id = $update['message']['chat']['id'];
                        $user_id = $update['message']['from']['id'];
                    }
                    else{
                        $type = $update->message->chat->type;
                        $id = $update->message->chat->id;
                        $user_id = $update->message->from->id;
                    }
                    if ($type === 'private'){
                        $info = $this->db->query("select `id` from `private` where `id` = $user_id limit 1")->num_rows;
                        if ($info < 1) $this->db->query("INSERT INTO `private`(`id`) VALUES ($user_id)");
                        else $this->db->query("update `private` set `last_active` = ".time()." where `id` = $user_id limit 1");
                    }
                    else{
                        $info = $this->db->query("select `id` from `chats` where `id` = $id limit 1")->num_rows;
                        if ($info < 1) $this->db->query("INSERT INTO `chats`(`id`,`type`) VALUES ($id,'$type')");
                        else $this->db->query("update `users` set `last_active` = ".time()." where `id` = $user_id and `gid` = $id limit 1");
                    }
                }
            }
        }
    }

    /** ---------- Extra Methods ----------- */

    /**
     * You can catch field you want from telegram update. default values are caught by this method too
     *
     * e.g. => $this->catchFields(['field'=>'chat_id']);
     * @param array $array e.g. => ['field'=>'chat_id']
     * @return false|mixed|string
     * @throws exception
     */
    public function catchFields (array $array) {
        if (isset($array['field'])) {
            $field = $array['field'];
        }
        else {
            $this->logger('error', "BPT catchFields method used\nfield parameter not found");
            throw new exception('field parameter not found');
        }
        if ($field === 'chat_id' || $field === 'from_chat_id'){
            if (isset($this->update->message)) return $this->update->message->chat->id;
            elseif (isset($this->update->edited_message)) return $this->update->edited_message->chat->id;
            elseif (isset($this->update->inline_query)) return $this->update->inline_query->from->id;
            elseif (isset($this->update->callback_query)) return $this->update->callback_query->from->id;
            elseif (isset($this->update->chat_join_request)) return $this->update->chat_join_request->chat->id;
            else return false;
        }
        elseif ($field === 'user_id'){
            if (isset($this->update->message)) return $this->update->message->from->id;
            elseif (isset($this->update->edited_message)) return $this->update->edited_message->from->id;
            elseif (isset($this->update->inline_query)) return $this->update->inline_query->from->id;
            elseif (isset($this->update->callback_query)) return $this->update->callback_query->from->id;
            elseif (isset($this->update->chat_join_request)) return $this->update->chat_join_request->from->id;
            else return false;
        }
        elseif ($field === 'message_id'){
            if (isset($this->update->message)) return $this->update->message->message_id;
            elseif (isset($this->update->edited_message)) return $this->update->edited_message->message_id;
            elseif (isset($this->update->callback_query)) return $this->update->callback_query->message->message_id;
            else return false;
        }
        elseif ($field === 'file_id'){
            if (isset($this->update->message)) $type = 'message';
            elseif (isset($this->update->edited_message)) $type = 'edited_message';
            else return false;

            if (isset($this->update->$type->animation)) return $this->update->$type->animation->file_id;
            elseif (isset($this->update->$type->audio)) return $this->update->$type->audio->file_id;
            elseif (isset($this->update->$type->document)) return $this->update->$type->document->file_id;
            elseif (isset($this->update->$type->photo)) return end($this->update->$type->photo)->file_id;
            elseif (isset($this->update->$type->sticker)) return $this->update->$type->sticker->file_id;
            elseif (isset($this->update->$type->video)) return $this->update->$type->video->file_id;
            elseif (isset($this->update->$type->video_note)) return $this->update->$type->video_note->file_id;
            elseif (isset($this->update->$type->voice)) return $this->update->$type->voice->file_id;
            else return false;
        }
        elseif ($field === 'callback_query_id'){
            if (isset($this->update->callback_query)) return $this->update->callback_query->id;
            else return false;
        }
        elseif ($field === 'shipping_query_id'){
            if (isset($this->update->shipping_query)) return $this->update->shipping_query->id;
            else return false;
        }
        elseif ($field === 'pre_checkout_query_id'){
            if (isset($this->update->pre_checkout_query)) return $this->update->pre_checkout_query->id;
            else return false;
        }
        elseif ($field === 'inline_query_id'){
            if (isset($this->update->inline_query)) return $this->update->inline_query->id;
            else return false;
        }
        elseif ($field === 'type'){
            if (isset($this->update->message)) return $this->update->message->chat->type;
            elseif (isset($this->update->edited_message)) return $this->update->edited_message->chat->type;
            elseif (isset($this->update->inline_query)) return $this->update->inline_query->chat_type;
            elseif (isset($this->update->callback_query)) return $this->update->callback_query->message->chat->type;
            else return false;
        }
        elseif ($field === 'action'){
            return 'typing';
        }
        elseif ($field === 'name'){
            if (isset($this->update->message)) return $this->update->message->from->first_name;
            elseif (isset($this->update->edited_message)) return $this->update->edited_message->from->first_name;
            elseif (isset($this->update->inline_query)) return $this->update->inline_query->from->first_name;
            elseif (isset($this->update->callback_query)) return $this->update->callback_query->from->first_name;
            elseif (isset($this->update->chat_join_request)) return $this->update->chat_join_request->from->first_name;
            else return false;
        }
        elseif ($field === 'last_name'){
            if (isset($this->update->message)) return $this->update->message->from->last_name ?? '';
            elseif (isset($this->update->edited_message)) return $this->update->edited_message->from->last_name ?? '';
            elseif (isset($this->update->inline_query)) return $this->update->inline_query->from->last_name ?? '';
            elseif (isset($this->update->callback_query)) return $this->update->callback_query->from->last_name ?? '';
            elseif (isset($this->update->chat_join_request)) return $this->update->chat_join_request->from->last_name ?? '';
            else return false;
        }
        elseif ($field === 'username'){
            if (isset($this->update->message)) return $this->update->message->from->username ?? '';
            elseif (isset($this->update->edited_message)) return $this->update->edited_message->from->username ?? '';
            elseif (isset($this->update->inline_query)) return $this->update->inline_query->from->username ?? '';
            elseif (isset($this->update->callback_query)) return $this->update->callback_query->from->username ?? '';
            elseif (isset($this->update->chat_join_request)) return $this->update->chat_join_request->from->username ?? '';
            else return false;
        }
        elseif ($field === 'group_name'){
            if (isset($this->update->message)) return $this->update->message->chat->first_name;
            elseif (isset($this->update->edited_message)) return $this->update->edited_message->chat->first_name;
            elseif (isset($this->update->callback_query)) return $this->update->callback_query->message->chat->first_name;
            elseif (isset($this->update->chat_join_request)) return $this->update->chat_join_request->chat->first_name;
            else return false;
        }
        elseif ($field === 'group_username'){
            if (isset($this->update->message)) return $this->update->message->chat->username;
            elseif (isset($this->update->edited_message)) return $this->update->edited_message->chat->username;
            elseif (isset($this->update->callback_query)) return $this->update->callback_query->message->chat->username;
            elseif (isset($this->update->chat_join_request)) return $this->update->chat_join_request->chat->username;
            else return false;
        }
        elseif ($field === 'update_type'){
            if (isset($this->update->message)) return 'message';
            elseif (isset($this->update->edited_message)) return 'edited_message';
            elseif (isset($this->update->inline_query)) return 'inline_query';
            elseif (isset($this->update->callback_query)) return 'callback_query';
            elseif (isset($this->update->chat_join_request)) return 'chat_join_request';
            elseif (isset($this->update->my_chat_member)) return 'my_chat_member';
            elseif (isset($this->update->chat_member)) return 'chat_member';
            elseif (isset($this->update->channel_post)) return 'channel_post';
            elseif (isset($this->update->edited_channel_post)) return 'edited_channel_post';
            elseif (isset($this->update->chosen_inline_result)) return 'chosen_inline_result';
            elseif (isset($this->update->shipping_query)) return 'shipping_query';
            elseif (isset($this->update->pre_checkout_query)) return 'pre_checkout_query';
            elseif (isset($this->update->poll)) return 'poll';
            elseif (isset($this->update->poll_answer)) return 'poll_answer';
            else return false;
        }
        elseif ($field === 'url'){
            return 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        }
        else return false;
    }

    /**
     * Check given IP is in the given IP range or not
     *
     * e.g. => $this->ipInRange(['ip'=>'192.168.1.1','range'=>'149.154.160.0/20']);
     * @param array $array e.g. => ['ip'=>'192.168.1.1','range'=>'149.154.160.0/20']
     * @return bool
     * @throws exception
     */
    public function ipInRange (array $array): bool {
        if (isset($array['ip'])) {
            $ip = $array['ip'];
        }
        else {
            $this->logger('error', "BPT ipInRange method used\nip parameter not found");
            throw new exception('ip parameter not found');
        }
        if (isset($array['range'])) {
            $range = $array['range'];
        }
        else {
            $this->logger('error', "BPT ipInRange method used\nrange parameter not found");
            throw new exception('range parameter not found');
        }
        if (strpos($range, '/') === false) {
            $range .= '/32';
        }
        $range_full = explode('/', $range, 2);
        $range_decimal = ip2long($range_full[0]);
        $ip_decimal = ip2long($ip);
        $wildcard_decimal = pow(2, (32 - $range_full[1])) - 1;
        $netmask_decimal = ~$wildcard_decimal;
        return (($ip_decimal & $netmask_decimal) == ($range_decimal & $netmask_decimal));
    }

    /**
     * Check the given IP is from telegram or not
     *
     * e.g. => $this->isTelegram(['ip'=>'192.168.1.1']);
     * @param array $array e.g. => ['ip'=>'192.168.1.1']
     * @return bool
     * @throws exception
     */
    public function isTelegram (array $array): bool {
        if (isset($array['ip'])) {
            $ip = $array['ip'];
        }
        else {
            $this->logger('error', "BPT isTelegram method used\nip parameter not found");
            throw new exception('ip parameter not found');
        }
        if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && $this->isCloudFlare($ip)) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        if (!$this->ipInRange(['ip' => $ip, 'range' => '149.154.160.0/20']) && !$this->ipInRange(['ip' => $ip, 'range' => '91.108.4.0/22'])) {
            return false;
        }
        return true;
    }

    /**
     * Check the given IP is from CloudFlare or not
     *
     * e.g. => $this->isCloudFlare(['ip'=>'192.168.1.1']);
     * @param array $array e.g. => ['ip'=>'192.168.1.1']
     * @return bool
     * @throws exception
     */
    public function isCloudFlare (array $array): bool {
        if (isset($array['ip'])) {
            $ip = $array['ip'];
        }
        else {
            $this->logger('error', "BPT isCloudFlare method used\nip parameter not found");
            throw new exception('ip parameter not found');
        }
        $cf_ips = ['173.245.48.0/20', '103.21.244.0/22', '103.22.200.0/22', '103.31.4.0/22', '141.101.64.0/18', '108.162.192.0/18', '190.93.240.0/20', '188.114.96.0/20', '197.234.240.0/22', '198.41.128.0/17', '162.158.0.0/15', '104.16.0.0/12', '172.64.0.0/13', '131.0.72.0/22'];
        foreach ($cf_ips as $cf_ip) {
            if ($this->ipInRange(['ip' => $ip, 'range' => $cf_ip])) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check the given token format
     *
     * if you want to verify token with telegram , you should set verify parameter => true
     * in that case , if token was right , you will receive getMe result , otherwise you will receive false
     *
     * verify parameter has default value => false
     *
     * e.g. => $this->isToken(['token'=>'123123123:abcabcabcabc']);
     * @param array $array e.g. => ['token'=>'123123123:abcabcabcabc','verify'=>false]
     * @return bool|array
     * @throws exception
     */
    public function isToken (array $array) {
        if (isset($array['token'])) {
            $token = $array['token'];
        }
        else {
            $this->logger('error', "BPT isToken method used\ntoken parameter not found");
            throw new exception('token parameter not found');
        }
        $verify = $array['verify'] ?? false;
        if (preg_match('/^(\d{8,10}):[\w\-]{35}$/', $token)) {
            if ($verify){
                $res = $this->me(['token'=>$token]);
                if ($res['ok']) {
                    return $res['result'];
                }
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * Escape text for different parse_modes
     *
     * type parameter can be : `html` , `markdown` , `markdown2` , default : `html`
     *
     * e.g. => $this->modeEscape(['text'=>'hello men! *I* Have nothing anymore']);
     * @param array $array e.g. => ['text'=>'hello men! *I* Have nothing anymore','mode'=>'markdown2']
     * @return string|bool
     * @throws exception
     */
    public function modeEscape (array $array) {
        if (isset($array['text'])) {
            $text = $array['text'];
        }
        else {
            $this->logger('error', "BPT modeEscape method used\ntext parameter not found");
            throw new exception('text parameter not found');
        }
        $mode = isset($array['mode']) ? strtolower($array['mode']) : 'html';

        switch ($mode) {
            case 'html':
                return str_replace(['&', '<', '>',], ["&amp;", "&lt;", "&gt;",], $text);
            case 'markdown':
                return str_replace(["\\", '_', '*', '`', '['], ["\\\\", "\\_", "\\*", "\\`", "\\[",], $text);
            case 'markdown2':
                return str_replace(
                    ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!','\\'],
                    ['\_', '\*', '\[', '\]', '\(', '\)', '\~', '\`', '\>', '\#', '\+', '\-', '\=', '\|', '\{', '\}', '\.', '\!','\\\\'],
                    $text);
            default:
                $this->logger('error', "BPT modeEscape method used\ntype is wrong");
                return false;
        }
    }

    /**
     * Generate random string
     *
     * you can use this method without any input
     *
     * length parameter have default value => 16
     *
     * characters parameter have default value => aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ
     *
     * e.g. => $this->randomString();
     *
     * e.g. => $this->randomString(16);
     *
     * e.g. => $this->randomString(16, 'abcdefg');
     * @return string
     */
    public function randomString (int $length = 10, string $chars = 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ'): string {
        $rand_string = substr(str_shuffle($chars), 0, $length);
        return $rand_string;
    }

    /**
     * encrypt or decrypt a text with really high security
     *
     * action parameter must be enc(mean encrypt) or dec(mean decrypt)
     *
     * string parameter is your hash(received when use encrypt) or the text you want to encrypt
     *
     * for decrypt , you must have key and iv parameter. you can found them in result of encrypt
     *
     * e.g. => $this->crypto(['action'=>'dec','string'=>'9LqUf9DSuRRwfo03RnA5Kw==','key'=>'39aaadf402f9b921b1d44e33ee3b022716a518e97d6a7b55de8231de501b4f34','iv'=>'a2e5904a4110169e']);
     *
     * e.g. => $this->crypto(['action'=>'enc','string'=>'hello world']);
     * @param array $array e.g. => ['action'=>'enc','string'=>'hello world']
     * @return array|string|bool
     * @throws exception
     */
    public function crypto (array $array) {
        if (extension_loaded('openssl')) {
            if (isset($array['action'])) {
                $action = $array['action'];
            }
            else {
                $this->logger('error', "BPT crypto function used\naction parameter not found");
                throw new exception('action parameter not found');
            }
            if (isset($array['string'])) {
                $string = $array['string'];
            }
            else {
                $this->logger('error', "BPT crypto function used\nstring parameter not found");
                throw new exception('string parameter not found');
            }
            if ($action === 'enc') {
                $key = $this->randomString(64);
                $iv = $this->randomString(16);
                $output = base64_encode(openssl_encrypt($string, 'AES-256-CBC', $key, 1, $iv));
                return ['hash' => $output, 'key' => $key, 'iv' => $iv];
            }
            elseif ($action === 'dec') {
                if (isset($array['key'])) {
                    $key = $array['key'];
                }
                else {
                    $this->logger('error', "BPT crypto function used\nkey parameter not found");
                    throw new exception('key parameter not found');
                }
                if (isset($array['iv'])) {
                    $iv = $array['iv'];
                }
                else {
                    $this->logger('error', "BPT crypto function used\niv parameter not found");
                    throw new exception('iv parameter not found');
                }
                return openssl_decrypt(base64_decode($string), 'AES-256-CBC', $key, 1, $iv);
            }
            else return false;
        }
        else {
            $this->logger('error', "BPT crypto function used\nopenssl extension is not found , It may not be installed or enabled");
            throw new exception('openssl extension not found');
        }
    }

    /**
     * convert all of files in selected path to zip and then save it in dest path
     *
     * if you want to add the main folder to the zip file , set self `param` true
     *
     * if you want to add all of file and sub files in main folder(ignore subfolders) set sub_folder `param` false
     *
     * self parameter have default value => true
     *
     * sub parameter have default value => true
     *
     * e.g. => $this->zip(['path'=>'xFolder','dest'=>'yFolder/xFile.zip','self'=>false,'sub_folder'=>true);
     * @param array $array e.g. => ['path'=>'xFolder','dest'=>'yFolder/xFile.zip']
     * @return bool
     * @throws exception
     */
    public function zip (array $array): bool {
        if (extension_loaded('zip')) {
            if (isset($array['path'])) {
                $path = $array['path'];
            }
            else {
                $this->logger('error', "BPT zip function used\npath parameter not found");
                throw new exception('path parameter not found');
            }
            if (isset($array['dest'])) {
                $dest = $array['dest'];
            }
            else {
                $this->logger('error', "BPT zip function used\ndest parameter not found");
                throw new exception('dest parameter not found');
            }
            $self = $array['self'] ?? true;
            $sub_folder = $array['sub_folder'] ?? true;

            if (file_exists($dest)) unlink($dest);

            $path = realpath($path);
            $zip = new ZipArchive();
            $zip->open($dest, ZipArchive::CREATE);

            if (is_dir($path)){
                if ($self){
                    $dirs = explode('\\',$path);
                    $dir_count = count($dirs);
                    $main_dir = $dirs[$dir_count-1];

                    $path = '';
                    for ($i=0; $i < $dir_count - 1; $i++) {
                        $path .= '\\' . $dirs[$i];
                    }
                    $path = substr($path, 1);
                    $zip->addEmptyDir($main_dir);
                }

                $it = new RecursiveDirectoryIterator($path,RecursiveDirectoryIterator::SKIP_DOTS);
                $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::SELF_FIRST);
                foreach ($files as $file) {
                    if ($file->isFile()){
                        if ($sub_folder){
                            $zip->addFile($file, str_replace($path . '\\', '', $file));
                        }
                        else{
                            $zip->addFile($file, basename($file));
                        }
                    }
                    elseif ($file->isDir() && $sub_folder) {
                        $zip->addEmptyDir(str_replace($path . '\\', '', $file . '\\'));
                    }
                }
            }
            else{
                $zip->addFile($path, basename($path));
            }

            return $zip->close();
        }
        else {
            $this->logger('error', "BPT zip function used\nzip extension is not found , It may not be installed or enabled");
            throw new exception('zip extension not found');
        }
    }

    /**
     * receive size from path(can be url or file path)
     *
     * if format parameter has true value , the returned size converted to symbolic format
     *
     * format parameter have default value => true
     *
     * NOTE : some url will not return real size!
     *
     * e.g. => $this->size(['path'=>'xFile.zip','format'=>false]);
     *
     * e.g. => $this->size(['path'=>'xFile.zip']);
     *
     * @param array $array e.g. => ['path'=>'xFile.zip']
     * @return string|int|bool
     * @throws exception
     */
    public function size (array $array) {
        if (isset($array['path'])) {
            $path = $array['path'];
        }
        else {
            $this->logger('error', "BPT size function used\npath parameter not found");
            throw new exception('path parameter not found');
        }
        $format = $array['format'] ?? true;
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            $ch = curl_init($path);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_exec($ch);
            $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
            curl_close($ch);
        }
        else {
            if (file_exists($path)) {
                $size = filesize($path);
            }
            else {
                $this->logger('error', "BPT size function used\nFile not found");
                throw new exception('File not found');
            }
        }
        if (isset($size) && is_numeric($size)) {
            if ($format) {
                $o = 0;
                $rate = ['B', 'KB', 'MB', 'GB', 'TB'];
                while ($size > 1024){
                    $size = $size / 1024;
                    $o++;
                }
                if ($o !== 0) {
                    $size = round($size, 2);
                }
                return $size . ' ' . $rate[$o];
            }
            else return $size;
        }
        else return false;
    }

    /**
     * create normal keyboard and inline keyboard easily
     *
     * you must set keyboard parameter(for normal keyboard) or inline parameter(for inline keyboard)
     *
     * if you set both , keyboard will be processed and inline will be ignored
     *
     *  
     *
     * e.g. => $this->eKey(['keyboard'=>[['button 1 in row 1'],['button 2 in row 2'],['contact button in row 3||con'],['location button in row 4||loc']]]);
     *
     *  
     *
     * e.g. => $this->eKey(['inline'=>[[['button 1 in row 1','this is callback button'],['button 2 in row 1','https://this-is-url-button.com']],[['demo button in row 2']]]]);
     *
     * @param array $array e.g. => ['inline'=>[[['this is a call back button','and this is callback data']]]]
     * @return string will return string but it is json(because of json_encode)
     * @throws exception
     */
    public function eKey (array $array): string {
        if ($array[0] == 'remove')
        {
            $remKey = [
                'KeyboardRemove'=> [],
                'remove_keyboard' => true
            ];
            return json_encode($remKey);
        }
        if (isset($array['keyboard'])) {
            $keyboard = ['keyboard' => [], 'resize_keyboard' => true];
            foreach ($array['keyboard'] as $row) {
                $buttons = [];
                foreach ($row as $base_button) {
                    $button_info = explode('||', $base_button);
                    if (count($button_info) > 1) {
                        if ($button_info[1] === 'con') {
                            $buttons[] = ['text' => $button_info[0], 'request_contact' => true];
                        }
                        elseif ($button_info[1] === 'loc') {
                            $buttons[] = ['text' => $button_info[0], 'request_location' => true];
                        }
                        else {
                            $buttons[] = ['text' => $base_button];
                        }
                    }
                    else {
                        $buttons[] = ['text' => $base_button];
                    }
                }
                $keyboard['keyboard'][] = $buttons;
            }
            return json_encode($keyboard);
        }
        elseif (isset($array['inline'])) {
            $keyboard = ['inline_keyboard' => []];
            foreach ($array['inline'] as $row) {
                $buttons = [];
                foreach ($row as $button_info) {
                    if (isset($button_info[1])) {
                        if (filter_var($button_info[1], FILTER_VALIDATE_URL) && strpos($button_info[1], 'http') === 0) {
                            $buttons[] = ['text' => $button_info[0], 'url' => $button_info[1]];
                        }
                        else {
                            $buttons[] = ['text' => $button_info[0], 'callback_data' => $button_info[1]];
                        }
                    }
                    else {
                        $buttons[] = ['text' => $button_info[0], 'url' => 'https://t.me/BPT_CH'];
                    }
                }
                $keyboard['inline_keyboard'][] = $buttons;
            }
            return json_encode($keyboard);
        }
        else {
            $this->logger('error', "BPT eKey function used\nkeyboard or inline parameter not found");
            throw new exception('keyboard or inline parameter not found');
        }
    }
}
