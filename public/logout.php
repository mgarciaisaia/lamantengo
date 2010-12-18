<?php
/**
 * @License(name="GNU General Public License", version="3.0")
 * 
 * Copyright (C) 2010 UnWebmaster.Com.Ar
 * Copyright (C) 2010 Tom Kaczocha <freedomdeveloper@yahoo.com>
 * 
 * This file is part of LaMantengo.
 * 
 * LaMantengo is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * LaMantengo is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with LaMantengo.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */
require_once("../includes/initialise.php");

define('INSITE', 1);

$title = $language->translate("title_logout");

include('get_sid.php');
$errores = "";

if (!$uid) { // Not logged in
    $errores .= $language->translate("error_already_loggedout");
} else {
    $query = "UPDATE `sessions` SET `uid` = '0' WHERE `sid`='$sid' LIMIT 1; ";
    $rs = mysql_query($query);
    $uid = 0;
}
include("header.php");
?>
<div id="contenido">
    <?php
    if ($errores)
        echo "<div id=\"errores\">$errores</div>";
    else
        echo $language->translate("session_closed");
    ?>
</div>
<?php
    include("footer.php");
?>