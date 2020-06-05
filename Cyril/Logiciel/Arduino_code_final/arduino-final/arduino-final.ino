#include <Keypad.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <Password.h>

// les constantes des fréquences de base
const char DON = 65;
const char DOD = 69;
const char REN = 74;
const char RED = 78;
const char MIN = 83;
const char FAN = 87;
const char FAD = 93;
const char SON = 98;
const char SOD = 104;
const char LAN = 110;
const char LAD = 117;
const char SIN = 123;
//Le tableau pour la mélodie
char auClair[11][3]={
    DON, 2, 2,
    DON, 2, 2,
    DON, 2, 2,
    REN, 2, 2,
    MIN, 4, 2,
    REN, 4, 2,
    DON, 2, 2,
    MIN, 2, 2,
    REN, 2, 2,
    REN, 2, 2,
    DON, 8, 2
};

int dureeBase=500; //on fixe la durée de basse à 500 millisecondes
unsigned long tempsDep; // variable pour le temps de départ
unsigned long tempsAct; // variable pour le temps actuel
int duree; //variable pour la durée d'attente de la note en cours
int n=0; // position dans le tableau de mélodie

LiquidCrystal_I2C lcd(0x20,16,2); //l adresse 0x27 est a changé en fonction de votre écrant

Password pwd = Password("1234");
const byte ROWS = 4; //four rows
const byte COLS = 4; //three columns
char keys[ROWS][COLS] = {
  {'1','1','2','3'},
  {'4','4','5','6'},
  {'7','7','8','9'},
  {'*','*','0','#'}
};
byte rowPins[ROWS] = {11, 10, 9, 8}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {4, 7, 6, 5}; //connect to the column pinouts of the keypad
Keypad kpd = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );

void setup(){
  
Serial.begin(9600);
kpd.addEventListener(kpdEvent);
 
lcd.init();                      // initialize the lcd

 pinMode(12,OUTPUT);//on met le pin 3 en mode OUTPUT
  tempsDep=millis(); // on initialise le temps de départ au temps Arduino
  duree=0; //on initialise l'attente à 0

}

void loop()
{
  char Key = kpd.getKey(); 
}

void jouer(){
   tempsAct=millis(); // on récupère le temps Arduino
  if (tempsAct-tempsDep>=duree){ // on regarde si le temps est écoulé
    noTone(12); // on stoppe le son
    delay(10); // délay pour l'attaque du son
    joueNote(auClair[n][0],auClair[n][2]); // on appelle la fonction qui joue la bonne note
    duree=dureeBase*auClair[n][1]; // on fixe la duree d'attente
    tempsDep=tempsAct; //on initialise le temps de départ
    n++; // on incrémente la position dans le tableau
    if (n>10) // on teste si on dépasse la fin du tableau
      n=0; // on revient au début du tableau
  }
 

}
 void joueNote(int nt,int oc){
  tone(12,nt*pow(2,oc)); //on joue la note à la bonne fréquence
}
  // fonction de calcul de la fréquence en fonction de l'octave

void kpdEvent (KeypadEvent Key)
{
  switch (kpd.getState())
  {
    case PRESSED :
      switch (Key)
      {
        // appui sur '*' -> vérification de la saisie en cours
        case '*' : checkPassword(); break;
        // appui sur '#' -> réinitialisation de la saisie en cours
        case '#' : pwd.reset();  lcd.clear();  noTone(12);break;
        // sinon on ajoute le chiffre à la combinaison
        default  : pwd.append(Key); break;
      }
    default : break;
  }
}

void checkPassword(void)
{
 
 // si le mot de passe est juste...
  if (pwd.evaluate())
  {
    jouer();// Fonction pour joueur la musique
    lcd.backlight();
    lcd.print("Bravo !!!!");
    pwd.reset();  // on remet à zéro la saisie
  }
  // si le mot de passe est faux...
  else
 {
   lcd.backlight();
   lcd.print("erreur, reessayez");
   pwd.reset();  // on remet à zéro la saisie
 }
 // on remet à zéro systématiquement après avoir vérifié pour ne pas avoir d'erreur
 pwd.reset();

}
