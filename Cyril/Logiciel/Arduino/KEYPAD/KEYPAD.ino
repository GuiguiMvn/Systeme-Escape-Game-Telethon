#include <Keypad.h>

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

//byte rowPins[ROWS] = {2, 7, 6, 4}; //connect to the row pinouts of the keypad
//byte colPins[COLS] = {3, 1, 5}; //connect to the column pinouts of the keypad

Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );
    

void setup(){
  Serial.begin(9600);
 
}

void loop(){
  char key = keypad.getKey();
  if (key){
    Serial.println(key);
  }
}
