figura = int(input("Jaka figura? 1 - prostokąt, 2 - trójkąt: "))

if figura == 1:
    a = float(input("Podaj długość boku a: "))
    b = float(input("Podaj długość boku b: "))
    wynik = a * b
    print(f"Pole prostokąta to: {wynik}")
else:
    a = float(input("Podaj długość podstawy trójkąta: "))
    h = float(input("Podaj wysokość trójkąta: "))
    wynik = a * h / 2
    print(f"Pole trójkąta to: {wynik}")
