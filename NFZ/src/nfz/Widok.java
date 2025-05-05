/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package nfz;


import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.Scanner;
import javax.swing.JOptionPane;

/**
 *
 * @author Dorota
 */

public class Widok extends Kontroler {
    

    
    Widok() throws IOException, FileNotFoundException, ClassNotFoundException
    {
        super();
    }
    
    Scanner in = new Scanner(System.in);


    void menu() throws IOException, FileNotFoundException, ClassNotFoundException
    {  
           boolean koniec = false;
           while(!koniec){
           System.out.println("1 - aplikacja okienkowa, 2 - kontynuuj konsola: lista przychodni, 3 - koniec");
           int i = in.nextInt();
            switch (i){
                    case 1: 
                    {
                        oknoPowitalne oknoPowitania = new oknoPowitalne();
                        oknoPowitania.setVisible(true);
                        koniec = true;
                        break;
                    }
                    case 2: 
                    {   
                        System.out.println("Aktualna lista przychodni w NFZ");
                        for(int k=0; k<listaPrzychodni.length; k++)
                        {
                            System.out.println(listaPrzychodni[k].info());
                        }

                        boolean koniec2 = false;
                        while(!koniec2)
                        {
                            System.out.println("1 - dodaj przychodnie, 2 - usun przychodnia, 3 - pokaz pacjentow przychodni, 4 - powrot");
                            int m=in.nextInt();
                            
                            if(m==1)
                            {
                                String nazwa, miasto;
                                int id;
                                System.out.println("Podaj nazwe nowej przychodni: ");
                                nazwa = in.next();
                                System.out.println("Podaj miasto: ");
                                miasto = in.next();
                                //id = kon.listaPrzychodni.length + 1;
                                //System.out.println("Id nowej przychodni to: " + id);
                                dodajPrzychodnia(nazwa, miasto);
                                zapisz();
                                System.out.println("Przychodnia pomyslnie dodana");
                                zapisz();
                            }
                            if(m==3)
                            {
                                int id;
                                System.out.println("Podaj id przychodni, ktorej pacjentow chcesz obejrzec: ");
                                id = in.nextInt();
                                for(int ii=0; ii<listaPrzychodni.length; ii++)
                                {
                                    if(listaPrzychodni[ii].id == id)
                                    {
                                        for(int iii=0; iii<listaPrzychodni[ii].pacjenci.length; iii++)
                                        {
                                            System.out.println(listaPrzychodni[ii].pacjenci[iii].info());
                                        }
                                        
                                        break;
                                    }
                                    
                                }
                                boolean koniecCH = false;
                                while(!koniecCH)
                                {
                                System.out.println("1 - dodaj pacjenta do przychodni, 2 - usuń pacjenta, 3 - dodaj chorobe pacjentowi, 4 - pokaz choroby pacjenta, 5 - powrot ");
                                int ch = in.nextInt();
                                
                                
                                if(ch == 1)
                                {
                                    System.out.print("Podaj imie: ");
                                    String imie = in.next();
                                    System.out.print("Podaj nazwisko: ");
                                    String nazwisko = in.next();
                                    System.out.print("Podaj PESEL:");
                                    int PESEL = in.nextInt();
                                    dodajPacjent(imie, nazwisko, PESEL, id);
                                    zapisz();
                                    System.out.println("Pomyslnie dodano pacjenta");
                                }
                                
                                if(ch == 2)
                                {
                                    System.out.print("Podaj PESEL:");
                                    int PESEL = in.nextInt();
                                    usunPacjent(PESEL, id);
                                    System.out.println("Podaj PESEL:");
                                    zapisz();
                                    System.out.println("Pomslnie usunięto pacjenta");
                                }
                                
                                if(ch == 3)
                                {
             
                                    System.out.print("Podaj PESEL pacjenta: ");
                                    int PESEL = in.nextInt();
                                    System.out.print("Podaj nazwe choroby: ");
                                    String choroba = in.next();
                                    dodajChoroba(choroba, PESEL, id);
                                    System.out.println("Choroba zostala pomyslnie dodana");
                                    zapisz();
                                }
                                
                                if(ch==4)
                                {
                                    System.out.print("Podaj PESEL pacjenta: ");
                                    int PESEL = in.nextInt();
                                    for(int p=0; p<listaPrzychodni.length; p++)
                                    {
                                        if(id == listaPrzychodni[p].id)
                                        {
                                            for(int pp=0; pp<listaPrzychodni[p].pacjenci.length; pp++)
                                            {
                                                if(PESEL == listaPrzychodni[p].pacjenci[pp].PESEL)
                                                {
                                                    for(int chor=0; chor<listaPrzychodni[p].pacjenci[pp].choroby.length; chor++)
                                                    {
                                                        System.out.println(chor+1 + " " +  listaPrzychodni[p].pacjenci[pp].choroby[chor] );
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                
                                if(ch==5)
                                {
                                    koniecCH=true;
                                    break;
                                }
                                
                                }
                           
                            }
                            if(m==2)
                            {
                                int id;
                                System.out.println("Podaj id przychodni, która chcesz zlikwidowac: ");
                                id = in.nextInt();
                                usunPrzychodnia(id);
                                zapisz();
                                System.out.println("Przychodnia pomyslnie zlikwidowana");
                                break;
                            }
                            if(m==4)
                            {
                               koniec2=true;
                               break; 
                            }
                        }
                        
                        break;
                    }
                    case 3:
                    {
                        JOptionPane.showMessageDialog(null, "Dziekujemy za wizyte!");
                        zapisz();
                        koniec = true;
                        break; 
                    }           
            }
           }
        }  
    }