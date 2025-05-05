haslo = input("Poda haslo do odgadniecia: ")
literyGracza = set()
litera = " "
szansa = 5

while True:

    k = True

    for x in haslo:
        if x in literyGracza:
            print(x, end=" ")
        else:
            print("*", end=" ")
            k = False

    if k:
        print("\nKoniec gry, wygrales!")
        break

    if szansa != 0:
        print(f"\nDostepna ilosc pomylek: {szansa}.")
    else:
        print("\nPrzegrales. Koniec gry.")
        break

    litera = input("\nPodaj litere: ")

    if len(litera) == len(haslo):
        b = True
        for i, x in enumerate(haslo):
            if x != litera[i]:
                b = False
        if b:
            print("Koniec gry, wygrales!")
            break

    if litera in literyGracza:
        print("Ta litere juz podawales, podaj inna!")
        continue
    else:
        literyGracza.add(litera)


    if litera not in haslo:
        szansa -= 1


