#!/usr/bin/env python2.7
#-- coding: utf-8 --

import RPi.GPIO as GPIO
from pirc522 import RFID
import time

GPIO.setwarnings(False)

rc522 = RFID()

while True:
    rc522.wait_for_tag()
    (error,tag_type) = rc522.request()
    if not error:
        (error,uid) = rc522.anticoll()
        if not error:
            print("UID:" + str(uid))
            time.sleep(1)