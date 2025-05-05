a = float(input("Ile wynosi pierwszy bok prostokata? "))
b = float(input("Ile wynosi drugi bok prostokata? "))

op = int(input("Co chcesz policzyc? 1 - pole, 2 - obwod: "))



if op == 1:
    wynik = a * b
    print(f"Pole prostokąta to: {wynik}")
else:
    wynik = 2 * a + 2 * b
    print(f"Obwód prostokąta to: {wynik}")


