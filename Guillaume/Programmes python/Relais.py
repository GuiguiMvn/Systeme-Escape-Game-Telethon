#!/usr/bin/env python2.7
#-- coding: utf-8 --

import RPi.GPIO as GPIO
from pirc522 import RFID
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)

RELAIS = 8
GPIO.setup(RELAIS, GPIO.OUT)
#GPIO.output(RELAIS, GPIO.HIGH)
UID = [116, 96, 204, 131, 91]

rc522 = RFID()
GPIO.output(RELAIS, GPIO.LOW)

while True:
    rc522.wait_for_tag()
    (error,tag_type) = rc522.request()
    if not error:
        (error,uid) = rc522.anticoll()
        if not error : 
            if UID == uid :
                 print ('relais on')
                 GPIO.output(RELAIS, GPIO.HIGH)
                 time.sleep(1)
                 print ('relais off')
                 GPIO.output(RELAIS, GPIO.LOW)
                 time.sleep(1)