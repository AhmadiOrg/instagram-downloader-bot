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

class BPT_handler extends BPT 
{
    public function __construct(
        array $settings
        ) 
    {
        parent::__construct($settings);
    }

    public function message(
        $update
        )
    {
        global      $connect, 
                    $handler, 
                    $keyboard, 
                    $admins, 
                    $time;
        $from_id =      $update->from->id;
        $first_name =   $update->from->first_name;
        $chat_type =    $update->chat->type;
        $message_id =   $update->message_id;
        $text =         $update->text;
        $caption =      (isset($update->caption)) ? $update->caption : null;
        $user =         $connect->query("SELECT * FROM `user` WHERE `id` = $from_id LIMIT 1;")->fetch_assoc();

        if ($chat_type != 'private')
            return ;
            
        $check = $handler->checkJoin($from_id);
        if ($check['ok'] == false) 
        {
            $this->send(['text'=>"🔐 برای تامین هزینه های ربات ابتدا وارد چنل های اسپانسر زیر بشید و سپس روی 'عضو شدم' کلیک کنید.", 'reply_markup'=>$this->eKey(['inline'=>$check['keys']]), 'disable_web_page_preview'=>true, 'parse_mode'=>'HTML', 'answer'=> null]);    
            return ;
        }
        if ($text == '/start' or $text == '🏠') 
        {
            if (empty($user['id']))
                $connect->query("INSERT INTO `user` (`id` , `step` , `time_s`) VALUES ($from_id, 'none', $time);");
    
            $this->send(['text'=>"<b>📥 به ربات دانلود از اینستاگرام خوش اومدی!</b>

👈 یوزرنیم بفرست مشخصات پیج رو تحویل بگیر :)
👈 یوزرنیم بفرست تا بتونی کل استوریای پیج رو دانلود کنی :)
👈 لینک هر پستی رو بده تا دانلود کنم بفرستم برات :)

❗️ یوزرنیم پیجی که میفرستی حتما @ بزار قبلش
♥️ خدمات این ربات کاملا رایگان میباشد", 'reply_markup'=>$this->eKey(['remove']), 'disable_web_page_preview'=>true, 'parse_mode'=>'HTML', 'answer'=> null]);
            $handler->clearCache($from_id);    
            return ;
        }
        if ($user['step'] == 'none')
        {
            if (preg_match('/\@[a-z|A-Z|0-9|\.|\_]+$/', $text))
            {
                $send =             $this->send(['text'=>"<b>🔍 دارم کل اطلاعاتشو در میارم وایسا .. !</b>", 'parse_mode' => 'HTML', 'answer'=> null]);
                $username =         str_replace('@', '', $text);
                $result =           $handler->openLink('https://storiesig.info/api/ig/userInfoByUsername/' . $username, 'GET', [], [], true, 15);
                if (isset($result) and is_array($result) and $result['result']['status'] == 'ok')
                {
                    $res =          $result['result']['user'];
                    $pic =          $res['profile_pic_url'];
                    $name =         $res['full_name'] ?: 'ندارد';
                    $bio =          $res['biography'] ?: 'ندارد';
                    $type_page =    ($res['is_private'] == false) ? 'آزاد (پابلیک)' : 'قفل (پرایوت)';
                    $keys =         [[["📕 دانلود هایلایت ها", 'dlhighlights_' . $username], ["🗾 دانلود استوری های پیج", 'dlstory_' . $username]]];
                    $txt =          "#️⃣ یوزرنیم پیج : <code>$username</code>\n📝 نام نمایشی پیج : <code>$name</code>\n\n🔐 وضعیت صفحه : <b>$type_page</b>\n\n🔸 تعداد پست ها : <code>{$res['media_count']}</code> عدد\n👈 تعداد فالور ها : <code>{$res['follower_count']}</code> عدد\n👈 تعداد فالووینگ ها : <code>{$res['following_count']}</code> عدد\n\n📍 بیوگرافی : \n<code>$bio</code>\n\n📥 @" . BOT_USERNAME;
                    if (!empty($pic))
                        $this->sendPhoto(['photo' => $pic, 'caption' => $txt, 'reply_markup'=>$this->eKey(['inline'=>$keys]), 'disable_web_page_preview'=>true, 'parse_mode'=>'HTML']);
                    else
                        $this->send(['text'=>$txt, 'disable_web_page_preview'=>true, 'reply_markup'=>$this->eKey(['inline'=>$keys]),  'parse_mode' => 'HTML', 'answer'=> null]);
                    $this->deleteMessage(['message_id' =>$send['result']['message_id'], 'answer'=> null]);
                }
                else
                    $this->editMessagetext(['message_id' =>$send['result']['message_id'], 'text'=>"❗️ مشکلی در دریافت اطلاعات وجود داشت\n⬅️ ممکن است آدرس ارسالی اشتباه باشد", 'parse_mode'=>'HTML', 'answer'=> null]);
                return ;
            }
            if ($update->entities[0]->type == 'url') 
            {
                if ($handler->startsWith($text, 'https://www.instagram.com/reel') or $handler->startsWith($text, 'https://www.instagram.com/p/'))
                {
                    $send =             $this->send(['text'=>"یکم صبر کن ..", 'parse_mode'=>'HTML', 'answer'=>null]);
                    $params = array(
                        'key' =>        INSTA_KEY,
                        'type' =>       'postdownloader',
                        'link' =>       $text,
                    );
                    $result =           $handler->openLink('https://api.codesazan.ir/Instagram?' . http_build_query($params), 'GET', [], [], true);
                    if ($result['status'] == 200)
                    {
                        $photo_formats =    ['jpg', 'png', 'webp'];
                        foreach ($result['result']['medias'] as $media)
                        {
                            $type = (in_array($media['extension'], $photo_formats)) ? 'photo' : 'video';
                            $input_medias[] = ['type' => $type, 'media' => $media['url']];
                        }
                        $chunk = array_chunk($input_medias,10);
                        foreach ($chunk as $group)
                        {
                            $group[0]['caption'] = "🤖 دانلود شده توسط : @" . BOT_USERNAME;
                            $this->sendMediaGroup(['chat_id' => $from_id, 'media' => json_encode($group), 'answer'=> null]);
                        }
                    }
                    else
                        $this->send(['text'=>"⚠️ خطا در دانلود ..", 'parse_mode'=>'HTML', 'answer'=>null]);
                    
                    $this->deleteMessage(['message_id' =>$send['result']['message_id'], 'answer'=> null]);
                    return ;
                }
            }
        }
        if (in_array($from_id,$admins))
        {
            if ($text == 'پنل' or $text == '🔙 بازگشت به پنل') 
            {
                $this->send(['text'=>"سلام $first_name 👋🏻\nبه پنل مدیریتی خوش آمدید.\n\n🆔 آیدی عددی شما : <code>$from_id</code>\n\nلطفا یکی از گزینه های زیر را انتخاب کنید:", 'reply_markup'=>$this->eKey(['keyboard'=>$keyboard['panel']]), 'parse_mode'=>'HTML', 'answer'=> null]);
                $handler->clearCache($from_id);    
                return ;
            }
            if ($text == '📈 آمار لحظه ای ربات') 
            {
                $users_count = number_format($connect->query("SELECT `id` FROM `user`;")->num_rows);
                $this->send(['text'=>"📊 آمار کلی از ربات شما\n\n👥 تعداد کل ممبر های ربات : <code>$users_count</code>", 'parse_mode'=>'HTML', 'answer'=>null]);    
                return ;
            }
            if ($text == '📮 ارسال همگانی') 
            {
                if (!$handler->checkSendAll()) 
                {
                    $this->send(['text'=>"➕ لطفا پیام خود را ارسال یا فوروارد کنید:", 'reply_markup'=>$this->eKey(['keyboard'=>$keyboard['back_panel']]), 'answer'=>null]);
                    $handler->saveData($from_id,'sendforall');
                }
                else
                {
                    $sendforall =   $connect->query("SELECT * FROM `sfall`")->fetch_assoc();
                    $this->send(['text'=>"⚠️ خطا برای ارسال پیام همگانی .\n\n‼️ ادمین دیگری پروسه پیام همگانی را آغاز کرده است و هنوز به اتمام نرسیده .\n- - -\n💯 شما میتوانید با کلیک روی کنسل پیام همگانی، پیام همگانی را کنسل کنید.", 'reply_markup'=>$this->eKey(['inline'=>[[["❌ کنسل و متوقف کردن پیام‌ همگانی",'cancellsenall']],[["👤 {$sendforall['chat_id']}",'none']],[["🕒 زمان باقیمانده: {$handler->timeleft($sendforall['count'])} دقیقه",'none'],["❗️ ارسال شده: {$sendforall['count']}",'none']]]]), 'answer'=>null]);
                }
                return ;
            }
            if ($text == '🔐 قفل چنل ها' or $text == '🔙 بازگشت به مدیریت چنل')
            {
                $this->send(['text'=>"به بخش مدیریت قفل چنل های رباتتان ، خوش آمدید.\n\n🔻لطفا یکی از گزینه های زیر را انتخاب کنید:", 'reply_markup'=>$this->eKey(['keyboard'=>$keyboard['locks']]), 'answer'=>null]);
                $handler->clearCache($from_id);    
                return ;
            }
            if ($text == '➕ افزودن چنل') 
            {
                $this->send(['text'=>"برای افزودن قفل چنل،\nلطفا در صورتی که چنل شما خصوصی میباشد آیدی عددی و در صورتی که چنل شما عمومی میباشد یوزرنیم آنرا ارسال کنید.\n\n▪️ نمونه ارسال چنل خصوصی:(آیدی عددی)\n-100123456789\n▫️ نمونه ارسال چنل عمومی:\n@username", 'reply_markup'=>$this->eKey(['keyboard'=>$keyboard['back_channels']]), 'answer'=>null]);
                $handler->saveData($from_id,'addChannel');
                return ;
            }
            if ($text == '🔧 مدیریت چنل ها') 
            {
                $this->send(['text'=>"🔐 لیست قفل چنل های ربات شما.\n\n⛔️ حذف: حذف فوری قفل چنل\n🔗 تنظیم لینک : تنطیم لینک جدید برای جوین", 'reply_markup'=>$this->eKey(['inline'=>$handler->CreateChnnelLocksKey()]), 'answer'=>null]);
                return ;
            }
        }
        if ($user['step'] == 'sendforall' and !$handler->checkSendAll()) 
        {
            $this->send(['text'=>"➖ لطفا نوع ارسال را انتخاب کنید :\n\n⚠️  توجه داشته باشید، بعد از انتخاب، پروسه ارسال پیام همگانی آغاز میگردد .\n\n▪️ نوع فوروادی : پیام شما به کاربران رباتتان فوروارد( با نام) خواهد شد .\n▫️ نوع بی نام : پیام شما بی نام ارسال میگردد( همان پیام همگانی عادی )", 'reply_markup'=>$this->eKey(['inline'=>[[["ارسال بی نام",'sendall'],["فورواد به همه",'forall']],[["🔙 انصراف و بازگشت",'backpanel']]]]), 'answer'=>null]);
            $handler->saveData($from_id, ['message_id' => $message_id, 'caption' => $caption]);
            return ;
        }
        if ($user['step'] == 'addChannel') 
        {
            if ($this->getChatAdministrators(['chat_id' => $text])['ok'])
            {
                $ChannelCheck =         $connect->query("SELECT * FROM `channels` WHERE `idoruser` = '$text' LIMIT 1")->fetch_assoc();
                if (empty($ChannelCheck['link'])) 
                {
                    $type_channel =     $handler->quickGet($text,'username')?'public':'private';
                    if ($type_channel == 'private') 
                    {
                        $createLink =   $this->createChatInviteLink(['chat_id'=>$text, 'name'=>$this->getMe()['result']['first_name']]);
                        if (!empty($createLink['result']['creator']['id'])) 
                        {
                            $connect->query("INSERT INTO `channels` (`idoruser` , `link` , `createtime`) VALUES ('".$handler->quickGet($text,'id')."', '".$createLink['result']['invite_link']."', $time)");
                            $this->send(['text'=>"✅ چنل ( {$handler->quickGet($text,'title')} ) به لیست قفل چنل های ربات با موفقت افزوده شد.\n\n▪️ نوع چنل: خصوصی\n🆔 آیدی عددی چنل: {$handler->quickGet($text,'id')}\n🔗 لینک چنل: {$createLink['result']['invite_link']}", 'disable_web_page_preview'=>true, 'reply_markup'=>$this->eKey(['keyboard'=>[['🔧 مدیریت چنل ها','➕ افزودن چنل'],['🔙 بازگشت به پنل']]]), 'answer'=>null]);
                            $handler->clearCache($from_id);
                        }
                          else 
                            $this->send(['text'=>"⚠️ خطا هنگام ساخت لینک عضویت\n\nبرای افزودن چنل خصوصی، \n ربات حتما باید دسترسی مدیریت لینک در چنل ارسالی رو داشته باشد.\n\n❗️ لطفا این دسترسی را برای ربات فعال کرده و مجدد اقدام به افزودن‌چنل کنید.", 'answer'=>null]);
                    }
                      else 
                    {
                        $ChennelRep = str_replace('@','',$text);
                        $connect->query("INSERT INTO `channels` (`idoruser` , `link` , `createtime`) VALUES ('$text', 'https://t.me/$ChennelRep', $time)");
                        $this->send(['text'=>"✅ چنل ( {$handler->quickGet($text,'title')} ) به لیست قفل چنل های ربات با موفقت افزوده شد.\n\n▪️ نوع چنل: عمومی\n🔗 لینک چنل: https://t.me/$ChennelRep", 'reply_markup'=>$this->eKey(['keyboard'=>[['🔧 مدیریت چنل ها','➕ افزودن چنل'],['🔙 بازگشت به پنل']]]), 'disable_web_page_preview'=>true, 'answer'=>null]);
                        $handler->clearCache($from_id);
                    }
                }
                  else
                    $this->send(['text'=>"❗️ این چنل قبلا اضافه شده است.", 'answer'=>null]);
            }
              else  
                $this->send(['text'=>"⚠️ ربات بر روی چنل ارسالی ادمین نیست. یا بصورت اشتباه ارسال کردید!\n\n🔺 لطفا ابتدا ربات را بر روی چنل ارسالی، ادمین کنید و دسترسی مدیریت لینک دهید.", 'answer'=>null]);

            return ;
        }
        if ($user['step'] == 'setNewLink') 
        {
            $Channel = $handler->getData('selectChannel', $from_id);
            if ($update->entities[0]->type == 'url' and strstr($text,'t.me/') or strstr($text,'telegram.me/')) 
            {
                if (!empty($Channel))
                {
                    $connect->query("UPDATE `channels` SET `link` = '$text' WHERE `idoruser` = '$Channel' LIMIT 1");	
                    $ChannelCheck =$connect->query("SELECT * FROM `channels` WHERE `idoruser` = '$Channel' LIMIT 1")->fetch_assoc();
                    $this->send(['text'=>"✅ لینک جدید با موفقیت تنظیم شد.\n\n▫️ لینک جدید : {$text}", 'reply_markup'=>$this->eKey(['inline'=>[[['🔙 بازگشت به قبل','BacktoLocks']]]]), 'disable_web_page_preview'=>true, 'answer'=>null]);
                    $handler->clearCache($from_id);
                }
                  else
                    $this->send(['text'=>"⚠️ خطای ناشناخته.\nلطفا مجدد اقدام به ثبت لینک جدید کنید یا با پشتیبانی ربات تماس بگیرید .\n\n🟡 برای بازگشت از دکمه زیر استفاده کنید:", 'reply_markup'=>$this->eKey(['keyboard'=>$keyboard['back_panel']]), 'answer'=>null]);
            }
              else
                $this->send(['text'=>"⚠️ لطفا فقط یک لینک جوین تلگرام ( t.me ) ارسال کنید.\n❗️ مجدداً امتحان فرمایید:", 'reply_markup'=>$this->eKey(['inline'=>[[['🔙 بازگشت به قبل','BacktoLocks']]]]), 'answer'=>null]);

            return ;
        }
        $this->send(['text'=>"🧐 دستور ارسالی یافت نشد!", 'parse_mode'=>'HTML', 'answer'=> null]);
    }
    public function callback_query(
        $update
        ) 
    {
        global          $connect, 
                        $handler, 
                        $keyboard, 
                        $admins;
        $data =         $update->data;
        $chat_id =      $update->message->chat->id;
        $from_id =      $update->from->id;
        $message_id =   $update->message->message_id;
        $user =         $connect->query("SELECT * FROM `user` WHERE `id` = $from_id LIMIT 1;")->fetch_assoc();

        if ($data == 'checkJoin') 
        {
            $check = $handler->checkJoin($from_id);
            if ($check['ok'] == true) 
            {
                $this->deleteMessage(['answer'=> null]);
                $this->send(['text'=>"<b>📥 به ربات دانلود از اینستاگرام خوش اومدی!</b>

👈 یوزرنیم بفرست مشخصات پیج رو تحویل بگیر :)
👈 یوزرنیم بفرست تا بتونی کل استوریای پیج رو دانلود کنی :)
👈 لینک هر پستی رو بده تا دانلود کنم بفرستم برات :)

❗️ یوزرنیم پیجی که میفرستی حتما @ بزار قبلش
♥️ خدمات این ربات کاملا رایگان میباشد", 'reply_markup'=>$this->eKey(['remove']), 'disable_web_page_preview'=>true, 'parse_mode'=>'HTML', 'answer'=> null]);
                $handler->clearCache($from_id);
            }
              else
                $this->answerCallbackQuery(['text'=>'⚠️ شما هنوز جوین نشدید .', 'show_alert'=>true]);

            return ;
        }
        $check = $handler->checkJoin($from_id);
        if ($check['ok'] == false) 
        {
            $this->editMessagetext(['text'=>"🔐 برای تامین هزینه های ربات ابتدا وارد چنل های اسپانسر زیر بشید و سپس روی 'عضو شدم' کلیک کنید.", 'reply_markup'=>$this->eKey(['inline'=>$check['keys']]), 'disable_web_page_preview'=>true, 'parse_mode'=>'HTML', 'answer'=> null]);    
            return ;
        }
        if ($data == 'none') 
        {
            $this->answerCallbackQuery(['text'=>'👀 این دکمه فقط جهت نمایش می باشد .', 'show_alert'=>true]);
            return ;
        }
        if (strstr($data,'dlstory_')) 
        {
            $username = str_replace('dlstory_','',$data);
            $this->answerCallbackQuery(['text'=>'🌐 در حال برقراری ارتباط ..', 'show_alert'=>false]);
            $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[['🌐 در حال برقراری ارتباط ..', 'none']]]]), 'answer'=> null]);
            $params = array(
                'key' =>        INSTA_KEY,
                'type' =>       'pagestory',
                'username' =>    $username,
            );
            $result =           $handler->openLink('https://api.codesazan.ir/Instagram?' . http_build_query($params), 'GET', [], [], true);
            if ($result['status'] == 200)
            {
                $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[['📥 در حال آپلود استوری ها ...', 'none']]]]), 'answer'=> null]);
                foreach ($result['result'] as $media)
                    $input_medias[] = ['type' => $media['type'], 'media' => $media['story']];
                
                $chunk = array_chunk($input_medias,10);
                foreach ($chunk as $group)
                {
                    $group[0]['caption'] = "🤖 دانلود شده توسط : @" . BOT_USERNAME;
                    $this->sendMediaGroup(['chat_id' => $from_id, 'media' => json_encode($group), 'answer'=> null]);
                }
                $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[['✅ آپلود استوری ها به اتمام رسید', 'none']], [["📕 دانلود هایلایت ها", 'dlhighlights_' . $username]]]]), 'answer'=> null]);
            }
            else
            {
                $this->answerCallbackQuery(['text'=>'⚠️ کاربر هیچ  استوری ندارد', 'show_alert'=>false]);
                $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[['⚠️ کاربر هیچ  استوری ندارد', 'none']], [["📕 دانلود هایلایت ها", 'dlhighlights_' . $username]]]]), 'answer'=> null]);
            }
            return ;
        }
        if (strstr($data,'dlhighlights_')) 
        {
            $username = str_replace('dlhighlights_','',$data);
            $this->answerCallbackQuery(['text'=>'🌐 در حال برقراری ارتباط ..', 'show_alert'=>false]);
            $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[['🌐 در حال برقراری ارتباط ..', 'none']]]]), 'answer'=> null]);
            $params = array(
                'key' =>        INSTA_KEY,
                'type' =>       'pagehightlight',
                'username' =>    $username,
            );
            $result =           $handler->openLink('https://api.codesazan.ir/Instagram?' . http_build_query($params), 'GET', [], [], true);
            if ($result['status'] == 200)
            {
                if (count($result['result']) > 0)
                {
                    $num =          0;
                    foreach ($result['result'] as $res)
                    {
                        $num +=     1;
                        $keys[] = ["{$res['Title']}", 'getHighlight@' . $username . '_' . $res['hightlightIDS']];
                        if ($num == 25)
                            break;
                    }
                    $keys = array_chunk($keys,2);
                    $keys = array_merge([[['⬇️ یکی از هایلایت های پیج را انتخاب کنید ', 'none']]], $keys);
                    array_push($keys, [["🗾 دانلود استوری های پیج", 'dlstory_' . $username]]);
                    $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>$keys]), 'answer'=> null]);
                }
                else
                    $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[["⚠️ هایلایتی پیدا نشد", 'none']], [["🗾 دانلود استوری های پیج", 'dlstory_' . $username]]]]), 'answer'=> null]);
            }
            else
                $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[["⚠️ هایلایتی پیدا نشد", 'none']], [["🗾 دانلود استوری های پیج", 'dlstory_' . $username]]]]), 'answer'=> null]);
            return ;
        }
        if (strstr($data,'getHighlight@')) 
        {
            $ex = explode('_', str_replace('getHighlight@','',$data));
            $username = $ex[0];
            $highlightID = $ex[1];
            $this->answerCallbackQuery(['text'=>'🌐 در حال برقراری ارتباط ..', 'show_alert'=>false]);
            $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[['🌐 در حال برقراری ارتباط ..', 'none']]]]), 'answer'=> null]);
            $params = array(
                'key' =>        INSTA_KEY,
                'type' =>       'gethightlight',
                'id' =>         $highlightID,
            );
            $result =           $handler->openLink('https://api.codesazan.ir/Instagram?' . http_build_query($params), 'GET', [], [], true);
            if ($result['status'] == 200)
            {
                if (count($result['result']) > 0)
                {
                    $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[['📥 در حال آپلود هایلایت ها ..', 'none']]]]), 'answer'=> null]);
                    foreach ($result['result'] as $media)
                        $input_medias[] = ['type' => $media['type'], 'media' => $media['highlite']];

                    $chunk = array_chunk($input_medias,10);
                    foreach ($chunk as $group)
                    {
                        $group[0]['caption'] = "🤖 دانلود شده توسط : @" . BOT_USERNAME;
                        $this->sendMediaGroup(['chat_id' => $from_id, 'media' => json_encode($group), 'answer'=> null]);
                    }
                    $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[["✅ دانلود هایلایت به اتمام ررسید.", 'none']],[["🗾 دانلود استوری های پیج", 'dlstory_' . $username]]]]), 'answer'=> null]);
                }
                else
                    $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[["⚠️ خطا در دانلود هایلایت", 'none']],[["🗾 دانلود استوری های پیج", 'dlstory_' . $username]]]]), 'answer'=> null]);
            }
            else
                $this->editMessageReplyMarkup(['chat_id'=>$from_id, 'message_id'=>$message_id, 'reply_markup'=>$this->eKey(['inline'=>[[["⚠️ خطا در دانلود هایلایت", 'none']],[["🗾 دانلود استوری های پیج", 'dlstory_' . $username]]]]), 'answer'=> null]);
            return ;
        }
        if (in_array($from_id,$admins))
        {
            if ($data == 'backpanel') 
            {
                $this->deleteMessage(['answer'=> null]);
                $this->send(['text'=>'🔻 به پنل مدیریتی بازگشتید.', 'reply_markup'=>$this->eKey(['keyboard'=>$keyboard['panel']]), 'answer'=> null]);
                $handler->clearCache($from_id);
                return ;
            }
            if ($data == 'cancellsenall') 
            {
                $this->editMessagetext(['text'=>"عملیات همگانی کنسل شد"]);
                $connect->query("UPDATE `sfall` SET `forall` = 0, `sendall` = 0, `count` = 0, `msg_id` = 0, `chat_id` = 0, `msg_id2` = 0, `text` = 'none' LIMIT 1");	
                return ;
            }
            if ($data == 'BacktoLocks') 
            {
                $this->editMessagetext(['text'=>"به منوی مدیریت چنل ها برگشتیم.", 'parse_mode'=>'HTML', 'reply_markup'=>$this->eKey(['inline'=>$handler->CreateChnnelLocksKey()]), 'answer'=> null]);
                $handler->clearCache($from_id);
                return ;
            }
            if (strstr($data,'deleteChannelLock_')) 
            {
                $Channel = str_replace('deleteChannelLock_','',$data);
                $connect->query("DELETE FROM `channels` WHERE `idoruser` = '$Channel' LIMIT 1");	
                $this->editMessagetext(['text'=>"⛔️ {$handler->quickGet($Channel,'title')} <i> از لیست چنل های قفل حذف شد </i>\n\n❕ ربات بصورت خودکار از این چنل لفت داد.", 'parse_mode'=>'HTML', 'reply_markup'=>$this->eKey(['inline'=>$handler->CreateChnnelLocksKey()]), 'answer'=> null]);
                $this->leaveChat(['chat_id'=>$Channel]);
                return ;
            }
            if (strstr($data,'setNewLink_')) 
            {
                $this->editMessagetext(['text'=>"لطفا لینک جدید جوین را ارسال کنید:", 'reply_markup'=>$this->eKey(['inline'=>[[['🔙 بازگشت به قبل','BacktoLocks']]]]), 'answer'=> null]);
                $handler->saveData($from_id,'setNewLink');
                $handler->saveData($from_id, ['selectChannel' => str_replace('setNewLink_', '', $data)]);
                return ;
            }
            if (!$handler->checkSendAll())
            {
                $users_count = $connect->query("SELECT `id` FROM `user`;")->num_rows;
                if ($data == 'sendall') 
                {
                    $datas = $handler->getData(['caption', 'message_id'], $from_id);
                    $caption = $datas['caption']?:'none';
                    $connect->query("UPDATE `sfall` SET `sendall` = 1, `count` = 0, `chat_id` = '$chat_id', `msg_id` = '{$datas['message_id']}', `msg_id2` = '$message_id', `text` = '$caption' LIMIT 1");	
                    $this->editMessagetext(['text'=>"➖ پروسه پیام همگانی(بی نام) آغاز شد .\n🌀 تعداد ممبر های ربات : <code>$users_count</code>\n\n🔻 اطلاعات پیام همگانی ( بروز میشود )", 'parse_mode'=>'HTML', 'reply_markup'=>$this->eKey(['inline'=>[[["👥 ارسال شده : 0 نفر",'none']],[["🕒 زمان تخمینی باقیمانده : {$handler->timeleft($users_count)} دقیقه",'none']]]])]);
                    $this->send(['text'=>'🔻 به پنل مدیریتی بازگشتید.', 'reply_markup'=>$this->eKey(['keyboard'=>$keyboard['panel']]), 'answer'=> null]);
                    $handler->clearCache($from_id);
                }
                if ($data == 'forall')
                {
                    $datas = $handler->getData(['caption', 'message_id'], $from_id);
                    $caption = $datas['caption']?:'none';
                    $connect->query("UPDATE `sfall` SET `forall` = 1, `count` = 0, `chat_id` = '$chat_id', `msg_id` = '{$datas['message_id']}', `msg_id2` = '$message_id', `text` = '$caption' LIMIT 1");	
                    $this->editMessagetext(['text'=>"➖ پروسه پیام همگانی(فورواردی) آغاز شد .\n🌀 تعداد ممبر های ربات : <code>$users_count</code>\n\n🔻 اطلاعات پیام همگانی ( بروز میشود )", 'parse_mode'=>'HTML', 'reply_markup'=>$this->eKey(['inline'=>[[["👥 ارسال شده : 0 نفر",'none']],[["🕒 زمان تخمینی باقیمانده : {$handler->timeleft($users_count)} دقیقه",'none']]]])]);
                    $this->send(['text'=>'🔻 به پنل مدیریتی بازگشتید.', 'reply_markup'=>$this->eKey(['keyboard'=>$keyboard['panel']]), 'answer'=> null]);
                    $handler->clearCache($from_id);
                }
            }
        }
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

$BPT = new BPT_handler($BPTSettings['handler']);
$connect->close();

?>