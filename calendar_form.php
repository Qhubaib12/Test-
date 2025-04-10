<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" language="JavaScript">
<!--
//	JS strings
	var l_lang = "en_US";
	var l_sel_date = "Select Date";
	var l_not_allowed = "This date is not allowed to be selected";
	var l_date_before = "Please choose a date before %s";
	var l_date_after = "Please choose a date after %s";
	var l_date_between = "Please choose a date between\n%s and %s";
	var l_use_ymd_drop = "0";
	var l_day = "Day";
	var l_month = "Month";
	var l_year = "Year";
//	Long Month Names
	var l_january = "January";
	var l_february = "February";
	var l_march = "March";
	var l_april = "April";
	var l_may = "May";
	var l_june = "June";
	var l_july = "July";
	var l_august = "August";
	var l_september = "September";
	var l_october = "October";
	var l_november = "November";
	var l_december = "December";
if(l_lang == "el_GR"){
//	Date Month Names Greek
	var l_januaryu = "";
	var l_februaryu = "";
	var l_marchu = "";
	var l_aprilu = "";
	var l_mayu = "";
	var l_juneu = "";
	var l_julyu = "";
	var l_augustu = "";
	var l_septemberu = "";
	var l_octoberu = "";
	var l_novemberu = "";
	var l_decemberu = "";
}
//	Short Month Names
	var s_jan = "Jan";
	var s_feb = "Feb";
	var s_mar = "Mar";
	var s_apr = "Apr";
	var s_may = "May";
	var s_jun = "Jun";
	var s_jul = "Jul";
	var s_aug = "Aug";
	var s_sep = "Sep";
	var s_oct = "Oct";
	var s_nov = "Nov";
	var s_dec = "Dec";
//	Long Day Names
	var l_monday = "Monday";
	var l_tuesday = "Tuesday";
	var l_wednesday = "Wednesday";
	var l_thursday = "Thursday";
	var l_friday = "Friday";
	var l_saturday = "Saturday";
	var l_sunday = "Sunday";
//	Short Day Names
	var s_mon = "Mo";
	var s_tue = "Tu";
	var s_wed = "We";
	var s_thu = "Th";
	var s_fri = "Fr";
	var s_sat = "Sa";
	var s_sun = "Su";
// -->
</script>
	<script language="javascript" src="js/calendar_1.js"></script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7; IE=8">
<title></title>
<link href="css/calendar.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
var ccWidth = 0;
var ccHeight = 0;

function setValue(){
	var f = document.calendarform;
	var date_selected = padString(f.selected_year.value, 4, "0") + "-" + padString(f.selected_month.value, 2, "0") + "-" + padString(f.selected_day.value, 2, "0");

	//not use for now
	//toggle = typeof(toggle) != 'undefined' ? toggle : true;

	window.parent.setValue(f.objname.value, date_selected);
}

function unsetValue(){
	var f = document.calendarform;
	f.selected_day.value = "00";
	f.selected_month.value = "00";
	f.selected_year.value = "0000";

	setValue();

	this.loading();
	//f.submit();
}

function restoreValue(){
	var f = document.calendarform;
	var date_selected = padString(f.selected_year.value, 4, "0") + "-" + padString(f.selected_month.value, 2, "0") + "-" + padString(f.selected_day.value, 2, "0");

	window.parent.updateValue(f.objname.value, date_selected);
}

function selectDay(d){
	var f = document.calendarform;
	f.selected_day.value = d.toString();
	f.selected_month.value = f.m[f.m.selectedIndex].value;
	f.selected_year.value = f.y[f.y.selectedIndex].value;

	setValue();

	this.loading();
	//f.submit();

	submitNow(f.selected_day.value, f.selected_month.value, f.selected_year.value);
}

function hL(E, mo){
	//clear last selected
	if(document.getElementById("select")){
		var selectobj = document.getElementById("select");
		selectobj.Id = "";
	}

	while (E.tagName!="TD"){
		E=E.parentElement;
	}

	E.Id = "select";
}

function selectMonth(m){
	var f = document.calendarform;
	f.selected_month.value = m;
}

function selectYear(y){
	var f = document.calendarform;
	f.selected_year.value = y;
}

function move(m, y){
	var f = document.calendarform;
	f.m.value = m;
	f.y.value = y;

	this.loading();
	f.submit();
}

function today(){
	var f = document.calendarform;
	f.m.value = "03";
	f.y.value = "2025";

	this.loading();
	f.submit();
}

function closeMe(){
	window.parent.toggleCalendar('date1');
}

function submitNow(dvalue, mvalue, yvalue){
	}

function padString(stringToPad, padLength, padString) {
	if (stringToPad.length < padLength) {
		while (stringToPad.length < padLength) {
			stringToPad = padString + stringToPad;
		}
	}else {}
/*
	if (stringToPad.length > padLength) {
		stringToPad = stringToPad.substring((stringToPad.length - padLength), padLength);
	} else {}
*/
	return stringToPad;
}

function loading(){
	if(this.ccWidth > 0 && this.ccHeight > 0){
		var ccobj = getObject('calendar-container');

		ccobj.style.width = this.ccWidth+'px';
		ccobj.style.height = this.ccHeight+'px';
	}

	document.getElementById('calendar-container').innerHTML = "<div id=\"calendar-body\"><div class=\"refresh\"><div align=\"center\" class=\"txt-container\">Refreshing Calendar...</div></div></div>";
	adjustContainer();
}

function submitCalendar(){
	this.loading();
	document.calendarform.submit();
}

function getObject(item){
	if( window.mmIsOpera ) return(document.getElementById(item));
	if(document.all) return(document.all[item]);
	if(document.getElementById) return(document.getElementById(item));
	if(document.layers) return(document.layers[item]);
	return(false);
}

function adjustContainer(){
	var tc_obj = getObject('calendar-page');
	//var tc_obj = frm_obj.contentWindow.getObject('calendar-page');
	if(tc_obj != null){
		var div_obj = window.parent.document.getElementById('div_date1');

		if(tc_obj.offsetWidth > 0 && tc_obj.offsetHeight > 0){
			div_obj.style.width = tc_obj.offsetWidth+'px';
			div_obj.style.height = tc_obj.offsetHeight+'px';
			//alert(div_obj.style.width+','+div_obj.style.height);

			var ccsize = getObject('calendar-container');
			this.ccWidth = ccsize.offsetWidth;
			this.ccHeight = ccsize.offsetHeight;
		}
	}
}

window.onload = function(){
	window.parent.setDateLabel('date1');
	adjustContainer();
	setTimeout("adjustContainer()", 1000);
	restoreValue();
};
//-->
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div id="calendar-page" style="border-radius:15px 15px 5px 5px">
    <div id="calendar-header" align="center" style="width:228px;background-color:#88b6d8; border-radius: 15px 15px 5px 5px;">
        		     <div id="calendar-footer" style="height:36px;background-color:#88b6d8;border-radius:15px 15px 0px 0px;">
          <div class="btn" style="width:208px;">
            <div style="float: left;">
            �            </div>
            <div style="float: right;margin-left:6px;margin-top:2px;">
            <a href="javascript:move('04', '2025');"><img src="images/btn_next.png" width="16" height="16" border="0" alt="Next" title="Next"></a>
			            </div>
            <div style="margin-left: 30px; margin-right: 30px;font-size:1.9em;border-radius:15px 15px 5px 5px;margin-top:5px;color:white;" align="center">
            	
				March - 2025                
            </div>
            <div style="clear: both;"></div>
          </div>
        </div>
        <form id="calendarform" name="calendarform" method="post" action="/wp-content/plugins/appointment-calendar/calendar/calendar_form.php">
          <table align="center" cellpadding="1" cellspacing="0" style="width:228px;display:none;">
            <tbody><tr>
			              <td align="left"><select name="m" onchange="javascript:submitCalendar();">
              <option value="01">January</option><option value="02">February</option><option value="03" selected="selected">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>              </select>
			  </td>
			              <td align="right"><select name="y" onchange="javascript:submitCalendar();">
              <option value="2035">2035</option><option value="2034">2034</option><option value="2033">2033</option><option value="2032">2032</option><option value="2031">2031</option><option value="2030">2030</option><option value="2029">2029</option><option value="2028">2028</option><option value="2027">2027</option><option value="2026">2026</option><option value="2025" selected="selected">2025</option>              </select>
			  </td>
			            </tr>
          </tbody></table>
		
            <input name="selected_day" type="hidden" id="selected_day" value="23">
            <input name="selected_month" type="hidden" id="selected_month" value="03">
            <input name="selected_year" type="hidden" id="selected_year" value="2025">
            <input name="year_start" type="hidden" id="year_start" value="2025">
            <input name="year_end" type="hidden" id="year_end" value="2035">
            <input name="objname" type="hidden" id="objname" value="date1">
            <input name="dp" type="hidden" id="dp" value="0">
            <input name="da1" type="hidden" id="da1" value="1742601600">
            <input name="da2" type="hidden" id="da2" value="2051222400">
            <input name="sna" type="hidden" id="sna" value="">
            <input name="aut" type="hidden" id="aut" value="">
            <input name="frm" type="hidden" id="frm" value="">
            <input name="tar" type="hidden" id="tar" value="">
            <input name="inp" type="hidden" id="inp" value="1">
            <input name="fmt" type="hidden" id="fmt" value="F j, Y">
            <input name="dis" type="hidden" id="dis" value="">
            <input name="pr1" type="hidden" id="pr1" value="">
            <input name="pr2" type="hidden" id="pr2" value="">
            <input name="prv" type="hidden" id="prv" value="">
            <input name="pth" type="hidden" id="pth" value="#wp-content/plugins/appointment-calendar/calendar/">
            <input name="spd" type="hidden" id="spd" value="[[],[],[]]">
            <input name="spt" type="hidden" id="spt" value="0">
            <input name="och" type="hidden" id="och" value="myChanged()">
            <input name="str" type="hidden" id="str" value="0">
            <input name="rtl" type="hidden" id="rtl" value="0">
            <input name="wks" type="hidden" id="wks" value="">
            <input name="int" type="hidden" id="int" value="1">
            <input name="hid" type="hidden" id="hid" value="1">
            <input name="hdt" type="hidden" id="hdt" value="1000">
            <input name="hl" type="hidden" id="hl" value="en_US">
      </form>
    </div>
    <div id="calendar-container" style="width:228px;">
        <div id="calendar-body" style="width:228px;">
        <table border="0" cellspacing="1" cellpadding="0" align="center" style="width:228px;background-color:#88b6d8;height:154px;font-size:12px;">
            <tbody><tr><td align="center" class="header"><div>Su</div></td><td align="center" class="header"><div>Mo</div></td><td align="center" class="header"><div>Tu</div></td><td align="center" class="header"><div>We</div></td><td align="center" class="header"><div>Th</div></td><td align="center" class="header"><div>Fr</div></td><td align="center" class="header"><div>Sa</div></td></tr><tr><td align="center" class="othermonth"><div>23</div></td><td align="center" class="othermonth"><div>24</div></td><td align="center" class="othermonth"><div>25</div></td><td align="center" class="othermonth"><div>26</div></td><td align="center" class="othermonth"><div>27</div></td><td align="center" class="othermonth"><div>28</div></td><td id="20250301" align="center" class="general sat disabledate"><div>1</div></td></tr><tr><td id="20250302" align="center" class="general sun disabledate"><div>2</div></td><td id="20250303" align="center" class="general mon disabledate"><div>3</div></td><td id="20250304" align="center" class="general tue disabledate"><div>4</div></td><td id="20250305" align="center" class="general wed disabledate"><div>5</div></td><td id="20250306" align="center" class="general thu disabledate"><div>6</div></td><td id="20250307" align="center" class="general fri disabledate"><div>7</div></td><td id="20250308" align="center" class="general sat disabledate"><div>8</div></td></tr><tr><td id="20250309" align="center" class="general sun disabledate"><div>9</div></td><td id="20250310" align="center" class="general mon disabledate"><div>10</div></td><td id="20250311" align="center" class="general tue disabledate"><div>11</div></td><td id="20250312" align="center" class="general wed disabledate"><div>12</div></td><td id="20250313" align="center" class="general thu disabledate"><div>13</div></td><td id="20250314" align="center" class="general fri disabledate"><div>14</div></td><td id="20250315" align="center" class="general sat disabledate"><div>15</div></td></tr><tr><td id="20250316" align="center" class="general sun disabledate"><div>16</div></td><td id="20250317" align="center" class="general mon disabledate"><div>17</div></td><td id="20250318" align="center" class="general tue disabledate"><div>18</div></td><td id="20250319" align="center" class="general wed disabledate"><div>19</div></td><td id="20250320" align="center" class="general thu disabledate"><div>20</div></td><td id="20250321" align="center" class="general fri disabledate"><div>21</div></td><td id="20250322" align="center" class="general sat disabledate"><div>22</div></td></tr><tr><td id="20250323" align="center" class="today select sun"><a href="javascript:selectDay('23');"><div>23</div></a></td><td id="20250324" align="center" class="general mon"><a href="javascript:selectDay('24');"><div>24</div></a></td><td id="20250325" align="center" class="general tue"><a href="javascript:selectDay('25');"><div>25</div></a></td><td id="20250326" align="center" class="general wed"><a href="javascript:selectDay('26');"><div>26</div></a></td><td id="20250327" align="center" class="general thu"><a href="javascript:selectDay('27');"><div>27</div></a></td><td id="20250328" align="center" class="general fri"><a href="javascript:selectDay('28');"><div>28</div></a></td><td id="20250329" align="center" class="general sat"><a href="javascript:selectDay('29');"><div>29</div></a></td></tr><tr><td id="20250330" align="center" class="general sun"><a href="javascript:selectDay('30');"><div>30</div></a></td><td id="20250331" align="center" class="general mon"><a href="javascript:selectDay('31');"><div>31</div></a></td><td align="center" class="othermonth"><div>1</div></td><td align="center" class="othermonth"><div>2</div></td><td align="center" class="othermonth"><div>3</div></td><td align="center" class="othermonth"><div>4</div></td><td align="center" class="othermonth"><div>5</div></td></tr>        </tbody></table>
        </div>
             
            </div>
</div>
<div style="clear: both;"></div>

</body></html>