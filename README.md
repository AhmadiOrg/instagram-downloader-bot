# درباره 
ورژن 2.0 (آخرین ورژن) ربات تلگرامی اینستادانلودر

ربات بر پایه کتابخانه BPT و دیتابیس MySql میباشد

این ربات از api کد سازان استفاده میکند ( در ورژن فعلی )

شما میتوانید داکیومنت این وبسرویس را از طریق : https://docs.codesazan.ir/Instagram/ مطالعه بفرمایید


# امکانات ربات
- امکان دانلود استوری پیج
- امکان دانلود پست , ریلز , پست های اسلایدی
- امکان دانلود هایلایت پیج بصورت هوشمند
- امکان دریافت عکس پروفایل و مشخصات پیج
- ارسال موارد دانلود شده بصورت آلبومی
- پنل مدیریتی حرفه ای شامل
    - آمار گیری
    - پیام همگانی بی نام و فورواردی پیشرفته ( 200 ارسال بر دقیقه )

# نحوه راه اندازی

1- فایل زیپ شده این سورس را درون هاست خود File Manager 
پوشه public_html آپلود کنید.

2- فایل زیپ شده را در همانجا استخراج کنید

3- وارد پوشه استخراج شده شوید فایل config.php رو باز کنید و ادیت های لازم رو انجام بدین
- باید توکن ربات رو بگیرید و توی لاینی که مشخص شده داخل فایل قرار بدید
- باید یوزرنیم رباتی که توکنش رو گزاشتید رو توی قسمت مشخص شده بزارید

" نکته مهم - کلید وبسرویس کد بازان مورد نیازه"
- باید کلید وبسرویس کد بازان برای دانلود از اینستاگرام رو در قسمت مشخص شده قرار بدید
* برای دریافت کلید وبسرویس اینستاگرام کد بازان فقط کافیه وارد رباتشون بشید :
* https://t.me/CodeSazan_APIManager_Bot
* در حال حاضر وبسرویسشون رایگان و بدون محدودیت هست و میتونید به راحتی از بخش وبسرویس ها کلید وبسرویس رو بگیرید و توی فایل config.php این ربات قرار بدید.

- باید لیست ایدی عددی ادمین هارو با , جدا کنید و بزارید
- باید یک دیتابیس بسازید و مشخصات دیتابیس MySQl رو توی قسمت مشخصات شده بزارید.

4- یبار آدرس فایل run.php رو باز کنید و مطمئن بشید عبارت دیتابیس متصل شد نمایش داده میشه

5- از طریق بخش CronJobs توی هاستتون یا سایت cron-job.org روی آدرس cron.php یک کرونجاب 1 دقیقه ای ست کنید 
- کرونجاب برای کارکرد صحیح همگانی ها نیاز هاست

! نکته بسیار مهم !

بدلیل محدودیت های وبسرویس عمومی تلگرام, رباتها امکان ارسال ویدیو ها  و فایل های حجم بالارو ندارند
و این موضوع ممکنه باعث ارسال نشدن پست دانلود شده بعضی پستا توی این ربات بشه
برای حل این مشکل باید وبسرویس لوکال تلگرام رو روی یک سرور مجازی ترجیحا هلند نصب بکنید.
بعد اینکه لوکال وبسرویس رو نصب کردید باید ایپی سرورتون رو جای api.telegram.org توی فایل config.php بزارید
اینطوری درخواست های ربات بجای وبسرویس تلگرام به وبسرویس شما ارسال میشه و محدودیتی نیست
* https://github.com/tdlib/telegram-bot-api
از اینجا میتونید مطالعه کنید و نصبش کنید
نصب کردن و جایگزاری وبسرویس لوکال به راحتی انجام میشه و پیشنهاد میکنم اینکارو انجام بدین

# پیش نیاز ها
- پیش نیاز این سورس PHP 7.4 میباشد

# حمایت از ما
- شما میتوانید با دنبال کردن کانال تخصصی ربات تلگرام ما از ما حمایت کنید!
- کانال هوش سیاه در تلگرام : https://t.me/DarkMindsTM
- همچنین امکان حمایت مالی از طریق پرداخت با TRX به ولت زیر امکان پذیر است

      TJeVyuETQY6QWGnuFBdsMCVZDZpZsinpjU
