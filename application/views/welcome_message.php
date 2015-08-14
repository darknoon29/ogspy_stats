<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="./mdl/material.min.css">
	<script src="./mdl/material.min.js"></script>
	<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

    p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	}
	</style>
</head>
<body>
<!-- Simple header with fixed tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Welcome to CodeIgniter!</span>
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
            <a href="#fixed-tab-2" class="mdl-layout__tab">Tab 2</a>
            <a href="#fixed-tab-3" class="mdl-layout__tab">Tab 3</a>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
    </div>
    <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
            <div class="page-content">
                <code>Nombre d'utilisateurs: <?php echo $nb_users;?></code>
                <code>Nombre de serveurs: <?php echo $nb_servers;?></code>
                <p>If you would like to edit this page you'll find it located at:</p>
                <code>application/views/welcome_message.php</code>

                <p>The corresponding controller for this page is found at:</p>
                <code>application/controllers/Welcome.php</code>

                <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p></div>
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-2">
            <div class="page-content"><!-- Your content goes here --></div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
            <div class="page-content"><!-- Your content goes here --></div>
        </section>
    </main>
</div>
</body>
</html>