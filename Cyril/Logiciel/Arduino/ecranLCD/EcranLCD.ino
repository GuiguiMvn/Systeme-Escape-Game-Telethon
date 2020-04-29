

#include <Wire.h>
#include <LiquidCrystal_I2C.h>


LiquidCrystal_I2C lcd(0x20,16,2);  // Définition de la taille de l'écran



void setup()
{
lcd.init(); // Initialisation de l'écran                  

lcd.backlight(); // Initialisation de la technologie de rétroéclairage Backlight déployée dans certain écran LED

lcd.print("Bonjour les amis"); // Ecriture du message 
}

void loop()
{
}
