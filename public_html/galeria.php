<?php
require_once("../resources/config.php");

$header_titulli = "Ballina";
$css_includes = "css/site.css";
$header_style = <<< STYLE
.row {
    display: table;
    width: 100%;
    table-layout: fixed;
    border-spacing: 10px;
}

.col {
    display: table-cell;
    height: 200px;
}

    .col img {
        height: 100%;
        width: 100%;
    }

.bgimg {
    position: absolute;
    left: 0px;
    z-index: -1;
    background-image: url(http://agent.ensembletravel.com/images/CompanyImages/34976.jpg);
    background-repeat: no-repeat;
    background-size: 500px 300px;
    width: 500px;
    height: 300px;
}
STYLE;

require(templates_header);
?>

<div class="bgimg"></div>
<section class="permbajtje">
    <div class="row">
        <div class="col">
            <img src="http://mw2.google.com/mw-panoramio/photos/medium/27177231.jpg" />
        </div>
        <div class="col">
            <img src="http://static.panoramio.com/photos/large/25754660.jpg" />
        </div>
        <div class="col">
            <img src="http://mw2.google.com/mw-panoramio/photos/medium/25754826.jpg" />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <img src="http://farm7.static.flickr.com/6151/6264375600_c0b9aff789_b.jpg" />
        </div>
        <div class="col">
            <img src="http://www.shkendijatravel.com/wp-content/uploads/2014/12/Vlora-WATERFRONT-No.10_COVER-PHOTO.jpg" />
        </div>
        <div class="col">
            <img src="http://upload.wikimedia.org/wikipedia/de/2/2a/Vlora_Stadt.jpg" />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <img src="http://butrint.com/images/howto/02/Saranda_view.jpg" />
        </div>
        <div class="col">
            <img src="http://www.visitsaranda.com/blog/wp-content/uploads/2011/04/another-amazing-lukove-shot.jpg" />
        </div>
        <div class="col">
            <img src="http://www.finikas-lines.com/sites/default/files/img/saranda.jpg" />
        </div>
    </div>
</section>

<?php require(templates_footer); ?>