import RPi.GPIO as GPIO
from pirc522 import RFID
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)

LED = 7
GPIO.setup(LED, GPIO.OUT)
UID = [116, 96, 204, 131, 91]



rc522 = RFID()
GPIO.output(LED, GPIO.LOW)

while True:
    rc522.wait_for_tag()
    (error,tag_type) = rc522.request()
    if not error:
        (error,uid) = rc522.anticoll()
        if not error : 
            if UID == uid :
                print('UID valide'.format(uid))
                GPIO.output(LED, GPIO.HIGH)
                time.sleep(1)
                GPIO.output(LED, GPIO.LOW)
            else :
                print('UID non valide'.format(uid))
                GPIO.output(LED, GPIO.LOW)
            
			