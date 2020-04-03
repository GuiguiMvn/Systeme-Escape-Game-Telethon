
#include <Keypad.h>                      // appel de la bibliothèque

#define L1 2                                    // affectation des broches
#define L2 3
#define L3 4
#define L4 5
#define C1 6
#define C2 7
#define C3 8

const byte lignes = 4;                    // 4 lignes
const byte colonnes = 3;               // 3 colonnes

char code[lignes][colonnes] = {   // code des touches
  {'1','2','3'},
  {'4','5','6'},
  {'7','8','9'},
  {'*','0','#'}
};

byte broches_lignes[lignes] = {L1, L2, L3, L4};                   // connexion des lignes
byte broches_colonnes[colonnes] = {C1, C2, C3};              // connexion des colonnes

Keypad clavier = Keypad( makeKeymap(code), broches_lignes, broches_colonnes, lignes, colonnes);              // création de l'objet clavier

void setup()
{
  Serial.begin(9600);                     // initialisation du moniteur série
}
 
void loop()
{
  int touche = clavier.getKey();          // acquisition de la touche
 
  if (touche != NO_KEY)                 // si appui sur une touche
  {
    Serial.println(touche);             // affichage du code dans le moniteur série
  }
}
