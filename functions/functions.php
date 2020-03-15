<?php
/**
 * Created by PhpStorm.
 * User: Maxipain
 * Date: 3/5/2020
 * Time: 10:04 PM
 */
include_once 'functions/actions.php';
$obj = new DataOperations();

$sql = "SELECT value FROM general_settings WHERE name='logo'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$logo_url = $get_data['value'];

$sql = "SELECT value FROM general_settings WHERE name='favicon'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$favicon_url = $get_data['value'];


$sql = "SELECT value FROM general_settings WHERE name='facebook'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$facebook = $get_data['value'];


$sql = "SELECT value FROM general_settings WHERE name='mobile1'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$mobile1 = $get_data['value'];


$sql = "SELECT value FROM general_settings WHERE name='linkedin'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$linkedin = $get_data['value'];


$sql = "SELECT value FROM general_settings WHERE name='mobile2'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$mobile2 = $get_data['value'];

$sql = "SELECT value FROM general_settings WHERE name='email1'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$email1 = $get_data['value'];

$sql = "SELECT value FROM general_settings WHERE name='email2'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$email2 = $get_data['value'];

$sql = "SELECT value FROM general_settings WHERE name='address'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$address = $get_data['value'];

$sql = "SELECT value FROM general_settings WHERE name='map'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$map = $get_data['value'];

