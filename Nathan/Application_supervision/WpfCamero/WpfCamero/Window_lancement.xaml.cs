using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

// Librairie MySQL ajoutée dans les références.
using MySql.Data.MySqlClient;

namespace WpfCamero
{
    /// <summary>
    /// Logique d'interaction pour Window_lancement.xaml
    /// </summary>
    public partial class Window_lancement : Window
    {

        // 127.0.0.1 est l'adresse localhost du serveur Apache WAMPP
        // Nous avons créé une base de données nommée "dbsupervision"
        // L'utilisateur choisi pour administrer cette bdd est "superviseur" avec son mot de passe "Nantes44".
        string connectionString = "SERVER=127.0.0.1; DATABASE=dbsupervision; UID=superviseur; PASSWORD=Nantes44";
        public Window_lancement()
        {
            InitializeComponent();

            // Créer d'un contact à ajouter
            Equipe equipe= new Equipe();
            // indice.Id = ; En commentaire car l'id est autoincrémenté.
            equipe.Nom = "Info44";
            equipe.Score = "123456";
            equipe.Date = System.DateTime.Now.ToShortDateString();
            //equipe.Heure_debut = "00:00:00";
         //   equipe.Heure_fin = "00:00:00";


            // Création de l'objet Bdd pour l'intéraction avec la base de donnée MySQL
            Bdd bdd = new Bdd();
            bdd.AddEquipe(equipe);
        }

        private void btnWindow_superviser_Click(object sender, EventArgs e)
        {
            MainWindow Fen = new MainWindow();
            Fen.ShowDialog();
        }

        public class Equipe
        {
            // Création de 2 propriétés identifiant et texte (de l'indice).
            public int Id { get; set; }
            public string Nom { get; set; }
            public string Score { get; set; }
            public string Date { get; set; }
            public string Heure_debut { get; set; }
            public string Heure_fin { get; set; }

            // Constructeur
            public Equipe()
            {
            }
        }
        public class Bdd
        {

            private MySqlConnection connection;

            // Constructeur
            public Bdd()
            {
                this.InitConnexion();
            }

            // Méthode pour initialiser la connexion
            private void InitConnexion()
            {
                // Création de la chaîne de connexion
                string connectionString = "SERVER=127.0.0.1; DATABASE=dbsupervision; UID=superviseur; PASSWORD=Nantes44";
                this.connection = new MySqlConnection(connectionString);
            }

            // Méthode pour ajouter un indice :
            public void AddEquipe(Equipe equipe)
            {
                try
                {
                    // Ouverture de la connexion SQL
                    this.connection.Open();

                    // Création d'une commande SQL en fonction de l'objet connection
                    MySqlCommand cmd = this.connection.CreateCommand();

                    // Requête SQL
                    cmd.CommandText = "INSERT INTO tbequipe (id, nom, score, date, heure_debut, heure_fin) VALUES (@id, @nom, @score, @date, @heure_debut, @heure_fin)";

                    // Utilisation de l'objet contact passé en paramètre
                    cmd.Parameters.AddWithValue("@id", equipe.Id);
                    cmd.Parameters.AddWithValue("@nom", equipe.Nom);
                    cmd.Parameters.AddWithValue("@score", equipe.Score);
                    cmd.Parameters.AddWithValue("@date", equipe.Date);
                    cmd.Parameters.AddWithValue("@heure_debut", equipe.Heure_debut);
                    cmd.Parameters.AddWithValue("@heure_fin", equipe.Heure_fin);


                    // Exécution de la commande SQL
                    cmd.ExecuteNonQuery();

                    // Fermeture de la connexion
                    this.connection.Close();
                }
                catch
                {
                    // Gestion des erreurs :
                    // Possibilité de créer un Logger pour les exceptions SQL reçus
                    // Possibilité de créer une méthode avec un booléan en retour pour savoir si le contact à été ajouté correctement.
                }
            }
        }
    }
}
