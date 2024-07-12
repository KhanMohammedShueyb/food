<!--
Responsive Email Template by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<style type="text/css">
    /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

body {
    padding: 0;
    margin: 0;
}

html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
@media only screen and (max-device-width: 680px), only screen and (max-width: 680px) { 
    *[class="table_width_100"] {
		width: 96% !important;
	}
	*[class="border-right_mob"] {
		border-right: 1px solid #dddddd;
	}
	*[class="mob_100"] {
		width: 100% !important;
	}
	*[class="mob_center"] {
		text-align: center !important;
	}
	*[class="mob_center_bl"] {
		float: none !important;
		display: block !important;
		margin: 0px auto;
	}	
	.iage_footer a {
		text-decoration: none;
		color: #929ca8;
	}
	img.mob_display_none {
		width: 0px !important;
		height: 0px !important;
		display: none !important;
	}
	img.mob_width_50 {
		width: 40% !important;
		height: auto !important;
	}
}
.table_width_100 {
	width: 680px;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {padding: 10px 24px;}

.button2 {
		background-color: #008CBA; /* LightSkyBlue */
		border: none;
         color: white;
         padding: 5px 42px;
         text-align: center;
         font-weight: bold;
         text-decoration: none;
         display: inline-block;
         font-size: 14px;
         margin: 4px 2px;
         border-radius: 12px;
         cursor: pointer;
         box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 3px 10px 0 rgba(0,0,0,0.19);
}

.button2:hover{
	background-color: #0a4977;
	
}

</style>

<div id="mailsub" class="notification" align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">
	<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
		<!--content 1 -->
		<tr><td align="center" bgcolor="#fbfcfd">
			<table width="90%" border="0" cellspacing="0" cellpadding="0">		 
				<tr><td align="center">
					<div style="line-height: 24px;">
						<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
						<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Hi 
						<br/>
							<p><b><?php echo $user->first_name . ' ' . $user->last_name; ?> just completed the sign-up process as a researcher.</b></p>
							<p>Go to your site and check the notification to authenticate.<b></b></p><br/>
							<!-- <a href="{{ $url }}" >Authenticate</a> -->
						<br>
						<small>Thank you</small>
						</span>
						</font>
						
					</div>
				</td>
					
				</tr>
			</table>		
		</td></tr>

	</table>
</td></tr>
</table>
			
</div> 
