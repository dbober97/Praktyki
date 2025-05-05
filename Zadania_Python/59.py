import random

gramy = "TAK"

while gramy == "TAK":
    los = random.randint(1, 100)
    print(los)
    szansa = 0
    liczba = int(input("Podaj wylosowana liczbe: "))
    while liczba != los:
        szansa += 1
        if szansa == 5:
            gramy = input("Za duzo prob, przegrales. Chcesz zagrac jeszcze raz? [wpisz TAK lub NIE]: ")
            break
        if liczba < los:
            liczba = int(input("Podales za mala liczbe, podaj kolejna: "))
        else:
            liczba = int(input("Podales za duza liczbe, podaj kolejna: "))

    if szansa != 5:
        gramy = input("Gratulacje! Gramy jeszcze raz? [wpisz TAK lub NIE]: ")
print("Koniec gry")
