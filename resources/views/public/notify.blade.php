<?php
$data['platform'] = getOS();
$browser = getBrowser();
$data['browser'] = $browser['name'].' - '.$browser['version'];
$data['ip'] = $_SERVER['REMOTE_ADDR'];

function getOS() { 

    
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}


function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
    }
    $i = count($matches['browser']);
    if ($i != 1) {
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}
$ua=getBrowser();
$yourbrowser = $ua['name'];
$yourversion = $ua['version'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> <!-- utf-8 works for most cases -->
	<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
  <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
  <style type="text/css">

  	/* What it does: Remove spaces around the email design added by some email clients. */
  	/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
		html,
		body {
			margin: 0;
			padding: 0;
			height: 100% !important;
			width: 100% !important;
		}
		
		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}
		
		/* What it does: Forces Outlook.com to display emails full width. */
		.ExternalClass {
			width: 100%;
		}  
		
		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
		}
		
    /* What it does: Fixes webkit padding issue. */
    table {
			border-spacing:0 !important;
    }

		/* What it does: Fixes Outlook.com line height. */
		.ExternalClass,
		.ExternalClass * {
    	line-height: 100%;
		}
		
		/* What it does: Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
		table {
		  border-collapse: collapse;
		  margin: 0 auto;
		}
		
		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode:bicubic;
		}
		
    /* What it does: Overrides styles added when Yahoo's auto-senses a link. */
    .yshortcuts a {
			border-bottom: none !important;
    }
    
    /* What it does: Overrides blue, underlined links auto-detected by iOS Mail. */
    /* More Info: https://litmus.com/blog/update-banning-blue-links-on-ios-devices */
    .mobile-link--footer a {
	    color: #666666 !important;
    }
    
		/* What it does: Overrides styles added images. */
		img {
			border:0 !important;
			outline:none !important;
			text-decoration:none !important;
		}

		/* What it does: Apple Mail doesn't support max-width, so a media query constrains the email container width. */
		@media only screen and (min-width: 601px) {
			.email-container {
				width: 600px !important;
			}
		}
          
		/* What it does: Apple Mail doesn't support max-width, so a media query constrains the email container width. */
		@media only screen and (max-width: 600px) {
			.email-container {
				width: 100% !important;
				max-width: none !important;
			}
		}
          
  </style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#222222" style="margin:0; padding:0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;">
<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" bgcolor="#222222" style="border-collapse:collapse;"><tr><td>

	<!-- Visually Hidden Preheader Text : BEGIN -->
	<div style="display:none;font-size:1px;color:#222222;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide: all;">
		User from : <?php echo $_SERVER['REMOTE_ADDR']; echo getOS(); print_r($yourbrowser);  print_r($yourversion); echo date('Y-M-d H:i:s')?>
	</div>
	<!-- Visually Hidden Preheader Text : END -->

  <!-- Outlook and Lotus Notes don't support max-width but are always on desktop, so we can enforce a wide, fixed width view. -->
  <!-- Beginning of Outlook-specific wrapper : BEGIN -->
	<!--[if (gte mso 9)|(IE)]>
  <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td>
  <![endif]-->
  <!-- Beginning of Outlook-specific wrapper : END -->

  <!-- Email wrapper : BEGIN -->
  <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="max-width:600px; margin:auto;" class="email-container">
    <tr>
    	<td>

        <!-- Logo + Links : BEGIN -->
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="middle" style="padding:10px 0; text-align:left;" width="150">
              <img src="http://www.sysaxiom.com/logo.png" alt="alt text" width="150" height="50" border="0" align="left">
            </td>
            <td valign="middle" style="padding:10px 0; text-align:right; line-height:1.1; font-family: sans-serif; font-size: 13px; color: #999999;">
              <span>User Access Log Notification</span>
            </td>
          </tr>
        </table>
        <!-- Logo + Links : END -->
  
        <!-- Main Email Body : BEGIN -->
        <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
      
          
          <!-- Full Width, Fluid Column : END -->
      		
      		<!-- 2 x 2 grid : BEGIN -->
          <tr>
            <td>
              
						</td>
		      </tr>
      		<!-- 2 x 2 grid : END -->
				
          <!-- Data Table : BEGIN -->
          <tr>
            <td style="padding: 4%;">
							<table cellspacing="0" cellpadding="0" border="0" width="100%" style="">
								<tr>
									<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; font-weight: bold; border-bottom: 1px solid #cccccc">
										User Ip : 
									</td>
									<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; font-weight: bold; border-bottom: 1px solid #cccccc">
										Platform : 
										
									</td>
									<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; font-weight: bold; border-bottom: 1px solid #cccccc">
										Browser : 
									</td>
									<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; font-weight: bold; border-bottom: 1px solid #cccccc">
										Version : 
									</td>
									<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; font-weight: bold; border-bottom: 1px solid #cccccc">
										Date : 
									</td>
								</tr>
								<tr>
									<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; border-bottom: 1px solid #eeeeee">
										<?php echo $_SERVER['REMOTE_ADDR']?>
									</td>
									<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; border-bottom: 1px solid #eeeeee">
										<?php echo getOS(); ?>
									</td>
									<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; border-bottom: 1px solid #eeeeee">
										<?php print_r($yourbrowser); ?>
									</td>
										<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; border-bottom: 1px solid #eeeeee">
										<?php print_r($yourversion); ?>
									</td>
									<td valign="top" align="left" style="padding: 10px 0; font-family: sans-serif; font-size: 15px; line-height: 1.3; color: #333333; border-bottom: 1px solid #eeeeee">
										<?php echo date('Y-M-d H:i:s')?>
									</td>
								</tr>
								
								
							</table>

                          <a href="http://www.google.com" style="background: #222222; border: 15px solid #222222; color: #ffffff; font-family: sans-serif; font-size: 15px; line-height: 1; text-align: center; text-decoration: none; display: block; border-radius: 3px;">
                            <b>Access Full List</b>
                          </a>
            </td>
          </tr>
          <!-- Data Table : END -->

        </table>
        <!-- Main Email Body : END -->
 	       
      </td>
		</tr>
    
    <!-- Footer : BEGIN -->
    <tr>
      <td style="text-align:center; padding:4% 0; font-family:sans-serif; font-size:13px; line-height:1.2; color:#666666;">
        You received this email because you opted in to our newsletter.
        <br><br>
        Company Name &bull; <span class="mobile-link--footer">23 Fake Street, SpringField, Oregon 97477 US</span> &bull; <span class="mobile-link--footer">(123) 456-7890</span>
        <br><br>
        <unsubscribe style="color:#666666; text-decoration:underline;">unsubscribe</unsubscribe>
      </td>
    </tr>
    <!-- Footer : END -->
        
  </table>
  <!-- Email wrapper : END -->

  <!-- End of Outlook-specific wrapper : BEGIN -->
	<!--[if (gte mso 9)|(IE)]>
      </td>
    </tr>
  </table>
  <![endif]-->
  <!-- End of Outlook-specific wrapper : END -->

</td></tr></table>
</body>
</html>