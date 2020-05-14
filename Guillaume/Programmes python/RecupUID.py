import RPi.GPIO as GPIO  #Importe la bibliothèque pour contrôler les GPIOs
from pirc522 import RFID #Importe la bibliothèque pour contrôler les lecteurs RFID
import time

GPIO.setwarnings(False) #On désactive les messages d'alerte

rc522 = RFID() #On instancie la librairie

print('En attente d\'un badge (pour quitter, Ctrl + c): ') #Affichage d'un message demandant à l'utilisateur de passer son badge

#Boucle infinie pour lire en boucle
while True:
    rc522.wait_for_tag() #Attente qu'une puce RFID passe à portée
    (error,tag_type) = rc522.request() #Quand une puce a été lue, on récupère on UID
    if not error:
        (error,uid) = rc522.anticoll() #On nettoie les possibles collisions, ça arrive si plusieurs cartes passent en même temps
        if not error:
            print("UID:" + str(uid)) #Affichage de l'UID du badge RFID
            time.sleep(1)
			
			