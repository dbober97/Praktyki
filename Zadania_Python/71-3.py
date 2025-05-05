import pickle

class Pacjent:
    def __init__(self, imie, nazwisko):
        self.__imie = imie
        self.__nazwisko = nazwisko
        self.__choroby = []

    def __str__(self):
        return (f"Imie: {self.__imie}, Nazwisko: {self.__nazwisko}")

    def getImie(self):
        return self.__imie

    def getNazwisko(self):
        return self.__nazwisko

    def getChoroby(self):
        return self.__choroby

    def setImie(self, imie):
        self.__imie = imie

    def setNazwisko(self, nazwisko):
        self.__nazwisko = nazwisko

    def setChoroby(self, choroby):
        self.__choroby = choroby

class Przychodnia:
    def __init__(self, nazwa, miasto):
        self.__nazwa = nazwa
        self.__miasto = miasto
        self.__pacjenci = []

    def __str__(self):
        return (f"Nazwa: {self.__nazwa}, Miasto: {self.__miasto}")

    def getNazwa(self):
        return self.__nazwa

    def getMiasto(self):
        return self.__miasto

    def getPacjenci(self):
        return self.__pacjenci

    def setNazwa(self, nazwa):
        self.__nazwa = nazwa

    def setMiasto(self, miasto):
        self.__miasto = miasto

    def setPacjenci(self, pacjenci):
        for n, i in enumerate(self.__pacjenci):
            i = pacjenci[n]

class NfzController:

    def __init__(self):
        self.__listaPrzychodni = []


    def zapisz(self):
        plik = open("71-3", "wb")
        pickle.dump(self.__listaPrzychodni, plik)
        plik.close()

    def getListaPrzychodni(self):
        return self.__listaPrzychodni


    def setListaPrzychodni(self, lista):
        self.__listaPrzychodni = lista


    def dodajPrzychodnie(self, nazwa, miasto):
        przychodnia = Przychodnia(nazwa, miasto)

        ok = True

        for i in self.__listaPrzychodni:
            if i.getNazwa() == nazwa:
                ok = False
        if ok:
            self.__listaPrzychodni.append(przychodnia)

        return ok

    def usunPrzychodnie(self, nazwa):
        ok = False
        for i in self.__listaPrzychodni:
            if i.getNazwa() == nazwa:
                self.__listaPrzychodni.remove(i)
                ok = True
                break
        return ok



    def dodajPacjenta(self, imie, nazwisko, nazwa):
        pacjent = Pacjent(imie, nazwisko)
        ok = False
        for i in self.__listaPrzychodni:
            if i.getNazwa() == nazwa:
                lista = i.getPacjenci()
                lista.append(pacjent)
                i.setPacjenci(lista)
                ok = True
                break
        return ok

    def UsunPacjenta(self, imie, nazwisko, nazwa):
        ok = False
        for i in self.__listaPrzychodni:
            if i.getNazwa() == nazwa:
                for j in i.getPacjenci():
                    if j.getNazwisko() == nazwisko and j.getImie() == imie:
                        lista = i.getPacjenci()
                        lista.remove(j)
                        i.setPacjenci(lista)
                        ok = True
                        break
            if ok:
                break
        return ok


    def pokazPrzychodnie(self):
        print("PRZYCHODNIE W OKOLICY: ")

        for n, i in enumerate(self.__listaPrzychodni):
            print(f"{n+1}. {i}")


    def pokazPacjentowPrzychodni(self, nazwa):
        ok = False
        for i in self.__listaPrzychodni:
            if i.getNazwa() == nazwa:
                print(f"Lista pacjentow przychodni {nazwa}:")
                for n, j in enumerate(i.getPacjenci()):
                    print(f"{n+1}, {j}")
                ok = True
                break
        return ok


    def dodajChorobe(self, imie, nazwisko, choroba, nazwa):
        ok = False
        for i in self.__listaPrzychodni:
            if i.getNazwa() == nazwa:
                for j in i.getPacjenci():
                    if j.getNazwisko() == nazwisko and j.getImie() == imie:
                        lista = j.getChoroby()
                        lista.append(choroba)
                        j.setChoroby(lista)
                        ok = True
                        break
            if ok:
                break
        return ok


    def pokazChorobyPacjenta(self, imie, nazwisko, nazwa):
        ok = False
        for i in self.__listaPrzychodni:
            if i.getNazwa() == nazwa:
                for j in i.getPacjenci():
                    if j.getNazwisko() == nazwisko and j.getImie() == imie:
                        for n, k in enumerate(j.getChoroby()):
                            print (f"{n+1}. {k}")
                        ok = True
                        break
            if ok:
                break
        return ok

    # def pokazWszystko(self):
    #
    #     for n, i in enumerate(self.__listaPrzychodni):
    #         print(f"{n+1}. Przychodnia {i.getNazwa()} {i.getMiasto()}")
    #
    #         for nn, j in enumerate(i.getPacjenci()):
    #             print(f"   {nn+1}. {j}")
    #
    #             for nnn, k in enumerate(j.getChoroby()):
    #                 print(f"      {nnn+1}. {k}")


class Nfz(NfzController):

    def __init__(self):
        super().__init__()

        try:
            plik = open("71-3", "rb")
            lista = pickle.load(plik)
            self.setListaPrzychodni(lista)
            plik.close()

        except:
            plik = open("71-3", "wb")
            pickle.dump([], plik)
            plik.close()

        self.menu()


    def menu(self):
        print("Witamy w systemie NFZ...")

        while(True):

            try:
                menu = int(input("1 - przychodnia, 2 - pacjent, 3 - koniec "))
            except:
                continue

            if menu == 1:

                while(True):

                    print("MENU PRZYCHODNIA")

                    try:
                        menu1 = int(input("1 - dodaj przychodnie, 2 - usun przychodnie, 3 - dodaj pacjenta do przychodni, "
                                  "4 - usun pacjenta z przychodni, 5 - lista przychodni, 6 - lista pacjentow w przychodni, 7 - powrot " ))
                    except:
                        continue

                    if menu1 == 1:
                        nazwa = input("Podaj nazwe nowej przychodni: ").upper().strip()
                        miasto = input("Podaj lokalizacje nowej przychodni: ").upper().strip()
                        ok = self.dodajPrzychodnie(nazwa, miasto)
                        if ok:
                            print("Przychodnia została dodana...")
                            self.zapisz()
                        elif not ok:
                            print("Podana nazwa przychodni już istnieje...")


                    elif menu1 == 2:
                        nazwa = input("Podaj nazwe przychodni do usuniecia: ").upper().strip()
                        ok = self.usunPrzychodnie(nazwa)
                        if ok:
                            print("Przychodnia zostala usunieta z listy...")
                            self.zapisz()
                        else:
                            print("Nie znaleziono przychodni...")




                    elif menu1 == 3:
                        imie = input("Podaj imie nowego pacjenta: ").upper().strip()
                        nazwisko = input("Podaj nazwisko nowego pacjenta: ").upper().strip()
                        nazwa = input("Podaj nazwe przychodni: ").upper().strip()
                        ok = self.dodajPacjenta(imie, nazwisko, nazwa)
                        if ok:
                            print("Pomyslnie zapisano pacjenta do przychodni...")
                            self.zapisz()
                        else:
                            print("Nie znaleziono takiej przychodni...")



                    elif menu1 == 4:
                        nazwisko = input("Podaj nazwisko pacjenta do usuniecia: ").upper().strip()
                        imie = input("Podaj jego imie: ").upper().strip()
                        nazwa = input("Podaj nazwe przychodni, w ktorej jest zapisany: ").upper().strip()
                        ok = self.UsunPacjenta(imie, nazwisko, nazwa)
                        if ok:
                            print("Pomyslnie wypisano pacjenta z przychodni...")
                            self.zapisz()
                        else:
                            print("Nieprawidlowa nazwa przychodni lub dane pacjenta..")



                    elif menu1 == 5:
                        self.pokazPrzychodnie()

                    elif menu1 == 6:
                        nazwa = input("Podaj nazwe przychodni, ktorej pacjentow chcesz zobaczyc: ").upper().strip()
                        ok = self.pokazPacjentowPrzychodni(nazwa)
                        if not ok:
                            print("Nie znaleziono takiej przychodni...")

                    elif menu1 == 7:
                        self.zapisz()
                        break

            elif menu == 2:

                while(True):

                    print("MENU PACJENT")

                    try:
                        menu2 = int(input("1 - dodaj chorobe pacjentowi, 2 - pokaz choroby pacjenta, 3 - powrot "))
                    except:
                        continue

                    if menu2 == 1:
                        imie = input("Podaj imie chorego pacjenta: ").upper().strip()
                        nazwisko = input("Podaj nazwisko chorego pacjenta: ").upper().strip()
                        choroba = input(f"Podaj chorobe pacjenta: ").upper().strip()
                        nazwa = input(f"Podaj nazwe przychodni, w ktorej zapisany jest pacjent: ").upper().strip()
                        ok = self.dodajChorobe(imie, nazwisko, choroba, nazwa)
                        if ok:
                            print("Pomyslnie dodano chorobe...")
                            self.zapisz()
                        else:
                            print("Podano nieprawidlowa nazwe przychodni lub dane pacjenta...")

                    elif menu2 == 2:
                        imie = input("Podaj imie pacjenta: ").upper().strip()
                        nazwisko = input("Podaj nazwisko pacjenta: ").upper().strip()
                        nazwa = input(f"Podaj nazwe przychodni, w ktorej zapisany jest pacjent: ").upper().strip()
                        ok = self.pokazChorobyPacjenta(imie, nazwisko, nazwa)
                        if not ok:
                            print("Podano nieprawidlowe dane...")
                        else:
                            self.zapisz()

                    elif menu2 == 3:
                        self.zapisz()
                        break
            # elif menu == 4:
            #     self.pokazWszystko()

            elif menu == 3:
                self.zapisz()
                break

nfz = Nfz()