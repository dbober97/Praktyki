class Metody:

    def __init__(self):
        self.__lista = []

    def getLista(self):
        return self.__lista

    def setLista(self, lista):
        self.__lista = lista

    def dodaj(self, imie, nazwisko, grupa):
        ok = True
        for i in self.__lista:
            lista = i.strip().split(";")
            if lista[0] == imie and lista[1] == nazwisko:
                ok = False
                break
        if ok:
            self.__lista.append(f"{imie};{nazwisko};{grupa};|;0\n")

        return ok

    def usun(self, nazwisko):
        ok = False
        for i in self.__lista:
            if i.strip().split(";")[1] == nazwisko:
                self.__lista.remove(i)
                ok = True
                break
        return ok

    def zmien(self, imie, nazwisko, noweNazwisko, grupa):
        ok = False
        for k, i in enumerate(self.__lista):
            l = i.strip().split(";")
            if l[1] == nazwisko:
                l[0] = imie
                l[1] = noweNazwisko
                l[2] = grupa
                self.__lista[k] = f"{l[0]};{l[1]};{l[2]};{l[3]};{l[4]}\n"
                ok = True
                break
        return ok

    def pokaz(self):
        print("LISTA STUDENTOW")
        for n, i in enumerate(self.__lista):
            l = i.strip().split(";")
            print(f"{n+1}. Imie: {l[0]}, Nazwisko: {l[1]}, Grupa: {l[2]}, Oceny: {l[3]}, Srednia: {l[4]}")

    def dodajOcena(self, nazwisko, ocena):
        ok = False
        for k, i in enumerate(self.__lista):
            l = i.strip().split(";")
            if l[1] == nazwisko:
                ok = True
                oceny = l[3].split("|")
                oceny.remove("")
                oceny.remove("")
                suma = ocena
                n = 1
                for j in oceny:
                    jj = int(j)
                    suma += jj
                    n += 1

                srednia = suma/n
                l[3] = l[3]+f"{ocena}|"
                l[4] = srednia
                self.__lista[k] = f"{l[0]};{l[1]};{l[2]};{l[3]};{l[4]}\n"
                break
        return ok

    def szukaj(self, fraza):
        ok = False
        for n, i in enumerate(self.__lista):
            l = i.strip().split(";")
            if fraza in l[0] or fraza in l[1]:
                ok = True
                print(f"Imie: {l[0]}, Nazwisko: {l[1]}, Grupa: {l[2]}")

        return ok

    def zapisz(self):
        plik = open("85.txt", "w")
        for i in self.__lista:
            plik.write(i)
        plik.close()


class Wszyscy(Metody):
    def __init__(self):
        super().__init__()

        try:
            lista = []
            plik = open("85.txt", "r")
            for i in plik:
                lista.append(i)
            self.setLista(lista)
            plik.close()
        except:
            plik = open("85.txt", "w")
            plik.close()

        self.menu()

    def menu(self):

        print("MENU")

        while(True):

            menu = input("D - dodaj, P - pokaz, U - usun, Z - zmien dane,"
                         " DO - dodaj ocene, SZ - znajdz po fragmencie imienia/mazwiska,"
                         " Q - wyjscie ").upper().strip()

            if menu == "D":
                imie = input("Podaj imie studenta: ").upper().strip()
                nazwisko = input("Podaj nazwisko studenta: ").upper().strip()
                grupa = input("Podaj numer grupy studenta: ").upper().strip()
                ok = self.dodaj(imie, nazwisko, grupa)
                if ok:
                    print("Pomyslnie dodano studenta na liste...")
                    self.zapisz()
                else:
                    print("Student juz jest na liscie...")

            elif menu == "P":
                self.pokaz()

            elif menu == "U":
                nazwisko = input("Podaj nazwisko studenta do usuniecia: ").upper().strip()
                ok = self.usun(nazwisko)
                if ok:
                    print("Pomyslnie usunieta studenta z listy...")
                    self.zapisz()
                else:
                    print("Nieprawidlowe nazwisko...")

            elif menu == "Z":
                nazwisko = input("Podaj nazwisko studenta: ").upper().strip()
                noweNazwisko = input("Podaj nowe nazwisko studenta: ").upper().strip()
                imie = input("Podaj nowe imie studenta: ").upper().strip()
                grupa = input("Podaj nowy numer grupy studenta: ").upper().strip()
                ok = self.zmien(imie, nazwisko, noweNazwisko, grupa)
                if ok:
                    print("Pomyslnie zmodyfikowano dane studenta...")
                    self.zapisz()
                else:
                    print("Nieprawidlowe nazwisko...")

            elif menu == "DO":
                nazwisko = input("Podaj nazwisko studenta: ").upper().strip()
                ocena = int(input("Dodaj ocene studentowi 1-6: "))
                if ocena not in range(1, 7):
                    print("Skala ocen: 1,2,3,4,5,6")
                    continue
                ok = self.dodajOcena(nazwisko, ocena)
                if ok:
                    print("Dodano ocene...")
                    self.zapisz()
                else:
                    print("Nieprawidlowe nazwisko...")

            elif menu == "SZ":
                fraza = input("Kogo chcesz wyszukac? ").strip().upper()
                print("Znalezieni studenci...")
                ok = self.szukaj(fraza)
                if not ok:
                    print("BRAK")

            elif menu == "Q":
                self.zapisz()
                break

app = Wszyscy()