SET NAMES utf8;DROP TABLE IF EXISTS adresler;

CREATE TABLE `adresler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uyeid` int(11) NOT NULL,
  `adres` text COLLATE utf8_turkish_ci NOT NULL,
  `varsayilan` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO adresler VALUES("1",""10",""php sokak. mvc mahallesi. olcay apt. no:55 istanbul",""1")INSERT INTO adresler VALUES("2",""10",""array sokak. class mahallesi extends plaza no:850  Alsancak/ İzmir",""0")INSERT INTO adresler VALUES("11",""12",""array sokak. class mahallesi extends plaza no:850  Alsancak/ İzmir",""1")INSERT INTO adresler VALUES("12",""16",""Tekirdağ",""0")INSERT INTO adresler VALUES("13",""16",""İstanbul",""1")


DROP TABLE IF EXISTS alt_kategori;

CREATE TABLE `alt_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cocuk_kat_id` int(11) NOT NULL,
  `ana_kat_id` int(11) NOT NULL,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO alt_kategori VALUES("1",""1",""1",""Tişört")INSERT INTO alt_kategori VALUES("2",""1",""1",""Pantolon")INSERT INTO alt_kategori VALUES("3",""1",""1",""Ceket")INSERT INTO alt_kategori VALUES("4",""1",""1",""Gömlek")INSERT INTO alt_kategori VALUES("5",""2",""1",""Atlet")INSERT INTO alt_kategori VALUES("6",""2",""1",""Boxer")INSERT INTO alt_kategori VALUES("10",""3",""1",""Klasik")INSERT INTO alt_kategori VALUES("9",""3",""1",""Spor")INSERT INTO alt_kategori VALUES("11",""4",""2",""Çamaşır")INSERT INTO alt_kategori VALUES("12",""4",""2",""İçlik")INSERT INTO alt_kategori VALUES("13",""5",""2",""Deri")INSERT INTO alt_kategori VALUES("14",""5",""2",""Kumaş")INSERT INTO alt_kategori VALUES("15",""6",""2",""Spor")INSERT INTO alt_kategori VALUES("16",""6",""2",""Klasik")INSERT INTO alt_kategori VALUES("17",""6",""2",""Deri Kordon")INSERT INTO alt_kategori VALUES("18",""7",""3",""Işıklı")INSERT INTO alt_kategori VALUES("19",""7",""3",""Spor")INSERT INTO alt_kategori VALUES("20",""7",""3",""İlk Adım")INSERT INTO alt_kategori VALUES("21",""8",""3",""Araba")INSERT INTO alt_kategori VALUES("22",""8",""3",""Bebek")INSERT INTO alt_kategori VALUES("23",""8",""3",""Tren")INSERT INTO alt_kategori VALUES("24",""9",""3",""Zıbın")INSERT INTO alt_kategori VALUES("25",""9",""3",""Tişört")INSERT INTO alt_kategori VALUES("26",""9",""3",""Pantolon")


DROP TABLE IF EXISTS ana_kategori;

CREATE TABLE `ana_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

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
  `uyelerGoruntuAdet` int(11) NOT NULL,
  `uyelerAramaAdet` int(11) NOT NULL,
  `uyelerYorumAdet` int(11) NOT NULL,
  `urunlerGoruntuAdet` int(11) NOT NULL,
  `urunlerAramaAdet` int(11) NOT NULL,
  `urunlerKategoriAramaAdet` int(11) NOT NULL,
  `siteUrunlerGoruntuAdet` int(11) NOT NULL,
  `uyeYorumAdet` int(11) NOT NULL,
  `bakimzaman` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `yedekzaman` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO ayarlar VALUES("1",""DB-Üst Slogan 1",""DB-Alt Slogan 1",""DB-Üst Slogan  2",""DB-Alt Slogan 2",""DB-Üst Slogan 3",""DB-Alt Slogan 3",""MVC E-TİCARET UYGULAMASI",""Hakan Sandal- Udemy MVC E-ticaret Eğitimi",""eğitim, eticaret,anahtar,kelimeler,buraya,virgüller,koyularak,yazilacak",""3",""3",""4",""10",""3",""3",""3",""3",""08.05.2020-14:18",""08.05.2020-16:51")


DROP TABLE IF EXISTS banka_bilgileri;

CREATE TABLE `banka_bilgileri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banka_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `hesap_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `hesap_no` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `iban_no` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO banka_bilgileri VALUES("1",""İŞ BANKASI",""Hakan-İş Bankası",""54546589",""TR00 0000 0000 0000 0000 0000 13")INSERT INTO banka_bilgileri VALUES("2",""AKBANK",""Hakan-Akbank",""52658985",""TR00 0000 0000 0000 0000 0000 19")INSERT INTO banka_bilgileri VALUES("4",""GARANTİ",""Hakan-Garanti",""12345674",""TR00 0000 0000 0000 0000 0000 58")


DROP TABLE IF EXISTS bulten;

CREATE TABLE `bulten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailadres` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO bulten VALUES("1",""dasdas@gmail.com",""18-05-2019")INSERT INTO bulten VALUES("2",""ahmet@hotmail.com",""18-05-2019")INSERT INTO bulten VALUES("3",""zimba@hotmail.com",""20-05-2019")INSERT INTO bulten VALUES("4",""asda@gmail.com",""20-05-2019")INSERT INTO bulten VALUES("5",""indexten@gmail.com",""20-05-2019")INSERT INTO bulten VALUES("6",""22hakan@hotmail.com",""25-05-2019")INSERT INTO bulten VALUES("7",""baby@yandex.com",""2020-04-24")


DROP TABLE IF EXISTS cocuk_kategori;

CREATE TABLE `cocuk_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ana_kat_id` int(11) NOT NULL,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO cocuk_kategori VALUES("1",""1",""Dış Giyim")INSERT INTO cocuk_kategori VALUES("2",""1",""İç Giyim")INSERT INTO cocuk_kategori VALUES("13",""1",""Ayakkabı")INSERT INTO cocuk_kategori VALUES("4",""2",""İç Giyim")INSERT INTO cocuk_kategori VALUES("5",""2",""Çanta")INSERT INTO cocuk_kategori VALUES("6",""2",""Saat")INSERT INTO cocuk_kategori VALUES("7",""3",""Ayakkabı")INSERT INTO cocuk_kategori VALUES("8",""3",""Oyuncak")INSERT INTO cocuk_kategori VALUES("9",""3",""Giyim")


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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO siparisler VALUES("34",""92552904",""11",""12",""Y MODEL",""3",""169",""507",""1",""Nakit",""14.06.2019")INSERT INTO siparisler VALUES("32",""13290820",""1",""10",""Tahta",""3",""169",""507",""2",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("31",""13290820",""1",""10",""Işıklı",""3",""140",""420",""2",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("30",""13290820",""1",""10",""X MODEL",""3",""147",""441",""2",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("29",""18408288",""1",""13",""Normal",""3",""90",""270",""1",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("33",""92552904",""11",""12",""Çamaşır-1",""3",""90",""270",""1",""Nakit",""14.06.2019")INSERT INTO siparisler VALUES("28",""18408288",""1",""13",""Kot Pantolon",""2",""90",""180",""1",""Nakit",""11.06.2019")INSERT INTO siparisler VALUES("35",""73939334",""13",""16",""Kırmızı",""4",""169",""676",""2",""Nakit",""24.04.2020")INSERT INTO siparisler VALUES("36",""73939334",""13",""16",""Beyaz Tişört",""6",""380",""2280",""2",""Nakit",""24.04.2020")INSERT INTO siparisler VALUES("41",""2890264",""13",""16",""Kot Pantolon",""5",""90",""450",""0",""Nakit",""05.05.2020")


DROP TABLE IF EXISTS teslimatbilgileri;

CREATE TABLE `teslimatbilgileri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siparis_no` int(11) NOT NULL,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO teslimatbilgileri VALUES("1",""17131105",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("2",""78669138",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("3",""45747779",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("4",""89026050",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("5",""41370623",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("6",""55902761",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("7",""55155696",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("8",""70407290",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("9",""79279869",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("10",""18408288",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("11",""13290820",""olcay",""Kalyon",""olcayrewr@gmail.com",""0555178786")INSERT INTO teslimatbilgileri VALUES("12",""92552904",""dilek",""kal",""dilek@hotmail.com",""55522211122")INSERT INTO teslimatbilgileri VALUES("13",""73939334",""tekirdag",""kapakli",""tekirdag59@hotmail.c",""053601647666")INSERT INTO teslimatbilgileri VALUES("14",""934819",""tekirdag",""kapakli",""tekirdag59@hotmail.c",""053601647666")INSERT INTO teslimatbilgileri VALUES("15",""71485943",""tekirdag",""kapakli",""tekirdag59@hotmail.c",""053601647666")INSERT INTO teslimatbilgileri VALUES("16",""41178377",""tekirdag",""kapakli",""tekirdag59@hotmail.c",""053601647666")INSERT INTO teslimatbilgileri VALUES("21",""2890264",""tekirdag",""kapakli",""tekirdag59@hotmail.c",""053601647666")


DROP TABLE IF EXISTS urunler;

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ana_kat_id` int(11) NOT NULL,
  `cocuk_kat_id` int(11) NOT NULL,
  `katid` int(11) NOT NULL,
  `urunad` varchar(80) CHARACTER SET utf8 NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO urunler VALUES("2",""1",""1",""1",""Sarı Tişört",""4.png",""5.png",""6.png",""2",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Sarı",""270",""10000",""Sarı Tişört için özellikler",""Sarı Tişört için ekstra bilgi",""2")INSERT INTO urunler VALUES("3",""1",""1",""2",""Kumaş Pantolon",""7.png",""8.png",""9.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""5")INSERT INTO urunler VALUES("4",""1",""1",""2",""Kot Pantolon",""10.png",""11.png",""12.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""95",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""8")INSERT INTO urunler VALUES("5",""1",""1",""3",""Keten Ceket",""13.png",""14.png",""15.png",""2",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""9")INSERT INTO urunler VALUES("6",""1",""1",""3",""Kumaş Ceket",""16.png",""17.png",""18.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("7",""2",""5",""13",""Siyah Tişört",""p7.jpg",""l3.jpg",""p7.jpg",""1",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""Siyah",""570",""170",""Siyah Tişört için özellikler",""Siyah Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("8",""3",""9",""25",""Beyaz Tişört",""p8.jpg",""l5.jpg",""p8.jpg",""1",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Beyaz",""684",""10000",""Beyaz Tişört için özellikler",""Beyaz Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("9",""2",""5",""9",""Mor Tişört",""p9.jpg",""l1.jpg",""p9.jpg",""1",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Mor",""157",""10000",""Mor Tişört için özellikler",""Mor Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("10",""1",""1",""4",""Keten Gömlek",""19.png",""20.png",""21.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Beyaz",""380",""10000",""Beyaz Tişört için özellikler",""Beyaz Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("11",""1",""1",""4",""Yazlık Gömlek",""22.png",""23.png",""24.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Sarı",""270",""10000",""Sarı Tişört için özellikler",""Sarı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("12",""1",""2",""5",""Beyaz Atlet",""25.png",""26.png",""27.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("13",""1",""2",""5",""Kırmızı Atlet",""28.png",""29.png",""30.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("14",""1",""2",""6",""Keten Ceket",""31.png",""32.png",""33.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("15",""1",""2",""6",""Kumaş Ceket",""34.png",""35.png",""36.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("16",""1",""1",""10",""Sarı",""37.png",""38.png",""39.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("17",""2",""5",""10",""Kahverengi",""40.png",""41.png",""42.png",""2",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("18",""2",""5",""9",""Nike-Beyaz",""43.png",""44.png",""45.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("19",""2",""5",""9",""Adidas-Mavi",""46.png",""47.png",""48.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("20",""2",""4",""11",""Çamaşır-1",""49.png",""50.png",""51.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("21",""2",""4",""11",""Çamaşır-1",""52.png",""53.png",""54.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("22",""2",""4",""12",""X MODEL",""55.png",""56.png",""57.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("23",""2",""4",""12",""Y MODEL",""58.png",""59.png",""60.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("24",""2",""5",""13",""Timsah Derisi",""61.png",""62.png",""63.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("25",""2",""5",""13",""Sinek Derisi",""64.png",""65.png",""66.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("26",""2",""5",""14",""Keten",""67.png",""68.png",""69.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("27",""2",""5",""14",""Bez",""70.png",""71.png",""72.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("28",""2",""6",""15",""Kırmızı",""73.png",""74.png",""75.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("29",""2",""6",""15",""Turkuaz",""76.png",""77.png",""78.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("30",""2",""6",""16",""X MODEL",""79.png",""80.png",""81.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("31",""2",""6",""16",""Y MODEL",""82.png",""83.png",""84.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("32",""2",""6",""17",""Yerli Üretim",""85.png",""86.png",""87.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("33",""2",""6",""17",""İthal",""88.png",""89.png",""90.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("34",""3",""7",""18",""Mavi",""91.png",""92.png",""93.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("35",""3",""7",""18",""Kırmızı",""94.png",""95.png",""96.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("36",""3",""7",""19",""Işıklı",""97.png",""98.png",""99.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("37",""3",""7",""19",""Normal",""100.png",""101.png",""102.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("38",""3",""7",""20",""0-3 Yaş",""103.png",""104.png",""105.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("39",""3",""7",""20",""3-6 Yaş",""106.png",""107.png",""108.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("40",""3",""8",""21",""Metal",""109.png",""110.png",""111.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("41",""3",""8",""21",""Tahta",""112.png",""113.png",""114.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("42",""3",""8",""22",""Barby",""115.png",""116.png",""117.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("43",""3",""8",""22",""Benekli",""118.png",""119.png",""120.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("44",""3",""8",""23",""Kara Tren",""121.png",""122.png",""123.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("45",""3",""8",""23",""Tahta Tren",""124.png",""125.png",""126.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("46",""3",""9",""24",""Yeni Doğan",""127.png",""128.png",""129.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Likra",""Afrika",""pembe",""140",""10000",""Pembe Tişört için özellikler",""Pembe Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("47",""3",""9",""24",""Pamuklu",""130.png",""131.png",""132.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Saten",""Kamboçya",""Sarı",""90",""10000",""Kırmızı Tişört için özellikler",""Kırmızı Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("48",""3",""9",""25",""Polo",""133.png",""134.png",""135.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("49",""3",""9",""25",""Pamuk",""136.png",""137.png",""138.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Keten",""Uganda",""Mavi",""169",""10000",""Mavi Tişört için özellikler",""Mavi Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("50",""3",""9",""26",""Kot Pantolon",""139.png",""140.png",""141.png",""0",""ÜRÜN HAKKINDA AÇIKLAMA=Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever",""Pamuk",""Çin",""Gri",""147",""190",""Gri Tişört için özellikler",""Gri Tişört için ekstra bilgi",""0")INSERT INTO urunler VALUES("54",""2",""5",""14",""olcay",""ba1245e29c1a16d924d037a89f4a957f.png",""3f154985e8042e4276bb665b587330f9.png",""92aedb0a76b971ceba17b7c1d580685f.png",""2",""Açıklama deneme",""ttt",""yyy",""kırmızı",""30",""10000",""özellikkkdaskdkasdasd",""ekstraaaaaaaaaaaaaaaaaa",""0")INSERT INTO urunler VALUES("56",""1",""2",""6",""Hakan",""2b5ee751945247c8b8f0e81ef13d6d4f.jpg",""9aedbc7f77621bb0d4e72bb2b25a7ebb.jpg",""0f522bda48cb0d5a75e44a3cfeb62cfe.jpg",""1",""AÇıklama",""kumaş",""Tekirdağ",""mosmor",""34",""100",""Ürün özellik",""Ürün ekstra bilgi",""0")


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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO uye_panel VALUES("13",""hakan",""yılmaz",""hak@gmail.com",""q5ijvc1oU5CRUcAmNgZuecbfAA==",""04442221122",""1")INSERT INTO uye_panel VALUES("12",""dilek",""kal",""dilek@hotmail.com",""q5ijvc1oU5CRScAmNgZuacZfAA==",""55522211122",""1")INSERT INTO uye_panel VALUES("10",""olcay",""Kalyon",""olcayrewr@gmail.com",""q5ijvc1oU5CRUcAmNgZuecbfAA==",""0555178786",""0")INSERT INTO uye_panel VALUES("15",""hakan",""yılmaz",""hak@gmail.com",""q5ijvc1oU5CRUcAmNgZuecbfAA==",""04442221122",""1")INSERT INTO uye_panel VALUES("16",""tekirdag",""kapakli",""tekirdag59@hotmail.com",""q5ijvc1oU5DR1pBNbAzcbkzsAA==",""053601647666",""1")INSERT INTO uye_panel VALUES("17",""betul",""yesildag",""betul.yesildag@gamil.com",""q5ijvc3IZFuQkamH31nti94ndfzOnQ/fxMbgfJStEwA=",""508465465",""1")INSERT INTO uye_panel VALUES("18",""berkan",""sandal",""berkan9@hotmail.com",""q5ijvc1oc5CRiZGZoWnwJjYG0VKmSwA=",""05365654654654",""1")INSERT INTO uye_panel VALUES("19",""sercan",""yıldırım",""sercan@hotmail.com",""q5ijvc1oY5CRgdHWgE1sDPzPmbIA",""5465456465465",""1")INSERT INTO uye_panel VALUES("20",""Aycan",""Yılmaz",""aycan**@gmail.com",""q5ijvc1oU5CRUdAmNgZuVca/AA==",""5456465",""1")INSERT INTO uye_panel VALUES("21",""hatice",""kara",""kara@hotmail.com",""q5ijvc1oW5CRiVHYJjYG3kQmAwA=",""65165165",""1")INSERT INTO uye_panel VALUES("22",""Velih",""Çeken",""velih@hotmail.com",""q5ijvc1oW5CRoWnwJjYG3lYmSwA=",""546546815315",""1")


DROP TABLE IF EXISTS yonetim;

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL,
  `siparisYonetim` int(11) NOT NULL DEFAULT 0,
  `kategoriYonetim` int(11) NOT NULL DEFAULT 0,
  `uyeYonetim` int(11) NOT NULL DEFAULT 0,
  `urunYonetim` int(11) NOT NULL DEFAULT 0,
  `muhasebeYonetim` int(11) NOT NULL DEFAULT 0,
  `bultenYonetim` int(11) NOT NULL DEFAULT 0,
  `yoneticiYonetim` int(11) NOT NULL DEFAULT 0,
  `sistemayarYonetim` int(11) NOT NULL DEFAULT 0,
  `sistembakimYonetim` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO yonetim VALUES("1",""hakan",""q5ijvc3IZFuQkamH31nti94ndfzOnQ/fxMbgfJStEwA=",""1",""1",""1",""1",""1",""1",""1",""1",""1",""1")INSERT INTO yonetim VALUES("2",""betul",""q5ijvc3IZFuQkamH31nti94ndfzOnQ/fxMbgfJStEwA=",""1",""1",""1",""1",""1",""1",""1",""1",""1",""1")INSERT INTO yonetim VALUES("3",""mehmet",""q5ijvc3IZFuQkamH31nti94ndfzOnQ/fxMbgfJStEwA=",""2",""0",""1",""0",""1",""0",""0",""0",""0",""0")INSERT INTO yonetim VALUES("4",""hasan",""q5ijvc1oW5CRiUnIJjYG3nAmXQA=",""3",""1",""0",""1",""0",""0",""1",""0",""0",""0")INSERT INTO yonetim VALUES("5",""ceylan",""q5ijvc1oW5CRmVnYJjYG3nwmYwA=",""3",""0",""0",""1",""0",""0",""1",""0",""1",""1")INSERT INTO yonetim VALUES("7",""Sultan",""q5ijvc1oW5CRiUnIJjYG3nAmXQA=",""2",""1",""0",""0",""1",""0",""0",""0",""1",""0")INSERT INTO yonetim VALUES("8",""MehmetCan",""q5ijvc1oW5CRiUnIJjYG3nAmXQA=",""3",""0",""0",""1",""0",""0",""1",""0",""0",""0")


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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci

INSERT INTO yorumlar VALUES("6",""10",""4",""aaaaaa",""İyi ürün",""17-05-2019",""1")INSERT INTO yorumlar VALUES("11",""10",""6",""DSF",""Gayet güzel 3454345",""17-05-2019",""0")INSERT INTO yorumlar VALUES("10",""10",""6",""fdg",""Düzelttik
",""17-05-2019",""0")INSERT INTO yorumlar VALUES("13",""10",""4",""olcay",""İsimden sonra yorum deneme",""23-05-2019",""0")INSERT INTO yorumlar VALUES("41",""16",""14",""tekirdag",""Boxer Çok güzel : )",""27-04-2020",""1")INSERT INTO yorumlar VALUES("46",""16",""10",""tekirdag",""Yorum Yapıldı...",""02-05-2020",""0")INSERT INTO yorumlar VALUES("44",""16",""2",""tekirdag",""Efsooooo!!! ",""24-04-2020",""1")INSERT INTO yorumlar VALUES("45",""16",""11",""tekirdag",""Bu Gömlek Çok Şık",""27-04-2020",""1")


