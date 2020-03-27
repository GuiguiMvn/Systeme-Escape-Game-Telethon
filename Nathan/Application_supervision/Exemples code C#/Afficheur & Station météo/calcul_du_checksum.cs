private string calculerCheckSum(string message)
{
	byte[] messageBytes = Encoding.Default.GetBytes(message);
	
	/* calcul du checksum */

	byte checksum = 0;

	int i = 0;

	for (i = 0; i < messageBytes.Length; i++)
	{
		checksum ^= messageBytes[i];
	}

	// conversion du checksum en chaine Hexa.

	string checksumHex = checksum.ToString("X2");

	/* FIN - calcul du checksum */

	return checksumHex;
}