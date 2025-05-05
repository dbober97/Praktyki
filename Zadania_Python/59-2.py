import random

for i in range(5):
    a = random.randint(1, 10)
    b = random.randint(1, 10)

    ok = False

    while not ok:
        wynik = int(input(f"Ile to jest {a} * {b}? "))
        if wynik == a*b:
            ok = True

