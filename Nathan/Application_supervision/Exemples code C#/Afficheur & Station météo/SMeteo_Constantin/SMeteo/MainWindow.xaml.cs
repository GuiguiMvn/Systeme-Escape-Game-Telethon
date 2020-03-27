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
using System.IO.Ports;
using System.IO;
using System.Threading;
using MySql.Data;
using MySql.Data.MySqlClient;


namespace SMeteo
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private SerialPort portCOM;
        private int countPacketsRecus;
        private string barometer;
        private string temperatureInterieure;
        private string humidite;
        private string temperatureExterieure;
        private string vitesseVent;
        private string directionVent;
        string messageb;
        string messagetI;
        string messageh;
        string messagetE;
        string messagevV;
        string messagedV;
        List<string> messages = new List<string>();
        private MySqlConnection conn;
        private string[] lst_couleur = { "Rouge", "Vert", "Bleu" };

        public MainWindow()
        {
            InitializeComponent();
            portCOM = new SerialPort("COM1", 9600, Parity.None, 8, StopBits.One);
            portCOM.Open();
            countPacketsRecus = 0;

            string myConnectionString = "server=10.6.0.1;"
                                              + "uid=meteo;"
                                              + "pwd=Nantes44;"
                                              + "database=meteo;"
                                              + "Charset=latin1;";

            conn = new MySqlConnection(myConnectionString);


            conn.Open();

            string sql = "SELECT trame FROM `trame` ORDER BY `trame`.`date_heure` DESC LIMIT 1 ";

            MySqlCommand cmd = new MySqlCommand(sql, conn);
            MySqlDataReader rdrDerniereTrame = cmd.ExecuteReader();

            rdrDerniereTrame.Read();

            string trame = rdrDerniereTrame["trame"].ToString();
            conn.Close();

            MessageBox.Show(trame);

            this.Reinitialiser();
            //String trame = "4F4F4FEC01FF7F937494023600020DFF0E0166005B001700E100FF7FFF7F3100FF5DFF34002E00FF000500FFFF7F0500121905000200020000000500020000FFFF937493749374FF010D130C0C010F01020101FF7FFF7FFF7FFF7FFF7FFF7F0A0DC3E0";
            //String trame = "4F4F4F3C00F900A774E90226F10106031401";
            byte[] buffer = StrToByteArray(trame);
            RefreshMeteo(buffer.Length, buffer, trame);
        }

        public void Reinitialiser()
        {
            couleurs.Items.Clear();
            foreach (string couleur in lst_couleur)
            {
                couleurs.Items.Add(couleur);
            }
            couleurs.Text = couleurs.Items[0] as string;
        }

        public void PortCOM_DataReceived(object sender, SerialDataReceivedEventArgs e)
        {
            Thread.Sleep(100); // pour éviter de recevoir la trame en 2 fois

            int tailleBuffer = portCOM.BytesToRead;

            byte[] bufferLecture = new byte[tailleBuffer];
            portCOM.Read(bufferLecture, 0, tailleBuffer);

            byte[] bAsciiString = Encoding.Convert(Encoding.UTF8, Encoding.Default, bufferLecture);

            String message = Encoding.Default.GetString(bAsciiString);

            Application.Current.Dispatcher.Invoke(new Action(() => {
                if (bufferLecture.Length == 99)
                    RefreshMeteo(bufferLecture.Length, bufferLecture, message);
            }));
        }

        // TRAME DE 99 octets RECUE > Taille d'une trame météo
        private void RefreshMeteo(int tailleBuffer, byte[] bufferLecture, string message)
        {
            CReleveMeteo releve = new CReleveMeteo(bufferLecture);

            lblStatut.Content = "Type packet : " + releve.getTypePacket() + " | " + (++countPacketsRecus).ToString() + " trame(s) reçue(s)";

            barometer = "Pression atmosph<U69>rique : " + releve.getBarometer().ToString("#.0") + " mbar ";
            lblPressionAtmospherique.Content = "Pression atmosphérique : " + releve.getBarometer().ToString("#.0") + " mbar"; ;

            temperatureInterieure = "Temp<U69>rature int<U69>rieure : " + releve.getInsideTemperature().ToString("#.0") + "<U3A>C ";
            lblTemperatureInterieure.Content = "Température intérieure : " + releve.getInsideTemperature().ToString("#.0") + "°C";

            humidite = "Humidit<U69> : " + releve.getInsideHumidity().ToString() + "% ";
            lblHumidite.Content = "Humidité : " + releve.getInsideHumidity().ToString() + "%";

            temperatureExterieure = "Temp<U69>rature ext<U69>rieure : " + releve.getOutsideTemperature().ToString("#.0") + "<U3A>C ";
            lblTemperatureExterieure.Content = "Température extérieure : " + releve.getOutsideTemperature().ToString("#.0") + "°C";

            vitesseVent = "Vitesse du vent : " + releve.getWindSpeed().ToString("0.0") + " Km/h ";
            lblVitesseVent.Content = vitesseVent;

            directionVent = "Direction du vent : " + releve.getWindDirection().ToString() + "<U3A>(" + releve.getWindDirectionNESO() + ")";
            lblDirectionVent.Content = "Direction du vent : " + releve.getWindDirection().ToString() + "° (" + releve.getWindDirectionNESO() + ")";
        }

        private void btnStart_Click(object sender, RoutedEventArgs e)
        {
            if (!portCOM.IsOpen)
            {
                MessageBox.Show("ERREUR COMMUNICATION", "Port COM fermé.");
                return;
            }

            portCOM.Write("LPS\n");
        }

        string calculerCheckSum(string message)
        {
            byte[] messageBytes = Encoding.Default.GetBytes(message);


            byte checksum = 0;

            int i = 0;

            for (i = 0; i < messageBytes.Length; i++)
            {
                checksum ^= messageBytes[i];
            }

            string checksumHex = checksum.ToString("X2");


            return checksumHex;
        }



        private void BtnEnvoyer_Click(object sender, RoutedEventArgs e)
        {
            msgPressionAtmospherique();
            msgTemperatureInterieure();
            msgHumidite();
            msgTemperatureExterieure();
            msgVitesseVent();
            msgDirectionVent();

            string debutTrame = "<ID01>";
            string optionsTrame;
            string finTrame = "<E>";

            int PageNumber = 65;


            string PageNumbers = "";

            foreach (string message in messages)
            {
                char Pn = (char)PageNumber;

                optionsTrame = "<L1><P" + Pn + "><FE><MB><WC><FE>";
                string trameOptionsEtMessage = optionsTrame + message;

                string CS = calculerCheckSum(optionsTrame + message);

                string trame = debutTrame + trameOptionsEtMessage + CS + finTrame;

                portCOM.WriteLine(trame);
                Thread.Sleep(200);

                PageNumbers += Pn;
                PageNumber += 1;
            }

            string tmp = "<TA>00010100009912302359" + PageNumbers;
            string tramePageAfficher = debutTrame + tmp + calculerCheckSum(tmp) + finTrame;

            portCOM.WriteLine(tramePageAfficher);


        }

        private void Window_Closing(object sender, System.ComponentModel.CancelEventArgs e)
        {
            portCOM.Close();
        }

        public byte[] StrToByteArray(string str)
        {
            Dictionary<string, byte> hexindex = new Dictionary<string, byte>();
            for (int i = 0; i <= 255; i++)
                hexindex.Add(i.ToString("X2"), (byte)i);

            List<byte> hexres = new List<byte>();
            for (int i = 0; i < str.Length; i += 2)
                hexres.Add(hexindex[str.Substring(i, 2)]);

            return hexres.ToArray();
        }

        private void msgPressionAtmospherique()
        {
            if (chbPressionAtmospherique.IsChecked == true)
            {
                messageb = barometer;
                messages.Add(messageb);
            }
            else
            {
                messageb = "";
                messages.Remove(messageb);
            }
        }

        private void msgTemperatureInterieure()
        {
            if (chbTemperatureInterieure.IsChecked == true)
            {
                messagetI = temperatureInterieure;
                messages.Add(messagetI);
            }
            else
            {
                messagetI = "";
                messages.Remove(messagetI);
            }
        }

        private void msgHumidite()
        {
            if (chbHumidite.IsChecked == true)
            {
                messageh = humidite;
                messages.Add(messageh);
            }
            else
            {
                messageh = "";
                messages.Remove(messageh);
            }
        }

        private void msgTemperatureExterieure()
        {
            if (chbTemperatureExterieure.IsChecked == true)
            {
                messagetE = temperatureExterieure;
                messages.Add(messagetE);
            }
            else
            {
                messagetE = "";
                messages.Remove(messagetE);
            }
        }

        private void msgVitesseVent()
        {
            if (chbVitesseVent.IsChecked == true)
            {
                messagevV = vitesseVent;
                messages.Add(messagevV);
            }
            else
            {
                messagevV = "";
                messages.Remove(messagevV);
            }
        }

        private void msgDirectionVent()
        {
            if (chbDirectionVent.IsChecked == true)
            {
                messagedV = directionVent;
                messages.Add(messagedV);
            }
            else
            {
                messagedV = "";
                messages.Remove(messagedV);
            }
        }

    }
}
