#include <Keypad.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <Password.h>

  
#define DON 33
#define REB 35
#define REN 37
#define MIB 39
#define MIN 41
#define FAN 44
#define SOB 46
#define SON 49
#define LAB 52
#define LAN 55
#define SIB 58
#define SIN 62

// tableau pour la mélodie
int part[50][3] = {
  DON, 2, 100,
  DON, 2, 100,
  DON, 2, 100,
  LAB, 1, 75,
  MIB, 2, 25,
  DON, 2, 100,
  LAB, 1, 75,
  MIB, 2, 25,
  DON, 2, 200,
  SON, 2, 100,
  SON, 2, 100,
  SON, 2, 100,
  LAB, 2, 75,
  MIB, 2, 25,
  SIN, 1, 100,
  LAB, 1, 75,
  MIB, 2, 25,
  DON, 2, 200,
  DON, 3, 100,
  DON, 2, 100,
  DON, 3, 25,
  SIN, 2, 25,
  DON, 3, 25,
  0, 0, 75,
  SIN, 2, 50,
  SIB, 2, 100,
  SIB, 1, 100,
  SON, 2, 25,
  SOB, 2, 25,
  SON, 2, 25,
  0, 0, 75,
  SOB, 2, 50,
  FAN, 2, 100,
  SON, 1, 100,
  SIB, 1, 100,
  SON, 1, 75,
  MIB, 2, 25,
  DON, 2, 100,
  LAB, 1, 75,
  MIB, 2, 25,
  DON, 2, 200,
  -1
};
int pinSon = 12; // pin de connection du haut-parleur
int tempo = 120; // variable du tempo
int duree = 0; // variable de durée de note
unsigned long tempsDep; // variable de temps de départ
int p = 0; // variable de position dans le tableau de mélodie


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

    
boolean alarm = false;    // variable stockant l'état de l'alarme       
boolean intruder = false; // false = alarme OFF | true = alarme ON

void setup(){
  
Serial.begin(9600);
kpd.addEventListener(kpdEvent);
 
lcd.init();                      // initialize the lcd


pinMode(pinSon,OUTPUT); 
tempsDep = millis(); // initialisation du temps de départ
}

void loop()
{
  char Key = kpd.getKey();
  
if (alarm = true)
{
joue();
}

}

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
        case '#' : pwd.reset();  lcd.clear(); break;
        // sinon on ajoute le chiffre à la combinaison
        default  : pwd.append(Key); break;
      }
    default : break;
  }
}

void joue() {

  unsigned long tempsAct = millis();
  if (tempsAct - tempsDep >= duree) {
    if (part[p][0] != -1) { // test de fin de tableau
      noTone(pinSon);
      delay(10); // délai pour l'attaque
      // la fréquence est calculée en fonction des fréquences de base
      // et de l'octave définit dans le tableau
      int frequence = part[p][0] * pow(2, part[p][1] + 1);
      // la durée de la note est calculée comme en musique
      duree = 1000 / (tempo / 60) * (float(part[p][2]) / 100);
      if (frequence > 0) {
        tone (pinSon, frequence);
      }
      p++; //incrémentation de la position dans le tableau
    }
    else { 
      noTone(pinSon);
      p=0;// retour au début du tableau
      duree=1000;// attente avant répétition
    }
    tempsDep=tempsAct;
  }
}

void checkPassword(void)
{
  // on remet à zéro l'état du mot de passe

  intruder = false;
  
  // si le mot de passe est juste...
  if (pwd.evaluate())
  {
    // ...on met à jour l'état de l'alarme : ON>OFF / OFF>ON
    alarm = !alarm;
   
    switch (alarm)
    {
      case true :
     
     lcd.backlight();
    lcd.print("Bravo !!!!");
        pwd.reset();  // on remet à zéro la saisie
        intruder = true;
        break;
      case false :
       lcd.backlight();
        lcd.print("erreur, réessayez");
        pwd.reset();  // on remet à zéro la saisie
        break;
      default :
        break;
    }
  }
  // si le mot de passe est faux...
  else
 {
   lcd.backlight();
   lcd.print("erreur, réessayez");
 }
 // on remet à zéro systématiquement après avoir vérifié pour ne pas avoir d'erreur
 pwd.reset();

}
