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

namespace WpfCamero
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private DispatcherTimer timer;

        public MainWindow()
        {
            InitializeComponent();

            // Fonction de rafraichissement de l'image de la caméra IP :
            timer = new DispatcherTimer();
            timer.Interval = TimeSpan.FromSeconds(1);
            timer.Tick += timer_Tick;
            timer.Start(); 
        }

            void timer_Tick(object sender, EventArgs e)
            {
                lblTime.Content = DateTime.Now.ToLongTimeString();
                wbDLink.Refresh();
            } 

        private void timer1_Tick(object sender, EventArgs e)
        {
            int secondInt = Convert.ToInt32(second.Text);
            if (secondInt < 59)
            {
                second.Text = Convert.ToString(secondInt + 1);
            }
            else
            {
                second.Text = "0";
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
    }


}
