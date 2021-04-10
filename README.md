# ล็อตสนุก
เป็นการดึงผลสลากกินแบ่งรัฐบาลจากเว็บ sanook.com และ myhora.com มาเก็บไว้เป็นแบบ json โดยใช้ PHP ในการเขียน

# ลิงค์ API สำหรับผู้พัฒนา
* [เช็คหวยออกวันนั้นๆ](https://lottsanook.herokuapp.com/?date=01102563) (ใส่ &from หลังลิงค์เพื่อเปลี่ยน array แถวแรกอันดับแรกเป็นวันที่ในการหวยออก หรือ ใส่ &fresh เพื่อให้หวย Update อยู่ตลอดเวลา)

* [เช็คหวยออกวันนั้นๆ (สำรอง)](https://lottsanook.herokuapp.com/index2.php?date=01102563) (เช็คได้แค่ 10 ปี ย้อนหลัง)

* [ตรวจหวย](https://lottsanook.herokuapp.com/checklottery.php?by=01032564&search=835573)

* [List วันหวยออกทั้งหมด (PHP Content)](https://lottsanook.herokuapp.com/god.php) (Update ตลอดเมื่อเรียกใช้)

* [List วันหวยออกทั้งหมด (TXT File)](https://lottsanook.herokuapp.com/cache/test.txt) (Update หลังจากมีการเรียกใช้ god.php)

* [List วันหวยออกทั้งหมด (TXT File)](https://raw.githubusercontent.com/Quad-B/lottsanook/main/cache/test.txt) (ไฟล์เบื้องต้นใน Github เมื่อเซิฟเวอร์มีปัญหา)

* [List วันหวยออกของปีนั้นๆ](https://lottsanook.herokuapp.com/gdpy.php?year=2555)

* [ดึงรางวัลที่หนึ่ง สามตัวหน้า สามตัวท้าย และ สองตัว งวดล่าสุด](http://lottsanook.herokuapp.com/lastlot/)

* [เช็คหวยออกทั้งหมดว่ากี่ครั้ง แบบง่าย (ตั้งแต่ 2543 ถึง ปัจจุปัน)](https://lottsanook.herokuapp.com/finddol.php?search=81)

* [ดึงรูปภาพหวย/สลากกินแบ่งฯ เลขเด็ดจากเจ้าต่างๆ](https://lottsanook.herokuapp.com/getchit.php)

* [หน้าแสดงผลหวย ขนาด 1600x1066](http://lottsanook.herokuapp.com/viewlot.php?date=01022563) (สามารถกำหนดวันได้ โดยเปลี่ยนวันเดือนปี หลัง date=)

* [หน้าแสดงผลหวยและราคาทองวันนี้ ขนาด 1600x1066](https://lottsanook.herokuapp.com/viewlot_gold.php) (ทำงานสมูบรณ์เมื่อวันหวยออกเท่านั้น หรือ ใส่ ?test เพื่อเป็นการทดสอบ)

* [หน้าแสดงผลหวยวันนี้ ขนาด 851x315](https://lottsanook.herokuapp.com/viewlo.php) (ประมวลผลนานแต่ใช้งานได้)

# ลิงค์ API สำหรับผู้พัฒนา (บน Vercel)
* [เช็คหวยออกวันนั้นๆ](https://lottsanook.vercel.app/api/?date=01102563) (ใส่ &from หลังลิงค์เพื่อเปลี่ยน array แถวแรกอันดับแรกเป็นวันที่ในการหวยออก)

* [เช็คหวยออกวันนั้นๆ (สำรอง)](https://lottsanook.vercel.app/api/index2.php?date=01102563)

* [ตรวจหวย](https://lottsanook.vercel.app/api/checklottery.php?by=01032564&search=835573)

* [List วันหวยออกของปีนั้นๆ](https://lottsanook.vercel.app/api/gdpy.php?year=2555)

* [ดึงรูปภาพหวย/สลากกินแบ่งฯ เลขเด็ดจากเจ้าต่างๆ](https://lottsanook.vercel.app/api/getchit.php)

* [ดึงรางวัลที่หนึ่ง สามตัวหน้า สามตัวท้าย และ สองตัว งวดล่าสุด](https://lottsanook.vercel.app/api/lastlot.php)
