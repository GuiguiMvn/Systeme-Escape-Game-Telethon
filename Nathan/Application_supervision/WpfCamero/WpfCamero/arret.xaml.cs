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
    public partial class arret : Window
    {
        public arret()
        {
            InitializeComponent();
        }

        private void BtnStopper_Click(object sender, RoutedEventArgs e)
        {
            Window_fin Fen = new Window_fin();
            Fen.ShowDialog();
            this.Close();
        }

        private void BtnAnnuler_Click(object sender, RoutedEventArgs e)
        {
            this.Close();
        }
    }
}
