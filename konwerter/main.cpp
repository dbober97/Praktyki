#include <iostream>
#include <string>
#include <fstream>
#include <sstream>
#include <algorithm>
#include <iterator>
#include <map>
#include <set>
#include <vector>

using namespace std;


string trim(const string & source) {
    string s(source);
    s.erase(0,s.find_first_not_of(" \n\r\t"));
    s.erase(s.find_last_not_of(" \n\r\t")+1);
    return s;
}


struct Gate {
    string type;
    vector<string> inputs;
};


int main() {

    ifstream file("przed_konwersja1.txt");
    int max_count_aruments = 0;//zlicza ile maksymalnie argumentów zawiera jakakolwiek bramka;

    if (!file.is_open()) {
        cerr << "Nie mozna otworzyc pliku." << endl;
        return 1;
    }

    map<string, Gate> gates;//klucz - nazwa przed '=', wartoœæ to obiekt typu gate o nazwie - nazwa bramki i nazwach wejœæ tej bramki
    set<string> inputs;//nazwy inputow
    set<string> outputs;//nazwy outputow
    //nalezy uzgodnic maks wejsc sposrod wszystkich bramek -  bedzie wiadomo ile jednostek projektowych zrobic

    string line;

    while (getline(file, line)) {
        if (line.empty() || line[0] == '#') continue;

        line = trim(line);

        string token;

        istringstream iss(line);

        if (line.find("INPUT") != string::npos) {

            iss.ignore(6, '(');

            getline(iss, token, ')');

            token = trim(token);

            inputs.insert(token);

        } else if (line.find("OUTPUT") != string::npos) {

            iss.ignore(7, '(');
            getline(iss, token, ')');
            token = trim(token);
            outputs.insert(token);

        } else {

            string gateName, gateType, inputsLine;

            getline(iss, gateName, '=');
            getline(iss, inputsLine);

            gateName = trim(gateName);
            inputsLine = trim(inputsLine);

            auto pos = inputsLine.find('(');

            gateType = inputsLine.substr(0, pos);

            gateType = trim(gateType);

            inputsLine = inputsLine.substr(pos + 1, inputsLine.length() - pos - 2);

            istringstream inputsStream(inputsLine);

            vector<string> gateInputs;

            int count_temp=0;
            while (getline(inputsStream, token, ',')) {

                token = trim(token);

                gateInputs.push_back(token);
                ++count_temp;
            }
            if(count_temp > max_count_aruments) max_count_aruments = count_temp;

            gates[gateName] = {gateType, gateInputs};
        }
    }

      bool valid = true;

    for (auto& mojaPara : gates) {

        for (auto& input :  mojaPara.second.inputs) {


            if (gates.find(input) == gates.end() && inputs.find(input) == inputs.end()) {
                cerr << "Argument " << input << " bramki " << mojaPara.first << " nie istnieje." << endl;

                valid = false;
            }
        }
    }

    set<string> used_nodes;

    for (auto& mojaPara : gates) {
        for (auto& input : mojaPara.second.inputs) {

            used_nodes.insert(input);
        }
    }

    for (const auto& output : outputs) {

        used_nodes.insert(output);
    }




    for (auto& mojaPara : gates) {

        if (used_nodes.find(mojaPara.first) == used_nodes.end() && outputs.find(mojaPara.first) == outputs.end()) {

            cerr << "Bramka  " << mojaPara.first << " nie jest uzywana" << endl;
            valid = false;
        }
    }

    if (valid) {

        cout << "Uklad dziala prawidlowo, nastapila kompilacja." << endl;
    } else {

        cout << "Uklad nie dziala prawidlowo, brak kompilacji" << endl;
        return 0;
    }


file.close();

//teraz pora na konwersjê pliku, zebrane dane w:
//    map<string, Gate> gates;//klucz - nazwa przed '=', wartoœæ to obiekt typu gate o nazwie - nazwa bramki i nazwach wejœæ tej bramki
//    set<string> inputs;//nazwy inputow
//    set<string> outputs;//nazwy outputow
//    int max_count_aruments = 0;//zlicza ile maksymalnie argumentów zawiera jakakolwiek bramka;

    ofstream wynikowy("po_konwersji.txt");

    if (!wynikowy.is_open()) {
        cerr << "Nie mozna otworzyc pliku." << endl;
        return 1;
    }

set<string> bramki;//wy³uskane nazwy bramek/przerzutników
for(auto &wsk : gates)
{
    bramki.insert(wsk.second.type);
}

for(auto iter = bramki.begin(); iter != bramki.end(); ++iter)

{
    if((*iter).compare("DFF")!=0 && (*iter).compare("NOT")!=0){
    for(int i=1; i<max_count_aruments; ++i)
    {
        wynikowy << "LIBRARY IEEE;"<<endl;
        wynikowy << "USE IEEE.STD_LOGIC_1164.ALL;"<<endl;
        wynikowy << "ENTITY "<<*iter<<i+1<<"GATE"<<" IS PORT(\n\t";

        for(int k=1; k<=i; ++k)
        {
           wynikowy << "i" << k << ", ";
        }
        wynikowy << "i" << i+1 << ": IN STD_LOGIC;" <<endl;

        wynikowy << "\to: OUT STD_LOGIC);"<<endl;
        wynikowy << "END " <<*iter<<i+1<<"GATE;"<<endl;
        wynikowy << "ARCHITECTURE Dataflow OF " <<*iter<<i+1<<"GATE IS"<<endl;
        wynikowy << "BEGIN"<<endl;
        wynikowy << "\to <=";

        if((*iter).compare("AND")==0)
        {
            for(int k=1; k<=i; ++k)
            {
                wynikowy << "i" << k << " AND ";
            }
            wynikowy << "i" << i+1 <<"; " <<endl;
        }

        if((*iter).compare("OR")==0)
        {
            for(int k=1; k<=i; ++k)
            {
                wynikowy << "i" << k << " OR ";
            }
            wynikowy << "i" << i+1 <<"; " <<endl;
        }

        if((*iter).compare("NAND")==0)
        {
            for(int k=1; k<=i; ++k)
            {
                wynikowy << "i" << k << " NAND ";
            }
            wynikowy << "i" << i+1 <<"; " <<endl;
        }

        if((*iter).compare("NOR")==0)
        {
            for(int k=1; k<=i; ++k)
            {
                wynikowy << "i" << k << " NOR ";
            }
            wynikowy << "i" << i+1 <<"; "<<endl;
        }
        wynikowy << "END Dataflow;" <<endl;
        wynikowy <<endl;
        wynikowy  <<endl;

    }}

    if((*iter).compare("DFF")==0)
    {
        wynikowy << "LIBRARY IEEE;"<<endl;
        wynikowy << "USE IEEE.STD_LOGIC_1164.ALL;"<<endl;
        wynikowy << "ENTITY DFF"<<" IS PORT("<<endl;
        wynikowy << "\td, clk, rst: IN STD_LOGIC;" <<endl;
        wynikowy << "\tq: OUT STD_LOGIC);"<<endl;
        wynikowy << "END DFF;"<<endl;
        wynikowy << "ARCHITECTURE Dataflow OF DFF IS"<<endl;
        wynikowy << "BEGIN"<<endl;

        wynikowy << "\tPROCESS"<<endl;
        wynikowy << "\tBEGIN"<<endl;
        wynikowy << "\t\tWAIT ON rst, clk;"<<endl;
        wynikowy << "\t\tIF (rst='1') THEN"<<endl;
        wynikowy << "\t\t\tq <= '0';"<<endl;
        wynikowy << "\t\tELSIF (clk'EVENT AND clk='1') THEN "<<endl;
        wynikowy << "\t\t\tq <= d;"<<endl;
        wynikowy << "\t\tEND IF;"<<endl;
        wynikowy << "\tEND PROCESS;"<<endl;
        wynikowy << "END Dataflow;" <<endl;
        wynikowy <<endl;
        wynikowy  <<endl;
    }
    if((*iter).compare("NOT")==0)
    {
        wynikowy << "LIBRARY IEEE;"<<endl;
        wynikowy << "USE IEEE.STD_LOGIC_1164.ALL;"<<endl;
        wynikowy << "ENTITY "<<"NOTGATE"<<" IS PORT(\n\t";
        wynikowy << "i: IN STD_LOGIC;" <<endl;
        wynikowy << "\to: OUT STD_LOGIC);"<<endl;
        wynikowy << "END NOTGATE;"<<endl;
        wynikowy << "ARCHITECTURE Dataflow OF NOTGATE IS"<<endl;
        wynikowy << "BEGIN"<<endl;
        wynikowy << "\to <= NOT i;"<<endl;
        wynikowy << "END Dataflow;" <<endl;
        wynikowy <<endl;
        wynikowy  <<endl;
    }
}

//czas na g³ówne entity
wynikowy << "LIBRARY IEEE;"<<endl;
wynikowy << "USE IEEE.STD_LOGIC_1164.ALL;"<<endl;
wynikowy << "ENTITY "<<"PROGRAM_SKOMPILOWANY"<<" IS PORT(\n\t";
int pomoc3=0;
for(auto iter = inputs.begin(); iter != inputs.end(); ++iter)
{
    ++pomoc3;
    if(pomoc3 <= inputs.size()-1) wynikowy<<*iter<<", ";
    else wynikowy<<*iter<<": IN STD_LOGIC;\n\t";
}

pomoc3=0;
for(auto iter = outputs.begin(); iter != outputs.end(); ++iter)
{
    ++pomoc3;
    if(pomoc3 <= outputs.size()-1) wynikowy<<*iter<<", ";
    else wynikowy<<*iter<<": OUT STD_LOGIC);\n\t";
}
wynikowy<<"END PROGRAM_SKOMPILOWANY;"<<endl;

wynikowy<< "Architecture structural OF PROGRAM_SKOMPILOWANY IS"<<endl;
for(auto iter = bramki.begin(); iter != bramki.end(); ++iter)
{
    if((*iter).compare("DFF")!=0 && (*iter).compare("NOT")!=0){
    for(int i=1; i<=max_count_aruments; ++i)
    {
        wynikowy<< "\tCOMPONENT "<<*iter<<i+1<<"GATE PORT("<<endl;
        wynikowy<< "\t\t";

        for(int k=1; k<=i; ++k)
        {
            wynikowy << "i" << k << ", ";
        }
        wynikowy << "i" << i+1<<": IN STD_LOGIC;"<<endl;
        wynikowy<< "\t\to: OUT STD_LOGIC);"<<endl;
        wynikowy<< "\tEND COMPONENT;"<<endl;

    }}
}
wynikowy<< "\tCOMPONENT NOTGATE PORT("<<endl;
wynikowy<< "\t\ti: IN STD_LOGIC;"<<endl;
wynikowy<< "\t\to: OUT STD_LOGIC);"<<endl;
wynikowy<< "\tEND COMPONENT;"<<endl;

wynikowy<< "\tCOMPONENT DFF PORT("<<endl;
wynikowy<< "\t\td, clk, rst: IN STD_LOGIC;"<<endl;
wynikowy<< "\t\tq: OUT STD_LOGIC);"<<endl;
wynikowy<< "\tEND COMPONENT;"<<endl;

//czas na ostatni¹ czêœæ

wynikowy<<"SIGNAL ";
int pomoc2=0;
for(auto &iter : gates)
{
    ++pomoc2;
    if(outputs.find(iter.first) == outputs.end())
    {
        if(pomoc2 <= gates.size()-1) wynikowy<<iter.first<<", ";
        else wynikowy<<iter.first<<": STD_LOGIC;"<<endl;

    }
}

wynikowy<<"BEGIN"<<endl;

int l=0;
for(auto &iter : gates)
{
    ++l;
    if((iter.second.type).compare("DFF")!=0 && (iter.second.type).compare("NOT")!=0){
    wynikowy<<"U"<<l<<": "<<iter.second.type<<iter.second.inputs.size()<<"GATE"<<" PORT MAP(";}
    else if((iter.second.type).compare("DFF")==0)wynikowy<<"U"<<l<<": DFF"<<" PORT MAP(";
    else if((iter.second.type).compare("NOT")==0)wynikowy<<"U"<<l<<": NOTGATE"<<" PORT MAP(";
    int m=1;
    for(auto ii: iter.second.inputs)
    {

       wynikowy<<ii<<", ";

    }
    //wynikowy<<iter.first<<");"<<endl;
    if((iter.second.type).compare("DFF")!=0 && (iter.second.type).compare("NOT")!=0) wynikowy<<iter.first<<");"<<endl;
    else if((iter.second.type).compare("DFF")==0) wynikowy<<iter.second.inputs.front()<<", "<<iter.second.inputs.front()<<", "<<iter.first<<");"<<endl;
    else if((iter.second.type).compare("NOT")==0) wynikowy<<iter.first<<");"<<endl;
}

wynikowy<<"END structural;"<<endl;
wynikowy.close();

return 0;
}
