#include <Keypad.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <Password.h>


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



}

void loop()
{
  char Key = kpd.getKey();
 

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
