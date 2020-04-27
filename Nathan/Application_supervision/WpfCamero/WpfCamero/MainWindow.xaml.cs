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
using System.Windows.Navigation;
using System.Windows.Shapes;

using System.ComponentModel;
using System.Windows.Threading;
using System.Diagnostics;

// Librairie MySQL ajoutée dans les références.
using MySql.Data.MySqlClient;
using System.Net.Sockets;
using System.Net;

namespace WpfCamero
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private int time = 15; //1h = 3600s
        private DispatcherTimer timercam;
        private DispatcherTimer timerchrono;
        private DispatcherTimer timermessage;

        public MainWindow()
        {
            InitializeComponent();

            // Fonction de rafraichissement de l'image de la caméra IP :
            timercam = new DispatcherTimer();
            timercam.Interval = TimeSpan.FromSeconds(5);
            timercam.Tick += timercam_Tick;
            timercam.Start();

            //Fonction du chronometre :
            timerchrono = new DispatcherTimer();
            timerchrono.Interval = new TimeSpan(0, 0, 1);
            timerchrono.Tick += timerchrono_Tick;
            timerchrono.Start();

            // Fonction de rafraichissement du message reçu dans la salle :
            timermessage = new DispatcherTimer();
            timermessage.Interval = TimeSpan.FromSeconds(5);
            timermessage.Tick += timercam_Tick;
            timermessage.Start();

            string connectionString = "SERVER=127.0.0.1; DATABASE=dbsupervision; UID=superviseur; PASSWORD=Nantes44";
            string myConnection = connectionString;
            MySqlConnection myConn = new MySqlConnection(myConnection);
            myConn.Open();
            string sql = "SELECT text FROM tbindice WHERE date_dernier_envoi = (SELECT MAX(date_dernier_envoi)) ORDER BY date_dernier_envoi DESC LIMIT 2";
            MySqlCommand cmd = new MySqlCommand(sql, myConn);
            TxtIndice.Text = cmd.ExecuteScalar().ToString();

            
            string sql2 = "SELECT nom FROM tbequipe WHERE date = (SELECT MAX(date)) ORDER BY date DESC LIMIT 1 ";
            MySqlCommand cmd2 = new MySqlCommand(sql2, myConn);
            TxtEquipe.Text = cmd2.ExecuteScalar().ToString();

        }

        void timermessage_Tick(object sender, EventArgs e)
        {
            string connectionString = "SERVER=127.0.0.1; DATABASE=dbsupervision; UID=superviseur; PASSWORD=Nantes44";
            string myConnection = connectionString;
            MySqlConnection myConn = new MySqlConnection(myConnection);
            myConn.Open();
            string sql = "SELECT text FROM tbindice WHERE date_dernier_envoi = (SELECT MAX(date_dernier_envoi)) ORDER BY date_dernier_envoi DESC LIMIT 2";
            MySqlCommand cmd = new MySqlCommand(sql, myConn);
            TxtIndice.Text = cmd.ExecuteScalar().ToString();

        }

        void timercam_Tick(object sender, EventArgs e)
        {
            lblTime.Content = DateTime.Now.ToLongTimeString();
            wbDLink.Refresh();
        }

        void timerchrono_Tick(object sender, EventArgs e)
        {
            if (time > 0)
            {
                time--;
                TBCountDown.Text = string.Format("00:{00}:{1}", time / 60, time % 60);
            }
            else
            {
                timerchrono.Stop();
                Window_fin Fen = new Window_fin();
                Fen.ShowDialog();
            }
        }


        // Action du clic sur l'option d'envoyer un indice :
        private void btnWindow_indice_Click(object sender, EventArgs e)
        {
            Window_indice Fen = new Window_indice();
            Fen.ShowDialog();
        }

        private void TextBox_TextChanged(object sender, TextChangedEventArgs e)
        {

        }

        private void Stopper_partie_Click(object sender, RoutedEventArgs e)
        {
            arret Fen = new arret();
            Fen.ShowDialog();
        }
    }



    // Communication avec la BDD pour récupérer le dernier indice envoyé à l'afficheur :

    public class Recup_Indice
    {
        // Création de 2 propriétés identifiant et texte (de l'indice).
        public int Id { get; set; }
        public string Text { get; set; }
        public string Date { get; set; }


        // Constructeur
        public Recup_Indice()
        {
        }
    }
    public class BddRecup
    {

        private MySqlConnection connection;

        // Constructeur
        public BddRecup()
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
        public void RecupIndice(Recup_Indice recup_indice)
        {
            try
            {
                // Ouverture de la connexion SQL
                this.connection.Open();

                // Création d'une commande SQL en fonction de l'objet connection
                MySqlCommand cmd = this.connection.CreateCommand();

                // Requête SQL
                cmd.CommandText = "SELECT text FROM tbindice WHERE date_dernier_envoi = (SELECT MAX(date_dernier_envoi)) ORDER BY date_dernier_envoi DESC LIMIT 2";

                // Exécution de la commande SQL
                cmd.ExecuteNonQuery();

                // Fermeture de la connexion
                this.connection.Close();
            }
            catch
            {
                MessageBox.Show("L'ajout du nouvel indice dans la base de données à échoué. " +
                "Veuillez vous assurer que le serveur MySQL (Base de données) est correctement lancé.");
            }
        }
    }
}
