<?php

/**
 * Version: v2.0
 * Developer: @DearAhmadi
 * Join us @DarkMindsTm 
 * Group: @DarkMindsGp
 * برای حمایت از من با منبع اسکی برید!
 * جوین شدن توی چنل هوش سیاه فراموش نشه!
 */

require_once('config.php');
require_once('BPT.php');
require_once('handler.php');

$handler =     new handler(
    $BPTSettings['public']
);

$all_bot =      $connect->query("SELECT * FROM `sfall`;")->fetch_assoc();
if ($all_bot['text'] != 'none' and !empty($all_bot['text'])) 
    @$captext = $all_bot['text'];

if ($all_bot['forall'] == 1) 
{
    $count_user = $connect->query("SELECT `id` FROM `user`;")->num_rows;
    if ($count_user <= 200) 
    {
        $users =$connect->query("SELECT * FROM `user` WHERE `step` <> 'isAreBlack' LIMIT 200");
        while ($row = $users->fetch_assoc()) 
        {
            $handler->forwardMsg($row['id'], $all_bot['chat_id'], $all_bot['msg_id']);
        }
        $handler->editMessageReplyMarkup(['chat_id'=>$all_bot['chat_id'], 'message_id'=>$all_bot['msg_id2'], 'reply_markup'=>$handler->eKey(['inline'=>[[["✅ فوروارد همگانی به اتمام رسید",'none']]]]), 'answer'=> null]);
        $handler->send(['chat_id'=>$all_bot['chat_id'], 'text'=>"✅ همگانی با #موفقیت به اتمام رسید.\n\n➖ پیام شما به ".number_format($count_user)." نفر با موفقیت ارسال شد.", 'answer'=> null]);
        $connect->query("UPDATE `sfall` SET `forall` = 0, `count` = 0, `msg_id` = 0, `chat_id` = 0, `msg_id2` = 0 LIMIT 1");	
        exit();
    } 
    $count_add = $all_bot['count'] + 200;
    $users =$connect->query("SELECT * FROM `user` WHERE `step` <> 'isAreBlack' LIMIT 200 OFFSET {$all_bot['count']}");
    if ($count_add >= $count_user) 
    {
        while($row = $users->fetch_assoc()) 
        {
            $handler->forwardMsg($row['id'], $all_bot['chat_id'], $all_bot['msg_id']);
        }
        $handler->editMessageReplyMarkup(['chat_id'=>$all_bot['chat_id'], 'message_id'=>$all_bot['msg_id2'], 'reply_markup'=>$handler->eKey(['inline'=>[[["✅ فوروارد همگانی به اتمام رسید",'none']]]]), 'answer'=> null]);
        $handler->send(['chat_id'=>$all_bot['chat_id'], 'text'=>"✅ همگانی با #موفقیت به اتمام رسید.\n\n➖ پیام شما به ".number_format($count_user)." نفر با موفقیت ارسال شد.", 'answer'=> null]);
        $connect->query("UPDATE `sfall` SET `forall` = 0, `count` = 0, `msg_id` = 0, `chat_id` = 0, `msg_id2` = 0 LIMIT 1");	
    } 
      else 
    {
        while ($row = $users->fetch_assoc()) 
        {
            $handler->forwardMsg($row['id'], $all_bot['chat_id'], $all_bot['msg_id']);
        }
        $count_last = $count_user - $count_add;
        $handler->editMessageReplyMarkup(['chat_id'=>$all_bot['chat_id'], 'message_id'=>$all_bot['msg_id2'], 'reply_markup'=>$handler->eKey(['inline'=>[[["👥 ارسال شده : $count_add نفر",'none']],[["🕒 زمان تخمینی باقیمانده : {$handler->timeleft($count_last)} دقیقه",'none']]]]), 'answer'=> null]);
        $connect->query("UPDATE `sfall` SET `count` = $count_add LIMIT 1");	
    }
}

if ($all_bot['sendall'] == 1) 
{
    $count_user = $connect->query("SELECT `id` FROM `user`;")->num_rows;
    if ($count_user <= 200) 
    {
        $users =$connect->query("SELECT * FROM `user` WHERE `step` <> 'isAreBlack' LIMIT 200");
        while ($row = $users->fetch_assoc()) 
        {
            $handler->copyMessage(['chat_id'=>$row['id'], 'from_chat_id'=>$all_bot['chat_id'], 'message_id'=>$all_bot['msg_id'], 'caption'=>"$captext", 'answer'=> null]);
        }
        $handler->editMessageReplyMarkup(['chat_id'=>$all_bot['chat_id'], 'message_id'=>$all_bot['msg_id2'], 'reply_markup'=>$handler->eKey(['inline'=>[[["✅ پیام همگانی به اتمام رسید",'none']]]]), 'answer'=> null]);
        $handler->send(['chat_id'=>$all_bot['chat_id'], 'text'=>"✅ همگانی با #موفقیت به اتمام رسید.\n\n➖ پیام شما به ".number_format($count_user)." نفر با موفقیت ارسال شد.", 'answer'=> null]);
        $connect->query("UPDATE `sfall` SET `sendall` = 0, `count` = 0, `msg_id` = 0, `chat_id` = 0, `msg_id2` = 0, `text` = 'none' LIMIT 1");	
        exit();
    } 
    $count_add = $all_bot['count'] + 200;
    $users =$connect->query("SELECT * FROM `user` WHERE `step` <> 'isAreBlack' LIMIT 200 OFFSET {$all_bot['count']}");
    if ($count_add >= $count_user) 
    {
        while ($row = $users->fetch_assoc())
        {
            $handler->copyMessage(['chat_id'=>$row['id'], 'from_chat_id'=>$all_bot['chat_id'], 'message_id'=>$all_bot['msg_id'], 'caption'=>"$captext", 'answer'=> null]);
        }
        $handler->editMessageReplyMarkup(['chat_id'=>$all_bot['chat_id'], 'message_id'=>$all_bot['msg_id2'], 'reply_markup'=>$handler->eKey(['inline'=>[[["✅ پیام همگانی به اتمام رسید",'none']]]]), 'answer'=> null]);
        $handler->send(['chat_id'=>$all_bot['chat_id'], 'text'=>"✅ همگانی با #موفقیت به اتمام رسید.\n\n➖ پیام شما به ".number_format($count_user)." نفر با موفقیت ارسال شد.", 'answer'=> null]);
        $connect->query("UPDATE `sfall` SET `sendall` = 0, `count` = 0, `msg_id` = 0, `chat_id` = 0, `msg_id2` = 0, `text` = 'none' LIMIT 1");	
    } 
    else 
    {
        while ($row = $users->fetch_assoc()) 
        {
            $handler->copyMessage(['chat_id'=>$row['id'], 'from_chat_id'=>$all_bot['chat_id'], 'message_id'=>$all_bot['msg_id'], 'caption'=>"$captext", 'answer'=> null]);
        }
        $count_last = $count_user - $count_add;
        $handler->editMessageReplyMarkup(['chat_id'=>$all_bot['chat_id'], 'message_id'=>$all_bot['msg_id2'], 'reply_markup'=>$handler->eKey(['inline'=>[[["👥 ارسال شده : $count_add نفر",'none']],[["🕒 زمان تخمینی باقیمانده : {$handler->timeleft($count_last)} دقیقه",'none']]]]), 'answer'=> null]);
        $connect->query("UPDATE `sfall` SET `count` = $count_add LIMIT 1");	
    }
}
/**
 * Version: v2.0
 * Developer: @DearAhmadi
 * Join us @DarkMindsTm 
 * Group: @DarkMindsGp
 * برای حمایت از من با منبع اسکی برید!
 * جوین شدن توی چنل هوش سیاه فراموش نشه!
 */
$connect->close();
?>