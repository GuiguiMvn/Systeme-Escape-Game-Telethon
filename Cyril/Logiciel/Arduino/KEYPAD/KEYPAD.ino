

#include <Keypad.h>

const byte ROWS = 4; // 4 lignes
const byte COLS = 4; // 3 colonnes

char keys[ROWS][COLS] = { 
  {'1','1','2','3'},
  {'4','4','5','6'},
  {'7','7','8','9'},
  {'*','*','0','#'}
};

byte rowPins[ROWS] = {11, 10, 9, 8};  // Connection aux broches des lignes du clavier
byte colPins[COLS] = {4, 7, 6, 5};   // Connection aux broches des colonnes du clavier

 
Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );  // Constructeur qui créer un "objet clavier"
    // userKeymap : tableau à 2 dimensions définissant les symboles des touches
    // row[] : tableau correspondant aux numéros des broches utilisées pour les lignes
    // col[] : tableau correspondant aux numéros dex broches utilisées pour les colonnes
    // rows : nombre de lignes
    // cols : nombre de colonnes

void setup(){
  Serial.begin(9600); // Ouvre le port série à 9600 bps
 
}

void loop(){
  char key = keypad.getKey(); // Renvoie la touche qui est appuyée sous forme caractère ASCII
  
  if (key){ // Si "key" est activé 
    Serial.println(key); // Imprime les données de "key" sur le port série sous forme de
                        // texte ASCII lisible par l'homme suivi d'un caractère de retour chariot
  }
}
