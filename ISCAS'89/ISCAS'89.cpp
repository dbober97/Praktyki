#include <iostream>
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

    ifstream file("prawidlowy.txt");


    if (!file.is_open()) {
        cerr << "Nie mozna otworzyc pliku." << endl;
        return 1;
    }

    map<string, Gate> gates;
    set<string> inputs;
    set<string> outputs;

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

            while (getline(inputsStream, token, ',')) {

                token = trim(token);

                gateInputs.push_back(token);
            }

            gates[gateName] = {gateType, gateInputs};
        }
    }


file.close();

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

        cout << "Uklad dziala prawidlowo" << endl;
    } else {

        cout << "Uklad nie dziala prawidlowo." << endl;
    }

    return 0;
}
