# 💻 BilgiDemi – Çoklu Yazarlı Blog Uygulaması

**Üniversite Bitirme Projesi**

BilgiDemi; yazılım, algoritmalar, yapay zekâ, veri bilimi gibi bilgisayar bilimleri konularında **çok yazarlı** makale paylaşımını ve etkileşimi teşvik eden eğitim odaklı bir blog platformudur. Her kullanıcı:

- Kendi makalelerini oluşturup yayınlayabilir  
- Diğer kullanıcıların içeriklerini görüntüleyebilir  
- Makalelere yorum yapabilir ve beğeni bırakabilir  


## Proje Özeti

BilgiDemi’nin amacı, üniversite öğrencileri başta olmak üzere tüm teknoloji meraklılarının **hem okuyucu** hem de **içerik üreticisi** olarak bir araya geldiği dinamik bir ortam sunmaktır. Başlıca işleyiş:

1. **Kategori & Etiketleme**  
   - Makaleler; konulara (ör. Veri Bilimi, Yapay Zekâ) göre kategorize edilir  
   - Her makale birden fazla etiketle (ör. Python, Makine Öğrenmesi) işaretlenebilir  

2. **Etkileşim**  
   - Yorum yapma, beğenme (❤️) ve “Daha Sonra Oku” listesine ekleme  
   - Popüler içerikler ana sayfada ön plana çıkar  

3. **Yönetici Kontrolü**  
   - Admin rolü: Kullanıcı, makale ve yorum yönetimi  
   - Standart kullanıcı: İçerik oluşturma ve etkileşim  

Bu yapı, içerik keşfini kolaylaştırır, topluluk etkileşimini artırır ve öğrenme süreçlerini hızlandırır.


## Klasör Yapısı
```
BilgiDemi/
├─ index.php # Uygulama giriş noktası
├─ Assets/ # Statik dosyalar
│ ├─ css/ # Stil şablonları
│ ├─ js/ # JavaScript dosyaları
│ └─ images/ # Görseller ve ikonlar
├─ Config/ # Konfigürasyon
│ ├─ config.php # Genel ayarlar
│ └─ connect.php # Veritabanı bağlantısı
├─ Components/ # Tekrarlanan UI parçaları
│ ├─ header.php # Üst bilgi
│ ├─ footer.php # Alt bilgi
│ ├─ menu.php # Navigasyon menüsü
│ └─ card.php # Makale önizleme kartı
├─ Pages/ # İşlevsel sayfalar
│ ├─ register.php # Kayıt
│ ├─ login.php # Giriş
│ ├─ logout.php # Çıkış
│ ├─ discover.php # Makale keşfetme
│ ├─ search.php # Arama
│ ├─ category.php # Kategoriye göre listeleme
│ ├─ post.php # Makale görüntüleme
│ ├─ postAdd.php # Makale ekleme
│ ├─ postEdit.php # Makale düzenleme
│ ├─ postDelete.php # Makale silme
│ ├─ profile.php # Kullanıcı profili
│ └─ profileEdit.php # Profil düzenleme
└─ Col/ # Sayfa sütunları (sol/sağ)
├─ discoverLeftCol.php
├─ discoverRightCol.php
```

## Temel Özellikler

- **Makale Yönetimi**  
  - Yazma, düzenleme, silme  
  - Zengin metin veya Markdown desteği (isteğe bağlı)

- **Kategoriler & Etiketler**  
  - Hiyerarşik kategori ağacı  
  - Çoklu etiketleme sistemi  

- **Yorum & Geri Bildirim**  
  - Kullanıcı yorumları  
  - Admin onay/ret mekanizması  

- **Beğeniler & “Daha Sonra Oku”**  
  - Okuma listesi  
  - Popüler içerik sıralaması  

- **Rol Tabanlı Erişim Kontrolü**  
  - Admin vs. standart kullanıcı ayrımı  
  - Yetkisiz erişime karşı koruma
 

## Kullanım Senaryosu

1. **Kayıt & Giriş**  
   - `register.php` → Hesap oluşturma  
   - `login.php` → Sisteme giriş  

2. **Makale Döngüsü**  
   - `postAdd.php` → Yeni makale ekleme  
   - `post.php` → Makale görüntüleme  
   - `postEdit.php` → Makale güncelleme  
   - `postDelete.php` → Makale silme  

3. **Keşfet & Arama**  
   - `discover.php` → Öne çıkan ve en yeni içerikler  
   - `search.php` → Anahtar kelime araması  
   - `category.php` → Kategori bazlı listeleme  

4. **Profil Yönetimi**  
   - `profile.php` → Profil görüntüleme  
   - `profileEdit.php` → Profil bilgilerini güncelleme


## 🧑‍💻 Geliştirici

- **Baran Kanat**  
  – Necmettin Erbakan Üniversitesi  
  – Web Programlama Dersi Bitirme Projesi  
- [LinkedIn](https://www.linkedin.com/in/baran-kanat)  
