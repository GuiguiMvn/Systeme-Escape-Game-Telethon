   M S B A M L   `   `   `  ����D  @WpfCamero, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null%clr-namespace:WpfCamero	WpfCamero  5   	        WpfCamero.Window_lancement   5   	   R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   )localclr-namespace:WpfCamero     5   	     � Title$#  Créer et lancer une partie :��5   	   $	��500��6.   $	��400��6;   $	��500��6G   $	��400��6W   $	��500��6f   $	��400��6v    � WindowStartupLocation$ CenterScreen=�6�   .��5	      � .+�5   
   �� $
��Left=�6   $��56��6+   $	��Top=�67   $	��390��6O   ��5      �� 5       �� 	UriSource$' !Window creer partie (en tete).PNG?�6   5      �� 5   
   $
��Left=�6   $��59��6+   $��	0,400,0,0q�67   $	��Top=�6J   $	��392��6b   ��5      �� 5      $. (Window envoi d'indice (pied de page).PNG?�6   5      �� 5   
   $
��Left=�6   $��97��6+   $	��Top=�67   $��92��6O   $��148,303,0,0q�6Z   ��5      �� 5      $ btn_Lancer_Partie.PNG?�6   5      �� 5   
   -   5         ��Name$ TxtBoxEquipe��5      $
��Left=�6)   $��27��6D   $��162,122,0,0q�6P    �� TextWrapping$
 Wrap=�6e   $	��Top=�6y   $	��198��6�   ���	#FFFFF3BF���	#FFE804FF6�   �� 5   
   $
��Left=�6   $��23��6/   $��
20,126,0,0q�6;   $
��Wrap=�6O   $��Nom de l'équipe :��6c   $	��Top=�6|   $	��137��6�   $��14(�6�   $��Century Gothic)�6�   ���	#FF6109FB$
��Bold"�6�   ���	#FFF7F5BB �� TextAlignment$ Center=�6
   �� 
LineHeight$ 7��6!  �� 5    
   -   5         ��Name$ btnWindow_superviser��5       $��Center=�6/   $��79��6L   $��148,311,159,79q�6X   $��Center=�6p   $��85��6�   $��18(�6�   $��Century Gothic)�6�   $
��Bold"�6&   J� Opacity$ 0Q�68  ��6�   Z� ��6�   Z� ��6  Z� .��5!      &   System.Windows.Controls.DataGrid  $	��100��6   $	��100��6$   5"      �� 5$   
   -   5        	 ��Name$	 CbNbJoueurs��5$      $
��Left=�6(   $��220,200,0,0q�6C   $	��Top=�6X   $��78��6p   ���	#FFB9008F���	#FFB9105D��5%      �� 5&      
 �� EndPoint$	
 0,1&�6&    �� 
StartPoint$	 0,0&�65   .��5'      �  � Color$ 	#FFF0F0F0��6#    � Offset$ 0Q�65   � 5(      $ 	#FFF9ED6E��6#   $ 1Q�65   5)      .@�5+      �� .��6   26   �� 5,      .��6   36   �� 5-      .��6   46   �� 5.      .��6   56   5/      �� 50   
   $
��Left=�6   $��22��6/   $��
27,200,0,0q�6;   $
��Wrap=�6O   $��Nombre de joueurs :��6c   $	��Top=�6~   $	��159��6�   $��14(�6�   $��Century Gothic)�6�   ���	#FF6109FB$
��Bold"�6�   ���	#FFF7F5BB$ Center=�6  53      55      