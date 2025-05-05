
package nfz;

import java.io.EOFException;
import java.io.FileNotFoundException;
import java.io.IOException;


public class NFZ{

    public static void main(String[] args) throws IOException, FileNotFoundException, ClassNotFoundException, EOFException {
        
       Widok start = new Widok();
       start.menu();
    }
    
}

