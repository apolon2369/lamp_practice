<?php
require_once '../conf/const.php'; // 設定の読み込み
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start(); // セッション開始

// セッションにuser_idがなければログインページへリダイレクト
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

// トークンの生成
$token = get_csrf_token();

// DB接続
$db = get_db_connect();

// user_idで取得した情報を配列にする
$user = get_login_user($db);

// $user['type']が1じゃない場合はログインページへリダイレクト
if(is_admin($user) === false){
  redirect_to(LOGIN_URL);
}

// itemの情報を全て取得
$items = get_all_items($db);
include_once VIEW_PATH . '/admin_view.php';
