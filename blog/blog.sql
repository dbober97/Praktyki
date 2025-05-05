-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 05, 2025 at 12:23 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE `artykuly` (
  `id` int(11) NOT NULL,
  `tytul` varchar(100) NOT NULL,
  `data_publikacji` date NOT NULL,
  `tresc_artykulu` mediumtext NOT NULL,
  `data_ostatniej_zmiany` date DEFAULT NULL,
  `data_usuniecia` date DEFAULT NULL,
  `aktywny` char(1) NOT NULL,
  `czy_komentarze_dozwolone` char(1) NOT NULL,
  `użytkownicy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `artykuly`
--

INSERT INTO `artykuly` (`id`, `tytul`, `data_publikacji`, `tresc_artykulu`, `data_ostatniej_zmiany`, `data_usuniecia`, `aktywny`, `czy_komentarze_dozwolone`, `użytkownicy_id`) VALUES
(20, 'Badanie termowizyjne zmian skórnych pod kątem czerniaka', '2025-01-31', 'Termowizja jest bezinwazyjną metodą diagnostyczną, która polega na rejestrowaniu\r\npromieniowania podczerwonego emitowanego z powierzchni badanej. Każde ciało\r\no temperaturze wyższej od temperatury zera bezwzględnego (0 K) emituje\r\npromieniowanie, którego energia mieści się w zakresie podczerwieni. Również ciało\r\nludzkie emituje promieniowanie podczerwone, co pozwala na obrazowanie jego\r\npowierzchni z wykorzystaniem termowizji. \r\n$\r\nCzłowiek wykazuje stałocieplność,\r\nktóra jest konieczna do poprawnego funkcjonowania układu nerwowego, a zatem\r\nwszystkich naszych narządów. Jednak stała, a raczej zmienna w niewielkich\r\ngranicach, temperatura odnosi się wyłącznie do temperatury wewnątrz ciała. Wszelkie\r\nodstępstwa od powyższego zakresu mogą oznaczać procesy chorobowe. Z kolei\r\npowłoki ciała i kończyny wykazują zmiennocieplność, a zmiany temperatury tych\r\nczęści ciała w dużym stopniu są zależne od czynników zewnętrznych, które wpływają\r\nna wartości temperatury tkanek powierzchniowych oraz od aktywności metabolicznej\r\ntkanek miękkich. Zatem zmienność temperatury powierzchni ciała pośrednio niesie\r\ninformacje o procesach metabolicznych. Na podstawie przedstawionych danych\r\nmożna wnioskować, że termowizja wykazuje potencjał jako metoda wspomagająca\r\nwstępną diagnostykę czerniaka, umożliwiając bardziej precyzyjne różnicowanie zmian\r\nłagodnych od złośliwych. Warto wspomnieć, że termowizja pozwala zauważyć\r\nzapowiedź zmiany chorobowej gdy jeszcze gołym okiem nic nie widać.\r\n\r\nNasze badanie polegało na ustaleniu, czy znamienia mają wpływ na mapę\r\ntemperaturową ciała i czy temperatura w interesującym nas miejscu znacząco różni się\r\nod temperatury reszty ciała. Głównym celem naszego badania jest wyznaczenie\r\nparametru różnicującego czyli maksymalnej dopuszczalnej różnicy temperatur\r\npomiędzy obszarem kontrolnym (zdrową częścią skóry) a obszarem badanym\r\n(znamieniem) odróżniającym zmianę łagodną od złośliwej.\r\n\r\nCiąg dalszy w kolejnym artykule.', NULL, NULL, '1', '1', 48),
(21, 'Kolagen – suplementacja u wegan', '2025-01-31', 'Kolagen jest niezwykle ważnym białkiem budującym organizm człowieka, mającym\r\nwpływ na tempo starzenia się, komfort życia po ogólne prawidłowe funkcjonowanie organizmu,\r\nniewidoczne gołym okiem. Po 26 roku życia synteza kolagenu w organizmie człowieka spada i jak\r\ndotychczas synteza przeważała nad rozpadem tego białka, tak z upływem lat przeważa to drugie.\r\n$\r\nOpóźnić to zjawisko można odpowiednią dietą bogatą w kolagen. Źródło kolagenu to tylko i\r\nwyłącznie produkty pochodzenia zwierzęcego. Dieta wegańska wyklucza jednak mięso jak i jego\r\npochodne. Jedyną możliwością na zwiększenie kolagenu w organizmie staje się w tym przypadku\r\nzwiększenie jego syntezy, na które ma wpływ kilka kluczowych składników spożywczych, których\r\nomówienie stało się celem niniejszego artykułu. Materiał i metody: zaznajomienie się z publikacjami\r\nnaukowymi na temat diety bogatej w kolagen. Wyniki: opisano budowę kolagenu i jego wpływ na\r\nfunkcjonowanie organizmu człowieka, czym objawia się niedobór jak i sposób na zwiększenie jego\r\nsyntezy. Wnioski: brak przyjmowania kolagenu w pożywieniu nie jest problemem i można go\r\nuzupełniać stosując dietę zwiększającą jego produkcję w naszym ciele.\r\n\r\nCiąg dalszy w następnym artykule.', NULL, NULL, '1', '0', 48),
(22, 'Uczenie maszynowe - fragment książki', '2025-01-31', 'Żyjemy w erze obfitości danych. Zgodnie z najnowszymi badaniami codziennie generujemy\r\n2,5 kwintyliona (1018) bajtów informacji. To jest taki ogrom danych, że ponad 90% współcześnie\r\nprzechowywanych informacji zostało utworzone w ciągu poprzedniej dekady. Niestety,\r\nw zdecydowanej większości są one dostępne w postaci niezrozumiałej dla człowieka. Albo dane\r\nte wykraczają poza ramy standardowych metod analitycznych, albo po prostu są zbyt rozległe,\r\naby ludzki umysł był w stanie je objąć.\r\n$\r\nDzięki uczeniu maszynowemu wykorzystujemy komputery do przetwarzania tych nieprzeniknionych\r\ndla człowieka zbiorów danych, wyciągania z nich wniosków oraz prowadzenia na ich\r\npodstawie odpowiednich działań. Cały świat powoli uzależnia się od uczenia maszynowego —\r\nczęsto nawet nieświadomie — począwszy od smartfonów schowanych w kieszeniach, skończywszy\r\nna potężnych superkomputerach zasilających silniki przeglądarek w siedzibie firmy\r\nGoogle.\r\nWypada więc nam, współczesnym pionierom nowego, wspaniałego świata wielkich danych,\r\npodszkolić się co nieco w dziedzinie uczenia maszynowego. Czym jest ta dyscyplina i jakie są\r\nmechanizmy jej działania? W jaki sposób mogę wykorzystać uczenie maszynowe, żeby spojrzeć\r\nw nieznane, wspomóc moją firmę albo po prostu dowiedzieć się, co użytkownicy internetu\r\nuważają o moim ulubionym filmie? Wszystkie te informacje (oraz znacznie więcej) zostały\r\nomówione w kolejnych rozdziałach niniejszej książki.\r\nCiąg dalszy w następnym artykule.', NULL, NULL, '1', '1', 47),
(23, 'Od mnożenia do dodawania', '2025-01-31', 'Don’t know much about geography\r\nDon’t know much trigonometry\r\nDon’t know much about algebra\r\nDon’t know what a slide rule is for\r\n\r\n“Wonderful world”, Sam Cooke\r\n$\r\nOd powstania piosenki Sama Cooke’a minęły 64 lata. Wśród dziedzin wiedzy, które jej bohater wymienia jako swoje słabe strony, jedna w międzyczasie wypadła z programów nauczania. Mianowicie, młodszy Czytelnik ma pełne prawo nie wiedzieć, do czego służy suwak logarytmiczny (slide rule). Warto ten stan zmienić. \r\nDo czego zatem służy suwak logarytmiczny? Otóż do tego, by zamiast działania mnożenia można było wykonywać dodawanie. No dobrze, a dlaczego miałoby nam na tym zależeć ...\r\n[Fragment artykułu z czasopisma \"Delta\"]', NULL, NULL, '1', '1', 47),
(24, 'Problem dwóch ciał', '2025-02-01', 'Jak wygląda ruch dwóch punktów materialnych podlegających prawom\r\nklasycznej dynamiki Newtona i przyciągających się zgodnie z newtonowskim\r\nprawem powszechnego ciążenia? Odpowiedź jest stosunkowo prosta i bardzo\r\nelegancka. \r\n$\r\nPoruszają się po krzywych stożkowych, przy czym rodzaj krzywej\r\nzależy od całkowitej energii układu. Jeżeli energia jest na tyle mała, że ciała\r\ntworzą stan związany, czyli nie mogą się od siebie uwolnić, tylko muszą krążyć\r\nwokół siebie, to robią to po elipsach. Jeżeli energia układu jest wystarczająco\r\nduża, żeby mogły oddalić się od siebie dowolnie daleko, to najpierw zbliżają się\r\ndo siebie, a potem uciekają na ogół po hiperbolach, chyba że energia będzie\r\ndokładnie na granicy pomiędzy stanem związanym a niezwiązanym, kiedy to\r\nbędą poruszać się po parabolach.\r\nZajmijmy się stanem związanym. Ruch po elipsach jest okresowy, co oznacza, że\r\nco pewien ustalony okres ciała zajmują te same położenia w przestrzeni.\r\nMożemy wyobrazić sobie, że te dwa ciała to np. Ziemia i Słońce albo układ\r\npodwójny gwiazd. Jeżeli tylko ciała te mają symetrię sferyczną, to ich ruch jest\r\ndokładnie taki sam, jak ruch punktów materialnych o tych samych masach.\r\nTeoria Newtona mówi nam, że te dwa ciała będą krążyć po okresowych orbitach\r\ndowolnie długo.\r\nA co teoria Newtona powie nam o tym, jak będzie wyglądał ruch trzech ciał?\r\nOpis ruchu trzech ciał nie jest już tak prosty i elegancki, jak dla dwóch. Ogólny\r\nproblem opisu ruchu trzech ciał o porównywalnych masach w teorii Newtona\r\nnie ma ogólnego rozwiązania analitycznego. Rozwiązania numeryczne mają cechy\r\nchaotyczne, czyli trudno jest przewidzieć zachowanie takiego układu w dłuższej\r\nperspektywie czasowej, bo jest ono bardzo czułe na warunki początkowe.\r\nMożliwe są zderzenia i ucieczka jednego z ciał kosztem zbliżenia się do siebie\r\ndwóch pozostałych. Daleko więc takiemu układowi trzech ciał do elegancji\r\ni prostoty układu złożonego tylko z dwóch.\r\nA jak to wygląda w ogólnej teorii względności (OTW)? W teorii Newtona\r\nnajprostszym obiektem jest masa punktowa, czyli wyidealizowany obiekt, który\r\ninaczej niż gwiazda czy planeta nie ma objętości i struktury wewnętrznej.\r\nW pewnym sensie najprostszym odpowiadającym mu obiektem w teorii\r\nwzględności jest czarna dziura – obiekt mający tylko masę (i ewentualnie\r\nmoment pędu lub ładunek elektryczny), przy czym cała jego masa jest skupiona\r\nw jednym punkcie, zwanym ze względu na swe zadziwiające własności,\r\nosobliwością. Problem jednego ciała, czyli pole grawitacyjne wokół jednej czarnej\r\ndziury, został rozwiązany bardzo szybko po sformułowaniu OTW, bo już w roku\r\n1916 jego rozwiązanie zostało opublikowane przez Karla Schwarzschilda. Potem\r\npojawiły się również rozwiązania opisujące naładowaną i wreszcie rotującą\r\nczarną dziurę. A co ze stanem związanym dwóch mas? Do tej pory nie znamy\r\nogólnego analitycznego rozwiązania takiego problemu.\r\nWygląda na to, że w OTW nie potrafimy rozwiązać problemu dwóch ciał, tak jak\r\npotrafiliśmy to zrobić w teorii Newtona. Dlaczego tak jest? A może źle liczymy te\r\nciała czy też obiekty fizyczne? Zanim wrócimy do tego pytania, zajmiemy się\r\ntym, co wiemy o układzie związanym dwóch mas w OTW. Wiemy, że gdy masy\r\nte są wystarczająco daleko od siebie, to ich ruch w niewielkim stopniu odbiega\r\nod ruchu po elipsach opisywanego przez teorię Newtona. Jest to szczególny\r\nprzypadek, którego opis daje się znaleźć za pomocą przybliżonych rachunków,\r\ngdzie oblicza się poprawki do orbit newtonowskich pochodzące od OTW,\r\nzakładając, że są małe. A na czym te poprawki, czy też małe odstępstwa od orbit\r\nnewtonowskich, polegają? Okazuje się, że ruch nie jest już idealnie okresowy.\r\nPo pierwsze, kierunek wyznaczony przez prostą łączącą punkty, w których ciała\r\nsą w maksymalnej odległości od siebie, powoli się obraca, a po drugie, ta\r\nmaksymalna odległość po każdym okrążeniu staje się coraz mniejsza – ciała\r\npowoli na siebie spadają. W teorii Newtona rozmiar orbity jest ściśle związany\r\n6\r\nz całkowitą energią układu, która pozostaje stała – gdy jedno ciało zbliża się\r\ndo drugiego, to rośnie ich energia kinetyczna kosztem energii potencjalnej,\r\na kiedy się oddala, to rośnie energia potencjalna kosztem energii kinetycznej.\r\nIm mniejsza energia całkowita, tym ciaśniejsza orbita. Jeżeli więc orbity się\r\nzacieśniają, a ciała na siebie spadają, to wygląda na to, że tracona jest energia\r\nukładu. A co z zasadą zachowania energii?\r\nCiąg dalszy nastąpi.', NULL, NULL, '1', '1', 47),
(25, 'ala ma kota', '2025-02-01', 'dfdsfsdgfdnkcdnsoinfosn\r\n$\r\ndsjiosnfpidnvomvmd111111111111111111111111\r\ngsdgdgdfgdfgdfhfghgfhgf', NULL, NULL, '1', '1', 47),
(26, 'Testowy artykuł 1', '2025-03-13', 'To testowy wstęp \r\n$\r\nTo testowa zawartość', NULL, NULL, '1', '1', 47),
(27, 'Testowy artykuł 2', '2025-03-13', 'To testowy wstęp \r\n$\r\nTo testowa zawartość', NULL, NULL, '1', '1', 47),
(28, 'Testowy artykuł 3', '2025-03-13', 'To testowy wstęp \r\n$\r\nTo testowa zawartość', NULL, NULL, '1', '1', 47),
(29, 'Testowy artykuł 1 admina', '2025-03-13', 'To testowy wstęp \r\n$\r\nTo testowa zawartość', NULL, NULL, '1', '1', 42),
(30, 'Testowy artykuł 2 admina', '2025-03-13', 'To testowy wstęp \r\n$\r\nTo testowa zawartość', NULL, NULL, '1', '1', 42),
(31, 'Testowy artykuł 3 admina', '2025-03-13', 'To testowy wstęp \r\n$\r\nTo testowa zawartość', NULL, NULL, '1', '1', 42),
(32, 'Testowy artykuł 1 kolejnego autora', '2025-03-13', 'To testowy wstęp \r\n$\r\nTo testowa zawartość', NULL, NULL, '1', '1', 48),
(33, 'Testowy artykuł 2 kolejnego autora', '2025-03-13', 'To testowy wstęp \r\n$\r\nTo testowa zawartość', NULL, NULL, '1', '1', 48),
(34, 'Testowy artykuł 3 kolejnego autora', '2025-03-13', 'To testowy wstęp \r\n$\r\nTo testowa zawartość', NULL, NULL, '1', '1', 48),
(35, 'fdxfds', '2025-03-17', 'Prxrd dolarem\r\n$\r\npo dolarze', NULL, NULL, '1', '0', 42);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `asoc_artykul_kategoria`
--

CREATE TABLE `asoc_artykul_kategoria` (
  `id_asoc` int(11) NOT NULL,
  `kiedy_dodano` date NOT NULL,
  `kiedy_usunieto` date DEFAULT NULL,
  `kategorie_artykuly_id` int(11) NOT NULL,
  `artykuly_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `asoc_artykul_kategoria`
--

INSERT INTO `asoc_artykul_kategoria` (`id_asoc`, `kiedy_dodano`, `kiedy_usunieto`, `kategorie_artykuly_id`, `artykuly_id`) VALUES
(20, '2025-01-31', NULL, 2, 20),
(21, '2025-01-31', NULL, 2, 21),
(22, '2025-01-31', NULL, 3, 22),
(23, '2025-01-31', NULL, 1, 23),
(24, '2025-02-01', NULL, 2, 24),
(25, '2025-02-01', NULL, 3, 25),
(26, '2025-03-13', NULL, 1, 26),
(27, '2025-03-13', NULL, 2, 27),
(28, '2025-03-13', NULL, 3, 28),
(29, '2025-03-13', NULL, 1, 29),
(30, '2025-03-13', NULL, 2, 30),
(31, '2025-03-13', NULL, 3, 31),
(32, '2025-03-13', NULL, 1, 32),
(33, '2025-03-13', NULL, 2, 33),
(34, '2025-03-13', NULL, 3, 34),
(35, '2025-03-17', NULL, 1, 35);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `asoc_artykul_tag`
--

CREATE TABLE `asoc_artykul_tag` (
  `id_asoc` int(11) NOT NULL,
  `kiedy_dodano` date NOT NULL,
  `kiedy_usunieto` date DEFAULT NULL,
  `tagi_artykuly_id` int(11) NOT NULL,
  `artykuly_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `asoc_rola_user`
--

CREATE TABLE `asoc_rola_user` (
  `id_asoc` int(11) NOT NULL,
  `kiedy_nadano` date NOT NULL,
  `kiedy_odebrano` date DEFAULT NULL,
  `rola_id` int(11) NOT NULL,
  `użytkownicy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `asoc_rola_user`
--

INSERT INTO `asoc_rola_user` (`id_asoc`, `kiedy_nadano`, `kiedy_odebrano`, `rola_id`, `użytkownicy_id`) VALUES
(28, '2025-01-31', NULL, 3, 47),
(29, '2025-01-31', NULL, 4, 48),
(30, '2025-01-31', NULL, 3, 49),
(31, '2025-01-31', NULL, 3, 50),
(32, '2025-01-31', NULL, 2, 51),
(33, '2025-01-31', NULL, 1, 42),
(34, '2025-01-31', NULL, 2, 42),
(35, '2025-01-31', NULL, 3, 42),
(36, '2025-01-31', NULL, 4, 42),
(37, '2025-01-31', NULL, 4, 47);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie_artykuly`
--

CREATE TABLE `kategorie_artykuly` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `aktywna` char(1) NOT NULL,
  `od_kiedy` date NOT NULL,
  `do_kiedy` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `kategorie_artykuly`
--

INSERT INTO `kategorie_artykuly` (`id`, `nazwa`, `aktywna`, `od_kiedy`, `do_kiedy`) VALUES
(1, 'matematyka', '1', '2025-01-16', NULL),
(2, 'fizyka', '1', '2025-01-16', NULL),
(3, 'informatyka', '1', '2025-01-16', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id` int(11) NOT NULL,
  `data_dodania` date NOT NULL,
  `data_modyfikacji` date DEFAULT NULL,
  `data_usuniecia` date DEFAULT NULL,
  `tresc_komentarza` mediumtext NOT NULL,
  `aktywny` char(1) DEFAULT NULL,
  `użytkownicy_id` int(11) NOT NULL,
  `artykuly_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `komentarze`
--

INSERT INTO `komentarze` (`id`, `data_dodania`, `data_modyfikacji`, `data_usuniecia`, `tresc_komentarza`, `aktywny`, `użytkownicy_id`, `artykuly_id`) VALUES
(9, '2025-01-31', NULL, NULL, 'Ciekawy artykuł, czekam na ciąg dalszy.', '1', 47, 20),
(10, '2025-01-31', NULL, NULL, 'Interesujące. Pozdrawiam.', '1', 42, 20),
(11, '2025-01-31', NULL, NULL, 'Czekam na ciąg dalszy. Pozdrawiam.', '1', 42, 22),
(12, '2025-02-01', NULL, NULL, 'Pozdrawiam', NULL, 49, 23),
(13, '2025-02-01', NULL, NULL, 'Pozdrawiam!', NULL, 49, 22),
(14, '2025-02-01', NULL, NULL, 'Świetne!', '1', 49, 20),
(15, '2025-02-01', NULL, NULL, 'Ciekawy artykuł!', '0', 50, 20),
(16, '2025-02-01', NULL, NULL, 'Czekam na ciąg dalszy, pozdrawiam.', '0', 50, 20),
(17, '2025-02-01', NULL, NULL, 'Ciekawy artykuł!', NULL, 50, 23),
(18, '2025-02-01', NULL, NULL, 'Nie polecam', '0', 49, 23),
(19, '2025-02-01', NULL, NULL, 'Czekam na ciąg dalszy, pozdrawiam!', NULL, 50, 24),
(20, '2025-02-01', NULL, NULL, 'fajne', '1', 47, 25),
(21, '2025-03-17', NULL, NULL, 'fajny artykul', '1', 42, 26);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rola`
--

CREATE TABLE `rola` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(20) NOT NULL,
  `aktywyna` char(1) NOT NULL,
  `od_kiedy` date NOT NULL,
  `do_kiedy` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`id`, `nazwa`, `aktywyna`, `od_kiedy`, `do_kiedy`) VALUES
(1, 'admin', '1', '2025-01-09', NULL),
(2, 'moderator', '1', '2025-01-09', NULL),
(3, 'czytelnik', '1', '2025-01-09', NULL),
(4, 'autor', '1', '2025-01-09', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tagi_artykuly`
--

CREATE TABLE `tagi_artykuly` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(60) NOT NULL,
  `aktywny` char(1) NOT NULL,
  `od_kiedy` date NOT NULL,
  `do_kiedy` date DEFAULT NULL,
  `tworca_tagu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `użytkownicy`
--

CREATE TABLE `użytkownicy` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `widoczna_nazwa` varchar(100) NOT NULL,
  `data_utworzenia_konta` date NOT NULL,
  `data_modyfikacji_hasla` date DEFAULT NULL,
  `data_usuniecia_konta` date DEFAULT NULL,
  `data_modyfikacji_widcznej_nazwy` date DEFAULT NULL,
  `aktywny` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `użytkownicy`
--

INSERT INTO `użytkownicy` (`id`, `login`, `haslo`, `email`, `widoczna_nazwa`, `data_utworzenia_konta`, `data_modyfikacji_hasla`, `data_usuniecia_konta`, `data_modyfikacji_widcznej_nazwy`, `aktywny`) VALUES
(42, 'admin', '$2y$10$s.CwK/WLk38fVxZ3q192Ou7BNUrvLtIXjmmBxRvgc828K8PotAym6', 'admin@admin.pl', 'admin', '2025-01-13', NULL, NULL, NULL, '1'),
(47, 'dorota04', '$2y$10$u7fcmF2jaL/ql6Lpzd0VTe5cPKC9EajkWm83Rque614vXp96clrD.', 'dorotabober04@gmail.com', 'Dorota', '2025-01-31', NULL, NULL, NULL, '1'),
(48, 'wiola', '$2y$10$c/ReY5wMMJouhy8eg4j/N.iOusIjEIyDodmq3DNPBQORXRlo6jPaC', 'wiola9704@gmail.com', 'Wioletta', '2025-01-31', NULL, NULL, NULL, '1'),
(49, 'czytelnik', '$2y$10$1FG2JDB92qNnjUPIN7vTe.LdHzHKxG3uW.6NkhuQRKuq1csW2xf7O', 'czytelnik@gmail.com', 'Czytelnik', '2025-01-31', NULL, NULL, NULL, '1'),
(50, 'czytelniczka', '$2y$10$f0OPSyDA52TVA4cE/aAVdOXGuBCTMCmbC2f32Pbg18NV0JkTDNENy', 'czytelnik04@gmail.com', 'Czytelniczka', '2025-01-31', NULL, NULL, NULL, '1'),
(51, 'moderator', '$2y$10$7i/7ZEZYQ5GMvOXtGK9yDObMN34qDKvWQj1dQ/heXXtPWfrB6ixVS', 'moderator@gmail.com', 'Moderator', '2025-01-31', NULL, NULL, NULL, '1');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artykuly_użytkownicy_fk` (`użytkownicy_id`);

--
-- Indeksy dla tabeli `asoc_artykul_kategoria`
--
ALTER TABLE `asoc_artykul_kategoria`
  ADD PRIMARY KEY (`id_asoc`),
  ADD KEY `asoc_artykul_kategoria_artykuly_fk` (`artykuly_id`),
  ADD KEY `asoc_artykul_kategoria_kategorie_artykuly_fk` (`kategorie_artykuly_id`);

--
-- Indeksy dla tabeli `asoc_artykul_tag`
--
ALTER TABLE `asoc_artykul_tag`
  ADD PRIMARY KEY (`id_asoc`),
  ADD KEY `asoc_artykul_tag_artykuly_fk` (`artykuly_id`),
  ADD KEY `asoc_artykul_tag_tagi_artykuly_fk` (`tagi_artykuly_id`);

--
-- Indeksy dla tabeli `asoc_rola_user`
--
ALTER TABLE `asoc_rola_user`
  ADD PRIMARY KEY (`id_asoc`),
  ADD KEY `asoc_rola_user_rola_fk` (`rola_id`),
  ADD KEY `asoc_rola_user_użytkownicy_fk` (`użytkownicy_id`);

--
-- Indeksy dla tabeli `kategorie_artykuly`
--
ALTER TABLE `kategorie_artykuly`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentarze_artykuly_fk` (`artykuly_id`),
  ADD KEY `komentarze_użytkownicy_fk` (`użytkownicy_id`);

--
-- Indeksy dla tabeli `rola`
--
ALTER TABLE `rola`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tagi_artykuly`
--
ALTER TABLE `tagi_artykuly`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artykuly`
--
ALTER TABLE `artykuly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `asoc_artykul_kategoria`
--
ALTER TABLE `asoc_artykul_kategoria`
  MODIFY `id_asoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `asoc_artykul_tag`
--
ALTER TABLE `asoc_artykul_tag`
  MODIFY `id_asoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asoc_rola_user`
--
ALTER TABLE `asoc_rola_user`
  MODIFY `id_asoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kategorie_artykuly`
--
ALTER TABLE `kategorie_artykuly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rola`
--
ALTER TABLE `rola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tagi_artykuly`
--
ALTER TABLE `tagi_artykuly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `użytkownicy`
--
ALTER TABLE `użytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artykuly`
--
ALTER TABLE `artykuly`
  ADD CONSTRAINT `artykuly_użytkownicy_fk` FOREIGN KEY (`użytkownicy_id`) REFERENCES `użytkownicy` (`id`);

--
-- Constraints for table `asoc_artykul_kategoria`
--
ALTER TABLE `asoc_artykul_kategoria`
  ADD CONSTRAINT `asoc_artykul_kategoria_artykuly_fk` FOREIGN KEY (`artykuly_id`) REFERENCES `artykuly` (`id`),
  ADD CONSTRAINT `asoc_artykul_kategoria_kategorie_artykuly_fk` FOREIGN KEY (`kategorie_artykuly_id`) REFERENCES `kategorie_artykuly` (`id`);

--
-- Constraints for table `asoc_artykul_tag`
--
ALTER TABLE `asoc_artykul_tag`
  ADD CONSTRAINT `asoc_artykul_tag_artykuly_fk` FOREIGN KEY (`artykuly_id`) REFERENCES `artykuly` (`id`),
  ADD CONSTRAINT `asoc_artykul_tag_tagi_artykuly_fk` FOREIGN KEY (`tagi_artykuly_id`) REFERENCES `tagi_artykuly` (`id`);

--
-- Constraints for table `asoc_rola_user`
--
ALTER TABLE `asoc_rola_user`
  ADD CONSTRAINT `asoc_rola_user_rola_fk` FOREIGN KEY (`rola_id`) REFERENCES `rola` (`id`),
  ADD CONSTRAINT `asoc_rola_user_użytkownicy_fk` FOREIGN KEY (`użytkownicy_id`) REFERENCES `użytkownicy` (`id`);

--
-- Constraints for table `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_artykuly_fk` FOREIGN KEY (`artykuly_id`) REFERENCES `artykuly` (`id`),
  ADD CONSTRAINT `komentarze_użytkownicy_fk` FOREIGN KEY (`użytkownicy_id`) REFERENCES `użytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
