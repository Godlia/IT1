<?php
$passwd = "1234";
$illegalSymbols = array(" ", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "=", "+", "[", "]", "{", "}", ";", ":", "'", '"', ",", "<", ">", ".", "?", "/", "\\", "|");
var_dump($_POST);

function checkPassword($passwd, $illegalSymbols)
{
    if (isset($_POST['password'])) {
        if (in_array($_POST['password'], $illegalSymbols)) {
            print "Illegal symbols in password";
            return false;
        } else
        if ($_POST['password'] == $passwd) {
            return true;
        }
    }
    return false;
}

if (checkPassword($passwd, $illegalSymbols)) {
    $file = "./notat.txt";
    print "<form> <textarea id='code' name='code' rows='20' cols='100'>" . htmlspecialchars(file_get_contents($file)) . "</textarea><input type='hidden' name='change' value='true'><input type='submit' value='Lagre'></form>";

}
?>
<html>
<form action="" method="POST">
    <input type="text" name="password" id="">
    <input type="submit" value="Submit">
</form>

</html>