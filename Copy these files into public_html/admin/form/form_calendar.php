<?include('connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass != $info['password'])
	 	{ 	 	} 
	 else
		{
				 //////////ADMIN IS LOGGED IN
				 
				 

echo'<table> <tr><td valign="top" style="padding:5px">';
$view=$_GET['page'];
echo'<P><a href="admin_new_calendar.php?calendarID='.$view.'">To upload a new scheduled item, Click Here</a>';
$data=mysql_query("select * from calendar where calendarID='$view'");
$count=mysql_num_rows($data);
if($count=='0'){echo'<P>You dont have any scheduled items on this page yet. <P>';}else {
	echo'  <P>There are '.$count.' Scheduled items on this page.<br>';}

$row='0';
function calendar($date)
         {
$view=$_GET['page'];
$calendarID=$_GET['f'];
$date=$_GET['date'];
$month=$_GET['month'];
$day=$_GET['day'];
$year=$_GET['year'];
$month_name=$_GET['month_name'];

         //If no parameter is passed use the current date.
         if($date == null){
            $date = getDate();

         $day = $date["mday"];
         $month = $date["mon"];
		if(!eregi("^1",$month)){$month='0'.$month;}
			echo'<P>'; 
         $month_name = $date["month"];
         $year = $date["year"];
		 }

		$this_month = getDate(mktime(0, 0, 0, $month, 1, $year));
         $last_month = getDate(mktime(0, 0, 0, $month - 1 , 1, $year));
         $next_month = getDate(mktime(0, 0, 0, $month + 1, 1, $year));

$next_month_num=$next_month['mon'];
$next_month_name=$next_month["month"];
$next_year=$next_month['year'];
		
$last_year=$last_month['year'];
$last_month_name=$last_month['month'];
$last_month_num=$last_month['mon'];

		//Find out when this month starts and ends.
         $first_week_day = $this_month["wday"];
         $days_in_this_month = round(($next_month[0] - $this_month[0]) / (60 * 60 * 24));

		
         $calendar_html .= "<table>";

         $calendar_html .= "<tr><td colspan=\"7\" valign=\"top\" style=\" color:000000;\">";
//LAST MONTH
 $calendar_html .='<a href="?page='.$view.'&date=set&month_name='.$last_month_name.'&month='.$last_month_num.'&year='.$last_year.'&day='.$day.'">'.$last_month_name.'</a>';
		

$calendar_html .=" | <b>" .
                           $month_name . " " . $year; 
	///NEXT MONTH					   
$calendar_html .=' | </b><a href="?page='.$view.'&date=set&month_name='.$next_month_name.'&month='.$next_month_num.'&year='.$next_year.'&day='.$day.'">'.$next_month_name.'</a>';
$calendar_html .='</td></tr>';

         $calendar_html .= "<tr>";

         //Fill the first week of the month with the appropriate number of blanks.
         for($week_day = 0; $week_day < $first_week_day; $week_day++)
            {
            $calendar_html .= "<td  width=\"75px\"  valign=\"top\" height=\"75px\" style=\" color:000000; min-width:82px;\"> </td>";
            }

         $week_day = $first_week_day;
         for($day_counter = 1; $day_counter <= $days_in_this_month; $day_counter++)
            {
            $week_day %= 7;

            if($week_day == 0)
               $calendar_html .= "</tr><tr>";
$thisdate=$year.'-'.$month.'-'.$day_counter;


$data=mysql_query("select * from calendar where date='$thisdate' and calendarID='$view' ");


	$num=mysql_num_rows($data);
		if($num!=0){$eventfound="true";}
			
			if ($eventfound=="true")
			{

$calendar_html .= "<td width=\"75px\" valign=\"top\" height=\"75px\"  style=\" min-width:84px; color:#000000; border-width:1px; border-style:solid; border-color:none;\">&nbsp;" 
				 . $day_counter ;
				


while($info=mysql_fetch_array($data))
{
	$title=stripslashes($info['title']);
	$date=stripslashes($info['date']);
$eventID=stripslashes($info['ID']);
$calendarID=stripslashes($info['calendarID']);
$class=stripslashes($info['class']);
$teacher=stripslashes($info['teacher']);
$time=stripslashes($info['time']);
$ampm=stripslashes($info['ampm']);
/*
$data2=mysql_query("select * from class where ID='$class' ");
while($info2=mysql_fetch_array($data2))
{
$classtitle=$info2['title'];
$text=$info2['text'];
}

$data3=mysql_query("select * from staff where ID='$teacher' ");

while($info3=mysql_fetch_array($data3))
{
$name=$info3['title'];
$text=$info3['text'];
}

$string='<b>'.$classtitle.' </b>'.$time.''.$ampm.' '.$name.'<br>';
*/

$string=$title.' '.$date.'';

$calendar_html .='<a  style="background-color:#dddddd; color:black; margin-top:3px; display:block; min-width:82px;" href="?editcalendar='.$eventID.'">';
$calendar_html .="<div id=\"smallfont\">-".$string;
$calendar_html .="</a></div>";			
 


}
				
}
				
			else{
               $calendar_html .= "<td  width=\"75px\" height=\"75px\" valign=\"top\"  style=\" color:#000000; min-width:82px; border-width:1px; border-style:solid; border-color:none \">&nbsp;" .
                                 $day_counter . " ";}

            $week_day++;
            }
$calendar_html .= "</td>";
$calendar_html .= "</tr>";
$calendar_html .= "</table>";
return($calendar_html);
}echo calendar($date);
echo'</td><td valign="top">
<FORM ENCTYPE="multipart/form-data"  METHOD="POST">';

echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'"><P>';

echo'<INPUT TYPE="text" name="title" value="'.$oldtitle.'"><P>';
echo'urltext<br><INPUT TYPE="text" name="urltext" value="'.$oldurltext.'"><P>';

echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'"><P>';

echo'Description of this page:<br><textarea name="text" rows="20 cols="30">'.$oldtext.'</textarea></td><td valign="top">';




echo'Subpage of <br>';
			echo'<select name="subpage"> <option value="'.$subpage.'">';
			if ($subpage=='main')
				{echo'Main Page';}
			
			else
				{
				$data4=mysql_query("select * from pages where ID='$subpage' ");
				while($info4=mysql_fetch_array($data4))
					{	$thispageID=stripslashes($info4['ID']);
					echo$info4['title'];
					}
				}
			echo' </option>
			
			<option value="main">Main Page</option>';
			$data4=mysql_query("select * from pages where subpage='main' and ID !='$thispageID'order by pageorder ASC");
			while($info4=mysql_fetch_array($data4))
				{
				echo'<option value="'.$info4['ID'].'"';
				echo'>'.stripslashes($info4['title']).'</option>';
				}
			echo'</select>';
		


/*
echo'Page Type<P>';$data2=mysql_query("select * from page_types where active ='y' order by ID ASC");
while($info2=mysql_fetch_array($data2)){
echo'<input type="radio" name="page_type"value="'.$info2['ID'].'" ';
if($page_type==$info2['ID']){
echo' checked';}
echo'>';
echo stripslashes($info2['title']);
echo'<br>';}
*/


echo'<b><P>Do you want to publish <br>
this page now?</b><input type="radio" name="published" value="y" ';
if($published=='y'){
echo' checked';}
echo'>Yes<input type="radio" name="published" value="n"';
if($published!='y'){
echo' checked';}
echo'>No';
echo'<P><INPUT TYPE="submit" name="submit" VALUE="UPDATE this Page"></FORM></td></tr></table>';
echo'</td></tr></table>';


 	 }
	}
}

else // go to login
{

}

	 ?>

