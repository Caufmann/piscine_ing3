<?php
session_start();
$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

      if($db_found)  
      {
        if ($_POST['boutton'])
        {

          if($_SESSION['Id']<999 || !$_SESSION['Id'])
          {
            $msg = "Vous devez vous connecter avec un compte acheteur pour valider votre panier ";
            header("Location:connecter1.php?msg=".$msg);
            die;
             
          }
          else
          {
   echo'<!DOCTYPE html>
  <html>   

    <form action="test_carte.php" method="post">
          <table>
            <tr>
                          <td> Type de Carte:</td>
                          <td><select name="type_card">
                                <option value="Mastercard">Mastercard</option>
                                <option value="Visa">Visa</option>
                                <option value="Amex">Amex</option>
                                <option value="Paypal">Paypal</option>
                              </select>
                          </td>
                        </tr>
          
            <tr>
                    <td>Numero de carte :</td>
                    <td><input type="number" name="number"></td>
            </tr>
            <tr>
                    <td>Date expiration carte :</td>
                    <td><input type="date" name="date"></td>
                    <td><span class="note">Format: AAAA-MM-JJ</span></td>
            </tr>
            <tr>
                    <td>Nom proprietaire carte:</td>
                    <td><input type="string" name="nom_carte" ></td>
            </tr>
            <tr>
                    <td>Cryptogramme :</td>
                    <td><input type="number" name="num_carte"></td>
            </tr>
            <tr>
                          <td >
                          <input type="submit" name="boutton" value="acheter">
                          </td>
                       </tr>

          </table>
      </form>
  </html>';

           }


        }

        else if ($_POST['boutton1'])
        {
          $sql="DELETE FROM Panier ";
          $result = mysqli_query($db_handle, $sql);
          header("Location: panier.php");

        }
      
    }

?>