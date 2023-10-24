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

if ($connect->connect_error)
    die('Connect Error (' . $connect->connect_errno . ') ' . $connect->connect_error);

$connect->query("SET SESSION collation_connection = 'utf8_persian_ci';");
$connect->query("CREATE TABLE if not exists `user` (
    `id` bigint PRIMARY KEY,
    `step` text NOT NULL,
    `time_s` bigint NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;");

$connect->query("CREATE TABLE if not exists `step` (
    `id` bigint NOT NULL,
    `step` text NOT NULL,
    `data` text COLLATE utf8mb4_persian_ci NOT NULL,
    `inserttime` bigint DEFAULT 0
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;");

$connect->query("CREATE TABLE if not exists `channels` (
    `idoruser` varchar(50) PRIMARY KEY,
    `link` text NOT NULL, 
    `createtime` bigint NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;");

$connect->query("CREATE TABLE if not exists `sfall` (
    `sendall` boolean DEFAULT false,
    `forall` boolean DEFAULT false,
    `count` bigint(100) DEFAULT 0,
    `chat_id` bigint(64) DEFAULT 0,
    `text` varchar(1000) COLLATE utf8mb4_persian_ci DEFAULT 'none',
    `msg_id2` bigint(100) DEFAULT 0,
    `msg_id` bigint(100) DEFAULT 0
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;");
    
$connect->query("INSERT INTO `sfall` () VALUES ();");

# کسخل نیستم بیام یه همچین حلقه الکی ای بزنم این زیر
# ولی مجبورم!! بخاطر اینکه فایل bot.php برای وبهوک ست شدن باید چند بار باز بشه! اینم همون کارو میکنه!
$url = str_replace('run.php', '', 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
for ($i = 0; $i <= 5; $i++)
    file_get_contents($url . 'bot.php');

echo '<h1 align="center"><b>دیتابیس متصل و نصب شد .</b></h1>';
/**
 * Version: v2.0
 * Developer: @DearAhmadi
 * Join us @DarkMindsTm 
 * Group: @DarkMindsGp
 * برای حمایت از من با منبع اسکی برید!
 * جوین شدن توی چنل هوش سیاه فراموش نشه!
 */
?>