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

namespace Alcootest
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        CBuveur Utilisateur;

        public MainWindow()
        {
            InitializeComponent();
            Utilisateur = new CBuveur();
            this.Reinitialiser();
        }

        private void btnWindowInfo_Click(object sender, EventArgs e)
        {
            WindowInfo Fen = new WindowInfo();
            Fen.ShowDialog();
        }

        public void Reinitialiser()
        {
            Utilisateur.reset_alcoolemie();
            lblTaux.Content = Utilisateur.get_alcoolemie() + " g/L";
            if(Utilisateur.get_sexe())
            {
                ckHomme.IsChecked = true;
                ckFemme.IsChecked = false;
            }
            else
            {
                ckHomme.IsChecked = false;
                ckFemme.IsChecked = true;
            }

            TxtBoxPoids.Text = Utilisateur.get_poids().ToString();

            TxtNbBiere.Text = "0";
            TxtNbCocktail.Text = "0";
            TxtNbVin.Text = "0";
            TxtNbAlcoolFort.Text = "0";

            lblConduite.Content = "Validez pour vérifier votre état !";

            /* ckBiere.IsChecked = false;
             ckCocktail.IsChecked = false;
             ckAlcoolFort.IsChecked = false;
             ckVin.IsChecked = false;
             */
        }

     
        private void MAJ_TauxAlcoolemie()
        {
            lblTaux.Content = Utilisateur.get_alcoolemie().ToString("0.##") + " g/L";

        }

        private void CkJeune_Checked(object sender, RoutedEventArgs e)
        {
            
        }

  /*      private void ckBiere_Checked(object sender, RoutedEventArgs e)
        {
            Utilisateur.MAJ_alcoolemie(1, 33, 5.0);
        }
        private void ckCocktail_Checked(object sender, RoutedEventArgs e)
        {
            Utilisateur.MAJ_alcoolemie(1, 15, 18.5);
        }

        private void CkVin_Checked(object sender, RoutedEventArgs e)
        {
            Utilisateur.MAJ_alcoolemie(1, 10, 12.5);
        }

        private void ckAlcoolFort_Checked(object sender, RoutedEventArgs e)
        {
            Utilisateur.MAJ_alcoolemie(1, 15, 40.0);
        }

    */
        public void AlcoolExemple(object sender, RoutedEventArgs e)
        {
            /*  Utilisateur.MAJ_alcoolemie(Int32.Parse(TxtNbBiere.Text), 33, 5.0);

              Utilisateur.MAJ_alcoolemie(Int32.Parse(TxtNbCocktail.Text), 15, 18.5);

              Utilisateur.MAJ_alcoolemie(Int32.Parse(TxtNbVin.Text), 10, 12.5);

              Utilisateur.MAJ_alcoolemie(Int32.Parse(TxtNbAlcoolFort.Text), 15, 40.0);
              */
        }




        private void CkHomme_Checked(object sender, RoutedEventArgs e)
        {
            try
            {
                Utilisateur = new CBuveur(true, Int32.Parse(TxtBoxPoids.Text));
            }
            catch
            {

            }
        }

        private void CkFemme_Checked(object sender, RoutedEventArgs e)
        {
            try
            {
                Utilisateur = new CBuveur(false, Int32.Parse(TxtBoxPoids.Text));
            }
            catch
            {

            }
        }


        public void calc_poids()
        {
            int saisiepoids = 0;
            saisiepoids = Int32.Parse(TxtBoxPoids.Text);
        }



        private void Valider_Click(object sender, RoutedEventArgs e)
        {
            lblTaux.Content = Utilisateur.get_alcoolemie() + " g/L";

            Utilisateur.MAJ_alcoolemie(Int32.Parse(TxtNbBiere.Text), 33, 5.0);

            Utilisateur.MAJ_alcoolemie(Int32.Parse(TxtNbCocktail.Text), 15, 18.5);

            Utilisateur.MAJ_alcoolemie(Int32.Parse(TxtNbVin.Text), 10, 12.5);

            Utilisateur.MAJ_alcoolemie(Int32.Parse(TxtNbAlcoolFort.Text), 15, 40.0);

            MAJ_TauxAlcoolemie();

            double taux_actuel = Double.Parse(Utilisateur.get_alcoolemie().ToString("0.##"));
            double limiteadulte = 0.50;
            double limitejeune = 0.20;
            if (taux_actuel < limiteadulte && ckJeune.IsChecked == false)
            {
                lblConduite.Content = "Vous pouvez prendre le volant, mais soyez prudent !";

            }
            else
            {
                lblConduite.Content = "Ne prenez pas le volant !";
            }

            if (taux_actuel > limitejeune && ckJeune.IsChecked == true)
            {
                lblConduite.Content = "Jeune Conducteur : Ne prenez pas le volant.";
            }

        }

        private void Reset_Click(object sender, RoutedEventArgs e)
        {
           this.Reinitialiser();
        }


    }
}
