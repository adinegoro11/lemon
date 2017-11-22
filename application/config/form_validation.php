<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(

//validasi perangkat
'perangkat' => array(
    array('field' => 'nama','label' => 'Nama','rules' => 'required|max_length[45]'),
	array('field' => 'ip_address','label' => 'IP Address','rules' => 'required|valid_ip'),
	array('field' => 'shelter','label' => 'Shelter','rules' => 'required'),
	array('field' => 'koneksi','label' => 'Koneksi','rules' => 'required'),
	array('field' => 'jenis','label' => 'Jenis','rules' => 'required'),
    array('field' => 'sn','label' => 'SN Perangkat','rules' => 'required')
    ),

//validasi grafik		
'grafik' => array(
    array('field' => 't_awal','label' => 'Tanggal awal','rules' => 'required'),
    array('field' => 't_akhir','label' => 'Tanggal akhir','rules' => 'required')
    ),

//validasi set parameter converter		
'set_parameter' => array(
	array('field' => 'muted','label' => 'Mute','rules' => 'required'),
    array('field' => 'frekuensi','label' => 'Frekuensi','rules' => 'required|decimal'),
    array('field' => 'att','label' => 'Attenuation','rules' => 'required|decimal|less_than_equal_to[25]')
    ), 
//OID		
'oid' => array(
    array('field' => 'nama','label' => 'Nama','rules' => 'required|min_length[3]'),
    array('field' => 'oid','label' => 'Object ID','rules' => 'required|min_length[3]')
    ), 
//Daftar OID		
'daftar_oid' => array(
    array('field' => 'id_perangkat','label' => 'Perangkat','rules' => 'required'),
    array('field' => 'id_oid','label' => 'Object ID','rules' => 'required'),
	array('field' => 'keterangan','label' => 'Keterangan','rules' => 'required')
    ), 	
  
 
//penutup $config
);
