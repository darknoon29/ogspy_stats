<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>OGSteam Stats</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
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
    <script>
        $(function () {
            $('#php_versions_container').highcharts({
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'PHP Versions'
                },
                series: [{
                    name: 'PHP',
                    data: [<?php echo $php_versions; ?>]
                }]
            });
        });
        $(function () {
            $('#ogspy_versions_container').highcharts({
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'OGSpy Versions'
                },
                series: [{
                    name: 'OGSpy',
                    data: [<?php echo $ogspy_versions; ?>]
                }]
            });
        });        $(function () {
            $('#ogspy_uni_container').highcharts({
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Univers OGSpy'
                },
                series: [{
                    name: 'Univers',
                    data: [<?php echo $ogspy_uni; ?>]
                }]
            });
        });        $(function () {
            $('#ogspy_pays_container').highcharts({
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'OGSpy Pays'
                },
                series: [{
                    name: 'Pays',
                    data: [<?php echo $ogspy_pays; ?>]
                }]
            });
        });
        $(function () {
            $('#ogspy_mod_rank_container').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Classement Modules'
                },
                xAxis: {
                    categories: <?php echo $ogspy_mod_rank_name; ?>
                },
                series: [{
                    name: 'Nombre installations',
                    data: <?php echo $ogspy_mod_rank_values; ?>
                }]
            });
        });
    </script>
</head>
<body>
<!-- Simple header with fixed tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Le site de statistiques OGSpy</span>
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="#fixed-tab-1" class="mdl-layout__tab is-active">OGSpy</a>
            <a href="#fixed-tab-2" class="mdl-layout__tab">OGSpy Modules</a>
            <a href="#fixed-tab-3" class="mdl-layout__tab">A Propos</a>
        </div>
    </header>
<!--    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
    </div>-->
    <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
            <div class="page-content">
                <p>Voici les dernières statistiques d'utilisation d'OGSpy:</p>
                <code>Nombre d'utilisateurs: <?php echo $nb_users;?></code>
                <code>Nombre de serveurs: <?php echo $nb_servers;?></code>
                <div id="charts">
                    <table>
                        <tr>
                            <td><span id="php_versions_container" style="width:20%; height:400px;"></span></td>
                            <td><span id="ogspy_versions_container" style="width:20%; height:400px;"></span></td>
                            <td><span id="ogspy_uni_container" style="width:20%; height:400px;"></span></td>
                            <td><span id="ogspy_pays_container" style="width:20%; height:400px;"></span></td>

                        </tr>

                    </table>

                </div>

        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-2">
            <div class="page-content">
                <div id="charts_mod">
                    <table>
                        <tr>
                            <td><span id="ogspy_mod_rank_container" style="width:100%; height:800px;"></span></td>
                        </tr>
                    </table>

                </div>
            </div>
        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
            <div class="page-content">Ce site est destinée à forunir des informations à l'équipe OGSteam.<br>
            Si vous souhaitez nous contacter, nous sommes disponibles sur le Forum : <a href="https://www.ogsteam.fr">Forum OGSteam</a><br><br>
            Site réalisé par DarkNoon.
            </div>
        </section>
        <p class="footer">By DarkNoon</p>
    </main>
</div>


</body>
</html>