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

namespace WpfCamero
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
       // private DispatcherTimer timer;

        public MainWindow()
        {
            InitializeComponent();

         /*   timer = new DispatcherTimer();
            timer.Interval = TimeSpan.FromSeconds(1);
            timer.Tick += timer_Tick;
            timer.Start(); */
        }

        /*    void timer_Tick(object sender, EventArgs e)
            {
                lblTime.Content = DateTime.Now.ToLongTimeString();
                wbDLink.Refresh();
            } */

        private void btnWindow_indice_Click(object sender, EventArgs e)
        {
            Window_indice Fen = new Window_indice();
            Fen.ShowDialog();
        }
    }


}
