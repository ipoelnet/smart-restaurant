<?php
/**
 * Smart Restaurant
 *
 * An open source application to manage restaurants
 *
 * @package		SmartRestaurant
 * @author		Gjergj Sheldija
 * @copyright	Copyright (c) 2008, Gjergj Sheldija
 * @license		http://www.gnu.org/licenses/gpl.txt
 * @since		Version 1.0
 * @filesource
 * 
 *  Smart Restaurant is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation, version 3 of the License.
 *
 *	Smart Restaurant is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.

 *	You should have received a copy of the GNU General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */

$inizio=microtime();			//has to be before start.php requirement!!!
session_start();

define('ROOTDIR','..');
require_once(ROOTDIR."/includes.php");
require_once(ROOTDIR."/pos/waiter_start.php");

switch ($command){
	//case 'destroy':
	default:
		$user = new user ($_SESSION['userid']);
		$user->disconnect_waiter();
		break;
}

// prints page generation time
$tmp = generating_time($inizio);
$tpl -> assign ('generating_time',$tmp);

if($err=$tpl->parse()) return $err; 

$tpl -> clean();
$output = $tpl->getOutput();

// prints everything to screen
echo $output;

if(CONF_DEBUG_PRINT_PAGE_SIZE) echo $tpl -> print_size();
?>
