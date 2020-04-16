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

// Librairies de prise en charge d'entrées/sorties pour l'envoi de la trame à l'afficheur.
using System.IO;
using System.IO.Ports;

// Librairie MySQL ajoutée dans les références.
using MySql.Data.MySqlClient;
using System.Net.Sockets;
using System.Net;

namespace WpfCamero
{
    /// <summary>
    /// Logique d'interaction pour Window_indice.xaml
    /// </summary>
    public partial class Window_indice : Window
    {

        // 127.0.0.1 est l'adresse localhost du serveur Apache WAMPP
        // Nous avons créé une base de données nommée "dbsupervision"
        // L'utilisateur choisi pour administrer cette bdd est "superviseur" avec son mot de passe "Nantes44".
        string connectionString = "SERVER=127.0.0.1; DATABASE=dbsupervision; UID=superviseur; PASSWORD=Nantes44";
        public Window_indice()
        {
            InitializeComponent();

            List_indice.Items.Clear();
            string myConnection = connectionString;
            MySqlConnection myConn = new MySqlConnection(myConnection);
            myConn.Open();

            MySqlCommand Sql = new MySqlCommand("select text from tbindice", myConn);
            MySqlDataReader dr;
            dr = Sql.ExecuteReader();
            while (dr.Read())
            {
                List_indice.Items.Add(dr["text"].ToString());
            }

            // Envoi de la trame sur IP :
           // CheckForIllegalCrossThreadCalls = false;
           // adrIpLocale = getAdrIpLocaleV4();

        }

        // Suite de l'envoi de l'IP
       /* private System.Net.IPAddress adrIpLocale;
        private IPAddress getAdrIpLocaleV4()
        {
            string hote = Dns.GetHostName();
            IPHostEntry ipLocales = Dns.GetHostEntry(hote);
            foreach (IPAddress ip in ipLocales.AddressList)
            {
                if (ip.AddressFamily == AddressFamily.InterNetwork)
                {
                    return ip;
                }
            }
            return null; // aucune adresse IP V4
        }*/


        private void btn_Envoyer_indice_Click(object sender, RoutedEventArgs e)
        {
            Indice indice = new Indice();
            indice.Text = txtIndice.Text;
            Bdd bdd = new Bdd();
            bdd.AddIndice(indice);

            /* string ipaddr = "192.168.1.0";

             byte[] message;
             Socket sock = new Socket(AddressFamily.InterNetwork,
             SocketType.Dgram, ProtocolType.Udp);
             System.Net.IPEndPoint epEmetteur = new IPEndPoint(adrIpLocale, 0);
             sock.Bind(epEmetteur);
             IPEndPoint epRecepteur = new IPEndPoint(
             IPAddress.Parse(ipaddr), 33000); //IPAddress.Parse(tb_ipDestinataire.Text), 33000);
             message = Encoding.Unicode.GetBytes(txtIndice.Text);
             sock.SendTo(message, epRecepteur);
             sock.Close();*/


            string message = txtIndice.Text;

            //Sérialisation du message en tableau de bytes.
            byte[] msg = Encoding.Default.GetBytes(message);

            UdpClient udpClient = new UdpClient();

            //La méthode Send envoie un message UDP.
            udpClient.Send(msg, msg.Length, "127.0.0.1", 5035);

            udpClient.Close();

        }

    }

    public class Indice
    {
        // Création de 2 propriétés identifiant et texte (de l'indice).
        public int Id { get; set; }
        public string Text { get; set; }

        // Constructeur
        public Indice()
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
        public void AddIndice(Indice indice)
        {
            try
            {
                // Ouverture de la connexion SQL
                this.connection.Open();

                // Création d'une commande SQL en fonction de l'objet connection
                MySqlCommand cmd = this.connection.CreateCommand();

                // Requête SQL
                cmd.CommandText = "INSERT INTO tbindice (id, text) VALUES (@id, @text)";

                // Utilisation de l'objet contact passé en paramètre
                cmd.Parameters.AddWithValue("@id", indice.Id);
                cmd.Parameters.AddWithValue("@text", indice.Text);

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
