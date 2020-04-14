#!/usr/bin/env python2.7
#-- coding: utf-8 --

import RPi.GPIO as GPIO
from pirc522 import RFID
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)

LED = 5
UID = [116, 96, 204, 131, 91]

def turn_led_on (led) :
    GPIO.setup(led, GPIO.OUT) 
    GPIO.output(led, GPIO.HIGH)

def turn_led_off (led) :
    GPIO.setup(led, GPIO.OUT) 
    GPIO.output(led, GPIO.LOW)

def turn_LED_on () :
    turn_led_on(LED) 

def turn_LED_off () :
    turn_led_off(LED) 

rc522 = RFID()

while True:
    rc522.wait_for_tag()
    (error,tag_type) = rc522.request()
    if not error:
        (error,uid) = rc522.anticoll()
        if not error : 
            if UID == uid :
                print('UID valide'.format(uid))
                turn_LED_on()
            else :
                print('UID non valide'.format(uid))
                turn_LED_off()
            time.sleep(1)