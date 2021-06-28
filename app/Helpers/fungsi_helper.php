<?php

function cekLogin($session)
{
	if ($session->get('email') != null) {
		return true;
	} else {
		return false;
	}
}

function cekMenu($session)
{
	$list = "";
	$tmp = "";
	foreach ($session->get('menu') as $row) {
		if ($row->menu_name == "dashboard") {
			$tmp =  "<li class='nav-item active'>
				<a class='nav-link' href='" . base_url('dashboard') . "'>
					<i class='fas fa-home'></i>
					<span>Dashboard</span>
				</a>
			</li>";
			
		} elseif ($row->menu_name == "master") {
			$tmp = "<li class='nav-item active'>
				<a class='nav-link' href='" . base_url('master') . "' aria-expanded='false'
					aria-controls='collapsePages'>
					<i class='fas fa-tachometer-alt'></i>
					<span>Master</span>
				</a>
			</li>";
		} elseif ($row->menu_name == "data karyawan" && $row->role_id == "1") {
			$tmp = "<li class='nav-item active'>
    <a class='nav-link collapsed' data-toggle='collapse' data-target='#collapsePages'  aria-expanded='false'
        aria-controls='collapsePages'>
        <i class='fas fa-id-badge'></i>
        <span>Karyawan</span>
    </a>
    <div id='collapsePages' class='collapse show' aria-labelledby='headingPages'
        data-parent='#accordionSidebar'>
        <div class='bg-white py-2 collapse-inner rounded'>
            <h6 class='collapse-header'>Edit Data Karyawan</h6>
            <a class='collapse-item' href='" . base_url('karyawan') . "'>Karyawan</a>
            <div class='collapse-divider'></div>
            <h6 class='collapse-header'>Info Karyawan Cuti</h6>
            <a class='collapse-item' href='" . base_url('cuti') . "'>Karyawan Sedang Cuti</a>
            <a class='collapse-item' href='" . base_url('sisa') . "'>Sisa Cuti Karyawan</a>
        </div>
    </div>
</li>";
		} elseif ($row->menu_name == "data karyawan" && $row->role_id == "2") {
			$tmp = "<li class='nav-item active'>
				<a class='nav-link collapsed' data-toggle='collapse' data-target='#collapsePages'  aria-expanded='false'
					aria-controls='collapsePages'>
					<i class='fas fa-id-badge'></i>
					<span>Karyawan</span>
				</a>
				<div id='collapsePages' class='collapse show' aria-labelledby='headingPages'
					data-parent='#accordionSidebar'>
					<div class='bg-white py-2 collapse-inner rounded'>
						<div class='collapse-divider'></div>
						<h6 class='collapse-header'>Info Karyawan Cuti</h6>
						<a class='collapse-item' href='" . base_url('cuti') . "'>Karyawan Sedang Cuti</a>
						<a class='collapse-item' href='" . base_url('sisa') . "'>Sisa Cuti Karyawan</a>
					</div>
				</div>
			</li>";
		}
		$list = $list . $tmp;
	}
	return $list;
}

function backDoor($session, $menu)
{
	$cek = false;
	foreach ($session->get('menu') as $row) {
		if ($row->menu_name == $menu) {
			$cek = true;
		}
	}
	return $cek;
}