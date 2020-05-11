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

namespace WpfCamero
{
    /// <summary>
    /// Logique d'interaction pour arret.xaml
    /// </summary>
    public partial class Window_arret : Window
    {
        MainWindow mainWin;
        public Window_arret(MainWindow fen)
        {
            InitializeComponent();
            mainWin = fen;
        }

        private void BtnStopper_Click(object sender, RoutedEventArgs e) // Action du bouton de confirmation "Stopper la partie"
        {
            mainWin.Terminer_partie();
            this.Close();
        }

        private void BtnAnnuler_Click(object sender, RoutedEventArgs e) // Action du bouton "annuler"
        {
            this.Close();
        }
    }
}
