﻿using System;
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

// Librairies de prise en charge d'entrées/sorties pour l'envoi de la trame à l'afficheur.
using System.IO;
using System.IO.Ports;

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
        }

        private void btnWindow_superviser_Click(object sender, EventArgs e) // Action du bouton de lancement de la partie
        {

            // Créer une équipe à ajouter
            Equipe equipe = new Equipe();
            equipe.Nom = TxtBoxEquipe.Text;
            equipe.Score = "0000";
            equipe.Heure_fin = "00:00:00";
            equipe.NbJoueurs = CbNbJoueurs.Text;

            // Création de l'objet Bdd pour l'intéraction avec la base de donnée MySQL
            Bdd bdd = new Bdd();
            bdd.AddEquipe(equipe);

            MainWindow FenSuperviser = new MainWindow();
            FenSuperviser.ShowDialog();

            this.Close();
        }

        public class Equipe
        {
            // Création de propriétés :
            public int Id { get; set; }

            public string Nom { get; set; }
            public string Score { get; set; }
            public string Date { get; set; }
            public string Heure_debut { get; set; }
            public string Heure_fin { get; set; }
            public string NbJoueurs { get; set; }

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

            // Méthode pour ajouter une équipe :
            public void AddEquipe(Equipe equipe)
            {
                try
                {
                    // Ouverture de la connexion SQL
                    this.connection.Open();

                    // Création d'une commande SQL en fonction de l'objet connection
                    MySqlCommand cmd = this.connection.CreateCommand();

                    // Requête SQL
                    cmd.CommandText = "INSERT INTO tbequipe (id, nom, score, date, heure_debut, heure_fin, nbjoueurs) VALUES (@id, @nom, @score, NOW(), NOW(), @heure_fin, @nbjoueurs)";

                    // Utilisation de l'objet contact passé en paramètre
                    cmd.Parameters.AddWithValue("@id", equipe.Id);
                    cmd.Parameters.AddWithValue("@nom", equipe.Nom);
                    cmd.Parameters.AddWithValue("@score", equipe.Score);
                    cmd.Parameters.AddWithValue("@heure_fin", equipe.Heure_fin);
                    cmd.Parameters.AddWithValue("@nbjoueurs", equipe.NbJoueurs);


                    // Exécution de la commande SQL
                    cmd.ExecuteNonQuery();

                    // Fermeture de la connexion
                    this.connection.Close();
                }
                catch
                {
                    MessageBox.Show("La création d'une nouvelle équipe a échouée. Veuillez vous assurer que le serveur MySQL (Base de données) est correctement lancé. Si le problème persiste, veuillez contacter un technicien.");
                }
            }
        }

    }
}
