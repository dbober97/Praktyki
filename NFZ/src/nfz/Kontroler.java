
package nfz;


import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.EOFException;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextArea;

public class Kontroler extends JFrame {
    Przychodnia[] listaPrzychodni = {};

    ObjectOutputStream wy = null;
    ObjectInputStream we = null;
    
    Kontroler() throws FileNotFoundException, IOException, ClassNotFoundException
    {
        super();
  
        try
        {
            we = new ObjectInputStream(new BufferedInputStream(new FileInputStream("Przychodnie.bin"))); 
            int z=0;
            while(true)
            {
                Przychodnia p = (Przychodnia)(we.readObject());
                int k = listaPrzychodni.length;
                Przychodnia[] pomoc = new Przychodnia[k+1];
                for(int i=0; i<k; i++)
                {
                    pomoc[i] = listaPrzychodni[i];
                }
                
                listaPrzychodni = new Przychodnia[k+1];
                
                for(int i=0; i<k; i++)
                {
                    listaPrzychodni[i] = pomoc[i];
                }
                
                listaPrzychodni[k] = p;
                z++;
                
            }
        }
        catch(EOFException e){}
        catch(FileNotFoundException f){}
        finally
        {
            if(we != null) we.close();
        }
    }
    
    
    void zapisz() throws FileNotFoundException, IOException
    {
        try
        {
            wy = new ObjectOutputStream(new BufferedOutputStream(new FileOutputStream("Przychodnie.bin")));
            int k = listaPrzychodni.length;
            for(int i=0; i<k; i++)
            {
                wy.writeObject(listaPrzychodni[i]);
            }
            
        }
        finally
        {
            if(wy != null) wy.close();
        }
        
    }
    
    void dodajPrzychodnia(String nazwa, String miasto)
    {
        int k = listaPrzychodni.length;
        int maxID = 0;
        Przychodnia[] pomoc = new Przychodnia[k+1];
        for(int i=0; i<k; i++)
        {
            pomoc[i] = listaPrzychodni[i];
            if(listaPrzychodni[i].id > maxID) maxID = listaPrzychodni[i].id;
        }
        listaPrzychodni = new Przychodnia[k+1];
        for(int i=0; i<k; i++)
        {
            listaPrzychodni[i] = pomoc[i];
        }
        listaPrzychodni[k] = new Przychodnia(nazwa, miasto, maxID+1);
        
    }
    
    void usunPrzychodnia(int id)
    {
      for(int i=0; i< listaPrzychodni.length; i++)
      {
          if(listaPrzychodni[i].id==id)
          {
            int k = listaPrzychodni.length;
            Przychodnia[] pomoc = new Przychodnia[k-1];
            for(int l=0; l<i; l++)
            {
                pomoc[l] = listaPrzychodni[l];
            }
            for(int l=i+1; l<k; l++)
            {
                pomoc[l-1] = listaPrzychodni[l];
            }
            listaPrzychodni = new Przychodnia[k-1];
            for(int l=0; l<k-1; l++)
            {
                listaPrzychodni[l] = pomoc[l];
            }
            break;
           }
      }
    }
    
    void dodajPacjent(String imie, String nazwisko, int PESEL, int idPrzychodnia)
    {
        
        int m = listaPrzychodni.length;
        for(int i=0; i<m; i++)
        {
            if (listaPrzychodni[i].id == idPrzychodnia)
            {
                int k = listaPrzychodni[i].pacjenci.length;
                Pacjent[] pomoc = new Pacjent[k+1];

                for(int l=0; l<k; l++)
                  {
                    pomoc[l] = listaPrzychodni[i].pacjenci[l];
                  } 

                listaPrzychodni[i].pacjenci = new Pacjent[k+1];
                for(int l=0; l<k; l++)
                {
                    listaPrzychodni[i].pacjenci[l] = pomoc[l];
                }
                listaPrzychodni[i].pacjenci[k] = new Pacjent(imie, nazwisko, PESEL);
                break;
            }
            
        }
        
    }
    
    void usunPacjent(int PESEL, int idPrzychodnia)
    {

        int m = listaPrzychodni.length;
        for(int i=0; i<m; i++)
        {
            if (listaPrzychodni[i].id == idPrzychodnia)
            {
                int k = listaPrzychodni[i].pacjenci.length;
                for(int x=0; x<k; x++)
                {
                    if(listaPrzychodni[i].pacjenci[x].PESEL == PESEL)
                    {
                        Pacjent[] pomoc = new Pacjent[k-1];
                        for(int l=0; l<x ; l++)
                        {
                            pomoc[l] = listaPrzychodni[i].pacjenci[l];
                        }

                        for(int l=x+1; l<k ; l++)
                        {
                            pomoc[l-1] = listaPrzychodni[i].pacjenci[l];
                        }

                        listaPrzychodni[i].pacjenci = new Pacjent[k-1];

                        for(int l=0; l<k-1; l++)
                        {
                            listaPrzychodni[i].pacjenci[l] = pomoc[l];
                        } 
                        break;
                    }
                }

                
                break;
            }
        }

    }
    
    
    void dodajChoroba(String choroba, int PESEL, int idPrzychodnia)
    {
        int m = listaPrzychodni.length;
        for(int i=0; i<m; i++)
        {
            if (listaPrzychodni[i].id == idPrzychodnia)
            {
                int k = listaPrzychodni[i].pacjenci.length;
                for (int l=0; l<k; l++)
                {
                    if(listaPrzychodni[i].pacjenci[l].PESEL == PESEL)
                    {
                        int x = listaPrzychodni[i].pacjenci[l].choroby.length;
                        String[] pomoc = new String[x+1];
                        for(int ll=0; ll<x; ll++)
                        {
                            pomoc[ll]=listaPrzychodni[i].pacjenci[l].choroby[ll];
                        }
                        
                        listaPrzychodni[i].pacjenci[l].choroby = new String[x+1];
                        
                        for(int ll=0; ll<x; ll++)
                        {
                           listaPrzychodni[i].pacjenci[l].choroby[ll] = pomoc[ll]; 
                        }
                        listaPrzychodni[i].pacjenci[l].choroby[x] = choroba;
                        break;
                    }
                }
                
            }
            
        }

    }

    
 public class oknoPowitalne extends JFrame implements ActionListener {

    public int x=10;

    public JButton b1;
    public JButton b2;
    public JButton b3;
    public JLabel label;
 

 	@Override
 	public void actionPerformed(ActionEvent e) {
 		Object source = e.getSource();

                if(source == b3)
                {
                  JOptionPane.showMessageDialog(this, "Dziekujemy za wizyte!"); 
                  dispose();
                }
                
                else if(source == b2)
                {
                    x = 2; 
                    oknoPrzychodni oknoPrzychodnie = new oknoPrzychodni();
                    oknoPrzychodnie.setVisible(true);
                }
                
                else if(source == b1)
                {
                  JOptionPane.showMessageDialog(this, "Na razie nic tu nie ma");   
                }
                
                    
 	}
    
    public oknoPowitalne()
    {
        super("Okno powtalne");
        
        
        this.setSize(400, 400);
        this.setLocation(500, 150);
        
        setLayout(null);
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);

        b1 = new JButton("Lista chorób, które leczymy");
        b1.setBounds(100, 200, 300, 50);
        b2 = new JButton("Aktualna lista przychodni w NFZ");
        b2.setBounds(50, 150, 300, 50);
        b3 = new JButton("Koniec");
        b3.setBounds(50, 200, 300, 50);
        label = new JLabel("Witamy w NFZ!");
        label.setBounds(150, 100, 300, 50);


        b1.addActionListener(this);
        b2.addActionListener(this);
        b3.addActionListener(this);

        add(label);
        //add(b1);
        add(b2);
        add(b3);        
    }  
}
 
 
public class oknoPacjentow extends JFrame implements ActionListener {
    JLabel ety;
    JLabel[] tekst;
    JLabel l1, l2, l3, l4, l5, l6, l7;
    JButton b1, b2, b3;
    JTextArea t1, t2, t3, t4, t5;
    
    int idPrzychodni;
    
    oknoPacjentow(int idPrzychodni)
    {
        super("Pacjenci");
        this.idPrzychodni = idPrzychodni;
        
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        
        this.setSize(600, 400);
        this.setLocation(540, 190);
        
        setLayout(null);
        
        ety = new JLabel("Lista pacjentów");
        ety.setBounds(0, 0, 300, 50);

        for(int ii=0; ii<listaPrzychodni.length; ii++)
            {
                if(listaPrzychodni[ii].id == idPrzychodni)
                    {
                        tekst = new JLabel[listaPrzychodni[ii].pacjenci.length];
                        int y = 50;
                        for(int iii=0; iii<listaPrzychodni[ii].pacjenci.length; iii++)
                            {
                                tekst[iii] = new JLabel(listaPrzychodni[ii].pacjenci[iii].info());
                                tekst[iii].setBounds(0, y, 300, 20);
                                add(tekst[iii]);
                                y+=20;
                            }
                                        
                            break;
                    }                            
            }
        add(ety);
        
        
        l1 = new JLabel("Przeglądaj choroby pacjenta");
        l1.setBounds(350, 0, 300, 20);
        add(l1);
        
        l2 = new JLabel("PESEL");
        l2.setBounds(400, 20, 300, 20);
        add(l2);
        
        t1 = new JTextArea("");
        t1.setBounds(350, 20, 50, 20);
        add(t1);
        
        b1 = new JButton("ok");
        b1.setBounds(350, 40, 50, 20);
        b1.addActionListener(this);
        add(b1);

        l3 = new JLabel("Dodaj pacjenta");
        l3.setBounds(350, 80, 300, 20);
        add(l3);
        
        l4 = new JLabel("PESEL");
        l4.setBounds(400, 100, 300, 20);
        add(l4);
        
        t2 = new JTextArea("");
        t2.setBounds(350, 100, 50, 20);
        add(t2);
        
        l5 = new JLabel("imię");
        l5.setBounds(400, 120, 300, 20);
        add(l5);
        
        t3 = new JTextArea("");
        t3.setBounds(350, 120, 50, 20);
        add(t3);
        
        l5 = new JLabel("nazwisko");
        l5.setBounds(400, 140, 300, 20);
        add(l5);
        
        t4 = new JTextArea("");
        t4.setBounds(350, 140, 50, 20);
        add(t4);
        
        b2 = new JButton("ok");
        b2.setBounds(350, 160, 50, 20);
        b2.addActionListener(this);
        add(b2);
        
        l6 = new JLabel("Usuń pacjenta");
        l6.setBounds(350, 220, 300, 20);
        add(l6);
        
        l7 = new JLabel("PESEL");
        l7.setBounds(400, 240, 300, 20);
        add(l7);
        
        t5 = new JTextArea("");
        t5.setBounds(350, 240, 50, 20);
        add(t5);
        
        b3 = new JButton("ok");
        b3.setBounds(350, 260, 50, 20);
        b3.addActionListener(this);
        add(b3);
        
        
    }

        @Override
        public void actionPerformed(ActionEvent e) 
        {
           Object s = e.getSource();
           if(s==b1)
           {
                int PESEL = Integer.parseInt(t1.getText());
                t1.setText("");
                oknoChorob oknoCH = new oknoChorob(PESEL, idPrzychodni);
                oknoCH.setVisible(true);
                
           }
           
           if(s==b2)
           {
                int PESEL = Integer.parseInt(t2.getText());
                t2.setText("");
               
                String imie = t3.getText();
                t3.setText("");
                
                String nazwisko = t4.getText();
                t4.setText("");
                
                dodajPacjent(imie, nazwisko, PESEL, idPrzychodni);
               try {
                   zapisz();
               } catch (IOException ex) {
                   Logger.getLogger(Kontroler.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
           
           if(s==b3)
           {
                int PESEL = Integer.parseInt(t5.getText());
                t5.setText("");
                usunPacjent(PESEL, idPrzychodni);
               try {
                   zapisz();
               } catch (IOException ex) {
                   Logger.getLogger(Kontroler.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
        }
        


}
 
 
 public class oknoPrzychodni extends JFrame implements ActionListener {
    JLabel ety;
    JLabel[] tekst;
    JLabel l1, l2, l3, l4, l5, l6, l7;
    JButton b1, b2, b3;
    JTextArea t1, t2, t3, t4;
    
    oknoPrzychodni()
    {
        super("Przychodnie");
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        
        this.setSize(600, 400);
        this.setLocation(520, 170);
        
        setLayout(null);
        
        ety = new JLabel("Lista przychodni");
        ety.setBounds(0, 0, 300, 50);

        
        tekst = new JLabel[listaPrzychodni.length];
        int y = 50;
        for(int i=0; i<listaPrzychodni.length; i++)
        {
            tekst[i] = new JLabel(listaPrzychodni[i].info());
            tekst[i].setBounds(0, y, 300, 20);
            add(tekst[i]);
            y+=20;
        }
        
        add(ety);
        
        
        l1 = new JLabel("Przeglądaj pacjentów");
        l1.setBounds(350, 0, 300, 20);
        add(l1);
        
        l2 = new JLabel("id przchodni");
        l2.setBounds(400, 20, 300, 20);
        add(l2);
        
        t1 = new JTextArea("");
        t1.setBounds(350, 20, 50, 20);
        add(t1);
        
        b1 = new JButton("ok");
        b1.setBounds(350, 40, 50, 20);
        b1.addActionListener(this);
        add(b1);

        l7 = new JLabel("Usuń przychodnię");
        l7.setBounds(350, 180, 300, 20);
        add(l7);
        
        l4 = new JLabel("id przchodni");
        l4.setBounds(400, 200, 300, 20);
        add(l4);
        
        t2 = new JTextArea("");
        t2.setBounds(350, 200, 50, 20);
        add(t2);
        
        b3 = new JButton("ok");
        b3.setBounds(350, 220, 50, 20);
        b3.addActionListener(this);
        add(b3);
        
        
        l3 = new JLabel("Dodaj przychodnię");
        l3.setBounds(350, 80, 300, 20);
        add(l3);
        
        l5 = new JLabel("nazwa");
        l5.setBounds(400, 100, 300, 20);
        add(l5);
        
        t3 = new JTextArea("");
        t3.setBounds(350, 100, 50, 20);
        add(t3);
        
        l5 = new JLabel("miasto");
        l5.setBounds(400, 120, 300, 20);
        add(l5);
        
        t4 = new JTextArea("");
        t4.setBounds(350, 120, 50, 20);
        add(t4);
        
        b2 = new JButton("ok");
        b2.setBounds(350, 140, 50, 20);
        b2.addActionListener(this);
        add(b2);
        
        
    }

        @Override
        public void actionPerformed(ActionEvent e) 
        {
            Object s = e.getSource();
            
            if(s == b1)
            {
                int id = Integer.parseInt(t1.getText());
                t1.setText("");

                oknoPacjentow oknoPacjent = new oknoPacjentow(id);
                oknoPacjent.setVisible(true);
            }
            
            if(s==b2)
            {
                String nazwa = t3.getText();
                t3.setText("");
                
                String miasto = t4.getText();
                t4.setText("");
                
                dodajPrzychodnia(nazwa, miasto);
                try {
                    zapisz();
                } catch (IOException ex) {
                    Logger.getLogger(Kontroler.class.getName()).log(Level.SEVERE, null, ex);
                }
        
            }
            
            if(s==b3)
            {
                int id = Integer.parseInt(t2.getText());
                t2.setText(""); 
                usunPrzychodnia(id);
                try {
                    zapisz();
                } catch (IOException ex) {
                    Logger.getLogger(Kontroler.class.getName()).log(Level.SEVERE, null, ex);
                }
                
            }
        }
}
 
 public class oknoChorob extends JFrame implements ActionListener{
    
    JLabel ety;
    JLabel[] tekst;
    JLabel l1, l2;
    JButton b1;
    JTextArea t1;
    
    int PESEL, idPrzychodni;
    
    oknoChorob(int PESEL, int idPrzychodni)
    {
        super("Choroby");
        this.PESEL = PESEL;
        this.idPrzychodni = idPrzychodni;
        
        setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        
        this.setSize(400, 300);
        this.setLocation(560, 210);
        
        setLayout(null);

        ety = new JLabel("Lista chorób");
        ety.setBounds(0, 0, 300, 50);

        for(int p=0; p<listaPrzychodni.length; p++)
        {
            if(idPrzychodni == listaPrzychodni[p].id)
            {
                for(int pp=0; pp<listaPrzychodni[p].pacjenci.length; pp++)
                {
                    if(PESEL == listaPrzychodni[p].pacjenci[pp].PESEL)
                    {
                        tekst = new JLabel[listaPrzychodni[p].pacjenci[pp].choroby.length];
                        int yy=50;
                        for(int chor=0; chor<listaPrzychodni[p].pacjenci[pp].choroby.length; chor++)
                        {                                 
                            tekst[chor] = new JLabel(chor+1 + ": " + listaPrzychodni[p].pacjenci[pp].choroby[chor]);
                            tekst[chor].setBounds(0, yy, 300, 20);
                            add(tekst[chor]);
                            yy+=20;
                        }
                    }
                }
            }
        }

        add(ety);
        
        ety = new JLabel("Lista chorob");
        ety.setBounds(0, 0, 300, 20);
        
        l1 = new JLabel("Dodaj chorobę");
        l1.setBounds(200, 0, 300, 20);
        add(l1);
        
        l2 = new JLabel("nazwa");
        l2.setBounds(300, 20, 300, 20);
        add(l2);
        
        t1 = new JTextArea("");
        t1.setBounds(200, 20, 100, 20);
        add(t1);
        
        b1 = new JButton("ok");
        b1.setBounds(200, 40, 50, 20);
        b1.addActionListener(this);
        add(b1);
    
    }

        @Override
        public void actionPerformed(ActionEvent e) 
        {
           Object s = e.getSource();
           
           if(s==b1)
           {
                String nazwa = t1.getText();
                t1.setText("");
                if(!nazwa.equals(""))
                    dodajChoroba(nazwa, PESEL, idPrzychodni);
               try {
                   zapisz();
               } catch (IOException ex) {
                   Logger.getLogger(Kontroler.class.getName()).log(Level.SEVERE, null, ex);
               }
           }
        }
    }
}
