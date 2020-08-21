SET NAMES utf8;DROP TABLE IF EXISTS adresler;

CREATE TABLE `adresler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uyeid` int(11) NOT NULL,
  `adres` text COLLATE utf8_turkish_ci NOT NULL,
  `varsayilan` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO adresler VALUES("1",""10",""php sokak. mvc mahallesi. olcay apt. no:55 istanbul",""1")INSERT INTO adresler VALUES("2",""10",""array sokak. class mahallesi extends plaza no:850  Alsancak/ İzmir",""0")INSERT INTO adresler VALUES("11",""12",""array sokak. class mahallesi extends plaza no:850  Alsancak/ İzmir",""1")INSERT INTO adresler VALUES("12",""16",""Tekirdağ",""1")


DROP TABLE IF EXISTS alt_kategori;

CREATE TABLE `alt_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cocuk_kat_id` int(11) NOT NULL,
  `ana_kat_id` int(11) NOT NULL,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO alt_kategori VALUES("1",""1",""1",""Tişört")INSERT INTO alt_kategori VALUES("2",""1",""1",""Pantolon")INSERT INTO alt_kategori VALUES("3",""1",""1",""Ceket")INSERT INTO alt_kategori VALUES("4",""1",""1",""Gömlek")INSERT INTO alt_kategori VALUES("5",""2",""1",""Atlet")INSERT INTO alt_kategori VALUES("6",""2",""1",""Boxer")INSERT INTO alt_kategori VALUES("10",""3",""1",""Klasik")INSERT INTO alt_kategori VALUES("9",""3",""1",""Spor")INSERT INTO alt_kategori VALUES("11",""4",""2",""Çamaşır")INSERT INTO alt_kategori VALUES("12",""4",""2",""İçlik")INSERT INTO alt_kategori VALUES("13",""5",""2",""Deri")INSERT INTO alt_kategori VALUES("14",""5",""2",""Kumaş")INSERT INTO alt_kategori VALUES("15",""6",""2",""Spor")INSERT INTO alt_kategori VALUES("16",""6",""2",""Klasik")INSERT INTO alt_kategori VALUES("17",""6",""2",""Deri Kordon")INSERT INTO alt_kategori VALUES("18",""7",""3",""Işıklı")INSERT INTO alt_kategori VALUES("19",""7",""3",""Spor")INSERT INTO alt_kategori VALUES("20",""7",""3",""İlk Adım")INSERT INTO alt_kategori VALUES("21",""8",""3",""Araba")INSERT INTO alt_kategori VALUES("22",""8",""3",""Bebek")INSERT INTO alt_kategori VALUES("23",""8",""3",""Tren")INSERT INTO alt_kategori VALUES("24",""9",""3",""Zıbın")INSERT INTO alt_kategori VALUES("25",""9",""3",""Tişört")INSERT INTO alt_kategori VALUES("26",""9",""3",""Pantolon")


DROP TABLE IF EXISTS ana_kategori;

CREATE TABLE `ana_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO ana_kategori VALUES("1",""ERKEK")INSERT INTO ana_kategori VALUES("2",""KADIN")INSERT INTO ana_kategori VALUES("3",""ÇOCUK")


DROP TABLE IF EXISTS ayarlar;

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sloganUst1` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sloganAlt1` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sloganUst2` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sloganAlt2` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sloganUst3` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sloganAlt3` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `sayfaAciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `anahtarKelime` text COLLATE utf8_turkish_ci NOT NULL,
  `bakimzaman` datetime NOT NULL,
  `yedekzaman` datetime NOT NULL DEFAULT current_timestamp(),
  `uyelerGoruntuAdet` int(11) NOT NULL,
  `uyelerAramaAdet` int(11) NOT NULL,
  `uyelerYorumAdet` int(11) NOT NULL,
  `urunlerGoruntuAdet` int(11) NOT NULL,
  `urunlerKategoriAramaAdet` int(11) NOT NULL,
  `urunlerAramaAdet` int(11) NOT NULL,
  `bultenGoruntuAdet` int(11) NOT NULL,
  `uyeYorumAdet` int(11) NOT NULL,
  `siteUrunlerGoruntuAdet` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO ayarlar VALUES("1",""DB-Üst Slogan 1",""DB-Alt Slogan 1",""DB-Üst Slogan  2",""DB-Alt Slogan 2",""DB-Üst Slogan 3",""DB-Alt Slogan 3",""MVC E-TİCARET UYGULAMASI",""Olcay kalyoncuoğlu- Udemy MVC E-ticaret Eğitimi",""eğitim, eticaret,anahtar,kelimeler,buraya,virgüller,koyularak,yazilacak",""2020-05-31 14:40:00",""2020-05-31 14:42:00",""5",""5",""5",""5",""5",""5",""5",""5",""5")


DROP TABLE IF EXISTS bankabilgileri;

CREATE TABLE `bankabilgileri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banka_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `hesap_ad` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `hesap_no` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `iban_no` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO bankabilgileri VALUES("1",""İŞ BANKASI",""İş Bankası-Hakan",""78945612",""TR00 0000 0000 0000 0078 9456 12")INSERT INTO bankabilgileri VALUES("2",""AKBANK",""Akbank-Hakan",""32165498",""TR00 0000 0000 0000 0032 1654 98")INSERT INTO bankabilgileri VALUES("4",""YAPI KREDİ",""Yapı Kredi-Hakan",""02553690",""TR00 0000 0000 0000 0002 5536 90")


DROP TABLE IF EXISTS bulten;

CREATE TABLE `bulten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailadres` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO bulten VALUES("1",""dasdas@gmail.com",""18-05-2019")INSERT INTO bulten VALUES("2",""ahmet@hotmail.com",""18-05-2019")INSERT INTO bulten VALUES("3",""zimba@hotmail.com",""20-05-2019")INSERT INTO bulten VALUES("4",""asda@gmail.com",""20-05-2019")INSERT INTO bulten VALUES("5",""indexten@gmail.com",""20-05-2019")INSERT INTO bulten VALUES("6",""22hakan@hotmail.com",""25-05-2019")


DROP TABLE IF EXISTS cocuk_kategori;

CREATE TABLE `cocuk_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ana_kat_id` int(11) NOT NULL,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO cocuk_kategori VALUES("1",""1",""Dış Giyim")INSERT INTO cocuk_kategori VALUES("2",""1",""İç Giyim")INSERT INTO cocuk_kategori VALUES("3",""1",""Ayakkabı")INSERT INTO cocuk_kategori VALUES("4",""2",""İç Giyim")INSERT INTO cocuk_kategori VALUES("5",""2",""Çanta")INSERT INTO cocuk_kategori VALUES("6",""2",""Saat")INSERT INTO cocuk_kategori VALUES("7",""3",""Ayakkabı")INSERT INTO cocuk_kategori VALUES("8",""3",""Oyuncak")INSERT INTO cocuk_kategori VALUES("9",""3",""Giyim")


DROP TABLE IF EXISTS iletisim;

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO iletisim VALUES("1",""Yusuf dsadasd",""olcay@hotmail.com",""deneme Konu",""Mesajıızı deniyoruz fdsflködslfksdmlfjds",""20-05-2019")


DROP TABLE IF EXISTS siparisler;

CREATE TABLE `siparisler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siparis_no` int(11) NOT NULL,
  `adresid` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `urunad` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `urunadet` int(11) NOT NULL,
  `urunfiyat` int(11) NOT NULL,
  `toplamfiyat` int(11) NOT NULL,
  `kargodurum` int(11) NOT NULL DEFAULT 0,
  `odemeturu` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO siparisler VALUES("34",""92552904",""11",""12",""Y MODEL",""3",""169",""507",""1",""Nakit",""14.06.2019")INSERT INTO siparisler VALUES("32",""13290820",""1",""10",""Tahta",""3",""169",""507",""2",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("31",""13290820",""1",""10",""Işıklı",""3",""140",""420",""2",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("30",""13290820",""1",""10",""X MODEL",""3",""147",""441",""2",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("29",""18408288",""1",""13",""Normal",""3",""90",""270",""1",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("33",""92552904",""11",""12",""Çamaşır-1",""3",""90",""270",""1",""Nakit",""14.06.2019")INSERT INTO siparisler VALUES("28",""18408288",""1",""13",""Kot Pantolon",""2",""90",""180",""1",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("35",""59193583",""12",""16",""Pamuk",""1",""169",""169",""0",""Nakit",""31.05.2020")INSERT INTO siparisler VALUES("36",""54838294",""12",""16",""Pamuk",""1",""169",""169",""0",""Nakit",""31.05.2020")INSERT INTO siparisler VALUES("37",""33714702",""12",""16",""Pamuk",""1",""169",""169",""0",""Nakit",""31.05.2020")


DROP TABLE IF EXISTS teslimatbilgileri;

CREATE TABLE `teslimatbilgileri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siparis_no` int(11) NOT NULL,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO teslimatbilgileri VALUES("1",""17131105",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("2",""78669138",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("3",""45747779",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("4",""89026050",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("5",""41370623",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("6",""55902761",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("7",""55155696",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("8",""70407290",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("9",""79279869",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("10",""18408288",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("11",""13290820",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("12",""92552904",""dilek",""kal",""dilek@hotmail.com",""55522211122")INSERT INTO teslimatbilgileri VALUES("13",""59193583",""tekirdag",""kapaklı",""tekirdag@hotmail.com",""05360164766")INSERT INTO teslimatbilgileri VALUES("14",""22630523",""tekirdag",""kapaklı",""tekirdag@hotmail.com",""05360164766")INSERT INTO teslimatbilgileri VALUES("15",""54838294",""tekirdag",""kapaklı",""tekirdag@hotmail.com",""05360164766")INSERT INTO teslimatbilgileri VALUES("16",""71526334",""tekirdag",""kapaklı",""tekirdag@hotmail.com",""05360164766")INSERT INTO teslimatbilgileri VALUES("17",""33714702",""tekirdag",""kapaklı",""tekirdag@hotmail.com",""05360164766")


DROP TABLE IF EXISTS urunler;

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `katid` int(11) NOT NULL,
  `ana_kat_id` int(11) NOT NULL,
  `cocuk_kat_id` int(11) NOT NULL,
  `urunad` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `res1` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `res2` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `res3` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 0,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `kumas` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `urtYeri` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `renk` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` float NOT NULL,
  `stok` int(11) NOT NULL,
  `ozellik` text COLLATE utf8_turkish_ci NOT NULL,
  `ekstraBilgi` text COLLATE utf8_turkish_ci NOT NULL,
  `satisadet` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO urunler VALUES("1",""1",""1",""1",""Beyaz Tişört",""1.png",""2.png",""3.png",""2",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Beyaz",""380",""10000",""Beyaz Tişört için özellikler",""Beyaz Tişört için ekstra bilgi",""10")INSERT INTO urunler VALUES("2",""1",""1",""1",""Sarı Tişört",""4.png",""5.png",""6.png",""2",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Sarı",""270",""10000",""Sarı Tişört için özellikler",""Sarı Tişört için ekstra bilgi",""2")INSERT INTO urunler VALUES("3",""2",""1",""1",""Kumaş Pantolon",""7.png",""8.png",""9.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""5")INSERT INTO urunler VALUES("4",""2",""1",""1",""Kot Pantolon",""10.png",""11.png",""12.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""100",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""8")INSERT INTO urunler VALUES("5",""3",""1",""1",""Keten Ceket",""13.png",""14.png",""15.png",""2",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""9")INSERT INTO urunler VALUES("6",""3",""1",""1",""Kumaş Ceket",""16.png",""17.png",""18.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("7",""13",""2",""5",""Siyah Tişört",""p7.jpg",""l3.jpg",""p7.jpg",""1",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""Siyah",""570",""170",""Siyah Tişört için özellikler",""Siyah Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("8",""8",""0",""0",""Beyaz Tişört",""p8.jpg",""l5.jpg",""p8.jpg",""1",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Beyaz",""684",""10000",""Beyaz Tişört için özellikler",""Beyaz Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("9",""9",""0",""0",""Mor Tişört",""p9.jpg",""l1.jpg",""p9.jpg",""1",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Mor",""157",""10000",""Mor Tişört için özellikler",""Mor Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("10",""4",""1",""1",""Keten Gömlek",""19.png",""20.png",""21.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Beyaz",""380",""10000",""Beyaz Tişört için özellikler",""Beyaz Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("11",""4",""1",""1",""Yazlık Gömlek",""22.png",""23.png",""24.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Sarı",""270",""10000",""Sarı Tişört için özellikler",""Sarı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("12",""5",""1",""2",""Beyaz Atlet",""25.png",""26.png",""27.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("13",""5",""1",""2",""Kırmızı Atlet",""28.png",""29.png",""30.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("14",""6",""1",""2",""Keten Ceket",""31.png",""32.png",""33.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("15",""6",""1",""2",""Kumaş Ceket",""34.png",""35.png",""36.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("16",""10",""1",""3",""Sarı",""37.png",""38.png",""39.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("17",""10",""1",""3",""Kahverengi",""40.png",""41.png",""42.png",""2",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("18",""9",""1",""3",""Nike-Beyaz",""43.png",""44.png",""45.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("19",""9",""1",""3",""Adidas-Mavi",""46.png",""47.png",""48.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("20",""11",""2",""4",""Çamaşır-1",""49.png",""50.png",""51.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("21",""11",""2",""4",""Çamaşır-1",""52.png",""53.png",""54.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("22",""12",""2",""4",""X MODEL",""55.png",""56.png",""57.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("23",""12",""2",""4",""Y MODEL",""58.png",""59.png",""60.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("24",""13",""2",""5",""Timsah Derisi",""61.png",""62.png",""63.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("25",""13",""2",""5",""Sinek Derisi",""64.png",""65.png",""66.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("26",""14",""2",""5",""Keten",""67.png",""68.png",""69.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("27",""14",""2",""5",""Bez",""70.png",""71.png",""72.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("28",""15",""2",""6",""Kırmızı",""73.png",""74.png",""75.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("29",""15",""2",""6",""Turkuaz",""76.png",""77.png",""78.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("30",""16",""2",""6",""X MODEL",""79.png",""80.png",""81.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("31",""16",""2",""6",""Y MODEL",""82.png",""83.png",""84.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("32",""17",""2",""6",""Yerli Üretim",""85.png",""86.png",""87.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("33",""17",""2",""6",""İthal",""88.png",""89.png",""90.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("34",""18",""3",""7",""Mavi",""91.png",""92.png",""93.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("35",""18",""3",""7",""Kırmızı",""94.png",""95.png",""96.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("36",""19",""3",""7",""Işıklı",""97.png",""98.png",""99.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("37",""19",""3",""7",""Normal",""100.png",""101.png",""102.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("38",""20",""3",""7",""0-3 Yaş",""103.png",""104.png",""105.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("39",""20",""3",""7",""3-6 Yaş",""106.png",""107.png",""108.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("40",""21",""3",""8",""Metal",""109.png",""110.png",""111.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("41",""21",""3",""8",""Tahta",""112.png",""113.png",""114.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("42",""22",""3",""8",""Barby",""115.png",""116.png",""117.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("43",""22",""3",""8",""Benekli",""118.png",""119.png",""120.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("44",""23",""3",""8",""Kara Tren",""121.png",""122.png",""123.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("45",""23",""3",""8",""Tahta Tren",""124.png",""125.png",""126.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("46",""24",""3",""9",""Yeni Doğan",""127.png",""128.png",""129.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("47",""24",""3",""9",""Pamuklu",""130.png",""131.png",""132.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("48",""25",""3",""9",""Polo",""133.png",""134.png",""135.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("49",""25",""3",""9",""Pamuk",""136.png",""137.png",""138.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""9997",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("50",""26",""3",""9",""Kot Pantolon",""139.png",""140.png",""141.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("54",""14",""2",""5",""olcay",""ba1245e29c1a16d924d037a89f4a957f.png",""3f154985e8042e4276bb665b587330f9.png",""92aedb0a76b971ceba17b7c1d580685f.png",""2",""Açıklama deneme",""ttt",""yyy",""kırmızı",""30",""10000",""özellikkkdaskdkasdasd",""ekstraaaaaaaaaaaaaaaaaa",""0")INSERT INTO urunler VALUES("56",""3",""0",""0",""fdsf",""d892870c32c97a903512527e0c42c738.png",""75839caea6441c622ff046c06893fe7e.png",""80d7b3ebfc550c208930a54800a15fc9.png",""1",""gfdg",""efd",""fdsf",""fds",""34",""234",""gfdg",""gdfg",""0")


DROP TABLE IF EXISTS uye_panel;

CREATE TABLE `uye_panel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO uye_panel VALUES("13",""hakan",""yılmaz",""hak@gmail.com",""q5ijvc1oU5CRUcAmNgZuecbfAA==",""04442221122",""1")INSERT INTO uye_panel VALUES("12",""dilek",""kal",""dilek@hotmail.com",""q5ijvc1oU5CRScAmNgZuacZfAA==",""55522211122",""1")INSERT INTO uye_panel VALUES("10",""olcay",""Kalyon",""olcayrewr@gmail.com",""q5ijvc1oU5CRUcAmNgZuecbfAA==",""0555178786",""0")INSERT INTO uye_panel VALUES("15",""hakan",""yılmaz",""hak@gmail.com",""q5ijvc1oU5CRUcAmNgZuecbfAA==",""04442221122",""1")INSERT INTO uye_panel VALUES("16",""tekirdag",""kapaklı",""tekirdag@hotmail.com",""q5ijvc1oU5DR1pBNbAzcbkzsAA==",""05360164766",""1")


DROP TABLE IF EXISTS yonetim;

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL,
  `siparisYonetim` int(11) NOT NULL DEFAULT 0,
  `kategoriYonetim` int(11) NOT NULL DEFAULT 0,
  `uyeYonetim` int(11) NOT NULL DEFAULT 0,
  `urunYonetim` int(11) NOT NULL DEFAULT 0,
  `muhasebeYonetim` int(11) NOT NULL DEFAULT 0,
  `yoneticiYonetim` int(11) NOT NULL DEFAULT 0,
  `bultenYonetim` int(11) NOT NULL DEFAULT 0,
  `sistemayarYonetim` int(11) NOT NULL DEFAULT 0,
  `sistembakimYonetim` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO yonetim VALUES("1",""hakan",""q5ijvc3IZFuQkamH31nti94ndfzOnQ/fxMbgfJStEwA=",""1",""1",""1",""1",""1",""1",""1",""1",""1",""1")


DROP TABLE IF EXISTS yorumlar;

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uyeid` int(11) NOT NULL,
  `urunid` int(11) NOT NULL,
  `ad` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO yorumlar VALUES("6",""10",""4",""aaaaaa",""İyi ürün",""17-05-2019",""1")INSERT INTO yorumlar VALUES("11",""10",""6",""DSF",""Gayet güzel 3454345",""17-05-2019",""0")INSERT INTO yorumlar VALUES("10",""10",""6",""fdg",""Düzelttik
",""17-05-2019",""0")INSERT INTO yorumlar VALUES("13",""10",""4",""olcay",""İsimden sonra yorum deneme",""23-05-2019",""1")


