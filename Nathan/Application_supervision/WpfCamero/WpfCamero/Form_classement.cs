using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

// Librairies permettant la communication avec la base de données MYSQL.
using MySql.Data.MySqlClient;
using System.IO;
using System.IO.Ports;
using System.Data;
using System.Data.SqlClient;

namespace WpfCamero
{
    public partial class Form_Classement : Form
    {

        string connectionString = "SERVER=127.0.0.1; DATABASE=dbsupervision; UID=superviseur; PASSWORD=Nantes44";
        public Form_Classement()
        {
            InitializeComponent();

            listEquipe.Items.Clear();

            string myConnection = connectionString;
            MySqlConnection myConn = new MySqlConnection(myConnection);
            myConn.Open();

            MySqlCommand Sql = new MySqlCommand("SELECT nom, score, date, nbjoueurs FROM `tbequipe` WHERE score=(SELECT MAX(score)) ORDER BY score DESC", myConn);
            MySqlDataReader dr;
            dr = Sql.ExecuteReader();
            while (dr.Read())
            {
                ListViewItem item = new ListViewItem(dr["Nom"].ToString());
                item.SubItems.Add(dr["Date"].ToString());
                item.SubItems.Add(dr["Score"].ToString());
                item.SubItems.Add(dr["nbjoueurs"].ToString());

                listEquipe.Items.Add(item);
            }
        }

      
    }
}
