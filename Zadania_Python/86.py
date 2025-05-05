import pickle

class Pracownik:
    def __init__(self, imie, nazwisko):
        self.__imie = imie
        self.__nazwisko = nazwisko
        self.__praca = set()

    def getImie(self):
        return self.__imie

    def getNazwisko(self):
        return self.__nazwisko

    def getPraca(self):
        return self.__praca

    def setImie(self, imie):
        self.__imie = imie

    def setNazwisko(self, nazwisko):
        self.__nazwisko = nazwisko

    def setPraca(self, praca):
        self.__praca = praca

class Firma:

    def __init__(self, nazwa, miasto):
        self.__nazwa = nazwa
        self.__miasto = miasto
        self.__pracownicy = set()

    def getNazwa(self):
        return self.__nazwa

    def getMiasto(self):
        return self.__miasto

    def getPracownicy(self):
        return self.__pracownicy

    def setNazwa(self, nazwa):
        self.__nazwa = nazwa

    def setMiasto(self, miasto):
        self.__miasto = miasto

    def setPracownicy(self, pracownicy):
        self.__pracownicy = pracownicy

class BazaController:
    def __init__(self):
        self.__pracownicy = []
        self.__firmy = []

    def getPracownicy(self):
        return self.__pracownicy

    def setPracownicy(self, pracownicy):
        self.__pracownicy = pracownicy

    def getFirmy(self):
        return self.__firmy

    def setFirmy(self, firmy):
        self.__firmy = firmy

    def dodajFirma(self, nazwa, miasto):
        ok = True
        for i in self.__firmy:
            if i.getNazwa() == nazwa:
                ok = False
                break

        if ok:
                firma = Firma(nazwa, miasto)
                self.__firmy.append(firma)
        return ok

    def usunFirma(self, nazwa):
        znaleziono = False
        ok = False
        for i in self.__firmy:
            if i.getNazwa() == nazwa:
                znaleziono = True
                if len(i.getPracownicy()) == 0:
                    self.__firmy.remove(i)
                    ok = True
        return znaleziono, ok


    def pokazFirmy(self):
        for n, i in enumerate(self.__firmy):
            print (f"{n+1}. Nazwa: {i.getNazwa()}, Miasto: {i.getMiasto()}")

    def dodajPracownik(self, imie, nazwisko):
        ok = True
        for i in self.__pracownicy:
            if i.getNazwisko() == nazwisko and i.getImie() == imie:
                ok = False

        if ok:
            pracownik = Pracownik(imie, nazwisko)
            self.__pracownicy.append(pracownik)
        return ok

    def usunPracownik(self, nazwisko):
        znaleziono = False
        ok = False
        for i in self.__pracownicy:
            if i.getNazwisko() == nazwisko:
                znaleziono = True
                if len(i.getPraca()) == 0:
                    self.__pracownicy.remove(i)
                    ok = True
        return znaleziono, ok

    def pokazPracownikow(self):
        for n, i in enumerate(self.__pracownicy):
            print (f"{n + 1}. Imie: {i.getImie()}, Nazwisko: {i.getNazwisko()}")


    def zatrudnij(self, imie, nazwisko, firma):
        ok1 = False #szukamy pracownika na liscie
        ok2 = False #szukamy firmy na liscie
        ok = False #zatrudniono

        n1 = 0
        n2 = 0

        for n, i in enumerate(self.__pracownicy):
            if i.getNazwisko() == nazwisko and i.getImie() == imie:
                ok1 = True
                n1 = n
                break

        for n, i in enumerate(self.__firmy):
            if i.getNazwa() == firma:
                ok2 = True
                n2 = n
                break

        if ok1 and ok2 and firma not in self.__pracownicy[n1].getPraca():
            zbior = self.__pracownicy[n1].getPraca()
            zbior.add(firma)
            self.__pracownicy[n1].setPraca(zbior)

            zbior2 = self.__firmy[n2].getPracownicy()
            zbior2.add(f"{imie} {nazwisko}")
            self.__firmy[n2].setPracownicy(zbior2)
            ok = True

        return ok1, ok2, ok

    def zwolnij(self, nazwisko, firma):
        ok1 = False #szukamy pracownika na liscie
        ok2 = False #szukamy firmy na liscie firm pracownika
        ok = False #sprawdzamy, czy osoba pracuje w tej firmie
        imie = ""

        n1 = 0
        n2 = 0

        for n, i in enumerate(self.__pracownicy):
            if i.getNazwisko() == nazwisko:
                imie = i.getImie()
                ok1 = True
                n1 = n
                break

        for n, i in enumerate(self.__firmy):
            if i.getNazwa() == firma:
                ok2 = True
                n2 = n
                break


        if ok1 and ok2 and firma in self.__pracownicy[n1].getPraca():
            zbior = self.__pracownicy[n1].getPraca()
            zbior.remove(firma)
            self.__pracownicy[n1].setPraca(zbior)

            zbior2 = self.__firmy[n2].getPracownicy()
            zbior2.remove(f"{imie} {nazwisko}")
            self.__firmy[n2].setPracownicy(zbior2)
            ok = True

        return ok1, ok2, ok

    def zatrudnienie(self):
        indeks = 1
        for n, i in enumerate(self.__firmy):
            for nn, ii in enumerate(i.getPracownicy()):
                print(f"{indeks + nn}. {i.getNazwa()} {i.getMiasto()}: {ii}")
            indeks += len(i.getPracownicy())

    def zapisz(self):
        plik = open("86", "wb")
        pickle.dump(self.__firmy, plik)
        pickle.dump(self.__pracownicy, plik)
        plik.close()

class Baza(BazaController):

    def __init__(self):
        super().__init__()

        try:
            plik = open("86", "rb")
            lista = pickle.load(plik)
            lista2 = pickle.load(plik)
            self.setFirmy(lista)
            self.setPracownicy(lista2)
            plik.close()

        except:
            plik = open("86", "wb")
            pickle.dump([], plik)
            pickle.dump([], plik)
            plik.close()

        self.menu()


    def menu(self):

        while(True):

            print("MENU GŁÓWNE")

            try:
                menu = int(input("1 - Firma, 2 - Pracownik, 3 - zatrudnienie, 4 - koniec "))
            except:
                continue

            if menu == 1:

                print("MODUŁ ZARZĄDZANIA FIRMAMI ")

                while(True):

                    try:
                        menu1 = int(input("1 - dodaj firme, 2 - usun firme, 3 - pokaz firmy, 4 - powrot do menu glownego "))
                    except:
                        continue

                    if menu1 == 1:
                        nazwa = input("Nazwa: ").upper().strip()
                        miasto = input("Miasto: ").upper().strip()

                        ok = self.dodajFirma(nazwa, miasto)

                        if ok:
                            print("Zarejestrowano firme")
                            self.zapisz()

                        else:
                            print("Firma o takiej nazwie juz istnieje")

                    elif menu1 == 2:
                        nazwa = input("Nazwa: ").upper().strip()
                        ok = self.usunFirma(nazwa)

                        if not ok[0]:
                            print("Brak firmy w bazie")
                        elif not ok[1]:
                            print("Firma zatrudnia pracownikow, nie można jej zlikwidowac")
                        else:
                            print("Firma zostala usunieta")

                        self.zapisz()

                    elif menu1 ==3:
                        print("Firmy w bazie:")
                        self.pokazFirmy()

                    elif menu1 == 4:
                        break

            elif menu == 2:

                print("MODUŁ ZARZĄDZANIA LISTĄ PRACOWNIKÓW ")

                while(True):



                    try:
                        menu2 = int(input(
                            "1 - dodaj pracownika, 2 - usun pracownika, 3 - pokaz pracownikow, 4 - powrot do menu glownego "))
                    except:
                        continue

                    if menu2 == 1:
                        imie = input("Imie: ").upper().strip()
                        nazwisko = input("Nazwisko: ").upper().strip()

                        ok = self.dodajPracownik(imie, nazwisko)

                        if ok:
                            print("Zarejestrowano pracownika w bazie")
                            self.zapisz()

                        else:
                            print("Pracownik juz istnieje w bazie")

                    elif menu2 == 2:
                        nazwisko = input("Nazwisko: ").upper().strip()

                        ok = self.usunPracownik(nazwisko)
                        if not ok[0]:
                            print("Brak pracownika w bazie")
                        elif not ok[1]:
                            print("Osoba jest zatrudniona na przynajmniej jednym stanowisku, nie mozna jej usunac")
                        else:
                            print("Osoba zostala usunieta z bazy")

                        self.zapisz()

                    elif menu2 == 3:
                        print("Pracownicy w bazie")
                        self.pokazPracownikow()


                    elif menu2 == 4:
                        break

            elif menu == 3:

                print("MODUŁ ZARZĄDZANIA ZATRUDNIENIEM")

                while(True):

                    try:
                        menu3 = int(input("1 - zatrudnij, 2 - zwolnij, 3 - pokaz zatrudnienie, 4 - powrot do menu glownego "))
                    except:
                        continue

                    if menu3 == 1:
                        imie = input("Imie: ").upper().strip()
                        nazwisko = input("Nazwisko: ").upper().strip()
                        firma = input("Firma: ").upper().strip()
                        ok = self.zatrudnij(imie, nazwisko, firma)

                        if not ok[0]:
                            print("Brak pracownika w bazie")

                        elif not ok[1]:
                            print("Brak firmy w bazie")

                        elif ok[2]:
                            print("Zatrudniono pracownika")

                        else:
                            print("Pracownik juz pracuje w tej firmie")

                        self.zapisz()


                    elif menu3 == 2:
                        nazwisko = input("Nazwisko: ").upper().strip()
                        firma = input("Firma: ").upper().strip()
                        ok = self.zwolnij(nazwisko, firma)

                        if not ok[0]:
                            print("Brak pracownika w bazie")

                        elif not ok[1]:
                            print("Brak firmy w bazie")

                        elif ok[2]:
                            print("Zwolniono pracownika")
                        else:
                            print("Taka osoba nie pracuje w tej firmie")


                    elif menu3 == 3:
                        self.zatrudnienie()

                    elif menu3 == 4:
                        break

            elif menu == 4:
                break

baza = Baza()