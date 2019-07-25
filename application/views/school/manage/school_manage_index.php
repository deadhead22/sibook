<?php
echo $this->session->flashdata('saved');


// Menu for all users
$i = 0;
$menu[$i]['text'] = 'Peminjaman';
$menu[$i]['icon'] = 'school_manage_bookings.gif';
$menu[$i]['href'] = site_url('bookings');

$i++;
$menu[$i]['text'] = 'Profil';
$menu[$i]['icon'] = ($this->userauth->is_level(ADMINISTRATOR)) ? 'user_administrator.gif' : 'user_teacher.gif';
$menu[$i]['href'] = site_url('profile');

// $i++;
// $menu[$i]['text'] = '';
// $menu[$i]['icon'] = 'blank.png';
// $menu[$i]['href'] = '';




// Menu items for Administrators

$i = 0;
$school[$i]['text'] = 'Detail Perusahaan';
$school[$i]['icon'] = 'school_manage_details.gif';
$school[$i]['href'] = site_url('school/details');

$i++;
$school[$i]['text'] = 'Sesi';
$school[$i]['icon'] = 'school_manage_times.gif';
$school[$i]['href'] = site_url('periods');

$i++;
$school[$i]['text'] = 'Siklus Mingguan';
$school[$i]['icon'] = 'school_manage_weeks.gif';
$school[$i]['href'] = site_url('weeks');

$i++;
$school[$i]['text'] = 'Liburan';
$school[$i]['icon'] = 'school_manage_holidays.gif';
$school[$i]['href'] = site_url('holidays');

$i++;
$school[$i]['text'] = 'Ruangan';
$school[$i]['icon'] = 'school_manage_rooms.gif';
$school[$i]['href'] = site_url('rooms');

$i++;
$school[$i]['text'] = 'Instansi';
$school[$i]['icon'] = 'school_manage_departments.gif';
$school[$i]['href'] = site_url('departments');


$i = 0;

/*
$i++;
$admin[$i]['text'] = 'Reports';
$admin[$i]['icon'] = 'school_manage_reports.gif';
$admin[$i]['href'] = site_url('reports');
*/

$i++;
$admin[$i]['text'] = 'Pengguna';
$admin[$i]['icon'] = 'school_manage_users.gif';
$admin[$i]['href'] = site_url('users');

// $i++;
// $admin[$i]['text'] = '';
// $admin[$i]['icon'] = 'blank.png';
// $admin[$i]['href'] = '';

/*$i++;
$admin[$i]['text'] = 'Settings';
$admin[$i]['icon'] = 'school_manage_settings.gif';
$admin[$i]['href'] = site_url('settings');*/



// Start echoing the admin menu
$i = 0;


// Print Normal menu
dotable($menu);



// Check if user is admin
if ($this->userauth->is_level(ADMINISTRATOR)) {
	echo '<h2>Instansi</h2>';
	dotable($school);
	echo '<h2>Manajemen</h2>';
	dotable($admin);
}




function dotable($array){

	echo '<div class="ui fluid vertical labeled buttons">';
	$row = 0;

	
//   <button class="ui button">
//     <i class="pause icon"></i>
//     Pause
//   </button>
//   <button class="ui button">
//     <i class="play icon"></i>
//     Play
//   </button>
//   <button class="ui button">
//     <i class="shuffle icon"></i>
//     Shuffle
//   </button>
// </div>

	foreach($array as $link){
		// if($row == 0)		
		echo '<a href="'.$link['href'].'">';
		echo '<button class="fluid ui button large">
					<i>
						<img src="' . base_url('assets/images/ui/'.$link['icon']) . '" alt="'.$link['text'].'"/>
					</i>'.
					$link['text'].'
				</button>';
		echo '</a>';
		
		if($row == 2){ $row = -1; }
		$row++;
	}
	echo '</div>';
}
?>
