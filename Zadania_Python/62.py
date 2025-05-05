lista = []

print("Podaj ciag liczb calkowitych: ")
x = 1

while x:
    x = int(input(""))
    lista.append(x)

lista.remove(0)

if len(lista) != 0:
    min = lista[0]
    max = lista[0]
    suma = 0

    for x in lista:
        suma += x
        if x > max:
            max = x
        elif x < min:
            min = x

    sr = suma / len(lista)

    print(f"max = {max}")
    print(f"min = {min}")
    print(f"Średnia arytmetyczna: {sr}")







