#define OCTAVE_4_DO 523
#define OCTAVE_4_RE 587
#define OCTAVE_4_MI 659
#define OCTAVE_4_FA 698
#define OCTAVE_4_SOL 784
#define OCTAVE_4_LA 880
#define OCTAVE_4_SI 988

#define DUREE_TEMPS 300

// Définition de la pause de fin de note en millisecondes 
#define PAUSE_FIN_NOTE 90

int pinSon = 12; // pin de connection du haut-parleur
void setup() {
 pinMode(pinSon,OUTPUT); 
}

void loop() {
  // Jeu des 11 premières notes de "Au clair de la lune"
    JouerNote(OCTAVE_4_DO, 1);
    JouerNote(OCTAVE_4_DO, 1);
    JouerNote(OCTAVE_4_DO, 1);
    JouerNote(OCTAVE_4_RE, 1);
    JouerNote(OCTAVE_4_MI, 2);
    JouerNote(OCTAVE_4_RE, 2);
    JouerNote(OCTAVE_4_DO, 1);
    JouerNote(OCTAVE_4_MI, 1);
    JouerNote(OCTAVE_4_RE, 1);
    JouerNote(OCTAVE_4_RE, 1);
    JouerNote(OCTAVE_4_DO, 4);
}

void JouerNote(unsigned int Note_P, unsigned int NombreTemps_P)
{
   // Lance l'émission de la note
    tone(8, Note_P, NombreTemps_P * DUREE_TEMPS);
    // Attend que la note soit terminée de jouée
    delay(NombreTemps_P * DUREE_TEMPS);
    // Petit silence avant la note suivante
    delay(PAUSE_FIN_NOTE);
}
   
