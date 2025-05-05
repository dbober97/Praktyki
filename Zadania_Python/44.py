a = float(input("a: "))
op = input("+, -, /, *: ")
b = float(input("b: "))


if op == "+":
    wynik = a + b
elif op == "-":
    wynik = a - b
elif op == "*":
    wynik = a * b
elif op == "/":
    if b == 0:
        wynik = "Nie wolno dzielic przez 0!!!"
    else:
        wynik = a / b

if type(wynik) == str:
    print(wynik)
else:
    print(f"a {op} b = {wynik}")


