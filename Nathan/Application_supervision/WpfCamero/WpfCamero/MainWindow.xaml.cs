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
        private int time = 15; //1h = 3540s
        private DispatcherTimer timercam;
        private DispatcherTimer timerchrono;

        public MainWindow()
        {
            InitializeComponent();

            // Fonction de rafraichissement de l'image de la caméra IP :
            timercam = new DispatcherTimer();
            timercam.Interval = TimeSpan.FromSeconds(1);
            timercam.Tick += timercam_Tick;
            timercam.Start();

            //Fonction du chronometre :
            timerchrono = new DispatcherTimer();
            timerchrono.Interval = new TimeSpan(0, 0, 1);
            timerchrono.Tick += timerchrono_Tick;
            timerchrono.Start();
        }

        void timercam_Tick(object sender, EventArgs e)
        {
             lblTime.Content = DateTime.Now.ToLongTimeString();
             wbDLink.Refresh();
        } 

        void timerchrono_Tick(object sender, EventArgs e)
        {
            if (time>0)
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
    }


}
