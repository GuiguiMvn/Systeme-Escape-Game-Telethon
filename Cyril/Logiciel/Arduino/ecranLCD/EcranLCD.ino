//DFRobot.com
//Compatible with the Arduino IDE 1.0
//Library version:1.1
#include <Wire.h>
#include <LiquidCrystal_I2C.h>

LiquidCrystal_I2C lcd(0x20,16,2);  //l adresse 0x27 est a changé en fonction de votre écrant
void setup()
{
lcd.init();                      // initialize the lcd

// Print a message to the LCD.
lcd.backlight();
lcd.print("Bonjour les amis");
}

void loop()
{
}
