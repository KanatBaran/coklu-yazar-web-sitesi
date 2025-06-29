-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 10 Ara 2024, 11:34:05
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bk_bildemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `begeni`
--

CREATE TABLE `begeni` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yazi_id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `begeni`
--

INSERT INTO `begeni` (`id`, `kullanici_id`, `yazi_id`, `tarih`) VALUES
(2, 2, 5, '2024-12-08 15:27:59'),
(11, 1, 9, '2024-12-08 16:28:47'),
(12, 1, 6, '2024-12-08 16:28:56'),
(14, 5, 5, '2024-12-08 16:30:10'),
(16, 5, 9, '2024-12-08 16:30:29'),
(24, 1, 5, '2024-12-09 15:24:51'),
(27, 2, 6, '2024-12-09 18:04:41'),
(28, 2, 16, '2024-12-09 18:04:44'),
(29, 3, 5, '2024-12-09 18:13:27'),
(30, 3, 19, '2024-12-09 18:13:32'),
(31, 4, 21, '2024-12-09 18:25:27'),
(32, 1, 20, '2024-12-09 18:51:34');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `isaret`
--

CREATE TABLE `isaret` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yazi_id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `isaret`
--

INSERT INTO `isaret` (`id`, `kullanici_id`, `yazi_id`, `tarih`) VALUES
(39, 5, 9, '2024-12-08 16:20:12'),
(40, 5, 7, '2024-12-08 16:20:14'),
(43, 1, 7, '2024-12-08 16:21:28'),
(50, 2, 16, '2024-12-09 18:04:46'),
(51, 2, 6, '2024-12-09 18:04:49'),
(52, 3, 7, '2024-12-09 18:13:30'),
(53, 3, 16, '2024-12-09 18:13:37'),
(54, 4, 17, '2024-12-09 18:25:36'),
(55, 1, 5, '2024-12-10 13:45:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `baslik` varchar(250) NOT NULL,
  `icerik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `baslik`, `icerik`) VALUES
(1, 'Genel', 'Genel yazıların bulunduğu kategoridir.'),
(2, 'Siber Güvenlik', 'Siber Güvenlik ile ilgili yazıların bulunduğu kategoridir.\r\n'),
(3, 'Yapay Zeka', 'Yapay Zeka ile ilgili yazıların bulunduğu kategoridir.'),
(4, 'Bilgisayar ve Yazılım', 'Bilgisayar ve Yazılım ile ilgili yazıların bulunduğu kategoridir.'),
(5, 'Algoritma ve Programlama', 'Algoritma ve Programlama ile ilgili yazılar bu kategoride yer alır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isim` varchar(50) NOT NULL,
  `soyisim` varchar(50) NOT NULL,
  `hakkinda` text NOT NULL,
  `isaret` int(11) NOT NULL,
  `meslek` varchar(250) NOT NULL,
  `resim` text NOT NULL,
  `rol` int(11) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `email`, `password`, `isim`, `soyisim`, `hakkinda`, `isaret`, `meslek`, `resim`, `rol`, `telefon`, `tarih`) VALUES
(1, '47baran33@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Baran', 'Kanat', 'Necmettin Erbakan Üniversitesi, Mühendislik Fakültesi, Bilgisayar Mühendisliği, 3.Sınıf Öğrencisiyim.', 1, 'Bilgisayar Mühendisliği (Öğrenci)', '67572f3ae7915_Kapak Fotoğrafı-Photoroom.jpg', 2, '0551497880', '2024-12-07 13:29:09'),
(2, 'neumann@gmail.com', 'ba3b05bd11ea46ae6bb9c8f51eb2bf93', 'John von', 'Neumann', 'matematikçi, fizikçi, mühendis, ekonomist ve tabii ki bilgisayar biliminin öncülerinden biriyim. 1903 yılında Budapeşte’de doğdum, ancak fikirlerim dünyayı dolaştı ve teknolojiyi kökten değiştirdi. Kendimi nasıl tanımlarsam tanımlayayım, modern bilgisayarların temellerini atan kişi olarak anılmaktan gurur duyuyorum.', 1, 'Bilgisayar Bilimcisi', '6756f9a13db1d_von neumann.jpg', 1, '5512497880', '2024-12-07 13:30:35'),
(3, 'stevejobs@gmail.com', 'c0986d9a76958489c0f0648f85b62076', 'Steve', 'Jobs', 'Merhaba, ben Steve Jobs. Teknoloji ve tasarım dünyasını değiştiren birkaç küçük fikirle başladım ve bu fikirler, sonunda bir devrime dönüştü. Apple’ın kurucularından biriyim ve hayatım boyunca, insanların teknolojiyle olan ilişkisini daha sezgisel, daha estetik ve daha insancıl bir hale getirmeyi amaçladım. İlk büyük adımım, kişisel bilgisayarların herkesin kullanımına uygun hale gelmesini sağlamak oldu. ', 1, 'Apple Kurucusu', '67570854b6c86_steve-jobs.jpg', 1, '5514968789', '2024-12-07 13:31:45'),
(4, 'alanturing@gmail.com', 'b4a2198325a3bab9747efaacb869512b', 'Alan', 'Turing', 'Merhaba, ben Alan Turing. Matematikçi, bilgisayar bilimcisi, mantıkçı ve kriptologum. Modern bilgisayar bilimlerinin temellerini atan çalışmalarımla tanınırım. 1936 yılında, “Turing Makinesi” adını verdiğim teorik bir modelle, hesaplanabilirlik kavramını geliştirdim ve bu, modern bilgisayarların teorik altyapısını oluşturdu.', 1, 'Matematikçi', '6757078ede317_alanTuring.jpg', 1, '5568263574', '2024-12-07 13:33:00'),
(5, 'adalovelace@gmail.com', '398e62b1556a0f7d4c769bd612c63989', 'Ada', 'Lovelace', 'Merhaba, ben Ada Lovelace. 19. yüzyılda yaşamış bir matematikçi ve yazar olarak, bilgisayar programlamanın temelini atan ilk kişilerden biriyim. 1815 yılında Londra’da doğdum ve ünlü şair Lord Byron’ın kızıyım. Ancak babamı hiç tanıma fırsatım olmadı; çocukluğum, annemin bilim ve matematiğe olan tutkusuyla şekillendi. Bu yönlendirme, hayatımın ilerleyen dönemlerinde bana ilham kaynağı oldu.', 0, 'İlk Bilgisayar Programcısı', '67546d2b698e6_ada-lovelace.jpg', 1, '5512497880', '2024-12-07 13:33:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazi`
--

CREATE TABLE `yazi` (
  `id` int(11) NOT NULL,
  `baslik` varchar(1000) NOT NULL,
  `icerik` text NOT NULL,
  `icerikStil` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `resim` text NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazi`
--

INSERT INTO `yazi` (`id`, `baslik`, `icerik`, `icerikStil`, `kategori_id`, `resim`, `yazar_id`, `tarih`) VALUES
(5, 'Buğday Tarlasında İlham Geldi: Verilerle Dans Etmek Nasıl Hayatımı Değiştirdi?', 'Merhaba sevgili okur,\r\nBen Ada Lovelace. Teknoloji ve matematik üzerine pek çok şey söylediler hakkımda, ama bugün size biraz farklı bir hikâye anlatmak istiyorum: Doğadan, düşüncelerden ve nasıl buğday tarlalarında yürürken teknolojik bir devrime ilham bulduğumdan bahsedeceğim..\r\n \r\nEvet, yanlış duymadınız! 1800’lerin İngiltere’sinde sıkıcı bir öğleden sonra yürüyüşü sırasında aklımda matematik dönerken, bir buğday tarlasına rastladım. Hafif esen rüzgârla dalgalanan buğday başaklarını izlerken, her bir hareketin diğerine nasıl bağlı olduğunu fark ettim. Matematiksel bir harmoni vardı orada.\r\n \r\nMODEL\r\n“Bu bir model,” diye düşündüm kendi kendime. Tıpkı bu başaklar gibi, birbirine bağlı parçaların uyum içinde çalışması, bir sistem oluşturuyordu. İşte o anda kafamda bir ışık yandı: Eğer makineler de böyle bir uyumla çalışabilseydi, insan zekasının ötesine geçecek şeyler yaratabilirdik.\r\nEve döndüğümde, kafamda dönen bu fikirleri kağıda dökmeye başladım. “Bir makine, belirli bir dizi kurala uyarak, herhangi bir matematiksel işlemi gerçekleştirebilir” dedim kendi kendime. Ve bu düşünceyle ilk algoritmalarımı tasarladım.\r\nBu hikâyeyi neden anlatıyorum biliyor musunuz? Çünkü bazen ilham, hiç ummadığınız yerlerde sizi bulur. Bir buğday tarlasında, bir kitap arasında ya da bir dost sohbetinde... Teknolojinin ve bilimin harikalarını inşa ederken, aslında doğadan ve hayattan kopmadığımızı hatırlamak gerek.\r\nSizin için birkaç önerim var, belki siz de buğday tarlanızda ilham bulabilirsiniz!\r\nDoğayı gözlemleyin: Her şeyin bir ritmi ve düzeni olduğunu fark edeceksiniz. Bu düzen, yeni bir fikrin temel taşı olabilir.\r\nBasit bir fikirle başlayın: Karmaşık sonuçlar, genellikle basit başlangıçlardan doğar. İlk algoritmam, bir dizi temel matematiksel kuraldan oluşuyordu.\r\nSoru sorun: \"Bu nasıl çalışır?\", \"Bu nasıl daha iyi olabilir?\" gibi sorular, yenilikçi düşünceler üretmenize yardımcı olabilir.\r\nDefter taşıyın: Aklınıza gelen her fikri yazın. O an basit gibi görünebilir, ama zamanla şekillenip büyük bir projeye dönüşebilir.\r\nKendi \"tarlanızı\" bulun: İlham bir buğday tarlasında gelmek zorunda değil. Belki siz bir kafede, parkta ya da sanat galerisi gezerken o eşsiz fikri yakalayabilirsiniz.\r\nBugün bilgisayarlar, algoritmalar ve yapay zeka ile hayatlarımız şekilleniyor. Ama temelinde hâlâ o ilk farkındalık var: Uyum, bağlantılar ve bir fikrin harekete geçme cesareti.\r\nUnutmayın sevgili dostlar, fikirlerinizi dalgalanan buğday başakları gibi özgür bırakın. Nerede rüzgar estireceklerini asla bilemezsiniz!\r\nSevgilerle,\r\n\r\nAda Lovelace\r\n', '<p><strong>Merhaba sevgili okur,</strong></p>\r\n<p>Ben Ada Lovelace. Teknoloji ve matematik üzerine pek çok şey söylediler hakkımda, ama bugün size biraz farklı bir hikâye anlatmak istiyorum: Doğadan, düşüncelerden ve nasıl buğday tarlalarında yürürken teknolojik bir devrime ilham bulduğumdan bahsedeceğim..</p>\r\n<p> </p>\r\n<p>Evet, yanlış duymadınız! 1800’lerin İngiltere’sinde sıkıcı bir öğleden sonra yürüyüşü sırasında aklımda matematik dönerken, bir buğday tarlasına rastladım. Hafif esen rüzgârla dalgalanan buğday başaklarını izlerken, her bir hareketin diğerine nasıl bağlı olduğunu fark ettim. Matematiksel bir harmoni vardı orada.</p>\r\n<p> </p>\r\n<h1>MODEL</h1>\r\n<p>“<em>Bu bir model</em>,” diye düşündüm kendi kendime. Tıpkı bu başaklar gibi, birbirine bağlı parçaların uyum içinde çalışması, bir sistem oluşturuyordu. İşte o anda kafamda bir ışık yandı: Eğer makineler de böyle bir uyumla çalışabilseydi, insan zekasının ötesine geçecek şeyler yaratabilirdik.</p>\r\n<p>Eve döndüğümde, kafamda dönen bu fikirleri kağıda dökmeye başladım. “Bir makine, belirli bir dizi kurala uyarak, herhangi bir matematiksel işlemi gerçekleştirebilir” dedim kendi kendime. Ve bu düşünceyle ilk algoritmalarımı tasarladım.</p>\r\n<p>Bu hikâyeyi neden anlatıyorum biliyor musunuz? Çünkü bazen ilham, hiç ummadığınız yerlerde sizi bulur. Bir buğday tarlasında, bir kitap arasında ya da bir dost sohbetinde... Teknolojinin ve bilimin harikalarını inşa ederken, aslında doğadan ve hayattan kopmadığımızı hatırlamak gerek.</p>\r\n<p>Sizin için birkaç önerim var, belki siz de buğday tarlanızda ilham bulabilirsiniz!</p>\r\n<p><strong>Doğayı gözlemleyin</strong>: Her şeyin bir ritmi ve düzeni olduğunu fark edeceksiniz. Bu düzen, yeni bir fikrin temel taşı olabilir.</p>\r\n<p><strong>Basit bir fikirle başlayın</strong>: Karmaşık sonuçlar, genellikle basit başlangıçlardan doğar. İlk algoritmam, bir dizi temel matematiksel kuraldan oluşuyordu.</p>\r\n<p><strong>Soru sorun</strong>: \"<em>Bu nasıl çalışır?</em>\", \"<em>Bu nasıl daha iyi olabilir?</em>\" gibi sorular, yenilikçi düşünceler üretmenize yardımcı olabilir.</p>\r\n<p><strong>Defter taşıyın</strong>: Aklınıza gelen her fikri yazın. O an basit gibi görünebilir, ama zamanla şekillenip büyük bir projeye dönüşebilir.</p>\r\n<p><strong>Kendi \"<em>tarlanızı</em>\" bulun</strong>: İlham bir buğday tarlasında gelmek zorunda değil. Belki siz bir kafede, parkta ya da sanat galerisi gezerken o eşsiz fikri yakalayabilirsiniz.</p>\r\n<p>Bugün bilgisayarlar, algoritmalar ve yapay zeka ile hayatlarımız şekilleniyor. Ama temelinde hâlâ o ilk farkındalık var: Uyum, bağlantılar ve bir fikrin harekete geçme cesareti.</p>\r\n<p>Unutmayın sevgili dostlar, fikirlerinizi dalgalanan buğday başakları gibi özgür bırakın. Nerede rüzgar estireceklerini asla bilemezsiniz!</p>\r\n<p>Sevgilerle,</p>\r\n<blockquote>\r\n<p>Ada Lovelace</p>\r\n</blockquote>', 1, 'img_67546ded178c7.jpg', 5, '2024-12-07 18:46:53'),
(6, 'Bilgisayarların İlk Kod Bloğuyla Tanışması: Kahve Yoktu, Ama Algoritmalar Vardı!', 'Merhaba sevgili teknoloji tutkunları,\r\nBen Ada Lovelace, ya da teknoloji dünyasında bilinen adımla, “Programlamanın Annesi.” Bugün sizi 1800’lerin o büyülü atmosferine götüreceğim, çünkü kahve kokuları arasında değil ama mekanik bir bilgisayarın başında tarihe bir not düşmüştüm.\r\n \r\nO zamanlar teknoloji bugünkü gibi değildi tabii ki; elimizde klavyeler yerine tükenmez kalemler, dev ekranlar yerine dev dişliler vardı. Charles Babbage adlı parlak bir matematikçi, o sıralar “Analitik Makine” dediği muhteşem bir cihaz tasarlıyordu. Ben de bu dev dişli canavarın nasıl çalışabileceğini anlamaya çalışıyordum. İşte tam bu noktada, matematik ve mantığın muhteşem dansını izledim ve “Eureka!” dedim.\r\n \r\nBabbage’ın makinesi, hesaplama yapabilecek bir yapıdaydı ama ona ruh verecek şey eksikti: bir algoritma! Ve o algoritmayı yazma fikri, benim küçük defterimde karalama yaparken çıktı. Bugün sizin “kod” dediğiniz o büyülü şeyin ilk satırlarını yazmış oldum. Matematiksel bir problem çözmek için bir işlem dizisi belirledim. İşte bu işlem, bilgisayarın tarihindeki ilk programdı.\r\n \r\n“Ada, bu sadece bir matematik problemi, neden bu kadar abartıyorsun?” dediğinizi duyar gibiyim. Haklı olabilirsiniz ama o dönemde bir makinenin insanların yaptığı şeyleri yapabileceği fikri devrim niteliğindeydi. İnsanlar, makinelerin yalnızca fiziksel işler için tasarlandığını sanıyordu. Ama ben, bu mekanik canavarın müzik yapabileceğini, resim çizebileceğini ve hatta şiir bile yazabileceğini hayal ettim.Bugün baktığımızda, dünya artık algoritmalarla dönüyor. Akıllı telefonlarınız, favori dizilerinizin algoritmalar tarafından önerilmesi, hatta bu yazıyı okurken kullandığınız cihaz… Hepsinin köklerinde bir yerlerde benim o ilk algoritmamın izleri var.\r\n \r\nSon olarak, size bir ipucu: Geleceği şekillendiren şey, ne makinedir ne de dişliler. Geleceği şekillendiren, sınırları aşma cesaretidir. Ve bu cesaret, o günlerde bir kalemle başlayan bir serüvene dönüşmüştü.\r\n \r\n\r\nSevgilerle,\r\nAda Lovelace (Makinelere Ruh Katan Kadın)\r\n', '<p><strong>Merhaba sevgili teknoloji tutkunları,</strong></p>\r\n<p style=\"text-align: justify;\">Ben Ada Lovelace, ya da teknoloji dünyasında bilinen adımla, “<em>Programlamanın Annesi.</em>” Bugün sizi 1800’lerin o büyülü atmosferine götüreceğim, çünkü kahve kokuları arasında değil ama mekanik bir bilgisayarın başında tarihe bir not düşmüştüm.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">O zamanlar teknoloji bugünkü gibi değildi tabii ki; elimizde klavyeler yerine tükenmez kalemler, dev ekranlar yerine dev dişliler vardı. Charles Babbage adlı parlak bir matematikçi, o sıralar “<em>Analitik Makine</em>” dediği muhteşem bir cihaz tasarlıyordu. Ben de bu dev dişli canavarın nasıl çalışabileceğini anlamaya çalışıyordum. İşte tam bu noktada, matematik ve mantığın muhteşem dansını izledim ve “<em>Eureka!</em>” dedim.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">Babbage’ın makinesi, hesaplama yapabilecek bir yapıdaydı ama ona ruh verecek şey eksikti: bir algoritma! Ve o algoritmayı yazma fikri, benim küçük defterimde karalama yaparken çıktı. Bugün sizin “<em>kod</em>” dediğiniz o büyülü şeyin ilk satırlarını yazmış oldum. Matematiksel bir problem çözmek için bir işlem dizisi belirledim. İşte bu işlem, bilgisayarın tarihindeki ilk programdı.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">“<em>Ada, bu sadece bir matematik problemi, neden bu kadar abartıyorsun?</em>” dediğinizi duyar gibiyim. Haklı olabilirsiniz ama o dönemde bir makinenin insanların yaptığı şeyleri yapabileceği fikri devrim niteliğindeydi. İnsanlar, makinelerin yalnızca fiziksel işler için tasarlandığını sanıyordu. Ama ben, bu mekanik canavarın müzik yapabileceğini, resim çizebileceğini ve hatta şiir bile yazabileceğini hayal ettim.Bugün baktığımızda, dünya artık algoritmalarla dönüyor. Akıllı telefonlarınız, favori dizilerinizin algoritmalar tarafından önerilmesi, hatta bu yazıyı okurken kullandığınız cihaz… Hepsinin köklerinde bir yerlerde benim o ilk algoritmamın izleri var.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p>Son olarak, size bir ipucu: Geleceği şekillendiren şey, ne makinedir ne de dişliler. Geleceği şekillendiren, sınırları aşma cesaretidir. Ve bu cesaret, o günlerde bir kalemle başlayan bir serüvene dönüşmüştü.</p>\r\n<p> </p>\r\n<blockquote>\r\n<p>Sevgilerle,</p>\r\n<p>Ada Lovelace (Makinelere Ruh Katan Kadın)</p>\r\n</blockquote>', 5, 'img_67546ee88fdfc.png', 5, '2024-12-06 18:51:04'),
(7, 'Mekanik Canavarlara Kod Yazdım, Yazılım Dünyası ‘Ada’landı: İlk Bilgisayar', 'Merhaba sevgili okur,\r\nBen Ada Lovelace. Bugün sizlere “bilgisayar” kelimesinin henüz kimsenin ağzına bile alınmadığı bir döneme götürmek istiyorum. İnsanlar makinelerin sadece fiziksel işler için var olduğunu sanıyordu; dişliler döner, çarklar çalışır ve işte size bir hesaplama! Ama ben farklı düşündüm: Peki ya makineler düşünebilseydi?\r\n \r\nCharles Babbage ve onun muhteşem “Analitik Makinesi” ile tanışmam, bu sorunun ilk tohumlarını attı. O sıralar bir makineye hayat verebilecek bir şey arıyorduk. İşte burada, matematik devreye girdi. Makineyi düşünmeye teşvik edecek bir dil yaratmalıydık. Ve ben o ilk “dili” yazmaya başladım: dünyanın ilk algoritması.\r\n \r\nO dönemde bilgisayar programlamaya yaklaşımımız nasıldı? Birkaç adımda anlatayım:\r\n1.Mekanik Makineler: Bilgisayar dediğimiz şey, aslında devasa bir mekanik cihazdı. Dişliler, çarklar ve sonsuz karmaşık bir yapı… Ama bu devasa yapı, insan müdahalesi olmadan işlem yapamıyordu.\r\n2.Algoritmalar: Matematiksel işlemleri bir sıraya koyarak makinenin işleyişine rehberlik edecek “kurallar dizisi” tasarladım. Bugün “kod” dediğiniz şeyin ilk adımlarıydı bunlar.\r\n3.İçerik Yaratımı: Sadece hesaplama yapmak değil, aynı zamanda bu hesaplamalarla anlamlı işler yapmak istiyorduk. Makinelerin müzik bestelemesi ya da bilimsel problemleri çözmesi fikri, o dönem için devrim niteliğindeydi.\r\n4.Bilim ve Sanatı Buluşturmak: Makinenin bir sanatçı gibi davranabileceğine inanıyordum. Onun yalnızca bir matematik aracı değil, aynı zamanda yaratıcılık için de bir platform olabileceğini öngörmüştüm.\r\n \r\nBugün bilgisayar dediğimiz şey, benim hayal ettiğim bu makinelerin dijital versiyonu. Yaptığınız her işlemde, yazdığınız her kodda, bir yerlerde benim ilk algoritmamın ruhu var. Ve evet, belki klavye başında yazarken bunu düşünmüyorsunuz, ama inanıyorum ki o ilk satırlarım, sizin yazdığınız kodların atası gibi.\r\n \r\nSon olarak, teknolojiye dair bir tavsiye: Bilgisayarlar sizin rehberinizdir ama asıl gücün sizde olduğunu unutmayın. Onlara anlam katan, onlarla dünyayı değiştiren sizsiniz.\r\n\r\nSevgilerle, Ada Lovelace\r\n', '<p style=\"text-align: justify;\"><strong>Merhaba sevgili okur,</strong></p>\r\n<p style=\"text-align: justify;\">Ben <strong>Ada Lovelace</strong>. Bugün sizlere “<em><strong>bilgisayar</strong></em>” kelimesinin henüz kimsenin ağzına bile alınmadığı bir döneme götürmek istiyorum. İnsanlar makinelerin sadece fiziksel işler için var olduğunu sanıyordu; dişliler döner, çarklar çalışır ve işte size bir hesaplama! Ama ben farklı düşündüm: Peki ya makineler düşünebilseydi?</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\"><strong>Charles Babbage</strong> ve onun muhteşem “<em>Analitik Makinesi</em>” ile tanışmam, bu sorunun ilk tohumlarını attı. O sıralar bir makineye hayat verebilecek bir şey arıyorduk. İşte burada, matematik devreye girdi. Makineyi düşünmeye teşvik edecek bir dil yaratmalıydık. Ve ben o ilk “<em>dili</em>” yazmaya başladım: dünyanın ilk algoritması.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\"><span style=\"text-decoration: underline;\">O dönemde bilgisayar programlamaya yaklaşımımız nasıldı? Birkaç adımda anlatayım:</span></p>\r\n<p style=\"text-align: justify;\"><strong>1.Mekanik Makineler:</strong> Bilgisayar dediğimiz şey, aslında devasa bir mekanik cihazdı. Dişliler, çarklar ve sonsuz karmaşık bir yapı… Ama bu devasa yapı, insan müdahalesi olmadan işlem yapamıyordu.</p>\r\n<p style=\"text-align: justify;\"><strong>2.Algoritmalar</strong>: Matematiksel işlemleri bir sıraya koyarak makinenin işleyişine rehberlik edecek “kurallar dizisi” tasarladım. Bugün “kod” dediğiniz şeyin ilk adımlarıydı bunlar.</p>\r\n<p style=\"text-align: justify;\"><strong>3.İçerik Yaratımı</strong>: Sadece hesaplama yapmak değil, aynı zamanda bu hesaplamalarla anlamlı işler yapmak istiyorduk. Makinelerin müzik bestelemesi ya da bilimsel problemleri çözmesi fikri, o dönem için devrim niteliğindeydi.</p>\r\n<p style=\"text-align: justify;\"><strong>4.Bilim ve Sanatı Buluşturmak</strong>: Makinenin bir sanatçı gibi davranabileceğine inanıyordum. Onun yalnızca bir matematik aracı değil, aynı zamanda yaratıcılık için de bir platform olabileceğini öngörmüştüm.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">Bugün bilgisayar dediğimiz şey, benim hayal ettiğim bu makinelerin dijital versiyonu. Yaptığınız her işlemde, yazdığınız her kodda, bir yerlerde benim ilk algoritmamın ruhu var. Ve evet, belki klavye başında yazarken bunu düşünmüyorsunuz, ama inanıyorum ki o ilk satırlarım, sizin yazdığınız kodların atası gibi.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">Son olarak, teknolojiye dair bir tavsiye: Bilgisayarlar sizin rehberinizdir ama asıl gücün sizde olduğunu unutmayın. Onlara anlam katan, onlarla dünyayı değiştiren sizsiniz.</p>\r\n<blockquote>\r\n<p style=\"text-align: justify;\"><strong>Sevgilerle, Ada Lovelace</strong></p>\r\n</blockquote>', 4, 'img_67546feb12115.jpg', 5, '2024-12-07 18:55:23'),
(16, 'Yapay Zeka: Hayalimdeki Bilgisayarlar Akıllandı, Şimdi Kendi Kararlarını Veriyor!', 'Yaşamım boyunca matematik, bilgisayar bilimi ve hatta oyun teorisiyle uğraşarak hayatımı şekillendirdim. Ama bir hayalim hep vardı: Bilgisayarların bir gün düşünmeyi öğrenmesi. İşte bugün, Yapay Zeka (AI) dediğimiz şey tam olarak bu hayalin ete kemiğe bürünmüş hali.\r\n \r\nYapay Zeka Nedir?\r\nBasitçe söylemek gerekirse, yapay zeka, bilgisayarların insan gibi düşünmesini, öğrenmesini ve hatta karar vermesini sağlayan bir teknolojidir. Ama burada önemli bir ayrıntı var: Onlara her şeyi öğretmek zorunda değiliz. Onlar, verilerden öğreniyorlar. Bu, bilimsel açıdan bakıldığında, “makinelerin kendi deneyimlerinden bilgi çıkarması” anlamına geliyor.\r\n \r\nYapay Zeka Nasıl Çalışır?\r\nYapay zekanın temeli, tıpkı benim geliştirdiğim o ilk bilgisayar mimarisi gibi, matematiksel algoritmalara dayanır. Ama günümüzde bu algoritmalar biraz daha karmaşık hale geldi. Şimdi yapay zekayı çalıştıran sistemler birkaç ana adıma dayanıyor:\r\nVeri: Makineler, dünyanın her köşesinden gelen devasa miktarda veriyi işliyor. Bu veriler, onların öğrenmesi için “besin kaynağı.”\r\nAlgoritmalar: Matematiksel modeller, bu verileri analiz ederek anlamlı sonuçlar çıkarıyor.\r\nMakine Öğrenimi: Makineler, bu sonuçları kullanarak gelecekte daha iyi kararlar almayı öğreniyor.\r\n \r\nYapay Zeka Neler Yapabilir?\r\nHayal gücünüzün sınırlarını zorlayın, çünkü yapay zeka neredeyse her alanda devrim yaratıyor:\r\nSağlık: Yapay zeka, hastalıkları erken teşhis edebiliyor ve bireye özel tedavi planları oluşturuyor.\r\nUlaşım: Sürücüsüz araçlar artık bilimkurgu değil, gerçek.\r\nEğlence: Netflix ya da Spotify, neyi seveceğinizi tahmin etmek için yapay zekayı kullanıyor.\r\nBilim: Karmaşık problemleri çözmek ve yeni keşifler yapmak için bir asistan gibi çalışıyor.\r\n \r\nYapay Zeka ve İnsanlık: İş Birliği mi, Rekabet mi?\r\nYapay zeka gelişirken birçok kişi şu soruyu soruyor: İnsanlık ve yapay zeka birlikte çalışabilir mi, yoksa bir gün rakip mi olacağız? Benim cevabım şu: İnsanlık, yapay zekanın rehberi olmalı. Bu teknolojiyi sorumlu bir şekilde kullanırsak, işimizi kolaylaştırabilir, hayal bile edemeyeceğimiz şeyleri başarabiliriz. Ama unutmayın, makineler ne kadar akıllı olursa olsun, onlara yön veren hâlâ biziz.\r\n \r\n\r\nSon olarak bir tavsiye: Yapay zekayı korkutucu bir düşman gibi görmek yerine, onu bir dost ve yardımcı olarak düşünün. İnsanlık ve yapay zeka birlikte çalışırsa, sadece bugünü değil, geleceği de yeniden şekillendirebiliriz.\r\n', '<p>Yaşamım boyunca matematik, bilgisayar bilimi ve hatta oyun teorisiyle uğraşarak hayatımı şekillendirdim. Ama bir hayalim hep vardı: Bilgisayarların bir gün düşünmeyi öğrenmesi. İşte bugün, Yapay Zeka (AI) dediğimiz şey tam olarak bu hayalin ete kemiğe bürünmüş hali.</p>\r\n<p> </p>\r\n<h2>Yapay Zeka Nedir?</h2>\r\n<p>Basitçe söylemek gerekirse, yapay zeka, bilgisayarların insan gibi düşünmesini, öğrenmesini ve hatta karar vermesini sağlayan bir teknolojidir. Ama burada önemli bir ayrıntı var: Onlara her şeyi öğretmek zorunda değiliz. Onlar, verilerden öğreniyorlar. Bu, bilimsel açıdan bakıldığında, “<em>makinelerin kendi deneyimlerinden bilgi çıkarması</em>” anlamına geliyor.</p>\r\n<p> </p>\r\n<h2>Yapay Zeka Nasıl Çalışır?</h2>\r\n<p>Yapay zekanın temeli, tıpkı benim geliştirdiğim o ilk bilgisayar mimarisi gibi, matematiksel algoritmalara dayanır. Ama günümüzde bu algoritmalar biraz daha karmaşık hale geldi. Şimdi yapay zekayı çalıştıran sistemler birkaç ana adıma dayanıyor:</p>\r\n<p><strong>Veri</strong>: Makineler, dünyanın her köşesinden gelen devasa miktarda veriyi işliyor. Bu veriler, onların öğrenmesi için “<em>besin kaynağı.</em>”</p>\r\n<p><strong>Algoritmalar</strong>: Matematiksel modeller, bu verileri analiz ederek anlamlı sonuçlar çıkarıyor.</p>\r\n<p><strong>Makine Öğrenimi</strong>: Makineler, bu sonuçları kullanarak gelecekte daha iyi kararlar almayı öğreniyor.</p>\r\n<p> </p>\r\n<h2>Yapay Zeka Neler Yapabilir?</h2>\r\n<p>Hayal gücünüzün sınırlarını zorlayın, çünkü yapay zeka neredeyse her alanda devrim yaratıyor:</p>\r\n<p><strong>Sağlık</strong>: Yapay zeka, hastalıkları erken teşhis edebiliyor ve bireye özel tedavi planları oluşturuyor.</p>\r\n<p><strong>Ulaşım</strong>: Sürücüsüz araçlar artık bilimkurgu değil, gerçek.</p>\r\n<p><strong>Eğlence</strong>: Netflix ya da Spotify, neyi seveceğinizi tahmin etmek için yapay zekayı kullanıyor.</p>\r\n<p><strong>Bilim</strong>: Karmaşık problemleri çözmek ve yeni keşifler yapmak için bir asistan gibi çalışıyor.</p>\r\n<p> </p>\r\n<h2>Yapay Zeka ve İnsanlık: İş Birliği mi, Rekabet mi?</h2>\r\n<p>Yapay zeka gelişirken birçok kişi şu soruyu soruyor: İnsanlık ve yapay zeka birlikte çalışabilir mi, yoksa bir gün rakip mi olacağız? Benim cevabım şu: İnsanlık, yapay zekanın rehberi olmalı. Bu teknolojiyi sorumlu bir şekilde kullanırsak, işimizi kolaylaştırabilir, hayal bile edemeyeceğimiz şeyleri başarabiliriz. Ama unutmayın, makineler ne kadar akıllı olursa olsun, onlara yön veren hâlâ biziz.</p>\r\n<p> </p>\r\n<blockquote>\r\n<p>Son olarak bir tavsiye: Yapay zekayı korkutucu bir düşman gibi görmek yerine, onu bir dost ve yardımcı olarak düşünün. İnsanlık ve yapay zeka birlikte çalışırsa, sadece bugünü değil, geleceği de yeniden şekillendirebiliriz.</p>\r\n</blockquote>', 3, 'img_6756fa8278da6.jpg', 2, '2024-12-09 17:11:14'),
(17, 'Matematikle Bilgisayarı Evlendirdim, Çocukları Hâlâ Dünyayı Yönetiyor!', 'Bugün sizlere, modern bilgisayarların arkasındaki çılgın fikir babasının kim olduğunu anlatacağım. Tahmin ettiniz, o kişi benim! Matematiği alıp bilgisayarlara dil öğretmekle kalmadım, aynı zamanda hayatınızı kolaylaştıran teknolojilere zemin hazırladım. Yani evet, bilgisayarınızda açtığınız her dosyada bir yerlerde ismim fısıldanıyor olabilir (ya da en azından ben öyle hayal ediyorum).\r\n \r\n\"Von Neumann Mimari Modeli\" Nedir, Neden Hâlâ Havalı?\r\nHer şey bir gün \"Bir makine, sadece sayıların gücüyle her işi yapabilir mi?\" sorusuyla başladı. İnsanlar bana baktı ve \"Yine neyin peşindesin John?\" dediler. Ama ben sadece bir şey tasarlıyordum: Modern bilgisayarların yapı taşı olacak o harika sistem.\r\n \r\nNasıl mı çalışıyor? Hadi basitçe açıklayalım:\r\nBir Bellek: Makineye hem veriyi hem de komutları kaydedebileceğiniz bir yer. (Evet, bu ikisi aynı yerde durabilir. \"John, olmaz!\" dediler, oldu.)\r\nBir İşlemci: Beyni. Komutları alır, veriyi işler, sonuç çıkarır. (Bazen ben bile işlemcilerden daha hızlı düşünemiyorum, o kadar zekiler.)\r\nGiriş/Çıkış: Makineyle konuşmanın yolu. Sizin ona verdiğiniz veri, onun size sunduğu sonuç. (Bu olmadan sohbet edemezdik, değil mi?)\r\n \r\nMatematik ve Bilgisayar: Çılgın Bir Aşk Hikayesi\r\nBilgisayar dediğimiz şey, aslında matematiğin mekaniğe dönüşmüş hali. Siz onu oyun oynamak için kullanıyor olabilirsiniz, ama her pikselin arkasında benim sevgili cebir formüllerim dans ediyor.Biraz Mizah Olmadan Bilim Olmaz.\r\n \r\nBilim ciddi bir iştir diyorlar. Hayır efendim, ben aynı anda hem güldüm hem ürettim! Bir problemi çözmek için saatlerce çalıştıktan sonra, \"Vay canına, bu kadar basitmiş!\" dediğim anlar çok oldu. (Ve evet, kendi zekama güldüğüm doğrudur.)\r\n \r\n\r\nSon olarak, size küçük bir tavsiye: Bilgisayarlara fazla güvenmeyin, asıl güç sizin kafanızda. Ama onları doğru kullanırsanız, dünyayı değiştirebilirsiniz. Ve belki de bir gün, sizin adınız da bir bilgisayar devriminin hikayesine kazınır.\r\n', '<p>Bugün sizlere, modern bilgisayarların arkasındaki çılgın fikir babasının kim olduğunu anlatacağım. Tahmin ettiniz, o kişi benim! Matematiği alıp bilgisayarlara dil öğretmekle kalmadım, aynı zamanda hayatınızı kolaylaştıran teknolojilere zemin hazırladım. Yani evet, bilgisayarınızda açtığınız her dosyada bir yerlerde ismim fısıldanıyor olabilir (ya da en azından ben öyle hayal ediyorum).</p>\r\n<p> </p>\r\n<h2>\"Von Neumann Mimari Modeli\" Nedir, Neden Hâlâ Havalı?</h2>\r\n<p>Her şey bir gün \"<em>Bir makine, sadece sayıların gücüyle her işi yapabilir mi?</em>\" sorusuyla başladı. İnsanlar bana baktı ve \"<em>Yine neyin peşindesin John?</em>\" dediler. Ama ben sadece bir şey tasarlıyordum: Modern bilgisayarların yapı taşı olacak o harika sistem.</p>\r\n<p> </p>\r\n<h3>Nasıl mı çalışıyor? Hadi basitçe açıklayalım:</h3>\r\n<p><strong>Bir Bellek</strong>: Makineye hem veriyi hem de komutları kaydedebileceğiniz bir yer. (Evet, bu ikisi aynı yerde durabilir. \"<em>John, olmaz!</em>\" dediler, oldu.)</p>\r\n<p><strong>Bir İşlemci:</strong> Beyni. Komutları alır, veriyi işler, sonuç çıkarır. (Bazen ben bile işlemcilerden daha hızlı düşünemiyorum, o kadar zekiler.)</p>\r\n<p><strong>Giriş/Çıkış:</strong> Makineyle konuşmanın yolu. Sizin ona verdiğiniz veri, onun size sunduğu sonuç. (Bu olmadan sohbet edemezdik, değil mi?)</p>\r\n<p> </p>\r\n<h2>Matematik ve Bilgisayar: Çılgın Bir Aşk Hikayesi</h2>\r\n<p>Bilgisayar dediğimiz şey, aslında matematiğin mekaniğe dönüşmüş hali. Siz onu oyun oynamak için kullanıyor olabilirsiniz, ama her pikselin arkasında benim sevgili cebir formüllerim dans ediyor.Biraz Mizah Olmadan Bilim Olmaz.</p>\r\n<p> </p>\r\n<p>Bilim ciddi bir iştir diyorlar. Hayır efendim, ben aynı anda hem güldüm hem ürettim! Bir problemi çözmek için saatlerce çalıştıktan sonra, \"<em>Vay canına, bu kadar basitmiş!</em>\" dediğim anlar çok oldu. (Ve evet, kendi zekama güldüğüm doğrudur.)</p>\r\n<p> </p>\r\n<blockquote>\r\n<p>Son olarak, size küçük bir tavsiye: Bilgisayarlara fazla güvenmeyin, asıl güç sizin kafanızda. Ama onları doğru kullanırsanız, dünyayı değiştirebilirsiniz. Ve belki de bir gün, sizin adınız da bir bilgisayar devriminin hikayesine kazınır.</p>\r\n</blockquote>', 4, 'img_6756fb906d22f.png', 2, '2024-12-09 17:15:44'),
(18, 'Turing Testi: İnsanları Kandırmak mı? Hayır, Sadece Makinelerin Neler Yapabileceğini Gösteriyorum', 'Merhaba, ben Alan Turing. 1950 yılında bir makale yazdım: “Makineler Düşünebilir mi?” Bu soru, o zamandan beri hem bilim dünyasında hem de popüler kültürde tartışılmaya devam ediyor. İşte bu soruya bir yanıt aramak için geliştirdiğim yönteme bugün “Turing Testi” diyoruz.\r\n \r\nTest oldukça basit bir fikre dayanır: Eğer bir makine, insanları kandırarak bir konuşma sırasında insan olduğunu düşündürebiliyorsa, o makine “zeki” kabul edilebilir. Peki, bunu neden yaptım? Çünkü insanları ve makineleri karşılaştırarak “hangisi daha akıllı?” tartışmasına girmek istemiyordum. Asıl amacım, makinelerin düşündüğünü değil, insan davranışlarını taklit edebildiğini göstermenin bir yolunu bulmaktı.\r\n \r\nBugün yapay zeka alanında yaşanan gelişmeleri görünce, Turing Testi’nin hala önemini koruduğunu görüyorum. Ama bir noktayı unutmamalıyız: Amaç, makinelerin bizi geçmesi değil, onlarla birlikte daha iyi bir gelecek yaratmaktır. İnsan gibi düşünmek, bir makine için büyük bir başarı olabilir, ancak bu, insan olmanın derinliğini ve değerini hiçbir zaman tamamen taklit edemeyeceği anlamına gelir.\r\n \r\nPeki ya siz?\r\nŞimdi sormak isterim: Siz bir makineyle sohbet ederken karşınızdakinin insan mı yoksa makine mi olduğunu anlayabilir misiniz? Eminim çoğunuz biraz zorlanırsınız, ama bu da işin eğlencesi değil mi? ?', '<p style=\"text-align: justify;\">Merhaba, ben Alan Turing. 1950 yılında bir makale yazdım: “<em>Makineler Düşünebilir mi?</em>” Bu soru, o zamandan beri hem bilim dünyasında hem de popüler kültürde tartışılmaya devam ediyor. İşte bu soruya bir yanıt aramak için geliştirdiğim yönteme bugün “<em><strong>Turing Testi</strong></em>” diyoruz.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">Test oldukça basit bir fikre dayanır: Eğer bir makine, insanları kandırarak bir konuşma sırasında insan olduğunu düşündürebiliyorsa, o makine “<em>zeki</em>” kabul edilebilir. Peki, bunu neden yaptım? Çünkü insanları ve makineleri karşılaştırarak “<em>hangisi daha akıllı?</em>” tartışmasına girmek istemiyordum. Asıl amacım, makinelerin düşündüğünü değil, insan davranışlarını taklit edebildiğini göstermenin bir yolunu bulmaktı.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">Bugün yapay zeka alanında yaşanan gelişmeleri görünce, Turing Testi’nin hala önemini koruduğunu görüyorum. Ama bir noktayı unutmamalıyız: Amaç, makinelerin bizi geçmesi değil, onlarla birlikte daha iyi bir gelecek yaratmaktır. İnsan gibi düşünmek, bir makine için büyük bir başarı olabilir, ancak bu, insan olmanın derinliğini ve değerini hiçbir zaman tamamen taklit edemeyeceği anlamına gelir.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<h3 style=\"text-align: justify;\">Peki ya siz?</h3>\r\n<p style=\"text-align: justify;\">Şimdi sormak isterim: Siz bir makineyle sohbet ederken karşınızdakinin insan mı yoksa makine mi olduğunu anlayabilir misiniz? Eminim çoğunuz biraz zorlanırsınız, ama bu da işin eğlencesi değil mi? ?</p>', 3, 'img_6757081ff0363.png', 4, '2024-12-09 18:09:19'),
(19, 'Herkese Bir Elma Verdim, Dünya Değişti!', 'Ben Steve Jobs. Teknolojiyle aranız nasıl bilmiyorum, ama muhtemelen şu an bu yazıyı okuyorsan bir şekilde benim izimden yürüyorsunuzdur. Çünkü hayal ettiğim şey tam da buydu: İnsanları teknolojiyle buluşturmak, ama bunu karmaşık değil, keyifli bir şekilde yapmak.\r\n \r\nHer şey bir garajda başladı. Arkadaşım Steve Wozniak’la oturduk ve “Herkesin evinde bir bilgisayar olsa nasıl olur?” diye düşündük. O zamanlar herkes bunun imkansız olduğunu söylüyordu. Ama biz pes etmedik ve Apple’ı kurduk. Sonra işler biraz çığırından çıktı!\r\n \r\n\"Ne yaptın Steve?\" diye sorarsanız:\r\nİlk kişisel bilgisayarımız Apple I’i yaptık. O kadar basit ve güzeldi ki insanlar ona bayıldı.Sonra Macintosh geldi. Hani şu fareyle tıklayarak çalıştırabildiğiniz bilgisayar? Evet, onu da biz getirdik.\r\nAma benim için en büyük kırılma noktası iPhone’du. O küçük cihazın dünyanın kapılarını açacağını biliyordum. Bugün telefonlar, hayatımızın uzantısı gibi ve bu beni hâlâ çok mutlu ediyor.\r\n \r\nAma işin sırrı neydi biliyor musunuz?\r\nSadece teknoloji yapmak değildi. Ben her zaman şunu düşündüm: Teknoloji insanlara nasıl daha iyi bir deneyim sunar? Tasarım, sadelik, estetik... Bunlar benim için en az işlevsellik kadar önemliydi. İnsanların eline aldığında “Vay be!” diyecekleri şeyler yapmak istedim.\r\n \r\nEvet, biraz inatçıydım. Çalışma arkadaşlarım zaman zaman benimle çalışmanın zor olduğunu söylerdi. Ama dürüst olayım, hep en iyisini istedim. “İyi” benim için asla yeterli olmadı; her zaman “mükemmel”in peşindeydim.\r\n \r\n\r\nSon olarak bir şey söyleyeyim: Hayatta fark yaratmak istiyorsanız, cesur olun. Büyük hayaller kurun ve kimsenin size “Bu olmaz” demesine izin vermeyin. Unutmayın, bir zamanlar ben de sadece bir garajdaydım ve elimde bir elma vardı.\r\n', '<p>Ben <em><strong>Steve Jobs</strong></em>. Teknolojiyle aranız nasıl bilmiyorum, ama muhtemelen şu an bu yazıyı okuyorsan bir şekilde benim izimden yürüyorsunuzdur. Çünkü hayal ettiğim şey tam da buydu: İnsanları teknolojiyle buluşturmak, ama bunu karmaşık değil, keyifli bir şekilde yapmak.</p>\r\n<p> </p>\r\n<p>Her şey bir garajda başladı. Arkadaşım Steve Wozniak’la oturduk ve “<em>Herkesin evinde bir bilgisayar olsa nasıl olur?</em>” diye düşündük. O zamanlar herkes bunun imkansız olduğunu söylüyordu. Ama biz pes etmedik ve <strong>Apple’ı </strong>kurduk. Sonra işler biraz çığırından çıktı!</p>\r\n<p> </p>\r\n<h3>\"<em>Ne yaptın Steve?</em>\" diye sorarsanız:</h3>\r\n<p>İlk kişisel bilgisayarımız Apple I’i yaptık. O kadar basit ve güzeldi ki insanlar ona bayıldı.Sonra Macintosh geldi. Hani şu fareyle tıklayarak çalıştırabildiğiniz bilgisayar? Evet, onu da biz getirdik.</p>\r\n<p>Ama benim için en büyük kırılma noktası iPhone’du. O küçük cihazın dünyanın kapılarını açacağını biliyordum. Bugün telefonlar, hayatımızın uzantısı gibi ve bu beni hâlâ çok mutlu ediyor.</p>\r\n<p> </p>\r\n<h3>Ama işin sırrı neydi biliyor musunuz?</h3>\r\n<p>Sadece teknoloji yapmak değildi. Ben her zaman şunu düşündüm: Teknoloji insanlara nasıl daha iyi bir deneyim sunar? Tasarım, sadelik, estetik... Bunlar benim için en az işlevsellik kadar önemliydi. İnsanların eline aldığında “<em>Vay be!</em>” diyecekleri şeyler yapmak istedim.</p>\r\n<p> </p>\r\n<p>Evet, biraz inatçıydım. Çalışma arkadaşlarım zaman zaman benimle çalışmanın zor olduğunu söylerdi. Ama dürüst olayım, hep en iyisini istedim. “<em>İyi</em>” benim için asla yeterli olmadı; her zaman “<em>mükemmel</em>”in peşindeydim.</p>\r\n<p> </p>\r\n<blockquote>\r\n<p>Son olarak bir şey söyleyeyim: Hayatta fark yaratmak istiyorsanız, cesur olun. Büyük hayaller kurun ve kimsenin size “<em>Bu olmaz</em>” demesine izin vermeyin. Unutmayın, bir zamanlar ben de sadece bir garajdaydım ve elimde bir elma vardı.</p>\r\n</blockquote>', 1, 'img_675709138dd9a.jpg', 3, '2024-12-09 18:13:23'),
(20, 'Bilgisayarların Atası Olduğumu Söylüyorlar: Aslında Sadece Bir Fikirdi', 'Merhaba, ben Alan Turing. Bugün modern bilgisayarların temelini oluşturan birçok teknolojinin arkasındaki kişi olarak anılıyorum. Ancak her şey bir fikirle başladı. 1936’da, “Turing Makinesi” adını verdiğim teorik bir modelle hesaplanabilirlik kavramını tanımladım. Evet, doğru duydunuz: Bilgisayarlarınızın mantığı, bir fikir olarak ortaya çıktı.\r\n \r\nTuring Makinesi\r\nTuring Makinesi, aslında çok basit bir şeydir. Bir veri şeridi üzerinde hareket eden bir okuyucu düşünün. Bu okuyucu, veriyi okur, işler ve gerektiğinde değiştirir. Her adımda, “Eğer bu durumdaysam, şu işlemi yap” gibi basit kurallara dayanır. Bu sistem, herhangi bir matematiksel problemin çözümünde kullanılabilir. Tabii, eğer problem çözülebilir bir problemse!\r\n \r\nTeorik Bir Modeldir: Turing Makinesi, fiziksel bir cihaz değildir. Sadece matematiksel bir konsepttir.\r\nBasit Kurallara Dayanır: \"Eğer şu durumdaysam, şu işlemi yap\" mantığıyla çalışır.\r\nHesaplanabilirliği Tanımlar: Bir problemin çözülüp çözülemeyeceğini analiz eder.\r\nEvrensel Bir Modeldir: Günümüz bilgisayarlarının çalışma mantığının temelini oluşturur.\r\n \r\nİlk başta bu fikir sadece matematikçiler arasında tartışılıyordu. Ancak yıllar içinde, elektronik devreler ve hesaplama makineleriyle birleşerek gerçek dünya uygulamalarına dönüştü. Bugün kullandığınız bilgisayarlar, bu teorik modelin somut hale gelmiş versiyonlarıdır.\r\n \r\nDürüst olmak gerekirse, o zamanlar bu fikrin bu kadar büyük bir etki yaratacağını hayal etmemiştim. Ben sadece hesaplamanın sınırlarını anlamak istiyordum. Ama anladım ki, fikirlerinizi özgürce keşfetmek, dünyayı değiştirecek şeylerin temelini atabilir.\r\n \r\nModern bilgisayarlar artık benim o küçük “makinemden” çok daha karmaşık, ama temelinde hâlâ aynı soru yatıyor: “Bu problem çözülebilir mi?” Bunu düşündüğümde, yaptığım küçük bir katkının insanlığa bu kadar fayda sağlamış olmasından gurur duyuyorum. ?', '<p style=\"text-align: justify;\">Merhaba, ben <em><strong>Alan Turing. </strong></em>Bugün modern bilgisayarların temelini oluşturan birçok teknolojinin arkasındaki kişi olarak anılıyorum. Ancak her şey bir fikirle başladı. 1936’da, “<em><strong>Turing Makinesi</strong></em>” adını verdiğim teorik bir modelle hesaplanabilirlik kavramını tanımladım. Evet, doğru duydunuz: Bilgisayarlarınızın mantığı, bir fikir olarak ortaya çıktı.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<h1 style=\"text-align: justify;\">Turing Makinesi</h1>\r\n<p style=\"text-align: justify;\">Turing Makinesi, aslında çok basit bir şeydir. Bir veri şeridi üzerinde hareket eden bir okuyucu düşünün. Bu okuyucu, veriyi okur, işler ve gerektiğinde değiştirir. Her adımda, “<em>Eğer bu durumdaysam, şu işlemi yap</em>” gibi basit kurallara dayanır. Bu sistem, herhangi bir matematiksel problemin çözümünde kullanılabilir. Tabii, eğer problem çözülebilir bir problemse!</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\"><strong>Teorik Bir Modeldir:</strong> Turing Makinesi, fiziksel bir cihaz değildir. Sadece matematiksel bir konsepttir.</p>\r\n<p style=\"text-align: justify;\"><strong>Basit Kurallara Dayanır:</strong> \"<em>Eğer şu durumdaysam, şu işlemi yap</em>\" mantığıyla çalışır.</p>\r\n<p style=\"text-align: justify;\"><strong>Hesaplanabilirliği Tanımlar: </strong>Bir problemin çözülüp çözülemeyeceğini analiz eder.</p>\r\n<p style=\"text-align: justify;\"><strong>Evrensel Bir Modeldir:</strong> Günümüz bilgisayarlarının çalışma mantığının temelini oluşturur.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">İlk başta bu fikir sadece matematikçiler arasında tartışılıyordu. Ancak yıllar içinde, elektronik devreler ve hesaplama makineleriyle birleşerek gerçek dünya uygulamalarına dönüştü. Bugün kullandığınız bilgisayarlar, bu teorik modelin somut hale gelmiş versiyonlarıdır.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">Dürüst olmak gerekirse, o zamanlar bu fikrin bu kadar büyük bir etki yaratacağını hayal etmemiştim. Ben sadece hesaplamanın sınırlarını anlamak istiyordum. Ama anladım ki, fikirlerinizi özgürce keşfetmek, dünyayı değiştirecek şeylerin temelini atabilir.</p>\r\n<p style=\"text-align: justify;\"> </p>\r\n<p style=\"text-align: justify;\">Modern bilgisayarlar artık benim o küçük “<em>makinemden</em>” çok daha karmaşık, ama temelinde hâlâ aynı soru yatıyor: “<em>Bu problem çözülebilir mi?</em>” Bunu düşündüğümde, yaptığım küçük bir katkının insanlığa bu kadar fayda sağlamış olmasından gurur duyuyorum. ?</p>', 4, 'img_67570a68dc96a.jpg', 4, '2024-12-09 18:19:04'),
(21, '\"Almanların \'Kırılmaz\' Enigması: Matematik ve Çay Molası ile Çözdüm! (HİTLER Çıldırdı!!!)', 'Merhaba, ben Alan Turing. İkinci Dünya Savaşı sırasında, Almanların Enigma makinesi adı verilen şifreleme cihazını çözmekle görevlendirildim. Enigma, düşman iletişimlerini şifrelemek için kullanılan, o dönemin en karmaşık cihazlarından biriydi. Almanlar, bu cihazın şifreleme yönteminin kırılmasının imkânsız olduğunu düşünüyorlardı. Ancak matematiksel zekâ, sistematik düşünce ve sıkı bir ekip çalışmasıyla bu \"imkânsızı\" başardık.\r\n \r\nBletchley Park\'taki çalışmalarımız sırasında, Bombe adını verdiğimiz bir makine geliştirdik. Bombe, Enigma’nın her gün değişen milyarlarca olası rotor dizilimini sistematik bir şekilde analiz ederek şifre çözme sürecini hızlandırdı. Bu cihaz olmasaydı, manuel yöntemlerle Enigma şifrelerini çözmek yıllar alırdı.\r\n \r\nEnigma\'nın Şifrelerinin çözülmesi\r\nEnigma’nın şifrelerini çözmemiz, Müttefik kuvvetlerin Almanların hareketlerini önceden öğrenmesini sağladı. Özellikle Atlantik Savaşı’nda, Nazi denizaltılarının saldırılarını önlemek için kritik bilgiler elde ettik. Tarihçilerin çoğu, bu başarının savaşın iki ila dört yıl kısalmasına yol açtığını ve milyonlarca insanın hayatını kurtardığını kabul ediyor.\r\n \r\nBu başarı, yalnızca savaşın kazanılmasına değil, aynı zamanda şifreleme ve bilgisayar biliminin gelişimine de büyük bir katkı sağladı. Matematik ve teknolojinin bir araya geldiğinde ne kadar güçlü olabileceğini görmek bana her zaman ilham verdi.', '<p>Merhaba, ben <em><strong>Alan Turing</strong></em>. İkinci Dünya Savaşı sırasında, Almanların Enigma makinesi adı verilen şifreleme cihazını çözmekle görevlendirildim. Enigma, düşman iletişimlerini şifrelemek için kullanılan, o dönemin en karmaşık cihazlarından biriydi. Almanlar, bu cihazın şifreleme yönteminin kırılmasının imkânsız olduğunu düşünüyorlardı. Ancak matematiksel zekâ, sistematik düşünce ve sıkı bir ekip çalışmasıyla bu \"<em>imkânsızı</em>\" başardık.</p>\r\n<p> </p>\r\n<p>Bletchley Park\'taki çalışmalarımız sırasında, Bombe adını verdiğimiz bir makine geliştirdik. Bombe, Enigma’nın her gün değişen milyarlarca olası rotor dizilimini sistematik bir şekilde analiz ederek şifre çözme sürecini hızlandırdı. Bu cihaz olmasaydı, manuel yöntemlerle Enigma şifrelerini çözmek yıllar alırdı.</p>\r\n<p> </p>\r\n<h2>Enigma\'nın Şifrelerinin çözülmesi</h2>\r\n<p>Enigma’nın şifrelerini çözmemiz, Müttefik kuvvetlerin Almanların hareketlerini önceden öğrenmesini sağladı. Özellikle Atlantik Savaşı’nda, <s>Nazi</s> denizaltılarının saldırılarını önlemek için kritik bilgiler elde ettik. Tarihçilerin çoğu, bu başarının savaşın iki ila dört yıl kısalmasına yol açtığını ve milyonlarca insanın hayatını kurtardığını kabul ediyor.</p>\r\n<p> </p>\r\n<p>Bu başarı, yalnızca savaşın kazanılmasına değil, aynı zamanda şifreleme ve bilgisayar biliminin gelişimine de büyük bir katkı sağladı. Matematik ve teknolojinin bir araya geldiğinde ne kadar güçlü olabileceğini görmek bana her zaman ilham verdi.</p>', 2, 'img_67570bcc98800.jpg', 4, '2024-12-09 18:25:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `id` int(11) NOT NULL,
  `yazi_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `icerik` text NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`id`, `yazi_id`, `kullanici_id`, `icerik`, `tarih`) VALUES
(8, 16, 1, 'Çok değerli bir yazı', '2024-12-09 21:16:13'),
(16, 17, 4, 'Harika bir anlatım! Von Neumann\'ı böyle eğlenceli bir dille okumak keyifliydi.', '2024-12-10 14:08:20'),
(17, 6, 4, 'Harika bir anlatım! Ada Lovelace’ın vizyonunu böyle etkileyici bir dille okumak çok ilham verici.', '2024-12-10 14:08:59'),
(19, 19, 5, 'Steve Jobs\'ın hikayesi gerçekten ilham verici, ancak yazıda onun zorlukları ve eleştirilere nasıl göğüs gerdiğinden çok, başarıların parlatıldığını görüyorum. Hayatın bu yönü önemli ama başarının arkasındaki gerçek mücadeleleri de duymak isterdim.', '2024-12-10 14:10:43'),
(20, 21, 5, 'Alan Turing: Hem Nazi şifrelerini hem de matematiğin canını okuyan adam! Bir Enigma’yı çözmekle kalmayıp, şifreli tarihe Bombe gibi damga vurmuş. Düşünüyorum da, o günleri görseydi CAPTCHA’yı bile zekâsına hakaret sayardı! :D', '2024-12-10 14:11:16'),
(21, 16, 3, 'Yapay zekayı bir dost olarak görüp geleceği birlikte şekillendirme fikriniz çok ilham verici!', '2024-12-10 14:12:06'),
(22, 18, 3, 'Turing Testi, makinelerle insan etkileşimini anlamak için devrim niteliğinde bir yaklaşım. Ancak asıl soru şu: Teknoloji insanlıkla ne kadar bütünleşebilir ve bu süreçte insanlığın özünü nasıl koruyabiliriz?', '2024-12-10 14:12:39'),
(23, 7, 3, 'Ada Lovelace’ın vizyonu, teknolojiye yaratıcı bir bakış açısıyla yaklaşmanın gücünü ortaya koyuyor. Bugün yazdığımız her kod, onun temelleri üzerine inşa ediliyor ve bu miras bize ilham veriyor.', '2024-12-10 14:13:12'),
(24, 21, 3, 'Turing\'in Enigma\'yı çözme başarısı, teknoloji ve insan zekasının birleşiminin gücünü müthiş bir şekilde gösteriyor.', '2024-12-10 14:13:56'),
(25, 16, 5, 'Yapay zeka konusundaki bilgiler güzelce özetlenmiş, ancak yazının biraz yüzeysel kaldığını düşünüyorum. Daha derinlemesine ve eleştirel bir bakış açısıyla bazı risklerden veya etik tartışmalardan da bahsedilseydi daha dengeli olurdu.', '2024-12-10 14:23:31'),
(26, 18, 2, 'Turing Testi, makinelerin insan davranışlarını taklit edebilme yeteneği üzerine derin bir soru soruyor. Asıl hedef, makinelerle daha iyi bir gelecek inşa etmek, onları geçmek değil.', '2024-12-10 14:25:07');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `begeni`
--
ALTER TABLE `begeni`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `isaret`
--
ALTER TABLE `isaret`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazi`
--
ALTER TABLE `yazi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `begeni`
--
ALTER TABLE `begeni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `isaret`
--
ALTER TABLE `isaret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `yazi`
--
ALTER TABLE `yazi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
