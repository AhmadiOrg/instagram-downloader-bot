<?php

/**
 * Version: v2.0
 * Developer: @DearAhmadi
 * Join us @DarkMindsTm 
 * Group: @DarkMindsGp
 * برای حمایت از من با منبع اسکی برید!
 * جوین شدن توی چنل هوش سیاه فراموش نشه!
 */

date_default_timezone_set('Asia/Tehran');

/* -------------------------------------------------- */
define('API_KEY', 'put_your_token');  /* توکن ربات باید بزاری */
define('BOT_USERNAME', 'put_bot_username'); /* یوزرنیم ربات بدون @ */
define('INSTA_KEY', 'put_codebazan_api_key'); /* کلید وبسرویس اینستاگرام کد بازان را قرار دهید دریافت از طریق: https://t.me/CodeSazan_APIManager_Bot */
$admins = [ # ایدی عددی ادمین ها ( مطابق الگو بزارید *)
    0000000000,
    1111111111,
    2222222222,
]; 
$database = [
    'database' => '', /* اسم دیتابیس */
    'username' => '', /* یوزرنیم دیتابیس */
    'password' => '' /* پسورد دیتابیس */
];
/* -------------------------------------------------- */

$keyboard = [
    'panel' => [
        ['📈 آمار لحظه ای ربات'],
        ['🔐 قفل چنل ها', '📮 ارسال همگانی'],
        ['🏠']
    ],
    'back' => [
        ['🏠']
    ],
    'back_panel' => [
        ['🔙 بازگشت به پنل']
    ],
    'back_channels' => [
        ['🔙 بازگشت به مدیریت چنل']
    ], 
    'locks' => [
        ['🔧 مدیریت چنل ها','➕ افزودن چنل'],
        ['🔙 بازگشت به پنل']
    ]
];

$BPTSettings = [
    'handler' => [
        'token' => API_KEY,
        /**
                    " نکته مهم "
            * بدلیل محدودیت های وبسرویس تلگرام
            * امکان آپلود ویدیو هایی که حجم بالان فراهم نیست
            * برای رفع این مشکل شما باید یک سرور مجازی داشته باشید و 
            * لوکال وبسرویس تلگرام رو روش نصب کنید
            * سپس بجای api.telegra.org آیپی سرورتون که روش نصب کردید رو بزارید
            * برای نصب کردن لوکال وبسرویس این داکیومنت رو از گیتهاب مطالعه کنید :
            * https://github.com/tdlib/telegram-bot-api
         */
        'base_url' => 'https://api.telegram.org/bot', 
        'multi' => false,
        'allowed_updates' => [
            'update_id', 
            'message', 
            'callback_query', 
            'inline_query', 
            'my_chat_member', 
            'chat_member',
        ],
        'secure_folder' => false,
        'debug' => false,
    ],
    'public' => [
        'token' => API_KEY,
        'receive' => 'none',
        'handler' => false,
        'secure_folder' => false
    ],
];
$time =         time();
$connect =      new MySQLi('localhost', $database['username'], $database['password'], $database['database']);
$connect->set_charset('utf8mb4');