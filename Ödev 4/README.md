# Class Kullanıp Veriyi Kontrol Ederek Kaydetme
Bu ödevde yaptıklarım ;<br>
-Bir form dosyası oluşturdum <br>
-Girilen verileri veritabanına kaydetmek için PDO kulanarak bağlantı dosyası oluşturdum.<br>
-Verileri kaydederken Tc kimlik numarasını belirli koşullara göre kontrol edip geçerliliğini durum kolonuna kaydettim.<br>
-Tc kimlik geçerlilik koşulları şunlar;<br>
  (1) TC kimlik numaraları 11 hanelidir ve her hanesi rakamsal değerdedir.<br>
  (2) İlk hane hiçbir zaman 0 olamaz.<br>
  (3) 1.3.5.7. ve 9. hanelerin toplamının 7 ile çarpımından, 2. 4. 6. ve 8, hanelerin toplamı çıkartıldığındageriye kalan sayının 10'a göre modu 10. haneye eşittir.<br> 
  (4) 1. 2. 3. 4. 5. 6. 7. 8. 9. 10. hanelerin toplamının 10'a göre modu 11. haneye eşittir.<br><br>
Form Çıktısı:<br>
![aaa](https://user-images.githubusercontent.com/110525328/203948584-2c2ad632-a56a-4214-a295-4e9272880161.png)<BR>
Liste Çıktısı:<br>
![bbb](https://user-images.githubusercontent.com/110525328/203949350-6c9b585c-7e40-4fbd-b05c-7181c2784b2b.png)
