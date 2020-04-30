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

// Librairies permettant la communication avec la base de données MYSQL.
using MySql.Data.MySqlClient;
using System.IO;
using System.IO.Ports;
using System.Data;
using System.Data.SqlClient;
using System.ComponentModel;



namespace WpfCamero
{
    /// <summary>
    /// Logique d'interaction pour Window_fin.xaml
    /// </summary>
    public partial class Window_fin : Window
    {

        // 127.0.0.1 est l'adresse localhost du serveur Apache WAMPP
        // Nous avons créé une base de données nommée "dbsupervision"
        // L'utilisateur choisi pour administrer cette bdd est "superviseur" avec son mot de passe "Nantes44".
        string connectionString = "SERVER=127.0.0.1; DATABASE=dbsupervision; UID=superviseur; PASSWORD=Nantes44";

   
        public Window_fin()
        {
            InitializeComponent();

            // Créer une équipe à ajouter
            Equipe equipe = new Equipe();
            equipe.Score = "1234";

            // Création de l'objet Bdd pour l'intéraction avec la base de donnée MySQL
            Bdd bdd = new Bdd();
            bdd.Fin_Equipe(equipe);
            bdd.MAJScore(equipe);

            string connectionString = "SERVER=127.0.0.1; DATABASE=dbsupervision; UID=superviseur; PASSWORD=Nantes44";
            string myConnection = connectionString;
            MySqlConnection myConn = new MySqlConnection(myConnection);
            myConn.Open();

            string sql = "SELECT score FROM tbequipe WHERE date = (SELECT MAX(date)) ORDER BY date DESC LIMIT 1 ";
            MySqlCommand cmd = new MySqlCommand(sql, myConn);
            TxtScore.Text = cmd.ExecuteScalar().ToString();

            string sql2 = "SELECT nom FROM tbequipe WHERE date = (SELECT MAX(date)) ORDER BY date DESC LIMIT 1 ";
            MySqlCommand cmd2 = new MySqlCommand(sql2, myConn);
            TxtEquipe.Text = cmd2.ExecuteScalar().ToString();

        }

        private void BtnLister_Click(object sender, EventArgs e)
        {
            Form_Classement classement = new Form_Classement();
            classement.ShowDialog();
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

            // Méthode pour changer les résultats d'une équipe :
            public void Fin_Equipe(Equipe equipe)
            {
                try
                {
                    // Ouverture de la connexion SQL
                    this.connection.Open();

                    // Création d'une commande SQL en fonction de l'objet connection
                    MySqlCommand cmd = this.connection.CreateCommand();

                    // Requête SQL
                    //Permet de mettre à jour l'heure de fin de la table tbequipe avec la dernière date triée par ordre décroissant et limiter à 1 résultat. 
                    cmd.CommandText = "UPDATE tbequipe SET heure_fin = NOW() WHERE date=(SELECT MAX(date)) ORDER BY date DESC LIMIT 1";

                    //La commande suivante permet d'extraire la dernière ligne saisie dans la table équipe (id décroissant):
                    //SELECT id, nom, score, date, heure_debut, heure_fin FROM tbequipe WHERE id=(SELECT MAX(id) FROM tbequipe) 


                    // Exécution de la commande SQL
                    cmd.ExecuteNonQuery();

                    // Fermeture de la connexion
                    this.connection.Close();
                }
                catch
                {
                    MessageBox.Show("La mise à jour de l'heure de fin de partie a échouée. Veuillez vous assurer que le serveur MySQL (Base de données) est correctement lancé. Si le problème persiste, veuillez contacter un technicien.");
                }
            }

            //Méthode pour mettre à jour le score de l'équipe :
            public void MAJScore(Equipe equipe)
            {
                try
                {
                    // Ouverture de la connexion SQL
                    this.connection.Open();

                    // Création d'une commande SQL en fonction de l'objet connection
                    MySqlCommand cmd = this.connection.CreateCommand();

                    // Requête SQL
                    //Permet de mettre à jour l'heure de fin de la table tbequipe avec le dernier id trier par ordre décroissant et limiter à 1 résultat. 
                    cmd.CommandText = "UPDATE tbequipe SET score = @score WHERE date=(SELECT MAX(date)) ORDER BY date DESC LIMIT 1";

                    // Utilisation de l'objet contact passé en paramètre
                    cmd.Parameters.AddWithValue("@score", equipe.Score);

                    // Exécution de la commande SQL
                    cmd.ExecuteNonQuery();

                    // Fermeture de la connexion
                    this.connection.Close();
                }
                catch
                {
                    MessageBox.Show("La mise à jour du score de l'équipe a échouée. Veuillez vous assurer que le serveur MySQL (Base de données) est correctement lancé. Si le problème persiste, veuillez contacter un technicien.");
                }
            }

        }

        private void BtnLister_Click_1(object sender, RoutedEventArgs e)
        {
            Classement classement = new Classement();
            classement.ShowDialog();
        }
    }
}
