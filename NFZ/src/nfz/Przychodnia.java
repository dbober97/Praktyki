/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package nfz;

import java.io.Serializable;

/**
 *
 * @author Dorota
 */
public class Przychodnia implements Serializable {
    String nazwa, miasto;
    Pacjent[] pacjenci = {}; 
    final int id;
    
    Przychodnia(String nazwa, String miasto,int id)
    {
        this.miasto = miasto;
        this.nazwa = nazwa;
        this.id = id;
    }
    
    String info()
    {
        return "ID: " + id + " NAZWA: " + nazwa + " MIASTO: " + miasto;
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
            Przychodnia obiekt = (Przychodnia)obj;
        return this.id == obiekt.id;
        }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 97 * hash + this.id;
        return hash;
    } 
}
