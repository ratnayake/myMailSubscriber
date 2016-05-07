<?php
/*
Plugin Name: MyMail - Subscriber API
Plugin URI: http://ratnayake.info
Description: MyMail add subscriber and change subscription api
Version: 1.0
Author: Isuru Sampath Ratnayake
Author URI: http://ratnayake.info
Text Domain: mymail_subscriber
*/

//Add new subscriber to list
add_action( 'admin_post_nopriv_add_subscriber_to_list', 'mymail_add_subscriber_to_list' );
add_action( 'admin_post_add_subscriber_to_list', 'mymail_add_subscriber_to_list' );

function mymail_add_subscriber_to_list() {
	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$list = $_POST['list']; //list id will send from web call
	$userdata = array('email' => $email,'firstname' => $firstname, 'lastname' => $lastname);
	$mys = new mymail_subscribers();
	$subscriber_id = $mys->add($userdata, true);
	$mys->assign_lists($subscriber_id,$list,false);
	echo "true";
	exit();
}


//Change Subscriber's list
add_action( 'admin_post_nopriv_change_subscriber_list', 'mymail_change_subscriber_list' );
add_action( 'admin_post_change_subscriber_list', 'mymail_change_subscriber_list' );

function mymail_change_subscriber_list() {
	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$list = $_POST['list']; //list id will send from web call
	$mys = new mymail_subscribers();
	//check we alredy have customer with email in mylist
	$subscriber = $mys->get_by_mail($email, false);
	if(!empty($subscriber)){
		$mys->assign_lists($subscriber->ID,$list,true);
	}
	else{
		$userdata = array('email' => $email,'firstname' => $firstname, 'lastname' => $lastname);
		$subscriber_id = $mys->add($userdata, true);
		$mys->assign_lists($subscriber_id,$list,true);
	}
	echo "true";
	exit();
}