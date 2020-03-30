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

// Librairie MySQL ajoutée dans les références.
using MySql.Data.MySqlClient;
using System.IO;
using System.IO.Ports;

namespace WpfCamero
{
    /// <summary>
    /// Logique d'interaction pour Window_fin.xaml
    /// </summary>
    public partial class Window_fin : Window
    {
        public Window_fin()
        {
            InitializeComponent();
        }
    }
}
