/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package nfz;

import java.io.Serializable;

public class Pacjent implements Serializable{
    String imie, nazwisko;
    String[] choroby = {};
    final int PESEL;
    
    Pacjent(String imie, String nazwisko, int PESEL )
    {
        this.imie = imie;
        this.nazwisko = nazwisko;
        this.PESEL = PESEL;
    }
    
    String info()
    {
        return "IMIE: " + imie + " NAZWISKO:  " +nazwisko +  " PESEL: " + PESEL;
    }
    
    /**
     *
     * @param obj
     * @return
     */
    @Override
        public boolean equals(Object obj)
        {
            if(this == obj) return true;
            if(obj == null)return false;
            if (getClass() != obj.getClass()) return false;
            Pacjent obiekt = (Pacjent)obj;
        return this.PESEL == obiekt.PESEL;
        }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 59 * hash + this.PESEL;
        return hash;
    }

}
