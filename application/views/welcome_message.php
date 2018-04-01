<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <!-- The jQuery library is a prerequisite for all jqSuite products -->
    <script type="text/ecmascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <!-- We support more than 40 localizations -->
    <script type="text/ecmascript" src="<?php echo base_url(); ?>js/trirand/i18n/grid.locale-en.js"></script>
    <!-- This is the Javascript file of jqGrid -->
    <script type="text/ecmascript" src="<?php echo base_url(); ?>js/trirand/src/jquery.jqGrid.js"></script>
    <!-- This is the localization file of the grid controlling messages, labels, etc.
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/jquery-ui.css" />
    <!-- The link to the CSS that the grid needs -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/trirand/ui.jqgrid.css" />
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

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

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<div>
    <table id="rcRecords"></table>
    <div id="pager"></div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

        var baseurl = "<?php echo base_url(); ?>";
        $('#rcRecords').jqGrid({
            url: baseurl + "index.php/Welcome/getCustomers",
            postData: {
                id : function () { return [10,11,12,14,15,16,1000] }
            },
            datatype: "json",
            height: "auto",
            width: "700",
            colNames: ['Id','First Name','Last Name','Email','Gender', 'IP address', 'Birth date'],
            colModel: [
                {name: 'id', index: 'id', width: 55, key: true},
            {name: 'first_name', index:'first_name', width:250},
            {name: 'last_name', index:'last_name',width:100},
            {name: 'email', index:'email',width:100},
            {name: 'gender', index:'gender',width:100},
            {name: 'ip_address', index:'ip_address',width:100},
            {name: 'birth_date', index:'birth_date',width:100}
            ],
            jsonReader:{ repeatitems : false, id: "0" },
            loadonce: false,
            rowNum: 10,
            rowList: [10, 20, 50, 100],
            pager: jQuery('#pager'),
            viewrecords: true,
            multiselect: true,
            caption: "All Customers",
            gridview: true,
            autoencode: true
        }).navGrid('#pager1', {edit: false, add: false, del: false, refresh: true});
        /* This function is used to show custom graphical status, ie. I show it using colors and bootstrap lable class
         cellvalue : Its value of that cell on which you can process
         option : option contain whole information like key
         rowObject : it having the complete row information
         You can log and see their elements using console.log(rowObject) etc. in firebug
         */
        function statusFormatter(cellvalue, options, rowObject) {
            if (cellvalue == 1) {
                return "<span class='label label-success'>Yes</span>";
            }
            else {
                return "<span class='label label-danger'>No</span>";
            }
        }
        });
</script>
</body>
</html>