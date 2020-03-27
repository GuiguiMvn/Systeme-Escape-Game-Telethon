using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace SMeteo
{
class CReleveMeteo
{
    private string typePacket;

    private string[] barTrendOptions = { "Falling Rapidly", "Falling Slowly", "Steady", 
 "Rising Slowly", "Rising Rapidly" };

    private string barTrend; // chaîne de caractères
    private double barometer; // mbar
    private double insideTemperature; // °C
    private int insideHumidity; // %
    private double outsideTemperature; // °C
    private double windSpeed; //km/h
    private string windDirectionNESO; // °
    private int windDirection;

    private byte[] buffer;
    private string statut; // "attente" / "ok" / "erreur"

    public CReleveMeteo(byte[] buffer)
    {
        typePacket = "- non déterminé -";

        statut = "attente";

        this.buffer = buffer;

        decoderTrame(this.buffer);
    }


        public void decoderTrame(byte[] buffer)
        {

            // Bar Trend (Rev B) | Offset : 3 | Size : 1
            switch (buffer[3])
            {
                case 196:
                    barTrend = barTrendOptions[0];
                    break;
                case 236:
                    barTrend = barTrendOptions[1];
                    break;
                case 0:
                    barTrend = barTrendOptions[2];
                    break;
                case 20:
                    barTrend = barTrendOptions[3];
                    break;
                case 60:
                    barTrend = barTrendOptions[4];
                    break;
                default:
                    break;
            }


            // Type packet | Offset : 4 | Size : 1

            if (buffer[4] == 0) typePacket = "LOOP";
            else if (buffer[4] == 1) typePacket = "LOOP2";

            // Barometer | Offset : 7 | Size : 2

            double barometerInHg = ((double)buffer[8] * 256 + (double)buffer[7]) / 1000;
            barometer = 33.86 * barometerInHg;
            //lblPressionAtmospherique.Content = "Pression atmosphérique :" + barometer.ToString("#.0") + "mbar";

            // Inside Temperature | Offset : 9 | Size : 2

            double insideTemperatureFarenheit = ((double)buffer[10] * 256 + (double)buffer[9]) / 10;
            insideTemperature = (insideTemperatureFarenheit - 32) / 1.8;

            // Inside Humidity | Offset : 11 | Size : 1

            insideHumidity = (int)buffer[11];

            // Outside Temperature | Offset : 12 | Size : 2

            double outsideTemperatureFarenheit = ((double)buffer[13] * 256 + (double)buffer[12]) / 10;
            outsideTemperature = (outsideTemperatureFarenheit - 32) / 1.8;

            // Wind Speed | Offset : 14 | Size : 1

            windSpeed = (double)buffer[14] * 1.6093;

            // Wind Direction | Offset : 16 | Size : 2
            windDirection = (int)buffer[17] * 256 + (int)buffer[16];
            if (windDirection <= 0 && windDirection <22.5 || windDirection > 337.5)
            {
                windDirectionNESO = "Nord";
            }
            else if (windDirection >= 22.5 && windDirection < 67.5)
            {
                windDirectionNESO = "Nord Est";
            }
            else if (windDirection >= 67.5 && windDirection < 112.5)
            {
                windDirectionNESO = "Est";
            }
            else if (windDirection >= 112.5 && windDirection < 157.5)
            {
                windDirectionNESO = "Sud Est";
            }
            else if (windDirection <= 157.5 && windDirection < 202.5)
            {
                windDirectionNESO = "Sud";
            }
            else if (windDirection >= 202.5 && windDirection < 247.5)
            {
                windDirectionNESO = "Sud Ouest";
            }
            else if (windDirection >= 247.5 && windDirection < 292.5)
            {
                windDirectionNESO = "Ouest";
            }
            else if (windDirection >= 292.5 && windDirection < 337.5)
            {
                windDirectionNESO = "Nord Ouest";
            }
        }

    public string getTypePacket() { return typePacket; }
    public string getStatut() { return statut; }
    public string getBarTrend() { return barTrend; }
    public double getBarometer() { return barometer; }
    public double getInsideTemperature() { return insideTemperature; }
    public int getInsideHumidity() { return insideHumidity; }
    public double getOutsideTemperature() { return outsideTemperature; }
    public double getWindSpeed() { return windSpeed; }
    public string getWindDirectionNESO() { return windDirectionNESO; }
    public int getWindDirection() { return windDirection; }

    }
}
