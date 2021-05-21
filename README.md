# ล็อตสนุก
เป็นการดึงผลสลากกินแบ่งรัฐบาลจากเว็บ sanook.com และ myhora.com มาเก็บไว้เป็นแบบ json โดยใช้ PHP ในการเขียน

# ลิงค์ API สำหรับผู้พัฒนา
* เช็คหวยออกวันนั้นๆ [[vercel](https://lottsanook.vercel.app/api/?date=01102563)/[heroku](https://lottsanook.herokuapp.com/?date=01102563)] (ใส่ &from หลังลิงค์เพื่อเปลี่ยน array แถวแรกอันดับแรกเป็นวันที่ในการหวยออก หรือ ใส่ &fresh เพื่อให้หวย Update อยู่ตลอดเวลา)

* เช็คหวยออกวันนั้นๆ (สำรอง) [[vercel](https://lottsanook.vercel.app/api/index2.php?date=01102563)/[heroku](https://lottsanook.herokuapp.com/index2.php?date=01102563)] (เช็คได้แค่ 10 ปี ย้อนหลัง)

* ตรวจหวย [[vercel](https://lottsanook.vercel.app/api/checklottery.php?by=01032564&search=835573)/[heroku](https://lottsanook.herokuapp.com/checklottery.php?by=01032564&search=835573)]

* List วันหวยออกทั้งหมด (Update ตลอดเมื่อเรียกใช้) [[heroku](https://lottsanook.herokuapp.com/god.php)]

* List วันหวยออกของปีนั้นๆ [[vercel](https://lottsanook.vercel.app/api/gdpy.php?year=2555)/[heroku](https://lottsanook.herokuapp.com/gdpy.php?year=2555)]

* ดึงรางวัลที่หนึ่ง สามตัวหน้า สามตัวท้าย และ สองตัว งวดล่าสุด [[vercel](https://lottsanook.vercel.app/api/lastlot.php)/[heroku](http://lottsanook.herokuapp.com/lastlot/)]

* เช็คหวยออกทั้งหมดว่ากี่ครั้ง แบบง่าย (ตั้งแต่ 2543 ถึง ปัจจุปัน) [[heroku](https://lottsanook.herokuapp.com/finddol.php?search=81)]

* ดึงรูปภาพหวย/สลากกินแบ่งฯ เลขเด็ดจากเจ้าต่างๆ [[vercel](https://lottsanook.vercel.app/api/getchit.php)/[heroku](https://lottsanook.herokuapp.com/getchit.php)]

* เช็คว่าวันนี้หวย/สลากกินแบ่งฯ ออกหรือไม่ (yes คือ ใช่ / no คือ ไม่) [[vercel](https://lottsanook.vercel.app/api/reto.php)/[heroku](https://lottsanook.herokuapp.com/reto.php)]

* หน้าแสดงผลหวย ขนาด 1600x1066 (สามารถกำหนดวันได้ โดยเปลี่ยนวันเดือนปี หลัง date=) [[vercel](https://lottsanook.vercel.app/api/viewlot.php)/[heroku](http://lottsanook.herokuapp.com/viewlot.php?date=01022563)]

* หน้าแสดงผลหวยและราคาทองวันนี้ ขนาด 1600x1066 (ทำงานสมูบรณ์เมื่อวันหวยออกเท่านั้น หรือ ใส่ ?test เพื่อเป็นการทดสอบ) [[heroku](https://lottsanook.herokuapp.com/viewlot_gold.php)]

* หน้าแสดงผลหวยวันนี้ ขนาด 851x315 (ประมวลผลนานแต่ใช้งานได้) [[heroku](https://lottsanook.herokuapp.com/viewlo.php)]

# ลิงค์ API สำหรับผู้พัฒนา (ยามจำเป็น)

* [List วันหวยออกทั้งหมด (TXT File)]() ไฟล์เบื้องต้นใน Github เมื่อเซิฟเวอร์มีปัญหา หรือ ไฟล์หลังจากเรียกใช้ god.php [[Github](https://raw.githubusercontent.com/Quad-B/lottsanook/main/cache/test.txt)/[TXT File](https://lottsanook.herokuapp.com/cache/test.txt)]
