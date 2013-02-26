<style type="text/css" media="screen">
#toplevel_page_dbastripe_overview .wp-menu-image {
    background: url(<?php echo DBASTRIPE_URL ?>app/assets/images/credit-card.png) no-repeat 6px -17px !important;
}
#toplevel_page_dbastripe_overview:hover .wp-menu-image,
#toplevel_page_dbastripe_overview.wp-has-current-submenu .wp-menu-image {
    background-position: 6px 7px !important;
}


/**
 * Stripe Overview
 ********************************************************************************/
.dbastripe { 
    font-family:Verdana,Arial,"Bitstream Vera Sans",sans-serif;
    line-height:1;
    color:#333333;
    font-size:13px;
}

.dbastripe p,
.wrap li,
.wrap dl,
.wrap dd,
.wrap dt {
    line-height:140%;
}
.dbastripe p,
.dbastripe ul,
.dbastripe ol,
.dbastripe blockquote,
.dbastripe input,
.dbastripe select {
    font-size:12px;
}
.dbastripe ol,
.dbastripe ul {
    list-style:none outside none;
}
/**
 * Stats main chart
 */

#statchart {
    margin-bottom: 10px;
    margin-top: 1em;
}

#stat-chart-container {
    padding: 10px;
}

#statchart-box {
    background: #fff;
    border-radius: 6px;
    -moz-border-radius: 6px;
    position: relative;
    margin-right: 1px;
        border: 1px solid #dfdfdf;
    }

#statchart-box,
.postbox-container,
.postbox,
#side-sortables,
#normal-sortables {
    box-sizing: border-box;
    -moz-box-sizing:border-box;
    -webkit-box-sizing:border-box;
    -ms-box-sizing:border-box;
}

/* New layout for metaboxes */
#wpcom-stats-meta-box-container {
    clear: both;
}
.postbox-container {
    width: 50% !important;
    padding-right: 0 !important;
    *width: 49% !important;
    *padding-right: .5% !important;
}
.postbox {
    width: 100%;
}
#normal-sortables {
    margin-right: 11px !important;
}
#side-sortables {
    margin-left: 11px !important;
}
/* chartswitch */
#statchart-box h3 {
    font-size: 12px;
    line-height: 1em;
    padding: 6px 10px;
    margin: 0 0 10px 0;
    color: #464646;
    text-shadow: white 0px 1px 0px;

    border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    -moz-border-radius: 6px 6px 0 0;

    background: #dfdfdf url("<?php echo DBASTRIPE_URL ?>app/assets/images/gray-grad.png") repeat-x top left;
    color: #464646;
    
}
#stat-chart-container  {
    padding:10px;
}
/* metaboxes */
ul.metabox-tabs,
ul#chartswitch {
    margin-bottom: 5px;
    padding: 0 10px 0 10px;
    background: #e1e1e1;}
ul.metabox-tabs {
    margin-left: 0px;
    margin-right: 0px;
}
#general ul.metabox-tabs {
    margin-left: -10px;
    margin-right: -10px;
}
ul.metabox-tabs,
ul#chartswitch {
    height: 24px;
    margin-top: -10px !important;
}
ul.metabox-tabs li,
ul#chartswitch li {
    list-style: none;
    display: inline;
    font-size: 11px;
}
ul.metabox-tabs li.tab a,
ul#chartswitch li a {
    display: block;
    float: left;
    margin-right: 4px;

    padding: 5px 6px;
    filter:alpha(opacity=50);
    opacity: .5;
    -webkit-opacity: .5;
    -moz-opacity: .5;
    background: #fff;
    color: #000;
    color: #454545\9; /* IE8 and below */
    border-radius: 2px 2px 0 0;
    -webkit-border-radius: 2px 2px 0 0;
    -moz-border-radius: 2px 2px 0 0;
    font-weight: bold;
    text-decoration: none;
    zoom: 1;
}
ul.metabox-tabs li.tab a {
    /* for some reason, opacity doesn't work in IE */
    background: #f0f0f0\9;\9; /* IE8 and below */
}
}
ul#chartswitch li.tab a {
    /* for some reason, opacity doesn't work in IE */
    background: #fcfcfc\9;\9; /* IE8 and below */
}
ul.metabox-tabs li.tab a.active,
ul#chartswitch li a.active,
ul.metabox-tabs li.tab a:hover,
ul#chartswitch li a:hover {
    background: #fff;
    opacity: 1;
    -webkit-opacity: 1;
    -moz-opacity: 1;
    filter:alpha(opacity=100);
    color: #454545;
}
ul.metabox-tabs li.link {
    margin-left: 4px;
}
ul.metabox-tabs li.link a {
    text-decoration: none;
}
ul.metabox-tabs li.link a:hover {
    text-decoration: underline;
}
/**
 * Stats Nuggets
 */
#stats-nuggets ul {
    padding: 0 10px 0 10px;
    overflow: hidden;
    position: relative;
    _height: 1%;
	margin-bottom: 3px;
}
#stats-nuggets ul li {
    float: left;
    width: 20%;
}
#stats-nuggets ul li div {
    color: #999;
	margin-right: 20px;
	border-right: 1px solid #F5F5F5;
	padding-bottom: 8px;
}
#stats-nuggets ul li div.last {
	width: 100% !important;
	border-right: none !important;
}
#stats-nuggets ul li span {
    font-family: Georgia, "Times New Roman", serif;
    font-size: 16pt;
    line-height: 1.5em;
    display: block;
	color: #333;
}
li.summarytables {
    padding-top: 2.5em;
    text-align: right;
}
/**
 * Tooltips
 */
#tooltip {
    position: absolute;
    display: none;
    color: #999;
    background: #fff;
    border: 1px solid #aaaaaa;
    padding: 5px 7px;
    -moz-box-shadow: 0px 1px 1px #d0d0d0;
    -webkit-box-shadow: 0px 1px 1px #d0d0d0;
    box-shadow: 0px 1px 1px #d0d0d0;
	-moz-border-radius:3px;
	border-radius:3px;
	-webkit-border-radius:3px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
#tooltip p {
    margin: 0;
    font-size: 11px;
    position: relative;
    z-index: 12;
	text-align: center;
}
#tooltip strong,
#tooltip span {
    font-size: 13px;
	color: #41640D;
	font-family: Verdana, Geneva, sans-serif;
}
#tooltip .arrowlefttop,
#tooltip .arrowleftbottom,
#tooltip .arrowrighttop,
#tooltip .arrowrightbottom {
    display: block;
    *display: none;
    height: 7px;
    position: relative;
}
#tooltip .arrowlefttop {
    background: url("<?php echo DBASTRIPE_URL ?>app/assets/images/stats-tooltip-arrow-left.png") no-repeat left top;
    left: -14px;
    top: -1px;
    margin-bottom: -7px;
}
#tooltip .arrowleftbottom {
    background: url("<?php echo DBASTRIPE_URL ?>app/assets/images/stats-tooltip-arrow-left.png") no-repeat left bottom;
    left: -14px;
	top: -5px;
    margin-top: -7px;
}
#tooltip .arrowrighttop {
    background: url("<?php echo DBASTRIPE_URL ?>app/assets/images/stats-tooltip-arrow-right.png") no-repeat right top;
    right: -14px;
    top: -1px;
    margin-bottom: -7px;
}
#tooltip .arrowrightbottom {
    background: url("<?php echo DBASTRIPE_URL ?>app/assets/images/stats-tooltip-arrow-right.png") no-repeat right bottom;
    right: -14px;
	top: -5px;
    margin-top: -7px;
}
.yummy {
	text-align: center;
}
.pie_label {
	font-size:12px;
	text-align:center; 
	-moz-border-radius:4px;
	border-radius:4px;
	-webkit-border-radius:4px;
	-moz-box-shadow:0 1px 1px #D0D0D0;
	background:none repeat scroll 0 0 #FFFFFF;
	border:1px solid #CCC;
	padding:7px 9px;
	margin-left: -2px;
	line-height: 15px;
}
.pie_label span { 
	font-weight: bold; 
}
.pieLabelBackground {
	display: none;
}
#pieLabel0 { color: #41640D !important; }
#pieLabel1 { color: #4EA7EF !important; }
/* Historical stats */
H2 {
    font-family: Georgia, "Times New Roman", serif;
    font-size: 16px !important;
    line-height: 1.5em;
	margin-bottom: 3px;
    display: block;
	font-weight: normal;
}
.center { text-align: center !important; }
.historical {
	color: #666;
}
.statsDay {
	width:100% !important;
	margin-bottom: 23px;
}
.statsdiv tr,
.statsDay tr {
	height:22px;
}
.statsDay th {
	text-align:left;
}
.statsDay td,
.statsDay th {
	font-size:11px;
	height:22px;
	padding:6px 10px;
}
.statsDay td {
	text-align: center;
}
.alternate,
.alt {
	background-color:#F9F9F9;
}
</style>
