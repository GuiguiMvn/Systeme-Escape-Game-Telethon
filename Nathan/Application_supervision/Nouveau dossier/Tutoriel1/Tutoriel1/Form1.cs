using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;


namespace Tutoriel1
{
    public partial class Form1 : Form
    {
        string sDatabase = "server=;database=;userid=;password=";

        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click_1(object sender, EventArgs e)
        {
            listBox1.Items.Clear();
            string myConnection = sDatabase;
            MySqlConnection myConn = new MySqlConnection(myConnection);
            myConn.Open();

            MySqlCommand Sql = new MySqlCommand("select number from command", myConn);
            MySqlDataReader dr;
            dr = Sql.ExecuteReader();
            while (dr.Read())
            {
                listBox1.Items.Add(dr["number"].ToString());
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string myConnection = sDatabase;
            MySqlConnection myConn = new MySqlConnection(myConnection);
            myConn.Open();

            MySqlCommand Sql = new MySqlCommand("select mail from command where number='" +listBox1.SelectedItem +"'", myConn);
            MySqlDataReader dr;
            dr = Sql.ExecuteReader();
            while (dr.Read())
            {
                label1.Text = dr["mail"].ToString();
            }
        }
    }
}
