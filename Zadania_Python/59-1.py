import random

zle = 0

for i in range(10):
    print(f"{i+1}: ")
    a = random.randint(1, 10)
    b = random.randint(1, 10)
    op = random.randint(1, 3)

    dzialanie = {1:"+", 2:"-", 3:"*"}

    ok = False

    while not ok:
        wynikWprowadzony = int(input(f"Ile to jest {a} {dzialanie[op]} {b}? "))

        if op == 1:
            wynik = a + b
        elif op == 2:
            wynik = a - b
        elif op == 3:
            wynik = a * b

        if wynik == wynikWprowadzony:
            ok = True
        else:
            zle +=1

print(f"Poprawnych odpowiedzi: {10-zle}")
print(f"Błędnych odpowiedzi: {zle}")






