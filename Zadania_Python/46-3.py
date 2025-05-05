wzrost = int(input("Podaj wzrost w cm: "))

if 0 < wzrost < 165:
    print("Niski wzrost")
elif wzrost < 175:
    print("Średni wzrost")
else:
    print("Wysoki wzrost")
